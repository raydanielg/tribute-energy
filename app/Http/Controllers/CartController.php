<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = 0;
        
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        
        return view('cart', compact('cart', 'total'));
    }

    public function add(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);
        $cart = session()->get('cart', []);
        $quantity = $request->quantity ?? 1;
        
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += $quantity;
        } else {
            $cart[$productId] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
                'image' => $product->image,
            ];
        }
        
        session()->put('cart', $cart);
        
        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function remove($productId)
    {
        $cart = session()->get('cart', []);
        
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }
        
        return redirect()->back()->with('success', 'Product removed from cart!');
    }

    public function update(Request $request, $productId)
    {
        $cart = session()->get('cart', []);
        
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }
        
        return redirect()->back()->with('success', 'Cart updated!');
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('products')->with('error', 'Your cart is empty');
        }
        
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        
        return view('checkout', compact('cart', 'total'));
    }

    public function placeOrder(Request $request)
    {
        $cart = session()->get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('products')->with('error', 'Your cart is empty');
        }
        
        // Handle guest registration
        if (!Auth::check()) {
            $validated = $request->validate([
                'guest_name' => 'required|string|max:255',
                'guest_email' => 'required|email|max:255|unique:users,email',
                'guest_phone' => 'required|string|min:10',
                'guest_password' => 'required|string|min:8|confirmed',
                'shipping_address' => 'required|string|min:10',
                'phone' => 'required|string|min:10|regex:/^[0-9+\s-]+$/',
                'notes' => 'nullable|string|max:500',
            ]);
            
            // Create user account
            $user = \App\Models\User::create([
                'name' => $validated['guest_name'],
                'email' => $validated['guest_email'],
                'phone' => $validated['guest_phone'],
                'password' => bcrypt($validated['guest_password']),
                'role_id' => 2, // Default user role
            ]);
            
            // Login the new user
            Auth::login($user);
        } else {
            $validated = $request->validate([
                'shipping_address' => 'required|string|min:10',
                'phone' => 'required|string|min:10|regex:/^[0-9+\s-]+$/',
                'notes' => 'nullable|string|max:500',
            ]);
        }
        
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        
        $order = Order::create([
            'user_id' => Auth::id(),
            'order_number' => 'ORD-' . strtoupper(uniqid()),
            'total_amount' => $total,
            'status' => 'pending',
            'payment_status' => 'pending',
            'shipping_address' => $validated['shipping_address'],
            'phone' => $validated['phone'],
            'notes' => $validated['notes'] ?? null,
        ]);
        
        foreach ($cart as $productId => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'subtotal' => $item['price'] * $item['quantity'],
            ]);
        }
        
        session()->forget('cart');
        
        return redirect()->route('user.orders.show', $order->id)->with('success', 'Order placed successfully! Welcome to Tribute Energy!');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use Illuminate\Http\Request;

class HeroSectionController extends Controller
{
    public function index()
    {
        $heroSections = HeroSection::orderBy('sort_order')->get();
        return view('admin.hero-sections.index', compact('heroSections'));
    }

    public function create()
    {
        return view('admin.hero-sections.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string',
            'button_text' => 'required|string|max:255',
            'button_link' => 'required|string|max:255',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video_url' => 'nullable|url|max:500',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        if ($request->hasFile('background_image')) {
            $image = $request->file('background_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/hero'), $imageName);
            $validated['background_image'] = 'uploads/hero/' . $imageName;
        }

        HeroSection::create($validated);

        return redirect()->route('admin.hero-sections.index')->with('success', 'Hero section created successfully.');
    }

    public function edit(HeroSection $heroSection)
    {
        return view('admin.hero-sections.edit', compact('heroSection'));
    }

    public function update(Request $request, HeroSection $heroSection)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string',
            'button_text' => 'required|string|max:255',
            'button_link' => 'required|string|max:255',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video_url' => 'nullable|url|max:500',
            'is_active' => 'boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);

        if ($request->hasFile('background_image')) {
            if ($heroSection->background_image && file_exists(public_path($heroSection->background_image))) {
                unlink(public_path($heroSection->background_image));
            }

            $image = $request->file('background_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/hero'), $imageName);
            $validated['background_image'] = 'uploads/hero/' . $imageName;
        }

        $heroSection->update($validated);

        return redirect()->route('admin.hero-sections.index')->with('success', 'Hero section updated successfully.');
    }

    public function destroy(HeroSection $heroSection)
    {
        if ($heroSection->background_image && file_exists(public_path($heroSection->background_image))) {
            unlink(public_path($heroSection->background_image));
        }

        $heroSection->delete();

        return redirect()->route('admin.hero-sections.index')->with('success', 'Hero section deleted successfully.');
    }
}

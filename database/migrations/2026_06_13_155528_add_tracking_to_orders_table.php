<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTrackingToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('tracking_number')->nullable()->after('payment_status');
            $table->timestamp('estimated_delivery')->nullable()->after('tracking_number');
            $table->timestamp('shipped_at')->nullable()->after('estimated_delivery');
            $table->timestamp('delivered_at')->nullable()->after('shipped_at');
            $table->string('carrier')->nullable()->after('delivered_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['tracking_number', 'estimated_delivery', 'shipped_at', 'delivered_at', 'carrier']);
        });
    }
}

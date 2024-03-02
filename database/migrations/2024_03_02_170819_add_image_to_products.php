<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('image')->nullable()->after('store_id');
            $table->text('compare_price')->nullable()->after('price');
            $table->json('options')->nullable()->after('store_id');
            $table->float('rating')->default(0)->after('store_id');
            $table->boolean('featured')->default(0)->after('store_id');
            $table->enum('status',['active','draft','archived'])->default('active')->after('store_id');
            $table->softDeletes();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->drop('image');
            $table->drop('compare_price');
            $table->drop('options');
            $table->drop('rating');
            $table->drop('featured');
            $table->drop('status');
            $table->dropSoftDeletes();
        });
    }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->unsignedBigInteger('category_id');
            $table->string('slug');
            $table->integer('review_id')->nullable();
            $table->string('product_name');
            $table->string('product_image')->nullable();
            $table->string('product_thumbnail')->nullable();
            $table->string('product_desc');
            $table->string('product_short_text');
            $table->integer('product_price');
            $table->integer('product_quantity');
            $table->string('color');
            $table->enum('status',['0','1'])->nullable()->default('1');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

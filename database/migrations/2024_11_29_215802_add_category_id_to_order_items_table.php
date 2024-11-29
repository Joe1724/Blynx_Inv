<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryIdToOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable()->after('product_id'); // Add category_id column
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade'); // Foreign key constraint
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_items', function (Blueprint $table) {
            $table->dropForeign(['category_id']); // Drop foreign key
            $table->dropColumn('category_id'); // Drop the column
        });
    }
}


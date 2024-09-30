<?php
// 2023_10_10_000000_add_details_to_carts_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailsToCartsTable extends Migration
{
    public function up()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
        });
    }

    public function down()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('image');
            $table->dropColumn('description');
        });
    }
}
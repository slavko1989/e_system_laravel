<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
        $table->string('name')->nullable();
        $table->string('email')->nullable();
        $table->string('address')->nullable();
        $table->string('phone')->nullable();
        $table->string('profile')->nullable();
        $table->string('title')->nullable();
        $table->string('text')->nullable();
        $table->integer('price')->nullable();
        $table->integer('new_price')->nullable();
        $table->integer('quantity')->nullable();




        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function($table) {
        $table->dropColumn('name');
        $table->dropColumn('email');
        $table->dropColumn('address');
        $table->dropColumn('phone');
        $table->dropColumn('profile');
        $table->dropColumn('title');
        $table->dropColumn('text');
        $table->dropColumn('price');
        $table->dropColumn('new_price');
        $table->dropColumn('quantity');
        });
    }
};

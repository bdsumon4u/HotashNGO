<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('menu-h.tables.prefix') . config('menu-h.tables.menus'), function (Blueprint $table) {
            $table->id();
            $table->string('name', 25);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('menu-h.tables.prefix') . config('menu-h.tables.menus'));
    }
}

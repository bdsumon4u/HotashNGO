<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $menus = config('menu-h.tables.prefix') . config('menu-h.tables.menus');
        $items = config('menu-h.tables.prefix') . config('menu-h.tables.items');
        Schema::create($items, function (Blueprint $table) use ($menus) {
            $table->id();
            $table->foreignId('menu_id')
                ->nullable()
                ->constrained($menus)
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('parent_id')
                ->nullable()
                ->constrained($table->getTable())
                ->onDelete('set null')
                ->onUpdate('cascade');
            $table->string('label');
            $table->string('link');
            $table->tinyInteger('weight')->default(1);
            $table->string('class')->nullable();
            $table->tinyInteger('depth')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('menu-h.tables.prefix') . config('menu-h.tables.items'));
    }
}

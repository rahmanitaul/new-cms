<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMenuAndSubmenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('icon', 50);
            $table->text('link')->nullable();
            $table->enum('dropdown', ['Ya', 'Tidak']);
            $table->enum('placement', ['Superadmin', 'Admin']);
            $table->timestamps();
        });

        Schema::create('submenu', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_id')->constrained('menu')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('title', 100);
            $table->text('link')->nullable();
            $table->enum('placement', ['Superadmin', 'Admin']);
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
        Schema::dropIfExists('menu');
        Schema::dropIfExists('submenu');
        
    }
}

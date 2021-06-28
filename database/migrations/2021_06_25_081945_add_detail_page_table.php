<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDetailPageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_page', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->constrained('page')->cascadeOnDelete()->cascadeOnUpdate();
            $table->json('meta')->nullable();
            $table->enum('type', ['Report', 'Form'])->after("meta");
            $table->string('method')->after('type');
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
        Schema::dropIfExists('detail_page');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrendingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trendings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('manga_id')->constrained('manga')->cascadeOnUpdate()->cascadeOnDelete();           
            $table->integer('urutan');
            $table->boolean('is_active');           
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
        Schema::dropIfExists('trendings');
    }
}

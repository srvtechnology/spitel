<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEngagementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('engagements', function (Blueprint $table) {
            $table->id();
            $table->string('bride_name')->nullable();
            $table->string('bride_qualification')->nullable();
            $table->string('bride_grandparents')->nullable();
            $table->string('bride_parents')->nullable();
            $table->string('bride_current_city')->nullable();
            $table->string('bride_native_city')->nullable();
            $table->string('bride_image_url')->nullable();
            $table->string('groom_name')->nullable();
            $table->string('groom_qualification')->nullable();
            $table->string('groom_grandparents')->nullable();
            $table->string('groom_parents')->nullable();
            $table->string('groom_current_city')->nullable();
            $table->string('groom_native_city')->nullable();
            $table->string('groom_image_url')->nullable();
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
        Schema::dropIfExists('engagements');
    }
}

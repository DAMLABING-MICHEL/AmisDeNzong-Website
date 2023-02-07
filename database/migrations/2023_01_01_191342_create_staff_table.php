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
        Schema::create('staff', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('lastName');
            $table->string('firstName');
            $table->string('gender');
            $table->string('phone');
            $table->string('email');
            $table->string('position');
            $table->text('description');
            $table->foreignId('feature_id')->constrained();
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
        Schema::dropIfExists('staff');
    }
};

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
        Schema::create('images', function (Blueprint $table) {
             $table->engine = 'InnoDB';
            $table->id();
            $table->string('title');
            $table->string('url');
            $table->foreignId('staff_id')->nullable(true)->constrained()->onDelete('cascade');
            $table->foreignId('rubric_id')->nullable(true)->constrained()->onDelete('cascade');
            $table->foreignId('post_id')->nullable(true)->constrained()->onDelete('cascade');
            $table->foreignId('news_id')->nullable(true)->constrained()->onDelete('cascade');
            $table->foreignId('event_id')->nullable(true)->constrained()->onDelete('cascade');
            $table->foreignId('testimonial_id')->nullable(true)->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('images');
    }
};

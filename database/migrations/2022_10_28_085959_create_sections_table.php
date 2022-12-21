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
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('parent')->nullable();
            $table->string('name', 50)->nullable();
            $table->string('slug', 50)->nullable();
            $table->char('priority', 2)->nullable();
            $table->string('image_cover')->nullable();
            $table->string('image_content')->nullable();
            $table->longText('description')->nullable();
            $table->char('menu', 1)->default('1');
            $table->char('status', 1)->default('1');
            $table->char('type', 1)->default('1');
            $table->string('url')->nullable();
            $table->string('target')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sections');
    }
};

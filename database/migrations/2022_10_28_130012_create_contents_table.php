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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date_publication')->nullable(); //datapublic
            $table->string('name')->nullable(); //titulo
            $table->string('slug')->nullable(); //titulo slug          
            $table->string('parent')->nullable();           
            $table->foreignId('section_id')
                ->references('id')
                ->on('sections')
                ->onDelete('cascade');
            $table->string('site_fold')->nullable(); //local
            $table->char('type', 1)->default('1');//tipo link
            $table->string('title_cover')->nullable(); //titulo capa
            $table->string('complement')->nullable(); //complemento
            $table->string('image_cover')->nullable(); //imgcapa
            $table->string('image_content')->nullable(); //imginterna
            $table->string('author')->nullable(); //author
            $table->string('link')->nullable(); //link
            $table->longText('description')->nullable(); //texto
            $table->longText('embed')->nullable(); //chamada
            $table->char('status', 1)->default('1');
            $table->char('priority', 2)->nullable();
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
        Schema::dropIfExists('contents');
    }
};

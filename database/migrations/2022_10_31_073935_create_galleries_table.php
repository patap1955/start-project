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
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string("path")->nullable();
            $table->string("img");
            $table->boolean("status_gallary")->default(false);
            $table->boolean("status_view")->default(true);
            $table->string("alt")->nullable();
            $table->bigInteger("page_id")->nullable();
            $table->bigInteger("category_id")->nullable();
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
        Schema::dropIfExists('galleries');
    }
};

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UrlsNew extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
      Schema::create('urls', function (Blueprint $table) {
          $table->increments('id');
          $table->string('mobile_url');
          $table->string('desktop_url');
          $table->string('short_url');
          $table->integer('mobile_clicks');
          $table->integer('desktop_clicks');
          $table->string(updated_at);
          $table->date(created_at);;
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

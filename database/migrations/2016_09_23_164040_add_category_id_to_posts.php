<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoryIdToPosts extends Migration
{

    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {

          $table->integer('category_id')->unsigned()->after('slug');

        });
    }

    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
          $table->dropColumn('category_id');
        });
    }
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->text('description')->nullable()->default(NULL);//nullable
            $table->string('title')->nullable()->default(NULL);
            $table->string('sub_title')->nullable()->default(NULL);
            $table->text('short_description')->nullable()->default(NULL);
            $table->text('second_description')->nullable()->default(NULL);
            $table->string('second_title')->nullable()->default(NULL);
            $table->text('second_short_description')->nullable()->default(NULL);
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableSubcategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subcategories', function (Blueprint $table) {
            $table->string('navigation_img')->after('slug')->nullable();
            $table->string('header_img')->after('navigation_img')->nullable();
            $table->text('description')->after('header_img')->nullable();
            $table->text('special_desc')->after('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subcategories', function (Blueprint $table) {
            $table->dropColumn('navigation_img');
            $table->dropColumn('header_img');
            $table->dropColumn('description');
            $table->dropColumn('special_desc');
        });
    }
}

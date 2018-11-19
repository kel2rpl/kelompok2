<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipsToProductsmakeupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productsmakeup', function (Blueprint $table) {
            $table->integer('category_id')->unsigned()->change();
            $table->foreign('category_id')->references('id')->on('categoriesmakeup')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
          Schema::table('productsmakeup', function (Blueprint $table) {
            $table->dropForeign('productsmakeup_category_id_foreign');
        });

        Schema::table('productsmakeup', function (Blueprint $table) {
            $table->dropIndex('productmakeup_category_id_foreign');
        });

        Schema::table('productsmakeup', function (Blueprint $table) {
            $table->integer('category_id')->change();
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRelationshipsToOrdermakeupDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('ordermakeup_details', function (Blueprint $table) {
            $table->integer('ordermakeup_id')->unsigned()->change();
            $table->foreign('ordermakeup_id')->references('id')->on('ordersmakeup')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('productmakeup_id')->unsigned()->change();
            $table->foreign('productmakeup_id')->references('id')->on('productsmakeup')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('ordermakeup_details', function (Blueprint $table) {
            $table->dropForeign('ordermakeup_details_ordermakeup_id_foreign');
        });

        Schema::table('ordersmakeup', function (Blueprint $table) {
            $table->dropIndex('ordermakeup_details_ordermakeup_id_foreign');
        });

        Schema::table('ordersmakeup', function (Blueprint $table) {
            $table->Integer('ordermakeup_id')->change();
        });

        Schema::table('ordersmakeup', function (Blueprint $table) {
            $table->dropForeign('ordermakeup_details_productmakeup_id_foreign');
        });

        Schema::table('ordersmakeup', function (Blueprint $table) {
            $table->dropIndex('ordermakeup_details_productmakeup_id_foreign');
        });

        Schema::table('ordersmakeup', function (Blueprint $table) {
            $table->Integer('productmakeup_id')->change();
        });
    }
}

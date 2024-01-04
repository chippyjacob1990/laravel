<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('code', 50)->after('id')->nullable(false)->comment("Unique code to identify product");
            $table->string('name')->after('code');
            $table->float('price', 10,2)->after('name')->nullable();
            $table->integer('quantity')->after('price');
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
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('code');
            $table->dropColumn('name');
            $table->dropColumn('price');
            $table->dropColumn('quantity');
            $table->dropSoftDeletes();
        });
    }
}

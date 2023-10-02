<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyers', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('negara_tujuan')->nullable();
            $table->integer('category_id');
            $table->string('no_buyer');
            $table->string('email');
            $table->string('nama_perusahaan');
            $table->string('alamat_perusahaan');
            $table->string('kebutuhan');
            $table->string('payment_terms');
            $table->longText('note');
            $table->string('product_interest')->nullable();
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
        Schema::dropIfExists('buyers');
    }
}

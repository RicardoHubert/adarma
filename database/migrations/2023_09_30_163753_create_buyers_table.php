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
            $tanle->string('nama_produk');
            $table->string('nama');
            $table->string('negara_tujuan')->nullable();
            $table->integer('category_id');
            $table->integer('dataentry_product_id');
            $table->string('no_buyer');
            $table->string('email');
            $table->string('nama_perusahaan');
            $table->string('alamat_perusahaan');
            $table->string('kebutuhan')->nullable();
            $table->string('payment_terms')->nullable();
            $table->string('shipping_terms')->nullable();
            $table->longText('note')->nullable();
            $table->string('product_interest')->nullable();
            $table->string('status_buyer')->nullable();
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

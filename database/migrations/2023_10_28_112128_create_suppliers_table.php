<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->string('nama_supplier');
            $table->string('no_supplier');
            $table->string('kota_supply');
            $table->string('alamat_supplier')->nullable();
            $table->string('email')->nullable();
            $table->string('requirment_word_file')->nullable();
            $table->string('tipe_supplier')->nullable();
            $table->string('price')->nullable();
            $table->string('unit')->nullable();
            $table->string('status_supplier')->nullable();
            $table->string('note')->nullable();
            // $table->integer('category_id');
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
    Schema::dropIfExists('suppliers');
    }
}

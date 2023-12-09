<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perbandingan_sub_kriteria', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kriteria_id');
            $table->unsignedBigInteger('sub_kriteria1_id');
            $table->unsignedBigInteger('sub_kriteria2_id');
            $table->enum('pemenang', ['sub_kriteria1', 'sub_kriteria2', 'sama'])->nullable();
            $table->unsignedBigInteger('skala_nilai_id')->nullable();
            $table->float('nilai', 5, 3);
            $table->timestamps();

            // Foreign Key Constraints
            $table->foreign('kriteria_id')->references('id')->on('kriteria')->onDelete('cascade');
            $table->foreign('sub_kriteria1_id')->references('id')->on('sub_kriteria')->onDelete('cascade');
            $table->foreign('sub_kriteria2_id')->references('id')->on('sub_kriteria')->onDelete('cascade');
            $table->foreign('skala_nilai_id')->references('id')->on('skala_nilai')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perbandingan_sub_kriteria');
    }
};

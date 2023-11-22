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
        Schema::create('perbandingan_kriteria', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kriteria1_id');
            $table->unsignedBigInteger('kriteria2_id');
            $table->enum('pemenang', ['kriteria1', 'kriteria2', 'sama'])->nullable();
            $table->unsignedBigInteger('skala_nilai_id')->nullable();
            $table->float('nilai', 5, 3);
            $table->timestamps();

            // Foreign Key Constraints
            $table->foreign('kriteria1_id')->references('id')->on('kriteria');
            $table->foreign('kriteria2_id')->references('id')->on('kriteria');
            $table->foreign('skala_nilai_id')->references('id')->on('skala_nilai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perbandingan_kriteria');
    }
};

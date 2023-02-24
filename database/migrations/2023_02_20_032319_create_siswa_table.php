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
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_siswa')->nullable();
            $table->unsignedBigInteger('id_kelas')->nullable();
            $table->unsignedBigInteger('id_jurusan')->nullable();
            $table->string('nama', 200);
            $table->string('nis', 15);
            $table->longText('alamat');
            $table->string('tmp_lahir', 100);
            $table->date('tgl_lahir');
            $table->enum('gender', ['Laki-laki', 'Perempuan']);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_siswa')->references('id')->on('users');
            $table->foreign('id_kelas')->references('id')->on('kelas');
            $table->foreign('id_jurusan')->references('id')->on('jurusan');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('siswa');
    }
};

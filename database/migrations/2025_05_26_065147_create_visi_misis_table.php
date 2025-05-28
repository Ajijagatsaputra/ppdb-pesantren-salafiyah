<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisiMisisTable extends Migration
{
    public function up()
    {
        Schema::create('visi_misis', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // 'visi' atau 'misi'
            $table->string('title');
            $table->string('image')->nullable(); // path gambar disimpan di storage
            $table->json('points'); // array poin-poin visi atau misi
            $table->boolean('is_active')->default(true); // untuk status aktif/nonaktif
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('visi_misis');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('menikah', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat')->nullable()->unique();            
            $table->string('pria');
            $table->string('wanita');
            $table->string('wali_pria');
            $table->string('wali_wanita');
            $table->date('tanggal');        
            $table->string('lokasi');
            $table->foreignId('nats')->nullable();
            $table->string('pendeta')->nullable();
            $table->string('guru_jemaat')->nullable();
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->softDeletes();
            $table->rememberToken();            
            $table->timestamps();
            $table->foreign('nats')->references('id')->on('alkitab');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menikah');
    }
};

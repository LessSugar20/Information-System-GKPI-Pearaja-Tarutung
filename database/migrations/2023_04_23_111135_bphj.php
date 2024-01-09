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
        Schema::create('bphj', function (Blueprint $table) {         
            $table->id();   
            $table->foreignId('id_jemaat');            
            $table->enum('jabatan', ['pendeta', 'guru_jemaat', 'sekretaris', 'bendahara']);
            $table->string('periode'); 
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('id_jemaat')->references('id')->on('user_jemaat');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bphj');
    }
};

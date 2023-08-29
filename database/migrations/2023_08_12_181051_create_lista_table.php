<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('lista', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->timestamp('criada_em');
            $table->timestamp('atualizada_em');
            $table->boolean('deletada');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lista');
    }
};

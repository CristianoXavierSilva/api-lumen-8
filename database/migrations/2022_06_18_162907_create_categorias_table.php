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
        Schema::create('tbl_categorias', function (Blueprint $table) {
            $table->id('id_categoria');
            $table->string('cat_titulo');
            $table->softDeletes('data_hora_cadastro');
            $table->softDeletes('data_hora_alteracao');
            $table->softDeletes('data_hora_exclusao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_categorias');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('alumnes', function (Blueprint $table) {
            // Renombrar columna y mantener la relación
            $table->renameColumn('master', 'master_id');
            
            // Opcional: Reforzar la clave foránea (si no estaba bien definida)
            $table->foreign('master_id')
                  ->references('identificador')
                  ->on('masters')
                  ->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::table('alumnes', function (Blueprint $table) {
            $table->dropForeign(['master_id']); // Eliminar FK primero
            $table->renameColumn('master_id', 'master');
        });
    }
};

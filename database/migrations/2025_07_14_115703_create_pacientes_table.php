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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            //datos personales
            $table->unsignedBigInteger('identificacion_tipo_id');
            $table->foreign('identificacion_tipo_id')->references('id')->on('identificacion_tipos');
            $table->string('identificacion_code')->unique();
            $table->string('nombre_primero');
            $table->string('nombre_segundo')->nullable();
            $table->string('apellido_primero');
            $table->string('apellido_segundo')->nullable();
            $table->enum('estado_civil',['soltero','union_libre','casado','separado','divorciado','viudo']);
            $table->enum('sexo',['hombre','mujer']);
            $table->string('telefono_fijo')->nullable();
            $table->string('telefono_celular')->nullable();
            $table->string('email')->nullable();
            //datos de nacimiento
            $table->unsignedBigInteger('nacionalidad_id');
            $table->foreign('nacionalidad_id')->references('id')->on('nacionalidads');
            $table->string('nacimiento_lugar')->nullable();
            $table->date('fecha_nacimiento');
            //residencia
            $table->unsignedBigInteger('pais_id');
            $table->foreign('pais_id')->references('id')->on('pais');
            $table->unsignedBigInteger('provincia_id');
            $table->foreign('provincia_id')->references('id')->on('provincias');
            $table->unsignedBigInteger('canton_id');
            $table->foreign('canton_id')->references('id')->on('cantons');
            $table->unsignedBigInteger('parroquia_id');
            $table->foreign('parroquia_id')->references('id')->on('parroquias');
            $table->string('sector');
            $table->string('calle_principal');
            $table->string('calle_secundaria')->nullable();
            $table->string('numero')->nullable();
            $table->string('referencia');
            //datos adicionales
            $table->unsignedBigInteger('etnico_grupo_id');
            $table->foreign('etnico_grupo_id')->references('id')->on('etnico_grupos');
            $table->unsignedBigInteger('indigena_nacionalidad_id')->nullable();
            $table->foreign('indigena_nacionalidad_id')->references('id')->on('indigena_nacionalidads');
            $table->unsignedBigInteger('indigena_pueblo_id')->nullable();
            $table->foreign('indigena_pueblo_id')->references('id')->on('indigena_pueblos');
            $table->unsignedBigInteger('educacion_nivel_id');
            $table->foreign('educacion_nivel_id')->references('id')->on('educacion_nivels');
            $table->unsignedBigInteger('educacion_estado_nivel_id');
            $table->foreign('educacion_estado_nivel_id')->references('id')->on('educacion_estado_nivels');
            $table->enum('empresa_tipo_trabajo',['publica','privada','ninguna']);
            $table->string('ocupacion_profesion');
            $table->string('empresa_nombre_trabajo');
            $table->unsignedBigInteger('salud_seguro_id');
            $table->foreign('salud_seguro_id')->references('id')->on('salud_seguros');
            $table->string('salud_seguro_secundario')->nullable();
            //$table->unsignedBigInteger('bono_solidario_id');
            //$table->foreign('bono_solidario_id')->references('id')->on('bono_solidarios');
            $table->enum('discapacidad',['si','no']);
            //Datos Contacto
            $table->string('contacto_referencia');
            $table->unsignedBigInteger('familiar_parentesco_id');
            $table->foreign('familiar_parentesco_id')->references('id')->on('familiar_parentescos');
            $table->string('telefono_contacto')->nullable();
            $table->string('direccion')->nullable();

            $table->text('observacion')->nullable();
            $table->boolean('estado')->default(true);

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};

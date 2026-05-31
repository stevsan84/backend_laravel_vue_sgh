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
        Schema::create('admision_pacientes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('atencion_id');
            $table->foreign('atencion_id')->references('id')->on('atencions');
            $table->unsignedBigInteger('atencion_formulario_id')->nullable();
            $table->foreign('atencion_formulario_id')->references('id')->on('atencion_formularios');
            $table->unsignedBigInteger('paciente_id');
            $table->foreign('paciente_id')->references('id')->on('pacientes');
            $table->unsignedBigInteger('preparacion_id')->nullable();
            $table->foreign('preparacion_id')->references('id')->on('preparacions');
            $table->unsignedBigInteger('area_salud_id');
            $table->foreign('area_salud_id')->references('id')->on('area_saluds');
            $table->datetime('fecha');

             //datos personales
            $table->string('identificacion_tipo_id');
            //$table->foreign('identificacion_tipo_id')->references('id')->on('identificacion_tipos');
            $table->string('identificacion_code');
            $table->string('nombre_primero');
            $table->string('nombre_segundo')->nullable();
            $table->string('apellido_primero');
            $table->string('apellido_segundo')->nullable();
            $table->string('estado_civil');
            $table->string('sexo');
            $table->string('telefono_fijo')->nullable();
            $table->string('telefono_celular')->nullable();
            $table->string('email')->nullable();
            //datos de nacimiento
            $table->string('nacionalidad_id');
            //$table->foreign('nacionalidad_id')->references('id')->on('nacionalidads');
            $table->string('nacimiento_lugar')->nullable();
            $table->date('fecha_nacimiento');
            //residencia
            $table->string('pais_id');
            //$table->foreign('pais_id')->references('id')->on('pais');
            $table->string('provincia_id');
            //$table->foreign('provincia_id')->references('id')->on('provincias');
            $table->string('canton_id');
            //$table->foreign('canton_id')->references('id')->on('cantons');
            $table->string('parroquia_id');
            //$table->foreign('parroquia_id')->references('id')->on('parroquias');
            $table->string('sector');
            $table->string('calle_principal');
            $table->string('calle_secundaria')->nullable();
            $table->string('numero')->nullable();
            $table->string('referencia');
            //datos adicionales
            $table->string('etnico_grupo_id');
            //$table->foreign('etnico_grupo_id')->references('id')->on('etnico_grupos');
            $table->string('indigena_nacionalidad_id')->nullable();
            //$table->foreign('indigena_nacionalidad_id')->references('id')->on('indigena_nacionalidads');
            $table->string('indigena_pueblo_id')->nullable();
            //$table->foreign('indigena_pueblo_id')->references('id')->on('indigena_pueblos');
            $table->string('educacion_nivel_id');
            //$table->foreign('educacion_nivel_id')->references('id')->on('educacion_nivels');
            $table->string('educacion_estado_nivel_id');
            //$table->foreign('educacion_estado_nivel_id')->references('id')->on('educacion_estado_nivels');
            $table->string('empresa_tipo_trabajo');
            $table->string('ocupacion_profesion');
            $table->string('empresa_nombre_trabajo');
            $table->string('salud_seguro_id');
            //$table->foreign('salud_seguro_id')->references('id')->on('salud_seguros');
            $table->string('salud_seguro_secundario')->nullable();
            $table->string('bono_solidario_id');
            //$table->foreign('bono_solidario_id')->references('id')->on('bono_solidarios');
            $table->string('discapacidad');
            //Datos Contacto
            $table->string('contacto_referencia');
            $table->string('familiar_parentesco_id');
            //$table->foreign('familiar_parentesco_id')->references('id')->on('familiar_parentescos');
            $table->string('telefono_contacto')->nullable();
            $table->string('direccion')->nullable();

            $table->enum('forma_llegada',['ambulatorio','ambulancia','otro transporte'])->nullable();
            $table->string('fuente_informacion')->nullable();
            $table->string('institucion_persona')->nullable();
            $table->string('telefono')->nullable();

            $table->unsignedBigInteger('cita_tipo_id')->nullable();
            $table->foreign('cita_tipo_id')->references('id')->on('cita_tipos');
            $table->unsignedBigInteger('cita_subtipo_id')->nullable();
            $table->foreign('cita_subtipo_id')->references('id')->on('cita_subtipos');

            $table->unsignedBigInteger('manchester_triage_id')->nullable();
            $table->foreign('manchester_triage_id')->references('id')->on('manchester_triages');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->boolean('estado')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admision_pacientes');
    }
};

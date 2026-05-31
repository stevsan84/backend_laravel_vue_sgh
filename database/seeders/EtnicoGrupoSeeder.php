<?php

namespace Database\Seeders;

use App\Models\EtnicoGrupo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EtnicoGrupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $etnicoGrupo = new EtnicoGrupo();
        $etnicoGrupo->nombre = 'No Sabe/No Responde';
        $etnicoGrupo->save();

        $etnicoGrupo = new EtnicoGrupo();
        $etnicoGrupo->nombre = 'Blanco/a';
        $etnicoGrupo->save();

        $etnicoGrupo = new EtnicoGrupo();
        $etnicoGrupo->nombre = 'Negro/a';
        $etnicoGrupo->save();

        $etnicoGrupo = new EtnicoGrupo();
        $etnicoGrupo->nombre = 'Indígena';
        $etnicoGrupo->save();

        $etnicoGrupo = new EtnicoGrupo();
        $etnicoGrupo->nombre = 'Mestizo/a';
        $etnicoGrupo->save();

        $etnicoGrupo = new EtnicoGrupo();
        $etnicoGrupo->nombre = 'Montubio/a';
        $etnicoGrupo->save();

        $etnicoGrupo = new EtnicoGrupo();
        $etnicoGrupo->nombre = 'Mulato/a';
        $etnicoGrupo->save();

        $etnicoGrupo = new EtnicoGrupo();
        $etnicoGrupo->nombre = 'Afroecuatoriano/Afrodescendiente';
        $etnicoGrupo->save();

        $etnicoGrupo = new EtnicoGrupo();
        $etnicoGrupo->nombre = 'Otro/a';
        $etnicoGrupo->save();
    }
}

<?php

namespace Database\Seeders;

use App\Models\FarmaceuticaEspecifica;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FarmaceuticaEspecificaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Tableta';
        $especifica->farmaceutica_general_id = 1;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Tableta recubierta';
        $especifica->farmaceutica_general_id = 1;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Tableta efervescente';
        $especifica->farmaceutica_general_id = 1;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Cápsula dura';
        $especifica->farmaceutica_general_id = 1;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Cápsula blanda';
        $especifica->farmaceutica_general_id = 1;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Gragea';
        $especifica->farmaceutica_general_id = 1;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Polvo';
        $especifica->farmaceutica_general_id = 1;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Granulado';
        $especifica->farmaceutica_general_id = 1;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Pastilla';
        $especifica->farmaceutica_general_id = 1;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Comprimido masticable';
        $especifica->farmaceutica_general_id = 1;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Crema';
        $especifica->farmaceutica_general_id = 2;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Pomada';
        $especifica->farmaceutica_general_id = 2;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Gel';
        $especifica->farmaceutica_general_id = 2;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Ungüento';
        $especifica->farmaceutica_general_id = 2;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Pasta';
        $especifica->farmaceutica_general_id = 2;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Jarabe';
        $especifica->farmaceutica_general_id = 3;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Solución';
        $especifica->farmaceutica_general_id = 3;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Suspensión';
        $especifica->farmaceutica_general_id = 3;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Emulsión';
        $especifica->farmaceutica_general_id = 3;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Elixir';
        $especifica->farmaceutica_general_id = 3;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Gotas';
        $especifica->farmaceutica_general_id = 3;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Colirio';
        $especifica->farmaceutica_general_id = 3;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Loción';
        $especifica->farmaceutica_general_id = 3;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Gases medicinales';
        $especifica->farmaceutica_general_id = 4;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Vapores anestésicos';
        $especifica->farmaceutica_general_id = 4;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Solución inyectable';
        $especifica->farmaceutica_general_id = 5;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Suspensión inyectable';
        $especifica->farmaceutica_general_id = 5;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Polvo para inyección';
        $especifica->farmaceutica_general_id = 5;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Polvo liofilizado';
        $especifica->farmaceutica_general_id = 5;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Ampolla';
        $especifica->farmaceutica_general_id = 5;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Vial';
        $especifica->farmaceutica_general_id = 5;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Prellenado (jeringa)';
        $especifica->farmaceutica_general_id = 5;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Crema';
        $especifica->farmaceutica_general_id = 6;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Pomada';
        $especifica->farmaceutica_general_id = 6;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Gel';
        $especifica->farmaceutica_general_id = 6;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Spray';
        $especifica->farmaceutica_general_id = 6;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Loción';
        $especifica->farmaceutica_general_id = 6;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Solución tópica';
        $especifica->farmaceutica_general_id = 6;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Gotas oftálmicas';
        $especifica->farmaceutica_general_id = 7;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Pomada oftálmica';
        $especifica->farmaceutica_general_id = 7;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Gel oftálmico';
        $especifica->farmaceutica_general_id = 7;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Gotas óticas';
        $especifica->farmaceutica_general_id = 8;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Spray ótico';
        $especifica->farmaceutica_general_id = 8;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Spray nasal';
        $especifica->farmaceutica_general_id = 9;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Gotas nasales';
        $especifica->farmaceutica_general_id = 9;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Gel nasal';
        $especifica->farmaceutica_general_id = 9;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Supositorio';
        $especifica->farmaceutica_general_id = 10;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Enema';
        $especifica->farmaceutica_general_id = 10;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Espuma rectal';
        $especifica->farmaceutica_general_id = 10;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Óvulo';
        $especifica->farmaceutica_general_id = 11;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Crema vaginal';
        $especifica->farmaceutica_general_id = 11;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Gel vaginal';
        $especifica->farmaceutica_general_id = 11;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Tableta vaginal';
        $especifica->farmaceutica_general_id = 11;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Aerosol';
        $especifica->farmaceutica_general_id = 12;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Inhalador presurizado';
        $especifica->farmaceutica_general_id = 12;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Polvo para inhalación';
        $especifica->farmaceutica_general_id = 12;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Solución para nebulización';
        $especifica->farmaceutica_general_id = 12;
        $especifica->save();

        $especifica = new FarmaceuticaEspecifica();
        $especifica->nombre = 'Parche transdérmico';
        $especifica->farmaceutica_general_id = 13;
        $especifica->save();
    }
}

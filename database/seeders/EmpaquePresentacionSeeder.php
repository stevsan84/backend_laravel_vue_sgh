<?php

namespace Database\Seeders;

use App\Models\EmpaquePresentacion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmpaquePresentacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $empaque = new EmpaquePresentacion();
        $empaque->nombre = 'Caja';
        $empaque->save();

        $empaque = new EmpaquePresentacion();
        $empaque->nombre = 'Blíster';
        $empaque->save();

        $empaque = new EmpaquePresentacion();
        $empaque->nombre = 'Frasco';
        $empaque->save();

        $empaque = new EmpaquePresentacion();
        $empaque->nombre = 'Ampolla';
        $empaque->save();

        $empaque = new EmpaquePresentacion();
        $empaque->nombre = 'Tubo';
        $empaque->save();

    }
}

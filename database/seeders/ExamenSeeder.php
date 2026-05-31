<?php

namespace Database\Seeders;

use App\Imports\ExamenImport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class ExamenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Excel::import(new ExamenImport, storage_path('app/examen.xlsx'));
    }
}

<?php

namespace Database\Seeders;

use App\Imports\Cie10Import;
use App\Models\Cie10;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class Cie10Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         Excel::import(new Cie10Import, storage_path('app/cie10_2018.xlsx'));
    }
}

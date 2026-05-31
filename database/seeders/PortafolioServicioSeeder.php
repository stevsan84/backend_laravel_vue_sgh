<?php

namespace Database\Seeders;

use App\Models\PortafolioServicio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PortafolioServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $servicePortfolio = new PortafolioServicio();
        $servicePortfolio->nombre = 'Gineco-Obstetricia';
        $servicePortfolio->save();

        $servicePortfolio = new PortafolioServicio();
        $servicePortfolio->nombre = 'Medicina Interna';
        $servicePortfolio->save();

        $servicePortfolio = new PortafolioServicio();
        $servicePortfolio->nombre = 'Pediatría';
        $servicePortfolio->save();

        $servicePortfolio = new PortafolioServicio();
        $servicePortfolio->nombre = 'Cirugía General';
        $servicePortfolio->save();

        $servicePortfolio = new PortafolioServicio();
        $servicePortfolio->nombre = 'Odontología';
        $servicePortfolio->save();

        $servicePortfolio = new PortafolioServicio();
        $servicePortfolio->nombre = 'Nutrición';
        $servicePortfolio->save();

        $servicePortfolio = new PortafolioServicio();
        $servicePortfolio->nombre = 'Medicina General';
        $servicePortfolio->save();
    }
}

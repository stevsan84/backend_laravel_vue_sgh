<?php

namespace Database\Seeders;

use App\Models\FamiliarParentesco;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FamiliarParentescoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $familiarParentesco = new FamiliarParentesco();
        $familiarParentesco->nombre = 'Jef/a del Núcleo';
        $familiarParentesco->save();
        

        $familiarParentesco = new FamiliarParentesco();
        $familiarParentesco->nombre = 'Esposo/a o Conviviente';
        $familiarParentesco->save();

        $familiarParentesco = new FamiliarParentesco();
        $familiarParentesco->nombre = 'Hijo/a';
        $familiarParentesco->save();

        $familiarParentesco = new FamiliarParentesco();
        $familiarParentesco->nombre = 'Hijastro/a';
        $familiarParentesco->save();

        $familiarParentesco = new FamiliarParentesco();
        $familiarParentesco->nombre = 'Padre o madre';
        $familiarParentesco->save();

        $familiarParentesco = new FamiliarParentesco();
        $familiarParentesco->nombre = 'Suegro/a';
        $familiarParentesco->save();

        $familiarParentesco = new FamiliarParentesco();
        $familiarParentesco->nombre = 'Yerno o nuera';
        $familiarParentesco->save();

        $familiarParentesco = new FamiliarParentesco();
        $familiarParentesco->nombre = 'Nieto/a';
        $familiarParentesco->save();

        $familiarParentesco = new FamiliarParentesco();
        $familiarParentesco->nombre = 'Hermano/a';
        $familiarParentesco->save();

        $familiarParentesco = new FamiliarParentesco();
        $familiarParentesco->nombre = 'Cuñado/a';
        $familiarParentesco->save();

        $familiarParentesco = new FamiliarParentesco();
        $familiarParentesco->nombre = 'No familiar';
        $familiarParentesco->save();

         $familiarParentesco = new FamiliarParentesco();
        $familiarParentesco->nombre = 'Otro familiar';
        $familiarParentesco->save();

         $familiarParentesco = new FamiliarParentesco();
        $familiarParentesco->nombre = 'Parentesco Desconocido, volver a consultar';
        $familiarParentesco->save();

         $familiarParentesco = new FamiliarParentesco();
        $familiarParentesco->nombre = 'Abuelo/a';
        $familiarParentesco->save();
        
         $familiarParentesco = new FamiliarParentesco();
        $familiarParentesco->nombre = 'Tío/a';
        $familiarParentesco->save();

        $familiarParentesco = new FamiliarParentesco();
        $familiarParentesco->nombre = 'Primo/a';
        $familiarParentesco->save();
    }
}

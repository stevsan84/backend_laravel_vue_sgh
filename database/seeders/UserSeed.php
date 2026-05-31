<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user1 = new User();
        $user1->name = "Admin";
        $user1->email = "admin@mail.com";
        $user1->password = bcrypt("admin54321");
        $user1->save();

        /*$rol = new Role();
        $rol->name = "Administrador";
        $rol->guard_name = "web";
        $rol->save();*/

    }
}

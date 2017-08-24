<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new \Spatie\Permission\Models\Role(['name'=>"Administrador"]);
            $user = \App\Entities\User::find(1);
            $user->assignRole($admin);

            $comentarista = new \Spatie\Permission\Models\Role(['name'=>"Comentarista"]);
        $user = \App\Entities\User::find(2);
        $user->assignRole($comentarista);
    }
}

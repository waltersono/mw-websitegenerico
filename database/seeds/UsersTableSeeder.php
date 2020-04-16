<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'admin';
        $user->email = 'admin@admin.com';
        $user->perfil = 'Administrador';
        $user->password = bcrypt('password');
        $user->save();

        $user = new User();
        $user->name = 'escritor';
        $user->email = 'escritor@escritor.com';
        $user->perfil = 'Escritor';
        $user->password = bcrypt('password');
        $user->save();
    }
}

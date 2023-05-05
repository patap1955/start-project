<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Михаил',
            'email' => 'slobodchikov1985@yandex.ru',
            'password' => bcrypt('nikita210610')
        ]);
//
        $user->assignRole(["admin"]);
        $user1 = User::create([
            'name' => 'Admin',
            'email' => 'Komfort.gkh@yandex.ru',
            'password' => bcrypt('alex@#gdk%skvn')
        ]);

        $user1->assignRole(["admin"]);
    }
}

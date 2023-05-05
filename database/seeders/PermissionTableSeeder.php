<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                "name" => "role-list",
                "title" => "Просмотр ролей"
            ],
            [
                "name" => "role-create",
                "title" => "Добавление ролей"
            ],
            [
                "name" => "role-edit",
                "title" => "Редактирование ролей"
            ],
            [
                "name" => "role-delete",
                "title" => "Удаление ролей"
            ],
            [
                "name" => "article-list",
                "title" => "Просмотр статей"
            ],
            [
                "name" => "article-create",
                "title" => "Добавление статей"
            ],
            [
                "name" => "article-edit",
                "title" => "Редактирование статей"
            ],
            [
                "name" => "article-delete",
                "title" => "Удаление статей"
            ]
        ];

        $roles = [
            [
                "name" => "admin",
                "title" => "Администратор"
            ],
            [
                "name" => "customer",
                "title" => "Пользователь"
            ],
            [
                "name" => "manager",
                "title" => "Менеджер"
            ],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Embalagem;
use App\Models\Entrega;
use App\Models\Estoque;
use App\Models\Producao;
use Database\Factories\EntregaFactory;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Matheus',
            'email' => 'm.sholl@hotmail.com',
            'password' => bcrypt('mat931216'),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Entregador',
            'email' => 'entrega@polen.com.br',
            'password' => bcrypt('mat931216'),
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Producao',
            'email' => 'producao@polen.com.br',
            'password' => bcrypt('mat931216'),
        ]);

        // crianco embalagens
        Embalagem::factory()->create(['descricao' => 'Pote 2L']);
        Embalagem::factory()->create(['descricao' => 'Pote 5L']);
        Embalagem::factory()->create(['descricao' => 'Caixa 5L']);

        // create permissions
        Permission::create(['name' => 'entregar']);
        Permission::create(['name' => 'produzir']);
        Permission::create(['name' => 'admin']);

        // create roles and assign created permissions
        $role = Role::create(['name' => 'entregador']);
        $role->givePermissionTo('entregar');

        $role = Role::create(['name' => 'producao']);
        $role->givePermissionTo('produzir');

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());

        Entrega::factory(22)->create();

        Producao::factory(10)->create();

        Estoque::factory(12)->create();

        $user = \App\Models\User::find(1);
        $user->assignRole('super-admin');

        $user = \App\Models\User::find(2);
        $user->assignRole('entregador');

        $user = \App\Models\User::find(3);
        $user->assignRole('producao');


    }
}

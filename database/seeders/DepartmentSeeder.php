<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear los departamentos básicos
        Department::create([
            'name' => 'Admin',
            'description' => 'Administración y gestión general'
        ]);

        Department::create([
            'name' => 'Marketing',
            'description' => 'Marketing, publicidad y comunicación'
        ]);

        Department::create([
            'name' => 'IT',
            'description' => 'Tecnología de la Información'
        ]);

        Department::create([
            'name' => 'RRHH',
            'description' => 'Recursos Humanos'
        ]);

        Department::create([
            'name' => 'Ventas',
            'description' => 'Ventas y atención al cliente'
        ]);

        Department::create([
            'name' => 'Finanzas',
            'description' => 'Finanzas y contabilidad'
        ]);

        Department::create([
            'name' => 'Operaciones',
            'description' => 'Operaciones y logística'
        ]);

        Department::create([
            'name' => 'Legal',
            'description' => 'Asuntos legales y cumplimiento'
        ]);
    }
}

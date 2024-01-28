<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tasks')->insert([
        	'title' => 'Diseño Web',
        	'description' => 'Diseño de las interfaces Web',
        	'completed' => true,
    	]);
        DB::table('tasks')->insert([
        	'title' => 'Diseño de base de datos',
        	'description' => 'Analisis y diseño del digrama entidad relación',
        	'completed' => true,
    	]);
        DB::table('tasks')->insert([
        	'title' => 'Implementación de la base de datos',
        	'description' => 'Instalación de la base de datos y esquema propuesto',
        	'completed' => true,
    	]);
    }
}

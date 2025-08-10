<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MoodEmotion;

class MoodEmotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Aquí se crearán los datos de los empleados
        //Primero creamos los arrays de datos

        $emotions= ['heureux', 'neutre', 'frustre', 'tendu', 'calme'];
        $departments= [
            'Admin'=> ['start' =>1, 'end' =>10, 'id' =>1],
            'Marketing'=> ['start' =>11, 'end' =>25, 'id' =>2],
            'IT'=> ['start' =>26, 'end' =>45, 'id' =>3],
            'RRHH'=> ['start' =>46, 'end' =>55, 'id' =>4],
            'Ventas'=> ['start' =>56, 'end' =>75, 'id' =>5],
            'Finanzas'=> ['start' =>76, 'end' =>85, 'id' =>6],
            'Operaciones'=> ['start' =>86, 'end' =>95, 'id' =>7],
            'Legal'=> ['start' =>96, 'end' =>100, 'id' =>8]
            
        ];

        //Ahora creamos los bucles para crear los datos de los empleados
        //Bucle externo para recorrer los departamentos
        foreach($departments as $dept){ //Recorremos los departamentos
            for($emp = $dept['start']; $emp <=$dept['end']; $emp++){ //Recorremos los empleados
                $employee_id = 'E' . str_pad($emp, 3, '0', STR_PAD_LEFT); //Generamos el ID del empleado
                echo " -Empleado: {$employee_id}\n";
                for($day =1; $day <=22; $day++){ //Recorremos los días
                    echo " Día {$day} - Empleado {$employee_id}\n";
                
                    //Generamos una emoción aleatoria
                    $randEmotion = $emotions[array_rand($emotions)];
                    //Generamos respuestas Sí/No (0/1) para las 3 preguntas
                    $answer1 = mt_rand(0,1); 
                    $answer2 = mt_rand(0,1);
                    $answer3 = mt_rand(0,1);
                    $date = now()->subDay(30 -$day); //Generamos la fecha

                    //Crear el registro en la base de datos
                    MoodEmotion::create([
                        'employee_id' => $employee_id,
                        'emotion' => $randEmotion,
                        'answer_1' => $answer1,
                        'answer_2' => $answer2,
                        'answer_3' => $answer3,
                        'department_id' => $dept['id'],
                        'diary_text' =>'',
                        'created_at' => $date,
                        'updated_at' => $date
                    ]);
                } //Fin del bucle de días
            } //Fin del bucle de empleados
        } //Fin del bucle de departamentos
        echo "Datos creados correctamente\n";
    } //Fin del método run
} 

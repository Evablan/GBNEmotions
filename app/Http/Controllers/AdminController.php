<?php

namespace App\Http\Controllers;

use App\Models\MoodEmotion;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Panel principal de administración
     * Muestra estadísticas generales y emociones más frecuentes
     */
    public function index(Request $request)
    {
        $selectDepartment = $request->get('department'); //Seleccionar el departamento
        //Definimos variables al inicio para que se puedan usar en la vista
        $emotionsToDisplay = collect(); //Colección para almacenar las emociones a mostrar

        if($selectDepartment){
           $totalMoodsInDepartment = MoodEmotion::where('department_id', $selectDepartment)->count(); //Seleccionar el departamento
           
           if($totalMoodsInDepartment >0){
            $moodEmotions = MoodEmotion::where('department_id', $selectDepartment)
            ->select(
                'emotion',
                DB::raw('COUNT(*) as count'),
                DB::raw('(COUNT(*) * 100.0 / ' . $totalMoodsInDepartment . ') as percentage') // <-- Agrega esto
            )
            ->groupBy('emotion')
            ->orderBy('count', 'desc')
            ->get();
            $emotionsToDisplay = $moodEmotions;
            }

        }else{
            $emotionsToDisplay = MoodEmotion::select(
                'emotion',
                DB::raw('COUNT(*) as count'),
                DB::raw('(COUNT(*) * 100.0 / (SELECT COUNT(*) FROM mood_emotions)) as percentage')
            )
            ->groupBy('emotion')
            ->orderBy('count', 'desc')
            ->get();
        }
        
        // ========================================
        // CONFIGURACIÓN DE CATEGORÍAS DE EMOCIONES
        // ========================================
        $emotions = ['heureux', 'neutre', 'frustre', 'tendu', 'calme'];
        $positiveEmotions = ['heureux', 'calme'];
        $negativeEmotions = ['frustre', 'tendu'];
        $neutralEmotions = ['neutre'];

        // ========================================
        // CÁLCULO DE TENDENCIA GENERAL
        // ========================================
        
        // Contar registros por categoría de emoción
        $positiveCount = MoodEmotion::whereIn('emotion', $positiveEmotions)->count();
        $negativeCount = MoodEmotion::whereIn('emotion', $negativeEmotions)->count();
        $neutralCount = MoodEmotion::whereIn('emotion', $neutralEmotions)->count();

        // Calcular porcentajes de cada categoría
        $totalCount = $positiveCount + $negativeCount + $neutralCount;
        $percentagePositive = ($positiveCount / $totalCount) * 100;
        $percentageNegative = ($negativeCount / $totalCount) * 100;
        $percentageNeutral = ($neutralCount / $totalCount) * 100;

      
       
        

        // ========================================
        // RETORNAR DATOS A LA VISTA
        // ========================================
        
        return view('admin.dashboard', [
            // ESTADÍSTICAS GENERALES DEL SISTEMA (Siempre visibles)
            'totalRecords' => $totalCount,
            'percentagePositive' => $percentagePositive,
            'percentageNegative' => $percentageNegative,
            'percentageNeutral' => $percentageNeutral,

            //DATOS PARA EL FILTRO POR DEPARTAMENTO
            'departments' => Department::all(),
            'selectedDepartment' => $selectDepartment,

            //DATOS DINÁMINOS (GENERAL O POR DEPARTAMENTO)
            'emotionsToDisplay' => $emotionsToDisplay,
            
            // DATOS ADICIONALES PARA GRÁFICOS
            'positiveCount' => $positiveCount,
            'negativeCount' => $negativeCount,
            'neutralCount' => $neutralCount,

            
            
            
        ]);

       
        
    }
}

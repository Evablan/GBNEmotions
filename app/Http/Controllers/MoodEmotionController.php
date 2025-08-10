<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ApiConsumerController;
use App\Models\MoodEmotion;
use Illuminate\Http\Request;

class MoodEmotionController extends Controller
{
    /**
     * Mostrar el formulario para un employee_id dado.
     */
    public function create($employee_id)
    {
        //Crear arrays con todas las traducciones de preguntas
        $translations = [
            'questions' => [
                'heureux' => [
                    'q1' => __('moods.questions.heureux.q1'),  // Laravel busca en el archivo de idioma
                    'q2' => __('moods.questions.heureux.q2'),
                    'q3' => __('moods.questions.heureux.q3'),
                ],
                'neutre' => [
                    'q1' => __('moods.questions.neutre.q1'),
                    'q2' => __('moods.questions.neutre.q2'),
                    'q3' => __('moods.questions.neutre.q3'),
                ],
                'frustre' => [
                    'q1' => __('moods.questions.frustre.q1'),
                    'q2' => __('moods.questions.frustre.q2'),
                    'q3' => __('moods.questions.frustre.q3'),
                ],
                'tendu' => [
                    'q1' => __('moods.questions.tendu.q1'),
                    'q2' => __('moods.questions.tendu.q2'),
                    'q3' => __('moods.questions.tendu.q3'),
                ],
                'calme' => [
                    'q1' => __('moods.questions.calme.q1'),
                    'q2' => __('moods.questions.calme.q2'),
                    'q3' => __('moods.questions.calme.q3'),
                ],
            ],
            // 🎯 Añadir mensajes motivacionales
            'motivational_messages' => [
                'heureux' => [
                    'title' => __('moods.motivational_messages.heureux.title'),
                    'message' => __('moods.motivational_messages.heureux.message'),
                ],
                'neutre' => [
                    'title' => __('moods.motivational_messages.neutre.title'),
                    'message' => __('moods.motivational_messages.neutre.message'),
                ],
                'frustre' => [
                    'title' => __('moods.motivational_messages.frustre.title'),
                    'message' => __('moods.motivational_messages.frustre.message'),
                ],
                'tendu' => [
                    'title' => __('moods.motivational_messages.tendu.title'),
                    'message' => __('moods.motivational_messages.tendu.message'),
                ],
                'calme' => [
                    'title' => __('moods.motivational_messages.calme.title'),
                    'message' => __('moods.motivational_messages.calme.message'),
                ],
            ]
        ];

        
        return view('moods.create', compact('employee_id', 'translations'));
    }

    /**
     * Validar y guardar la emoción para ese employee_id.
     */
    public function store(Request $request, $employee_id)
    {
        $data = $request->validate([
            'emotion'    => 'required|in:heureux,neutre,frustre,tendu,calme',
            'answer_1' => 'required|in:0,1',
            'answer_2' => 'required|in:0,1',
            'answer_3' => 'required|in:0,1',
            'diary_text' => 'nullable|string',

        ]);

        MoodEmotion::create([
            'employee_id' => $employee_id,
            'emotion'  => $data['emotion'],
            'answer_1' => $data['answer_1'],
            'answer_2' => $data['answer_2'],
            'answer_3' => $data['answer_3'],
            'diary_text'  => '',
        ]);

        return redirect()
            ->route('moods.create', ['employee_id' => $employee_id])
            ->with('success', "Encouragement {$employee_id}  enregistré avec succès, passez une bonne journée");
    }

    /**
     * Mostrar el listado de todas las emociones registradas.
     */
    public function index()
    {
        $mood_emotions = MoodEmotion::all();
        return view('mood.index', compact('mood_emotions'));
    }
}

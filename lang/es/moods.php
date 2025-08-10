<?php

return[
// Titulos y encabezados
    'title' => 'Registrar Humor',
    'header' => 'Registrar el ánimo del empleado :employee_id',
    'comment_te_sents' => '¿Cómo te sientes hoy?',
    //Emociones
    'emotions' => [
        'heureux' => '😊|Feliz',
        'neutre' => '😐|Neutral',
        'frustre' => '😤|Frustrado',
        'tendu' => '😰|Tenso',
        'calme' => '😌|Calmado',
    ],

    //Preguntas por emoción
    'repondre_questions' => 'Responde las siguientes preguntas',
   'questions' => [
        'heureux' => [
            'q1' => '¿Te has sentido motivado para empezar tu día?',
            'q2' => '¿Has tenido la sensación de que tus tareas tenían un objetivo claro?',
            'q3' => '¿Has tenido interacciones positivas con tus compañeros o responsables?',
        ],
        'neutre' => [
            'q1' => '¿Te ha costado mantenerte concentrado en tus tareas?',
            'q2' => '¿Has encontrado tu día monótono o sin desafíos?',
            'q3' => '¿Has evitado las interacciones con los demás hoy?',
        ],
        'frustre' => [
            'q1' => '¿Tienes la sensación de que tus esfuerzos no han sido apreciados hoy?',
            'q2' => '¿Te has sentido limitado en el cumplimiento de tus tareas?',
            'q3' => '¿Has experimentado cierta incomodidad con alguno de tus compañeros?',
        ],
        'tendu' => [
            'q1' => '¿Te has sentido contrariado por una situación?',
            'q2' => '¿Has sentido una presión excesiva o fuera de tu control?',
            'q3' => '¿Has tenido que reprimir tu descontento para evitar conflictos?',
        ],
        'calme' => [
            'q1' => '¿Tu ritmo de trabajo ha estado equilibrado hoy?',
            'q2' => '¿Has tenido la sensación de dominar tus tareas?',
            'q3' => '¿Has podido hacer pausas o descansar suficientemente?',
        ],
    ],
     // Botones
     'yes' => 'Sí',
     'no' => 'No',
     'submit' => 'Enviar',
     
     // Mensajes
     'success_message' => 'Ánimo del empleado :employee_id registrado exitosamente, que tengas un buen día',
    
    // 🎯 Mensajes motivacionales por emoción
    'motivational_messages' => [
        'heureux' => [
            'title' => '🌟 ¡Excelente!',
            'message' => '¡Tu energía positiva ilumina el día! ¡Sigue así!'
        ],
        'neutre' => [
            'title' => '🤔 Te entiendo',
            'message' => 'Cada día es una nueva oportunidad. Tómate tu tiempo.'
        ],
        'frustre' => [
            'title' => '💪 ¡Valentía!',
            'message' => 'Los desafíos nos hacen más fuertes. ¡Lo lograrás!'
        ],
        'tendu' => [
            'title' => '🧘 Respira',
            'message' => 'Tómate un momento para ti. Mereces tranquilidad.'
        ],
        'calme' => [
            'title' => '😌 Perfecto',
            'message' => 'Tu serenidad es inspiradora. Mantén esa paz interior.'
        ],
    ],
];

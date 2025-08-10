<?php

return [
    // Títulos y encabezados
    'title' => 'Register Mood',
    'header' => 'Register employee mood :employee_id',
    'comment_te_sents' => 'How do you feel today?',
    
    // Emociones
    'emotions' => [
        'heureux' => '😊|Happy',
        'neutre' => '😐|Neutral',
        'frustre' => '😤|Frustrated',
        'tendu' => '😰|Tense',
        'calme' => '😌|Calm',
    ],
    
    // Preguntas por emoción
    'repondre_questions' => 'Answer the following questions',
    'questions' => [
        'heureux' => [
            'q1' => 'Did you feel motivated to start your day?',
            'q2' => 'Did you feel that your tasks had a clear objective?',
            'q3' => 'Did you have positive interactions with your colleagues or supervisors?',
        ],
        'neutre' => [
            'q1' => 'Did you have trouble staying focused on your tasks?',
            'q2' => 'Did you find your day monotonous or without challenges?',
            'q3' => 'Did you avoid interactions with others today?',
        ],
        'frustre' => [
            'q1' => 'Do you feel that your efforts were not appreciated today?',
            'q2' => 'Did you feel limited in completing your tasks?',
            'q3' => 'Did you experience some discomfort with one of your colleagues?',
        ],
        'tendu' => [
            'q1' => 'Have you felt upset by a situation?',
            'q2' => 'Have you felt excessive pressure or pressure beyond your control?',
            'q3' => 'Have you had to suppress your discontent to avoid conflicts?',
        ],
        'calme' => [
            'q1' => 'Has your work rhythm been balanced today?',
            'q2' => 'Did you feel like you mastered your tasks?',
            'q3' => 'Were you able to take breaks or rest sufficiently?',
        ],
    ],
    
    // Botones
    'yes' => 'Yes',
    'no' => 'No',
    'submit' => 'Submit',
    
    // Mensajes
    'success_message' => 'Employee mood :employee_id recorded successfully, have a good day',
    
    // 🎯 Motivational messages by emotion
    'motivational_messages' => [
        'heureux' => [
            'title' => '🌟 Excellent!',
            'message' => 'Your positive energy brightens the day! Keep it up!'
        ],
        'neutre' => [
            'title' => '🤔 I understand',
            'message' => 'Every day is a new opportunity. Take your time.'
        ],
        'frustre' => [
            'title' => '💪 Courage!',
            'message' => 'Challenges make us stronger. You\'ll get through this!'
        ],
        'tendu' => [
            'title' => '🧘 Breathe',
            'message' => 'Take a moment for yourself. You deserve peace.'
        ],
        'calme' => [
            'title' => '😌 Perfect',
            'message' => 'Your serenity is inspiring. Keep that inner peace.'
        ],
    ],
];
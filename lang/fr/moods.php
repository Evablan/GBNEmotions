<?php

return [
    // Títulos y encabezados
    'title' => 'Enregistrer le Moral',
    'header' => 'Enregistrer le moral de l\'employé :employee_id',
    'comment_te_sents' => 'Comment vous sentez-vous aujourd\'hui?',     
    
    // Emociones
    'emotions' => [
        'heureux' => '😊|Heureux',
        'neutre' => '😐|Neutre',
        'frustre' => '😤|Frustré',
        'tendu' => '😰|Tendu',
        'calme' => '😌|Calme',
    ],
    
    // Preguntas por emoción
    'repondre_questions' => 'Répondez aux questions suivantes',
    'questions' => [
        'heureux' => [
            'q1' => 'Vous êtes-vous senti motivé pour commencer votre journée?',
            'q2' => 'Avez-vous eu le sentiment que vos tâches avaient un objectif clair ?',
            'q3' => 'Avez-vous eu des interactions positives avec vos collègues ou vos responsables?',
        ],
        'neutre' => [
            'q1' => 'Avez-vous eu du mal à rester concentré sur vos tâches?',
            'q2' => 'Avez-vous trouvé votre journée monotone ou sans défis?',
            'q3' => 'Avez-vous évité les interactions avec les autres aujourd\'hui?',
        ],
        'frustre' => [
            'q1' => 'Avez-vous le sentiment que vos efforts n\'ont pas été appréciés aujourd\'hui?',
            'q2' => 'Vous êtes-vous senti limité dans l\'accomplissement de vos tâches?',
            'q3' => 'Avez-vous éprouvé un certain malaise avec l\'un de vos collègues?',
        ],
        'tendu' => [
            'q1' => 'Vous êtes-vous déjà senti(e) contrarié(e) par une situation?',
            'q2' => 'Avez-vous déjà ressenti une pression excessive ou hors de votre contrôle?',
            'q3' => 'Avez-vous déjà dû réprimer votre mécontentement pour éviter les conflits?',
        ],
        'calme' => [
            'q1' => 'Ton rythme de travail a-t-il été équilibré aujourd\'hui?',
            'q2' => 'As-tu eu le sentiment de maîtriser tes tâches?',
            'q3' => 'As-tu pu faire des pauses ou te reposer suffisamment ?',
        ],
    ],
    
    // Botones
    'yes' => 'Oui',
    'no' => 'Non',
    'submit' => 'Envoyer',
    
    // Mensajes
    'success_message' => 'Encouragement :employee_id enregistré avec succès, passez une bonne journée',
    
    // 🎯 Mensajes motivacionales por emoción
    'motivational_messages' => [
        'heureux' => [
            'title' => '🌟 Excellent!',
            'message' => 'Votre énergie positive illumine la journée! Continuez comme ça!'
        ],
        'neutre' => [
            'title' => '🤔 Je comprends',
            'message' => 'Chaque jour est une nouvelle opportunité. Prenez votre temps.'
        ],
        'frustre' => [
            'title' => '💪 Courage!',
            'message' => 'Les défis nous rendent plus forts. Vous y arriverez!'
        ],
        'tendu' => [
            'title' => '🧘 Respirez',
            'message' => 'Prenez un moment pour vous. Vous méritez de la tranquillité.'
        ],
        'calme' => [
            'title' => '😌 Parfait',
            'message' => 'Votre sérénité est inspirante. Gardez cette paix intérieure.'
        ],
    ],
];
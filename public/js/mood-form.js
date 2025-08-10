document.addEventListener('DOMContentLoaded', () => {
    // Obtener éléments du DOM
    const emotionRadio = document.querySelectorAll('input[name="emotion"]');
    const questionsDiv = document.getElementById('questions');
    const form = document.querySelector('form');
    const step1 = document.getElementById('step-1');
    const step2 = document.getElementById('step-2');
    const greeting = document.getElementById('greeting');

    const q1 = document.getElementById('q1');
    const q2 = document.getElementById('q2');
    const q3 = document.getElementById('q3');

    // Utiliser les traductions du serveur
    const questionsParEmotion = window.translations.questions;
    const motivationalMessages = window.translations.motivational_messages;

    // Event listener pour chaque bouton radio d'émotion
    emotionRadio.forEach(radio => {
        radio.addEventListener('change', () => {
            const emotion = radio.value;  // Obtenir l'émotion sélectionnée
            const questions = questionsParEmotion[emotion];  // Obtenir les questions de cette émotion

            // 🎯 Remover efectos de selección anteriores
            document.querySelectorAll('.emoji-hover').forEach(emoji => {
                emoji.classList.remove('pulse-glow');
            });

            // 🎯 Añadir efecto de pulso al emoji seleccionado
            const selectedEmoji = radio.closest('label').querySelector('.emoji-hover');
            if (selectedEmoji) {
                selectedEmoji.classList.add('pulse-glow');
            }

            // Utiliser les traductions du serveur
            q1.textContent = questions.q1;  // Question 1 traduite
            q2.textContent = questions.q2;  // Question 2 traduite
            q3.textContent = questions.q3;  // Question 3 traduite

            // 🎨 Aplicar colores según la emoción seleccionada
            applyEmotionColors(emotion);

            // 🎯 Actualizar indicador de progreso
            updateProgress(2);

            // 💬 Mostrar mensaje motivacional
            showMotivationalMessage(emotion);

            // Afficher le conteneur de questions
            questionsDiv.classList.remove('hidden');
            questionsDiv.classList.add('animate-fade-in');

            // Scroll doux vers le bloc de questions
            questionsDiv.scrollIntoView({ behavior: 'smooth' });
        });
    });

    // 🎨 Función para aplicar colores según la emoción
    function applyEmotionColors(emotion) {
        // Remover clases de color anteriores
        questionsDiv.classList.remove(
            'emotion-heureux', 'emotion-neutre', 'emotion-frustre', 
            'emotion-tendu', 'emotion-calme'
        );
        
        // Añadir clase de color para la emoción actual
        questionsDiv.classList.add(`emotion-${emotion}`);
        
        // Cambiar el color del título de las preguntas
        const questionsTitle = questionsDiv.querySelector('p:first-child');
        if (questionsTitle) {
            questionsTitle.className = `text-lg font-semibold text-emotion-${emotion}`;
        }
    }

    // 🎯 Función para actualizar el progreso
    function updateProgress(step) {
        if (step === 1) {
            step1.className = 'w-8 h-8 bg-primary text-white rounded-full flex items-center justify-center font-semibold transition-all duration-300';
            step2.className = 'w-8 h-8 bg-gray-300 text-gray-500 rounded-full flex items-center justify-center font-semibold transition-all duration-300';
        } else if (step === 2) {
            step1.className = 'w-8 h-8 bg-green-500 text-white rounded-full flex items-center justify-center font-semibold transition-all duration-300';
            step2.className = 'w-8 h-8 bg-primary text-white rounded-full flex items-center justify-center font-semibold transition-all duration-300';
        }
    }

    // 💬 Función para mostrar mensaje motivacional
    function showMotivationalMessage(emotion) {
        if (motivationalMessages && motivationalMessages[emotion]) {
            const message = motivationalMessages[emotion];
            
            // Crear elemento de mensaje motivacional
            const motivationalDiv = document.createElement('div');
            motivationalDiv.className = 'bg-gradient-to-r from-emotion-' + emotion + '/10 to-emotion-' + emotion + '/5 border-l-4 border-emotion-' + emotion + ' p-4 rounded-lg mb-6 animate-fade-in';
            motivationalDiv.innerHTML = `
                <h3 class="font-bold text-lg text-emotion-${emotion} mb-2">${message.title}</h3>
                <p class="text-gray-700">${message.message}</p>
            `;
            
            // Insertar después del saludo
            const progressIndicator = document.querySelector('.flex.justify-center.mb-8');
            progressIndicator.parentNode.insertBefore(motivationalDiv, progressIndicator.nextSibling);
            
            // Remover mensaje anterior si existe
            const previousMessage = document.querySelector('.bg-gradient-to-r');
            if (previousMessage && previousMessage !== motivationalDiv) {
                previousMessage.remove();
            }
        }
    }

    // 🎉 Efecto de confeti al enviar el formulario
    form.addEventListener('submit', function(e) {
        // No prevenir el envío, solo añadir efecto visual
        createConfetti();
    });

    // 🎊 Función para crear confeti mejorado
    function createConfetti() {
        const colors = ['#FFD93D', '#30CFD0', '#A18CD1', '#FFB366', '#10B981'];
        const shapes = ['circle', 'square', 'triangle', 'star'];
        
        // Crear diferentes tipos de partículas
        for (let i = 0; i < 100; i++) {
            setTimeout(() => {
                const particle = document.createElement('div');
                const shape = shapes[Math.floor(Math.random() * shapes.length)];
                const color = colors[Math.floor(Math.random() * colors.length)];
                const size = Math.random() * 15 + 5;
                
                particle.style.position = 'fixed';
                particle.style.left = Math.random() * 100 + 'vw';
                particle.style.top = '-20px';
                particle.style.width = size + 'px';
                particle.style.height = size + 'px';
                particle.style.backgroundColor = color;
                particle.style.pointerEvents = 'none';
                particle.style.zIndex = '9999';
                particle.style.animation = `fall-${shape} ${Math.random() * 2 + 2}s linear forwards`;
                
                // Aplicar forma específica
                if (shape === 'circle') {
                    particle.style.borderRadius = '50%';
                } else if (shape === 'square') {
                    particle.style.borderRadius = '2px';
                } else if (shape === 'triangle') {
                    particle.style.width = '0';
                    particle.style.height = '0';
                    particle.style.backgroundColor = 'transparent';
                    particle.style.borderLeft = (size/2) + 'px solid transparent';
                    particle.style.borderRight = (size/2) + 'px solid transparent';
                    particle.style.borderBottom = size + 'px solid ' + color;
                } else if (shape === 'star') {
                    particle.innerHTML = '⭐';
                    particle.style.fontSize = size + 'px';
                    particle.style.backgroundColor = 'transparent';
                }
                
                document.body.appendChild(particle);
                
                // Remover partícula después de la animación
                setTimeout(() => {
                    if (particle.parentNode) {
                        particle.remove();
                    }
                }, 4000);
            }, i * 30);
        }
        
        // Efecto de sparkles adicionales
        createSparkles();
    }

    // ✨ Función para crear sparkles
    function createSparkles() {
        for (let i = 0; i < 20; i++) {
            setTimeout(() => {
                const sparkle = document.createElement('div');
                sparkle.innerHTML = '✨';
                sparkle.style.position = 'fixed';
                sparkle.style.left = Math.random() * 100 + 'vw';
                sparkle.style.top = Math.random() * 50 + 'vh';
                sparkle.style.fontSize = '20px';
                sparkle.style.pointerEvents = 'none';
                sparkle.style.zIndex = '9998';
                sparkle.style.animation = 'sparkle 2s ease-in-out forwards';
                
                document.body.appendChild(sparkle);
                
                setTimeout(() => {
                    if (sparkle.parentNode) {
                        sparkle.remove();
                    }
                }, 2000);
            }, i * 100);
        }
    }

    // 🎯 Navegación por teclado simplificada y funcional
    function handleEmotionKeydown(event, emotionValue) {
        const emotionLabels = document.querySelectorAll('label[role="button"]');
        const currentIndex = Array.from(emotionLabels).findIndex(label => 
            label === event.target
        );

        switch (event.key) {
            case 'ArrowRight':
                event.preventDefault();
                const nextIndex = (currentIndex + 1) % emotionLabels.length;
                emotionLabels[nextIndex].focus();
                break;
            case 'ArrowLeft':
                event.preventDefault();
                const prevIndex = currentIndex === 0 ? emotionLabels.length - 1 : currentIndex - 1;
                emotionLabels[prevIndex].focus();
                break;
            case 'Enter':
            case ' ':
                event.preventDefault();
                const radio = event.target.querySelector('input[type="radio"]');
                if (radio) {
                    radio.checked = true;
                    radio.dispatchEvent(new Event('change'));
                }
                break;
        }
    }

    // Hacer la función global para que funcione con onkeydown
    window.handleEmotionKeydown = handleEmotionKeydown;
});
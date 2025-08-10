import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: '#30CFD0',  // turquesa
                secondary: '#A18CD1',  // morado
                accent: '#FFB366',  // naranja
                // 🎨 NUEVA PALETA DE COLORES POR EMOCIÓN
                emotion: {
                    heureux: '#FFD93D',   // Amarillo feliz y energético
                    neutre: '#6B7280',    // Gris neutral y equilibrado
                    frustre: '#F59E0B',   // Naranja cálido pero frustrado
                    tendu: '#EF4444',     // Rojo intenso y tenso
                    calme: '#10B981',     // Verde sereno y calmado
                }
            },
        },
    },

    plugins: [forms],
};

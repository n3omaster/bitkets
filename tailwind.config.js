const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        screens: {
            sm: "575px",
            // => @media (min-width: 576px) { ... }

            md: "768px",
            // => @media (min-width: 768px) { ... }

            lg: "992px",
            // => @media (min-width: 992px) { ... }

            xl: "1140px",
            // => @media (min-width: 1140px) { ... }

            "2xl": "1320px",
            // => @media (min-width: 1320px) { ... }
        },
        container: {
            center: true,
            padding: "16px",
        },
        extend: {
            colors: {
                black: "#141420",
                "bg-color": "#2C2C39",
                stroke: "#4D4C5A",
                dark: "#1D2144",
                primary: "#5142FC",
                secondary: "#36B37E",
                yellow: "#FBB040",
                "body-color": "#A1A0AE",
                gradient:
                    "linear-gradient(158.44deg, #EBC77A 7.17%, #CA3F8D 52.72%, #5142FC 91.26%)",
            },
            boxShadow: {
                signUp: "0px 5px 10px rgba(4, 10, 34, 0.2)",
                image: "0px 3px 30px rgba(9, 14, 52, 0.1)",
                pricing: "0px 7px 35px rgba(180, 189, 223, 0.4)",
                input: "0px 11px 10px -6px rgba(0, 0, 0, 0.2)",
                sticky: "inset 0 -1px 0 0 rgba(0, 0, 0, 0.1)",
            },
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};

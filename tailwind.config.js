const defaultTheme = require("tailwindcss/defaultTheme");
const colors = require("tailwindcss/colors");

module.exports = {
    purge: [
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php"
    ],

    theme: {
        extend: {
            fontFamily: {
                poppins: ["Poppins, sans-serif"]
            },
            backgroundImage: theme => ({
                "pink-gradient":
                    "linear-gradient(180deg, #E5BAC8 64.84%, #ECC7D6 81.68%, #E6BCCD 89.64%);"
            }),
            colors: {
                pink: {
                    atas: "#E5B9CA",
                    bawah: "#E5BBCB"
                },
                gray: colors.trueGray
            }
        }
    },

    variants: {
        extend: {
            opacity: ["disabled"],
            borderRadius: ["hover", "focus"]
        }
    },

    plugins: [require("@tailwindcss/forms")]
};

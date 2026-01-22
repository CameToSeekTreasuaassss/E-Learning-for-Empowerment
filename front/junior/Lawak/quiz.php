<?php
// PHP session data injection
session_start();
$user_id = $_SESSION['user_id'] ?? 'GUEST_ID';
$user_name = $_SESSION['user_name'] ?? 'Guest';
$user_level_raw = $_SESSION['user_level'] ?? 'default';
?>
<!DOCTYPE html>
<html lang="tl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagsusulit: Lawak (Area Measurement)</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    // --- FONT FAMILY SET TO INTER (Final Choice) ---
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        // --- CHANGED TO SKY BLUE PALETTE ---
                        'primary': '#0284c7', /* Sky 600 */
                        'primary-light': '#e0f2f7', /* Sky 100 */
                        'success': '#0369a1', /* Sky 700 */ 
                        'error': '#ef4444',
                        'record-btn': '#3b82f6', 
                        'accent-light': '#f0f9ff', /* Sky 50 */
                    },
                    // Add custom width utility for 70%
                    width: {
                        '7/10': '70%',
                    }
                }
            }
        }
    </script>
    <style>
        /* --- FONT IMPORT SET TO INTER (Final Choice) --- */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap');
        
        /* General Styles for aesthetics and responsiveness */
        .card {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease-in-out;
        }
        
        /* Outline changed to Primary (Sky 600) */
        #quiz-card {
            border-left: 4px solid #0284c7; /* Primary/Sky 600 outline */
            border-right: 4px solid #0284c7; /* Primary/Sky 600 outline */
            border-radius: 1.5rem; 
        }

        .option-button {
            transition: all 0.2s;
            border: 2px solid;
            border-color: #d1d5db;
        }
        /* Hover state changed to light sky blue background with Sky border */
        .option-button:hover:not(.selected):not(.correct):not(.incorrect) {
            background-color: #f0f9ff; /* accent-light (Sky 50) */
            border-color: #7dd3fc; /* Sky 300 */
        }
        /* Selected state changed to light sky blue background with Primary Sky border */
        .selected {
            border-color: #0284c7 !important; /* Primary (Sky 600) */
            background-color: #f0f9ff; /* accent-light (Sky 50) */
            box-shadow: 0 0 0 1px #0284c7; /* Primary (Sky 600) */
        }
        /* Correct answer visual feedback changed to very light Sky background with Primary Sky border */
        .correct {
            background-color: #e0f8ff !important; /* Light Sky/Sky 100 equivalent */
            border-color: #0284c7 !important; /* Primary (Sky 600) */
            font-weight: 600;
        }
        .incorrect {
            background-color: #fee2e2 !important;
            border-color: #f87171 !important;
            font-weight: 600;
        }
        
        /* Style for the three separate cards (sections) */
        .quiz-section-card {
            background-color: #f7fcfb; 
            border: 2px solid #e0f2f7; /* Primary-light (Sky 100) border */
            border-radius: 1rem; 
            padding: 1.5rem;
            box-shadow: 0 4px 10px -2px rgba(0, 0, 0, 0.05);
            margin-bottom: 2rem; 
        }
        .quiz-section-card:last-of-type {
             margin-bottom: 0;
        }
        
        /* Style for the section title bar within the card (Lesson Sign) */
        .section-title {
            padding: 0.75rem 1rem;
            margin: -1.5rem -1.5rem 1.5rem -1.5rem; 
            background-color: #f0f9ff; /* accent-light background (Sky 50) */
            
            /* --- FINAL BORDER STYLING (Thin top and bottom outline with curved top) --- */
            border-bottom: 3px solid #0284c7; /* Primary (Sky 600) */
            border-top: 3px solid #0284c7; /* Primary (Sky 600) */
            border-top-left-radius: 0.75rem; 
            border-top-right-radius: 0.75rem; 
            border-bottom-left-radius: 0; 
            border-bottom-right-radius: 0; 

            color: #0284c7; /* Primary (Sky 600) */
            font-weight: 700;
            font-size: 1.5rem;
            text-align: center;
        }

        #custom-alert-box {
            position: fixed;
            top: 1rem;
            left: 50%;
            transform: translateX(-50%);
            z-index: 100;
            padding: 1rem 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            font-weight: 600;
            transition: opacity 0.3s ease-in-out;
        }
    </style>
</head>
<!-- Body background changed to light sky blue -->
<body class="bg-primary-light min-h-screen flex items-center justify-center py-8 font-sans">

    <!-- SET MAX-WIDTH TO CUSTOM VALUE (92rem, equivalent to 7.5xl-8xl) -->
    <div id="quiz-container" class="w-full p-4 sm:p-8" style="max-width: 92rem;">
        <header class="mb-8 relative">
            
            <!-- GO BACK BUTTON: Text "Go Back", size uniform at text-xl/w-6 h-6 -->
            <a href="http://localhost/als/front/test.php" class="absolute left-0 top-1/2 transform -translate-y-1/2 p-2 rounded-lg text-primary hover:bg-primary-light transition duration-150 flex items-center group text-xl">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 mr-1">
                    <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
                <span class="font-semibold" id="go-back-text">Go Back</span>
            </a>
            
            <div class="text-center">
                <h1 class="text-4xl font-extrabold text-primary mb-2" id="quiz-title">Pagsusulit: Lawak (Area Measurement)</h1>
                <p class="text-xl text-gray-600" id="quiz-subtitle">30 Items: Geometry, Yunits, at Problem Solving</p>
            </div>

            <!-- Language Selector -->
            <div class="flex justify-center space-x-4 mt-4 mb-8" id="language-selector">
                <button id="lang-tl" onclick="setLanguage('tl')"
                    class="px-4 py-2 font-semibold rounded-lg transition duration-150 shadow-sm
                    bg-primary text-white border-2 border-primary hover:opacity-90">
                    Tagalog
                </button>
                <button id="lang-en" onclick="setLanguage('en')"
                    class="px-4 py-2 font-semibold rounded-lg transition duration-150 shadow-sm
                    bg-gray-200 text-gray-700 border-2 border-gray-300 hover:bg-gray-300">
                    English
                </button>
            </div>
        </header>

        <div id="quiz-card" class="bg-white card rounded-xl p-6 sm:p-10">
            
            <!-- This container will hold the three individually rendered section cards -->
            <div id="quiz-content" class="space-y-12"> 
                <!-- JS will inject the three .quiz-section-card divs here -->
            </div>
            
            <!-- Centered container for the Submit button with 70% width and margin-top -->
            <div class="flex justify-center mt-16">
                <button onclick="submitQuiz()" id="submit-button"
                    class="w-7/10 py-4 bg-primary text-white font-extrabold text-lg rounded-xl shadow-lg hover:bg-success transition duration-300 transform hover:scale-[1.01] focus:outline-none focus:ring-4 focus:ring-primary-light">
                    Tapusin at Tingnan ang Resulta
                </button>
            </div>
        </div>

        <!-- Results Modal -->
        <div id="results-modal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-80 flex items-center justify-center p-4 z-50">
            <div class="bg-white card rounded-xl w-full max-w-md p-8 text-center shadow-2xl">
                <h2 class="text-3xl font-bold mb-4 text-primary" id="modal-title">Resulta ng Pagsusulit</h2>
                <p class="text-xl mb-6 text-gray-700" id="modal-score-text">Nakakuha ka ng:</p>
                <div class="text-6xl font-extrabold mb-6" id="score-display"></div>
                
                <p class="text-sm text-gray-500 mb-6" id="modal-review-text">Tingnan ang iyong mga sagot sa ibaba para matuto.</p>
                
                <div class="space-y-3">
                    <!-- UPDATED LINK TEXT and REMOVED redundant onclick, as saving is handled in submitQuiz() -->
                    <a href="http://localhost/als/front/records.php" id="record-button-link"
                       class="block w-full py-3 bg-record-btn text-white font-bold text-lg rounded-lg shadow-md hover:bg-blue-600 transition duration-300 focus:outline-none focus:ring-4 focus:ring-blue-300">
                        I-record ang Resulta at Pumunta sa Talaan
                    </a>
                    <button onclick="resetQuiz()" id="reset-button-modal"
                        class="w-full py-3 bg-primary text-white font-bold text-lg rounded-lg shadow-md hover:bg-success transition duration-300 focus:outline-none focus:ring-4 focus:ring-primary-light">
                        Subukan Muli
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <div id="custom-alert-box" class="hidden bg-red-100 text-error border border-red-400"></div>

    <script>
        // --- INJECT PHP VARIABLES ---
        const USER_ID = "<?php echo $user_id; ?>";
        const USER_NAME = "<?php echo $user_name; ?>";
        const USER_RAW_LEVEL = "<?php echo $user_level_raw; ?>";
        
        // --- GLOBAL KEY FOR ALL RECORDS (For overall.php) ---
        const GLOBAL_RECORDS_KEY = 'allQuizRecords';
        // --- USER-SPECIFIC KEY (For records.php) ---
        const USER_RECORDS_KEY = `quizRecords_${USER_ID}`;

        let currentLanguage = 'tl'; // Default language is Tagalog

        // --- UI Text Translations ---
        const uiText = {
            'quizTitle': { tl: "Pagsusulit: Lawak (Area Measurement)", en: "Quiz: Area Measurement" },
            'quizSubtitle': { tl: "30 Items: Geometry, Yunits, at Problem Solving", en: "30 Items: Geometry, Units, and Problem Solving" },
            'goBack': { tl: 'Bumalik', en: 'Go Back' },
            'section1Title': { tl: 'I. Aralin 1: Mga Yunit ng Lawak at Conversion', en: 'I. Lesson 1: Area Units and Conversion' },
            'section2Title': { tl: 'II. Aralin 2: Lawak ng Pantay na Pigura', en: 'II. Lesson 2: Area of Plane Figures' },
            'section3Title': { tl: 'III. Aralin 3: Lawak ng Solido at Word Problems', en: 'III. Lesson 3: Surface Area and Word Problems' },
            'submitButton': { tl: 'Tapusin at Tingnan ang Resulta', en: 'Finish and View Results' },
            'unansweredAlert': { tl: 'Kailangan mo pang sagutan ang', en: 'You still need to answer' },
            'unansweredAlertSuffix': { tl: 'na tanong bago mag-submit.', en: 'questions before submitting.' },
            'modalTitle': { tl: 'Resulta ng Pagsusulit', en: 'Quiz Results' },
            'modalScoreText': { tl: 'Nakakuha ka ng:', en: 'You scored:' },
            'modalReviewText': { tl: 'Tingnan ang iyong mga sagot sa ibaba para matuto.', en: 'Review your answers below to learn.' },
            'recordButton': { tl: 'I-record ang Resulta at Pumunta sa Talaan', en: 'Record Result and Go to Records' }, // UPDATED TEXT
            'resetButton': { tl: 'Subukan Muli', en: 'Try Again' },
        };
        
        // --- QUIZ DATA (30 Items Total) - UPDATED FOR TRANSLATION ---
        const quizData = [
            // Section I: Aralin 1 - Mga Yunit ng Lawak at Conversion (1-10)
            // Q1: Definition of Area (Aralin 1)
            { 
                question: { tl: "Ano ang kahulugan ng <b>Lawak (Area)</b>?", en: "What is the meaning of <b>Area</b>?" }, 
                options: { tl: ["Ang kabuuang haba ng gilid ng isang pigura (Perimeter).", "Ang bilang ng kuwadradong yunit na katumbas sa sukat ng isang kapatagan.", "Ang kapal at lalim ng isang pigura (Volume).", "Ang bilang ng mga gilid ng isang hugis."], en: ["The total length of the sides of a figure (Perimeter).", "The number of square units equal to the size of a plane surface.", "The thickness and depth of a figure (Volume).", "The number of sides of a shape."] }, 
                answer: 1, topic: 'Kahulugan at Konsepto' 
            },
            // Q2: Primary Metric Unit (Aralin 1)
            { 
                question: { tl: "Ano ang pangunahing batayan yunit ng <b>Lawak</b> sa sistemang metriko?", en: "What is the primary base unit of <b>Area</b> in the metric system?" }, 
                options: { tl: ["Metro (m)", "Metro Kuwadrado (m²)", "Kilometro (km)", "Hektarya (ha)"], en: ["Meter (m)", "Square Meter (m²)", "Kilometer (km)", "Hectare (ha)"] }, 
                answer: 1, topic: 'Metrikong Yunit' 
            },
            // Q3: Hectare (ha) in m² (Aralin 1)
            { 
                question: { tl: "Ang <b>1 hektarya (ha)</b> ay katumbas ng ilang metro kuwadrado (m²)?", en: "<b>1 hectare (ha)</b> is equivalent to how many square meters (m²)?" }, 
                options: { tl: ["100 m²", "1,000 m²", "10,000 m²", "100,000 m²"], en: ["100 m²", "1,000 m²", "10,000 m²", "100,000 m²"] }, 
                answer: 2, topic: 'Metrikong Yunit' 
            },
            // Q4: km² in ha (Aralin 1)
            { 
                question: { tl: "Ang <b>1 kilometro kuwadrado (km²)</b> ay katumbas ng ilang hektarya (ha)?", en: "<b>1 square kilometer (km²)</b> is equivalent to how many hectares (ha)?" }, 
                options: { tl: ["10 ha", "100 ha", "1,000 ha", "10,000 ha"], en: ["10 ha", "100 ha", "1,000 ha", "10,000 ha"] }, 
                answer: 1, topic: 'Metrikong Yunit' 
            },
            // Q5: Conversion: m² to cm² 
            { 
                question: { tl: "Ilang sentimetro kuwadrado (cm²) ang katumbas ng <b>1 metro kuwadrado (m²)</b>?", en: "How many square centimeters (cm²) is equivalent to <b>1 square meter (m²)</b>?" }, 
                options: { tl: ["100 cm²", "1,000 cm²", "10,000 cm²", "100,000 cm²"], en: ["100 cm²", "1,000 cm²", "10,000 cm²", "100,000 cm²"] }, 
                answer: 2, topic: 'Metrikong Yunit' 
            },
            // Q6: Appropriate unit for Shoe Box (Anu-ano A1)
            { 
                question: { tl: "Alin ang angkop na yunit ng <b>Lawak</b> para sa pagsukat ng lawak ng kahon ng sapatos?", en: "Which is the appropriate unit of <b>Area</b> for measuring the area of a shoe box?" }, 
                options: { tl: ["Hektarya (ha)", "Metro Kuwadrado (m²)", "Sentimetro Kuwadrado (cm²)", "Kilometro Kuwadrado (km²)"], en: ["Hectare (ha)", "Square Meter (m²)", "Square Centimeter (cm²)", "Square Kilometer (km²)"] }, 
                answer: 2, topic: 'Paggamit ng Yunit' 
            },
            // Q7: Conversion: 555 m² to ft² (Anu-ano C1 - Step 3)
            { 
                question: { tl: "Ilang kuwadrado talampakan (ft²) ang katumbas ng <b>555 metro kuwadrado (m²)</b>? (Gamitin: 1 m² ≈ 9 ft²)", en: "How many square feet (ft²) is equivalent to <b>555 square meters (m²)</b>? (Use: 1 m² ≈ 9 ft²)" }, 
                options: { tl: ["4,000 ft²", "4,995 ft²", "5,550 ft²", "5,994 ft²"], en: ["4,000 ft²", "4,995 ft²", "5,550 ft²", "5,994 ft²"] }, 
                answer: 1, topic: 'Unit Conversion' 
            }, // 555 * 9 = 4995
            // Q8: Land Area Conversion: 40,000 m² to ha (Aralin 1, B1)
            { 
                question: { tl: "Ang <b>40,000 m²</b> ay katumbas ng ilang hektarya (ha)? (Gamitin: 1 ha = 10,000 m²)", en: "<b>40,000 m²</b> is equivalent to how many hectares (ha)? (Use: 1 ha = 10,000 m²)" }, 
                options: { tl: ["0.4 ha", "4 ha", "40 ha", "400 ha"], en: ["0.4 ha", "4 ha", "40 ha", "400 ha"] }, 
                answer: 1, topic: 'Unit Conversion' 
            }, // 40000 / 10000 = 4 ha
            // Q9: Conversion: 1 ft² to in² (Aralin 1)
            { 
                question: { tl: "Ilang pulgada kuwadrado (in²) ang katumbas ng <b>1 talampakan kuwadrado (ft²)</b>?", en: "How many square inches (in²) is equivalent to <b>1 square foot (ft²)</b>?" }, 
                options: { tl: ["12 in²", "36 in²", "100 in²", "144 in²"], en: ["12 in²", "36 in²", "100 in²", "144 in²"] }, 
                answer: 3, topic: 'Ingles na Yunit' 
            },
            // Q10: Conversion: 10 m² to ft² (Aralin 1, B2)
            { 
                question: { tl: "Ilang kuwadrado talampakan (ft²) ang katumbas ng <b>10 metro kuwadrado (m²)</b>? (Gamitin: 1 m² ≈ 9 ft²)", en: "How many square feet (ft²) is equivalent to <b>10 square meters (m²)</b>? (Use: 1 m² ≈ 9 ft²)" }, 
                options: { tl: ["9 ft²", "10 ft²", "90 ft²", "100 ft²"], en: ["9 ft²", "10 ft²", "90 ft²", "100 ft²"] }, 
                answer: 2, topic: 'Unit Conversion' 
            }, // 10 * 9 = 90 ft²

            // Section II: Aralin 2 - Lawak ng Pantay na Pigura (11-20)
            // Q11: Formula for Square (Aralin 2)
            { 
                question: { tl: "Ano ang pormulasyon para sa <b>Lawak (Area)</b> ng isang Kuwadrado?", en: "What is the formula for the <b>Area</b> of a Square?" }, 
                options: { tl: ["A = l × w", "A = s × s", "A = \(\pi r^2\)", "A = (b × h) / 2"], en: ["A = l × w", "A = s × s", "A = \(\pi r^2\)", "A = (b × h) / 2"] }, 
                answer: 1, topic: 'Area Formula' 
            },
            // Q12: Formula for Rectangle (Aralin 2)
            { 
                question: { tl: "Ano ang pormulasyon para sa <b>Lawak (Area)</b> ng isang Rektanggulo?", en: "What is the formula for the <b>Area</b> of a Rectangle?" }, 
                options: { tl: ["A = l × w", "A = s × s", "A = \(\pi r^2\)", "A = (b × h) / 2"], en: ["A = l × w", "A = s × s", "A = \(\pi r^2\)", "A = (b × h) / 2"] }, 
                answer: 0, topic: 'Area Formula' 
            },
            // Q13: Formula for Triangle (Aralin 2)
            { 
                question: { tl: "Ano ang pormulasyon para sa <b>Lawak (Area)</b> ng isang Tatsulok?", en: "What is the formula for the <b>Area</b> of a Triangle?" }, 
                options: { tl: ["A = l × w", "A = s × s", "A = \(\pi r^2\)", "A = (b × h) / 2"], en: ["A = l × w", "A = s × s", "A = \(\pi r^2\)", "A = (b × h) / 2"] }, 
                answer: 3, topic: 'Area Formula' 
            },
            // Q14: Area of a Square (Example 1)
            { 
                question: { tl: "Kuwadrado ang hugis ng lupain. Kung ang isang panig (s) ay 600 m, ano ang <b>Lawak (Area)</b> nito sa m²?", en: "The land is square-shaped. If one side (s) is 600 m, what is its <b>Area</b> in m²?" }, 
                options: { tl: ["3,600 m²", "36,000 m²", "360,000 m²", "3,600,000 m²"], en: ["3,600 m²", "36,000 m²", "360,000 m²", "3,600,000 m²"] }, 
                answer: 2, topic: 'Area Calculation (Square)' 
            }, // 600 * 600 = 360000 m²
            // Q15: Area of a Rectangle (Example 2)
            { 
                question: { tl: "Rektanggulo ang hugis ng palayan. Kung ang haba (l) ay 4,000 m at luwang (w) ay 1,000 m, ano ang <b>Lawak (Area)</b> nito sa m²?", en: "The rice field is rectangular. If the length (l) is 4,000 m and width (w) is 1,000 m, what is its <b>Area</b> in m²?" }, 
                options: { tl: ["4,000 m²", "40,000 m²", "400,000 m²", "4,000,000 m²"], en: ["4,000 m²", "40,000 m²", "400,000 m²", "4,000,000 m²"] }, 
                answer: 3, topic: 'Area Calculation (Rectangle)' 
            }, // 4000 * 1000 = 4000000 m²
            // Q16: Area of a Triangle (Example 3)
            { 
                question: { tl: "Ang tatsulok na plywood ay may base (b) na 42 in at taas (h) na 56 in. Ano ang <b>Lawak (Area)</b> nito sa in²?", en: "The triangular plywood has a base (b) of 42 in and height (h) of 56 in. What is its <b>Area</b> in in²?" }, 
                options: { tl: ["1,176 in²", "2,352 in²", "2,500 in²", "4,704 in²"], en: ["1,176 in²", "2,352 in²", "2,500 in²", "4,704 in²"] }, 
                answer: 0, topic: 'Area Calculation (Triangle)' 
            }, // (42 * 56) / 2 = 1176 in²
            // Q17: Area of a Circle (Example 4)
            { 
                question: { tl: "Ano ang <b>Lawak (Area)</b> ng isang bilog na keyk na may radius (r) na 6 pulgada? (Gamitin: \(\pi \approx 3.14\))", en: "What is the <b>Area</b> of a round cake with a radius (r) of 6 inches? (Use: \(\pi \approx 3.14\))" }, 
                options: { tl: ["18.84 in²", "37.68 in²", "113.04 in²", "300.04 in²"], en: ["18.84 in²", "37.68 in²", "113.04 in²", "300.04 in²"] }, 
                answer: 2, topic: 'Area Calculation (Circle)' 
            }, // 3.14 * 6² = 113.04 in²
            // Q18: Lawak ng Kuwadrado sa m² (Aralin 2, B1)
            { 
                question: { tl: "Kuwadrado ang lawak ng lupa. Kung ang isang panig ay 9 m, ano ang <b>Lawak (Area)</b> nito sa m²?", en: "The land area is square. If one side is 9 m, what is its <b>Area</b> in m²?" }, 
                options: { tl: ["9 m²", "18 m²", "36 m²", "81 m²"], en: ["9 m²", "18 m²", "36 m²", "81 m²"] }, 
                answer: 3, topic: 'Area Calculation (Square)' 
            }, // 9 * 9 = 81 m²
            // Q19: Unit of measure for Rombuso (Aralin 2, B2)
            { 
                question: { tl: "Ang isang 'rhombus' (rombuso) ay isang uri ng:", en: "A 'rhombus' is a type of:" }, 
                options: { tl: ["Pantay na Pigura (Plane Figure)", "Solido (Solid)", "Di-pantay na Pigura (Irregular Figure)", "Linear na Pigura"], en: ["Plane Figure", "Solid", "Irregular Figure", "Linear Figure"] }, 
                answer: 0, topic: 'Figure Identification' 
            },
            // Q20: Total Area of Irregular Figure (Example 1)
            { 
                question: { tl: "Ang isang irregular na hugis ay binubuo ng Rektanggulo (160 m²) at Kuwadrado (49 m²). Ano ang <b>kabuuang Lawak (Area)</b> nito?", en: "An irregular shape is composed of a Rectangle (160 m²) and a Square (49 m²). What is its <b>total Area</b>?" }, 
                options: { tl: ["105 m²", "160 m²", "209 m²", "320 m²"], en: ["105 m²", "160 m²", "209 m²", "320 m²"] }, 
                answer: 2, topic: 'Area Calculation (Irregular)' 
            }, // 160 + 49 = 209 m²

            // Section III: Aralin 3 - Lawak ng Solido at Word Problems (21-30)
            // Q21: Formula for Surface Area of Cube (Aralin 2)
            { 
                question: { tl: "Ano ang pormulasyon para sa <b>Lawak ng Kapatagan (Surface Area, SA)</b> ng isang Kahon (Cube)?", en: "What is the formula for the <b>Surface Area (SA)</b> of a Cube?" }, 
                options: { tl: ["A = l × w × h", "SA = 4e²", "SA = 6e²", "SA = 2\(\pi r^2\)h"], en: ["A = l × w × h", "SA = 4e²", "SA = 6e²", "SA = 2\(\pi r^2\)h"] }, 
                answer: 2, topic: 'Surface Area Formula' 
            },
            // Q22: Surface Area of Cube Calculation (Aralin 2, D2)
            { 
                question: { tl: "Ano ang <b>Lawak ng Kapatagan (SA)</b> ng isang clay cube na may gilid (e) na 1 ft?", en: "What is the <b>Surface Area (SA)</b> of a clay cube with an edge (e) of 1 ft?" }, 
                options: { tl: ["1 ft²", "4 ft²", "6 ft²", "8 ft²"], en: ["1 ft²", "4 ft²", "6 ft²", "8 ft²"] }, 
                answer: 2, topic: 'Surface Area Calculation' 
            }, // 6 * 1² = 6 ft²
            // Q23: Land Area Requirement (Aralin 1, B1)
            { 
                question: { tl: "Nangangailangan ng 3 hektarya ng lupa para sa isang negosyo. Kung ang bahagi ng negosyante ay 1 ha, sapat ba ito?", en: "3 hectares of land are needed for a business. If the entrepreneur's portion is 1 ha, is it enough?" }, 
                options: { tl: ["Oo, sapat na.", "Hindi, kulang pa.", "Oo, dahil malaking sukat ang ha.", "Hindi, dahil 10,000 m² ang kailangan."], en: ["Yes, it is enough.", "No, it is not enough.", "Yes, because 'ha' is a large unit.", "No, because 10,000 m² is needed."] }, 
                answer: 1, topic: 'Problem Solving' 
            }, 
            // Q24: Tiles needed (Aralin 2, B1)
            { 
                question: { tl: "Ang kuwadradong silid ay may lawak na 36 m². Ang baldosa ay 144 in². Ilang baldosa ang kailangan? (Gamitin: 1 m² ≈ 9 ft²; 1 ft² = 144 in²)", en: "A square room has an area of 36 m². The tile is 144 in². How many tiles are needed? (Use: 1 m² ≈ 9 ft²; 1 ft² = 144 in²)" }, 
                options: { tl: ["324 baldosa", "360 baldosa", "46,656 baldosa", "3,240 baldosa"], en: ["324 tiles", "360 tiles", "46,656 tiles", "3,240 tiles"] }, 
                answer: 0, topic: 'Unit Conversion & Problem' 
            }, // 36m² = 324 ft². 1 tile = 1 ft². 324 tiles.
            // Q25: Surface Area of Rectangular Solid (Example 1)
            { 
                question: { tl: "Ang rektanggulong kahon ay 96 in (l), 24 in (w), at 12 in (h). Ano ang <b>Lawak ng Kapatagan (SA)</b> nito?", en: "The rectangular box is 96 in (l), 24 in (w), and 12 in (h). What is its <b>Surface Area (SA)</b>?" }, 
                options: { tl: ["3,744 in²", "7,488 in²", "7,500 in²", "10,000 in²"], en: ["3,744 in²", "7,488 in²", "7,500 in²", "10,000 in²"] }, 
                answer: 1, topic: 'Surface Area Calculation' 
            }, // 2 * ((24*12) + (12*96) + (96*24)) = 7488 in²
            // Q26: Total Rice Needed (Example 2)
            { 
                question: { tl: "Ang palayan ay 400 ha. Kung 10,000 palay ang itatanim bawat hektarya, ilang palay ang kailangan?", en: "The rice field is 400 ha. If 10,000 rice plants are needed per hectare, how many plants are required?" }, 
                options: { tl: ["40,000 palay", "400,000 palay", "4,000,000 palay", "40,000,000 palay"], en: ["40,000 plants", "400,000 plants", "4,000,000 plants", "40,000,000 plants"] }, 
                answer: 2, topic: 'Problem Solving' 
            }, // 400 * 10000 = 4,000,000
            // Q27: Total Area of Irregular Figure (Aralin 2, C2)
            { 
                question: { tl: "Ang isang palaisdaan ay nahati sa 2 rektanggulo: 100 m² at 150 m². Ano ang <b>kabuuang Lawak (Area)</b> nito?", en: "A fish pond is divided into 2 rectangles: 100 m² and 150 m². What is its <b>total Area</b>?" }, 
                options: { tl: ["100 m²", "150 m²", "200 m²", "250 m²"], en: ["100 m²", "150 m²", "200 m²", "250 m²"] }, 
                answer: 3, topic: 'Area Calculation (Irregular)' 
            }, // 100 + 150 = 250 m²
            // Q28: Land Area per person (Start of module)
            { 
                question: { tl: "Ang lupain ay 400 m x 250 m. Ilang m² ang lawak ng lupa na makukuha ng <b>bawat isa</b> sa 5 magkakapatid?", en: "The land is 400 m x 250 m. How many m² of land area will <b>each</b> of the 5 siblings get?" }, 
                options: { tl: ["10,000 m²", "20,000 m²", "50,000 m²", "100,000 m²"], en: ["10,000 m²", "20,000 m²", "50,000 m²", "100,000 m²"] }, 
                answer: 1, topic: 'Problem Solving' 
            }, // (400 * 250) / 5 = 100,000 / 5 = 20,000 m²
            // Q29: Formula for Surface Area of Cylinder (Aralin 2)
            { 
                question: { tl: "Ano ang pormulasyon para sa <b>Lawak ng Kapatagan (SA)</b> ng isang Sarado at Silindriko?", en: "What is the formula for the <b>Surface Area (SA)</b> of a Closed Cylinder?" }, 
                options: { tl: ["SA = 6e²", "SA = \(\pi r^2\)h", "2\(\pi r^2\) + 2\(\pi rh\)", "SA = 2(w×h)"], en: ["SA = 6e²", "SA = \(\pi r^2\)h", "2\(\pi r^2\) + 2\(\pi rh\)", "SA = 2(w×h)"] }, 
                answer: 2, topic: 'Surface Area Formula' 
            },
            // Q30: Calculation of Area for Irregular Figure (Aralin 2, B2)
            { 
                question: { tl: "Ang <b>Lawak ng Kuwadrado</b> ay 36 m². Ang isang baldosa ay 1 dm². Ilang baldosa ang kailangan? (Gamitin: 1 m² = 100 dm²)", en: "The <b>Area of the Square</b> is 36 m². One tile is 1 dm². How many tiles are needed? (Use: 1 m² = 100 dm²)" }, 
                options: { tl: ["360 baldosa", "3,600 baldosa", "36,000 baldosa", "360,000 baldosa"], en: ["360 tiles", "3,600 tiles", "36,000 tiles", "360,000 tiles"] }, 
                answer: 1, topic: 'Unit Conversion & Problem' 
            } // 36 m² * 100 dm²/m² = 3600 dm². 3600 dm² / 1 dm²/tile = 3600 tiles.
        ];

        let userAnswers = {}; // {qIndex: selectedOptionIndex}
        const quizName = "Pagsusulit: Lawak";
        const quizLevelRawId = "juniorhigh"; 
        const quizLevelDisplay = "Junior High"; 
        // Variable to hold the result temporarily before saving
        let currentQuizResult = null; 

        // --- DOM Elements ---
        const resultsModal = () => document.getElementById('results-modal');
        const submitButton = () => document.getElementById('submit-button');
        const scoreDisplay = () => document.getElementById('score-display');
        const customAlertBox = () => document.getElementById('custom-alert-box');
        const recordButtonLink = () => document.getElementById('record-button-link');
        const resetButtonModal = () => document.getElementById('reset-button-modal');


        /**
         * Nagpapakita ng custom, non-blocking alert message.
         * @param {string} message - Ang mensaheng ipapakita.
         * @param {string} type - 'error' or 'success'
         */
        function showAlert(message, type = 'error') {
            const alertBox = customAlertBox();
            alertBox.textContent = message;
            
            alertBox.classList.remove('hidden', 'bg-red-100', 'text-error', 'bg-primary-light', 'text-success');
            
            if (type === 'success') {
                alertBox.classList.add('bg-primary-light', 'text-success');
            } else {
                alertBox.classList.add('bg-red-100', 'text-error');
            }
            
            alertBox.style.opacity = '1';
            
            setTimeout(() => {
                alertBox.style.opacity = '0';
                setTimeout(() => {
                    alertBox.classList.add('hidden');
                }, 300);
            }, 4000);
        }
        
        /**
         * Renders the quiz questions into the single quiz-content container with three separate cards.
         */
        function renderQuiz() {
            const lang = currentLanguage;
            const quizContent = document.getElementById('quiz-content');
            
            // Separate strings for content that will go inside the section cards
            let section1Content = '';
            let section2Content = '';
            let section3Content = '';

            // Separate HTML for the header/title of each card
            const sectionTitles = [
                `<div class="section-title">${uiText.section1Title[lang]}</div>`,
                `<div class="section-title">${uiText.section2Title[lang]}</div>`,
                `<div class="section-title">${uiText.section3Title[lang]}</div>`
            ];
            
            quizData.forEach((q, index) => {
                let optionsHtml = '';
                // Use current language for options
                q.options[lang].forEach((option, oIndex) => {
                    // Check if this option was previously selected before re-rendering
                    const isSelected = userAnswers[index] === oIndex;
                    const selectedClass = isSelected ? 'selected' : '';

                    // Options buttons are text-aligned left, using text-lg for increased size
                    optionsHtml += `
                        <button 
                            class="option-button w-full text-left text-lg py-3 px-4 bg-white rounded-lg text-gray-700 hover:bg-gray-50 focus:outline-none ${selectedClass}"
                            onclick="selectAnswer(${index}, ${oIndex}, this)"
                            data-qindex="${index}" 
                            data-oindex="${oIndex}"
                        >
                            <span class="font-medium mr-2">${String.fromCharCode(65 + oIndex)}.</span> ${option}
                        </button>
                    `;
                });

                // Generate the question structure (Updated text size for better readability on wide screen)
                const questionHtml = `
                    <div class="mb-8 border-b pb-6 last:border-b-0 last:pb-0">
                        <h3 class="text-xl lg:text-2xl font-semibold text-gray-800 mb-4">
                            <span class="text-gray-700 bg-gray-200 px-2 py-0.5 rounded-full mr-3 font-bold">${index + 1}.</span> ${q.question[lang]}
                        </h3>
                        <div id="options-q${index}" class="grid grid-cols-1 sm:grid-cols-2 gap-y-4 gap-x-6">
                            ${optionsHtml}
                        </div>
                    </div>
                `;
                
                // Route question to the correct section (1-10, 11-20, 21-30)
                if (index < 10) {
                    section1Content += questionHtml;
                } else if (index < 20) {
                    section2Content += questionHtml;
                } else {
                    section3Content += questionHtml;
                }
            });

            // Assemble the final structure with the three separate cards 
            quizContent.innerHTML = `
                <div class="quiz-section-card" id="quiz-section-1">
                    ${sectionTitles[0]}
                    <div class="space-y-4 pt-4">${section1Content}</div>
                </div>
                <div class="quiz-section-card" id="quiz-section-2">
                    ${sectionTitles[1]}
                    <div class="space-y-4 pt-4">${section2Content}</div>
                </div>
                
                <div class="quiz-section-card" id="quiz-section-3">
                    ${sectionTitles[2]}
                    <div class="space-y-4 pt-4">${section3Content}</div>
                </div>
            `;
        }


        /**
         * Updates static UI elements based on the current language.
         */
        function updateStaticUI(lang) {
            document.getElementById('quiz-title').textContent = uiText.quizTitle[lang];
            document.getElementById('quiz-subtitle').textContent = uiText.quizSubtitle[lang];
            
            const goBackElement = document.querySelector('.absolute .font-semibold');
            if (goBackElement) {
                goBackElement.textContent = uiText.goBack[lang];
            }
            
            submitButton().textContent = uiText.submitButton[lang];
            
            // Modal elements
            document.getElementById('modal-title').textContent = uiText.modalTitle[lang];
            document.getElementById('modal-score-text').textContent = uiText.modalScoreText[lang];
            document.getElementById('modal-review-text').textContent = uiText.modalReviewText[lang];
            document.getElementById('record-button-link').textContent = uiText.recordButton[lang];
            document.querySelector('#results-modal button[onclick="resetQuiz()"]').textContent = uiText.resetButton[lang];
        }


        /**
         * Helper function to apply correct/incorrect coloring to buttons after submission or language switch.
         */
        function applyResultVisuals() {
             quizData.forEach((q, index) => {
                const selectedAnswer = userAnswers[index];
                const correctAnswer = q.answer;
                
                const optionsContainer = document.getElementById(`options-q${index}`);
                if (!optionsContainer) return; // Guard for re-rendering issues

                const optionButtons = optionsContainer.querySelectorAll('.option-button');

                optionButtons.forEach((btn, oIndex) => {
                    btn.disabled = true;
                    btn.classList.remove('selected', 'correct', 'incorrect');

                    if (oIndex === correctAnswer) {
                        btn.classList.add('correct');
                    }
                    
                    if (oIndex === selectedAnswer && oIndex !== correctAnswer) {
                        btn.classList.add('incorrect');
                    }
                });
            });
        }


        /**
         * Switches the language, updates UI, and re-renders the quiz.
         * @param {string} lang - 'tl' for Tagalog, 'en' for English.
         */
        function setLanguage(lang) {
            currentLanguage = lang;
            const tlButton = document.getElementById('lang-tl');
            const enButton = document.getElementById('lang-en');

            if (tlButton && enButton) {
                // Update button styles
                [tlButton, enButton].forEach(btn => {
                    const isActive = btn.id.includes(lang);
                    btn.classList.toggle('bg-primary', isActive);
                    btn.classList.toggle('text-white', isActive);
                    btn.classList.toggle('border-primary', isActive);
                    btn.classList.toggle('hover:opacity-90', isActive);
                    
                    btn.classList.toggle('bg-gray-200', !isActive);
                    btn.classList.toggle('text-gray-700', !isActive);
                    btn.classList.toggle('border-gray-300', !isActive);
                    btn.classList.toggle('hover:bg-gray-300', !isActive);
                });
            }

            // Update all static UI text
            updateStaticUI(lang);
            
            // Re-render quiz content with the new language
            renderQuiz();
            
            // If the quiz was already submitted, re-apply the results visuals
            if (submitButton().disabled) {
                applyResultVisuals();
            }
        }
        
        /**
         * Marks the selected answer and updates the userAnswers object.
         */
        function selectAnswer(qIndex, oIndex, button) {
            // Prevent selection change if quiz is submitted
            if (submitButton().disabled) return;

            const optionsContainer = document.getElementById(`options-q${qIndex}`);
            optionsContainer.querySelectorAll('.option-button').forEach(btn => {
                btn.classList.remove('selected');
            });

            button.classList.add('selected');
            userAnswers[qIndex] = oIndex;
        }

        /**
         * Explicitly saves the current quiz result to BOTH storage keys (GLOBAL and USER-SPECIFIC) with upsert logic.
         */
        function saveRecordToLocalStorage() {
             // Only proceed if a result is ready
             if (!currentQuizResult) {
                console.error("No quiz result to save.");
                return;
            }

            // 1. Enrich the current result with student metadata
            const recordToSave = {
                ...currentQuizResult,
                userId: USER_ID,             // Store User ID for unique filtering in records.php
                userName: USER_NAME,         // Student's name for global view
                userLevel: USER_RAW_LEVEL    // Student's raw level for both views
            };
            
            // --- 2. SAVE TO GLOBAL LOG (For overall.php) ---
            let globalRecords = JSON.parse(localStorage.getItem(GLOBAL_RECORDS_KEY) || '[]');
            globalRecords.push(recordToSave);
            localStorage.setItem(GLOBAL_RECORDS_KEY, JSON.stringify(globalRecords));
            
            // --- 3. SAVE TO USER-SPECIFIC LOG (For records.php) ---
            let userRecords = JSON.parse(localStorage.getItem(USER_RECORDS_KEY) || '[]');
            
            // Upsert logic: Remove any existing entry for this specific quiz (based on name and level)
            // Use quizName and quizLevelRawId for unique identification
            const quizKey = `${recordToSave.name}-${recordToSave.rawLevelId}`; 
            const existingIndex = userRecords.findIndex(r => `${r.name}-${r.rawLevelId}` === quizKey);

            if (existingIndex > -1) {
                // Update: Replace the old score for this quiz with the new score
                userRecords[existingIndex] = recordToSave;
            } else {
                // Insert: Add the new record
                userRecords.push(recordToSave);
            }
            
            localStorage.setItem(USER_RECORDS_KEY, JSON.stringify(userRecords));
            console.log("Quiz record saved globally and user-specifically:", recordToSave);
        }

        /**
         * Submits the quiz, calculates the score, and displays results.
         */
        function submitQuiz() {
            const lang = currentLanguage;
            const totalQuestions = quizData.length;
            const answeredCount = Object.keys(userAnswers).length;

            if (answeredCount < totalQuestions) {
                const remaining = totalQuestions - answeredCount;
                const message = `${uiText.unansweredAlert[lang]} ${remaining} ${uiText.unansweredAlertSuffix[lang]}`;
                showAlert(message);
                return;
            }

            let correctCount = 0;
            quizData.forEach((q, index) => {
                if (userAnswers[index] === q.answer) {
                    correctCount++;
                }
            });
            
            // Apply visual feedback based on answers
            applyResultVisuals();


            // --- 1. PREPARE THE RESULT OBJECT ---
            // Add both date and time (local) so records include submission time as requested
            const now = new Date();
            currentQuizResult = {
                name: quizName,
                rawLevelId: quizLevelRawId, 
                level: quizLevelDisplay, 
                score: `${correctCount}/${totalQuestions}`,
                percentage: Math.round((correctCount / totalQuestions) * 100),
                date: now.toLocaleDateString('en-US'),
                // Use 12-hour format with AM/PM (hour, minute, second) for the time field
                time: now.toLocaleTimeString('en-US', { hour: 'numeric', minute: '2-digit', second: '2-digit', hour12: true }),
                // optional combined timestamp in 12-hour format with AM/PM
                timestamp: now.toLocaleString('en-US', { hour: 'numeric', minute: '2-digit', second: '2-digit', hour12: true }),
            };
            
            // --- 2. IMMEDIATELY SAVE THE RESULT TO DUAL STORAGE ---
            saveRecordToLocalStorage();

            // --- 3. UI updates ---
            submitButton().disabled = true;
            submitButton().classList.add('opacity-50', 'cursor-not-allowed');

            scoreDisplay().innerHTML = `${correctCount} / ${totalQuestions}`;
            
            // Color feedback for score
            scoreDisplay().classList.remove('text-success', 'text-error');
            if (correctCount / totalQuestions >= 0.7) {
                scoreDisplay().classList.add('text-success');
            } else {
                scoreDisplay().classList.add('text-error');
            }

            resultsModal().classList.remove('hidden');
        }

        /**
         * Resets the quiz state and UI.
         */
        function resetQuiz() {
            userAnswers = {};
            currentQuizResult = null; // Clear temporary result
            resultsModal().classList.add('hidden');
            
            // Re-render the quiz to remove all correct/incorrect markings 
            // and re-enable buttons.
            renderQuiz();

            // Reset submit button state
            submitButton().disabled = false;
            submitButton().classList.remove('opacity-50', 'cursor-not-allowed');
        }

        // Initialize on load: set the initial language state and render the quiz
        window.onload = () => {
            // Initialize language button state, update static UI, and call renderQuiz()
            setLanguage(currentLanguage); 
        };
    </script>

</body>
</html>
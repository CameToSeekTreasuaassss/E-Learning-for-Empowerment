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
    <title>Pagsusulit: Measurement, Perimeter, and Circumference</title>
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
                <h1 class="text-4xl font-extrabold text-primary mb-2" id="quiz-title">Pagsusulit: Measurement, Perimeter, and Circumference</h1>
                <p class="text-xl text-gray-600" id="quiz-subtitle">30 Items: Sukat ng Haba, Palibot ng Polygons, at Bilog</p>
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
            'quizTitle': { tl: "Pagsusulit: Measurement, Perimeter, and Circumference", en: "Quiz: Measurement, Perimeter, and Circumference" },
            'quizSubtitle': { tl: "30 Items: Sukat ng Haba, Palibot ng Polygons, at Bilog", en: "30 Items: Length Measurement, Polygon Perimeter, and Circle Circumference" },
            'goBack': { tl: 'Bumalik', en: 'Go Back' },
            'section1Title': { tl: 'I. Aralin 1: Linear Measurements (Sukat ng Haba)', en: 'I. Lesson 1: Linear Measurements (Length Measurement)' },
            'section2Title': { tl: 'II. Aralin 2: Perimeter ng Polygons (Palibot ng Hugis)', en: 'II. Lesson 2: Perimeter of Polygons (Boundary of Shapes)' },
            'section3Title': { tl: 'III. Aralin 3: Circumference ng Bilog (Palibot ng Circle)', en: 'III. Lesson 3: Circumference of a Circle (Boundary of a Circle)' },
            'submitButton': { tl: 'Tapusin at Tingnan ang Resulta', en: 'Finish and View Results' },
            'unansweredAlert': { tl: 'Kailangan mo pang sagutan ang', en: 'You still need to answer' },
            'unansweredAlertSuffix': { tl: 'na tanong bago mag-submit.', en: 'questions before submitting.' },
            'modalTitle': { tl: 'Resulta ng Pagsusulit', en: 'Quiz Results' },
            'modalScoreText': { tl: 'Nakakuha ka ng:', en: 'You scored:' },
            'modalReviewText': { tl: 'Tingnan ang iyong mga sagot sa ibaba para matuto.', en: 'Review your answers below to learn.' },
            'recordButton': { tl: 'I-record ang Resulta at Pumunta sa Talaan', en: 'Record Result and Go to Records' },
            'resetButton': { tl: 'Subukan Muli', en: 'Try Again' },
        };
        
        // --- QUIZ DATA (30 Items Total) - UPDATED FOR TRANSLATION ---
        // Based on: Measurement Perimeter and Circumference.pdf (Lesson 1-3)
        
        const quizData = [
            // Section I: Lesson 1 - Linear Measurements (1-10)
            // Q1: Standard Metric Unit
            { question: { tl: "Alin ang base unit ng haba (length) sa metric system?", en: "Which is the base unit of length in the metric system?" }, options: { tl: ["Centimeter", "Kilometer", "Meter", "Decimeter"], en: ["Centimeter", "Kilometer", "Meter", "Decimeter"] }, answer: 2, topic: 'Linear Measurements: Metric System' },
            // Q2: Metric Conversion (km to m)
            { question: { tl: "Ilang meters (m) ang katumbas ng 2 kilometers (km)?", en: "How many meters (m) is equivalent to 2 kilometers (km)?" }, options: { tl: ["100 m", "200 m", "1,000 m", "2,000 m"], en: ["100 m", "200 m", "1,000 m", "2,000 m"] }, answer: 3, topic: 'Linear Measurements: Conversions' },
            // Q3: Metric Conversion (cm to m)
            { question: { tl: "Ang 200 centimeters (cm) ay katumbas ng ilang meters (m)?", en: "200 centimeters (cm) is equivalent to how many meters (m)?" }, options: { tl: ["0.2 m", "2 m", "10 m", "20 m"], en: ["0.2 m", "2 m", "10 m", "20 m"] }, answer: 1, topic: 'Linear Measurements: Conversions' },
            // Q4: Indigenous Units
            { question: { tl: "Ano ang tawag sa unit ng sukat na hindi wasto (not precise) dahil depende ito sa haba ng kamay o paa ng nagsusukat (hal. dangkal, dipa)?", en: "What is the term for a unit of measurement that is not precise because it depends on the length of the hand or foot of the person measuring (e.g., span, cubit)?" }, options: { tl: ["Metric Unit", "English Unit", "Indigenous Unit", "Standard Unit"], en: ["Metric Unit", "English Unit", "Indigenous Unit", "Standard Unit"] }, answer: 2, topic: 'Linear Measurements: Indigenous' },
            // Q5: Distance Estimation
            { question: { tl: "Ang municipal hall ay 500 m ang layo mula sa paaralan. Ano ang katumbas na distansya nito sa kilometers (km)?", en: "The municipal hall is 500 m away from the school. What is its equivalent distance in kilometers (km)?" }, options: { tl: ["0.05 km", "0.5 km", "5 km", "50 km"], en: ["0.05 km", "0.5 km", "5 km", "50 km"] }, answer: 1, topic: 'Linear Measurements: Conversions' },
            // Q6: Metric Conversion (dm to m)
            { question: { tl: "Ang 20 decimeters (dm) ay katumbas ng ilang meters (m)?", en: "20 decimeters (dm) is equivalent to how many meters (m)?" }, options: { tl: ["0.2 m", "2 m", "10 m", "20 m"], en: ["0.2 m", "2 m", "10 m", "20 m"] }, answer: 1, topic: 'Linear Measurements: Conversions' },
            // Q7: Kilometers use
            { question: { tl: "Alin ang karaniwang ginagamitan ng unit na kilometer (km)?", en: "Which is commonly measured using the unit kilometer (km)?" }, options: { tl: ["Pagsukat ng tela", "Pagsukat ng taas ng tao", "Pagsukat ng distansya", "Pagsukat ng maliliit na gamit"], en: ["Measuring cloth", "Measuring human height", "Measuring distance", "Measuring small items"] }, answer: 2, topic: 'Linear Measurements: Units' },
            // Q8: Relationship between cm and mm
            { question: { tl: "Ilang millimeters (mm) ang katumbas ng 1 centimeter (cm)?", en: "How many millimeters (mm) is equivalent to 1 centimeter (cm)?" }, options: { tl: ["10 mm", "100 mm", "1,000 mm", "10,000 mm"], en: ["10 mm", "100 mm", "1,000 mm", "10,000 mm"] }, answer: 0, topic: 'Linear Measurements: Conversions' },
            // Q9: Metric System characteristic
            { question: { tl: "Alin ang katangian ng Metric System na nagpapadali sa paggamit nito?", en: "Which characteristic of the Metric System makes it easy to use?" }, options: { tl: ["Gumagamit ng yards at feet.", "Ang mga unit ay nasa multiple ng 10.", "Gumagamit ng dangkal at dipa.", "Ang base unit ay pulgada (inch)."], en: ["It uses yards and feet.", "Units are in multiples of 10.", "It uses spans and cubits.", "The base unit is inch."], }, answer: 1, topic: 'Linear Measurements: Metric System' },
            // Q10: Total Length (cm to m)
            { question: { tl: "May 2 piraso ng tela si Dina: 90 cm at 60 cm. Ilang meters (m) ang kabuuang haba ng tela?", en: "Dina has 2 pieces of cloth: 90 cm and 60 cm. What is the total length of the cloth in meters (m)?" }, options: { tl: ["1.5 m", "15 m", "150 m", "1,500 m"], en: ["1.5 m", "15 m", "150 m", "1,500 m"] }, answer: 0, topic: 'Linear Measurements: Problem Solving' }, // (90+60)/100 = 1.5 m

            // Section II: Lesson 2 - Finding the Perimeter (11-20)
            // Q11: Perimeter Definition
            { question: { tl: "Ano ang tawag sa sukat ng palibot o ang suma ng mga sukat ng lahat ng gilid (sides) ng isang polygon?", en: "What is the term for the measurement of the boundary or the sum of the measurements of all sides of a polygon?" }, options: { tl: ["Area", "Circumference", "Perimeter", "Diameter"], en: ["Area", "Circumference", "Perimeter", "Diameter"] }, answer: 2, topic: 'Perimeter: Definition' },
            // Q12: Polygon Identification
            { question: { tl: "Ano ang tawag sa polygon na mayroong limang (5) gilid?", en: "What is the name of a polygon that has five (5) sides?" }, options: { tl: ["Hexagon", "Octagon", "Pentagon", "Heptagon"], en: ["Hexagon", "Octagon", "Pentagon", "Heptagon"] }, answer: 2, topic: 'Perimeter: Polygon Names' },
            // Q13: Formula for Perimeter of a Rectangle
            { question: { tl: "Alin ang pormula sa pagkuha ng Perimeter (P) ng isang Rektanggulo (Rectangle)?", en: "Which is the formula for calculating the Perimeter (P) of a Rectangle?" }, options: { tl: ["P = s + s + s", "P = l \u00d7 w", "P = l + w", "P = (l \u00d7 2) + (w \u00d7 2)"], en: ["P = s + s + s", "P = l \u00d7 w", "P = l + w", "P = (l \u00d7 2) + (w \u00d7 2)"] }, answer: 3, topic: 'Perimeter: Formulas' },
            // Q14: Formula for Perimeter of a Square
            { question: { tl: "Alin ang pormula sa pagkuha ng Perimeter (P) ng isang Kuwadrado (Square)?", en: "Which is the formula for calculating the Perimeter (P) of a Square?" }, options: { tl: ["P = s\u00b2", "P = 4s", "P = 2s", "P = s + 4"], en: ["P = s\u00b2", "P = 4s", "P = 2s", "P = s + 4"] }, answer: 1, topic: 'Perimeter: Formulas' },
            // Q15: Perimeter of Rectangle Calculation
            { question: { tl: "Ano ang Perimeter ng isang hardin na may sukat na 15 meters (l) at 12 meters (w)?", en: "What is the Perimeter of a garden measuring 15 meters (l) and 12 meters (w)?" }, options: { tl: ["27 m", "54 m", "90 m", "180 m"], en: ["27 m", "54 m", "90 m", "180 m"] }, answer: 1, topic: 'Perimeter: Calculation (Rectangle)' }, // 2(15)+2(12) = 30+24 = 54m
            // Q16: Perimeter of Square Calculation
            { question: { tl: "Kung ang isang gilid (s) ng isang kuwadradong lote ay 25 meters, ano ang Perimeter nito?", en: "If one side (s) of a square lot is 25 meters, what is its Perimeter?" }, options: { tl: ["25 m", "50 m", "100 m", "625 m"], en: ["25 m", "50 m", "100 m", "625 m"] }, answer: 2, topic: 'Perimeter: Calculation (Square)' }, // 4 * 25 = 100m
            // Q17: Perimeter of Polygon Calculation
            { question: { tl: "Ang isang pentagonal na palayan ay may gilid na 205m, 115m, 153m, 187m, at 165m. Ano ang kabuuang Perimeter?", en: "A pentagonal rice field has sides measuring 205m, 115m, 153m, 187m, and 165m. What is the total Perimeter?" }, options: { tl: ["800 m", "825 m", "850 m", "880 m"], en: ["800 m", "825 m", "850 m", "880 m"] }, answer: 1, topic: 'Perimeter: Calculation (Polygon)' }, // 205+115+153+187+165 = 825m
            // Q18: Word Problem (Fencing)
            { question: { tl: "Ilang meters ng wire ang kailangan para bakuran ang isang rektanggulong lote na 24 meters wide at 28 meters long?", en: "How many meters of wire are needed to fence a rectangular lot that is 24 meters wide and 28 meters long?" }, options: { tl: ["52 m", "56 m", "104 m", "672 m"], en: ["52 m", "56 m", "104 m", "672 m"] }, answer: 2, topic: 'Perimeter: Word Problem' }, // 2(28)+2(24) = 56+48 = 104m
            // Q19: Perimeter of Triangle
            { question: { tl: "Ano ang Perimeter ng isang equilateral triangle na may sukat na 5 cm bawat gilid?", en: "What is the Perimeter of an equilateral triangle with sides measuring 5 cm each?" }, options: { tl: ["10 cm", "12 cm", "15 cm", "20 cm"], en: ["10 cm", "12 cm", "15 cm", "20 cm"] }, answer: 2, topic: 'Perimeter: Calculation (Triangle)' }, // 5+5+5 = 15cm
            // Q20: Perimeter (Comparing Lots)
            { question: { tl: "Lot A (18m x 12m) vs. Lot B (19m x 11m). Alin ang mangangailangan ng mas mahabang wire para bakuran?", en: "Lot A (18m x 12m) vs. Lot B (19m x 11m). Which one will require a longer wire for fencing?" }, options: { tl: ["Lot A", "Lot B", "Pareho lang", "Hindi matukoy"], en: ["Lot A", "Lot B", "Both are the same", "Cannot be determined"] }, answer: 2, topic: 'Perimeter: Comparison' }, // Both are 60m

            // Section III: Lesson 3 - Finding the Circumference (21-30)
            // Q21: Circumference Definition
            { question: { tl: "Ano ang tawag sa sukat ng boundary line o palibot ng isang Bilog (Circle)?", en: "What is the term for the measurement of the boundary line or perimeter of a Circle?" }, options: { tl: ["Perimeter", "Radius", "Diameter", "Circumference"], en: ["Perimeter", "Radius", "Diameter", "Circumference"] }, answer: 3, topic: 'Circumference: Definition' },
            // Q22: Diameter Definition
            { question: { tl: "Ano ang tawag sa tuwid na linya na dumadaan sa gitna (center) ng bilog?", en: "What is the term for the straight line that passes through the center of the circle?" }, options: { tl: ["Radius", "Circumference", "Pi", "Diameter"], en: ["Radius", "Circumference", "Pi", "Diameter"] }, answer: 3, topic: 'Circumference: Terminologies' },
            // Q23: Radius Definition
            { question: { tl: "Ang sukat ng Radius (r) ay katumbas ng ano?", en: "The measurement of the Radius (r) is equivalent to what?" }, options: { tl: ["Kalahati ng Circumference", "Kalahati ng Pi", "Kalahati ng Diameter", "Katumbas ng Diameter"], en: ["Half of the Circumference", "Half of Pi", "Half of the Diameter", "Equivalent to the Diameter"] }, answer: 2, topic: 'Circumference: Terminologies' },
            // Q24: Pi (\u03c0) Value
            { question: { tl: "Ano ang approximate constant mathematical value ng Pi (p) na ginagamit sa pagkuha ng circumference?", en: "What is the approximate constant mathematical value of Pi (p) used in calculating the circumference?" }, options: { tl: ["1.414", "2.718", "3.14", "4.0"], en: ["1.414", "2.718", "3.14", "4.0"] }, answer: 2, topic: 'Circumference: Formula Constants' },
            // Q25: Circumference Formula (using Diameter)
            { question: { tl: "Alin ang pormula sa pagkuha ng Circumference (C) gamit ang Diameter (d)?", en: "Which is the formula for calculating the Circumference (C) using the Diameter (d)?" }, options: { tl: ["C = 2d", "C = \u03c0d", "C = 2\u03c0r", "C = d/2"], en: ["C = 2d", "C = \u03c0d", "C = 2\u03c0r", "C = d/2"] }, answer: 1, topic: 'Circumference: Formulas' },
            // Q26: Circumference Formula (using Radius)
            { question: { tl: "Alin ang pormula sa pagkuha ng Circumference (C) gamit ang Radius (r)?", en: "Which is the formula for calculating the Circumference (C) using the Radius (r)?" }, options: { tl: ["C = \u03c0r\u00b2", "C = \u03c0r", "C = 2\u03c0r", "C = \u03c0r/2"], en: ["C = \u03c0r\u00b2", "C = \u03c0r", "C = 2\u03c0r", "C = \u03c0r/2"] }, answer: 2, topic: 'Circumference: Formulas' },
            // Q27: Circumference Calculation (using Diameter)
            { question: { tl: "Ano ang Circumference ng isang bilog na may Diameter na 5 cm? (Gamitin: \u03c0 = 3.14)", en: "What is the Circumference of a circle with a Diameter of 5 cm? (Use: \u03c0 = 3.14)" }, options: { tl: ["15.70 cm", "18.84 cm", "25.12 cm", "31.40 cm"], en: ["15.70 cm", "18.84 cm", "25.12 cm", "31.40 cm"] }, answer: 0, topic: 'Circumference: Calculation' }, // 3.14 * 5 = 15.70 cm
            // Q28: Circumference Calculation (using Radius)
            { question: { tl: "Ano ang Circumference ng isang circular plate na may Radius na 6 inches? (Gamitin: \u03c0 = 3.14)", en: "What is the Circumference of a circular plate with a Radius of 6 inches? (Use: \u03c0 = 3.14)" }, options: { tl: ["18.84 in", "37.68 in", "50.24 in", "113.04 in"], en: ["18.84 in", "37.68 in", "50.24 in", "113.04 in"] }, answer: 1, topic: 'Circumference: Calculation' }, // 2 * 3.14 * 6 = 37.68 in
            // Q29: Circumference Word Problem (Tire)
            { question: { tl: "Ang gulong ng bisikleta ay may Radius na 20 cm. Ano ang Circumference ng gulong? (Gamitin: \u03c0 = 3.14)", en: "A bicycle tire has a Radius of 20 cm. What is the Circumference of the tire? (Use: \u03c0 = 3.14)" }, options: { tl: ["62.8 cm", "125.6 cm", "251.2 cm", "314 cm"], en: ["62.8 cm", "125.6 cm", "251.2 cm", "314 cm"] }, answer: 1, topic: 'Circumference: Word Problem' }, // 2 * 3.14 * 20 = 125.6 cm
            // Q30: Circumference Word Problem (Jogging)
            { question: { tl: "Ang circular garden ay may Diameter na 13 meters. Kung si John ay nag-jog ng 5 beses sa palibot, ano ang kabuuang distansya? (Gamitin: \u03c0 = 3.14)", en: "The circular garden has a Diameter of 13 meters. If John jogs 5 times around it, what is the total distance? (Use: \u03c0 = 3.14)" }, options: { tl: ["40.82 m", "130.0 m", "204.1 m", "251.2 m"], en: ["40.82 m", "130.0 m", "204.1 m", "251.2 m"] }, answer: 2, topic: 'Circumference: Word Problem' } // (3.14 * 13) * 5 = 204.1 m
        ];

        let userAnswers = {}; // {qIndex: selectedOptionIndex}
        const quizName = "Pagsusulit: Measurement, Perimeter, and Circumference";
        const quizLevelRawId = "juniorhigh"; // SET TO JUNIOR HIGH
        const quizLevelDisplay = "Junior High"; // SET TO JUNIOR HIGH

        // Variable to hold the result temporarily before saving
        let currentQuizResult = null; 

        // --- DOM Elements ---
        const resultsModal = () => document.getElementById('results-modal');
        const submitButton = () => document.getElementById('submit-button');
        const scoreDisplay = () => document.getElementById('score-display');
        const customAlertBox = () => document.getElementById('custom-alert-box');
        const recordButtonLink = () => document.getElementById('record-button-link');

        
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
            let section1Content = ''; // Linear Measurements (Q1-Q10)
            let section2Content = ''; // Perimeter (Q11-Q20)
            let section3Content = ''; // Circumference (Q21-Q30)

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
            document.getElementById('reset-button-modal').textContent = uiText.resetButton[lang];
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
         * Now records both the date and the time (and an ISO timestamp) when saving the result.
         * Time format set to 12-hour with AM/PM.
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
            const now = new Date();
            currentQuizResult = {
                name: quizName,
                rawLevelId: quizLevelRawId, 
                level: quizLevelDisplay, 
                score: `${correctCount}/${totalQuestions}`,
                percentage: Math.round((correctCount / totalQuestions) * 100),
                // Record date AND time (12-hour format with AM/PM)
                date: now.toLocaleDateString('en-US'), // e.g. "1/5/2026"
                time: now.toLocaleTimeString('en-US', { hour12: true }), // e.g. "2:32:05 PM"
                // ISO timestamp for programmatic sorting/filtering
                timestamp: now.toISOString()
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
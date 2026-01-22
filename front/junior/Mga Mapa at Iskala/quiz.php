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
    <title>Pagsusulit: Mga Mapa, Direksyon, at Iskala</title>
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
        
        /* Style for the two separate cards (sections) */
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
                <h1 class="text-4xl font-extrabold text-primary mb-2" id="quiz-title">Pagsusulit: Mga Mapa, Direksyon, at Iskala</h1>
                <p class="text-xl text-gray-600" id="quiz-subtitle">30 Items: Heograpiya at Pagsukat</p>
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
            
            <!-- This container will hold the two individually rendered section cards -->
            <div id="quiz-content" class="space-y-12"> 
                <!-- JS will inject the two .quiz-section-card divs here -->
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
                    <!-- Updated to reflect saving handled in submitQuiz() -->
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
            'quizTitle': { tl: "Pagsusulit: Mga Mapa, Direksyon, at Iskala", en: "Quiz: Maps, Directions, and Scale" },
            'quizSubtitle': { tl: "30 Items: Heograpiya at Pagsukat", en: "30 Items: Geography and Measurement" },
            'goBack': { tl: 'Bumalik', en: 'Go Back' },
            'section1Title': { tl: 'I. Aralin 1: Mga Mapa at Direksyon (1 - 15)', en: 'I. Lesson 1: Maps and Directions (1 - 15)' },
            'section2Title': { tl: 'II. Aralin 2: Iskala at Scaled Drawings (16 - 30)', en: 'II. Lesson 2: Scale and Scaled Drawings (16 - 30)' },
            'submitButton': { tl: 'Tapusin at Tingnan ang Resulta', en: 'Finish and View Results' },
            'unansweredAlert': { tl: 'Kailangan mo pang sagutan ang', en: 'You still need to answer' },
            'unansweredAlertSuffix': { tl: 'na tanong bago mag-submit.', en: 'questions before submitting.' },
            'modalTitle': { tl: 'Resulta ng Pagsusulit', en: 'Quiz Results' },
            'modalScoreText': { tl: 'Nakakuha ka ng:', en: 'You scored:' },
            'modalReviewText': { tl: 'Tingnan ang iyong mga sagot sa ibaba para matuto.', en: 'Review your answers below to learn.' },
            'recordButton': { tl: 'I-record ang Resulta at Pumunta sa Talaan', en: 'Record Result and Go to Records' },
            'resetButton': { tl: 'Subukan Muli', en: 'Try Again' },
        };
        
        // --- QUIZ DATA (30 Items Total) ---
        const quizData = [
            // Section I: Aralin 1 - Mga Mapa at Direksyon (1-15)
            // Q1: Definition of Map
            { question: { tl: "Ano ang tawag sa <b>pinaliit na representasyon</b> ng isang lugar na masyadong malaki para iguhit sa aktwal na sukat?", en: "What is the term for a <b>reduced representation</b> of an area too large to be drawn in actual size?" }, options: { tl: ["Scale Drawing", "Sketch", "Mapa", "Floor Plan"], en: ["Scale Drawing", "Sketch", "Map", "Floor Plan"] }, answer: 2, topic: 'Mapa: Kahulugan' },
            // Q2: Primary Direction (Sunrise)
            { question: { tl: "Saang pangunahing direksyon sumisikat ang araw?", en: "In which cardinal direction does the sun rise?" }, options: { tl: ["Hilaga (N)", "Silangan (E)", "Timog (S)", "Kanluran (W)"], en: ["North (N)", "East (E)", "South (S)", "West (W)"] }, answer: 1, topic: 'Direksyon: Pangunahin' },
            // Q3: Primary Direction (Opposite of East)
            { question: { tl: "Alin ang kasalungat ng <b>Silangan</b> (E)?", en: "Which is the opposite of <b>East</b> (E)?" }, options: { tl: ["Hilaga (N)", "Silangan (E)", "Timog (S)", "Kanluran (W)"], en: ["North (N)", "East (E)", "South (S)", "West (W)"] }, answer: 3, topic: 'Direksyon: Pangunahin' },
            // Q4: Secondary Direction (NE)
            { question: { tl: "Aling sekundaryong direksyon ang matatagpuan sa pagitan ng Hilaga at Silangan?", en: "Which secondary direction is located between North and East?" }, options: { tl: ["Timog Silangan (SE)", "Hilagang Kanluran (NW)", "Hilagang Silangan (NE)", "Timog Kanluran (SW)"], en: ["Southeast (SE)", "Northwest (NW)", "Northeast (NE)", "Southwest (SW)"] }, answer: 2, topic: 'Direksyon: Sekundarya' },
            // Q5: Secondary Direction (Opposite of NW)
            { question: { tl: "Alin ang kasalungat ng <b>Hilagang Kanluran</b> (NW)?", en: "Which is the opposite of <b>Northwest</b> (NW)?" }, options: { tl: ["Timog Silangan (SE)", "Hilagang Kanluran (NW)", "Hilagang Silangan (NE)", "Timog Kanluran (SW)"], en: ["Southeast (SE)", "Northwest (NW)", "Northeast (NE)", "Southwest (SW)"] }, answer: 0, topic: 'Direksyon: Sekundarya' },
            // Q6: Tool for Direction
            { question: { tl: "Anong kagamitan ang palagiang ginagamit para matiyak ang eksaktong direksyon at lokasyon?", en: "What tool is consistently used to ensure exact direction and location?" }, options: { tl: ["GPS", "Protractor", "Kompas", "Ruler"], en: ["GPS", "Protractor", "Compass", "Ruler"] }, answer: 2, topic: 'Direksyon: Kagamitan' },
            // Q7: Compass Needle
            { question: { tl: "Sa paggamit ng kompas, saang direksyon <b>palaging nakaturo</b> ang karayom (needle)?", en: "When using a compass, in which direction does the needle <b>always point</b>?" }, options: { tl: ["Silangan (E)", "Timog (S)", "Hilaga (N)", "Kanluran (W)"], en: ["East (E)", "South (S)", "North (N)", "West (W)"] }, answer: 2, topic: 'Direksyon: Kompas' },
            // Q8: Finding Place on Map (Step 1)
            { question: { tl: "Ano ang <b>unang hakbang</b> sa paghahanap ng isang lugar sa mapa (hal. Cebu)?", en: "What is the <b>first step</b> in finding a place on a map (e.g., Cebu)?" }, options: { tl: ["Hanapin ang pinakamalapit na kalsada.", "Tiyakin ang malaking grupo ng lugar na kinabibilangan nito.", "Gamitin ang iskala ng mapa.", "Hatiin ang mapa sa apat na bahagi."], en: ["Find the nearest road.", "Determine the large regional group it belongs to.", "Use the map's scale.", "Divide the map into four parts."] }, answer: 1, topic: 'Mapa: Paghahanap ng Lugar' },
            // Q9: Calculation of Distance (Manila to Laguna)
            { question: { tl: "Ayon sa mapa (1 putol na linya = 30 km), may 8 putol na linya ang layo ng Maynila sa Laguna. Gaano ito kalayo?", en: "According to the map (1 broken line = 30 km), Manila is 8 broken lines away from Laguna. How far is it?" }, options: { tl: ["120 km", "180 km", "240 km", "300 km"], en: ["120 km", "180 km", "240 km", "300 km"] }, answer: 2, topic: 'Mapa: Kalkulasyon ng Distansya' }, // 8 * 30 = 240 km
            // Q10: Calculation of Distance (Manila to Batangas)
            { question: { tl: "May 7 putol na linya ang layo ng Maynila sa Batangas. Gaano ito kalayo? (1 putol na linya = 20 km)", en: "Manila is 7 broken lines away from Batangas. How far is it? (1 broken line = 20 km)" }, options: { tl: ["100 km", "140 km", "160 km", "200 km"], en: ["100 km", "140 km", "160 km", "200 km"] }, answer: 1, topic: 'Mapa: Kalkulasyon ng Distansya' }, // 7 * 20 = 140 km
            // Q11: Opposing Direction
            { question: { tl: "Kung ikaw ay naglalakad patungong Timog, saang direksyon ka dapat maglakad para <b>makabalik ka</b> sa iyong pinanggalingan?", en: "If you are walking South, in which direction must you walk to <b>return</b> to your origin?" }, options: { tl: ["Hilaga", "Silangan", "Timog", "Kanluran"], en: ["North", "East", "South", "West"] }, answer: 0, topic: 'Direksyon: Pagbalik' },
            // Q12: Map Symbolism
            { question: { tl: "Bakit mahalaga ang mga simbolo (legends) sa mapa?", en: "Why are symbols (legends) important on a map?" }, options: { tl: ["Para maging mas maganda ang mapa.", "Para malaman ang kasaysayan ng lugar.", "Para malaman ang ibig sabihin ng mga guhit at marka sa mapa.", "Para makita ang kulay ng mapa."], en: ["To make the map look better.", "To know the history of the place.", "To know the meaning of the lines and markings on the map.", "To see the colors of the map."] }, answer: 2, topic: 'Mapa: Simbolo' },
            // Q13: Cardinal Direction from Facing West
            { question: { tl: "Kung ikaw ay nakaharap sa Kanluran, saan matatagpuan ang <b>Hilaga</b> (N)?", en: "If you are facing West, where is <b>North</b> (N) located?" }, options: { tl: ["Sa iyong likod", "Sa iyong harap", "Sa iyong kaliwa", "Sa iyong kanan"], en: ["Behind you", "In front of you", "To your left", "To your right"] }, answer: 3, topic: 'Direksyon: Kompas' },
            // Q14: Drawing Map Step 1
            { question: { tl: "Ano ang <b>unang hakbang</b> sa pagguhit ng mapa?", en: "What is the <b>first step</b> in drawing a map?" }, options: { tl: ["Kalkulahin ang iskala.", "Alamin ang lugar o pook na iguguhit.", "Gumamit ng mga simbolo.", "Balikan ang iginuhit na mapa."], en: ["Calculate the scale.", "Identify the area or place to be drawn.", "Use symbols.", "Review the drawn map."], }, answer: 1, topic: 'Mapa: Pagguhit' },
            // Q15: Drawing Map Step 4
            { question: { tl: "Matapos malaman ang iskala, ano ang susunod na hakbang sa pagguhit ng mapa?", en: "After determining the scale, what is the next step in drawing the map?" }, options: { tl: ["Balikan ang iginuhit.", "Iguhit ang lugar ayon sa iskala.", "Kilalanin ang mga palatandaan.", "Alamin ang distansya."], en: ["Review the drawing.", "Draw the area according to the scale.", "Identify the landmarks.", "Determine the distance."], }, answer: 1, topic: 'Mapa: Pagguhit' },

            // Section II: Aralin 2 - Mga Iskala at Scaled Drawings (16-30)
            // Q16: Scale Definition
            { question: { tl: "Ano ang tawag sa <b>kasukat</b> sa pagitan ng dalawang pangkat ng sukat (tulad ng sa pagitan ng isang nakaguhit at orihinal)?", en: "What is the term for the <b>ratio</b> between two sets of measurements (such as between a drawn object and the original)?" }, options: { tl: ["Ruler", "Ratio", "Iskala (Scale)", "Proportion"], en: ["Ruler", "Ratio", "Scale", "Proportion"] }, answer: 2, topic: 'Iskala: Kahulugan' },
            // Q17: Purpose of Scale
            { question: { tl: "Bakit ginagamit ang iskala sa pagguhit ng mga bagay o lugar?", en: "Why is scale used when drawing objects or places?" }, options: { tl: ["Dahil masyadong malaki o maliit ang aktwal na sukat para iguhit.", "Dahil mas madaling gumuhit gamit ang iskala.", "Dahil ito ang batas.", "Dahil para makita ang kulay."], en: ["Because the actual size is too large or too small to draw.", "Because it is easier to draw using a scale.", "Because it is the law.", "In order to see the color."], }, answer: 0, topic: 'Iskala: Gamit' },
            // Q18: Scaled Drawing (Aktwal na Lapad)
            { question: { tl: "Ang garahe ay may scaled drawing na lapad na 3 pulgada. Kung ang iskala ay 1 pulgada : 3 piye, ano ang aktwal na lapad?", en: "The garage has a scaled drawing width of 3 inches. If the scale is 1 inch : 3 feet, what is the actual width?" }, options: { tl: ["3 piye", "6 piye", "9 piye", "12 piye"], en: ["3 feet", "6 feet", "9 feet", "12 feet"] }, answer: 2, topic: 'Iskala: Calculation (Enlargement)' }, // 3 * 3 = 9
            // Q19: Scaled Drawing (Aktwal na Haba)
            { question: { tl: "Ang garahe ay may scaled drawing na haba na 5 pulgada. Kung ang iskala ay 1 pulgada : 3 piye, ano ang aktwal na haba?", en: "The garage has a scaled drawing length of 5 inches. If the scale is 1 inch : 3 feet, what is the actual length?" }, options: { tl: ["12 piye", "15 piye", "18 piye", "20 piye"], en: ["12 feet", "15 feet", "18 feet", "20 feet"] }, answer: 1, topic: 'Iskala: Calculation (Enlargement)' }, // 5 * 3 = 15
            // Q20: Calculation (Sofa Actual Length)
            { question: { tl: "Ang sopa sa scaled drawing ay 6 pulgada ang haba. Kung ang iskala ay 1 pulgada : 18 pulgada, ano ang aktwal na haba?", en: "The sofa in the scaled drawing is 6 inches long. If the scale is 1 inch : 18 inches, what is the actual length?" }, options: { tl: ["96 pulgada", "100 pulgada", "108 pulgada", "120 pulgada"], en: ["96 inches", "100 inches", "108 inches", "120 inches"] }, answer: 2, topic: 'Iskala: Calculation (Furniture)' }, // 6 * 18 = 108
            // Q21: Calculation (Seat Actual Length)
            { question: { tl: "Ang upuan sa scaled drawing ay 4 pulgada ang haba. Kung ang iskala ay 1 pulgada : 18 pulgada, ano ang aktwal na haba?", en: "The seat in the scaled drawing is 4 inches long. If the scale is 1 inch : 18 inches, what is the actual length?" }, options: { tl: ["64 pulgada", "72 pulgada", "80 pulgada", "90 pulgada"], en: ["64 inches", "72 inches", "80 inches", "90 inches"] }, answer: 1, topic: 'Iskala: Calculation (Furniture)' }, // 4 * 18 = 72
            // Q22: Scaled Drawing (Swimming Pool Length)
            { question: { tl: "Ang aktwal na haba ng paliguan ay 12 piye. Kung ang iskala ay 1 pulgada : 3 piye, ilang pulgada ang haba sa drawing?", en: "The actual length of the pool is 12 feet. If the scale is 1 inch : 3 feet, how many inches is the length in the drawing?" }, options: { tl: ["3 pulgada", "4 pulgada", "6 pulgada", "9 pulgada"], en: ["3 inches", "4 inches", "6 inches", "9 inches"] }, answer: 1, topic: 'Iskala: Calculation (Reduction)' }, // 12 / 3 = 4
            // Q23: Scaled Drawing (Swimming Pool Width)
            { question: { tl: "Ang aktwal na lapad ng paliguan ay 6 piye. Kung ang iskala ay 1 pulgada : 3 piye, ilang pulgada ang lapad sa drawing?", en: "The actual width of the pool is 6 feet. If the scale is 1 inch : 3 feet, how many inches is the width in the drawing?" }, options: { tl: ["1 pulgada", "2 pulgada", "3 pulgada", "4 pulgada"], en: ["1 inch", "2 inches", "3 inches", "4 inches"] }, answer: 1, topic: 'Iskala: Calculation (Reduction)' }, // 6 / 3 = 2
            // Q24: Enlargement Calculation (Picture Haba)
            { question: { tl: "Ang orihinal na larawan ay 3 pulgada lapad at 5 pulgada haba. Kung pinalaki ang lapad sa 9 pulgada, gaano kahaba (x) ang pinalaking larawan?", en: "The original picture is 3 inches wide and 5 inches long. If the width is enlarged to 9 inches, how long (x) is the enlarged picture?" }, options: { tl: ["12 pulgada", "15 pulgada", "18 pulgada", "20 pulgada"], en: ["12 inches", "15 inches", "18 inches", "20 inches"] }, answer: 1, topic: 'Iskala: Proportion' }, // 3/5 = 9/x -> 3x = 45 -> x=15
            // Q25: Enlargement Calculation (Picture Scale)
            { question: { tl: "Ano ang iskala na ginamit sa pagpapalaki ng larawan mula 3 pulgada lapad tungo sa 9 pulgada lapad?", en: "What scale was used to enlarge the picture from 3 inches wide to 9 inches wide?" }, options: { tl: ["1:2", "1:3", "1:4", "1:5"], en: ["1:2", "1:3", "1:4", "1:5"] }, answer: 1, topic: 'Iskala: Finding Scale' }, // 9/3 = 3. Scale 1:3
            // Q26: Floor Plan Dimensions (Classroom Length)
            { question: { tl: "Ang aktwal na haba ng silid-aralan ay 18 piye. Kung ang iskala ay 1 pulgada : 3 piye, ilang pulgada ang haba sa drawing?", en: "The actual length of the classroom is 18 feet. If the scale is 1 inch : 3 feet, how many inches is the length in the drawing?" }, options: { tl: ["6 pulgada", "7 pulgada", "8 pulgada", "9 pulgada"], en: ["6 inches", "7 inches", "8 inches", "9 inches"] }, answer: 0, topic: 'Iskala: Reduction (Room)' }, // 18 / 3 = 6
            // Q27: Floor Plan Dimensions (Classroom Width)
            { question: { tl: "Ang aktwal na lapad ng silid-aralan ay 9 piye. Kung ang iskala ay 1 pulgada : 3 piye, ilang pulgada ang lapad sa drawing?", en: "The actual width of the classroom is 9 feet. If the scale is 1 inch : 3 feet, how many inches is the width in the drawing?" }, options: { tl: ["3 pulgada", "4 pulgada", "5 pulgada", "6 pulgada"], en: ["3 inches", "4 inches", "5 inches", "6 inches"] }, answer: 0, topic: 'Iskala: Reduction (Room)' }, // 9 / 3 = 3
            // Q28: Floor Plan Dimensions (Teacher's Table Length)
            { question: { tl: "Ang aktwal na haba ng mesa ng guro ay 3 piye. Kung ang iskala ay 1 pulgada : 3 piye, ilang pulgada ang haba sa drawing?", en: "The actual length of the teacher's table is 3 feet. If the scale is 1 inch : 3 feet, how many inches is the length in the drawing?" }, options: { tl: ["1 pulgada", "2 pulgada", "3 pulgada", "4 pulgada"], en: ["1 inch", "2 inches", "3 inches", "4 inches"] }, answer: 0, topic: 'Iskala: Reduction (Furniture)' }, // 3 / 3 = 1
            // Q29: Room Drawing (Length)
            { question: { tl: "Ang silid-aralan ni Mang Andoy ay 30 piye ang haba. Kung ang iskala ay 1 pulgada : 3 piye, ilang pulgada ang haba sa drawing?", en: "Mang Andoy's classroom is 30 feet long. If the scale is 1 inch : 3 feet, how many inches is the length in the drawing?" }, options: { tl: ["8 pulgada", "9 pulgada", "10 pulgada", "11 pulgada"], en: ["8 inches", "9 inches", "10 inches", "11 inches"] }, answer: 2, topic: 'Iskala: Reduction (Room)' }, // 30 / 3 = 10
            // Q30: Room Drawing (Width)
            { question: { tl: "Ang silid-aralan ni Mang Andoy ay 15 piye ang lapad. Kung ang iskala ay 1 pulgada : 3 piye, ilang pulgada ang lapad sa drawing?", en: "Mang Andoy's classroom is 15 feet wide. If the scale is 1 inch : 3 feet, how many inches is the width in the drawing?" }, options: { tl: ["4 pulgada", "5 pulgada", "6 pulgada", "7 pulgada"], en: ["4 inches", "5 inches", "6 inches", "7 inches"] }, answer: 1, topic: 'Iskala: Reduction (Room)' } // 15 / 3 = 5
        ];

        let userAnswers = {}; // {qIndex: selectedOptionIndex}
        const quizName = "Pagsusulit: Mga Mapa, Direksyon, at Iskala";
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
            
            // --- UPDATED ALERT COLORS TO SKY BLUE PALETTE ---
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
         * Renders the quiz questions into the single quiz-content container with two separate cards.
         */
        function renderQuiz() {
            const lang = currentLanguage; // Use current language for rendering
            const quizContent = document.getElementById('quiz-content');
            
            // Separate strings for content that will go inside the section cards
            let section1Content = ''; // Q1-Q15 (Map & Direction)
            let section2Content = ''; // Q16-Q30 (Scale and Scaled Drawings)

            // Separate HTML for the header/title of each card (Using UI Text for translation)
            const sectionTitles = [
                `<div class="section-title">${uiText.section1Title[lang]}</div>`,
                `<div class="section-title">${uiText.section2Title[lang]}</div>`
            ];
            
            quizData.forEach((q, index) => {
                let optionsHtml = '';
                const selectedAnswer = userAnswers[index];
                
                // Use current language for question and options
                q.options[lang].forEach((option, oIndex) => {
                    const isSelected = selectedAnswer === oIndex;
                    const selectedClass = isSelected ? 'selected' : '';
                    const disabledAttr = submitButton().disabled ? 'disabled' : ''; // Keep disabled state after submission

                    optionsHtml += `
                        <button 
                            class="option-button w-full text-left text-lg py-3 px-4 bg-white rounded-lg text-gray-700 hover:bg-gray-50 focus:outline-none ${selectedClass}"
                            onclick="selectAnswer(${index}, ${oIndex}, this)"
                            data-qindex="${index}" 
                            data-oindex="${oIndex}"
                            ${disabledAttr}
                        >
                            <span class="font-medium mr-2">${String.fromCharCode(65 + oIndex)}.</span> ${option}
                        </button>
                    `;
                });

                // Generate the question structure
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
                
                // Route question to the correct section (1-15, 16-30)
                if (index < 15) {
                    section1Content += questionHtml;
                } else {
                    section2Content += questionHtml;
                }
            });

            // Assemble the final structure with the two separate cards (Adjusted for 2 sections)
            quizContent.innerHTML = `
                <div class="quiz-section-card" id="quiz-section-1">
                    ${sectionTitles[0]}
                    <div class="space-y-4 pt-4">${section1Content}</div>
                </div>
                <div class="quiz-section-card" id="quiz-section-2">
                    ${sectionTitles[1]}
                    <div class="space-y-4 pt-4">${section2Content}</div>
                </div>
            `;
        }

        /**
         * Updates static UI elements based on the current language.
         */
        function updateStaticUI(lang) {
            document.getElementById('quiz-title').textContent = uiText.quizTitle[lang];
            document.getElementById('quiz-subtitle').textContent = uiText.quizSubtitle[lang];
            
            const goBackElement = document.querySelector('.absolute #go-back-text');
            if (goBackElement) {
                goBackElement.textContent = uiText.goBack[lang];
            }
            
            submitButton().textContent = uiText.submitButton[lang];
            
            // Modal elements
            const modalTitle = document.getElementById('modal-title');
            if (modalTitle) modalTitle.textContent = uiText.modalTitle[lang];
            
            const modalScoreText = document.getElementById('modal-score-text');
            if (modalScoreText) modalScoreText.textContent = uiText.modalScoreText[lang];
            
            const modalReviewText = document.getElementById('modal-review-text');
            if (modalReviewText) modalReviewText.textContent = uiText.modalReviewText[lang];
            
            const recordButtonLink = document.getElementById('record-button-link');
            if (recordButtonLink) recordButtonLink.textContent = uiText.recordButton[lang];
            
            const resetButtonModal = document.getElementById('reset-button-modal');
            if (resetButtonModal) resetButtonModal.textContent = uiText.resetButton[lang];
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
                     if (oIndex === selectedAnswer) {
                        btn.classList.add('selected'); // Keep selected highlight
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
            showAlert(`Resulta para sa ${currentQuizResult.name} ay na-save!`, 'success');
        }

        /**
         * Submits the quiz, calculates the score, and displays results.
         * Now records both the date and the time (12-hour AM/PM) and an ISO timestamp when saving the result.
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
                // date in locale format
                date: now.toLocaleDateString('en-US'),
                // time in 12-hour AM/PM format per your request
                time: now.toLocaleTimeString('en-US', { hour12: true }),
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
            
            // Re-render the quiz to re-enable all buttons and re-apply styling
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
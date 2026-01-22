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
    <title>Pagsusulit: Mga Positive at Negative Integers</title>
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
                <h1 class="text-4xl font-extrabold text-primary mb-2" id="quiz-title">Pagsusulit: Mga Positive at Negative Integers</h1>
                <p class="text-xl text-gray-600" id="quiz-subtitle">30 Items: Arithmetic Operations at Problem Solving</p>
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
                    <!-- Updated link text and simplified to follow the logic: save happens on submit, link navigation follows. -->
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
        // --- INJECT PHP VARIABLES (ADDED) ---
        const USER_ID = "<?php echo $user_id; ?>";
        const USER_NAME = "<?php echo $user_name; ?>";
        const USER_RAW_LEVEL = "<?php echo $user_level_raw; ?>";
        
        // --- GLOBAL KEY FOR ALL RECORDS (ADDED) ---
        const GLOBAL_RECORDS_KEY = 'allQuizRecords';
        // --- USER-SPECIFIC KEY (ADDED) ---
        const USER_RECORDS_KEY = `quizRecords_${USER_ID}`;

        let currentLanguage = 'tl'; // Default language is Tagalog

        // --- UI Text Translations ---
        const uiText = {
            'quizTitle': { tl: "Pagsusulit: Mga Positive at Negative Integers", en: "Quiz: Positive and Negative Integers" },
            'quizSubtitle': { tl: "30 Items: Arithmetic Operations at Problem Solving", en: "30 Items: Arithmetic Operations and Problem Solving" },
            'goBack': { tl: 'Bumalik', en: 'Go Back' },
            'section1Title': { tl: 'I. Aralin 1: Pagkilala at Pag-aayos ng Integers (1 - 10)', en: 'I. Lesson 1: Integer Identification and Ordering (1 - 10)' },
            'section2Title': { tl: 'II. Aralin 2 & 3: Arithmetic Operations (11 - 20)', en: 'II. Lesson 2 & 3: Arithmetic Operations (11 - 20)' },
            'section3Title': { tl: 'III. Aralin 4: Paglutas ng Suliranin (21 - 30)', en: 'III. Lesson 4: Problem Solving (21 - 30)' },
            'submitButton': { tl: 'Tapusin at Tingnan ang Resulta', en: 'Finish and View Results' },
            'unansweredAlert': { tl: 'Kailangan mo pang sagutan ang', en: 'You still need to answer' },
            'unansweredAlertSuffix': { tl: 'na tanong bago mag-submit.', en: 'questions before submitting.' },
            'modalTitle': { tl: 'Resulta ng Pagsusulit', en: 'Quiz Results' },
            'modalScoreText': { tl: 'Nakakuha ka ng:', en: 'You scored:' },
            'modalReviewText': { tl: 'Tingnan ang iyong mga sagot sa ibaba para matuto.', en: 'Review your answers below to learn.' },
            'recordButton': { tl: 'I-record ang Resulta at Pumunta sa Talaan', en: 'Record Result and Go to Records' }, // Updated text
            'resetButton': { tl: 'Subukan Muli', en: 'Try Again' },
        };

        // --- QUIZ DATA (30 Items Total) ---
        const quizData = [
            // Section I: Aralin 1 - Pagkilala at Pag-aayos (1-10)
            // Q1: Classification (Below Zero)
            { question: { tl: "Ang 1\u00b0C sa ibaba ng 0 ay isang <b>anong uri ng integer</b>?", en: "1\u00b0C below 0 is what <b>type of integer</b>?" }, options: { tl: ["Positive", "Negative", "Zero", "Wala sa nabanggit"], en: ["Positive", "Negative", "Zero", "None of the above"] }, answer: 1, topic: 'Integers: Pagkilala' }, // -1
            // Q2: Classification (Profit/Gains)
            { question: { tl: "Ang P100 na kita o tub\u00f4 ay isang <b>anong uri ng integer</b>?", en: "P100 profit or gain is what <b>type of integer</b>?" }, options: { tl: ["Positive", "Negative", "Zero", "Wala sa nabanggit"], en: ["Positive", "Negative", "Zero", "None of the above"] }, answer: 0, topic: 'Integers: Pagkilala' }, // +100
            // Q3: Ordering (Ascending)
            { question: { tl: "Ayusin nang <b>pataas</b> (pinakamaliit hanggang pinakamalaki): -6, -4, -1, 0, -3", en: "Arrange in <b>ascending order</b> (smallest to largest): -6, -4, -3, -1, 0" }, options: { tl: ["-1, -3, -4, -6, 0", "-6, -4, -3, -1, 0", "0, -1, -3, -4, -6", "-6, -3, -4, -1, 0"], en: ["-1, -3, -4, -6, 0", "-6, -4, -3, -1, 0", "0, -1, -3, -4, -6", "-6, -3, -4, -1, 0"] }, answer: 1, topic: 'Integers: Pag-aayos' }, // -6, -4, -3, -1, 0
            // Q4: Ordering (Descending)
            { question: { tl: "Ayusin nang <b>pababa</b> (pinakamalaki hanggang pinakamaliit): +8, -4, -6, -2, +3", en: "Arrange in <b>descending order</b> (largest to smallest): +8, +3, -2, -4, -6" }, options: { tl: ["+8, +3, -2, -4, -6", "-6, -4, -2, +3, +8", "+8, +3, -6, -4, -2", "+3, +8, -2, -4, -6"], en: ["+8, +3, -2, -4, -6", "-6, -4, -2, +3, +8", "+8, +3, -6, -4, -2", "+3, +8, -2, -4, -6"] }, answer: 0, topic: 'Integers: Pag-aayos' }, // +8, +3, -2, -4, -6
            // Q5: Ordering (Descending with Mixed Signs)
            { question: { tl: "Ayusin nang <b>pababa</b>: +4, +3, -10, -11, +1", en: "Arrange in <b>descending order</b>: +4, +3, +1, -10, -11" }, options: { tl: ["-11, -10, +1, +3, +4", "+4, +3, +1, -10, -11", "+4, +3, -10, -11, +1", "-11, -10, +4, +3, +1"], en: ["-11, -10, +1, +3, +4", "+4, +3, +1, -10, -11", "+4, +3, -10, -11, +1", "-11, -10, +4, +3, +1"] }, answer: 1, topic: 'Integers: Pag-aayos' }, // +4, +3, +1, -10, -11
            // Q6: Ordering (Ascending with Mixed Signs)
            { question: { tl: "Ayusin nang <b>pataas</b>: -8, +8, -5, -6, +4", en: "Arrange in <b>ascending order</b>: -8, -6, -5, +4, +8" }, options: { tl: ["-8, -6, -5, +4, +8", "+8, +4, -5, -6, -8", "-5, -6, -8, +4, +8", "+4, -5, -6, -8, +8"], en: ["-8, -6, -5, +4, +8", "+8, +4, -5, -6, -8", "-5, -6, -8, +4, +8", "+4, -5, -6, -8, +8"] }, answer: 0, topic: 'Integers: Pag-aayos' }, // -8, -6, -5, +4, +8
            // Q7: Comparison (Greater Value)
            { question: { tl: "Alin ang may mas malaking halaga: -15 o 0?", en: "Which has a greater value: -15 or 0?" }, options: { tl: ["-15", "0", "Pareho lang", "Hindi matukoy"], en: ["-15", "0", "The same", "Cannot be determined"] }, answer: 1, topic: 'Integers: Paghambing' },
            // Q8: Opposite of an Integer
            { question: { tl: "Ano ang <b>kabaligtaran</b> (opposite) ng -18?", en: "What is the <b>opposite</b> of -18?" }, options: { tl: ["0", "-18", "+18", "+36"], en: ["0", "-18", "+18", "+36"] }, answer: 2, topic: 'Integers: Opposite' },
            // Q9: Opposite of a Concept
            { question: { tl: "Ano ang kabaligtaran ng 'Pagbaba ng 100'?", en: "What is the opposite of 'Decrease by 100'?" }, options: { tl: ["Pagdagdag ng 100", "Pagtaas ng 100", "Pagbawas ng 100", "Wala sa nabanggit"], en: ["Add 100", "Increase by 100", "Subtract 100", "None of the above"] }, answer: 1, topic: 'Integers: Opposite Concept' },
            // Q10: Opposite of a Concept
            { question: { tl: "Ano ang kabaligtaran ng 'Natalo ng 20 puntos'?", en: "What is the opposite of 'Lost by 20 points'?" }, options: { tl: ["Natalo ng 40 puntos", "Panalo ng 20 puntos", "Patas", "Walang kaugnayan"], en: ["Lost by 40 points", "Won by 20 points", "Even", "No relation"] }, answer: 1, topic: 'Integers: Opposite Concept' },

            // Section II: Aralin 2 & 3 - Operations (11-20)
            // Q11: Addition (Same Sign)
            { question: { tl: "Ano ang sagot sa: <b>(+24) + (+12)</b>?", en: "What is the answer to: <b>(+24) + (+12)</b>?" }, options: { tl: ["+12", "+36", "-12", "-36"], en: ["+12", "+36", "-12", "-36"] }, answer: 1, topic: 'Integers: Addition' }, // +36
            // Q12: Subtraction (Mixed Signs)
            { question: { tl: "Ano ang sagot sa: <b>+15 - (-13)</b>?", en: "What is the answer to: <b>+15 - (-13)</b>?" }, options: { tl: ["+2", "-2", "+28", "-28"], en: ["+2", "-2", "+28", "-28"] }, answer: 2, topic: 'Integers: Subtraction' }, // 15 + 13 = 28
            // Q13: Addition (Missing Addend)
            { question: { tl: "Kumpletuhin: <b>(+50) + (x) = +100</b>. Ano ang halaga ng x?", en: "Complete: <b>(+50) + (x) = +100</b>. What is the value of x?" }, options: { tl: ["+50", "-50", "+150", "-150"], en: ["+50", "-50", "+150", "-150"] }, answer: 0, topic: 'Integers: Missing Number' }, // +50
            // Q14: Subtraction (Mixed Signs)
            { question: { tl: "Ano ang sagot sa: <b>+10 - (+25)</b>?", en: "What is the answer to: <b>+10 - (+25)</b>?" }, options: { tl: ["+15", "-15", "+35", "-35"], en: ["+15", "-15", "+35", "-35"] }, answer: 1, topic: 'Integers: Subtraction' }, // 10 - 25 = -15
            // Q15: Multiplication (Mixed Signs)
            { question: { tl: "Ano ang sagot sa: <b>(-8) * (+5)</b>?", en: "What is the answer to: <b>(-8) * (+5)</b>?" }, options: { tl: ["+40", "-40", "+3", "-3"], en: ["+40", "-40", "+3", "-3"] }, answer: 1, topic: 'Integers: Multiplication' }, // -40
            // Q16: Division (Same Sign)
            { question: { tl: "Ano ang sagot sa: <b>(+36) / (+9)</b>?", en: "What is the answer to: <b>(+36) / (+9)</b>?" }, options: { tl: ["+4", "-4", "+3", "-3"], en: ["+4", "-4", "+3", "-3"] }, answer: 0, topic: 'Integers: Division' }, // +4
            // Q17: Subtraction (Missing Minuend)
            { question: { tl: "Kumpletuhin: <b>x - (-25) = +50</b>. Ano ang halaga ng x?", en: "Complete: <b>x - (-25) = +50</b>. What is the value of x?" }, options: { tl: ["+25", "-25", "+75", "-75"], en: ["+25", "-25", "+75", "-75"] }, answer: 0, topic: 'Integers: Missing Number' }, // x = 50 + (-25) = 25
            // Q18: Multiplication (Mixed Signs)
            { question: { tl: "Ano ang sagot sa: <b>(+6) * (-4)</b>?", en: "What is the answer to: <b>(+6) * (-4)</b>?" }, options: { tl: ["+24", "-24", "+2", "-2"], en: ["+24", "-24", "+2", "-2"] }, answer: 1, topic: 'Integers: Multiplication' }, // -24
            // Q19: Division (Mixed Signs)
            { question: { tl: "Ano ang sagot sa: <b>(+28) / (-4)</b>?", en: "What is the answer to: <b>(+28) / (-4)</b>?" }, options: { tl: ["+7", "-7", "+3", "-3"], en: ["+7", "-7", "+3", "-3"] }, answer: 1, topic: 'Integers: Division' }, // -7
            // Q20: Division (Same Sign)
            { question: { tl: "Ano ang sagot sa: <b>(-42) / (-7)</b>?", en: "What is the answer to: <b>(-42) / (-7)</b>?" }, options: { tl: ["+6", "-6", "+7", "-7"], en: ["+6", "-6", "+7", "-7"] }, answer: 0, topic: 'Integers: Division' }, // +6

            // Section III: Aralin 4 - Word Problems (21-30)
            // Q21: Elevation (Addition)
            { question: { tl: "Isang hot air balloon ang 2,500 m ang taas. Isang scuba diver ang nasa 1,850 m sa ilalim ng dagat. Ano ang <b>total na distansya</b> sa pagitan nila?", en: "A hot air balloon is 2,500 m high. A scuba diver is 1,850 m below sea level. What is the <b> total distance</b> between them?" }, options: { tl: ["650 m", "1,850 m", "4,350 m", "2,500 m"], en: ["650 m", "1,850 m", "4,350 m", "2,500 m"] }, answer: 2, topic: 'Word Problem: Addition/Distance' }, // 2500 - (-1850) = 4350
            // Q22: Change in Temperature (Subtraction)
            { question: { tl: "Ang Maynila ay <b>32\u00b0C</b> at ang Baguio ay <b>18\u00b0C</b>. Ano ang <b>pagbaba ng temperatura</b> mula Maynila patungong Baguio?", en: "Manila is <b>32\u00b0C</b> and Baguio is <b>18\u00b0C</b>. What is the <b>temperature drop</b> from Manila to Baguio?" }, options: { tl: ["+14\u00b0C", "-14\u00b0C", "+50\u00b0C", "-50\u00b0C"], en: ["+14\u00b0C", "-14\u00b0C", "+50\u00b0C", "-50\u00b0C"] }, answer: 1, topic: 'Word Problem: Subtraction/Change' }, // 18 - 32 = -14
            // Q23: Elevator Movement (Addition/Subtraction)
            { question: { tl: "Nasa ika-9 na palapag si Gng. Cruz. Bumaba siya ng 6 na palapag. Saang palapag siya naroon?", en: "Mrs. Cruz is on the 9th floor. She went down 6 floors. Which floor is she on?" }, options: { tl: ["Ika-3 palapag", "Ika-6 na palapag", "Ika-9 na palapag", "Ika-15 palapag"], en: ["3rd floor", "6th floor", "9th floor", "15th floor"] }, answer: 0, topic: 'Word Problem: Addition' }, // 9 + (-6) = 3
            // Q24: Savings (Multiplication)
            { question: { tl: "Si Mang Juan ay nagdedeposito ng P1,000 bawat buwan. Ilang pera ang naideposito niya sa loob ng isang taon (12 buwan)?", en: "Mang Juan deposits P1,000 every month. How much money did he deposit in one year (12 months)?" }, options: { tl: ["P1,000", "P10,000", "P12,000", "P24,000"], en: ["P1,000", "P10,000", "P12,000", "P24,000"] }, answer: 2, topic: 'Word Problem: Multiplication' }, // 1000 * 12 = 12000
            // Q25: Work Output (Multiplication)
            { question: { tl: "Ang pabrika ay nakakagawa ng 350 kamiseta bawat araw (Lunes-Biyernes). Ilang kamiseta ang nagagawa sa loob ng isang linggo?", en: "The factory produces 350 shirts per day (Monday-Friday). How many shirts are produced in one week?" }, options: { tl: ["1,750", "2,100", "2,450", "3,500"], en: ["1,750", "2,100", "2,450", "3,500"] }, answer: 0, topic: 'Word Problem: Multiplication' }, // 350 * 5 = 1750
            // Q26: Tank Water Level (Subtraction)
            { question: { tl: "Ang tangke ay may 10,000 L. Ginamit ang 1,500 L. Ilang L ang natira kinabukasan?", en: "The tank has 10,000 L. 1,500 L was used. How many L are left the next day?" }, options: { tl: ["8,500 L", "9,500 L", "11,500 L", "1,500 L"], en: ["8,500 L", "9,500 L", "11,500 L", "1,500 L"] }, answer: 0, topic: 'Word Problem: Subtraction' }, // 10000 - 1500 = 8500
            // Q27: Ranches (Subtraction)
            { question: { tl: "May 150 baka. Ipinagbili ang 65. Ilang baka ang natira?", en: "There are 150 cows. 65 were sold. How many cows are left?" }, options: { tl: ["85", "90", "95", "215"], en: ["85", "90", "95", "215"] }, answer: 0, topic: 'Word Problem: Subtraction' }, // 150 - 65 = 85
            // Q28: Phone Calls (Multiplication)
            { question: { tl: "Si Anita ay nakakatanggap ng 45 tawag bawat araw. Ilang tawag ang natatanggap niya sa loob ng 6 na araw?", en: "Anita receives 45 calls per day. How many calls does she receive in 6 days?" }, options: { tl: ["240", "250", "270", "300"], en: ["240", "250", "270", "300"] }, answer: 2, topic: 'Word Problem: Multiplication' }, // 45 * 6 = 270
            // Q29: Cake Slices (Division)
            { question: { tl: "5 cake ang hahatiin para sa 60 katao. Ilang hiwa ang kailangan sa bawat cake?", en: "5 cakes are to be divided for 60 people. How many slices are needed per cake?" }, options: { tl: ["10", "12", "15", "60"], en: ["10", "12", "15", "60"] }, answer: 1, topic: 'Word Problem: Division' }, // 60 / 5 = 12
            // Q30: Money Withdrawal (Multiple Subtraction)
            { question: { tl: "May P10,000 si Ditas. Nag-withdraw siya ng P2,000, P5,000, at P1,650. Magkano ang natira?", en: "Ditas has P10,000. She withdrew P2,000, P5,000, and P1,650. How much is left?" }, options: { tl: ["P1,350", "P1,500", "P8,650", "P9,650"], en: ["P1,350", "P1,500", "P8,650", "P9,650"] }, answer: 0, topic: 'Word Problem: Multiple Subtraction' } // 10000 - 2000 - 5000 - 1650 = 1350
        ];

        let userAnswers = {}; // {qIndex: selectedOptionIndex}
        const quizName = "Pagsusulit: Mga Positive at Negative Integers";
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
         * Renders the quiz questions into the single quiz-content container with three separate cards.
         */
        function renderQuiz() {
            const lang = currentLanguage;
            const quizContent = document.getElementById('quiz-content');
            
            // Separate strings for content that will go inside the section cards
            let section1Content = ''; // Q1-Q10 (Identification and Ordering)
            let section2Content = ''; // Q11-Q20 (Arithmetic Operations)
            let section3Content = ''; // Q21-Q30 (Word Problems)

            // Separate HTML for the header/title of each card
            const sectionTitles = [
                `<div class="section-title">${uiText.section1Title[lang]}</div>`,
                `<div class="section-title">${uiText.section2Title[lang]}</div>`,
                `<div class="section-title">${uiText.section3Title[lang]}</div>`
            ];
            
            quizData.forEach((q, index) => {
                let optionsHtml = '';
                const selectedAnswer = userAnswers[index];
                
                q.options[lang].forEach((option, oIndex) => {
                    const isSelected = selectedAnswer === oIndex;
                    const selectedClass = isSelected ? 'selected' : '';
                    const disabledAttr = submitButton().disabled ? 'disabled' : '';

                    // Options buttons are text-aligned left, using text-lg for increased size
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
            
            // Re-apply visual feedback if already submitted
            if (submitButton().disabled) {
                applyResultVisuals();
            }
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
            
            // Re-render quiz content with the new language and re-apply selection
            renderQuiz();
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
         * Helper function to apply correct/incorrect coloring to buttons after submission or language switch.
         */
        function applyResultVisuals() {
             quizData.forEach((q, index) => {
                const selectedAnswer = userAnswers[index];
                const correctAnswer = q.answer;
                
                const optionsContainer = document.getElementById(`options-q${index}`);
                if (!optionsContainer) return;

                const optionButtons = optionsContainer.querySelectorAll('.option-button');

                optionButtons.forEach((btn, oIndex) => {
                    btn.disabled = true;
                    btn.classList.remove('correct', 'incorrect');
                    
                    if (oIndex === correctAnswer) {
                        btn.classList.add('correct');
                    }
                    
                    if (oIndex === selectedAnswer && oIndex !== correctAnswer) {
                        btn.classList.add('incorrect');
                    }
                    if (oIndex === selectedAnswer) {
                        btn.classList.add('selected'); 
                    }
                });
            });
        }


        /**
         * Explicitly saves the current quiz result to BOTH storage keys (GLOBAL and USER-SPECIFIC) with upsert logic.
         * The result object now includes date, time (AM/PM) and an ISO timestamp.
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
                // Update: Replace the old record for this quiz with the new score
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
         * Submits the quiz, calculates the score, records date+time (AM/PM) and ISO timestamp, then displays results.
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
                const selectedAnswer = userAnswers[index];
                if (selectedAnswer === q.answer) {
                    correctCount++;
                }
            });
            
            // Apply visual feedback based on answers
            applyResultVisuals();

            // --- 1. PREPARE THE RESULT OBJECT (include date + time AM/PM + ISO timestamp) ---
            const now = new Date();
            currentQuizResult = {
                name: quizName,
                rawLevelId: quizLevelRawId, 
                level: quizLevelDisplay, 
                score: `${correctCount}/${totalQuestions}`,
                percentage: Math.round((correctCount / totalQuestions) * 100),
                date: now.toLocaleDateString('en-US'), // e.g. "1/5/2026"
                time: now.toLocaleTimeString('en-US', { hour12: true }), // e.g. "2:32:05 PM"
                timestamp: now.toISOString() // machine-friendly
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
            
            submitButton().disabled = false;
            submitButton().classList.remove('opacity-50', 'cursor-not-allowed');
        }

        // Initialize on load
        window.onload = () => {
            // Default to Tagalog (tl) on load
            setLanguage('tl'); 
        };
    </script>

</body>
</html>
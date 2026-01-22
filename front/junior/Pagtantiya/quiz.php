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
    <title>Pagsusulit: Pagtantiya</title>
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
                <h1 class="text-4xl font-extrabold text-primary mb-2" id="quiz-title">Pagsusulit: Pagtantiya</h1>
                <p class="text-xl text-gray-600" id="quiz-subtitle">30 Items: Pag-ikot ng Numero at Aplikasyon sa Pang-araw-araw na Buhay</p>
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
            'quizTitle': { tl: "Pagsusulit: Pagtantiya", en: "Quiz: Estimation" },
            'quizSubtitle': { tl: "30 Items: Pag-ikot ng Numero at Aplikasyon sa Pang-araw-araw na Buhay", en: "30 Items: Number Rounding and Application in Daily Life" },
            'goBack': { tl: 'Bumalik', en: 'Go Back' },
            'section1Title': { tl: 'I. Aralin 1: Pangkalahatang Pagtantiya at Pag-ikot (Rounding Off) (1 - 10)', en: 'I. Lesson 1: General Estimation and Rounding Off (1 - 10)' },
            'section2Title': { tl: 'II. Aralin 1: Pag-ikot ng Whole Numbers at Kalkulasyon (11 - 20)', en: 'II. Lesson 1: Rounding Whole Numbers and Calculation (11 - 20)' },
            'section3Title': { tl: 'III. Aralin 2: Aplikasyon ng Pagtantiya sa Negosyo (21 - 30)', en: 'III. Lesson 2: Application of Estimation in Business (21 - 30)' },
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
        // Converted from Tagalog-only structure to dual-language structure.
        const quizData = [
            // Section I: Appropriateness & Rounding to Whole Numbers (1-10)
            // Q1: Estimation Appropriateness (Fish Count)
            { question: { tl: "Maaari bang gamitin ang <b>pagtantiya</b> sa sitwasyong: 'Ilang piraso ng isda mayroon sa isang kilo?'", en: "Can <b>estimation</b> be used in the situation: 'How many pieces of fish are there in one kilo?'" }, options: { tl: ["Oo", "Hindi", "Depende sa presyo", "Para lang sa isdang maliit"], en: ["Yes", "No", "Depends on the price", "Only for small fish"] }, answer: 0, topic: 'Pagtantiya: Kailan Gagamitin' },
            // Q2: Estimation Appropriateness (Rice Serving)
            { question: { tl: "Maaari bang gamitin ang <b>pagtantiya</b> sa sitwasyong: 'Ilang tasa ng bigas ang dapat mong lutuin kung magpapakain ka ng 10 tao?'", en: "Can <b>estimation</b> be used in the situation: 'How many cups of rice should you cook if you are feeding 10 people?'" }, options: { tl: ["Oo", "Hindi", "Hindi mahalaga", "Para lang sa 5 tao"], en: ["Yes", "No", "It is not important", "Only for 5 people"] }, answer: 0, topic: 'Pagtantiya: Kailan Gagamitin' },
            // Q3: Estimation Appropriateness (Exact Time)
            { question: { tl: "Sa pagpaplano ng biyahe, ang pagtantiya ay <b>hindi angkop</b> sa pagtukoy ng:", en: "In planning a trip, estimation is <b>not appropriate</b> for determining the:" }, options: { tl: ["Kabuuang oras ng biyahe (kasama ang traffic)", "Badyet para sa pamasahe", "Ang <b>eksaktong oras ng pag-alis</b> para sa isang appointment", "Kabuuang distansya"], en: ["Total travel time (including traffic)", "Budget for fare", "The <b>exact time of departure</b> for an appointment", "Total distance"] }, answer: 2, topic: 'Pagtantiya: Kailan Hindi Angkop' },
            // Q4: Rounding Decimals (7.75)
            { question: { tl: "I-round off ang 7.75 sa pinakamalapit na <b>whole number</b>.", en: "Round off 7.75 to the nearest <b>whole number</b>." }, options: { tl: ["7", "8", "7.7", "7.8"], en: ["7", "8", "7.7", "7.8"] }, answer: 1, topic: 'Rounding: Decimals' }, // 7.75 -> 8
            // Q5: Rounding Decimals (5.29)
            { question: { tl: "I-round off ang 5.29 sa pinakamalapit na <b>whole number</b>.", en: "Round off 5.29 to the nearest <b>whole number</b>." }, options: { tl: ["5", "6", "5.3", "5.2"], en: ["5", "6", "5.3", "5.2"] }, answer: 0, topic: 'Rounding: Decimals' }, // 5.29 -> 5
            // Q6: Rounding Decimals (9.598)
            { question: { tl: "I-round off ang 9.598 sa pinakamalapit na <b>whole number</b>.", en: "Round off 9.598 to the nearest <b>whole number</b>." }, options: { tl: ["9", "10", "9.6", "9.5"], en: ["9", "10", "9.6", "9.5"] }, answer: 1, topic: 'Rounding: Decimals' }, // 9.598 -> 10
            // Q7: Rounding Fractions (9 4/5)
            { question: { tl: "I-round off ang 9 <b>4/5</b> sa pinakamalapit na <b>whole number</b>. (Tandaan: 4/5 = 0.8)", en: "Round off 9 <b>4/5</b> to the nearest <b>whole number</b>. (Note: 4/5 = 0.8)" }, options: { tl: ["9", "10", "9.4", "9.8"], en: ["9", "10", "9.4", "9.8"] }, answer: 1, topic: 'Rounding: Fractions' }, // 9 4/5 -> 9.8 -> 10
            // Q8: Rounding Fractions (7 1/3)
            { question: { tl: "I-round off ang 7 <b>1/3</b> sa pinakamalapit na <b>whole number</b>. (Tandaan: 1/3 \u2248 0.33)", en: "Round off 7 <b>1/3</b> to the nearest <b>whole number</b>. (Note: 1/3 \u2248 0.33)" }, options: { tl: ["7", "8", "7.3", "7.1"], en: ["7", "8", "7.3", "7.1"] }, answer: 0, topic: 'Rounding: Fractions' }, // 7 1/3 -> 7.33 -> 7
            // Q9: Rule for Rounding Up
            { question: { tl: "Ang decimal ay kailangang <b>i-round off pataas</b> kung ang digit sa kanan ng decimal point ay:", en: "The decimal needs to be <b>rounded up</b> if the digit to the right of the decimal point is:" }, options: { tl: ["Mas maliit sa 5", "Mas malaki sa 5", "Katumbas ng 5 o mas malaki", "Laging pataas"], en: ["Less than 5", "Greater than 5", "Equal to 5 or greater", "Always up"] }, answer: 2, topic: 'Rounding: Rule' },
            // Q10: Rule for Rounding Down
            { question: { tl: "Ang decimal ay kailangang <b>panatilihin</b> ang whole number kung ang digit sa kanan ng decimal point ay:", en: "The decimal needs to <b>keep</b> the whole number if the digit to the right of the decimal point is:" }, options: { tl: ["Katumbas ng 5", "Mas malaki sa 5", "Mas maliit sa 5", "Walang kinalaman"], en: ["Equal to 5", "Greater than 5", "Less than 5", "No relation"] }, answer: 2, topic: 'Rounding: Rule' },

            // Section II: Rounding Whole Numbers & Mental Math (11-20)
            // Q11: Rounding to Nearest Tens (778)
            { question: { tl: "I-round off ang 778 sa pinakamalapit na <b>tens</b>.", en: "Round off 778 to the nearest <b>tens</b>." }, options: { tl: ["770", "780", "800", "700"], en: ["770", "780", "800", "700"] }, answer: 1, topic: 'Rounding: Whole Numbers' }, // 778 -> 780
            // Q12: Rounding to Nearest Hundreds (324)
            { question: { tl: "I-round off ang 324 sa pinakamalapit na <b>hundreds</b>.", en: "Round off 324 to the nearest <b>hundreds</b>." }, options: { tl: ["300", "400", "320", "330"], en: ["300", "400", "320", "330"] }, answer: 0, topic: 'Rounding: Whole Numbers' }, // 324 -> 300
            // Q13: Rounding to Nearest Hundreds (908)
            { question: { tl: "I-round off ang 908 sa pinakamalapit na <b>hundreds</b>.", en: "Round off 908 to the nearest <b>hundreds</b>." }, options: { tl: ["900", "1,000", "910", "800"], en: ["900", "1,000", "910", "800"] }, answer: 0, topic: 'Rounding: Whole Numbers' }, // 908 -> 900
            // Q14: Rounding to Nearest Thousands (7,453)
            { question: { tl: "I-round off ang 7,453 sa pinakamalapit na <b>thousands</b>.", en: "Round off 7,453 to the nearest <b>thousands</b>." }, options: { tl: ["7,000", "8,000", "7,500", "6,000"], en: ["7,000", "8,000", "7,500", "6,000"] }, answer: 0, topic: 'Rounding: Whole Numbers' }, // 7,453 -> 7,000
            // Q15: Rounding to Nearest Thousands (999)
            { question: { tl: "I-round off ang 999 sa pinakamalapit na <b>thousands</b>.", en: "Round off 999 to the nearest <b>thousands</b>." }, options: { tl: ["900", "990", "1,000", "0"], en: ["900", "990", "1,000", "0"] }, answer: 2, topic: 'Rounding: Whole Numbers' }, // 999 -> 1000
            // Q16: Rounding to Nearest Thousands (9,642)
            { question: { tl: "I-round off ang 9,642 sa pinakamalapit na <b>thousands</b>.", en: "Round off 9,642 to the nearest <b>thousands</b>." }, options: { tl: ["9,000", "10,000", "9,600", "9,700"], en: ["9,000", "10,000", "9,600", "9,700"] }, answer: 1, topic: 'Rounding: Whole Numbers' }, // 9,642 -> 10,000
            // Q17: Estimation Sum (P899 + P1,435) - Rounded Hundreds
            { question: { tl: "Tantiyahin ang suma ng P899 at P1,435 sa pamamagitan ng pag-round off sa pinakamalapit na <b>hundreds</b>.", en: "Estimate the sum of P899 and P1,435 by rounding off to the nearest <b>hundreds</b>." }, options: { tl: ["P2,300", "P2,400", "P2,500", "P2,334"], en: ["P2,300", "P2,400", "P2,500", "P2,334"] }, answer: 0, topic: 'Estimation: Sums' }, // 900 + 1400 = 2300
            // Q18: Estimation Sum (P7.5 + P9.99 + P5.1) - Rounded Whole
            { question: { tl: "Tantiyahin ang suma ng P7.5, P9.99, at P5.1 sa pamamagitan ng pag-round off sa pinakamalapit na <b>whole number</b>.", en: "Estimate the sum of P7.5, P9.99, and P5.1 by rounding off to the nearest <b>whole number</b>." }, options: { tl: ["P22", "P23", "P24", "P25"], en: ["P22", "P23", "P24", "P25"] }, answer: 1, topic: 'Estimation: Sums' }, // 8 + 10 + 5 = 23
            // Q19: Estimation Sum (12 + 6.25 + 11.50) - Rounded Whole
            { question: { tl: "Tantiyahin ang kabuuang presyo ng P11.50 at P6.25 kung bumili ka ng 1 bote ng softdrinks (P11.50) at 1 bag ng chips (P6.25).", en: "Estimate the total price of P11.50 and P6.25 if you bought 1 bottle of softdrinks (P11.50) and 1 bag of chips (P6.25)." }, options: { tl: ["P17", "P18", "P19", "P20"], en: ["P17", "P18", "P19", "P20"] }, answer: 1, topic: 'Estimation: Sums' }, // 12 + 6 = 18
            // Q20: Estimation vs Exact Sum
            { question: { tl: "Ano ang dahilan kung bakit ginagamit ang pag-round off sa pagtantiya ng kabuuang halaga ng mga pinamili?", en: "What is the reason why rounding off is used in estimating the total value of purchases?" }, options: { tl: ["Para maging mas mataas ang presyo.", "Dahil mas madali at mabilis i-sumahin ang whole numbers.", "Dahil bawal ang calculator sa palengke.", "Para makita ang fractions."], en: ["To make the price higher.", "Because it is easier and faster to sum up whole numbers.", "Because calculators are prohibited in the market.", "In order to see the fractions."], }, answer: 1, topic: 'Estimation: Purpose' },

            // Section III: Application & Word Problems (21-30)
            // Q21: Marta's Shopping: Estimated Total (P1,089.00 -> Nearest Hundreds)
            { question: { tl: "Ang tinantiyang total ng pamimili ni Marta ay P1,089.00. Ilang <b>buong daan</b> (nearest hundreds) ang dapat niyang i-withdraw?", en: "Marta's estimated total shopping bill is P1,089.00. How many <b>whole hundreds</b> (nearest hundreds) should she withdraw?" }, options: { tl: ["P1,000", "P1,100", "P1,200", "P1,500"], en: ["P1,000", "P1,100", "P1,200", "P1,500"] }, answer: 1, topic: 'Application: Rounding Money' }, // 1089 -> 1100
            // Q22: Travel Time Estimation (2 rides, 10 mins each, plus traffic)
            { question: { tl: "Kung 2 biyahe (10 mins bawat isa), at <b>doblehin ang oras dahil sa traffic</b>, anong oras dapat umalis kung 9:00 n.u. ang misa?", en: "If 2 rides (10 mins each), and the <b>time is doubled due to traffic</b>, what time should one leave if the mass is at 9:00 a.m.?" }, options: { tl: ["8:00 n.u.", "8:20 n.u.", "8:40 n.u.", "9:00 n.u."], en: ["8:00 a.m.", "8:20 a.m.", "8:40 a.m.", "9:00 a.m."] }, answer: 1, topic: 'Application: Time/Rounding Up' }, // 2 rides * 10 mins = 20 mins. Doubled for traffic = 40 mins. 9:00 - 40 mins = 8:20
            // Q23: Nena's Profit (P9.00/kilo) - Rounded to multiple of 5
            { question: { tl: "Ang kita sa sibuyas ay P9.00/kilo. Ano ang <b>pinakamalapit na tinantiyang kita</b> (i-round off sa multiple ng 5)?", en: "The profit on onions is P9.00/kilo. What is the <b>closest estimated profit</b> (round off to a multiple of 5)?" }, options: { tl: ["P5.00", "P9.00", "P10.00", "P15.00"], en: ["P5.00", "P9.00", "P10.00", "P15.00"] }, answer: 2, topic: 'Application: Profit/Rounding' }, // 9.00 -> 10.00
            // Q24: Nena's Profit (P7.00/kilo) - Rounded to multiple of 5
            { question: { tl: "Ang kita sa kamatis ay P7.00/kilo. Ano ang <b>pinakamalapit na tinantiyang kita</b> (i-round off sa multiple ng 5)?", en: "The profit on tomatoes is P7.00/kilo. What is the <b>closest estimated profit</b> (round off to a multiple of 5)?" }, options: { tl: ["P5.00", "P7.00", "P10.00", "P15.00"], en: ["P5.00", "P7.00", "P10.00", "P15.00"] }, answer: 0, topic: 'Application: Profit/Rounding' }, // 7.00 -> 5.00
            // Q25: Nena's Profit (P18.00/kilo) - Rounded to multiple of 5
            { question: { tl: "Ang kita sa bawang ay P18.00/kilo. Ano ang <b>pinakamalapit na tinantiyang kita</b> (i-round off sa multiple ng 5)?", en: "The profit on garlic is P18.00/kilo. What is the <b>closest estimated profit</b> (round off to a multiple of 5)?" }, options: { tl: ["P15.00", "P18.00", "P20.00", "P25.00"], en: ["P15.00", "P18.00", "P20.00", "P25.00"] }, answer: 2, topic: 'Application: Profit/Rounding' }, // 18.00 -> 20.00
            // Q26: Nena's Buying Strategy (Weekend)
            { question: { tl: "Tinantiya ni Nena na <b>dumodoble ang benta</b> niya tuwing Sabado at Linggo. Kung 8 kilo ang benta tuwing araw ng pasok, ilang kilo ang dapat niyang bilhin tuwing Sabado at Linggo (bilang minimum na base)?", en: "Nena estimated that her <b>sales double</b> every Saturday and Sunday. If sales are 8 kilos on weekdays, how many kilos should she buy on Saturday and Sunday (as a minimum base)?" }, options: { tl: ["8 kilo", "10 kilo", "12 kilo", "16 kilo"], en: ["8 kilos", "10 kilos", "12 kilos", "16 kilos"] }, answer: 3, topic: 'Application: Scaling/Ratio' }, // 8 * 2 = 16 (Minimum base estimation)
            // Q27: Accuracy of Estimation (P2,334 vs P2,300)
            { question: { tl: "Ang eksaktong gastos ay P2,334, at ang tinantiyang total ay P2,300. Ang pagtantiya ba ay <b>tumpak</b>?", en: "The exact cost is P2,334, and the estimated total is P2,300. Is the estimation <b>accurate</b>?" }, options: { tl: ["Oo, dahil magkalapit ang halaga (sa loob ng hundreds).", "Hindi, masyadong malaki ang diperensya.", "Hindi tumpak dahil hindi pareho.", "Walang sapat na impormasyon."], en: ["Yes, because the values are close (within the hundreds).", "No, the difference is too large.", "Not accurate because they are not the same.", "Insufficient information."], }, answer: 0, topic: 'Estimation: Accuracy' },
            // Q28: Grocery Budget Estimation (6 members -> P750; 4 members -> X)
            { question: { tl: "Ang grocery ng 6 na miyembro ay P750.00/linggo. Kung 4 na miyembro ang pamilya, ano ang <b>tinantiyang badyet</b>?", en: "The grocery bill for 6 members is P750.00/week. If the family has 4 members, what is the <b>estimated budget</b>?" }, options: { tl: ["P500.00", "P600.00", "P700.00", "P750.00"], en: ["P500.00", "P600.00", "P700.00", "P750.00"] }, answer: 0, topic: 'Application: Scaling/Proportion' }, // 750 / 6 = 125 per person. 125 * 4 = 500
            // Q29: Total Estimated Profit (Weekday) - Simplified Calculation
            { question: { tl: "Batay sa tinantiyang kita/kilo (P5, P10, P15, P20), tinantiya ni Nena na <b>P325.00</b> ang total na kita. Tumpak ba ang pagtantiya niya kung ang aktwal ay P306.80?", en: "Based on the estimated profit/kilo (P5, P10, P15, P20), Nena estimated the total profit to be <b>P325.00</b>. Is her estimation accurate if the actual is P306.80?" }, options: { tl: ["Hindi, masyadong mababa ang estimate.", "Oo, dahil maliit lang ang diperensya.", "Hindi, mas mataas ang estimate kaysa aktwal.", "Hindi matukoy."], en: ["No, the estimate is too low.", "Yes, because the difference is small.", "No, the estimate is higher than the actual.", "Cannot be determined."], }, answer: 1, topic: 'Estimation: Accuracy Check' }, // P325 vs P306.80 is close (around 6% difference)
            // Q30: Total Estimated Profit (Weekend) - Simplified Calculation
            { question: { tl: "Ang kinompyut na total na kita ni Nena tuwing Sabado at Linggo ay P659.60. Ang kaniyang tinantiyang kita ay P705.00. Ang pagtantiya ba ay <b>tumpak</b>?", en: "Nena's computed total profit on Saturday and Sunday is P659.60. Her estimated profit is P705.00. Is the estimation <b>accurate</b>?" }, options: { tl: ["Hindi, masyadong mataas ang P705.00.", "Oo, dahil ang estimate ay mas mataas.", "Oo, dahil ang difference ay maliit (sa loob ng hundreds).", "Hindi matukoy."], en: ["No, P705.00 is too high.", "Yes, because the estimate is higher.", "Yes, because the difference is small (within the hundreds).", "Cannot be determined."], }, answer: 2, topic: 'Estimation: Accuracy Check' } // P705 vs P659.60 is close (around 7% difference)
        ];

        let userAnswers = {}; // {qIndex: selectedOptionIndex}
        const quizName = "Pagsusulit: Pagtantiya";
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
            let section1Content = ''; // Q1-Q10 
            let section2Content = ''; // Q11-Q20 
            let section3Content = ''; // Q21-Q30 

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
                const selectedAnswer = userAnswers[index];
                if (selectedAnswer === q.answer) {
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
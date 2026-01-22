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
    <title>Pagsusulit: Pagdaragdag at Pagbabawas ng mga Desimal</title>
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
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght=400;600;700;800&display=swap');
        
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
        <header class="mb-4 relative">
            
            <!-- GO BACK BUTTON: Text "Go Back", size uniform at text-xl/w-6 h-6 -->
            <a href="http://localhost/als/front/test.php" class="absolute left-0 top-1/2 transform -translate-y-1/2 p-2 rounded-lg text-primary hover:bg-primary-light transition duration-150 flex items-center group text-xl">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 mr-1">
                    <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
                <span class="font-semibold" id="go-back-text">Go Back</span>
            </a>
            
            <div class="text-center">
                <h1 class="text-4xl font-extrabold text-primary mb-2" id="quiz-title">Pagsusulit: Pagdaragdag at Pagbabawas ng mga Desimal</h1>
                <p class="text-xl text-gray-600" id="quiz-subtitle">30 Items: Place Value, Addition, at Subtraction</p>
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
                    <!-- UPDATED LINK TO records.php AND UPDATED TEXT -->
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
            'quizTitle': { tl: "Pagsusulit: Pagdaragdag at Pagbabawas ng mga Desimal", en: "Quiz: Addition and Subtraction of Decimals" },
            'quizSubtitle': { tl: "30 Items: Place Value, Addition, at Subtraction", en: "30 Items: Place Value, Addition, and Subtraction" },
            'goBack': { tl: 'Bumalik', en: 'Go Back' },
            'section1Title': { tl: 'I. Aralin 1: Place Value, Halaga, at Conversion', en: 'I. Lesson 1: Place Value, Value, and Conversion' },
            'section2Title': { tl: 'II. Aralin 2: Pagdaragdag ng Desimal', en: 'II. Lesson 2: Addition of Decimals' },
            'section3Title': { tl: 'III. Aralin 3: Pagbabawas ng Desimal', en: 'III. Lesson 3: Subtraction of Decimals' },
            'submitButton': { tl: 'Tapusin at Tingnan ang Resulta', en: 'Finish and View Results' },
            'unansweredAlert': { tl: 'Kailangan mo pang sagutan ang', en: 'You still need to answer' },
            'unansweredAlertSuffix': { tl: 'na tanong bago mag-submit.', en: 'questions before submitting.' },
            'modalTitle': { tl: 'Resulta ng Pagsusulit', en: 'Quiz Results' },
            'modalScoreText': { tl: 'Nakakuha ka ng:', en: 'You scored:' },
            'modalReviewText': { tl: 'Tingnan ang iyong mga sagot sa ibaba para matuto.', en: 'Review your answers below to learn.' },
            'recordButton': { tl: 'I-record ang Resulta at Pumunta sa Talaan', en: 'Record Result and Go to Records' },
            'resetButton': { tl: 'Subukan Muli', en: 'Try Again' },
        };

        // --- QUIZ DATA (30 Items Total) - RETAINED ---
        const quizData = [
            // Section I: Aralin 1: Ang mga Desimal (Place Value, Halaga, Conversion) (1-10)
            // Q1: Write in words (Pre-test Q1) 14.509
            { 
                question: { tl: "Ano ang tamang pagbasa sa desimal na 14.509?", en: "What is the correct way to read the decimal 14.509?" }, 
                options: { tl: ["labing-apat at limandaan siyam na tenths", "labing-apat at limang daan siyam na thousandths", "labing-apat at limampung siyam na hundredths", "labing-apat at limang daan siyam"], en: ["fourteen and five hundred nine tenths", "fourteen and five hundred nine thousandths", "fourteen and fifty-nine hundredths", "fourteen and five hundred nine"] }, 
                answer: 1, topic: 'Reading Decimals' 
            },
            // Q2: Write in symbol (Pre-test Q2) "apatnapu't dalawa at animnapu't walong thousandths" -> 42.068
            { 
                question: { tl: "Isulat sa simbolo ang 'apatnapu't dalawa at animnapu't walong thousandths'.", en: "Write 'forty-two and sixty-eight thousandths' in symbols." }, 
                options: { tl: ["42.680", "42.068", "42.608", "42.0068"], en: ["42.680", "42.068", "42.608", "42.0068"] }, 
                answer: 1, topic: 'Writing Decimals' 
            },
            // Q3: Decimal to Fraction (Pre-test Q3) 0.043
            { 
                question: { tl: "Anong praksiyon ang katumbas ng 0.043?", en: "Which fraction is equivalent to 0.043?" }, 
                options: { tl: ["$\\frac{43}{100}$", "$\\frac{43}{1000}$", "$\\frac{43}{10000}$", "$\\frac{43}{10}$"], en: ["$\\frac{43}{100}$", "$\\frac{43}{1000}$", "$\\frac{43}{10000}$", "$\\frac{43}{10}$"] }, 
                answer: 1, topic: 'Decimal to Fraction' 
            },
            // Q4: Fraction to Decimal (Pre-test Q4) 12/25 = 0.48
            { 
                question: { tl: "Anong desimal ang katumbas ng $\\frac{12}{25}$?", en: "Which decimal is equivalent to $\\frac{12}{25}$?" }, 
                options: { tl: ["0.12", "0.25", "0.48", "0.52"], en: ["0.12", "0.25", "0.48", "0.52"] }, 
                answer: 2, topic: 'Fraction to Decimal' 
            },
            // Q5: Place Value (Pre-test Q5a) 0.107 (7)
            { 
                question: { tl: "Ano ang <b>place value</b> ng tambilang na 7 sa 0.107?", en: "What is the <b>place value</b> of the digit 7 in 0.107?" }, 
                options: { tl: ["Tenths", "Hundredths", "Thousandths", "Tig-iisa"], en: ["Tenths", "Hundredths", "Thousandths", "Ones"] }, 
                answer: 2, topic: 'Place Value' 
            },
            // Q6: Place Value (Pre-test Q5b) 0.174 (7)
            { 
                question: { tl: "Ano ang <b>halaga</b> (value) ng tambilang na 7 sa 0.174?", en: "What is the <b>value</b> of the digit 7 in 0.174?" }, 
                options: { tl: ["0.7", "0.07", "7", "70"], en: ["0.7", "0.07", "7", "70"] }, 
                answer: 1, topic: 'Value of Digits' 
            },
            // Q7: Place Value (Pre-test Q5c) 7.01 (7)
            { 
                question: { tl: "Ano ang <b>place value</b> ng tambilang na 7 sa 7.01?", en: "What is the <b>place value</b> of the digit 7 in 7.01?" }, 
                options: { tl: ["Tenths", "Tig-iisa", "Tig-sasampu", "Hundredths"], en: ["Tenths", "Ones", "Tens", "Hundredths"] }, 
                answer: 1, topic: 'Place Value' 
            },
            // Q8: Place Value (Pre-test Q5d) 1.72 (7)
            { 
                question: { tl: "Ano ang <b>halaga</b> (value) ng tambilang na 7 sa 1.72?", en: "What is the <b>value</b> of the digit 7 in 1.72?" }, 
                options: { tl: ["0.07", "7", "0.7", "70"], en: ["0.07", "7", "0.7", "70"] }, 
                answer: 2, topic: 'Value of Digits' 
            },
            // Q9: Comparison of Value (Aralin 1, Subukan Natin Ito Q2a) 13.003 (0.003) vs 13.003 (10)
            { 
                question: { tl: "Alin ang mas <b>mababang</b> halaga ng may salungguhit na tambilang sa 13.003?", en: "Which is the <b>lower</b> value of the underlined digit in 13.003?" }, 
                options: { tl: ["0.003", "3", "10", "1"], en: ["0.003", "3", "10", "1"] }, 
                answer: 0, topic: 'Comparing Value' 
            },
            // Q10: Comparison of Value (Aralin 1, Subukan Natin Ito Q3c) 92.069 (0.06) vs 92.069 (0.009)
            { 
                question: { tl: "Alin ang mas <b>mataas</b> na halaga ng may salungguhit na tambilang sa 92.069?", en: "Which is the <b>higher</b> value of the underlined digit in 92.069?" }, 
                options: { tl: ["90", "2", "0.06", "0.009"], en: ["90", "2", "0.06", "0.009"] }, 
                answer: 2, topic: 'Comparing Value' 
            },

            // Section II: Aralin 2: Pagdaragdag ng mga Desimal (11-20)
            // Q11: Simple Addition (Example 1) 1.69 + 0.63 = 2.32
            { 
                question: { tl: "Hanapin ang kabuuan ng 1.69 at 0.63.", en: "Find the sum of 1.69 and 0.63." }, 
                options: { tl: ["2.22", "2.32", "2.42", "2.12"], en: ["2.22", "2.32", "2.42", "2.12"] }, 
                answer: 1, topic: 'Simple Addition' 
            },
            // Q12: Simple Addition (Example 2) 14.34 + 1.628 + 3.96 = 19.928
            { 
                question: { tl: "Hanapin ang kabuuan ng 14.34, 1.628, at 3.96.", en: "Find the sum of 14.34, 1.628, and 3.96." }, 
                options: { tl: ["19.928", "20.008", "19.828", "19.748"], en: ["19.928", "20.008", "19.828", "19.748"] }, 
                answer: 0, topic: 'Simple Addition' 
            },
            // Q13: Simple Addition (Magbalik-aral Q1) 36.125 + 8.01 + 23.9 = 68.035
            { 
                question: { tl: "Hanapin ang kabuuan ng 36.125 + 8.01 + 23.9.", en: "Find the sum of 36.125 + 8.01 + 23.9." }, 
                options: { tl: ["67.035", "68.035", "68.135", "67.935"], en: ["67.035", "68.035", "68.135", "67.935"] }, 
                answer: 1, topic: 'Simple Addition' 
            },
            // Q14: Simple Addition (Magbalik-aral Q2) 0.539 + 0.987 + 0.83 = 2.356
            { 
                question: { tl: "Hanapin ang kabuuan ng 0.539 + 0.987 + 0.83.", en: "Find the sum of 0.539 + 0.987 + 0.83." }, 
                options: { tl: ["2.346", "2.456", "2.356", "2.256"], en: ["2.346", "2.456", "2.356", "2.256"] }, 
                answer: 2, topic: 'Simple Addition' 
            },
            // Q15: Word Problem (Money - Example 1) P31.75 + P22.15 + P15.50 + P73.65 = P143.05
            { 
                question: { tl: "Binili ni Aling Rita ang mantika (P31.75), tuna (P22.15), tomato sauce (P15.50), at gatas (P73.65). Magkano ang kabuuang binayaran niya?", en: "Aling Rita bought cooking oil (P31.75), tuna (P22.15), tomato sauce (P15.50), and milk (P73.65). What is the total amount she paid?" }, 
                options: { tl: ["P143.15", "P143.05", "P142.95", "P144.05"], en: ["P143.15", "P143.05", "P142.95", "P144.05"] }, 
                answer: 1, topic: 'Addition Word Problem (Money)' 
            },
            // Q16: Word Problem (Distance - Example 2) 3.45 km + 6.29 km + 5.17 km = 14.91 km
            { 
                question: { tl: "Ang distansiya ay 3.45 km, 6.29 km, at 5.17 km. Ano ang kabuuang nilakbay na distansiya?", en: "The distances are 3.45 km, 6.29 km, and 5.17 km. What is the total distance traveled?" }, 
                options: { tl: ["15.01 km", "14.81 km", "14.91 km", "15.11 km"], en: ["15.01 km", "14.81 km", "14.91 km", "15.11 km"] }, 
                answer: 2, topic: 'Addition Word Problem (Measure)' 
            },
            // Q17: Word Problem (Money - Magbalik-aral Q1) P564.85 + P974.75 + P615.25 + P841.60 = P2,996.45
            { 
                question: { tl: "Nagastos: P564.85 (pagkain), P974.75 (transportasyon), P615.25 (bahay), P841.60 (pasalubong). Kabuuang gastos?", en: "Expenses: P564.85 (food), P974.75 (transportation), P615.25 (house), P841.60 (souvenirs). Total expenses?" }, 
                options: { tl: ["P2,996.45", "P3,006.45", "P2,896.45", "P2,986.45"], en: ["P2,996.45", "P3,006.45", "P2,896.45", "P2,986.45"] }, 
                answer: 0, topic: 'Addition Word Problem (Money)' 
            },
            // Q18: Word Problem (Weight - Magbalik-aral Q2) 5.143 + 10.928 + 7.036 + 9.255 = 32.362 grams
            { 
                question: { tl: "Ang mga ginto ay may timbang na 5.143g, 10.928g, 7.036g, at 9.255g. Ano ang kabuuang timbang?", en: "The gold items weigh 5.143g, 10.928g, 7.036g, and 9.255g. What is the total weight?" }, 
                options: { tl: ["32.262 g", "32.362 g", "33.262 g", "32.462 g"], en: ["32.262 g", "32.362 g", "33.262 g", "32.462 g"] }, 
                answer: 1, topic: 'Addition Word Problem (Measure)' 
            },
            // Q19: Word Problem (Money - Alamin Natutuhan Q1) P22.95 + P23.25 + P63.15 + P40.50 = P149.85
            { 
                question: { tl: "Si Aling Azon ay bumili ng P22.95, P23.25, P63.15, at P40.50. Magkano ang nagastos niya?", en: "Aling Azon bought items worth P22.95, P23.25, P63.15, and P40.50. How much did she spend?" }, 
                options: { tl: ["P149.95", "P150.05", "P148.85", "P149.85"], en: ["P149.95", "P150.05", "P148.85", "P149.85"] }, 
                answer: 3, topic: 'Addition Word Problem (Money)' 
            },
            // Q20: Word Problem (Distance - Alamin Natutuhan Q2) 10.23 + 5.87 + 12.48 + 6.91 = 35.49 meters
            { 
                question: { tl: "Ang mga gilid ng hardin ay 10.23m, 5.87m, 12.48m, at 6.91m. Ilang metro ng bakod ang kailangan?", en: "The sides of the garden are 10.23m, 5.87m, 12.48m, and 6.91m. How many meters of fence are needed?" }, 
                options: { tl: ["35.39 m", "35.49 m", "36.49 m", "34.49 m"], en: ["35.39 m", "35.49 m", "36.49 m", "34.49 m"] }, 
                answer: 1, topic: 'Addition Word Problem (Measure)' 
            },

            // Section III: Aralin 3: Pagbabawas ng mga Desimal (21-30)
            // Q21: Simple Subtraction (Example 1) 0.89 - 0.74 = 0.15
            { 
                question: { tl: "Hanapin ang difference ng 0.89 at 0.74.", en: "Find the difference between 0.89 and 0.74." }, 
                options: { tl: ["0.25", "0.15", "0.14", "0.24"], en: ["0.25", "0.15", "0.14", "0.24"] }, 
                answer: 1, topic: 'Simple Subtraction' 
            },
            // Q22: Simple Subtraction (Example 2) 5.32 - 3.86 = 1.46 (with borrowing)
            { 
                question: { tl: "Ibawas ang 3.86 sa 5.32.", en: "Subtract 3.86 from 5.32." }, 
                options: { tl: ["1.56", "1.46", "1.36", "1.66"], en: ["1.56", "1.46", "1.36", "1.66"] }, 
                answer: 1, topic: 'Simple Subtraction' 
            },
            // Q23: Word Problem (Distance - Example 1) 14.37 m - 8.95 m = 5.42 m
            { 
                question: { tl: "Ang rolyo ng alambre ay 14.37 m. Kung binawasan ng 8.95 m, ilang metro ang natira?", en: "The roll of wire is 14.37 m. If 8.95 m was cut, how many meters remain?" }, 
                options: { tl: ["6.42 m", "5.42 m", "5.32 m", "6.32 m"], en: ["6.42 m", "5.42 m", "5.32 m", "6.32 m"] }, 
                answer: 1, topic: 'Subtraction Word Problem (Measure)' 
            },
            // Q24: Word Problem (Money - Example 2) P100 - P68.45 = P31.55 (with multiple borrowing)
            { 
                question: { tl: "Nagbigay ng P100 si Aling Carol sa halagang P68.45. Magkano ang kanyang sukli?", en: "Aling Carol gave P100 for an item costing P68.45. How much is her change?" }, 
                options: { tl: ["P31.45", "P32.55", "P31.55", "P30.55"], en: ["P31.45", "P32.55", "P31.55", "P30.55"] }, 
                answer: 2, topic: 'Subtraction Word Problem (Money)' 
            },
            // Q25: Word Problem (Money - Magbalik-aral Q1) P8,726.35 - P3,457.25 = P5,269.10
            { 
                question: { tl: "Ang P8,726.35 sa bangko ay binawasan ng P3,457.25. Magkano ang natira?", en: "P8,726.35 in the bank was reduced by P3,457.25. How much remains?" }, 
                options: { tl: ["P5,269.10", "P5,369.10", "P5,169.10", "P5,279.10"], en: ["P5,269.10", "P5,369.10", "P5,169.10", "P5,279.10"] }, 
                answer: 0, topic: 'Subtraction Word Problem (Money)' 
            },
            // Q26: Word Problem (Money - Magbalik-aral Q2) P724.50 - P330.80 = P393.70
            { 
                question: { tl: "Kinita ni Aling Sally P724.50. Gumastos siya P330.80. Magkano ang kanyang netong kinita?", en: "Aling Sally earned P724.50. She spent P330.80. What is her net earning?" }, 
                options: { tl: ["P394.70", "P393.70", "P383.70", "P392.70"], en: ["P394.70", "P393.70", "P383.70", "P392.70"] }, 
                answer: 1, topic: 'Subtraction Word Problem (Money)' 
            },
            // Q27: Word Problem (Money - Alamin Natutuhan Q1) P716.25 - P429.15 = P287.10
            { 
                question: { tl: "May P716.25 si Aling Mila. Binili niya ang damit na P429.15. Magkano ang natira?", en: "Aling Mila had P716.25. She bought a dress for P429.15. How much money remains?" }, 
                options: { tl: ["P287.10", "P277.10", "P297.10", "P286.10"], en: ["P287.10", "P277.10", "P297.10", "P286.10"] }, 
                answer: 0, topic: 'Subtraction Word Problem (Money)' 
            },
            // Q28: Word Problem (Weight - Alamin Natutuhan Q2) 80.7 - 46.9 = 33.8 kg
            { 
                question: { tl: "Rina at Lita ay may 80.7 kg. Kung si Rina ay 46.9 kg, ilan ang timbang ni Lita?", en: "Rina and Lita weigh 80.7 kg combined. If Rina is 46.9 kg, what is Lita's weight?" }, 
                options: { tl: ["34.8 kg", "33.8 kg", "32.8 kg", "33.6 kg"], en: ["34.8 kg", "33.8 kg", "32.8 kg", "33.6 kg"] }, 
                answer: 1, topic: 'Subtraction Word Problem (Measure)' 
            },
            // Q29: Word Problem (Time - Alamin Natutuhan Q3) 41.36 - 37.19 = 4.17 seconds
            { 
                question: { tl: "Jun: 41.36 segundo. Bong: 37.19 segundo. Ano ang difference ng kanilang bilis (oras)?", en: "Jun: 41.36 seconds. Bong: 37.19 seconds. What is the difference in their time/speed?" }, 
                options: { tl: ["4.27 segundo", "4.17 segundo", "3.97 segundo", "3.17 segundo"] , en: ["4.27 seconds", "4.17 seconds", "3.97 seconds", "3.17 seconds"] }, 
                answer: 1, topic: 'Subtraction Word Problem (Time)' 
            },
            // Q30: Word Problem (Money - Alamin Natutuhan Q4) P12,081.85 - P2,954.90 = P9,126.95
            { 
                question: { tl: "P12,081.85 ang deposito ni G. Guzman. Binawasan niya ng P2,954.90. Magkano ang natira?", en: "Mr. Guzman deposited P12,081.85. He withdrew P2,954.90. How much remains?" }, 
                options: { tl: ["P9,026.95", "P9,126.95", "P8,926.95", "P9,136.95"], en: ["P9,026.95", "P9,126.95", "P8,926.95", "P9,136.95"] }, 
                answer: 1, topic: 'Subtraction Word Problem (Money)' }
        ];

        let userAnswers = {}; // {qIndex: selectedOptionIndex}
        const quizName = "Pagsusulit: Pagdaragdag at Pagbabawas ng mga Desimal";
        const quizLevelRawId = "elementary";
        const quizLevelDisplay = "Elementary"; 
        let currentQuizResult = null; 

        // --- DOM Elements ---
        const resultsModal = () => document.getElementById('results-modal');
        const submitButton = () => document.getElementById('submit-button');
        const scoreDisplay = () => document.getElementById('score-display');
        const customAlertBox = () => document.getElementById('custom-alert-box');
        const recordButtonLink = () => document.getElementById('record-button-link');
        const goBackText = () => document.getElementById('go-back-text');
        const modalTitle = () => document.getElementById('modal-title');
        const modalScoreText = () => document.getElementById('modal-score-text');
        const modalReviewText = () => document.getElementById('modal-review-text');
        const resetButtonModal = () => document.getElementById('reset-button-modal');


        /**
         * Nagpapakita ng custom, non-blocking alert message.
         * @param {string} message - Ang mensaheng ipapakita.
         */
        function showAlert(message) {
            const alertBox = customAlertBox();
            alertBox.textContent = message;
            alertBox.classList.remove('hidden');
            alertBox.style.opacity = '1';
            
            setTimeout(() => {
                alertBox.style.opacity = '0';
                setTimeout(() => {
                    alertBox.classList.add('hidden');
                }, 300);
            }, 4000);
        }
        
        /**
         * Renders the quiz questions into the three separate cards, translated.
         */
        function renderQuiz() {
            const lang = currentLanguage;
            const quizContent = document.getElementById('quiz-content');
            
            // Separate strings for content that will go inside the section cards
            let section1Content = '';
            let section2Content = '';
            let section3Content = '';

            // Separate HTML for the header/title of each card, using the current language
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

                // Generate the question structure, using current language for question text
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
            goBackText().textContent = uiText.goBack[lang];
            submitButton().textContent = uiText.submitButton[lang];
            
            // Modal elements
            modalTitle().textContent = uiText.modalTitle[lang];
            modalScoreText().textContent = uiText.modalScoreText[lang];
            modalReviewText().textContent = uiText.modalReviewText[lang];
            recordButtonLink().textContent = uiText.recordButton[lang];
            resetButtonModal().textContent = uiText.resetButton[lang];
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
         * Explicitly saves the current quiz result to BOTH storage keys (GLOBAL and USER-SPECIFIC).
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
            const quizKey = `${recordToSave.name}-${recordToSave.rawLevelId}`; // Unique identifier for the quiz
            const existingIndex = userRecords.findIndex(r => `${r.name}-${r.rawLevelId}` === quizKey);

            if (existingIndex > -1) {
                // Update: Replace the old score for this quiz with the new score
                userRecords[existingIndex] = recordToSave;
            } else {
                // Insert: Add the new score
                userRecords.push(recordToSave);
            }
            
            localStorage.setItem(USER_RECORDS_KEY, JSON.stringify(userRecords));
            console.log("Quiz record saved globally and user-specifically:", recordToSave);
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
         * Submits the quiz, calculates the score, and displays results.
         * Change: includes submission time (human-readable and ISO) so stored records show when the quiz was submitted.
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


            // --- 1. PREPARE THE RESULT OBJECT (NOW INCLUDES TIME INFO) ---
            const now = new Date();
            currentQuizResult = {
                name: quizName,
                rawLevelId: quizLevelRawId, 
                level: quizLevelDisplay, 
                score: `${correctCount}/${totalQuestions}`,
                percentage: Math.round((correctCount / totalQuestions) * 100),
                date: now.toLocaleDateString('en-US'),
                time: now.toLocaleTimeString('en-US'),   // human-readable time, e.g. "3:24:15 PM"
                submittedAt: now.toISOString()           // ISO timestamp for precise ordering/filtering
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
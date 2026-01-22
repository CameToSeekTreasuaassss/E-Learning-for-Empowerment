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
    <title>Pagsusulit: Pagpaparami at Paghahati ng mga Desimal</title>
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
                <h1 class="text-4xl font-extrabold text-primary mb-2" id="quiz-title">Pagsusulit: Pagpaparami at Paghahati ng mga Desimal</h1>
                <p class="text-xl text-gray-600" id="quiz-subtitle">30 Items: Multiplication, Division, at Word Problems</p>
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
            'quizTitle': { tl: "Pagsusulit: Pagpaparami at Paghahati ng mga Desimal", en: "Quiz: Multiplication and Division of Decimals" },
            'quizSubtitle': { tl: "30 Items: Multiplication, Division, at Word Problems", en: "30 Items: Multiplication, Division, and Word Problems" },
            'goBack': { tl: 'Bumalik', en: 'Go Back' },
            'section1Title': { tl: 'I. Pagpaparami ng mga Desimal (Multiplication)', en: 'I. Multiplication of Decimals' },
            'section2Title': { tl: 'II. Paghahati ng mga Desimal (Division)', en: 'II. Division of Decimals' },
            'section3Title': { tl: 'III. Word Problems (Pagpaparami at Paghahati)', en: 'III. Word Problems (Multiplication and Division)' },
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
        const quizData = [
            // Section I: Multiplication of Decimals (1-10)
            // Q1: 4.38 * 3.6 (Pre-test Q1)
            { 
                question: { tl: "Hanapin ang product ng 4.38 at 3.6.", en: "Find the product of 4.38 and 3.6." }, 
                options: { tl: ["15.768", "14.868", "16.148", "15.908"], en: ["15.768", "14.868", "16.148", "15.908"] }, 
                answer: 0, topic: 'Multiplication' 
            },
            // Q2: .7 * .8 (Example 1A)
            { 
                question: { tl: "Hanapin ang product ng 0.7 at 0.8.", en: "Find the product of 0.7 and 0.8." }, 
                options: { tl: ["5.6", "0.56", "0.056", "56.0"], en: ["5.6", "0.56", "0.056", "56.0"] }, 
                answer: 1, topic: 'Multiplication' 
            },
            // Q3: .25 * .6 (Example 1B)
            { 
                question: { tl: "Hanapin ang product ng 0.25 at 0.6.", en: "Find the product of 0.25 and 0.6." }, 
                options: { tl: ["1.50", "0.150", "0.015", "15.0"], en: ["1.50", "0.150", "0.015", "15.0"] }, 
                answer: 1, topic: 'Multiplication' 
            },
            // Q4: 3.7 * 1.68 (Example 2)
            { 
                question: { tl: "Hanapin ang product ng 3.7 at 1.68.", en: "Find the product of 3.7 and 1.68." }, 
                options: { tl: ["6.016", "6.216", "5.816", "6.416"], en: ["6.016", "6.216", "5.816", "6.416"] }, 
                answer: 1, topic: 'Multiplication' 
            },
            // Q5: 235 * 0.146 (Example 3)
            { 
                question: { tl: "Hanapin ang product ng 235 at 0.146.", en: "Find the product of 235 and 0.146." }, 
                options: { tl: ["343.10", "34.310", "3.431", "3431.0"], en: ["343.10", "34.310", "3.431", "3431.0"] }, 
                answer: 1, topic: 'Multiplication' 
            },
            // Q6: 386 * 1.50 (Example 4)
            { 
                question: { tl: "Hanapin ang product ng 386 at 1.50.", en: "Find the product of 386 and 1.50." }, 
                options: { tl: ["57.90", "579.0", "5790.0", "57.900"], en: ["57.90", "579.0", "5790.0", "57.900"] }, 
                answer: 1, topic: 'Multiplication' 
            },
            // Q7: 5.28 * 2.07 (Example 5)
            { 
                question: { tl: "Hanapin ang product ng 5.28 at 2.07.", en: "Find the product of 5.28 and 2.07." }, 
                options: { tl: ["109.296", "10.9296", "1.09296", "1092.96"], en: ["109.296", "10.9296", "1.09296", "1092.96"] }, 
                answer: 1, topic: 'Multiplication' 
            },
            // Q8: 4.7 * 2.9 (Let's Try This Q1)
            { 
                question: { tl: "Hanapin ang product ng 4.7 at 2.9.", en: "Find the product of 4.7 and 2.9." }, 
                options: { tl: ["13.63", "12.83", "136.3", "1.363"], en: ["13.63", "12.83", "136.3", "1.363"] }, 
                answer: 0, topic: 'Multiplication' 
            },
            // Q9: 3.45 * 2.1 (Let's Try This Q2)
            { 
                question: { tl: "Hanapin ang product ng 3.45 at 2.1.", en: "Find the product of 3.45 at 2.1." }, 
                options: { tl: ["7.245", "72.45", "6.905", "7.155"], en: ["7.245", "72.45", "6.905", "7.155"] }, 
                answer: 0, topic: 'Multiplication' 
            },
            // Q10: 23.75 * 2.5 (Let's Try This Q3)
            { 
                question: { tl: "Hanapin ang product ng 23.75 at 2.5.", en: "Find the product of 23.75 and 2.5." }, 
                options: { tl: ["59.375", "5.9375", "593.75", "60.125"], en: ["59.375", "5.9375", "593.75", "60.125"] }, 
                answer: 0, topic: 'Multiplication' 
            },
            
            // Section II: Division of Decimals (11-20)
            // Q11: 143.60 / 4 (Example 1a)
            { 
                question: { tl: "I-divide: 143.60 ÷ 4.", en: "Divide: 143.60 ÷ 4." }, 
                options: { tl: ["35.9", "35.90", "36.25", "36.9"], en: ["35.9", "35.90", "36.25", "36.9"] }, 
                answer: 1, topic: 'Division (by Whole)' 
            },
            // Q12: 5.075 / 25 (Example 1b)
            { 
                question: { tl: "I-divide: 5.075 ÷ 25.", en: "Divide: 5.075 ÷ 25." }, 
                options: { tl: ["0.203", "2.03", "0.23", "0.0203"], en: ["0.203", "2.03", "0.23", "0.0203"] }, 
                answer: 0, topic: 'Division (by Whole)' 
            },
            // Q13: 19.44 / .4 (Example 2a)
            { 
                question: { tl: "I-divide: 19.44 ÷ 0.4.", en: "Divide: 19.44 ÷ 0.4." }, 
                options: { tl: ["4.86", "48.6", "486.0", "4.06"], en: ["4.86", "48.6", "486.0", "4.06"] }, 
                answer: 1, topic: 'Division (by Decimal)' 
            },
            // Q14: 4.984 / .14 (Example 2b)
            { 
                question: { tl: "I-divide: 4.984 ÷ 0.14.", en: "Divide: 4.984 ÷ 0.14." }, 
                options: { tl: ["35.06", "35.6", "3.56", "356.0"], en: ["35.06", "35.6", "3.56", "356.0"] }, 
                answer: 1, topic: 'Division (by Decimal)' 
            },
            // Q15: 129.5 / .12 (Example 2c)
            { 
                question: { tl: "I-divide: 129.5 ÷ 0.12.", en: "Divide: 129.5 ÷ 0.12." }, 
                options: { tl: ["1079.16", "107.9", "1079.2", "1079"], en: ["1079.16", "107.9", "1079.2", "1079"] }, 
                answer: 2, topic: 'Division (with Remainder/Rounding)' 
            },
            // Q16: 30.855 / 3.74 (Pre-test Q3)
            { 
                question: { tl: "I-divide: 30.855 ÷ 3.74.", en: "Divide: 30.855 ÷ 3.74." }, 
                options: { tl: ["8.25", "8.55", "8.15", "8.05"], en: ["8.25", "8.55", "8.15", "8.05"] }, 
                answer: 0, topic: 'Division (by Decimal)' 
            },
            // Q17: 27.47 / 4.1 (Let's Try This Q2)
            { 
                question: { tl: "I-divide: 27.47 ÷ 4.1.", en: "Divide: 27.47 ÷ 4.1." }, 
                options: { tl: ["6.7", "67.0", "6.07", "6.9"], en: ["6.7", "67.0", "6.07", "6.9"] }, 
                answer: 0, topic: 'Division (by Decimal)' 
            },
            // Q18: 2.6784 / 1.08 (Let's Try This Q3)
            { 
                question: { tl: "I-divide: 2.6784 ÷ 1.08.", en: "Divide: 2.6784 ÷ 1.08." }, 
                options: { tl: ["2.48", "24.8", "0.248", "2.048"], en: ["2.48", "24.8", "0.248", "2.048"] }, 
                answer: 0, topic: 'Division (by Decimal)' 
            },
            // Q19: 28.47 / 0.7 (Let's Try This Q4)
            { 
                question: { tl: "I-divide: 28.47 ÷ 0.7.", en: "Divide: 28.47 ÷ 0.7." }, 
                options: { tl: ["40.6", "40.67", "40.06", "40.671"], en: ["40.6", "40.67", "40.06", "40.671"] }, 
                answer: 0, topic: 'Division (by Decimal)' 
            },
            // Q20: 43.8 / 0.32 (Let's Try This Q5)
            { 
                question: { tl: "I-divide: 43.8 ÷ 0.32.", en: "Divide: 43.8 ÷ 0.32." }, 
                options: { tl: ["136.875", "13.6875", "136.08", "136.25"], en: ["136.875", "13.6875", "136.08", "136.25"] }, 
                answer: 0, topic: 'Division (by Decimal)' 
            },
            
            // Section III: Word Problems (Multiplication and Division) (21-30)
            // Q21: Multiplication (P48.65 * 3.5) (Example 2)
            { 
                question: { tl: "Magkano ang babayaran sa 3.5 kilos ng mangga kung P48.65 ang kada kilo?", en: "How much is paid for 3.5 kilograms of mangoes if P48.65 is the price per kilo?" }, 
                options: { tl: ["P170.28", "P168.98", "P170.30", "P172.00"], en: ["P170.28", "P168.98", "P170.30", "P172.00"] }, 
                answer: 2, topic: 'Multiplication Word Problem' 
            },
            // Q22: Multiplication (P25.65 * 14) (Let's Try This Q2)
            { 
                question: { tl: "Magkano ang nagastos ni Rosalie sa 14 na araw kung P25.65 ang daily snack niya?", en: "How much did Rosalie spend in 14 days if her daily snack costs P25.65?" }, 
                options: { tl: ["P359.10", "P349.50", "P350.10", "P345.90"], en: ["P359.10", "P349.50", "P350.10", "P345.90"] }, 
                answer: 0, topic: 'Multiplication Word Problem' 
            },
            // Q23: Division (P201.25 / P5.75) (Example 1)
            { 
                question: { tl: "Ilang pack ng instant noodles ang nabili kung P201.25 ang binayaran at P5.75 ang bawat pack?", en: "How many packs of instant noodles were bought if P201.25 was paid and P5.75 is the price per pack?" }, 
                options: { tl: ["32", "35", "40", "38"], en: ["32", "35", "40", "38"] }, 
                answer: 1, topic: 'Division Word Problem' 
            },
            // Q24: Multiplication (P48.95 * 150) (Let's See What You've Learned Q1)
            { 
                question: { tl: "Kung P48.95 ang palitan at nakatanggap ng $150, magkano iyon sa Philippine peso?", en: "If the exchange rate is P48.95 and $150 was received, how much is that in Philippine peso?" }, 
                options: { tl: ["P7,342.50", "P7,423.50", "P7,345.00", "P7,432.00"], en: ["P7,342.50", "P7,423.50", "P7,345.00", "P7,432.00"] }, 
                answer: 0, topic: 'Multiplication Word Problem' 
            },
            // Q25: Division (P2,347.20 / P97.80) (Let's See What You've Learned Q1B.1)
            { 
                question: { tl: "Ilang araw kailangan magtrabaho para kumita ng P2,347.20 kung P97.80 ang kita kada araw?", en: "How many days must one work to earn P2,347.20 if the daily wage is P97.80?" }, 
                options: { tl: ["20", "22", "24", "25"], en: ["20", "22", "24", "25"] }, 
                answer: 2, topic: 'Division Word Problem' 
            },
            // Q26: Division (344.5 / 6.5) (Let's See What You've Learned Q1B.2)
            { 
                question: { tl: "Ilang kaban ng bigas ang ani kada hektarya kung 344.5 kaban ang ani sa 6.5 hektarya ng lupa?", en: "How many sacks of rice are harvested per hectare if 344.5 sacks were harvested from 6.5 hectares of land?" }, 
                options: { tl: ["43", "53", "55", "63"], en: ["43", "53", "55", "63"] }, 
                answer: 1, topic: 'Division Word Problem' 
            },
            // Q27: Multiplication (41.5 * 5.5) (What Have You Learned Q1)
            { 
                question: { tl: "Gaano kalayo ang mararating sa 5.5 oras kung 41.5 km/hr ang bilis ng pagbiyahe?", en: "How far can one travel in 5.5 hours if the travel speed is 41.5 km/hr?" }, 
                options: { tl: ["228.25 km", "228.55 km", "238.25 km", "229.00 km"], en: ["228.25 km", "228.55 km", "238.25 km", "229.00 km"] }, 
                answer: 0, topic: 'Multiplication Word Problem' 
            },
            // Q28: Division (15.4 / 0.4) (What Have You Learned Q4)
            { 
                question: { tl: "Ano ang average speed ng bus kung 15.4 km ang nilakbay sa 0.4 oras?", en: "What is the average speed of the bus if 15.4 km was traveled in 0.4 hours?" }, 
                options: { tl: ["38.5 km/hr", "38.0 km/hr", "38.25 km/hr", "39.0 km/hr"], en: ["38.5 km/hr", "38.0 km/hr", "38.25 km/hr", "39.0 km/hr"] }, 
                answer: 0, topic: 'Division Word Problem' 
            },
            // Q29: Multiplication (P49.75 * 275) (What Have You Learned Q2)
            { 
                question: { tl: "Kung P49.75 ang palitan at nakatanggap ng $275, magkano iyon sa Philippine peso?", en: "If the exchange rate is P49.75 and $275 was received, how much is that in Philippine peso?" }, 
                options: { tl: ["P13,681.25", "P13,781.50", "P13,675.00", "P13,800.00"], en: ["P13,681.25", "P13,781.50", "P13,675.00", "P13,800.00"] }, 
                answer: 0, topic: 'Multiplication Word Problem' 
            },
            // Q30: Division (P225.75 / P0.50) (What Have You Learned Q3)
            { 
                question: { tl: "Ilang piraso ng pandesal ang dapat ibigay kung P225.75 ang binayaran at P0.50 ang kada piraso?", en: "How many pieces of pandesal should be given if P225.75 was paid and P0.50 is the price per piece?" }, 
                options: { tl: ["450.5", "451.5", "452.0", "453.5"], en: ["450.5", "451.5", "452.0", "453.5"] }, 
                answer: 1, topic: 'Division Word Problem' }
        ];

        let userAnswers = {}; // {qIndex: selectedOptionIndex}
        const quizName = "Pagsusulit: Pagpaparami at Paghahati ng mga Desimal";
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
                // Insert: Add the new score
                userRecords.push(recordToSave);
            }
            
            localStorage.setItem(USER_RECORDS_KEY, JSON.stringify(userRecords));
            console.log("Quiz record saved globally and user-specifically:", recordToSave);
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
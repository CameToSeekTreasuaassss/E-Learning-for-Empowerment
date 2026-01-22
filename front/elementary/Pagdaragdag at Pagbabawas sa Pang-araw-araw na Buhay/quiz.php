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
    <title>Pagsusulit: Pagdaragdag at Pagbabawas sa Pang-araw-araw na Buhay</title>
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
                <h1 class="text-4xl font-extrabold text-primary mb-2" id="quiz-title">Pagsusulit: Pagdaragdag at Pagbabawas sa Pang-araw-araw na Buhay</h1>
                <p class="text-xl text-gray-600" id="quiz-subtitle">30 Items: Halaga ng Posisyon, Pagdaragdag, at Pagbabawas</p>
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
                    <!-- UPDATED LINK AND TEXT FOR DUAL-KEY STORAGE -->
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
            'quizTitle': { tl: "Pagsusulit: Pagdaragdag at Pagbabawas sa Pang-araw-araw na Buhay", en: "Quiz: Addition and Subtraction in Daily Life" },
            'quizSubtitle': { tl: "30 Items: Halaga ng Posisyon, Pagdaragdag, at Pagbabawas", en: "30 Items: Place Value, Addition, and Subtraction" },
            'goBack': { tl: 'Bumalik', en: 'Go Back' },
            'section1Title': { tl: 'I. Aralin 1: Ang Sistema ng Place-Value Numeration', en: 'I. Lesson 1: The Place-Value Numeration System' },
            'section2Title': { tl: 'II. Aralin 2: Ang Pagdaragdag sa Pang-araw-araw na Buhay', en: 'II. Lesson 2: Addition in Daily Life' },
            'section3Title': { tl: 'III. Aralin 3: Ang Pagbabawas sa Pang-araw-araw na Buhay', en: 'III. Lesson 3: Subtraction in Daily Life' },
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
            // Section I: Aralin 1: Ang Sistema ng Place-Value Numeration (1-10)
            // Q1: Number of digits in 3456 (Pre-test Q1)
            { 
                question: { tl: "Ilang tambilang mayroon ang bilang na 3456?", en: "How many digits does the number 3456 have?" }, 
                options: { tl: ["2", "3", "4", "5"], en: ["2", "3", "4", "5"] }, 
                answer: 2, topic: 'Count Digits' 
            },
            // Q2: Value of 5 in 546 (Pre-test Q2)
            { 
                question: { tl: "Ano ang halaga ng tambilang na 5 sa bilang na 546?", en: "What is the value of the digit 5 in the number 546?" }, 
                options: { tl: ["5 tig-iisa (5)", "5 tig-sasampu (50)", "5 tig-iisang daan (500)", "5 tig-iisang libo (5000)"], en: ["5 ones (5)", "5 tens (50)", "5 hundreds (500)", "5 thousands (5000)"] }, 
                answer: 2, topic: 'Place Value' 
            },
            // Q3: Highest value of 8 (Pre-test Q3)
            { 
                question: { tl: "Sa aling bilang may pinakamataas na halaga ang 8?", en: "In which number does 8 have the highest value?" }, 
                options: { tl: ["8 na tig-iisa", "8 tig-sasampu", "8 tig-iisang daan", "8 tig-iisang libo"], en: ["8 ones", "8 tens", "8 hundreds", "8 thousands"] }, 
                answer: 3, topic: 'Comparing Value' 
            },
            // Q4: Value of 2 in 12567 (Alamin Natutuhan Q2a)
            { 
                question: { tl: "Ano ang halaga ng tambilang na 2 sa 12,567?", en: "What is the value of the digit 2 in 12,567?" }, 
                options: { tl: ["Dalawampu (20)", "Dalawang daan (200)", "Dalawang libo (2,000)", "Dalawampung libo (20,000)"], en: ["Twenty (20)", "Two hundred (200)", "Two thousand (2,000)", "Twenty thousand (20,000)"] }, 
                answer: 2, topic: 'Place Value' 
            },
            // Q5: Value of 2 in 289540 (Alamin Natutuhan Q2d)
            { 
                question: { tl: "Ano ang halaga ng tambilang na 2 sa 289,540?", en: "What is the value of the digit 2 in 289,540?" }, 
                options: { tl: ["Dalawampung libo (20,000)", "Dalawang daan (200)", "Dalawang daang libo (200,000)", "Dalawang libo (2,000)"], en: ["Twenty thousand (20,000)", "Two hundred (200)", "Two hundred thousand (200,000)", "Two thousand (2,000)"] }, 
                answer: 2, topic: 'Place Value' 
            },
            // Q6: Comparing Value: 9 tig-iisang daan (900) vs 90 tig-iisa (90) (Subukan Natin Ito a)
            { 
                question: { tl: "Alin ang may mas higit na halaga: 9 na tig-iisang daan (900) o 90 na tig-iisa (90)?", en: "Which has a higher value: 9 hundreds (900) or 90 ones (90)?" }, 
                options: { tl: ["90", "900", "Sila ay magkatumbas", "Hindi matukoy"], en: ["90", "900", "They are equal", "Cannot be determined"] }, 
                answer: 1, topic: 'Comparing Value' 
            },
            // Q7: Comparing Value: 4356 vs 3456 (Alamin Natutuhan Q3b)
            { 
                question: { tl: "Sa aling bilang mas malaki ang halaga ng tambilang na 4: 4,356 o 3,456?", en: "In which number is the value of the digit 4 greater: 4,356 or 3,456?" }, 
                options: { tl: ["4,356", "3,456", "Sila ay magkatumbas", "Wala"], en: ["4,356", "3,456", "They are equal", "None"] }, 
                answer: 0, topic: 'Comparing Value' 
            },
            // Q8: Value of 6 in 689 (Alamin Natutuhan Q2b)
            { 
                question: { tl: "Ano ang halaga ng tambilang na 6 sa 689?", en: "What is the value of the digit 6 in 689?" }, 
                options: { tl: ["600", "60", "6,000", "6"], en: ["600", "60", "6,000", "6"] }, 
                answer: 0, topic: 'Place Value' 
            },
            // Q9: Value of 2 in 87214 (Alamin Natutuhan Q2e)
            { 
                question: { tl: "Ano ang halaga ng tambilang na 2 sa 87,214?", en: "What is the value of the digit 2 in 87,214?" }, 
                options: { tl: ["2", "20", "200", "2,000"], en: ["2", "20", "200", "2,000"] }, 
                answer: 2, topic: 'Place Value' 
            },
            // Q10: Digits in 765432 (Alamin Natutuhan Q1b)
            { 
                question: { tl: "Ilang tambilang mayroon ang bilang na 765,432?", en: "How many digits does the number 765,432 have?" }, 
                options: { tl: ["5", "6", "7", "8"], en: ["5", "6", "7", "8"] }, 
                answer: 1, topic: 'Count Digits' 
            },

            // Section II: Aralin 2: Ang Pagdaragdag sa Pang-araw-araw na Buhay (11-20)
            // Q11: Simple Addition: 5 + 4 (Pre-test Q4)
            { 
                question: { tl: "Ano ang kabuuan ng 5 dinagdagan ng 4?", en: "What is the sum of 5 plus 4?" }, 
                options: { tl: ["5", "4", "9", "45"], en: ["5", "4", "9", "45"] }, 
                answer: 2, topic: 'Simple Addition' 
            },
            // Q12: Simple Addition: 15 + 8 (Pre-test Q5)
            { 
                question: { tl: "Ano ang kabuuan ng 15 at 8?", en: "What is the sum of 15 and 8?" }, 
                options: { tl: ["16", "20", "23", "30"], en: ["16", "20", "23", "30"] }, 
                answer: 2, topic: 'Simple Addition' 
            },
            // Q13: Word Problem: 9 + 18 (Pre-test Q6)
            { 
                question: { tl: "Ang pamasahe ni Jessie ay P9 at ni Jamie ay P18. Magkano ang kabuuang babayaran nila?", en: "Jessie's fare is P9 and Jamie's is P18. What is their total payment?" }, 
                options: { tl: ["P24", "P25", "P26", "P27"], en: ["P24", "P25", "P26", "P27"] }, 
                answer: 3, topic: 'Addition Word Problem' 
            },
            // Q14: Word Problem: 5 + 7 + 9 (Pre-test Q7)
            { 
                question: { tl: "Bumili si Aling Mila ng 5 dalandan, 7 mansanas, at 9 na mangga. Ilan ang kabuuang prutas?", en: "Aling Mila bought 5 oranges, 7 apples, and 9 mangoes. What is the total number of fruits?" }, 
                options: { tl: ["21", "25", "19", "12"], en: ["21", "25", "19", "12"] }, 
                answer: 0, topic: 'Addition Word Problem' 
            },
            // Q15: Addition: 247 + 532 (Subukan Natin Ito b)
            { 
                question: { tl: "Ipagdagdag: 247 + 532.", en: "Add: 247 + 532." }, 
                options: { tl: ["769", "779", "789", "799"], en: ["769", "779", "789", "799"] }, 
                answer: 1, topic: 'Addition (No Regrouping)' 
            },
            // Q16: Addition: 95 + 98 (Example)
            { 
                question: { tl: "Hanapin ang kabuuan ng 95 at 98.", en: "Find the sum of 95 and 98." }, 
                options: { tl: ["183", "193", "173", "188"], en: ["183", "193", "173", "188"] }, 
                answer: 1, topic: 'Addition (With Regrouping)' 
            },
            // Q17: Addition: 478 + 735 (Example)
            { 
                question: { tl: "Ipagdagdag: 478 + 735.", en: "Add: 478 + 735." }, 
                options: { tl: ["1203", "1213", "1313", "1113"], en: ["1203", "1213", "1313", "1113"] }, 
                answer: 1, topic: 'Addition (With Regrouping)' 
            },
            // Q18: Word Problem: 356 + 128 + 25 (Sagutan Natin Ito Q2)
            { 
                question: { tl: "Gumastos si Mang Lino ng P356 (aklat), P128 (kwaderno), at P25 (lapis). Magkanong lahat ang ginugol niya?", en: "Mang Lino spent P356 (books), P128 (notebooks), and P25 (pencil). How much did he spend in total?" }, 
                options: { tl: ["P409", "P499", "P509", "P519"], en: ["P409", "P499", "P509", "P519"] }, 
                answer: 3, topic: 'Addition Word Problem' 
            },
            // Q19: Word Problem: 472 + 88 + 122 (Sagutan Natin Ito Q3)
            { 
                question: { tl: "May 472 holen si Ariel. Binigyan siya ng 88 at 122. Ilan lahat ang holen niya?", en: "Ariel had 472 marbles. He was given 88 and 122 more. How many marbles does he have in total?" }, 
                options: { tl: ["672", "682", "692", "702"], en: ["672", "682", "692", "702"] }, 
                answer: 1, topic: 'Addition Word Problem' 
            },
            // Q20: Addition: 45 + 258 + 35 (Alamin Natutuhan Q1d)
            { 
                question: { tl: "Ipagdagdag: 45 + 258 + 35.", en: "Add: 45 + 258 + 35." }, 
                options: { tl: ["338", "348", "358", "328"], en: ["338", "348", "358", "328"] }, 
                answer: 0, topic: 'Addition (With Regrouping)' 
            },

            // Section III: Aralin 3: Ang Pagbabawas sa Pang-araw-araw na Buhay (21-30)
            // Q21: Simple Subtraction: 9 - 2 (Pre-test Q8)
            { 
                question: { tl: "Ano ang 9 na binawasan ng 2?", en: "What is 9 minus 2?" }, 
                options: { tl: ["11", "7", "29", "92"], en: ["11", "7", "29", "92"] }, 
                answer: 1, topic: 'Simple Subtraction' 
            },
            // Q22: Word Problem: 17 - 8 (Pre-test Q9)
            { 
                question: { tl: "May 17 aklat. Humiram ng 8. Ilan ang natira?", en: "There are 17 books. 8 were borrowed. How many are left?" }, 
                options: { tl: ["10", "9", "8", "7"], en: ["10", "9", "8", "7"] }, 
                answer: 1, topic: 'Subtraction Word Problem' 
            },
            // Q23: Word Problem: 12 - 5 - 4 - 3 (Pre-test Q10)
            { 
                question: { tl: "Bumili si Mang Raul ng 12 kaban ng bigas. Ibinigay niya ang 5, 4, at 3 kaban. Ilang kaban ang natira?", en: "Mang Raul bought 12 sacks of rice. He gave away 5, 4, and 3 sacks. How many sacks are left?" }, 
                options: { tl: ["5", "4", "3", "0"], en: ["5", "4", "3", "0"] }, 
                answer: 3, topic: 'Subtraction Word Problem' 
            },
            // Q24: Subtraction: 98 - 52 (Example 1)
            { 
                question: { tl: "Ipagbawas: 98 - 52.", en: "Subtract: 98 - 52." }, 
                options: { tl: ["44", "45", "46", "47"], en: ["44", "45", "46", "47"] }, 
                answer: 2, topic: 'Subtraction (No Regrouping)' 
            },
            // Q25: Subtraction: 544 - 320 (Example 2)
            { 
                question: { tl: "Ipagbawas: 544 - 320.", en: "Subtract: 544 - 320." }, 
                options: { tl: ["214", "224", "234", "244"], en: ["214", "224", "234", "244"] }, 
                answer: 1, topic: 'Subtraction (No Regrouping)' 
            },
            // Q26: Subtraction: 153 - 24 (Example 1 w/ Regrouping)
            { 
                question: { tl: "Ipagbawas: 153 - 24.", en: "Subtract: 153 - 24." }, 
                options: { tl: ["119", "129", "139", "109"], en: ["119", "129", "139", "109"] }, 
                answer: 1, topic: 'Subtraction (With Regrouping)' 
            },
            // Q27: Subtraction: 935 - 478 (Example 2 w/ Regrouping)
            { 
                question: { tl: "Ipagbawas: 935 - 478.", en: "Subtract: 935 - 478." }, 
                options: { tl: ["457", "547", "467", "557"], en: ["457", "547", "467", "557"] }, 
                answer: 0, topic: 'Subtraction (With Regrouping)' 
            },
            // Q28: Subtraction: 700 - 365 (Example 2 w/ Zero)
            { 
                question: { tl: "Ipagbawas: 700 - 365.", en: "Subtract: 700 - 365." }, 
                options: { tl: ["335", "345", "435", "305"], en: ["335", "345", "435", "305"] }, 
                answer: 0, topic: 'Subtraction (With Zero)' 
            },
            // Q29: Word Problem: 35 - 25 (Alamin Natutuhan Q6)
            { 
                question: { tl: "May 35m tela si Aling Rosa. Ginamit ang 25m para sa pantakip ng kama. Ilang metro ang natira para sa punda ng unan?", en: "Aling Rosa has 35m of cloth. She used 25m for the bed cover. How many meters are left for the pillowcase?" }, 
                options: { tl: ["8m", "9m", "10m", "12m"], en: ["8m", "9m", "10m", "12m"] }, 
                answer: 2, topic: 'Subtraction Word Problem' 
            },
            // Q30: Word Problem: 900 - 567 (Alamin Natutuhan Q8)
            { 
                question: { tl: "Kumita si Tomas ng P900. Ibinigay ang P567. Magkano ang natira sa kanya?", en: "Tomas earned P900. He gave away P567. How much does he have left?" }, 
                options: { tl: ["P323", "P333", "P343", "P433"], en: ["P323", "P333", "P343", "P433"] }, 
                answer: 1, topic: 'Subtraction Word Problem' 
            }
        ];

        let userAnswers = {}; // {qIndex: selectedOptionIndex}
        const quizName = "Pagsusulit: Pagdaragdag at Pagbabawas sa Pang-araw-araw na Buhay";
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
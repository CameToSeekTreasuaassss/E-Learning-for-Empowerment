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
    <title>Pagsusulit: How Much Will It Grow? (Sequences at Series)</title>
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
        <header class="mb-4 relative">
            
            <!-- GO BACK BUTTON: Text "Go Back", size uniform at text-xl/w-6 h-6 -->
            <a href="http://localhost/als/front/test.php" class="absolute left-0 top-1/2 transform -translate-y-1/2 p-2 rounded-lg text-primary hover:bg-primary-light transition duration-150 flex items-center group text-xl">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 mr-1">
                    <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
                <span class="font-semibold" id="go-back-text">Go Back</span>
            </a>
            
            <div class="text-center">
                <h1 class="text-4xl font-extrabold text-primary mb-2" id="quiz-title">Pagsusulit: How Much Will It Grow? (Sequences at Series)</h1>
                <p class="text-xl text-gray-600" id="quiz-subtitle">30 Items: Arithmetic, Geometric, at Aplikasyon</p>
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
            'quizTitle': { tl: "Pagsusulit: How Much Will It Grow? (Sequences at Series)", en: "Quiz: How Much Will It Grow? (Sequences and Series)" },
            'quizSubtitle': { tl: "30 Items: Arithmetic, Geometric, at Aplikasyon", en: "30 Items: Arithmetic, Geometric, and Applications" },
            'goBack': { tl: 'Bumalik', en: 'Go Back' },
            'section1Title': { tl: 'I. Aralin 1: Arithmetic Sequence at Series', en: 'I. Lesson 1: Arithmetic Sequence and Series' },
            'section2Title': { tl: 'II. Aralin 2: Geometric Sequence at Series', en: 'II. Lesson 2: Geometric Sequence and Series' },
            'section3Title': { tl: 'III. Aralin 3: Aplikasyon ng Sequences at Series', en: 'III. Lesson 3: Applications of Sequences and Series' },
            'submitButton': { tl: 'Tapusin at Tingnan ang Resulta', en: 'Finish and View Results' },
            'unansweredAlert': { tl: 'Kailangan mo pang sagutan ang', en: 'You still need to answer' },
            'unansweredAlertSuffix': { tl: 'na tanong bago mag-submit.', en: 'questions before submitting.' },
            'modalTitle': { tl: 'Resulta ng Pagsusulit', en: 'Quiz Results' },
            'modalScoreText': { tl: 'Nakakuha ka ng:', en: 'You scored:' },
            'modalReviewText': { tl: 'Tingnan ang iyong mga sagot sa ibaba para matuto.', en: 'Review your answers below to learn.' },
            'recordButton': { tl: 'I-record ang Resulta at Pumunta sa Talaan', en: 'Record Result and Go to Records' }, // Updated text
            'resetButton': { tl: 'Subukan Muli', en: 'Try Again' },
        };
        
        // --- QUIZ DATA (30 Items Total) - UPDATED FOR TRANSLATION ---
        const quizData = [
            // Section I: Arithmetic Sequence (Aralin 1) (1-10)
            // Q1: Arithmetic Sequence Next Term (Pre-Assessment 1)
            { 
                question: { tl: "Sa Arithmetic Sequence na 3, 1, -1, -3, -5, -7,... ano ang <b>ika-8 term</b>?", en: "In the Arithmetic Sequence 3, 1, -1, -3, -5, -7,... what is the <b>8th term</b>?" }, 
                options: { tl: ["-9", "-11", "9", "11"], en: ["-9", "-11", "9", "11"] }, 
                answer: 1, topic: 'Arithmetic: Finding Term' 
            }, 
            // Q2: Arithmetic Common Difference (Pre-Assessment 2)
            { 
                question: { tl: "Ano ang <b>common difference (d)</b> sa sequence na 3, 1, -1, -3, -5, -7,...?", en: "What is the <b>common difference (d)</b> in the sequence 3, 1, -1, -3, -5, -7,...?" }, 
                options: { tl: ["3", "-3", "-2", "2"], en: ["3", "-3", "-2", "2"] }, 
                answer: 2, topic: 'Arithmetic: Common Difference' 
            },
            // Q3: Arithmetic Common Difference (P.18 Example b)
            { 
                question: { tl: "Ano ang <b>common difference (d)</b> sa sequence na 1/2, 3/4, 1, 5/4, 3/2,...?", en: "What is the <b>common difference (d)</b> in the sequence 1/2, 3/4, 1, 5/4, 3/2,...?" }, 
                options: { tl: ["1/2", "1/4", "1/4", "-1/2"], en: ["1/2", "1/4", "1/4", "-1/2"] }, 
                answer: 1, topic: 'Arithmetic: Common Difference' 
            }, 
            // Q4: Arithmetic Next Term (P.18 Example c)
            { 
                question: { tl: "Sa sequence na 4, -1, -6, -11, -16,... ano ang <b>susunod na term</b>?", en: "In the sequence 4, -1, -6, -11, -16,... what is the <b>next term</b>?" }, 
                options: { tl: ["-20", "-21", "-22", "-11"], en: ["-20", "-21", "-22", "-11"] }, 
                answer: 1, topic: 'Arithmetic: Next Term' 
            }, 
            // Q5: Arithmetic Series Sum (P.25 Example 3)
            { 
                question: { tl: "Ano ang <b>sum</b> ng unang 20 terms sa sequence na 4, 8, 12,...?", en: "What is the <b>sum</b> of the first 20 terms in the sequence 4, 8, 12,...?" }, 
                options: { tl: ["720", "800", "840", "880"], en: ["720", "800", "840", "880"] }, 
                answer: 2, topic: 'Arithmetic: Series Sum' 
            }, 
            // Q6: Arithmetic Finding Common Difference (P.26 Example 4)
            { 
                question: { tl: "Ang arithmetic series (S) ay 253, at ang a₁ ay 8. Kung may 11 terms (n), ano ang <b>common difference (d)</b>?", en: "The arithmetic series (S) is 253, and a₁ is 8. If there are 11 terms (n), what is the <b>common difference (d)</b>?" }, 
                options: { tl: ["2", "3", "4", "5"], en: ["2", "3", "4", "5"] }, 
                answer: 1, topic: 'Arithmetic: Finding Common Difference' 
            }, 
            // Q7: Arithmetic Means (P.27 Example 5)
            { 
                question: { tl: "Ang <b>tatlong arithmetic means</b> sa pagitan ng 5 at 35 ay: (d=5)", en: "The <b>three arithmetic means</b> between 5 and 35 are: (d=5)" }, 
                options: { tl: ["10, 15, 20", "15, 20, 25", "10, 15, 20, 25, 30", "15, 20, 25, 30"], en: ["10, 15, 20", "15, 20, 25", "10, 15, 20, 25, 30", "15, 20, 25, 30"] }, 
                answer: 2, topic: 'Arithmetic: Arithmetic Means' 
            }, 
            // Q8: Arithmetic Application (Pre-Assessment 15)
            { 
                question: { tl: "Si Christian ay nagsimula sa 20 push ups at dinagdagan ng 5 araw-araw. Ilan ang kaniyang push ups sa ika-7 araw?", en: "Christian started with 20 push ups and increased by 5 every day. How many push ups did he do on the 7th day?" }, 
                options: { tl: ["45", "50", "55", "60"], en: ["45", "50", "55", "60"] }, 
                answer: 3, topic: 'Arithmetic: Application' 
            }, 
            // Q9: Arithmetic Series Sum (Pre-Assessment 5)
            { 
                question: { tl: "Ano ang <b>sum</b> ng lahat ng even integers sa pagitan ng 3 at 33 (i.e. 4, 6, ..., 32)?", en: "What is the <b>sum</b> of all even integers between 3 and 33 (i.e. 4, 6, ..., 32)?" }, 
                options: { tl: ["268", "270", "272", "274"], en: ["268", "270", "272", "274"] }, 
                answer: 2, topic: 'Arithmetic: Series Sum' 
            }, 
            // Q10: Arithmetic Series Sum (Pre-Assessment 8)
            { 
                question: { tl: "Ano ang <b>sum</b> ng lahat ng multiples of 5 mula 3 hanggang 78 (i.e. 5, 10, ..., 75)?", en: "What is the <b>sum</b> of all multiples of 5 from 3 to 78 (i.e. 5, 10, ..., 75)?" }, 
                options: { tl: ["595", "600", "605", "610"], en: ["595", "600", "605", "610"] }, 
                answer: 1, topic: 'Arithmetic: Series Sum' 
            }, 

            // Section II: Geometric Sequence (Aralin 2) (11-20)
            // Q11: Geometric Next Terms (Pre-Assessment 3)
            { 
                question: { tl: "Hanapin ang <b>susunod na dalawang terms</b> sa sequence na 5, 10, 20,...", en: "Find the <b>next two terms</b> in the sequence 5, 10, 20,..."}, 
                options: { tl: ["30 and 40", "40 and 80", "40 and 80", "80 and 160"], en: ["30 and 40", "40 and 80", "40 and 80", "80 and 160"] }, 
                answer: 2, topic: 'Geometric: Next Term' 
            }, 
            // Q12: Geometric Common Ratio (P.33 Example b)
            { 
                question: { tl: "Ano ang <b>common ratio (r)</b> sa sequence na 3, -6, 12, -24,...?", en: "What is the <b>common ratio (r)</b> in the sequence 3, -6, 12, -24,...?" }, 
                options: { tl: ["3", "-3", "-2", "2"], en: ["3", "-3", "-2", "2"] }, 
                answer: 2, topic: 'Geometric: Common Ratio' 
            }, 
            // Q13: Geometric Common Ratio (P.34 Example c)
            { 
                question: { tl: "Ano ang <b>common ratio (r)</b> sa sequence na 1/2, 1/6, 1/18, 1/54,...?", en: "What is the <b>common ratio (r)</b> in the sequence 1/2, 1/6, 1/18, 1/54,...?" }, 
                options: { tl: ["1/2", "1/3", "-1/3", "-1/2"], en: ["1/2", "1/3", "-1/3", "-1/2"] }, 
                answer: 1, topic: 'Geometric: Common Ratio' 
            }, 
            // Q14: Geometric Finding Term (P.37 Example 1)
            { 
                question: { tl: "Ano ang <b>ika-7 term</b> sa sequence na 3, 6, 12,...?", en: "What is the <b>7th term</b> in the sequence 3, 6, 12,...?" }, 
                options: { tl: ["96", "128", "192", "256"], en: ["96", "128", "192", "256"] }, 
                answer: 2, topic: 'Geometric: Finding Term' 
            }, 
            // Q15: Geometric Finding First Term (P.38 Example 2 modified)
            { 
                question: { tl: "Ang ika-4 term ay 320 at ang common ratio (r) ay 4. Ano ang <b>unang term (a₁)</b>?", en: "The 4th term is 320 and the common ratio (r) is 4. What is the <b>first term (a₁)</b>?" }, 
                options: { tl: ["3", "5", "8", "10"], en: ["3", "5", "8", "10"] }, 
                answer: 1, topic: 'Geometric: Finding First Term' 
            }, 
            // Q16: Geometric Series Sum (P.41 Example 3)
            { 
                question: { tl: "Ano ang <b>sum (S)</b> ng unang 5 terms (n) kung a₁=4 at r=2?", en: "What is the <b>sum (S)</b> of the first 5 terms (n) if a₁=4 and r=2?" }, 
                options: { tl: ["64", "120", "124", "240"], en: ["64", "120", "124", "240"] }, 
                answer: 2, topic: 'Geometric: Series Sum' 
            }, 
            // Q17: Geometric Series Sum (P.42 Example 4)
            { 
                question: { tl: "Ano ang <b>sum (S)</b> ng unang 4 terms (n) kung a₁=12 at r=-3?", en: "What is the <b>sum (S)</b> of the first 4 terms (n) if a₁=12 and r=-3?" }, 
                options: { tl: ["240", "-120", "-240", "360"], en: ["240", "-120", "-240", "360"] }, 
                answer: 2, topic: 'Geometric: Series Sum' 
            }, 
            // Q18: Geometric Series Sum (Pre-Assessment 13)
            { 
                question: { tl: "Kung a₁=1 at a₂=4, ano ang <b>sum</b> ng unang 5 terms?", en: "If a₁=1 and a₂=4, what is the <b>sum</b> of the first 5 terms?" }, 
                options: { tl: ["339", "340", "341", "342"], en: ["339", "340", "341", "342"] }, 
                answer: 2, topic: 'Geometric: Series Sum' 
            }, 
            // Q19: Geometric Finding Term (Pre-Assessment 11)
            { 
                question: { tl: "Ano ang <b>ika-7 term</b> sa sequence na -2, 6, -18, 54, -162,...?", en: "What is the <b>7th term</b> in the sequence -2, 6, -18, 54, -162,...?" }, 
                options: { tl: ["1457", "-1458", "1458", "-1298"], en: ["1457", "-1458", "1458", "-1298"] }, 
                answer: 1, topic: 'Geometric: Finding Term' 
            }, 
            // Q20: Geometric Term Order (Pre-Assessment 10)
            { 
                question: { tl: "Aling term ng sequence na 1, 2, 4, 8,... ang may value na 128?", en: "Which term of the sequence 1, 2, 4, 8,... has a value of 128?" }, 
                options: { tl: ["8th term", "7th term", "6th term", "9th term"], en: ["8th term", "7th term", "6th term", "9th term"] }, 
                answer: 1, topic: 'Geometric: Term Order' 
            }, 

            // Section III: Applications (Aralin 3) (21-30)
            // Q21: Arithmetic Application (Networking - P.49 Example 1)
            { 
                question: { tl: "Ang networking business ay nagsimula sa 11 members at dinagdagan ng 5 bawat linggo. Ilan ang total members pagkalipas ng 8 linggo?", en: "The networking business started with 11 members and increased by 5 each week. What is the total number of members after 8 weeks?" }, 
                options: { tl: ["41", "44", "46", "51"], en: ["41", "44", "46", "51"] }, 
                answer: 2, topic: 'Application: Arithmetic Sequence' 
            }, 
            // Q22: Arithmetic Application (Coastal Clean-up - P.50 Example 2)
            { 
                question: { tl: "Ang coastal clean-up ay naglilinis ng 4 km² bawat araw. Kung 52 km² ang kabuuang area, ilang <b>araw</b> bago matapos ang lahat?", en: "The coastal clean-up cleans 4 km² per day. If the total area is 52 km², how many <b>days</b> will it take to finish?" }, 
                options: { tl: ["12 days", "13 days", "14 days", "15 days"], en: ["12 days", "13 days", "14 days", "15 days"] }, 
                answer: 2, topic: 'Application: Arithmetic Sequence' 
            }, 
            // Q23: Arithmetic Application (Stack of Boxes - P.50 Example 3)
            { 
                question: { tl: "May 8 layers ang stack. Ang unang layer ay may 20 boxes at ang huling layer ay may 13 boxes. Ilan ang <b>total boxes</b>?", en: "The stack has 8 layers. The first layer has 20 boxes and the last layer has 13 boxes. What is the <b>total number of boxes</b>?" }, 
                options: { tl: ["120", "124", "130", "132"], en: ["120", "124", "130", "132"] }, 
                answer: 3, topic: 'Application: Arithmetic Series' 
            }, 
            // Q24: Geometric Application (Cell Division - P.51 Example 4)
            { 
                question: { tl: "Ang cell ay nagdi-divide sa 2 bawat minuto. Kung nagsimula sa 1,000 cells, ilan ang cells pagkalipas ng 6 na minuto?", en: "The cell divides into 2 every minute. If it started with 1,000 cells, how many cells are there after 6 minutes?" }, 
                options: { tl: ["16,000", "20,000", "32,000", "64,000"], en: ["16,000", "20,000", "32,000", "64,000"] }, 
                answer: 2, topic: 'Application: Geometric Sequence' 
            }, 
            // Q25: Geometric Application (Compound Interest - P.52 Example 5)
            { 
                question: { tl: "Nagdeposito ka ng P300 na may 20% interest bawat taon. Magkano ang <b>interes</b> pagkalipas ng 3 taon?", en: "You deposited P300 with 20% interest per year. What is the <b>interest</b> after 3 years?" }, 
                options: { tl: ["P12.00", "P14.00", "P16.00", "P18.00"], en: ["P12.00", "P14.00", "P16.00", "P18.00"] }, 
                answer: 0, topic: 'Application: Geometric Sequence' 
            }, 
            // Q26: Arithmetic Application (Investment - P.53 Example 2)
            { 
                question: { tl: "Nagdeposito si Jenny ng P20,000 at nakakakuha ng P1,750 kada taon. Magkano ang <b>total savings</b> pagkatapos ng 8 taon?", en: "Jenny deposited P20,000 and earns P1,750 per year. What are the <b>total savings</b> after 8 years?" }, 
                options: { tl: ["P32,250", "P33,250", "P33,750", "P34,250"], en: ["P32,250", "P33,250", "P33,750", "P34,250"] }, 
                answer: 2, topic: 'Application: Arithmetic Sequence' 
            }, 
            // Q27: Arithmetic Application (Cake Sales - P.53 Example 3)
            { 
                question: { tl: "Ang 5 customers ay umorder ng cake: 15, 18, 21,... Ilan ang total cake order ng <b>ika-5 customer</b>?", en: "5 customers ordered cakes: 15, 18, 21,... How many total cake orders did the <b>5th customer</b> place?" }, 
                options: { tl: ["24", "27", "30", "33"], en: ["24", "27", "30", "33"] }, 
                answer: 1, topic: 'Application: Arithmetic Sequence' 
            }, 
            // Q28: Geometric Application (Car Depreciation - P.54 Example 1)
            { 
                question: { tl: "Ang kotse (P30,000) ay bumaba ang halaga ng 30% (r=0.7) bawat taon. Ano ang halaga nito pagkalipas ng 5 taon?", en: "The car (P30,000) depreciated by 30% (r=0.7) each year. What is its value after 5 years?" }, 
                options: { tl: ["P7,203.00", "P7,203.00", "P8,000.00", "P9,000.00"], en: ["P7,203.00", "P7,203.00", "P8,000.00", "P9,000.00"] }, 
                answer: 1, topic: 'Application: Geometric Sequence' 
            }, 
            // Q29: Geometric Application (Tennis Ball Rebound - P.54 Example 2)
            { 
                question: { tl: "Ang bola ay binitawan sa 15 feet at nagre-rebound sa 0.85 ng dating taas. Gaano kataas ang rebound pagkatapos ng <b>ika-3 bounce</b>?", en: "The ball was dropped from 15 feet and rebounds to 0.85 of the previous height. How high is the rebound after the <b>3rd bounce</b>?" }, 
                options: { tl: ["9.5 feet", "10.0 feet", "9.2 feet", "8.9 feet"], en: ["9.5 feet", "10.0 feet", "9.2 feet", "8.9 feet"] }, 
                answer: 2, topic: 'Application: Geometric Sequence' 
            }, 
            // Q30: Geometric Application (Fishery - P.54 Example 3)
            { 
                question: { tl: "Ang isda ay dumodoble (r=2) ang populasyon bawat buwan. Kung nagsimula sa 100, ano ang populasyon pagkalipas ng 10 buwan?", en: "The fish population doubles (r=2) every month. If it started at 100, what is the population after 10 months?" }, 
                options: { tl: ["5,120", "10,240", "20,480", "51,200"], en: ["5,120", "10,240", "20,480", "51,200"] }, 
                answer: 3, topic: 'Application: Geometric Sequence' 
            }
        ];

        let userAnswers = {}; // {qIndex: selectedOptionIndex}
        const quizName = "Pagsusulit: How Much Will It Grow?";
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
         * Updates static UI elements based on the current language.
         */
        function updateStaticUI(lang) {
            document.getElementById('quiz-title').textContent = uiText.quizTitle[lang];
            document.getElementById('quiz-subtitle').textContent = uiText.quizSubtitle[lang];
            
            const goBackElement = document.getElementById('go-back-text');
            if (goBackElement) {
                goBackElement.textContent = uiText.goBack[lang];
            }
            
            submitButton().textContent = uiText.submitButton[lang];
            
            // Modal elements
            modalTitle().textContent = uiText.modalTitle[lang];
            modalScoreText().textContent = uiText.modalScoreText[lang];
            modalReviewText().textContent = uiText.modalReviewText[lang];
            recordButtonLink().textContent = uiText.recordButton[lang];
            resetButtonModal().textContent = uiText.resetButton[lang];
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
         * NOTE: records now include time (human readable) and ISO timestamp (dateTime).
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
                date: now.toLocaleDateString('en-US'),
                time: now.toLocaleTimeString('en-US'),
                dateTime: now.toISOString()
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
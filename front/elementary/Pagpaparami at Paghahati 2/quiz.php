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
    <title>Pagsusulit: Pagpaparami at Paghahati 2</title>
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
                <h1 class="text-4xl font-extrabold text-primary mb-2" id="quiz-title">Pagsusulit: Pagpaparami at Paghahati 2</h1>
                <p class="text-xl text-gray-600" id="quiz-subtitle">30 Items: 3-Digit na Bilang at Word Problems</p>
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
                    <!-- UPDATED LINK ACTION AND TEXT -->
                    <!-- Removed onclick as saving is now handled in submitQuiz -->
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
            'quizTitle': { tl: "Pagsusulit: Pagpaparami at Paghahati 2", en: "Quiz: Multiplication and Division 2" },
            'quizSubtitle': { tl: "30 Items: 3-Digit na Bilang at Word Problems", en: "30 Items: 3-Digit Numbers and Word Problems" },
            'goBack': { tl: 'Bumalik', en: 'Go Back' },
            'section1Title': { tl: 'I. Pagpaparami (3-Digit x 1-Digit)', en: 'I. Multiplication (3-Digit x 1-Digit)' },
            'section2Title': { tl: 'II. Paghahati (3-Digit ÷ 1-Digit)', en: 'II. Division (3-Digit ÷ 1-Digit)' },
            'section3Title': { tl: 'III. Word Problems (Pagpaparami at Paghahati)', en: 'III. Word Problems (Multiplication and Division)' },
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
            // Section I: Pagpaparami (3-Digit x 1-Digit) (1-10)
            { 
                question: { tl: "125 x 4 = ?", en: "125 x 4 = ?" }, 
                options: { tl: ["500", "480", "520", "490"], en: ["500", "480", "520", "490"] }, 
                answer: 0, topic: 'Pagpaparami' 
            },
            { 
                question: { tl: "308 x 3 = ?", en: "308 x 3 = ?" }, 
                options: { tl: ["904", "918", "924", "936"], en: ["904", "918", "924", "936"] }, 
                answer: 2, topic: 'Pagpaparami' 
            },
            { 
                question: { tl: "510 x 5 = ?", en: "510 x 5 = ?" }, 
                options: { tl: ["2500", "2550", "2600", "2505"], en: ["2500", "2550", "2600", "2505"] }, 
                answer: 1, topic: 'Pagpaparami' 
            },
            { 
                question: { tl: "432 x 2 = ?", en: "432 x 2 = ?" }, 
                options: { tl: ["864", "854", "874", "884"], en: ["864", "854", "874", "884"] }, 
                answer: 0, topic: 'Pagpaparami' 
            },
            { 
                question: { tl: "199 x 3 = ?", en: "199 x 3 = ?" }, 
                options: { tl: ["577", "587", "597", "607"], en: ["577", "587", "597", "607"] }, 
                answer: 2, topic: 'Pagpaparami' 
            },
            { 
                question: { tl: "605 x 6 = ?", en: "605 x 6 = ?" }, 
                options: { tl: ["3600", "3630", "3660", "3615"], en: ["3600", "3630", "3660", "3615"] }, 
                answer: 1, topic: 'Pagpaparami' 
            },
            { 
                question: { tl: "240 x 7 = ?", en: "240 x 7 = ?" }, 
                options: { tl: ["1680", "1580", "1780", "1720"], en: ["1680", "1580", "1780", "1720"] }, 
                answer: 0, topic: 'Pagpaparami' 
            },
            { 
                question: { tl: "711 x 9 = ?", en: "711 x 9 = ?" }, 
                options: { tl: ["6409", "6399", "6419", "6319"], en: ["6409", "6399", "6419", "6319"] }, 
                answer: 1, topic: 'Pagpaparami' 
            },
            { 
                question: { tl: "800 x 8 = ?", en: "800 x 8 = ?" }, 
                options: { tl: ["6000", "6200", "6400", "6800"], en: ["6000", "6200", "6400", "6800"] }, 
                answer: 2, topic: 'Pagpaparami' 
            },
            { 
                question: { tl: "950 x 2 = ?", en: "950 x 2 = ?" }, 
                options: { tl: ["1800", "1850", "1900", "1950"], en: ["1800", "1850", "1900", "1950"] }, 
                answer: 2, topic: 'Pagpaparami' 
            },

            // Section II: Paghahati (3-Digit ÷ 1-Digit) (11-20)
            { 
                question: { tl: "340 ÷ 5 = ?", en: "340 ÷ 5 = ?" }, 
                options: { tl: ["62", "64", "66", "68"], en: ["62", "64", "66", "68"] }, 
                answer: 3, topic: 'Paghahati' 
            },
            { 
                question: { tl: "416 ÷ 4 = ?", en: "416 ÷ 4 = ?" }, 
                options: { tl: ["104", "114", "106", "116"], en: ["104", "114", "106", "116"] }, 
                answer: 0, topic: 'Paghahati' 
            },
            { 
                question: { tl: "918 ÷ 9 = ?", en: "918 ÷ 9 = ?" }, 
                options: { tl: ["102", "112", "108", "98"], en: ["102", "112", "108", "98"] }, 
                answer: 0, topic: 'Paghahati' 
            },
            { 
                question: { tl: "555 ÷ 3 = ?", en: "555 ÷ 3 = ?" }, 
                options: { tl: ["175", "180", "185", "195"], en: ["175", "180", "185", "195"] }, 
                answer: 2, topic: 'Paghahati' 
            },
            { 
                question: { tl: "804 ÷ 6 = ?", en: "804 ÷ 6 = ?" }, 
                options: { tl: ["124", "134", "144", "136"], en: ["124", "134", "144", "136"] }, 
                answer: 1, topic: 'Paghahati' 
            },
            { 
                question: { tl: "728 ÷ 7 = ?", en: "728 ÷ 7 = ?" }, 
                options: { tl: ["101", "104", "114", "102"], en: ["101", "104", "114", "102"] }, 
                answer: 1, topic: 'Paghahati' 
            },
            { 
                question: { tl: "625 ÷ 5 = ?", en: "625 ÷ 5 = ?" }, 
                options: { tl: ["115", "125", "135", "145"], en: ["115", "125", "135", "145"] }, 
                answer: 1, topic: 'Paghahati' 
            },
            { 
                question: { tl: "888 ÷ 8 = ?", en: "888 ÷ 8 = ?" }, 
                options: { tl: ["101", "108", "111", "112"], en: ["101", "108", "111", "112"] }, 
                answer: 2, topic: 'Paghahati' 
            },
            { 
                question: { tl: "490 ÷ 7 = ?", en: "490 ÷ 7 = ?" }, 
                options: { tl: ["7", "49", "70", "490"], en: ["7", "49", "70", "490"] }, 
                answer: 2, topic: 'Paghahati' 
            },
            { 
                question: { tl: "186 ÷ 6 = ?", en: "186 ÷ 6 = ?" }, 
                options: { tl: ["31", "21", "36", "26"], en: ["31", "21", "36", "26"] }, 
                answer: 0, topic: 'Paghahati' 
            },

            // Section III: Word Problems (3-Digit Context) (21-30)
            { 
                question: { tl: "Bumili si Mang Jose ng 6 na sako ng bigas. Ang bawat sako ay may 105 kilo. Ilan lahat ang bigas? (105 x 6)", en: "Mang Jose bought 6 sacks of rice. Each sack has 105 kilograms. What is the total weight? (105 x 6)" }, 
                options: { tl: ["605 kg", "630 kg", "650 kg", "680 kg"], en: ["605 kg", "630 kg", "650 kg", "680 kg"] }, 
                answer: 1, topic: 'Word Problem' 
            },
            { 
                question: { tl: "May 945 na upuan na hahatiin sa 9 na silid-aralan. Ilang upuan ang mapupunta sa bawat silid? (945 ÷ 9)", en: "There are 945 chairs to be divided among 9 classrooms. How many chairs will go to each classroom? (945 ÷ 9)" }, 
                options: { tl: ["105", "109", "115", "119"], en: ["105", "109", "115", "119"] }, 
                answer: 0, topic: 'Word Problem' 
            },
            { 
                question: { tl: "Kung ang isang damit ay nagkakahalaga ng P250, magkano ang kabuuang presyo ng 4 na damit? (250 x 4)", en: "If one dress costs P250, what is the total price of 4 dresses? (250 x 4)" }, 
                options: { tl: ["P1000", "P950", "P900", "P1100"], en: ["P1000", "P950", "P900", "P1100"] }, 
                answer: 0, topic: 'Word Problem' 
            },
            { 
                question: { tl: "May 651 na aklat na kailangang hatiin nang pantay sa 7 istante. Ilang aklat ang ilalagay sa bawat istante? (651 ÷ 7)", en: "There are 651 books that need to be divided equally onto 7 shelves. How many books will be placed on each shelf? (651 ÷ 7)" }, 
                options: { tl: ["83", "93", "103", "97"], en: ["83", "93", "103", "97"] }, 
                answer: 1, topic: 'Word Problem' 
            },
            { 
                question: { tl: "Nag-imprenta si Tina ng 320 kopya ng flyers bawat araw. Ilang kopya ang naimprenta niya sa loob ng 3 araw? (320 x 3)", en: "Tina printed 320 copies of flyers per day. How many copies did she print in 3 days? (320 x 3)" }, 
                options: { tl: ["920", "950", "960", "980"], en: ["920", "950", "960", "980"] }, 
                answer: 2, topic: 'Word Problem' 
            },
            { 
                question: { tl: "May 748 na bulaklak na hahatiin sa 4 na tindahan. Ilang bulaklak ang matatanggap ng bawat tindahan? (748 ÷ 4)", en: "There are 748 flowers to be divided among 4 shops. How many flowers will each shop receive? (748 ÷ 4)" }, 
                options: { tl: ["182", "187", "192", "197"], en: ["182", "187", "192", "197"] }, 
                answer: 1, topic: 'Word Problem' 
            },
            { 
                question: { tl: "Kung P5.00 ang presyo ng isang saging, magkano ang 155 na saging? (155 x 5)", en: "If the price of one banana is P5.00, how much are 155 bananas? (155 x 5)" }, 
                options: { tl: ["P725", "P750", "P775", "P800"], en: ["P725", "P750", "P775", "P800"] }, 
                answer: 2, topic: 'Word Problem' 
            },
            { 
                question: { tl: "May 800 piso na ipinamahagi sa 8 mag-aaral. Magkano ang natanggap ng bawat mag-aaral? (800 ÷ 8)", en: "P800 was distributed among 8 students. How much did each student receive? (800 ÷ 8)" }, 
                options: { tl: ["P80", "P90", "P100", "P110"], en: ["P80", "P90", "P100", "P110"] }, 
                answer: 2, topic: 'Word Problem' 
            },
            { 
                question: { tl: "Ang isang kotse ay tumatakbo ng 115 km bawat oras. Gaano kalayo ang tatakbuhin nito sa loob ng 5 oras? (115 x 5)", en: "A car runs 115 km per hour. How far will it run in 5 hours? (115 x 5)" }, 
                options: { tl: ["555 km", "565 km", "575 km", "585 km"], en: ["555 km", "565 km", "575 km", "585 km"] }, 
                answer: 2, topic: 'Word Problem' 
            },
            { 
                question: { tl: "Isang 5-araw na event ang may 625 na kalahok. Ilan ang average na kalahok bawat araw? (625 ÷ 5)", en: "A 5-day event has 625 participants. What is the average number of participants per day? (625 ÷ 5)" }, 
                options: { tl: ["115", "125", "135", "145"], en: ["115", "125", "135", "145"] }, 
                answer: 1, topic: 'Word Problem' 
            }
        ];

        let userAnswers = {}; // {qIndex: selectedOptionIndex}
        const quizName = "Pagsusulit: Pagpaparami at Paghahati 2";
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
            
            // Check if goBackText element exists before setting textContent
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
                time: now.toLocaleTimeString('en-US'),
                submittedAt: now.toISOString()
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
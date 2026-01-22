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
    <title>Pagsusulit: Ito'y Tungkol sa Oras</title>
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
                <h1 class="text-4xl font-extrabold text-primary mb-2" id="quiz-title">Pagsusulit: Ito'y Tungkol sa Oras</h1>
                <p class="text-xl text-gray-600" id="quiz-subtitle">30 Items: Pagkuwenta, Pamamahala, at Talaorasan</p>
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
                <!-- Score display uses 'success' color which is Sky 700 -->
                <div class="text-6xl font-extrabold mb-6" id="score-display"></div>
                
                <p class="text-sm text-gray-500 mb-6" id="modal-review-text">Tingnan ang iyong mga sagot sa ibaba para matuto.</p>
                
                <div class="space-y-3">
                    <!-- UPDATED LINK: Records are saved upon submission, but the button ensures navigation -->
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
            'quizTitle': { tl: "Pagsusulit: Ito'y Tungkol sa Oras", en: "Quiz: It's About Time" },
            'quizSubtitle': { tl: "30 Items: Pagkuwenta, Pamamahala, at Talaorasan", en: "30 Items: Calculation, Management, and Schedules" },
            'goBack': { tl: 'Bumalik', en: 'Go Back' },
            'section1Title': { tl: 'I. Pagkuwenta ng Oras (Aralin 1)', en: 'I. Time Calculation (Lesson 1)' },
            'section2Title': { tl: 'II. Pamamahala ng Oras (Aralin 2)', en: 'II. Time Management (Lesson 2)' },
            'section3Title': { tl: 'III. Pagbabasa ng Talaan ng Oras (Aralin 3)', en: 'III. Reading Time Schedules (Lesson 3)' },
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
            // Section I: Aralin 1: Ilang Oras Pa? (Pagkuwenta ng Pagitan ng Oras) (1-10)
            // Q1: 12-hour clock subtraction (pre-test 1) 5:10 PM - 2:25 PM = 2h 45m
            { 
                question: { tl: "Si Aling Gina ay naglaba mula 2:25 PM hanggang 5:10 PM. Gaano katagal siya naglaba?", en: "Aling Gina did laundry from 2:25 PM to 5:10 PM. How long did she do laundry?" }, 
                options: { tl: ["2 oras at 35 minuto", "2 oras at 45 minuto", "3 oras at 15 minuto", "2 oras at 55 minuto"], en: ["2 hours and 35 minutes", "2 hours and 45 minutes", "3 hours and 15 minutes", "2 hours and 55 minutes"] }, 
                answer: 1, topic: '12-Hour Subtraction' 
            },
            // Q2: 24-hour clock subtraction (pre-test 2) 1420H - 1050H = 3h 30m
            { 
                question: { tl: "Nagsimula si Mang Ramon magtrabaho 1050H at natapos 1420H. Gaano katagal siya nagtrabaho?", en: "Mang Ramon started work at 1050H and finished at 1420H. How long did he work?" }, 
                options: { tl: ["3 oras at 20 minuto", "3 oras at 30 minuto", "4 oras at 10 minuto", "3 oras at 50 minuto"], en: ["3 hours and 20 minutes", "3 hours and 30 minutes", "4 hours and 10 minutes", "3 hours and 50 minutes"] }, 
                answer: 1, topic: '24-Hour Subtraction' 
            },
            // Q3: 24-hour clock addition (pre-test 3) 0920H + 2h 30m -> 1150H (2nd) -> 1150H + 2h 30m = 1420H (3rd)
            { 
                question: { tl: "Umiinom ng gamot si Nelson bawat 2.5 oras. Kung nagsimula siya 0920H, anong oras ang ikatlong inuman?", en: "Nelson drinks medicine every 2.5 hours. If he started at 0920H, what time is the third dose?" }, 
                options: { tl: ["1220H", "1350H", "1420H", "1500H"], en: ["1220H", "1350H", "1420H", "1500H"] }, 
                answer: 2, topic: '24-Hour Addition' 
            },
            // Q4: 12-hour clock subtraction (Magbalik-aral 1) 4:40 PM - 2:25 PM = 2h 15m
            { 
                question: { tl: "Si Aling Flor ay naghurno mula 2:25 PM hanggang 4:40 PM. Gaano katagal siya naghurno?", en: "Aling Flor baked from 2:25 PM to 4:40 PM. How long did she bake?" }, 
                options: { tl: ["2 oras at 15 minuto", "2 oras at 25 minuto", "2 oras at 40 minuto", "2 oras at 05 minuto"], en: ["2 hours and 15 minutes", "2 hours and 25 minutes", "2 hours and 40 minutes", "2 hours and 05 minutes"] }, 
                answer: 0, topic: '12-Hour Subtraction' 
            },
            // Q5: 12-hour clock subtraction crossing noon (Magbalik-aral 2) 7:30 AM to 5:40 PM. (12:00-7:30=4:30) + 5:40 = 10h 10m
            { 
                question: { tl: "Si Mang Pedro ay nagtrabaho mula 7:30 AM hanggang 5:40 PM. Ilang oras ang ginugol niya?", en: "Mang Pedro worked from 7:30 AM to 5:40 PM. How many hours did he spend?" }, 
                options: { tl: ["9 oras at 10 minuto", "9 oras at 40 minuto", "10 oras at 10 minuto", "10 oras at 40 minuto"], en: ["9 hours and 10 minutes", "9 hours and 40 minutes", "10 hours and 10 minutes", "10 hours and 40 minutes"] }, 
                answer: 2, topic: '12-Hour Cross Day' 
            },
            // Q6: 24-hour clock subtraction (Magbalik-aral 1) 1845H - 1025H = 8h 20m
            { 
                question: { tl: "Nagsimula si Aling Lydia magluto 1025H at natapos 1845H. Gaano katagal siya nagluto?", en: "Aling Lydia started cooking at 1025H and finished at 1845H. How long did she cook?" }, 
                options: { tl: ["7 oras at 50 minuto", "8 oras at 20 minuto", "8 oras at 40 minuto", "7 oras at 40 minuto"], en: ["7 hours and 50 minutes", "8 hours and 20 minutes", "8 hours at 40 minutes", "7 hours and 40 minutes"] }, 
                answer: 1, topic: '24-Hour Subtraction' 
            },
            // Q7: 24-hour clock subtraction (Magbalik-aral 2) 1710H - 1415H = 2h 55m
            { 
                question: { tl: "Nagsimula si Mang Berto magtrabaho 1415H at natapos 1710H. Gaano katagal siya nagtrabaho?", en: "Mang Berto started work at 1415H and finished at 1710H. How long did he work?" }, 
                options: { tl: ["2 oras at 55 minuto", "3 oras at 05 minuto", "2 oras at 45 minuto", "3 oras at 15 minuto"], en: ["2 hours and 55 minutes", "3 hours and 05 minutes", "2 hours and 45 minutes", "3 hours and 15 minutes"] }, 
                answer: 0, topic: '24-Hour Subtraction' 
            },
            // Q8: 24-hour clock addition with carry-over (Magbalik-aral 1) 7:15 AM + 3h 30m -> 1045H (2nd) -> 1045H + 3h 30m = 1415H (3rd)
            { 
                question: { tl: "Uminom ng gamot ang anak ni Aling Nita bawat 3.5 oras. Kung nagsimula siya 7:15 AM, anong oras ang ikatlong inuman (24-hour clock)?", en: "Aling Nita's child takes medicine every 3.5 hours. If she started at 7:15 AM, what time is the third dose (24-hour clock)?" }, 
                options: { tl: ["1345H", "1415H", "1500H", "1445H"], en: ["1345H", "1415H", "1500H", "1445H"] }, 
                answer: 1, topic: '24-Hour Addition Carry-over' 
            },
            // Q9: 24-hour clock addition with carry-over (Alamin Natutuhan 3) 0920H + 3h 30m -> 1250H (2nd) -> 1250H + 3h 30m = 1620H (3rd) -> 1620H + 3h 30m = 1950H (4th)
            { 
                question: { tl: "Si Aling Nelly ay iinom ng gamot bawat 3 oras at 30 minuto. Kung nagsimula siya 0920H, anong oras ang pang-apat na inuman?", en: "Aling Nelly will take medicine every 3 hours and 30 minutes. If she started at 0920H, what time is the fourth dose?" }, 
                options: { tl: ["1820H", "1950H", "2020H", "1750H"], en: ["1820H", "1950H", "2020H", "1750H"] }, 
                answer: 1, topic: '24-Hour Addition Carry-over' 
            },
            // Q10: 12-hour clock (Alamin Natutuhan 1) 5:10 PM - 2:25 PM = 2h 45m
            { 
                question: { tl: "Si Mang Rudy ay natulog mula 2:25 PM at nagising 5:10 PM. Gaano katagal siya natulog?", en: "Mang Rudy slept from 2:25 PM and woke up at 5:10 PM. How long did he sleep?" }, 
                options: { tl: ["2 oras at 45 minuto", "2 oras at 35 minuto", "3 oras at 15 minuto", "3 oras at 25 minuto"], en: ["2 hours and 45 minutes", "2 hours and 35 minutes", "3 hours and 15 minutes", "3 hours and 25 minutes"] }, 
                answer: 0, topic: '12-Hour Subtraction' 
            },

            // Section II: Aralin 2: Nasa Tamang Iskedyul (Pamamahala ng Oras) (11-20)
            // Q11: Filipino Bad Habit
            { 
                question: { tl: "Aling ugali ng Pilipino ang tumutukoy sa pagpapabukas ng gawain (procrastination)?", en: "Which Filipino habit refers to postponing tasks (procrastination)?" }, 
                options: { tl: ["Bahala na system", "Filipino time", "Mañana habit", "Tungkulin ng pamilya"], en: ["Bahala na system", "Filipino time", "Mañana habit", "Family duty"] }, 
                answer: 2, topic: 'Time Management Concepts' 
            },
            // Q12: Time Management Priority
            { 
                question: { tl: "Alin ang dapat unahin ayon sa prinsipyo ng Pagpapahalaga sa pamamahala ng oras?", en: "Which should be prioritized according to the principle of Valuation in time management?" }, 
                options: { tl: ["Ang pinakamadaling gawain.", "Ang pinakamahabang gawain.", "Ang pinakamahalagang gawain.", "Ang gawaing ipinagawa ng iba."], en: ["The easiest task.", "The longest task.", "The most important task.", "The task assigned by others."] }, 
                answer: 2, topic: 'Time Management Principles' 
            },
            // Q13: Scheduling Purpose
            { 
                question: { tl: "Bakit mahalaga ang Pagsasaayos ng iskedyul ng iyong mga gawain?", en: "Why is arranging the schedule of your tasks important?" }, 
                options: { tl: ["Upang maging abala.", "Upang maiwasan ang pagiging produktibo.", "Upang magkaroon ng disiplina sa sarili at maisagawa nang maayos.", "Upang makapagtsismis."], en: ["To be busy.", "To avoid being productive.", "To have self-discipline and execute properly.", "To gossip."] }, 
                answer: 2, topic: 'Scheduling' 
            },
            // Q14: Bad Habit
            { 
                question: { tl: "Ang pag-uugaling 'mamaya na' o pag-antala ng trabaho ay karaniwang nagdudulot ng:", en: "The habit of 'later' or delaying work usually results in:" }, 
                options: { tl: ["Mas mataas na kalidad ng trabaho.", "Hindi magandang kalidad ng trabaho.", "Mas maraming libreng oras.", "Pagtaas ng suweldo."], en: ["Higher quality work.", "Poor quality work.", "More free time.", "Salary increase."] }, 
                answer: 1, topic: 'Bad Habits' 
            },
            // Q15: Unproductive Activity (from page 25 list)
            { 
                question: { tl: "Alin sa mga ito ang itinuturing na 'pagsasayang ng oras'?", en: "Which of these is considered a 'waste of time'?" }, 
                options: { tl: ["Paglalaro ng isports.", "Pagbabasa ng mabuting libro.", "Panonood ng walang kuwentang palabas sa TV.", "Pag-ukol ng panahon sa kapamilya."], en: ["Playing sports.", "Reading a good book.", "Watching worthless TV shows.", "Spending time with family."] }, 
                answer: 2, topic: 'Waste of Time' 
            },
            // Q16: Purpose of Time Estimation
            { 
                question: { tl: "Bakit mahalaga ang pagtantiya ng kailangang oras sa paggawa ng gawain?", en: "Why is estimating the time needed for a task important?" }, 
                options: { tl: ["Para maging huli sa miting.", "Para maging masaya.", "Para maiwasan ang paghahabol sa oras at mas magawa nang maayos ang iskedyul.", "Para mas maaga matapos."], en: ["To be late for a meeting.", "To be happy.", "To avoid rushing and better manage the schedule.", "To finish earlier."] }, 
                answer: 2, topic: 'Time Estimation' 
            },
            // Q17: Good Habit
            { 
                question: { tl: "Alin ang dapat isama sa regular na iskedyul ayon sa module?", en: "Which should be included in a regular schedule according to the module?" }, 
                options: { tl: ["Sobrang paglaro ng 'games'", "Pagsusugal", "Mga gawaing pang-isports", "Telebabad"], en: ["Excessive gaming", "Gambling", "Sports activities", "Long phone calls (Telebabad)"] }, 
                answer: 2, topic: 'Good Habits' 
            },
            // Q18: Consequence of 'Filipino time'
            { 
                question: { tl: "Ang pagiging huli sa mga nakaiskedyul na gawain ay nagpapakita ng:", en: "Being late for scheduled tasks shows:" }, 
                options: { tl: ["Paggalang sa oras ng iba.", "Pagiging masinop.", "Hindi pagpapahalaga sa oras.", "Pagiging produktibo."], en: ["Respect for others' time.", "Being organized.", "Lack of value for time.", "Being productive."] }, 
                answer: 2, topic: 'Time Management Concepts' 
            },
            // Q19: Scheduling tip for quality
            { 
                question: { tl: "Paano magagawa nang may kalidad ang trabaho ayon sa tamang pamamahala ng oras?", en: "How can work be done with quality according to proper time management?" }, 
                options: { tl: ["Gawin ito nang madalian.", "Iplano nang maayos ang mga gawain para maiwasan ang paghahabol sa oras.", "Gawin ito sa huling sandali.", "Hintayin ang tulong ng iba."], en: ["Do it quickly.", "Plan tasks properly to avoid rushing.", "Do it at the last minute.", "Wait for others' help."] }, 
                answer: 1, topic: 'Scheduling' 
            },
            // Q20: Time Management Goal
            { 
                question: { tl: "Ang tamang pamamahala ng oras ay naglalayong gawin kang:", en: "Proper time management aims to make you:" }, 
                options: { tl: ["Mas abala", "Mas mayaman", "Mas produktibo", "Mas malungkot"], en: ["Busier", "Richer", "More productive", "Sadder"] }, 
                answer: 2, topic: 'Time Management Goal' 
            },

            // Section III: Aralin 3: Pagbabasa ng Talaan ng Oras (Schedules) (21-30)
            // Q21: Talaan 1 - Arrival Time (5J-961: 0640H)
            { 
                question: { tl: "Batay sa Talaan 1 (Flight Schedule), anong oras darating ang biyahe-bilang 5J-961 sa Davao?", en: "Based on Table 1 (Flight Schedule), what time will flight number 5J-961 arrive in Davao?" }, 
                options: { tl: ["0500H", "0640H", "0740H", "1000H"], en: ["0500H", "0640H", "0740H", "1000H"] }, 
                answer: 1, topic: 'Reading Flight Schedule' 
            },
            // Q22: Talaan 1 - Departure Time (5J-967: 1500H)
            { 
                question: { tl: "Anong oras ng hapon umaalis ng Maynila ang biyahe-bilang 5J-967?", en: "What time in the afternoon does flight number 5J-967 depart from Manila?" }, 
                options: { tl: ["3:00 PM", "4:00 PM", "5:00 PM", "6:40 PM"], en: ["3:00 PM", "4:00 PM", "5:00 PM", "6:40 PM"] }, 
                answer: 0, topic: 'Reading Flight Schedule' 
            },
            // Q23: Talaan 2 - Ship Departure Day (Davao/SF6/10) - Lun. 1400H
            { 
                question: { tl: "Batay sa Talaan 2 (Shipping Schedule), anong araw umaalis ang sasakyang SF6/10 patungong Davao sa 1400H?", en: "Based on Table 2 (Shipping Schedule), what day does vessel SF6/10 depart for Davao at 1400H?" }, 
                options: { tl: ["Miyerkules (Myr.)", "Biyernes (Byr.)", "Lunes (Lun.)", "Sabado (Sab.)"], en: ["Wednesday (Wed.)", "Friday (Fri.)", "Monday (Mon.)", "Saturday (Sat.)"] }, 
                answer: 2, topic: 'Reading Shipping Schedule' 
            },
            // Q24: Talaan 2 - Ship Arrival Pier (Davao/SF1/8) - Sasa
            { 
                question: { tl: "Saan darating ang sasakyang SF1/8 sa Davao?", en: "Where will vessel SF1/8 arrive in Davao?" }, 
                options: { tl: ["PIER P4", "Sasa", "Polloc", "Coron"], en: ["PIER P4", "Sasa", "Polloc", "Coron"] }, 
                answer: 1, topic: 'Reading Shipping Schedule' 
            },
            // Q25: Talaan ng Pagsikat/Paglubog - Marso 3 (Pagsikat) - 0616H (PDF p. 37 - based on provided solution)
            { 
                question: { tl: "Batay sa talaan ng pagsikat at paglubog (PDF p. 37), anong oras sisikat ang araw sa Marso 3?", en: "Based on the sunrise and sunset table (PDF p. 37), what time will the sun rise on March 3?" }, 
                options: { tl: ["0626H", "0629H", "0616H", "0636H"], en: ["0626H", "0629H", "0616H", "0636H"] }, 
                answer: 2, topic: 'Reading Sunrise/Sunset' 
            },
            // Q26: Talaan ng Paglitaw/Paglubog ng Buwan - Mayo 3 (Paglubog) - 1730H (PDF p. 38/solution 1)
            { 
                question: { tl: "Batay sa talaan ng paglitaw at paglubog ng buwan (PDF p. 38), anong oras lulubog ang buwan sa Mayo 3?", en: "Based on the moonrise and moonset table (PDF p. 38), what time will the moon set on May 3?" }, 
                options: { tl: ["1659H", "1730H", "1829H", "1848H"], en: ["1659H", "1730H", "1829H", "1848H"] }, 
                answer: 1, topic: 'Reading Moonrise/Moonset' 
            },
            // Q27: Talaan ng Biyahe (PDF p. 39, Q1) - Departure Time (5J-565)
            { 
                question: { tl: "Batay sa Talaan ng Biyahe (PDF p. 39), anong oras ng umaga aalis ng Maynila ang 5J-565?", en: "Based on the Flight Schedule (PDF p. 39), what time in the morning does 5J-565 depart from Manila?" }, 
                options: { tl: ["0900H", "1000H", "1100H", "1300H"], en: ["0900H", "1000H", "1100H", "1300H"] }, 
                answer: 2, topic: 'Reading Flight Schedule' 
            },
            // Q28: Talaan ng Biyahe (PDF p. 39, Q1) - Flight Number (Arrives 1410H)
            { 
                question: { tl: "Alin ang biyahe-bilang na galing Maynila at darating sa Cebu sa oras na 2:10 PM?", en: "Which flight number from Manila arrives in Cebu at 2:10 PM?" }, 
                options: { tl: ["5J-561", "5J-563", "5J-565", "5J-567"], en: ["5J-561", "5J-563", "5J-565", "5J-567"] }, 
                answer: 3, topic: 'Reading Flight Schedule' 
            },
            // Q29: Talaan ng Biyaheng Pandagat (PDF p. 40, Q2) - Departure Day (Surigao/SF1/8)
            { 
                question: { tl: "Kailan aalis ang barkong SF1/8 patungong Surigao galing Maynila?", en: "When does vessel SF1/8 depart from Manila for Surigao?" }, 
                options: { tl: ["Biyernes (Byr.)", "Lunes (Lun.)", "Miyerkules (Myr.)", "Sabado (Sab.)"], en: ["Friday (Fri.)", "Monday (Mon.)", "Wednesday (Wed.)", "Saturday (Sat.)"] }, 
                answer: 1, topic: 'Reading Sea Schedule' 
            },
            // Q30: Talaan ng Biyaheng Pandagat (PDF p. 44, Q5) - Arrival Time (Palompon/Schrt)
            { 
                question: { tl: "Kailan darating ang sasakyang Sacred Heart (Schrt) sa Palompon?", en: "When will the vessel Sacred Heart (Schrt) arrive in Palompon?" }, 
                options: { tl: ["Miyerkules 11:59 AM", "Huwebes 3:30 AM", "Sabado 11:59 AM", "Martes 12:30 PM"], en: ["Wednesday 11:59 AM", "Thursday 3:30 AM", "Saturday 11:59 AM", "Tuesday 12:30 PM"] }, 
                answer: 1, topic: 'Reading Sea Schedule' 
            }
        ];

        let userAnswers = {}; // {qIndex: selectedOptionIndex}
        const quizName = "Pagsusulit: Ito'y Tungkol sa Oras";
        const quizLevelRawId = "elementary"; // Raw ID for records.php tracking
        const quizLevelDisplay = "Elementary"; // Display level name

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
                `<div class="section-title" id="sec-1-title">${uiText.section1Title[lang]}</div>`,
                `<div class="section-title" id="sec-2-title">${uiText.section2Title[lang]}</div>`,
                `<div class="section-title" id="sec-3-title">${uiText.section3Title[lang]}</div>`
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
         * Explicitly saves the current quiz result to BOTH storage keys.
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
            // This log will be filtered later to only show the LATEST score per quiz (typical user view)
            let userRecords = JSON.parse(localStorage.getItem(USER_RECORDS_KEY) || '[]');
            
            // Remove any existing entry for this specific quiz (upsert logic for user-specific view)
            const quizKey = `${recordToSave.name}-${recordToSave.rawLevelId}`; // Unique identifier for the quiz
            
            // Temporarily use the old upsert logic here to keep the user's dashboard clean
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
         * Added: submission time included in saved data so records show what time quiz was submitted.
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


            // --- 1. PREPARE THE RESULT OBJECT (NOW INCLUDES TIME) ---
            const now = new Date();
            currentQuizResult = {
                name: quizName,
                rawLevelId: quizLevelRawId, 
                level: quizLevelDisplay, 
                score: `${correctCount}/${totalQuestions}`,
                percentage: Math.round((correctCount / totalQuestions) * 100),
                date: now.toLocaleDateString('en-US'),
                time: now.toLocaleTimeString('en-US'),          // human readable time (e.g., "3:24:15 PM")
                submittedAt: now.toISOString()                  // ISO timestamp for exact ordering/filtering
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
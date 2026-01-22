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
    <title>Pagsusulit: Ilarawan ang Mundo Gamit ang Numero at Datos</title>
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
                <h1 class="text-4xl font-extrabold text-primary mb-2" id="quiz-title">Pagsusulit: Ilarawan ang Mundo Gamit ang Numero at Datos</h1>
                <p class="text-xl text-gray-600" id="quiz-subtitle">30 Items: Pagkalap ng Datos, Graphing, at Interpretasyon</p>
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
            'quizTitle': { tl: "Pagsusulit: Ilarawan ang Mundo Gamit ang Numero at Datos", en: "Quiz: Describing the World Using Numbers and Data" },
            'quizSubtitle': { tl: "30 Items: Pagkalap ng Datos, Graphing, at Interpretasyon", en: "30 Items: Data Collection, Graphing, and Interpretation" },
            'goBack': { tl: 'Bumalik', en: 'Go Back' },
            'section1Title': { tl: 'I. Aralin 1: Pagkalap ng Datos', en: 'I. Lesson 1: Data Collection' },
            'section2Title': { tl: 'II. Aralin 2: Pagsasaayos ng Datos sa Graphs', en: 'II. Lesson 2: Organizing Data in Graphs' },
            'section3Title': { tl: 'III. Aralin 3: Pag-aanalisa at Interpretasyon', en: 'III. Lesson 3: Analysis and Interpretation' },
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
            // Section I: Aralin 1: Pagkalap ng Datos (1-10)
            { 
                question: { tl: "Sino ang tumutukoy sa isang indibidwal na sumasagot sa mga tanong sa isang survey?", en: "Who refers to an individual who answers the questions in a survey?" }, 
                options: { tl: ["Population", "Sampling", "Respondent", "Census"], en: ["Population", "Sampling", "Respondent", "Census"] }, 
                answer: 2, topic: 'Terminolohiya' 
            },
            { 
                question: { tl: "Aling survey instrument ang set ng nakalimbag o nakasulat na tanong na may pagpipilian ng sagot?", en: "Which survey instrument is a set of printed or written questions with choices for answers?" }, 
                options: { tl: ["Interview", "Questionnaire", "Observation Guide", "Experiment"], en: ["Interview", "Questionnaire", "Observation Guide", "Experiment"] }, 
                answer: 1, topic: 'Instrument' 
            },
            { 
                question: { tl: "Aling method ng pagkalap ng datos ang pagtingin sa ugali o katangian ng tao nang walang interaksyon?", en: "Which method of data collection involves observing the behavior or characteristics of a person without interaction?" }, 
                options: { tl: ["Experiment", "Questionnaire", "Survey", "Observation"], en: ["Experiment", "Questionnaire", "Survey", "Observation"] }, 
                answer: 3, topic: 'Method' 
            },
            { 
                question: { tl: "Anong uri ng survey question ang may <b>dalawang posibleng sagot</b> (hal. Oo/Hindi)?", en: "What type of survey question has <b>two possible answers</b> (e.g., Yes/No)?" }, 
                options: { tl: ["Multiple Choice", "Rating Scale", "Dichotomous", "Likert Scale"], en: ["Multiple Choice", "Rating Scale", "Dichotomous", "Likert Scale"] }, 
                answer: 2, topic: 'Question Types' 
            },
            { 
                question: { tl: "Anong uri ng question ang gumagamit ng <b>numero</b> upang sukatin ang antas ng pagsang-ayon o damdamin?", en: "What type of question uses <b>numbers</b> to measure the level of agreement or feeling?" }, 
                options: { tl: ["Dichotomous", "Scaling/Rating", "Multiple Choice", "Open-ended"], en: ["Dichotomous", "Scaling/Rating", "Multiple Choice", "Open-ended"] }, 
                answer: 1, topic: 'Question Types' 
            },
            { 
                question: { tl: "Bakit dapat <b>panatilihing maiksi</b> ang isang survey?", en: "Why should a survey be <b>kept short</b>?" }, 
                options: { tl: ["Para walang maisagot ang respondent", "Para maging madali ang pag-encode", "Para hindi maging bias", "Para mapanatili ang atensyon ng respondent"], en: ["So the respondent has no answer", "To make encoding easy", "To avoid bias", "To maintain the respondent's attention"] }, 
                answer: 3, topic: 'Guidelines' 
            },
            { 
                question: { tl: "Alin ang dapat <b>iwasan</b> sa paggawa ng tanong?", en: "Which should be <b>avoided</b> when creating a question?" }, 
                options: { tl: ["Closed-ended questions", "Rating scales", "Absolute words (tulad ng 'laging' o 'hindi kailanman')", "Demographics"], en: ["Closed-ended questions", "Rating scales", "Absolute words (like 'always' or 'never')", "Demographics"] }, 
                answer: 2, topic: 'Guidelines' 
            },
            { 
                question: { tl: "Bakit kailangang <b>iwasan ang neutral responses</b> (tulad ng 'walang pinapanigan') sa rating scales?", en: "Why should <b>neutral responses</b> (like 'undecided') be <b>avoided</b> in rating scales?" }, 
                options: { tl: ["Para mas madali ang pag-compute ng mean", "Dahil ang mga respondent ay kadalasang pinipili ang neutral", "Para mapilitan ang respondent", "Para maiwasan ang bias"], en: ["To make computing the mean easier", "Because respondents often choose neutral", "To force the respondent", "To avoid bias"] }, 
                answer: 1, topic: 'Guidelines' 
            },
            { 
                question: { tl: "Kailan dapat tanungin ang mga <b>personal na tanong</b> (demographics tulad ng pangalan, edad) sa survey?", en: "When should <b>personal questions</b> (demographics like name, age) be asked in a survey?" }, 
                options: { tl: ["Sa simula", "Sa gitna", "Sa bandang huli", "Hindi na kailangan"], en: ["At the start", "In the middle", "Towards the end", "Not necessary"] }, 
                answer: 2, topic: 'Guidelines' 
            },
            { 
                question: { tl: "Aling method ng pagkalap ng datos ang madalas gamitin sa pagtukoy ng katangian ng populasyon?", en: "Which method of data collection is often used to determine population characteristics?" }, 
                options: { tl: ["Observation", "Experiment", "Interview", "Survey"], en: ["Observation", "Experiment", "Interview", "Survey"] }, 
                answer: 3, topic: 'Method' 
            },

            // Section II: Aralin 2: Pagsasaayos ng Datos sa Graphs (11-20)
            { 
                question: { tl: "Anong graph ang pinakamahusay gamitin upang ipakita ang <b>Monthly Budget Plan</b>?", en: "Which graph is best used to show a <b>Monthly Budget Plan</b>?" }, 
                options: { tl: ["Bar Graph", "Line Graph", "Pictograph", "Pie Chart"], en: ["Bar Graph", "Line Graph", "Pictograph", "Pie Chart"] }, 
                answer: 3, topic: 'Graphing: Pagpili' 
            },
            { 
                question: { tl: "Anong graph ang pinakamahusay gamitin upang ihambingin ang <b>Bilang ng Relief Goods Box na Natanggap ng Iba't Ibang Barangay</b>?", en: "Which graph is best used to compare the <b>Number of Relief Goods Boxes Received by Different Barangays</b>?" }, 
                options: { tl: ["Bar Graph", "Line Graph", "Pie Chart", "Pictograph"], en: ["Bar Graph", "Line Graph", "Pie Chart", "Pictograph"] }, 
                answer: 0, topic: 'Graphing: Pagpili' 
            },
            { 
                question: { tl: "Anong graph ang pinakamahusay gamitin upang i-track ang <b>pagbabago ng presyo ng bigas</b> sa loob ng isang taon?", en: "Which graph is best used to track the <b>change in rice price</b> over a year?" }, 
                options: { tl: ["Bar Graph", "Line Graph", "Pie Chart", "Pictograph"], en: ["Bar Graph", "Line Graph", "Pie Chart", "Pictograph"] }, 
                answer: 1, topic: 'Graphing: Pagpili' 
            },
            { 
                question: { tl: "Anong graph ang gumagamit ng <b>larawan o simbolo</b> upang ipakita ang numerical information (hal. kotse = 1000 cars)?", en: "Which graph uses <b>pictures or symbols</b> to show numerical information (e.g., car = 1000 cars)?" }, 
                options: { tl: ["Bar Graph", "Line Graph", "Pictograph", "Pie Chart"], en: ["Bar Graph", "Line Graph", "Pictograph", "Pie Chart"] }, 
                answer: 2, topic: 'Graphing: Kahulugan' 
            },
            { 
                question: { tl: "Sa <b>Vertical Bar Graph</b>, nasaan ang <b>kategorya</b> (tulad ng uri ng supplies)?", en: "In a <b>Vertical Bar Graph</b>, where is the <b>category</b> (like type of supplies) located?" }, 
                options: { tl: ["Sa Vertical Axis", "Sa Horizontal Axis", "Sa Legend", "Sa Title"], en: ["On the Vertical Axis", "On the Horizontal Axis", "In the Legend", "In the Title"] }, 
                answer: 1, topic: 'Graphing: Parts' 
            },
            { 
                question: { tl: "Anong total value ang kinakatawan ng isang <b>buong Pie Chart</b>?", en: "What total value does a <b>whole Pie Chart</b> represent?" }, 
                options: { tl: ["10", "100", "100%", "24 hours"], en: ["10", "100", "100%", "24 hours"] }, 
                answer: 2, topic: 'Graphing: Parts' 
            },
            { 
                question: { tl: "Sa budget na P25,000, 52% ay para sa pagkain. Magkano ang halaga para sa pagkain?", en: "In a budget of P25,000, 52% is for food. What is the amount for food?" }, 
                options: { tl: ["P12,500.00", "P13,000.00", "P13,500.00", "P14,500.00"], en: ["P12,500.00", "P13,000.00", "P13,500.00", "P14,500.00"] }, 
                answer: 1, topic: 'Graphing: Calculation' 
            }, 
            { 
                question: { tl: "Sa budget na P25,000, 10% ang Fare at 13% ang Load/Internet. Magkano ang <b>total</b> para sa dalawang ito?", en: "In a budget of P25,000, 10% is Fare and 13% is Load/Internet. What is the <b>total</b> amount for these two?" }, 
                options: { tl: ["P5,000.00", "P5,250.00", "P5,750.00", "P6,250.00"], en: ["P5,000.00", "P5,250.00", "P5,750.00", "P6,250.00"] }, 
                answer: 2, topic: 'Graphing: Calculation' 
            }, 
            { 
                question: { tl: "Sa budget na P25,000, 25% ang Rental/Utility Bills. Magkano ang halaga?", en: "In a budget of P25,000, 25% is for Rental/Utility Bills. What is the amount?" }, 
                options: { tl: ["P6,000.00", "P6,250.00", "P6,500.00", "P6,750.00"], en: ["P6,000.00", "P6,250.00", "P6,500.00", "P6,750.00"] }, 
                answer: 1, topic: 'Graphing: Calculation' 
            }, 
            { 
                question: { tl: "Ano ang tawag sa <b>maikling paliwanag ng simbolo</b> na ginamit sa pictograph?", en: "What is the name for the <b>short explanation of the symbol</b> used in a pictograph?" }, 
                options: { tl: ["Title", "Axis", "Label", "Legend"], en: ["Title", "Axis", "Label", "Legend"] }, 
                answer: 3, topic: 'Graphing: Parts' 
            },

            // Section III: Aralin 3: Pag-aanalisa at Interpretasyon (21-30)
            { 
                question: { tl: "Sa Relief Goods Distribution chart, anong Barangay ang may <b>pinakamaraming natanggap</b> (highest bar)?", en: "In the Relief Goods Distribution chart, which Barangay received the <b>most</b> (highest bar)?" }, 
                options: { tl: ["Barangay 1", "Barangay 2", "Barangay 3", "Barangay 4"], en: ["Barangay 1", "Barangay 2", "Barangay 3", "Barangay 4"] }, 
                answer: 0, topic: 'Interpretation: Bar Graph' 
            },
            { 
                question: { tl: "Sa Relief Goods Distribution, ilan ang total families na natulungan sa <b>Barangay 4 at 5</b>?", en: "In the Relief Goods Distribution, what is the total number of families helped in <b>Barangay 4 and 5</b>?" }, 
                options: { tl: ["58", "60", "62", "64"], en: ["58", "60", "62", "64"] }, 
                answer: 2, topic: 'Interpretation: Bar Graph' 
            }, 
            { 
                question: { tl: "Sa Seasonally Adjusted Month-on-Month Inflation Rate chart, anong months ang nagpapakita ng <b>pagbaba ng inflation rate</b>?", en: "In the Seasonally Adjusted Month-on-Month Inflation Rate chart, which months show a <b>decrease in the inflation rate</b>?" }, 
                options: { tl: ["May-June", "July-Sep", "Dec-Feb", "Sep-Oct"], en: ["May-June", "July-Sep", "Dec-Feb", "Sep-Oct"] }, 
                answer: 3, topic: 'Interpretation: Line Graph' 
            },
            { 
                question: { tl: "Sa Time Spent on Daily Activities chart, kung 25% ang tulog, ilang <b>oras</b> ang inilalaan para sa pagtulog (sa 24 oras)?", en: "In the Time Spent on Daily Activities chart, if 25% is sleep, how many <b>hours</b> are allotted for sleeping (in 24 hours)?" }, 
                options: { tl: ["4 hours", "5 hours", "6 hours", "7 hours"], en: ["4 hours", "5 hours", "6 hours", "7 hours"] }, 
                answer: 2, topic: 'Interpretation: Pie Chart' 
            }, 
            { 
                question: { tl: "Sa Students' Favorite Fruits chart, alin ang <b>pinakakaunting nagustuhan</b> (least preferred)?", en: "In the Students' Favorite Fruits chart, which is the <b>least preferred</b>?" }, 
                options: { tl: ["Strawberry", "Orange", "Banana", "Apple"], en: ["Strawberry", "Orange", "Banana", "Apple"] }, 
                answer: 3, topic: 'Interpretation: Pictograph' 
            }, 
            { 
                question: { tl: "Sa Students' Favorite Fruits chart, ilan ang nagustuhan ng <b>pinakamaraming estudyante</b>?", en: "In the Students' Favorite Fruits chart, how many students preferred the <b>most popular</b> fruit?" }, 
                options: { tl: ["27", "30", "33", "36"], en: ["27", "30", "33", "36"] }, 
                answer: 3, topic: 'Interpretation: Pictograph' 
            }, 
            { 
                question: { tl: "Sa Students Favorite Subject chart, ilan ang pumili ng <b>Mathematics</b>?", en: "In the Students' Favorite Subject chart, how many chose <b>Mathematics</b>?" }, 
                options: { tl: ["30", "32", "34", "36"], en: ["30", "32", "34", "36"] }, 
                answer: 1, topic: 'Interpretation: Bar Graph' 
            },
            { 
                question: { tl: "Sa Students Favorite Subject chart, alin ang <b>pinakakaunting pumili</b> (fewest number)?", en: "In the Students' Favorite Subject chart, which one had the <b>fewest number of choosers</b>?" }, 
                options: { tl: ["English", "Filipino", "MAPEH", "Science"], en: ["English", "Filipino", "MAPEH", "Science"] }, 
                answer: 2, topic: 'Interpretation: Bar Graph' 
            },
            { 
                question: { tl: "Sa Aling Teresa's Fishpond Business chart, kailan naganap ang <b>pinakamataas na kita</b>?", en: "In Aling Teresa's Fishpond Business chart, when did the <b>highest income</b> occur?" }, 
                options: { tl: ["April", "May", "June", "July"], en: ["April", "May", "June", "July"] }, 
                answer: 2, topic: 'Interpretation: Line Graph' 
            },
            { 
                question: { tl: "Sa Time Spent on Daily Activities chart, anong percentage ang <b>hindi ginugol</b> sa pagtulog (25%) at trabaho (40%)?", en: "In the Time Spent on Daily Activities chart, what percentage was <b>not spent</b> on sleeping (25%) and working (40%)?" }, 
                options: { tl: ["30%", "35%", "40%", "45%"], en: ["30%", "35%", "40%", "45%"] }, 
                answer: 1, topic: 'Interpretation: Pie Chart' 
            }
        ];

        let userAnswers = {}; // {qIndex: selectedOptionIndex}
        const quizName = "Pagsusulit: Ilarawan ang Mundo Gamit ang Numero at Datos";
        const quizLevelRawId = "juniorhigh"; // Set to Junior High
        const quizLevelDisplay = "Junior High"; // Set to Junior High

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
         * Updated to include time (human-friendly) and ISO timestamp along with the date.
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
                // new fields for time recording
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
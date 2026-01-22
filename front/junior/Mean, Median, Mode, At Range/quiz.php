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
    <title>Pagsusulit: Mean, Median, Mode, at Range</title>
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
                <h1 class="text-4xl font-extrabold text-primary mb-2" id="quiz-title">Pagsusulit: Mean, Median, Mode, at Range</h1>
                <p class="text-xl text-gray-600" id="quiz-subtitle">30 Items: Sukatan ng Sentral na Hilig at Pagbabago-bago</p>
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
            'quizTitle': { tl: "Pagsusulit: Mean, Median, Mode, at Range", en: "Quiz: Mean, Median, Mode, and Range" },
            'quizSubtitle': { tl: "30 Items: Sukatan ng Sentral na Hilig at Pagbabago-bago", en: "30 Items: Measures of Central Tendency and Variability" },
            'goBack': { tl: 'Bumalik', en: 'Go Back' },
            'section1Title': { tl: 'I. Aralin 1: Mean (Aritmetikang Average)', en: 'I. Lesson 1: Mean (Arithmetic Average)' },
            'section2Title': { tl: 'II. Aralin 2 & 3: Median (Gitnang Halaga) at Mode (Pinakamadalas)', en: 'II. Lesson 2 & 3: Median (Middle Value) and Mode (Most Frequent)' },
            'section3Title': { tl: 'III. Aralin 4: Range (Pagbabago-bago) at Aplikasyon', en: 'III. Lesson 4: Range (Variability) and Application' },
            'submitButton': { tl: 'Tapusin at Tingnan ang Resulta', en: 'Finish and View Results' },
            'unansweredAlert': { tl: 'Kailangan mo pang sagutan ang', en: 'You still need to answer' },
            'unansweredAlertSuffix': { tl: 'na tanong bago mag-submit.', en: 'questions before submitting.' },
            'modalTitle': { tl: 'Resulta ng Pagsusulit', en: 'Quiz Results' },
            'modalScoreText': { tl: 'Nakakuha ka ng:', en: 'You scored:' },
            'modalReviewText': { tl: 'Tingnan ang iyong mga sagot sa ibaba para matuto.', en: 'Review your answers below to learn.' },
            'recordButton': { tl: 'I-record ang Resulta at Pumunta sa Talaan', en: 'Record Result and Go to Records' }, // UPDATED TEXT
            'resetButton': { tl: 'Subukan Muli', en: 'Try Again' },
        };
        
        // --- QUIZ DATA (30 Items Total) - UPDATED FOR TRANSLATION ---
        const quizData = [
            // Section I: Aralin 1 - Mean (1-10)
            { 
                // Changed ** to <b>
                question: { tl: "Ano ang tawag sa aritmetikang average ng isang grupo ng mga numero, na kinakatawan ng pormulang <b>Mean = Suma ng Data / Bilang ng Data</b>?", en: "What is the arithmetic average of a group of numbers, represented by the formula <b>Mean = Sum of Data / Number of Data</b>?" }, 
                options: { tl: ["Median", "Mode", "Range", "Mean"], en: ["Median", "Mode", "Range", "Mean"] }, 
                answer: 3, topic: 'Mean Definition' 
            },
            { 
                question: { tl: "Si Rachel ay nagtala ng oras na 1.40, 1.37, at 1.49 minuto. Ano ang kanyang Mean na oras?", en: "Rachel recorded times of 1.40, 1.37, and 1.49 minutes. What is her Mean time?" }, 
                options: { tl: ["1.37 minuto", "1.40 minuto", "1.42 minuto", "1.45 minuto"], en: ["1.37 minutes", "1.40 minutes", "1.42 minutes", "1.45 minutes"] }, 
                answer: 2, topic: 'Mean Calculation' 
            }, // 1.42
            { 
                question: { tl: "Ano ang Mean ng mga bilang: 2, 4, 9, 11?", en: "What is the Mean of the numbers: 2, 4, 9, 11?" }, 
                options: { tl: ["6", "6.5", "7", "7.5"], en: ["6", "6.5", "7", "7.5"] }, 
                answer: 1, topic: 'Mean Calculation' 
            }, // 6.5
            { 
                question: { tl: "Kung ang kabuuang kaloriya sa isang linggo ay 14,000 at hinati sa 7 araw, ano ang Mean na kaloriya?", en: "If the total calories consumed in one week is 14,000 and it's divided by 7 days, what is the Mean calorie intake?" }, 
                options: { tl: ["1,400", "2,000", "2,500", "14,000"], en: ["1,400", "2,000", "2,500", "14,000"] }, 
                answer: 1, topic: 'Mean Calculation' 
            }, // 2,000
            { 
                // Changed ** to <b>
                question: { tl: "Ano ang ibig sabihin ng simbolong <b>Suma (\u03A3)</b> sa pormula ng Mean? (Tandaan: $\\bar{x}$ ay ang Mean.)", en: "What does the symbol <b>Summation (\u03A3)</b> mean in the Mean formula? (Note: $\\bar{x}$ is the Mean.)" }, 
                options: { tl: ["Pinakamataas na Halaga", "Bilang ng Data (N)", "Suma (Sum)", "Gitnang Halaga"], en: ["Maximum Value", "Number of Data Points (N)", "Summation (Sum)", "Middle Value"] }, 
                answer: 2, topic: 'Mean Formula Symbol' 
            },
            { 
                question: { tl: "Si Simon ay may 5 iskor (88, 90, 91, 85, 93). Kung nais niyang mag-average ng 90 sa 6 na asignatura, ano ang dapat niyang makuha sa ika-6 na asignatura (Matematika)?", en: "Simon has 5 scores (88, 90, 91, 85, 93). If he wants to average 90 across 6 subjects, what score must he get in the 6th subject (Mathematics)?" }, 
                options: { tl: ["90", "93", "97", "100"], en: ["90", "93", "97", "100"] }, 
                answer: 1, topic: 'Solving for Missing Data (Mean)' 
            }, // 93
            { 
                question: { tl: "Ano ang tamang hakbang bago hatiin ang suma sa bilang ng konsumo upang makuha ang Mean?", en: "What is the correct step before dividing the sum by the number of data points to find the Mean?" }, 
                options: { tl: ["Hanapin ang Mode", "Ayusin ang datos mula mababa pataas", "Sumahin lahat ang ibinigay na impormasyon", "Hanapin ang Range"], en: ["Find the Mode", "Arrange the data from lowest to highest", "Sum up all the given information", "Find the Range"] }, 
                answer: 2, topic: 'Mean Steps' 
            },
            { 
                question: { tl: "Kung ang buwanang konsumo ng kuryente sa loob ng isang taon ay 2,760 kilowat-oras, ano ang Mean na konsumo?", en: "If the total monthly electricity consumption for one year is 2,760 kilowatt-hours, what is the Mean monthly consumption?" }, 
                options: { tl: ["200", "220", "230", "240"], en: ["200", "220", "230", "240"] }, 
                answer: 2, topic: 'Mean Calculation (Annual)' 
            }, // 230
            { 
                question: { tl: "Ano ang Mean ng mga iskor: 80, 85, 90, 95, 100?", en: "What is the Mean of the scores: 80, 85, 90, 95, 100?" }, 
                options: { tl: ["88", "90", "92", "95"], en: ["88", "90", "92", "95"] }, 
                answer: 1, topic: 'Mean Calculation' 
            }, // 90
            { 
                question: { tl: "Kung ang Mean ng 4 na numero ay 15, at ang tatlo sa mga numero ay 12, 18, at 16, ano ang ika-apat na numero?", en: "If the Mean of 4 numbers is 15, and three of the numbers are 12, 18, and 16, what is the fourth number?" }, 
                options: { tl: ["10", "14", "16", "20"], en: ["10", "14", "16", "20"] }, 
                answer: 1, topic: 'Solving for Missing Data (Mean)' 
            }, // 14

            // Section II: Aralin 2 & 3 - Median at Mode (11-23)
            { 
                question: { tl: "Ano ang tawag sa halaga na naghahati sa dalawang grupo ng mga bilang kung saan ang 50% ay mas mataas at ang 50% ay mas mababa?", en: "What is the term for the value that divides a group of numbers into two groups where 50% are higher and 50% are lower?" }, 
                options: { tl: ["Mean", "Median", "Mode", "Range"], en: ["Mean", "Median", "Mode", "Range"] }, 
                answer: 1, topic: 'Median Definition' 
            },
            { 
                question: { tl: "Bakit mas magandang gamitin ang Median kaysa Mean kung ang pangkat ng data ay mayroong 'outlier'?", en: "Why is it better to use the Median than the Mean if the data set has an 'outlier'?" }, 
                options: { tl: ["Dahil mas madaling makuha ito.", "Dahil hindi ito apektado ng mga bilang na lubhang napakataas o napakababa.", "Dahil ito ang pinakamadalas lumabas.", "Dahil ito ang pagkakaiba ng pinakamataas at pinakamababa."], en: ["Because it is easier to calculate.", "Because it is not affected by numbers that are extremely high or extremely low.", "Because it is the most frequent value.", "Because it is the difference between the highest and lowest values."] }, 
                answer: 1, topic: 'Median Use Case' 
            },
            { 
                question: { tl: "Ano ang tawag sa bilang na lubhang napakalaki o lubhang napakaliit kumpara sa ibang bilang sa pangkat ng data?", en: "What is the term for a number that is extremely large or extremely small compared to the other numbers in the data set?" }, 
                options: { tl: ["Median", "Range", "Mode", "Outlier (Panggulo)"], en: ["Median", "Range", "Mode", "Outlier"] }, 
                answer: 3, topic: 'Outlier Definition' 
            },
            { 
                question: { tl: "Ano ang Median ng mga timbang (lb): 71, 72, 75, 77, 84, 89, 90, 98, 100?", en: "What is the Median of the weights (lb): 71, 72, 75, 77, 84, 89, 90, 98, 100?" }, 
                options: { tl: ["77", "84", "89", "100"], en: ["77", "84", "89", "100"] }, 
                answer: 1, topic: 'Median Odd N' 
            }, // 84
            { 
                question: { tl: "Ano ang dapat gawin kung ang bilang ng data (N) ay Even (nahahati) upang makuha ang Median?", en: "What should be done if the number of data points (N) is Even to find the Median?" }, 
                options: { tl: ["Kumuha ng Mean ng lahat ng bilang.", "Kumuha ng Mean ng dalawang gitnang halaga.", "Ang pinakamababang halaga ang Median.", "Ang pinakamataas na halaga ang Median."], en: ["Find the Mean of all numbers.", "Find the Mean of the two middle values.", "The lowest value is the Median.", "The highest value is the Median."] }, 
                answer: 1, topic: 'Median Even N Rule' 
            },
            { 
                question: { tl: "Ano ang Median ng mga iskor: 6, 9, 10, 13, 13, 48?", en: "What is the Median of the scores: 6, 9, 10, 13, 13, 48?" }, 
                options: { tl: ["10", "11.5", "13", "14.5"], en: ["10", "11.5", "13", "14.5"] }, 
                answer: 1, topic: 'Median Even N Calculation' 
            }, // 11.5
            { 
                question: { tl: "Hanapin ang Median sahod: \u20b12,500, \u20b12,600, \u20b12,700, \u20b13,100, \u20b13,300, \u20b13,300, \u20b13,400, \u20b13,500, \u20b13,500. (9 na empleyado)", en: "Find the Median salary: \u20b12,500, \u20b12,600, \u20b12,700, \u20b13,100, \u20b13,300, \u20b13,300, \u20b13,400, \u20b13,500, \u20b13,500. (9 employees)" }, 
                options: { tl: ["\u20b13,100", "\u20b13,300", "\u20b13,500", "\u20b13,550"], en: ["\u20b13,100", "\u20b13,300", "\u20b13,500", "\u20b13,550"] }, 
                answer: 0, topic: 'Median Odd N Calculation' 
            }, // 3,100
            { 
                question: { tl: "Ano ang tawag sa halaga o kategorya na pinakamadalas (pinakamataas na dalas) lumabas sa isang pangkat ng data?", en: "What is the term for the value or category that appears most frequently (highest frequency) in a data set?" }, 
                options: { tl: ["Mean", "Median", "Mode", "Range"], en: ["Mean", "Median", "Mode", "Range"] }, 
                answer: 2, topic: 'Mode Definition' 
            },
            { 
                question: { tl: "Base sa benta ng sapatos: Mike (11), Aide (7), Reverse (9), Torn (10). Ano ang Modal?", en: "Based on shoe sales: Mike (11), Aide (7), Reverse (9), Torn (10). Which is the Modal category?" }, 
                options: { tl: ["Aide", "Reverse", "Torn", "Mike"], en: ["Aide", "Reverse", "Torn", "Mike"] }, 
                answer: 3, topic: 'Modal Category' 
            }, // Mike (11)
            { 
                question: { tl: "Ano ang Mode ng mga numero: 1, 3, 5, 5, 7, 8, 8, 10?", en: "What is the Mode of the numbers: 1, 3, 5, 5, 7, 8, 8, 10?" }, 
                options: { tl: ["5", "8", "5 at 8", "Walang Mode"], en: ["5", "8", "5 and 8", "No Mode"] }, 
                answer: 2, topic: 'Bimodal Identification' 
            },
            { 
                question: { tl: "Kung ang isang pangkat ng data ay may dalawang pinakamadalas na halaga (bimodal) na magkakalapit (hal. 9,000 at 10,000), ano ang magiging Mode?", en: "If a data set has two most frequent values (bimodal) that are close (e.g., 9,000 and 10,000), what will be the Mode? " }, 
                options: { tl: ["Ang pinakamataas na halaga.", "Ang average ng dalawang halaga.", "Ang pinakamababang halaga.", "Walang Mode."], en: ["The highest value.", "The average of the two values.", "The lowest value.", "No Mode."] }, 
                answer: 1, topic: 'Bimodal Rule' 
            }, // Average (9500)
            { 
                question: { tl: "Sa serbisyo ng tindahan: Bookbinding (31), Ring binding (40), Zerox (150), Typing (56), Gift wrapping (98). Ano ang Modal na serbisyo?", en: "In store services: Bookbinding (31), Ring binding (40), Zerox (150), Typing (56), Gift wrapping (98). Which is the Modal service?" }, 
                options: { tl: ["Bookbinding", "Ring binding", "Zerox", "Gift wrapping"], en: ["Bookbinding", "Ring binding", "Zerox", "Gift wrapping"] }, 
                answer: 2, topic: 'Modal Category Problem' 
            }, // Zerox (150)
            { 
                question: { tl: "Alin ang kaisa-isang sukatan na ginagamit sa pagpapasiya ng kalidad ng isang bagay (tulad ng tatak ng sapatos)?", en: "Which single measure is used in determining the quality of an item (such as a shoe brand)?" }, 
                options: { tl: ["Mean", "Median", "Mode", "Range"], en: ["Mean", "Median", "Mode", "Range"] }, 
                answer: 2, topic: 'Mode Use Case' 
            },

            // Section III: Aralin 4 - Range at Application (24-30)
            { 
                question: { tl: "Ano ang tawag sa sukatan ng pagbabago-bago ng data na pagkakaiba ng pinakamataas at pinakamabababang halaga?", en: "What is the term for the measure of variability in data, which is the difference between the highest and lowest values?" }, 
                options: { tl: ["Mean", "Median", "Mode", "Range"], en: ["Mean", "Median", "Mode", "Range"] }, 
                answer: 3, topic: 'Range Definition' 
            },
            { 
                // Removed LaTeX: X_max and X_min
                question: { tl: "Ano ang pormula sa pagkuha ng Range (R)?", en: "What is the formula for calculating the Range (R)?" }, 
                options: { tl: ["R = Pinakamataas + Pinakamababa", "R = <b>Pinakamataas - Pinakamababa</b>", "R = Suma ng Data / Bilang ng Data", "R = Bilang ng Data / 2"], en: ["R = Highest + Lowest", "R = <b>Highest - Lowest</b>", "R = Sum of Data / Number of Data", "R = Number of Data / 2"] }, 
                answer: 1, topic: 'Range Formula' 
            },
            { 
                question: { tl: "Ang pinakamataas na benta ng dyaryo ay 74 at ang pinakamababa ay 25. Ano ang Range?", en: "The highest newspaper sale is 74 and the lowest is 25. What is the Range?" }, 
                options: { tl: ["25", "49", "74", "99"], en: ["25", "49", "74", "99"] }, 
                answer: 1, topic: 'Range Calculation' 
            }, // 49
            { 
                question: { tl: "Hanapin ang Range ng mga numero: 77, 80, 90, 65, 77, 89.", en: "Find the Range of the numbers: 77, 80, 90, 65, 77, 89." }, 
                options: { tl: ["15", "25", "27", "90"], en: ["15", "25", "27", "90"] }, 
                answer: 1, topic: 'Range Calculation' 
            }, // 25
            { 
                // Changed ** to <b>
                question: { tl: "Hanapin ang Range ng mga iskor sa IQ: 140 (<b>Pinakamataas</b>) at 73 (<b>Pinakamababa</b>).", en: "Find the Range of the IQ scores: 140 (<b>Highest</b>) and 73 (<b>Lowest</b>)." }, 
                options: { tl: ["67", "73", "140", "213"], en: ["67", "73", "140", "213"] }, 
                answer: 0, topic: 'Range Calculation' 
            }, // 67
            { 
                question: { tl: "Sa pangkat ng mga numero: 1,999, 2,880, 4,298, 9,000, 1,500. Ano ang Range?", en: "In the set of numbers: 1,999, 2,880, 4,298, 9,000, 1,500. What is the Range?" }, 
                options: { tl: ["1,999", "7,001", "7,500", "9,000"], en: ["1,999", "7,001", "7,500", "9,000"] }, 
                answer: 2, topic: 'Range Calculation' 
            }, // 7,500
            { 
                // Changed ** to <b>
                question: { tl: "Kung ang Range ng isang set of data ay 34 (40 ang <b>Pinakamataas</b>), ano ang pinakamabababang iskor (<b>Pinakamababa</b>)?", en: "If the Range of a set of data is 34 (40 is the <b>Highest</b>), what is the lowest score (<b>Lowest</b>)? " }, 
                options: { tl: ["6", "19", "34", "74"], en: ["6", "19", "34", "74"] }, 
                answer: 0, topic: 'Range Solving' 
            } // 6
        ];

        let userAnswers = {}; // {qIndex: selectedOptionIndex}
        const quizName = "Pagsusulit: Mean, Median, Mode, at Range";
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
            
            alertBox.classList.remove('hidden', 'bg-red-100', 'text-error', 'bg-primary-light', 'text-success'); // Replaced bg-green-100
            
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
            let section1Content = ''; // Mean (Q1-Q10)
            let section2Content = ''; // Median and Mode (Q11-Q23)
            let section3Content = ''; // Range (Q24-Q30)

            // Separate HTML for the header/title of each card
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

                    // Options buttons are text-aligned left, using text-lg for increased size
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
                
                // Route question to the correct section (1-10, 11-23, 24-30)
                if (index < 10) {
                    section1Content += questionHtml;
                } else if (index < 23) {
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
            
            const goBackElement = document.querySelector('.absolute .font-semibold');
            if (goBackElement) {
                goBackElement.textContent = uiText.goBack[lang];
            }
            
            submitButton().textContent = uiText.submitButton[lang];
            
            // Modal elements
            document.getElementById('modal-title').textContent = uiText.modalTitle[lang];
            document.getElementById('modal-score-text').textContent = uiText.modalScoreText[lang];
            document.getElementById('modal-review-text').textContent = uiText.modalReviewText[lang];
            document.getElementById('record-button-link').textContent = uiText.recordButton[lang];
            document.getElementById('reset-button-modal').textContent = uiText.resetButton[lang];
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
         * Now includes date AND time (and ISO timestamp) saved in the result object.
         * Time format changed to 12-hour with AM/PM.
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
                // Record date AND time (12-hour format with AM/PM)
                date: now.toLocaleDateString('en-US'), // e.g. "1/5/2026"
                time: now.toLocaleTimeString('en-US', { hour12: true }), // e.g. "2:32:05 PM"
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
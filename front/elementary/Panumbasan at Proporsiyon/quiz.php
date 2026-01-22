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
    <title>Pagsusulit: Panumbasan at Proporsiyon</title>
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
                <h1 class="text-4xl font-extrabold text-primary mb-2" id="quiz-title">Pagsusulit: Panumbasan at Proporsiyon</h1>
                <p class="text-xl text-gray-600" id="quiz-subtitle">30 Items: Ratio, Rate, at Proportion Solving</p>
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
                    <!-- UPDATED LINK TEXT AND ACTION -->
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
            'quizTitle': { tl: "Pagsusulit: Panumbasan at Proporsiyon", en: "Quiz: Ratio and Proportion" },
            'quizSubtitle': { tl: "30 Items: Ratio, Rate, at Proportion Solving", en: "30 Items: Ratio, Rate, and Proportion Solving" },
            'goBack': { tl: 'Bumalik', en: 'Go Back' },
            'section1Title': { tl: 'I. Ratio at Pinakamababang Anyo', en: 'I. Ratio and Simplification' },
            'section2Title': { tl: 'II. Rate at Rate Word Problems', en: 'II. Rate and Rate Word Problems' },
            'section3Title': { tl: 'III. Proportion Solving', en: 'III. Proportion Solving' },
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
            // Section I: Ratio at Pinakamababang Anyo (1-10) - Aralin 1
            { 
                question: { tl: "Ang paghahambing ng dalawang magkatulad na dami sa pamamagitan ng paghahati-hati ay tinatawag na:", en: "The comparison of two similar quantities by division is called a:" }, 
                options: { tl: ["Rate", "Proporsiyon", "Ratio", "Quotient"], en: ["Rate", "Proportion", "Ratio", "Quotient"] }, 
                answer: 2, topic: 'Definition' 
            },
            { 
                question: { tl: "May 46 na lalaki at 54 na babae sa isang klase. Ano ang ratio ng lalaki sa babae sa pinakamababang anyo?", en: "There are 46 boys and 54 girls in a class. What is the ratio of boys to girls in its lowest term?" }, 
                options: { tl: ["23:27", "46:54", "2:3", "4:5"], en: ["23:27", "46:54", "2:3", "4:5"] }, 
                answer: 0, topic: 'Simplification' 
            },
            { 
                question: { tl: "Ano ang ratio ng babae sa kabuuang populasyon (100) sa pinakamabababang anyo?", en: "What is the ratio of girls to the total population (100) in its lowest term?" }, 
                options: { tl: ["54:100", "27:50", "23:50", "50:100"], en: ["54:100", "27:50", "23:50", "50:100"] }, 
                answer: 1, topic: 'Simplification' 
            },
            { 
                question: { tl: "Ang 4:10 ay katumbas ng alin sa pinakamababang anyo?", en: "4:10 is equivalent to which in its lowest term?" }, 
                options: { tl: ["8:20", "2:5", "1:3", "40:100"], en: ["8:20", "2:5", "1:3", "40:100"] }, 
                answer: 1, topic: 'Simplification' 
            },
            { 
                question: { tl: "Ang 15:30 ay katumbas ng alin sa pinakamababang anyo?", en: "15:30 is equivalent to which in its lowest term?" }, 
                options: { tl: ["3:6", "5:10", "1:2", "30:60"], en: ["3:6", "5:10", "1:2", "30:60"] }, 
                answer: 2, topic: 'Simplification' 
            },
            { 
                question: { tl: "Alin sa mga sumusunod ang equivalent ratio ng 2:3?", en: "Which of the following is an equivalent ratio of 2:3?" }, 
                options: { tl: ["4:5", "6:9", "5:6", "1:1.5"], en: ["4:5", "6:9", "5:6", "1:1.5"] }, 
                answer: 1, topic: 'Equivalent Ratio' 
            },
            { 
                question: { tl: "Para maging equivalent ratio, ang 8:12 ay dapat katumbas ng 2:x. Ano ang halaga ng x?", en: "For an equivalent ratio, 8:12 must be equal to 2:x. What is the value of x?" }, 
                options: { tl: ["3", "4", "5", "6"], en: ["3", "4", "5", "6"] }, 
                answer: 0, topic: 'Equivalent Ratio' 
            },
            { 
                question: { tl: "Ano ang ratio ng taas ng puno (3 metro) sa haba ng kawayan (150 sentimetro) sa pinakamababang anyo? (1m = 100cm)", en: "What is the ratio of the height of a tree (3 meters) to the length of a bamboo (150 centimeters) in its lowest term? (1m = 100cm)" }, 
                options: { tl: ["3:1.5", "2:1", "300:15", "1:2"], en: ["3:1.5", "2:1", "300:15", "1:2"] }, 
                answer: 1, topic: 'Unit Conversion & Ratio' 
            },
            { 
                question: { tl: "Sa proportion na a:b = c:d, ang 'extremes' ay ang mga termino na:", en: "In the proportion a:b = c:d, the 'extremes' are the terms:" }, 
                options: { tl: ["a at c", "b at d", "a at d", "b at c"], en: ["a and c", "b and d", "a and d", "b and c"] }, 
                answer: 2, topic: 'Proportion Terminology' 
            },
            { 
                question: { tl: "Sa proportion na a:b = c:d, ang 'means' ay ang mga termino na:", en: "In the proportion a:b = c:d, the 'means' are the terms:" }, 
                options: { tl: ["a at c", "b at d", "a at d", "b at c"], en: ["a and c", "b and d", "a and d", "b and c"] }, 
                answer: 3, topic: 'Proportion Terminology' 
            },

            // Section II: Rate at Rate Word Problems (11-20) - Aralin 1
            { 
                question: { tl: "Ang rate ay ginagamit kapag ikinukumpara ang dalawang bilang na may:", en: "Rate is used when comparing two numbers with:" }, 
                options: { tl: ["Magkatulad na yunit", "Magkaibang uri/yunit", "Parehong halaga", "Parehong fraction"], en: ["Similar units", "Different types/units", "Same value", "Same fraction"] }, 
                answer: 1, topic: 'Rate Definition' 
            },
            { 
                question: { tl: "Siya ay nakapag-type ng 220 salita sa loob ng 4 na minuto. Gaano siya kabilis sa bawat minuto?", en: "She typed 220 words in 4 minutes. How fast is she per minute?" }, 
                options: { tl: ["44 salita/min", "50 salita/min", "55 salita/min", "60 salita/min"], en: ["44 words/min", "50 words/min", "55 words/min", "60 words/min"] }, 
                answer: 2, topic: 'Rate (Quantity/Time)' 
            },
            { 
                question: { tl: "Ang 8 minutong tawag sa ibang bansa ay ₱164.00. Magkano ang halaga ng tawag sa bawat minuto?", en: "An 8-minute international call costs ₱164.00. How much is the cost per minute?" }, 
                options: { tl: ["₱18.50/min", "₱20.50/min", "₱21.00/min", "₱25.00/min"], en: ["₱18.50/min", "₱20.50/min", "₱21.00/min", "₱25.00/min"] }, 
                answer: 1, topic: 'Rate (Cost/Quantity)' 
            },
            { 
                question: { tl: "Ang 50 kilong bigas ay ₱900.00. Ano ang presyo nito bawat kilo?", en: "50 kilograms of rice cost ₱900.00. What is the price per kilogram?" }, 
                options: { tl: ["₱18.00/kilo", "₱19.00/kilo", "₱20.00/kilo", "₱22.00/kilo"], en: ["₱18.00/kilo", "₱19.00/kilo", "₱20.00/kilo", "₱22.00/kilo"] }, 
                answer: 0, topic: 'Rate (Cost/Quantity)' 
            },
            { 
                question: { tl: "Natatakbo ang 100 metro sa loob ng 20 segundo. Ilang metro bawat segundo ang takbo?", en: "100 meters are run in 20 seconds. What is the speed in meters per second?" }, 
                options: { tl: ["4 m/s", "5 m/s", "6 m/s", "10 m/s"], en: ["4 m/s", "5 m/s", "6 m/s", "10 m/s"] }, 
                answer: 1, topic: 'Rate (Quantity/Time)' 
            },
            { 
                question: { tl: "Ang 7 litro ng gasolina ay ₱119.00. Magkano ang presyo bawat litro?", en: "7 liters of gasoline cost ₱119.00. What is the price per liter?" }, 
                options: { tl: ["₱16.00/L", "₱17.00/L", "₱18.00/L", "₱19.00/L"], en: ["₱16.00/L", "₱17.00/L", "₱18.00/L", "₱19.00/L"] }, 
                answer: 1, topic: 'Rate (Cost/Quantity)' 
            },
            { 
                question: { tl: "Sa loob ng 5 minuto, 325 salita ang na-type. Ilang salita sa loob ng 1 minuto?", en: "In 5 minutes, 325 words are typed. How many words are typed in 1 minute?" }, 
                options: { tl: ["60 salita/min", "65 salita/min", "70 salita/min", "75 salita/min"], en: ["60 words/min", "65 words/min", "70 words/min", "75 words/min"] }, 
                answer: 1, topic: 'Rate (Quantity/Time)' 
            },
            { 
                question: { tl: "Ang isang bus ay bumibiyahe ng 640 kilometro sa loob ng 8 oras. Ano ang average na takbo nito?", en: "A bus travels 640 kilometers in 8 hours. What is its average speed?" }, 
                options: { tl: ["70 km/h", "80 km/h", "90 km/h", "85 km/h"], en: ["70 km/h", "80 km/h", "90 km/h", "85 km/h"] }, 
                answer: 1, topic: 'Rate (Quantity/Time)' 
            },
            { 
                question: { tl: "Tinatakbo ng jeepney ang 161 kilometro sa loob ng 3.5 oras. Gaano kabilis ang takbo nito sa bawat oras?", en: "A jeepney runs 161 kilometers in 3.5 hours. What is its speed per hour?" }, 
                options: { tl: ["45 km/h", "46 km/h", "48 km/h", "50 km/h"], en: ["45 km/h", "46 km/h", "48 km/h", "50 km/h"] }, 
                answer: 1, topic: 'Rate (Quantity/Time)' 
            },
            { 
                question: { tl: "Ang isang motorsiklo ay nagbiyahe ng 117 metro sa loob ng 9 na segundo. Ilang metro bawat segundo ang takbo?", en: "A motorcycle traveled 117 meters in 9 seconds. What is its speed in meters per second?" }, 
                options: { tl: ["11 m/s", "12 m/s", "13 m/s", "14 m/s"], en: ["11 m/s", "12 m/s", "13 m/s", "14 m/s"] }, 
                answer: 2, topic: 'Rate (Quantity/Time)' 
            },

            // Section III: Proportion Solving (21-30) - Aralin 2
            { 
                question: { tl: "Ang 15:7 = 5:2 ay isang tama o maling proporsiyon?", en: "Is 15:7 = 5:2 a true or false proportion?" }, 
                options: { tl: ["Tama (True)", "Mali (False)", "Hindi matukoy", "Wala sa nabanggit"], en: ["True", "False", "Cannot be determined", "None of the above"] }, 
                answer: 1, topic: 'Proportion Check' 
            },
            { 
                question: { tl: "Ang 7:9 = 14:18 ay isang tama o maling proporsiyon?", en: "Is 7:9 = 14:18 a true or false proportion?" }, 
                options: { tl: ["Tama (True)", "Mali (False)", "Hindi matukoy", "Wala sa nabanggit"], en: ["True", "False", "Cannot be determined", "None of the above"] }, 
                answer: 0, topic: 'Proportion Check' 
            },
            { 
                question: { tl: "Ang 4:3 = 24:18 ay isang tama o maling proporsiyon?", en: "Is 4:3 = 24:18 a true or false proportion?" }, 
                options: { tl: ["Tama (True)", "Mali (False)", "Hindi matukoy", "Wala sa nabanggit"], en: ["True", "False", "Cannot be determined", "None of the above"] }, 
                answer: 0, topic: 'Proportion Check' 
            },
            { 
                question: { tl: "Kailangan ng 3 itlog para sa 5 hotcakes. Ilang itlog ang kailangan para sa 20 hotcakes?", en: "3 eggs are needed for 5 hotcakes. How many eggs are needed for 20 hotcakes?" }, 
                options: { tl: ["9 itlog", "10 itlog", "12 itlog", "15 itlog"], en: ["9 eggs", "10 eggs", "12 eggs", "15 eggs"] }, 
                answer: 2, topic: 'Proportion Word Problem' 
            },
            { 
                question: { tl: "2 araw ang nagugugol sa 3 damit. Ilang araw ang kailangan para matapos ang 12 damit?", en: "2 days are spent on 3 dresses. How many days are needed to finish 12 dresses?" }, 
                options: { tl: ["6 araw", "8 araw", "9 araw", "10 araw"], en: ["6 days", "8 days", "9 days", "10 days"] }, 
                answer: 1, topic: 'Proportion Word Problem' 
            },
            { 
                question: { tl: "Ang mapa ay may sukat na 2 cm: 5 km. Kung ang distansya ay 6 cm sa mapa, ilang km ang layo nito?", en: "The map has a scale of 2 cm: 5 km. If the distance is 6 cm on the map, how many km away is it?" }, 
                options: { tl: ["12 km", "15 km", "20 km", "30 km"], en: ["12 km", "15 km", "20 km", "30 km"] }, 
                answer: 1, topic: 'Proportion Word Problem' 
            },
            { 
                question: { tl: "420 pahina ang i-type. 15 pahina sa loob ng 2.5 oras. Ilang oras matatapos ang 420 pahina?", en: "420 pages need to be typed. 15 pages in 2.5 hours. How many hours to finish 420 pages?" }, 
                options: { tl: ["60 oras", "70 oras", "80 oras", "105 oras"], en: ["60 hours", "70 hours", "80 hours", "105 hours"] }, 
                answer: 1, topic: 'Proportion Word Problem' 
            },
            { 
                question: { tl: "Kumikita ng ₱700.00 sa loob ng 1 linggo. Ilang linggo ang kailangan para kumita ng ₱3,500.00?", en: "Earns ₱700.00 in 1 week. How many weeks are needed to earn ₱3,500.00?" }, 
                options: { tl: ["4 linggo", "5 linggo", "6 linggo", "7 linggo"], en: ["4 weeks", "5 weeks", "6 weeks", "7 weeks"] }, 
                answer: 1, topic: 'Proportion Word Problem' 
            },
            { 
                question: { tl: "Ang 50 kilong bigas ay ₱900.00. Magkano ang halaga ng 27 kilo?", en: "50 kilograms of rice cost ₱900.00. What is the cost of 27 kilograms?" }, 
                options: { tl: ["₱486.00", "₱500.00", "₱540.00", "₱600.00"], en: ["₱486.00", "₱500.00", "₱540.00", "₱600.00"] }, 
                answer: 0, topic: 'Proportion Word Problem' 
            },
            { 
                question: { tl: "3 Brand A sa bawat 5 Brand B. Kung 27 katao ang may gusto ng Brand A, ilan ang may gusto ng Brand B?", en: "3 Brand A for every 5 Brand B. If 27 people like Brand A, how many people like Brand B?" }, 
                options: { tl: ["35 tao", "40 tao", "45 tao", "50 tao"], en: ["35 people", "40 people", "45 people", "50 people"] }, 
                answer: 2, topic: 'Proportion Word Problem' 
            }
        ];

        let userAnswers = {}; // {qIndex: selectedOptionIndex}
        const quizName = "Pagsusulit: Panumbasan at Proporsiyon";
        const quizLevelRawId = "elementary"; 
        const quizLevelDisplay = "Elementary"; 
        
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
            // resetButtonModal is present in DOM and will be set by earlier assignment
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
            if (optionsContainer) {
                optionsContainer.querySelectorAll('.option-button').forEach(btn => {
                    btn.classList.remove('selected');
                });
            }

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
            
            // Upsert logic: Replace any existing entry for this specific quiz (based on name and level)
            const quizKey = `${recordToSave.name}-${recordToSave.rawLevelId}`; // Unique identifier for the quiz
            const existingIndex = userRecords.findIndex(r => `${r.name}-${r.rawLevelId}` === quizKey);

            if (existingIndex > -1) {
                // Update: Replace the old record for this quiz with the new record
                userRecords[existingIndex] = recordToSave;
            } else {
                // Insert: Add the new record
                userRecords.push(recordToSave);
            }
            
            localStorage.setItem(USER_RECORDS_KEY, JSON.stringify(userRecords));
            console.log("Quiz record saved globally and user-specifically:", recordToSave);
        }

        /**
         * Submits the quiz, calculates the score, records date+time, and displays results.
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

            // Get current date/time values
            const now = new Date();
            // Human-readable date and time (local)
            const dateStr = now.toLocaleDateString('en-US');
            const timeStr = now.toLocaleTimeString('en-US', { hour12: false });
            // ISO timestamp for precise sorting/storing
            const isoStamp = now.toISOString();

            // --- 1. PREPARE THE RESULT OBJECT (includes date and time) ---
            currentQuizResult = {
                name: quizName,
                rawLevelId: quizLevelRawId, 
                level: quizLevelDisplay, 
                score: `${correctCount}/${totalQuestions}`,
                percentage: Math.round((correctCount / totalQuestions) * 100),
                date: dateStr,         // e.g. "1/5/2026"
                time: timeStr,         // e.g. "14:23:05"
                dateTimeISO: isoStamp  // e.g. "2026-01-05T14:23:05.123Z"
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
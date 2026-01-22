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
    <title>Pagsusulit: Pagsukat ng Haba</title>
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
                <h1 class="text-4xl font-extrabold text-primary mb-2" id="quiz-title">Pagsusulit: Pagsukat ng Haba</h1>
                <p class="text-xl text-gray-600" id="quiz-subtitle">30 Items: Metriko, Ingles, at Conversion</p>
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
                    <!-- REMOVED onclick="saveRecordToLocalStorage()" as saving is done in submitQuiz() -->
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
            'quizTitle': { tl: "Pagsusulit: Pagsukat ng Haba", en: "Quiz: Measurement of Length" },
            'quizSubtitle': { tl: "30 Items: Metriko, Ingles, at Conversion", en: "30 Items: Metric, English, and Conversion" },
            'goBack': { tl: 'Bumalik', en: 'Go Back' },
            'section1Title': { tl: 'I. Metrikong Sistema (Metric System)', en: 'I. Metric System' },
            'section2Title': { tl: 'II. Ingles na Sistema (English System)', en: 'II. English System' },
            'section3Title': { tl: 'III. Metriko at Ingles na Conversion (Metric and English Conversion)', en: 'III. Metric and English Conversion' },
            'submitButton': { tl: 'Tapusin at Tingnan ang Resulta', en: 'Finish and View Results' },
            'unansweredAlert': { tl: 'Kailangan mo pang sagutan ang', en: 'You still need to answer' },
            'unansweredAlertSuffix': { tl: 'na tanong bago mag-submit.', en: 'questions before submitting.' },
            'modalTitle': { tl: 'Resulta ng Pagsusulit', en: 'Quiz Results' },
            'modalScoreText': { tl: 'Nakakuha ka ng:', en: 'You scored:' },
            'modalReviewText': { tl: 'Tingnan ang iyong mga sagot sa ibaba para matuto.', en: 'Review your answers below to learn.' },
            'recordButton': { tl: 'I-record ang Resulta at Pumunta sa Talaan', en: 'Record Result and Go to Records' }, // UPDATED TEXT
            'resetButton': { tl: 'Subukan Muli', en: 'Try Again' },
        };

        // Conversion factors used for calculation:
        // 1m = 1000mm, 1m = 100cm, 1km = 1000m, 1hm = 100m, 1dam = 10m
        // 1ft = 12in, 1yd = 3ft, 1mi = 5280ft
        // 1in = 2.54cm, 1m = 3.28ft, 1m = 1.09yd, 1mi = 1.61km 
        
        // --- QUIZ DATA (30 Items Total) - UPDATED FOR TRANSLATION ---
        const quizData = [
            // Section I: Metrikong Sistema (1-10) - Aralin 1
            // Q1: 45300 mm to m (Anu-ano Q1)
            { 
                question: { tl: "Ang taas ng isang istatwa ay 45,300 milimetro (mm). Ano ang taas nito sa metro (m)?", en: "A statue is 45,300 millimeters (mm) tall. What is its height in meters (m)?" }, 
                options: { tl: ["453 m", "4.53 m", "45.3 m", "4530 m"], en: ["453 m", "4.53 m", "45.3 m", "4530 m"] }, 
                answer: 2, topic: 'Metric Conversion (mm to m)' 
            },
            // Q2: 14 cm to m (Example 1)
            { 
                question: { tl: "Ilang metro (m) ang katumbas ng 14 sentimetro (cm)?", en: "How many meters (m) is equivalent to 14 centimeters (cm)?" }, 
                options: { tl: ["0.014 m", "1.4 m", "140 m", "0.14 m"], en: ["0.014 m", "1.4 m", "140 m", "0.14 m"] }, 
                answer: 3, topic: 'Metric Conversion (cm to m)' 
            },
            // Q3: 3 dam to mm (Example 2)
            { 
                question: { tl: "Gaano kahaba ang 3 dekametro (dam) kung ihahayag sa milimetro (mm)?", en: "How long is 3 decameters (dam) when expressed in millimeters (mm)?" }, 
                options: { tl: ["3,000 mm", "30,000 mm", "300,000 mm", "300 mm"], en: ["3,000 mm", "30,000 mm", "300,000 mm", "300 mm"] }, 
                answer: 1, topic: 'Metric Conversion (dam to mm)' 
            },
            // Q4: 1.5 m to cm (Sagutan Natin Ito Q1)
            { 
                question: { tl: "Ilang sentimetro (cm) ang katumbas ng 1.5 metro (m)?", en: "How many centimeters (cm) is equivalent to 1.5 meters (m)?" }, 
                options: { tl: ["15 cm", "150 cm", "1,500 cm", "15000 cm"], en: ["15 cm", "150 cm", "1,500 cm", "15000 cm"] }, 
                answer: 1, topic: 'Metric Conversion (m to cm)' 
            },
            // Q5: 7 hm to mm (Alamin Natin Q4)
            { 
                question: { tl: "Gaano kahaba ang 7 hektometro (hm) kung ihahayag sa milimetro (mm)?", en: "How long is 7 hectometers (hm) when expressed in millimeters (mm)?" }, 
                options: { tl: ["7,000 mm", "70,000 mm", "700,000 mm", "7,000,000 mm"], en: ["7,000 mm", "70,000 mm", "700,000 mm", "7,000,000 mm"] }, 
                answer: 2, topic: 'Metric Conversion (hm to mm)' 
            },
            // Q6: 23 hm to dm (Anu-ano Q1)
            { 
                question: { tl: "Ilang desimetro (dm) ang katumbas ng 23 hektometro (hm)? (Tandaan: 1hm=100m, 1m=10dm)", en: "How many decimeters (dm) is equivalent to 23 hectometers (hm)? (Note: 1hm=100m, 1m=10dm)" }, 
                options: { tl: ["230 dm", "2,300 dm", "23,000 dm", "230,000 dm"], en: ["230 dm", "2,300 dm", "23,000 dm", "230,000 dm"] }, 
                answer: 2, topic: 'Metric Conversion (hm to dm)' 
            },
            // Q7: 6.5 m to cm (Anu-ano Q2)
            { 
                question: { tl: "Ilang sentimetro (cm) ang katumbas ng 6.5 metro (m)?", en: "How many centimeters (cm) is equivalent to 6.5 meters (m)?" }, 
                options: { tl: ["65 cm", "650 cm", "6,500 cm", "65000 cm"], en: ["65 cm", "650 cm", "6,500 cm", "65000 cm"] }, 
                answer: 1, topic: 'Metric Conversion (m to cm)' 
            },
            // Q8: Definition of Meter Stick
            { 
                question: { tl: "Ano ang <b>standard unit</b> ng haba sa Metrikong Sistema?", en: "What is the <b>standard unit</b> of length in the Metric System?" }, 
                options: { tl: ["Pulgada", "Piye", "Yarda", "Metro"], en: ["Inch", "Foot", "Yard", "Meter"] }, 
                answer: 3, topic: 'Metric Definition' 
            },
            // Q9: Metric System Base
            { 
                question: { tl: "Ang Metrikong Sistema ay madaling gamitin dahil ito ay batay sa mga multipol ng anong bilang?", en: "The Metric System is easy to use because it is based on multiples of what number?" }, 
                options: { tl: ["Lima (5)", "Sampu (10)", "Labindalawa (12)", "Isandaan (100)"], en: ["Five (5)", "Ten (10)", "Twelve (12)", "One hundred (100)"] }, 
                answer: 1, topic: 'Metric Definition' 
            },
            // Q10: Conversion Factor Definition
            { 
                question: { tl: "Ano ang tawag sa halaga o proporsiyon na ginagamit upang baguhin ang isang yunit ng sukat tungo sa isa?", en: "What is the term for the value or proportion used to change one unit of measure into another?" }, 
                options: { tl: ["Numerator", "Denominator", "Conversion Factor", "Desimetro"], en: ["Numerator", "Denominator", "Conversion Factor", "Decimeter"] }, 
                answer: 2, topic: 'Definition' 
            },

            // Section II: Ingles na Sistema (11-20) - Aralin 2
            // Q11: 6.8 mi to ft (Anu-ano Q2)
            { 
                question: { tl: "Ang trintsera ng Marianas ay humigit-kumulang 6.8 milya (mi) ang lalim. Ano ang lalim nito sa piye (ft)? (Tandaan: 1 mi = 5,280 ft)", en: "The Marianas Trench is approximately 6.8 miles (mi) deep. What is its depth in feet (ft)? (Note: 1 mi = 5,280 ft)" }, 
                options: { tl: ["35,904 ft", "36,000 ft", "35,004 ft", "36,904 ft"], en: ["35,904 ft", "36,000 ft", "35,004 ft", "36,904 ft"] }, 
                answer: 0, topic: 'English Conversion (mi to ft)' 
            },
            // Q12: 60 in to ft (Example 1)
            { 
                question: { tl: "Ilang piye (ft) ang katumbas ng 60 pulgada (in)? (Tandaan: 1 ft = 12 in)", en: "How many feet (ft) is equivalent to 60 inches (in)? (Note: 1 ft = 12 in)" }, 
                options: { tl: ["5 ft", "5.5 ft", "6 ft", "60 ft"], en: ["5 ft", "5.5 ft", "6 ft", "60 ft"] }, 
                answer: 0, topic: 'English Conversion (in to ft)' 
            },
            // Q13: 3.5 mi to yd (Example 2)
            { 
                question: { tl: "Ang distansiya ay 3.5 milya. Ano ang distansiya nito sa yarda (yd)? (Tandaan: 1 mi = 5,280 ft, 1 yd = 3 ft)", en: "The distance is 3.5 miles. What is this distance in yards (yd)? (Note: 1 mi = 5,280 ft, 1 yd = 3 ft)" }, 
                options: { tl: ["6,160 yd", "18,480 yd", "15,840 yd", "616 yd"], en: ["6,160 yd", "18,480 yd", "15,840 yd", "616 yd"] }, 
                answer: 0, topic: 'English Conversion (mi to yd)' 
            },
            // Q14: 2 yd to ft (Magbalik-aral Q1)
            { 
                question: { tl: "Ilang piye (ft) ang katumbas ng 2 yarda (yd)?", en: "How many feet (ft) is equivalent to 2 yards (yd)?" }, 
                options: { tl: ["3 ft", "6 ft", "12 ft", "36 ft"], en: ["3 ft", "6 ft", "12 ft", "36 ft"] }, 
                answer: 1, topic: 'English Conversion (yd to ft)' 
            },
            // Q15: Bong's Height Comparison (Magbalik-aral Q1)
            { 
                question: { tl: "Alin sa mga sumusunod na sukat ang <b>magkakatumbas</b> ang taas? (Batay sa kuwento ni Bong)", en: "Which of the following measurements are <b>equivalent</b> in height? (Based on Bong's story)" }, 
                options: { tl: ["1/2 yarda, 4 piye, 50 pulgada", "1.5 yarda, 4.5 piye, 54 pulgada", "1 yarda, 3 piye, 30 pulgada", "1.5 yarda, 5 piye, 60 pulgada"], en: ["1/2 yarda, 4 piye, 50 pulgada", "1.5 yarda, 4.5 piye, 54 pulgada", "1 yarda, 3 piye, 30 pulgada", "1.5 yarda, 5 piye, 60 pulgada"] }, 
                answer: 1, topic: 'English Comparison' 
            },
            // Q16: 66 in to ft (Alamin Natin Q3)
            { 
                question: { tl: "Kung si Anne ay may taas na 66 pulgada, ano ang taas niya sa piye (ft)?", en: "If Anne is 66 inches tall, what is her height in feet (ft)?" }, 
                options: { tl: ["5.5 ft", "6.0 ft", "5.8 ft", "6.5 ft"], en: ["5.5 ft", "6.0 ft", "5.8 ft", "6.5 ft"] }, 
                answer: 0, topic: 'English Conversion (in to ft)' 
            },
            // Q17: 1.9 yd to ft (Alamin Natin Q3)
            { 
                question: { tl: "Ilang piye (ft) ang katumbas ng 1.9 yarda (yd)?", en: "How many feet (ft) is equivalent to 1.9 yards (yd)?" }, 
                options: { tl: ["5.7 ft", "6.0 ft", "6.3 ft", "5.0 ft"], en: ["5.7 ft", "6.0 ft", "6.3 ft", "5.0 ft"] }, 
                answer: 0, topic: 'English Conversion (yd to ft)' 
            },
            // Q18: 2800 yd to ft (Alamin Natin Q4)
            { 
                question: { tl: "Ilang piye (ft) ang katumbas ng 2,800 yarda (yd)?", en: "How many feet (ft) is equivalent to 2,800 yards (yd)?" }, 
                options: { tl: ["8,400 ft", "7,400 ft", "9,000 ft", "9,200 ft"], en: ["8,400 ft", "7,400 ft", "9,000 ft", "9,200 ft"] }, 
                answer: 0, topic: 'English Conversion (yd to ft)' 
            },
            // Q19: 1.6 mi to ft (Alamin Natin Q4)
            { 
                question: { tl: "Ilang piye (ft) ang katumbas ng 1.6 milya (mi)?", en: "How many feet (ft) is equivalent to 1.6 miles (mi)?" }, 
                options: { tl: ["8,448 ft", "8,500 ft", "7,500 ft", "8,280 ft"], en: ["8,448 ft", "8,500 ft", "7,500 ft", "8,280 ft"] }, 
                answer: 0, topic: 'English Conversion (mi to ft)' 
            },
            // Q20: Definition of Piye
            { 
                question: { tl: "Ilang pulgada ang katumbas ng isang (1) piye (ft)?", en: "How many inches are equivalent to one (1) foot (ft)?" }, 
                options: { tl: ["10 pulgada", "12 pulgada", "24 pulgada", "36 pulgada"], en: ["10 inches", "12 inches", "24 inches", "36 inches"] }, 
                answer: 1, topic: 'English Definition' 
            },

            // Section III: Metriko at Ingles na Conversion (21-30) - Aralin 3
            // Q21: 4.5 in to cm (Example 1)
            { 
                question: { tl: "Ilang sentimetro (cm) ang katumbas ng 4.5 pulgada (in)? (Tandaan: 1 in = 2.54 cm)", en: "How many centimeters (cm) is equivalent to 4.5 inches (in)? (Note: 1 in = 2.54 cm)" }, 
                options: { tl: ["11.43 cm", "10.16 cm", "11.00 cm", "12.04 cm"], en: ["11.43 cm", "10.16 cm", "11.00 cm", "12.04 cm"] }, 
                answer: 0, topic: 'Metric/English Conversion (in to cm)' 
            },
            // Q22: 8.05 km to mi (Example 2)
            { 
                question: { tl: "Ilang milya (mi) ang katumbas ng 8.05 kilometro (km)? (Tandaan: 1 mi = 1.61 km)", en: "How many miles (mi) is equivalent to 8.05 kilometers (km)? (Note: 1 mi = 1.61 km)" }, 
                options: { tl: ["4.5 mi", "5.0 mi", "5.5 mi", "6.0 mi"], en: ["4.5 mi", "5.0 mi", "5.5 mi", "6.0 mi"] }, 
                answer: 1, topic: 'Metric/English Conversion (km to mi)' 
            },
            // Q23: 3.5 m to in (Example 3)
            { 
                question: { tl: "Ilang pulgada (in) ang katumbas ng 3.5 metro (m)? (Tandaan: 1 m ≈ 3.28 ft, 1 ft = 12 in)", en: "How many inches (in) is equivalent to 3.5 meters (m)? (Note: 1 m ≈ 3.28 ft, 1 ft = 12 in)" }, 
                options: { tl: ["137.76 in", "42.0 in", "124.56 in", "145.0 in"], en: ["137.76 in", "42.0 in", "124.56 in", "145.0 in"] }, 
                answer: 0, topic: 'Metric/English Conversion (m to in)' 
            },
            // Q24: 14 m to yd (Magbalik-aral Q1)
            { 
                question: { tl: "Ilang yarda (yd) ang katumbas ng 14 metro (m)? (Tandaan: 1 m ≈ 1.09 yd)", en: "How many yards (yd) is equivalent to 14 meters (m)? (Note: 1 m ≈ 1.09 yd)" }, 
                options: { tl: ["15.26 yd", "14.09 yd", "15.06 yd", "16.10 yd"], en: ["15.26 yd", "14.09 yd", "15.06 yd", "16.10 yd"] }, 
                answer: 0, topic: 'Metric/English Conversion (m to yd)' 
            },
            // Q25: 2340 mi to km (Magbalik-aral Q2)
            { 
                question: { tl: "Ang Mississippi River ay 2,340 milya (mi) ang haba. Ano ang haba nito sa kilometro (km)? (Tandaan: 1 mi ≈ 1.61 km)", en: "The Mississippi River is 2,340 miles (mi) long. What is its length in kilometers (km)? (Note: 1 mi ≈ 1.61 km)" }, 
                options: { tl: ["3,767.4 km", "3,777.4 km", "3,677.4 km", "3,800.0 km"], en: ["3,767.4 km", "3,777.4 km", "3,677.4 km", "3,800.0 km"] }, 
                answer: 0, topic: 'Metric/English Conversion (mi to km)' 
            },
            // Q26: 12925 ft vs 3.58 km (Alamin Natin Q2) - 3.58km = 11745.42 ft
            { 
                question: { tl: "Alin ang mas malalim: 12,925 piye (ft) o 3.58 kilometro (km)? (1 km ≈ 3,280.84 ft)", en: "Which is deeper: 12,925 feet (ft) or 3.58 kilometers (km)? (1 km ≈ 3,280.84 ft)" }, 
                options: { tl: ["Ang 3.58 km", "Ang 12,925 ft", "Pareho lang", "Hindi matukoy"], en: ["3.58 km", "12,925 ft", "They are equal", "Cannot be determined"] }, 
                answer: 1, topic: 'Metric/English Comparison' 
            },
            // Q27: 11808 in to m (Alamin Natin Q3)
            { 
                question: { tl: "Ang taas ng Bulkang Taal ay 11,808 pulgada (in). Ano ang taas nito sa metro (m)? (1 m ≈ 39.37 in)", en: "Taal Volcano is 11,808 inches (in) tall. What is its height in meters (m)? (1 m ≈ 39.37 in)" }, 
                options: { tl: ["300 m", "298 m", "305 m", "310 m"], en: ["300 m", "298 m", "305 m", "310 m"] }, 
                answer: 0, topic: 'English/Metric Conversion (in to m)' 
            },
            // Q28: 421.64 cm to in (Alamin Natin Q4)
            { 
                question: { tl: "Ilang pulgada (in) ang katumbas ng 421.64 sentimetro (cm)? (1 in ≈ 2.54 cm)", en: "How many inches (in) is equivalent to 421.64 centimeters (cm)? (1 in ≈ 2.54 cm)" }, 
                options: { tl: ["166 in", "165.5 in", "166.5 in", "160 in"], en: ["166 in", "165.5 in", "166.5 in", "160 in"] }, 
                answer: 0, topic: 'Metric/English Conversion (cm to in)' 
            },
            // Q29: 519.93 yd to m (Alamin Natin Q5)
            { 
                question: { tl: "Ilang metro (m) ang katumbas ng 519.93 yarda (yd)? (1 m ≈ 1.09 yd)", en: "How many meters (m) is equivalent to 519.93 yards (yd)? (1 m ≈ 1.09 yd)" }, 
                options: { tl: ["477 m", "475 m", "480 m", "482 m"], en: ["477 m", "475 m", "480 m", "482 m"] }, 
                answer: 0, topic: 'English/Metric Conversion (yd to m)' 
            },
            // Q30: 8070 ft to cm (Anu-ano Q4) - 8070 ft * 30.48 cm/ft = 245973.6
            { 
                question: { tl: "Ang Mt. Kanlaon ay 8,070 piye (ft) ang taas. Ano ang taas nito sa sentimetro (cm)? (1 ft=12 in, 1 in=2.54 cm)", en: "Mt. Kanlaon is 8,070 feet (ft) tall. What is its height in centimeters (cm)? (1 ft=12 in, 1 in=2.54 cm)" }, 
                options: { tl: ["245,973.6 cm", "255,873.6 cm", "250,973.6 cm", "240,000 cm"], en: ["245,973.6 cm", "255,873.6 cm", "250,973.6 cm", "240,000 cm"] }, 
                answer: 0, topic: 'English/Metric Conversion (ft to cm)' 
            }
        ];

        let userAnswers = {}; // {qIndex: selectedOptionIndex}
        const quizName = "Pagsusulit: Pagsukat ng Haba";
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
                // Insert: Add the new record
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
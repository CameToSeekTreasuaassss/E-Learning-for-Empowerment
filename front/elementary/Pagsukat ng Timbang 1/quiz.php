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
    <title>Pagsusulit: Pagsukat ng Timbang 1</title>
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
                <h1 class="text-4xl font-extrabold text-primary mb-2" id="quiz-title">Pagsusulit: Pagsukat ng Timbang 1</h1>
                <p class="text-xl text-gray-600" id="quiz-subtitle">30 Items: Metriko, Ingles, at Konbersiyon ng Yunit</p>
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
            'quizTitle': { tl: "Pagsusulit: Pagsukat ng Timbang 1", en: "Quiz: Measurement of Weight 1" },
            'quizSubtitle': { tl: "30 Items: Metriko, Ingles, at Konbersiyon ng Yunit", en: "30 Items: Metric, English, and Unit Conversion" },
            'goBack': { tl: 'Bumalik', en: 'Go Back' },
            'section1Title': { tl: 'I. Metrikong Sistema at Konbersiyon', en: 'I. Metric System and Conversion' },
            'section2Title': { tl: 'II. Ingles na Sistema at Konbersiyon', en: 'II. English System and Conversion' },
            'section3Title': { tl: 'III. Estimasyon at Word Problems', en: 'III. Estimation and Word Problems' },
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
            // Section I: Metrikong Sistema at Konbersiyon (1-10)
            // Q1: 1 kg to g (Anu-ano Q1)
            { 
                question: { tl: "Ilang gramo (g) mayroon sa isang (1) kilogram (kg)?", en: "How many grams (g) are in one (1) kilogram (kg)?" }, 
                options: { tl: ["16", "100", "1,000", "1/2"], en: ["16", "100", "1,000", "1/2"] }, 
                answer: 2, topic: 'Metric Unit Conversion' 
            },
            // Q2: 1 metric ton to g (Anu-ano Q3)
            { 
                question: { tl: "Ilang gramo (g) mayroon sa isang (1) metric ton?", en: "How many grams (g) are in one (1) metric ton?" }, 
                options: { tl: ["1,000", "1,000,000", "10,000", "100,000"], en: ["1,000", "1,000,000", "10,000", "100,000"] }, 
                answer: 1, topic: 'Metric Unit Conversion' 
            },
            // Q3: 500g vs 1/2kg (Anu-ano Q4)
            { 
                question: { tl: "Alin ang mas mabigat: 500 grams o 1/2 kilogram?", en: "Which is heavier: 500 grams or 1/2 kilogram?" }, 
                options: { tl: ["500 grams", "1/2 kilogram", "Pareho lang ang timbang (Equivalent)", "Hindi matukoy"], en: ["500 grams", "1/2 kilogram", "They are equal (Equivalent)", "Cannot be determined"] }, 
                answer: 2, topic: 'Metric Comparison' 
            }, 
            // Q4: 500 g to kg (Example)
            { 
                question: { tl: "Ilang kilogram (kg) ang katumbas ng 500 gramo (g)?", en: "How many kilograms (kg) is equivalent to 500 grams (g)?" }, 
                options: { tl: ["0.05 kg", "0.5 kg", "5 kg", "50 kg"], en: ["0.05 kg", "0.5 kg", "5 kg", "50 kg"] }, 
                answer: 1, topic: 'Metric g to kg' 
            },
            // Q5: 2000 mg to g (Example)
            { 
                question: { tl: "Ilang gramo (g) ang katumbas ng 2,000 milligramo (mg)?", en: "How many grams (g) is equivalent to 2,000 milligrams (mg)?" }, 
                options: { tl: ["20 g", "200 g", "2 g", "0.2 g"], en: ["20 g", "200 g", "2 g", "0.2 g"] }, 
                answer: 2, topic: 'Metric mg to g' 
            },
            // Q6: 800 kg to metric tons (Example)
            { 
                question: { tl: "Ilang metric tons ang katumbas ng 800 kilogram (kg)?", en: "How many metric tons is equivalent to 800 kilograms (kg)?" }, 
                options: { tl: ["0.8 metric ton", "8 metric ton", "80 metric ton", "0.08 metric ton"], en: ["0.8 metric ton", "8 metric ton", "80 metric ton", "0.08 metric ton"] }, 
                answer: 0, topic: 'Metric kg to MT' 
            },
            // Q7: 6 g to mg (Example)
            { 
                question: { tl: "Ilang miligramo (mg) ang katumbas ng 6 gramo (g)?", en: "How many milligrams (mg) is equivalent to 6 grams (g)?" }, 
                options: { tl: ["60 mg", "600 mg", "6,000 mg", "60,000 mg"], en: ["60 mg", "600 mg", "6,000 mg", "60,000 mg"] }, 
                answer: 2, topic: 'Metric g to mg' 
            },
            // Q8: 5 1/2 kg to g (Example)
            { 
                question: { tl: "Ilang gramo (g) ang katumbas ng 5 1/2 kilogram (kg)?", en: "How many grams (g) is equivalent to 5 1/2 kilograms (kg)?" }, 
                options: { tl: ["550 g", "5,050 g", "5,500 g", "55,000 g"], en: ["550 g", "5,050 g", "5,500 g", "55,000 g"] }, 
                answer: 2, topic: 'Metric kg to g' 
            },
            // Q9: Guhit value
            { 
                question: { tl: "Ilang gramo (g) ang katumbas ng isang (1) guhit?", en: "How many grams (g) is equivalent to one (1) guhit?" }, 
                options: { tl: ["10 g", "50 g", "100 g", "1,000 g"], en: ["10 g", "50 g", "100 g", "1,000 g"] }, 
                answer: 2, topic: 'Metric Guhit' 
            },
            // Q10: Kg to Guhit
            { 
                question: { tl: "Ilang guhit mayroon sa isang (1) kilogram?", en: "How many guhit are in one (1) kilogram?" }, 
                options: { tl: ["5 guhit", "10 guhit", "100 guhit", "1,000 guhit"], en: ["5 guhit", "10 guhit", "100 guhit", "1,000 guhit"] }, 
                answer: 1, topic: 'Metric Guhit' 
            },

            // Section II: Ingles na Sistema at Konbersiyon (11-20)
            // Q11: 1 lb to oz (Anu-ano Q2)
            { 
                question: { tl: "Ilang onsa (oz) mayroon sa isang (1) pound (lb)?", en: "How many ounces (oz) are in one (1) pound (lb)?" }, 
                options: { tl: ["16", "100", "1,000", "1/2"], en: ["16", "100", "1,000", "1/2"] }, 
                answer: 0, topic: 'English Unit Conversion' 
            },
            // Q12: 33 oz vs 2 lbs (Anu-ano Q5)
            { 
                question: { tl: "Alin ang mas mabigat: 33 onsa o 2 pounds?", en: "Which is heavier: 33 ounces or 2 pounds?" }, 
                options: { tl: ["33 onsa", "2 pounds", "Pareho lang ang timbang (Equivalent)", "Hindi matukoy"], en: ["33 ounces", "2 pounds", "They are equal (Equivalent)", "Cannot be determined"] }, 
                answer: 0, topic: 'English Comparison' 
            }, 
            // Q13: 1 1/2 English tons to lbs (Anu-ano Q6)
            { 
                question: { tl: "Ilang pounds (lbs) mayroon sa 1 1/2 English tons? (1 ton = 2,000 lbs)", en: "How many pounds (lbs) are in 1 1/2 English tons? (1 ton = 2,000 lbs)" }, 
                options: { tl: ["1,500 lbs", "2,500 lbs", "3,000 lbs", "3,500 lbs"], en: ["1,500 lbs", "2,500 lbs", "3,000 lbs", "3,500 lbs"] }, 
                answer: 2, topic: 'English Ton to lb' 
            },
            // Q14: 35 oz to lbs (Example)
            { 
                question: { tl: "Ilang pounds at onsa (lbs oz) ang katumbas ng 35 onsa (oz)?", en: "How many pounds and ounces (lbs oz) is equivalent to 35 ounces (oz)?" }, 
                options: { tl: ["2 lbs 3 oz", "2 lbs 5 oz", "3 lbs 3 oz", "1 lb 19 oz"], en: ["2 lbs 3 oz", "2 lbs 5 oz", "3 lbs 3 oz", "1 lb 19 oz"] }, 
                answer: 0, topic: 'English oz to lb' 
            },
            // Q15: 6,000 lbs to tons (Example)
            { 
                question: { tl: "Ilang tons ang katumbas ng 6,000 pounds?", en: "How many tons is equivalent to 6,000 pounds?" }, 
                options: { tl: ["2 tons", "3 tons", "6 tons", "0.3 tons"], en: ["2 tons", "3 tons", "6 tons", "0.3 tons"] }, 
                answer: 1, topic: 'English lb to ton' 
            },
            // Q16: 290 oz to lbs (Example)
            { 
                question: { tl: "Ilang pounds at onsa (lbs oz) ang katumbas ng 290 onsa (oz)?", en: "How many pounds and ounces (lbs oz) is equivalent to 290 ounces (oz)?" }, 
                options: { tl: ["18 lbs 2 oz", "18 lbs 5 oz", "19 lbs 2 oz", "17 lbs 10 oz"], en: ["18 lbs 2 oz", "18 lbs 5 oz", "19 lbs 2 oz", "17 lbs 10 oz"] }, 
                answer: 0, topic: 'English oz to lb' 
            },
            // Q17: 4,750 lbs to tons (Example)
            { 
                question: { tl: "Ilang tons ang katumbas ng 4,750 pounds?", en: "How many tons is equivalent to 4,750 pounds?" }, 
                options: { tl: ["2.375 tons", "2.25 tons", "2.5 tons", "2.475 tons"], en: ["2.375 tons", "2.25 tons", "2.5 tons", "2.475 tons"] }, 
                answer: 0, topic: 'English lb to ton' 
            },
            // Q18: 3 1/2 lbs to oz (Example)
            { 
                question: { tl: "Ilang onsa (oz) ang katumbas ng 3 1/2 pounds?", en: "How many ounces (oz) is equivalent to 3 1/2 pounds?" }, 
                options: { tl: ["48 oz", "52 oz", "56 oz", "60 oz"], en: ["48 oz", "52 oz", "56 oz", "60 oz"] }, 
                answer: 2, topic: 'English lb to oz' 
            },
            // Q19: 6 1/2 tons to lbs (Example)
            { 
                question: { tl: "Ilang pounds (lbs) ang katumbas ng 6 1/2 tons?", en: "How many pounds (lbs) are equivalent to 6 1/2 tons?" }, 
                options: { tl: ["12,000 lbs", "13,000 lbs", "12,500 lbs", "13,500 lbs"], en: ["12,000 lbs", "13,000 lbs", "12,500 lbs", "13,500 lbs"] }, 
                answer: 1, topic: 'English ton to lb' 
            },
            // Q20: 2 lbs 6 oz to oz (Example)
            { 
                question: { tl: "Ilang onsa (oz) ang katumbas ng 2 pounds at 6 onsa?", en: "How many ounces (oz) are equivalent to 2 pounds and 6 ounces?" }, 
                options: { tl: ["28 oz", "32 oz", "38 oz", "42 oz"], en: ["28 oz", "32 oz", "38 oz", "42 oz"] }, 
                answer: 2, topic: 'English lb to oz' 
            },

            // Section III: Estimasyon at Word Problems (21-30)
            // Q21: Weighing Scale Reading (Anu-ano Q9) - Assuming a 3.5 kg reading for this question
            { 
                question: { tl: "Batay sa scale na ito, ano ang timbang?", en: "Based on this scale, what is the weight?" }, 
                options: { tl: ["3.0 kg", "3 1/4 kg", "3 1/2 kg", "4.0 kg"], en: ["3.0 kg", "3 1/4 kg", "3 1/2 kg", "4.0 kg"] }, 
                answer: 2, topic: 'Scale Reading (Metric)' 
            },
            // Q22: Weighing Scale Reading (Anu-ano Q10) - Assuming a 12 lbs reading for this question
            { 
                question: { tl: "Batay sa scale na ito, ano ang timbang?", en: "Based on this scale, what is the weight?" }, 
                options: { tl: ["10 lbs", "11 lbs", "12 lbs", "12 1/2 lbs"], en: ["10 lbs", "11 lbs", "12 lbs", "12 1/2 lbs"] }, 
                answer: 2, topic: 'Scale Reading (English)' 
            },
            // Q23: Overload Problem (Anu-ano Q7) - Calculation: 196kg + 3.4kg = 199.4kg. 250kg - 199.4kg = 50.6kg remaining.
            { 
                question: { tl: "Kaya bang dalhin ng sasakyang may 250 kg capacity ang 196 kg na pasahero at isang kahon na 3,400 g?", en: "Can a vehicle with a 250 kg capacity carry 196 kg of passengers and a box weighing 3,400 g?" }, 
                options: { tl: ["Oo, 54 kg pa ang kayang dalhin.", "Oo, 50.6 kg pa ang kayang dalhin.", "Hindi, overloaded na.", "Kailangan ng karagdagang data."], en: ["Yes, it can carry 54 kg more.", "Yes, it can carry 50.6 kg more.", "No, it's overloaded.", "Additional data is needed."] }, 
                answer: 1, topic: 'Metric Word Problem' 
            },
            // Q24: Excess Weight Problem (Anu-ano Q8) - Calculation: 2 1/2 lbs = 40 oz. 2 lbs = 32 oz. Difference: 8 oz.
            { 
                question: { tl: "Ilang onsa ang kailangang tanggalin sa bag na may 2 1/2 pounds para maging eksaktong 2 pounds na lang?", en: "How many ounces must be removed from a bag weighing 2 1/2 pounds to make it exactly 2 pounds?" }, 
                options: { tl: ["4 onsa", "6 onsa", "8 onsa", "16 onsa"], en: ["4 ounces", "6 ounces", "8 ounces", "16 ounces"] }, 
                answer: 2, topic: 'English Word Problem' 
            },
            // Q25: Estimating: Small Ponkans (Estimating)
            { 
                question: { tl: "Kung 1 kilo ng malalaking ponkans ay 6 na piraso, ilang piraso ang maaasahan mo sa 1 kilo ng <b>mas maliliit</b> na ponkans?", en: "If 1 kilo of large ponkans is 6 pieces, how many pieces would you expect in 1 kilo of <b>smaller</b> ponkans?" }, 
                options: { tl: ["Eksaktong 6 piraso", "Mas marami sa 6 piraso", "Mas kaunti sa 6 piraso", "Hindi pareho ang timbang."], en: ["Exactly 6 pieces", "More than 6 pieces", "Less than 6 pieces", "The weight is not the same."] }, 
                answer: 1, topic: 'Estimating' 
            },
            // Q26: Estimating: Thicker Slices (Estimating)
            { 
                question: { tl: "Kung hihingi ka ng <b>mas makakapal</b> na hiwa ng pork chops, ang inaasahan mo sa 1 kilo ay:", en: "If you request <b>thicker</b> slices of pork chops, you would expect 1 kilo to have:" }, 
                options: { tl: ["Mas kaunti sa dating dami", "Mas marami sa dating dami", "Eksaktong pareho ng dating dami", "Hindi pareho ang timbang."], en: ["Fewer than the previous quantity", "More than the previous quantity", "Exactly the same quantity", "The weight is not the same."] }, 
                answer: 0, topic: 'Estimating' 
            },
            // Q27: Best way to know weight (Estimating Q1)
            { 
                question: { tl: "Ano ang pinakamahusay na paraan para malaman ang timbang ng isang bagay?", en: "What is the best way to know the weight of an object?" }, 
                options: { tl: ["Hulaan ang timbang gamit ang kamay.", "Tanungin ang nagtitinda.", "Gumamit ng weighing scale.", "Tingnan ang label."], en: ["Guess the weight using your hand.", "Ask the vendor.", "Use a weighing scale.", "Look at the label."] }, 
                answer: 2, topic: 'Estimating' 
            },
            // Q28: Customer Doubt (Estimating Q3)
            { 
                question: { tl: "Kapag may duda ka na kulang ang bigay na timbang, ano ang nararapat gawin?", en: "When you doubt that the weight given is insufficient, what should you do?" }, 
                options: { tl: ["Huwag na lang magsalita at umalis.", "Makipag-away at magreklamo agad.", "I-estimate ang timbang at magreklamo.", "Mahinahong magtanong at magpatingin ulit."], en: ["Say nothing and leave.", "Fight and complain immediately.", "Estimate the weight and complain.", "Politely ask and have it checked again."] }, 
                answer: 3, topic: 'Problem Solving' 
            },
            // Q29: Metric Word Problem (Need 1.2 MT, Donated 1,458 kg) - Calculation: 1.2 MT = 1200 kg. 1458 kg > 1200 kg.
            { 
                question: { tl: "Kailangan ng 1.2 metric tons (MT) na bigas. May nag-donate ng 1,458 kg. Sapat ba ang donation? (1 MT = 1,000 kg)", en: "1.2 metric tons (MT) of rice is needed. 1,458 kg was donated. Is the donation enough? (1 MT = 1,000 kg)" }, 
                options: { tl: ["Oo, sapat na sobra pa.", "Hindi, kulang pa.", "Eksakto lang.", "Wala sa nabanggit"], en: ["Yes, it is more than enough.", "No, it is not enough.", "It is exactly enough.", "None of the above"] }, 
                answer: 0, topic: 'Metric Word Problem' 
            }, 
            // Q30: English Word Problem (Suitcase vs Beef) - Calculation: Suitcase 6 lbs = 96 oz. Beef 96 oz. They are equal.
            { 
                question: { tl: "Alin ang mas mabigat: isang suitcase na 6 pounds (lbs) o isang plastic bag ng beef na 96 onsa (oz)? (1 lb = 16 oz)", en: "Which is heavier: a suitcase weighing 6 pounds (lbs) or a plastic bag of beef weighing 96 ounces (oz)? (1 lb = 16 oz)" }, 
                options: { tl: ["Suitcase", "Beef", "Pareho lang ang timbang", "Hindi matukoy"], en: ["Suitcase", "Beef", "They weigh the same", "Cannot be determined"] }, 
                answer: 2, topic: 'English Word Problem' 
            } 
        ];

        let userAnswers = {}; // {qIndex: selectedOptionIndex}
        const quizName = "Pagsusulit: Pagsukat ng Timbang 1";
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
                // Insert: Add the new record
                userRecords.push(recordToSave);
            }
            
            localStorage.setItem(USER_RECORDS_KEY, JSON.stringify(userRecords));
            console.log("Quiz record saved globally and user-specifically:", recordToSave);
        }

        /**
         * Submits the quiz, calculates the score, and displays results.
         * Changes: includes submission time (human-readable and ISO) so stored records show when the quiz was submitted.
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

            // capture current time
            const now = new Date();

            // --- 1. PREPARE THE RESULT OBJECT ---
            currentQuizResult = {
                name: quizName,
                rawLevelId: quizLevelRawId, 
                level: quizLevelDisplay, 
                score: `${correctCount}/${totalQuestions}`,
                percentage: Math.round((correctCount / totalQuestions) * 100),
                date: now.toLocaleDateString('en-US'),
                time: now.toLocaleTimeString('en-US'),    // human-readable time
                submittedAt: now.toISOString()            // ISO timestamp for precise ordering/filtering
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
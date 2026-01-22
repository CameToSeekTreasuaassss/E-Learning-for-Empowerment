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
                <h1 class="text-4xl font-extrabold text-primary mb-2" id="quiz-title">Pagsusulit: Pagsukat ng Timbang 1</h1>
                <p class="text-xl text-gray-600" id="quiz-subtitle">30 Items: Metric at English Systems, Conversions, at Estimation</p>
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
            
            <!-- This container will hold the two individually rendered section cards -->
            <div id="quiz-content" class="space-y-12"> 
                <!-- JS will inject the two .quiz-section-card divs here -->
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
                    <!-- Updated to reflect saving handled in submitQuiz() -->
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
            'quizTitle': { tl: "Pagsusulit: Pagsukat ng Timbang 1", en: "Quiz: Weight Measurement 1" },
            'quizSubtitle': { tl: "30 Items: Metric at English Systems, Conversions, at Estimation", en: "30 Items: Metric and English Systems, Conversions, and Estimation" },
            'goBack': { tl: 'Bumalik', en: 'Go Back' },
            'section1Title': { tl: 'I. Aralin 1: Metric System at Conversion', en: 'I. Lesson 1: Metric System and Conversion' },
            'section2Title': { tl: 'II. Aralin 2: English System, Estimation, at Problem Solving', en: 'II. Lesson 2: English System, Estimation, and Problem Solving' },
            'section3Title': { tl: 'III. Aralin 3: Pagsasanay', en: 'III. Lesson 3: Practice' }, // Placeholder for the 3rd section, although only 2 sections are used below.
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
        // Based on: Measuring Weight.pdf (Lesson 1 & 2)
        
        const quizData = [
            // Section I: Aralin 1 - Metric System (1-15)
            // Q1: Conversion (kg to g)
            { question: { tl: "Ilang <b>grams</b> (g) ang mayroon sa 1 <b>kilogram</b> (kg)?", en: "How many <b>grams</b> (g) are in 1 <b>kilogram</b> (kg)?" }, 'options': { tl: ["10", "100", "1,000", "10,000"], en: ["10", "100", "1,000", "10,000"] }, 'answer': 2, 'topic': 'Metric Conversion: kg <-> g' },
            // Q2: Conversion (metric ton to kg)
            { question: { tl: "Ilang <b>kilograms</b> (kg) ang mayroon sa 1 <b>metric ton</b>?", en: "How many <b>kilograms</b> (kg) are in 1 <b>metric ton</b>?" }, 'options': { tl: ["10", "100", "1,000", "10,000,000"], en: ["10", "100", "1,000", "10,000,000"] }, 'answer': 2, 'topic': 'Metric Conversion: ton <-> kg' },
            // Q3: Conversion (metric ton to g)
            { question: { tl: "Ilang <b>grams</b> (g) ang mayroon sa 1 <b>metric ton</b>?", en: "How many <b>grams</b> (g) are in 1 <b>metric ton</b>?" }, 'options': { tl: ["10,000", "100,000", "1,000,000", "10,000,000"], en: ["10,000", "100,000", "1,000,000", "10,000,000"] }, 'answer': 2, 'topic': 'Metric Conversion: ton <-> g' }, // 1000 kg * 1000 g/kg = 1,000,000 g
            // Q4: Conversion (mg to g)
            { question: { tl: "Ilang <b>milligrams</b> (mg) ang mayroon sa 1 <b>gram</b> (g)?", en: "How many <b>milligrams</b> (mg) are in 1 <b>gram</b> (g)?" }, 'options': { tl: ["10", "100", "1,000", "10,000"], en: ["10", "100", "1,000", "10,000"] }, 'answer': 2, 'topic': 'Metric Conversion: g <-> mg' },
            // Q5: Smallest Metric Unit mentioned in Lesson
            { question: { tl: "Alin ang pinakamaliit na unit ng bigat sa Metric System na karaniwang ginagamit sa pagsukat ng medisina?", en: "Which is the smallest unit of weight in the Metric System commonly used for measuring medicine?" }, 'options': { tl: ["Gram", "Kilogram", "Metric Ton", "Milligram"], en: ["Gram", "Kilogram", "Metric Ton", "Milligram"] }, 'answer': 3, 'topic': 'Metric Units' },
            // Q6: Conversion (g to kg)
            { question: { tl: "Ang 500 <b>grams</b> ay katumbas ng ilang <b>kilograms</b>?", en: "500 <b>grams</b> is equivalent to how many <b>kilograms</b>?" }, 'options': { tl: ["1/4 kg", "1/2 kg", "2 kg", "5 kg"], en: ["1/4 kg", "1/2 kg", "2 kg", "5 kg"] }, 'answer': 1, 'topic': 'Metric Conversion: g -> kg' }, // 500/1000 = 1/2
            // Q7: Conversion (kg to metric ton)
            { question: { tl: "Ang 800 <b>kilograms</b> ay katumbas ng ilang <b>metric tons</b>?", en: "800 <b>kilograms</b> is equivalent to how many <b>metric tons</b>?" }, 'options': { tl: ["0.08", "0.4/5", "0.8", "8.0"], en: ["0.08", "0.4/5", "0.8", "8.0"] }, 'answer': 2, 'topic': 'Metric Conversion: kg -> ton' }, // 800/1000 = 0.8 or 4/5
            // Q8: Conversion Technique (Small to Big)
            { question: { tl: "Para mag-convert ng unit mula <b>smaller</b> patungong <b>bigger</b> sa Metric System (hal. gram -> kg), anong operasyon ang mabilis na ginagawa?", en: "To convert a unit from <b>smaller</b> to <b>bigger</b> in the Metric System (e.g., gram -> kg), which operation is typically used?" }, 'options': { tl: ["I-multiply sa 1,000", "I-divide sa 1,000", "I-multiply sa 100", "I-divide sa 100"], en: ["Multiply by 1,000", "Divide by 1,000", "Multiply by 100", "Divide by 100"] }, 'answer': 1, 'topic': 'Metric Conversion: Method' },
            // Q9: Conversion Technique (Big to Small)
            { question: { tl: "Para mag-convert ng unit mula <b>bigger</b> patungong <b>smaller</b> sa Metric System (hal. kg -> g), anong operasyon ang mabilis na ginagawa?", en: "To convert a unit from <b>bigger</b> to <b>smaller</b> in the Metric System (e.g., kg -> g), which operation is typically used?" }, 'options': { tl: ["I-multiply sa 1,000", "I-divide sa 1,000", "I-multiply sa 100", "I-divide sa 100"], en: ["Multiply by 1,000", "Divide by 1,000", "Multiply by 100", "Divide by 100"] }, 'answer': 0, 'topic': 'Metric Conversion: Method' },
            // Q10: Problem Solving (Overloading)
            { question: { tl: "Ang sasakyan ay may capacity na 250 kg. Ang mga pasahero ay tumitimbang na ng 196 kg. Kung may dadalhing box na 3,400 grams, magiging overloaded ba ang sasakyan? (1 kg = 1,000 g)", en: "The vehicle has a capacity of 250 kg. The passengers already weigh 196 kg. If a box weighing 3,400 grams is added, will the vehicle be overloaded? (1 kg = 1,000 g)" }, 'options': { tl: ["Oo, dahil ang box ay 34 kg.", "Hindi, dahil 3.4 kg lang ang box.", "Oo, dahil lalampas sa 250 kg.", "Hindi, dahil 54 kg pa ang natitirang capacity."], en: ["Yes, because the box is 34 kg.", "No, because the box is only 3.4 kg.", "Yes, because it will exceed 250 kg.", "No, because 54 kg capacity remains."] }, 'answer': 1, 'topic': 'Metric: Problem Solving' }, // 250-196=54kg remaining. 3400g = 3.4kg. 3.4kg < 54kg.
            // Q11: Problem Solving (Wholesaler capacity)
            { question: { tl: "Ang factory ay gumagamit ng 3 <b>metric tons</b> ng asukal sa isang taon. Ang wholesaler ay makakapagbigay ng 200 kg sa isang buwan. Sapat ba ang supply ng wholesaler para sa isang taon?", en: "The factory uses 3 <b>metric tons</b> of sugar per year. The wholesaler can provide 200 kg per month. Is the wholesaler's supply enough for one year?" }, 'options': { tl: ["Oo, dahil 2,000 kg lang ang kailangan.", "Hindi, dahil 2,400 kg lang ang supply.", "Oo, dahil 3,000 kg ang supply.", "Hindi, dahil 3,000 kg ang kailangan at 2,400 kg lang ang supply."], en: ["Yes, because only 2,000 kg is needed.", "No, because the supply is only 2,400 kg.", "Yes, because the supply is 3,000 kg.", "No, because 3,000 kg is needed and the supply is only 2,400 kg."] }, 'answer': 3, 'topic': 'Metric: Problem Solving' }, // Need: 3000kg. Supply: 200kg * 12 = 2400kg.
            // Q12: Problem Solving (Reading the Scale - Sample 9)
            { question: { tl: "Batay sa scale na may markang KILOGRAM, kung ang pointer ay eksaktong nasa pagitan ng 3 at 4, ano ang bigat?", en: "Based on the scale marked KILOGRAM, if the pointer is exactly halfway between 3 and 4, what is the weight?" }, 'options': { tl: ["3 kg", "3 1/4 kg", "3 1/2 kg", "4 kg"], en: ["3 kg", "3 1/4 kg", "3 1/2 kg", "4 kg"] }, 'answer': 2, 'topic': 'Scale Reading: Metric' },
            // Q13: Local Unit Equivalent
            { question: { tl: "Ang unit na <b>guhit</b> (ginagamit sa palengke) ay katumbas ng ilang <b>grams</b>?", en: "The unit <b>guhit</b> (used in the market) is equivalent to how many <b>grams</b>?" }, 'options': { tl: ["10 g", "50 g", "100 g", "1,000 g"], en: ["10 g", "50 g", "100 g", "1,000 g"] }, 'answer': 2, 'topic': 'Metric: Local Unit' },
            // Q14: Local Unit Conversion
            { question: { tl: "Ilang <b>grams</b> ang katumbas ng 4 <b>guhit</b> ng kamote?", en: "How many <b>grams</b> is equivalent to 4 <b>guhit</b> of sweet potatoes?" }, 'options': { tl: ["100 g", "250 g", "400 g", "1,000 g"], en: ["100 g", "250 g", "400 g", "1,000 g"] }, 'answer': 2, 'topic': 'Metric: Local Unit Conversion' }, // 4 * 100g = 400g
            // Q15: Problem Solving (Cement Need)
            { question: { tl: "Ang repair job ay nangangailangan ng 3,430 <b>grams</b> ng cement. Ang isang sako ay 10 kg. Sapat ba ang isang sako? (1 kg = 1,000 g)", en: "A repair job requires 3,430 <b>grams</b> of cement. One bag is 10 kg. Is one bag enough? (1 kg = 1,000 g)" }, 'options': { tl: ["Oo, dahil 3.43 kg lang ang kailangan.", "Hindi, dahil 10 kg lang ang supply.", "Oo, dahil 34.3 kg ang kailangan.", "Hindi, dahil 10 kg ang kailangan."], en: ["Yes, because only 3.43 kg is needed.", "No, because the supply is only 10 kg.", "Yes, because 34.3 kg is needed.", "No, because 10 kg is needed."] }, 'answer': 0, 'topic': 'Metric: Problem Solving' }, // 3430g = 3.43kg. 3.43kg < 10kg.

            // Section II: Aralin 2 - English System (16-30)
            // Q16: Conversion (lb to oz)
            { question: { tl: "Ilang <b>ounces</b> (oz) ang mayroon sa 1 <b>pound</b> (lb)?", en: "How many <b>ounces</b> (oz) are in 1 <b>pound</b> (lb)?" }, 'options': { tl: ["10", "12", "16", "20"], en: ["10", "12", "16", "20"] }, 'answer': 2, 'topic': 'English Conversion: lb <-> oz' },
            // Q17: Conversion (ton to lb)
            { question: { tl: "Ilang <b>pounds</b> (lbs) ang mayroon sa 1 <b>ton</b> (English Ton)?", en: "How many <b>pounds</b> (lbs) are in 1 <b>ton</b> (English Ton)?" }, 'options': { tl: ["1,000", "1,600", "2,000", "2,204"], en: ["1,000", "1,600", "2,000", "2,204"] }, 'answer': 2, 'topic': 'English Conversion: ton <-> lb' },
            // Q18: Conversion (oz to lb)
            { question: { tl: "Ang 35 <b>ounces</b> ay katumbas ng ilang pounds?", en: "35 <b>ounces</b> is equivalent to how many pounds?" }, 'options': { tl: ["2 lbs 1 oz", "2 lbs 3 oz", "3 lbs 2 oz", "3 lbs 5 oz"], en: ["2 lbs 1 oz", "2 lbs 3 oz", "3 lbs 2 oz", "3 lbs 5 oz"] }, 'answer': 1, 'topic': 'English Conversion: oz -> lb' }, // 35 / 16 = 2 r 3
            // Q19: Conversion (lb to oz)
            { question: { tl: "Ilang <b>ounces</b> ang katumbas ng 3 1/2 <b>pounds</b>?", en: "How many <b>ounces</b> is equivalent to 3 1/2 <b>pounds</b>?" }, 'options': { tl: ["35 oz", "48 oz", "56 oz", "64 oz"], en: ["35 oz", "48 oz", "56 oz", "64 oz"] }, 'answer': 2, 'topic': 'English Conversion: lb -> oz' }, // 3.5 * 16 = 56
            // Q20: Conversion (lb to ton)
            { question: { tl: "Ang 6,000 <b>pounds</b> ay katumbas ng ilang <b>tons</b>?", en: "6,000 <b>pounds</b> is equivalent to how many <b>tons</b>?" }, 'options': { tl: ["2 tons", "3 tons", "4 tons", "6 tons"], en: ["2 tons", "3 tons", "4 tons", "6 tons"] }, 'answer': 1, 'topic': 'English Conversion: lb -> ton' }, // 6000 / 2000 = 3
            // Q21: Problem Solving (Scale Reading - Sample 10)
            { question: { tl: "Batay sa scale na may markang POUNDS, kung ang pointer ay eksaktong nasa pagitan ng 10 at 15, at ang bawat line ay 1 lb, ano ang bigat?", en: "Based on the scale marked POUNDS, if the pointer is exactly between 10 and 15, and each line is 1 lb, what is the weight?" }, 'options': { tl: ["10 lbs", "12 lbs", "12 1/2 lbs", "15 lbs"], en: ["10 lbs", "12 lbs", "12 1/2 lbs", "15 lbs"] }, 'answer': 1, 'topic': 'Scale Reading: English' }, // The image provided in the source PDF shows the pointer exactly on the 12th line.
            // Q22: Problem Solving (Weight Gain)
            { question: { tl: "Ang timbang ni baby Totoy ay 17 1/2 <b>pounds</b>. Ilang pounds at ounces ito?", en: "Baby Totoy's weight is 17 1/2 <b>pounds</b>. How many pounds and ounces is this?" }, 'options': { tl: ["17 lbs 4 oz", "17 lbs 8 oz", "17 lbs 12 oz", "17 lbs 16 oz"], en: ["17 lbs 4 oz", "17 lbs 8 oz", "17 lbs 12 oz", "17 lbs 16 oz"] }, 'answer': 1, 'topic': 'English: Problem Solving' }, // 1/2 lb * 16 oz/lb = 8 oz
            // Q23: Comparison (oz vs lb)
            { question: { tl: "Alin ang mas mabigat: 33 <b>ounces</b> (oz) o 2 <b>pounds</b> (lb)?", en: "Which is heavier: 33 <b>ounces</b> (oz) or 2 <b>pounds</b> (lb)?" }, 'options': { tl: ["33 oz", "2 lbs", "Pareho lang", "Hindi matukoy"], en: ["33 oz", "2 lbs", "The same", "Cannot be determined"] }, 'answer': 0, 'topic': 'English: Comparison' }, // 2 lbs * 16 oz/lb = 32 oz. 33 oz > 32 oz.
            // Q24: Problem Solving (Excess Weight)
            { question: { tl: "Gusto ni lola ng 2 pounds na mani, pero ang timbang sa bag ay 2 1/2 pounds. Ilang <b>ounces</b> ng mani ang dapat alisin?", en: "Grandma wants 2 pounds of peanuts, but the weight in the bag is 2 1/2 pounds. How many <b>ounces</b> of peanuts should be removed?" }, 'options': { tl: ["4 oz", "8 oz", "12 oz", "16 oz"], en: ["4 oz", "8 oz", "12 oz", "16 oz"] }, 'answer': 1, 'topic': 'English: Problem Solving' }, // 1/2 lb * 16 oz/lb = 8 oz
            // Q25: Problem Solving (Baking Needs)
            { question: { tl: "May 2 <b>lbs</b> ng butter si Cook. Kailangan ng 2 cakes ng 20 oz bawat isa. Sapat ba ang butter?", en: "Cook has 2 <b>lbs</b> of butter. 2 cakes require 20 oz each. Is the butter sufficient?" }, 'options': { tl: ["Oo, dahil 32 oz lang ang kailangan.", "Hindi, dahil 32 oz lang ang supply at 40 oz ang kailangan.", "Oo, dahil 40 oz ang supply.", "Hindi, dahil 2 lbs lang ang kailangan."], en: ["Yes, because only 32 oz is needed.", "No, because the supply is only 32 oz and 40 oz is needed.", "Yes, because the supply is 40 oz.", "No, because only 2 lbs are needed."] }, 'answer': 1, 'topic': 'English: Problem Solving' }, // Supply: 2*16=32 oz. Need: 2*20=40 oz.
            // Q26: Estimation Method (Weight Feel)
            { question: { tl: "Alin ang paraan ng pag-<b>estimate</b> ng bigat?", en: "Which is a method of <b>estimating</b> weight?" }, 'options': { tl: ["Paghahambing ng bigat sa timbang ng ibang tao.", "Pagsusukat ng haba at lapad ng bagay.", "Pamilyarisa ang sarili sa 'pakiramdam' ng 1 kilo sa kamay.", "Paggamit ng timbangan ng ibang vendor."], en: ["Comparing weight to someone else's weight.", "Measuring the object's length and width.", "Familiarizing yourself with the 'feel' of 1 kilo in your hand.", "Using another vendor's scale."] }, 'answer': 2, 'topic': 'Estimation' },
            // Q27: Estimation Method (Counting Pieces)
            { question: { tl: "Kung ang 1 <b>kilo</b> ng ponkan ay may 6 na piraso, at bumili ka ng mas maliit na ponkan, gaano karaming piraso ang maaasahan mo sa 1 kilo?", en: "If 1 <b>kilo</b> of ponkan has 6 pieces, and you buy smaller ponkan, how many pieces can you expect in 1 kilo?" }, 'options': { tl: ["Eksaktong 6 na piraso", "Mas marami sa 6 na piraso", "Mas kaunti sa 6 na piraso", "Hindi matukoy"], en: ["Exactly 6 pieces", "More than 6 pieces", "Less than 6 pieces", "Cannot be determined"] }, 'answer': 1, 'topic': 'Estimation' },
            // Q28: Importance of Scale Reading
            { question: { tl: "Bakit mahalagang malaman mo kung paano magbasa ng timbangan sa palengke?", en: "Why is it important to know how to read a market scale?" }, 'options': { tl: ["Para makita kung may sira ang timbangan.", "Para makita kung tama ang presyo.", "Para masiguro na tama ang dami ng binibili mo.", "Para mapili ang pinakamagandang paninda."], en: ["To see if the scale is broken.", "To see if the price is correct.", "To ensure the quantity you are buying is accurate.", "To choose the best merchandise."] }, 'answer': 2, 'topic': 'Estimation: Use Case' },
            // Q29: Problem Solving (Tons to lb)
            { question: { tl: "Ilang <b>pounds</b> ang mayroon sa 6 1/2 <b>tons</b> ng asukal?", en: "How many <b>pounds</b> are in 6 1/2 <b>tons</b> of sugar?" }, 'options': { tl: ["6,500 lbs", "12,000 lbs", "13,000 lbs", "15,000 lbs"], en: ["6,500 lbs", "12,000 lbs", "13,000 lbs", "15,000 lbs"] }, 'answer': 2, 'topic': 'English Conversion: ton -> lb' }, // 6.5 * 2000 = 13,000
            // Q30: Estimation (Thinner Slices)
            { question: { tl: "Kung ang 1 <b>kilo</b> ng pork chops ay may 6 na makakapal na hiwa, at humingi ka ng mas maninipis na hiwa, gaano karaming hiwa ang maaasahan mo sa 1 kilo?", en: "If 1 <b>kilo</b> of pork chops has 6 thick slices, and you ask for thinner slices, how many slices can you expect in 1 kilo?" }, 'options': { tl: ["Mas kaunti sa 6 na hiwa", "Eksaktong 6 na hiwa", "Mas marami sa 6 na hiwa", "Hindi magbabago ang bilang"], en: ["Less than 6 slices", "Exactly 6 slices", "More than 6 slices", "The number will not change"] }, 'answer': 2, 'topic': 'Estimation: Thinner Slices' }
        ];

        let userAnswers = {}; // {qIndex: selectedOptionIndex}
        const quizName = "Pagsusulit: Pagsukat ng Timbang 1";
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
            
            alertBox.classList.remove('hidden', 'bg-red-100', 'text-error', 'bg-primary-light', 'text-success');
            
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
         * Renders the quiz questions into the single quiz-content container with two separate cards.
         */
        function renderQuiz() {
            const lang = currentLanguage;
            const quizContent = document.getElementById('quiz-content');
            
            // Separate strings for content that will go inside the section cards
            let section1Content = ''; // Aralin 1: Metric System (Q1-Q15)
            let section2Content = ''; // Aralin 2: English System (Q16-Q30)

            // Separate HTML for the header/title of each card
            const sectionTitles = [
                `<div class="section-title">${uiText.section1Title[lang]}</div>`,
                `<div class="section-title">${uiText.section2Title[lang]}</div>`
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
                
                // Route question to the correct section (1-15, 16-30)
                if (index < 15) {
                    section1Content += questionHtml;
                } else {
                    section2Content += questionHtml;
                }
            });

            // Assemble the final structure with the two separate cards
            quizContent.innerHTML = `
                <div class="quiz-section-card" id="quiz-section-1">
                    ${sectionTitles[0]}
                    <div class="space-y-4 pt-4">${section1Content}</div>
                </div>
                <div class="quiz-section-card" id="quiz-section-2">
                    ${sectionTitles[1]}
                    <div class="space-y-4 pt-4">${section2Content}</div>
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
            showAlert(`Resulta para sa ${currentQuizResult.name} ay na-save!`, 'success');
        }

        /**
         * Submits the quiz, calculates the score, and displays results.
         * Now records both the date and the time (and an ISO timestamp) when saving the result.
         * Time format set to 12-hour with AM/PM for readability.
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
        
        // Removed redundant DOMContentLoaded listener for record link
    </script>

</body>
</html>
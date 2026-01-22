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
    <title>Pagsusulit: Pagsukat ng Timbang 2</title>
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
        
        /* Style for the two separate cards (sections) */
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
                <h1 class="text-4xl font-extrabold text-primary mb-2" id="quiz-title">Pagsusulit: Pagsukat ng Timbang 2</h1>
                <p class="text-xl text-gray-600" id="quiz-subtitle">30 Items: Inter-System Conversions at Unit Price Analysis</p>
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
            'quizTitle': { tl: "Pagsusulit: Pagsukat ng Timbang 2", en: "Quiz: Weight Measurement 2" },
            'quizSubtitle': { tl: "30 Items: Inter-System Conversions at Unit Price Analysis", en: "30 Items: Inter-System Conversions and Unit Price Analysis" },
            'goBack': { tl: 'Bumalik', en: 'Go Back' },
            'section1Title': { tl: 'I. Aralin 1: Ang Iba\'t Ibang Yunit ng Timbang (Inter-System)', en: 'I. Lesson 1: Different Units of Weight (Inter-System)' },
            'section2Title': { tl: 'II. Aralin 2: Pagkuha ng Pinakarisonableng Presyo (Unit Price)', en: 'II. Lesson 2: Finding the Most Reasonable Price (Unit Price)' },
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
        // Conversion Factors (from PDF page 6/9): 1 kg = 2.2 lb; 1 oz = 28.35 g; 1 lb = 0.45 kg; 1 metric ton = 1.1 ton
        
        const quizData = [
            // Section I: Aralin 1 - Ang Iba't Ibang Yunit ng Timbang (1-15)
            // Q1: Conversion Factor (kg to lb)
            { question: { tl: "Ilang <b>libra</b> (lb) ang mayroon sa 1 <b>kilo</b> (kg)?", en: "How many <b>pounds</b> (lb) are in 1 <b>kilogram</b> (kg)? (Conversion Factor)" }, options: { tl: ["1.1", "2.2", "28.35", "453.6"], en: ["1.1", "2.2", "28.35", "453.6"] }, answer: 1, topic: 'Inter-System Conversion (Metric to English)' },
            // Q2: Conversion Factor (oz to g)
            { question: { tl: "Ilang <b>gramo</b> (g) ang mayroon sa 1 <b>onsa</b> (oz)?", en: "How many <b>grams</b> (g) are in 1 <b>ounce</b> (oz)? (Conversion Factor)" }, options: { tl: ["0.035", "0.45", "28.35", "453.6"], en: ["0.035", "0.45", "28.35", "453.6"] }, answer: 2, topic: 'Inter-System Conversion (English to Metric)' },
            // Q3: Comparison (kg vs lb)
            { question: { tl: "Alin ang mas mabigat: 1 <b>kilo</b> o 2 <b>libra</b>?", en: "Which is heavier: 1 <b>kilogram</b> or 2 <b>pounds</b>?" }, options: { tl: ["1 kilo", "2 libra", "Pareho lang ang timbang", "Hindi matukoy"], en: ["1 kilogram", "2 pounds", "The weights are the same", "Cannot be determined"] }, answer: 0, topic: 'Weight Comparison' }, // 1 kg = 2.2 lb. 2.2 lb > 2 lb.
            // Q4: Comparison (g vs oz)
            { question: { tl: "Alin ang mas magaan: 1 <b>gramo</b> o 1 <b>onsa</b>?", en: "Which is lighter: 1 <b>gram</b> or 1 <b>ounce</b>?" }, options: { tl: ["1 gramo", "1 onsa", "Pareho lang ang timbang", "Hindi matukoy"], en: ["1 gram", "1 ounce", "The weights are the same", "Cannot be determined"] }, answer: 0, topic: 'Weight Comparison' }, // 1 oz = 28.35 g. 1 g < 28.35 g.
            // Q5: Comparison (tonelada vs metric ton)
            { question: { tl: "Ang 1 <b>metrikong tonelada</b> ay (mas mabigat/mas magaan) sa 1 <b>tonelada</b> (English ton)?", en: "Is 1 <b>metric ton</b> (heavier/lighter) than 1 <b>ton</b> (English ton)?" }, options: { tl: ["mas magaan", "mas mabigat", "Pareho lang", "Hindi matukoy"], en: ["lighter", "heavier", "The same", "Cannot be determined"] }, answer: 1, topic: 'Weight Comparison' }, // 1 metric ton = 1.1 ton. 1.1 ton > 1 ton.
            // Q6: Calculation (kg to lb)
            { question: { tl: "Kung ang timbang ni Tatay ay 65 <b>kilo</b>, ilang <b>libra</b> iyon? (Gamitin: 1 kg = 2.2 lb)", en: "If Father's weight is 65 <b>kilograms</b>, how many <b>pounds</b> is that? (Use: 1 kg = 2.2 lb)" }, options: { tl: ["125.0 lb", "130.0 lb", "143.0 lb", "165.0 lb"], en: ["125.0 lb", "130.0 lb", "143.0 lb", "165.0 lb"] }, answer: 2, topic: 'Inter-System Calculation' }, // 65 * 2.2 = 143
            // Q7: Calculation (lb to kg)
            { question: { tl: "Ilang <b>kilong</b> semento ang kailangan ni Marc kung gusto niya ng 5 <b>libra</b>? (Gamitin: 1 lb = 0.45 kg)", en: "How many <b>kilograms</b> of cement does Marc need if he wants 5 <b>pounds</b>? (Use: 1 lb = 0.45 kg)" }, options: { tl: ["1.8 kg", "2.25 kg", "5.0 kg", "11.11 kg"], en: ["1.8 kg", "2.25 kg", "5.0 kg", "11.11 kg"] }, answer: 1, topic: 'Inter-System Calculation' }, // 5 * 0.45 = 2.25
            // Q8: Problem Solving (Weight Loss)
            { question: { tl: "Si Andrea ay 65 kg noong nakaraang taon at 125 lb ngayong taon. Ilang <b>libra</b> ang nabawas sa kanya? (Gamitin: 1 kg = 2.2 lb)", en: "Andrea was 65 kg last year and is 125 lb this year. How many <b>pounds</b> did she lose? (Use: 1 kg = 2.2 lb)" }, options: { tl: ["15 lb", "18 lb", "22 lb", "30 lb"], en: ["15 lb", "18 lb", "22 lb", "30 lb"] }, answer: 1, topic: 'Inter-System Problem Solving' }, // (65 * 2.2) - 125 = 143 - 125 = 18 lb
            // Q9: Problem Solving (Baby Weight Comparison)
            { question: { tl: "Baby A: 9 <b>libra</b>. Baby B: 4 <b>kilo</b>. Alin ang mas mabigat? (Gamitin: 1 kg = 2.2 lb)", en: "Baby A: 9 <b>pounds</b>. Baby B: 4 <b>kilograms</b>. Which is heavier? (Use: 1 kg = 2.2 lb)" }, options: { tl: ["Baby A", "Baby B", "Pareho lang", "Hindi matukoy"], en: ["Baby A", "Baby B", "The same weight", "Cannot be determined"] }, answer: 0, topic: 'Inter-System Problem Solving' }, // 4 kg = 8.8 lb. 9 lb > 8.8 lb.
            // Q10: Calculation (Metric Ton to Ton)
            { question: { tl: "Ang 4.7 <b>metrikong tonelada</b> ay katumbas ng ilang <b>tonelada</b>? (Gamitin: 1 metric ton = 1.1 ton)", en: "4.7 <b>metric tons</b> is equivalent to how many <b>tons</b> (English)? (Use: 1 metric ton = 1.1 ton)" }, options: { tl: ["4.27 ton", "4.7 ton", "5.17 ton", "5.87 ton"], en: ["4.27 ton", "4.7 ton", "5.17 ton", "5.87 ton"] }, answer: 2, topic: 'Inter-System Calculation' }, // 4.7 * 1.1 = 5.17
            // Q11: Metric to English (Approximation)
            { question: { tl: "Ang isang <b>kilo</b> ay halos (doble/kalahati) ng bigat ng isang <b>libra</b>?", en: "Is one <b>kilogram</b> approximately (double/half) the weight of one <b>pound</b>?" }, options: { tl: ["halos kalahati", "halos doble", "halos tatlo", "halos pareho"], en: ["almost half", "almost double", "almost triple", "almost the same"] }, answer: 1, topic: 'Weight Comparison' }, // 1 kg = 2.2 lb (double)
            // Q12: Calculation (lb to oz) for comparison - *Corrected calculation for this question*
            { question: { tl: "Ang 8 <b>libra</b> at 3 <b>onsa</b> ay katumbas ng humigit-kumulang ilang <b>kilo</b>? (Gamitin: 1 lb = 0.45 kg)", en: "8 <b>pounds</b> and 3 <b>ounces</b> is approximately equivalent to how many <b>kilograms</b>? (Use: 1 lb = 0.45 kg)" }, options: { tl: ["3.68 kg", "4.05 kg", "8.18 kg", "8.45 kg"], en: ["3.68 kg", "4.05 kg", "8.18 kg", "8.45 kg"] }, answer: 0, topic: 'Inter-System Calculation' }, // (8 + 3/16) * 0.45 = 8.1875 * 0.45 = 3.684 kg
            // Q13: Calculation (kg to lb) for comparison
            { question: { tl: "Ang 7.5 <b>kilo</b> ay katumbas ng humigit-kumulang ilang <b>libra</b>? (Gamitin: 1 kg = 2.2 lb)", en: "7.5 <b>kilograms</b> is approximately equivalent to how many <b>pounds</b>? (Use: 1 kg = 2.2 lb)" }, options: { tl: ["15 lb", "15.5 lb", "16.5 lb", "17.5 lb"], en: ["15 lb", "15.5 lb", "16.5 lb", "17.5 lb"] }, answer: 2, topic: 'Inter-System Calculation' }, // 7.5 * 2.2 = 16.5 lb
            // Q14: Unit of Weight for Medicine (Metric)
            { question: { tl: "Alin sa Metric unit ang ginagamit sa pagsukat ng medisina (hal. vitamin tablets)?", en: "Which Metric unit is used for measuring medicine (e.g., vitamin tablets)?" }, options: { tl: ["Kilogram", "Gram", "Decigram", "Milligram"], en: ["Kilogram", "Gram", "Decigram", "Milligram"] }, answer: 3, topic: 'Metric Units' },
            // Q15: Calculation (lb to g)
            { question: { tl: "Ilang <b>gramo</b> (g) ang mayroon sa 4 <b>libra</b> (lb)? (Gamitin: 1 lb = 453.6 g)", en: "How many <b>grams</b> (g) are in 4 <b>pounds</b> (lb)? (Use: 1 lb = 453.6 g)" }, options: { tl: ["181.44 g", "1,814.4 g", "4,536 g", "18,144 g"], en: ["181.44 g", "1,814.4 g", "4,536 g", "18,144 g"] }, answer: 1, topic: 'Inter-System Calculation' }, // 4 * 453.6 = 1814.4

            // Section II: Aralin 2 - Pagkuha ng Pinakarisonableng Presyo (16-30)
            // Q16: Unit Price Definition
            { question: { tl: "Ano ang tawag sa <b>halaga ng isang yunit</b> (tulad ng \u20b1/kilo o \u20b1/gramo) na ginagamit sa paghahambing ng presyo ng iba't ibang tatak ng bilihin?", en: "What is the term for the <b>cost of one unit</b> (e.g., \u20b1/kilo or \u20b1/gram) used to compare the prices of different brands?" }, options: { tl: ["Unit Cost", "Presyo ng Yunit (Unit Price)", "Discounted Price", "Bulk Price"], en: ["Unit Cost", "Unit Price", "Discounted Price", "Bulk Price"] }, answer: 1, topic: 'Unit Price: Definition' },
            // Q17: Calculation: Price from Weight (Fractional)
            { question: { tl: "Ang 1 kilong karot ay \u20b190. Magkano ang 500 <b>gramo</b> (1/2 kilo)?", en: "1 kilogram of carrots is \u20b190. How much is 500 <b>grams</b> (1/2 kilo)?" }, options: { tl: ["\u20b140", "\u20b145", "\u20b150", "\u20b190"], en: ["\u20b140", "\u20b145", "\u20b150", "\u20b190"] }, answer: 1, topic: 'Unit Price: Calculation' }, // 90 * 0.5 = 45
            // Q18: Calculation: Price from Weight (Decimal)
            { question: { tl: "Ang 1 kilong seleri ay \u20b1120. Magkano ang 100 <b>gramo</b> (0.1 kilo)?", en: "1 kilogram of celery is \u20b1120. How much is 100 <b>grams</b> (0.1 kilo)?" }, options: { tl: ["\u20b110", "\u20b112", "\u20b115", "\u20b120"], en: ["\u20b110", "\u20b112", "\u20b115", "\u20b120"] }, answer: 1, topic: 'Unit Price: Calculation' }, // 120 * 0.1 = 12
            // Q19: Calculation: Total Cost (Market List)
            { question: { tl: "Magkano ang kabuuang presyo kung bibili ng 0.1 kg sibuyas (\u20b165/kg) at 0.6 kg karot (\u20b190/kg)?", en: "What is the total price if buying 0.1 kg onion (\u20b165/kg) and 0.6 kg carrots (\u20b190/kg)?" }, options: { tl: ["\u20b154.00", "\u20b160.50", "\u20b170.50", "\u20b1155.00"], en: ["\u20b154.00", "\u20b160.50", "\u20b170.50", "\u20b1155.00"] }, answer: 1, topic: 'Unit Price: Calculation' }, // (0.1*65) + (0.6*90) = 6.50 + 54.00 = 60.50
            // Q20: Calculation: Unit Price (Silaw)
            { question: { tl: "Ang sabong panlaba na 'Silaw' ay \u20b145 para sa 250 gramo. Ano ang <b>presyo ng yunit</b> (\u20b1/gramo)?", en: "The detergent 'Silaw' is \u20b145 for 250 grams. What is the <b>unit price</b> (\u20b1/gram)?" }, options: { tl: ["\u20b10.14/g", "\u20b10.18/g", "\u20b10.20/g", "\u20b10.45/g"], en: ["\u20b10.14/g", "\u20b10.18/g", "\u20b10.20/g", "\u20b10.45/g"] }, answer: 1, topic: 'Unit Price: Calculation' }, // 45 / 250 = 0.18
            // Q21: Calculation: Unit Price (Puti)
            { question: { tl: "Ang sabong panlaba na 'Puti' ay \u20b150 para sa 350 gramo. Ano ang <b>presyo ng yunit</b> (\u20b1/gramo)?", en: "The detergent 'Puti' is \u20b150 for 350 grams. What is the <b>unit price</b> (\u20b1/gram)?" }, options: { tl: ["\u20b10.14/g", "\u20b10.18/g", "\u20b10.20/g", "\u20b10.50/g"], en: ["\u20b10.14/g", "\u20b10.18/g", "\u20b10.20/g", "\u20b10.50/g"] }, answer: 0, topic: 'Unit Price: Calculation' }, // 50 / 350 = 0.1428.. -> 0.14
            // Q22: Comparison: Best Buy (Silaw vs Puti)
            { question: { tl: "Alin ang mas mura kung ikukumpara ang <b>presyo ng yunit</b> (Silaw \u20b10.18/g, Puti \u20b10.14/g)?", en: "Which is cheaper when comparing the <b>unit price</b> (Silaw \u20b10.18/g, Puti \u20b10.14/g)?" }, options: { tl: ["Silaw", "Puti", "Pareho lang", "Hindi matukoy"], en: ["Silaw", "Puti", "The same", "Cannot be determined"] }, answer: 1, topic: 'Unit Price: Comparison' },
            // Q23: Concept of Bulk Buying (Cheaper by the Bulk)
            { question: { tl: "Ang pagbili ng 1 kilong asukal (\u20b150) ay mas makatitipid kaysa sa pagbili ng limang 200-gramo (\u20b112 bawat isa) na pakete (\u20b160). Anong konsepto ito?", en: "Buying 1 kg of sugar (\u20b150) saves money compared to buying five 200g (\u20b112 each) packets (\u20b160). What concept is this?" }, options: { tl: ["Unit Pricing", "Bulk Buying", "Cost Allocation", "Inventory"], en: ["Unit Pricing", "Bulk Buying", "Cost Allocation", "Inventory"] }, answer: 1, topic: 'Bulk Buying: Concept' },
            // Q24: Bulk Buying Calculation (Price Comparison)
            { question: { tl: "Magkano ang matitipid ni Elena kung bibilhin niya ang 1 kilong asukal (\u20b150) kumpara sa pagbili ng limang 200g na pakete (\u20b112/200g)?", en: "How much will Elena save if she buys 1 kg of sugar (\u20b150) compared to buying five 200g packets (\u20b112/200g)?" }, options: { tl: ["\u20b15", "\u20b110", "\u20b112", "\u20b115"], en: ["\u20b15", "\u20b110", "\u20b112", "\u20b115"] }, answer: 1, topic: 'Bulk Buying: Calculation' }, // 5 * 12 = 60. 60 - 50 = 10
            // Q25: Cheaper by the Bulk: Method
            { question: { tl: "Para malaman kung mas mura ang bilihin nang maramihan, kailangang ikumpara ang presyo ng malaking pakete sa kabuuang presyo ng ____________________ na katumbas sa timbang ng malaking pakete.", en: "To know if bulk buying is cheaper, the price of the large pack must be compared to the total price of ____________________ equivalent to the weight of the large pack." }, options: { tl: ["mas maliit na pakete", "discounted na pakete", "branded na pakete", "imported na pakete"], en: ["smaller packets", "discounted packets", "branded packets", "imported packets"] }, answer: 0, topic: 'Bulk Buying: Method' },
            // Q26: Unit Price: Flour (Puriflour vs Hari Nah) - *Note: Calculation provided in options/question is for reference*
            { question: { tl: "Alin ang mas mura sa bawat gramo? Hari Nah (\u20b125/500g) o Puriflour (\u20b138/907.2g)?", en: "Which is cheaper per gram? Hari Nah (\u20b125/500g) or Puriflour (\u20b138/907.2g)?" }, options: { tl: ["Hari Nah (\u20b10.05/g)", "Puriflour (\u20b10.042/g)", "Pareho lang", "Hindi matukoy"], en: ["Hari Nah (\u20b10.05/g)", "Puriflour (\u20b10.042/g)", "The same", "Cannot be determined"] }, answer: 1, topic: 'Unit Price: Comparison' }, // Puriflour is cheaper
            // Q27: Problem Solving (Rice Bag)
            { question: { tl: "Bumibili si Vic ng bigas (\u20b120/kg). Ang isang sako (48 kg) ay \u20b1870. Mas makamumura ba siya kung bibilhin niya ang sako?", en: "Vic buys rice (\u20b120/kg). One sack (48 kg) is \u20b1870. Will buying the sack be cheaper for him?" }, options: { tl: ["Oo, mas mura ang sako.", "Hindi, mas mura ang kada kilo.", "Pareho lang ang presyo.", "Hindi matukoy"], en: ["Yes, the sack is cheaper.", "No, buying per kilo is cheaper.", "The prices are the same.", "Cannot be determined"] }, answer: 0, topic: 'Bulk Buying: Problem Solving' }, // 870/48 = 18.13 < 20
            // Q28: Problem Solving (Beef Purchase)
            { question: { tl: "Bumibili si Rocky ng baka (\u20b1180/kg). Nag-alok ang kaibigan niya ng 15 kg sa \u20b12,250. Mas makamumura ba siya sa kaibigan?", en: "Rocky buys beef (\u20b1180/kg). His friend offered 15 kg for \u20b12,250. Will buying from his friend be cheaper?" }, options: { tl: ["Oo, mas mura ang kaibigan.", "Hindi, mas mura ang palengke.", "Pareho lang ang presyo.", "Hindi matukoy"], en: ["Yes, the friend's price is cheaper.", "No, the market price is cheaper.", "The prices are the same.", "Cannot be determined"] }, answer: 0, topic: 'Bulk Buying: Problem Solving' }, // 2250/15 = 150. 150 < 180
            // Q29: Problem Solving (Juice Box)
            { question: { tl: "Bumibili si Oscar ng 250g juice (\u20b119). Ang 1 kg box ay \u20b162. Mas makamumura ba siya sa bulk?", en: "Oscar buys 250g juice (\u20b119). The 1 kg box is \u20b162. Will buying in bulk be cheaper?" }, options: { tl: ["Oo, mas mura ang bulk.", "Hindi, mas mura ang maliit na pakete.", "Pareho lang ang presyo.", "Hindi matukoy"], en: ["Yes, bulk is cheaper.", "No, the small pack is cheaper.", "The prices are the same.", "Cannot be determined"] }, answer: 0, topic: 'Bulk Buying: Problem Solving' }, // 1kg price: 62. 4 * 250g price: 4*19=76. 62 < 76.
            // Q30: Problem Solving (Coffee Purchase)
            { question: { tl: "Ang 250g na kape ay \u20b1320. Ang 50g na kape ay \u20b170. Mas makamumura ba si Rose kung bibili siya nang maramihan?", en: "250g of coffee is \u20b1320. 50g of coffee is \u20b170. Will Rose save money buying in bulk?" }, options: { tl: ["Oo, mas mura ang bulk.", "Hindi, mas mura ang maliit na bote.", "Pareho lang ang presyo.", "Hindi matukoy"], en: ["Yes, bulk is cheaper.", "No, the small bottle is cheaper.", "The prices are the same.", "Cannot be determined"] }, answer: 0, topic: 'Bulk Buying: Problem Solving' } // (250g / 50g) = 5. 5 * 70 = 350. 320 < 350.
        ];

        let userAnswers = {}; // {qIndex: selectedOptionIndex}
        const quizName = "Pagsusulit: Pagsukat ng Timbang 2";
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
            let section1Content = ''; // Aralin 1: Inter-System Conversions (Q1-Q15)
            let section2Content = ''; // Aralin 2: Unit Price Analysis (Q16-Q30)

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
            
            const goBackElement = document.getElementById('go-back-text');
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
        
    </script>

</body>
</html>
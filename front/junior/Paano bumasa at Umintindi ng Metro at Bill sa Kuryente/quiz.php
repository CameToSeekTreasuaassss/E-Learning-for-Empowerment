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
    <title>Pagsusulit: Paano Bumasa at Umintindi ng Metro at Bill sa Kuryente</title>
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
                <h1 class="text-4xl font-extrabold text-primary mb-2" id="quiz-title">Pagsusulit: Paano Bumasa at Umintindi ng Metro at Bill sa Kuryente</h1>
                <p class="text-xl text-gray-600" id="quiz-subtitle">30 Items: Metro Readings, Konsumo, at Kuwenta ng Bill</p>
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
                    <!-- Updated link text and simplified to follow the logic: save happens on submit, link navigation follows. -->
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
        // --- INJECT PHP VARIABLES (ADDED) ---
        const USER_ID = "<?php echo $user_id; ?>";
        const USER_NAME = "<?php echo $user_name; ?>";
        const USER_RAW_LEVEL = "<?php echo $user_level_raw; ?>";
        
        // --- GLOBAL KEY FOR ALL RECORDS (ADDED) ---
        const GLOBAL_RECORDS_KEY = 'allQuizRecords';
        // --- USER-SPECIFIC KEY (ADDED) ---
        const USER_RECORDS_KEY = `quizRecords_${USER_ID}`;

        let currentLanguage = 'tl'; // Default language is Tagalog
        
        // Tiered Rates for Basic Charge (BC)
        const TIER1_RATE = 17.40; // First 10 kWh
        const TIER2_RATE = 1.74;  // Next 40 kWh
        const TIER3_RATE = 3.40;  // Remaining
        const FLAT_RATE = 3.40;   // If >= 300 kWh

        // --- UI Text Translations ---
        const uiText = {
            'quizTitle': { tl: "Pagsusulit: Paano Bumasa at Umintindi ng Metro at Bill sa Kuryente", en: "Quiz: How to Read and Understand the Electric Meter and Bill" },
            'quizSubtitle': { tl: "30 Items: Metro Readings, Konsumo, at Kuwenta ng Bill", en: "30 Items: Meter Readings, Consumption, and Bill Calculation" },
            'goBack': { tl: 'Bumalik', en: 'Go Back' },
            'section1Title': { tl: 'I. Aralin 1: Pagsukat, Konsumo, at Metro Reading', en: 'I. Lesson 1: Measurement, Consumption, and Meter Reading' },
            'section2Title': { tl: 'II. Aralin 2: Pagkuwenta ng Bill (Basic at Surcharge)', en: 'II. Lesson 2: Bill Calculation (Basic and Surcharge)' },
            'section3Title': { tl: 'III. Aralin 3: Bill Analysis at Pagsasara', en: 'III. Lesson 3: Bill Analysis and Conclusion' },
            'submitButton': { tl: 'Tapusin at Tingnan ang Resulta', en: 'Finish and View Results' },
            'unansweredAlert': { tl: 'Kailangan mo pang sagutan ang', en: 'You still need to answer' },
            'unansweredAlertSuffix': { tl: 'na tanong bago mag-submit.', en: 'questions before submitting.' },
            'modalTitle': { tl: 'Resulta ng Pagsusulit', en: 'Quiz Results' },
            'modalScoreText': { tl: 'Nakakuha ka ng:', en: 'You scored:' },
            'modalReviewText': { tl: 'Tingnan ang iyong mga sagot sa ibaba para matuto.', en: 'Review your answers below to learn.' },
            'recordButton': { tl: 'I-record ang Resulta at Pumunta sa Talaan', en: 'Record Result and Go to Records' },
            'resetButton': { tl: 'Subukan Muli', en: 'Try Again' },
        };

        // --- QUIZ DATA (30 Items Total) ---
        const quizData = [
            // Section I: Aralin 1 - Pagsukat at Metro Reading (1-10)
            // Q1: Unit for Power Rating
            { question: { tl: "Ano ang batayang yunit na pansukat para sa <b>power rating</b> (wattage) ng isang appliance?", en: "What is the basic unit of measurement for the <b>power rating</b> (wattage) of an appliance?" }, options: { tl: ["Kilowatt-hour (kW-h)", "Kilowatt (kW)", "Volt (V)", "Ampere (A)"], en: ["Kilowatt-hour (kW-h)", "Kilowatt (kW)", "Volt (V)", "Ampere (A)"] }, answer: 1, topic: 'Konsumo: Yunit' },
            // Q2: Conversion: Watts to Kilowatts
            { question: { tl: "Ang 1,000 watts (W) ay katumbas ng ilan?", en: "1,000 watts (W) is equivalent to how much?" }, options: { tl: ["100 kW", "10 kW", "1 kW", "0.1 kW"], en: ["100 kW", "10 kW", "1 kW", "0.1 kW"] }, answer: 2, topic: 'Konsumo: Yunit Conversion' },
            // Q3: Unit for Energy Consumption
            { question: { tl: "Ang konsumo sa kuryente ay ipinapahayag sa anong yunit?", en: "Electricity consumption is expressed in what unit?" }, options: { tl: ["Watts", "Kilowatt-hour (kW-h)", "Kilowatts", "Ampere-hour"], en: ["Watts", "Kilowatt-hour (kW-h)", "Kilowatts", "Ampere-hour"] }, answer: 1, topic: 'Konsumo: Yunit' },
            // Q4: Calculation: Simple kW-h consumption (single appliance) - CHANGED HOURS
            { question: { tl: "Ang isang Rice Cooker (450 W) ay ginamit sa loob ng <b>3 oras</b>. Ano ang konsumo sa kuryente?", en: "A Rice Cooker (450 W) was used for <b>3 hours</b>. What is the electricity consumption?" }, options: { tl: ["0.45 kW-h", "0.90 kW-h", "1.15 kW-h", "1.35 kW-h"], en: ["0.45 kW-h", "0.90 kW-h", "1.15 kW-h", "1.35 kW-h"] }, answer: 3, topic: 'Konsumo: Pagkuwenta' }, // 0.45 kW * 3 h = 1.35
            // Q5: Calculation: Total consumption (multiple appliances, single time)
            { question: { tl: "Ang TV (100W) at Electric Fan (120W) ay ginamit nang 5 oras. Ano ang kabuuang konsumo?", en: "The TV (100W) and Electric Fan (120W) were used for 5 hours. What is the total consumption?" }, options: { tl: ["1.1 kW-h", "1.5 kW-h", "2.1 kW-h", "220 kW-h"], en: ["1.1 kW-h", "1.5 kW-h", "2.1 kW-h", "220 kW-h"] }, answer: 0, topic: 'Konsumo: Pagkuwenta' }, // (0.1 + 0.12) * 5 = 1.1
            // Q6: Meter Reading: Reading Exact Numbers
            { question: { tl: "Ang metro ng kuryente ay nagpakita ng 7, 2, 8, at 5 sa bawat dial (mula kaliwa). Ano ang basa sa metro? ", en: "The electric meter showed 7, 2, 8, and 5 on each dial (from left). What is the meter reading? " }, options: { tl: ["7,285 kW-h", "5,827 kW-h", "72.85 kW-h", "7,582 kW-h"], en: ["7,285 kW-h", "5,827 kW-h", "72.85 kW-h", "7,582 kW-h"] }, answer: 0, topic: 'Metro: Pagbasa (Direkta)' },
            // Q7: Meter Reading: Reading Between Numbers
            { question: { tl: "Kung ang pointer sa dial ay <b>nakaturo sa pagitan ng 6 at 7</b>, ano ang tamang bilang na babasahin?", en: "If the pointer on the dial is <b>pointing between 6 and 7</b>, what is the correct number to read?" }, options: { tl: ["7", "6", "6.5", "8"], en: ["7", "6", "6.5", "8"] }, answer: 1, topic: 'Metro: Pagbasa (Pagitan)' }, // Always read the lower number
            // Q8: Consumption: Prev and Pres - CHANGED VALUES
            { question: { tl: "Ang <b>nakaraang basa</b> ay 6,210 kW-h at ang <b>kasalukuyang basa</b> ay 6,488 kW-h. Ano ang konsumo sa kuryente?", en: "The <b>previous reading</b> was 6,210 kW-h and the <b>current reading</b> is 6,488 kW-h. What is the electricity consumption?" }, options: { tl: ["278 kW-h", "288 kW-h", "300 kW-h", "5,690 kW-h"], en: ["278 kW-h", "288 kW-h", "300 kW-h", "5,690 kW-h"] }, answer: 0, topic: 'Metro: Konsumo' }, // 6488 - 6210 = 278
            // Q9: Which uses most power (in a short time)?
            { question: { tl: "Alin ang may <b>pinakamalaking power rating</b> (at pinakamalaking konsumo sa kuryente sa maikling panahon)?", en: "Which has the <b>highest power rating</b> (and highest electricity consumption in a short time)?" }, options: { tl: ["Refrigerator (170 W)", "Telebisyon (80 W)", "Water Heater (3,000 W)", "Electric Fan (120 W)"], en: ["Refrigerator (170 W)", "Television (80 W)", "Water Heater (3,000 W)", "Electric Fan (120 W)"] }, answer: 2, topic: 'Konsumo: Power Rating' },
            // Q10: Paraan para Mabawasan ang Konsumo
            { question: { tl: "Ano ang isang paraan upang mabawasan ang konsumo sa kuryente?", en: "What is one way to reduce electricity consumption?" }, options: { tl: ["Gumamit ng appliances na mataas ang wattage.", "Gumamit ng appliances na hindi patayin.", "Gumamit ng appliances na may mababang power rating.", "Panatilihing bukas ang mga ilaw buong araw."], en: ["Use high-wattage appliances.", "Use appliances non-stop.", "Use appliances with low power ratings.", "Keep the lights on all day."], }, answer: 2, topic: 'Konsumo: Pagtitipid' },

            // Section II: Aralin 2 - Pagkuwenta ng Bill (11-20)
            // Q11: Basic Charge: Tier 1 Only (10 kWh)
            { question: { tl: `Kung 10 kW-h ang konsumo, magkano ang <b>Basic Charge</b>? (Gamitin: P${TIER1_RATE} sa unang 10 kW-h)`, en: `If the consumption is 10 kW-h, how much is the <b>Basic Charge</b>? (Use: P${TIER1_RATE} for the first 10 kW-h)` }, options: { tl: ["P1.74", "P17.40", "P3.40", "P34.00"], en: ["P1.74", "P17.40", "P3.40", "P34.00"] }, answer: 1, topic: 'Basic Charge: Tiered' }, // P17.40 (First 10)
            // Q12: Basic Charge: Tier 1 + Tier 2 (50 kWh)
            { question: { tl: `Kung 50 kW-h ang konsumo, magkano ang <b>Basic Charge</b>? (Gamitin: P${TIER1_RATE} sa unang 10; P${TIER2_RATE} sa susunod na 40)`, en: `If the consumption is 50 kW-h, how much is the <b>Basic Charge</b>? (Use: P${TIER1_RATE} for first 10; P${TIER2_RATE} for next 40)` }, options: { tl: ["P17.40", "P69.60", "P87.00", "P170.00"], en: ["P17.40", "P69.60", "P87.00", "P170.00"] }, answer: 2, topic: 'Basic Charge: Tiered' }, // 17.40 + (40 * 1.74) = 87.00
            // Q13: Basic Charge: Above Tiers (258 kWh)
            { question: { tl: `Kung 258 kW-h ang konsumo, ang <b>Basic Charge</b> ay P794.20. Magkano ang halaga ng konsumo sa <b>Tier 3</b> (208 kW-h)? (Gamitin: P${TIER3_RATE}/kW-h)`, en: `If the consumption is 258 kW-h, the <b>Basic Charge</b> is P794.20. How much is the consumption cost in <b>Tier 3</b> (208 kW-h)? (Use: P${TIER3_RATE}/kW-h)` }, options: { tl: ["P707.20", "P794.20", "P87.00", "P69.60"], en: ["P707.20", "P794.20", "P87.00", "P69.60"] }, answer: 0, topic: 'Basic Charge: Tiered' }, // 208 * 3.40 = P707.20
            // Q14: Basic Charge: Flat Rate Rule
            { question: { tl: `Ano ang mangyayari sa Basic Charge rate kapag ang konsumo ay umabot sa <b>300 kW-h o higit pa</b>?`, en: `What happens to the Basic Charge rate when consumption reaches <b>300 kW-h or more</b>?` }, options: { tl: ["Bumababa ang rate.", `Nagiging flat rate na P${FLAT_RATE}/kW-h.`, "Nagiging libre.", "Laging P17.40 lang."], en: ["The rate decreases.", `It becomes a flat rate of P${FLAT_RATE}/kW-h.`, "It becomes free.", "It is always P17.40."], }, answer: 1, topic: 'Basic Charge: Flat Rate' },
            // Q15: Basic Charge: Flat Rate Calculation (350 kWh) - CHANGED VALUES
            { question: { tl: `Kung <b>320 kW-h</b> ang konsumo (flat rate P${FLAT_RATE}/kW-h), magkano ang <b>Basic Charge</b>?`, en: `If the consumption is <b>320 kW-h</b> (flat rate P${FLAT_RATE}/kW-h), how much is the <b>Basic Charge</b>?` }, options: { tl: ["P1,020.00", "P1,190.00", "P1,250.00", "P1,088.00"], en: ["P1,020.00", "P1,190.00", "P1,250.00", "P1,088.00"] }, answer: 3, topic: 'Basic Charge: Flat Rate' }, // 320 * 3.40 = 1088.00
            // Q16: Currency Adjustment Definition
            { question: { tl: "Ang <b>Currency Adjustment</b> ay singil batay sa pagbabagu-bago ng halaga ng palitan ng piso at ng ano?", en: "The <b>Currency Adjustment</b> is a charge based on the fluctuation of the exchange rate between the peso and what currency?" }, options: { tl: ["Yen ng Japan", "Euro ng Europe", "Dollar ng US", "Pound Sterling"], en: ["Japanese Yen", "European Euro", "US Dollar", "Pound Sterling"] }, answer: 2, topic: 'Bill: Charges' },
            // Q17: PPA Definition
            { question: { tl: "Ang <b>PPA</b> (Power Purchase Adjustment) ay bayad para sa serbisyo ng kompanya sa:", en: "The <b>PPA</b> (Power Purchase Adjustment) is a fee for the company's service in:" }, options: { tl: ["Paggawa ng kuryente", "Pagpapautang", "Pamamahagi o Distribusyon ng kuryente", "Pagbili ng langis"], en: ["Generating electricity", "Lending money", "Distribution of electricity", "Buying oil"] }, answer: 2, topic: 'Bill: Charges' },
            // Q18: Basic Charge Factor
            { question: { tl: "Ang halaga ng <b>Basic Charge</b> ay pangunahing nakabatay sa presyo ng ano?", en: "The amount of the <b>Basic Charge</b> is mainly based on the price of what?" }, options: { tl: ["Tubig", "Kuryente", "Langis", "Gasolina"], en: ["Water", "Electricity", "Oil", "Gasoline"] }, answer: 2, topic: 'Bill: Factors' },
            // Q19: Calculation: Currency Adj.
            { question: { tl: "Kung ang Basic Charge ay P862.20 at ang Currency Adjustment rate ay 4.00%, magkano ang <b>Halaga ng Currency Adjustment</b>?", en: "If the Basic Charge is P862.20 and the Currency Adjustment rate is 4.00%, how much is the <b>Currency Adjustment Amount</b>?" }, options: { tl: ["P34.49", "P40.00", "P39.50", "P44.00"], en: ["P34.49", "P40.00", "P39.50", "P44.00"] }, answer: 0, topic: 'Bill: Calculation' }, // 862.20 * 0.04 = 34.488 -> P34.49
            // Q20: Calculation: PPA
            { question: { tl: "Kung 278 kW-h ang konsumo at PPA Rate ay P1.70/kW-h, magkano ang <b>Halaga ng PPA</b>?", en: "If the consumption is 278 kW-h and the PPA Rate is P1.70/kW-h, how much is the <b>PPA Amount</b>?" }, options: { tl: ["P472.60", "P390.40", "P400.00", "P500.00"], en: ["P472.60", "P390.40", "P400.00", "P500.00"] }, answer: 0, topic: 'Bill: Calculation' }, // 278 * 1.70 = 472.60

            // Section III: Bill Calculation at Analysis (21-30)
            // Q21: Total Bill Calculation (BC + CA + PPA) - CHANGED VALUES
            { question: { tl: "Ano ang <b>Kabuuang Halaga ng Bill</b> kung ang Basic Charge (BC) ay P794.20, Currency Adjustment (CA) ay <b>P40.00</b>, at PPA ay <b>P360.00</b>?", en: "What is the <b>Total Bill Amount</b> if the Basic Charge (BC) is P794.20, Currency Adjustment (CA) is <b>P40.00</b>, and PPA is <b>P360.00</b>?" }, options: { tl: ["P1,150.49", "P1,200.00", "P1,250.49", "P1,194.20"], en: ["P1,150.49", "P1,200.00", "P1,250.49", "P1,194.20"] }, answer: 3, topic: 'Bill: Total' }, // 794.20 + 40.00 + 360.00 = 1194.20
            // Q22: Reading Bill: Previous Reading
            { question: { tl: "Sa Bill B, ano ang tawag sa bilang na kumakatawan sa <b>dating basa</b> (Prev) ng metro ng kuryente?", en: "In Bill B, what is the term for the number representing the <b>previous reading</b> (Prev) of the electric meter?" }, options: { tl: ["Kasalukuyang Basa", "Nakaraang Basa", "Konsumo", "Multiplikasyon"], en: ["Current Reading", "Previous Reading", "Consumption", "Multiplication"] }, answer: 1, topic: 'Bill: Readings' },
            // Q23: Reading Bill: Consumo
            { question: { tl: "Sa Bill B, paano kinukuwenta ang <b>Konsumo</b> (Cons) sa kuryente?", en: "In Bill B, how is the electricity <b>Consumption</b> (Cons) calculated?" }, options: { tl: ["Pres * Prev", "Prev - Pres", "Pres + Prev", "Pres - Prev"], en: ["Current * Previous", "Previous - Current", "Current + Previous", "Current - Previous"] }, answer: 3, topic: 'Bill: Readings' },
            // Q24: Impact of High Usage (>= 300 kWh)
            { question: { tl: "Bakit <b>tataas nang malaki</b> ang bill sa kuryente kapag ang konsumo ay umabot sa 300 kW-h o higit pa?", en: "Why does the electricity bill <b>increase significantly</b> when consumption reaches 300 kW-h or more?" }, options: { tl: ["Dahil nagiging libre ang kuryente.", "Dahil tumataas ang rate ng Basic Charge.", "Dahil bumababa ang PPA.", "Dahil hindi na kasama ang Currency Adjustment."], en: ["Because electricity becomes free.", "Because the Basic Charge rate increases.", "Because the PPA decreases.", "Because the Currency Adjustment is no longer included."], }, answer: 1, topic: 'Bill: Analysis' },
            // Q25: Savings Strategy
            { question: { tl: "Alin ang <b>pinakamainam na gawin</b> upang manatiling mababa ang bill sa kuryente?", en: "Which is the <b>best strategy</b> to keep the electricity bill low?" }, options: { tl: ["Gumamit ng lahat ng appliances nang sabay-sabay.", "Panatilihin ang konsumo sa kuryente na higit na mababa sa 300 kW-h.", "Huwag na lang gumamit ng kuryente.", "Magbayad ng Basic Charge lang."], en: ["Use all appliances simultaneously.", "Keep electricity consumption significantly below 300 kW-h.", "Stop using electricity altogether.", "Only pay the Basic Charge."], }, answer: 1, topic: 'Bill: Strategy' },
            // Q26: Saving Method
            { question: { tl: "Ang pagpalit ng 100 W bombilya sa <b>LED bulb</b> (mababang wattage) ay nakatutulong dahil:", en: "Switching a 100 W incandescent bulb to an <b>LED bulb</b> (low wattage) helps because:" }, options: { tl: ["Mas mahal ang LED.", "Mas marami ang liwanag ang kailangan.", "Ang appliances na may mababang power rating ay tipid sa kuryente.", "Para lang maganda tingnan."], en: ["LEDs are more expensive.", "More light is needed.", "Appliances with low power ratings are energy efficient.", "It's just for aesthetics."], }, answer: 2, topic: 'Konsumo: Pagtitipid' },
            // Q27: Penalty warning
            { question: { tl: "Kailan puputulin ng kompanya ng kuryente ang serbisyo?", en: "When will the electric company cut the service?" }, options: { tl: ["Pagkaraan ng isang buwan na walang bayad.", "Pagkaraan ng takdang petsa ng pagbabayad.", "Pagkaraan ng tatlong araw pagkatanggap ng abiso ng pagputol ng serbisyo.", "Pagkaraan ng isang taon."], en: ["After one month without payment.", "After the payment due date.", "Three days after receiving notice of service disconnection.", "After one year."], }, answer: 2, topic: 'Bill: Due Date/Penalty' },
            // Q28: Average Consumption Reading
            { question: { tl: "Ano ang ipinapakita ng <b>'Average Consumption'</b> sa bill?", en: "What does the <b>'Average Consumption'</b> on the bill show?" }, options: { tl: ["Total na binayaran noong nakaraang buwan.", "Ito ay ang konsumo sa loob ng 12 buwan.", "Ito ay ang average na konsumo bawat buwan sa loob ng nakaraang 12 buwan.", "Total na kuryente sa metro."], en: ["Total paid last month.", "This is the consumption over 12 months.", "This is the average monthly consumption over the last 12 months.", "Total electricity on the meter."], }, answer: 2, topic: 'Bill: Analysis' },
            // Q29: Basic Charge Component
            { question: { tl: "Ang Basic Charge ay sinisingil para sa presyo ng kuryente na binili ng kompanya mula sa <b>NAPOCOR</b>, na tinatawag ding:", en: "The Basic Charge is billed for the price of electricity purchased by the company from <b>NAPOCOR</b>, also called:" }, options: { tl: ["PPA", "Generation Charge", "Distribution Charge", "Currency Fee"], en: ["PPA", "Generation Charge", "Distribution Charge", "Currency Fee"] }, answer: 1, topic: 'Bill: Charges' },
            // Q30: PPA/Distribution Charge Component
            { question: { tl: "Ang PPA (Power Purchase Adjustment) ay singil para sa:", en: "The PPA (Power Purchase Adjustment) is a charge for:" }, options: { tl: ["Tubig at Langis", "Pagpapautang", "Paglikha ng kuryente", "Distribusyon at pamamahagi ng kuryente"], en: ["Water and Oil", "Lending money", "Electricity generation", "Distribution and delivery of electricity"], }, answer: 3, topic: 'Bill: Charges' },
        ];

        let userAnswers = {}; // {qIndex: selectedOptionIndex}
        const quizName = "Pagsusulit: Paano Bumasa at Umintindi ng Metro at Bill sa Kuryente";
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
            
            // --- UPDATED ALERT COLORS TO SKY BLUE PALETTE ---
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
         * Renders the quiz questions into the single quiz-content container with three separate cards.
         */
        function renderQuiz() {
            const lang = currentLanguage;
            const quizContent = document.getElementById('quiz-content');
            
            // Separate strings for content that will go inside the section cards
            let section1Content = ''; // Q1-Q10 (Measurement/Reading)
            let section2Content = ''; // Q11-Q20 (Bill Calculation)
            let section3Content = ''; // Q21-Q30 (Bill Analysis/Strategy)

            // Separate HTML for the header/title of each card
            const sectionTitles = [
                `<div class="section-title">${uiText.section1Title[lang]}</div>`,
                `<div class="section-title">${uiText.section2Title[lang]}</div>`,
                `<div class="section-title">${uiText.section3Title[lang]}</div>`
            ];
            
            quizData.forEach((q, index) => {
                let optionsHtml = '';
                const selectedAnswer = userAnswers[index];
                
                q.options[lang].forEach((option, oIndex) => {
                    const isSelected = selectedAnswer === oIndex;
                    const selectedClass = isSelected ? 'selected' : '';
                    const disabledAttr = submitButton().disabled ? 'disabled' : '';

                    // Options buttons are text-aligned left, using text-lg for increased size
                    optionsHtml += `
                        <button 
                            class="option-button w-full text-left text-lg py-3 px-4 bg-white rounded-lg text-gray-700 hover:bg-gray-50 focus:outline-none ${selectedClass}"
                            onclick="selectAnswer(${index}, ${oIndex}, this)"
                            data-qindex="${index}" 
                            data-oindex="${oIndex}"
                            ${disabledAttr}
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
            
            // Re-apply visual feedback if already submitted
            if (submitButton().disabled) {
                applyResultVisuals();
            }
        }
        
        /**
         * Updates static UI elements based on the current language.
         */
        function updateStaticUI(lang) {
            document.getElementById('quiz-title').textContent = uiText.quizTitle[lang];
            document.getElementById('quiz-subtitle').textContent = uiText.quizSubtitle[lang];
            
            const goBackElement = document.querySelector('.absolute #go-back-text');
            if (goBackElement) {
                goBackElement.textContent = uiText.goBack[lang];
            }
            
            submitButton().textContent = uiText.submitButton[lang];
            
            // Modal elements
            const modalTitle = document.getElementById('modal-title');
            if (modalTitle) modalTitle.textContent = uiText.modalTitle[lang];
            
            const modalScoreText = document.getElementById('modal-score-text');
            if (modalScoreText) modalScoreText.textContent = uiText.modalScoreText[lang];
            
            const modalReviewText = document.getElementById('modal-review-text');
            if (modalReviewText) modalReviewText.textContent = uiText.modalReviewText[lang];
            
            const recordButtonLink = document.getElementById('record-button-link');
            if (recordButtonLink) recordButtonLink.textContent = uiText.recordButton[lang];
            
            const resetButtonModal = document.getElementById('reset-button-modal');
            if (resetButtonModal) resetButtonModal.textContent = uiText.resetButton[lang];
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
            
            // Re-render quiz content with the new language and re-apply selection
            renderQuiz();
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
         * Helper function to apply correct/incorrect coloring to buttons after submission or language switch.
         */
        function applyResultVisuals() {
             quizData.forEach((q, index) => {
                const selectedAnswer = userAnswers[index];
                const correctAnswer = q.answer;
                
                const optionsContainer = document.getElementById(`options-q${index}`);
                if (!optionsContainer) return;

                const optionButtons = optionsContainer.querySelectorAll('.option-button');

                optionButtons.forEach((btn, oIndex) => {
                    btn.disabled = true;
                    btn.classList.remove('correct', 'incorrect');
                    
                    if (oIndex === correctAnswer) {
                        btn.classList.add('correct');
                    }
                    
                    if (oIndex === selectedAnswer && oIndex !== correctAnswer) {
                        btn.classList.add('incorrect');
                    }
                    if (oIndex === selectedAnswer) {
                        btn.classList.add('selected'); 
                    }
                });
            });
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
                // Update: Replace the old record for this quiz with the new score
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
                const selectedAnswer = userAnswers[index];
                if (selectedAnswer === q.answer) {
                    correctCount++;
                }
            });
            
            // Apply visual feedback based on answers
            applyResultVisuals();

            const now = new Date();
            currentQuizResult = {
                name: quizName,
                rawLevelId: quizLevelRawId, 
                level: quizLevelDisplay, 
                score: `${correctCount}/${totalQuestions}`,
                percentage: Math.round((correctCount / totalQuestions) * 100),
                date: now.toLocaleDateString('en-US'), // e.g. "1/5/2026"
                time: now.toLocaleTimeString('en-US', { hour12: true }), // e.g. "2:32:05 PM"
                timestamp: now.toISOString() // machine-friendly
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
            
            // Re-render the quiz to re-enable all buttons and re-apply styling
            renderQuiz();
            
            submitButton().disabled = false;
            submitButton().classList.remove('opacity-50', 'cursor-not-allowed');
        }

        // Initialize on load
        window.onload = () => {
            // Default to Tagalog (tl) on load
            setLanguage('tl'); 
        };
    </script>

</body>
</html>
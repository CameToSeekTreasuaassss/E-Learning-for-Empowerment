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
    <title>Pagsusulit: This Is Where We Draw the Line! (Linear Functions)</title>
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
                <h1 class="text-4xl font-extrabold text-primary mb-2" id="quiz-title">Pagsusulit: This Is Where We Draw the Line! (Linear Functions)</h1>
                <p class="text-xl text-gray-600" id="quiz-subtitle">30 Items: Functions, Coordinate System, Slope, at Intercepts</p>
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

        // --- UI Text Translations ---
        const uiText = {
            'quizTitle': { tl: "Pagsusulit: This Is Where We Draw the Line! (Linear Functions)", en: "Quiz: This Is Where We Draw the Line! (Linear Functions)" },
            'quizSubtitle': { tl: "30 Items: Functions, Coordinate System, Slope, at Intercepts", en: "30 Items: Functions, Coordinate System, Slope, and Intercepts" },
            'goBack': { tl: 'Bumalik', en: 'Go Back' },
            'section1Title': { tl: 'I. Aralin 1: Make Relations Function (1 - 10)', en: 'I. Lesson 1: Make Relations Function (1 - 10)' },
            'section2Title': { tl: 'II. Aralin 2: Where are You Exactly? (Coordinate System) (11 - 20)', en: 'II. Lesson 2: Where are You Exactly? (Coordinate System) (11 - 20)' },
            'section3Title': { tl: 'III. Aralin 3: Watch Your Steep (Slope at Intercepts) (21 - 30)', en: 'III. Lesson 3: Watch Your Steep (Slope and Intercepts) (21 - 30)' },
            'submitButton': { tl: 'Tapusin at Tingnan ang Resulta', en: "Finish and View Results" },
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
            // Section I: Make Relations Function (1-10)
            // Q1: Function Definition (P.18)
            { question: { tl: "Ano ang tawag sa isang relasyon kung saan ang bawat miyembro sa unang grupo ay mayroong <b>isa at isa lamang</b> na katugma sa pangalawang grupo?", en: "What is the term for a relation where every member in the first group has <b>one and only one</b> match in the second group?" }, options: { tl: ["Relation", "Correspondence", "Function", "Ordered Pair"], en: ["Relation", "Correspondence", "Function", "Ordered Pair"] }, answer: 2, topic: 'Functions: Kahulugan' },
            // Q2: Ordered Pair Definition (P.17)
            { question: { tl: "Ano ang tawag sa bawat <b>pagpapares ng dalawang miyembro</b>, na nakasulat sa loob ng parenthesis (x, y)?", en: "What is the term for each <b>pairing of two members</b>, written inside parenthesis (x, y)?" }, options: { tl: ["Relation", "Function", "Ordered Pair", "Set"], en: ["Relation", "Function", "Ordered Pair", "Set"] }, answer: 2, topic: 'Functions: Terminolohiya' },
            // Q3: Many-to-One Function (P.19)
            { question: { tl: "Anong uri ng function ang nagpapakita na ang <b>dalawa o higit pang miyembro</b> ng unang grupo ay kumokonekta sa <b>iisa lamang</b> na miyembro sa pangalawang grupo?", en: "What type of function shows that <b>two or more members</b> of the first group connect to <b>only one</b> member in the second group?" }, options: { tl: ["One-to-One", "One-to-Many", "Many-to-One", "Many-to-Many"], en: ["One-to-One", "One-to-Many", "Many-to-One", "Many-to-Many"] }, answer: 2, topic: 'Functions: Uri' },
            // Q4: One-to-Many Correspondence (P.19)
            { question: { tl: "Ang relasyon na <b>Grandparent to Grandchildren</b> ay hindi isang function dahil ito ay anong uri ng correspondence?", en: "The relation <b>Grandparent to Grandchildren</b> is not a function because it is what type of correspondence?" }, options: { tl: ["One-to-Many", "Many-to-One", "One-to-One", "None"], en: ["One-to-Many", "Many-to-One", "One-to-One", "None"] }, answer: 0, topic: 'Functions: Uri' },
            // Q5: Function Evaluation (P.12 Pre-Assessment 2)
            { question: { tl: "Kung <b>x=5</b>, ano ang value ng <b>y=-3x+10</b>?", en: "If <b>x=5</b>, what is the value of <b>y=-3x+10</b>?" }, options: { tl: ["-5", "-4", "-3", "-2"], en: ["-5", "-4", "-3", "-2"] }, answer: 0, topic: 'Functions: Evaluation' }, 
            // Q6: Function Evaluation (P.21 Example 2)
            { question: { tl: "Ano ang <b>y-value</b> kung <b>x=-1</b> sa function na <b>f(x)=2x-1</b>?", en: "What is the <b>y-value</b> if <b>x=-1</b> in the function <b>f(x)=2x-1</b>?" }, options: { tl: ["-3", "-1", "1", "3"], en: ["-3", "-1", "1", "3"] }, answer: 0, topic: 'Functions: Evaluation' }, 
            // Q7: Function Evaluation (Modified Example)
            { question: { tl: "Hanapin ang <b>f(2)</b> kung <b>f(x)=5x-7</b>.", en: "Find <b>f(2)</b> if <b>f(x)=5x-7</b>." }, options: { tl: ["-2", "0", "3", "5"], en: ["-2", "0", "3", "5"] }, answer: 2, topic: 'Functions: Evaluation' }, 
            // Q8: Function Evaluation (Modified Example)
            { question: { tl: "Hanapin ang <b>f(-5)</b> kung <b>f(x)=4x+12</b>.", en: "Find <b>f(-5)</b> if <b>f(x)=4x+12</b>." }, options: { tl: ["-12", "-8", "0", "4"], en: ["-12", "-8", "0", "4"] }, answer: 1, topic: 'Functions: Evaluation' }, 
            // Q9: Linear Function (P.22)
            { question: { tl: "Anong tawag sa equation na nagreresulta sa <b>tuwid na linya</b> kapag na-plot sa Cartesian Plane?", en: "What is the term for an equation that results in a <b>straight line</b> when plotted on the Cartesian Plane?" }, options: { tl: ["Relation", "Curved Function", "Linear Function", "Polynomial"], en: ["Relation", "Curved Function", "Linear Function", "Polynomial"] }, answer: 2, topic: 'Functions: Linear' },
            // Q10: Evaluating Linear Function (Modified Example)
            { question: { tl: "Ang <b>growth rate</b> ng isang savings account ay <b>y=2x+15</b> (kung saan x ang years). Ilan ang y-value (total growth) pagkatapos ng 5 years?", en: "The <b>growth rate</b> of a savings account is <b>y=2x+15</b> (where x is years). What is the y-value (total growth) after 5 years?" }, options: { tl: ["20", "22", "24", "25"], en: ["20", "22", "24", "25"] }, answer: 3, topic: 'Functions: Application' }, 

            // Section II: Where are You Exactly? (Coordinate System) (11-20)
            // Q11: Cartesian Plane Definition (P.18)
            { question: { tl: "Ano ang tawag sa intersection ng <b>dalawang perpendicular number lines</b> (horizontal at vertical)? ", en: "What is the term for the intersection of <b>two perpendicular number lines</b> (horizontal and vertical)? " }, options: { tl: ["Axes", "Origin", "Rectangular Coordinate System", "Plane"], en: ["Axes", "Origin", "Rectangular Coordinate System", "Plane"] }, answer: 2, topic: 'Coordinate System: Kahulugan' },
            // Q12: Origin Definition (P.18)
            { question: { tl: "Ano ang tawag sa <b>intersection</b> ng x- at y-axes?", en: "What is the term for the <b>intersection</b> of the x- and y-axes?" }, options: { tl: ["Slope", "Axes", "Origin (0,0)", "Relation"], en: ["Slope", "Axes", "Origin (0,0)", "Relation"] }, answer: 2, topic: 'Coordinate System: Terminolohiya' },
            // Q13: Axes Definition (P.18)
            { question: { tl: "Ano ang tawag sa <b>horizontal at vertical number lines</b> sa Cartesian Plane?", en: "What is the term for the <b>horizontal and vertical number lines</b> on the Cartesian Plane?" }, options: { tl: ["Origin", "Coordinates", "Axes", "Plane"], en: ["Origin", "Coordinates", "Axes", "Plane"] }, answer: 2, topic: 'Coordinate System: Terminolohiya' },
            // Q14: Ordered Pair Movement (P.18)
            { question: { tl: "Ano ang <b>x-coordinate</b> sa ordered pair, na tumutukoy sa <b>horizontal movement</b>?", en: "What is the <b>x-coordinate</b> in the ordered pair, which refers to the <b>horizontal movement</b>?" }, options: { tl: ["y-coordinate", "First Number", "Second Number", "Origin"], en: ["y-coordinate", "First Number", "Second Number", "Origin"] }, answer: 1, topic: 'Coordinate System: Coordinates' },
            // Q15: Ordered Pair Movement (P.12 Pre-Assessment 4)
            { question: { tl: "Ang 'mula sa origin, <b>2 units left, 3 units up</b>' ay nagrerepresenta sa aling point?", en: "The movement 'from the origin, <b>2 units left, 3 units up</b>' represents which point?" }, options: { tl: ["(2, -3)", "(2, 3)", "(-2, 3)", "(-2, -3)"], en: ["(2, -3)", "(2, 3)", "(-2, 3)", "(-2, -3)"] }, answer: 2, topic: 'Coordinate System: Plotting' },
            // Q16: Ordered Pair Movement (P.12 Pre-Assessment 6)
            { question: { tl: "I-identify ang movement ng point <b>(-10, -3)</b>.", en: "Identify the movement of the point <b>(-10, -3)</b>." }, options: { tl: ["10 units left, 3 units up", "10 units left, 3 units down", "10 units right, 3 units up", "10 units right, 3 units down"], en: ["10 units left, 3 units up", "10 units left, 3 units down", "10 units right, 3 units up", "10 units right, 3 units down"] }, answer: 1, topic: 'Coordinate System: Plotting' },
            // Q17: Plotting Quadrant (P.29)
            { question: { tl: "Ang point na <b>(-4, 7)</b> ay matatagpuan sa aling Quadrant?", en: "The point <b>(-4, 7)</b> ay matatagpuan sa aling Quadrant? " }, options: { tl: ["Quadrant I", "Quadrant II", "Quadrant III", "Quadrant IV"], en: ["Quadrant I", "Quadrant II", "Quadrant III", "Quadrant IV"] }, answer: 1, topic: 'Coordinate System: Quadrants' }, 
            // Q18: Plotting Quadrant (P.29)
            { question: { tl: "Ang point na <b>(5, -9)</b> ay matatagpuan sa aling Quadrant?", en: "The point <b>(5, -9)</b> is located in which Quadrant?" }, options: { tl: ["Quadrant I", "Quadrant II", "Quadrant III", "Quadrant IV"], en: ["Quadrant I", "Quadrant II", "Quadrant III", "Quadrant IV"] }, answer: 3, topic: 'Coordinate System: Quadrants' }, 
            // Q19: Plotting on Axis (Modified Example)
            { question: { tl: "Ang point na <b>(0, -11)</b> ay matatagpuan sa aling axis?", en: "The point <b>(0, -11)</b> is located on which axis?" }, options: { tl: ["y-axis", "x-axis", "Origin", "Wala"], en: ["y-axis", "x-axis", "Origin", "None"] }, answer: 0, topic: 'Coordinate System: Axes' }, 
            // Q20: Linear Function Graph (P.33)
            { question: { tl: "Anong function ang <b>y=4</b> (walang x variable) at nagreresulta sa <b>horizontal line</b>?", en: "Which function <b>y=4</b> (without an x variable) results in a <b>horizontal line</b>?" }, options: { tl: ["Relation", "Curved Function", "Linear Function", "Polynomial"], en: ["Relation", "Curved Function", "Linear Function", "Polynomial"] }, answer: 2, topic: 'Coordinate System: Linear Graph' },

            // Section III: Watch Your Steep (Slope at Intercepts) (21-30)
            // Q21: Slope Definition (P.33)
            { question: { tl: "Ano ang tawag sa <b>sukat ng steepness</b> (pagkatarik) ng isang linya?", en: "What is the term for the <b>measure of steepness</b> of a line?" }, options: { tl: ["Slope", "Intercept", "Coordinate", "Axis"], en: ["Slope", "Intercept", "Coordinate", "Axis"] }, answer: 0, topic: 'Slope: Kahulugan' },
            // Q22: Slope Formula (P.33)
            { question: { tl: "Ano ang <b>formula</b> para sa slope (m) gamit ang dalawang points (x<b>1</b>,y<b>1</b>) at (x<b>2</b>,y<b>2</b>)?", en: "What is the <b>formula</b> for the slope (m) using two points (x<b>1</b>,y<b>1</b>) and (x<b>2</b>,y<b>2</b>)?" }, options: { tl: ["m = (y<b>1</b>-y<b>2</b>) / (x<b>2</b>-x<b>1</b>)", "m = (x<b>2</b>-x<b>1</b>) / (y<b>2</b>-y<b>1</b>)", "m = (y<b>2</b>-y<b>1</b>) / (x<b>2</b>-x<b>1</b>)", "m = (y<b>2</b>-y<b>1</b>) + (x<b>2</b>-x<b>1</b>)"], en: ["m = (y<b>1</b>-y<b>2</b>) / (x<b>2</b>-x<b>1</b>)", "m = (x<b>2</b>-x<b>1</b>) / (y<b>2</b>-y<b>1</b>)", "m = (y<b>2</b>-y<b>1</b>) / (x<b>2</b>-x<b>1</b>)", "m = (y<b>2</b>-y<b>1</b>) + (x<b>2</b>-x<b>1</b>)"] }, answer: 2, topic: 'Slope: Formula' },
            // Q23: Slope Calculation (P.13 Pre-Assessment 8)
            { question: { tl: "Hanapin ang <b>slope</b> ng line na naglalaman ng points <b>(0,1) at (3,-2)</b>?", en: "Find the <b>slope</b> of the line containing points <b>(0,1) and (3,-2)</b>?" }, options: { tl: ["0", "-1", "-2", "-3"], en: ["0", "-1", "-2", "-3"] }, answer: 1, topic: 'Slope: Calculation' }, 
            // Q24: Slope Trend - Negative (P.40)
            { question: { tl: "Ano ang <b>sign ng slope</b> kung ang linya ay <b>pababa</b> (downward) mula kaliwa papuntang kanan?", en: "What is the <b>sign of the slope</b> if the line is <b>downward</b> from left to right? " }, options: { tl: ["Zero", "Positive", "Negative", "Undefined"], en: ["Zero", "Positive", "Negative", "Undefined"] }, answer: 2, topic: 'Slope: Trend' },
            // Q25: Slope Trend - Zero (P.40)
            { question: { tl: "Ano ang <b>orientation</b> ng linya kung ang slope ay <b>zero</b>?", en: "What is the <b>orientation</b> ng linya kung ang slope ay <b>zero</b>?" }, options: { tl: ["Vertical", "Diagonal", "Curved", "Horizontal"], en: ["Vertical", "Diagonal", "Curved", "Horizontal"] }, answer: 3, topic: 'Slope: Trend' },
            // Q26: X-Intercept Definition (P.42)
            { question: { tl: "Ano ang tawag sa punto kung saan ang graph ay nagko-cross sa <b>x-axis</b>?", en: "What is the term for the point where the graph crosses the <b>x-axis</b>?" }, options: { tl: ["Vertex", "y-intercept", "Dot", "x-intercept"], en: ["Vertex", "y-intercept", "Dot", "x-intercept"] }, answer: 3, topic: 'Intercepts: Kahulugan' },
            // Q27: Y-Intercept Definition (P.42)
            { question: { tl: "Ano ang tawag sa punto kung saan ang graph ay nagko-cross sa <b>y-axis</b>?", en: "What is the term for the point where the graph crosses the <b>y-axis</b>?" }, options: { tl: ["y-intercept", "Vertex", "x-intercept", "Dot"], en: ["y-intercept", "Vertex", "x-intercept", "Dot"] }, answer: 0, topic: 'Intercepts: Kahulugan' },
            // Q28: X-Intercept Calculation (P.13 Pre-Assessment 13)
            { question: { tl: "Ano ang <b>x-intercept</b> ng <b>3x+2y=12</b>?", en: "What is the <b>x-intercept</b> of <b>3x+2y=12</b>?" }, options: { tl: ["(0, 3)", "(4, 0)", "(0, -3)", "(-4, 0)"], en: ["(0, 3)", "(4, 0)", "(0, -3)", "(-4, 0)"] }, answer: 1, topic: 'Intercepts: Calculation' }, 
            // Q29: Y-Intercept Calculation (P.13 Pre-Assessment 14)
            { question: { tl: "Hanapin ang <b>y-intercept</b> ng <b>2x-5y=20</b>?", en: "Find the <b>y-intercept</b> of <b>2x-5y=20</b>?" }, options: { tl: ["(0, -4)", "(0, 4)", "(4, 0)", "(-4, 0)"], en: ["(0, -4)", "(0, 4)", "(4, 0)", "(-4, 0)"] }, answer: 0, topic: 'Intercepts: Calculation' }, 
            // Q30: Slope Application (P.49 Example 4)
            { question: { tl: "Ang investment sa <b>Farmland</b> ay <b>y=1+2x</b> (positive slope) at <b>Car</b> ay <b>y=5-2x</b> (negative slope). Alin ang <b>better investment</b>?", en: "The investment in <b>Farmland</b> is <b>y=1+2x</b> (positive slope) and <b>Car</b> is <b>y=5-2x</b> (negative slope). Which is the <b>better investment</b>?" }, options: { tl: ["Car", "Farmland", "Pareho lang", "Wala"], en: ["Car", "Farmland", "The same", "None"] }, answer: 1, topic: 'Slope: Application' }, 
        ];

        let userAnswers = {}; // {qIndex: selectedOptionIndex}
        const quizName = "Pagsusulit: This Is Where We Draw the Line!";
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
        const modalTitle = () => document.getElementById('modal-title');
        const modalScoreText = () => document.getElementById('modal-score-text');
        const modalReviewText = () => document.getElementById('modal-review-text');
        const resetButtonModal = () => document.getElementById('reset-button-modal');

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
            let section1Content = ''; // Q1-Q10 
            let section2Content = ''; // Q11-20
            let section3Content = ''; // Q21-30

            // Separate HTML for the header/title of each card
            const sectionTitles = [
                `<div class="section-title">${uiText.section1Title[lang]}</div>`,
                `<div class="section-title">${uiText.section2Title[lang]}</div>`,
                `<div class="section-title">${uiText.section3Title[lang]}</div>`
            ];
            
            quizData.forEach((q, index) => {
                let optionsHtml = '';
                const selectedAnswer = userAnswers[index];
                
                // Use current language for options
                q.options[lang].forEach((option, oIndex) => {
                    const isSelected = selectedAnswer === oIndex;
                    const selectedClass = isSelected ? 'selected' : '';
                    const disabledAttr = submitButton() && submitButton().disabled ? 'disabled' : ''; // Check if button exists before checking disabled property

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
            if (submitButton() && submitButton().disabled) {
                applyResultVisuals();
            }
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
            
            const submitBtn = submitButton();
            if (submitBtn) submitBtn.textContent = uiText.submitButton[lang];
            
            // Modal elements
            if (modalTitle()) modalTitle().textContent = uiText.modalTitle[lang];
            if (modalScoreText()) modalScoreText().textContent = uiText.modalScoreText[lang];
            if (modalReviewText()) modalReviewText().textContent = uiText.modalReviewText[lang];
            
            const recordButtonLink = document.getElementById('record-button-link');
            if (recordButtonLink) recordButtonLink.textContent = uiText.recordButton[lang];
            
            if (resetButtonModal()) resetButtonModal().textContent = uiText.resetButton[lang];
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
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
    <title>Pagsusulit: Playing with Missing X's (Algebra)</title>
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
                <h1 class="text-4xl font-extrabold text-primary mb-2" id="quiz-title">Pagsusulit: Playing with Missing X's (Algebra)</h1>
                <p class="text-xl text-gray-600" id="quiz-subtitle">30 Items: Polynomials, Multiplication, Division, at Rational Expressions</p>
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
            'quizTitle': { tl: "Pagsusulit: Playing with Missing X's (Algebra)", en: "Quiz: Playing with Missing X's (Algebra)" },
            'quizSubtitle': { tl: "30 Items: Polynomials, Multiplication, Division, at Rational Expressions", en: "30 Items: Polynomials, Multiplication, Division, and Rational Expressions" },
            'goBack': { tl: 'Bumalik', en: 'Go Back' },
            'section1Title': { tl: 'I. Aralin 1: Polynomials: Kahulugan at Operations (1 - 10)', en: 'I. Lesson 1: Polynomials: Definition and Operations (1 - 10)' },
            'section2Title': { tl: 'II. Aralin 2: Multiplication at Division ng Polynomials (11 - 20)', en: 'II. Lesson 2: Multiplication and Division of Polynomials (11 - 20)' },
            'section3Title': { tl: 'III. Aralin 3: Rational Expressions (21 - 30)', en: 'III. Lesson 3: Rational Expressions (21 - 30)' },
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
            // Section I: Polynomials: Definition and Addition/Subtraction (Aralin 1) (1-10)
            // Q1: Definition of Polynomial (P.13, P.23)
            { 
                question: { tl: "Alin sa sumusunod ang isang <b>Polynomial</b>?", en: "Which of the following is a <b>Polynomial</b>?" }, 
                options: { tl: ["5x+1", "3x^-2+1 (may negative exponent)", "2/x-1 (may variable sa denominator)", "4\u221ax-10"], en: ["5x+1", "3x^-2+1 (has a negative exponent)", "2/x-1 (has a variable in the denominator)", "4\u221ax-10"] }, 
                answer: 0, topic: 'Polynomial: Kahulugan' 
            },
            // Q2: Monomial Definition (P.23)
            { 
                question: { tl: "Ilang terms mayroon ang isang <b>Monomial</b>?", en: "How many terms does a <b>Monomial</b> have?" }, 
                options: { tl: ["Wala", "Isa", "Dalawa", "Tatlo"], en: ["None", "One", "Two", "Three"] }, 
                answer: 1, topic: 'Polynomial: Klasipikasyon' 
            },
            // Q3: Binomial Definition (P.23)
            { 
                question: { tl: "Alin ang isang <b>Binomial</b>?", en: "Which is a <b>Binomial</b>?" }, 
                options: { tl: ["2x^2+x", "3x^2+x+1", "x^3+x-2", "4x^3"], en: ["2x^2+x", "3x^2+x+1", "x^3+x-2", "4x^3"] }, 
                answer: 0, topic: 'Polynomial: Klasipikasyon' 
            },
            // Q4: Trinomial Definition (P.23)
            { 
                question: { tl: "Anong tawag sa polynomial na mayroong eksaktong <b>tatlong terms</b>?", en: "What is the name for a polynomial that has exactly <b>three terms</b>?" }, 
                options: { tl: ["Trinomial", "Binomial", "Monomial", "Multinomial"], en: ["Trinomial", "Binomial", "Monomial", "Multinomial"] }, 
                answer: 0, topic: 'Polynomial: Klasipikasyon' 
            },
            // Q5: Degree of Polynomial Definition (P.25)
            { 
                question: { tl: "Ano ang tawag sa pinakamataas na <b>sum ng exponents</b> ng mga variables sa isang polynomial?", en: "What is the term for the highest <b>sum of exponents</b> of the variables in a polynomial?" }, 
                options: { tl: ["Degree", "Term", "Variable", "Coefficient"], en: ["Degree", "Term", "Variable", "Coefficient"] }, 
                answer: 0, topic: 'Polynomial: Terminolohiya' 
            },
            // Q6: Degree of Polynomial Calculation (P.25)
            { 
                question: { tl: "Ano ang <b>degree</b> ng polynomial na x^2y^3+x^4-2?", en: "What is the <b>degree</b> of the polynomial x^2y^3+x^4-2?" }, 
                options: { tl: ["2", "3", "4", "5"], en: ["2", "3", "4", "5"] }, 
                answer: 3, topic: 'Polynomial: Degree' 
            },
            // Q7: Sum of Polynomials (Pre-Assessment 7)
            { 
                question: { tl: "Ano ang <b>sum</b> ng (7x^2-4x+3)+(x^2+3x-2)?", en: "What is the <b>sum</b> of (7x^2-4x+3)+(x^2+3x-2)?" }, 
                options: { tl: ["8x^2+7x+1", "x^2-x+1", "x^2+7x+1", "8x^2-x+1"], en: ["8x^2+7x+1", "x^2-x+1", "x^2+7x+1", "8x^2-x+1"] }, 
                answer: 3, topic: 'Polynomial: Addition' 
            },
            // Q8: Difference of Polynomials (Pre-Assessment 8)
            { 
                question: { tl: "Hanapin ang <b>difference</b> ng (5x-3)-(2x+6)?", en: "Find the <b>difference</b> of (5x-3)-(2x+6)?" }, 
                options: { tl: ["3x+3", "3x-9", "7x-9", "7x+3"], en: ["3x+3", "3x-9", "7x-9", "7x+3"] }, 
                answer: 1, topic: 'Polynomial: Subtraction' 
            },
            // Q9: Sum of Polynomials (Modified Example)
            { 
                question: { tl: "Ano ang <b>sum</b> ng (x^3-2x+1)+(3x^2+5x+4)?", en: "What is the <b>sum</b> of (x^3-2x+1)+(3x^2+5x+4)?" }, 
                options: { tl: ["x^3+3x^2-7x+5", "x^3+3x^2-3x+5", "x^3+3x^2+3x+5", "4x^3+3x^2+3x+5"], en: ["x^3+3x^2-7x+5", "x^3+3x^2-3x+5", "x^3+3x^2+3x+5", "4x^3+3x^2+3x+5"] }, 
                answer: 2, topic: 'Polynomial: Addition' 
            },
            // Q10: Difference of Polynomials (Modified Example)
            { 
                question: { tl: "Hanapin ang <b>difference</b> ng (2x^2+8x-11)-(7x^2-5x+10)?", en: "Find the <b>difference</b> of (2x^2+8x-11)-(7x^2-5x+10)?" }, 
                options: { tl: ["9x^2+3x-1", "-5x^2+3x-1", "-5x^2+13x-21", "5x^2+13x-21"], en: ["9x^2+3x-1", "-5x^2+3x-1", "-5x^2+13x-21", "5x^2+13x-21"] }, 
                answer: 2, topic: 'Polynomial: Subtraction' 
            },

            // Section II: Multiplication and Division (Aralin 2) (11-20)
            // Q11: Product of Polynomials (P.38 Example 1)
            { 
                question: { tl: "Ano ang <b>product</b> ng (x)(x+5)?", en: "What is the <b>product</b> of (x)(x+5)?" }, 
                options: { tl: ["x^2+x", "x^2+5x", "x^2-5x", "5x^2+x"], en: ["x^2+x", "x^2+5x", "x^2-5x", "5x^2+x"] }, 
                answer: 1, topic: 'Polynomial: Multiplication' 
            },
            // Q12: Product of Polynomials (Pre-Assessment 10)
            { 
                question: { tl: "I-multiply ang (x-3) by (x+2)?", en: "Multiply (x-3) by (x+2)?" }, 
                options: { tl: ["x^2+x+6", "x^2-x+5", "x^2-x-6", "x^2-x-6"], en: ["x^2+x+6", "x^2-x+5", "x^2-x-6", "x^2-x-6"] }, 
                answer: 2, topic: 'Polynomial: Multiplication' 
            },
            // Q13: Product of Polynomials (Pre-Assessment 9)
            { 
                question: { tl: "Ano ang <b>product</b> ng x^2(x+3)?", en: "What is the <b>product</b> of x^2(x+3)?" }, 
                options: { tl: ["x^3-3x^2", "3x^2-x", "x^3+3x^2", "x+3x^2"], en: ["x^3-3x^2", "3x^2-x", "x^3+3x^2", "x+3x^2"] }, 
                answer: 2, topic: 'Polynomial: Multiplication' 
            },
            // Q14: Quotient of Polynomials by Monomial (P.33)
            { 
                question: { tl: "Ano ang <b>quotient</b> ng (6x+8) \u00f7 2?", en: "What is the <b>quotient</b> of (6x+8) \u00f7 2?" }, 
                options: { tl: ["12x+16", "12x+4", "3x+4", "3x+8"], en: ["12x+16", "12x+4", "3x+4", "3x+8"] }, 
                answer: 2, topic: 'Polynomial: Division (Monomial)' 
            },
            // Q15: Quotient of Polynomials by Monomial (P.33)
            { 
                question: { tl: "Ano ang <b>quotient</b> ng (10x-12) \u00f7 2?", en: "What is the <b>quotient</b> of (10x-12) \u00f7 2?" }, 
                options: { tl: ["20x-24", "20x+24", "5x-6", "5x+6"], en: ["20x-24", "20x+24", "5x-6", "5x+6"] }, 
                answer: 2, topic: 'Polynomial: Division (Monomial)' 
            },
            // Q16: Quotient of Polynomials by Monomial (P.34 Example)
            { 
                question: { tl: "Ano ang <b>quotient</b> ng (21x^4-15x^3-9x^2+30x) \u00f7 3x?", en: "What is the <b>quotient</b> of (21x^4-15x^3-9x^2+30x) \u00f7 3x?" }, 
                options: { tl: ["7x^3-5x^2-3x+10", "7x^4-5x^3-3x^2+10x", "7x^3-5x^2-3x+10", "7x^3+5x^2+3x-10"], en: ["7x^3-5x^2-3x+10", "7x^4-5x^3-3x^2+10x", "7x^3-5x^2-3x+10", "7x^3+5x^2+3x-10"] }, 
                answer: 2, topic: 'Polynomial: Division (Monomial)' 
            },
            // Q17: Quotient of Polynomials by Polynomial (P.37 Example 1)
            { 
                question: { tl: "I-divide ang (x^2+9x+20) by (x+5)?", en: "Divide (x^2+9x+20) by (x+5)?" }, 
                options: { tl: ["x+3", "x+4", "x+5", "x+6"], en: ["x+3", "x+4", "x+5", "x+6"] }, 
                answer: 1, topic: 'Polynomial: Division (Polynomial)' 
            },
            // Q18: Quotient of Polynomials by Polynomial (P.37 Example 1)
            { 
                question: { tl: "Ano ang <b>quotient</b> ng (x^2+7x+12) \u00f7 (x+3)?", en: "What is the <b>quotient</b> of (x^2+7x+12) \u00f7 (x+3)?" }, 
                options: { tl: ["x+3", "x+4", "x+5", "x+6"], en: ["x+3", "x+4", "x+5", "x+6"] }, 
                answer: 1, topic: 'Polynomial: Division (Polynomial)' 
            },
            // Q19: Product of Polynomials (Modified Example)
            { 
                question: { tl: "Ano ang <b>product</b> ng (x^2+1)(x-5)?", en: "What is the <b>product</b> of (x^2+1)(x-5)?" }, 
                options: { tl: ["x^3+5x^2+x-5", "x^3+5x^2-x-5", "x^3-5x^2+x-5", "x^3-5x^2-x+5"], en: ["x^3+5x^2+x-5", "x^3+5x^2-x-5", "x^3-5x^2+x-5", "x^3-5x^2-x+5"] }, 
                answer: 2, topic: 'Polynomial: Multiplication' 
            },
            // Q20: Product of Polynomials (Modified Example)
            { 
                question: { tl: "Ano ang <b>product</b> ng (3y-2)(2y+7)?", en: "What is the <b>product</b> of (3y-2)(2y+7)?" }, 
                options: { tl: ["6y^2+17y-14", "6y^2+17y+14", "6y^2+17y-14", "6y^2-17y+14"], en: ["6y^2+17y-14", "6y^2+17y+14", "6y^2+17y-14", "6y^2-17y+14"] }, 
                answer: 2, topic: 'Polynomial: Multiplication' 
            },

            // Section III: Rational Expressions (Aralin 3) (21-30)
            // Q21: Rational Expression Definition (P.58)
            { 
                question: { tl: "Ang <b>Rational Expression</b> ay isang fraction na ang <b>numerator at denominator</b> ay binubuo ng:", en: "A <b>Rational Expression</b> is a fraction whose <b>numerator and denominator</b> are composed of:" }, 
                options: { tl: ["Constants", "Variables", "Polynomials", "Integers"], en: ["Constants", "Variables", "Polynomials", "Integers"] }, 
                answer: 2, topic: 'Rational Expression: Kahulugan' 
            },
            // Q22: Similar Rational Expression Addition (P.59)
            { 
                question: { tl: "Ano ang <b>sum</b> ng (x+2)/x + (3x-5)/x?", en: "What is the <b>sum</b> of (x+2)/x + (3x-5)/x?" }, 
                options: { tl: ["(4x-3)/2x", "(4x+7)/x", "(4x-3)/x", "(3x+3)/x"], en: ["(4x-3)/2x", "(4x+7)/x", "(4x-3)/x", "(3x+3)/x"] }, 
                answer: 2, topic: 'Rational Expression: Addition (Similar)' 
            },
            // Q23: Similar Rational Expression Addition (Pre-Assessment 13)
            { 
                question: { tl: "Hanapin ang <b>sum</b> ng (x+3)/2 + (2x-3)/2?", en: "Find the <b>sum</b> of (x+3)/2 + (2x-3)/2?" }, 
                options: { tl: ["(3x-6)/2", "x/2", "(x-6)/2", "3x/2"], en: ["(3x-6)/2", "x/2", "(x-6)/2", "3x/2"] }, 
                answer: 3, topic: 'Rational Expression: Addition (Similar)' 
            },
            // Q24: Similar Rational Expression Subtraction (P.59)
            { 
                question: { tl: "Ano ang <b>difference</b> ng (5x+6)/(x-2) - (2x+1)/(x-2)?", en: "What is the <b>difference</b> of (5x+6)/(x-2) - (2x+1)/(x-2)?" }, 
                options: { tl: ["(7x+7)/(x-2)", "(7x+5)/(x-2)", "(3x+5)/(x-2)", "(3x+7)/(x-2)"], en: ["(7x+7)/(x-2)", "(7x+5)/(x-2)", "(3x+5)/(x-2)", "(3x+7)/(x-2)"] }, 
                answer: 2, topic: 'Rational Expression: Subtraction (Similar)' 
            },
            // Q25: Similar Rational Expression Subtraction (Pre-Assessment 14)
            { 
                question: { tl: "Ano ang <b>difference</b> ng (3x+14)/3 - (x+10)/3?", en: "What is the <b>difference</b> of (3x+14)/3 - (x+10)/3?" }, 
                options: { tl: ["(2x+24)/3", "(4x+4)/3", "(2x+4)/3", "(4x+24)/3"], en: ["(2x+24)/3", "(4x+4)/3", "(2x+4)/3", "(4x+24)/3"] }, 
                answer: 2, topic: 'Rational Expression: Subtraction (Similar)' 
            },
            // Q26: Dissimilar Rational Expression Addition (P.60)
            { 
                question: { tl: "Ano ang <b>sum</b> ng x/5 + x/3?", en: "What is the <b>sum</b> of x/5 + x/3?" }, 
                options: { tl: ["2x/15", "x^2/15", "8x/15", "x/8"], en: ["2x/15", "x^2/15", "8x/15", "x/8"] }, 
                answer: 2, topic: 'Rational Expression: Addition (Dissimilar)' 
            },
            // Q27: Dissimilar Rational Expression Subtraction (P.61)
            { 
                question: { tl: "Ano ang <b>difference</b> ng (x+1)/2 - x/5?", en: "What is the <b>difference</b> of (x+1)/2 - x/5?" }, 
                options: { tl: ["(x+5)/10", "(x-5)/10", "(3x+5)/10", "(3x-5)/10"], en: ["(x+5)/10", "(x-5)/10", "(3x+5)/10", "(3x-5)/10"] }, 
                answer: 2, topic: 'Rational Expression: Subtraction (Dissimilar)' 
            },
            // Q28: Rational Expression Application (P.64 Example 1)
            { 
                question: { tl: "Mang Abdul gave his daughter x^2/4 at sa anak na lalaki ay x^2/5. Ano ang <b>difference</b> ng area ng lupa?", en: "Mang Abdul gave his daughter x^2/4 and his son x^2/5. What is the <b>difference</b> in the area of the land?" }, 
                options: { tl: ["9x^2/20", "x^2/10", "x^2/5", "x^2/20"], en: ["9x^2/20", "x^2/10", "x^2/5", "x^2/20"] }, 
                answer: 3, topic: 'Rational Expression: Application' 
            },
            // Q29: Rational Expression Application (P.64 Example 2)
            { 
                question: { tl: "Nene kept x/2. Totoy's money x ay nabawasan ng 5, (x-5)/3 ang natira. Ano ang <b>total amount</b>?", en: "Nene kept x/2. Totoy's money x was reduced by 5, (x-5)/3 remains. What is the <b>total amount</b>?" }, 
                options: { tl: ["(5x-10)/6", "(5x+10)/6", "(5x-10)/6", "(5x+5)/6"], en: ["(5x-10)/6", "(5x+10)/6", "(5x-10)/6", "(5x+5)/6"] }, 
                answer: 0, topic: 'Rational Expression: Application' 
            }, // Sum is x/2 + (x-5)/3. LCD=6. (3x + 2(x-5))/6 = (5x-10)/6.
            // Q30: Rational Expression Application (P.64 Example 3)
            { 
                question: { tl: "Sina Apo Lilia at Manang Banak ay naghabi ng 2/5 at 1/4 ng tela. Ilan ang <b>total</b> na natapos nila?", en: "Apo Lilia and Manang Banak wove 2/5 and 1/4 of the cloth. What is the <b>total</b> amount they finished?" }, 
                options: { tl: ["3/20", "9/20", "13/20", "15/20"], en: ["3/20", "9/20", "13/20", "15/20"] }, 
                answer: 2, topic: 'Rational Expression: Application' 
            }
        ];

        let userAnswers = {}; // {qIndex: selectedOptionIndex}
        const quizName = "Pagsusulit: Playing with Missing X's";
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
            let section2Content = ''; // Q11-Q20 
            let section3Content = ''; // Q21-Q30 

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
            
            const goBackElement = document.querySelector('.absolute #go-back-text');
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
            // The record button text already includes the action
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
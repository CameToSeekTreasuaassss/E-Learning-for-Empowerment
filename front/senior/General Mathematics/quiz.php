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
    <title>Pagsusulit: General Mathematics</title>
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
                <h1 class="text-4xl font-extrabold text-primary mb-2" id="quiz-title">Pagsusulit: General Mathematics</h1>
                <p class="text-xl text-gray-600" id="quiz-subtitle">30 Items: Functions, Rational, Exponential, at Logarithmic</p>
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
            'quizTitle': { tl: "Pagsusulit: General Mathematics", en: "Quiz: General Mathematics" },
            'quizSubtitle': { tl: "30 Items: Functions, Rational, Exponential, at Logarithmic", en: "30 Items: Functions, Rational, Exponential, and Logarithmic" },
            'goBack': { tl: 'Bumalik', en: 'Go Back' },
            'section1Title': { tl: 'I. Functions at Operations (1 - 10)', en: 'I. Functions and Operations (1 - 10)' },
            'section2Title': { tl: 'II. Rational Functions (11 - 20)', en: 'II. Rational Functions (11 - 20)' },
            'section3Title': { tl: 'III. Exponential at Logarithmic Functions (21 - 30)', en: 'III. Exponential and Logarithmic Functions (21 - 30)' },
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
            // Section I: Functions at Operations (1 - 10)
            // Q1: Function Evaluation
            { 
                question: { tl: "I-evaluate ang function na f(x) = <b>4x + 5</b> kapag x = 2.", en: "Evaluate the function f(x) = <b>4x + 5</b> when x = 2." }, 
                options: { tl: ["9", "13", "15", "18"], en: ["9", "13", "15", "18"] }, 
                answer: 1, topic: 'Functions: Evaluation' 
            }, // 4(2) + 5 = 13
            // Q2: Addition of Functions
            { 
                question: { tl: "Hanapin ang (f+g)(x) kung f(x) = <b>x<sup>2</sup> - 3</b> at g(x) = <b>2x + 1</b>.", en: "Find (f+g)(x) if f(x) = <b>x<sup>2</sup> - 3</b> and g(x) = <b>2x + 1</b>." }, 
                options: { tl: ["x<sup>2</sup> + 2x + 4", "x<sup>2</sup> + 2x - 2", "x<sup>2</sup> - 2x + 4", "x<sup>2</sup> - 2"], en: ["x<sup>2</sup> + 2x + 4", "x<sup>2</sup> + 2x - 2", "x<sup>2</sup> - 2x + 4", "x<sup>2</sup> - 2"] }, 
                answer: 1, topic: 'Functions: Operations' 
            }, // x^2 + 2x - 2
            // Q3: Subtraction of Functions
            { 
                question: { tl: "Hanapin ang (g-f)(x) kung f(x) = <b>3x - 5</b> at g(x) = <b>5x + 1</b>.", en: "Find (g-f)(x) if f(x) = <b>3x - 5</b> and g(x) = <b>5x + 1</b>." }, 
                options: { tl: ["-2x + 6", "8x - 4", "2x + 6", "2x - 4"], en: ["-2x + 6", "8x - 4", "2x + 6", "2x - 4"] }, 
                answer: 2, topic: 'Functions: Operations' 
            }, // (5x+1) - (3x-5) = 2x + 6
            // Q4: Multiplication of Functions
            { 
                question: { tl: "I-multiply ang (f · g)(x) kung f(x) = <b>x+2</b> at g(x) = <b>x-3</b>.", en: "Multiply (f · g)(x) if f(x) = <b>x+2</b> at g(x) = <b>x-3</b>." }, 
                options: { tl: ["x<sup>2</sup> - 5x - 6", "x<sup>2</sup> + x - 6", "x<sup>2</sup> - x - 6", "x<sup>2</sup> - 6"], en: ["x<sup>2</sup> - 5x - 6", "x<sup>2</sup> + x - 6", "x<sup>2</sup> - x - 6", "x<sup>2</sup> - 6"] }, 
                answer: 2, topic: 'Functions: Operations' 
            }, // x^2 - x - 6
            // Q5: Division of Functions
            { 
                question: { tl: "Hanapin ang (f/g)(x) kung f(x) = <b>x<sup>2</sup> - 4</b> at g(x) = <b>x - 2</b>.", en: "Find (f/g)(x) if f(x) = <b>x<sup>2</sup> - 4</b> and g(x) = <b>x - 2</b>." }, 
                options: { tl: ["x<sup>2</sup>+2", "x-2", "x+2", "x+4"], en: ["x<sup>2</sup>+2", "x-2", "x+2", "x+4"] }, 
                answer: 2, topic: 'Functions: Operations' 
            }, // (x-2)(x+2) / (x-2) = x+2
            // Q6: Composition of Functions
            { 
                question: { tl: "Hanapin ang (f o g)(x) kung f(x) = <b>2x + 1</b> at g(x) = <b>x<sup>2</sup></b>.", en: "Find (f o g)(x) if f(x) = <b>2x + 1</b> and g(x) = <b>x<sup>2</sup></b>." }, 
                options: { tl: ["4x<sup>2</sup>+1", "x<sup>2</sup>+1", "2x<sup>2</sup>+1", "2x+x<sup>2</sup>"], en: ["4x<sup>2</sup>+1", "x<sup>2</sup>+1", "2x<sup>2</sup>+1", "2x+x<sup>2</sup>"] }, 
                answer: 2, topic: 'Functions: Composition' 
            }, // f(g(x)) = 2(x^2) + 1 = 2x^2 + 1
            // Q7: Composite Function Application
            { 
                question: { tl: "Kung ang function ng tax ay T(a) = <b>0.10a</b> (tax rate) at ang income ay I(x) = <b>300x</b> (x hours), hanapin ang (T o I)(x).", en: "If the tax function is T(a) = <b>0.10a</b> (tax rate) and the income function is I(x) = <b>300x</b> (x hours), find (T o I)(x)." }, 
                options: { tl: ["30x + 0.10", "300x - 0.10", "30x", "300x"], en: ["30x + 0.10", "300x - 0.10", "30x", "300x"] }, 
                answer: 2, topic: 'Functions: Composition' 
            }, // T(I(x)) = 0.10 * (300x) = 30x
            // Q8: Composite Function Evaluation
            { 
                question: { tl: "I-evaluate ang (g o f)(3) kung f(x) = <b>x - 1</b> at g(x) = <b>5x + 2</b>.", en: "Evaluate (g o f)(3) if f(x) = <b>x - 1</b> and g(x) = <b>5x + 2</b>." }, 
                options: { tl: ["10", "15", "12", "17"], en: ["10", "15", "12", "17"] }, 
                answer: 2, topic: 'Functions: Composition' 
            }, // f(3)=2. g(2)=5(2)+2 = 12
            // Q9: Piecewise Function Application
            { 
                question: { tl: "Ang fee ay P500 para sa <b>less than or equal to</b> 5 hours, at P50 sa bawat excess hour. Ano ang kabuuang fee para sa 7 hours?", en: "The fee is P500 for <b>less than or equal to</b> 5 hours, and P50 for every excess hour. What is the total fee for 7 hours?" }, 
                options: { tl: ["P500", "P550", "P600", "P650"], en: ["P500", "P550", "P600", "P650"] }, 
                answer: 2, topic: 'Functions: Piecewise' 
            }, // 500 + (7-5)*50 = 600
            // Q10: Domain of a Function
            { 
                question: { tl: "Ano ang domain ng f(x) = <b>1/(x-4)</b>?", en: "What is the domain of f(x) = <b>1/(x-4)</b>?" }, 
                options: { tl: ["Lahat ng real numbers", "Lahat ng real numbers maliban sa x=1", "Lahat ng real numbers maliban sa x=4", "Lahat ng positive real numbers"], en: ["All real numbers", "All real numbers except x=1", "All real numbers except x=4", "All positive real numbers"] }, 
                answer: 2, topic: 'Functions: Domain' 
            },

            // Section II: Rational Functions (11-20)
            // Q11: Rational Equation
            { 
                question: { tl: "Alin sa mga sumusunod ang halimbawa ng <b>rational equation</b>?", en: "Which of the following is an example of a <b>rational equation</b>?" }, 
                options: { tl: ["f(x) = x/(x<sup>2</sup>+1)", "(x+1)/2 <= x", "1/x + 3 = x/2", "x<sup>2</sup> + 5x + 6 = 0"], en: ["f(x) = x/(x<sup>2</sup>+1)", "(x+1)/2 <= x", "1/x + 3 = x/2", "x<sup>2</sup> + 5x + 6 = 0"] }, 
                answer: 2, topic: 'Rational: Equation' 
            }, 
            // Q12: Rational Inequality
            { 
                question: { tl: "Hanapin ang value ng x sa <b>x/3 - 1 < 0</b>.", en: "Find the value of x in <b>x/3 - 1 < 0</b>." }, 
                options: { tl: ["x > 3", "x < 3", "x = 3", "x <= 3"], en: ["x > 3", "x < 3", "x = 3", "x <= 3"] }, 
                answer: 1, topic: 'Rational: Inequality' 
            }, // x/3 < 1 -> x < 3
            // Q13: Solving Rational Equation
            { 
                question: { tl: "I-solve ang x sa <b>2/x + 1/2 = 1</b>.", en: "Solve for x in <b>2/x + 1/2 = 1</b>." }, 
                options: { tl: ["x=1", "x=2", "x=4", "x=8"], en: ["x=1", "x=2", "x=4", "x=8"] }, 
                answer: 2, topic: 'Rational: Equation' 
            }, // 2/x = 1 - 1/2 -> 2/x = 1/2 -> x = 4
            // Q14: Vertical Asymptote
            { 
                question: { tl: "Hanapin ang <b>vertical asymptote</b> ng f(x) = <b>(x+3)/(x-5)</b>.", en: "Find the <b>vertical asymptote</b> of f(x) = <b>(x+3)/(x-5)</b>." }, 
                options: { tl: ["x = 3", "x = -3", "x = 5", "x = -5"], en: ["x = 3", "x = -3", "x = 5", "x = -5"] }, 
                answer: 2, topic: 'Rational: Asymptotes' 
            }, // x-5 = 0 -> x=5
            // Q15: Horizontal Asymptote (n=m)
            { 
                question: { tl: "Hanapin ang <b>horizontal asymptote</b> ng f(x) = <b>(3x<sup>2</sup> - x)/(x<sup>2</sup> + 1)</b>.", en: "Find the <b>horizontal asymptote</b> of f(x) = <b>(3x<sup>2</sup> - x)/(x<sup>2</sup> + 1)</b>." }, 
                options: { tl: ["y = 0", "y = 1", "y = 3", "No H.A."], en: ["y = 0", "y = 1", "y = 3", "No H.A."] }, 
                answer: 2, topic: 'Rational: Asymptotes' 
            }, // ratio of leading coefficients: 3/1 = 3
            // Q16: Horizontal Asymptote (n<m)
            { 
                question: { tl: "Hanapin ang <b>horizontal asymptote</b> ng f(x) = <b>(x+1)/(x<sup>2</sup>+4)</b>.", en: "Find the <b>horizontal asymptote</b> of f(x) = <b>(x+1)/(x<sup>2</sup>+4)</b>." }, 
                options: { tl: ["y = 1", "y = 0", "y = 4", "No H.A."], en: ["y = 1", "y = 0", "y = 4", "No H.A."] }, 
                answer: 1, topic: 'Rational: Asymptotes' 
            }, // degree numerator < degree denominator -> y=0
            // Q17: Intercepts
            { 
                question: { tl: "Ano ang <b>x-intercept</b> ng f(x) = <b>(2x-4)/(x+1)</b>?", en: "What is the <b>x-intercept</b> of f(x) = <b>(2x-4)/(x+1)</b>?" }, 
                options: { tl: ["x = -1", "x = 1", "x = 2", "x = 4"], en: ["x = -1", "x = 1", "x = 2", "x = 4"] }, 
                answer: 2, topic: 'Rational: Intercepts' 
            }, // 2x-4 = 0 -> x=2
            // Q18: Intercepts
            { 
                question: { tl: "Ano ang <b>y-intercept</b> ng f(x) = <b>(3x+6)/(x-2)</b>?", en: "What is the <b>y-intercept</b> of f(x) = <b>(3x+6)/(x-2)</b>?" }, 
                options: { tl: ["y = 3", "y = 6", "y = 2", "y = -3"], en: ["y = 3", "y = 6", "y = 2", "y = -3"] }, 
                answer: 3, topic: 'Rational: Intercepts' 
            }, // f(0) = 6/-2 = -3
            // Q19: Domain
            { 
                question: { tl: "Ano ang <b>domain</b> ng rational function na f(x) = <b>x/(x<sup>2</sup>-9)</b>?", en: "What is the <b>domain</b> of the rational function f(x) = <b>x/(x<sup>2</sup>-9)</b>?" }, 
                options: { tl: ["{x | x \u2260 3}", "{x | x \u2260 9}", "{x | x \u2260 3 at x \u2260 -3}", "Lahat ng real numbers"], en: ["{x | x \u2260 3}", "{x | x \u2260 9}", "{x | x \u2260 3 and x \u2260 -3}", "All real numbers"] }, 
                answer: 2, topic: 'Rational: Domain' 
            }, // x^2-9 = 0 -> x = \u00b13
            // Q20: Slant Asymptote
            { 
                question: { tl: "Kailan nagkakaroon ng <b>slant asymptote</b> ang isang rational function f(x) = <b>p(x)/q(x)</b>?", en: "When does a rational function f(x) = <b>p(x)/q(x)</b> have a <b>slant asymptote</b>?" }, 
                options: { tl: ["Kapag ang degree ng p(x) ay mas mababa sa q(x)", "Kapag ang degree ng p(x) ay pareho sa q(x)", "Kapag ang degree ng p(x) ay eksaktong 1 higit sa degree ng q(x)", "Wala itong slant asymptote"], en: ["When the degree of p(x) is less than q(x)", "When the degree of p(x) is the same as q(x)", "When the degree of p(x) is exactly 1 greater than the degree of q(x)", "It has no slant asymptote"] }, 
                answer: 2, topic: 'Rational: Asymptotes' 
            },

            // Section III: Exponential and Logarithmic Functions (21-30)
            // Q21: Exponential Equation
            { 
                question: { tl: "Hanapin ang value ng x sa exponential equation na <b>2<sup>x</sup> = 32</b>.", en: "Find the value of x in the exponential equation <b>2<sup>x</sup> = 32</b>." }, 
                options: { tl: ["2", "3", "4", "5"], en: ["2", "3", "4", "5"] }, 
                answer: 3, topic: 'Exponential: Equation' 
            }, // 2^5 = 32
            // Q22: Exponential Inequality
            { 
                question: { tl: "Alin sa mga sumusunod ang <b>exponential inequality</b>?", en: "Which of the following is an <b>exponential inequality</b>?" }, 
                options: { tl: ["3<sup>x</sup> = 9", "f(x) = 5<sup>x</sup>", "4<sup>x</sup> > 16", "log<sub>2</sub> x = 8"], en: ["3<sup>x</sup> = 9", "f(x) = 5<sup>x</sup>", "4<sup>x</sup> > 16", "log<sub>2</sub> x = 8"] }, 
                answer: 2, topic: 'Exponential: Inequality' 
            }, 
            // Q23: Solving Exponential Inequality
            { 
                question: { tl: "I-solve ang x sa <b>3<sup>(x+1)</sup> \u2264 9</b>.", en: "Solve for x in <b>3<sup>(x+1)</sup> \u2264 9</b>." }, 
                options: { tl: ["x \u2265 1", "x \u2264 1", "x = 1", "Lahat ng real numbers"], en: ["x \u2265 1", "x \u2264 1", "x = 1", "All real numbers"] }, 
                answer: 1, topic: 'Exponential: Inequality' 
            }, // 3^(x+1) \u2264 3^2 -> x+1 \u2264 2 -> x \u2264 1
            // Q24: Domain of Exponential Function
            { 
                question: { tl: "Ano ang <b>domain</b> ng f(x) = <b>4<sup>x</sup></b>?", en: "What is the <b>domain</b> of f(x) = <b>4<sup>x</sup></b>?" }, 
                options: { tl: ["x > 0", "x < 0", "Lahat ng real numbers", "x \u2260 0"], en: ["x > 0", "x < 0", "All real numbers", "x \u2260 0"] }, 
                answer: 2, topic: 'Exponential: Domain' 
            }, // All real numbers
            // Q25: Exponential Function Graph
            { 
                question: { tl: "Kung ang base (b) sa f(x) = <b>b<sup>x</sup></b> ay mas malaki sa 1 (b>1), ang graph ay nagpapakita ng:", en: "If the base (b) in f(x) = <b>b<sup>x</sup></b> is greater than 1 (b>1), the graph shows: " }, 
                options: { tl: ["Exponential Decay", "Linear Growth", "Exponential Growth", "Parabolic Curve"], en: ["Exponential Decay", "Linear Growth", "Exponential Growth", "Parabolic Curve"] }, 
                answer: 2, topic: 'Exponential: Graph' 
            }, 
            // Q26: Logarithmic Form
            { 
                question: { tl: "Ano ang <b>logarithmic form</b> ng <b>4<sup>2</sup> = 16</b>?", en: "What is the <b>logarithmic form</b> of <b>4<sup>2</sup> = 16</b>?" }, 
                options: { tl: ["log<sub>16</sub> 4 = 2", "log<sub>2</sub> 16 = 4", "log<sub>4</sub> 16 = 2", "log<sub>4</sub> 2 = 16"], en: ["log<sub>16</sub> 4 = 2", "log<sub>2</sub> 16 = 4", "log<sub>4</sub> 16 = 2", "log<sub>4</sub> 2 = 16"] }, 
                answer: 2, topic: 'Logarithmic: Form' 
            }, // log_b (a) = x -> b^x = a
            // Q27: Logarithmic Evaluation
            { 
                question: { tl: "I-evaluate ang <b>log<sub>5</sub> 125</b>.", en: "Evaluate <b>log<sub>5</sub> 125</b>." }, 
                options: { tl: ["1", "2", "4", "3"], en: ["1", "2", "4", "3"] }, 
                answer: 3, topic: 'Logarithmic: Evaluation' 
            }, // 5^x = 125 -> x=3
            // Q28: Logarithmic Property (Change of Base)
            { 
                question: { tl: "Ayon sa <b>Change of Base formula</b>, ang log<sub>b</sub> x ay katumbas ng:", en: "According to the <b>Change of Base formula</b>, log<sub>b</sub> x is equal to:" }, 
                options: { tl: ["log x / log b", "x log b", "log (x - b)", "b log x"], en: ["log x / log b", "x log b", "log (x - b)", "b log x"] }, 
                answer: 0, topic: 'Logarithmic: Properties' 
            }, 
            // Q29: Logarithmic Equation
            { 
                question: { tl: "Hanapin ang x sa <b>log<sub>2</sub> x = 4</b>.", en: "Find x in <b>log<sub>2</sub> x = 4</b>." }, 
                options: { tl: ["8", "16", "18", "32"], en: ["8", "16", "18", "32"] }, 
                answer: 1, topic: 'Logarithmic: Equation' 
            }, // 2^4 = 16
            // Q30: Range of Logarithmic Function
            { 
                question: { tl: "Ano ang <b>range</b> ng logarithmic function na f(x) = <b>log<sub>b</sub> x</b>?", en: "What is the <b>range</b> of the logarithmic function f(x) = <b>log<sub>b</sub> x</b>?" }, 
                options: { tl: ["Lahat ng non-negative real numbers", "Lahat ng positive real numbers", "Lahat ng real numbers", "Lahat ng negative real numbers"], en: ["All non-negative real numbers", "All positive real numbers", "All real numbers", "All negative real numbers"] }, 
                answer: 2, topic: 'Logarithmic: Range' 
            },
        ];

        let userAnswers = {}; // {qIndex: selectedOptionIndex}
        const quizName = "Pagsusulit: General Mathematics";
        const quizLevelRawId = "seniorhigh"; // UPDATED
        const quizLevelDisplay = "Senior High"; // UPDATED

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
         * Updated: record both date and time (human-friendly) and an ISO timestamp.
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

            // --- 1. PREPARE THE RESULT OBJECT ---
            const now = new Date();
            currentQuizResult = {
                name: quizName,
                rawLevelId: quizLevelRawId, 
                level: quizLevelDisplay, 
                score: `${correctCount}/${totalQuestions}`,
                percentage: Math.round((correctCount / totalQuestions) * 100),
                // Human-friendly date and time plus ISO timestamp for unambiguous sorting/export
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
            
            // Re-enable and clear markings (Re-rendering handles this better)
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
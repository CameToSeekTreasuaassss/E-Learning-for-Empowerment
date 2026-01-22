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
    <title>Pagsusulit: So That's What Normal Is! (Estadistika)</title>
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
                <h1 class="text-4xl font-extrabold text-primary mb-2" id="quiz-title">Pagsusulit: So That's What Normal Is! (Estadistika)</h1>
                <p class="text-xl text-gray-600" id="quiz-subtitle">30 Items: Variables, Measures of Central Tendency, at Grouped Data</p>
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
            'quizTitle': { tl: "Pagsusulit: So That's What Normal Is! (Estadistika)", en: "Quiz: So That's What Normal Is! (Statistics)" },
            'quizSubtitle': { tl: "30 Items: Variables, Measures of Central Tendency, at Grouped Data", en: "30 Items: Variables, Measures of Central Tendency, and Grouped Data" },
            'goBack': { tl: 'Bumalik', en: 'Go Back' },
            'section1Title': { tl: 'I. Aralin 1: Sorting Through the Numbers (Variables at Data Types) (1 - 10)', en: 'I. Lesson 1: Sorting Through the Numbers (Variables and Data Types) (1 - 10)' },
            'section2Title': { tl: 'II. Aralin 2: Where is Normal? (Measures of Central Tendency) (11 - 20)', en: 'II. Lesson 2: Where is Normal? (Measures of Central Tendency) (11 - 20)' },
            'section3Title': { tl: 'III. Aralin 3: Let Me Show You (Graphs at FDT) (21 - 30)', en: 'III. Lesson 3: Let Me Show You (Graphs and FDT) (21 - 30)' },
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
        // Converted the original Tagalog data to dual-language structure.
        
        const quizData = [
            // Section I: Sorting Through the Numbers (Variables and Data Types) (1-10)
            // Q1: Variable Definition (P.17)
            { question: { tl: "Ano ang tawag sa isang katangian na maaaring magkaroon ng iba't ibang halaga, tulad ng Age o Birth Month?", en: "What is the term for a characteristic that can take on different values, such as Age or Birth Month?" }, options: { tl: ["Data", "Statistic", "Variable", "Constant"], en: ["Data", "Statistic", "Variable", "Constant"] }, answer: 2, topic: 'Variables: Kahulugan' },
            // Q2: Qualitative Variable Definition (P.17)
            { question: { tl: "Anong uri ng variable ang inilalagay sa iba't ibang <b>kategorya</b> at hindi numerikal, tulad ng Gender o Hair Color?", en: "What type of variable is placed in different <b>categories</b> and is non-numerical, such as Gender or Hair Color?" }, options: { tl: ["Quantitative", "Discrete", "Continuous", "Qualitative"], en: ["Quantitative", "Discrete", "Continuous", "Qualitative"] }, answer: 3, topic: 'Variables: Qualitative' },
            // Q3: Quantitative Variable Definition (P.17)
            { question: { tl: "Anong uri ng variable ang <b>numerikal</b> at maaaring isaayos o i-rank, tulad ng Age o Height?", en: "What type of variable is <b>numerical</b> and can be ordered or ranked, such as Age or Height?" }, options: { tl: ["Quantitative", "Discrete", "Continuous", "Qualitative"], en: ["Quantitative", "Discrete", "Continuous", "Qualitative"] }, answer: 0, topic: 'Variables: Quantitative' },
            // Q4: Continuous Variable Definition (P.19)
            { question: { tl: "Alin ang isang halimbawa ng <b>Continuous Variable</b>?", en: "Which is an example of a <b>Continuous Variable</b>?" }, options: { tl: ["Number of siblings", "Number of customers", "Height of a person", "Number of chairs in a room"], en: ["Number of siblings", "Number of customers", "Height of a person", "Number of chairs in a room"] }, answer: 2, topic: 'Variables: Continuous' },
            // Q5: Discrete Variable Definition (P.19)
            { question: { tl: "Alin ang isang halimbawa ng <b>Discrete Variable</b>?", en: "Which is an example of a <b>Discrete Variable</b>?" }, options: { tl: ["Height of a person", "Weight of palay", "Length of a lumber", "Number of customers"], en: ["Height of a person", "Weight of palay", "Length of a lumber", "Number of customers"] }, answer: 3, topic: 'Variables: Discrete' },
            // Q6: Ungrouped Data Definition (P.20)
            { question: { tl: "Ano ang tawag sa <b>raw data</b> na hindi pa organisado o naayos (unorganized list)?", en: "What is the term for <b>raw data</b> that is not yet organized or arranged (unorganized list)?" }, options: { tl: ["Grouped Data", "Frequency", "Ungrouped Data", "Array"], en: ["Grouped Data", "Frequency", "Ungrouped Data", "Array"] }, answer: 2, topic: 'Data: Grouping' },
            // Q7: Array Definition (P.20)
            { question: { tl: "Ano ang tawag sa ungrouped data na nakaayos mula <b>lowest to highest</b> o <b>highest to lowest</b>?", en: "What is the term for ungrouped data arranged from <b>lowest to highest</b> or <b>highest to lowest</b>?" }, options: { tl: ["Grouped Data", "Frequency", "Ungrouped Data", "Array"], en: ["Grouped Data", "Frequency", "Ungrouped Data", "Array"] }, answer: 3, topic: 'Data: Array' },
            // Q8: FDT Definition (P.22)
            { question: { tl: "Anong tawag sa table na naglalaman ng <b>classes</b> (ranges) at <b>frequencies</b>?", en: "What is the term for the table that contains <b>classes</b> (ranges) and <b>frequencies</b>?" }, options: { tl: ["Array", "Frequency Distribution Table (FDT)", "Histogram", "Ogive"], en: ["Array", "Frequency Distribution Table (FDT)", "Histogram", "Ogive"] }, answer: 1, topic: 'Data: FDT' },
            // Q9: FDT Term - Range (P.24)
            { question: { tl: "Ano ang <b>difference</b> sa pagitan ng <b>highest at lowest value</b> (H-L) sa isang data set?", en: "What is the <b>difference</b> between the <b>highest and lowest value</b> (H-L) in a data set?" }, options: { tl: ["Class Width", "Class Limit", "Frequency", "Range"], en: ["Class Width", "Class Limit", "Frequency", "Range"] }, answer: 3, topic: 'FDT: Terminolohiya' },
            // Q10: FDT Term - Class Width (P.24)
            { question: { tl: "Ano ang tawag sa <b>pagitan</b> (interval) ng values sa bawat Class (hal. 11-16) at nakukuha sa formula na R / # of classes?", en: "What is the term for the <b>interval</b> of values in each Class (e.g., 11-16) and is obtained using the formula R / # of classes?" }, options: { tl: ["Range", "Class Limit", "Frequency", "Class Width"], en: ["Range", "Class Limit", "Frequency", "Class Width"] }, answer: 3, topic: 'FDT: Terminolohiya' },

            // Section II: Where is Normal? (Measures of Central Tendency) (11-20)
            // Q11: Central Tendency Definition (P.26)
            { question: { tl: "Ano ang tawag sa single value na naglalarawan sa <b>sentro o gitnang posisyon</b> ng isang data set?", en: "What is the term for a single value that describes the <b>center or middle position</b> of a data set?" }, options: { tl: ["Range", "Statistic", "Measure of Central Tendency", "Descriptive Statistics"], en: ["Range", "Statistic", "Measure of Central Tendency", "Descriptive Statistics"] }, answer: 2, topic: 'Central Tendency: Kahulugan' },
            // Q12: Mean Definition (P.27)
            { question: { tl: "Anong measure ang nakukuha sa pamamagitan ng <b>pag-sum</b> ng data values at <b>pag-divide</b> sa bilang ng data values?", en: "What measure is obtained by <b>summing</b> the data values and <b>dividing</b> by the count of data values?" }, options: { tl: ["Mean", "Median", "Mode", "Range"], en: ["Mean", "Median", "Mode", "Range"] }, answer: 0, topic: 'Central Tendency: Mean' },
            // Q13: Median Definition (P.27)
            { question: { tl: "Anong measure ang <b>gitnang halaga</b> ng data array (pagkatapos ma-arrange)?", en: "What measure is the <b>middle value</b> of the data array (after being arranged)?" }, options: { tl: ["Mean", "Median", "Mode", "Range"], en: ["Mean", "Median", "Mode", "Range"] }, answer: 1, topic: 'Central Tendency: Median' },
            // Q14: Mode Definition (P.27)
            { question: { tl: "Anong measure ang halaga na <b>pinakamadalas lumabas</b> (occurs most often) sa isang data set?", en: "What measure is the value that <b>occurs most often</b> in a data set?" }, options: { tl: ["Mean", "Median", "Mode", "Range"], en: ["Mean", "Median", "Mode", "Range"] }, answer: 2, topic: 'Central Tendency: Mode' },
            // Q15: Calculation: Mean (Ungrouped) (P.38)
            { question: { tl: "Hanapin ang <b>Mean</b> ng 2, 7, 6, 2, 3, 4.", en: "Find the <b>Mean</b> of 2, 7, 6, 2, 3, 4." }, options: { tl: ["3.5", "4", "4.5", "5"], en: ["3.5", "4", "4.5", "5"] }, answer: 1, topic: 'Central Tendency: Calculation (Ungrouped)' }, // Sum = 24. 24/6 = 4.
            // Q16: Calculation: Median (Ungrouped - Even) (P.37)
            { question: { tl: "Hanapin ang <b>Median</b> ng 2, 3, 5, 6, 7, 7, 8, 10.", en: "Find the <b>Median</b> of 2, 3, 5, 6, 7, 7, 8, 10." }, options: { tl: ["6", "7", "6.5", "7.5"], en: ["6", "7", "6.5", "7.5"] }, answer: 2, topic: 'Central Tendency: Calculation (Ungrouped)' }, // Middle numbers are 6 & 7. (6+7)/2 = 6.5
            // Q17: Calculation: Mode (Ungrouped - Bimodal) (P.40 Example 2)
            { question: { tl: "Sa data set na 37, 49, 53, 61, 65, 74, 75, 77, 49, 53, 74, 75, 77, 49, 75, 49. Ano ang <b>Mode</b>?", en: "In the data set 37, 49, 53, 61, 65, 74, 75, 77, 49, 53, 74, 75, 77, 49, 75, 49. What is the <b>Mode</b>?" }, options: { tl: ["49", "75", "49 at 75", "Walang Mode"], en: ["49", "75", "49 and 75", "No Mode"] }, answer: 2, topic: 'Central Tendency: Calculation (Ungrouped)' }, // 49(4x), 75(4x)
            // Q18: Mode Classification (P.40)
            { question: { tl: "Kung may <b>dalawang values</b> na lumabas nang pinakamadalas sa data set, anong tawag sa mode?", en: "If there are <b>two values</b> that occur most often in the data set, what is the term for the mode?" }, options: { tl: ["Unimodal", "Bimodal", "Multimodal", "No Mode"], en: ["Unimodal", "Bimodal", "Multimodal", "No Mode"] }, answer: 1, topic: 'Central Tendency: Mode Classification' },
            // Q19: Median Class Definition (P.45)
            { question: { tl: "Anong tawag sa class interval na may <b>pinakamaliit na cumulative frequency</b> na $\\geq n/2$?", en: "What is the term for the class interval with the <b>smallest cumulative frequency</b> that is $\\geq n/2$?" }, options: { tl: ["Modal Class", "Median Class", "Upper Class Limit", "Class Boundary"], en: ["Modal Class", "Median Class", "Upper Class Limit", "Class Boundary"] }, answer: 1, topic: 'Central Tendency: Grouped Data Terms' },
            // Q20: Modal Class Definition (P.47)
            { question: { tl: "Anong tawag sa class interval na may <b>pinakamataas na frequency</b>?", en: "What is the term for the class interval with the <b>highest frequency</b>?" }, options: { tl: ["Modal Class", "Median Class", "Upper Class Limit", "Class Boundary"], en: ["Modal Class", "Median Class", "Upper Class Limit", "Class Boundary"] }, answer: 0, topic: 'Central Tendency: Grouped Data Terms' },

            // Section III: FDT and Graphs (Aralin 3) (21-30)
            // Q21: Graph Definition (P.56)
            { question: { tl: "Anong tawag sa visual illustration na ginagamit upang <b>i-organize, i-summarize, at i-describe</b> ang isang data set?", en: "What is the term for the visual illustration used to <b>organize, summarize, and describe</b> a data set?" }, options: { tl: ["Table", "Array", "Statistical Graph", "Frequency"], en: ["Table", "Array", "Statistical Graph", "Frequency"] }, answer: 2, topic: 'Statistical Graphs: Kahulugan' },
            // Q22: Pie Graph Use (P.57)
            { question: { tl: "Anong uri ng graph ang ginagamit upang ipakita ang <b>distribution ng frequencies</b> sa pagitan ng mga klase (hal. monthly expenses)?", en: "What type of graph is used to show the <b>distribution of frequencies</b> among classes (e.g., monthly expenses)? " }, options: { tl: ["Histogram", "Frequency Polygon", "Ogive", "Pie Graph"], en: ["Histogram", "Frequency Polygon", "Ogive", "Pie Graph"] }, answer: 3, topic: 'Statistical Graphs: Types' },
            // Q23: Histogram Use (P.59)
            { question: { tl: "Anong uri ng graph ang gumagamit ng <b>side-by-side vertical bars</b> (equal height to frequency) at ang horizontal axis ay <b>Class Boundaries</b>? ", en: "What type of graph uses <b>side-by-side vertical bars</b> (equal height to frequency) and the horizontal axis represents <b>Class Boundaries</b>? " }, options: { tl: ["Histogram", "Frequency Polygon", "Ogive", "Pie Graph"], en: ["Histogram", "Frequency Polygon", "Ogive", "Pie Graph"] }, answer: 0, topic: 'Statistical Graphs: Types' },
            // Q24: Frequency Polygon Use (P.62)
            { question: { tl: "Anong uri ng graph ang gumagamit ng <b>lines</b> na nagkokonekta sa mga puntos na naka-plot sa <b>midpoints</b> ng class? ", en: "What type of graph uses <b>lines</b> that connect points plotted at the <b>midpoints</b> of the class? " }, options: { tl: ["Histogram", "Frequency Polygon", "Ogive", "Pie Graph"], en: ["Histogram", "Frequency Polygon", "Ogive", "Pie Graph"] }, answer: 1, topic: 'Statistical Graphs: Types' },
            // Q25: Ogive Use (P.65)
            { question: { tl: "Anong uri ng graph ang nagpapakita ng <b>progression ng cumulative frequencies</b> (progression ng pagbabago ng datos) at ang horizontal axis ay <b>Class Boundaries</b>? ", en: "What type of graph shows the <b>progression of cumulative frequencies</b> (progression of data change) and the horizontal axis represents <b>Class Boundaries</b>? " }, options: { tl: ["Histogram", "Frequency Polygon", "Ogive", "Pie Graph"], en: ["Histogram", "Frequency Polygon", "Ogive", "Pie Graph"] }, answer: 2, topic: 'Statistical Graphs: Types' },
            // Q26: Graph Term - Legend (P.57)
            { question: { tl: "Anong tawag sa simbolo o teksto na naglalarawan sa <b>mga bahagi ng isang graph</b> (e.g. kulay ng slice sa pie graph)?", en: "What is the term for the symbol or text that describes the <b>parts of a graph</b> (e.g., color of a slice in a pie graph)?" }, options: { tl: ["Axis", "Title", "Legend", "Label"], en: ["Axis", "Title", "Legend", "Label"] }, answer: 2, topic: 'Statistical Graphs: Terminolohiya' },
            // Q27: Histogram/FDT Term - Class Boundaries (P.44)
            { question: { tl: "Ano ang tawag sa <b>halway points</b> na naghihiwalay sa bawat class interval (e.g., 10.5, 15.5)?", en: "What is the term for the <b>halfway points</b> that separate each class interval (e.g., 10.5, 15.5)?" }, options: { tl: ["Class Midpoint", "Class Limit", "Class Boundaries", "Class Width"], en: ["Class Midpoint", "Class Limit", "Class Boundaries", "Class Width"] }, answer: 2, topic: 'Statistical Graphs: Terminolohiya' },
            // Q28: Histogram/FDT Term - Class Midpoint (P.42)
            { question: { tl: "Ano ang tawag sa <b>average</b> ng lower at upper class limits ng bawat class interval?", en: "What is the term for the <b>average</b> of the lower and upper class limits of each class interval?" }, options: { tl: ["Class Midpoint/Class Mark", "Class Boundary", "Range", "Frequency"], en: ["Class Midpoint/Class Mark", "Class Boundary", "Range", "Frequency"] }, answer: 0, topic: 'Statistical Graphs: Terminolohiya' },
            // Q29: Pie Graph Calculation (P.57)
            { question: { tl: "Sa monthly expenses, <b>Food (50%) at Electricity (25%)</b> ang pinagsama. Ilang porsyento ang total?", en: "In monthly expenses, <b>Food (50%) and Electricity (25%)</b> are combined. What is the total percentage?" }, options: { tl: ["75%", "65%", "50%", "85%"], en: ["75%", "65%", "50%", "85%"] }, answer: 0, topic: 'Statistical Graphs: Calculation' }, // 50+25 = 75
            // Q30: Histogram Interpretation (P.60 Example 1)
            { question: { tl: "Sa histogram ng <b>Time Spent on Video Games</b>, aling age group ang may <b>pinakamataas na oras</b>?", en: "In the histogram of <b>Time Spent on Video Games</b>, which age group has the <b>highest hours</b>?" }, options: { tl: ["5-8", "9-12", "13-16", "17-20"], en: ["5-8", "9-12", "13-16", "17-20"] }, answer: 3, topic: 'Statistical Graphs: Interpretation' }, // 17-20 has frequency of 6, the highest.
        ];

        let userAnswers = {}; // {qIndex: selectedOptionIndex}
        const quizName = "Pagsusulit: So That's What Normal Is! (Estadistika)";
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
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
    <title id="main-title-tag">Pagsusulit: Statistics and Probability</title>
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
                <span class="font-semibold" data-translate="goBack">Bumalik</span>
            </a>
            
            <div class="text-center">
                <h1 class="text-4xl font-extrabold text-primary mb-2" data-translate="title" id="quiz-title-header">Pagsusulit: Statistics and Probability</h1>
                <p class="text-xl text-gray-600" data-translate="subtitle">30 Items: Random Variables, Distributions, at Hypothesis Testing</p>
            </div>

            <!-- Language Toggle Group (Centered under the title) -->
            <div class="flex justify-center mt-4 space-x-4" id="language-selector">
                <button id="lang-tl" 
                    class="language-toggle px-4 py-2 font-semibold rounded-lg transition duration-150 shadow-sm border-2" 
                    onclick="switchLanguage('tl')">Tagalog</button>
                <button id="lang-en" 
                    class="language-toggle px-4 py-2 font-semibold rounded-lg transition duration-150 shadow-sm border-2" 
                    onclick="switchLanguage('en')">English</button>
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
                    class="w-7/10 py-4 bg-primary text-white font-extrabold text-lg rounded-xl shadow-lg hover:bg-success transition duration-300 transform hover:scale-[1.01] focus:outline-none focus:ring-4 focus:ring-primary-light"
                    data-translate="submitButton">
                    Tapusin at Tingnan ang Resulta
                </button>
            </div>
        </div>

        <!-- Results Modal -->
        <div id="results-modal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-80 flex items-center justify-center p-4 z-50">
            <div class="bg-white card rounded-xl w-full max-w-md p-8 text-center shadow-2xl">
                <h2 class="text-3xl font-bold mb-4 text-primary" data-translate="modalTitle">Resulta ng Pagsusulit</h2>
                <p class="text-xl mb-6 text-gray-700" data-translate="modalScoreLabel">Nakakuha ka ng:</p>
                <div class="text-6xl font-extrabold mb-6" id="score-display"></div>
                
                <p class="text-sm text-gray-500 mb-6" data-translate="modalReview">Tingnan ang iyong mga sagot sa ibaba para matuto.</p>
                
                <div class="space-y-3">
                    <!-- Updated link text and simplified to follow the logic: save happens on submit, link navigation follows. -->
                    <a href="http://localhost/als/front/records.php" onclick="saveRecordToLocalStorage()" id="record-button-link"
                       class="block w-full py-3 bg-record-btn text-white font-bold text-lg rounded-lg shadow-md hover:bg-blue-600 transition duration-300 focus:outline-none focus:ring-4 focus:ring-blue-300"
                       data-translate="modalRecord">
                        I-record ang Resulta
                    </a>
                    <button onclick="resetQuiz()" id="reset-button-modal"
                        class="w-full py-3 bg-primary text-white font-bold text-lg rounded-lg shadow-md hover:bg-success transition duration-300 focus:outline-none focus:ring-4 focus:ring-primary-light"
                        data-translate="modalReset">
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
        const languageData = {
            'en': {
                'title': 'Quiz: Statistics and Probability',
                'subtitle': '30 Items: Random Variables, Distributions, and Hypothesis Testing',
                'goBack': 'Go Back',
                'submitButton': 'Finish and View Results',
                'section1Title': 'I. Random Variables and Probability Distribution (1 - 10)',
                'section2Title': 'II. Normal Curve and Z-scores (11 - 20)',
                'section3Title': 'III. Sampling and Hypothesis Testing (21 - 30)',
                'modalTitle': 'Quiz Results',
                'modalScoreLabel': 'You scored:',
                'modalReview': 'Review your answers below to learn.',
                'modalRecord': 'Record Result',
                'modalReset': 'Try Again',
                'alertMissing': (remaining) => `You need to answer ${remaining} more questions before submitting.`,
                'alertSaved': (name) => `Result for ${name} saved!`,
            },
            'tl': {
                'title': 'Pagsusulit: Statistics and Probability',
                'subtitle': '30 Items: Random Variables, Distributions, at Hypothesis Testing',
                'goBack': 'Bumalik',
                'submitButton': 'Tapusin at Tingnan ang Resulta',
                'section1Title': 'I. Random Variables at Probability Distribution (1 - 10)',
                'section2Title': 'II. Normal Curve at Z-scores (11 - 20)',
                'section3Title': 'III. Sampling at Hypothesis Testing (21 - 30)',
                'modalTitle': 'Resulta ng Pagsusulit',
                'modalScoreLabel': 'Nakakuha ka ng:',
                'modalReview': 'Tingnan ang iyong mga sagot sa ibaba para matuto.',
                'modalRecord': 'I-record ang Resulta',
                'modalReset': 'Subukan Muli',
                'alertMissing': (remaining) => `Kailangan mo pang sagutan ang ${remaining} na tanong bago mag-submit.`,
                'alertSaved': (name) => `Resulta para sa ${name} ay na-save!`,
            }
        };

        // --- QUIZ DATA (30 Items Total) ---
        // Using HTML entities for stability: \u03A3 (Sigma), \u03BC (Mu), \u03C3 (Sigma), \u2264 (<=), \u2265 (>=), \u2260 (!=), \u00b1 (plus/minus), \u03B1 (alpha), \u03B2 (beta)
        
        const quizData = [
            // Section I: Random Variables and Probability Distribution (LAS 3.1 - 3.9) (1-10)
            // Q1: Random Variable Definition (LAS 3.1)
            { 'question_tl': "Ano ang tawag sa variable na nag-a-associate ng real number sa bawat element sa sample space, at ang values ay dinetermina ng chance?", 'question_en': "What is the term for a variable that associates a real number with every element in the sample space, and whose values are determined by chance?", 'options': ["Sample Space", "Sample", "Random Variable", "Discrete Variable"], 'answer': 2, 'topic': 'Random Variable: Kahulugan' }, 
            // Q2: Discrete vs Continuous (LAS 3.2)
            { 'question_tl': "Alin sa mga sumusunod ang <b>Discrete</b> Random Variable?", 'question_en': "Which of the following is a <b>Discrete</b> Random Variable?", 'options': ["Speed ng kotse", "Taas ng tao", "Bilang ng mga kapatid sa pamilya", "Dami ng asukal sa kape"], 'answer': 2, 'topic': 'Random Variable: Uri' }, 
            // Q3: Discrete vs Continuous (LAS 3.2)
            { 'question_tl': "Alin sa mga sumusunod ang <b>Continuous</b> Random Variable?", 'question_en': "Which of the following is a <b>Continuous</b> Random Variable?", 'options': ["Bilang ng estudyanteng babae", "Bilang ng presidente", "Timbang ng bagong silang na sanggol", "Bilang ng depektibong produkto"], 'answer': 2, 'topic': 'Random Variable: Uri' }, 
            // Q4: Probability Distribution Property 1 (LAS 3.3)
            { 'question_tl': "Ano ang unang property ng Probability Distribution (P(X))? (Tandaan: Ang P(X) ay probability)", 'question_en': "What is the first property of the Probability Distribution (P(X))? (Note: P(X) is probability)", 'options': ["Ang sum P(X) = 1", "Ang P(X) ay laging \u2264 0", "Ang 0 \u2264 P(X) \u2264 1", "Ang P(X) = 1/n"], 'answer': 2, 'topic': 'Probability: Properties' }, 
            // Q5: Probability Distribution Property 2 (LAS 3.3)
            { 'question_tl': "Ano ang pangalawang property ng Probability Distribution?", 'question_en': "What is the second property of the Probability Distribution?", 'options': ["Ang P(X) = 0", "Ang Kabuuan (\u03A3) ng P(X) = 1", "Ang Kabuuan (\u03A3) ng P(X) > 1", "Ang P(X) = n"], 'answer': 1, 'topic': 'Probability: Properties' }, 
            // Q6: Probability Calculation (LAS 3.3)
            { 'question_tl': "Hanapin ang probability ng Getting an <b>odd number</b> sa isang single roll ng 6-sided die.", 'question_en': "Find the probability of Getting an <b>odd number</b> in a single roll of a 6-sided die.", 'options': ["1/6", "1/4", "1/2", "1/3"], 'answer': 2, 'topic': 'Probability: Calculation' }, 
            // Q7: Probability Calculation (LAS 3.3)
            { 'question_tl': "Hanapin ang probability ng Getting a <b>tail</b> sa pag-toss ng coin.", 'question_en': "Find the probability of Getting a <b>tail</b> in a coin toss.", 'options': ["1/3", "1/4", "1/2", "1"], 'answer': 2, 'topic': 'Probability: Calculation' }, 
            // Q8: Mean of Discrete RV (LAS 3.6)
            { 'question_tl': "Ano ang tawag sa average number of spots na lalabas sa roll ng die (3.5)?", 'question_en': "What is the term for the average number of spots that will appear in a die roll (3.5)?", 'options': ["Variance", "Standard Deviation", "Mean of the Random Variable", "Range"], 'answer': 2, 'topic': 'Probability: Mean' }, 
            // Q9: Interpretation of Mean (LAS 3.6)
            { 'question_tl': "Ang mean ng roll ng die ay 3.5. Ano ang ibig sabihin nito?", 'question_en': "The mean of the die roll is 3.5. What does this mean?", 'options': ["Ang die ay laging 3 o 4", "Ang 3.5 ay valid outcome", "Ang theoretical mean ay 3.5 kung maraming beses iro-roll", "Ang variance ay 3.5"], 'answer': 2, 'topic': 'Probability: Mean' }, 
            // Q10: Mean Calculation (LAS 3.6)
            { 'question_tl': "Ang probabilities na bibili ng 1, 2, 3, 4, o 5 items ay 0.1, 0.3, 0.3, 0.1, at 0.2. Ano ang average number of items na bibilhin? ", 'question_en': "The probabilities of buying 1, 2, 3, 4, or 5 items are 0.1, 0.3, 0.3, 0.1, and 0.2. What is the average number of items bought?" , 'options': ["2.5", "2.8", "3.1", "3.5"], 'answer': 2, 'topic': 'Probability: Mean Calculation' }, 

            // Section II: Normal Curve and Z-scores (LAS 3.10 - 3.15) (11-20)
            // Q11: Normal Curve Property 1 (LAS 3.10)
            { 'question_tl': "Alin ang TAMA tungkol sa Normal Probability Distribution?", 'question_en': "Which is TRUE about the Normal Probability Distribution? ", 'options': ["Ang curve ay asymmetrical", "Ang Mean, Median, at Mode ay hiwalay", "Ang area under the curve ay 0", "Ang distribution curve ay bell-shaped"], 'answer': 3, 'topic': 'Normal Curve: Properties' }, 
            // Q12: Normal Curve Property 3 (LAS 3.10)
            { 'question_tl': "Alin ang TAMA tungkol sa Normal Curve?", 'question_en': "Which is TRUE about the Normal Curve?", 'options': ["Ang standard deviation (\u03C3) ay 0", "Ang curve ay asymptotic sa y-axis", "Ang Mean, Median, at Mode ay nagco-coincide sa center", "Ang tails ng curve ay dumidikit sa horizontal axis"], 'answer': 2, 'topic': 'Normal Curve: Properties' },
            // Q13: Normal Curve Area (LAS 3.10)
            { 'question_tl': "Ang total area sa ilalim ng Normal Curve ay katumbas ng:", 'question_en': "The total area under the Normal Curve is equivalent to:", 'options': ["0.5", "0.95", "0.99", "1"], 'answer': 3, 'topic': 'Normal Curve: Area' },
            // Q14: Standard Normal Curve (LAS 3.11)
            { 'question_tl': "Ano ang Mean (\u03BC) at Standard Deviation (\u03C3) ng isang Standard Normal Curve?", 'question_en': "What is the Mean (\u03BC) and Standard Deviation (\u03C3) of a Standard Normal Curve?", 'options': ["Mean=1, SD=0", "Mean=0, SD=1", "Mean=0, SD=0", "Mean=1, SD=1"], 'answer': 1, 'topic': 'Normal Curve: Standard' },
            // Q15: Z-score Calculation (LAS 3.13)
            { 'question_tl': "Given: \u03BC=50, \u03C3=4. Hanapin ang <b>z-value</b> para sa X=58.", 'question_en': "Given: \u03BC=50, \u03C3=4. Find the <b>z-value</b> for X=58. ", 'options': ["1.5", "2", "2.5", "3"], 'answer': 1, 'topic': 'Normal Curve: Z-score' }, 
            // Q16: Z-score Calculation (LAS 3.13)
            { 'question_tl': "Given: \u03BC=62, \u03C3=8. Hanapin ang <b>z-value</b> para sa X=78.", 'question_en': "Given: \u03BC=62, \u03C3=8. Find the <b>z-value</b> for X=78.", 'options': ["1.75", "2.00", "2.50", "3.00"], 'answer': 1, 'topic': 'Normal Curve: Z-score' }, 
            // Q17: Area under NC (LAS 3.11/Table)
            { 'question_tl': "Hanapin ang Area na nagko-correspond sa <b>z = 1.00</b>.", 'question_en': "Find the Area corresponding to <b>z = 1.00</b>.", 'options': ["0.4772", "0.4500", "0.3413", "0.5000"], 'answer': 2, 'topic': 'Normal Curve: Area' }, 
            // Q18: Area between (LAS 3.12)
            { 'question_tl': "Hanapin ang Area of the region between <b>z=0 and z=3</b>.", 'question_en': "Find the Area of the region between <b>z=0 and z=3</b>.", 'options': ["0.4772", "0.4938", "0.4987", "0.5000"], 'answer': 2, 'topic': 'Normal Curve: Area' }, 
            // Q19: Probability greater than (LAS 3.14)
            { 'question_tl': "Hanapin ang Proportion above <b>z=1</b> (Area of z=1 is 0.3413).", 'question_en': "Find the Proportion above <b>z=1</b> (Area of z=1 is 0.3413).", 'options': ["0.1587", "0.3413", "0.5000", "0.8413"], 'answer': 0, 'topic': 'Normal Curve: Probability' }, 
            // Q20: Percentile (LAS 3.15)
            { 'question_tl': "Ang <b>90th percentile</b> ng normal curve ay tumutugma sa aling z-score?", 'question_en': "The <b>90th percentile</b> of the normal curve corresponds to which z-score?", 'options': ["z=1.00", "z=1.28", "z=1.645", "z=1.96"], 'answer': 2, 'topic': 'Normal Curve: Percentile' }, 

            // Section III: Sampling and Hypothesis Testing (LAS 3.16 - 4.3) (21-30)
            // Q21: Random Sampling (LAS 3.16)
            { 'question_tl': "Ano ang tawag sa probability distribution ng isang statistic na nakuha sa maraming samples mula sa isang population?", 'question_en': "What is the term for the probability distribution of a statistic obtained from many samples from a population?", 'options': ["Random Sample", "Population Distribution", "Sampling Distribution", "Standard Error"], 'answer': 2, 'topic': 'Sampling: Distribution' },
            // Q22: Parameter vs Statistic (LAS 3.17)
            { 'question_tl': "Ano ang tawag sa numero na nag-su-summarize ng data para sa buong <b>population</b>?", 'question_en': "What is the term for the number that summarizes data for the entire <b>population</b>?", 'options': ["Parameter", "Statistic", "Sample Mean", "Test Value"], 'answer': 0, 'topic': 'Sampling: Parameter' },
            // Q23: Parameter vs Statistic (LAS 3.17)
            { 'question_tl': "Ang Sample Mean (&overline;X) na nakuha sa isang subset ng population ay tinatawag na:", 'question_en': "The Sample Mean (&overline;X) obtained from a subset of the population is called a:", 'options': ["Parameter", "Statistic", "Test Statistic", "Hypothesis"], 'answer': 1, 'topic': 'Sampling: Statistic' }, 
            // Q24: Central Limit Theorem (CLT) (LAS 3.22)
            { 'question_tl': "Ano ang sinasabi ng <b>Central Limit Theorem (CLT)</b> tungkol sa sampling distribution ng means kapag malaki ang sample size (n)?", 'question_en': "What does the <b>Central Limit Theorem (CLT)</b> say about the sampling distribution of means when the sample size (n) is large?", 'options': ["Nagiging flat", "Nagiging skewed", "Nagiging Uniform", "Lumalapit sa Normal Distribution"], 'answer': 3, 'topic': 'Hypothesis: CLT' },
            // Q25: Null Hypothesis (LAS 4.1)
            { 'question_tl': "Ang H<sub>0</sub> (Null Hypothesis) ay isang statement na nagsasabing walang pagkakaiba sa pagitan ng parameter at specific value. Alin ang HINDI simbolo ng <b>H<sub>0</sub></b>?", 'question_en': "The H<sub>0</sub> (Null Hypothesis) is a statement that says there is no difference between the parameter and a specific value. Which is NOT a symbol of <b>H<sub>0</sub></b>?", 'options': ["\u2264 (less than or equal)", "\u2265 (greater than or equal)", "\u2260 (not equal to)", "="], 'answer': 2, 'topic': 'Hypothesis: Hypotheses' }, 
            // Q26: Alternative Hypothesis Directional (LAS 4.1)
            { 'question_tl': "Kapag ang H<sub>1</sub> (Alternative Hypothesis) ay gumagamit ng &lt; o &gt; symbol, ang test ay tinatawag na:", 'question_en': "When the H<sub>1</sub> (Alternative Hypothesis) uses the < or > symbol, the test is called a:", 'options': ["Non-directional", "Two-tailed", "Directional", "Critical"], 'answer': 2, 'topic': 'Hypothesis: Hypotheses' },
            // Q27: Type I Error (LAS 4.2)
            { 'question_tl': "Ano ang probability ng pag-reject sa isang <b>totoo/true na Null Hypothesis</b> (H<sub>0</sub>)?", 'question_en': "What is the probability of rejecting a <b>true Null Hypothesis</b> (H<sub>0</sub>)?", 'options': ["Type II Error (\u03B2)", "Type I Error (\u03B1)", "Correct Decision", "Level of Confidence"], 'answer': 1, 'topic': 'Hypothesis: Errors' }, 
            // Q28: Type II Error (LAS 4.2)
            { 'question_tl': "Ano ang probability ng pag-accept sa isang <b>false na Null Hypothesis</b> (H<sub>0</sub>)?", 'question_en': "What is the probability of accepting a <b>false Null Hypothesis</b> (H<sub>0</sub>)?", 'options': ["Type I Error (\u03B1)", "Type II Error (\u03B2)", "Correct Decision", "Level of Significance"], 'answer': 1, 'topic': 'Hypothesis: Errors' }, 
            // Q29: Critical Value (LAS 4.3)
            { 'question_tl': "Ano ang <b>critical values</b> para sa 95% Confidence Level (Two-tailed test)?", 'question_en': "What are the <b>critical values</b> for the 95% Confidence Level (Two-tailed test)? ", 'options': ["\u00b1 1.645", "\u00b1 1.96", "\u00b1 2.33", "\u00b1 2.58"], 'answer': 1, 'topic': 'Hypothesis: Critical Value' }, 
            // Q30: Test Statistic (LAS 4.4)
            { 'question_tl': "Ang formula para sa Test Statistic (z) ay ginagamit kapag ang sample size (n) ay mas malaki sa:", 'question_en': "The formula para sa Test Statistic (z) ay ginagamit kapag ang sample size (n) ay mas malaki sa:", 'options': ["10", "15", "20", "30"], 'answer': 3, 'topic': 'Hypothesis: Test Statistic' },
        ];

        let userAnswers = {}; // {qIndex: selectedOptionIndex}
        const quizName = "Pagsusulit: Statistics and Probability";
        const quizLevelRawId = "seniorhigh"; // SET TO SENIOR HIGH
        const quizLevelDisplay = "Senior High"; // SET TO SENIOR HIGH

        // Variable to hold the result temporarily before saving
        let currentQuizResult = null; 

        // --- DOM Elements ---
        const resultsModal = () => document.getElementById('results-modal');
        const submitButton = () => document.getElementById('submit-button');
        const scoreDisplay = () => document.getElementById('score-display');
        const customAlertBox = () => document.getElementById('custom-alert-box');
        const recordButtonLink = () => document.getElementById('record-button-link');

        /**
         * Switches the language and triggers UI updates.
         * @param {string} lang - 'en' or 'tl'.
         */
        function switchLanguage(lang) {
            currentLanguage = lang;
            document.documentElement.lang = lang; // Update HTML lang attribute
            updateStaticText();
            
            // Apply new Tailwind classes for active/inactive state
            const tlButton = document.getElementById('lang-tl');
            const enButton = document.getElementById('lang-en');

            [tlButton, enButton].forEach(btn => {
                const isActive = btn.id.includes(lang);
                
                // --- Active State (Primary) ---
                btn.classList.toggle('bg-primary', isActive);
                btn.classList.toggle('text-white', isActive);
                btn.classList.toggle('border-primary', isActive); 

                // --- Inactive State (Secondary/Gray) ---
                btn.classList.toggle('bg-gray-200', !isActive);
                btn.classList.toggle('text-gray-700', !isActive);
                btn.classList.toggle('border-gray-300', !isActive);
                btn.classList.toggle('hover:bg-gray-300', !isActive);
            });
            
            renderQuiz();
        }

        /**
         * Updates all static text elements in the UI.
         */
        function updateStaticText() {
            const lang = currentLanguage;
            const data = languageData[lang];
            
            // Update Title Tag
            const mainTitleTag = document.getElementById('main-title-tag');
            if (mainTitleTag) mainTitleTag.textContent = data.title;

            // Update all elements with data-translate attribute
            document.querySelectorAll('[data-translate]').forEach(el => {
                const key = el.getAttribute('data-translate');
                if (data[key]) {
                    el.textContent = data[key];
                }
            });
            
            // Special handling for the main quiz title which uses ID
            const quizTitleHeader = document.getElementById('quiz-title-header');
            if (quizTitleHeader) quizTitleHeader.textContent = data.title;
        }

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
            const quizContent = document.getElementById('quiz-content');
            const lang = currentLanguage;
            
            // Separate strings for content that will go inside the section cards
            let section1Content = ''; // Q1-Q10 
            let section2Content = ''; // Q11-20
            let section3Content = ''; // Q21-30

            const sectionTitles = [
                `<div class="section-title">${languageData[lang].section1Title}</div>`,
                `<div class="section-title">${languageData[lang].section2Title}</div>`,
                `<div class="section-title">${languageData[lang].section3Title}</div>`
            ];
            
            quizData.forEach((q, index) => {
                const questionText = q[`question_${lang}`] || q.question_tl; // Fallback to tl if en is missing
                const options = q.options; 
                let optionsHtml = '';
                const isSubmitted = submitButton() && submitButton().disabled;

                options.forEach((option, oIndex) => {
                    // Check if this option was previously selected to maintain state
                    const isSelected = userAnswers[index] === oIndex ? 'selected' : '';

                    optionsHtml += `
                        <button 
                            class="option-button w-full text-left text-lg py-3 px-4 bg-white rounded-lg text-gray-700 hover:bg-gray-50 focus:outline-none ${isSelected}"
                            onclick="selectAnswer(${index}, ${oIndex}, this)"
                            data-qindex="${index}" 
                            data-oindex="${oIndex}"
                            ${isSubmitted ? 'disabled' : ''}
                        >
                            <span class="font-medium mr-2">${String.fromCharCode(65 + oIndex)}.</span> ${option}
                        </button>
                    `;
                });

                // Generate the question structure
                const questionHtml = `
                    <div class="mb-8 border-b pb-6 last:border-b-0 last:pb-0">
                        <h3 class="text-xl lg:text-2xl font-semibold text-gray-800 mb-4">
                            <span class="text-gray-700 bg-gray-200 px-2 py-0.5 rounded-full mr-3 font-bold">${index + 1}.</span> ${questionText}
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
            
            // Reapply submission marks if quiz has already been submitted
            if (submitButton() && submitButton().disabled) {
                applySubmissionMarks();
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
         * Applies the correct/incorrect visual markings after submission.
         */
        function applySubmissionMarks() {
            quizData.forEach((q, index) => {
                const selectedAnswer = userAnswers[index];
                const correctAnswer = q.answer;
                
                const optionsContainer = document.getElementById(`options-q${index}`);
                if (!optionsContainer) return; // Skip if element not found

                const optionButtons = optionsContainer.querySelectorAll('.option-button');

                optionButtons.forEach((btn, oIndex) => {
                    btn.disabled = true;

                    // Correct answer is highlighted with 'correct' class
                    if (oIndex === correctAnswer) {
                        btn.classList.add('correct');
                    } else {
                        btn.classList.remove('correct');
                    }
                    
                    // Incorrectly selected answer is highlighted with 'incorrect' class
                    if (oIndex === selectedAnswer && oIndex !== correctAnswer) {
                        btn.classList.add('incorrect');
                    } else {
                        btn.classList.remove('incorrect');
                    }

                    if (oIndex === selectedAnswer) {
                        btn.classList.add('selected');
                    } else {
                        btn.classList.remove('selected');
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

            // Use translation for alert
            const alertMessage = languageData[currentLanguage].alertSaved(currentQuizResult.name);
            showAlert(alertMessage, 'success');
        }


        /**
         * Submits the quiz, calculates the score, and displays results.
         * Updated: record both date and time (human-friendly) and an ISO timestamp.
         */
        function submitQuiz() {
            const totalQuestions = quizData.length;
            const answeredCount = Object.keys(userAnswers).length;

            if (answeredCount < totalQuestions) {
                const remaining = totalQuestions - answeredCount;
                // Use translation for alert
                const alertMessage = languageData[currentLanguage].alertMissing(remaining);
                showAlert(alertMessage);
                return;
            }

            let correctCount = 0;

            quizData.forEach((q, index) => {
                const selectedAnswer = userAnswers[index];
                const correctAnswer = q.answer;
                
                if (selectedAnswer === correctAnswer) {
                    correctCount++;
                }
            });

            // Apply visual marks and disable buttons
            applySubmissionMarks();


            // --- 1. PREPARE THE RESULT OBJECT ---
            const now = new Date();
            currentQuizResult = {
                name: languageData.tl.title, // Use TL title as permanent name for consistency
                rawLevelId: quizLevelRawId, 
                level: quizLevelDisplay, 
                score: `${correctCount}/${totalQuestions}`,
                percentage: Math.round((correctCount / totalQuestions) * 100),
                // Human-friendly date and time plus ISO timestamp for unambiguous sorting/export
                date: now.toLocaleDateString('en-US'),
                time: now.toLocaleTimeString('en-US'),
                dateTime: now.toISOString()
            };
            
            // --- 2. IMMEDIATELY SAVE THE RESULT TO DUAL STORAGE (UPSERT) ---
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
            const allButtons = document.querySelectorAll('.option-button');
            allButtons.forEach(btn => {
                btn.disabled = false;
                btn.classList.remove('selected', 'correct', 'incorrect');
            });
            
            submitButton().disabled = false;
            submitButton().classList.remove('opacity-50', 'cursor-not-allowed');

            // Re-render to ensure correct translations and state persistence
            renderQuiz();
        }
        
        // --- Event Listener for Initialization ---
        document.addEventListener('DOMContentLoaded', () => {
            // Set Tagalog as default and render the quiz
            switchLanguage('tl'); 

            // Add redundant save handler for the record link (safety net)
            const recordLink = recordButtonLink();
            if (recordLink) {
                recordLink.addEventListener('click', (e) => {
                    // The submitQuiz already calls saveRecordToLocalStorage().
                });
            }
        });

    </script>

</body>
</html>
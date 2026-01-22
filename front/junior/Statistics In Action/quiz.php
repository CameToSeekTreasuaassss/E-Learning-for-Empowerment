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
    <title>Pagsusulit: Statistics in Action</title>
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
                <h1 class="text-4xl font-extrabold text-primary mb-2" id="quiz-title">Pagsusulit: Statistics in Action</h1>
                <p class="text-xl text-gray-600" id="quiz-subtitle">30 Items: Sampling, Techniques, at Survey Analysis</p>
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
            'quizTitle': { tl: "Pagsusulit: Statistics in Action", en: "Quiz: Statistics in Action" },
            'quizSubtitle': { tl: "30 Items: Sampling, Techniques, at Survey Analysis", en: "30 Items: Sampling, Techniques, and Survey Analysis" },
            'goBack': { tl: 'Bumalik', en: 'Go Back' },
            'section1Title': { tl: 'I. Aralin 1: Sampling at Mga Error (1 - 10)', en: 'I. Lesson 1: Sampling and Errors (1 - 10)' },
            'section2Title': { tl: 'II. Aralin 2: Sampling Techniques (11 - 20)', en: 'II. Lesson 2: Sampling Techniques (11 - 20)' },
            'section3Title': { tl: 'III. Aralin 3: Survey Application at Analysis (21 - 30)', en: 'III. Lesson 3: Survey Application and Analysis (21 - 30)' },
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
            // Section I: Sampling and Errors (1-10)
            // Q1: Population vs Sample (A.1)
            { question: { tl: "Ang isang <b>Population</b> ba ay bahagi ng <b>Sample</b>?", en: "Is a <b>Population</b> part of a <b>Sample</b>?" }, options: { tl: ["Oo", "Hindi, ang sample ang bahagi ng population", "Pareho lang sila", "Depende sa pag-aaral"], en: ["Yes", "No, the sample is part of the population", "They are the same", "Depends on the study"] }, answer: 1, topic: 'Sampling: Kahulugan' },
            // Q2: Statistic Definition (A.2)
            { question: { tl: "Ano ang tawag sa katangian (characteristic) na nakukuha mula sa isang <b>Sample</b>?", en: "What is the term for the characteristic obtained from a <b>Sample</b>?" }, options: { tl: ["Parameter", "Bias", "Statistic", "Census"], en: ["Parameter", "Bias", "Statistic", "Census"] }, answer: 2, topic: 'Sampling: Kahulugan' },
            // Q3: Parameter Definition
            { question: { tl: "Ano ang tawag sa katangian (characteristic) na nakukuha mula sa isang <b>Population</b>?", en: "What is the term for the characteristic obtained from a <b>Population</b>?" }, options: { tl: ["Statistic", "Bias", "Census", "Parameter"], en: ["Statistic", "Bias", "Census", "Parameter"] }, answer: 3, topic: 'Sampling: Kahulugan' },
            // Q4: Representative Sample Size (A.3, P.8)
            { question: { tl: "Ang sample size na <b>sapat at representative</b> ng population ay dapat may bilang na:", en: "A sample size that is <b>adequate and representative</b> of the population should have a count of:" }, options: { tl: ["15", "Mas mababa sa 30", "30 o higit pa", "Dapat laging 100"], en: ["15", "Less than 30", "30 or more", "Must always be 100"] }, answer: 2, topic: 'Sampling: Sample Size' },
            // Q5: Sampling Use (P.8)
            { question: { tl: "Bakit ginagamit ang <b>Sampling</b> sa pag-aaral o survey?", en: "Why is <b>Sampling</b> used in studies or surveys?" }, options: { tl: ["Para laging tumama ang hula", "Para laging lumabas ang Median", "Para makatipid sa oras, pera, at pagsisikap", "Para mas malaki ang Mean"], en: ["To always guess correctly", "To always get the Median", "To save time, money, and effort", "To get a larger Mean"] }, answer: 2, topic: 'Sampling: Gamit' },
            // Q6: Random Sampling Error (A.5)
            { question: { tl: "Aling uri ng error ang <b>palaging nagaganap</b> sa lahat ng pag-aaral na gumagamit ng sampling?", en: "Which type of error <b>always occurs</b> in all studies that use sampling? " }, options: { tl: ["Bias", "Random Sampling Error", "Faulty Selection Error", "Estimation Error"], en: ["Bias", "Random Sampling Error", "Faulty Selection Error", "Estimation Error"] }, answer: 1, topic: 'Sampling: Error' },
            // Q7: Bias Error (P.9)
            { question: { tl: "Aling uri ng error ang nangyayari kapag ang researcher ay <b>nagkamali sa pagpili ng sample</b> at hindi ito representative (hal. pinili lang ang mayayaman)?", en: "Which type of error occurs when the researcher <b>makes a mistake in selecting the sample</b> and it is not representative (e.g., only selecting the rich)? " }, options: { tl: ["Random Sampling Error", "Estimation Error", "Systematic Error", "Bias"], en: ["Random Sampling Error", "Estimation Error", "Systematic Error", "Bias"] }, answer: 3, topic: 'Sampling: Error' },
            // Q8: Sample Size vs Error (A.4)
            { question: { tl: "Kung <b>mas malaki ang Sample Size</b>, ano ang nangyayari sa Random Sampling Error?", en: "If the <b>Sample Size is larger</b>, what happens to the Random Sampling Error?" }, options: { tl: ["Mas lumalaki", "Pareho lang", "Mas lumiliit", "Nawawala"], en: ["It increases", "It remains the same", "It decreases", "It disappears"] }, answer: 2, topic: 'Sampling: Error' },
            // Q9: Statistic vs Parameter (A.4)
            { question: { tl: "Kung ang <b>Statistic</b> ay P4,700 at ang <b>Parameter</b> ay P5,000, ano ang Sampling Error?", en: "If the <b>Statistic</b> is P4,700 and the <b>Parameter</b> is P5,000, what is the Sampling Error?" }, options: { tl: ["P4,700", "P5,000", "P300", "P9,700"], en: ["P4,700", "P5,000", "P300", "P9,700"] }, answer: 2, topic: 'Sampling: Error Calculation' }, // 5000 - 4700 = 300
            // Q10: Population vs Sample (P.6)
            { question: { tl: "Sa pag-aaral ng average monthly income, kung pipiliin mo ang <b>lahat ng residente ng isang probinsya</b>, ito ay tinatawag na:", en: "In a study of average monthly income, if you select <b>all residents of a province</b>, this is called a:" }, options: { tl: ["Sample", "Population", "Statistic", "Cluster"], en: ["Sample", "Population", "Statistic", "Cluster"] }, answer: 1, topic: 'Sampling: Kahulugan' },

            // Section II: Sampling Techniques (11-20)
            // Q11: Simple Random Sampling (P.15)
            { question: { tl: "Aling technique ang nagbibigay ng <b>pantay na pagkakataon</b> (equal chance) sa bawat miyembro na mapili (hal. draw lots)?", en: "Which technique gives <b>equal chance</b> to every member to be selected (e.g., draw lots)? " }, options: { tl: ["Systematic Random", "Simple Random", "Stratified Random", "Accidental"], en: ["Systematic Random", "Simple Random", "Stratified Random", "Accidental"] }, answer: 1, topic: 'Technique: Probability' },
            // Q12: Systematic Random Sampling (P.15)
            { question: { tl: "Aling technique ang gumagamit ng <b>number</b> para sistematikong pumili ng sample (hal. every 5th name)?", en: "Which technique uses a <b>number</b> to systematically select a sample (e.g., every 5th name)? " }, options: { tl: ["Simple Random", "Systematic Random", "Cluster Sampling", "Purposive"], en: ["Simple Random", "Systematic Random", "Cluster Sampling", "Purposive"] }, answer: 1, topic: 'Technique: Probability' },
            // Q13: Stratified Random Sampling (P.16)
            { question: { tl: "Aling technique ang naghahati sa populasyon sa <b>strata (subgroups na may common trait)</b> at pumipili nang proportionate?", en: "Which technique divides the population into <b>strata (subgroups with common traits)</b> and selects samples proportionately? " }, options: { tl: ["Simple Random", "Systematic Random", "Stratified Random", "Cluster Sampling"], en: ["Simple Random", "Systematic Random", "Stratified Random", "Cluster Sampling"] }, answer: 2, topic: 'Technique: Probability' },
            // Q14: Cluster Sampling (P.17)
            { question: { tl: "Aling technique ang naghahati sa populasyon sa <b>clusters (subgroups na walang common trait)</b> at pumipili sa clusters bilang grupo?", en: "Which technique divides the population into <b>clusters (subgroups without common traits)</b> and selects the clusters as a group? " }, options: { tl: ["Stratified Random", "Quota Sampling", "Cluster Sampling", "Purposive Sampling"], en: ["Stratified Random", "Quota Sampling", "Cluster Sampling", "Purposive Sampling"] }, answer: 2, topic: 'Technique: Probability' },
            // Q15: Accidental Sampling (P.20)
            { question: { tl: "Aling technique ang pumipili ng sample batay sa <b>convenience at accessibility</b> (hal. kapitbahay) dahil sa limitadong oras at pera?", en: "Which technique selects a sample based on <b>convenience and accessibility</b> (e.g., neighbors) due to limited time and money?" }, options: { tl: ["Quota Sampling", "Purposive Sampling", "Accidental/Incidental", "Simple Random"], en: ["Quota Sampling", "Purposive Sampling", "Accidental/Incidental", "Simple Random"] }, answer: 2, topic: 'Technique: Non-Probability' },
            // Q16: Quota Sampling (P.20)
            { question: { tl: "Aling technique ang naghahati sa populasyon sa strata at pumipili ng sample batay sa <b>convenience</b> (hindi random) para punan ang quota?", en: "Which technique divides the population into strata and selects a sample based on <b>convenience</b> (not randomly) to fill a quota?" }, options: { tl: ["Stratified Random", "Quota Sampling", "Cluster Sampling", "Purposive Sampling"], en: ["Stratified Random", "Quota Sampling", "Cluster Sampling", "Purposive Sampling"] }, answer: 1, topic: 'Technique: Non-Probability' },
            // Q17: Purposive Sampling (P.21)
            { question: { tl: "Aling technique ang pumipili ng sample batay sa <b>tiyak na katangian o 'traits'</b> na kailangan sa pag-aaral (selection criterion)?", en: "Which technique selects a sample based on <b>specific characteristics or 'traits'</b> needed for the study (selection criterion)?" }, options: { tl: ["Quota Sampling", "Accidental Sampling", "Purposive Sampling", "Cluster Sampling"], en: ["Quota Sampling", "Accidental Sampling", "Purposive Sampling", "Cluster Sampling"] }, answer: 2, topic: 'Technique: Non-Probability' },
            // Q18: Technique for Large Population (P.17)
            { question: { tl: "Ang pinakamahusay na probability technique para sa <b>malaking populasyon</b> kung imposible ang listahan ay:", en: "The best probability technique for a <b>large population</b> when a list is impossible is:" }, options: { tl: ["Simple Random", "Systematic Random", "Stratified Random", "Cluster Sampling"], en: ["Simple Random", "Systematic Random", "Stratified Random", "Cluster Sampling"] }, answer: 3, topic: 'Technique: Pagpili' },
            // Q19: Technique for Gender Equality (P.18)
            { question: { tl: "Sa pag-aaral ng Gender Equality (lalaki vs babae), ang pinakamahusay na probability technique para maiwasan ang bias ay:", en: "In a study of Gender Equality (male vs female), the best probability technique to avoid bias is:" }, options: { tl: ["Simple Random", "Stratified Random", "Accidental", "Purposive"], en: ["Simple Random", "Stratified Random", "Accidental", "Purposive"] }, answer: 1, topic: 'Technique: Pagpili' },
            // Q20: Technique for Small Population (P.15)
            { question: { tl: "Ang pinakamahusay na probability technique para sa <b>maliit na populasyon</b> (at may listahan) ay:", en: "The best probability technique for a <b>small population</b> (with a list) is:" }, options: { tl: ["Simple Random", "Systematic Random", "Cluster Sampling", "Quota Sampling"], en: ["Simple Random", "Systematic Random", "Cluster Sampling", "Quota Sampling"] }, answer: 0, topic: 'Technique: Pagpili' },

            // Section III: Survey Application and Analysis (21-30)
            // Q21: Survey Question (P.37 - B.4)
            { question: { tl: "Sa pag-aaral ng average grade ng Science, ano ang <b>pinakamainam na tanong</b>?", en: "In a study of the average Science grade, what is the <b>best question</b>?" }, options: { tl: ["'Ano ang paborito mong subject?'", " 'Ano ang grade mo sa Science?'", "'Magkano ang sweldo ng magulang mo?'", "'Nasaan ang Principal?'"], en: ["'What is your favorite subject?'", " 'What is your grade in Science?'", "'What is your parent's salary?'", "'Where is the Principal?'"] }, answer: 1, topic: 'Survey: Data Gathering' },
            // Q22: Mean Use (P.32 - Low Range)
            { question: { tl: "Ang <b>Mean</b> ang pinakamahusay gamitin kung ang Range ng data (variability) ay:", en: "The <b>Mean</b> is best used if the Range of data (variability) is:" }, options: { tl: ["Mababa", "Mataas", "Laging 100", "Hindi mahalaga"], en: ["Low", "High", "Always 100", "Not important"] }, answer: 0, topic: 'Analysis: Mean' },
            // Q23: Median Use (P.32 - High Range)
            { question: { tl: "Ang <b>Median</b> ang pinakamahusay gamitin kung ang Range ng data (variability) ay:", en: "The <b>Median</b> is best used if the Range of data (variability) is:" }, options: { tl: ["Mababa", "Mataas", "Laging 50", "Hindi mahalaga"], en: ["Low", "High", "Always 50", "Not important"] }, answer: 1, topic: 'Analysis: Median' },
            // Q24: Mode Use (P.32 - Categorical)
            { question: { tl: "Ang <b>Mode</b> ang ginagamit kung ang data ay:", en: "The <b>Mode</b> is used when the data is:" }, options: { tl: ["Mataas ang Range", "Mababa ang Range", "Categorical (hindi numero)", "Laging higit sa 30"], en: ["High Range", "Low Range", "Categorical (non-numerical)", "Always more than 30"] }, answer: 2, topic: 'Analysis: Mode' },
            // Q25: Data Gathering Method (Small Sample - P.30)
            { question: { tl: "Kung maliit lang ang sample size (hal. 30), ano ang <b>pinakamasarap gawin</b> sa pangangalap ng datos?", en: "If the sample size is small (e.g., 30), what is the <b>best method</b> for gathering data?" }, options: { tl: ["Questionnaire", "Interview", "Experimentation", "Observation"], en: ["Questionnaire", "Interview", "Experimentation", "Observation"] }, answer: 1, topic: 'Survey: Data Gathering' },
            // Q26: Data Gathering Method (Large Sample - P.30)
            { question: { tl: "Kung malaki ang sample size (hal. 100), ano ang <b>pinakamahusay gamitin</b>?", en: "If the sample size is large (e.g., 100), what is the <b>best method to use</b>?" }, options: { tl: ["Questionnaire", "Interview", "Observation", "Focus Group"], en: ["Questionnaire", "Interview", "Observation", "Focus Group"] }, answer: 0, topic: 'Survey: Data Gathering' },
            // Q27: Survey vs Census (P.28)
            { question: { tl: "Ang pag-aaral na gumagamit ng <b>buong populasyon</b> ay tinatawag na:", en: "A study that uses the <b>entire population</b> is called a:" }, options: { tl: ["Survey", "Census", "Sampling", "Statistic"], en: ["Survey", "Census", "Sampling", "Statistic"] }, answer: 1, topic: 'Survey: Kahulugan' },
            // Q28: Central Tendency for Juan's Study (Range=32 - C.5)
            { question: { tl: "Sa pag-aaral ni Juan (Range=32), aling sukat ang <b>pinakamainam</b> gamitin?", en: "In Juan's study (Range=32), which measure is <b>best</b> to use?" }, options: { tl: ["Mean", "Median", "Mode", "Range"], en: ["Mean", "Median", "Mode", "Range"] }, answer: 1, topic: 'Analysis: Pagpili' },
            // Q29: Median Calculation for Juan's Study (C.5)
            { question: { tl: "Ano ang <b>Median</b> ng iskor ni Juan (65, 66, 67, ..., 95, 97)?", en: "What is the <b>Median</b> of Juan's scores (65, 66, 67, ..., 95, 97)? (Assume continuous range for calculation)" }, options: { tl: ["84.3", "85", "97", "80"], en: ["84.3", "85", "97", "80"] }, answer: 1, topic: 'Analysis: Calculation' }, // Median is 85 
            // Q30: Mean Calculation for Joey's Study (P.33 - Math Grade)
            { question: { tl: "Ang kabuuang iskor ay 2580 (30 respondents). Ano ang <b>Mean</b> grade?", en: "The total score is 2580 (30 respondents). What is the <b>Mean</b> grade?" }, options: { tl: ["84", "85", "86", "87"], en: ["84", "85", "86", "87"] }, answer: 2, topic: 'Analysis: Calculation' }, // 2580 / 30 = 86
        ];

        let userAnswers = {}; // {qIndex: selectedOptionIndex}
        const quizName = "Pagsusulit: Statistics in Action";
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
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
    <title>Pagsusulit: Pag-unawa sa Estadistika</title>
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
                <h1 class="text-4xl font-extrabold text-primary mb-2" id="quiz-title">Pagsusulit: Pag-unawa sa Estadistika</h1>
                <p class="text-xl text-gray-600" id="quiz-subtitle">30 Items: Tendensiyang Sentral, Pagbabagu-bago, at Probabilidad</p>
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
            'quizTitle': { tl: "Pagsusulit: Pag-unawa sa Estadistika", en: "Quiz: Understanding Statistics" },
            'quizSubtitle': { tl: "30 Items: Tendensiyang Sentral, Pagbabagu-bago, at Probabilidad", en: "30 Items: Central Tendency, Variability, and Probability" },
            'goBack': { tl: 'Bumalik', en: 'Go Back' },
            'section1Title': { tl: 'I. Sukat ng Tendensiyang Sentral at Pagbabagu-bago (1 - 10)', en: 'I. Measures of Central Tendency and Variability (1 - 10)' },
            'section2Title': { tl: 'II. Aplikasyon at Survey (11 - 20)', en: 'II. Application and Survey (11 - 20)' },
            'section3Title': { tl: 'III. Probabilidad (21 - 30)', en: 'III. Probability (21 - 30)' },
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
        // Based on: Pag-unawa sa Estadistika.pdf (Measures of Central Tendency, Variability, and Probability)
        
        const quizData = [
            // Section I: Measures of Central Tendency & Variability (1-10)
            // Q1: Definition of Mean
            { question: { tl: "Ano ang tawag sa sukat na kumakatawan sa aritmetikang <b>average</b> (average) ng isang set ng data?", en: "What is the term for the measure that represents the arithmetic <b>average</b> of a set of data?" }, options: { tl: ["Median", "Mode", "Mean", "Range"], en: ["Median", "Mode", "Mean", "Range"] }, answer: 2, topic: 'Estadistika: Kahulugan' },
            // Q2: When to use Mean (low range/no outliers - A.5)
            { question: { tl: "Aling sukat ng tendensiyang sentral ang pinakamainam gamitin kung ang <b>range ng datos ay mababa</b> (hal. 10) at walang 'outliers'?", en: "Which measure of central tendency is best used if the <b>range of data is low</b> (e.g., 10) and there are no 'outliers'?" }, options: { tl: ["Median", "Mode", "Mean", "Range"], en: ["Median", "Mode", "Mean", "Range"] }, answer: 2, topic: 'Estadistika: Pagpili ng Sukat' },
            // Q3: Mode Application (Categorical/Elections - A.2)
            { question: { tl: "Aling sukat ng tendensiyang sentral ang pinakamainam gamitin para sa <b>categorical</b> (nominal) na datos tulad ng boto sa eleksyon?", en: "Which measure of central tendency is best used for <b>categorical</b> (nominal) data such as election votes?" }, options: { tl: ["Median", "Mode", "Mean", "Range"], en: ["Median", "Mode", "Mean", "Range"] }, answer: 1, topic: 'Estadistika: Pagpili ng Sukat' },
            // Q4: When to use Median (high range/outliers - A.3)
            { question: { tl: "Aling sukat ng tendensiyang sentral ang pinakamainam gamitin kung ang <b>range ng datos ay mataas</b> (hal. 17,000) at may 'outliers'?", en: "Which measure of central tendency is best used if the <b>range of data is high</b> (e.g., 17,000) and there are 'outliers'?" }, options: { tl: ["Median", "Mode", "Mean", "Range"], en: ["Median", "Mode", "Mean", "Range"] }, answer: 0, topic: 'Estadistika: Pagpili ng Sukat' },
            // Q5: Mean Calculation (Rice Sacks A.5)
            { question: { tl: "Batay sa datos ng ani ng bigas (Mean = 200 sako), ano ang pinakamainam na konklusyon?", en: "Based on rice harvest data (Mean = 200 sacks), what is the best conclusion?" }, options: { tl: ["Ang ani ay laging 205 sako", "Ang karaniwang ani ay 200 sako", "Ang Median ay 195 sako", "Ang ani ay mababa"], en: ["The harvest is always 205 sacks", "The average harvest is 200 sacks", "The Median is 195 sacks", "The harvest is low"] }, answer: 1, topic: 'Estadistika: Pagkuwenta' }, // Mean = 200
            // Q6: Mode Calculation (Dengue Deaths A.4)
            { question: { tl: "Sa bilang ng namatay sa Dengue (Mode = 5), ano ang ibig sabihin nito?", en: "In the number of Dengue deaths (Mode = 5), what does this mean?" }, options: { tl: ["5 ang Mean", "Ang pinakamadalas na bilang ng namatay ay 5", "Ang pinakamataas na bilang ay 7", "Wala sa nabanggit"], en: ["5 is the Mean", "The most frequent number of deaths is 5", "The highest number is 7", "None of the above"] }, answer: 1, topic: 'Estadistika: Pagkuwenta' }, // Mode = 5
            // Q7: Range Definition
            { question: { tl: "Ano ang tawag sa sukat na nagpapakita ng pagkakaiba ng <b>pinakamataas at pinakamababang halaga</b> ng isang set ng data?", en: "What is the term for the measure that shows the difference between the <b>highest and lowest value</b> of a set of data?" }, options: { tl: ["Median", "Mode", "Mean", "Range"], en: ["Median", "Mode", "Mean", "Range"] }, answer: 3, topic: 'Estadistika: Kahulugan' },
            // Q8: Mean Strategy (A.1 - Low Range)
            { question: { tl: "Ang range ng iskor sa matematika (84-88) ay 4. Dahil mababa ang range, ang <b>pinakamainam na sukat</b> ay:", en: "The range of math scores (84-88) is 4. Because the range is low, the <b>best measure</b> is:" }, options: { tl: ["Median", "Mode", "Mean", "Range"], en: ["Median", "Mode", "Mean", "Range"] }, answer: 2, topic: 'Estadistika: Pagpili ng Sukat' },
            // Q9: Median Strategy (Locust A.3 - High Range)
            { question: { tl: "Ang range ng bilang ng balang ay 17,000. Dahil mataas ang range, ang <b>pinakamainam na sukat</b> ay:", en: "The range of locust count is 17,000. Because the range is high, the <b>best measure</b> is:" }, options: { tl: ["Mean", "Median", "Mode", "Range"], en: ["Mean", "Median", "Mode", "Range"] }, answer: 1, topic: 'Estadistika: Pagpili ng Sukat' },
            // Q10: Statistical Concept: Reaction to Law (C.1)
            { question: { tl: "Gusto ni Kristine malaman ang reaksiyon ng barangay sa panukalang batas. Anong konsepto ang dapat gamitin?", en: "Kristine wants to know the barangay's reaction to the proposed law. What concept should be used?" }, options: { tl: ["Probabilidad", "Algebra", "Calculus", "Pagsisiyasat (Survey)"], en: ["Probability", "Algebra", "Calculus", "Survey"] }, answer: 3, topic: 'Estadistika: Gamit' },

            // Section II: Application & Survey Problems (11-20)
            // Q11: Health Monitoring (Cholera)
            { question: { tl: "Ang barangay ay nagbibigay ng libreng gamot kung ang kaso ng kolera ay <b>humigit sa 80</b>. Ang Median ay 100. Ano ang nararapat na gawin?", en: "The barangay gives free medicine if cholera cases <b>exceed 80</b>. The Median is 100. What should be done?" }, options: { tl: ["Magbigay ng libreng gamot at pagsusuri", "Huwag magbigay ng gamot", "Maghintay pa ng isang buwan", "Baguhin ang Median"], en: ["Give free medicine and check-ups", "Do not give medicine", "Wait another month", "Change the Median"], }, answer: 0, topic: 'Aplikasyon: Kalusugan' }, // 100 > 80, so give aid
            // Q12: Pest Control Strategy (Ipis)
            { question: { tl: "Ang karaniwang bilang ng ipis ay <b>hindi dapat lumagpas ng 100</b>. Ang Median ay 130. Ano ang ibig sabihin nito?", en: "The typical number of cockroaches <b>should not exceed 100</b>. The Median is 130. What does this mean?" }, options: { tl: ["Normal lang ang sitwasyon", "Ang dami ng ipis ay lumampas sa pangkaraniwan", "Kulang ang sampol", "Kailangan ng mas maraming bahay"], en: ["The situation is normal", "The number of cockroaches has exceeded the norm", "The sample is insufficient", "More houses are needed"], }, answer: 1, topic: 'Aplikasyon: Pest Control' }, // 130 > 100
            // Q13: Deficiency Survey (Mode Application)
            { question: { tl: "Sa pagsisiyasat sa kakulangan ng mineral (Iodine, Vitamin A, B, C), ano ang <b>pinakamahusay na sukat</b> upang malaman ang pinakakaraniwang kakulangan?", en: "In a survey of mineral deficiencies (Iodine, Vitamin A, B, C), what is the <b>best measure</b> to find the most common deficiency?" }, options: { tl: ["Mean", "Median", "Mode", "Range"], en: ["Mean", "Median", "Mode", "Range"] }, answer: 2, topic: 'Aplikasyon: Kalusugan' }, // Mode for categorical data
            // Q14: Pest Control Action (Balang/Palaka)
            { question: { tl: "Ang Mean ng Balang (Locust) ay 50 (Normal=25) at ang Mean ng Palaka (Frog) ay 2 (Normal=5). Ano ang <b>pinakamahusay na rekomendasyon</b>?", en: "The Mean of Locusts is 50 (Normal=25) and the Mean of Frogs is 2 (Normal=5). What is the <b>best recommendation</b>?" }, options: { tl: ["Lasonin ang Balang at <b>magdagdag ng Palaka</b>", "Lasonin lang ang Balang", "Huwag na lang gumawa ng aksyon", "Maghintay na lang sa Palaka"], en: ["Poison the Locusts and <b>add more Frogs</b>", "Only poison the Locusts", "Do not take action", "Just wait for the Frogs"], }, answer: 0, topic: 'Aplikasyon: Pest Control Strategy' },
            // Q15: Cancer Survey Median (High Range)
            { question: { tl: "Sa survey ng biktima ng kanser, ang Range ay 31. Dahil mataas ang range, ano ang <b>pinakamainam na sukat</b> para sa sentrong impormasyon?", en: "In a survey of cancer victims, the Range is 31. Because the range is high, what is the <b>best measure</b> for central information?" }, options: { tl: ["Mean", "Median", "Mode", "Range"], en: ["Mean", "Median", "Mode", "Range"] }, answer: 1, topic: 'Aplikasyon: Kalusugan' }, // High range/outliers -> Median
            // Q16: Kuhol Control (Low Range - Mean)
            { question: { tl: "Ang range ng kuhol (snail) sa sakahan ay 4. Ano ang <b>pinakamainam na sukat</b> para sa sentrong impormasyon?", en: "The range of snails in the field is 4. What is the <b>best measure</b> for central information?" }, options: { tl: ["Median", "Mode", "Mean", "Range"], en: ["Median", "Mode", "Mean", "Range"] }, answer: 2, topic: 'Aplikasyon: Pest Control' }, // Low range -> Mean
            // Q17: Survey Sampling
            { question: { tl: "Sa pagsisiyasat, bakit kailangkang pumili ng 'sampol' o halimbawa sa halip na isama ang buong populasyon?", en: "In a survey, why is it necessary to choose a 'sample' instead of including the entire population?" }, options: { tl: ["Para mas madali at <b>mas mabilis mangalap ng datos</b>", "Para mas kumita", "Para makita ang Mode", "Para mas mataas ang Mean"], en: ["To make data gathering easier and <b>faster</b>", "To earn more profit", "To find the Mode", "To achieve a higher Mean"], }, answer: 0, topic: 'Aplikasyon: Pagsisiyasat' },
            // Q18: Statistical Concept: Range for Height (C.2)
            { question: { tl: "Si Mark ay nagsisiyasat sa taas ng bata. Nalaman niya na ang Range ng taas ay 2 pulgada. Anong sukat ang ginamit?", en: "Mark is surveying the height of children. He found that the Range of heights is 2 inches. What measure was used?" }, options: { tl: ["Mean", "Median", "Mode", "Range"], en: ["Mean", "Median", "Mode", "Range"] }, answer: 3, topic: 'Estadistika: Konsepto' },
            // Q19: Statistical Concept: Chance to Win (C.3)
            { question: { tl: "Gusto malaman ni Mang Nanding ang posibilidad na siya ay mananalo sa loterya. Anong konsepto ang dapat gamitin?", en: "Mang Nanding wants to know the possibility of him winning the lottery. What concept should be used?" }, options: { tl: ["Mean", "Median", "Mode", "Probabilidad"], en: ["Mean", "Median", "Mode", "Probability"] }, answer: 3, topic: 'Estadistika: Konsepto' },
            // Q20: Survey Conclusion
            { question: { tl: "Kung ang Mean ng iskor ng klase ay 86, ano ang masasabi mo sa <b>performance ng klase</b>?", en: "If the Mean score of the class is 86, what can you say about the <b>class's performance</b>?" }, options: { tl: ["Ang bawat mag-aaral ay nakakuha ng 86.", "Ang karaniwang iskor ng klase ay 86.", "Ang pinakamataas na iskor ay 86.", "Kailangan pa ng mas maraming datos."], en: ["Every student scored 86.", "The average class score is 86.", "The highest score is 86.", "More data is needed."], }, answer: 1, topic: 'Estadistika: Pag-unawa' },

            // Section III: Probability (21-30)
            // Q21: Probability: Dice Roll (Simple)
            { question: { tl: "Ano ang <b>probabilidad</b> na makakuha ng <b>5</b> pagkatapos maghagis ng dais?", en: "What is the <b>probability</b> of getting a <b>5</b> after rolling a die?" }, options: { tl: ["1/6", "5/6", "1/3", "1/2"], en: ["1/6", "5/6", "1/3", "1/2"] }, answer: 0, topic: 'Probabilidad: Simple' }, // 1/6
            // Q22: Probability: Colored Balls (3 out of 6)
            { question: { tl: "May 6 na bola sa kahon: 3 Pula, 2 Dilaw, 1 Asul. Ano ang <b>probabilidad</b> na makakuha ng Pula?", en: "There are 6 balls in a box: 3 Red, 2 Yellow, 1 Blue. What is the <b>probability</b> of getting a Red ball?" }, options: { tl: ["1/6", "2/6", "3/6 o 1/2", "1"], en: ["1/6", "2/6", "3/6 or 1/2", "1"] }, answer: 2, topic: 'Probabilidad: Pagkalkula' }, // 3/6 = 1/2
            // Q23: Probability: Colored Balls (Not Red)
            { question: { tl: "May 6 na bola: 3 Pula, 2 Dilaw, 1 Asul. Ano ang <b>probabilidad</b> na <b>hindi</b> Pula ang makuha?", en: "There are 6 balls: 3 Red, 2 Yellow, 1 Blue. What is the <b>probability</b> of getting a ball that is <b>not</b> Red?" }, options: { tl: ["3/6 o 1/2", "1/6", "2/6", "1/3"], en: ["3/6 or 1/2", "1/6", "2/6", "1/3"] }, answer: 0, topic: 'Probabilidad: Pagkalkula' }, // 3/6 = 1/2 (2 Yellow + 1 Blue)
            // Q24: Sample Space Definition
            { question: { tl: "Ano ang tawag sa <b>kabuuan ng lahat ng sampol na puntos</b> (possible outcomes)?", en: "What is the term for the <b>total of all sample points</b> (possible outcomes)?" }, options: { tl: ["Sampol na Puntos", "Pangyayari", "Probabilidad", "Sample Space"], en: ["Sample Point", "Event", "Probability", "Sample Space"] }, answer: 3, topic: 'Probabilidad: Konsepto' },
            // Q25: Sample Point Definition
            { question: { tl: "Ano ang tawag sa <b>posibleng kalalabasan</b> (possible outcome) ng isang pagsubok?", en: "What is the term for a <b>possible outcome</b> of a trial?" }, options: { tl: ["Sample Space", "Sampol na Puntos", "Pangyayari", "Subset"], en: ["Sample Space", "Sample Point", "Event", "Subset"] }, answer: 1, topic: 'Probabilidad: Konsepto' },
            // Q26: Probability: Lottery Ticket (25/100)
            { question: { tl: "May 100 tiket at 1 mananalo. Kung si Joy ay may 25 tiket, ano ang kanyang <b>probabilidad</b> na manalo?", en: "There are 100 tickets and 1 winner. If Joy has 25 tickets, what is her <b>probability</b> of winning?" }, options: { tl: ["1/100", "1/4", "1/2", "25/75"], en: ["1/100", "1/4", "1/2", "25/75"] }, answer: 1, topic: 'Probabilidad: Pagkalkula' }, // 25/100 = 1/4
            // Q27: Probability of Two Heads (Coin Toss)
            { question: { tl: "Kapag naghagis ka ng dalawang barya, ano ang <b>probabilidad</b> na makuha ang <b>dalawang ulo</b> (UU)?", en: "When you toss two coins, what is the <b>probability</b> of getting <b>two heads</b> (HH)?" }, options: { tl: ["1/2", "1/3", "1/4", "1/8"], en: ["1/2", "1/3", "1/4", "1/8"] }, answer: 2, topic: 'Probabilidad: Compound' }, // Sample Space: {UU, UB, BU, BB} -> 1/4
            // Q28: Probability Strategy (Lottery/Low Chance)
            { question: { tl: "Kung ang probabilidad na manalo sa loterya ay napakababa (hal. 1/1,000,000), ano ang nararapat na konklusyon?", en: "If the probability of winning the lottery is very low (e.g., 1/1,000,000), what is the appropriate conclusion?" }, options: { tl: ["Bumili pa ng maraming tiket.", "May tiyak na mananalo.", "Maaaring hindi maganda ang pagsali.", "Walang tiyak na kalabasan."], en: ["Buy more tickets.", "There is a definite winner.", "Participating might not be a good idea.", "There is no definite outcome."], }, answer: 2, topic: 'Probabilidad: Aplikasyon' },
            // Q29: Probability: Letter Anagrams (P in Middle)
            { question: { tl: "Ang salitang POT ay may 6 na posibleng ayos. Ano ang <b>probabilidad</b> na ang <b>P</b> ang nasa gitna (hal. OPT, TPO)?", en: "The word POT has 6 possible arrangements. What is the <b>probability</b> that <b>P</b> is in the middle (e.g., OPT, TPO)?" }, options: { tl: ["1/6", "2/6 o 1/3", "3/6 o 1/2", "1"], en: ["1/6", "2/6 or 1/3", "3/6 or 1/2", "1"] }, answer: 1, topic: 'Probabilidad: Compound' }, // 2/6 = 1/3
            // Q30: Strategy Based on Probability (Farm Crops)
            { question: { tl: "Ang probabilidad na masira ang Kamote (Sweet Potato) ay 1/5. Ang Gabi (Taro) ay 1/3. Ano ang mas nararapat na itanim?", en: "The probability that Sweet Potato will be damaged is 1/5. Taro is 1/3. Which is more appropriate to plant?" }, options: { tl: ["Kamote, dahil mas mababa ang probabilidad na masira", "Gabi, dahil mas mataas ang ani", "Pareho lang, dahil maliit lang ang diperensya", "Wala sa nabanggit"], en: ["Sweet Potato, because the probability of damage is lower (1/5 < 1/3)", "Taro, because the yield is higher", "The same, because the difference is small", "None of the above"] }, answer: 0, topic: 'Probabilidad: Aplikasyon Strategy' }
        ];

        let userAnswers = {}; // {qIndex: selectedOptionIndex}
        const quizName = "Pagsusulit: Pag-unawa sa Estadistika";
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
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
    <title>Pagsusulit: Meeting the Families of Numbers</title>
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
                <h1 class="text-4xl font-extrabold text-primary mb-2" id="quiz-title">Pagsusulit: Meeting the Families of Numbers</h1>
                <p class="text-xl text-gray-600" id="quiz-subtitle">30 Items: Sets, Intersection, at Number Line</p>
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
            'quizTitle': { tl: "Pagsusulit: Meeting the Families of Numbers", en: "Quiz: Meeting the Families of Numbers" },
            'quizSubtitle': { tl: "30 Items: Sets, Intersection, at Number Line", en: "30 Items: Sets, Intersection, and Number Line" },
            'goBack': { tl: 'Bumalik', en: 'Go Back' },
            'section1Title': { tl: 'I. Aralin 1: Sets at Union', en: 'I. Lesson 1: Sets and Union' },
            'section2Title': { tl: 'II. Aralin 2: Uri ng Sets at Intersection', en: 'II. Lesson 2: Kinds of Sets and Intersection' },
            'section3Title': { tl: 'III. Aralin 3: Number Line at Integers', en: 'III. Lesson 3: Number Line and Integers' },
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
        // Based on: module1.pdf (Sets, Set Types, Intersection, Number Line)
        
        const quizData = [
            // Section I: Sets and Union (Aralin 1) (1-10)
            // Q1: Definition of Set (P.18)
            { question: { tl: "Ano ang tawag sa koleksiyon ng mga numero na karaniwang nakapaloob sa braces ({})?", en: "What is the term for a collection of numbers usually enclosed in braces ({})?" }, 'options': { tl: ["Element", "Term", "Set", "Union"], en: ["Element", "Term", "Set", "Union"] }, 'answer': 2, 'topic': 'Sets: Kahulugan' },
            // Q2: Definition of Element (P.18)
            { question: { tl: "Ano ang tawag sa bawat numero sa loob ng isang set?", en: "What is the term for each number inside a set?" }, 'options': { tl: ["Element", "Set Name", "Union", "Brace"], en: ["Element", "Set Name", "Union", "Brace"] }, 'answer': 0, 'topic': 'Sets: Terminolohiya' },
            // Q3: Ascending Order (P.19)
            { question: { tl: "Ang pag-aayos ng mga numero sa <b>ascending order</b> ay nangangahulugang ang mga numero ay nakalista mula:", en: "Arranging numbers in <b>ascending order</b> means the numbers are listed from:" }, 'options': { tl: ["Pinakamalaki hanggang Pinakamaliit", "Pinakamaliit hanggang Pinakamalaki", "Random Order", "Odd Numbers lang"], en: ["Largest to Smallest", "Smallest to Largest", "Random Order", "Odd Numbers only"] }, 'answer': 1, 'topic': 'Sets: Pag-aayos' },
            // Q4: Union of Sets (P.21 Example 1)
            { question: { tl: "Kung ang Set A = {1, 3, 5, 8} at Set B = {-2, 0, 4, 9}, ano ang A U B (Union)?", en: "If Set A = {1, 3, 5, 8} and Set B = {-2, 0, 4, 9}, what is A U B (Union)?" }, 'options': { tl: ["{1, 3, 5, 8}", "{-2, 0, 4, 9}", "{1, 0, 5, 9}", "{-2, 0, 1, 3, 4, 5, 8, 9}"], en: ["{1, 3, 5, 8}", "{-2, 0, 4, 9}", "{1, 0, 5, 9}", "{-2, 0, 1, 3, 4, 5, 8, 9}"] }, 'answer': 3, 'topic': 'Sets: Union' },
            // Q5: Union of Sets (Pre-Assessment 4)
            { question: { tl: "Kung ang Set B = {6, 9, 12} at Set C = {6, 12, 18}, ano ang B U C?", en: "If Set B = {6, 9, 12} and Set C = {6, 12, 18}, what is B U C?" }, 'options': { tl: ["{6, 12}", "{9, 18}", "{6, 9, 12, 18}", "{6, 9, 12, 18, 6}"], en: ["{6, 12}", "{9, 18}", "{6, 9, 12, 18}", "{6, 9, 12, 18, 6}"] }, 'answer': 2, 'topic': 'Sets: Union' },
            // Q6: Counting Elements (P.18)
            { question: { tl: "Ilang elemento ang nasa set ng Whole Numbers: {1, 2, 3, 4, 5, 6}?", en: "How many elements are in the set of Whole Numbers: {1, 2, 3, 4, 5, 6}?" }, 'options': { tl: ["5", "6", "7", "8"], en: ["5", "6", "7", "8"] }, 'answer': 1, 'topic': 'Sets: Bilang ng Elemento' },
            // Q7: Set Membership (Pre-Assessment 3)
            { question: { tl: "Kung Set A = {5, 10, 15, 20, 25}, alin ang HINDI elemento ng A?", en: "If Set A = {5, 10, 15, 20, 25}, which one is NOT an element of A?" }, 'options': { tl: ["5", "15", "25", "30"], en: ["5", "15", "25", "30"] }, 'answer': 3, 'topic': 'Sets: Membership' },
            // Q8: Subsets (Pre-Assessment 6)
            { question: { tl: "Alin sa sumusunod ang subset ng set na binubuo ng multiples ng 7?", en: "Which of the following is a subset of the set consisting of multiples of 7?" }, 'options': { tl: ["{7, 14, 23}", "{7, 8, 9}", "{7, 10, 13}", "{7, 14, 21}"], en: ["{7, 14, 23}", "{7, 8, 9}", "{7, 10, 13}", "{7, 14, 21}"] }, 'answer': 3, 'topic': 'Sets: Subsets' },
            // Q9: Subsets (P.31)
            { question: { tl: "Kung ang Set B = {0.45, 1.69, 2.35, 3.56, 4.3, 6.87, 9.5} at Set C = {0.45}, ano ang tamang relasyon?", en: "If Set B = {0.45, 1.69, 2.35, 3.56, 4.3, 6.87, 9.5} and Set C = {0.45}, what is the correct relation?" }, 'options': { tl: ["B ⊂ C", "C ∩ B", "C ⊂ B", "C = B"], en: ["B ⊂ C", "C ∩ B", "C ⊂ B", "C = B"] }, 'answer': 2, 'topic': 'Sets: Subset Symbol' },
            // Q10: Counting Odd Integers (Pre-Assessment 5)
            { question: { tl: "Kung D ang set ng odd integers mula 1 hanggang 15, ilang elemento mayroon ang D?", en: "If D is the set of odd integers from 1 to 15, how many elements does D have?" }, 'options': { tl: ["6", "8", "10", "7"], en: ["6", "8", "10", "7"] }, 'answer': 1, 'topic': 'Sets: Bilang ng Elemento' }, // {1, 3, 5, 7, 9, 11, 13, 15} = 8 elements.

            // Section II: Kinds of Sets and Intersection (Aralin 2) (11-20)
            // Q11: Singleton Set (P.28)
            { question: { tl: "Anong set ang naglalaman lamang ng isang elemento?", en: "What set contains only one element?" }, 'options': { tl: ["Null Set", "Finite Set", "Singleton Set", "Infinite Set"], en: ["Null Set", "Finite Set", "Singleton Set", "Infinite Set"] }, 'answer': 2, 'topic': 'Set Kinds' },
            // Q12: Null Set (P.28)
            { question: { tl: "Anong set ang walang nilalamang elemento, at sinisimbolo ng { } o ∅?", en: "What set contains no elements, symbolized by { } or ∅?" }, 'options': { tl: ["Singleton Set", "Finite Set", "Null Set/Empty Set", "Infinite Set"], en: ["Singleton Set", "Finite Set", "Null Set/Empty Set", "Infinite Set"] }, 'answer': 2, 'topic': 'Set Kinds' },
            // Q13: Infinite Set (P.29)
            { question: { tl: "Anong set ang naglalaman ng bilang ng elemento na walang hangganan o limit?", en: "What set contains a number of elements that is boundless or limitless?" }, 'options': { tl: ["Singleton Set", "Finite Set", "Infinite Set", "Null Set"], en: ["Singleton Set", "Finite Set", "Infinite Set", "Null Set"] }, 'answer': 2, 'topic': 'Set Kinds' },
            // Q14: Finite Set (P.28)
            { question: { tl: "Anong set ang naglalaman ng limitado at nabibilang na bilang ng elemento?", en: "What set contains a limited and countable number of elements?" }, 'options': { tl: ["Singleton Set", "Finite Set", "Infinite Set", "Null Set"], en: ["Singleton Set", "Finite Set", "Infinite Set", "Null Set"] }, 'answer': 1, 'topic': 'Set Kinds' },
            // Q15: Subset Symbol (P.31)
            { question: { tl: "Ano ang simbolo na ginagamit upang ipakita ang Subset?", en: "What is the symbol used to show a Subset?" }, 'options': { tl: ["U", "∩", "⊂", "∅"], en: ["U", "∩", "⊂", "∅"] }, 'answer': 2, 'topic': 'Set Kinds: Symbol' },
            // Q16: Intersection of Sets (P.32)
            { question: { tl: "Ano ang tawag sa set na binubuo ng mga elemento na common sa dalawa o higit pang set?", en: "What is the term for the set consisting of elements that are common to two or more sets?" }, 'options': { tl: ["Union", "Subset", "Intersection", "Singleton"], en: ["Union", "Subset", "Intersection", "Singleton"] }, 'answer': 2, 'topic': 'Sets: Intersection' },
            // Q17: Intersection Symbol (P.32)
            { question: { tl: "Ano ang simbolo na ginagamit upang ipakita ang Intersection ng mga set?", en: "What is the symbol used to show the Intersection of sets?" }, 'options': { tl: ["U", "∩", "⊂", "∅"], en: ["U", "∩", "⊂", "∅"] }, 'answer': 1, 'topic': 'Sets: Intersection Symbol' },
            // Q18: Intersection Calculation (Pre-Assessment 8)
            { question: { tl: "Kung X = {0, 1, 2, 3, 4, 5, 6, 7, 8, 9} at Y = {2, 4, 6, 8}, ano ang X ∩ Y?", en: "If X = {0, 1, 2, 3, 4, 5, 6, 7, 8, 9} and Y = {2, 4, 6, 8}, what is X ∩ Y?" }, 'options': { tl: ["{0, 1, 3, 5, 7, 9}", "{0, 1, 2, 3, 4, 5, 6, 7, 8, 9}", "{2, 4, 6, 8}", "∅"], en: ["{0, 1, 3, 5, 7, 9}", "{0, 1, 2, 3, 4, 5, 6, 7, 8, 9}", "{2, 4, 6, 8}", "∅"] }, 'answer': 2, 'topic': 'Sets: Intersection Calculation' },
            // Q19: Intersection Calculation (Pre-Assessment 9)
            { question: { tl: "Kung X = {0, 1, 2, 3, 4, 5, 6, 7, 8, 9} at Z = {1, 3, 4, 5, 7}, ano ang X ∩ Z?", en: "If X = {0, 1, 2, 3, 4, 5, 6, 7, 8, 9} and Z = {1, 3, 4, 5, 7}, what is X ∩ Z?" }, 'options': { tl: ["{0, 2, 6, 8, 9}", "{1, 3, 4, 5, 7}", "{0, 1, 2, 3, 4, 5, 6, 7, 8, 9}", "∅"], en: ["{0, 2, 6, 8, 9}", "{1, 3, 4, 5, 7}", "{0, 1, 2, 3, 4, 5, 6, 7, 8, 9}", "∅"] }, 'answer': 1, 'topic': 'Sets: Intersection Calculation' },
            // Q20: Intersection with Null Result (Pre-Assessment 10)
            { question: { tl: "Kung X = {0, 1, 2, 3, 4, 5, 6, 7, 8, 9} at Z = {10, 11}, ano ang X ∩ Z?", en: "If X = {0, 1, 2, 3, 4, 5, 6, 7, 8, 9} and Z = {10, 11}, what is X ∩ Z?" }, 'options': { tl: ["{0, 10}", "{9, 11}", "{0, 1, 2, 3, 4, 5, 6, 7, 8, 9}", "∅"], en: ["{0, 10}", "{9, 11}", "{0, 1, 2, 3, 4, 5, 6, 7, 8, 9}", "∅"] }, 'answer': 3, 'topic': 'Sets: Intersection Calculation' },

            // Section III: Number Line and Integers (Aralin 3) (21-30)
            // Q21: Number Line Definition (P.40)
            { question: { tl: "Ang Number Line ay isang tuwid na linya na may mga numero na may parehong distansya, at ginagamit ang Zero bilang:", en: "The Number Line is a straight line with numbers at equal distances, using Zero as the:" }, 'options': { tl: ["Positive Number", "Negative Number", "Reference Point", "Decimal"], en: ["Positive Number", "Negative Number", "Reference Point", "Decimal"] }, 'answer': 2, 'topic': 'Number Line: Kahulugan' },
            // Q22: Positive Movement (P.40)
            { question: { tl: "Sa Number Line, ang paglipat pakanan ay nangangahulugang:", en: "On the Number Line, moving to the right means:" }, 'options': { tl: ["Pagbaba ng halaga (Decrease in value)", "Walang pagbabago", "Pagtaas ng halaga (Increase in value)", "Paghati (Division)"], en: ["Decrease in value", "No change", "Increase in value", "Division"] }, 'answer': 2, 'topic': 'Number Line: Movement' },
            // Q23: Negative Movement (P.41)
            { question: { tl: "Sa Number Line, ang paglipat pakaliwa ay nangangahulugang:", en: "On the Number Line, moving to the left means:" }, 'options': { tl: ["Pagbaba ng halaga (Decrease in value)", "Pagtaas ng halaga (Increase in value)", "Pagmultiply", "Walang pagbabago"], en: ["Decrease in value", "Increase in value", "Multiplication", "No change"] }, 'answer': 0, 'topic': 'Number Line: Movement' },
            // Q24: Integers Definition (P.42)
            { question: { tl: "Ang Integers ay binubuo ng:", en: "Integers are composed of:" }, 'options': { tl: ["Positive at Decimals", "Fractions at Zero", "Positive, Negative, at Zero", "Decimals lang"], en: ["Positive and Decimals", "Fractions and Zero", "Positive, Negative, and Zero", "Decimals only"] }, 'answer': 2, 'topic': 'Integers: Kahulugan' },
            // Q25: Negative Integers (Pre-Assessment 11)
            { question: { tl: "Sa Number Line, alin ang mga integers na matatagpuan sa kaliwa ng Zero?", en: "On the Number Line, which integers are located to the left of Zero?" }, 'options': { tl: ["Decimals", "Positive Integers", "Fractions", "Negative Integers"], en: ["Decimals", "Positive Integers", "Fractions", "Negative Integers"] }, 'answer': 3, 'topic': 'Integers: Lokasyon' },
            // Q26: Inequality Symbol (Pre-Assessment 13)
            { question: { tl: "Aling expression ang kumakatawan sa 'x is greater than -3'?", en: "Which expression represents 'x is greater than -3'?" }, 'options': { tl: ["x > -3", "x < -3", "x ≥ -3", "x ≤ -3"], en: ["x > -3", "x < -3", "x ≥ -3", "x ≤ -3"] }, 'answer': 0, 'topic': 'Number Line: Inequality' },
            // Q27: Number Line Application (P.46 Example 1)
            { question: { tl: "Alin ang tamang representasyon ng 'x > 2' sa number line?", en: "Which is the correct representation of 'x > 2' on the number line?" }, 'options': { tl: ["Shaded circle sa 2, shaded pakanan", "Open circle sa 2, shaded pakanan", "Open circle sa 2, shaded pakaliwa", "Shaded circle sa 2, shaded pakaliwa"], en: ["Shaded circle at 2, shaded right", "Open circle at 2, shaded right", "Open circle at 2, shaded left", "Shaded circle at 2, shaded left"] }, 'answer': 1, 'topic': 'Number Line: Infinity' },
            // Q28: Number Line Application (P.47 Example 3)
            { question: { tl: "Alin ang tamang representasyon ng 'x ≤ -5' sa number line?", en: "Which is the correct representation of 'x ≤ -5' on the number line?" }, 'options': { tl: ["Open circle sa -5, shaded pakanan", "Shaded circle sa -5, shaded pakanan", "Open circle sa -5, shaded pakaliwa", "Shaded circle sa -5, shaded pakaliwa"], en: ["Open circle at -5, shaded right", "Shaded circle at -5, shaded right", "Open circle at -5, shaded left", "Shaded circle at -5, shaded left"] }, 'answer': 3, 'topic': 'Number Line: Infinity' },
            // Q29: Number Line Application (Pre-Assessment 12)
            { question: { tl: "Kung ang A=2, ano ang integer na 4 units sa kanan ng A?", en: "If A=2, what is the integer 4 units to the right of A?" }, 'options': { tl: ["2", "4", "6", "8"], en: ["2", "4", "6", "8"] }, 'answer': 2, 'topic': 'Number Line: Application' }, // 2 + 4 = 6
            // Q30: Number Line Application (Money - Pre-Assessment 14)
            { question: { tl: "Si Mang Pedro ay may \u20b1100.00 at nagbigay ng \u20b135.00. Ilan ang natira?", en: "Mang Pedro has \u20b1100.00 and gave away \u20b135.00. How much is left?" }, 'options': { tl: ["\u20b185.00", "\u20b175.00", "\u20b165.00", "\u20b155.00"], en: ["\u20b185.00", "\u20b175.00", "\u20b165.00", "\u20b155.00"] }, 'answer': 2, 'topic': 'Number Line: Application' }, // 100 - 35 = 65
        ];

        let userAnswers = {}; // {qIndex: selectedOptionIndex}
        const quizName = "Pagsusulit: Meeting the Families of Numbers";
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
         * Renders the quiz questions into the single quiz-content container with three separate cards.
         */
        function renderQuiz() {
            const lang = currentLanguage;
            const quizContent = document.getElementById('quiz-content');
            
            // Separate strings for content that will go inside the section cards
            let section1Content = ''; // Aralin 1: Sets and Union (Q1-Q10)
            let section2Content = ''; // Aralin 2: Kinds of Sets and Intersection (Q11-Q20)
            let section3Content = ''; // Aralin 3: Number Line and Integers (Q21-Q30)

            // Separate HTML for the header/title of each card
            const sectionTitles = [
                `<div class="section-title">${uiText.section1Title[lang]}</div>`,
                `<div class="section-title">${uiText.section2Title[lang]}</div>`,
                `<div class="section-title">${uiText.section3Title[lang]}</div>`
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
        
    </script>

</body>
</html>
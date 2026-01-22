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
    <title>Pagsusulit: Pagdaragdag at Pagbabawas</title>
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
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght=400;600;700;800&display=swap');
        
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
        <header class="mb-4 relative">
            
            <!-- GO BACK BUTTON: Text "Go Back", size uniform at text-xl/w-6 h-6 -->
            <a href="http://localhost/als/front/test.php" class="absolute left-0 top-1/2 transform -translate-y-1/2 p-2 rounded-lg text-primary hover:bg-primary-light transition duration-150 flex items-center group text-xl">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 mr-1">
                    <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
                <span class="font-semibold" id="go-back-text">Go Back</span>
            </a>
            
            <div class="text-center">
                <h1 class="text-4xl font-extrabold text-primary mb-2" id="quiz-title">Pagsusulit: Pagdaragdag at Pagbabawas</h1>
                <p class="text-xl text-gray-600" id="quiz-subtitle">30 Items: Pagbasa, Place Value, Addition, at Subtraction</p>
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
                    <!-- UPDATED LINK TO records.php AND UPDATED TEXT -->
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
            'quizTitle': { tl: "Pagsusulit: Pagdaragdag at Pagbabawas", en: "Quiz: Addition and Subtraction" },
            'quizSubtitle': { tl: "30 Items: Pagbasa, Place Value, Addition, at Subtraction", en: "30 Items: Reading, Place Value, Addition, and Subtraction" },
            'goBack': { tl: 'Bumalik', en: 'Go Back' },
            'section1Title': { tl: 'I. Pagbasa at Pagsulat ng mga Bilang', en: 'I. Reading and Writing Numbers' },
            'section2Title': { tl: 'II. Pagdaragdag', en: 'II. Addition' },
            'section3Title': { tl: 'III. Pagbabawas', en: 'III. Subtraction' },
            'submitButton': { tl: 'Tapusin at Tingnan ang Resulta', en: 'Finish and View Results' },
            'unansweredAlert': { tl: 'Kailangan mo pang sagutan ang', en: 'You still need to answer' },
            'unansweredAlertSuffix': { tl: 'na tanong bago mag-submit.', en: 'questions before submitting.' },
            'modalTitle': { tl: 'Resulta ng Pagsusulit', en: 'Quiz Results' },
            'modalScoreText': { tl: 'Nakakuha ka ng:', en: 'You scored:' },
            'modalReviewText': { tl: 'Tingnan ang iyong mga sagot sa ibaba para matuto.', en: 'Review your answers below to learn.' },
            'recordButton': { tl: 'I-record ang Resulta at Pumunta sa Talaan', en: 'Record Result and Go to Records' },
            'resetButton': { tl: 'Subukan Muli', en: 'Try Again' },
        };

        // --- QUIZ DATA (30 Items Total) - RETAINED ---
        const quizData = [
            // Section I: Pagbasa at Pagsulat ng Bilang (1 - 10)
            { 
                question: { tl: "Ano ang tawag sa sampung simbolo na ginagamit natin sa mga bilang, tulad ng 0, 1, 2, ..., 9?", en: "What is the name for the ten symbols we use in numbers, like 0, 1, 2, ..., 9?" }, 
                options: { tl: ["Bilang", "Place holder", "Tambilang", "Kabuuan"], en: ["Number", "Place holder", "Digit", "Total"] }, 
                answer: 2, topic: 'Reading Numbers' 
            },
            { 
                question: { tl: "Sa bilang na 724, ano ang <b>place value</b> ng tambilang na 7?", en: "In the number 724, what is the <b>place value</b> of the digit 7?" }, 
                options: { tl: ["Tig-iisa", "Tig-sasampu", "Tig-iisang daan", "Wala"], en: ["Ones", "Tens", "Hundreds", "None"] }, 
                answer: 2, topic: 'Place Value' 
            },
            { 
                question: { tl: "Alin sa mga sumusunod na pares ng bilang ang nagpapakita ng sitwasyon kung saan ang tambilang na 6 ay may <b>mas mataas na halaga</b>?", en: "Which of the following pairs of numbers shows a situation where the digit 6 has a <b>higher value</b>?" }, 
                options: { tl: ["762 at 169", "916 at 265", "628 at 762", "136 at 564"], en: ["762 and 169", "916 and 265", "628 and 762", "136 and 564"] }, 
                answer: 2, topic: 'Value of Digits' 
            },
            { 
                question: { tl: "Kung mayroon tayong bilang na 'isang daan walumpu't-dalawa', ano ang tamang simbolo nito?", en: "If we have the number 'one hundred eighty-two', what is its correct symbol?" }, 
                options: { tl: ["128", "182", "192", "120"], en: ["128", "182", "192", "120"] }, 
                answer: 1, topic: 'Writing Numbers' 
            },
            { 
                question: { tl: "Sa bilang na 109, ang tambilang na 0 ay nagsisilbing:", en: "In the number 109, the digit 0 serves as a:" }, 
                options: { tl: ["Subtrahend", "Addend", "Place holder", "Difference"], en: ["Subtrahend", "Addend", "Place holder", "Difference"] }, 
                answer: 2, topic: 'Place Holder' 
            },
            { 
                question: { tl: "Anong simbolo ang dapat gamitin sa patlang para maging tama ang pahayag? <b>92 ___ 93</b>", en: "Which symbol should be used in the blank to make the statement correct? <b>92 ___ 93</b>" }, 
                options: { tl: ["> (Mas higit sa)", "< (Mas kaunti sa)", "= (Katumbas ng)", "≠ (Hindi katumbas)"], en: ["> (Greater than)", "< (Less than)", "= (Equal to)", "≠ (Not equal to)"] }, 
                answer: 1, topic: 'Comparing Numbers' 
            },
            { 
                question: { tl: "Basahin ang bilang na 'apat na raan at tatlo' at ibigay ang tamang simbolo.", en: "Read the number 'four hundred and three' and give the correct symbol." }, 
                options: { tl: ["43", "430", "433", "403"], en: ["43", "430", "433", "403"] }, 
                answer: 3, topic: 'Writing Numbers' 
            },
            { 
                question: { tl: "Ang mga tambilang (digits) sa bilang na 686 ay ang mga sumusunod:", en: "The digits in the number 686 are:" }, 
                options: { tl: ["6, 8, 0", "6, 8, 6", "600, 80, 6", "6 and 8"], en: ["6, 8, 0", "6, 8, 6", "600, 80, 6", "6 and 8"] }, 
                answer: 1, topic: 'Digits' 
            },
            { 
                question: { tl: "Kung ang isang bilang ay may magkatulad na halaga sa isa pang bilang (hal. 76 at 76), anong simbolo ang dapat gamitin?", en: "If a number has the same value as another number (e.g., 76 and 76), which symbol should be used?" }, 
                options: { tl: [">", "<", "=", "+"], en: [">", "<", "=", "+"] }, 
                answer: 2, topic: 'Comparing Numbers' 
            },
            { 
                question: { tl: "Sa bilang na 431, ano ang place value ng tambilang na 3?", en: "In the number 431, what is the place value of the digit 3?" }, 
                options: { tl: ["Tig-iisa", "Tig-sasampu", "Tig-iisang daan", "Place holder"], en: ["Ones", "Tens", "Hundreds", "Place holder"] }, 
                answer: 1, topic: 'Place Value' 
            },

            // Section II: Pagdaragdag (11 - 20)
            { 
                question: { tl: "Ano ang tawag sa mga bilang na <b>ipinagdadagdag</b>?", en: "What are the numbers being <b>added</b> called?" }, 
                options: { tl: ["Kabuuan", "Minuend", "Addends", "Difference"], en: ["Total", "Minuend", "Addends", "Difference"] }, 
                answer: 2, topic: 'Addition Terms' 
            },
            { 
                question: { tl: "Ano ang resulta o sagot na makukuha pagkatapos ng pagdaragdag?", en: "What is the result or answer obtained after addition?" }, 
                options: { tl: ["Addend", "Difference", "Minuend", "Kabuuan"], en: ["Addend", "Difference", "Minuend", "Sum/Total"] }, 
                answer: 3, topic: 'Addition Terms' 
            },
            { 
                question: { tl: "Alin ang tamang sagot sa: <b>8 + 7</b>?", en: "Which is the correct answer to: <b>8 + 7</b>?" }, 
                options: { tl: ["14", "15", "16", "17"], en: ["14", "15", "16", "17"] }, 
                answer: 1, topic: 'Addition Facts' 
            },
            { 
                question: { tl: "Ano ang mangyayari kapag ang anumang bilang ay idinagdag sa <b>0</b>?", en: "What happens when any number is added to <b>0</b>?" }, 
                options: { tl: ["Nagiging 0 ang sagot", "Ang bilang ay hindi nagbabago", "Ang bilang ay nagiging 1", "Ang bilang ay bumababa"], en: ["The answer becomes 0", "The number does not change", "The number becomes 1", "The number decreases"] }, 
                answer: 1, topic: 'Addition Property' 
            },
            { 
                question: { tl: "Sa <b>37 + 19 + 28 = 84</b>, ang <b>84</b> ay ang...", en: "In <b>37 + 19 + 28 = 84</b>, <b>84</b> is the..." }, 
                options: { tl: ["Addend", "Tanda ng Pagdaragdag", "Kabuuan", "Tanda ng Katumbas"], en: ["Addend", "Addition Sign", "Sum/Total", "Equal Sign"] }, 
                answer: 2, topic: 'Addition Example' 
            },
            { 
                question: { tl: "Ano ang tawag sa tanda na ginagamit sa pagdaragdag (<b>+</b>)?", en: "What is the name for the sign used in addition (<b>+</b>)?" }, 
                options: { tl: ["Subtrahend", "Tanda ng Katumbas", "Tanda ng Pagdaragdag", "Difference"], en: ["Subtrahend", "Equal Sign", "Addition Sign", "Difference"] }, 
                answer: 2, topic: 'Addition Symbol' 
            },
            { 
                question: { tl: "Kapag nagdaragdag ng <b>147 + 219 + 38</b>, saan ka unang magsisimula?", en: "When adding <b>147 + 219 + 38</b>, where do you start first?" }, 
                options: { tl: ["Sa hanay ng Tig-sasampu", "Sa hanay ng Tig-iisang daan", "Sa hanay ng Tig-iisa", "Sa pinakamalaking bilang"], en: ["In the Tens column", "In the Hundreds column", "In the Ones column", "With the largest number"] }, 
                answer: 2, topic: 'Addition Process' 
            },
            { 
                question: { tl: "Ano ang kabuuan ng <b>45 + 29 + 63</b>?", en: "What is the sum of <b>45 + 29 + 63</b>?" }, 
                options: { tl: ["127", "137", "147", "157"], en: ["127", "137", "147", "157"] }, 
                answer: 1, topic: 'Addition Computation' 
            },
            { 
                question: { tl: "Si Aling Celina ay nagluto ng <b>45</b> na banana cue, at ang kanyang mga anak ay nakabenta ng <b>29</b> at <b>63</b>. Ilan lahat ang naibenta?", en: "Aling Celina cooked <b>45</b> banana cue, and her children sold <b>29</b> and <b>63</b>. How many were sold in total?" }, 
                options: { tl: ["127", "137", "147", "157"], en: ["127", "137", "147", "157"] }, 
                answer: 1, topic: 'Addition Word Problem' 
            },
            { 
                question: { tl: "Ano ang kabuuan ng <b>109 + 276 + 335</b>?", en: "What is the sum of <b>109 + 276 + 335</b>?" }, 
                options: { tl: ["710", "720", "730", "740"], en: ["710", "720", "730", "740"] }, 
                answer: 1, topic: 'Addition Computation' 
            },

            // Section III: Pagbabawas (21 - 30)
            { 
                question: { tl: "Ano ang tawag sa bilang na <b>50</b> sa ekwasyon na <b>50 - 14 = 36</b>?", en: "What is the number <b>50</b> called in the equation <b>50 - 14 = 36</b>?" }, 
                options: { tl: ["Subtrahend", "Difference", "Minuend", "Place holder"], en: ["Subtrahend", "Difference", "Minuend", "Place holder"] }, 
                answer: 2, topic: 'Subtraction Terms' 
            },
            { 
                question: { tl: "Ano ang tawag sa bilang na <b>14</b> sa ekwasyon na <b>50 - 14 = 36</b>?", en: "What is the number <b>14</b> called in the equation <b>50 - 14 = 36</b>?" }, 
                options: { tl: ["Minuend", "Difference", "Subtrahend", "Kabuuan"], en: ["Minuend", "Difference", "Subtrahend", "Total"] }, 
                answer: 2, topic: 'Subtraction Terms' 
            },
            { 
                question: { tl: "Ano ang tawag sa resulta o sagot na <b>36</b> sa <b>50 - 14 = 36</b>?", en: "What is the result or answer <b>36</b> called in <b>50 - 14 = 36</b>?" }, 
                options: { tl: ["Kabuuan", "Addend", "Difference", "Minuend"], en: ["Total", "Addend", "Difference", "Minuend"] }, 
                answer: 2, topic: 'Subtraction Terms' 
            },
            { 
                question: { tl: "Alin ang tamang sagot sa: <b>12 - 0</b>?", en: "Which is the correct answer to: <b>12 - 0</b>?" }, 
                options: { tl: ["0", "1", "11", "12"], en: ["0", "1", "11", "12"] }, 
                answer: 3, topic: 'Subtraction Property' 
            },
            { 
                question: { tl: "Alin ang tamang sagot sa: <b>9 - 9</b>?", en: "Which is the correct answer to: <b>9 - 9</b>?" }, 
                options: { tl: ["9", "1", "0", "18"], en: ["9", "1", "0", "18"] }, 
                answer: 2, topic: 'Subtraction Property' 
            },
            { 
                question: { tl: "Si Lito ay binigyan ng P<b>50</b> at bumili ng toyo na P<b>14</b>. Magkano ang tamang sukli?", en: "Lito was given P<b>50</b> and bought soy sauce for P<b>14</b>. What is the correct change?" }, 
                options: { tl: ["P34", "P36", "P38", "P40"], en: ["P34", "P36", "P38", "P40"] }, 
                answer: 1, topic: 'Subtraction Word Problem' 
            },
            { 
                question: { tl: "Kapag nagbabawas ng mga bilang, ang <b>Difference</b> ay laging...", en: "When subtracting numbers, the <b>Difference</b> is always..." }, 
                options: { tl: ["Mas higit kaysa sa Minuend", "Magkatumbas sa Subtrahend", "Mas maliit kaysa sa Minuend", "Hindi nagbabago"], en: ["Greater than the Minuend", "Equal to the Subtrahend", "Less than the Minuend", "Does not change"] }, 
                answer: 2, topic: 'Subtraction Principle' 
            },
            { 
                question: { tl: "Ilan ang matitira kung <b>39</b> na katao ang umalis mula sa <b>153</b> katao sa isang pagpupulong?", en: "How many people remain if <b>39</b> people left from <b>153</b> people at a meeting?" }, 
                options: { tl: ["114", "124", "134", "144"], en: ["114", "124", "134", "144"] }, 
                answer: 0, topic: 'Subtraction Word Problem' 
            },
            { 
                question: { tl: "Magkano ang sukli kung P<b>150</b> ang ibinigay sa kahera para sa kapote na nagkakahalaga ng P<b>125</b>?", en: "How much change is given if P<b>150</b> was given to the cashier for a raincoat worth P<b>125</b>?" }, 
                options: { tl: ["P15", "P25", "P35", "P45"], en: ["P15", "P25", "P35", "P45"] }, 
                answer: 1, topic: 'Subtraction Word Problem' 
            },
            { 
                question: { tl: "Ibawas ang <b>108</b> mula sa <b>217</b>. Ano ang sagot?", en: "Subtract <b>108</b> from <b>217</b>. What is the answer?" }, 
                options: { tl: ["99", "109", "119", "129"], en: ["99", "109", "119", "129"] }, 
                answer: 1, topic: 'Subtraction Computation' 
            }
        ];

        let userAnswers = {}; // {qIndex: selectedOptionIndex}
        const quizName = "Pagsusulit: Pagdaragdag at Pagbabawas"; 
        const quizLevelRawId = "elementary"; 
        const quizLevelDisplay = "Elementary"; 

        // Variable to hold the result temporarily before saving
        let currentQuizResult = null; 

        // --- DOM Elements ---
        const resultsModal = () => document.getElementById('results-modal');
        const submitButton = () => document.getElementById('submit-button');
        const scoreDisplay = () => document.getElementById('score-display');
        const customAlertBox = () => document.getElementById('custom-alert-box');
        const recordButtonLink = () => document.getElementById('record-button-link');
        const goBackText = () => document.getElementById('go-back-text');
        const modalTitle = () => document.getElementById('modal-title');
        const modalScoreText = () => document.getElementById('modal-score-text');
        const modalReviewText = () => document.getElementById('modal-review-text');
        const resetButtonModal = () => document.getElementById('reset-button-modal');


        /**
         * Nagpapakita ng custom, non-blocking alert message.
         * @param {string} message - Ang mensaheng ipapakita.
         */
        function showAlert(message) {
            const alertBox = customAlertBox();
            alertBox.textContent = message;
            alertBox.classList.remove('hidden');
            alertBox.style.opacity = '1';
            
            setTimeout(() => {
                alertBox.style.opacity = '0';
                setTimeout(() => {
                    alertBox.classList.add('hidden');
                }, 300);
            }, 4000);
        }
        
        /**
         * Renders the quiz questions into the three separate cards, translated.
         */
        function renderQuiz() {
            const lang = currentLanguage;
            const quizContent = document.getElementById('quiz-content');
            
            // Separate strings for content that will go inside the section cards
            let section1Content = '';
            let section2Content = '';
            let section3Content = '';

            // Separate HTML for the header/title of each card, using the current language
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

                // Generate the question structure, using current language for question text
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
            goBackText().textContent = uiText.goBack[lang];
            submitButton().textContent = uiText.submitButton[lang];
            
            // Modal elements
            modalTitle().textContent = uiText.modalTitle[lang];
            modalScoreText().textContent = uiText.modalScoreText[lang];
            modalReviewText().textContent = uiText.modalReviewText[lang];
            recordButtonLink().textContent = uiText.recordButton[lang];
            resetButtonModal().textContent = uiText.resetButton[lang];
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
         * Explicitly saves the current quiz result to BOTH storage keys (GLOBAL and USER-SPECIFIC).
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
            const quizKey = `${recordToSave.name}-${recordToSave.rawLevelId}`; // Unique identifier for the quiz
            const existingIndex = userRecords.findIndex(r => `${r.name}-${r.rawLevelId}` === quizKey);

            if (existingIndex > -1) {
                // Update: Replace the old score for this quiz with the new score
                userRecords[existingIndex] = recordToSave;
            } else {
                // Insert: Add the new score
                userRecords.push(recordToSave);
            }
            
            localStorage.setItem(USER_RECORDS_KEY, JSON.stringify(userRecords));
            console.log("Quiz record saved globally and user-specifically:", recordToSave);
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
         * Submits the quiz, calculates the score, and displays results.
         * Change: includes submission time (human-readable and ISO) so stored records show when the quiz was submitted.
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


            // --- 1. PREPARE THE RESULT OBJECT (NOW INCLUDES TIME INFO) ---
            const now = new Date();
            currentQuizResult = {
                name: quizName,
                rawLevelId: quizLevelRawId, 
                level: quizLevelDisplay, 
                score: `${correctCount}/${totalQuestions}`,
                percentage: Math.round((correctCount / totalQuestions) * 100),
                date: now.toLocaleDateString('en-US'),
                time: now.toLocaleTimeString('en-US'),   // human-readable time, e.g. "3:24:15 PM"
                submittedAt: now.toISOString()           // ISO timestamp for precise ordering/filtering
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
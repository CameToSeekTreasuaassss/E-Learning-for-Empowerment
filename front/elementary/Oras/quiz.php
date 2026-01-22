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
    <title>Pagsusulit: Oras (Time)</title>
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
                <h1 class="text-4xl font-extrabold text-primary mb-2" id="quiz-title">Pagsusulit: Oras (Time)</h1>
                <p class="text-xl text-gray-600" id="quiz-subtitle">30 Items: Pagbabasa, Pagkukuwenta, at Pag-uugnay sa Distansya/Bilis</p>
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
                    <!-- CHANGED LINK TO records.php AND UPDATED TEXT -->
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
            'quizTitle': { tl: 'Pagsusulit: Oras (Time)', en: 'Quiz: Time' },
            'quizSubtitle': { tl: '30 Items: Pagbabasa, Pagkukuwenta, at Pag-uugnay sa Distansya/Bilis', en: '30 Items: Reading, Calculation, and Relation to Distance/Speed' },
            'goBack': { tl: 'Bumalik', en: 'Go Back' },
            'section1Title': { tl: 'I. Pagbabasa, Pagtatala, at Duration', en: 'I. Reading, Recording, and Duration' },
            'section2Title': { tl: 'II. Pagkukuwenta at Unit Conversion', en: 'II. Calculation and Unit Conversion' },
            'section3Title': { tl: 'III. Oras, Distansiya, Bilis, at Trabaho', en: 'III. Time, Distance, Speed, and Work' },
            'submitButton': { tl: 'Tapusin at Tingnan ang Resulta', en: 'Finish and View Results' },
            'unansweredAlert': { tl: 'Kailangan mo pang sagutan ang', en: 'You still need to answer' },
            'unansweredAlertSuffix': { tl: 'na tanong bago mag-submit.', en: 'questions before submitting.' },
            'modalTitle': { tl: 'Resulta ng Pagsusulit', en: 'Quiz Results' },
            'modalScoreText': { tl: 'Nakakuha ka ng:', en: 'You scored:' },
            'modalReviewText': { tl: 'Tingnan ang iyong mga sagot sa ibaba para matuto.', en: 'Review your answers below to learn.' },
            // UPDATED TEXT TO INCLUDE NAVIGATION
            'recordButton': { tl: 'I-record ang Resulta at Pumunta sa Talaan', en: 'Record Result and Go to Records' }, 
            'resetButton': { tl: 'Subukan Muli', en: 'Try Again' },
        };


        // --- QUIZ DATA (30 Items Total) - RETAINED ---
        const quizData = [
            // Section I: Reading, Recording, and Duration (1-10)
            { 
                question: { tl: "Palitan ng 12 oras ang 23:00 (oras militar).", en: "Convert 23:00 (military time) to 12-hour format." }, 
                options: { tl: ["10:00 PM", "11:00 PM", "1:00 AM", "12:00 PM"], en: ["10:00 PM", "11:00 PM", "1:00 AM", "12:00 PM"] }, 
                answer: 1, topic: '24h to 12h' 
            },
            { 
                question: { tl: "Umalis ang bus 6:30 AM at dumating 11:30 AM. Ilang oras nagbiyahe?", en: "The bus departed at 6:30 AM and arrived at 11:30 AM. How long was the trip?" }, 
                options: { tl: ["4 oras", "5 oras", "6 oras", "5.5 oras"], en: ["4 hours", "5 hours", "6 hours", "5.5 hours"] }, 
                answer: 1, topic: 'Time Duration' 
            },
            { 
                question: { tl: "Ang 120 minuto ay katumbas ng ilang oras?", en: "120 minutes is equivalent to how many hours?" }, 
                options: { tl: ["1 oras", "1.5 oras", "2 oras", "2.5 oras"], en: ["1 hour", "1.5 hours", "2 hours", "2.5 hours"] }, 
                answer: 2, topic: 'Unit Conversion' 
            },
            { 
                question: { tl: "Umalis ang bus 8:00 PM. Kung 7 oras ang biyahe, anong oras makakarating (12h clock)?", en: "The bus left at 8:00 PM. If the journey takes 7 hours, what time will it arrive (12h clock)?" }, 
                options: { tl: ["3:00 AM", "4:00 AM", "2:00 AM", "1:00 AM"], en: ["3:00 AM", "4:00 AM", "2:00 AM", "1:00 AM"] }, 
                answer: 0, topic: 'Time Addition' 
            },
            { 
                question: { tl: "Dumating si Willy 6:00 AM. Kung umalis siya 8 oras mas maaga, anong oras siya umalis (12h clock)?", en: "Willy arrived at 6:00 AM. If he left 8 hours earlier, what time did he leave (12h clock)?" }, 
                options: { tl: ["10:00 PM", "2:00 AM", "11:00 PM", "1:00 AM"], en: ["10:00 PM", "2:00 AM", "11:00 PM", "1:00 AM"] }, 
                answer: 0, topic: 'Reverse Time' 
            },
            { 
                question: { tl: "Ilang oras ang ginugol sa eskuwelahan mula 7:00 AM hanggang 3:00 PM?", en: "How many hours were spent in school from 7:00 AM until 3:00 PM?" }, 
                options: { tl: ["7 oras", "8 oras", "9 oras", "7.5 oras"], en: ["7 hours", "8 hours", "9 hours", "7.5 hours"] }, 
                answer: 1, topic: 'Time Duration' 
            },
            { 
                question: { tl: "Umalis ka sa bahay 8:00 at dumating sa opisina 9:56. Ilang minuto ang ginugol mo?", en: "You left home at 8:00 and arrived at the office at 9:56. How many minutes did you spend travelling?" }, 
                options: { tl: ["106 minuto", "116 minuto", "126 minuto", "136 minuto"], en: ["106 minutes", "116 minutes", "126 minutes", "136 minutes"] }, 
                answer: 1, topic: 'Time Conversion' 
            },
            { 
                question: { tl: "Dumating sa Malacañang ang mga nagmartsa 10:30 AM. Kung 4 oras silang naglakad, anong oras sila nagsimula?", en: "The marchers arrived at Malacañang at 10:30 AM. If they walked for 4 hours, what time did they start?" }, 
                options: { tl: ["6:00 AM", "6:30 AM", "5:30 AM", "7:00 AM"], en: ["6:00 AM", "6:30 AM", "5:30 AM", "7:00 AM"] }, 
                answer: 1, topic: 'Reverse Time' 
            },
            { 
                question: { tl: "Palitan ng oras militar ang 7:30 AM.", en: "Convert 7:30 AM to military time." }, 
                options: { tl: ["1930", "0730", "1730", "7300"], en: ["1930", "0730", "1730", "7300"] }, 
                answer: 1, topic: '12h to 24h' 
            },
            { 
                question: { tl: "Palitan ng karaniwang oras (12h) ang 2333.", en: "Convert 2333 to standard 12-hour format." }, 
                options: { tl: ["11:33 PM", "1:33 PM", "10:33 PM", "11:33 AM"], en: ["11:33 PM", "1:33 PM", "10:33 PM", "11:33 AM"] }, 
                answer: 0, topic: '24h to 12h' 
            },
            
            // Section II: Calculation and Unit Conversion (11-20)
            { 
                question: { tl: "2 oras ang ginugol ng nanay ni Rosa para maghanda ng tanghalian. Ilang minuto ang katumbas nito?", en: "Rosa's mother spent 2 hours preparing lunch. How many minutes is this equivalent to?" }, 
                options: { tl: ["100 minuto", "120 minuto", "150 minuto", "180 minuto"], en: ["100 minutes", "120 minutes", "150 minutes", "180 minutes"] }, 
                answer: 1, topic: 'Unit Conversion' 
            },
            { 
                question: { tl: "140 minuto ang ginugol ni Kat sa paglilinis. Ilang oras ang katumbas nito?", en: "Kat spent 140 minutes cleaning. How many hours is this equivalent to?" }, 
                options: { tl: ["2.1 oras", "2.33 oras", "2.5 oras", "2.4 oras"], en: ["2.1 hours", "2.33 hours", "2.5 hours", "2.4 hours"] }, 
                answer: 1, topic: 'Unit Conversion' 
            },
            { 
                question: { tl: "Tatlong taon nanungkulan ang alkalde (2000, 2001, 2002). Ilang araw siyang manunungkulan?", en: "The mayor served for three years (2000, 2001, 2002). How many days did he serve?" }, 
                options: { tl: ["1095 araw", "1096 araw", "1097 araw", "1094 araw"], en: ["1095 days", "1096 days", "1097 days", "1094 days"] }, 
                answer: 1, topic: 'Unit Conversion' 
            },
            { 
                question: { tl: "Si Gng. Reyes ay naninirahan sa Antipolo nang 27 buwan. Ilang taon na siya nandoon?", en: "Mrs. Reyes has been living in Antipolo for 27 months. How many years has she been there?" }, 
                options: { tl: ["2.15 taon", "2.25 taon", "2.35 taon", "2.5 taon"], en: ["2.15 years", "2.25 years", "2.35 years", "2.5 years"] }, 
                answer: 1, topic: 'Unit Conversion' 
            },
            { 
                question: { tl: "Dumating si Nestor 8:00 AM (14 oras na biyahe). Anong oras siya umalis (12h clock)?", en: "Nestor arrived at 8:00 AM (after a 14-hour trip). What time did he depart (12h clock)?" }, 
                options: { tl: ["4:00 PM", "6:00 PM", "8:00 PM", "10:00 PM"], en: ["4:00 PM", "6:00 PM", "8:00 PM", "10:00 PM"] }, 
                answer: 1, topic: 'Reverse Time' 
            },
            { 
                question: { tl: "Nagsimula ang manggagawa 8:00 AM at natapos 4:00 PM. Ilang oras siyang nagtrabaho?", en: "The worker started at 8:00 AM and finished at 4:00 PM. How many hours did he work?" }, 
                options: { tl: ["7 oras", "8 oras", "9 oras", "7.5 oras"], en: ["7 hours", "8 hours", "9 hours", "7.5 hours"] }, 
                answer: 1, topic: 'Time Duration' 
            },
            { 
                question: { tl: "65 minuto ang ginugol ni Ada sa biyahe. Ilang oras ang katumbas nito (decimal)?", en: "Ada spent 65 minutes traveling. How many hours is this equivalent to (decimal)?" }, 
                options: { tl: ["1.05 oras", "1.08 oras", "1.15 oras", "1.25 oras"], en: ["1.05 hours", "1.08 hours", "1.15 hours", "1.25 hours"] }, 
                answer: 1, topic: 'Unit Conversion' 
            },
            { 
                question: { tl: "2 oras ang biyahe mula Quiapo hanggang Valenzuela. Ilang minuto ang gugugulin?", en: "The trip from Quiapo to Valenzuela takes 2 hours. How many minutes will it take?" }, 
                options: { tl: ["120 minuto", "150 minuto", "160 minuto", "180 minuto"], en: ["120 minutes", "150 minutes", "160 minutes", "180 minutes"] }, 
                answer: 0, topic: 'Unit Conversion' 
            },
            { 
                question: { tl: "Ang 80 araw ay tantiyang katumbas ng ilang buwan?", en: "80 days is approximately equivalent to how many months?" }, 
                options: { tl: ["2.5 buwan", "2.67 buwan", "2.75 buwan", "3.0 buwan"], en: ["2.5 months", "2.67 months", "2.75 months", "3.0 months"] }, 
                answer: 1, topic: 'Unit Conversion' 
            },
            { 
                question: { tl: "Palitan ng oras militar ang 9:00 PM.", en: "Convert 9:00 PM to military time." }, 
                options: { tl: ["0900", "1900", "2100", "2200"], en: ["0900", "1900", "2100", "2200"] }, 
                answer: 2, topic: '12h to 24h' 
            },

            // Section III: Time, Distance, Speed, and Work (21-30)
            { 
                question: { tl: "Tumakbo ang sasakyan ng 120 km sa loob ng 2 oras. Ano ang karaniwang bilis ng sasakyan?", en: "The vehicle traveled 120 km in 2 hours. What is the average speed of the vehicle?" }, 
                options: { tl: ["40 kph", "50 kph", "60 kph", "80 kph"], en: ["40 kph", "50 kph", "60 kph", "80 kph"] }, 
                answer: 2, topic: 'SDT' 
            },
            { 
                question: { tl: "Nagbiyahe ang bus ng 240 km sa loob ng 4 na oras. Ano ang karaniwang bilis ng bus?", en: "The bus traveled 240 km in 4 hours. What is the average speed of the bus?" }, 
                options: { tl: ["50 kph", "60 kph", "70 kph", "80 kph"], en: ["50 kph", "60 kph", "70 kph", "80 kph"] }, 
                answer: 1, topic: 'SDT' 
            },
            { 
                question: { tl: "Naglakbay ang boy scout ng 4 na oras sa bilis na 2 km/oras. Gaano kalayo ang inabot nila?", en: "The boy scout traveled for 4 hours at a speed of 2 km/hour. How far did they reach?" }, 
                options: { tl: ["6 km", "8 km", "10 km", "12 km"], en: ["6 km", "8 km", "10 km", "12 km"] }, 
                answer: 1, topic: 'SDT' 
            },
            { 
                question: { tl: "Nakakagawa ng 12 basong papel sa loob ng 30 minuto ang isang bata. Ilang basong papel ang magagawa niya sa isang oras?", en: "A child can make 12 paper cups in 30 minutes. How many paper cups can he make in one hour?" }, 
                options: { tl: ["18", "24", "30", "36"], en: ["18", "24", "30", "36"] }, 
                answer: 1, topic: 'Work Rate' 
            },
            { 
                question: { tl: "Ang bus ay nagbibiyahe sa bilis na 100 kph. Gaano katagal ang 200 km na biyahe?", en: "The bus is traveling at a speed of 100 kph. How long will the 200 km trip take?" }, 
                options: { tl: ["1 oras", "2 oras", "2.5 oras", "3 oras"], en: ["1 hour", "2 hours", "2.5 hours", "3 hours"] }, 
                answer: 1, topic: 'SDT' 
            },
            { 
                question: { tl: "Kung nagbiyahe nang 5 oras sa bilis na 75 km/hr, ilang km ang nilakbay nito?", en: "If it traveled for 5 hours at a speed of 75 km/hr, how many kilometers did it cover?" }, 
                options: { tl: ["350 km", "375 km", "400 km", "425 km"], en: ["350 km", "375 km", "400 km", "425 km"] }, 
                answer: 1, topic: 'SDT' 
            },
            { 
                question: { tl: "Nakakagawa ng 4 na uniporme sa 8 oras ang modista. Ilang uniporme ang matatahi niya sa loob ng 5 araw (8 oras kada araw)?", en: "The dressmaker can make 4 uniforms in 8 hours. How many uniforms can she sew in 5 days (8 hours per day)?" }, 
                options: { tl: ["16", "20", "24", "25"], en: ["16", "20", "24", "25"] }, 
                answer: 1, topic: 'Work Rate' 
            },
            { 
                question: { tl: "60 araw nag-araro ang magsasaka. Ilang buwan niya natapos ang pag-aararo?", en: "The farmer plowed for 60 days. How many months did it take him to finish plowing?" }, 
                options: { tl: ["1.5 buwan", "2 buwan", "2.5 buwan", "3 buwan"], en: ["1.5 months", "2 months", "2.5 months", "3 months"] }, 
                answer: 1, topic: 'Unit Conversion' 
            },
            { 
                question: { tl: "72 oras nanatili ang mga turista sa Baguio. Ilang araw silang nandoon?", en: "The tourists stayed in Baguio for 72 hours. How many days were they there?" }, 
                options: { tl: ["2 araw", "3 araw", "3.5 araw", "4 araw"], en: ["2 days", "3 days", "3.5 days", "4 days"] }, 
                answer: 1, topic: 'Unit Conversion' 
            },
            { 
                question: { tl: "50 metro ang jogging ni Sonny sa loob ng 15 minuto. Ano ang kabuuang distansiya sa isang oras?", en: "Sonny jogs 50 meters in 15 minutes. What is the total distance in one hour?" }, 
                options: { tl: ["150 metro", "200 metro", "250 metro", "300 metro"], en: ["150 meters", "200 meters", "250 meters", "300 meters"] }, 
                answer: 1, topic: 'Work Rate' 
            }
        ];

        let userAnswers = {}; // {qIndex: selectedOptionIndex}
        const quizName = "Pagsusulit: Oras (Time)";
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
         * Updates static UI elements based on the current language.
         */
        function updateStaticUI(lang) {
            document.getElementById('quiz-title').textContent = uiText.quizTitle[lang];
            document.getElementById('quiz-subtitle').textContent = uiText.quizSubtitle[lang];
            document.getElementById('go-back-text').textContent = uiText.goBack[lang];
            document.getElementById('submit-button').textContent = uiText.submitButton[lang];
            
            // Modal elements
            modalTitle().textContent = uiText.modalTitle[lang];
            modalScoreText().textContent = uiText.modalScoreText[lang];
            modalReviewText().textContent = uiText.modalReviewText[lang];
            recordButtonLink().textContent = uiText.recordButton[lang];
            resetButtonModal().textContent = uiText.resetButton[lang];
        }
        
        /**
         * Renders the quiz questions into the single quiz-content container with three separate cards.
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
                `<div class="section-title" id="sec-1-title">${uiText.section1Title[lang]}</div>`,
                `<div class="section-title" id="sec-2-title">${uiText.section2Title[lang]}</div>`,
                `<div class="section-title" id="sec-3-title">${uiText.section3Title[lang]}</div>`
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
            
            // If the quiz has been submitted, re-apply visual feedback
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
            setLanguage(currentLanguage); // Sets language state, updates static UI, and calls renderQuiz()
        };
    </script>

</body>
</html>
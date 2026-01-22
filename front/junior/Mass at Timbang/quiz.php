<?php
// PHP session data injection
session_start();
// NOTE: These variables are set up in the environment and are only for context.
// In this JS/HTML file, we are using localStorage for persistence, which does not rely on these server-side PHP variables.
$user_id = $_SESSION['user_id'] ?? 'GUEST_ID';
$user_name = $_SESSION['user_name'] ?? 'Guest';
$user_level_raw = $_SESSION['user_level'] ?? 'default';
?>
<!DOCTYPE html>
<html lang="tl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title id="main-title-tag">Pagsusulit: Mass at Timbang</title>
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
        
        /* Removed custom .language-toggle CSS, relying on Tailwind classes in JS */
    </style>
</head>
<!-- Body background changed to light sky blue -->
<body class="bg-primary-light min-h-screen flex items-center justify-center py-8 font-sans">

    <!-- SET MAX-WIDTH TO CUSTOM VALUE (92rem, equivalent to 7.5xl-8xl) -->
    <div id="quiz-container" class="w-full p-4 sm:p-8" style="max-width: 92rem;">
        <header class="mb-8 relative">
            
            <!-- GO BACK BUTTON: Text "Go Back", size uniform at text-xl/w-6 h-6 -->
            <a href="http://localhost/als/front/test.php" class="absolute left-0 top-1/2 transform -translate-y-1/2 p-2 rounded-lg text-primary hover:bg-primary-light transition duration-150 flex items-center group text-xl" id="go-back-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 mr-1">
                    <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
                <span class="font-semibold" data-translate="goBack">Bumalik</span>
            </a>
            
            <div class="text-center">
                <h1 class="text-4xl font-extrabold text-primary mb-2" data-translate="title" id="quiz-title-header">Pagsusulit: Mass at Timbang</h1>
                <p class="text-xl text-gray-600" data-translate="subtitle">30 Items: Konsepto, Units, at Conversion</p>
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
                    <!-- Link to records.php, ensuring save is called first -->
                    <a href="http://localhost/als/front/records.php" onclick="saveRecordToLocalStorage()" id="record-button-link"
                       class="block w-full py-3 bg-record-btn text-white font-bold text-lg rounded-lg shadow-md hover:bg-blue-600 transition duration-300 focus:outline-none focus:ring-4 focus:ring-blue-300"
                       data-translate="modalRecord">
                        I-record ang Resulta
                    </a>
                    <button onclick="resetQuiz()"
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
        // --- INJECT PHP VARIABLES (Used for result tracking metadata) ---
        const USER_ID = "<?php echo $user_id; ?>";
        const USER_NAME = "<?php echo $user_name; ?>";
        const USER_RAW_LEVEL = "<?php echo $user_level_raw; ?>"; // <--- This holds the user's raw level from PHP session
        
        // --- GLOBAL CONSTANTS FOR DUAL RECORDING ---
        const GLOBAL_RECORDS_KEY = 'allQuizRecords';
        const USER_RECORDS_KEY = `quizRecords_${USER_ID}`;
        
        let currentLanguage = 'tl'; // Set Tagalog as default

        // Conversion factors (based on module page 15):
        // 1 kg = 1000 g, 1 g = 1000 mg, 1 T (English Ton) = 2000 lb, 1 lb = 16 oz, 1 kg = 2.2 lb, 1 N = 1 kg-m/s^2
        const G_EARTH = 9.81; // m/s²
        const LB_TO_KG_CONVERSION = 0.453592; // 1 lb = 0.453 kg (used implicitly: 1 kg = 2.2 lb)
        const LB_TO_W_CONVERSION = 4.45; // 1 lb ≈ 4.45 N (kg-m/s^2)

        const languageData = {
            'en': {
                'title': 'Quiz: Mass and Weight',
                'subtitle': '30 Items: Concepts, Units, and Conversion',
                'goBack': 'Go Back',
                'submitButton': 'Finish and View Results',
                'section1Title': 'I. Lesson 1: Concepts, Formulas, and Comparison (Q1-Q10)',
                'section2Title': 'II. Lesson 2: Unit Conversion and Equipment (Q11-Q20)',
                'section3Title': 'III. Lessons 1 & 2: Advanced Application and Problem Solving (Q21-Q30)',
                'modalTitle': 'Quiz Results',
                'modalScoreLabel': 'You scored:',
                'modalReview': 'Review your answers below to learn.',
                'modalRecord': 'Record Result',
                'modalReset': 'Try Again',
                'alertMissing': (remaining) => `You need to answer ${remaining} more questions before submitting.`,
                'alertSaved': (name) => `Result for ${name} saved!`,
            },
            'tl': {
                'title': 'Pagsusulit: Mass at Timbang',
                'subtitle': '30 Items: Konsepto, Units, at Conversion',
                'goBack': 'Bumalik',
                'submitButton': 'Tapusin at Tingnan ang Resulta',
                'section1Title': 'I. Aralin 1: Konsepto, Pormula, at Pagkukumpara (Q1-Q10)',
                'section2Title': 'II. Aralin 2: Unit Conversion at Equipment (Q11-Q20)',
                'section3Title': 'III. Aralin 1 & 2: Advanced Application at Problem Solving (Q21-Q30)',
                'modalTitle': 'Resulta ng Pagsusulit',
                'modalScoreLabel': 'Nakakuha ka ng:',
                'modalReview': 'Tingnan ang iyong mga sagot sa ibaba para matuto.',
                'modalRecord': 'I-record ang Resulta',
                'modalReset': 'Subukan Muli',
                'alertMissing': (remaining) => `Kailangan mo pang sagutan ang ${remaining} na tanong bago mag-submit.`,
                'alertSaved': (name) => `Resulta para sa ${name} ay na-save!`,
            }
        };
        
        const quizData = [
            // Section I: Aralin 1 - Konsepto at Pagkukumpara (1-10)
            { 'question_tl': "Ano ang tumutukoy sa dami o laki ng materyal (matter) na taglay ng isang bagay?", 'question_en': "What refers to the amount or quantity of matter (matter) an object contains?", 'options_tl': ["Timbang", "Grabidad", "Mass", "Dami"], 'options_en': ["Weight", "Gravity", "Mass", "Quantity"], 'answer': 2, 'topic': 'Konsepto' },
            { 'question_tl': "Ano ang pwersang humihila sa isang bagay patungo sa sentro ng mundo (o iba pang planeta)?", 'question_en': "What is the force pulling an object towards the center of the Earth (or other planet)?", 'options_tl': ["Mass", "Bilis", "Timbang", "Grabidad"], 'options_en': ["Mass", "Speed", "Weight", "Gravity"], 'answer': 2, 'topic': 'Konsepto' },
            { 'question_tl': "Saang sitwasyon nagbabago ang Timbang ng isang bagay ngunit nananatili ang Mass nito?", 'question_en': "In which situation does an object's Weight change, but its Mass remain constant?", 'options_tl': ["Kapag nagbago ang kulay ng bagay.", "Kapag inilipat ang bagay sa ibang lugar (tulad ng buwan).", "Kapag nagbago ang dami ng materyal.", "Hindi nagbabago ang timbang at mass."], 'options_en': ["When the color of the object changes.", "When the object is moved to another location (like the moon).", "When the amount of material changes.", "Weight and mass do not change."], 'answer': 1, 'topic': 'Pagkukumpara' },
            { 'question_tl': "Ano ang pormula (formula) para sa Timbang (T)?", 'question_en': "What is the formula for Weight (W)? ", 'options_tl': ["T = mass / gravity", "T = mass &times; gravity", "T = mass + gravity", "T = mass - gravity"], 'options_en': ["W = mass / gravity", "W = mass &times; gravity", "W = mass + gravity", "W = mass - gravity"], 'answer': 1, 'topic': 'Pormula' },
            { 'question_tl': "Ano ang bilis o tulin na dulot ng grabidad (g) sa mundo?", 'question_en': "What is the acceleration due to gravity (g) on Earth?", 'options_tl': ["1.64 m/s&sup2;", "9.81 m/s&sup2;", "3.7 m/s&sup2;", "5.45 m/s&sup2;"], 'options_en': ["1.64 m/s&sup2;", "9.81 m/s&sup2;", "3.7 m/s&sup2;", "5.45 m/s&sup2;"], 'answer': 1, 'topic': 'Physics' },
            { 'question_tl': "Kung ang mass ng isang bagay ay 50 kg, ano ang Timbang (Weight) nito sa mundo? (g = 9.81 m/s&sup2;)", 'question_en': "If the mass of an object is 50 kg, what is its Weight on Earth? (g = 9.81 m/s&sup2)", 'options_tl': ["50 kg-m/s&sup2;", "490.5 kg-m/s&sup2;", "49.05 kg-m/s&sup2;", "98.1 kg-m/s&sup2;"], 'options_en': ["50 kg-m/s&sup2;", "490.5 kg-m/s&sup2;", "49.05 kg-m/s&sup2;", "98.1 kg-m/s&sup2;"], 'answer': 1, 'topic': 'Calculation' },
            { 'question_tl': "Bakit mas magaan ang timbang ng isang astronaut sa buwan kaysa sa mundo?", 'question_en': "Why is an astronaut's weight lighter on the moon than on Earth?", 'options_tl': ["Dahil mas malayo ang buwan.", "Dahil mas maliit ang mass ng buwan.", "Dahil mas mabilis umikot ang buwan.", "Dahil walang hangin sa buwan."], 'options_en': ["Because the moon is farther away.", "Because the moon's mass is smaller.", "Because the moon rotates faster.", "Because there is no air on the moon."], 'answer': 1, 'topic': 'Physics' },
            { 'question_tl': "Isang tindahan ang nagbebenta ng manok sa &#8369;80 bawat kilo. Kung &#8369;4800 ang kabuuang binili, ilang kilo ito?", 'question_en': "A store sells chicken for &#8369;80 per kilogram. If the total purchase was &#8369;4800, how many kilograms is this?", 'options_tl': ["48 kg", "50 kg", "60 kg", "80 kg"], 'options_en': ["48 kg", "50 kg", "60 kg", "80 kg"], 'answer': 2, 'topic': 'Application' },
            { 'question_tl': "Alin sa mga sumusunod ang pangunahing yunit ng pagsukat para sa Mass?", 'question_en': "Which of the following is the primary unit of measurement for Mass?", 'options_tl': ["Libro (lb)", "Kilogramo (kg)", "Ounsa (oz)", "Ton (T)"], 'options_en': ["Pound (lb)", "Kilogram (kg)", "Ounce (oz)", "Ton (T)"], 'answer': 1, 'topic': 'Units' },
            { 'question_tl': "Alin ang angkop na yunit ng pagsukat para sa Timbang (Weight)?", 'question_en': "Which is the appropriate unit of measurement for Weight?", 'options_tl': ["Gramo (g)", "Miligramo (mg)", "Kilograms-meters-per-second-squared (kg-m/s&sup2;)", "Sentimetro (cm)"], 'options_en': ["Gram (g)", "Milligram (mg)", "Kilograms-meters-per-second-squared (kg-m/s&sup2;)", "Centimeter (cm)"], 'answer': 2, 'topic': 'Units' },

            // Section II: Aralin 2 - Unit Conversion at Equipment (11-20)
            { 'question_tl': "Ilang gramo (g) ang katumbas ng 1 kilogramo (kg)?", 'question_en': "How many grams (g) is equivalent to 1 kilogram (kg)?", 'options_tl': ["100 g", "1,000 g", "10,000 g", "100,000 g"], 'options_en': ["100 g", "1,000 g", "10,000 g", "100,000 g"], 'answer': 1, 'topic': 'Conversion (Metric)' },
            { 'question_tl': "Ilang miligramo (mg) ang katumbas ng 1 gramo (g)?", 'question_en': "How many milligrams (mg) is equivalent to 1 gram (g)?", 'options_tl': ["10 mg", "100 mg", "1,000 mg", "10,000 mg"], 'options_en': ["10 mg", "100 mg", "1,000 mg", "10,000 mg"], 'answer': 2, 'topic': 'Conversion (Metric)' },
            { 'question_tl': "Ilang libra (lb) ang katumbas ng 1 tonelada (T)?", 'question_en': "How many pounds (lb) is equivalent to 1 ton (T)?", 'options_tl': ["1,000 lb", "2,000 lb", "10,000 lb", "20,000 lb"], 'options_en': ["1,000 lb", "2,000 lb", "10,000 lb", "20,000 lb"], 'answer': 1, 'topic': 'Conversion (English)' },
            { 'question_tl': "Ilang onsa (oz) ang katumbas ng 1 libra (lb)?", 'question_en': "How many ounces (oz) is equivalent to 1 pound (lb)?", 'options_tl': ["10 oz", "12 oz", "16 oz", "20 oz"], 'options_en': ["10 oz", "12 oz", "16 oz", "20 oz"], 'answer': 2, 'topic': 'Conversion (English)' },
            { 'question_tl': "Ilang libra (lb) ang katumbas ng 1 kilogramo (kg)?", 'question_en': "How many pounds (lb) is equivalent to 1 kilogram (kg)?", 'options_tl': ["1.6 lb", "2.0 lb", "2.2 lb", "2.5 lb"], 'options_en': ["1.6 lb", "2.0 lb", "2.2 lb", "2.5 lb"], 'answer': 2, 'topic': 'Conversion (Cross)' },
            { 'question_tl': "Ilang gramo (g) ang binili ng magsasaka kung bumili siya ng 3 kilo ng abono?", 'question_en': "How many grams (g) did the farmer buy if he bought 3 kilograms of fertilizer?", 'options_tl': ["300 g", "3,000 g", "30,000 g", "300,000 g"], 'options_en': ["300 g", "3,000 g", "30,000 g", "300,000 g"], 'answer': 1, 'topic': 'Application (Conversion)' },
            { 'question_tl': "Ilang kilogramo (kg) ang katumbas ng 220 libra (lb)? (Gamitin: 1 kg = 2.2 lb)", 'question_en': "How many kilograms (kg) is equivalent to 220 pounds (lb)? (Use: 1 kg = 2.2 lb)", 'options_tl': ["100 kg", "110 kg", "200 kg", "220 kg"], 'options_en': ["100 kg", "110 kg", "200 kg", "220 kg"], 'answer': 0, 'topic': 'Conversion (lb to kg)' },
            { 'question_tl': "Aling kagamitan ang ginagamit sa pagsukat ng mass ng napakalaking bagay (tulad ng graba o semento)?", 'question_en': "Which equipment is used to measure the mass of very large objects (like gravel or cement)? ", 'options_tl': ["Timbangan (Scale)", "Platform Balance", "Timbangang Digital", "Platform Scale"], 'options_en': ["Scale", "Platform Balance", "Digital Scale", "Platform Scale"], 'answer': 3, 'topic': 'Equipment' },
            { 'question_tl': "Aling kagamitan ang makakapagsukat ng mass na kasingliit ng 0.1 gramo?", 'question_en': "Which equipment can measure mass as small as 0.1 gram?", 'options_tl': ["Timbangan", "Platform Balance", "Timbangang Digital", "Platform Scale"], 'options_en': ["Scale", "Platform Balance", "Digital Scale", "Platform Scale"], 'answer': 1, 'topic': 'Equipment' },
            { 'question_tl': "Noong unang panahon, ano ang ginagamit ng mga tao para magtimbang?", 'question_en': "In ancient times, what did people use for weighing?", 'options_tl': ["Mga bato at metal", "Mga butil ng mais, mani, at buto ng prutas", "Barya at salapi", "Tubig at buhangin"], 'options_en': ["Stones and metal", "Grains of corn, peanuts, and fruit seeds", "Coins and money", "Water and sand"], 'answer': 1, 'topic': 'Indigenous' },

            // Section III: Aralin 1 & 2 - Advanced Application at Problem Solving (21-30)
            { 'question_tl': "Ang patukang mais ay &#8369;20/kg. Ang halong patuka (mais, darak, gulay) ay &#8369;15/kg. Alin ang mas matipid gamitin?", 'question_en': "Corn feed is &#8369;20/kg. Mixed feed (corn, bran, vegetables) is &#8369;15/kg. Which is more economical to use?", 'options_tl': ["Patukang mais", "Halong patuka", "Pareho lang", "Hindi matukoy"], 'options_en': ["Corn feed", "Mixed feed", "They are the same", "Cannot be determined"], 'answer': 1, 'topic': 'Cost Application' },
            { 'question_tl': "Kung ang mass ng astronaut ay 60 kg, ano ang timbang niya sa buwan? (g_{buwan} = 1.64 m/s&sup2;)", 'question_en': "If the mass of the astronaut is 60 kg, what is his weight on the moon? (g_{moon} = 1.64 m/s&sup2;)", 'options_tl': ["60 kg-m/s&sup2;", "98.4 kg-m/s&sup2;", "109.88 kg-m/s&sup2;", "588.6 kg-m/s&sup2;"], 'options_en': ["60 kg-m/s&sup2;", "98.4 kg-m/s&sup2;", "109.88 kg-m/s&sup2;", "588.6 kg-m/s&sup2;"], 'answer': 1, 'topic': 'Weight on Moon' }, // 60 * 1.64 = 98.4
            { 'question_tl': "Ano ang mass ni Nonoy sa kilogramo (kg) kung tumitimbang siya ng 121 libra (lb)? (1 kg ≈ 2.2 lb)", 'question_en': "What is Nonoy's mass in kilograms (kg) if he weighs 121 pounds (lb)? (1 kg ≈ 2.2 lb)", 'options_tl': ["55 kg", "60 kg", "121 kg", "266.2 kg"], 'options_en': ["55 kg", "60 kg", "121 kg", "266.2 kg"], 'answer': 0, 'topic': 'Mass from Weight' }, // 121 / 2.2 = 55
            { 'question_tl': "Kapag tinanong ka kung 'Ilang kilo ang binili?' ano ang yunit na dapat mong gamitin sa sagot?", 'question_en': "When you are asked 'How many kilograms were purchased?' what unit should you use in your answer?", 'options_tl': ["Timbang", "Mass", "Kg-m/s&sup2;", "Libra"], 'options_en': ["Weight", "Mass", "Kg-m/s&sup2;", "Pound"], 'answer': 1, 'topic': 'Contextual Unit' },
            { 'question_tl': "Ang isang astronaut na 588.6 kg-m/s&sup2; ang timbang sa mundo, ay tumitimbang ng 98.4 kg-m/s&sup2; sa buwan. Ilang libra (lb) ang timbang niya sa buwan? (Gamitin: 1 lb ≈ 4.45 kg-m/s&sup2;)", 'question_en': "An astronaut who weighs 588.6 kg-m/s&sup2; on Earth, weighs 98.4 kg-m/s&sup2; on the moon. How many pounds (lb) is his weight on the moon? (Use: 1 lb ≈ 4.45 kg-m/s&sup2;)", 'options_tl': ["22.0 lb", "44.18 lb", "55.0 lb", "99.2 lb"], 'options_en': ["22.0 lb", "44.18 lb", "55.0 lb", "99.2 lb"], 'answer': 0, 'topic': 'Conversion (W to lb)' }, // 98.4 / 4.45 = 22.11
            { 'question_tl': "Ilang kilo (kg) ng patukang mais ang kailangan ng 200 manok sa isang linggo kung bawat isa ay kumokonsumo ng 2 kg?", 'question_en': "How many kilograms (kg) of corn feed are needed for 200 chickens in one week if each consumes 2 kg?", 'options_tl': ["200 kg", "400 kg", "800 kg", "1,000 kg"], 'options_en': ["200 kg", "400 kg", "800 kg", "1,000 kg"], 'answer': 1, 'topic': 'Application (Multiplication)' }, // 200 * 2 = 400
            { 'question_tl': "Ano ang pinagsama-samang timbang (kg-m/s&sup2;) ng 3 astronaut kung bawat isa ay 98.4 kg-m/s&sup2; ang timbang sa buwan?", 'question_en': "What is the combined weight (kg-m/s&sup2;) of 3 astronauts if each weighs 98.4 kg-m/s&sup2; on the moon?", 'options_tl': ["196.8 kg-m/s&sup2;", "295.2 kg-m/s&sup2;", "393.6 kg-m/s&sup2;", "492.0 kg-m/s&sup2;"], 'options_en': ["196.8 kg-m/s&sup2;", "295.2 kg-m/s&sup2;", "393.6 kg-m/s&sup2;", "492.0 kg-m/s&sup2;"], 'answer': 1, 'topic': 'Weight Calculation (Total)' }, // 3 * 98.4 = 295.2
            { 'question_tl': "Sino ang mas mabigat, si Ben (89 lb) o si Mark (40 kg)? (1 kg ≈ 2.2 lb)", 'question_en': "Who is heavier, Ben (89 lb) or Mark (40 kg)? (1 kg ≈ 2.2 lb)", 'options_tl': ["Si Ben", "Si Mark", "Pareho lang", "Hindi matukoy"], 'options_en': ["Ben", "Mark", "They are the same", "Cannot be determined"], 'answer': 0, 'topic': 'Comparison (lb vs kg)' }, // 40 kg * 2.2 = 88 lb. 89 lb > 88 lb.
            { 'question_tl': "Ano ang timbang ni Marie (67 kg mass) sa mundo? (g = 9.81 m/s&sup2;)", 'question_en': "What is Marie's weight (67 kg mass) on Earth? (g = 9.81 m/s&sup2;)", 'options_tl': ["67 kg-m/s&sup2;", "657.27 kg-m/s&sup2;", "588.6 kg-m/s&sup2;", "670 kg-m/s&sup2;"], 'options_en': ["67 kg-m/s&sup2;", "657.27 kg-m/s&sup2;", "588.6 kg-m/s&sup2;", "670 kg-m/s&sup2;"], 'answer': 1, 'topic': 'Weight Calculation' }, // 67 * 9.81 = 657.27
            { 'question_tl': "Ano ang yunit na karaniwang ginagamit ng mga tindera sa palengke sa pagbenta ng manok at isda?", 'question_en': "What unit is commonly used by market vendors when selling chicken and fish?", 'options_tl': ["Libra (lb)", "Gramo (g)", "Kilogramo (kg)", "Ounsa (oz)"], 'options_en': ["Pound (lb)", "Gram (g)", "Kilogram (kg)", "Ounce (oz)"], 'answer': 2, 'topic': 'Contextual Unit' }
        ];

        let userAnswers = {}; // {qIndex: selectedOptionIndex}
        const quizName = "Pagsusulit: Mass at Timbang";
        const quizLevelRawId = "juniorhigh"; 
        const quizLevelDisplay = "Junior High";

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
                
                // --- Active State ---
                btn.classList.toggle('bg-primary', isActive);
                btn.classList.toggle('text-white', isActive);
                btn.classList.toggle('border-primary', isActive); 

                // --- Inactive State ---
                btn.classList.toggle('bg-gray-200', !isActive);
                btn.classList.toggle('text-gray-700', !isActive);
                btn.classList.toggle('border-gray-300', !isActive);
                btn.classList.toggle('hover:bg-gray-300', !isActive);
                
                // Common border class is already applied in HTML structure
            });
            
            // Render quiz content using the new language
            renderQuiz();
            
            // If the quiz was already submitted, re-apply the results visuals in the new language
            if (submitButton().disabled) {
                applySubmissionMarks();
            }
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
                // Use innerHTML for titles that might contain currency symbols (like the peso sign) or math symbols
                if (key === 'title' || key === 'subtitle') {
                    el.innerHTML = data[key];
                } else if (data[key]) {
                    el.textContent = data[key];
                }
            });
        }

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
            const quizContent = document.getElementById('quiz-content');
            const lang = currentLanguage;
            const data = languageData[lang];
            
            // Separate strings for content that will go inside the section cards
            let section1Content = '';
            let section2Content = '';
            let section3Content = '';

            // Separate HTML for the header/title of each card
            const sectionTitles = [
                `<div class="section-title">${data.section1Title}</div>`,
                `<div class="section-title">${data.section2Title}</div>`,
                `<div class="section-title">${data.section3Title}</div>`
            ];
            
            quizData.forEach((q, index) => {
                const questionText = q[`question_${lang}`];
                const options = q[`options_${lang}`];
                let optionsHtml = '';
                const isSubmitted = submitButton().disabled;

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
            if (submitButton().disabled) {
                applySubmissionMarks();
            }
        }


        /**
         * Marks the selected answer and updates the userAnswers object.
         */
        function selectAnswer(qIndex, oIndex, button) {
            // Check if submission is finalized
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
         * Explicitly saves the current quiz result to BOTH the GLOBAL and USER-SPECIFIC localStorage keys.
         */
        function saveRecordToLocalStorage() {
             // Only proceed if a result is ready
             if (!currentQuizResult) {
                console.error("No quiz result to save.");
                return;
            }

            const recordToSave = {
                ...currentQuizResult,
                userId: USER_ID,
                userName: USER_NAME,
                // FIX: Use the raw level identifier from the PHP session (e.g., 'default', 'juniorhigh')
                // instead of the quiz's display name, as expected by overall.php
                userLevel: USER_RAW_LEVEL 
            };
            
            // --- 1. SAVE TO GLOBAL LOG (For overall.php) ---
            let globalRecords = JSON.parse(localStorage.getItem(GLOBAL_RECORDS_KEY) || '[]');
            globalRecords.push(recordToSave);
            localStorage.setItem(GLOBAL_RECORDS_KEY, JSON.stringify(globalRecords));
            
            // --- 2. SAVE TO USER-SPECIFIC LOG (For records.php) ---
            let userRecords = JSON.parse(localStorage.getItem(USER_RECORDS_KEY) || '[]');
            
            // Upsert logic: Use the fixed 'name' for matching
            const existingIndex = userRecords.findIndex(record => record.name === quizName);

            if (existingIndex > -1) {
                // Update: Replace the old score for this quiz with the new score
                userRecords[existingIndex] = recordToSave;
            } else {
                // Insert: Add the new record
                userRecords.push(recordToSave);
            }
            
            localStorage.setItem(USER_RECORDS_KEY, JSON.stringify(userRecords));
            
            // Use translation for alert, passing the constant name for display
            const alertMessage = languageData[currentLanguage].alertSaved(currentQuizResult.name);
            showAlert(alertMessage, 'success');
        }

        /**
         * Submits the quiz, calculates the score, and displays results.
         * Adds date and time (AM/PM) to the saved result.
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


            // --- 1. PREPARE THE RESULT OBJECT (with date + time AM/PM) ---
            const now = new Date();
            currentQuizResult = {
                name: quizName, 
                rawLevelId: quizLevelRawId, 
                level: quizLevelDisplay, 
                score: `${correctCount}/${totalQuestions}`,
                percentage: Math.round((correctCount / totalQuestions) * 100),
                // Date in MM/DD/YYYY (en-US) format
                date: now.toLocaleDateString('en-US'),
                // Time in 12-hour format with AM/PM
                time: now.toLocaleTimeString('en-US', { hour: 'numeric', minute: '2-digit', second: '2-digit', hour12: true }),
                // Combined timestamp (readable) using 12-hour format
                timestamp: now.toLocaleString('en-US', { hour12: true })
            };
            
            // --- 2. IMMEDIATELY SAVE THE RESULT TO LOCAL STORAGE (DUAL SAVE) ---
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
            
            // Re-render to ensure correct translations, state is cleared, and buttons are enabled
            renderQuiz();
            
            submitButton().disabled = false;
            submitButton().classList.remove('opacity-50', 'cursor-not-allowed');
        }
        
        // --- Event Listener for Initialization ---
        document.addEventListener('DOMContentLoaded', () => {
            // Set Tagalog as default and render the quiz
            switchLanguage('tl'); 
        });

    </script>

</body>
</html>
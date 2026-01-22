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
    <title>Pagsusulit: Ang Elektrisidad at ang mga Gamit Nito</title>
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
                        // Changed to Sky Blue palette
                        'primary': '#0284c7', /* Sky 600 */
                        'primary-light': '#e0f2f7', /* Sky 100 */
                        // Sky 700 for dark hover and high score display
                        'success': '#0369a1', 
                        'error': '#ef4444',
                        // Keeping the original record button color as it's a specific, secondary action
                        'record-btn': '#3b82f6', 
                        // Defining a very light sky accent for hover/selected backgrounds
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
            border-left: 4px solid #0284c7; 
            border-right: 4px solid #0284c7; 
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
                <h1 class="text-4xl font-extrabold text-primary mb-2" id="quiz-title">Pagsusulit: Ang Elektrisidad at ang mga Gamit Nito</h1>
                <p class="text-xl text-gray-600" id="quiz-subtitle">30 Items: Pagkuwenta, Pagtitipid, at Kaligtasan</p>
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
                <!-- Score display uses 'success' color which is Sky 700 -->
                <div class="text-6xl font-extrabold mb-6" id="score-display"></div>
                
                <p class="text-sm text-gray-500 mb-6" id="modal-review-text">Tingnan ang iyong mga sagot sa ibaba para matuto.</p>
                
                <div class="space-y-3">
                    <!-- UPDATED LINK: Records are saved upon submission, but the button ensures navigation -->
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
            'quizTitle': { tl: 'Pagsusulit: Ang Elektrisidad at ang mga Gamit Nito', en: 'Quiz: Electricity and Its Uses' },
            'quizSubtitle': { tl: '30 Items: Pagkuwenta, Pagtitipid, at Kaligtasan', en: '30 Items: Calculation, Saving, and Safety' },
            'goBack': { tl: 'Bumalik', en: 'Go Back' },
            'section1Title': { tl: 'I. Kuwenta at Terminolohiya', en: 'I. Calculation and Terminology' },
            'section2Title': { tl: 'II. Pagtitipid sa Kuryente', en: 'II. Electricity Saving Tips' },
            'section3Title': { tl: 'III. Kaligtasang Pang-Elektrisidad', en: 'III. Electrical Safety', },
            'submitButton': { tl: 'Tapusin at Tingnan ang Resulta', en: 'Finish and View Results' },
            'unansweredAlert': { tl: 'Kailangan mo pang sagutan ang', en: 'You still need to answer' },
            'unansweredAlertSuffix': { tl: 'na tanong bago mag-submit.', en: 'questions before submitting.' },
            'modalTitle': { tl: 'Resulta ng Pagsusulit', en: 'Quiz Results' },
            'modalScoreText': { tl: 'Nakakuha ka ng:', en: 'You scored:' },
            'modalReviewText': { tl: 'Tingnan ang iyong mga sagot sa ibaba para matuto.', en: 'Review your answers below to learn.' },
            'recordButton': { tl: 'I-record ang Resulta at Pumunta sa Talaan', en: 'Record Result and Go to Records' },
            'resetButton': { tl: 'Subukan Muli', en: 'Try Again' },
        };

        // --- WATTAGE REFERENCE TABLE (Based on PDF Page 12) ---
        const wattageTable = {
            'Range (4 burners)': 8200, 'Refrigerator (8 ft³)': 130, 'Refrigerator (7 ft³)': 120, 
            'Desk fan (18 inches)': 120, 'Refrigerator (6 ft³)': 100, 'Ceiling fan (2 blades)': 100, 
            'Incandescent bulb': 100, 'Box fan (16 inches)': 80, 'Television set (color, 14 inches)': 80, 
            'Sewing machine': 75, 'Television set (color, 12 inches)': 65, 'Fluorescent lamp (28 inches)': 53, 
            'Tape recorder (cassette)': 50, 'VHS Player': 45, 'Television set (black & white, 14 inches)': 36, 
            'Rice cooker (1 liter)': 585, 'Airpot': 600, 'Flat iron (standard)': 600, 'Blender': 300,
            'Washing machine (non-automatic)': 280, 'Computer (w/monitor)': 225, 'Water pump': 373,
            'Hair dryer': 320, 'Oven toaster': 750
        };


        // --- QUIZ DATA (30 Items Total) - UPDATED FOR TRANSLATION ---
        const quizData = [
            // Section I: Calculation and Terminology (1-10)
            { 
                question: { tl: "Ilang watts (W) ang katumbas ng 1 kilowatt (kW)?", en: "How many watts (W) is equivalent to 1 kilowatt (kW)?" }, 
                options: { tl: ["10 W", "100 W", "1,000 W", "10,000 W"], en: ["10 W", "100 W", "1,000 W", "10,000 W"] }, 
                answer: 2, topic: 'Conversion/Wattage' 
            },
            { 
                question: { tl: "Ang konsumo ng kuryente ay sinusukat gamit ang anong pamantayang yunit?", en: "Electricity consumption is measured using what standard unit?" }, 
                options: { tl: ["Watts (W)", "Amperes (A)", "Kilowatt-hour (kWh)", "Volt (V)"], en: ["Watts (W)", "Amperes (A)", "Kilowatt-hour (kWh)", "Volt (V)"] }, 
                answer: 2, topic: 'Conversion/Wattage' 
            },
            { 
                question: { tl: "Kung may airpot (600W), gaano karaming watt-hour (Wh) ang konsumo nito sa loob ng 1 at 1/2 oras?", en: "If an airpot (600W) is used for 1 and 1/2 hours, how many watt-hours (Wh) does it consume?" }, 
                options: { tl: ["600 Wh", "750 Wh", "900 Wh", "1,200 Wh"], en: ["600 Wh", "750 Wh", "900 Wh", "1,200 Wh"] }, 
                answer: 2, topic: 'Calculation' 
            },
            { 
                question: { tl: "Gaano kalaki ang konsumong kuryente (in Wh) ng isang Desk fan (18 pulgada) na may 120W kung ginamit ito ng 9 oras?", en: "How much electricity (in Wh) does an 18-inch Desk fan (120W) consume if used for 9 hours?" }, 
                options: { tl: ["980 Wh", "1,080 Wh", "1,200 Wh", "1,440 Wh"], en: ["980 Wh", "1,080 Wh", "1,200 Wh", "1,440 Wh"] }, 
                answer: 1, topic: 'Calculation' 
            },
            { 
                question: { tl: "Ilang kilowatt-hour (kWh) ang konsumo ng isang 8 ft³ Refrigerator (130W) sa loob ng 7 oras?", en: "How many kilowatt-hours (kWh) does an 8 ft³ Refrigerator (130W) consume in 7 hours?" }, 
                options: { tl: ["0.81 kWh", "0.91 kWh", "1.01 kWh", "1.30 kWh"], en: ["0.81 kWh", "0.91 kWh", "1.01 kWh", "1.30 kWh"] }, 
                answer: 1, topic: 'Calculation' 
            },
            { 
                question: { tl: "May 2 blender (300W bawat isa) na ginamit ng 7 oras. Ilang kWh ang konsumo?", en: "2 blenders (300W each) were used for 7 hours. How many kWh were consumed?" }, 
                options: { tl: ["4.2 kWh", "3.6 kWh", "2.8 kWh", "4.8 kWh"], en: ["4.2 kWh", "3.6 kWh", "2.8 kWh", "4.8 kWh"] }, 
                answer: 0, topic: 'Calculation' 
            },
            { 
                question: { tl: "Ang 3 makinang pantahi (75W bawat isa) ay ginamit ng 8 oras. Ilang kWh ang kabuuang konsumo?", en: "3 sewing machines (75W each) were used for 8 hours. What is the total kWh consumed?" }, 
                options: { tl: ["1.8 kWh", "2.4 kWh", "2.8 kWh", "3.2 kWh"], en: ["1.8 kWh", "2.4 kWh", "2.8 kWh", "3.2 kWh"] }, 
                answer: 0, topic: 'Calculation' 
            },
            { 
                question: { tl: "Ano ang tawag sa tatak (e.g., 600W) na nagsasabi kung gaano kalaki ang nakukonsumong kuryente ng isang kasangkapan?", en: "What is the name of the label (e.g., 600W) that indicates how much electricity an appliance consumes?" }, 
                options: { tl: ["Voltage", "Kilowatt", "Amperage", "Wattage/Batyahe"], en: ["Voltage", "Kilowatt", "Amperage", "Wattage"] }, 
                answer: 3, topic: 'Terminology' 
            },
            { 
                question: { tl: "Alin sa mga sumusunod ang <b>HINDI</b> pangunahing gamit ng kuryente sa tahanan?", en: "Which of the following is <b>NOT</b> a primary use of electricity at home?" }, 
                options: { tl: ["Nagpapatakbo ng motor", "Nagbibigay liwanag", "Nagbibigay init", "Nagpapalakas ng tubig-ulan"], en: ["Running a motor", "Providing light", "Providing heat", "Boosting rainwater"] }, 
                answer: 3, topic: 'General Use' 
            },
            { 
                question: { tl: "Ano ang tawag sa anyo ng enerhiya na nagpapatakbo sa mga kagamitang de-kuryente?", en: "What is the name of the form of energy that powers electrical devices?" }, 
                options: { tl: ["Boltahe", "Enerhiya", "Elektrisidad", "Potensyal"], en: ["Voltage", "Energy", "Electricity", "Potential"] }, 
                answer: 2, topic: 'Terminology' 
            },

            // Section II: Electricity Saving Tips (11-20)
            { 
                question: { tl: "Aling uri ng ilaw ang mas matipid sa kuryente ayon sa module?", en: "Which type of bulb is more energy-efficient according to the module?" }, 
                options: { tl: ["Incandescent bulb (Bombilya)", "Fluorescent lamp", "LED bulb", "Halogen lamp"], en: ["Incandescent bulb", "Fluorescent lamp", "LED bulb", "Halogen lamp"] }, 
                answer: 1, topic: 'Lights' 
            },
            { 
                question: { tl: "Alin ang dapat gawin para makatipid sa paggamit ng refrigerator?", en: "Which should you do to save on refrigerator use?" }, 
                options: { tl: ["Iwanang bukas nang bahagya ang pintuan.", "Iwasan ang paulit-ulit na pagbukas at pagsara.", "Huwag linisin ang coil sa likuran.", "Ilagay sa pinakamababang setting ang temperatura."], en: ["Leave the door slightly open.", "Avoid opening and closing repeatedly.", "Do not clean the coil at the back.", "Set the temperature to the lowest setting."] }, 
                answer: 1, topic: 'Refrigerator' 
            },
            { 
                question: { tl: "Ano ang pinakaunang hakbang upang makatipid sa kuryente?", en: "What is the first step to saving electricity?" }, 
                options: { tl: ["Gumamit ng generator.", "Patayin ang mga kasangkapang de-kuryente kung hindi na ginagamit.", "Magpalit ng bahay.", "Hayaan na lang."], en: ["Use a generator.", "Turn off electrical appliances when not in use.", "Move house.", "Just leave it."] }, 
                answer: 1, topic: 'General Rule' 
            },
            { 
                question: { tl: "Alin ang mabisang tipid-tip sa pamamalantsa?", en: "Which is an effective ironing energy-saving tip?" }, 
                options: { tl: ["Magplantsa ng kakaunti araw-araw.", "Huwag siksikin ang damit sa lalagyan bago plantsahin.", "Gumamit ng steam iron palagi.", "Pamalantsa tuwing hatinggabi."], en: ["Iron a small amount every day.", "Do not overstuff the container with clothes before ironing.", "Always use a steam iron.", "Iron every midnight."] }, 
                answer: 1, topic: 'Ironing' 
            },
            { 
                question: { tl: "Paano gamitin ang bentilador nang mas matipid?", en: "How should you use a fan more efficiently?" }, 
                options: { tl: ["Ilagay palagi sa pinakamabilis na bilis.", "I-swing ito nang mabilis.", "Itraka sa iisang direksyon kung kailangan.", "Iwanang nakabukas kahit walang tao."], en: ["Always set it to the highest speed.", "Make it swing fast.", "Set it stationary in one direction when needed.", "Leave it running even when no one is around."] }, 
                answer: 2, topic: 'Fan' 
            },
            { 
                question: { tl: "Ang paglilinis ng coil sa likuran ng refrigerator ay nakakatulong dahil:", en: "Cleaning the coil at the back of the refrigerator helps because it:" }, 
                options: { tl: ["Nagiging mas maganda ang itsura.", "Naiiwasan ang sunog.", "Nagiging mas madali ang pagpapalamig.", "Wala itong epekto."], en: ["Makes it look better.", "Prevents fire.", "Makes cooling easier.", "Has no effect."] }, 
                answer: 2, topic: 'Maintenance' 
            },
            { 
                question: { tl: "Alin ang mas matipid na gawain kaysa paggamit ng clothes dryer?", en: "Which activity is more economical than using a clothes dryer?" }, 
                options: { tl: ["I-press ang damit.", "I-hang (isampay) ang damit sa labas.", "Iwanang basa ang damit.", "Ipahiram ang dryer sa kapitbahay."], en: ["Press the clothes.", "Hang clothes outside (clothesline).", "Leave clothes wet.", "Lend the dryer to the neighbor."] }, 
                answer: 1, topic: 'Clothes Dryer' 
            },
            { 
                question: { tl: "Ano ang dapat gawin kapag bumibili ng bagong kagamitan?", en: "What should you do when buying a new appliance?" }, 
                options: { tl: ["Bumili ng pinakamalaki.", "Bumili ng pinakamura.", "Bumili ng may pinakamataas na wattage.", "Bumili ng may mababang wattage/boltahe."], en: ["Buy the largest one.", "Buy the cheapest one.", "Buy one with the highest wattage.", "Buy one with low wattage/voltage."] }, 
                answer: 3, topic: 'Buying' 
            },
            { 
                question: { tl: "Bakit mahalaga na panatilihing malinis at maayos ang mga ilaw?", en: "Why is it important to keep the lights clean and well-maintained?" }, 
                options: { tl: ["Para mas malinaw ang liwanag.", "Para mas gumanda ang silid.", "Para tumaas ang bill.", "Para maging madilim ang paligid."], en: ["For clearer light.", "To make the room look better.", "To increase the bill.", "To make the surroundings dark."] }, 
                answer: 0, topic: 'Maintenance' 
            },
            { 
                question: { tl: "Ang pagtitipid sa konsumo ng kuryente ay nangangahulugan ng:", en: "Saving on electricity consumption means:" }, 
                options: { tl: ["Pagdagdag sa gastos.", "Pag-iipon ng pera.", "Pag-aalis ng lahat ng kasangkapan.", "Pag-iwan sa mga ilaw na bukas."], en: ["Increasing expenses.", "Saving money.", "Removing all appliances.", "Leaving the lights on."] }, 
                answer: 1, topic: 'Savings' 
            },
            
            // Section III: Electrical Safety (21-30)
            { 
                question: { tl: "Ano ang dapat mong gawin kung may nakitang taong nakuryente?", en: "What should you do if you see someone being electrocuted?" }, 
                options: { tl: ["Buhusan ng tubig.", "Hatakin ng kamay.", "Itulak palayo gamit ang tuyong walis na kahoy ang hawakan.", "Tumawag agad ng doktor."], en: ["Pour water on them.", "Pull them with your hand.", "Push them away using a dry wooden broomstick.", "Immediately call a doctor."] }, 
                answer: 2, topic: 'Safety/Electrocution' 
            },
            { 
                question: { tl: "Aling bagay ang <b>HINDI</b> dapat ilapit sa mga kasangkapang gumagamit ng kuryente?", en: "Which item should <b>NOT</b> be brought near electrical appliances?" }, 
                options: { tl: ["Plastik", "Goma", "Kahoy", "Tubig"], en: ["Plastic", "Rubber", "Wood", "Water"] }, 
                answer: 3, topic: 'Safety/Water' 
            },
            { 
                question: { tl: "Alin ang dapat gawin upang maiwasan ang sunog na dulot ng kuryente?", en: "Which should be done to prevent fire caused by electricity?" }, 
                options: { tl: ["Takpan ang saksakan.", "Huwag magsaksak ng maraming kagamitan sa isang outlet.", "Huwag gumamit ng kagamitan.", "Huwag hawakan ang anumang kable."], en: ["Cover the outlet.", "Do not plug many appliances into one outlet.", "Do not use any appliance.", "Do not touch any wire."] }, 
                answer: 1, topic: 'Safety/Overloading' 
            },
            { 
                question: { tl: "Bakit hindi dapat hawakan ang pindutan ng ilaw o magsaksak kung basa ang iyong mga kamay?", en: "Why should you not touch the light switch or plug in an appliance if your hands are wet?" }, 
                options: { tl: ["Masira ang pindutan.", "Magkaroon ng brownout.", "Maiwasan ang pagkakuryente.", "Hindi na kailangan ang kuryente."], en: ["The switch will break.", "There will be a brownout.", "To avoid electric shock.", "Electricity is no longer needed."] }, 
                answer: 2, topic: 'Safety/Wet Hands' 
            },
            { 
                question: { tl: "Ano ang pinakamahalagang gawin sa mga saksakan kung may mga bata sa bahay?", en: "What is the most important thing to do with outlets if there are children at home?" }, 
                options: { tl: ["Hayaan na lang.", "Lagyan ng metal na takip.", "Takpan ng plastik na pantakip (safety caps).", "Gumamit ng basang kamay."], en: ["Just leave them.", "Put a metal cover on them.", "Cover them with plastic safety caps.", "Use wet hands."] }, 
                answer: 2, topic: 'Safety/Children' 
            },
            { 
                question: { tl: "Paano dapat tanggalin ang pansaksak mula sa outlet?", en: "How should you remove a plug from an outlet?" }, 
                options: { tl: ["Hilahin ang kable.", "Hilahin ang plug.", "Sipaing bigla.", "Hawakan ang metal na dulo."], en: ["Pull the wire.", "Pull the plug.", "Kick it suddenly.", "Hold the metal tip."] }, 
                answer: 1, topic: 'Safety/Unplugging' 
            },
            { 
                question: { tl: "Sino ang dapat tawagan upang kumpunihin ang mga sirang kasangkapang de-kuryente?", en: "Who should be called to repair broken electrical appliances?" }, 
                options: { tl: ["Tubero", "Karpintero", "Kuwalipikadong Elektrisyan", "Sarili"], en: ["Plumber", "Carpenter", "Qualified Electrician", "Yourself"] }, 
                answer: 2, topic: 'Safety/Repair' 
            },
            { 
                question: { tl: "Kapag may sunog sanhi ng kuryente, ano ang <b>HINDI</b> dapat gawin?", en: "When there is a fire caused by electricity, what should you <b>NOT</b> do?" }, 
                options: { tl: ["Patayin ang main switch.", "Buhusan ng tubig.", "Palabasin ang tao sa bahay.", "Tumawag ng bumbero."], en: ["Turn off the main switch.", "Pour water on it.", "Evacuate people from the house.", "Call the fire department."] }, 
                answer: 1, topic: 'Safety/Fire' 
            },
            { 
                question: { tl: "Ano ang dapat ilagay sa mga walang balot na kable ng kuryente (exposed wires)?", en: "What should be put on exposed wires?" }, 
                options: { tl: ["Plastic bag", "Electrical tape", "Kuko", "Tali"], en: ["Plastic bag", "Electrical tape", "Nail", "Rope"] }, 
                answer: 1, topic: 'Safety/Wiring' 
            },
            { 
                question: { tl: "Bakit hindi dapat maglagay ng metal na bagay sa loob ng isang de-kuryenteng kasangkapan (tulad ng toaster)?", en: "Why should you not put metal objects inside an electrical appliance (like a toaster)?" }, 
                options: { tl: ["Masira ang kasangkapan.", "Magkuryente.", "Maging sanhi ng sunog.", "Lahat ng nabanggit."], en: ["The appliance will break.", "It will cause electric shock.", "It will cause fire.", "All of the above."] }, 
                answer: 3, topic: 'Safety/Metal' 
            }
        ];

        let userAnswers = {}; // {qIndex: selectedOptionIndex}
        const quizName = "Pagsusulit: Ang Elektrisidad at ang mga Gamit Nito";
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
            goBackText().textContent = uiText.goBack[lang];
            submitButton().textContent = uiText.submitButton[lang];
            modalTitle().textContent = uiText.modalTitle[lang];
            modalScoreText().textContent = uiText.modalScoreText[lang];
            modalReviewText().textContent = uiText.modalReviewText[lang];
            recordButtonLink().textContent = uiText.recordButton[lang];
            resetButtonModal().textContent = uiText.resetButton[lang];
        }
        
        /**
         * Renders the quiz questions into the three separate cards based on the previous layout.
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
            
            // Note: Unlike the previous implementation, we don't attempt to re-apply 
            // the 'correct'/'incorrect' visual state after re-rendering upon language switch.
            // The user must reset the quiz to get fresh state.
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
         * Explicitly saves the current quiz result to BOTH storage keys.
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
                userId: USER_ID,             // New: Store User ID for unique filtering in records.php
                userName: USER_NAME,         // Student's name for global view
                userLevel: USER_RAW_LEVEL    // Student's raw level for both views
            };
            
            // --- 2. SAVE TO GLOBAL LOG (For overall.php) ---
            let globalRecords = JSON.parse(localStorage.getItem(GLOBAL_RECORDS_KEY) || '[]');
            globalRecords.push(recordToSave);
            localStorage.setItem(GLOBAL_RECORDS_KEY, JSON.stringify(globalRecords));
            
            // --- 3. SAVE TO USER-SPECIFIC LOG (For records.php) ---
            // This log will be filtered later to only show the LATEST score per quiz (typical user view)
            let userRecords = JSON.parse(localStorage.getItem(USER_RECORDS_KEY) || '[]');
            
            // Remove any existing entry for this specific quiz (upsert logic for user-specific view)
            const quizKey = `${recordToSave.name}-${recordToSave.rawLevelId}`; // Unique identifier for the quiz
            
            // Temporarily use the old upsert logic here to keep the user's dashboard clean
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
         * Now also captures the submission time together with the date.
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
                const correctAnswer = q.answer;
                
                const optionsContainer = document.getElementById(`options-q${index}`);
                const optionButtons = optionsContainer.querySelectorAll('.option-button');

                optionButtons.forEach((btn, oIndex) => {
                    btn.disabled = true;

                    if (oIndex === correctAnswer) {
                        btn.classList.add('correct');
                    } else {
                        btn.classList.remove('correct');
                    }
                    
                    if (oIndex === selectedAnswer && oIndex !== correctAnswer) {
                        btn.classList.add('incorrect');
                    } else {
                        btn.classList.remove('incorrect');
                    }

                    btn.classList.remove('selected');
                });

                if (selectedAnswer === correctAnswer) {
                    correctCount++;
                }
            });

            // Capture exact submission timestamp
            const now = new Date();

            // --- 1. PREPARE THE RESULT OBJECT (includes date + time) ---
            currentQuizResult = {
                name: quizName,
                rawLevelId: quizLevelRawId, 
                level: quizLevelDisplay, 
                score: `${correctCount}/${totalQuestions}`,
                percentage: Math.round((correctCount / totalQuestions) * 100),
                date: now.toLocaleDateString('en-US'),            // e.g. 1/3/2026
                time: now.toLocaleTimeString('en-US'),            // e.g. 2:34:56 PM
                dateTimeISO: now.toISOString()                    // ISO for sorting/filtering if needed
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
            // Note: There's no separate element for the Go Back text span, so we fetch it later
            // We set it to 'tl' initially.
            setLanguage(currentLanguage); // Sets language state, updates static UI, and calls renderQuiz()
        };
    </script>

</body>
</html>
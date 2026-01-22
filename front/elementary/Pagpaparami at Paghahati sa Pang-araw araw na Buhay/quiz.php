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
    <title>Pagsusulit: Pagpaparami at Paghahati sa Pang-araw-araw na Buhay</title>
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
                <h1 class="text-4xl font-extrabold text-primary mb-2" id="quiz-title">Pagsusulit: Pagpaparami at Paghahati sa  <br> Pang-araw-araw na Buhay</h1>
                <p class="text-xl text-gray-600" id="quiz-subtitle">30 Items: Applied Word Problems sa Pera, Oras, at Distansya</p>
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
                    <!-- UPDATED LINK TEXT and REMOVED redundant onclick, as saving is handled in submitQuiz() -->
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
            'quizTitle': { tl: "Pagsusulit: Pagpaparami at Paghahati sa Pang-araw-araw na Buhay", en: "Quiz: Multiplication and Division in Daily Life" },
            'quizSubtitle': { tl: "30 Items: Applied Word Problems sa Pera, Oras, at Distansya", en: "30 Items: Applied Word Problems in Money, Time, and Distance" },
            'goBack': { tl: 'Bumalik', en: 'Go Back' },
            'section1Title': { tl: 'I. Pagpaparami sa Real-Life (Multiplication)', en: 'I. Multiplication in Real-Life' },
            'section2Title': { tl: 'II. Paghahati sa Real-Life (Division)', en: 'II. Division in Real-Life' },
            'section3Title': { tl: 'III. Pinagsamang Suliranin (Combined Word Problems)', en: 'III. Combined Word Problems' },
            'submitButton': { tl: 'Tapusin at Tingnan ang Resulta', en: 'Finish and View Results' },
            'unansweredAlert': { tl: 'Kailangan mo pang sagutan ang', en: 'You still need to answer' },
            'unansweredAlertSuffix': { tl: 'na tanong bago mag-submit.', en: 'questions before submitting.' },
            'modalTitle': { tl: 'Resulta ng Pagsusulit', en: 'Quiz Results' },
            'modalScoreText': { tl: 'Nakakuha ka ng:', en: 'You scored:' },
            'modalReviewText': { tl: 'Tingnan ang iyong mga sagot sa ibaba para matuto.', en: 'Review your answers below to learn.' },
            'recordButton': { tl: 'I-record ang Resulta at Pumunta sa Talaan', en: 'Record Result and Go to Records' }, // Updated text
            'resetButton': { tl: 'Subukan Muli', en: 'Try Again' },
        };

        // --- QUIZ DATA (30 Items Total) - UPDATED FOR TRANSLATION ---
        const quizData = [
            // Section I: Pagpaparami sa Real-Life (Multiplication) - 10 questions
            // Q1: 128 * 4 (Cost of 4 items at P128 each)
            { 
                question: { tl: "Si G. Reyes ay bumili ng 4 na aklat. Kung ang isang aklat ay nagkakahalaga ng P128, magkano ang kabuuang presyo?", en: "Mr. Reyes bought 4 books. If one book costs P128, what is the total price?" }, 
                options: { tl: ["P412", "P502", "P512", "P522"], en: ["P412", "P502", "P512", "P522"] }, 
                answer: 2, topic: 'Multiplication (3x1)' 
            },
            // Q2: 147 * 9 (Saving P147 for 9 weeks)
            { 
                question: { tl: "Si Maria ay nag-iipon ng P147 bawat linggo. Magkano ang maiipon niya sa loob ng 9 na linggo?", en: "Maria saves P147 every week. How much will she save in 9 weeks?" }, 
                options: { tl: ["P1,323", "P1,233", "P1,423", "P1,353"], en: ["P1,323", "P1,233", "P1,423", "P1,353"] }, 
                answer: 0, topic: 'Multiplication (3x1)' 
            },
            // Q3: 758 * 8 (Total distance traveled)
            { 
                question: { tl: "Isang bus ang bumibiyahe ng 758 km bawat araw. Ilang kilometro ang kabuuang biyahe sa loob ng 8 araw?", en: "A bus travels 758 km every day. What is the total distance traveled in 8 days?" }, 
                options: { tl: ["6,064 km", "6,144 km", "5,984 km", "6,204 km"], en: ["6,064 km", "6,144 km", "5,984 km", "6,204 km"] }, 
                answer: 0, topic: 'Multiplication (3x1)' 
            },
            // Q4: 7,250 * 25 (Salary for 25 days)
            { 
                question: { tl: "Ang isang empleyado ay sumusuweldo ng P7,250 kada araw. Magkano ang kikitain niya sa loob ng 25 araw?", en: "An employee earns P7,250 per day. How much will they earn in 25 days?" }, 
                options: { tl: ["P181,250", "P171,150", "P182,500", "P190,150"], en: ["P181,250", "P171,150", "P182,500", "P190,150"] }, 
                answer: 0, topic: 'Multiplication (4x2)' 
            },
            // Q5: 4,629 * 73 (Total production)
            { 
                question: { tl: "Isang pabrika ang gumagawa ng 4,629 na sapatos bawat araw. Ilan ang kabuuang produksyon sa loob ng 73 araw?", en: "A factory produces 4,629 pairs of shoes per day. What is the total production in 73 days?" }, 
                options: { tl: ["337,917", "337,197", "329,917", "340,017"], en: ["337,917", "337,197", "329,917", "340,017"] }, 
                answer: 0, topic: 'Multiplication (4x2)' 
            },
            // Q6: 8,723 * 26 (Total harvest)
            { 
                question: { tl: "Nakakaani ng 8,723 sako ng palay bawat ektarya. Kung may 26 na ektarya, ilan lahat ang aaniin?", en: "8,723 sacks of rice are harvested per hectare. If there are 26 hectares, what is the total harvest?" }, 
                options: { tl: ["226,798 sako", "225,898 sako", "230,000 sako", "227,798 sako"], en: ["226,798 sacks", "225,898 sacks", "230,000 sacks", "227,798 sacks"] }, 
                answer: 0, topic: 'Multiplication (4x2)' 
            },
            // Q7: 26,485 * 609 (Total items in containers)
            { 
                question: { tl: "May 26,485 piraso ng damit sa isang container. Ilan ang kabuuang damit sa 609 na container?", en: "There are 26,485 pieces of clothing in one container. What is the total number of clothes in 609 containers?" }, 
                options: { tl: ["16,129,365", "16,125,365", "16,219,365", "16,009,365"], en: ["16,129,365", "16,125,365", "16,219,365", "16,009,365"] }, 
                answer: 0, topic: 'Multiplication (5x3)' 
            },
            // Q8: 47,601 * 836 (Total cost of bulk order)
            { 
                question: { tl: "Isang kumpanya ang nag-order ng 836 na machine parts. Kung ang bawat part ay P47,601, magkano ang kabuuang halaga?", en: "A company ordered 836 machine parts. If each part costs P47,601, what is the total price?" }, 
                options: { tl: ["P39,794,436", "P39,784,436", "P40,000,000", "P39,694,436"], en: ["P39,794,436", "P39,784,436", "P40,000,000", "P39,694,436"] }, 
                answer: 0, topic: 'Multiplication (5x3)' 
            },
            // Q9: 39,610 * 702 (Total miles flown)
            { 
                question: { tl: "Ang isang eroplano ay lumipad ng 702 na biyahe. Kung 39,610 miles ang bawat biyahe, ilang miles ang kabuuan?", en: "An airplane flew 702 trips. If each trip is 39,610 miles, what is the total number of miles?" }, 
                options: { tl: ["27,806,220 miles", "27,796,220 miles", "27,900,000 miles", "28,006,220 miles"], en: ["27,806,220 miles", "27,796,220 miles", "27,900,000 miles", "28,006,220 miles"] }, 
                answer: 0, topic: 'Multiplication (5x3)' 
            },
            // Q10: 90,352 * 245 (Total population calculation)
            { 
                question: { tl: "Sa isang census, natukoy na 90,352 ang bilang ng pamilya. Kung ang bawat pamilya ay may average na 245 miyembro, ilan ang kabuuang populasyon?", en: "In a census, 90,352 families were counted. If each family has an average of 245 members, what is the total population?" }, 
                options: { tl: ["22,136,240", "22,146,240", "22,236,240", "22,036,240"], en: ["22,136,240", "22,146,240", "22,236,240", "22,036,240"] }, 
                answer: 0, topic: 'Multiplication (5x3)' 
            },

            // Section II: Paghahati sa Real-Life (Division) - 10 questions
            // Q11: 765 / 9 (Sharing money equally)
            { 
                question: { tl: "Si Aling Nena ay may P765 na kailangan hatiin sa 9 na apo. Magkano ang matatanggap ng bawat apo?", en: "Aling Nena has P765 that needs to be divided among 9 grandchildren. How much will each grandchild receive?" }, 
                options: { tl: ["P75", "P80", "P85", "P90"], en: ["P75", "P80", "P85", "P90"] }, 
                answer: 2, topic: 'Division (3x1)' 
            },
            // Q12: 524 / 4 (Average distance)
            { 
                question: { tl: "Isang runner ang tumakbo ng 524 km sa loob ng 4 na araw. Ilang kilometro ang average na tinakbo niya kada araw?", en: "A runner ran 524 km in 4 days. What is the average distance they ran per day?" }, 
                options: { tl: ["131 km", "130 km", "136 km", "141 km"], en: ["131 km", "130 km", "136 km", "141 km"] }, 
                answer: 0, topic: 'Division (3x1)' 
            },
            // Q13: 423 / 5 (Dividing fruits into baskets)
            { 
                question: { tl: "Ilang basket ng 5 mansanas ang mapupuno mula sa 423 na mansanas, at ilan ang matitira?", en: "How many baskets holding 5 apples each can be filled from 423 apples, and how many will be left over?" }, 
                options: { tl: ["84 R 3", "84 R 2", "85 R 3", "85 R 2"], en: ["84 R 3", "84 R 2", "85 R 3", "85 R 2"] }, 
                answer: 0, topic: 'Division (with Remainder)' 
            },
            // Q14: 827 / 7 (Dividing students into sections)
            { 
                question: { tl: "Ang isang paaralan ay may 827 estudyante. Kung ang bawat section ay may 7 estudyante, ilang section ang mabubuo at ilan ang matitira?", en: "A school has 827 students. If each section has 7 students, how many sections can be formed and how many will be left over?" }, 
                options: { tl: ["118 R 1", "117 R 1", "118 R 2", "117 R 2"], en: ["118 R 1", "117 R 1", "118 R 2", "117 R 2"] }, 
                answer: 0, topic: 'Division (with Remainder)' 
            },
            // Q15: 3,024 / 84 (Packing items)
            { 
                question: { tl: "Ilang kahon ang kailangan upang mapuno ang 3,024 na aklat kung ang bawat kahon ay may 84 na aklat?", en: "How many boxes are needed to pack 3,024 books if each box holds 84 books?" }, 
                options: { tl: ["34", "36", "38", "40"], en: ["34", "36", "38", "40"] }, 
                answer: 1, topic: 'Division (4x2)' 
            },
            // Q16: 14,768 / 378 (Dividing travelers into buses)
            { 
                question: { tl: "Ilang bus ang kakailanganin para sa 14,768 na manlalakbay kung ang bawat bus ay may 378 na upuan, at ilang tao ang matitira?", en: "How many buses are needed for 14,768 travelers if each bus has 378 seats, and how many people will be left over?" }, 
                options: { tl: ["39 R 26", "38 R 26", "39 R 34", "40 R 26"], en: ["39 R 26", "38 R 26", "39 R 34", "40 R 26"] }, 
                answer: 0, topic: 'Division (5x3 with Remainder)' 
            },
            // Q17: 2,659 / 43 (Calculating price per unit)
            { 
                question: { tl: "Isang kumpanya ang bumili ng 43 na printer sa kabuuang halaga na P2,659. Magkano ang bawat unit, at magkano ang naging sukli?", en: "A company bought 43 printers for a total cost of P2,659. What is the price per unit, and what was the remainder?" }, 
                options: { tl: ["P61 R 36", "P62 R 36", "P61 R 26", "P60 R 36"], en: ["P61 R 36", "P62 R 36", "P61 R 26", "P60 R 36"] }, 
                answer: 0, topic: 'Division (4x2 with Remainder)' 
            },
            // Q18: 47,253 / 829 (Finding average output)
            { 
                question: { tl: "Sa loob ng 829 araw, nakagawa ang pabrika ng 47,253 na produkto. Ilan ang average na gawa kada araw?", en: "In 829 days, the factory produced 47,253 products. What is the average production per day?" }, 
                options: { tl: ["55", "56", "57", "58"], en: ["55", "56", "57", "58"] }, 
                answer: 2, topic: 'Division (5x3)' 
            },
            // Q19: 3,905 / 55 (Calculating trips)
            { 
                question: { tl: "Kung ang isang kargamento ay may 3,905 na tonelada at ang trak ay kaya lang magdala ng 55 tonelada bawat biyahe, ilang biyahe ang kailangan?", en: "If a cargo weighs 3,905 tons and the truck can only carry 55 tons per trip, how many trips are needed?" }, 
                options: { tl: ["70 R 5", "71 R 0", "71 R 5", "70 R 0"], en: ["70 R 5", "71 R 0", "71 R 5", "70 R 0"] }, 
                answer: 1, topic: 'Division (4x2)' 
            },
            // Q20: 84,328 / 327 (Dividing total cost)
            { 
                question: { tl: "Ang kabuuang gastos para sa 327 na empleyado ay P84,328. Magkano ang gastos para sa bawat empleyado, at ilan ang matitira?", en: "The total cost for 327 employees is P84,328. What is the cost per employee, and what is the remainder?" }, 
                options: { tl: ["257 R 289", "258 R 289", "257 R 279", "256 R 289"], en: ["257 R 289", "258 R 289", "257 R 279", "256 R 289"] }, 
                answer: 0, topic: 'Division (5x3 with Remainder)' 
            },

            // Section III: Pinagsamang Suliranin (Combined Word Problems) - 10 questions
            // Q21: Multiplication (P589 * 7) (Cost of 7 items)
            { 
                question: { tl: "Magkano ang kabuuang halaga ng 7 lata ng gatas kung P589 ang bawat lata?", en: "What is the total cost of 7 cans of milk if each can costs P589?" }, 
                options: { tl: ["P4,123", "P4,023", "P4,223", "P4,193"], en: ["P4,123", "P4,023", "P4,223", "P4,193"] }, 
                answer: 0, topic: 'Multiplication Word Problem' 
            },
            // Q22: Multiplication (P12,450 * 14) (Cost of 14 items)
            { 
                question: { tl: "Magkano ang 14 na aircon unit kung P12,450 ang bawat isa?", en: "How much are 14 aircon units if each one costs P12,450?" }, 
                options: { tl: ["P174,300", "P173,300", "P184,300", "P175,000"], en: ["P174,300", "P173,300", "P184,300", "P175,000"] }, 
                answer: 0, topic: 'Multiplication Word Problem' 
            },
            // Q23: Division (P37,392 / 12) (Monthly installment)
            { 
                question: { tl: "Magkano ang buwanang hulog sa loob ng 12 buwan kung P37,392 ang kabuuang utang?", en: "What is the monthly installment for 12 months if the total debt is P37,392?" }, 
                options: { tl: ["P3,116", "P3,016", "P3,156", "P3,200"], en: ["P3,116", "P3,016", "P3,156", "P3,200"] }, 
                answer: 0, topic: 'Division Word Problem' 
            },
            // Q24: Division (P16,095 / 37) (Price per unit)
            { 
                question: { tl: "Magkano ang halaga ng bawat upuan kung P16,095 ang kabuuang presyo ng 37 upuan?", en: "What is the cost of each chair if the total price of 37 chairs is P16,095?" }, 
                options: { tl: ["P435", "P445", "P455", "P430"], en: ["P435", "P445", "P455", "P430"] }, 
                answer: 0, topic: 'Division Word Problem' 
            },
            // Q25: Multiplication (P17 * 250) (Total cost of bulk item)
            { 
                question: { tl: "Magkano ang ginugol sa 250 kilo ng bigas kung P17 ang bawat kilo?", en: "How much was spent on 250 kilograms of rice if each kilogram costs P17?" }, 
                options: { tl: ["P4,250", "P4,350", "P4,050", "P4,500"], en: ["P4,250", "P4,350", "P4,050", "P4,500"] }, 
                answer: 0, topic: 'Multiplication Word Problem' 
            },
            // Q26: Multiplication (P7,680 * 16) (Total earnings)
            { 
                question: { tl: "Magkano ang kikitain sa loob ng 16 na buwan kung P7,680 ang kita kada buwan?", en: "How much will be earned in 16 months if the income is P7,680 per month?" }, 
                options: { tl: ["P122,880", "P123,880", "P125,000", "P120,880"], en: ["P122,880", "P123,880", "P125,000", "P120,880"] }, 
                answer: 0, topic: 'Multiplication Word Problem' 
            },
            // Q27: Division (P840 / 7) (Daily allowance)
            { 
                question: { tl: "Magkano ang kailangang ilaan na panggastos sa araw-araw kung P840 ang allowance sa loob ng 7 araw?", en: "How much needs to be allocated for daily expenses if the allowance is P840 for 7 days?" }, 
                options: { tl: ["P120", "P115", "P130", "P125"], en: ["P120", "P115", "P130", "P125"] }, 
                answer: 0, topic: 'Division Word Problem' 
            },
            // Q28: Division (P2,856 / 24) (Price per item)
            { 
                question: { tl: "Magkano ang halaga ng isang kahon ng gatas kung P2,856 ang kabuuang halaga ng 24 na kahon?", en: "What is the cost of one carton of milk if the total cost of 24 cartons is P2,856?" }, 
                options: { tl: ["P119", "P129", "P118", "P120"], en: ["P119", "P129", "P118", "P120"] }, 
                answer: 0, topic: 'Division Word Problem' 
            },
            // Q29: Multiplication (P13,690 * 24) (Total long-term earnings)
            { 
                question: { tl: "Magkano ang kikitain ni G. Cruz sa loob ng 24 na buwan kung P13,690 ang buwanang kita?", en: "How much will Mr. Cruz earn in 24 months if the monthly income is P13,690?" }, 
                options: { tl: ["P328,560", "P327,560", "P330,000", "P325,560"], en: ["P328,560", "P327,560", "P330,000", "P325,560"] }, 
                answer: 0, topic: 'Multiplication Word Problem' 
            },
            // Q30: Division (P1,845 / 15) (Price per kilo)
            { 
                question: { tl: "Magkano ang isang kilo ng karne ng baka kung P1,845 ang kabuuang presyo ng 15 kilo?", en: "What is the price per kilogram of beef if the total price for 15 kilograms is P1,845?" }, 
                options: { tl: ["P123", "P120", "P125", "P133"], en: ["P123", "P120", "P125", "P133"] }, 
                answer: 0, topic: 'Division Word Problem' 
            }
        ];

        let userAnswers = {}; // {qIndex: selectedOptionIndex}
        const quizName = "Pagsusulit: Pagpaparami at Paghahati sa Pang-araw-araw na Buhay";
        const quizLevelRawId = "elementary"; 
        const quizLevelDisplay = "Elementary"; 
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
            // Use quizName and quizLevelRawId for unique identification
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
                time: now.toLocaleTimeString('en-US'),
                submittedAt: now.toISOString()
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
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
    <title>Pagsusulit: Matematikang Pangkalakal 2</title>
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
                <h1 class="text-4xl font-extrabold text-primary mb-2" id="quiz-title">Pagsusulit: Matematikang Pangkalakal 2</h1>
                <p class="text-xl text-gray-600" id="quiz-subtitle">30 Items: Tubo, Balanse, Kita, at Badyet</p>
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
            'quizTitle': { tl: "Pagsusulit: Matematikang Pangkalakal 2", en: "Quiz: Business Mathematics 2" },
            'quizSubtitle': { tl: "30 Items: Tubo, Balanse, Kita, at Badyet", en: "30 Items: Profit, Balance, Income, and Budget" },
            'goBack': { tl: 'Bumalik', en: 'Go Back' },
            'section1Title': { tl: 'I. Aralin 1: Pagtutuos ng Tinubo at Pagkalugi', en: 'I. Lesson 1: Calculating Profit and Loss' },
            'section2Title': { tl: 'II. Aralin 2: Balance Sheet at Pahayag ng Kita', en: 'II. Lesson 2: Balance Sheet and Income Statement' },
            'section3Title': { tl: 'III. Aralin 3: Paghahanda ng Badyet at Paglago', en: 'III. Lesson 3: Budgeting and Growth' },
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
        const quizData = [
            // Section I: Aralin 1 - Pagtutuos ng Tinubo at Pagkalugi (1-10)
            { 
                question: { tl: "Ano ang tawag sa lahat ng halagang tinanggap mula sa pagtitinda?", en: "What is the term for all amounts received from sales?" },
                options: { tl: ["Netong Kita", "Kabuuang Kita (Gross Income)", "Gastusin sa Pagpapalakad", "Pagkalugi"], en: ["Net Income", "Gross Income", "Operating Expenses", "Loss"] }, 
                answer: 1, topic: 'Aralin 1: Gross Income' 
            },
            { 
                question: { tl: "Ano ang formula upang makuha ang Kabuuang Kita (Tubo)?", en: "What is the formula to calculate Gross Profit?" }, 
                options: { tl: ["Halaga ng Pagkakabili \u2013 Halaga ng Paninda", "Halaga ng Paninda + Gastusin", "Halaga ng Paninda \u2013 Halaga ng Pagkakabili", "Kapital \u2013 Gastos"], en: ["Cost of Sales \u2013 Cost of Merchandise", "Cost of Merchandise + Expenses", "Selling Price \u2013 Cost of Sales", "Capital \u2013 Cost"] }, 
                answer: 2, topic: 'Aralin 1: Gross Profit Formula' 
            },
            { 
                question: { tl: "Si Carlo ay nagbenta ng T-shirt sa \u20b1100.00 bawat isa na binili niya sa halagang \u20b175.00. Magkano ang kanyang Kabuuang Kita (Tubo) sa bawat T-shirt?", en: "Carlo sold a T-shirt for \u20b1100.00 which he bought for \u20b175.00. How much is his Gross Profit per T-shirt?" }, 
                options: { tl: ["\u20b1100.00", "\u20b175.00", "\u20b125.00", "\u20b1175.00"], en: ["\u20b1100.00", "\u20b175.00", "\u20b125.00", "\u20b1175.00"] }, 
                answer: 2, topic: 'Aralin 1: Gross Profit Calculation' 
            }, // 100 - 75 = 25
            { 
                question: { tl: "Si Katrina ay nakabenta ng kendi na nagkakahalaga ng \u20b1250.00. Ang tunay na halaga ng kending ito ay \u20b1150.00 at ang gastos sa pagpapalakad ay \u20b125.00. Ano ang kanyang Netong Kita?", en: "Katrina sold candy worth \u20b1250.00. The actual cost of the candy was \u20b1150.00 and the operating expense was \u20b125.00. What is her Net Income?" }, 
                options: { tl: ["\u20b125.00", "\u20b175.00", "\u20b1100.00", "\u20b1125.00"], en: ["\u20b125.00", "\u20b175.00", "\u20b1100.00", "\u20b1125.00"] }, 
                answer: 1, topic: 'Aralin 1: Net Income Calculation' 
            }, // 250 - (150 + 25) = 75
            { 
                question: { tl: "Ano ang ibig sabihin kung ang resulta ng Netong Kita ay may negatibong tanda (hal. -\u20b15)?", en: "What does it mean if the Net Income result has a negative sign (e.g., -\u20b15)?" }, 
                options: { tl: ["May kita siya na \u20b15", "Wala siyang kinita at wala ring nalugi", "Nalugi siya ng \u20b15", "Hindi tumutukoy sa negosyo"], en: ["She has a profit of \u20b15", "She neither earned nor lost money", "She had a loss of \u20b15", "Not applicable to business"] }, 
                answer: 2, topic: 'Aralin 1: Loss Identification' 
            },
            { 
                question: { tl: "Ang pagawaan ng relo ni Anton ay kumita ng \u20b1700.00. Ang kanyang gastusin ay \u20b1200.00 (sahod), \u20b1200.00 (renta), \u20b150.00 (ilaw), at \u20b175.00 (kuryente). Ano ang kanyang Netong Kita? (Gamitin ang: \u20b1200 sahod sa bawat assistant, may 2 assistant.)", en: "Anton's watch workshop earned \u20b1700.00. His expenses are \u20b1200.00 (salary), \u20b1200.00 (rent), \u20b150.00 (light), and \u20b175.00 (electricity). What is his Net Income? (Use: \u20b1200 salary per assistant, with 2 assistants.)" }, 
                options: { tl: ["\u20b125.00", "-\u20b125.00", "\u20b1175.00", "-\u20b1275.00"], en: ["\u20b125.00", "-\u20b125.00", "\u20b1175.00", "-\u20b1275.00"] }, 
                answer: 1, topic: 'Aralin 1: Net Income Calculation' 
            }, // 700 - (200*2 + 200 + 50 + 75) = 700 - 725 = -25
            { 
                question: { tl: "Ano ang tawag sa gastos tulad ng sahod ng manggagawa, upa, insurance, at bayad sa ilaw at tubig na kailangan upang ang negosyo ay tumakbo nang maayos?", en: "What are costs like worker salaries, rent, insurance, and utility bills needed for the business to run smoothly?" }, 
                options: { tl: ["Gastos sa Pagbebenta", "Kita ng May-ari", "Gastos sa Kapital", "Gastusin sa Pagpapalakad (Overhead Cost)"], en: ["Selling Costs", "Owner's Income", "Capital Cost", "Operating Expenses (Overhead Cost)"] }, 
                answer: 3, topic: 'Aralin 1: Operating Cost Definition' 
            },
            { 
                question: { tl: "Kung ang Kabuuang Kita ay \u20b15,000 at ang Gastusin (Aktwal na Halaga ng Paninda + Gastusin sa Pagpapalakad) ay \u20b15,000, ano ang Netong Kita? ", en: "If the Gross Profit is \u20b15,000 and the Total Expenses (Actual Cost of Goods + Operating Expenses) are \u20b15,000, what is the Net Income?" }, 
                options: { tl: ["\u20b11,000", "\u20b1500", "\u20b10 (Break-even)", "-\u20b1500"], en: ["\u20b11,000", "\u20b1500", "\u20b10 (Break-even)", "-\u20b1500"] }, 
                answer: 2, topic: 'Aralin 1: Break-even' 
            },
            { 
                question: { tl: "Ang \u20b110,000 na inilagay ni Mang Nilo sa kanyang tindahan ay tinatawag na:", en: "The \u20b110,000 invested by Mang Nilo in his store is called:" }, 
                options: { tl: ["Ari-arian", "Obligasyon", "Kapital", "Imbentaryo"], en: ["Assets", "Liabilities", "Capital", "Inventory"] }, 
                answer: 2, topic: 'Aralin 1: Capital Definition' 
            },
            { 
                question: { tl: "Alin sa mga sumusunod ang itinuturing na pirmihang ari-arian (fixed asset)?", en: "Which of the following is considered a fixed asset?" }, 
                options: { tl: ["Cash Register", "Mga panindang delata", "Salaping Hawak", "Pautang na Matatanggap"], en: ["Cash Register", "Canned goods inventory", "Cash on Hand", "Accounts Receivable"] }, 
                answer: 0, topic: 'Aralin 1: Fixed Assets' 
            },

            // Section II: Aralin 2 - Balance Sheet at Pahayag ng Kita (11-20)
            { 
                question: { tl: "Anong ulat ang nagbibigay sa may-ari ng negosyo ng pinansiyal na kalagayan o posisyon ng negosyo sa tiyak na petsa?", en: "What report gives the business owner the financial condition or position of the business on a specific date?" }, 
                options: { tl: ["Pahayag ng Kita", "Badyet", "Balance Sheet", "Ulat ng Pagkalugi"], en: ["Income Statement", "Budget", "Balance Sheet", "Loss Report"] }, 
                answer: 2, topic: 'Aralin 2: Balance Sheet Definition' 
            },
            { 
                question: { tl: "Alin sa mga sumusunod ang hindi isang katanungan na sinasagot ng Balance Sheet?", en: "Which of the following is NOT a question answered by the Balance Sheet?" }, 
                options: { tl: ["Magkano ang pag-aari ng negosyo?", "Magkano ang utang ng negosyo?", "Magkano ang kinikita ng negosyo sa pagbebenta?", "Ano ang halaga ng pinansiyal na interes ko sa negosyo?"], en: ["How much does the business own (Assets)?", "How much does the business owe (Liabilities)?", "How much income does the business generate from sales?", "What is the value of my financial interest in the business (Equity)?"] }, 
                answer: 2, topic: 'Aralin 2: Balance Sheet Function' 
            },
            { 
                question: { tl: "Ano ang tawag sa ari-arian na maaaring handang mapalitan ng salapi, tulad ng Salaping Hawak at Imbentaryo?", en: "What is the term for assets that can readily be converted into cash, such as Cash on Hand and Inventory?" }, 
                options: { tl: ["Pirmihang Ari-arian", "Liquid Assets (Kasalukuyang Ari-arian)", "Equity ng May-ari", "Obligasyon"], en: ["Fixed Assets", "Current Assets (Liquid Assets)", "Owner's Equity", "Liabilities"] }, 
                answer: 1, topic: 'Aralin 2: Current Assets' 
            },
            { 
                question: { tl: "Ano ang pormula sa pagkuha ng Kabuuang Ari-arian (Total Assets)?", en: "What is the formula to calculate Total Assets?" }, 
                options: { tl: ["Kapital + Netong Kita", "Netong Benta \u2013 Halaga ng Produkto", "Kasalukuyang Ari-arian + Pirmihang Ari-arian", "Utang na Babayaran + Notes Payable"], en: ["Capital + Net Income", "Net Sales \u2013 Cost of Goods", "Current Assets + Fixed Assets", "Accounts Payable + Notes Payable"] }, 
                answer: 2, topic: 'Aralin 2: Total Assets Formula' 
            },
            { 
                question: { tl: "Ang XYZ Company ay may Salaping Hawak na \u20b15,000, Pautang na Matatanggap na \u20b17,500, at Imbentaryo na \u20b16,000. Ano ang Kabuuang Kasalukuyang Ari-arian?", en: "XYZ Company has Cash on Hand of \u20b15,000, Accounts Receivable of \u20b17,500, and Inventory of \u20b16,000. What are the Total Current Assets?" }, 
                options: { tl: ["\u20b111,000", "\u20b112,500", "\u20b118,500", "\u20b122,000"], en: ["\u20b111,000", "\u20b112,500", "\u20b118,500", "\u20b122,000"] }, 
                answer: 2, topic: 'Aralin 2: Current Assets Calculation' 
            }, // 5000 + 7500 + 6000 = 18500
            { 
                question: { tl: "Ang Utang na Babayaran ay \u20b13,000 at ang Notes Payable ay \u20b12,000. Magkano ang Kabuuang Obligasyon?", en: "Accounts Payable is \u20b13,000 and Notes Payable is \u20b12,000. What are the Total Liabilities?" }, 
                options: { tl: ["\u20b11,000", "\u20b15,000", "\u20b16,000", "\u20b17,000"], en: ["\u20b11,000", "\u20b15,000", "\u20b16,000", "\u20b17,000"] }, 
                answer: 1, topic: 'Aralin 2: Total Liabilities Calculation' 
            }, // 3000 + 2000 = 5000
            { 
                question: { tl: "Si Mang Juan ay may Kapital na \u20b120,000 at Netong Kita na \u20b11,000. Magkano ang Ekidad ng May-ari?", en: "Mang Juan has Capital of \u20b120,000 and Net Income of \u20b11,000. What is the Owner's Equity?" }, 
                options: { tl: ["\u20b119,000", "\u20b120,000", "\u20b121,000", "\u20b122,000"], en: ["\u20b119,000", "\u20b120,000", "\u20b121,000", "\u20b122,000"] }, 
                answer: 2, topic: 'Aralin 2: Owner\'s Equity Calculation' 
            }, // 20000 + 1000 = 21000
            { 
                question: { tl: "Ano ang tawag sa ulat na nagpapakita kung magkano ang kinita (tubo) o nalugi ng negosyo sa loob ng isang linggo o buwan?", en: "What is the term for the report that shows how much the business earned (profit) or lost over a week or month?" }, 
                options: { tl: ["Balance Sheet", "Badyet", "Ekidad ng May-ari", "Pahayag ng Kita (Income Statement)"], en: ["Balance Sheet", "Budget", "Owner's Equity", "Income Statement"] }, 
                answer: 3, topic: 'Aralin 2: Income Statement Definition' 
            },
            { 
                question: { tl: "Ano ang pormula upang makuha ang Netong Benta (Net Sales)?", en: "What is the formula to calculate Net Sales?" }, 
                options: { tl: ["Naipagbili + Ibinalik at Tawad", "Naipagbili \u2013 Huling Imbentaryo", "Naipagbili \u2013 Ibinalik at Tawad", "Naipagbili \u2013 Gastusin"], en: ["Gross Sales + Returns and Allowances", "Gross Sales \u2013 Ending Inventory", "Gross Sales \u2013 Returns and Allowances", "Gross Sales \u2013 Expenses"] }, 
                answer: 2, topic: 'Aralin 2: Net Sales Formula' 
            },
            { 
                question: { tl: "Ang Panimulang Imbentaryo ni Pacing ay \u20b14,500, Pinamili ay \u20b1600, at Huling Imbentaryo ay \u20b12,000. Magkano ang Halaga ng Produktong Naibenta?", en: "Pacing's Beginning Inventory is \u20b14,500, Purchases are \u20b1600, and Ending Inventory is \u20b12,000. What is the Cost of Goods Sold?" }, 
                options: { tl: ["\u20b12,900", "\u20b13,100", "\u20b15,100", "\u20b17,100"], en: ["\u20b12,900", "\u20b13,100", "\u20b15,100", "\u20b17,100"] }, 
                answer: 1, topic: 'Aralin 2: Cost of Goods Sold' 
            }, // (4500 + 600) - 2000 = 3100

            // Section III: Aralin 3 - Badyet at Paglago (21-30)
            { 
                question: { tl: "Ano ang tawag sa tiyak na halaga ng pera na inilalaan para sa negosyo upang maiwasan ang labis na paggastos?", en: "What is the term for a specific amount of money allocated for the business to prevent overspending?" }, 
                options: { tl: ["Kapital", "Ekidad ng May-ari", "Badyet", "Pagkalugi"], en: ["Capital", "Owner's Equity", "Budget", "Loss"] }, 
                answer: 2, topic: 'Aralin 3: Budget Definition' 
            },
            { 
                question: { tl: "Si Pacing ay nagbebenta ng halo-halo. Kung \u20b19.00 ang gastos bawat baso at ibebenta niya ito sa \u20b112.00, magkano ang kikitain niya sa bawat baso?", en: "Pacing sells halo-halo. If the cost per glass is \u20b19.00 and she sells it for \u20b112.00, how much profit will she earn per glass?" }, 
                options: { tl: ["\u20b11.00", "\u20b12.00", "\u20b13.00", "\u20b14.00"], en: ["\u20b11.00", "\u20b12.00", "\u20b13.00", "\u20b14.00"] }, 
                answer: 2, topic: 'Aralin 3: Budgeted Profit' 
            }, // 12 - 9 = 3
            { 
                question: { tl: "Kung ang badyet ni Pacing para sa halaga ng paninda ay \u20b1900.00 (para sa 100 baso), at \u20b1100.00 para sa gastos sa pangangasiwa, ano ang Kabuuang Badyet na Gastusin?", en: "If Pacing's budget for cost of goods is \u20b1900.00 (for 100 glasses), and \u20b1100.00 for administrative expenses, what is the Total Budgeted Cost?" }, 
                options: { tl: ["\u20b1100.00", "\u20b1900.00", "\u20b11,000.00", "\u20b11,900.00"], en: ["\u20b1100.00", "\u20b1900.00", "\u20b11,000.00", "\u20b11,900.00"] }, 
                answer: 2, topic: 'Aralin 3: Total Budgeted Cost' 
            }, // 900 + 100 = 1000
            { 
                question: { tl: "Ano ang tawag sa paghahambing ng halaga ng panindang naibenta sa kinita at pag-alam sa tubo, na ginagawa araw-araw para sa kaukulang pagbabago?", en: "What is the comparison of the value of goods sold to the earnings and determining profit, done daily for corresponding adjustments?" }, 
                options: { tl: ["Pagtantiya ng Paglago", "Pagpapahayag ng Kita", "Pagsubaybay sa Badyet (Monitoring)", "Balanseng Komputasyon"], en: ["Growth Projection", "Income Statement Preparation", "Budget Monitoring", "Balance Computation"] }, 
                answer: 2, topic: 'Aralin 3: Budget Monitoring' 
            },
            { 
                question: { tl: "Ayon sa patnubay sa badyet, kailangang isaalang-alang ang lahat ng sanhi na nakaaapekto sa negosyo maliban sa:", en: "According to budget guidelines, all factors affecting the business should be considered EXCEPT:" }, 
                options: { tl: ["Presyo ng mga kakumpetensiya", "Mga nasirang paninda", "Halaga ng pagkakabili", "Kulay ng tanda ng tindahan"], en: ["Competitor pricing", "Damaged goods", "Purchase price", "Store sign color"] }, 
                answer: 3, topic: 'Aralin 3: Budget Guidelines' 
            },
            { 
                question: { tl: "Si Josefa ay kumikita ng \u20b1100.00 isang araw sa pagtitinda ng banana cue (5 beses sa isang linggo). Magkano ang kikitain niya sa loob ng isang buwan (4 na linggo)?", en: "Josefa earns \u20b1100.00 a day selling banana cue (5 times a week). How much will she earn in one month (4 weeks)?" }, 
                options: { tl: ["\u20b1400.00", "\u20b1500.00", "\u20b12,000.00", "\u20b12,400.00"], en: ["\u20b1400.00", "\u20b1500.00", "\u20b12,000.00", "\u20b12,400.00"] }, 
                answer: 2, topic: 'Aralin 3: Monthly Income Calculation' 
            }, // 100 * 5 * 4 = 2000
            { 
                question: { tl: "Kung ang isang negosyo ay mayroong napakaliit na kita (mababa sa \u20b11,500/buwan) o pagkalugi, ano ang indikasyon nito para sa paglago sa hinaharap?", en: "If a business has very low profit (less than \u20b11,500/month) or a loss, what does this indicate for future growth?" }, 
                options: { tl: ["Siguradong lalago", "Malakas na paglaki", "Hindi indikasyon ng magandang paglago", "Wala itong epekto"], en: ["Will definitely grow", "Strong growth", "Not an indication of good growth", "It has no effect"] }, 
                answer: 2, topic: 'Aralin 3: Growth Indication' 
            },
            { 
                question: { tl: "Ang pagdaragdag ng bahagi ng tubo sa negosyo bilang kapital o panimulang imbentaryo ay ginagawa upang:", en: "Adding a portion of the profit back into the business as capital or starting inventory is done to:" }, 
                options: { tl: ["Mabawasan ang pagkalugi", "Mabawi ang puhunan", "Maiiwasan ang labis na paggastos", "Mapalaki ang benta sa hinaharap"], en: ["Reduce loss", "Recover investment", "Avoid overspending", "Increase future sales"] }, 
                answer: 3, topic: 'Aralin 3: Reinvestment' 
            },
            { 
                question: { tl: "Si Mang Tibo ay kumikita ng \u20b1200.00 isang araw (7 araw sa isang linggo). Magkano ang kikitain niya sa isang buwan (4 na linggo)?", en: "Mang Tibo earns \u20b1200.00 a day (7 days a week). How much will he earn in one month (4 weeks)?" }, 
                options: { tl: ["\u20b1800.00", "\u20b12,800.00", "\u20b15,600.00", "\u20b18,000.00"], en: ["\u20b1800.00", "\u20b12,800.00", "\u20b15,600.00", "\u20b18,000.00"] }, 
                answer: 2, topic: 'Aralin 3: Monthly Income Calculation' 
            }, // 200 * 7 * 4 = 5600
            { 
                question: { tl: "Bakit kailangang maghanda at mag-analisa ang isang negosyante ng badyet, pahayag ng kita, at balance sheet?", en: "Why does a business owner need to prepare and analyze a budget, income statement, and balance sheet?" }, 
                options: { tl: ["Para makabawas ng buwis", "Para makuha ang atensyon ng bangko", "Para matantiya ang paglago ng negosyo sa hinaharap", "Para makapagbigay ng tawad sa mamimili"], en: ["To reduce tax", "To get the attention of the bank", "To estimate future business growth", "To give discounts to customers"] }, 
                answer: 2, topic: 'Aralin 3: Analysis Purpose' 
            }
        ];

        let userAnswers = {}; // {qIndex: selectedOptionIndex}
        const quizName = "Pagsusulit: Matematikang Pangkalakal 2";
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
            let section1Content = ''; // Aralin 1 (Q1-Q10)
            let section2Content = ''; // Aralin 2 (Q11-Q20)
            let section3Content = ''; // Aralin 3 (Q21-Q30)

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
         * Time format changed to 12-hour (AM/PM).
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
                // Optional ISO timestamp for programmatic sorting/filtering
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
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
    <title>Pagsusulit: Matematikang Pangkalakal 1</title>
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
                <h1 class="text-4xl font-extrabold text-primary mb-2" id="quiz-title">Pagsusulit: Matematikang Pangkalakal 1</h1>
                <p class="text-xl text-gray-600" id="quiz-subtitle">30 Items: Interes, Kombersiyon, at Buwis</p>
            </div>
            
            <!-- Language Selector (Restored/Added) -->
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
            'quizTitle': { tl: "Pagsusulit: Matematikang Pangkalakal 1", en: "Quiz: Business Mathematics 1" },
            'quizSubtitle': { tl: "30 Items: Interes, Kombersiyon, at Buwis", en: "30 Items: Interest, Conversion, and Tax" },
            'goBack': { tl: 'Bumalik', en: 'Go Back' },
            'section1Title': { tl: 'I. Aralin 1: Pagtutuos ng Interes at Buwanang Hulog', en: 'I. Lesson 1: Interest and Monthly Installment Calculation' },
            'section2Title': { tl: 'II. Aralin 2: Kombersiyon ng Pananalapi', en: 'II. Lesson 2: Currency Conversion' },
            'section3Title': { tl: 'III. Aralin 3: Pagtutuos ng Buwis', en: 'III. Lesson 3: Tax Calculation' },
            'submitButton': { tl: 'Tapusin at Tingnan ang Resulta', en: 'Finish and View Results' },
            'unansweredAlert': { tl: 'Kailangan mo pang sagutan ang', en: 'You still need to answer' },
            'unansweredAlertSuffix': { tl: 'na tanong bago mag-submit.', en: 'questions before submitting.' },
            'modalTitle': { tl: 'Resulta ng Pagsusulit', en: 'Quiz Results' },
            'modalScoreText': { tl: 'Nakakuha ka ng:', en: 'You scored:' },
            'modalReviewText': { tl: 'Tingnan ang iyong mga sagot sa ibaba para matuto.', en: 'Review your answers below to learn.' },
            'recordButton': { tl: 'I-record ang Resulta at Pumunta sa Talaan', en: 'Record Result and Go to Records' }, // UPDATED TEXT
            'resetButton': { tl: 'Subukan Muli', en: 'Try Again' },
        };
        
        // --- QUIZ DATA (30 Items Total) - UPDATED FOR TRANSLATION ---
        // Based on: Matematikang Pangkalakal 1 (Interes, Kombersiyon ng Pananalapi, Pagtutuos ng Buwis)
        
        const quizData = [
            // Section I: Aralin 1 - Pagtutuos ng Interes at Buwanang Hulog (1-10)
            { 
                question: { tl: "Ano ang pormula sa pagkuha ng <b>Payak na Interes (I)</b>?", en: "What is the formula for calculating <b>Simple Interest (I)</b>?" }, 
                options: { tl: ["I = P + R + T", "I = P / R T", "I = P \u00d7 R \u00d7 T", "A = P + I"], en: ["I = P + R + T", "I = P / R T", "I = P \u00d7 R \u00d7 T", "A = P + I"] }, 
                answer: 2, topic: 'Simple Interest Formula' 
            },
            { 
                question: { tl: "Si Philip ay humiram ng \u20b16,000 (P) sa loob ng 6 na buwan (T) na may payak na interes na 5% (R) bawat taon. Magkano ang interes (I) na babayaran niya?", en: "Philip borrowed \u20b16,000 (P) for 6 months (T) at a simple interest rate of 5% (R) per year. How much interest (I) will he pay?" }, 
                options: { tl: ["\u20b160.00", "\u20b1150.00", "\u20b1300.00", "\u20b1600.00"], en: ["\u20b160.00", "\u20b1150.00", "\u20b1300.00", "\u20b1600.00"] }, 
                answer: 1, topic: 'Simple Interest Calculation' 
            }, // 6000 * 0.05 * 0.5 = 150
            { 
                question: { tl: "Gamit ang \u20b16,000 na prinsipal at \u20b1150 na interes, magkano ang kabuuang halaga (A) na babayaran ni Philip?", en: "Using the principal of \u20b16,000 and \u20b1150 interest, what is the total amount (A) Philip will pay?" }, 
                options: { tl: ["\u20b16,050", "\u20b16,150", "\u20b16,300", "\u20b17,500"], en: ["\u20b16,050", "\u20b16,150", "\u20b16,300", "\u20b17,500"] }, 
                answer: 1, topic: 'Total Amount Simple Interest' 
            }, // 6000 + 150 = 6150
            { 
                question: { tl: "Sa anong uri ng interes idinadaragdag ang kinita sa prinsipal upang maging batayan ng interes sa susunod na taning?", en: "What type of interest is earned by adding the interest to the principal, which then becomes the basis for the next period's interest?" }, 
                options: { tl: ["Payak na Interes", "Komersyal na Interes", "Tambalang Interes (Compounded Interest)", "Interes sa Hulugan"], en: ["Simple Interest", "Commercial Interest", "Compounded Interest", "Installment Interest"] }, 
                answer: 2, topic: 'Compounded Interest Concept' 
            },
            { 
                question: { tl: "Kung ang \u20b112,000 ay hiniram sa 10% compounded bawat kuwarto (3 buwan), magkano ang total na interes pagkatapos ng 6 na buwan?", en: "If \u20b112,000 is borrowed at 10% compounded quarterly (3 months), what is the total interest after 6 months?" }, 
                options: { tl: ["\u20b1600.00", "\u20b1607.50", "\u20b1750.00", "\u20b1810.00"], en: ["\u20b1600.00", "\u20b1607.50", "\u20b1750.00", "\u20b1810.00"] }, 
                answer: 1, topic: 'Compounded Interest Calculation' 
            }, // 300 + 307.50 = 607.50
            { 
                question: { tl: "Ang estanteng nagkakahalaga ng \u20b14,000 ay binili ng hulugan sa loob ng 6 na buwan na may 20% dagdag na singil bawat taon. Magkano ang dagdag na singil (I) o surcharge?", en: "A shelf worth \u20b14,000 is bought on installment over 6 months with a 20% annual surcharge. What is the surcharge (I)?" }, 
                options: { tl: ["\u20b1200", "\u20b1400", "\u20b1800", "\u20b11,600"], en: ["\u20b1200", "\u20b1400", "\u20b1800", "\u20b11,600"] }, 
                answer: 1, topic: 'Installment Surcharge' 
            }, // 4000 * 0.20 * 0.5 = 400
            { 
                question: { tl: "Batay sa nakaraang tanong, magkano ang kabuuang halaga (A) ng estante kung bibilhin ng hulugan?", en: "Based on the previous question, what is the total cost (A) of the shelf if bought on installment?" }, 
                options: { tl: ["\u20b14,000", "\u20b14,200", "\u20b14,400", "\u20b14,800"], en: ["\u20b14,000", "\u20b14,200", "\u20b14,400", "\u20b14,800"] }, 
                answer: 2, topic: 'Total Installment Price' 
            }, // 4000 + 400 = 4400
            { 
                question: { tl: "Kung ang kabuuang halaga ay \u20b14,400 at babayaran sa loob ng 6 na buwan, magkano ang <b>buwanang hulog (Monthly Installment)</b>?", en: "If the total cost is \u20b14,400 and it is paid over 6 months, what is the <b>Monthly Installment</b>?" }, 
                options: { tl: ["\u20b1700.00", "\u20b1733.33", "\u20b1880.00", "\u20b11,100.00"], en: ["\u20b1700.00", "\u20b1733.33", "\u20b1880.00", "\u20b11,100.00"] }, 
                answer: 1, topic: 'Monthly Installment' 
            }, // 4400 / 6 = 733.33
            { 
                question: { tl: "Ano ang payak na interes sa \u20b15,000 (P) para sa 3 taon (T) na may 6% (R) interes bawat taon?", en: "What is the simple interest on \u20b15,000 (P) for 3 years (T) at 6% (R) interest per year?" }, 
                options: { tl: ["\u20b1300", "\u20b1600", "\u20b1900", "\u20b11,200"], en: ["\u20b1300", "\u20b1600", "\u20b1900", "\u20b11,200"] }, 
                answer: 2, topic: 'Simple Interest Problem' 
            }, // 5000 * 0.06 * 3 = 900
            { 
                question: { tl: "Alin ang pinakamahusay na diskarte sa pananalapi para sa isang negosyante, ayon sa modyul?", en: "According to the module, what is the best financial strategy for a businessman?" }, 
                options: { tl: ["Manghiram gamit ang compounded interest.", "Magbayad ng interes gamit ang 5-6 na sistema.", "Mag-impok gamit ang payak na interes.", "Humiram gamit ang payak na interes at mag-impok gamit ang compounded interest."], en: ["Borrow using compounded interest.", "Pay interest using the 5-6 system.", "Save using simple interest.", "Borrow using simple interest and save using compounded interest."] }, 
                answer: 3, topic: 'Financial Strategy' 
            },

            // Section II: Aralin 2 - Kombersiyon ng Pananalapi (11-20)
            { 
                question: { tl: "Ano ang opisyal na pananalapi (currency) ng Pilipinas?", en: "What is the official currency of the Philippines?" }, 
                options: { tl: ["Dollar", "Yen", "Rial", "Piso"], en: ["Dollar", "Yen", "Rial", "Peso"] }, 
                answer: 3, topic: 'Philippine Currency' 
            },
            { 
                question: { tl: "Saan karaniwang makikita ang halaga ng palitan (exchange rate) ng pananalapi?", en: "Where can the exchange rate usually be found?" }, 
                options: { tl: ["Sa mga tindahan ng kasangkapan", "Sa mga paaralan", "Sa mga pahayagan at bangko", "Sa mga aklatan"], en: ["In appliance stores", "In schools", "In newspapers and banks", "In libraries"] }, 
                answer: 2, topic: 'Exchange Rate Source' 
            },
            { 
                question: { tl: "Kung ang palitan ay US$1.00 = \u20b151.20, magkano ang \u20b193,500 sa U.S. Dollar?", en: "If the exchange rate is US$1.00 = \u20b151.20, how much is \u20b193,500 in U.S. Dollars?" }, 
                options: { tl: ["US$1,800.00", "US$1,826.17", "US$1,900.00", "US$47,872.80"], en: ["US$1,800.00", "US$1,826.17", "US$1,900.00", "US$47,872.80"] }, 
                answer: 1, topic: 'Peso to Dollar Conversion' 
            }, // 93500 / 51.20 = 1826.17
            { 
                question: { tl: "Magkano ang US$45 sa piso ng Pilipinas kung ang tasa ng palitan ay US$1.00 = \u20b151.20?", en: "How much is US$45 in Philippine Peso if the exchange rate is US$1.00 = \u20b151.20?" }, 
                options: { tl: ["\u20b12,000.00", "\u20b12,304.00", "\u20b14,500.00", "\u20b15,120.00"], en: ["\u20b12,000.00", "\u20b12,304.00", "\u20b14,500.00", "\u20b15,120.00"] }, 
                answer: 1, topic: 'Dollar to Peso Conversion' 
            }, // 45 * 51.20 = 2304.00
            { 
                question: { tl: "Palitan ang \u20b1450 sa Hongkong Dollar (HK$1.00 = \u20b17.20).", en: "Convert \u20b1450 to Hongkong Dollar (HK$1.00 = \u20b17.20)." }, 
                options: { tl: ["HK$45.00", "HK$62.50", "HK$100.00", "HK$3,240.00"], en: ["HK$45.00", "HK$62.50", "HK$100.00", "HK$3,240.00"] }, 
                answer: 1, topic: 'Peso to HKD Conversion' 
            }, // 450 / 7.20 = 62.50
            { 
                question: { tl: "Kung ang tasa ng palitan ay Saudi Rial 1.00 = \u20b13.42, magkano ang Saudi Rial 360.20 sa piso?", en: "If the exchange rate is Saudi Rial 1.00 = \u20b13.42, how much is Saudi Rial 360.20 in Peso?" }, 
                options: { tl: ["\u20b1100.20", "\u20b1360.20", "\u20b11,231.89", "\u20b13,602.00"], en: ["\u20b1100.20", "\u20b1360.20", "\u20b11,231.89", "\u20b13,602.00"] }, 
                answer: 2, topic: 'Rial to Peso Conversion' 
            }, // 360.20 * 3.42 = 1231.88
            { 
                question: { tl: "Kung ang tasa ng palitan ay Pounds 1.00 = \u20b165.00, magkano ang 356 Pounds sa piso ng Pilipinas?", en: "If the exchange rate is Pounds 1.00 = \u20b165.00, how much is 356 Pounds in Philippine Peso?" }, 
                options: { tl: ["\u20b120,500", "\u20b123,140", "\u20b126,000", "\u20b135,600"], en: ["\u20b120,500", "\u20b123,140", "\u20b126,000", "\u20b135,600"] }, 
                answer: 1, topic: 'Pounds to Peso Conversion' 
            }, // 356 * 65.00 = 23140
            { 
                question: { tl: "Ano ang pananalapi ng Great Britain?", en: "What is the currency of Great Britain?" }, 
                options: { tl: ["Dollar", "Lira", "Pound", "Yen"], en: ["Dollar", "Lira", "Pound", "Yen"] }, 
                answer: 2, topic: 'Foreign Currency ID' 
            },
            { 
                question: { tl: "Ano ang pananalapi ng Japan?", en: "What is the currency of Japan?" }, 
                options: { tl: ["Yuan", "Yen", "Baht", "Rupee"], en: ["Yuan", "Yen", "Baht", "Rupee"] }, 
                answer: 1, topic: 'Foreign Currency ID' 
            },
            { 
                question: { tl: "Ayon sa modyul, ano ang pangunahing dahilan kung bakit nagbabago ang tasa ng palitan araw-araw?", en: "According to the module, what is the main reason why the exchange rate changes daily?" }, 
                options: { tl: ["Mga buwis", "Compounded interest", "Mga lakas sa pamilihan (market forces)", "Mga utang ng pamahalaan"], en: ["Taxes", "Compounded interest", "Market forces", "Government debts"] }, 
                answer: 2, topic: 'Exchange Rate Fluctuations' 
            },

            // Section III: Aralin 3 - Pagtutuos ng Buwis (21-30)
            { 
                question: { tl: "Alin ang ginagamit ng pamahalaan para sa pagpapagawa ng mga kalye, pagpapatakbo ng mga hospital, at pagpopondo ng mga proyekto?", en: "Which is used by the government to build roads, operate hospitals, and fund projects?" }, 
                options: { tl: ["Interes", "Buwis", "Hulugan", "Prinsipal"], en: ["Interest", "Tax", "Installment", "Principal"] }, 
                answer: 1, topic: 'Purpose of Tax' 
            },
            { 
                question: { tl: "Alin sa mga sumusunto ang halimbawa ng <b>Direct Tax</b>?", en: "Which of the following is an example of a <b>Direct Tax</b>?" }, 
                options: { tl: ["Buwis sa Pagbebenta", "Buwis sa Inangkat na Produkto", "Buwis sa Kita", "Surcharge"], en: ["Sales Tax", "Imported Product Tax", "Income Tax", "Surcharge"] }, 
                answer: 2, topic: 'Direct Tax Identification' 
            },
            { 
                question: { tl: "Ano ang tawag sa sistema ng pagbubuwis kung saan mas malaki ang kinita, mas malaki ang babayaran?", en: "What is the name of the tax system where the more you earn, the more you pay?" }, 
                options: { tl: ["Flat Rate", "Simplified Tax", "Compounded Tax", "Progresibong Pamamaraan ng Pagbubuwis"], en: ["Flat Rate", "Simplified Tax", "Compounded Tax", "Progressive Taxation System"] }, 
                answer: 3, topic: 'Taxation System' 
            },
            { 
                question: { tl: "Si Mang Kanor ay kumita ng \u20b14,000 sa isang taon. Magkano ang buwis niya? (1% ng labis sa \u20b12,500)", en: "Mang Kanor earned \u20b14,000 in a year. How much is his tax? (1% of the excess over \u20b12,500)" }, 
                options: { tl: ["\u20b140.00", "\u20b115.00", "\u20b1400.00", "\u20b10.00"], en: ["\u20b140.00", "\u20b115.00", "\u20b1400.00", "\u20b10.00"] }, 
                answer: 1, topic: 'Tax Calculation P4k' 
            }, // (4000 - 2500) * 0.01 = 15
            { 
                question: { tl: "Si Julia ay kumita ng \u20b148,000 sa isang taon. Magkano ang taunang buwis niya? (\u20b13,075 + 15% ng labis sa \u20b140,000)", en: "Julia earned \u20b148,000 in a year. How much is her annual tax? (\u20b13,075 + 15% of the excess over \u20b140,000)" }, 
                options: { tl: ["\u20b13,075.00", "\u20b14,275.00", "\u20b15,075.00", "\u20b17,200.00"], en: ["\u20b13,075.00", "\u20b14,275.00", "\u20b15,075.00", "\u20b17,200.00"] }, 
                answer: 1, topic: 'Tax Calculation P48k' 
            }, // 3075 + (8000 * 0.15) = 4275
            { 
                question: { tl: "Magkano ang buwanang buwis (MTD) ni Julia kung ang taunang buwis niya ay \u20b14,275?", en: "How much is Julia's Monthly Tax Due (MTD) if her annual tax is \u20b14,275?" }, 
                options: { tl: ["\u20b1300.00", "\u20b1356.25", "\u20b1400.00", "\u20b1427.50"], en: ["\u20b1300.00", "\u20b1356.25", "\u20b1400.00", "\u20b1427.50"] }, 
                answer: 1, topic: 'Monthly Tax Due' 
            }, // 4275 / 12 = 356.25
            { 
                question: { tl: "Kung ang buwanang kita ni Julia ay \u20b14,000 at ang buwanang buwis ay \u20b1356.25, magkano ang kanyang <b>take home pay</b> bawat buwan?", en: "If Julia's monthly income is \u20b14,000 and her monthly tax is \u20b1356.25, what is her <b>monthly take-home pay</b>?" }, 
                options: { tl: ["\u20b13,643.75", "\u20b13,700.00", "\u20b14,000.00", "\u20b14,356.25"], en: ["\u20b13,643.75", "\u20b13,700.00", "\u20b14,000.00", "\u20b14,356.25"] }, 
                answer: 0, topic: 'Take Home Pay' 
            }, // 4000 - 356.25 = 3643.75
            { 
                question: { tl: "Magkano ang taunang buwis para sa taunang kinita na \u20b160,000? (\u20b13,075 + 15% ng labis sa \u20b140,000)", en: "What is the annual tax for an annual income of \u20b160,000? (\u20b13,075 + 15% of the excess over \u20b140,000)" }, 
                options: { tl: ["\u20b13,075", "\u20b14,575", "\u20b16,075", "\u20b19,075"], en: ["\u20b13,075", "\u20b14,575", "\u20b16,075", "\u20b19,075"] }, 
                answer: 2, topic: 'Tax Calculation P60k' 
            }, // 3075 + (20000 * 0.15) = 6075
            { 
                question: { tl: "Magkano ang taunang buwis para sa taunang kinita na \u20b1158,000? (\u20b113,675 + 24% ng labis sa \u20b1100,000)", en: "What is the annual tax for an annual income of \u20b1158,000? (\u20b113,675 + 24% of the excess over \u20b1100,000)" }, 
                options: { tl: ["\u20b113,675", "\u20b127,595", "\u20b131,595", "\u20b141,595"], en: ["\u20b113,675", "\u20b127,595", "\u20b131,595", "\u20b141,595"] }, 
                answer: 1, topic: 'Tax Calculation P158k' 
            }, // 13675 + (58000 * 0.24) = 27595
            { 
                question: { tl: "Anong ahensiya ng pamahalaan ang nangungolekta ng <b>direct taxes</b> (tulad ng Buwis sa Kita) sa Pilipinas?", en: "What government agency collects <b>direct taxes</b> (like Income Tax) in the Philippines?" }, 
                options: { tl: ["DOLE", "DTI", "BIR", "SSS"], en: ["DOLE", "DTI", "BIR", "SSS"] }, 
                answer: 2, topic: 'Tax Collection Agency' 
            }
        ];

        let userAnswers = {}; // {qIndex: selectedOptionIndex}
        const quizName = "Pagsusulit: Matematikang Pangkalakal 1";
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
            let section1Content = '';
            let section2Content = '';
            let section3Content = '';

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
            document.querySelector('#results-modal button[onclick="resetQuiz()"]').textContent = uiText.resetButton[lang];
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
         * Adds local time with AM/PM to the saved result.
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

            // --- 1. PREPARE THE RESULT OBJECT (with date + 12-hour time AM/PM) ---
            const now = new Date();
            currentQuizResult = {
                name: quizName,
                rawLevelId: quizLevelRawId, 
                level: quizLevelDisplay, 
                score: `${correctCount}/${totalQuestions}`,
                percentage: Math.round((correctCount / totalQuestions) * 100),
                date: now.toLocaleDateString('en-US'),
                time: now.toLocaleTimeString('en-US', { hour: 'numeric', minute: '2-digit', second: '2-digit', hour12: true }),
                timestamp: now.toLocaleString('en-US', { hour12: true })
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
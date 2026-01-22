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
    <title>Pagsusulit: Applied Economics</title>
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
                <h1 class="text-4xl font-extrabold text-primary mb-2" id="quiz-title">Pagsusulit: Applied Economics</h1>
                <p class="text-xl text-gray-600" id="quiz-subtitle">30 Items: Economic Principles, Market Structures, at Contemporary Issues</p>
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
            'quizTitle': { tl: "Pagsusulit: Applied Economics", en: "Quiz: Applied Economics" },
            'quizSubtitle': { tl: "30 Items: Economic Principles, Market Structures, at Contemporary Issues", en: "30 Items: Economic Principles, Market Structures, and Contemporary Issues" },
            'goBack': { tl: 'Bumalik', en: 'Go Back' },
            'section1Title': { tl: 'I. LAS 1-3: Introduction at Economic Problems (1 - 10)', en: 'I. LAS 1-3: Introduction and Economic Problems (1 - 10)' },
            'section2Title': { tl: 'II. LAS 4-7: Demand, Supply, at Market Structures (11 - 20)', en: 'II. LAS 4-7: Demand, Supply, and Market Structures (11 - 20)' },
            'section3Title': { tl: 'III. LAS 8-13: Contemporary Issues at Business Principles (21 - 30)', en: 'III. LAS 8-13: Contemporary Issues and Business Principles (21 - 30)' },
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
            // Section I: Introduction to Applied Economics (LAS 1-3) (1-10)
            // Q1: Definition of Economics (LAS 1)
            { question: { tl: "Ano ang pinakamadaling paglalarawan sa <b>Economics</b>?", en: "What is the simplest description of <b>Economics</b>?" }, options: { tl: ["Pag-aaral ng pulitika", "Pag-aaral ng kasaysayan", "Pag-aaral ng matalinong paggamit ng pera at resources", "Pag-aaral ng kalusugan"], en: ["Study of politics", "Study of history", "Study of smart use of money and resources", "Study of health"] }, answer: 2, topic: 'Basic Concepts' },
            // Q2: Core Problem in Economics (LAS 1, 3)
            { question: { tl: "Alin ang pangunahing problema na sinusubukan tugunan ng Economics?", en: "Which is the main problem that Economics tries to address?" }, options: { tl: ["Unemployment", "Inflation", "Scarcity of resources", "Low demand"], en: ["Unemployment", "Inflation", "Scarcity of resources", "Low demand"] }, answer: 2, topic: 'Basic Concepts' },
            // Q3: Economics Scope - Family (LAS 1)
            { question: { tl: "Ang pag-aaral ng paraan sa pagpapatakbo ng budget ng pamilya ay tinatawag na:", en: "The study of budget management methods for a family is called:" }, options: { tl: ["Business Economics", "National Economics", "International Economics", "Household Economics"], en: ["Business Economics", "National Economics", "International Economics", "Household Economics"] }, answer: 3, topic: 'Scope of Economics' },
            // Q4: Economics Scope - Country (LAS 1)
            { question: { tl: "Alin ang nag-aaral sa total income at production ng populasyon at ng gobyerno (micro) at ng buong ekonomiya (macro)?", en: "Which studies the total income and production of the population and the government (micro) and of the entire economy (macro)?" }, options: { tl: ["Household Economics", "Business Economics", "National Economics", "International Economics"], en: ["Household Economics", "Business Economics", "National Economics", "International Economics"] }, answer: 2, topic: 'Scope of Economics' },
            // Q5: Applied Economics Focus (LAS 1)
            { question: { tl: "Ang <b>Applied Economics</b> ay nagbibigay-pansin sa:", en: "<b>Applied Economics</b> focuses on:" }, options: { tl: ["Pure theoretical analysis", "Historical economic trends", "Practical issues in labor, business, at agriculture", "Global political conflicts"], en: ["Pure theoretical analysis", "Historical economic trends", "Practical issues in labor, business, and agriculture", "Global political conflicts"] }, answer: 2, topic: 'Applied Economics' },
            // Q6: Economics as a Science (LAS 2)
            { question: { tl: "Bakit itinuturing na <b>Social Science</b> ang Economics?", en: "Why is Economics considered a <b>Social Science</b>?" }, options: { tl: ["Gumagamit ito ng historical analysis", "Pinag-aaralan nito ang government structure", "Gumagamit ito ng scientific methods para ipaliwanang ang human behavior", "Sinisiguro nito ang financial stability"], en: ["It uses historical analysis", "It studies government structure", "It uses scientific methods to explain human behavior", "It ensures financial stability"] }, answer: 2, topic: 'Economics as Science' },
            // Q7: Basic Economic Problem - What to Produce (LAS 2)
            { question: { tl: "Alin sa mga basic economic problems ang tumutukoy sa desisyon ng gobyerno kung <b>anong produkto o serbisyo</b> ang dapat likhain?", en: "Which of the basic economic problems refers to the government's decision on <b>what product or service</b> should be created?" }, options: { tl: ["For whom to produce", "What to produce and how much", "How to produce", "How to distribute"], en: ["For whom to produce", "What to produce and how much", "How to produce", "How to distribute"] }, answer: 1, topic: 'Basic Economic Problems' },
            // Q8: Basic Economic Problem - Market/Consumers (LAS 2)
            { question: { tl: "Ang basic economic problem na <b>'For whom to produce'</b> ay tumutukoy sa:", en: "The basic economic problem <b>'For whom to produce'</b> refers to:" }, options: { tl: ["Resource allocation", "Technology used in production", "Importance of determining markets or target consumers", "Scarcity of resources"], en: ["Resource allocation", "Technology used in production", "Importance of determining markets or target consumers", "Scarcity of resources"] }, answer: 2, topic: 'Basic Economic Problems' },
            // Q9: Purpose of Understanding Scarcity (LAS 3)
            { question: { tl: "Ang pag-unawa sa <b>scarcity</b> ay nakakatulong sa economics students para:", en: "Understanding <b>scarcity</b> helps economics students to:" }, options: { tl: ["Mabawasan ang corruption", "Maintindihan ang inflation", "Ma-maximize ang paggamit ng available resources", "Magtaas ng demand"], en: ["Reduce corruption", "Understand inflation", "Maximize the use of available resources", "Increase demand"] }, answer: 2, topic: 'Scarcity' },
            // Q10: Prevailing Problem (LAS 3)
            { question: { tl: "Ayon sa statistical data, alin ang isa sa mga paulit-ulit (prevailing) na problema ng Pilipinas?", en: "According to statistical data, which is one of the prevailing problems in the Philippines?" }, options: { tl: ["Low electricity rates", "Foreign investment surplus", "Poverty at unemployment", "High trade reserve"], en: ["Low electricity rates", "Foreign investment surplus", "Poverty and unemployment", "High trade reserve"] }, answer: 2, topic: 'Economic Problems' },

            // Section II: Law of Demand and Supply & Market Structures (LAS 4-7) (11-20)
            // Q11: Law of Demand (LAS 4)
            { question: { tl: "Ayon sa <b>Law of Demand</b>, kung <b>Mataas ang Presyo</b> ng isang produkto, ano ang mangyayari sa Quantity Demanded?", en: "According to the <b>Law of Demand</b>, if the <b>Price is High</b> for a product, what happens to the Quantity Demanded?" }, options: { tl: ["Mataas din", "Walang pagbabago", "Mababa", "Di-tiyak"], en: ["Also High", "No change", "Low", "Uncertain"] }, answer: 2, topic: 'Demand and Supply' },
            // Q12: Law of Supply (LAS 4)
            { question: { tl: "Hindi tulad ng Demand, ang <b>Supply slope</b> ay nagpapakita ng:", en: "Unlike Demand, the <b>Supply slope</b> shows a: " }, options: { tl: ["Downward slope", "Zero slope", "Upward slope", "Curved slope"], en: ["Downward slope", "Zero slope", "Upward slope", "Curved slope"] }, answer: 2, topic: 'Demand and Supply' },
            // Q13: Factors Affecting Demand (LAS 5)
            { question: { tl: "Alin sa sumusunod ang <b>HINDI direktang</b> nakakaapekto sa Demand?", en: "Which of the following does <b>NOT directly</b> affect Demand?" }, options: { tl: ["Income ng consumers", "Tastes and preference", "Price of related goods", "Technological improvements"], en: ["Income ng consumers", "Tastes and preference", "Price of related goods", "Technological improvements"] }, answer: 3, topic: 'Factors Affecting D&S' }, 
            // Q14: Factors Affecting Supply (LAS 5)
            { question: { tl: "Kung may <b>Technological Improvements</b>, ano ang mangyayari sa Supply?", en: "If there are <b>Technological Improvements</b>, what happens to the Supply?" }, options: { tl: ["Bababa ang supply", "Walang pagbabago", "Tataas ang supply at bababa ang presyo", "Tataas ang presyo at demand"], en: ["Supply will decrease", "No change", "Supply will increase and price will decrease", "Price and demand will increase"] }, answer: 2, topic: 'Factors Affecting D&S' },
            // Q15: Consumer Impact (LAS 6)
            { question: { tl: "Paano nakakatulong ang pagkumpara ng <b>SRP</b> (Suggested Retail Price) sa Consumers?", en: "How does comparing the <b>SRP</b> (Suggested Retail Price) help Consumers?" }, options: { tl: ["Para maging mas mahal ang produkto", "Para maging mas mura ang produkto", "Para makabili ng produkto sa tamang presyo at kalidad", "Para magkaroon ng discount"], en: ["To make the product more expensive", "To make the product cheaper", "To buy the product at the correct price and quality", "To get a discount"] }, answer: 2, topic: 'Price and Consumers' },
            // Q16: Perfect Competition Definition (LAS 7)
            { question: { tl: "Anong market structure ang may <b>maraming maliliit na firms</b> na nagbebenta ng <b>homogenous products</b> (magkakaparehong produkto)?", en: "What market structure has <b>many small firms</b> selling <b>homogenous products</b> (identical products)? " }, options: { tl: ["Monopoly", "Oligopoly", "Monopolistic Competition", "Perfect Competition"], en: ["Monopoly", "Oligopoly", "Monopolistic Competition", "Perfect Competition"] }, answer: 3, topic: 'Market Structures' },
            // Q17: Monopolistic Competition Definition (LAS 7)
            { question: { tl: "Anong market structure ang may <b>maraming maliliit na firms</b> na nagbebenta ng <b>similar, pero differentiated products</b>?", en: "What market structure has <b>many small firms</b> selling <b>similar, but differentiated products</b>?" }, options: { tl: ["Monopoly", "Oligopoly", "Monopolistic Competition", "Perfect Competition"], en: ["Monopoly", "Oligopoly", "Monopolistic Competition", "Perfect Competition"] }, answer: 2, topic: 'Market Structures' },
            // Q18: Monopoly Definition (LAS 7)
            { question: { tl: "Anong market structure ang may <b>iisang (single) firm</b> na kumokontrol sa buong market?", en: "What market structure has a <b>single firm</b> controlling the entire market?" }, options: { tl: ["Monopoly", "Oligopoly", "Monopolistic Competition", "Perfect Competition"], en: ["Monopoly", "Oligopoly", "Monopolistic Competition", "Perfect Competition"] }, answer: 0, topic: 'Market Structures' },
            // Q19: Oligopoly Definition (LAS 7)
            { question: { tl: "Anong market structure ang dinodomina ng <b>maliit na bilang lamang ng firms</b>?", en: "What market structure is dominated by <b>only a small number of firms</b>?" }, options: { tl: ["Monopoly", "Oligopoly", "Monopolistic Competition", "Perfect Competition"], en: ["Monopoly", "Oligopoly", "Monopolistic Competition", "Perfect Competition"] }, answer: 1, topic: 'Market Structures' },
            // Q20: Market Structure Application (LAS 7)
            { question: { tl: "Ang pagbebenta ng Lanzones mula sa Camiguin ng <b>daan-daang (hundred) vendors</b> ay isang halimbawa ng:", en: "The sale of Lanzones from Camiguin by <b>hundreds of vendors</b> is an example of:" }, options: { tl: ["Monopoly", "Oligopoly", "Monopolistic Competition", "Perfect Competition"], en: ["Monopoly", "Oligopoly", "Monopolistic Competition", "Perfect Competition"] }, answer: 3, topic: 'Market Structures Application' },

            // Section III: Contemporary Issues, Business Principles, and Socioeconomic Impact (LAS 8-13) (21-30)
            // Q21: Contemporary Issue - Oil Price (LAS 8)
            { question: { tl: "Ano ang epekto ng <b>Oil Price Increase</b> sa Purchasing Power ng mga tao?", en: "What is the effect of an <b>Oil Price Increase</b> on people's Purchasing Power?" }, options: { tl: ["Tataas ang halaga ng imports", "Bababa ang halaga ng exports", "Tataas ang presyo ng bilihin (commodity prices)", "Tataas ang dollar exchange rate"], en: ["Import costs will increase", "Export costs will decrease", "Commodity prices will increase", "The dollar exchange rate will increase"] }, answer: 2, topic: 'Contemporary Issues' },
            // Q22: Contemporary Issue - Exchange Rate (LAS 8)
            { question: { tl: "Ang <b>Fluctuation sa Dollar Exchange Rate</b> ay direktang nakakaapekto sa OFW remittances dahil:", en: "The <b>Fluctuation in the Dollar Exchange Rate</b> directly affects OFW remittances because:" }, options: { tl: ["Naiiba ang presyo ng langis", "Naaapektuhan ang peace and order", "Bumababa ang purchasing power sa goods at services", "Tumataas ang unemployment rate"], en: ["The price of oil changes", "Peace and order are affected", "Purchasing power for goods and services decreases", "The unemployment rate increases"] }, answer: 2, topic: 'Contemporary Issues' },
            // Q23: Unemployment Rate (LAS 8)
            { question: { tl: "Ayon sa studies, ilang bahagi ng manggagawa ang <b>unemployed o informally employed</b>?", en: "According to studies, what fraction of workers are <b>unemployed or informally employed</b>?" }, options: { tl: ["Isang-kapat (one-fourth)", "Kalahati (half)", "Tatlumpu't tatlo (three-fourth)", "Sampu (ten)"], en: ["One-fourth", "Half", "Three-fourth", "Ten"] }, answer: 2, topic: 'Contemporary Issues' },
            // Q24: Purpose of Business Principles/Tools (LAS 9)
            { question: { tl: "Ang <b>Business Principles, Tools, o Techniques</b> ay ginagamit para:", en: "<b>Business Principles, Tools, or Techniques</b> are used to:" }, options: { tl: ["Itaas ang presyo", "Bawasan ang trabaho", "I-improve ang business performance at maging competitive", "I-minimize ang production"], en: ["Increase the price", "Reduce employment", "Improve business performance and become competitive", "Minimize production"] }, answer: 2, topic: 'Business Principles' },
            // Q25: Business Principles - Core Strategy (LAS 9)
            { question: { tl: "Alin ang tumutukoy sa <b>'What problem are we trying to solve?'</b> sa Lean Transformation Framework?", en: "Which refers to <b>'What problem are we trying to solve?'</b> in the Lean Transformation Framework?" }, options: { tl: ["Process Improvement", "Capability Development", "Leadership", "Situational Approach (Value-driven Purpose)"], en: ["Process Improvement", "Capability Development", "Leadership", "Situational Approach (Value-driven Purpose)"] }, answer: 3, topic: 'Business Principles' },
            // Q26: Top Small Business Idea (LAS 10)
            { question: { tl: "Ayon sa data, alin ang isang <b>Top 10 Small Business Idea</b> para sa mga Pilipino?", en: "According to data, which is a <b>Top 10 Small Business Idea</b> for Filipinos?" }, options: { tl: ["Big Car Manufacturing", "Luxury Jewelry Store", "Junk Shop", "High-End Restaurant"], en: ["Big Car Manufacturing", "Luxury Jewelry Store", "Junk Shop", "High-End Restaurant"] }, answer: 2, topic: 'Business Opportunities' },
            // Q27: Socioeconomic Factor - Income (LAS 11)
            { question: { tl: "Alin sa <b>Socioeconomic Factors</b> ang nagiging dahilan kung bakit nire-restrict ng customers ang kanilang paggastos sa <b>essential items lang</b>?", en: "Which of the <b>Socioeconomic Factors</b> causes customers to restrict their spending to <b>essential items only</b>?" }, options: { tl: ["Education/Skills", "Occupation", "Income", "Social Class"], en: ["Education/Skills", "Occupation", "Income", "Social Class"] }, answer: 2, topic: 'Socioeconomic Factors' },
            // Q28: Socioeconomic Factor - Education (LAS 11)
            { question: { tl: "Bakit mahalaga ang <b>Education/Skills</b> sa socioeconomic status?", en: "Why is <b>Education/Skills</b> important to socioeconomic status?" }, options: { tl: ["Nagiging upper class", "Nagiging lower class", "Nagiging employable sa well-paying jobs", "Nakakaapekto sa taste"], en: ["Becomes upper class", "Becomes lower class", "Becomes employable in well-paying jobs", "Affects taste"] }, answer: 2, topic: 'Socioeconomic Factors' },
            // Q29: Viability of Business (LAS 12)
            { question: { tl: "Alin ang isang mahalagang tanong na dapat i-consider ng entrepreneurs sa pagtukoy ng <b>Viable Business Model</b>?", en: "Which is an important question entrepreneurs must consider in determining a <b>Viable Business Model</b>?" }, options: { tl: ["Kailan mag-i-invest", "Magkano ang sweldo", "Sino ang target customers", "Saan mag-babangko"], en: ["When to invest", "How much is the salary", "Who are the target customers", "Where to bank"] }, answer: 2, topic: 'Business Viability' },
            // Q30: Organizational Control (LAS 12)
            { question: { tl: "Ang <b>Organizational Control</b> ay mahalaga sa negosyo para:", en: "<b>Organizational Control</b> is important in business for:" }, options: { tl: ["Magbayad ng tax", "Magbenta nang marami", "I-manage ang rules, procedures, at protocols ng employees", "I-maximize ang profit"], en: ["To pay tax", "To sell a lot", "To manage employee rules, procedures, and protocols", "To maximize profit"] }, answer: 2, topic: 'Business Management' },
        ];

        let userAnswers = {}; // {qIndex: selectedOptionIndex}
        const quizName = "Pagsusulit: Applied Economics";
        const quizLevelRawId = "seniorhigh"; // SENIOR HIGH
        const quizLevelDisplay = "Senior High"; // SENIOR HIGH

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
         * Added: record time (human-friendly) and ISO timestamp together with date.
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


            // --- 1. PREPARE THE RESULT OBJECT ---
            const now = new Date();
            currentQuizResult = {
                name: quizName,
                rawLevelId: quizLevelRawId, 
                level: quizLevelDisplay, 
                score: `${correctCount}/${totalQuestions}`,
                percentage: Math.round((correctCount / totalQuestions) * 100),
                // Human-friendly date, time, plus ISO timestamp for unambiguous sorting/export
                date: now.toLocaleDateString('en-US'),
                time: now.toLocaleTimeString('en-US'),
                dateTime: now.toISOString()
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
            
            // Re-enable and clear markings (Re-rendering handles this better)
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
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
    <title>Pagsusulit: Mga Porsiyento at Persentahe</title>
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
                <h1 class="text-4xl font-extrabold text-primary mb-2" id="quiz-title">Pagsusulit: Mga Porsiyento at Persentahe</h1>
                <p class="text-xl text-gray-600" id="quiz-subtitle">30 Items: Conversion at Word Problems</p>
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
                    <!-- Updated link to go to records.php and removed the redundant onclick call -->
                    <a href="http://localhost/als/front/records.php" id="record-button-link"
                       class="block w-full py-3 bg-record-btn text-white font-bold text-lg rounded-lg shadow-md hover:bg-blue-600 transition duration-300 focus:outline-none focus:ring-4 focus:ring-blue-300">
                        I-record ang Resulta at Pumunta sa Talaan
                    </a>
                    <!-- Updated reset button background and hover color to Sky Blue -->
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
            'quizTitle': { tl: "Pagsusulit: Mga Porsiyento at Persentahe", en: "Quiz: Percent and Percentages" },
            'quizSubtitle': { tl: "30 Items: Conversion at Word Problems", en: "30 Items: Conversion and Word Problems" },
            'goBack': { tl: 'Bumalik', en: 'Go Back' },
            'section1Title': { tl: 'I. Conversion, Terminolohiya, at Basic Calculation', en: 'I. Conversion, Terminology, and Basic Calculation' },
            'section2Title': { tl: 'II. Paglutas sa Suliraning Kaugnay sa Persentahe', en: 'II. Solving Percentage-Related Problems' },
            'section3Title': { tl: 'III. Iba pang mga Suliranin', en: 'III. Other Problems' },
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
            // Section I: Aralin 1: Ano ang Porsiyento? (Conversion, Terminology, Basic Calculation) (1-15)
            // Q1: Porsiyento -> Desimal (Pre-test Q1) 7.5% -> 0.075
            { 
                question: { tl: "Gawing desimal ang 7.5%.", en: "Convert 7.5% to a decimal." }, 
                options: { tl: ["0.75", "0.075", "7.5", "0.0075"], en: ["0.75", "0.075", "7.5", "0.0075"] }, 
                answer: 1, topic: 'Porsiyento to Desimal' 
            },
            // Q2: Desimal -> Porsiyento (Pre-test Q2) 0.009 -> 0.9%
            { 
                question: { tl: "Gawing porsiyento ang 0.009.", en: "Convert 0.009 to a percent." }, 
                options: { tl: ["9%", "0.9%", "0.09%", "90%"], en: ["9%", "0.9%", "0.09%", "90%"] }, 
                answer: 1, topic: 'Desimal to Porsiyento' 
            },
            // Q3: Praksiyon -> Porsiyento (Pre-test Q3) 18/24 = 0.75 -> 75%
            { 
                question: { tl: "Nakapagbili si Aling Auring ng 18 manok mula sa 24 kabuuan. Ilang porsiyento ito?", en: "Aling Auring sold 18 chickens out of 24 total. What percentage is this?" }, 
                options: { tl: ["60%", "75%", "80%", "70%"], en: ["60%", "75%", "80%", "70%"] }, 
                answer: 1, topic: 'Praksiyon to Porsiyento' 
            },
            // Q4: Conversion > 100% (Example 3) 215% -> 2.15
            { 
                question: { tl: "Gawing desimal ang 215%.", en: "Convert 215% to a decimal." }, 
                options: { tl: ["21.5", "2.15", "0.215", "215.0"], en: ["21.5", "2.15", "0.215", "215.0"] }, 
                answer: 1, topic: 'Porsiyento to Desimal' 
            },
            // Q5: Conversion < 1% (Subukan Natin Ito Q2) 5.8% -> 0.058
            { 
                question: { tl: "Gawing desimal ang 5.8%.", en: "Convert 5.8% to a decimal." }, 
                options: { tl: ["0.58", "5.8", "0.058", "58.0"], en: ["0.58", "5.8", "0.058", "58.0"] }, 
                answer: 2, topic: 'Porsiyento to Desimal' 
            },
            // Q6: Conversion (Subukan Natin Ito Q1) 0.824 -> 82.4%
            { 
                question: { tl: "Gawing porsiyento ang 0.824.", en: "Convert 0.824 to a percent." }, 
                options: { tl: ["8.24%", "824%", "82.4%", "0.824%"], en: ["8.24%", "824%", "82.4%", "0.824%"] }, 
                answer: 2, topic: 'Desimal to Porsiyento' 
            },
            // Q7: Conversion (Alamin Natutuhan C.1) 0.004 -> 0.4%
            { 
                question: { tl: "Gawing porsiyento ang 0.004.", en: "Convert 0.004 to a percent." }, 
                options: { tl: ["4%", "0.4%", "40%", "0.04%"], en: ["4%", "0.4%", "40%", "0.04%"] }, 
                answer: 1, topic: 'Desimal to Porsiyento' 
            },
            // Q8: Conversion (Alamin Natutuhan C.2) 3.7 -> 370%
            { 
                question: { tl: "Gawing porsiyento ang 3.7.", en: "Convert 3.7 to a percent." }, 
                options: { tl: ["37%", "3.7%", "370%", "3700%"], en: ["37%", "3.7%", "370%", "3700%"] }, 
                answer: 2, topic: 'Desimal to Porsiyento' 
            },
            // Q9: Calculation (Alamin Natutuhan D.1) 18/30 = 0.6 -> 60%
            { 
                question: { tl: "May 30 kambing si Mang Lino. Naipagbili niya ang 18. Ilang porsiyento ito?", en: "Mang Lino had 30 goats and sold 18. What percentage is this?" }, 
                options: { tl: ["50%", "60%", "65%", "70%"], en: ["50%", "60%", "65%", "70%"] }, 
                answer: 1, topic: 'Praksiyon to Porsiyento' 
            },
            // Q10: Terminology
            { 
                question: { tl: "Ang salitang 'porsiyento' ay nangangahulugang 'mga bahagi ng bawat' anong bilang?", en: "The word 'percent' means 'parts per' what number?" }, 
                options: { tl: ["Sampu", "Dalawampu", "Isandaan", "Isang libo"], en: ["Ten", "Twenty", "One Hundred", "One Thousand"] }, 
                answer: 2, topic: 'Terminology' 
            },
            // Q11: Terminology
            { 
                question: { tl: "Ano ang kahulugan ng 40% ng kamatis sa basket ay kulay berde?", en: "What does 40% of the tomatoes in the basket being green mean?" }, 
                options: { tl: ["Sa 100 kamatis, 60 ang berde.", "Sa 40 kamatis, 100 ang berde.", "Sa 100 kamatis, 40 ang berde.", "Lahat ng kamatis ay berde."], en: ["Out of 100 tomatoes, 60 are green.", "Out of 40 tomatoes, 100 are green.", "Out of 100 tomatoes, 40 are green.", "All tomatoes are green."] }, 
                answer: 2, topic: 'Interpretation' 
            },
            // Q12: Percent > 100% Interpretation
            { 
                question: { tl: "Kapag ang halaga ng porsiyento ay humigit sa 100%, nangangahulugan ito na ang halaga ng porsiyento ay mas malaki kaysa sa:", en: "When the percentage value is greater than 100%, it means the percentage value is greater than the:" }, 
                options: { tl: ["Kalahati", "Kabuuang halaga", "Ikatlong bahagi", "Rate"], en: ["Half", "Total amount", "Third portion", "Rate"] }, 
                answer: 1, topic: 'Interpretation' 
            },
            // Q13: Persentahe (P) Definition
            { 
                question: { tl: "Ano ang tawag sa resulta ng pagkuha ng porsiyento ng isang bilang?", en: "What is the result of taking the percent of a number called?" }, 
                options: { tl: ["Base", "Rate", "Persentahe", "Komisyon"], en: ["Base", "Rate", "Percentage", "Commission"] }, 
                answer: 2, topic: 'Terminology' 
            },
            // Q14: Base (B) Definition
            { 
                question: { tl: "Sa pormulang P = B x r, ang B (Base) ay kumakatawan sa:", en: "In the formula P = B x r, B (Base) represents the:" }, 
                options: { tl: ["Bahagi", "Oras", "Rate", "Orihinal o kabuuang dami"], en: ["Part", "Time", "Rate", "Original or total quantity"] }, 
                answer: 3, topic: 'Terminology' 
            },
            // Q15: Rate (r) Definition
            { 
                question: { tl: "Sa pormulang P = B x r, ang r (Rate) ay dapat nakasaad sa anong anyo?", en: "In the formula P = B x r, r (Rate) must be stated in what form?" }, 
                options: { tl: ["Porsiyento", "Praksiyon", "Desimal", "Wala sa nabanggit"], en: ["Percent", "Fraction", "Decimal", "None of the above"] }, 
                answer: 2, topic: 'Terminology' 
            },

            // Section II: Aralin 2: Paglutas sa mga Suliraning Kaugnay sa Persentahe (Word Problems) (16-30)
            // Q16: Komisyon (Basic) - Aling Rosa 15% ng P1,400 = P210
            { 
                question: { tl: "Si Aling Rosa ay nakakuha ng 15% komisyon sa P1,400 na benta. Magkano ang komisyon niya?", en: "Aling Rosa earned a 15% commission on P1,400 in sales. How much is her commission?" }, 
                options: { tl: ["P150.00", "P210.00", "P280.00", "P350.00"], en: ["P150.00", "P210.00", "P280.00", "P350.00"] }, 
                answer: 1, topic: 'Komisyon' 
            },
            // Q17: Diskwento (Final Price) - Pre-test Q4. P2,380 x 20% = P476. P2380 - 476 = P1904
            { 
                question: { tl: "Ang mesang P2,380 ay may 20% diskwento. Magkano ang bawas na presyo?", en: "A P2,380 table has a 20% discount. What is the discounted price?" }, 
                options: { tl: ["P476.00", "P1,904.00", "P2,142.00", "P1,804.00"], en: ["P476.00", "P1,904.00", "P2,142.00", "P1,804.00"] }, 
                answer: 1, topic: 'Diskwento' 
            },
            // Q18: Tubo (Final Amount) - Mang Lino P12,600 @ 8%. P12,600 x 0.08 = P1,008. P12,600 + P1,008 = P13,608
            { 
                question: { tl: "Nagdeposito si Mang Lino ng P12,600 na may 8% tubo bawat taon. Magkano ang kabuuang halaga pagkaraan ng 1 taon?", en: "Mang Lino deposited P12,600 with 8% interest per year. What is the total amount after 1 year?" }, 
                options: { tl: ["P13,408.00", "P13,608.00", "P12,808.00", "P13,808.00"], en: ["P13,408.00", "P13,608.00", "P12,808.00", "P13,808.00"] }, 
                answer: 1, topic: 'Tubo' 
            },
            // Q19: Buwis (P=BxR) - Sammy P7,250 @ 12%. P7,250 x 0.12 = P870
            { 
                question: { tl: "Si Sammy ay sumusuweldo ng P7,250 na may 12% buwis. Magkano ang buwanang binabayaran niyang buwis?", en: "Sammy earns P7,250 and pays 12% tax. How much is his monthly tax payment?" }, 
                options: { tl: ["P725.00", "P870.00", "P900.00", "P650.00"], en: ["P725.00", "P870.00", "P900.00", "P650.00"] }, 
                answer: 1, topic: 'Buwis' 
            },
            // Q20: Komisyon (Lester) - P13,600 @ 12%. P13,600 x 0.12 = P1,632
            { 
                question: { tl: "Si Lester ay nakabenta ng P13,600 na appliance na may 12% komisyon. Magkano ang komisyon niya?", en: "Lester sold a P13,600 appliance with a 12% commission. How much is his commission?" }, 
                options: { tl: ["P1,360.00", "P1,632.00", "P1,500.00", "P1,800.00"], en: ["P1,360.00", "P1,632.00", "P1,500.00", "P1,800.00"] }, 
                answer: 1, topic: 'Komisyon' 
            },
            // Q21: Diskwento (Final Price) - Mario P8,625 @ 20%. P8,625 x 0.2 = P1,725. P8,625 - P1,725 = P6,900
            { 
                question: { tl: "Ang TV na P8,625 ay may 20% diskwento. Magkano na lang ang babayaran ni Mario?", en: "A P8,625 TV has a 20% discount. How much will Mario pay?" }, 
                options: { tl: ["P6,700.00", "P6,900.00", "P7,100.00", "P6,800.00"], en: ["P6,700.00", "P6,900.00", "P7,100.00", "P6,800.00"] }, 
                answer: 1, topic: 'Diskwento' 
            },
            // Q22: Tubo (Final Amount) - Aling Edna P14,600 @ 7%. P14,600 x 0.07 = P1,022. P14,600 + P1,022 = P15,622
            { 
                question: { tl: "Nangutang si Aling Edna ng P14,600 na may 7% tubo. Magkano ang kabuuang babayaran niya?", en: "Aling Edna borrowed P14,600 with 7% interest. What is the total amount she will repay?" }, 
                options: { tl: ["P15,522.00", "P15,622.00", "P16,000.00", "P14,700.00"], en: ["P15,522.00", "P15,622.00", "P16,000.00", "P14,700.00"] }, 
                answer: 1, topic: 'Tubo' 
            },
            // Q23: Komisyon (Arlene) - P7,300 @ 18%. P7,300 x 0.18 = P1,314
            { 
                question: { tl: "Nakabenta si Arlene ng sapatos na P7,300 na may 18% komisyon. Magkano ang komisyon niya?", en: "Arlene sold P7,300 worth of shoes with an 18% commission. How much is her commission?" }, 
                options: { tl: ["P1,214.00", "P1,314.00", "P1,414.00", "P1,514.00"], en: ["P1,214.00", "P1,314.00", "P1,414.00", "P1,514.00"] }, 
                answer: 1, topic: 'Komisyon' 
            },
            // Q24: Tubo (Final Amount) - G. Cruz P17,500 @ 9%. P17,500 x 0.09 = P1,575. P17,500 + P1,575 = P19,075
            { 
                question: { tl: "Nangutang si G. Cruz ng P17,500 na may 9% tubo. Magkano ang kabuuang babayaran niya?", en: "Mr. Cruz borrowed P17,500 with 9% interest. What is the total amount he will repay?" }, 
                options: { tl: ["P18,975.00", "P19,075.00", "P19,575.00", "P18,575.00"], en: ["P18,975.00", "P19,075.00", "P19,575.00", "P18,575.00"] }, 
                answer: 1, topic: 'Tubo' 
            },
            // Q25: Diskwento (Final Price) - Martin P2,870 @ 8%. P2,870 x 0.08 = P229.60. P2870 - P229.60 = P2640.40
            { 
                question: { tl: "Ang bibilhin ni Martin na P2,870 ay may 8% diskwento. Magkano na lang ang dapat niyang ibayad?", en: "Martin's purchase of P2,870 has an 8% discount. How much should he pay?" }, 
                options: { tl: ["P2,540.40", "P2,640.40", "P2,740.40", "P2,600.40"], en: ["P2,540.40", "P2,640.40", "P2,740.40", "P2,600.40"] }, 
                answer: 1, topic: 'Diskwento' 
            },
            // Q26: Komisyon (Edna) - P4,825 @ 12%. P4,825 x 0.12 = P579
            { 
                question: { tl: "Si Edna ay nakabenta ng kagamitan na P4,825 na may 12% komisyon. Magkano ang komisyon niya?", en: "Edna sold P4,825 worth of goods with a 12% commission. How much is her commission?" }, 
                options: { tl: ["P559.00", "P579.00", "P609.00", "P599.00"], en: ["P559.00", "P579.00", "P609.00", "P599.00"] }, 
                answer: 1, topic: 'Komisyon' 
            },
            // Q27: Final Exam Percentage (Final Exam Q1) 36/45 = 0.8 -> 80%
            { 
                question: { tl: "Nakakuha si Lita ng 36 na tamang sagot sa 45-item test. Ilang porsiyento ang kanyang marka?", en: "Lita got 36 correct answers on a 45-item test. What percentage is her score?" }, 
                options: { tl: ["75%", "80%", "85%", "90%"], en: ["75%", "80%", "85%", "90%"] }, 
                answer: 1, topic: 'Praksiyon to Porsiyento' 
            },
            // Q28: Percentage of Cut Trees (Final Exam Q2) 6/30 = 0.2 -> 20%
            { 
                question: { tl: "May 30 puno si Mang Anding, 6 ang pinutol. Ilang porsiyento ng mga puno ang pinutol?", en: "Mang Anding had 30 trees, 6 were cut down. What percentage of the trees were cut?" }, 
                options: { tl: ["15%", "20%", "25%", "30%"], en: ["15%", "20%", "25%", "30%"] }, 
                answer: 1, topic: 'Praksiyon to Porsiyento' 
            },
            // Q29: Komisyon (Final Exam Q3) P29,450 @ 14%. P29,450 x 0.14 = P4,123
            { 
                question: { tl: "Si Danny ay nakabenta ng kompyuter na P29,450 na may 14% komisyon. Magkano ang komisyon niya?", en: "Danny sold a P29,450 computer with a 14% commission. How much is his commission?" }, 
                options: { tl: ["P3,923.00", "P4,123.00", "P4,323.00", "P4,523.00"], en: ["P3,923.00", "P4,123.00", "P4,323.00", "P4,523.00"] }, 
                answer: 1, topic: 'Komisyon' 
            },
            // Q30: Diskwento (Final Price) - Final Exam Q4. P995 @ 20%. P995 x 0.2 = P199. P995 - P199 = P796
            { 
                question: { tl: "Ang sapatos na P995 ay may 20% diskwento. Magkano na lang ang halaga nito?", en: "P995 shoes have a 20% discount. What is the final price?" }, 
                options: { tl: ["P786.00", "P796.00", "P806.00", "P776.00"], en: ["P786.00", "P796.00", "P806.00", "P776.00"] }, 
                answer: 1, topic: 'Diskwento' }
        ];

        let userAnswers = {}; // {qIndex: selectedOptionIndex}
        const quizName = "Pagsusulit: Mga Porsiyento at Persentahe";
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
            
            // Modal elements
            modalTitle().textContent = uiText.modalTitle[lang];
            modalScoreText().textContent = uiText.modalScoreText[lang];
            modalReviewText().textContent = uiText.modalReviewText[lang];
            recordButtonLink().textContent = uiText.recordButton[lang];
            resetButtonModal().textContent = uiText.resetButton[lang];
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
                
                // Note: The quiz data has 30 questions. The split logic below has been maintained 
                // based on the original structure (1-15, 16-30). Since the data only goes up to index 29 (Q30), 
                // section 3 content will be empty but the logic accounts for it.
                if (index < 15) {
                    section1Content += questionHtml;
                } else if (index < 30) {
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
                <!-- Hide Section 3 if empty, as the question split only results in 2 full sections (1-15, 16-30) -->
                <div class="quiz-section-card" id="quiz-section-3" style="${section3Content.trim() === '' ? 'display:none;' : ''}">
                    ${sectionTitles[2]}
                    <div class="space-y-4 pt-4">${section3Content.trim() === '' ? '<p class="text-gray-500 text-center py-4">Walang laman para sa bahaging ito.</p>' : section3Content}</div>
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
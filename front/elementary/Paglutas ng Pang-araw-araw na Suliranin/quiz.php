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
    <title>Pagsusulit: Paglutas ng Pang-araw-araw na Suliranin</title>
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
                <h1 class="text-4xl font-extrabold text-primary mb-2" id="quiz-title">Pagsusulit: Paglutas ng Pang-araw-araw na Suliranin</h1>
                <p class="text-xl text-gray-600" id="quiz-subtitle">30 Items: Pagkilala, Pagpaplano, at Solusyon</p>
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
            'quizTitle': { tl: "Pagsusulit: Paglutas ng Pang-araw-araw na Suliranin", en: "Quiz: Solving Everyday Problems" },
            'quizSubtitle': { tl: "30 Items: Pagkilala, Pagpaplano, at Solusyon", en: "30 Items: Recognition, Planning, and Solution" },
            'goBack': { tl: 'Bumalik', en: 'Go Back' },
            'section1Title': { tl: 'I. Aralin 1: Pagkilala at Pagsuri sa Suliranin', en: 'I. Lesson 1: Problem Recognition and Analysis' },
            'section2Title': { tl: 'II. Aralin 2: Pananaw at Pagpaplano sa Solusyon', en: 'II. Lesson 2: Perspective and Solution Planning' },
            'section3Title': { tl: 'III. Aralin 3: Pananagutan at Pagsasagawa ng Solusyon', en: 'III. Lesson 3: Accountability and Solution Implementation' },
            'submitButton': { tl: 'Tapusin at Tingnan ang Resulta', en: 'Finish and View Results' },
            'unansweredAlert': { tl: 'Kailangan mo pang sagutan ang', en: 'You still need to answer' },
            'unansweredAlertSuffix': { tl: 'na tanong bago mag-submit.', en: 'questions before submitting.' },
            'modalTitle': { tl: 'Resulta ng Pagsusulit', en: 'Quiz Results' },
            'modalScoreText': { tl: 'Nakakuha ka ng:', en: 'You scored:' },
            'modalReviewText': { tl: 'Tingnan ang iyong mga sagot sa ibaba para matuto.', en: 'Review your answers below to learn.' },
            'recordButton': { tl: 'I-record ang Resulta at Pumunta sa Talaan', en: 'Record Result and Go to Records' }, // Updated text
            'resetButton': { tl: 'Subukan Muli', en: 'Try Again' },
        };

        // --- QUIZ DATA (30 Items Total) - RETAINED ---
        const quizData = [
            // Section I: Aralin 1: Pagkilala at Pagsuri sa Suliranin (1-10)
            // Q1: Definition of Problem (Concept)
            { 
                question: { tl: "Ano ang pinakamahusay na kahulugan ng Suliranin (Problem)?", en: "What is the best definition of a Problem?" }, 
                options: { tl: ["Isang balakid na madaling lutasin.", "Isang sitwasyon na mahirap harapin o unawain.", "Isang desisyon na walang panganib.", "Isang pangyayari na nakaaapekto lamang sa iisang tao."], en: ["An easily solvable obstacle.", "A situation that is difficult to face or understand.", "A risk-free decision.", "An event that affects only one person."] }, 
                answer: 1, topic: 'Definition' 
            },
            // Q2: Problem Start (Jose Example)
            { 
                question: { tl: "Sa kaso ni Jose, kailan nagsimula ang kaniyang suliranin sa mababang marka?", en: "In Jose's case, when did his problem with low grades begin?" }, 
                options: { tl: ["Nang makita niya ang kaniyang report card.", "Nang maging mahigpit ang kaniyang mga magulang.", "Nang siya ay palagiang lumiban sa kaniyang mga klase.", "Nang siya ay bumagsak sa periodical exam."], en: ["When he saw his report card.", "When his parents became strict.", "When he consistently cut his classes.", "When he failed the periodical exam."] }, 
                answer: 2, topic: 'Problem Cause' 
            },
            // Q3: Affects Whom (Pilo Example)
            { 
                question: { tl: "Sino ang mga tuwirang apektado (directly affected) ng problema ni Pilo (lasing at pananakit)?", en: "Who are directly affected by Pilo's problem (drunkenness and violence)?" }, 
                options: { tl: ["Pilo at Elsa lamang", "Pilo at ang kaniyang mga katrabaho", "Sina Pilo, Elsa, at ang kanilang mga anak", "Ang ina ni Elsa at ang mga kaibigan ni Pilo"], en: ["Pilo and Elsa only", "Pilo and his co-workers", "Pilo, Elsa, and their children", "Elsa's mother and Pilo's friends"] }, 
                answer: 2, topic: 'People Involved' 
            },
            // Q4: Problem Effect (General)
            { 
                question: { tl: "Paano nakapagpapatibay sa ating pagkatao ang mga suliranin?", en: "How do problems strengthen our character?" }, 
                options: { tl: ["Dahil nagiging emosyonal tayo", "Dahil natututo tayong mag-isip tungkol sa ating mga kilos", "Dahil nagiging mahina tayo", "Dahil sumusuko tayo kaagad"], en: ["Because we become emotional", "Because we learn to think about our actions", "Because we become weak", "Because we give up easily"] }, 
                answer: 1, topic: 'Positive View' 
            },
            // Q5: Effect on Others (Berto Example)
            { 
                question: { tl: "Nang magalit si Berto sa bahay, bakit naapektuhan ang kaniyang sekretarya sa opisina?", en: "When Berto got angry at home, why was his secretary in the office affected?" }, 
                options: { tl: ["Dahil nag-away sila ng misis ni Berto", "Dahil binulyawan siya ni Berto at naging asiwa ang kanilang pakikitungo", "Dahil umalis si Berto sa trabaho", "Dahil siya ang sinisisi sa problema"], en: ["Because he fought with Berto's wife", "Because Berto yelled at her and their interaction became awkward", "Because Berto left work", "Because she was blamed for the problem"] }, 
                answer: 1, topic: 'Effect on Others' 
            },
            // Q6: Source of Problems (General)
            { 
                question: { tl: "Sa anong paraan karaniwang nagsisimula ang mga suliranin?", en: "In what way do problems usually begin?" }, 
                options: { tl: ["Dahil sa mga kilos natin na hindi natin pinag-iisipan", "Dahil sa ibang tao", "Dahil sa mahigpit na mga magulang", "Dahil sa kapalaran"], en: ["Due to our actions that we don't think through", "Due to other people", "Due to strict parents", "Due to fate"] }, 
                answer: 0, topic: 'Problem Cause' 
            },
            // Q7: Unforeseen Problems
            { 
                question: { tl: "Alin ang halimbawa ng hindi inaasahang suliranin (unforeseen problem)?", en: "Which is an example of an unforeseen problem?" }, 
                options: { tl: ["Hindi pag-aaral para sa pagsusulit", "Pagliliban sa klase", "Biglaang pagkamatay ng taong bumubuhay sa pamilya", "Pagkalasing dahil sa problema"], en: ["Not studying for a test", "Cutting classes", "Sudden death of the family breadwinner", "Getting drunk due to a problem"] }, 
                answer: 2, topic: 'Problem Type' 
            },
            // Q8: Problem Recognition
            { 
                question: { tl: "Kailan nagkakaroon ng isang ganap na suliranin (problem)?", en: "When does a complete problem occur?" }, 
                options: { tl: ["Kapag walang solusyon ang balakid.", "Kapag hindi natin binibigyan ng pansin ang isang balakid at apektado nito ang ating gawain.", "Kapag sinisisi natin ang ibang tao.", "Kapag naghahanap tayo ng suporta."], en: ["When the obstacle has no solution.", "When we ignore an obstacle and it affects our work.", "When we blame others.", "When we seek support."] }, 
                answer: 1, topic: 'Problem Recognition' 
            },
            // Q9: Pilo's Initial Mistake
            { 
                question: { tl: "Ano ang unang pagkakamali ni Pilo na nagpalala sa sitwasyon?", en: "What was Pilo's first mistake that worsened the situation?" }, 
                options: { tl: ["Ang pag-uwi nang lasing.", "Ang pananakit kay Elsa.", "Ang hindi pagsabi kay Elsa tungkol sa problema sa trabaho.", "Ang pag-alis ni Elsa."], en: ["Coming home drunk.", "Hurt Elsa.", "Not telling Elsa about the problem at work.", "Elsa leaving."] }, 
                answer: 2, topic: 'Problem Cause' 
            },
            // Q10: Role of Problems
            { 
                question: { tl: "Ang paglutas ng suliranin ay nagtuturo sa atin na unawain ang anong aspeto?", en: "Problem-solving teaches us to understand what aspect?" }, 
                options: { tl: ["Mga pangyayari na walang solusyon.", "Ang ating mga sarili at ang mga taong kasangkot.", "Ang kalagayan ng ekonomiya.", "Ang pagiging mas matalino sa susunod."], en: ["Events that have no solution.", "Ourselves and the people involved.", "The state of the economy.", "Being smarter next time."] }, 
                answer: 1, topic: 'Learning from Problems' 
            },

            // Section II: Aralin 2: Pananaw at Pagpaplano sa Solusyon (11-20)
            // Q11: Importance of Planning (Pre-test Q7)
            { 
                question: { tl: "Alin ang HINDI totoo? Ang paglutas sa mga suliranin ay:", en: "Which is NOT true? Solving problems should:" }, 
                options: { tl: ["Dapat may maayos na pagpaplano.", "Dapat isipin nang mabuti.", "Hindi nangangailangan ng maayos na pagpaplano.", "Dapat maging bukas ang isip."], en: ["Have proper planning.", "Be well thought out.", "Not require proper planning.", "Have an open mind."] }, 
                answer: 2, topic: 'Planning/Truth' 
            },
            // Q12: Positive View (Pre-test Q2)
            { 
                question: { tl: "Makatutulong kung positibo ang tingin ng isang tao sa isang suliranin dahil:", en: "It helps if a person views a problem positively because:" }, 
                options: { tl: ["Hindi na kailangang mag-isip ng solusyon.", "Nagiging mas malikhain siya sa paglutas ng suliranin.", "Hindi na kailangang mag-alala.", "Makakatakas siya sa problema."], en: ["There's no need to think of a solution.", "They become more creative in problem-solving.", "There's no need to worry.", "They can escape the problem."] }, 
                answer: 1, topic: 'Positive Thinking' 
            },
            // Q13: Goal Setting (Pre-test Q10)
            { 
                question: { tl: "Ano ang dapat gawin ng isang tao bago niya lubusang malutas ang sariling suliranin?", en: "What should a person do before fully solving their own problem?" }, 
                options: { tl: ["Manisi ng iba.", "Malaman kung ano talaga ang kaniyang gusto/layunin.", "Umasa sa desisyon ng iba.", "Magkulong sa silid."], en: ["Blame others.", "Know what their goal/purpose really is.", "Rely on others' decisions.", "Lock themselves in a room."] }, 
                answer: 1, topic: 'Goal Setting' 
            },
            // Q14: Dealing with Emotion (Concept)
            { 
                question: { tl: "Ano ang unang dapat gawin kapag nakaramdam ng sobrang pagkabalisa at pagkalito (tulad ni Marian)?", en: "What is the first thing to do when feeling extremely anxious and confused (like Marian)?" }, 
                options: { tl: ["Maghanap ng marahas na solusyon.", "Humingi ng tulong at manatiling mahinahon.", "Saktan ang sarili.", "Mag-alsa-balutan."], en: ["Look for a drastic solution.", "Seek help and remain calm.", "Harm oneself.", "Leave home."] }, 
                answer: 1, topic: 'Emotional Control' 
            },
            // Q15: Solutions Exist (Pre-test Q4)
            { 
                question: { tl: "Alin ang HINDI totoo tungkol sa mga suliranin?", en: "Which is NOT true about problems?" }, 
                options: { tl: ["Laging may solusyon ang bawat suliranin.", "Dapat hindi tayo sumusuko sa paglutas.", "Ang pagsuko ay makalulutas ng problema.", "Ang suliranin ay karaniwang bahagi ng buhay."], en: ["Every problem always has a solution.", "We should not give up on solving them.", "Giving up solves the problem.", "Problems are a normal part of life."] }, 
                answer: 2, topic: 'Solutions Exist/Truth' 
            },
            // Q16: Importance of Open Mind (Pre-test Q8)
            { 
                question: { tl: "Ang pagkakaroon ng bukas na isipan (open mind) ay makatutulong dahil:", en: "Having an open mind helps because:" }, 
                options: { tl: ["Nagiging negatibo tayo sa suliranin.", "Nagbubunsod ito ng pagtanggap sa suliranin sa iba't ibang pananaw.", "Pinipili lamang natin ang isang solusyon.", "Nawawalan tayo ng pag-asa."], en: ["We become negative about the problem.", "It leads to accepting the problem from different perspectives.", "We only choose one solution.", "We lose hope."] }, 
                answer: 1, topic: 'Open Mind' 
            },
            // Q17: Solusyon Efficacy (Pre-test Q3)
            { 
                question: { tl: "Ang bawat solusyon ay may kaakibat na panganib na hindi maging mabisa. Ano ang dapat gawin?", en: "Every solution carries the risk of not being effective. What should be done?" }, 
                options: { tl: ["Iwasan ang paghahanap ng solusyon.", "Piliin ang unang solusyon na maisip.", "Manatiling positibo at ipagpatuloy ang paghahanap ng pinakamabisa.", "Sisihin ang mga nagbigay ng payo."], en: ["Avoid looking for a solution.", "Choose the first solution that comes to mind.", "Remain positive and continue searching for the most effective one.", "Blame those who gave advice."] }, 
                answer: 2, topic: 'Solution Risk' 
            },
            // Q18: First Step in Problem Solving (Concept)
            { 
                question: { tl: "Ano ang unang hakbang sa paglutas ng anumang suliranin?", en: "What is the first step in solving any problem?" }, 
                options: { tl: ["Hanapin ang pinakamabisang solusyon.", "Akuin ang pananagutan.", "Tukuyin nang mabuti kung ano ang tunay na suliranin.", "Iwasang manisi ng iba."], en: ["Find the most effective solution.", "Take accountability.", "Clearly identify the real problem.", "Avoid blaming others."] }, 
                answer: 2, topic: 'First Step' 
            },
            // Q19: Planning Focus (Concept)
            { 
                question: { tl: "Bakit mahalagang tumutok sa pagpaplano matapos matukoy ang suliranin?", en: "Why is it important to focus on planning after identifying the problem?" }, 
                options: { tl: ["Dahil ito ang huling hakbang.", "Dahil makatutulong ito upang mas maunawaan ang suliranin.", "Dahil mananalo tayo sa argumento.", "Dahil sisihin natin ang sarili."], en: ["Because it's the last step.", "Because it helps to better understand the problem.", "Because we will win the argument.", "Because we will blame ourselves."] }, 
                answer: 1, topic: 'Planning Focus' 
            },
            // Q20: Solution Evaluation (Concept)
            { 
                question: { tl: "Sa paglutas ng suliranin, ano ang dapat bigyang pansin bukod sa mga posibleng solusyon?", en: "In problem-solving, what should be considered besides possible solutions?" }, 
                options: { tl: ["Kung sino ang sisisihin.", "Ang pinansiyal na gastusin lamang.", "Ang mga posibleng bunga ng mga solusyong ito (consequences).", "Ang mabilis na pagpapatupad."], en: ["Who to blame.", "Only the financial cost.", "The possible consequences of these solutions.", "Rapid implementation."] }, 
                answer: 2, topic: 'Solution Consequence' 
            },

            // Section III: Aralin 3: Pananagutan at Pagsasagawa ng Solusyon (21-30)
            // Q21: Accountability (Concept)
            { 
                question: { tl: "Bakit mahalagang akuin ang pananagutan (accountability) sa sariling suliranin?", en: "Why is it important to take accountability for one's own problem?" }, 
                options: { tl: ["Dahil walang tutulong sa atin.", "Dahil ang pagharap sa suliranin ay makapagpapatibay sa ating pagkatao.", "Dahil kailangang manisi ng iba.", "Dahil ito ang pinakamahirap na paraan."], en: ["Because no one will help us.", "Because facing the problem strengthens our character.", "Because others must be blamed.", "Because it's the most difficult way."] }, 
                answer: 1, topic: 'Accountability' 
            },
            // Q22: Dealing with Emotions (Concept)
            { 
                question: { tl: "Ano ang pinakamainam na gawin kapag galit o nabigo ka sa isang sitwasyon?", en: "What is the best thing to do when you are angry or frustrated in a situation?" }, 
                options: { tl: ["Manisi ng iba.", "Magkulong sa kuwarto at saktan ang sarili.", "Pangibabawan ang damdamin at maging mahinahon.", "Maglasing para makalimutan ang problema."], en: ["Blame others.", "Lock yourself in a room and harm yourself.", "Overcome emotions and remain calm.", "Get drunk to forget the problem."] }, 
                answer: 2, topic: 'Emotion Handling' 
            },
            // Q23: When to Seek Help (Concept)
            { 
                question: { tl: "Kailan nararapat na humingi ng tulong sa isang suliranin?", en: "When should one seek help for a problem?" }, 
                options: { tl: ["Kapag hindi na natin malulutas nang mag-isa.", "Kapag nalutas na natin ang lahat.", "Kapag ayaw na nating mag-isip.", "Kapag nagkaroon tayo ng nervous breakdown."], en: ["When we can no longer solve it alone.", "When we have already solved everything.", "When we no longer want to think.", "When we have a nervous breakdown."] }, 
                answer: 0, topic: 'Seeking Help' 
            },
            // Q24: Role of Others (Concept)
            { 
                question: { tl: "Ano ang pinakamainam na maitutulong ng ibang tao (kaibigan/pamilya) sa ating suliranin?", en: "What is the best help others (friends/family) can offer with our problems?" }, 
                options: { tl: ["Ibigay ang solusyon para sa atin.", "Lutasin ang problema nang sila lang.", "Magbigay ng payo at emosyonal na suporta.", "Sisihin ang taong nagdulot ng problema."], en: ["Give us the solution.", "Solve the problem by themselves.", "Provide advice and emotional support.", "Blame the person who caused the problem."] }, 
                answer: 2, topic: 'Support Role' 
            },
            // Q25: Solution Effectiveness (Concept)
            { 
                question: { tl: "Paano natin malalaman kung ang isang solusyon ay Mabisa (Effective)?", en: "How do we know if a solution is Effective?" }, 
                options: { tl: ["Kapag ito ang pinakamabilis na naisip.", "Kapag nagdulot ito ng inaasahang epekto o resulta.", "Kapag sinabi ng kaibigan na tama ito.", "Kapag wala nang ibang solusyon."], en: ["When it was the fastest idea.", "When it resulted in the expected effect or outcome.", "When a friend says it is correct.", "When there is no other solution."] }, 
                answer: 1, topic: 'Solution Effectiveness' 
            },
            // Q26: Blaming (Concept)
            { 
                question: { tl: "Bakit HINDI dapat manisi ng ibang tao kaugnay ng iyong suliranin?", en: "Why should you NOT blame others for your problem?" }, 
                options: { tl: ["Dahil magpapatibay ito ng pagkatao.", "Dahil ang pagsisi ay magpapahirap sa paghanap ng solusyon at pagiging positibo.", "Dahil lahat ng problema ay galing sa iyo.", "Dahil mananalo ka sa pagtatalo."], en: ["Because it strengthens character.", "Because blaming makes it harder to find solutions and be positive.", "Because all problems originate from you.", "Because you will win the argument."] }, 
                answer: 1, topic: 'Avoid Blaming' 
            },
            // Q27: Problem as Opportunity (Pre-test Q5)
            { 
                question: { tl: "Ang paglutas ng suliranin ay naghahatid sa atin ng mga mahalagang aral sa buhay. Ito ay totoo dahil:", en: "Problem-solving gives us valuable life lessons. This is true because:" }, 
                options: { tl: ["Ito ay nakapagpapanilay tungkol sa ating mga kilos.", "Ito ay nakamamatay.", "Ito ay nakalulutas ng lahat ng krisis pang-ekonomiya.", "Ito ay nagbibigay ng mataas na marka."], en: ["It makes us reflect on our actions.", "It is deadly.", "It solves all economic crises.", "It gives high grades."] }, 
                answer: 0, topic: 'Problem as Opportunity' 
            },
            // Q28: Positive Outcome (Pilo Example)
            { 
                question: { tl: "Ano ang isa sa positibong bunga ng suliranin ni Pilo?", en: "What is one of the positive outcomes of Pilo's problem?" }, 
                options: { tl: ["Nag-solo siyang muli.", "Nanumbalik ang kanilang pagsasamahan at nakahanap siya ng mas magandang trabaho.", "Nagkaroon siya ng mas maraming kaibigan.", "Nakalimutan niya na ang kaniyang mga anak."], en: ["He became single again.", "Their relationship was restored and he found a better job.", "He gained more friends.", "He forgot about his children."] }, 
                answer: 1, topic: 'Positive Outcome' 
            },
            // Q29: Mental State for Solution
            { 
                question: { tl: "Ang pagiging mahinahon (calm) ay mahalaga dahil ito ay nagbibigay sa atin ng pagkakataong mag-isip nang:", en: "Being calm is important because it gives us the opportunity to think:" }, 
                options: { tl: ["Nang negatibo at balisa.", "Nang malinaw at positibo.", "Nang mabilis at marahas.", "Nang may pagpapatuon ng sisi."], en: ["Negatively and anxiously.", "Clearly and positively.", "Quickly and drastically.", "With a focus on blaming."] }, 
                answer: 1, topic: 'Mental State' 
            },
            // Q30: The Reality of Problems
            { 
                question: { tl: "Ang mga suliranin ay karaniwang bahagi ng buhay at:", en: "Problems are a normal part of life and:" }, 
                options: { tl: ["Hindi na maibabalik ang naaksayang oras.", "Nagbibigay-daan sa paglago ng ating pagkatao.", "Dapat harapin nang may takot at pagkalito.", "Walang kaugnayan sa ating mga kilos."], en: ["Wasted time cannot be recovered.", "Allow for the growth of our character.", "Should be faced with fear and confusion.", "Are unrelated to our actions."] }, 
                answer: 1, topic: 'Reality of Problems' 
            }
        ];

        let userAnswers = {}; // {qIndex: selectedOptionIndex}
        const quizName = "Pagsusulit: Paglutas ng Pang-araw-araw na Suliranin";
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
            // Initialize language button state, update static UI, and call renderQuiz()
            setLanguage(currentLanguage); 
        };
    </script>

</body>
</html>
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
    <title>Pagsusulit: Practical Research 1</title>
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
                <h1 class="text-4xl font-extrabold text-primary mb-2" id="quiz-title">Pagsusulit: Practical Research 1</h1>
                <p class="text-xl text-gray-600" id="quiz-subtitle">30 Items: Katangian, Proseso, at Etika ng Pananaliksik</p>
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
            'quizTitle': { tl: "Pagsusulit: Practical Research 1", en: "Quiz: Practical Research 1" },
            'quizSubtitle': { tl: "30 Items: Katangian, Proseso, at Etika ng Pananaliksik", en: "30 Items: Characteristics, Process, and Ethics of Research" },
            'goBack': { tl: 'Bumalik', en: 'Go Back' },
            'section1Title': { tl: 'I. Kahalagahan, Katangian, at Etika ng Pananaliksik (1 - 10)', en: 'I. Importance, Characteristics, and Ethics of Research (1 - 10)' },
            'section2Title': { tl: 'II. Qualitative Research at Kinds (11 - 20)', en: 'II. Qualitative Research and Kinds (11 - 20)' },
            'section3Title': { tl: 'III. Research Paper Components (21 - 30)', en: 'III. Research Paper Components (21 - 30)' },
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
        // Based on: Practical Research 1.pdf
        
        const quizData = [
            // Section I: Kahalagahan, Katangian, at Etika ng Pananaliksik (LAS 1, 2, 3)
            // Q1: Kahulugan ng Research (LAS 1)
            { 
                question: { tl: "Ayon kay Earl Robert Babbie, ang Research ay isang sistematikong pagtatanong (systematic inquiry) para sa mga sumusunod, MALIBAN sa:", en: "According to Earl Robert Babbie, Research is a systematic inquiry for the following, EXCEPT for:" }, 
                options: { tl: ["Ilarawan (Describe)", "Ipaliwanag (Explain)", "Kontrahin (Oppose)", "I-predict (Predict)"], en: ["Describe", "Explain", "Oppose", "Predict"] }, 
                answer: 2, topic: 'Kahulugan ng Research' 
            },
            // Q2: Kahalagahan ng Research (LAS 1, P.8)
            { 
                question: { tl: "Ang Research ay makatutulong sa pagpapasya (decision making) at pagdala ng konsistensiya (consistency) sa trabaho. Ito ay nagpapakita ng:", en: "Research can help in decision making and bring consistency to work. This shows the:" }, 
                options: { tl: ["Kahalagahan ng Research sa Araw-araw", "Katangian ng Research", "Etika ng Research", "Proseso ng Research"], en: ["Importance of Research in Daily Life", "Characteristics of Research", "Ethics of Research", "Process of Research"] }, 
                answer: 0, topic: 'Kahalagahan ng Research' 
            },
            // Q3: Katangian ng Research - Empirical (LAS 2)
            { 
                question: { tl: "Aling katangian ng research ang nangangahulugang ito ay nakabatay sa mga valid na pamamaraan at prinsipyo (reliable procedures and principles)?", en: "Which characteristic of research means it is based on valid procedures and principles (reliable procedures and principles)?" }, 
                options: { tl: ["Logical", "Cyclical", "Analytical", "Empirical"], en: ["Logical", "Cyclical", "Analytical", "Empirical"] }, 
                answer: 3, topic: 'Katangian ng Research' 
            },
            // Q4: Katangian ng Research - Logical/Methodical (LAS 2)
            { 
                question: { tl: "Aling katangian ng research ang nangangahulugang ito ay ginawa nang walang kinikilingan (without bias)?", en: "Which characteristic of research means it is done without bias?" }, 
                options: { tl: ["Cyclical", "Analytical", "Critical", "Methodical"], en: ["Cyclical", "Analytical", "Critical", "Methodical"] }, 
                answer: 3, topic: 'Katangian ng Research' 
            },
            // Q5: Etika sa Research (LAS 2, P.9)
            { 
                question: { tl: "Ang pagpapakita ng integridad at objectivity sa pagkalap ng datos ay mahalaga. Alin ang HINDI etikal na gawain?", en: "Showing integrity and objectivity in data gathering is important. Which is NOT an ethical practice?" }, 
                options: { tl: ["Paggalang sa privacy ng respondents", "Pag-acknowledge sa tulong ng iba", "Pagpapakita ng tamang resulta", "Pagsira ng privacy ng respondents"], en: ["Respecting the privacy of respondents", "Acknowledging others' contributions", "Showing the correct results", "Violating the privacy of respondents"] }, 
                answer: 3, topic: 'Etika ng Research' 
            },
            // Q6: Etika sa Research (LAS 2, P.9)
            { 
                question: { tl: "Ang pagpapahayag ng resulta na may paglilihis sa sponsor (distortion of findings by sponsor) ay lumalabag sa etika ng research dahil sa:", en: "Expressing results with distortion from the sponsor (distortion of findings by sponsor) violates research ethics due to:" }, 
                options: { tl: ["Pagiging di-objective", "Hindi pagiging methodical", "Pagsira ng privacy", "Paggamit ng maling procedure"], en: ["Lack of objectivity", "Not being methodical", "Violating privacy", "Using wrong procedures"] }, 
                answer: 0, topic: 'Etika ng Research' 
            },
            // Q7: Pagkakaiba ng Research - Qualitative (LAS 3, P.10)
            { 
                question: { tl: "Alin ang TAMA tungkol sa Qualitative Research?", en: "Which is TRUE about Qualitative Research?" }, 
                options: { tl: ["Naghahanap ng cause at effect", "Mas malaki at random ang sample", "Kinokolekta ang datos na karaniwang words (text)", "Gumagamit ng numbers at statistics"], en: ["Seeks cause and effect", "Sample is larger and random", "Data collected is usually words (text)", "Uses numbers and statistics"] }, 
                answer: 2, topic: 'Quantitative vs Qualitative' 
            },
            // Q8: Pagkakaiba ng Research - Quantitative (LAS 3, P.10)
            { 
                question: { tl: "Alin ang TAMA tungkol sa Quantitative Research?", en: "Which is TRUE about Quantitative Research?" }, 
                options: { tl: ["Ang pag-aaral ay subjective at biased", "Nakalistang salita, imahe ang datos", "Ang group of study ay mas laki at random ang pagpili", "Ang layunin ay intindihin ang social interaction"], en: ["The study is subjective and biased", "Data is listed words, images", "The group of study is larger and selection is random", "The goal is to understand social interaction"] }, 
                answer: 2, topic: 'Quantitative vs Qualitative' 
            },
            // Q9: Uri ng Research - Mixed Method (LAS 4, P.11)
            { 
                question: { tl: "Aling research approach ang pinagsamang quantitative at qualitative kind of research?", en: "Which research approach combines quantitative and qualitative kind of research?" }, 
                options: { tl: ["Scientific Approach", "Naturalistic Approach", "Triangulation/Mixed Method", "Positive Approach"], en: ["Scientific Approach", "Naturalistic Approach", "Triangulation/Mixed Method", "Positive Approach"] }, 
                answer: 2, topic: 'Uri ng Research' 
            },
            // Q10: Uri ng Research - Naturalistic (LAS 4, P.11)
            { 
                question: { tl: "Aling research approach ang people-oriented at concerned sa qualitative data?", en: "Which research approach is people-oriented and concerned with qualitative data?" }, 
                options: { tl: ["Scientific Approach", "Naturalistic Approach", "Mixed Method", "Positive Approach"], en: ["Scientific Approach", "Naturalistic Approach", "Mixed Method", "Positive Approach"] }, 
                answer: 1, topic: 'Uri ng Research' 
            },

            // Section II: Qualitative Research at Kinds (LAS 5, 7)
            // Q11: Katangian ng Qualitative - Naturalistic (LAS 5)
            { 
                question: { tl: "Ang pag-aaral sa real-world situations nang natural (non-manipulative) ay tinatawag na:", en: "The study of real-world situations naturally (non-manipulative) is called:" }, 
                options: { tl: ["Inductive Analysis", "Holistic Perspective", "Context Sensitivity", "Naturalistic Inquiry"], en: ["Inductive Analysis", "Holistic Perspective", "Context Sensitivity", "Naturalistic Inquiry"] }, 
                answer: 3, topic: 'Qualitative: Katangian' 
            },
            // Q12: Katangian ng Qualitative - Holistic (LAS 5)
            { 
                question: { tl: "Ang buong phenomenon na pinag-aaralan ay inuusisa bilang isang complex system (mas higit sa sum of its parts) ay:", en: "The whole phenomenon being studied is understood as a complex system (greater than the sum of its parts) is:" }, 
                options: { tl: ["Inductive Analysis", "Holistic Perspective", "Emphatic Neutrality", "Unique Case Orientation"], en: ["Inductive Analysis", "Holistic Perspective", "Emphatic Neutrality", "Unique Case Orientation"] }, 
                answer: 1, topic: 'Qualitative: Katangian' 
            },
            // Q13: Katangian ng Qualitative - Inductive (LAS 5)
            { 
                question: { tl: "Ang pag-aaral sa details at specifics ng datos upang makahanap ng importanteng categories o interrelationships ay:", en: "The study of details and specifics of data to find important categories or interrelationships is:" }, 
                options: { tl: ["Inductive Analysis", "Holistic Perspective", "Dynamic Systems", "Context Sensitivity"], en: ["Inductive Analysis", "Holistic Perspective", "Dynamic Systems", "Context Sensitivity"] }, 
                answer: 0, topic: 'Qualitative: Katangian' 
            },
            // Q14: Uri ng Qualitative - Ethnography (LAS 7)
            { 
                question: { tl: "Anong uri ng qualitative research ang nag-i-immerse sa researcher sa kultura ng target participants (environment) para maunawaan ang goals, cultures, at challenges? ", en: "What type of qualitative research immerses the researcher in the culture of the target participants (environment) to understand the goals, cultures, and challenges? " }, 
                options: { tl: ["Phenomenological", "Grounded Theory", "Case Study", "Ethnography"], en: ["Phenomenological", "Grounded Theory", "Case Study", "Ethnography"] }, 
                answer: 3, topic: 'Qualitative: Uri' 
            },
            // Q15: Uri ng Qualitative - Phenomenological (LAS 7)
            { 
                question: { tl: "Anong uri ng qualitative research ang gumagamit ng interview at dokumento para maunawaan ang kahulugan (meaning) ng isang shared experience?", en: "What type of qualitative research uses interviews and documents to understand the meaning of a shared experience?" }, 
                options: { tl: ["Phenomenological", "Grounded Theory", "Case Study", "Ethnography"], en: ["Phenomenological", "Grounded Theory", "Case Study", "Ethnography"] }, 
                answer: 0, topic: 'Qualitative: Uri' 
            },
            // Q16: Uri ng Qualitative - Case Study (LAS 7)
            { 
                question: { tl: "Anong uri ng qualitative research ang nag-iimbestiga nang malalim sa isang tao, event, programa, o aktibidad gamit ang multiple data sources? ", en: "What type of qualitative research investigates in depth a person, event, program, or activity using multiple data sources? " }, 
                options: { tl: ["Phenomenological", "Grounded Theory", "Case Study", "Ethnography"], en: ["Phenomenological", "Grounded Theory", "Case Study", "Ethnography"] }, 
                answer: 2, topic: 'Qualitative: Uri' 
            },
            // Q17: Kalakasan ng Qualitative (LAS 6, P.13)
            { 
                question: { tl: "Alin ang kalakasan (strength) ng Qualitative Research?", en: "Which is a strength of Qualitative Research?" }, 
                options: { tl: ["Hindi nagre-require ng maraming oras", "Madaling i-maintain ang rigor", "Na-e-examine ang issues nang detalyado at in-depth", "Hindi naka-aapekto ang researcher sa subjects"], en: ["Does not require much time", "Easy to maintain rigor", "Examines issues in detail and in-depth", "The researcher does not affect the subjects"] }, 
                answer: 2, topic: 'Qualitative: Strengths' 
            },
            // Q18: Kahinaan ng Qualitative (LAS 6, P.13)
            { 
                question: { tl: "Alin ang kahinaan (weakness) ng Qualitative Research?", en: "Which is a weakness of Qualitative Research?" }, 
                options: { tl: ["Madaling i-analyze ang data", "Hindi apektado ang subjects sa researcher", "Maliit ang volume ng data", "Ang quality ay nakadepende sa skills ng researcher"], en: ["Easy to analyze data", "Subjects are not affected by the researcher", "Small volume of data", "Quality depends on the researcher's skills"] }, 
                answer: 3, topic: 'Qualitative: Weaknesses' 
            },
            // Q19: Weakness - Confidentiality (LAS 6, P.13)
            { 
                question: { tl: "Ang anonymity at confidentiality ay maaaring maging problema kapag nagpe-present ng findings dahil sa:", en: "Anonymity and confidentiality can be a problem when presenting findings because of:" }, 
                options: { tl: ["Masyadong maraming data", "Kakaunti ang subject", "Ang data ay nakabatay sa human experience", "Masyadong detalyado ang data"], en: ["Too much data", "Few subjects", "The data is based on human experience", "The data is too detailed"] }, 
                answer: 2, topic: 'Qualitative: Weaknesses' 
            },
            // Q20: Strengths - Interviews (LAS 6, P.13)
            { 
                question: { tl: "Ang interviews sa Qualitative Research ay hindi limitado sa specific questions. Ito ay isang kalakasan dahil:", en: "Interviews in Qualitative Research are not limited to specific questions. This is a strength because:" }, 
                options: { tl: ["Mas mabilis matapos ang research", "Nag-a-allow ng in-depth at detalyadong sagot", "Hindi na kailangan ang follow-up questions", "Nagiging mas objective ang data"], en: ["Research finishes faster", "Allows for in-depth and detailed answers", "Follow-up questions are no longer needed", "Data becomes more objective"] }, 
                answer: 1, topic: 'Qualitative: Strengths' 
            },

            // Section III: Research Paper Components (LAS 8, 9, 10, 11, 12, 15, 17, 18, 20, 22)
            // Q21: Research Title Tip (LAS 8, P.15)
            { 
                question: { tl: "Ang title ng research ay dapat nasa pagitan ng ilang salita?", en: "The research title should be between how many words?" }, 
                options: { tl: ["5-10 words", "10-15 words", "15-20 words", "Higit sa 20 words"], en: ["5-10 words", "10-15 words", "15-20 words", "More than 20 words"] }, 
                answer: 1, topic: 'Research: Title' 
            },
            // Q22: Research Title Tip (LAS 8, P.15)
            { 
                question: { tl: "Ano ang dapat iwasan sa pagsusulat ng research title?", en: "What should be avoided when writing a research title?" }, 
                options: { tl: ["Gumamit ng keywords", "Gumamit ng declarative titles", "Gumamit ng unnecessary words at jargons", "Tiyakin ang pagka-klaro"], en: ["Use keywords", "Use declarative titles", "Use unnecessary words and jargons", "Ensure clarity"] }, 
                answer: 2, topic: 'Research: Title' 
            },
            // Q23: Research Question - Characteristic (LAS 9, P.17)
            { 
                question: { tl: "Ang research question ay dapat na Focused, na nangangahulugang:", en: "The research question should be Focused, meaning:" }, 
                options: { tl: ["Hindi ito answerable ng Yes/No", "Ang sagot ay open to debate", "Ito ay narrow enough para masagot nang masinsinan", "Ito ay malinaw at madaling maunawaan"], en: ["It is not answerable by Yes/No", "The answer is open to debate", "It is narrow enough to be answered thoroughly", "It is clear and easy to understand"] }, 
                answer: 2, topic: 'Research: Questions' 
            },
            // Q24: Statement of the Problem (LAS 11, P.19)
            { 
                question: { tl: "Ang Problem Statement ay nagpapaliwanag kung bakit ang problema ay 'worthy of being investigated'. Ano ang HINDI kasama sa function nito?", en: "The Problem Statement explains why the problem is 'worthy of being investigated'. What is NOT included in its function?" }, 
                options: { tl: ["I-identify ang problema", "I-identify ang variables", "I-summarize ang findings ng research", "I-discuss ang relasyon ng variables"], en: ["Identify the problem", "Identify the variables", "Summarize the research findings", "Discuss the relationship between variables"] }, 
                answer: 2, topic: 'Research: Statement of Problem' 
            },
            // Q25: Scope and Delimitation (LAS 10, P.18)
            { 
                question: { tl: "Ang Scope ng research ay nag-i-identify sa boundaries ng pag-aaral, tulad ng sumusunod MALIBAN sa:", en: "The Scope of the research identifies the boundaries of the study, including the following EXCEPT for:" }, 
                options: { tl: ["Subject/Participants", "Objectives", "Time Frame", "Funding Sources"], en: ["Subject/Participants", "Objectives", "Time Frame", "Funding Sources"] }, 
                answer: 3, topic: 'Research: Scope' 
            },
            // Q26: Review of Related Literature (RRL) (LAS 12, P.20)
            { 
                question: { tl: "Ang RRL ay nag-i-identify, nag-e-evaluate, at nag-si-synthesize ng literature. Ano ang tamang proseso sa pagsusulat ng RRL?", en: "RRL identifies, evaluates, and synthesizes literature. What is the correct process for writing the RRL?" }, 
                options: { tl: ["I-locate, I-review, at I-write ang literature", "I-review, I-analyze, at I-criticize", "I-formulate, I-test, at I-conclude", "I-collect, I-organize, at I-present"], en: ["Locate, review, and write the literature", "Review, analyze, and criticize", "Formulate, test, and conclude", "Collect, organize, and present"] }, 
                answer: 0, topic: 'Research: RRL' 
            },
            // Q27: Sampling - Purposeful (LAS 15, P.23)
            { 
                question: { tl: "Anong uri ng sampling ang pumipili ng subjects batay sa pre-selected criteria na kailangan ng research?", en: "What type of sampling selects subjects based on pre-selected criteria required by the research?" }, 
                options: { tl: ["Snowball Sampling", "Quota Sampling", "Purposeful Sampling", "Random Sampling"], en: ["Snowball Sampling", "Quota Sampling", "Purposeful Sampling", "Random Sampling"] }, 
                answer: 2, topic: 'Research: Sampling' 
            },
            // Q28: Data Collection - Interview (LAS 18, P.26)
            { 
                question: { tl: "Anong bahagi ng Interview Protocol ang ginagamit para mag-tanong ng general/non-threatening questions sa simula?", en: "What part of the Interview Protocol is used to ask general/non-threatening questions at the beginning?" }, 
                options: { tl: ["Content Questions", "Probe Questions", "Closing Instructions", "Opening Question"], en: ["Content Questions", "Probe Questions", "Closing Instructions", "Opening Question"] }, 
                answer: 3, topic: 'Research: Data Collection' 
            },
            // Q29: Data Analysis (LAS 17, P.25)
            { 
                question: { tl: "Ang pag-aanalisa at pag-i-interpret ng verbal o behavioral data (hal. transcripts) ay gumagamit ng aling analysis method?", en: "The analysis and interpretation of verbal or behavioral data (e.g., transcripts) uses which analysis method?" }, 
                options: { tl: ["Narrative Analysis", "Discourse Analysis", "Grounded Theory", "Content Analysis"], en: ["Narrative Analysis", "Discourse Analysis", "Grounded Theory", "Content Analysis"] }, 
                answer: 3, topic: 'Research: Data Analysis' 
            },
            // Q30: Conclusion and Recommendation (LAS 20, P.28)
            { 
                question: { tl: "Alin ang dapat i-align sa bilang ng recommendations?", en: "Which should be aligned with the number of recommendations?" }, 
                options: { tl: ["Research Questions", "Findings", "Conclusions", "Limitations"], en: ["Research Questions", "Findings", "Conclusions", "Limitations"] }, 
                answer: 2, topic: 'Research: Conclusion' 
            },
        ];

        let userAnswers = {}; // {qIndex: selectedOptionIndex}
        const quizName = "Pagsusulit: Practical Research 1";
        const quizLevelRawId = "seniorhigh"; // SET TO SENIOR HIGH
        const quizLevelDisplay = "Senior High"; // SET TO SENIOR HIGH
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
         * Updated: record both date and time (human-friendly) and an ISO timestamp.
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
                // Human-friendly date and time plus ISO timestamp for unambiguous sorting/export
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
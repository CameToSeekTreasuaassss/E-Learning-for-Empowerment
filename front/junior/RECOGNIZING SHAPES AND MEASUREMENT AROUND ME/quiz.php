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
    <title>Pagsusulit: Recognizing Shapes and Measurements</title>
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
                <h1 class="text-4xl font-extrabold text-primary mb-2" id="quiz-title">Pagsusulit: Recognizing Shapes and Measurements</h1>
                <p class="text-xl text-gray-600" id="quiz-subtitle">30 Items: Geometry, Angles, at Polygons</p>
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
            'quizTitle': { tl: "Pagsusulit: Recognizing Shapes and Measurements", en: "Quiz: Recognizing Shapes and Measurements" },
            'quizSubtitle': { tl: "30 Items: Geometry, Angles, at Polygons", en: "30 Items: Geometry, Angles, and Polygons" },
            'goBack': { tl: 'Bumalik', en: 'Go Back' },
            'section1Title': { tl: 'I. Aralin 1: Foundations of Shapes at Figures (1 - 10)', en: 'I. Lesson 1: Foundations of Shapes and Figures (1 - 10)' },
            'section2Title': { tl: 'II. Aralin 2: How Open is It? (Angles) (11 - 20)', en: 'II. Lesson 2: How Open is It? (Angles) (11 - 20)' },
            'section3Title': { tl: 'III. Aralin 3: Many Angles (Polygons) (21 - 30)', en: 'III. Lesson 3: Many Angles (Polygons) (21 - 30)' },
            'submitButton': { tl: 'Tapusin at Tingnan ang Resulta', en: 'Finish and View Results' },
            'unansweredAlert': { tl: 'Kailangan mo pang sagutan ang', en: 'You still need to answer' },
            'unansweredAlertSuffix': { tl: 'na tanong bago mag-submit.', en: 'questions before submitting.' },
            'modalTitle': { tl: 'Resulta ng Pagsusulit', en: 'Quiz Results' },
            'modalScoreText': { tl: 'Nakakuha ka ng:', en: 'You scored:' },
            'modalReviewText': { tl: 'Tingnan ang iyong mga sagot sa ibaba para matuto.', en: 'Review your answers below to learn.' },
            'recordButton': { tl: 'I-record ang Resulta at Pumunta sa Talaan', en: 'Record Result and Go to Records' },
            'resetButton': { tl: 'Subukan Muli', en: 'Try Again' },
        };

        // --- QUIZ DATA (30 Items Total) ---
        // Based on: Recognizing Shapes and Measurements.pdf (Aralin 1-3)
        const quizData = [
            // Section I: Foundations of Shapes & Figures (Aralin 1) (1-10)
            // Q1: Definition of Point (P.19)
            { question: { tl: "Ano ang tawag sa representasyon ng anumang <b>lokasyon sa space</b> na walang dimensyon (length o width)?", en: "What is the term for the representation of any <b>location in space</b> that has no dimension (length or width)? " }, options: { tl: ["Line", "Plane", "Point", "Ray"], en: ["Line", "Plane", "Point", "Ray"] }, answer: 2, topic: 'Geometry: Undefined Terms' },
            // Q2: Definition of Line (P.19)
            { question: { tl: "Ano ang figure na isang <b>tuwid na landas</b> na binubuo ng mga puntos at umaabot sa dalawang direksiyon nang walang katapusan?", en: "What figure is a <b>straight path</b> consisting of points and extending in two directions without end?" }, options: { tl: ["Line Segment", "Ray", "Point", "Line"], en: ["Line Segment", "Ray", "Point", "Line"] }, answer: 3, topic: 'Geometry: Undefined Terms' },
            // Q3: Definition of Plane (P.20)
            { question: { tl: "Ano ang tawag sa <b>walang hangganan na patag na surface</b> na kung saan matatagpuan ang mga puntos at linya?", en: "What is the term for a <b>boundless flat surface</b> where points and lines are found?" }, options: { tl: ["Point", "Line", "Ray", "Plane"], en: ["Point", "Line", "Ray", "Plane"] }, answer: 3, topic: 'Geometry: Undefined Terms' },
            // Q4: Definition of Line Segment (P.21)
            { question: { tl: "Ano ang bahagi ng linya na may <b>dalawang endpoint</b> at hindi umaabot sa magkabilang panig?", en: "What is the part of a line that has <b>two endpoints</b> and does not extend in either direction?" }, options: { tl: ["Ray", "Line", "Line Segment", "Plane"], en: ["Ray", "Line", "Line Segment", "Plane"] }, answer: 2, topic: 'Geometry: Subsets of a Line' },
            // Q5: Definition of Ray (P.22)
            { question: { tl: "Ano ang bahagi ng linya na may <b>isang endpoint</b> at umaabot sa isang direksiyon lamang?", en: "What is the part of a line that has <b>one endpoint</b> and extends in only one direction?" }, options: { tl: ["Line Segment", "Line", "Ray", "Plane"], en: ["Line Segment", "Line", "Ray", "Plane"] }, answer: 2, topic: 'Geometry: Subsets of a Line' },
            // Q6: Intersection of Two Lines (P.23)
            { question: { tl: "Ano ang intersection ng <b>dalawang linya</b>?", en: "What is the intersection of <b>two lines</b>?" }, options: { tl: ["Plane", "Line", "Point", "Ray"], en: ["Plane", "Line", "Point", "Ray"] }, answer: 2, topic: 'Geometry: Intersections' },
            // Q7: Intersection of Two Planes (P.23)
            { question: { tl: "Ano ang intersection ng <b>dalawang Plane</b> (tulad ng mukha ng box)?", en: "What is the intersection of <b>two Planes</b> (like the faces of a box)? " }, options: { tl: ["Point", "Ray", "Line", "Plane"], en: ["Point", "Ray", "Line", "Plane"] }, answer: 2, topic: 'Geometry: Intersections' },
            // Q8: Definition of Parallel Lines (P.25)
            { question: { tl: "Ano ang tawag sa mga linya na <b>hindi kailanman magtatagpo</b> kahit pa ito ay pahabain nang walang hanggan?", en: "What is the term for lines that <b>never meet</b> no matter how far they are extended? " }, options: { tl: ["Intersecting Lines", "Perpendicular Lines", "Parallel Lines", "Adjacent Lines"], en: ["Intersecting Lines", "Perpendicular Lines", "Parallel Lines", "Adjacent Lines"] }, answer: 2, topic: 'Geometry: Parallel/Perpendicular' },
            // Q9: Definition of Perpendicular Lines (P.24)
            { question: { tl: "Ano ang tawag sa mga linya na <b>nagtatagpo</b> at bumubuo ng <b>Right Angle</b> (90&deg;)?", en: "What is the term for lines that <b>intersect</b> and form a <b>Right Angle</b> (90&deg;)? " }, options: { tl: ["Parallel Lines", "Intersecting Lines", "Perpendicular Lines", "Transversal Lines"], en: ["Parallel Lines", "Intersecting Lines", "Perpendicular Lines", "Transversal Lines"] }, answer: 2, topic: 'Geometry: Parallel/Perpendicular' },
            // Q10: Parallel Segments in a Quadrilateral (Pre-Assessment 7)
            { question: { tl: "Sa isang Trapezoid, anong segments ang <b>parallel</b>?", en: "In a Trapezoid, which segments are <b>parallel</b>?" }, options: { tl: ["Opposite non-parallel sides", "Adjacent sides", "Bases", "Diagonals"], en: ["Opposite non-parallel sides", "Adjacent sides", "Bases", "Diagonals"] }, answer: 2, topic: 'Geometry: Parallel/Perpendicular' }, 

            // Section II: Angles (Aralin 2) (11-20)
            // Q11: Angle Definition (P.25)
            { question: { tl: "Ano ang tawag sa <b>union ng dalawang rays</b> na nagkikita sa isang common point (vertex)?", en: "What is the term for the <b>union of two rays</b> meeting at a common point (vertex)?" }, options: { tl: ["Line", "Plane", "Line Segment", "Angle"], en: ["Line", "Plane", "Line Segment", "Angle"] }, answer: 3, topic: 'Angles: Kahulugan' },
            // Q12: Acute Angle Definition (P.27)
            { question: { tl: "Anong uri ng anggulo ang may sukat na <b>higit sa 0&deg; ngunit mas mababa sa 90&deg;</b>?", en: "What type of angle has a measure of <b>more than 0&deg; but less than 90&deg;</b>? " }, options: { tl: ["Right Angle", "Obtuse Angle", "Acute Angle", "Straight Angle"], en: ["Right Angle", "Obtuse Angle", "Acute Angle", "Straight Angle"] }, answer: 2, topic: 'Angles: Types' },
            // Q13: Obtuse Angle Definition (P.27)
            { question: { tl: "Anong uri ng anggulo ang may sukat na <b>higit sa 90&deg; ngunit mas mababa sa 180&deg;</b>?", en: "What type of angle has a measure of <b>more than 90&deg; but less than 180&deg;</b>? " }, options: { tl: ["Right Angle", "Obtuse Angle", "Acute Angle", "Reflex Angle"], en: ["Right Angle", "Obtuse Angle", "Acute Angle", "Reflex Angle"] }, answer: 1, topic: 'Angles: Types' },
            // Q14: Right Angle Definition (P.27)
            { question: { tl: "Anong uri ng anggulo ang may sukat na <b>eksaktong 90&deg;</b> at nabubuo ng perpendicular lines?", en: "What type of angle has a measure of <b>exactly 90&deg;</b> and is formed by perpendicular lines? " }, options: { tl: ["Right Angle", "Obtuse Angle", "Acute Angle", "Straight Angle"], en: ["Right Angle", "Obtuse Angle", "Acute Angle", "Straight Angle"] }, answer: 0, topic: 'Angles: Types' },
            // Q15: Straight Angle Definition (P.27)
            { question: { tl: "Anong uri ng anggulo ang may sukat na <b>eksaktong 180&deg;</b> at bumubuo ng tuwid na linya?", en: "What type of angle has a measure of <b>eksaktong 180&deg;</b> and forms a straight line?" }, options: { tl: ["Right Angle", "Obtuse Angle", "Acute Angle", "Straight Angle"], en: ["Right Angle", "Obtuse Angle", "Acute Angle", "Straight Angle"] }, answer: 3, topic: 'Angles: Types' },
            // Q16: Full Angle Definition (P.28)
            { question: { tl: "Anong uri ng anggulo ang may sukat na <b>eksaktong 360&deg;</b> at mukhang isang bilog?", en: "What type of angle has a measure of <b>eksaktong 360&deg;</b> and looks like a circle?" }, options: { tl: ["Straight Angle", "Reflex Angle", "Full Angle", "Acute Angle"], en: ["Straight Angle", "Reflex Angle", "Full Angle", "Acute Angle"] }, answer: 2, topic: 'Angles: Types' },
            // Q17: Complementary Angles (P.29)
            { question: { tl: "Ano ang tawag sa pares ng anggulo na ang <b>sum</b> ay eksaktong <b>90&deg;</b>?", en: "What is the term for a pair of angles whose <b>sum</b> is exactly <b>90&deg;</b>?" }, options: { tl: ["Supplementary Angles", "Adjacent Angles", "Complementary Angles", "Reflex Angles"], en: ["Supplementary Angles", "Adjacent Angles", "Complementary Angles", "Reflex Angles"] }, answer: 2, topic: 'Angles: Complementary' },
            // Q18: Supplementary Angles (P.29)
            { question: { tl: "Ano ang tawag sa pares ng anggulo na ang <b>sum</b> ay eksaktong <b>180&deg;</b>?", en: "What is the term for a pair of angles whose <b>sum</b> is exactly <b>180&deg;</b>?" }, options: { tl: ["Supplementary Angles", "Adjacent Angles", "Complementary Angles", "Right Angles"], en: ["Supplementary Angles", "Adjacent Angles", "Complementary Angles", "Right Angles"] }, answer: 0, topic: 'Angles: Supplementary' },
            // Q19: Finding Complementary Angle (Pre-Assessment 10)
            { question: { tl: "Ano ang <b>complement</b> ng isang anggulo na may sukat na 72&deg;?", en: "What is the <b>complement</b> of an angle with a measure of 72&deg;?" }, options: { tl: ["18&deg;", "28&deg;", "108&deg;", "98&deg;"], en: ["18&deg;", "28&deg;", "108&deg;", "98&deg;"] }, answer: 0, topic: 'Angles: Complementary Calculation' }, // 90 - 72 = 18
            // Q20: Finding Supplementary Angle (Pre-Assessment 11)
            { question: { tl: "Ano ang <b>supplement</b> ng isang anggulo na may sukat na 110&deg;?", en: "What is the <b>supplement</b> of an angle with a measure of 110&deg;?" }, options: { tl: ["70&deg;", "55&deg;", "45&deg;", "20&deg;"], en: ["70&deg;", "55&deg;", "45&deg;", "20&deg;"] }, answer: 0, topic: 'Angles: Supplementary Calculation' }, // 180 - 110 = 70

            // Section III: Polygons (Aralin 3) (21-30)
            // Q21: Polygon Definition (P.36)
            { question: { tl: "Ano ang tawag sa isang <b>closed plane figure</b> na nabuo ng <b>tuwid na linya</b>?", en: "What is the term for a <b>closed plane figure</b> formed by <b>straight lines</b>?" }, options: { tl: ["Angle", "Ray", "Plane Figure", "Polygon"], en: ["Angle", "Ray", "Plane Figure", "Polygon"] }, answer: 3, topic: 'Polygons: Kahulugan' },
            // Q22: Non-Polygon Identification (P.37 Example 1)
            { question: { tl: "Alin sa sumusunod ang <b>HINDI</b> isang polygon?", en: "Which of the following is <b>NOT</b> a polygon? " }, options: { tl: ["Figure A (Cross)", "Figure B (Parallelogram)", "Figure C (Curved bottom)", "Figure D (Pentagon)"], en: ["Figure A (Cross)", "Figure B (Parallelogram)", "Figure C (Curved bottom)", "Figure D (Pentagon)"] }, answer: 2, topic: 'Polygons: Identification' },
            // Q23: Regular Polygon Definition (P.40)
            { question: { tl: "Ang isang <b>Regular Polygon</b> ay: ", en: "A <b>Regular Polygon</b> is: " }, options: { tl: ["Equiangular lang", "Equilateral lang", "Parehong Equiangular at Equilateral", "Convex lang"], en: ["Equiangular only", "Equilateral only", "Both Equiangular and Equilateral", "Convex only"] }, answer: 2, topic: 'Polygons: Regularity' },
            // Q24: Polygon Classification by Sides (P.47)
            { question: { tl: "Anong tawag sa polygon na may <b>6 na sides</b>?", en: "What is the name for a polygon that has <b>6 sides</b>?" }, options: { tl: ["Pentagon", "Hexagon", "Octagon", "Heptagon"], en: ["Pentagon", "Hexagon", "Octagon", "Heptagon"] }, answer: 1, topic: 'Polygons: Classification' },
            // Q25: Polygon Classification by Sides (Pre-Assessment 13)
            { question: { tl: "Anong tawag sa polygon na may <b>8 sides</b>?", en: "What is the name for a polygon that has <b>8 sides</b>?" }, options: { tl: ["Triangle", "Pentagon", "Octagon", "Nonagon"], en: ["Triangle", "Pentagon", "Octagon", "Nonagon"] }, answer: 2, topic: 'Polygons: Classification' },
            // Q26: Sum of Interior Angles Formula (P.40)
            { question: { tl: "Ano ang <b>formula</b> para sa <b>Sum</b> ng Interior Angles (S) ng isang polygon?", en: "What is the <b>formula</b> for the <b>Sum</b> of the Interior Angles (S) of a polygon?" }, options: { tl: ["S = 180(n)", "S = 360/n", "S = 180(n-2)", "S = 180/(n-2)"], en: ["S = 180(n)", "S = 360/n", "S = 180(n-2)", "S = 180/(n-2)"] }, answer: 2, topic: 'Polygons: Angle Formula' },
            // Q27: Measure of Each Interior Angle Formula (P.40)
            { question: { tl: "Ano ang <b>formula</b> para sa sukat ng <b>bawat</b> Interior Angle (A) ng isang Regular Polygon?", en: "What is the <b>formula</b> for the measure of <b>each</b> Interior Angle (A) of a Regular Polygon?" }, options: { tl: ["A = 180(n-2)", "A = 360/n", "A = 180(n-2)/n", "A = 360(n)/n"], en: ["A = 180(n-2)", "A = 360/n", "A = 180(n-2)/n", "A = 360(n)/n"] }, answer: 2, topic: 'Polygons: Angle Formula' },
            // Q28: Sum of Interior Angles Calculation (P.51 Example 3b)
            { question: { tl: "Ano ang <b>sum</b> ng measures ng interior angles ng isang <b>Regular Quadrilateral</b> (n=4)?", en: "What is the <b>sum</b> of the measures of the interior angles of a <b>Regular Quadrilateral</b> (n=4)?" }, options: { tl: ["180&deg;", "360&deg;", "540&deg;", "720&deg;"], en: ["180&deg;", "360&deg;", "540&deg;", "720&deg;"] }, answer: 1, topic: 'Polygons: Angle Calculation' }, // 180 * (4-2) = 360
            // Q29: Measure of Each Interior Angle Calculation (P.51 Example 3a)
            { question: { tl: "Ano ang sukat ng <b>bawat</b> interior angle ng isang <b>Regular Triangle</b> (n=3)?", en: "What is the measure of <b>each</b> interior angle of a <b>Regular Triangle</b> (n=3)?" }, options: { tl: ["30&deg;", "60&deg;", "90&deg;", "120&deg;"], en: ["30&deg;", "60&deg;", "90&deg;", "120&deg;"] }, answer: 1, topic: 'Polygons: Angle Calculation' }, // 180 * (3-2) / 3 = 60
            // Q30: Polygon Application (P.53 Example 4)
            { question: { tl: "Ang Regular Quadrilateral ay may side lengths na (6x+12) at (8x-4). Ano ang <b>haba ng bawat side</b>?", en: "A Regular Quadrilateral has side lengths of (6x+12) and (8x-4). What is the <b>length of each side</b>?" }, options: { tl: ["50 inches", "60 inches", "70 inches", "80 inches"], en: ["50 inches", "60 inches", "70 inches", "80 inches"] }, answer: 1, topic: 'Polygons: Application' }, // 6x+12 = 8x-4 -> 16=2x -> x=8. 6(8)+12 = 48+12 = 60.
        ];

        let userAnswers = {}; // {qIndex: selectedOptionIndex}
        const quizName = "Pagsusulit: Recognizing Shapes and Measurements";
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

            const now = new Date();
            currentQuizResult = {
                name: quizName,
                rawLevelId: quizLevelRawId, 
                level: quizLevelDisplay, 
                score: `${correctCount}/${totalQuestions}`,
                percentage: Math.round((correctCount / totalQuestions) * 100),
                date: now.toLocaleDateString('en-US'), // e.g. "1/5/2026"
                time: now.toLocaleTimeString('en-US', { hour12: true }), // e.g. "2:32:05 PM"
                timestamp: now.toISOString() // machine-friendly
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
            
            // Re-render the quiz to re-enable all buttons and re-apply styling
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
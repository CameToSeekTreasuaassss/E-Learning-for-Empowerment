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
    <title>Pagsusulit: Mga Heometrikong Hugis</title>
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
                <h1 class="text-4xl font-extrabold text-primary mb-2" id="quiz-title">Pagsusulit: Mga Heometrikong Hugis</h1>
                <p class="text-xl text-gray-600" id="quiz-subtitle">30 Items: Guhit, Anggulo, at Hugis</p>
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
                    <!-- UPDATED LINK TO records.php -->
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
            'quizTitle': { tl: "Pagsusulit: Mga Heometrikong Hugis", en: "Quiz: Geometric Shapes" },
            'quizSubtitle': { tl: "30 Items: Guhit, Anggulo, at Hugis", en: "30 Items: Lines, Angles, and Shapes" },
            'goBack': { tl: 'Bumalik', en: 'Go Back' },
            'section1Title': { tl: 'I. Mga Guhit at Anggulo', en: 'I. Lines and Angles' },
            'section2Title': { tl: 'II. Hugis na Patag (Plane Figures)', en: 'II. Plane Figures' },
            'section3Title': { tl: 'III. Hugis na May Puwang (Space Figures)', en: 'III. Space Figures (3D)' },
            'submitButton': { tl: 'Tapusin at Tingnan ang Resulta', en: 'Finish and View Results' },
            'unansweredAlert': { tl: 'Kailangan mo pang sagutan ang', en: 'You still need to answer' },
            'unansweredAlertSuffix': { tl: 'na tanong bago mag-submit.', en: 'questions before submitting.' },
            'modalTitle': { tl: 'Resulta ng Pagsusulit', en: 'Quiz Results' },
            'modalScoreText': { tl: 'Nakakuha ka ng:', en: 'You scored:' },
            'modalReviewText': { tl: 'Tingnan ang iyong mga sagot sa ibaba para matuto.', en: 'Review your answers below to learn.' },
            'recordButton': { tl: 'I-record ang Resulta at Pumunta sa Talaan', en: 'Record Result and Go to Records' },
            'resetButton': { tl: 'Subukan Muli', en: 'Try Again' },
        };

        // --- QUIZ DATA (30 Items Total) - RETAINED ---
        const quizData = [
            // Section I: Aralin 1: Mga Guhit at Anggulo (Lines and Angles) (1-10)
            // Q1: Definition of a Line (Anu-ano na ang mga Alam Mo? A.5)
            { 
                question: { tl: "Ano ang tawag sa pigurang walang tiyak na simula at katapusan?", en: "What is the name for a figure with no definite start and end point?" }, 
                options: { tl: ["Rey", "Linya", "Segment", "Anggulo"], en: ["Ray", "Line", "Segment", "Angle"] }, 
                answer: 1, topic: 'Lines' 
            },
            // Q2: Parallel Lines (Aralin 1, Alamin Natin 1)
            { 
                question: { tl: "Anong uri ng linya ang magkatabi at hindi kailanman nagsasalubong kahit gaano man kalayo?", en: "What type of line runs side-by-side and never intersects, no matter how far extended?" }, 
                options: { tl: ["Linyang magkabagtas", "Linyang perpendikular", "Linyang paralel", "Linyang nakakurba"], en: ["Intersecting lines", "Perpendicular lines", "Parallel lines", "Curved lines"] }, 
                answer: 2, topic: 'Lines' 
            },
            // Q3: Perpendicular Lines (Aralin 1, Alamin Natin 3)
            { 
                question: { tl: "Ang dalawang linya ay bumubuo ng anggulong may sukat na 90° kapag sila ay nagtagpo. Anong uri ito?", en: "Two lines forming a 90° angle when they meet are called what type of lines?" }, 
                options: { tl: ["Linyang paralel", "Linyang magkabagtas", "Linyang perpendikular", "Rey"], en: ["Parallel lines", "Intersecting lines", "Perpendicular lines", "Ray"] }, 
                answer: 2, topic: 'Lines' 
            },
            // Q4: Definition of Ray
            { 
                question: { tl: "Ano ang tawag sa linyang may simula ngunit walang tiyak na katapusan?", en: "What is the name for a line that has a starting point but no definite endpoint?" }, 
                options: { tl: ["Linya", "Bahagi ng linya", "Anggulo", "Rey"], en: ["Line", "Line Segment", "Angle", "Ray"] }, 
                answer: 3, topic: 'Angles/Ray' 
            },
            // Q5: Definition of Congruence (Anu-ano na ang mga Alam Mo? A.2)
            { 
                question: { tl: "Ang konsepto ng Pagkakalapat (Congruence) ay tumutukoy sa kalidad ng pagiging:", en: "The concept of Congruence refers to the quality of being:" }, 
                options: { tl: ["Magkakatabi", "Magkasalungat", "Magkasang-ayon (pareho ang sukat)", "Magkaiba ang hugis"], en: ["Adjacent", "Opposite", "Congruent (same size and shape)", "Different shapes"] }, 
                answer: 2, topic: 'Congruence' 
            },
            // Q6: Acute Angle
            { 
                question: { tl: "Ang anggulong may sukat na mas kaunti sa 90° ay tinatawag na:", en: "An angle measuring less than 90° is called a/an:" }, 
                options: { tl: ["Anggulong akyut", "Anggulong kwadrado", "Anggulong bika", "Anggulong tuwid"], en: ["Acute Angle", "Right Angle", "Obtuse Angle", "Straight Angle"] }, 
                answer: 0, topic: 'Angles' 
            },
            // Q7: Right Angle
            { 
                question: { tl: "Ilang degree ang eksaktong sukat ng Anggulong Kwadrado (Right Angle)?", en: "What is the exact measure in degrees of a Right Angle?" }, 
                options: { tl: ["45°", "90°", "180°", "360°"], en: ["45°", "90°", "180°", "360°"] }, 
                answer: 1, topic: 'Angles' 
            },
            // Q8: Obtuse Angle
            { 
                question: { tl: "Ang anggulong may sukat na higit sa 90° ngunit mas kaunti sa 180° ay:", en: "An angle measuring greater than 90° but less than 180° is a/an:" }, 
                options: { tl: ["Anggulong akyut", "Anggulong kwadrado", "Anggulong bika", "Anggulong tuwid"], en: ["Acute Angle", "Right Angle", "Obtuse Angle", "Straight Angle"] }, 
                answer: 2, topic: 'Angles' 
            },
            // Q9: Straight Angle
            { 
                question: { tl: "Ang anggulong may eksaktong sukat na 180° ay tinatawag na:", en: "An angle with an exact measure of 180° is called a/an:" }, 
                options: { tl: ["Anggulong akyut", "Anggulong kwadrado", "Anggulong bika", "Anggulong tuwid"], en: ["Acute Angle", "Right Angle", "Obtuse Angle", "Straight Angle"] }, 
                answer: 3, topic: 'Angles' 
            },
            // Q10: Definition of Angle
            { 
                question: { tl: "Ano ang nabubuo kapag ang dalawang rey o linya ay nagtatagpo sa isang punto?", en: "What is formed when two rays or lines meet at a single point?" }, 
                options: { tl: ["Vertex", "Anggulo", "Segment", "Kapatagan (Plane)"], en: ["Vertex", "Angle", "Segment", "Plane"] }, 
                answer: 1, topic: 'Angles' 
            },

            // Section II: Aralin 2: Hugis na Patag (Plane Figures) (11-20)
            // Q11: Triangle Definition (Polygons a)
            { 
                question: { tl: "Ang poligon na may tatlong panig at tatlong anggulo ay tinatawag na:", en: "A polygon with three sides and three angles is called a/an:" }, 
                options: { tl: ["Parihaba", "Pentagon", "Heksagon", "Tatsulok"], en: ["Rectangle", "Pentagon", "Hexagon", "Triangle"] }, 
                answer: 3, topic: 'Polygons' 
            },
            // Q12: Square Definition (Anu-ano na ang mga Alam Mo? B.3)
            { 
                question: { tl: "Ang hugis na may apat na gilid na magkakasukat at apat na anggulong kwadrado ay:", en: "The shape with four equal sides and four right angles is a/an:" }, 
                options: { tl: ["Parihaba", "Rhombus", "Parisukat", "Tropezoyd"], en: ["Rectangle", "Rhombus", "Square", "Trapezoid"] }, 
                answer: 2, topic: 'Quadrilaterals' 
            },
            // Q13: Trapezoid Definition (Aralin 2, Alamin Natin 1)
            { 
                question: { tl: "Ang kwadrilateral na may apat na panig at dalawang panig lamang ang paralel ay:", en: "A quadrilateral with four sides where only two sides are parallel is a/an:" }, 
                options: { tl: ["Paralelogram", "Rhombus", "Parisukat", "Tropezoyd"], en: ["Parallelogram", "Rhombus", "Square", "Trapezoid"] }, 
                answer: 3, topic: 'Quadrilaterals' 
            },
            // Q14: Pentagon Definition (Polygons b)
            { 
                question: { tl: "Ilang panig mayroon ang Pentagon?", en: "How many sides does a Pentagon have?" }, 
                options: { tl: ["4", "5", "6", "8"], en: ["4", "5", "6", "8"] }, 
                answer: 1, topic: 'Polygons' 
            },
            // Q15: Rhombus Definition (Aralin 2, Alamin Natin 3)
            { 
                question: { tl: "Isang paralelogram na may apat na gilid na magkakapantay-pantay ang sukat at kung minsan ay walang anggulong kwadrado:", en: "A parallelogram with four equal sides and sometimes no right angles:" }, 
                options: { tl: ["Parihaba", "Rhombus", "Parisukat", "Tropezoyd"], en: ["Rectangle", "Rhombus", "Square", "Trapezoid"] }, 
                answer: 1, topic: 'Quadrilaterals' 
            },
            // Q16: Octagon Definition (Polygons d)
            { 
                question: { tl: "Ang Oktagon ay poligon na may:", en: "An Octagon is a polygon with:" }, 
                options: { tl: ["Limang panig", "Anim na panig", "Walong panig", "Sampung panig"], en: ["Five sides", "Six sides", "Eight sides", "Ten sides"] }, 
                answer: 2, topic: 'Polygons' 
            },
            // Q17: Hexagon Definition (Polygons c)
            { 
                question: { tl: "Ilang anggulo mayroon ang Heksagon?", en: "How many angles does a Hexagon have?" }, 
                options: { tl: ["4", "5", "6", "8"], en: ["4", "5", "6", "8"] }, 
                answer: 2, topic: 'Polygons' 
            },
            // Q18: Rectangle Definition (Aralin 2, Alamin Natin 4)
            { 
                question: { tl: "Isang paralelogram na ang lahat ng anggulo ay kwadrado (right angle):", en: "A parallelogram where all angles are right angles:" }, 
                options: { tl: ["Parihaba", "Rhombus", "Parisukat", "Tropezoyd"], en: ["Rectangle", "Rhombus", "Square", "Trapezoid"] }, 
                answer: 0, topic: 'Quadrilaterals' 
            },
            // Q19: Circle Definition (Aralin 2, Alamin Natin 7)
            { 
                question: { tl: "Ano ang hugis na patag na ang bawat punto ay may magkakaparehong distansiya mula sa sentro?", en: "What is the plane shape where every point is the same distance from the center?" }, 
                options: { tl: ["Biluhaba", "Bilog", "Ispir", "Oktagon"], en: ["Oval", "Circle", "Sphere", "Octagon"] }, 
                answer: 1, topic: 'Other Plane Figures' 
            },
            // Q20: Definition of Polygon
            { 
                question: { tl: "Ano ang tawag sa isang saradong hugis o pigura na nabubuo ng mga linyang tuwid?", en: "What is the name for a closed shape or figure made up of straight lines?" }, 
                options: { tl: ["Kapatagan", "Bika", "Poligon", "Segment"], en: ["Plane", "Arc", "Polygon", "Segment"] }, 
                answer: 2, topic: 'Polygons' 
            },

            // Section III: Aralin 3: Hugis na May Puwang (Space Figures) (21-30)
            // Q21: Definition of Space Figure (Anu-ano na ang mga Alam Mo? B.4)
            { 
                question: { tl: "Ang mga hugis na may tatlong dimensiyon (may lalim, taas, at lapad) ay tinatawag na:", en: "Shapes with three dimensions (depth, height, and width) are called:" }, 
                options: { tl: ["Hugis na patag", "Hugis na nakakurba", "Hugis na may puwang", "Poligon"], en: ["Plane figures", "Curved figures", "Space figures (3D)", "Polygon"] }, 
                answer: 2, topic: 'Space Figures' 
            },
            // Q22: Cube Definition (Aralin 3, Alamin Natin 1)
            { 
                question: { tl: "Ang pigurang may anim na magkakasinglaking panig na kuwadrado (square) ay:", en: "A figure with six equal square faces is a/an:" }, 
                options: { tl: ["Prisma", "Piramid", "Kiyub", "Silinder"], en: ["Prism", "Pyramid", "Cube", "Cylinder"] }, 
                answer: 2, topic: 'Space Figures' 
            },
            // Q23: Cylinder Definition (Aralin 3, Alamin Natin 2)
            { 
                question: { tl: "Ang hugis na may dalawang paralel at magkalapat na pabilog na ilalim (tulad ng pitsel):", en: "A shape with two parallel and congruent circular bases (like a pitcher):" }, 
                options: { tl: ["Silinder", "Kono", "Ispir", "Prisma"], en: ["Cylinder", "Cone", "Sphere", "Prism"] }, 
                answer: 0, topic: 'Space Figures' 
            },
            // Q24: Sphere Definition (Aralin 3, Alamin Natin 3 / Anu-ano na ang mga Alam Mo? A.1)
            { 
                question: { tl: "Ang hugis na may puwang na ang lahat ng punto ay pare-pareho ang distansiya mula sa sentro (tulad ng bola):", en: "The 3D shape where all points are equidistant from the center (like a ball):" }, 
                options: { tl: ["Kono", "Silinder", "Ispir", "Piramid"], en: ["Cone", "Cylinder", "Sphere", "Pyramid"] }, 
                answer: 2, topic: 'Space Figures' 
            },
            // Q25: Cone Definition (Aralin 3, Alamin Natin 4)
            { 
                question: { tl: "Ang hugis na may pabilog na ilalim at isang vertex o punto kung saan nagsasalikop ang mga panig (tulad ng apa ng sorbetes):", en: "A shape with a circular base and a single vertex where the sides meet (like an ice cream cone):" }, 
                options: { tl: ["Ispir", "Prisma", "Tetrahedron", "Kono"], en: ["Sphere", "Prism", "Tetrahedron", "Cone"] }, 
                answer: 3, topic: 'Space Figures' 
            },
            // Q26: Pyramid Definition (Aralin 3, Alamin Natin 5)
            { 
                question: { tl: "Ito ay hugis na may puwang na may parisukat na ilalim at apat na gilid na hugis tatsulok:", en: "This 3D shape has a square base and four triangular faces:" }, 
                options: { tl: ["Piramid", "Prisma", "Kiyub", "Tetrahedron"], en: ["Pyramid", "Prism", "Cube", "Tetrahedron"] }, 
                answer: 0, topic: 'Space Figures' 
            },
            // Q27: Tetrahedron Definition (Aralin 3, Alamin Natin 6)
            { 
                question: { tl: "Anong hugis ang may puwang na may apat na panig at bawat mukha nito ay hugis tatsulok?", en: "Which 3D shape has four faces, where every face is a triangle?" }, 
                options: { tl: ["Kiyub", "Tetrahedron", "Oktagon", "Heksagon"], en: ["Cube", "Tetrahedron", "Octagon", "Hexagon"] }, 
                answer: 1, topic: 'Space Figures' 
            },
            // Q28: Prism Definition (Aralin 3, Alamin Natin 7)
            { 
                question: { tl: "Ang hugis na may puwang na may dalawang magkalapat at paralel na ilalim na poligono (tulad ng Toblerone box):", en: "The 3D shape with two congruent and parallel polygon bases (like a Toblerone box):" }, 
                options: { tl: ["Piramid", "Silinder", "Prisma", "Kiyub"], en: ["Pyramid", "Cylinder", "Prism", "Cube"] }, 
                answer: 2, topic: 'Space Figures' 
            },
            // Q29: Example of Cube
            { 
                question: { tl: "Alin ang may hugis na tulad ng Kiyub?", en: "Which object has the shape of a Cube?" }, 
                options: { tl: ["Bola", "Pitsel", "Kahon", "Apa ng sorbetes"], en: ["Ball", "Pitcher (jug)", "Box (cube)", "Ice cream cone"] }, 
                answer: 2, topic: 'Space Figures Example' 
            },
            // Q30: Example of Cylinder
            { 
                question: { tl: "Alin ang may hugis na tulad ng Silinder?", en: "Which object has the shape of a Cylinder?" }, 
                options: { tl: ["Dice", "Baso", "Orange", "Piramid ng Ehipto"], en: ["Dice", "Glass (Cylinder)", "Orange", "Egyptian Pyramid"] }, 
                answer: 1, topic: 'Space Figures Example' 
            }
        ];

        let userAnswers = {}; // {qIndex: selectedOptionIndex}
        const quizName = "Pagsusulit: Mga Heometrikong Hugis";
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
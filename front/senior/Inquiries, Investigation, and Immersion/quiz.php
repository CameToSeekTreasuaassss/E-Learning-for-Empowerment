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
    <title>Pagsusulit: Inquiries, Investigations, at Immersion</title>
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
                <h1 class="text-4xl font-extrabold text-primary mb-2" id="quiz-title">Pagsusulit: Inquiries, Investigations, at Immersion</h1>
                <p class="text-xl text-gray-600" id="quiz-subtitle">30 Items: Work Immersion Basics, Skills, at Processes</p>
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
            'quizTitle': { tl: "Pagsusulit: Inquiries, Investigations, at Immersion", en: "Quiz: Inquiries, Investigations, and Immersion" },
            'quizSubtitle': { tl: "30 Items: Work Immersion Basics, Skills, at Processes", en: "30 Items: Work Immersion Basics, Skills, and Processes" },
            'goBack': { tl: 'Bumalik', en: 'Go Back' },
            'section1Title': { tl: 'I. Pre-Immersion Basics (Nature, Ethics, Safety, Rights) (1 - 10)', en: 'I. Pre-Immersion Basics (Nature, Ethics, Safety, Rights) (1 - 10)' },
            'section2Title': { tl: 'II. Skills and Documentation (Teamwork, Conflict, Credentials) (11 - 20)', en: 'II. Skills and Documentation (Teamwork, Conflict, Credentials) (11 - 20)' },
            'section3Title': { tl: 'III. Business Processes, Interview, at Reflection (21 - 30)', en: 'III. Business Processes, Interview, and Reflection (21 - 30)' },
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
        // Based on: Inquiries, Investigations, at Immersion
        const quizData = [
            // Section I: Pre-Immersion Basics (Nature, Ethics, Safety, Rights, Confidentiality) (Q1-10)
            // Q1: Definition of Work Immersion (LAS 1, P.8)
            { question: { tl: "Ayon sa DepEd Order No. 30 s. 2017, ang Work Immersion ay tumutukoy sa: ", en: "According to DepEd Order No. 30 s. 2017, Work Immersion refers to: " }, 
              options: { tl: ["Work simulation kung saan ang learners ay nag-a-apply ng competencies.", "Isang elective subject para sa mga Senior High School student.", "Pagbisita lamang sa isang kumpanya.", "Pagtatrabaho ng full-time sa isang kumpanya."], en: ["Work simulation where learners apply competencies.", "An elective subject for Senior High School students.", "Just visiting a company.", "Working full-time in a company."] }, 
              answer: 0, topic: 'Nature at Legal Basis' 
            },
            // Q2: Legal Basis (LAS 1, P.8)
            { question: { tl: "Aling DepEd Order ang nagbigay ng guidelines para sa Senior High School Work Immersion?", en: "Which DepEd Order provided the guidelines for Senior High School Work Immersion?" }, 
              options: { tl: ["DepEd Order No. 50 s. 2016", "DepEd Order No. 40 s. 2015", "DepEd Order No. 34 s. 2019", "DepEd Order No. 30 s. 2017"], en: ["DepEd Order No. 50 s. 2016", "DepEd Order No. 40 s. 2015", "DepEd Order No. 34 s. 2019", "DepEd Order No. 30 s. 2017"] }, 
              answer: 3, topic: 'Nature at Legal Basis' 
            },
            // Q3: Strong Work Ethic Characteristic (LAS 2, P.9)
            { question: { tl: "Ang paggawa ng tama sa lahat ng oras, kahit walang nakakakita, ay nagpapakita ng anong katangian ng work ethic? ", en: "Doing the right thing at all times, even when no one is watching, demonstrates what characteristic of work ethic? " }, 
              options: { tl: ["Professionalism", "Time Management", "Integrity", "Sense of Responsibility"], en: ["Professionalism", "Time Management", "Integrity", "Sense of Responsibility"] }, 
              answer: 2, topic: 'Work Ethics' 
            },
            // Q4: Good Work Ethic Characteristic (LAS 2, P.9)
            { question: { tl: "Ang pagiging punctual, pagkakaroon ng good attendance record, at pag-o-observe ng deadlines ay bahagi ng:", en: "Being punctual, having a good attendance record, and observing deadlines are part of:" }, 
              options: { tl: ["Discipline", "Respect", "Time Management", "Emphasis on Quality"], en: ["Discipline", "Respect", "Time Management", "Emphasis on Quality"] }, 
              answer: 2, topic: 'Work Ethics' 
            },
            // Q5: Workplace Safety Definition (LAS 3, P.10)
            { question: { tl: "Ang 'Workplace' ay tumutukoy sa anumang site o lokasyon kung saan ang mga manggagawa ay pumupunta o nagtatrabaho sa ilalim ng direkta o hindi direktang kontrol ng:", en: "The 'Workplace' refers to any site or location where workers go or work under the direct or indirect control of the:" }, 
              options: { tl: ["Gobyerno", "Kapwa Manggagawa", "Employer", "OJT Supervisor"], en: ["Government", "Fellow Worker", "Employer", "OJT Supervisor"] }, 
              answer: 2, topic: 'Safety sa Workplace' 
            },
            // Q6: Workplace Safety (LAS 3, P.10)
            { question: { tl: "Ang pagpapatupad ng policies at procedures upang masiguro ang kaligtasan at kalusugan ng empleyado ay tinatawag na:", en: "The implementation of policies and procedures to ensure employee safety and health is called:" }, 
              options: { tl: ["Work Immersion Rules", "Work Ethics", "Workplace Safety", "Non-Disclosure Policy"], en: ["Work Immersion Rules", "Work Ethics", "Workplace Safety", "Non-Disclosure Policy"] }, 
              answer: 2, topic: 'Safety sa Workplace' 
            },
            // Q7: Worker Responsibility (LAS 4, P.12)
            { question: { tl: "Alin sa mga ito ang responsibilidad ng isang <b>manggagawa (worker)</b>?", en: "Which of these is the responsibility of a <b>worker</b>?" }, 
              options: { tl: ["Pagbibigay ng safe environment", "Pagsiguro na may protective equipment", "Pag-alam sa kondisyon ng employment at working hours", "Pagbibigay ng holiday pay"], en: ["Providing a safe environment", "Ensuring protective equipment is available", "Knowing the conditions of employment and working hours", "Providing holiday pay"] }, 
              answer: 2, topic: 'Rights at Responsibilities' 
            },
            // Q8: Confidentiality (LAS 5, P.14)
            { question: { tl: "Ang pag-iwas sa pagbabahagi ng trade secrets at iba pang impormasyon ng kumpanya sa mga kakumpitensya o media ay tinatawag na:", en: "Avoiding the sharing of trade secrets and other company information with competitors or media is called:" }, 
              options: { tl: ["Teamwork", "Transparency", "Confidentiality", "Professionalism"], en: ["Teamwork", "Transparency", "Confidentiality", "Professionalism"] }, 
              answer: 2, topic: 'Confidentiality' 
            },
            // Q9: Non-Disclosure Policy (LAS 5, P.14)
            { question: { tl: "Anong kontrata ang pinagkakasunduan ng mga partido na hindi ibunyag ang impormasyon at ginagamit upang protektahan ang confidential at proprietary na impormasyon?", en: "What contract is agreed upon by parties not to disclose information and is used to protect confidential and proprietary information?" }, 
              options: { tl: ["Memorandum of Agreement (MOA)", "Employment Contract", "Non-Disclosure Agreement (NDA)", "Parental Consent"], en: ["Memorandum of Agreement (MOA)", "Employment Contract", "Non-Disclosure Agreement (NDA)", "Parental Consent"] }, 
              answer: 2, topic: 'Confidentiality' 
            },
            // Q10: MOA Joint Responsibility (LAS 8, P.18)
            { question: { tl: "Alin ang isang <b>Joint Responsibility</b> ng Paaralan at Partner Institution?", en: "Which is a <b>Joint Responsibility</b> of the School and Partner Institution?" }, 
              options: { tl: ["Pagbibigay ng Insurance para sa learners", "Pagbibigay ng final grade sa learners", "Pag-uphold sa child protection laws (e.g., Family Code)", "Pagsiguro sa safety ng workplace"], en: ["Providing Insurance for learners", "Giving the final grade to the learners", "Upholding child protection laws (e.g., Family Code)", "Ensuring workplace safety"] }, 
              answer: 2, topic: 'MOA at Rules' 
            },

            // Section II: Skills and Documentation (Teamwork, Conflict, Documents) (Q11-20)
            // Q11: Teamwork (LAS 6, P.15)
            { question: { tl: "Ang pagtatrabaho para sa ikabubuti ng grupo bilang isang kabuuan (working for the good of the group as a whole) ay tumutukoy sa:", en: "Working for the good of the group as a whole refers to:" }, 
              options: { tl: ["Discipline", "Conflict Resolution", "Teamwork Skills", "Integrity"], en: ["Discipline", "Conflict Resolution", "Teamwork Skills", "Integrity"] }, 
              answer: 2, topic: 'Teamwork at Conflict' 
            },
            // Q12: Conflict Resolution Technique (LAS 6, P.16)
            { question: { tl: "Aling technique sa conflict resolution ang nagpapahintulot sa isang third party (groups, organizations, o countries) na mamagitan sa isang di-pagkakasundo?", en: "Which conflict resolution technique allows a third party (groups, organizations, or countries) to intervene in a disagreement?" }, 
              options: { tl: ["Joint Decision-Making", "Unilateral Decision-Making", "Third-Party Intervention", "Mediation"], en: ["Joint Decision-Making", "Unilateral Decision-Making", "Third-Party Intervention", "Mediation"] }, 
              answer: 2, topic: 'Teamwork at Conflict' 
            },
            // Q13: Work Immersion Rule (LAS 7, P.17)
            { question: { tl: "Alin sa mga sumusunod ang isang <b>Rule</b> ng Work Immersion?", en: "Which of the following is a <b>Rule</b> of Work Immersion?" }, 
              options: { tl: ["Grades will be issued after immersion", "Work Immersion requires parental consent", "Ang learner ay dapat magsuot ng uniform", "Ang learner ay dapat mag-comply sa total number of hours"], en: ["Grades will be issued after immersion", "Work Immersion requires parental consent", "The learner must wear a uniform", "The learner must comply with the total number of hours"] }, 
              answer: 2, topic: 'MOA at Rules' 
            },
            // Q14: Resume Purpose (LAS 9, P.19)
            { question: { tl: "Ano ang pangunahing layunin (purpose) ng pagsusulat ng Resume? ", en: "What is the primary purpose of writing a Resume? " }, 
              options: { tl: ["I-document ang daily activities", "I-lista ang acquired skills at background para sa employment", "Ibigay ang company history", "I-present ang reflection paper"], en: ["To document daily activities", "To list acquired skills and background for employment", "To provide company history", "To present a reflection paper"] }, 
              answer: 1, topic: 'Documentation' 
            },
            // Q15: Resume Content (LAS 9, P.19)
            { question: { tl: "Alin ang HINDI essential na component ng isang Resume?", en: "Which is NOT an essential component of a Resume?" }, 
              options: { tl: ["Work Experience", "Educational Attainment", "Family Background", "Skills"], en: ["Work Experience", "Educational Attainment", "Family Background", "Skills"] }, 
              answer: 2, topic: 'Documentation' 
            },
            // Q16: Job Interview (LAS 14, P.24)
            { question: { tl: "Ito ay isang pag-uusap sa pagitan ng job applicant at employer upang i-assess kung dapat i-hire ang applicant:", en: "This is a conversation between a job applicant and an employer to assess whether the applicant should be hired:" }, 
              options: { tl: ["Mock Interview", "Job Simulation", "Job Interview", "Work Immersion"], en: ["Mock Interview", "Job Simulation", "Job Interview", "Work Immersion"] }, 
              answer: 2, topic: 'Job Interview' 
            },
            // Q17: Credential for Criminal Check (LAS 12, P.22)
            { question: { tl: "Anong dokumento ang hinihingi para makita kung walang criminal record ang isang aplikante?", en: "What document is required to check if an applicant has no criminal record?" }, 
              options: { tl: ["Barangay Clearance", "Medical Certificate", "Community Tax Certificate (Cedula)", "Police Clearance"], en: ["Barangay Clearance", "Medical Certificate", "Community Tax Certificate (Cedula)", "Police Clearance"] }, 
              answer: 3, topic: 'Credentials' 
            },
            // Q18: Credential for Health Status (LAS 13, P.23)
            { question: { tl: "Anong dokumento ang pinirmahan ng doktor na nagpapatunay na ang isang tao ay 'fit' o 'unfit' para sa trabaho?", en: "What document signed by a doctor certifies that a person is 'fit' or 'unfit' for work?" }, 
              options: { tl: ["Police Clearance", "Barangay Clearance", "Medical Certificate", "Health Permit"], en: ["Police Clearance", "Barangay Clearance", "Medical Certificate", "Health Permit"] }, 
              answer: 2, topic: 'Credentials' 
            },
            // Q19: MOA School Responsibility (LAS 8, P.18)
            { question: { tl: "Alin ang responsibility ng <b>Paaralan</b> sa ilalim ng MOA?", en: "Which is the responsibility of the <b>School</b> under the MOA?" }, 
              options: { tl: ["Magbigay ng Certificate of Completion sa learner", "Mag-assign ng Immersion Coordinator (mula sa kumpanya)", "Magbigay ng insurance coverage para sa learners", "Mag-execute ng deed of acceptance para sa donasyon"], en: ["Issue Certificate of Completion to the learner", "Assign an Immersion Coordinator (from the company)", "Provide insurance coverage for learners", "Execute a deed of acceptance for a donation"] }, 
              answer: 2, topic: 'MOA at Rules' 
            },
            // Q20: MOA Partner Institution Responsibility (LAS 8, P.18)
            { question: { tl: "Alin ang responsibility ng <b>Partner Institution</b> sa ilalim ng MOA?", en: "Which is the responsibility of the <b>Partner Institution</b> under the MOA?" }, 
              options: { tl: ["Mag-issue ng final grade sa student", "Magbigay ng Certificate of Completion sa learner", "Magbigay ng input sa curriculum", "Mag-monitor ng progress ng student"], en: ["Issue the final grade to the student", "Provide Certificate of Completion to the learner", "Provide input on the curriculum", "Monitor the student's progress"] }, 
              answer: 1, topic: 'MOA at Rules' 
            },

            // Section III: Business Processes and Reflection (Q21-30)
            // Q21: Management Process Component (LAS 16, P.26)
            { question: { tl: "Alin ang isang component ng <b>Management Process</b>?", en: "Which is a component of the <b>Management Process</b>?" }, 
              options: { tl: ["Safety", "Production", "Target Clientele", "Maintenance"], en: ["Safety", "Production", "Target Clientele", "Maintenance"] }, 
              answer: 2, topic: 'Business Processes' 
            },
            // Q22: Business Process Component (LAS 18, P.28)
            { question: { tl: "Alin ang isang component ng <b>Business Process</b>?", en: "Which is a component of the <b>Business Process</b>?" }, 
              options: { tl: ["Organizational Structure", "Target Clientele", "Company Rules", "Quality Control"], en: ["Organizational Structure", "Target Clientele", "Company Rules", "Quality Control"] }, 
              answer: 3, topic: 'Business Processes' 
            },
            // Q23: Management Process Component (LAS 16, P.26)
            { question: { tl: "Ang paglalarawan sa <b>Organizational Structure</b> ng kumpanya ay bahagi ng:", en: "Describing the <b>Organizational Structure</b> of the company is part of the:" }, 
              options: { tl: ["Business Process", "Post-Immersion", "Management Process", "Reflection"], en: ["Business Process", "Post-Immersion", "Management Process", "Reflection"] }, 
              answer: 2, topic: 'Business Processes' 
            },
            // Q24: Core Business Process (LAS 18, P.28)
            { question: { tl: "Ang proseso ng paglikha ng produkto o serbisyo ng kumpanya ay tinatawag na:", en: "The process of creating the company's product or service is called:" }, 
              options: { tl: ["Maintenance", "Production", "Quality Assurance", "Customer Satisfaction"], en: ["Maintenance", "Production", "Quality Assurance", "Customer Satisfaction"] }, 
              answer: 1, topic: 'Business Processes' 
            },
            // Q25: Business Process Component (LAS 18, P.28)
            { question: { tl: "Ang pagpapanatili ng kalinisan at kaayusan sa lugar ng trabaho ay:", en: "Maintaining cleanliness and order in the workplace is:" }, 
              options: { tl: ["Maintenance", "Quality Control", "Housekeeping and Hygiene", "Safety"], en: ["Maintenance", "Quality Control", "Housekeeping and Hygiene", "Safety"] }, 
              answer: 2, topic: 'Business Processes' 
            },
            // Q26: Daily Work Documentation (LAS 15, P.25)
            { question: { tl: "Anong Immersion Proper Document ang ginagamit para i-log ang oras ng pagpasok at pag-alis ng learner?", en: "What Immersion Proper Document is used to log the learner's time in and time out?" }, 
              options: { tl: ["Weekly Diary", "Daily Work Accomplishment Report", "Daily Time Record (DTR)", "Resume"], en: ["Weekly Diary", "Daily Work Accomplishment Report", "Daily Time Record (DTR)", "Resume"] }, 
              answer: 2, topic: 'Documentation' 
            },
            // Q27: Post-Immersion Goal (LAS 19, P.29)
            { question: { tl: "Ano ang isa sa mga pangunahing layunin ng Work Immersion Reflection?", en: "What is one of the main goals of the Work Immersion Reflection?" }, 
              options: { tl: ["I-submit ang Application Letter", "I-lista ang lahat ng Daily Time Records", "I-present ang Reflection Paper at Values acquired", "I-document ang lahat ng Business Processes"], en: ["To submit the Application Letter", "To list all Daily Time Records", "To present the Reflection Paper and acquired Values", "To document all Business Processes"] }, 
              answer: 2, topic: 'Reflection' 
            },
            // Q28: Post-Immersion Document (LAS 15, P.25)
            { question: { tl: "Alin ang isang Post Immersion Document?", en: "Which is a Post Immersion Document?" }, 
              options: { tl: ["Application Letter", "Parents' Consent", "Certificate of Completion", "Daily Work Accomplishment Report"], en: ["Application Letter", "Parents' Consent", "Certificate of Completion", "Daily Work Accomplishment Report"] }, 
              answer: 2, topic: 'Documentation' 
            },
            // Q29: Job Interview Skill (LAS 14, P.24)
            { question: { tl: "Alin ang HINDI kabilang sa Job Interview Skills?", en: "Which is NOT included in Job Interview Skills?" }, 
              options: { tl: ["Critical Thinking Skills", "Communication Skills", "Multi-tasking Skills", "Job Application Skills"], en: ["Critical Thinking Skills", "Communication Skills", "Multi-tasking Skills", "Job Application Skills"] }, 
              answer: 3, topic: 'Job Interview' 
            },
            // Q30: Immersion Goal (LAS 1, P.8)
            { question: { tl: "Ano ang isa sa mga layunin ng Work Immersion para sa learners?", en: "What is one of the objectives of Work Immersion for learners?" }, 
              options: { tl: ["Kumita ng pera", "Mag-apply ng competencies sa authentic work environment", "Maging permanente ang trabaho", "Magbawas ng subject load"], en: ["To earn money", "To apply competencies in an authentic work environment", "To obtain permanent employment", "To reduce subject load"] }, 
              answer: 1, topic: 'Nature at Legal Basis' 
            },
        ];

        let userAnswers = {}; // {qIndex: selectedOptionIndex}
        const quizName = "Pagsusulit: Inquiries, Investigations, at Immersion";
        const quizLevelRawId = "seniorhigh"; // UPDATED
        const quizLevelDisplay = "Senior High"; // UPDATED

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
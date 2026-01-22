<?php
// 1. Start the session to access stored user data
session_start();

// Check if the user is logged in, otherwise redirect them to the login page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// NOTE: The connection.php file is assumed to exist and set up $conn
// In a real environment, you must uncomment the include line and manage the connection.
// include 'connection.php'; 

// --- UPDATED LOGIC TO RELY ON SESSION DATA ---
// MANDATORY: Use a unique identifier for the user.
$user_id = $_SESSION['user_id'] ?? 'GUEST_ID'; 
$user_level_raw = $_SESSION['user_level'] ?? 'default';

// 1. Prioritize name from session if available (since login.php should set it)
$user_name = $_SESSION['user_name'] ?? "Logged-in User"; 
// 2. Fetch the profile picture URL from session. 
$profile_pic_url = $_SESSION['profile_pic'] ?? 'https://placehold.co/100x100/3f3f46/ffffff/ffffff?text=User'; 

$user_level_display = ""; 
$profile_pic = $profile_pic_url;


// Map the raw level from the session to the desired display text 
switch ($user_level_raw) {
    case 'elementary':
        $user_level_display = 'Elementary | Explorer';
        break;
    case 'juniorhigh':
        $user_level_display = 'Junior | Explorer';
        break;
    case 'seniorhigh':
        $user_level_display = 'Senior | Explorer';
        break;
    default:
        $user_level_display = 'Student | Explorer';
        break;
}

// We define the static records table structure and the JS will populate it.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Records</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f5;
            scroll-behavior: smooth;
        }

        .custom-scroll::-webkit-scrollbar {
            width: 4px;
        }
        .custom-scroll::-webkit-scrollbar-thumb {
            background-color: #525252;
            border-radius: 2px;
        }
        .custom-scroll::-webkit-scrollbar-track {
            background-color: #262626;
        }

        .profile-pic-container {
            position: relative;
            cursor: pointer;
            transition: transform 0.2s ease-in-out;
        }
        .profile-pic-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 9999px;
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.2s ease-in-out;
        }
        .profile-pic-container:hover .profile-pic-overlay {
            opacity: 1;
            transform: scale(1.05);
        }
        .profile-pic-overlay svg { color: white; }

        @media (min-width: 1024px) {
            .main-content {
                margin-left: 16rem;
            }
        }
    </style>
</head>
<body data-user-id="<?php echo $user_id; ?>" data-user-raw-level="<?php echo $user_level_raw; ?>">

    <input type="file" id="profile-upload-input" accept="image/*" class="hidden">
    
    <div id="mobile-menu-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden lg:hidden" onclick="toggleSidebar()"></div>

    <aside id="sidebar" class="fixed top-0 left-0 w-64 h-full bg-neutral-800 text-white flex flex-col z-50 transition-transform duration-300 transform -translate-x-full lg:translate-x-0 custom-scroll overflow-y-auto">
        <div class="p-6 border-b border-neutral-700 flex flex-col items-center">
            <div id="profile-pic-trigger" class="profile-pic-container w-24 h-24 mb-3 rounded-full ring-2 ring-indigo-500 overflow-hidden relative group" title="Upload Profile Picture">
                <img 
                    id="current-profile-pic"
                    src="<?php echo $profile_pic; ?>" 
                    onerror="this.onerror=null;this.src='https://placehold.co/100x100/3f3f46/ffffff?text=User'"
                    alt="Profile Image" 
                    class="w-full h-full object-cover"
                >
                <div class="profile-pic-overlay">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zm-1.414 7.07l-2.828 2.828-5.657 5.657a1 1 0 01-1.414-1.414l5.657-5.657 2.828-2.828 1.414 1.414z" />
                    </svg>
                </div>
            </div>
            <h2 class="text-xl font-semibold"><?php echo $user_name; ?></h2>
            <p class="text-sm text-neutral-400"><?php echo $user_level_display; ?></p>
        </div>

        <nav class="flex-1 p-4 space-y-2">
            <button class="lg:hidden text-white p-2 rounded-lg hover:bg-neutral-700 w-full text-left" onclick="toggleSidebar()">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
                Close Menu
            </button>
            
            <a href="home.php" class="flex items-center p-3 rounded-xl hover:bg-neutral-700 transition duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" /></svg>
                Home
            </a>

            <a href="records.php" class="flex items-center p-3 rounded-xl bg-neutral-700 text-indigo-400 transition duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm7 2a1 1 0 100 2 1 1 0 000-2zm-2 0a1 1 0 100 2 1 1 0 000-2zm-3 0a1 1 0 100 2 1 1 0 000-2zm7 4a1 1 0 100 2 1 1 0 000-2zm-2 0a1 1 0 100 2 1 1 0 000-2zm-3 0a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd" /></svg>
                Records
            </a>

            <a href="http://localhost/als/front/leaderboard.php" class="flex items-center p-3 rounded-xl hover:bg-neutral-700 transition duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" /></svg>
                Leaderboard
            </a>
            
            <a href="http://localhost/als/front/about.php" class="flex items-center p-3 rounded-xl hover:bg-neutral-700 transition duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" /></svg>
                About
            </a>

            <a href="http://localhost/als/front/services.php" class="flex items-center p-3 rounded-xl hover:bg-neutral-700 transition duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.3-.874-2.886.67-2.01 1.968a1.54 1.54 0 01-.582 2.247c-1.638.111-1.638 2.31 0 2.421a1.54 1.54 0 01.582 2.247c-.876 1.298.614 2.84 1.914 1.968a1.532 1.532 0 012.286.948c.38 1.56 2.6 1.56 2.98 0a1.532 1.532 0 012.286-.948c1.3.874 2.886-.67 2.01-1.968a1.54 1.54 0 01.582-2.247c1.638-.111 1.638-2.31 0-2.421a1.54 1.54 0 01-.582-2.247c.876-1.298-.614-2.84-1.914-1.968a1.532 1.532 0 01-2.286-.948zM10 11a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" /></svg>
                Services
            </a>

            <a href="http://localhost/als/front/contact.php" class="flex items-center p-3 rounded-xl hover:bg-neutral-700 transition duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/></svg>
                Contact
            </a>

        </nav>

        <div class="p-6 text-xs text-neutral-400 mt-auto border-t border-neutral-700">
            <p>Copyright &copy; 2025 All rights reserved</p>
        </div>
    </aside>

    <div id="main-container" class="flex-1 main-content min-h-screen text-lg">
        
        <header class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-30">
            <!-- Modified width to max-w-full and padding for wider container -->
            <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
                
                <button class="lg:hidden text-gray-500 hover:text-gray-700" onclick="toggleSidebar()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
                
                <!-- HEADER TITLE: Left-aligned -->
                <h1 class="text-2xl font-bold text-gray-800">Student Records</h1>
            </div>
        </header>

        <main class="p-4 sm:p-8 lg:p-10">
            
            <!-- Dashboard Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">

                <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-xl hover:shadow-2xl transition duration-300 transform hover:-translate-y-1 border-t-4 border-green-500">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-green-100 rounded-full text-green-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" /><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 1 1 0 000 2v1h11a1 1 0 110 2H4a2 2 0 01-2-2V5zM3 17v-3a1 1 0 012 0v3h12V9H3v8a1 1 0 001 1h14a1 1 0 001-1V9a1 1 0 00-1-1H4a3 3 0 00-3 3v4h2z" clip-rule="evenodd" /></svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">Learn Modules</h3>
                    </div>
                    <p class="mt-4 text-gray-600">Access structured, step-by-step content. Complete lessons and track your progress through guided courses.</p>
                    <a href="modules.php" class="block mt-6 w-full py-3 bg-green-600 text-white rounded-xl font-semibold hover:bg-green-700 transition duration-150 shadow-md shadow-green-300 text-center text-base">Start Learning</a>
                </div>

                <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-xl hover:shadow-2xl transition duration-300 transform hover:-translate-y-1 border-t-4 border-amber-500">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-amber-100 rounded-full text-amber-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" /></svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">View Videos</h3>
                    </div>
                    <p class="mt-4 text-gray-600">Watch engaging video tutorials and lectures. Visual learning aids help clarify complex topics quickly.</p>
                    <a href="videos.php" class="block mt-6 w-full py-3 bg-amber-600 text-white rounded-xl font-semibold hover:bg-amber-700 transition duration-150 shadow-md shadow-amber-300 text-center text-base">Browse Library</a>
                </div>

                <div class="bg-white p-6 sm:p-8 rounded-2xl shadow-xl hover:shadow-2xl transition duration-300 transform hover:-translate-y-1 border-t-4 border-sky-500">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-sky-100 rounded-full text-sky-600">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" /></svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900">Test Knowledge</h3>
                    </div>
                    <p class="mt-4 text-gray-600">Challenge yourself with quizzes and practice exams to solidify your understanding and prepare for assessments.</p>
                    <a href="test.php" class="block mt-6 w-full py-3 bg-sky-600 text-white rounded-xl font-semibold hover:bg-sky-700 transition duration-150 shadow-md shadow-sky-300 text-center text-base">Take a Quiz</a>
                </div>

            </div>
            
            <!-- Header and explanatory text moved OUTSIDE the table container for a cleaner look -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-6">
                <h2 class="text-3xl font-extrabold text-gray-900 text-center">Test Records</h2>
                <p class="mt-3 text-gray-600 text-center">
                    Answering the test again will result in updating records, it will display the latest score and the current highest score - 
                    <a href="test.php" class="text-indigo-600 font-semibold underline hover:text-indigo-700" aria-label="Retake Test">Retake</a>
                </p>

                <p class="mt-3 text-gray-600 text-center">
                    The test taken will be displayed as Retake if it didn't reached 70%
                </p>
            </div>

            <!-- Quiz Records Table Container -->
            <div id="quiz-records-container" class="bg-white p-6 rounded-2xl shadow-xl">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                    Date and Time
                                </th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                    Test Name
                                </th>
                                <th class="px-6 py-3 text-center text-sm font-medium text-gray-500 uppercase tracking-wider">
                                    Level
                                </th>
                                <th class="px-6 py-3 text-center text-sm font-medium text-gray-500 uppercase tracking-wider">
                                    Latest Score
                                </th>
                                <th class="px-6 py-3 text-center text-sm font-medium text-gray-500 uppercase tracking-wider">
                                    Percent
                                </th>
                                <th class="px-6 py-3 text-center text-sm font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th class="px-6 py-3 text-center text-sm font-medium text-gray-500 uppercase tracking-wider">
                                    Highest Score
                                </th>
                            </tr>
                        </thead>
                        <tbody id="records-table-body" class="bg-white divide-y divide-gray-200">
                            <tr id="no-records-message" class="hidden">
                                <td colspan="7" class="px-6 py-4 text-center text-base text-gray-500 italic">
                                    Walang naitalang pagsusulit para sa iyo. Mag-take ng quiz para makita ang iyong records dito!
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Use PHP to inject the user name and ID into JS constants
        const USER_ID = document.body.dataset.userId || 'GUEST_ID';
        const USER_NAME = "<?php echo $user_name; ?>";
        const USER_RAW_LEVEL = document.body.dataset.userRawLevel || 'default';
        
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('mobile-menu-overlay');
        const recordsTableBody = document.getElementById('records-table-body');
        const noRecordsMessage = document.getElementById('no-records-message');
        const profilePicTrigger = document.getElementById('profile-pic-trigger');
        const profileUploadInput = document.getElementById('profile-upload-input');
        const currentProfilePic = document.getElementById('current-profile-pic');
        
        // Variable to hold the last fetched JSON string to prevent unnecessary DOM updates
        // NOTE: we combine user-specific and global JSON so updates in either will refresh the table
        let lastRecordsJson = ''; 

        // --- USER-SPECIFIC STORAGE CONFIGURATION ---
        // READS from user-specific key
        const USER_RECORDS_KEY = `quizRecords_${USER_ID}`; 
        const USER_PIC_KEY = `userProfilePic_${USER_ID}`; 
        // Global log key (all users)
        const GLOBAL_RECORDS_KEY = 'allQuizRecords';
        
        console.log(`User-specific record key used: ${USER_RECORDS_KEY}`);
        // --------------------------------------------------

        // --- NEW MAPPING FOR LEVEL DISPLAY ---
        const levelMap = {
            'elementary': 'Elementary',
            'juniorhigh': 'Junior High',
            'seniorhigh': 'Senior High',
            'default': 'Unknown/General'
        };

        /**
         * Helper function to generate the unique key for matching quiz records.
         */
        function getQuizUniqueKey(record) {
            let uniqueLevelId = record.rawLevelId || 'UnknownLevel';
            const quizName = record.name || 'UnnamedQuiz';
            
            if (quizName && quizName.includes("Pagsusulit: Pagdaragdag at Pagbabawas (Aralin 1-3)")) {
                uniqueLevelId = 'elementary';
            }
            return `${quizName}-${uniqueLevelId}`;
        }

        // Function to toggle the sidebar for mobile views
        function toggleSidebar() {
            if (sidebar.classList.contains('-translate-x-full')) {
                // Open sidebar
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
                document.body.style.overflow = 'hidden'; 
            } else {
                // Close sidebar
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
                document.body.style.overflow = ''; 
            }
        }

        // --- PROFILE UPLOAD HANDLERS (Mocked) ---
        profilePicTrigger.addEventListener('click', () => {
            profileUploadInput.click();
        });

        profileUploadInput.addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (!file) return;

            if (!file.type.startsWith('image/')) {
                console.error('Paki-pili lang po ang image file.');
                return;
            }
            if (file.size > 5 * 1024 * 1024) { 
                console.error('Masyadong malaki ang file. Paki-pili po ang file na 5MB pababa.');
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                currentProfilePic.src = e.target.result;
                localStorage.setItem(USER_PIC_KEY, e.target.result);
            };
            reader.readAsDataURL(file);
            
            const originalOverlayContent = profilePicTrigger.querySelector('.profile-pic-overlay').innerHTML;
            profilePicTrigger.querySelector('.profile-pic-overlay').innerHTML = `<span class="text-sm font-bold animate-pulse">Uploading...</span>`;

            // Mocked upload success/failure
            new Promise(resolve => setTimeout(() => resolve({ success: true, new_url: localStorage.getItem(USER_PIC_KEY) }), 1000))
            .then(data => {
                profilePicTrigger.querySelector('.profile-pic-overlay').innerHTML = originalOverlayContent;
                
                if (data.success && data.new_url) {
                    currentProfilePic.src = data.new_url;
                    localStorage.setItem(USER_PIC_KEY, data.new_url);
                    console.log('Matagumpay na na-upload at na-save ang bagong profile picture!');
                } else {
                    console.error('Error sa server: ' + (data.message || 'Hindi na-save ang file.'));
                    const storedUrl = localStorage.getItem(USER_PIC_KEY);
                    currentProfilePic.src = storedUrl || '<?php echo $profile_pic_url; ?>'; 
                }
            })
            .catch(error => {
                profilePicTrigger.querySelector('.profile-pic-overlay').innerHTML = originalOverlayContent;
                console.error('Nagkaroon ng error sa pag-upload. Pakisubukan muli.', error);
                const storedUrl = localStorage.getItem(USER_PIC_KEY);
                currentProfilePic.src = storedUrl || '<?php echo $profile_pic_url; ?>'; 
            });
            
            event.target.value = ''; 
        });

        /**
         * Fetches and processes records for display (keeps only the latest score per quiz).
         * Uses the user-specific key.
         * @returns {Array<Object>} The filtered list containing only the latest attempt per quiz.
         */
        function getUniqueUserRecords() {
            try {
                // Reads from user-specific key: quizRecords_<USER_ID>
                const rawRecordsRaw = localStorage.getItem(USER_RECORDS_KEY);
                let rawRecords = rawRecordsRaw ? JSON.parse(rawRecordsRaw) : [];
                
                if (!Array.isArray(rawRecords)) {
                    return [];
                }
                
                const latestRecords = {};

                // Sort by date/time ASCENDING so the last record processed (which overwrites the key) is the newest one.
                const sortedRecords = rawRecords.sort((a, b) => {
                    const timeA = parseRecordDateTime(a);
                    const timeB = parseRecordDateTime(b);
                    return timeA - timeB;
                });

                sortedRecords.forEach(record => {
                    // Overwrite the existing record with the newer one (due to upsert logic in quiz.php)
                    const uniqueKey = getQuizUniqueKey(record);
                    latestRecords[uniqueKey] = record;
                });

                // Convert the object values back into an array
                return Object.values(latestRecords);

            } catch (error) {
                console.error("Error loading or parsing user quiz records from storage:", error);
                return [];
            }
        }

        /**
         * Parse the record's datetime in a robust way.
         * Prefer ISO datetime (dateTimeISO). Fallback to combining date + time.
         * Returns a millisecond timestamp (number).
         */
        function parseRecordDateTime(record) {
            // If record has ISO datetime use it (reliable)
            if (record && record.dateTimeISO) {
                const parsed = Date.parse(record.dateTimeISO);
                if (!isNaN(parsed)) return parsed;
            }

            // Try combining date + time (both created by quiz.php using en-US locales)
            try {
                const datePart = record.date || '';
                const timePart = record.time || '';
                const combined = `${datePart} ${timePart}`.trim();
                const parsed = Date.parse(combined);
                if (!isNaN(parsed)) return parsed;
            } catch (e) {
                // noop
            }

            // Last resort: try parsing the record.date alone
            try {
                const parsed = Date.parse(record.date || '');
                if (!isNaN(parsed)) return parsed;
            } catch (e) {
                // noop
            }

            // If all fails, return 0 to push unknown dates to the bottom when sorting
            return 0;
        }

        // --- Record Loading Logic ---
        function loadQuizRecords() {
            // Combine user-specific and global raw JSON so the table refreshes when either changes
            const currentUserRaw = localStorage.getItem(USER_RECORDS_KEY);
            const currentGlobalRaw = localStorage.getItem(GLOBAL_RECORDS_KEY);
            const combinedJson = `${currentUserRaw || ''}|${currentGlobalRaw || ''}`;

            // Check if the data has actually changed since the last time we loaded it
            if (combinedJson === lastRecordsJson) {
                return; // Do nothing if the data hasn't changed
            }
            
            lastRecordsJson = combinedJson; // Update the reference

            // --- PROFILE PIC PERSISTENCE ---
            const storedProfilePic = localStorage.getItem(USER_PIC_KEY);
            if (storedProfilePic) {
                currentProfilePic.src = storedProfilePic;
            }

            // --- BUILD USER-ONLY HIGHEST SCORE MAP FROM GLOBAL LOG ---
            // NOTE: We compute highest per quiz but ONLY from records that belong to the current user.
            let highestMapUser = {};
            try {
                const globalRecordsRaw = localStorage.getItem(GLOBAL_RECORDS_KEY);
                const globalRecords = globalRecordsRaw ? JSON.parse(globalRecordsRaw) : [];
                if (Array.isArray(globalRecords)) {
                    globalRecords.forEach(r => {
                        // Only consider records that belong to the current user
                        if (!r || (r.userId || '') !== USER_ID) return;

                        const key = getQuizUniqueKey(r);
                        const pct = Number(r.percentage) || 0;
                        const existingPct = highestMapUser[key] ? (Number(highestMapUser[key].percentage) || 0) : -1;
                        if (pct > existingPct) {
                            highestMapUser[key] = r;
                        }
                    });
                }
            } catch (e) {
                console.error("Error parsing global records for user-only highest score map:", e);
            }

            // 1. Get ONLY the unique, latest records for the current user
            const recordsToDisplay = getUniqueUserRecords();
            
            // Clear existing rows (including the 'no records' message)
            recordsTableBody.innerHTML = ''; 

            if (recordsToDisplay.length === 0) {
                // If no records, show the default message
                noRecordsMessage.classList.remove('hidden');
                recordsTableBody.appendChild(noRecordsMessage);
                return;
            } else {
                noRecordsMessage.classList.add('hidden');
            }

            // 2. Sort the final list by dateTime descending (newest activity first)
            recordsToDisplay.sort((a, b) => parseRecordDateTime(b) - parseRecordDateTime(a));


            // Build and insert all rows in one go for better performance
            const fragment = document.createDocumentFragment();

            recordsToDisplay.forEach(record => {
                const row = document.createElement('tr');
                
                // Get the corrected quiz level ID
                let rawQuizLevel = record.rawLevelId;
                let quizName = record.name;
                
                // --- Use the same logic as getQuizUniqueKey for display level fix ---
                if (quizName && quizName.includes("Pagsusulit: Pagdaragdag at Pagbabawas (Aralin 1-3)")) {
                    rawQuizLevel = 'elementary';
                }
                
                // Determine color for percentage (Pass/Fail - mocked at 70%)
                const pctValue = Number(record.percentage);
                const isPassing = (!isNaN(pctValue) ? pctValue : 0) >= 70;
                const scoreColor = isPassing ? 'text-green-600 font-bold' : 'text-red-600 font-bold';
                
                // Map the quiz level ID to the display name
                const displayQuizLevel = levelMap[rawQuizLevel] || record.level;

                // Map the student's *actual* raw level ID (from saved record data)
                const studentLevelDisplay = levelMap[record.userLevel || 'default'] || 'N/A';
                
                // Prepare the display for date + time in a single cell.
                // Prefer to show the nicely formatted date/time (record.date + record.time),
                // otherwise fall back to ISO or 'N/A'.
                let displayDateTime = 'N/A';
                if (record.date || record.time) {
                    displayDateTime = `${record.date || ''}${record.date && record.time ? ' ' : ''}${record.time || ''}`.trim();
                } else if (record.dateTimeISO) {
                    // Format ISO to a readable string
                    const d = new Date(record.dateTimeISO);
                    if (!isNaN(d.getTime())) {
                        displayDateTime = `${d.toLocaleDateString('en-US')} ${d.toLocaleTimeString('en-US')}`;
                    }
                }

                // Get the highest record for this quiz from the previously computed user-only highestMapUser
                const uniqueKey = getQuizUniqueKey(record);
                const highestRecord = highestMapUser[uniqueKey];
                let highestDisplay = 'N/A';
                if (highestRecord && (highestRecord.score !== undefined && highestRecord.score !== null)) {
                    // Display the score (e.g. "8/10") instead of percentage or owner name
                    highestDisplay = `${highestRecord.score}`;
                }

                // Display percent with '%' sign. If percentage is not present, show 'N/A'.
                const percentDisplay = (record.percentage !== undefined && record.percentage !== null && !isNaN(Number(record.percentage))) ? String(record.percentage) + '%' : 'N/A';

                // Status text and class based on passing criteria
                const statusText = isPassing ? 'Passed' : 'Retake';
                const statusClass = isPassing ? 'text-green-600 font-bold' : 'text-red-600 font-bold';

                row.innerHTML = `
                    <td class="px-6 py-4 whitespace-nowrap text-base text-gray-500">${displayDateTime}</td>
                    <td class="px-6 py-4 whitespace-normal text-base text-gray-900 font-medium">${quizName || 'N/A'}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-base text-gray-900 text-center">${displayQuizLevel || 'N/A'}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-base text-gray-900 text-center">${record.score || 'N/A'}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-base ${scoreColor} text-center">${percentDisplay}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-base ${statusClass} text-center">${statusText}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-base text-black text-center">${highestDisplay}</td>
                `;
                fragment.appendChild(row);
            });
            recordsTableBody.appendChild(fragment);
        }
        
        // --- INITIAL LOAD AND AUTO-UPDATE POLLING ---

        // 1. Initial Load when the page is fully loaded
        window.onload = loadQuizRecords;

        // 2. Set up polling to check for localStorage changes every 1 second
        const updateInterval = 1000; // 1 second
        setInterval(loadQuizRecords, updateInterval);
        
        console.log(`Auto-update polling started every ${updateInterval / 1000} seconds.`);
    </script>
</body>
</html>
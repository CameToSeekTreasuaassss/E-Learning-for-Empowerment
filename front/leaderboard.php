<!-- 
    This HTML represents the rendered canvas output of the leaderboard.php file, 
    redesigned to match the dark, modern theme and card-style podium/rankings 
    shown in the reference images (leaderboards.PNG and rankings.PNG).
    
    The core leaderboard calculation logic remains unchanged.
    
    Example localStorage data structure (you can paste this in your console):
    localStorage.setItem('allQuizRecords', JSON.stringify([
      { userId: 'USER-001', userName: 'Alice Explorer', userLevel: 'elementary', name: 'Module A', percentage: '91.50' },
      { userId: 'USER-001', userName: 'Alice Explorer', userLevel: 'elementary', name: 'Module A', percentage: '85.00' },
      { userId: 'USER-002', userName: 'Bob Master', userLevel: 'elementary', name: 'Module A', percentage: '98.50' },
      { userId: 'USER-003', userName: 'Charlie', userLevel: 'elementary', name: 'Module A', percentage: '72.00' },
      { userId: 'USER-004', userName: 'Diana', userLevel: 'elementary', name: 'Module A', percentage: '91.00' },
      { userId: 'MOCKED-USER-ID', userName: 'You', userLevel: 'elementary', name: 'Module A', percentage: '85.00' },
      { userId: 'USER-002', userName: 'Bob Master', userLevel: 'juniorhigh', name: 'Module X', percentage: '90.00' }
    ]));
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboards</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- Font Awesome for Crown/Medal icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <style>
        /* --- GLOBAL STYLING (Dark Theme) --- */
        body {
            font-family: 'Poppins', sans-serif;
            /* Dark background inspired by the image */
            background-color: #0b0f19; /* Very dark blue/black */
            color: #e5e7eb; /* Light gray text */
            scroll-behavior: smooth;
        }

        /* Base Card Style for Podium and List Items */
        .leaderboard-card {
            background-color: #1a202c; /* Dark slate */
            border-radius: 1rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.2), 0 2px 4px -2px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
        }

        /* --- NAVIGATION/BUTTON STYLING --- */
        /* Active level tab styling (Blue button, dark container) */
        .level-tab-container {
             background-color: #1a202c; /* Same as card background */
             padding: 0.5rem;
             border-radius: 9999px;
             box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        }
        .level-tab-button {
            font-size: 20px;
            color: #cbd5e1; /* Light gray */
            font-weight: 500;
        }
        .level-tab-button.active {
            color: #ffffff;
            background-color: #3b82f6; /* Blue-500 */
            box-shadow: 0 5px 15px rgba(59, 130, 246, 0.4);
            font-weight: 600;
        }
        .level-tab-button:not(.active):hover {
            background-color: #2d3748; /* Slightly lighter dark */
        }
        
        /* Dropdown Styling */
        .module-dropdown-wrapper select {
            background-color: #1a202c;
            border-color: #4a5568; /* Dark border */
            color: #e5e7eb;
            font-size: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }
        .module-dropdown-wrapper svg {
            color: #a0aec0; /* Lighter arrow */
        }

        /* Back button (top-left) styling */
        .back-button {
            position: absolute;
            top: 1rem;
            left: 1rem;
            z-index: 60;
            color: #ffffff;
            background: transparent;
            padding: 0.5rem 0.75rem;
            border-radius: 0.375rem;
            font-weight: 600;
            text-decoration: none;
            transition: background-color 0.15s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
        }
        .back-button i.fa-arrow-left {
            /* ensure the arrow is white and slightly larger */
            color: #ffffff;
            font-size: 1.05rem;
        }
        .back-button:focus {
            outline: 2px solid rgba(255,255,255,0.12);
            outline-offset: 2px;
        }
        .back-button:hover {
            background-color: rgba(255,255,255,0.06);
        }

        /* --- PODIUM CARD STYLING --- */
        
        #top-three-podium {
            min-height: 650px; /* Adjusted max height to accommodate 600px podium */
            align-items: flex-end; /* Align podium cards to the bottom */
            padding-bottom: 2rem; /* Padding at the bottom of the container */
        }

        .podium-card {
            width: 32%; /* Fixed width for consistent size */
            position: relative;
            
            /* Change alignment to stack content at the bottom */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-end; /* PUSHES CONTENT TO THE BOTTOM */
            
            text-align: center;
            overflow: hidden; 
            padding-top: 10rem; /* Ensure space for the icon/crown */
            padding-bottom: 2rem; /* Padding inside the card at the bottom */
            
            transition: all 0.3s ease;
            
            /* Overwrite the dark background from .leaderboard-card */
            background-color: transparent; 
        }

        /* Define specific heights for each rank */
        .rank-height-1 { height: 600px; }
        .rank-height-2 { height: 560px; }
        .rank-height-3 { height: 520px; }
        /* Empty/Unranked Card (to keep alignment) */
        .rank-height-unranked { height: 520px; }
        
        /* GENERAL RULE: Force all content text inside ranked podium cards to black */
        .podium-card[class*='rank-']-bg {
            /* This sets the default text color for the parent element */
            color: #000000; 
        }
        /* Aggressively force all children text (names, percentage, record count, and the large rank number) to black */
        .podium-card[class*='rank-']-bg * { 
            color: #000000 !important;
        }


        /* RANK 1: GOLD FULL COLOR WITH SHINE */
        .podium-card.rank-1-bg {
            /* Gold base with a white shine highlight for metallic effect */
            background: linear-gradient(140deg, 
                #FFD700 0%, 
                #FFEB99 15%, /* Shine highlight */
                #DAA520 50%, 
                #FFD700 100%
            );
            box-shadow: 0 0 25px rgba(255, 215, 0, 0.8); /* Stronger glow */
        }

        /* RANK 2: SILVER FULL COLOR WITH SHINE */
        .podium-card.rank-2-bg {
            /* Silver base with a white shine highlight for metallic effect */
            background: linear-gradient(140deg, 
                #C0C0C0 0%, 
                #E0E0E0 15%, /* Shine highlight */
                #A9A9A9 50%, 
                #C0C0C0 100%
            );
            box-shadow: 0 0 25px rgba(192, 192, 192, 0.8);
        }

        /* RANK 3: BRONZE FULL COLOR WITH SHINE */
        .podium-card.rank-3-bg {
            /* Bronze base with a white shine highlight for metallic effect */
            background: linear-gradient(140deg, 
                #CD7F32 0%, 
                #EBC3A1 15%, /* Shine highlight */
                #A0522D 50%, 
                #CD7F32 100%
            );
            box-shadow: 0 0 25px rgba(205, 127, 50, 0.8);
        }

        /* Fallback for unranked podium (uses dark card style) */
        .podium-card:not([class*='rank-']-bg) {
            background-color: #1a202c;
            color: #e5e7eb;
        }

        /* Rank Icons (Crown and Shapes) - These should still have their specific colors */
        .rank-icon-container {
            position: absolute;
            top: 10px; 
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: #fff;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
            z-index: 20;
        }

        .icon-rank-1 { background: linear-gradient(45deg, #FFD700, #DAA520); color: #8B4513; } /* Dark icon for contrast */
        .icon-rank-2 { background: linear-gradient(45deg, #C0C0C0, #A9A9A9); color: #333; }
        .icon-rank-3 { background: linear-gradient(45deg, #CD7F32, #FF7F50); color: #fff; }

        /* --- RANKING LIST STYLING --- */

        .ranking-item {
            background-color: #1a202c; /* Default dark list item */
            border: 2px solid transparent;
        }

        .ranking-item:hover {
            background-color: #2d3748; /* Slightly lighter on hover */
        }
        
        /* Highlight the current user in the list (Dark blue background) */
        .current-user-highlight {
            background-color: #1f2a40; /* Darker blue background for 'You' */
            border-color: #3b82f6; /* Blue-500 border */
            box-shadow: 0 0 10px rgba(59, 130, 246, 0.2);
        }

        /* Styling for the small rank badges in the list */
        .list-rank-badge {
            min-width: 2.5rem;
            height: 2.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            font-weight: 700;
            border-radius: 0.5rem; /* Squared rounded corners */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            color: #1a202c; /* Dark text for contrast */
        }

        .badge-rank-1 { background-color: #FFD700; } /* Gold */
        .badge-rank-2 { background-color: #C0C0C0; } /* Silver */
        .badge-rank-3 { background-color: #CD7F32; color: #fff; } /* Bronze */
        .badge-rank-other { background-color: #4a5568; color: #fff; } /* Dark gray for others */

        /* Utility classes for text sizes from original file */
        .text-22px { font-size: 22px; }
        .text-20px { font-size: 20px; }
    </style>
</head>
<body data-user-id="MOCKED-USER-ID">

    <!-- Back button (very top-left) with arrow -->
    <!-- Note: href="#" and a JS handler below ensures a reliable "back" experience.
         Fallback: if there's no history, it redirects to document.referrer or '/'.
    -->
    <a id="back-button" href="#" class="back-button" role="button" aria-label="Back" tabindex="0">
        <i class="fas fa-arrow-left" aria-hidden="true"></i>
        <span>Back</span>
    </a>

    <!-- MAIN CONTAINER -->
    <div id="main-container" class="flex-1 min-h-screen text-lg">

        <!-- Top Header & Crown Icon (No sticky classes) -->
        <header class="pt-10 pb-8 text-center">
            <!-- Crown Icon -->
            <div class="text-4xl text-yellow-400 mb-2">
                <i class="fas fa-crown"></i>
            </div>
            <h1 id="main-header-title" class="text-4xl font-extrabold text-white">Explorer Leaderboards</h1>
        </header>

        <!-- Main Content Area -->
        <main class="p-4 sm:p-8 lg:p-10 max-w-7xl mx-auto">
            
            <!-- 1. Level Tab Navigation (Static) -->
            <div class="mb-8 flex justify-center level-tab-container max-w-2xl mx-auto">
                <button
                    data-level="elementary"
                    class="level-tab-button active flex-1 py-3 px-4 rounded-full transition duration-150"
                    onclick="switchLevel('elementary')"
                >
                    Elementary
                </button>
                <button
                    data-level="juniorhigh"
                    class="level-tab-button flex-1 py-3 px-4 rounded-full transition duration-150"
                    onclick="switchLevel('juniorhigh')"
                >
                    Junior High
                </button>
                <button
                    data-level="seniorhigh"
                    class="level-tab-button flex-1 py-3 px-4 rounded-full transition duration-150"
                    onclick="switchLevel('seniorhigh')"
                >
                    Senior High
                </button>
            </div>
            
            <!-- 2. Module Dropdown Navigation (Dynamic) -->
            <div class="mb-16 flex justify-center max-w-2xl mx-auto">
                <div class="relative w-full module-dropdown-wrapper">
                    <select id="module-dropdown" 
                            class="block w-full border py-3 px-4 pr-8 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 module-text-20px font-medium"
                            onchange="switchModule(this.value)">
                        <!-- Options populated by JavaScript -->
                    </select>
                    <!-- Custom arrow icon for aesthetic appeal -->
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4">
                        <svg class="fill-current h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                </div>
            </div>

            <!-- Module Title and Subheader -->
            <div class="text-center mb-10">
                <h2 id="module-title" class="text-4xl font-extrabold text-white mb-2">
                    <span id="current-module-name">Module A</span>
                </h2>
                <p id="module-subtitle" class="text-lg text-gray-400">Top Performers</p>
            </div>
            
            <!-- Top 3 Podium Display (Updated to use flex items-end for bottom alignment) -->
            <div id="top-three-podium" class="mb-20 flex justify-center space-x-4 w-full mx-auto items-end">
                <!-- Content rendered by JavaScript -->
                <div class="text-center text-gray-500 italic p-8 leaderboard-card w-full max-w-lg">Select a Module to see the Top 3</div>
            </div>

            <!-- Leaderboard List Container -->
            <div class="max-w-4xl mx-auto">
                <h3 class="text-xl font-bold text-gray-300 mb-6">FULL RANKINGS</h3>
                <ul id="leaderboard-list" class="space-y-4">
                    <!-- Leaderboard items will be inserted here by JavaScript -->
                    <li id="loading-message" class="text-center py-8 text-gray-500 italic text-lg animate-pulse leaderboard-card">
                        Loading records and calculating rankings...
                    </li>
                </ul>

                <div id="no-records-message" class="hidden text-center py-8 text-gray-500 italic text-20px leaderboard-card mt-4">
                    Walang nakitang records para sa <span id="no-records-module"></span> sa level na ito.
                </div>
            </div>

        </main>
    </div>

    <script>
        // Make the Back button reliably perform a browser "back" or fallback to referrer/home.
        (function() {
            const backBtn = document.getElementById('back-button');
            if (!backBtn) return;

            function goBack() {
                try {
                    // If there's a previous history entry, go back.
                    if (window.history && window.history.length > 1) {
                        window.history.back();
                    } else if (document.referrer) {
                        // If no history stack, but a referrer exists, go there.
                        window.location.href = document.referrer;
                    } else {
                        // Final fallback: go to root or a known safe page.
                        window.location.href = '/';
                    }
                } catch (err) {
                    console.error('Back navigation failed, redirecting to fallback.', err);
                    window.location.href = document.referrer || '/';
                }
            }

            backBtn.addEventListener('click', function(e) {
                e.preventDefault();
                goBack();
            });

            // Keyboard accessibility: Enter or Space triggers the action
            backBtn.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ' ' || e.key === 'Spacebar') {
                    e.preventDefault();
                    goBack();
                }
            });
        })();
    </script>

    <script>
        // --- CONFIGURATION ---
        const GLOBAL_RECORDS_KEY = `allQuizRecords`;
        let TARGET_LEVEL = 'elementary'; // Default level
        let TARGET_MODULE = null; // Default module
        // Mock the PHP variable injection for the preview
        const currentUserId = 'MOCKED-USER-ID'; 

        // Define constants for the fixed podium height, only relevant for the old system
        const MEDAL_SIZE_PX = 192; 
        const PILLAR_BASE_OFFSET_PX = 40;
        const NAME_LABEL_HEIGHT_PX = 30; 
        const PILLAR_WIDTH_REM = 12; 
        const MEDAL_TO_NAME_GAP = 20; 
        const NAME_TO_PILLAR_GAP = 55; 
        const RANK_1_MEDAL_BOTTOM = 395; 
        const RANK_2_MEDAL_BOTTOM = 355; 
        const RANK_3_MEDAL_BOTTOM = 315; 
        // --- END CONSTANTS ---

        // Map for display names
        const levelDisplayName = {
            'elementary': 'Elementary',
            'juniorhigh': 'Junior High',
            'seniorhigh': 'Senior High'
        };

        // DOM elements
        const listContainer = document.getElementById('leaderboard-list');
        const loadingMessage = document.getElementById('loading-message');
        const noRecordsMessage = document.getElementById('no-records-message');
        const noRecordsModule = document.getElementById('no-records-module');
        const moduleDropdown = document.getElementById('module-dropdown');
        const levelTabButtons = document.querySelectorAll('.level-tab-button');
        const topThreeContainer = document.getElementById('top-three-podium');
        const currentModuleNameDisplay = document.getElementById('current-module-name');


        /**
         * Fetches all unique module names for the currently selected TARGET_LEVEL.
         * (LOGIC UNCHANGED)
         * @returns {Array<string>} List of unique module names.
         */
        function getUniqueModulesForLevel() {
            try {
                const currentRecordsRaw = localStorage.getItem(GLOBAL_RECORDS_KEY);
                const rawRecords = currentRecordsRaw ? JSON.parse(currentRecordsRaw) : [];

                if (!Array.isArray(rawRecords)) return [];

                const moduleSet = new Set();
                
                rawRecords.forEach(record => {
                    // Filter by level and ensure it has a name (module)
                    if ((record.userLevel || '').toLowerCase() === TARGET_LEVEL && record.name) {
                        moduleSet.add(record.name);
                    }
                });

                return Array.from(moduleSet).sort(); // Alphabetical sort for stability

            } catch (error) {
                console.error("Error retrieving unique modules:", error);
                return [];
            }
        }

        /**
         * Renders the dynamic module dropdown options and initializes the leaderboard.
         * (LOGIC UNCHANGED)
         * @param {Array<string>} modules - List of unique module names.
         */
        function renderModuleTabs(modules) {
            moduleDropdown.innerHTML = ''; // Clear existing options

            if (modules.length === 0) {
                // If no modules, clear module state and show general message
                TARGET_MODULE = null;
                noRecordsMessage.classList.remove('hidden');
                noRecordsModule.textContent = '';
                currentModuleNameDisplay.textContent = '---';
                
                // Add a placeholder option to the dropdown
                const defaultOption = document.createElement('option');
                defaultOption.value = '';
                defaultOption.textContent = 'No Modules Found';
                moduleDropdown.appendChild(defaultOption);

                // Clear podium display
                topThreeContainer.innerHTML = '<div class="text-center text-gray-500 italic p-8 leaderboard-card w-full max-w-lg">Select a Module to see the Top 3</div>';

                // Set focus back to default level display
                switchModule(TARGET_MODULE);
                return;
            }

            const fragment = document.createDocumentFragment();
            // Try to keep the current module selected if it still exists in the new level, otherwise default to the first
            const initialModule = modules.includes(TARGET_MODULE) ? TARGET_MODULE : modules[0];
            TARGET_MODULE = initialModule;

            modules.forEach(moduleName => {
                const option = document.createElement('option');
                option.value = moduleName;
                option.textContent = moduleName;
                
                // Set the selected property for the initial target module
                if (moduleName === TARGET_MODULE) {
                    option.selected = true;
                }
                
                fragment.appendChild(option);
            });

            moduleDropdown.appendChild(fragment);
            
            // Now that options are rendered, switch the module to load the data
            switchModule(TARGET_MODULE);
        }

        /**
         * Handles switching the active Test Module and triggers leaderboard calculation.
         * (LOGIC UNCHANGED)
         * @param {string} newModule - The name of the new module to filter by.
         */
        function switchModule(newModule) {
            TARGET_MODULE = newModule;
            currentModuleNameDisplay.textContent = newModule || 'Select Module';

            // 1. Show loading message and calculate new rankings
            loadingMessage.classList.remove('hidden');
            noRecordsMessage.classList.add('hidden');
            listContainer.innerHTML = '';
            topThreeContainer.innerHTML = '<div class="text-center text-gray-500 italic p-8 leaderboard-card w-full max-w-lg">Loading Top 3...</div>';
            
            // Recalculate and render asynchronously
            setTimeout(() => {
                const leaderboard = calculateLeaderboard();
                renderLeaderboard(leaderboard);
            }, 50);
        }
        
        /**
         * Handles switching the active student Level.
         * (LOGIC UNCHANGED)
         * @param {string} newLevel - The new target level.
         */
        function switchLevel(newLevel) {
            TARGET_LEVEL = newLevel;

            // 1. Update level button active state
            levelTabButtons.forEach(button => {
                if (button.dataset.level === newLevel) {
                    button.classList.add('active');
                } else {
                    button.classList.remove('active');
                }
            });

            // 2. Reset module and re-initialize the module dropdown for the new level
            initializeModuleView();
        }

        /**
         * Initializes the module view by getting unique modules and rendering dropdown options.
         * (LOGIC UNCHANGED)
         */
        function initializeModuleView() {
             // Show general loading message while fetching modules
            loadingMessage.classList.remove('hidden');
            noRecordsMessage.classList.add('hidden');
            listContainer.innerHTML = '';

            const modules = getUniqueModulesForLevel();
            renderModuleTabs(modules);
        }


        /**
         * Fetches all records, filters by TARGET_LEVEL and TARGET_MODULE, 
         * calculates the average score for each student, and returns a sorted ranking array.
         * (LOGIC UNCHANGED)
         * @returns {Array<Object>} Sorted array of ranked students.
         */
        function calculateLeaderboard() {
            if (!TARGET_MODULE) {
                // If there's no module to target, return empty list
                return [];
            }
            
            try {
                const currentRecordsRaw = localStorage.getItem(GLOBAL_RECORDS_KEY);
                let rawRecords = currentRecordsRaw ? JSON.parse(currentRecordsRaw) : [];

                if (!Array.isArray(rawRecords)) return [];

                // 1. Filter for the target level AND target module
                const filteredRecords = rawRecords.filter(record =>
                    (record.userLevel || '').toLowerCase() === TARGET_LEVEL &&
                    (record.name || '') === TARGET_MODULE
                );
                
                // 2. Aggregate scores by student (userId). 
                const studentScores = new Map();

                filteredRecords.forEach(record => {
                    const userId = record.userId;
                    const percentage = parseFloat(record.percentage);
                    // Mocking the quiz count for display purposes, assuming 1 record = 1 quiz.
                    // If the original data had multiple quizzes per module/user, the logic would be:
                    // student.quizCount += 1; 
                    // To simplify, we count unique records as quizzes.
                    const quizCount = 1; 
                    
                    if (!userId || isNaN(percentage)) return;

                    if (!studentScores.has(userId)) {
                        studentScores.set(userId, {
                            userName: record.userName || 'Explorer',
                            totalPercentage: 0,
                            quizCount: 0,
                            userId: userId,
                            // Store the count of records for the quizzes taken display
                            recordCount: 0 
                        });
                    }

                    const student = studentScores.get(userId);
                    student.totalPercentage += percentage;
                    student.quizCount += quizCount; // Keep the original quiz count logic
                    student.recordCount += 1; // Count of records for "X Test Records Taken" display
                });

                // 3. Calculate average percentage and create final list
                const rankedStudents = [];
                studentScores.forEach(student => {
                    const averagePercentage = student.quizCount > 0
                        ? (student.totalPercentage / student.quizCount).toFixed(02)
                        : 0;

                    rankedStudents.push({
                        ...student,
                        averagePercentage: parseFloat(averagePercentage)
                    });
                });

                // 4. Sort by averagePercentage (Descending)
                rankedStudents.sort((a, b) => b.averagePercentage - a.averagePercentage);

                return rankedStudents;

            } catch (error) {
                console.error("Error calculating leaderboard:", error);
                return [];
            }
        }
        
        /**
         * Renders a single Top 3 podium card (replacing the old pillar/medal).
         * @param {Object} student - The student data object.
         * @param {number} rank - The rank (1, 2, or 3).
         * @returns {string} HTML string for the podium item.
         */
        function renderPodiumCard(student, rank) {
            const isRanked = !!student;
            // Use 'rank-x-bg' class for full podium color
            const rankBgClass = `rank-${rank}-bg`;
            const iconClass = `icon-rank-${rank}`;
            
            // Define height class based on rank
            let heightClass = '';
            if (rank === 1) {
                heightClass = 'rank-height-1';
            } else if (rank === 2) {
                heightClass = 'rank-height-2';
            } else if (rank === 3) {
                heightClass = 'rank-height-3';
            } else {
                heightClass = 'rank-height-unranked';
            }
            
            // Medal icon changes based on rank
            const medalIcon = rank === 1 ? 'fas fa-trophy' : (rank === 2 ? 'fas fa-shield-alt' : 'fas fa-star');
            // This color variable is no longer necessary as CSS will force black
            // const medalColor = rank === 1 ? 'text-yellow-400' : (rank === 2 ? 'text-gray-300' : 'text-orange-400');
            
            // Fallback content if the rank is empty 
            if (!isRanked) {
                // The unranked card uses the default dark card style (podium-card:not([class*='rank-']-bg))
                return `
                    <div class="podium-card leaderboard-card ${heightClass}">
                        <div class="rank-icon-container bg-gray-600">
                            <i class="fas fa-question text-white"></i>
                        </div>
                        <div class="mt-8 text-gray-500">
                            <h4 class="text-xl font-bold">Unranked</h4>
                            <p class="text-4xl font-extrabold my-2">-</p>
                            <p class="text-sm">No Record</p>
                        </div>
                    </div>
                `;
            }
            
            // Determine the correct singular/plural form for 'Test Record'
            const recordToken = student.recordCount !== 1 ? 'Test Records' : 'Test Record';

            const userNameDisplay = student.userName === 'You' ? `You` : student.userName;
            
            // Render the podium card with rank background. 
            // Crucially, removed all conflicting Tailwind text color classes (e.g., text-white, text-gray-400, text-yellow-400) 
            // and relying on the CSS rule: .podium-card[class*='rank-']-bg * { color: #000000 !important; }
            return `
                <div class="podium-card leaderboard-card ${rankBgClass} ${heightClass}">
                    
                    <!-- Icon Container (Crown/Trophy/Star) -->
                    <div class="rank-icon-container ${iconClass}">
                         <i class="${medalIcon}"></i>
                    </div>

                    <!-- Rank Number (Big number on the side, opacity 10 ensures it's faded, but now forced black) -->
                    <div class="absolute right-4 top-4 text-[6rem] font-black opacity-10 leading-none">
                        ${rank}
                    </div>

                    <!-- Content (All text inside will be black due to CSS override) -->
                    <div class="mt-4">
                        <h4 class="text-2xl font-bold truncate">${userNameDisplay}</h4>
                        <!-- Removed 'text-yellow-400' class here -->
                        <p class="text-4xl font-extrabold my-2">${student.averagePercentage}%</p>
                        <!-- Removed 'text-gray-400' class here -->
                        <p class="text-sm">${student.recordCount} ${recordToken} Taken</p>
                    </div>
                </div>
            `;
        }

        /**
         * Renders the leaderboard to the UI, including the Top 3 Podium.
         * (VISUALS CHANGED, LOGIC UNCHANGED)
         * @param {Array<Object>} leaderboard - The sorted array of ranked students.
         */
        function renderLeaderboard(leaderboard) {

            // Hide loading message
            loadingMessage.classList.add('hidden');
            listContainer.innerHTML = ''; // Clear old list
            noRecordsModule.textContent = TARGET_MODULE || 'any module';
            
            // --- TOP 3 PODIUM RENDERING ---
            topThreeContainer.innerHTML = '';

            if (leaderboard.length === 0) {
                noRecordsMessage.classList.remove('hidden');
                topThreeContainer.innerHTML = '<div class="text-center text-gray-500 italic p-8 leaderboard-card w-full max-w-lg">No records found for this module.</div>';
            } else {
                noRecordsMessage.classList.add('hidden');
                
                // Extract top students (already sorted)
                const rank1 = leaderboard[0];
                const rank2 = leaderboard[1];
                // Use null if rank 3 does not exist (less than 3 students)
                const rank3 = leaderboard[2] || null; 
                
                // Order them 2, 1, 3 for the visual podium effect (left, center, right)
                const podiumItemsHtml = [
                    renderPodiumCard(rank2, 2),
                    renderPodiumCard(rank1, 1),
                    renderPodiumCard(rank3, 3)
                ].join('');

                topThreeContainer.innerHTML = podiumItemsHtml;
            }
            
            // --- FULL LEADERBOARD LIST RENDERING ---
            const fragment = document.createDocumentFragment();

            // Start list rendering from rank 4 (index 3)
            leaderboard.slice(3).forEach((student, index) => {
                const rank = index + 4; // Start rank number from 4
                const isCurrentUser = student.userId === currentUserId;

                // Rank badge styling based on rank
                let rankBadgeClass = 'badge-rank-other';

                const listItem = document.createElement('li');
                // Updated class names to match the new dark theme styling
                listItem.className = `p-4 flex items-center justify-between rounded-xl shadow-lg transition duration-300 hover:scale-[1.01] ranking-item ${isCurrentUser ? 'current-user-highlight' : ''}`;

                // Determine display name for the list
                const listUserName = isCurrentUser ? student.userName : student.userName;

                listItem.innerHTML = `
                    <div class="flex items-center space-x-6">
                        <!-- RANKING BADGE (Squared round corners, solid color) -->
                        <div class="list-rank-badge ${rankBadgeClass}">
                            ${rank}
                        </div>
                        <div class="font-medium text-xl text-white truncate">
                            ${listUserName}
                            ${isCurrentUser ? '<span class="text-sm font-bold ml-2 py-1 px-2 rounded bg-blue-700 text-white">YOU</span>' : ''}
                        </div>
                    </div>
                    <div class="text-22px font-bold text-white">
                        ${student.averagePercentage}%
                    </div>
                `;
                fragment.appendChild(listItem);
            });

            listContainer.appendChild(fragment);

            // If the leaderboard has 1, 2, or 3 students, the list should remain empty, which is correct.
            if (leaderboard.length <= 3 && leaderboard.length > 0) {
                 // Insert current user info if they are not in the top 3 and there are other users
                const currentUserRank = leaderboard.findIndex(s => s.userId === currentUserId);
                if (currentUserRank === -1) {
                    const currentUserPlaceholder = document.createElement('li');
                    currentUserPlaceholder.className = 'text-center py-4 text-gray-500 italic text-sm';
                    currentUserPlaceholder.textContent = 'Your rank is not yet calculated in this module, or you are outside the top 3 and no other records exist.';
                    // This message may appear even if the user is in the top 3, so let's check
                    // If current user is not in the top 3, show a separation line.
                    const userRecord = leaderboard.find(s => s.userId === currentUserId);
                    if (!userRecord && leaderboard.length > 0) {
                         const separator = document.createElement('li');
                         separator.className = 'text-center py-4 text-gray-500 italic text-sm border-t border-gray-700 my-4';
                         separator.textContent = '--- Records below Rank 3 ---';
                         listContainer.appendChild(separator);
                    }
                }
            } else if (leaderboard.length > 3) {
                // Ensure a visual separation if there are more than 3 records
                const separator = document.createElement('li');
                separator.className = 'text-center py-4 text-gray-500 italic text-sm border-t border-gray-700 my-4';
                separator.textContent = '--- Records Below Rank 3 ---';
                listContainer.prepend(separator);
            }
        }

        // --- INITIAL LOAD AND AUTO-UPDATE LOGIC (UNCHANGED) ---

        // 1. Initial Load when the page is fully loaded
        window.onload = function() {
            // Start by initializing the default level ('elementary') and its modules
            initializeModuleView();
        }

        // 2. Set up Storage Event Listener for cross-tab updates (vital for real-time updates)
        window.addEventListener('storage', (event) => {
            if (event.key === GLOBAL_RECORDS_KEY) {
                console.log("Storage event detected for global records. Re-initializing view.");
                // Re-initialize to check for new modules or updated scores
                initializeModuleView();
            }
        });
    </script>
</body>
</html>
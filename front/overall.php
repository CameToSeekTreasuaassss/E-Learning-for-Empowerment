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

// --- UPDATED LOGIC TO RELY ON SESSION DATA (KEPT FOR DATA EXTRACTION) ---
// MANDATORY: Use a unique identifier for the user.
$user_id = $_SESSION['user_id'] ?? 'GUEST_ID'; 
// This retrieves the student level (e.g., 'elementary') or role (e.g., 'admin') set during login.
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
    case 'admin':
        $user_level_display = 'Administrator';
        break;
    case 'teacher':
        $user_level_display = 'Teacher | Faculty';
        break;
    default:
        // This default case runs if $_SESSION['user_level'] is not set or invalid.
        $user_level_display = 'Student | Explorer';
        break;
}

// We define the static records table structure and the JS will populate it.
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Teacher Overview</title>

  <!-- Tailwind CDN (used for layout/utility) -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

  <style>
    :root{
      --card-bg: #ffffff;
      --muted: #94a3b8; /* gray-400 */
      --accent-start: #6366f1; /* indigo-500 (used in other UI bits) */
      --accent-end: #8b5cf6;
    }

    body{
      font-family: 'Poppins', system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
      background: linear-gradient(180deg, #f8fafc 0%, #f1f5f9 60%);
      color: #0f172a; /* slate-900 */
      -webkit-font-smoothing:antialiased;
      -moz-osx-font-smoothing:grayscale;
      margin:0;
    }

    /* ===== Search / controls styling ===== */
    .controls {
      max-width: 1600px;
      margin: 0 auto;
    }

    .control {
      position: relative;
      display: block;
    }

    /* left icon (consistent for input/select) */
    .control .left-icon{
      position: absolute;
      left: 14px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--muted);
      width: 18px;
      height: 18px;
      pointer-events: none;
      display: inline-block;
    }

    .input-pill, .select-pill {
      width: 100%;
      padding: 12px 44px 12px 44px;
      border-radius: 9999px;
      border: 1px solid #e6edf3;
      background: linear-gradient(180deg, var(--card-bg), #fbfdff);
      box-shadow: 0 6px 20px rgba(15,23,42,0.04);
      outline: none;
      font-size: 0.95rem;
      color: #0f172a;
      transition: box-shadow .18s ease, transform .06s ease, border-color .12s ease;
      box-sizing: border-box;
      -webkit-appearance: none;
    }

    .input-pill:focus, .select-pill:focus {
      border-color: rgba(99,102,241,0.9);
      box-shadow: 0 10px 30px rgba(99,102,241,0.08);
    }

    .select-wrapper .chev {
      position: absolute;
      right: 12px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--muted);
      pointer-events: none;
      width: 18px;
      height: 18px;
    }

    .search-row {
      gap: 16px;
      align-items: center;
    }

    /* Back button (arrow + "Back" text) with red/white gradient
       Updated to match the leaderboard button size and visual weight. */
    .back-btn {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 8px 14px;             /* same padding as leaderboard */
      border-radius: 999px;         /* match leaderboard pill */
      background: linear-gradient(90deg, #ff4d4f 0%, #fff5f5 100%);
      color: #6b0f0f;
      font-weight: 700;             /* same weight as leaderboard */
      border: none;
      cursor: pointer;
      box-shadow: 0 10px 30px rgba(255,77,79,0.12); /* similar elevation */
      transition: transform .12s ease, box-shadow .12s ease, opacity .12s ease;
      -webkit-tap-highlight-color: transparent;
      /* position left relative to the title so it visually sits to the very left of the heading */
      margin-left: -64px;
      position: relative;
      left: -8px;

      /* ensure the height matches visually: the combination of padding + font-size gives the same size */
      min-height: 40px;
      line-height: 1;
    }
    .back-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 12px 34px rgba(255,77,79,0.14);
    }
    .back-btn:active { transform: translateY(0); }

    /* make arrow icon visually consistent with leaderboard icon size */
    .back-btn svg { width:20px; height:20px; fill: none; stroke: currentColor; stroke-width: 1.6; }
    .back-btn span { display:inline-block; line-height:1; }

    @media (max-width:1024px){
      /* Slightly reduce the left shift on medium screens */
      .back-btn { margin-left: -48px; left: -6px; }
    }
    @media (max-width:768px){
      /* On small screens reduce shift so the button doesn't overflow the viewport */
      .back-btn { margin-left: -28px; left: -4px; padding: 8px 12px; }
    }

    /* ===== Card & Table styling ===== */
    .card {
      max-width: 1600px;
      margin: 18px auto;
      background: linear-gradient(180deg, rgba(255,255,255,0.7), rgba(255,255,255,0.98));
      border-radius: 14px;
      padding: 18px;
      box-shadow: 0 10px 40px rgba(2,6,23,0.06);
      overflow: hidden;
    }

    .table-wrap {
      width: calc(100% + 40px);
      margin-left: -20px;
      margin-right: -20px;
      overflow: auto;
      border-radius: 12px;
      padding: 10px 20px;
      box-sizing: border-box;
    }

    table.records {
      width: 100%;
      border-collapse: collapse;
      background: transparent;
      min-width: 1200px;
    }

    table.records thead th {
      text-align: left;
      padding: 14px 20px;
      font-weight: 600;
      color: #475569;
      letter-spacing: .02em;
      font-size: .8rem;
      text-transform: uppercase;
      background: linear-gradient(90deg, rgba(99,102,241,0.06), rgba(139,92,246,0.03));
      position: sticky;
      top: 0;
      z-index: 2;
      backdrop-filter: blur(4px);
    }

    /* Ensure header cells with .text-center are centered (more specific than the general rule above) */
    table.records thead th.text-center {
      text-align: center;
    }

    /* Ensure data cells with .text-center are centered too */
    table.records td.text-center {
      text-align: center;
    }

    table.records tbody tr {
      transition: background .12s ease, transform .06s ease;
    }

    table.records tbody tr:hover{
      background: linear-gradient(90deg, rgba(99,102,241,0.03), rgba(139,92,246,0.02));
      transform: translateY(-1px);
    }

    table.records td {
      padding: 14px 20px;
      vertical-align: middle;
      color: #0f172a;
      font-size: .95rem;
      border-bottom: 1px solid #f1f5f9;
    }

    /* Student level previously used a pill. Make it plain text (remove circle/pill). */
    .pill-badge {
      display: inline;
      padding: 0;
      border-radius: 0;
      background: transparent;
      color: inherit;
      font-weight: 600;
      font-size: .95rem; /* match table cell default */
    }

    /* Increase Senior High text slightly (still not a pill) */
    .pill-badge.senior-high {
      font-size: calc(.95rem + 1px);
    }

    /* For plain text cells that contain "Senior High" (quiz level), slightly increase as well,
       and ensure it's normal weight (not bold) per request. */
    .senior-high-text {
      font-size: calc(.95rem + 1px);
      font-weight: 400; /* normal weight (not bold) */
    }

    .pct {
      height:10px;
      background:#e6edf3;
      border-radius:999px;
      overflow:hidden;
    }
    .pct > span {
      display:block;
      height:100%;
      border-radius:999px;
      background: linear-gradient(90deg, var(--accent-start), var(--accent-end));
      transition: width .6s cubic-bezier(.2,.9,.2,1);
    }

    /* Status: plain text, not bold. Pass = green, Fail = red (colors adjusted). */
    .status-pass {
      display: inline;
      padding: 0;
      border-radius: 0;
      background: transparent;
      color: #10b981; /* green */
      font-weight: 400; /* normal weight (not bold) */
      font-size: calc(.82rem + 1px);
    }

    .status-fail {
      display: inline;
      padding: 0;
      border-radius: 0;
      background: transparent;
      color: #ef4444; /* red */
      font-weight: 400; /* normal weight (not bold) */
      font-size: calc(.82rem + 1px);
    }

    .empty {
      text-align:center;
      padding:36px;
      color:#64748b;
    }

    /* Leaderboard button — gold / white linear gradient */
    .leaderboard-btn{
      display:inline-flex;
      align-items:center;
      gap:10px;
      padding:8px 14px;
      border-radius:999px;
      color:#663f00; /* dark gold for text & icon */
      font-weight:700;
      background: linear-gradient(90deg,#FFD54A 0%, #FFF8E1 60%, #ffffff 100%);
      box-shadow: 0 10px 30px rgba(255,193,7,0.12), inset 0 -2px 8px rgba(0,0,0,0.03);
      text-decoration:none;
    }
    /* Make SVG icon use current color (dark gold) */
    .leaderboard-btn svg { width:20px; height:20px; fill: currentColor; color: currentColor; }

    @media (max-width:1400px){
      .table-wrap { width: 100%; margin-left: 0; margin-right: 0; padding: 0; }
    }

    @media (max-width:768px){
      .search-row { flex-direction: column; gap: 12px; }
      .input-pill, .select-pill { padding-left:40px; padding-right:40px; }
      table.records { min-width: 720px; }
    }
  </style>
</head>
<body data-user-id="<?php echo $user_id; ?>" data-user-raw-level="<?php echo $user_level_raw; ?>">

  <input type="file" id="profile-upload-input" accept="image/*" class="hidden">

  <header class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between gap-4">
        <div class="flex items-center gap-3">
          <!-- Back arrow + "Back" text button (now sized to match Leaderboards) -->
          <button id="undo-back-btn" class="back-btn" title="Undo last filter or go back" aria-label="Back / Undo">
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false">
              <path d="M15 18l-6-6 6-6" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <span>Back</span>
          </button>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <div>
            <h1 class="text-2xl font-semibold" style="color:#0f172a; margin:0">Test Records Overview</h1>
            <p class="text-sm" style="color:#64748b; margin:0">Search and filter student quiz attempts. Use the controls to narrow results.</p>
          </div>
        </div>

        <!-- REPLACED PROFILE WITH LEADERBOARD LINK (gold/white gradient) -->
        <div>
          <a href="http://localhost/als/front/leaderboard.php" class="leaderboard-btn" aria-label="Open Leaderboards">
            <!-- Ranking / podium icon with star to represent Leaderboards — filled using currentColor -->
            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <rect x="2.5" y="11" width="5" height="9" rx="1" />
              <rect x="9.5" y="7" width="5" height="13" rx="1" />
              <rect x="16.5" y="14" width="5" height="6" rx="1" />
              <path d="M12 3.5l1.176 2.383 2.63.382-1.903 1.855.45 2.626L12 10.8l-2.353 1.046.45-2.626L6.194 6.265l2.63-.382L12 3.5z"/>
            </svg>
            Leaderboards
          </a>
        </div>
      </div>
    </div>
  </header>

  <!-- Controls -->
  <div class="controls px-4 sm:px-6 lg:px-8 mb-4">
    <div class="card p-4">
      <form class="grid grid-cols-1 sm:grid-cols-3 gap-4 search-row" onsubmit="return false" aria-label="Filters">
        <!-- Name input -->
        <div class="control">
          <svg class="left-icon" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"/>
          </svg>
          <input id="search-name" class="input-pill" type="text" placeholder="Search student name..." aria-label="Search student name">
        </div>

        <!-- Student level select (left icon removed) -->
        <div class="control select-wrapper">
          <select id="student-level-select" class="select-pill" aria-label="Student level">
            <option value="all">All Student Levels</option>
            <option value="elementary">Elementary</option>
            <option value="juniorhigh">Junior High</option>
            <option value="seniorhigh">Senior High</option>
          </select>
          <svg class="chev" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.25a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd"/>
          </svg>
        </div>

        <!-- Test level select (left icon removed) -->
        <div class="control select-wrapper">
          <select id="test-level-select" class="select-pill" aria-label="Test level">
            <option value="all">All Test Levels</option>
            <option value="elementary">Elementary</option>
            <option value="juniorhigh">Junior High</option>
            <option value="seniorhigh">Senior High</option>
          </select>
          <svg class="chev" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.25a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z" clip-rule="evenodd"/>
          </svg>
        </div>
      </form>
    </div>
  </div>

  <!-- Records card -->
  <div class="card px-4 sm:px-6 lg:px-8">
    <div class="table-wrap">
      <table class="records" aria-label="Quiz records">
        <thead>
          <tr>
            <th style="width:16%">Date & Time</th>
            <th style="width:20%">Student's Name</th>
            <th style="width:12%" class="text-center">Student's Level</th>
            <th style="width:20%">Test Module</th>
            <th style="width:8%" class="text-center">Test Level</th>
            <th style="width:6%" class="text-center">Score</th>
            <th style="width:10%" class="text-center">Percent</th>
            <th style="width:8%" class="text-center">Status</th>
            <th style="width:8%" class="text-center">Highest</th>
          </tr>
        </thead>
        <tbody id="records-table-body">
          <tr id="no-records-message" class="empty hidden">
            <td colspan="9">
              <div style="max-width:520px;margin:0 auto">
                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-4" width="92" height="92" viewBox="0 0 24 24" fill="none" stroke="#cbd5e1" stroke-width="1.5"><path d="M12 2v6M6 7h12" stroke-linecap="round" stroke-linejoin="round"/><path d="M21 12v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-6" stroke-linecap="round" stroke-linejoin="round"/></svg>
                <div class="text-lg font-semibold" style="color:#0f172a">No quiz records yet</div>
                <div class="text-sm mt-2">Once students take quizzes, their latest attempts will appear here.</div>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <script>
    // Injected PHP values
    const USER_ID = "<?php echo addslashes($user_id); ?>";
    const USER_NAME = "<?php echo addslashes($user_name); ?>";
    const USER_RAW_LEVEL = document.body.dataset.userRawLevel || 'default';

    // Elements
    const searchNameInput = document.getElementById('search-name');
    const studentLevelSelect = document.getElementById('student-level-select');
    const testLevelSelect = document.getElementById('test-level-select');

    const recordsTableBody = document.getElementById('records-table-body');
    const noRecordsMessage = document.getElementById('no-records-message');
    const undoBackBtn = document.getElementById('undo-back-btn');

    // Storage keys
    const GLOBAL_RECORDS_KEY = 'allQuizRecords';
    const USER_PIC_KEY = `userProfilePic_${USER_ID || 'GUEST_ID'}`;

    // State
    let lastRecordsJson = '';
    let allLatestRecords = [];
    let highestRecordsMap = new Map();

    // Filter history for "undo" behavior
    let filterHistory = [];
    const FILTER_HISTORY_LIMIT = 20;
    let skipHistoryPush = false;

    const levelMap = {
      'elementary': 'Elementary',
      'juniorhigh': 'Junior High',
      'seniorhigh': 'Senior High',
      'admin': 'Administrator',
      'teacher': 'Teacher',
      'default': 'Unknown'
    };

    function getCurrentFilterState() {
      return {
        name: (searchNameInput.value || '').trim(),
        studentLevel: (studentLevelSelect.value || 'all'),
        testLevel: (testLevelSelect.value || 'all')
      };
    }

    function pushFilterHistory(state) {
      if (skipHistoryPush) return;
      // avoid pushing duplicate consecutive states
      const last = filterHistory.length ? filterHistory[filterHistory.length - 1] : null;
      if (!last || JSON.stringify(last) !== JSON.stringify(state)) {
        filterHistory.push(state);
        if (filterHistory.length > FILTER_HISTORY_LIMIT) filterHistory.shift();
      }
    }

    function applyFilterState(state) {
      skipHistoryPush = true;
      searchNameInput.value = state.name || '';
      studentLevelSelect.value = state.studentLevel || 'all';
      testLevelSelect.value = state.testLevel || 'all';
      // small timeout to allow DOM to update before filtering
      setTimeout(() => {
        filterRecords();
        skipHistoryPush = false;
      }, 0);
    }

    function parseRecordDateTime(record) {
      if (!record) return 0;
      if (record.dateTimeISO) {
        const t = Date.parse(record.dateTimeISO);
        if (!isNaN(t)) return t;
      }
      try {
        const d = `${record.date || ''} ${record.time || ''}`.trim();
        const t = Date.parse(d);
        if (!isNaN(t)) return t;
      } catch(e){}
      try {
        const t = Date.parse(record.date || '');
        if (!isNaN(t)) return t;
      } catch(e){}
      return 0;
    }

    function getUniqueScoreKey(record) {
      const userName = record.userName || 'UnknownUser';
      const quizName = record.name || 'UnnamedQuiz';
      const quizLevel = record.rawLevelId || record.level || 'UnknownLevel';
      const studentIdentifier = record.userId || `${userName}_${record.userLevel || ''}`;
      return `${studentIdentifier}_${quizName}_${quizLevel}`;
    }

    function buildHighestRecordsMap() {
      const map = new Map();
      try {
        const raw = localStorage.getItem(GLOBAL_RECORDS_KEY);
        const arr = raw ? JSON.parse(raw) : [];
        if (!Array.isArray(arr)) return map;
        arr.forEach(r => {
          const key = getUniqueScoreKey(r);
          const pct = Number(r.percentage) || 0;
          if (!map.has(key) || pct > (Number(map.get(key).percentage) || 0)) {
            map.set(key, r);
          }
        });
      } catch(e){ console.error(e); }
      return map;
    }

    function getLatestGlobalRecords() {
      try {
        const raw = localStorage.getItem(GLOBAL_RECORDS_KEY);
        const arr = raw ? JSON.parse(raw) : [];
        if (!Array.isArray(arr)) return [];
        arr.sort((a,b) => parseRecordDateTime(a) - parseRecordDateTime(b));
        const latestMap = new Map();
        arr.forEach(r => {
          latestMap.set(getUniqueScoreKey(r), r);
        });
        return Array.from(latestMap.values()).map(r => ({
          ...r,
          studentLevelDisplay: levelMap[r.userLevel] || (r.userLevel || 'N/A'),
          quizLevelDisplay: levelMap[r.rawLevelId] || r.level || 'N/A'
        }));
      } catch(e){
        console.error(e);
        return [];
      }
    }

    function renderRecords(records) {
      recordsTableBody.innerHTML = '';

      if (!records || records.length === 0) {
        noRecordsMessage.classList.remove('hidden');
        recordsTableBody.appendChild(noRecordsMessage);
        return;
      } else {
        noRecordsMessage.classList.add('hidden');
      }

      const frag = document.createDocumentFragment();

      records.forEach(record => {
        const tr = document.createElement('tr');

        let displayDate = 'N/A';
        if (record.dateTimeISO) {
          const d = new Date(record.dateTimeISO);
          if (!isNaN(d.getTime())) displayDate = `${d.toLocaleDateString()} ${d.toLocaleTimeString()}`;
        } else if (record.date || record.time) {
          displayDate = `${record.date || ''}${record.date && record.time ? ' ' : ''}${record.time || ''}`.trim();
        } else if (record.date) {
          displayDate = record.date;
        }

        const percent = Number(record.percentage);
        const pctSafe = isFinite(percent) ? Math.max(0, Math.min(100, percent)) : null;
        const uniqueKey = getUniqueScoreKey(record);
        const highest = highestRecordsMap.get(uniqueKey);
        const highestDisplay = highest && highest.score ? highest.score : 'N/A';

        // Determine pass/fail status: passing is 70% or greater
        let statusText = 'N/A';
        let statusClass = '';
        if (pctSafe !== null) {
          if (pctSafe >= 70) {
            statusText = 'Passed';
            statusClass = 'status-pass';
          } else {
            statusText = 'Failed';
            statusClass = 'status-fail';
          }
        }

        // Add senior-high class where appropriate (student level and quiz level)
        const studentLevelIsSenior = (record.studentLevelDisplay || '').toLowerCase() === 'senior high' || (record.studentLevelDisplay || '').toLowerCase() === 'senior';
        const quizLevelIsSenior = (record.quizLevelDisplay || '').toLowerCase() === 'senior high' || (record.quizLevelDisplay || '').toLowerCase() === 'senior';

        tr.innerHTML = `
          <td>${displayDate}</td>
          <td class="font-medium">${record.userName || 'N/A'}</td>
          <td class="text-center"><span class="pill-badge${studentLevelIsSenior ? ' senior-high' : ''}">${record.studentLevelDisplay || 'N/A'}</span></td>
          <td class="font-medium">${record.name || 'N/A'}</td>
          <td class="text-center"><span class="${quizLevelIsSenior ? 'senior-high-text' : ''}">${record.quizLevelDisplay || 'N/A'}</span></td>
          <td class="text-center">${record.score ?? 'N/A'}</td>
          <td>
            <div style="display:flex; align-items:center; gap:8px;">
              <div style="flex:1;">
                <div class="pct"><span style="width:${pctSafe !== null ? pctSafe + '%' : '0%'}"></span></div>
              </div>
              <div style="min-width:36px; text-align:right; font-weight:600; color:${(pctSafe >= 70) ? '#10b981' : '#ef4444'}">
                ${pctSafe !== null ? pctSafe + '%' : 'N/A'}
              </div>
            </div>
          </td>
          <td class="text-center">
            ${pctSafe !== null ? `<span class="${statusClass}">${statusText}</span>` : 'N/A'}
          </td>
          <td class="text-center font-semibold">${highestDisplay}</td>
        `;
        frag.appendChild(tr);
      });

      recordsTableBody.appendChild(frag);
    }

    let debounceTimer = null;
    function debounceFilter() {
      if (debounceTimer) clearTimeout(debounceTimer);
      debounceTimer = setTimeout(filterRecords, 180);
    }

    function filterRecords() {
      // Capture current filter state at the start and push to history (unless skipped)
      const currentState = getCurrentFilterState();
      pushFilterHistory(currentState);

      const name = (searchNameInput.value || '').toLowerCase().trim();
      const studentLevel = (studentLevelSelect.value || 'all').toLowerCase();
      const testLevel = (testLevelSelect.value || 'all').toLowerCase();

      let filtered = allLatestRecords.slice();

      if (name) {
        filtered = filtered.filter(r => (r.userName || '').toLowerCase().includes(name));
      }

      if (studentLevel && studentLevel !== 'all') {
        filtered = filtered.filter(r => {
          return ((r.userLevel || '').toLowerCase() === studentLevel) ||
                 ((r.studentLevelDisplay || '').toLowerCase() === studentLevel) ||
                 (String(r.userLevel || '').toLowerCase().includes(studentLevel));
        });
      }

      if (testLevel && testLevel !== 'all') {
        filtered = filtered.filter(r => {
          return ((r.rawLevelId || '').toLowerCase() === testLevel) ||
                 ((r.level || '').toLowerCase() === testLevel) ||
                 ((r.quizLevelDisplay || '').toLowerCase() === testLevel);
        });
      }

      filtered.sort((a,b) => parseRecordDateTime(b) - parseRecordDateTime(a));

      renderRecords(filtered);
    }

    function loadQuizRecords() {
      const raw = localStorage.getItem(GLOBAL_RECORDS_KEY);

      if (raw === lastRecordsJson) {
        filterRecords();
        return;
      }
      lastRecordsJson = raw;

      // build maps and records
      highestRecordsMap = buildHighestRecordsMap();
      allLatestRecords = getLatestGlobalRecords();

      filterRecords();
    }

    // Events
    searchNameInput.addEventListener('input', debounceFilter);
    studentLevelSelect.addEventListener('change', filterRecords);
    testLevelSelect.addEventListener('change', filterRecords);

    // Undo/back behavior:
    // - If there is a previous filter state in filterHistory, pop and apply it (undo a filter change).
    // - Otherwise fallback to browser history.back().
    undoBackBtn.addEventListener('click', (e) => {
      e.preventDefault();
      // Remove the current state (it's the one just applied) and pop a previous state
      if (filterHistory.length > 1) {
        // pop current
        filterHistory.pop();
        const prev = filterHistory.pop();
        if (prev) {
          applyFilterState(prev);
          return;
        }
      } else if (filterHistory.length === 1) {
        const prev = filterHistory.pop();
        if (prev) {
          applyFilterState(prev);
          return;
        }
      }
      // If no filter history to undo, do a browser back as a fallback "undo"
      if (window.history && window.history.length > 1) {
        window.history.back();
      } else {
        // no history to go back to; optionally provide a quick visual feedback
        undoBackBtn.animate([{ transform: 'translateX(0)' }, { transform: 'translateX(-6px)' }, { transform: 'translateX(0)' }], { duration: 220 });
      }
    });

    // Storage event for cross-tab updates
    window.addEventListener('storage', (e) => {
      if (e.key === GLOBAL_RECORDS_KEY) loadQuizRecords();
    });

    // Initial
    window.addEventListener('load', () => {
      // seed initial filter state so undo has something to revert to
      const initialState = getCurrentFilterState();
      pushFilterHistory(initialState);
      loadQuizRecords();
    });
  </script>
</body>
</html>
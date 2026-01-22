<?php
session_start();
// NOTE: The connection.php file is assumed to exist and set up $conn
// In this simulated environment, we skip the include for demonstration of the front-end structure.
// include 'connection.php';

// Check if the user is logged in, otherwise redirect them to the login page
if (!isset($_SESSION['user_id'])) {
    // In a real environment, you would use the PHP header redirect
    // header("Location: login.php");
    // exit();
    // For this environment, we'll mock the session data if not set
    $_SESSION['user_id'] = 'MOCK_USER';
    $_SESSION['user_level'] = 'elementary'; // Default mock level
    $_SESSION['user_name'] = 'Mock Student';
}

$user_id = $_SESSION['user_id'] ?? 'MOCK_USER'; // <-- Unique ID passed to JS
$user_level_raw = $_SESSION['user_level'] ?? 'elementary';
// 1. Prioritize name from session if available
$user_name = $_SESSION['user_name'] ?? "Logged-in User";
// 2. Profile picture logic mirrors records.php for consistency
$profile_pic = $_SESSION['profile_pic'] ?? 'https://placehold.co/100x100/3f3f46/ffffff?text=User';


$user_level_display = ""; // Initialize display level

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

// Define the module structure
$levels = [
    'elementary' => [
        'title' => 'Elementary School Modules',
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.25 4.975 7.5 5H4a2 2 0 00-2 2v10a2 2 0 002 2h4.5M12 6.253h6.5M12 6.253L18.5 5.5M12 6.253L5.5 5.5M18.5 5.5c1.196.257 2.158.85 2.85 1.706M18.5 5.5V19.5M18.5 19.5c-1.196-.257-2.158-.85-2.85-1.706M18.5 19.5L12 19.253M7.5 5v13m0-13C9.168 5.477 10.75 4.975 12 5m0-1v19"/></svg>',
        'module_groups' => [ // New structure to support labeled sections within one level
            [
                'label' => 'Lower Elementary LS3',
                'modules' => [
                    [ // Pagdaragdag at Pagbabawas (Module with sub-lessons)
                        'name' => 'Pagdaragdag at Pagbabawas',
                        'descriptions' => [
                            'Aralin 1 — Pagbasa at Pagsulat ng mga Bilang',
                            'Aralin 2 — Pagdaragdag',
                            'Aralin 3 — Pagbabawas',
                        ]
                    ],
                    [ // Pagpaparami at Paghahati 1 (Module with sub-lessons)
                        'name' => 'Pagpaparami at Paghahati 1',
                        'descriptions' => [
                            'Aralin 1 — Pagpaparami',
                            'Aralin 2 — Paghahati',
                        ]
                    ],
                    [ // Pagpaparami at Paghahati 2 (Module with sub-lessons)
                        'name' => 'Pagpaparami at Paghahati 2',
                        'descriptions' => [
                            'Aralin 1 — Pagpaparami ng Tatlong Tambilang',
                            'Aralin 2 — Paghahati ng Tatlong Tambilang',
                        ]
                    ]
                ]
            ],
            [
                'label' => 'Advance Elementary LS3',
                'modules' => [
                    // --- UPDATED MODULES WITH DESCRIPTIONS ---
                    [
                        'name' => 'Pagdaragdag at Pagbabawas sa Pang-araw-araw na Buhay',
                        'descriptions' => [
                            'Aralin 1—Ang Sistema ng Place-Value Numeration',
                            'Aralin 2—Ang Pagdaragdag sa Pang-araw-araw na Buhay',
                            'Aralin 3—Ang Pagbabawas sa Pang-araw-araw na Buhay',
                        ]
                    ],
                    [
                        'name' => 'Pagdaragdag at Pagbabawas ng mga Desimals',
                        'descriptions' => [
                            'Aralin 1—Ang mga Desimal',
                            'Aralin 2—Pagdaragdag ng mga Desimal',
                            'Aralin 3—Pagbabawas ng mga Desimal',
                        ]
                    ],
                    [
                        'name' => 'Pagdaragdag at Pagbabawas ng Praksiyon',
                        'descriptions' => [
                            'Aralin 1 — Pagdaragdag at Pagbabawas ng mga Magkatulad na Praksiyon',
                            'Aralin 2 — Pagdaragdag at Pagbabawas ng mga Di-Magkatulad na Praksiyon',
                            'Aralin 3 — Pagdaragdag at Pagbabawas ng mga Pinaghalong Bilang',
                        ]
                    ],
                    [
                        'name' => 'Ang Elektrisidad at ang mga Gamit Nito',
                        'descriptions' => [
                            'Aralin 1 — Ang Elektrisidad at mga Gamit Nito',
                            'Aralin 2 — Paano ka Makapagtitipid ng Kuryente',
                            'Aralin 3 — Kaligtasang Pang-elektrisidad',
                        ]
                    ],
                    [
                        'name' => 'Mga Heometrikong Hugis',
                        'descriptions' => [
                            'Aralin 1 – Iba\'t Ibang uri ng Linya',
                            'Aralin 2 – Congruence',
                        ]
                    ],
                    [
                        'name' => 'Ito’y Tungkol sa Oras',
                        'descriptions' => [
                            'Aralin 1 – Ilang Oras Pa?',
                            'Aralin 2 – Nasa Tamang Iskedyul',
                            'Aralin 3 – Pagbabasa ng Talaan ng Oras',
                        ]
                    ],
                    [
                        'name' => 'Pagkilala sa mga Praksiyon',
                        'descriptions' => [
                            'Aralin 1—Pagkilala sa mga Fraction',
                            'Aralin 2—Paghahambing ng mga Fraction',
                            'Aralin 3—Tamang Fraction, Hindi Tamang Fraction, at Pinaghalong Bilang',
                        ]
                    ],
                    [
                        'name' => 'Pagsukat ng Haba',
                        'descriptions' => [
                            'Aralin 1 – Metrikong Sistema ng Pagsukat',
                            'Aralin 2 – Ingles na Sistema ng Pagsukat',
                            'Aralin 3 – Ating Palitan ang mga Yunit',
                        ]
                    ],
                    [
                        'name' => 'Pagsukat ng Volume',
                        'descriptions' => [
                            'Aralin 1 — How Much?',
                            'Aralin 2 — Are They Equal?',
                            'Aralin 3 — Which Is the Better Buy?',
                        ]
                    ],
                    [
                        'name' => 'Pagsukat ng Timbang 1',
                        'descriptions' => [
                            'Aralin 1 – Off to the Market We Go',
                            'Aralin 2 – How Heavy Is Totoy?',
                        ]
                    ],
                    [
                        'name' => 'Pagpaparami at Paghahati sa Pang-araw araw na Buhay',
                        'descriptions' => [
                            'Aralin 1 – Pagpaparami ng mga Buong Bilang',
                            'Aralin 2 – Paghahati ng mga Buong Bilang',
                        ]
                    ],
                    [
                        'name' => 'Pagpaparami at Paghahati ng mga Desimals',
                        'descriptions' => [
                            'Aralin 1 –Multiplication of Decimals',
                            'Aralin 2 – Division of Desimals',
                        ]
                    ],
                    [
                        'name' => 'Mga Porsiyento at Peresentahe',
                        'descriptions' => [
                            'Aralin 1 – Ano ang Porsiyento?',
                            'Aralin 2 – Paglutas sa mga Suliraning Kaugnay sa Persentahe',
                        ]
                    ],
                    [
                        'name' => 'Panumbasan at Proporsiyon',
                        'descriptions' => [
                            'Aralin 1 – Pag-aaral tungkol sa Ratio',
                            'Aralin 2 – Pag-aaral tungkol sa Proportion',
                        ]
                    ],
                    [
                        'name' => 'Paglutas ng Pang-araw-araw na Suliranin',
                        'descriptions' => [
                            'Aralin 1 – Mayroon Ka bang mga Suliranin sa Buhay?',
                            'Aralin 2 – Paano Natin Lulutasin ang Ating mga Suliranin?',
                        ]
                    ],
                    [
                        'name' => 'Oras',
                        'descriptions' => [
                            'Aralin 1 — Pagbabasa at Pagtatala ng Oras',
                            'Aralin 2 — Pagkukuwenta ng Oras',
                            'Aralin 3 — Pag-uugnay ng Oras sa Distansiya, Bilis, at Dami ng Trabaho',
                        ]
                    ]
                ]
            ]
        ]
    ],
    'juniorhigh' => [
        'title' => 'Junior High School Modules',
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-2.414-2.414A1 1 0 0015.586 6H7a2 2 0 00-2 2v11a2 2 0 002 2z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15h2m-2 4h2m-6-4h.01M9 19h.01"/></svg>',
        'module_groups' => [ // Changed structure to support the label
            [
                'label' => 'Secondary Modules LS3',
                'modules' => [
                    // MODULES FOR JUNIOR HIGH (UPDATED)
                    [
                        'name' => 'Pag-unawa sa Estadistika',
                        'descriptions' => [
                            'Aralin 1—Paggamit ng Sukat ng Tendensiyang Sentral at Pagbabago-bago',
                            'Aralin 2—Paggamit ng Probabilidad',
                        ]
                    ],
                    [
                        'name' => 'Lawak',
                        'descriptions' => [
                            'Aralin 1 – Mga Yunit ng Lawak',
                            'Aralin 2 – Pantay na Pigura, Solido at mga Iregular na Pigura',
                        ]
                    ],
                    [
                        'name' => 'Matematikang Pangkalakal (Unang Bahagi)', // Kept the name as in original list, assuming this maps to Mat Pangkalakal 1
                        'descriptions' => [
                            'Aralin 1 — Pagtutuos ng Interes at Buwanang Hulog',
                            'Aralin 2 — Kombersiyon ng Pananalapi',
                            'Aralin 3 — Pagtutuos ng mga Buwis',
                        ]
                    ],
                    [
                        'name' => 'Matematikang Pangkalakal (Ikalawang Bahagi)', // Kept the name as in original list, assuming this maps to Mat Pangkalakal 2
                        'descriptions' => [
                            'Aralin 1 —Pagtutuos ng Tinubo at Pagkalugi',
                            'Aralin 2 —Paghahanda ng Balance Sheet at Pahayag ng Kita',
                            'Aralin 3 —Paghahanda ng Badyet at Pagtatantiya ng Pag-unlad sa Hinaharap',
                        ]
                    ],
                    [
                        'name' => 'Pagtantiya',
                        'descriptions' => [
                            'Aralin 1—Pagtantiya sa Pang-araw-araw na Pamumuhay',
                            'Aralin 2—Pagtantiya sa mga Kantidad',
                        ]
                    ],
                    [
                        'name' => 'Paano bumasa at Umintindi ng Metro at Bill sa Kuryente',
                        'descriptions' => [
                            'Aralin 1 – Paano Bumasa at Umintindi ng Metro ng Kuryente',
                            'Aralin 2 – Paano Bumasa at Umintindi ng Bill sa Kuryente',
                        ]
                    ],
                    [
                        'name' => 'Mga Linya at Anggulo',
                        'descriptions' => [
                            'Aralin 1 – Mga Linya at mga Intersection',
                            'Aralin 2 – Pagkilala sa mga Anggulo',
                            'Aralin 3 – Mahiwagang mga Kamay',
                            'Aralin 4 – Ang Kapangyarihan ng Pythagoras',
                        ]
                    ],
                    [
                        'name' => 'Mga Mapa at Iskala',
                        'descriptions' => [
                            'Aralin 1 — Mga Mapa',
                            'Aralin 2 — Mga Iskala',
                        ]
                    ],
                    [
                        'name' => 'Mass at Timbang',
                        'descriptions' => [
                            'Aralin 1 – Pagkukumpara sa Mass at Timbang',
                            'Aralin 2 – Mga Yunit ng Pagsukat sa Mass at Timbang',
                        ]
                    ],
                    [
                        'name' => 'Mean, Median, Mode, At Range',
                        'descriptions' => [
                            'Aralin 1—Mean',
                            'Aralin 2—Median',
                            'Aralin 3—Mode',
                            'Aralin 4—Range',
                        ]
                    ],
                    [
                        'name' => 'Measurement Perimeter and Circumference', // MODIFIED NAME
                        'descriptions' => [
                            'Aralin 1 – Linear Measurements',
                            'Aralin 2 – Finding the Perimeter',
                            'Aralin 3 – Finding the Circumference',
                        ]
                    ],
                    [
                        'name' => 'Measuring Weight', // Corresponds to the first Measuring Weight module
                        'descriptions' => [
                            'Aralin 1 – Off to the Market We Go',
                            'Aralin 2 – How Heavy Is Totoy?',
                        ]
                    ],
                    [
                        'name' => 'Measuring Weight 2', // Corresponds to the second Measuring Weight module
                        'descriptions' => [
                            'Aralin 1 – Different Units of Weight',
                            'Aralin 2 – Getting the Best Price',
                        ]
                    ],
                    [
                        'name' => 'Percentage, Ratio and Proportion',
                        'descriptions' => [
                            'Aralin 1 – Solving Percentage Problems',
                            'Aralin 2 – Solving Ratio and Proportion Problems',
                        ]
                    ],
                    [
                        'name' => 'Mga Positive at Negative Integers',
                        'descriptions' => [
                            'Aralin 1 – Plus o Minus',
                            'Aralin 2 – Addition at Subtraction ng Integers',
                            'Aralin 3 – Multiplication at Division ng Integers',
                            'Aralin 4 – Pag-aaral ng Integers',
                        ]
                    ],
                    [
                        'name' => 'Ang Wastong Paggamit ng Kuryente',
                        'descriptions' => [
                            'Aralin 1 – Ang Paggamit ng Elektrisidad',
                            'Aralin 2 – Mga Tamang Paraan upang Bawasan ang Paggamit ng Elektrisidad',
                            'Aralin 3 – Kaligtasan sa Paggamit ng Elektrisidad',
                        ]
                    ],
                    [
                        'name' => 'Statistics In Action',
                        'descriptions' => [
                            'Aralin 1– Sampling',
                            'Aralin 2– Sampling Techniques',
                            'Aralin 3– Conducting a Survey',
                        ]
                    ],
                    [
                        'name' => 'Ang Volume',
                        'descriptions' => [
                            'Aralin 1 – Gaano Karami?',
                            'Aralin 2 – Magkasingdami Ba?',
                            'Aralin 3 – Alin ang Mas Nararapat Mong Bilhin?',
                        ]
                    ],
                ]
            ],
            // GROUP UPDATED HERE with detailed descriptions
            [
                'label' => 'PDF LS3 Lessons',
                'modules' => [
                    [
                        'name' => 'MODULE 1: MEETING THE FAMILIES OF NUMBERS',
                        'descriptions' => [
                            'LESSON 1: Ready, Sets, Go',
                            'LESSON 2: Setting It Up',
                            'LESSON 3: Falling in Line',
                        ]
                    ],
                    [
                        'name' => 'MODULE 2: PLAYING WITH MISSING X’s',
                        'descriptions' => [
                            'LESSON 1: To Combine or Not to Combine',
                            'LESSON 2: Let\'s Distribute and Share',
                            'LESSON 3: Fractions of Your X',
                        ]
                    ],
                    [
                        'name' => 'MODULE 3: THIS IS WHERE WE DRAW THE LINE!',
                        'descriptions' => [
                            'LESSON 1: Make Relations Function',
                            'LESSON 2: Where are You Exactly?',
                            // Corrected 'Ste\ep' to 'Step'
                            'LESSON 3: Watch Your Step',
                        ]
                    ],
                    [
                        'name' => 'MODULE 4: RECOGNIZING SHAPES AND MEASUREMENT AROUND ME',
                        'descriptions' => [
                            'LESSON 1: The Foundation of Shapes & Figures',
                            'LESSON 2: How Open is It?',
                            'LESSON 3: Many Angles',
                        ]
                    ],
                    [
                        'name' => 'MODULE 5: HOW MUCH WILL IT GROW?',
                        'descriptions' => [
                            'LESSON 1: Summing It Up',
                            'LESSON 2: Multiply It Continuously!',
                            'LESSON 3: Applying Sequences & Series',
                        ]
                    ],
                    [
                        'name' => 'MODULE 6: SO THAT’S WHAT NORMAL IS!',
                        'descriptions' => [
                            'LESSON 1: Sorting Through the Numbers',
                            'LESSON 2: Where Is Normal?',
                            'LESSON 3: Let Me Show You',
                        ]
                    ],
                    [
                        'name' => 'MODULE 7: DESCRIBING THE WORLD THROUGH NUMBERS AND DATA',
                        'descriptions' => [
                            'LESSON 1: Excuse Me, May I Ask You a Question?',
                            'LESSON 2: Let’s Organize This',
                            'LESSON 3: So, What Do You Mean?',
                        ]
                    ],
                ]
            ]
        ]
    ],
    'seniorhigh' => [
        'title' => 'Senior High School Modules',
        'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M12 20.244a8.156 8.156 0 01-6.155-2.492M12 20.244a8.156 8.156 0 006.155-2.492M12 20.244v-4.475m0 0v-2.261M12 13.51V11"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11l-4 4m0 0l-4-4"/></svg>',
        'module_groups' => [
             [
                'label' => 'Senior High Courses',
                'modules' => [
                    // --- MODULES FOR SENIOR HIGH WITH DESCRIPTIONS ---
                    [
                        'name' => 'Applied Economics',
                        'descriptions' => [
                            'Household Economics',
                            'Business Economics',
                            'National Economics',
                            'International Economics',
                        ]
                    ],
                    [
                        'name' => 'General Mathematics',
                        'descriptions' => [
                            'Functions',
                            'Equations',
                        ]
                    ],
                    [
                        'name' => 'Inquiries, Investigation, and Immersion',
                        'descriptions' => [
                            'Legal Basis and Work Ethics',
                            'Safety and Confidentiality',
                            'Rights and Responsibilities',
                            'Rules and Regulations',
                        ]
                    ],
                    [
                        'name' => 'Practical Research 1',
                        'descriptions' => [
                            'Qualitative',
                            'Quantitative',
                            'Analysis',
                        ]
                    ],
                    [
                        'name' => 'Statistics and Probability',
                        'descriptions' => [
                            'Random Variable',
                            'Probability Distribution',
                            'Sampling',
                        ]
                    ]
                ]
            ]
        ]
    ]
];
// Define link map for Elementary modules
$elementary_module_links = [
    'Pagdaragdag at Pagbabawas' => 'Pagdaragdag at Pagbabawas/module.php',
    'Pagpaparami at Paghahati 1' => 'Pagpaparami at Paghahati 1/module.php',
    'Pagpaparami at Paghahati 2' => 'Pagpaparami at Paghahati 2/module.php',
    'Pagdaragdag at Pagbabawas sa Pang-araw-araw na Buhay' => 'Pagdaragdag at Pagbabawas sa Pang-araw-araw na Buhay/module.php',
    'Pagdaragdag at Pagbabawas ng mga Desimals' => 'Pagdaragdag at Pagbabawas ng mga Desimals/module.php',
    'Pagdaragdag at Pagbabawas ng Praksiyon' => 'Pagdaragdag at Pagbabawas ng Praksiyon/module.php',
    'Ang Elektrisidad at ang mga Gamit Nito' => 'Ang Elektrisidad at ang mga Gamit Nito/module.php',
    'Mga Heometrikong Hugis' => 'Mga Heometrikong Hugis/module.php',
    'Ito’y Tungkol sa Oras' => 'Ito’y Tungkol sa Oras/module.php',
    'Pagkilala sa mga Praksiyon' => 'Pagkilala sa mga Praksiyon/module.php',
    'Pagsukat ng Haba' => 'Pagsukat ng Haba/module.php',
    'Pagsukat ng Volume' => 'Pagsukat ng Volume/module.php',
    'Pagsukat ng Timbang 1' => 'Pagsukat ng Timbang 1/module.php',
    'Pagpaparami at Paghahati sa Pang-araw araw na Buhay' => 'Pagpaparami at Paghahati sa Pang-araw araw na Buhay/module.php',
    'Pagpaparami at Paghahati ng mga Desimals' => 'Pagpaparami at Paghahati ng mga Desimals/module.php',
    'Mga Porsiyento at Peresentahe' => 'Mga Porsiyento at Peresentahe/module.php',
    'Panumbasan at Proporsiyon' => 'Panumbasan at Proporsiyon/module.php',
    'Paglutas ng Pang-araw-araw na Suliranin' => 'Paglutas ng Pang-araw-araw na Suliranin/module.php',
    'Oras' => 'Oras/module.php',
];

// Define link map for Junior High modules
$junior_module_links = [
    'Pag-unawa sa Estadistika' => 'Pag-unawa sa Estadistika/module.php',
    'Lawak' => 'Lawak/module.php',
    // Special cases: Display name uses (Unang Bahagi/Ikalawang Bahagi) but the path uses 1/2
    'Matematikang Pangkalakal (Unang Bahagi)' => 'Matematikang Pangkalakal 1/module.php',
    'Matematikang Pangkalakal (Ikalawang Bahagi)' => 'Matematikang Pangkalakal 2/module.php',
    'Pagtantiya' => 'Pagtantiya/module.php',
    'Paano bumasa at Umintindi ng Metro at Bill sa Kuryente' => 'Paano bumasa at Umintindi ng Metro at Bill sa Kuryente/module.php',
    'Mga Linya at Anggulo' => 'Mga Linya at Anggulo/module.php',
    'Mga Mapa at Iskala' => 'Mga Mapa at Iskala/module.php',
    'Mass at Timbang' => 'Mass at Timbang/module.php',
    'Mean, Median, Mode, At Range' => 'Mean, Median, Mode, At Range/module.php',
    'Measurement Perimeter and Circumference' => 'Measurement Perimeter and Circumference/module.php',
    'Measuring Weight' => 'Measuring Weight/module.php',
    'Measuring Weight 2' => 'Measuring Weight 2/module.php',
    'Percentage, Ratio and Proportion' => 'Percentage, Ratio and Proportion/module.php',
    'Mga Positive at Negative Integers' => 'Mga Positive at Negative Integers/module.php',
    'Ang Wastong Paggamit ng Kuryente' => 'Ang Wastong Paggamit ng Kuryente/module.php',
    'Statistics In Action' => 'Statistics In Action/module.php',
    'Ang Volume' => 'Ang Volume/module.php',
    // PDF LS3 Lessons - ADDED module.php
    'MODULE 1: MEETING THE FAMILIES OF NUMBERS' => 'MEETING THE FAMILIES OF NUMBERS/module.php',
    'MODULE 2: PLAYING WITH MISSING X’s' => 'PLAYING WITH MISSING X’s/module.php',
    'MODULE 3: THIS IS WHERE WE DRAW THE LINE!' => 'THIS IS WHERE WE DRAW THE LINE!/module.php',
    'MODULE 4: RECOGNIZING SHAPES AND MEASUREMENT AROUND ME' => 'RECOGNIZING SHAPES AND MEASUREMENT AROUND ME/module.php',
    'MODULE 5: HOW MUCH WILL IT GROW?' => 'HOW MUCH WILL IT GROW/module.php', // UPDATED: Removed trailing '?'
    'MODULE 6: SO THAT’S WHAT NORMAL IS!' => 'SO THAT’S WHAT NORMAL IS!/module.php',
    'MODULE 7: DESCRIBING THE WORLD THROUGH NUMBERS AND DATA' => 'DESCRIBING THE WORLD THROUGH NUMBERS AND DATA/module.php',
];

// Define link map for Senior High modules
$senior_module_links = [
    'Applied Economics' => 'Applied Economics/module.php',
    'General Mathematics' => 'General Mathematics/module.php',
    'Inquiries, Investigation, and Immersion' => 'Inquiries, Investigation, and Immersion/module.php',
    'Practical Research 1' => 'Practical Research 1/module.php',
    'Statistics and Probability' => 'Statistics and Probability/module.php',
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learning Modules</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        /* Shared Styles from Dashboard */
        body {
            /* Now using Poppins to match records.php */
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f5; /* light background for main content */
            scroll-behavior: smooth;
        }
        /* Custom scrollbar for aesthetics */
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
        /* Custom styling for clickable profile pic */
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
            transform: scale(1.05); /* Slight zoom on hover */
        }
        .profile-pic-overlay svg {
            color: white;
        }
        @media (min-width: 1024px) {
            .main-content {
                margin-left: 16rem; /* ml-64 for large screens */
            }
        }

        /* Modules Specific Styles */
        .module-card {
            transition: all 0.3s ease;
        }
        /* UPDATED: Thinner green outline (2px instead of 3px) and enhanced shadow on hover */
        .module-card:hover {
            transform: translateY(-3px);
            box-shadow:
                0 0 0 2px #34d399, /* Thin green outline/ring (Reduced from 3px) */
                0 15px 30px -5px rgba(0, 0, 0, 0.25); /* Stronger lift shadow */
        }
        /* Style the summary tag to hide the default browser disclosure triangle */
        details > summary {
            list-style: none;
        }
        details > summary::-webkit-details-marker {
            display: none;
        }

        /* Styling for accordion effect */

        .level-summary {
            background-color: #ffffff; /* White background for closed summaries */
            border-left: 8px solid #e5e7eb; /* Default gray border for closed summaries */
        }

        /* Style for the user's actual level (always highlighted) */
        .highlighted-level-summary {
            border-left: 8px solid #10b981; /* Tailwind green-600 */
            background-color: #f0fdf4 !important; /* Tailwind green-50, force overwrite */
        }

        /* Style applied when any details tag (that isn't the user's level) is open/active */
        details[open]:not(.user-level-details) > summary {
            border-left: 8px solid #34d399; /* Tailwind green-400 (a lighter glow) */
            background-color: #f0fdf4; /* Tailwind green-50 */
        }

        details[open] > summary .details-arrow {
            transform: rotate(180deg);
        }

    </style>
</head>
<body data-user-id="<?php echo $user_id; ?>"> <!-- Pass PHP user ID to JavaScript -->
    <!-- Hidden input and overlay are included for profile functionality and mobile menu -->
    <input type="file" id="profile-upload-input" accept="image/*" class="hidden">
    <div id="mobile-menu-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden lg:hidden" onclick="toggleSidebar()"></div>

    <!-- SIDEBAR START -->
    <aside id="sidebar" class="fixed top-0 left-0 w-64 h-full bg-neutral-800 text-white flex flex-col z-50 transition-transform duration-300 transform -translate-x-full lg:translate-x-0 custom-scroll overflow-y-auto">

        <div class="p-6 border-b border-neutral-700 flex flex-col items-center">

            <div id="profile-pic-trigger" class="profile-pic-container w-24 h-24 mb-3 rounded-full ring-2 ring-emerald-500 overflow-hidden relative group" title="Upload Profile Picture">
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
            <!-- Mobile close button -->
            <button class="lg:hidden text-white p-2 rounded-lg hover:bg-neutral-700 w-full text-left" onclick="toggleSidebar()">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                Close Menu
            </button>

            <!-- Navigation Links (Placeholder links to demonstrate structure) -->
            <a href="home.php" class="flex items-center p-3 rounded-xl hover:bg-neutral-700 transition duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" /></svg>
                Home
            </a>

            <a href="records.php" class="flex items-center p-3 rounded-xl hover:bg-neutral-700 transition duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm7 2a1 1 0 100 2 1 1 0 000-2zm-2 0a1 1 0 100 2 1 1 0 000-2zm-3 0a1 1 0 100 2 1 1 0 000-2zm7 4a1 1 0 100 2 1 1 0 000-2zm-2 0a1 1 0 100 2 1 1 0 000-2zm-3 0a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd" /></svg>
                Records
            </a>

            <a href="http://localhost/als/front/leaderboard.php" class="flex items-center p-3 rounded-xl hover:bg-neutral-700 transition duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" /></svg>
                Leaderboard
            </a>

            <a href="modules.php" class="flex items-center p-3 rounded-xl bg-neutral-700 text-emerald-400 transition duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 5h-2v1h2V8zm-4 0h-2v1h2V8zm-6 0H4v1h2V8z" clip-rule="evenodd" /></svg>
                Modules
            </a>

            <!-- Videos Link -->
            <a href="videos.php" class="flex items-center p-3 rounded-xl hover:bg-neutral-700 transition duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                </svg>
                Videos
            </a>

            <a href="test.php" class="flex items-center p-3 rounded-xl hover:bg-neutral-700 transition duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor"><path d="M10 2a1 1 0 00-1 1v1a1 1 0 002 0V3a1 1 0 00-1-1zm4.035 3.125a1 1 0 00-.707.293L12.01 6.707a1 1 0 001.414 1.414l1.318-1.318a1 1 0 00-.707-1.707zM17 10a1 1 0 00-1 1v1a1 1 0 002 0v-1a1 1 0 00-1-1zm-4.035 4.875a1 1 0 001.414 1.414l1.318-1.318a1 1 0 00-1.414-1.414l-1.318 1.318zM10 16a1 1 0 00-1 1v1a1 1 0 102 0v-1a1 1 0 00-1-1zM5.965 14.875a1 1 0 00-1.414-1.414l-1.318 1.318a1 1 0 101.414 1.414l1.318-1.318zM3 11a1 1 0 00-1 1v1a1 1 0 102 0v-1a1 1 0 00-1-1zM6.707 6.707a1 1 0 00-1.414-1.414L3.975 6.51a1 1 0 101.414 1.414l1.318-1.318z"/></svg>
                Test
            </a>

            <a href="about.php" class="flex items-center p-3 rounded-xl hover:bg-neutral-700 transition duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" /></svg>
                About
            </a>

            <a href="services.php" class="flex items-center p-3 rounded-xl hover:bg-neutral-700 transition duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.3-.874-2.886.67-2.01 1.968a1.54 1.54 0 01-.582 2.247c-1.638.111-1.638 2.31 0 2.421a1.54 1.54 0 01.582 2.247c-.876 1.298.614 2.84 1.914 1.968a1.532 1.532 0 012.286.948c.38 1.56 2.6 1.56 2.98 0a1.532 1.532 0 012.286-.948c1.3.874 2.886-.67 2.01-1.968a1.54 1.54 0 01.582-2.247c1.638-.111 1.638-2.31 0-2.421a1.54 1.54 0 01-.582-2.247c.876-1.298-.614-2.84-1.914-1.968a1.532 1.532 0 01-2.286-.948zM10 11a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" /></svg>
                Services
            </a>

            <a href="contact.php" class="flex items-center p-3 rounded-xl hover:bg-neutral-700 transition duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/></svg>
                Contact
            </a>
        </nav>

        <div class="p-6 text-xs text-neutral-400 mt-auto border-t border-neutral-700">
            <p>Copyright &copy; 2025 All rights reserved</p>
        </div>
    </aside>
    <!-- SIDEBAR END -->

    <div id="main-container" class="flex-1 main-content min-h-screen">

        <header class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-30">
            <!-- Header width is also max-w-full to match the content area -->
            <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">

                <!-- Mobile menu button -->
                <button class="lg:hidden text-gray-500 hover:text-gray-700" onclick="toggleSidebar()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>

                <h1 class="text-2xl font-bold text-gray-800 lg:ml-0">Learning Modules</h1>
            </div>
        </header>

        <!-- MODIFIED: Changed max-w-7xl to max-w-full and increased horizontal padding to px-8 / lg:px-12 for margin -->
        <main class="max-w-full mx-auto px-4 sm:px-6 lg:px-12 py-12">

            <div class="text-center mb-10">
                <h2 class="text-4xl font-extrabold text-gray-900">Explore Curriculum by Level</h2>
                <p class="mt-3 text-xl text-gray-500">Select your academic level to access relevant learning materials.</p>
                <?php if ($user_level_raw): ?>
                    <p class="mt-4 p-2 inline-block bg-green-100 text-green-800 rounded-full font-semibold text-sm shadow-inner">
                        <span class="font-bold">Your Current Level:</span> <?php echo ucfirst($user_level_raw); ?>
                    </p>
                <?php endif; ?>
            </div>

            <!-- Modules Accordion -->
            <div class="space-y-4">
                <?php foreach ($levels as $key => $level):
                    // Determine if this is the user's current level
                    $is_user_level = ($key === $user_level_raw);
                ?>
                    <details id="<?php echo $key; ?>" class="rounded-xl shadow-lg overflow-hidden <?php echo $is_user_level ? 'user-level-details' : ''; ?>" <?php echo $is_user_level ? 'open' : ''; ?>>

                        <summary class="p-6 sm:p-8 flex items-center justify-between cursor-pointer transition duration-150 ease-in-out level-summary
                            <?php echo $is_user_level ? 'highlighted-level-summary' : ''; ?>">
                            <div class="flex items-center">
                                <?php echo $level['icon']; ?>
                                <h3 class="ml-4 text-2xl font-bold text-gray-800"><?php echo $level['title']; ?></h3>

                                <?php if ($is_user_level): ?>
                                    <span class="ml-4 px-3 py-1 bg-green-600 text-white text-xs font-bold rounded-full">YOUR LEVEL</span>
                                <?php endif; ?>
                            </div>
                            <svg class="h-6 w-6 text-gray-600 transform details-arrow transition-transform duration-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </summary>

                        <div class="p-6 sm:p-8 bg-white border-t border-gray-100">

                            <?php if (isset($level['module_groups'])): ?>
                                <?php $group_index = 0; // Initialize counter for spacing ?>
                                <?php foreach ($level['module_groups'] as $group): ?>

                                    <p class="text-xl font-bold text-gray-900 mb-6 border-b-2 border-green-600 pb-2 inline-block <?php echo ($group_index === 0) ? 'mt-0' : 'mt-8'; ?>">
                                        <?php echo htmlspecialchars($group['label']); ?>
                                    </p>

                                    <!-- REVERTED: Changed grid back to original responsive multi-column layout (1 column on mobile, 2 on medium, 3 on large screens) -->
                                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                                        <?php foreach ($group['modules'] as $module_data):
                                            // Extract data
                                            $module_name = is_array($module_data) ? $module_data['name'] : $module_data;
                                            $module_descriptions = is_array($module_data) && isset($module_data['descriptions']) ? $module_data['descriptions'] : [];

                                            $module_href = '#'; // Default fallback
                                            $module_links_map = [];

                                            // Select the correct link map based on the level key
                                            if ($key === 'elementary') {
                                                $module_links_map = $elementary_module_links;
                                                $base_url = 'http://localhost/als/front/elementary/';
                                            } else if ($key === 'juniorhigh') {
                                                $module_links_map = $junior_module_links;
                                                $base_url = 'http://localhost/als/front/junior/';
                                            } else if ($key === 'seniorhigh') {
                                                $module_links_map = $senior_module_links;
                                                $base_url = 'http://localhost/als/front/senior/';
                                            }

                                            // Determine the specific link for the module
                                            if (isset($module_links_map[$module_name])) {
                                                $module_path = $module_links_map[$module_name];
                                                // Construct the full URL and ensure spaces are encoded as %20
                                                $module_href = $base_url . str_replace(' ', '%20', $module_path);
                                            }
                                        ?>
                                            <div class="module-card bg-white p-5 border border-gray-200 rounded-lg flex flex-col justify-between shadow-sm">
                                                <div>
                                                    <!-- Module Name: 20px -->
                                                    <h4 class="text-lg font-semibold text-gray-800 mb-3 text-[20px]"><?php echo htmlspecialchars($module_name); ?></h4>

                                                    <?php if (!empty($module_descriptions)): ?>
                                                        <!-- MODIFIED: Changed space-y-2 to space-y-3 for better vertical spacing between lessons -->
                                                        <ul class="space-y-3 mb-4 list-none pl-0">
                                                            <?php foreach ($module_descriptions as $desc): ?>
                                                                <!-- CHANGED: Lesson Description to text-[16px] (16px) -->
                                                                <li class="text-gray-600 text-[16px] before:content-['•'] before:mr-2 before:text-green-500"><?php echo htmlspecialchars($desc); ?></li>
                                                            <?php endforeach; ?>
                                                        </ul>
                                                    <?php endif; ?>
                                                </div>

                                                <!-- Button is full width -->
                                                <a href="<?php echo $module_href; ?>" class="mt-auto w-full flex justify-center items-center px-4 py-2 text-sm font-medium rounded-lg text-white bg-green-600 hover:bg-green-700 transition duration-150 shadow-md hover:shadow-lg">
                                                    Start Module
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                                                </a>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php $group_index++; ?>
                                <?php endforeach; ?>

                            <?php else: ?>
                                <p class="text-lg text-gray-500 italic">No modules defined for this level yet.</p>
                            <?php endif; ?>

                        </div>
                    </details>
                <?php endforeach; ?>
            </div>

            <div class="mt-12 text-center pt-8 border-t border-gray-200">
                <p class="text-gray-500">Ready to test your knowledge? Head back to the <a href="records.php" class="text-green-600 font-semibold hover:text-green-800">Dashboard</a>.</p>
            </div>

        </main>
    </div>

    <script>
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('mobile-menu-overlay');
        const profilePicTrigger = document.getElementById('profile-pic-trigger');
        const profileUploadInput = document.getElementById('profile-upload-input');
        const currentProfilePic = document.getElementById('current-profile-pic');

        // --- USER-SPECIFIC STORAGE CONFIGURATION ---
        const userId = document.body.dataset.userId || 'MOCK_USER';
        const USER_PIC_KEY = `userProfilePic_${userId}`;
        // --------------------------------------------------


        // Function to toggle the sidebar for mobile views
        function toggleSidebar() {
            if (sidebar.classList.contains('-translate-x-full')) {
                // Open sidebar
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
                document.body.style.overflow = 'hidden'; // Prevent scrolling background
            } else {
                // Close sidebar
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
                document.body.style.overflow = ''; // Restore scrolling
            }
        }

        // --- PROFILE UPLOAD HANDLERS ---

        // 1. Trigger the hidden file input when the profile picture div is clicked
        profilePicTrigger.addEventListener('click', () => {
            profileUploadInput.click();
        });

        // 2. Handle file selection
        profileUploadInput.addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (!file) return;

            if (!file.type.startsWith('image/')) {
                console.error('Paki-pili lang po ang image file.');
                return;
            }
            if (file.size > 5 * 1024 * 1024) { // 5MB limit
                console.error('Masyadong malaki ang file. Paki-pili po ang file na 5MB pababa.');
                return;
            }

            // Show temporary local preview while uploading (Base64 URL)
            const reader = new FileReader();
            reader.onload = function(e) {
                currentProfilePic.src = e.target.result;
                // Save the temporary local URL to the user-specific localStorage key immediately
                localStorage.setItem(USER_PIC_KEY, e.target.result);
            };
            reader.readAsDataURL(file);

            // Set loading state
            const originalOverlayContent = profilePicTrigger.querySelector('.profile-pic-overlay').innerHTML;
            profilePicTrigger.querySelector('.profile-pic-overlay').innerHTML = `<span class="text-sm font-bold animate-pulse">Uploading...</span>`;

            // --- AJAX UPLOAD TO SERVER ENDPOINT (SIMULATED) ---
            const formData = new FormData();
            formData.append('profile_image', file);

            // NOTE: This fetch call is simulated/mocked in this environment.
            // A real environment would use an actual API endpoint.
            new Promise(resolve => setTimeout(resolve, 1500)) // Simulate network delay
                .then(() => {
                    // Mock success response
                    return { success: true, new_url: localStorage.getItem(USER_PIC_KEY) };
                })
                .then(data => {
                    profilePicTrigger.querySelector('.profile-pic-overlay').innerHTML = originalOverlayContent;

                    if (data.success && data.new_url) {
                        // Set the permanently saved URL (from mock server response)
                        currentProfilePic.src = data.new_url;
                        // Update localStorage with the permanent server URL
                        localStorage.setItem(USER_PIC_KEY, data.new_url);
                        console.log('Matagumpay na na-upload at na-save ang bagong profile picture!');
                    } else {
                        console.error('Error sa server: ' + (data.message || 'Hindi na-save ang file.'));
                        // Revert to the locally stored URL or original placeholder on server failure
                        const storedUrl = localStorage.getItem(USER_PIC_KEY);
                        currentProfilePic.src = storedUrl || '<?php echo $profile_pic; ?>';
                    }
                })
                .catch(error => {
                    profilePicTrigger.querySelector('.profile-pic-overlay').innerHTML = originalOverlayContent;
                    console.error('Nagkaroon ng error sa pag-upload. Pakisubukan muli.', error);
                    // Revert to the locally stored URL or original placeholder on network/fetch failure
                    const storedUrl = localStorage.getItem(USER_PIC_KEY);
                    currentProfilePic.src = storedUrl || '<?php echo $profile_pic; ?>';
                });
            // --- END AJAX ---

            // Clear the file input
            event.target.value = '';
        });

        // --- PROFILE PIC PERSISTENCE ---
        function loadProfilePic() {
            // Use the user-specific key for loading the profile picture
            const storedProfilePic = localStorage.getItem(USER_PIC_KEY);
            if (storedProfilePic) {
                currentProfilePic.src = storedProfilePic;
            }
        }

        // Custom JavaScript for the dropdown arrow rotation (for non-user-level items)
        document.querySelectorAll('details').forEach(detail => {
            // Apply the initial rotation check
            const updateArrow = () => {
                const arrow = detail.querySelector('.details-arrow');
                if (arrow) {
                    // The CSS handles the rotation if the 'open' attribute is present.
                }
            };

            // Event listener for when the details state changes
            detail.addEventListener('toggle', updateArrow);

            // Run on initial load to set the correct state for the default 'open' item
            updateArrow();
        });

        window.onload = loadProfilePic;
    </script>
</body>
</html>
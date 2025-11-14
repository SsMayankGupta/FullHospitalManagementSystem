<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="shortcut icon" href="{{ asset('icons8-home-page-60.gif') }}" type="image/x-icon">

    <title>
        {{ env('APP_NAME') }} General Discussion Dashboard
    </title>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">

    <style>
        * {
            font-family: "Montserrat", sans-serif;
            font-optical-sizing: auto;
            font-weight: 400;
            font-style: normal;
        }

        .animate-wiggle {
            animation: imganimate 1s linear 2;
            transform-origin: center;
        }

        @keyframes imganimate {
            0% {
                transform: rotate(20deg);
            }

            50% {
                transform: rotate(-20deg);
            }

            100% {
                transform: rotate(0deg);
            }
        }

        .cinzel {
            font-family: 'Cinzel', serif;
        }

        .rubik {
            font-family: "Rubik", sans-serif;
            font-optical-sizing: auto;
            font-weight: normal;
            font-style: normal;
            letter-spacing: 1.1px;
        }
    </style>

    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>

    <div>

        <!-- Sidebar: fixed overlay on mobile, static on md+ -->
        <aside id="sidebar"
            class="fixed top-0 bottom-0 left-0 border border-r bg-white z-40 w-[220px] h-screen transform -translate-x-full md:relative md:translate-x-0 transition-transform duration-300 ease-in-out">
            <div class="flex items-center justify-center h-16">
                <span class=" font-bold uppercase">General Discussion</span>
            </div>

            <nav class="flex-1 px-2 py-4 overflow-y-auto space-y-2">
                <button data-box="box1"
                    class="block w-full text-left px-4 py-2 rounded hover:bg-blue-600 hover:text-white focus:bg-blue-300 font-semibold">
                    About & Privacy
                </button>
                <button data-box="box2"
                    class="block w-full text-left px-4 py-2 rounded hover:bg-blue-600 hover:text-white focus:bg-blue-300 font-semibold">
                    Staff Login
                </button>
                <button data-box="box3"
                    class="block w-full text-left px-4 py-2 rounded hover:bg-blue-600 hover:text-white focus:bg-blue-300 font-semibold">
                    Permit General Appointments
                </button>
                <button data-box="box4"
                    class="block w-full text-left px-4 py-2 rounded hover:bg-blue-600 hover:text-white focus:bg-blue-300 font-semibold">
                    Cancel General Appointments
                </button>
                <button data-box="box5"
                    class="block w-full text-left px-4 py-2 rounded hover:bg-blue-600 hover:text-white focus:bg-blue-300 font-semibold">
                    Chat & Select
                </button>
                <button data-box="box6"
                    class="block w-full text-left px-4 py-2 rounded hover:bg-blue-600 hover:text-white focus:bg-blue-300 font-semibold">
                    Chat & Select
                </button>
            </nav>
        </aside>

        <!-- Backdrop for mobile sidebar -->
        <div id="backdrop" class="fixed inset-0 z-30 hidden md:hidden"></div>

        <!-- Main content -->
        <main class="fixed top-0 bottom-0 md:ml-[220px] flex flex-col flex-1 overflow-y-auto">

            <header
                class="flex items-center justify-between h-16 bg-white border-b border-gray-300 px-8 py-4 md:hidden">
                <button id="sidebarToggle" class="text-gray-700 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <h1 class="text-lg font-bold text-gray-700">General Discussion Dashboard</h1>
                <div></div>
            </header>

            <section class="p-6">

                <!-- Box 1: About & Privacy -->
                <div id="box1" class="bg-white p-5">
                    <h2 class="text-2xl font-bold mb-6 text-blue-600 border-b-2 border-blue-300 pb-2">
                        About & Privacy
                    </h2>
                    <p class="text-gray-700 mb-4 leading-relaxed">
                        Welcome to the General Discussion Dashboard, a secure platform designed to facilitate seamless
                        communication, appointment booking, and problem-solving discussions.
                    </p>
                    <p class="text-gray-700 mb-4 leading-relaxed">
                        We empower users to actively participate in meaningful discussions while ensuring all data is
                        handled with utmost privacy and confidentiality.
                    </p>
                    <h3 class="text-xl font-semibold mb-2 text-blue-500">
                        Key Features:
                    </h3>
                    <ul class="list-disc list-inside text-gray-700 mb-4 space-y-1">
                        <li>Easy appointment scheduling for general discussions.</li>
                        <li>Collaborative solutions and knowledge sharing.</li>
                        <li>Adaptive discussion topics tailored to user needs.</li>
                        <li>Robust privacy controls safeguarding user information.</li>
                    </ul>
                    <h3 class="text-xl font-semibold mb-2 text-blue-500">
                        Privacy Commitment:
                    </h3>
                    <p class="text-gray-700 mb-4 leading-relaxed">
                        We adhere to strict data protection standards, ensuring personal and sensitive data is encrypted
                        and only accessible to authorized personnel. Your trust and privacy are our top priorities.
                    </p>
                    <h3 class="text-xl font-semibold mb-2 text-blue-500">
                        User Responsibilities:
                    </h3>
                    <p class="text-gray-700 leading-relaxed">
                        Users are encouraged to engage respectfully, keep their login credentials confidential, and
                        promptly report any suspicious activity to maintain the security and integrity of the platform.
                    </p>
                </div>


                <!-- Box 2: Staff Login -->
                <div id="box2" class="bg-white p-4">
                    @livewire('general_discussion_team_login')
                </div>

                <!-- Box 3: Patient Info -->
                <div id="box3" class="bg-white rounded p-4 hidden">
                    @if (session()->exists('general_dis_dashboard_login'))
                        @livewire('general_discussion_team_newUpdates')
                    @else
                        @livewire('login_error_show')
                    @endif
                </div>

                <!-- Box 4: Chat & Select -->
                <div id="box4" class="bg-white rounded">
                    @if (session()->exists('general_dis_dashboard_login'))
                        @livewire('general_dis_team_cancel_request')
                    @else
                        @livewire('login_error_show')
                    @endif
                </div>

                <div id="box5">
                    @if (session()->exists('general_dis_dashboard_login'))
                        @livewire('general_dis_chat_team_2')
                    @endif
                </div>
            </section>

        </main>

    </div>

    <script>
        // Sidebar toggle on mobile
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('sidebar');
        const backdrop = document.getElementById('backdrop');

        function openSidebar() {
            sidebar.classList.remove('-translate-x-full');
            backdrop.classList.remove('hidden');
            document.body.style.overflow = 'hidden'; // prevent background scroll
        }

        function closeSidebar() {
            sidebar.classList.add('-translate-x-full');
            backdrop.classList.add('hidden');
            document.body.style.overflow = ''; // re-enable scroll
        }

        sidebarToggle.addEventListener('click', () => {
            if (sidebar.classList.contains('-translate-x-full')) {
                openSidebar();
            } else {
                closeSidebar();
            }
        });

        backdrop.addEventListener('click', closeSidebar);

        // Reset sidebar on resize
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768) {
                sidebar.classList.remove('-translate-x-full');
                backdrop.classList.add('hidden');
                document.body.style.overflow = '';
            } else {
                sidebar.classList.add('-translate-x-full');
            }
        });

        // Box toggle logic
        const buttons = document.querySelectorAll('aside button[data-box]');
        const boxes = document.querySelectorAll('section > div[id^="box"]');

        buttons.forEach(button => {
            button.addEventListener('click', () => {
                const targetBox = button.getAttribute('data-box');
                boxes.forEach(box => {
                    if (box.id === targetBox) {
                        box.classList.remove('hidden');
                    } else {
                        box.classList.add('hidden');
                    }
                });
                // Close sidebar on mobile after selection
                if (window.innerWidth < 768) {
                    closeSidebar();
                }
            });
        });

        // Show first box by default
        boxes.forEach((box, index) => {
            if (index === 0) box.classList.remove('hidden');
            else box.classList.add('hidden');
        });
    </script>

    @livewireScripts

</body>

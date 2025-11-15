<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="shortcut icon" href="<?php echo e(asset('icons8-home-page-60.gif')); ?>" type="image/x-icon">

    <title>
        <?php echo e(env('APP_NAME')); ?>

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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle dropdown visibility by ID on hover or click
            window.toggleDropdown = function(id) {
                const el = document.getElementById(id);
                if (el) {
                    if (el.classList.contains('hidden')) {
                        el.classList.remove('hidden');
                    } else {
                        el.classList.add('hidden');
                    }
                }
            };

            // Toggle sidebar submenu in mobile sidebar
            window.SideBarMobile = function(id) {
                const el = document.getElementById(id);
                if (el) {
                    if (el.classList.contains('hidden')) {
                        el.classList.remove('hidden');
                    } else {
                        el.classList.add('hidden');
                    }
                }
            };

            // Mobile sidebar open/close
            const menuBtn = document.getElementById('menuBtn');
            const sidebarOverlay = document.getElementById('sidebarOverlay');
            const sidebarDrawer = document.getElementById('sidebarDrawer');
            const closeSidebarBtn = document.getElementById('closeSidebar');

            if (menuBtn && sidebarOverlay && sidebarDrawer) {
                menuBtn.addEventListener('click', function() {
                    sidebarDrawer.classList.remove('-translate-x-full');
                    sidebarOverlay.classList.remove('hidden');
                });

                closeSidebarBtn.addEventListener('click', function() {
                    sidebarDrawer.classList.add('-translate-x-full');
                    sidebarOverlay.classList.add('hidden');
                });

                sidebarOverlay.addEventListener('click', function() {
                    sidebarDrawer.classList.add('-translate-x-full');
                    sidebarOverlay.classList.add('hidden');
                });
            }
        });
    </script>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

</head>

<body>

    <!-- Responsive Navbar with Sidebar Drawer (Tailwind + JS) -->
    <nav class="bg-white px-4 py-2 mt-3">

        <div class="container mx-auto flex items-center justify-between">
            <!-- Logo -->
            <a href="/" class="flex items-center">
                
            </a>

            <!-- Desktop Nav -->
            <ul class="hidden md:flex gap-8 items-center">

                <li class="relative group">
                    <button onmouseover="toggleDropdown('appointmentsList')"
                        class="flex items-center gap-1 font-semibold text-gray-700 hover:text-blue-600 focus:outline-none">
                        Appointments
                        <svg width="20" height="20" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-width="2" d="M7 10l5 5 5-5" />
                        </svg>
                    </button>
                    <ul id="appointmentsList"
                        class="hidden absolute left-0 mt-2 w-80 bg-black text-white rounded-lg shadow-lg z-50">
                        <li class="px-4 py-2 hover:bg-gray-800 cursor-pointer">
                            General Discussion – Talk about ongoing cases, share updates, or discuss general health
                            topics.
                        </li>
                        <li class="px-4 py-2 hover:bg-gray-800 cursor-pointer">
                            New Appointment – Schedule a fresh consultation or register a new patient visit.
                        </li>
                        <li class="px-4 py-2 hover:bg-gray-800 cursor-pointer">
                            Follow Up – Continue care for an existing patient or review progress after a previous visit.
                        </li>
                        <li class="px-4 py-2 hover:bg-gray-800 cursor-pointer">
                            Emergency – Immediate medical attention required for urgent or critical situations.
                        </li>

                    </ul>
                </li>

                <li>
                    <button type="button" class="font-semibold text-gray-700 hover:text-blue-600"
                        onmouseover="toggleDropdown('personization')">Personalisation</button>

                </li>

                <li>
                    <button type="button" onclick="toggleDropdown('aboutus')"
                        class="font-semibold text-gray-700 hover:text-blue-600">
                        About Us
                    </button>
                </li>

                <li class="relative group">
                    <button onclick="toggleDropdown('logindesktop')"
                        class="flex items-center gap-1 font-semibold text-gray-700 hover:text-blue-600 focus:outline-none">
                        Stuff Login
                        <svg width="20" height="20" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-width="2" d="M7 10l5 5 5-5" />
                        </svg>
                    </button>
                    <ul id="logindesktop"
                        class="hidden absolute left-0 mt-2 w-40 bg-black text-white rounded-lg shadow-lg z-50">
                        <li class="px-4 py-2 hover:bg-gray-800 cursor-pointer">Doctor Login</li>
                        <li class="px-4 py-2 hover:bg-gray-800 cursor-pointer">Working Stuff</li>
                    </ul>
                </li>

                <li class="relative">
                    <button
                        class="flex items-center gap-1 font-semibold text-gray-700 hover:text-blue-600 focus:outline-none">
                        Your Dashboard
                        <svg width="20" height="20" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-width="2" d="M7 10l5 5 5-5" />
                        </svg>
                    </button>

                    <ul id="dashboard"
                        class="hidden absolute left-0 mt-2 w-40 bg-black text-white rounded-lg shadow-lg transition-all z-50">
                        <li class="px-4 py-2 hover:bg-gray-800 cursor-pointer"> To continue, please log in or
                            Book Appointment your organization.</li>
                    </ul>
                </li>

                

            </ul>

            <!-- Desktop Right Side -->
            <div class="hidden md:flex items-center gap-6">

                <?php if(session()->has('organization_data')): ?>
                    
                <?php else: ?>
                    <button onclick="function_box_show('3')"
                        class="cursor-pointer flex items-center gap-2 text-gray-700 hover:text-blue-600">
                        <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <circle cx="12" cy="8" r="4" />
                            <path d="M6 20v-2a6 6 0 0112 0v2" />
                        </svg>
                        Appointment Login
                    </button>
                <?php endif; ?>

            </div>

            <!-- Mobile Hamburger -->
            <button id="menuBtn"
                class="md:hidden flex items-center p-2 rounded hover:bg-blue-100 focus:outline-none focus:ring-2 focus:ring-blue-300"
                aria-label="Open navigation">
                <svg class="w-7 h-7 text-gray-700" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        <!-- Mobile Sidebar Overlay & Drawer -->
        <div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden"></div>
        <aside id="sidebarDrawer"
            class="fixed top-0 left-0 h-full w-64 bg-white shadow-lg z-50 transform -translate-x-full transition-transform duration-300">
            <div class="flex items-center justify-between px-4 py-3 border-b">

                
                <button id="closeSidebar" class="p-2 rounded hover:bg-blue-100 focus:outline-none"
                    aria-label="Close navigation">
                    <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

            </div>

            <nav class="px-4 py-4">
                <ul class="flex flex-col gap-4">

                    <li>
                        <button onclick="SideBarMobile('sidebarBox1')"
                            class="w-full flex justify-between items-center font-semibold text-gray-700 hover:text-blue-600 focus:outline-none">
                            Appointments
                            <svg width="20" height="20" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-width="2" d="M7 10l5 5 5-5" />
                            </svg>
                        </button>

                        <ul id="sidebarBox1" class="hidden flex flex-col gap-2 mt-2 pl-4">
                            <li class="py-1 hover:text-blue-600 cursor-pointer">General Discussion</li>
                            <li class="py-1 hover:text-blue-600 cursor-pointer">New Appointment</li>
                            <li class="py-1 hover:text-blue-600 cursor-pointer">Follow Up</li>
                            <li class="py-1 hover:text-blue-600 cursor-pointer">Emergency</li>
                        </ul>
                    </li>

                    <li>
                        <button onclick="SideBarMobile('sidebarBox2')"
                            class="w-full flex justify-between items-center font-semibold text-gray-700 hover:text-blue-600 focus:outline-none">
                            Personalisation
                        </button>
                    </li>

                    <li>
                        <a href="#" class="font-semibold text-gray-700 hover:text-blue-600">Corporate Orders</a>
                    </li>

                    <li>
                        <button onclick="SideBarMobile('sidebarBox3')"
                            class="w-full flex justify-between items-center font-semibold text-gray-700 hover:text-blue-600 focus:outline-none">
                            Gifting Store
                            <svg width="20" height="20" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-width="2" d="M7 10l5 5 5-5" />
                            </svg>
                        </button>
                        <ul id="sidebarBox3" class="hidden flex flex-col gap-2 mt-2 pl-4">
                            <li class="py-1 hover:text-blue-600 cursor-pointer">Gift 1</li>
                            <li class="py-1 hover:text-blue-600 cursor-pointer">Gift 2</li>
                        </ul>
                    </li>

                    <li>
                        <button onclick="SideBarMobile('sidebarBox4')"
                            class="w-full flex justify-between items-center font-semibold text-gray-700 hover:text-blue-600 focus:outline-none">
                            More
                            <svg width="20" height="20" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-width="2" d="M7 10l5 5 5-5" />
                            </svg>
                        </button>
                        <ul id="sidebarBox4" class="hidden flex flex-col gap-2 mt-2 pl-4">
                            <li class="py-1 hover:text-blue-600 cursor-pointer">About</li>
                            <li class="py-1 hover:text-blue-600 cursor-pointer">Contact</li>
                        </ul>
                    </li>

                    <li>
                        <button
                            class="w-full flex justify-start items-center gap-2 font-semibold text-gray-700 hover:text-blue-600 focus:outline-none">
                            <svg width="20" height="20" stroke="currentColor" fill="none"
                                stroke-width="2" viewBox="0 0 24 24">
                                <circle cx="12" cy="8" r="4" />
                                <path d="M6 20v-2a6 6 0 0112 0v2" />
                            </svg>
                            Login
                        </button>
                    </li>

                    <li>
                        <div class="relative w-full mt-2">
                            <input type="text" placeholder="Search"
                                class="w-full bg-blue-100 rounded-xl py-2 pl-10 pr-4 focus:outline-none" />
                            <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <circle cx="11" cy="11" r="8" stroke="currentColor" stroke-width="2"
                                    fill="none" />
                                <line x1="21" y1="21" x2="16.65" y2="16.65"
                                    stroke="currentColor" stroke-width="2" />
                            </svg>
                        </div>
                    </li>

                    <li>
                        
                    </li>

                </ul>
            </nav>

        </aside>
    </nav>

    <div>

        <div id="personization"
            class="hidden mx-auto p-6 bg-white rounded-lg shadow border border-blue-500 transition-transform transform scale-100">
            <h2 class="text-2xl font-bold text-blue-600 mb-4">Personalization Settings</h2>
            <p class="text-gray-800 leading-relaxed mb-4">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti, corporis delectus praesentium
                sapiente quis alias mollitia consectetur repudiandae reprehenderit sint dolorum eos inventore non sed
                eaque perferendis explicabo debitis recusandae aperiam quidem iure labore sunt corrupti?
            </p>
            <ul class="list-disc list-inside text-gray-700 space-y-1">
                <li>Porro quia rem dolores esse?</li>
                <li>Veritatis, iure sit rerum dignissimos laboriosam.</li>
                <li>Blanditiis iusto illo quaerat nulla placeat facilis.</li>
                <li>Quidem aspernatur voluptatum enim corrupti odit aliquid magni.</li>
                <li>Cumque aspernatur voluptatum eveniet nobis aliquam.</li>
                <li>Quia unde porro provident doloremque nulla sequi.</li>
                <li>Vero, neque omnis suscipit dolor sint accusamus labore.</li>
                <li>Minima quaerat quam dolorem provident ut fugiat.</li>
                <li>Eligendi ratione.</li>
            </ul>
        </div>

        <div id="aboutus"
            class="hidden mx-auto p-8 bg-green-50 rounded shadow border border-green-300 transition-transform transform scale-100">
            <h2 class="text-3xl font-extrabold text-green-700 mb-6">About Us</h2>
            <p class="text-green-900 leading-relaxed mb-6 text-lg">
                At <span class="font-semibold">HealthFirst</span>, we are committed to providing compassionate and
                personalized healthcare solutions that put your well-being first. Our dedicated team of experts works
                tirelessly to offer innovative, accessible, and trustworthy health services.
            </p>

            <h3 class="text-xl font-semibold text-green-700 mb-4">Our Mission</h3>
            <p class="text-green-800 mb-6">
                To empower individuals through comprehensive health guidance and cutting-edge technology, ensuring a
                healthier future for all.
            </p>

            <div class="flex flex-column justify-around">
                <div>
                    <h3 class="text-xl font-semibold text-green-700 mb-4">What We Offer</h3>
                    <ul class="list-disc list-inside text-green-800 space-y-2 mb-6">
                        <li>Expert medical consultations and health advice</li>
                        <li>24/7 patient support and emergency assistance</li>
                        <li>User-friendly health tracking and management tools</li>
                        <li>Secure and private health data management</li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-xl font-semibold text-green-700 mb-4">Our Values</h3>
                    <ul class="list-disc list-inside text-green-800 space-y-1">
                        <li>Integrity and transparency in all we do</li>
                        <li>Compassionate care for every individual</li>
                        <li>Innovation driven by evidence-based medicine</li>
                        <li>Accessibility and inclusiveness for diverse communities</li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="hidden w-full p-6 bg-blue-400 border border-1" id="sidebarBox2">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti, corporis delectus praesentium
            sapiente quis alias mollitia consectetur repudiandae reprehenderit sint dolorum eos inventore
            non sed eaque perferendis explicabo debitis recusandae aperiam quidem iure labore sunt corrupti?
            Porro quia rem dolores esse? Veritatis, iure sit rerum dignissimos laboriosam a blanditiis iusto
            illo quaerat nulla placeat facilis est vel esse, quidem aspernatur voluptatum enim corrupti odit
            aliquid magni. Cumque, aspernatur voluptatum eveniet nobis aliquam quia unde porro provident
            doloremque nulla sequi, vero, neque omnis suscipit dolor sint accusamus labore quidem vel saepe!
            Minima quaerat quam dolorem provident ut fugiat molestiae eligendi ratione.
        </div>
    </div>

    <div class="bg-gradient-to-b from-white to-slate-50 py-24 px-6 sm:px-10 lg:px-20 text-center font-sans">
        <!-- Cinzel Font -->
        <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&display=swap" rel="stylesheet">
        <style>
            .cinzel {
                font-family: 'Cinzel', serif;
            }
        </style>

        <div class="max-w-5xl mx-auto">
            <!-- Tagline -->

            <p class="text-lg text-slate-600 tracking-tight mb-4">
                Welcome to <span class="border-b border-dotted border-slate-400"><?php echo e(env('APP_NAME')); ?></span>
            </p>

            <!-- Headline -->
            <h1 class="cinzel text-4xl sm:text-5xl lg:text-6xl font-semibold text-slate-900 leading-tight">
                Your <span class="text-blue-600 relative inline-block">
                    <span class="z-10 relative">Personal</span>
                    <span class="absolute inset-x-0 bottom-1 h-2 bg-blue-300/50 -z-10 rounded-md"></span>
                </span> Health Care
            </h1>

            <!-- Subheadline -->
            <p class="mt-6 text-lg text-slate-700 max-w-2xl mx-auto">
                Integrate powerful tools into your Notion workspace and streamline your sustainability workflows.
            </p>

            <!-- CTA Buttons -->
            <div class="mt-10 flex flex-row flex-wrap justify-center gap-4">
                <a href="/register"
                    class="inline-block rounded-full bg-blue-600 text-white text-sm font-semibold px-8 py-3 shadow-md hover:bg-blue-500 focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-blue-600 transition duration-300 transform hover:scale-105">
                    Get Started
                </a>

                <a href="/login"
                    class="inline-block rounded-full border border-slate-300 text-slate-700 text-sm font-semibold px-8 py-3 shadow-sm hover:border-slate-400 hover:text-slate-900 transition duration-300 transform hover:scale-105">
                    Login
                </a>
            </div>
        </div>
    </div>

    <!-- Responsive Life Cycle Analysis Section for LCA Software -->
    <div class="box box1 container mx-auto flex flex-col md:flex-row items-center gap-8 py-10 px-4">
        <!-- Image Section -->
        <div class="md:w-1/2 w-full flex justify-center mb-6 md:mb-0">
            <img src="<?php echo e(asset('portelImages/8264c48a8f26eada143f5fdd67f81c36.jpg')); ?>"
                alt="Life Cycle Analysis Illustration" class="max-w-full h-auto rounded animate-wiggle object-cover">
        </div>

        <!-- Text Section -->
        <div class="md:w-1/2 w-full">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Life Cycle Analysis (LCA) in Software</h2>
            <p class="text-gray-700 mb-4">
                Life Cycle Analysis (LCA) is a systematic approach used to assess the environmental impacts associated
                with every stage of a product’s life, from raw material extraction through production, use, and
                end-of-life disposal or recycling. In the context of LCA software, this process helps organizations and
                researchers understand and quantify the ecological footprint of products, systems, or processes.
            </p>
            <h3 class="text-xl font-semibold text-gray-700 mb-2">Key Stages in the LCA Process:</h3>
            <ul class="list-disc pl-5 text-gray-700 space-y-2 mb-4">
                <li>
                    <strong>1. Goal and Scope Definition:</strong> Clearly outline the purpose of the analysis, the
                    product system to be studied, and the boundaries of the study.
                </li>
                <li>
                    <strong>2. Inventory Analysis (LCI):</strong> Collect data regarding energy, materials, and
                    emissions for each process involved throughout the life cycle.
                </li>
                <li>
                    <strong>3. Impact Assessment (LCIA):</strong> Evaluate the potential environmental impacts based on
                    the inventory data, such as global warming potential, resource depletion, and toxicity.
                </li>
                <li>
                    <strong>4. Interpretation:</strong> Analyze results, identify significant issues, and recommend
                    improvements to minimize negative environmental impacts.
                </li>
            </ul>
            <p class="text-gray-700">
                LCA software simplifies data collection, modeling, and reporting, enabling users to make informed
                decisions that promote sustainability. By visualizing the environmental impact across each life cycle
                stage, organizations can optimize processes, reduce resource consumption, and lower emissions.
            </p>
        </div>
    </div>

</body>

</html>
<?php /**PATH D:\healthclient\client1.1\resources\views/indexPage/index.blade.php ENDPATH**/ ?>
<div>
    <div>

        @session('general_discussion_data')
            <div class="p-6 mx-auto my-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">General Discussion Details</h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-gray-700">
                    <div>
                        <span class="font-semibold">Patient ID:</span>
                        <span>{{ session('general_discussion_data.general_dis_patient_id') }}</span>
                    </div>
                    <div>
                        <span class="font-semibold">Name:</span>
                        <span>{{ session('general_discussion_data.general_dis_patient_name') }}</span>
                    </div>
                    <div>
                        <span class="font-semibold">Email:</span>
                        <span>{{ session('general_discussion_data.general_dis_patient_email') }}</span>
                    </div>
                    <div>
                        <span class="font-semibold">Phone:</span>
                        <span>{{ session('general_discussion_data.general_dis_patient_phone') }}</span>
                    </div>
                    <div>
                        <span class="font-semibold">Gender:</span>
                        <span>{{ session('general_discussion_data.general_dis_patient_gender') }}</span>
                    </div>
                    <div>
                        <span class="font-semibold">Pregnancy Status:</span>
                        <span>{{ session('general_discussion_data.general_dis_patient_preganency_status') }}</span>
                    </div>
                    <div>
                        <span class="font-semibold">Age Status:</span>
                        <span>{{ session('general_discussion_data.general_dis_patient_age_status') }}</span>
                    </div>
                    <div>
                        <span class="font-semibold">Request Done By Team:</span>
                        <span>{{ session('general_discussion_data.general_dis_patient_team_status') == true ? 'Done' : 'Not Done' }}</span>
                    </div>
                    <div>
                        <button id="buttonnMessagefromTeam" wire:click="sessionDataUpdateForPatient"
                            class="cursor-pointer text-red" wire:loading.remove
                            wire:target="sessionDataUpdateForPatient">Click Me latest Update</button>
                        <div wire:loading wire:target="sessionDataUpdateForPatient">please wait.......</div>
                    </div>
                    <div class="md:col-span-3">
                        <span class="font-semibold">Problem Statement:</span>
                        <p class="mt-1 text-blue-600">{{ session('general_discussion_data.general_dis_patient_problem') }}
                        </p>
                    </div>
                    <div class="md:col-span-3">
                        <span class="font-semibold">Submitted At:</span>
                        <span>{{ session('general_discussion_data.created_at') }}</span>
                    </div>
                </div>

                <button id="cancelrequest"
                    onclick="document.getElementById('cancelRequestsConfirmation').classList.remove('hidden');document.getElementById('cancelrequest').classList.add('hidden')"
                    class="mt-6 cursor-pointer bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                    Cancel Request
                </button>

                <div id="cancelRequestsConfirmation" class="hidden flex flex-row gap-4">
                    <button wire:click="submitDataforget"
                        class="mt-6 cursor-pointer bg-red-500 text-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                        Cancel Request
                    </button>
                    <button
                        onclick="document.getElementById('cancelRequestsConfirmation').classList.add('hidden');document.getElementById('cancelrequest').classList.remove('hidden')"
                        class="mt-6 cursor-pointer bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                        Dismise
                    </button>
                </div>

                <!-- Bottom Right Floating Button -->
                {{-- <button id="showMessageBtn"
                    style="position: fixed;bottom: 20px;right: 20px;padding: 12px 18px;background-color: #3490dc;color: white;border: none;border-radius: 6px;cursor: pointer;box-shadow: 0 4px 8px rgba(0,0,0,0.2);z-index: 1000;">
                    Show Message
                </button> --}}

                <!-- Message Box -->
                {{-- <div id="messageBox"
                    style="position: fixed;bottom: 70px;right: 20px;max-width: 300px;background: #f8fafc;border: 1px solid #ddd;padding: 16px 20px;border-radius: 8px;box-shadow: 0 8px 16px rgba(0,0,0,0.2);display: none;z-index: 1001;font-family: Arial, sans-serif;margin-bottom: 10px;">
                    <span id="randomMessage">General discussion Request is done.</span>
                    <button id="closeMessageBtn"
                        style="float: right;background: none;border: none;font-size: 16px;cursor: pointer;color: #555;">&times;</button>
                </div>

                <script>
                    const messages = [
                        "Welcome to our site!",
                        "Don't forget to check our latest updates.",
                        "Have a great day!",
                        "Your tasks are due tomorrow.",
                        "New features coming soon!"
                    ];

                    const showMessageBtn = document.getElementById('showMessageBtn');
                    const messageBox = document.getElementById('messageBox');
                    const randomMessage = document.getElementById('randomMessage');
                    const closeMessageBtn = document.getElementById('closeMessageBtn');

                    showMessageBtn.addEventListener('click', () => {
                        // Pick a random message
                        const index = Math.floor(Math.random() * messages.length);
                        randomMessage.textContent = messages[index];

                        // Show the message box
                        messageBox.style.display = 'block';
                    });

                    closeMessageBtn.addEventListener('click', () => {
                        messageBox.style.display = 'none';
                    });
                </script> --}}

            </div>


            <script>
                window.addEventListener('load', () => {
                    window.Echo.channel('general_dis_team_confirmation_'
                            .{{ session('general_discussion_data.general_dis_patient_id') }})
                        .listen('general_dis_accepted_by_team', (e) => {
                            console.log("Event is detected");

                            document.getElementById('buttonnMessagefromTeam').click();
                        });
                });
            </script>

            {{-- <script>
                document.addEventListener("DOMContentLoaded", function() {
                    // Mobile menu toggle button
                    const menuToggleBtn = document.querySelector('button[data-collapse-toggle="navbar-dropdown"]');
                    const navbarDropdown = document.getElementById("navbar-dropdown");

                    menuToggleBtn.addEventListener("click", function() {
                        const isExpanded = menuToggleBtn.getAttribute("aria-expanded") === "true";
                        menuToggleBtn.setAttribute("aria-expanded", !isExpanded);
                        navbarDropdown.classList.toggle("hidden");
                    });

                    // Dropdown toggle for "Appointments"
                    const dropdownToggleBtn = document.getElementById("dropdownNavbarLink");
                    const dropdownMenu = document.getElementById("dropdownNavbar");

                    dropdownToggleBtn.addEventListener("click", function() {
                        dropdownMenu.classList.toggle("hidden");
                    });

                    // Optional: Close dropdown when clicking outside
                    document.addEventListener("click", function(event) {
                        if (!dropdownToggleBtn.contains(event.target) && !dropdownMenu.contains(event.target)) {
                            dropdownMenu.classList.add("hidden");
                        }
                    });
                });
            </script> --}}
        @endsession

        @unsetsession('general_discussion_data')
            <form wire:submit.prevent="submitForm" class="mx-auto p-4 bg-white rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-gray-700 font-semibold mb-1">Name</label>
                        <input type="text" id="name" wire:model.defer="name" wire:change="NameValidation"
                            value="{{ old('name') }}"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
                        @error('name')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-gray-700 font-semibold mb-1">Email</label>
                        <input type="email" id="email" wire:model.defer="email" wire:change="EmailValidation"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
                        @error('email')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Phone Number -->
                    <div>
                        <label for="phone" class="block text-gray-700 font-semibold mb-1">Phone Number</label>
                        <input type="tel" id="phone" wire:model.defer="phone" wire:change="PhoneValidation"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
                        @error('phone')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}.This is {{ strlen($phone) }} digit
                                number
                            </p>
                        @enderror
                    </div>

                    <!-- Gender -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-1">Gender</label>
                        <select wire:model.defer="gender" wire:change="GenderValidation"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                        @error('gender')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Pregnancy Status -->
                    @if (isset($gender) && $gender == 'female')
                        <div>
                            <label class="block text-gray-700 font-semibold mb-1">Pregnancy Status</label>
                            <select wire:model.defer="pregnancy_status"
                                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                                <option value="">Select Pregnancy Status</option>
                                <option value="not_pregnant">Not Pregnant</option>
                                <option value="pregnant">Pregnant</option>
                                <option value="prefer_not_to_say">Prefer not to say</option>
                            </select>
                            @error('pregnancy_status')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    @endif

                    <!-- Age Status -->
                    <div>
                        <label class="block text-gray-700 font-semibold mb-1">Age Status</label>
                        <select wire:model.defer="age_status" wire:change="AgeStatusValidation"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                            <option value="">Select Age Group</option>
                            <option value="under_18">Under 18</option>
                            <option value="18_30">18-30</option>
                            <option value="31_50">31-50</option>
                            <option value="above_50">Above 50</option>
                        </select>
                        @error('age_status')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="problem_statement" class="block text-gray-700 font-semibold mb-1">Problem
                            Statement</label>
                        <textarea id="problem_statement" wire:model.defer="problem_statement" wire:change="ProblemValidation" rows="2"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 resize-none"
                            placeholder="Describe your problem or concerns here..."></textarea>
                        @error('problem_statement')
                            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <!-- Submit Button -->
                <div class="mt-6">
                    <button type="submit"
                        class="w-[180px] bg-blue-600 text-white py-3 rounded font-semibold hover:bg-blue-700 transition">
                        Submit
                    </button>

                    <div wire:loading wire:target="{{ $target ?? '' }}" class="loading-spinner">
                        Please wait......
                    </div>

                    <style>
                        .loading-spinner {
                            font-weight: bold;
                            color: #3490dc;
                            /* Add spinner styles or animation if you like */
                        }
                    </style>

                </div>
            </form>
        @endunsetsession

    </div>
</div>

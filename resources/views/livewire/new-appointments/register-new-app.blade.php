<div>
    <div class="mb-6 bg-white text-[15px] p-4">
        <h2 class="text-lg font-bold mb-2">Appointment Registration — Field Guide</h2>
        <ul class="list-disc pl-5 space-y-1">
            <li><strong>Name:</strong> Your full legal name for identification and records.</li>
            <li><strong>Phone:</strong> Reachable contact number used for confirmations or urgent updates.</li>
            <li><strong>Email:</strong> Official email for electronic receipts and communications.</li>
            <li><strong>Address:</strong> Your current home or mailing address (for correspondence).</li>
            <li><strong>Problem Statement:</strong> Please briefly describe your reason for the appointment.</li>
            <li><strong>Appointment Date:</strong> The date you wish to meet or consult.</li>
            <li><strong>Appointment Time:</strong> Your preferred time slot for the appointment.</li>
            <li><strong>Preferred Contact Method:</strong> Choose how you'd prefer to be contacted (phone or email).
            </li>
            <li><strong>Additional Notes:</strong> Any extra details, requests, or information relevant to your
                appointment.</li>
        </ul>
    </div>

    @unsetsession('NewAppointmentData')
        <div class="w-full mx-auto py-6 px-2 md:px-6">
            <!-- Error Box -->
            @if ($errors->any())
                <div class="mb-4 p-4 border border-red-500 bg-red-100 text-red-700 rounded">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session()->has('success'))
                <div class="mb-4 p-4 border border-green-500 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <form wire:submit.prevent="submit" class="w-full">

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 w-full">
                    <!-- Name -->
                    <div class="flex flex-col w-full">
                        <label for="name" class="block mb-1">Enter Name</label>
                        <input type="text" wire:model.lazy="name" id="name" placeholder="Enter your name"
                            class="border border-gray-400 rounded focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 px-3 py-2 w-full"
                            autofocus>
                    </div>

                    <!-- Phone -->
                    <div class="flex flex-col w-full">
                        <label for="phone" class="block mb-1">Enter Phone</label>
                        <input type="tel" wire:model.lazy="phone" id="phone" placeholder="Enter your phone number"
                            wire:change="submitPhone"
                            class="border border-gray-400 rounded focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 px-3 py-2 w-full">
                    </div>

                    <!-- Email -->
                    <div class="flex flex-col w-full">
                        <label for="email" class="block mb-1">Enter Email</label>
                        <input type="email" wire:model.lazy="email" id="email" placeholder="Enter your email"
                            class="border border-gray-400 rounded focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 px-3 py-2 w-full">
                    </div>

                    <!-- Address -->
                    <div class="flex flex-col w-full">
                        <label for="address" class="block mb-1">Enter Address</label>
                        <input type="text" wire:model.lazy="address" id="address" placeholder="Enter your address"
                            class="border border-gray-400 rounded focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 px-3 py-2 w-full">
                    </div>

                    <!-- Problem Statement -->
                    <div class="flex flex-col w-full md:col-span-2">
                        <label for="problem_statement" class="block mb-1">Enter Problem
                            Statement</label>
                        <textarea wire:model.lazy="problem_statement" id="problem_statement" rows="4"
                            placeholder="Enter your health problem in details"
                            class="border border-gray-400 rounded focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 px-3 py-2 w-full"></textarea>
                    </div>

                    <!-- Date -->
                    <div class="flex flex-col w-full">
                        <label for="appointment_date" class="block mb-1">Select Appointment
                            Date</label>
                        <input type="date" wire:model.lazy="appointment_date" id="appointment_date"
                            class="border border-gray-400 rounded focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 px-3 py-2 w-full">
                    </div>

                    <!-- Time -->
                    <div class="flex flex-col w-full">
                        <label for="appointment_time" class="block mb-1">Select Appointment
                            Time</label>
                        <input type="time" wire:model.lazy="appointment_time" id="appointment_time"
                            class="border border-gray-400 rounded focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 px-3 py-2 w-full">
                    </div>

                    <!-- Preferred Contact (Suggested Field) -->
                    <div class="flex flex-col w-full">
                        <label for="preferred_contact" class="block mb-1">Select Preferred
                            Contact Method</label>
                        <select wire:model.lazy="preferred_contact" id="preferred_contact"
                            class="border border-gray-400 rounded focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 px-3 py-2 w-full">
                            <option value="">Select...</option>
                            <option value="Phone">Phone</option>
                            <option value="Email">Email</option>
                        </select>
                    </div>

                    <!-- Notes (Suggested Field) -->
                    <div class="flex flex-col w-full md:col-span-3">
                        <label for="notes" class="block mb-1">Additional Notes optional</label>
                        <textarea wire:model.lazy="notes" id="notes" rows="2"
                            placeholder="If any other detail or query please enter here"
                            class="border border-gray-400 rounded focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 px-3 py-2 w-full"></textarea>
                    </div>
                </div>

                <div class="mt-6 flex justify-end">
                    <button type="submit"
                        class="px-8 py-2 bg-indigo-600 text-white font-semibold rounded hover:bg-indigo-700 transition-colors duration-200">
                        Book Appointment
                    </button>
                </div>

            </form>


        </div>
    @endunsetsession

    @session('NewAppointmentData')
        <!-- resources/views/appointments.blade.php -->
        <div class="container mx-auto px-4 py-6">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                @dump(session('newAppointmentData'))
                {{-- @foreach (session('newAppointmentData') as $appointment)
                    <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col space-y-2">
                        <div>
                            <span class="font-semibold">Patient ID:</span>
                            <span>{{ $appointment['pateint_id'] }}</span>
                        </div>
                        <div>
                            <span class="font-semibold">Name:</span>
                            <span>{{ $appointment['pateint_name'] }}</span>
                        </div>
                        <div>
                            <span class="font-semibold">Email:</span>
                            <span>{{ $appointment['pateint_email'] }}</span>
                        </div>
                        <div>
                            <span class="font-semibold">Address:</span>
                            <span>{{ $appointment['pateint_address'] }}</span>
                        </div>
                        <div>
                            <span class="font-semibold">Appointment Time:</span>
                            <span>{{ $appointment['pateint_appointment_time'] }}</span>
                        </div>
                        <div>
                            <span class="font-semibold">Appointment Date:</span>
                            <span>{{ $appointment['pateint_appointment_date'] }}</span>
                        </div>
                        <div>
                            <span class="font-semibold">Preferred Contact:</span>
                            <span>{{ $appointment['pateint_prefered_contact'] }}</span>
                        </div>
                        @if (!empty($appointment['pateint_extra_info']))
                            <div>
                                <span class="font-semibold">Extra Info:</span>
                                <span>{{ $appointment['pateint_extra_info'] }}</span>
                            </div>
                        @endif

                        <hr class="my-3">

                        <div>
                            <span class="font-semibold">Allocated Doctor ID:</span>
                            <span>{{ $appointment['pateint_allocated_dr_id'] }}</span>
                        </div>
                        <div>
                            <span class="font-semibold">Doctor Name:</span>
                            <span>{{ $appointment['pateint_allocated_dr_name'] }}</span>
                        </div>
                        @if (!empty($appointment['pateint_allocated_dr_education']))
                            <div>
                                <span class="font-semibold">Doctor Education:</span>
                                <span>{{ $appointment['pateint_allocated_dr_education'] }}</span>
                            </div>
                        @endif
                        <div>
                            <span class="font-semibold">Doctor Confirmed?</span>
                            <span>
                                @if ($appointment['pateint_allocated_dr_confirmation'])
                                    ✅
                                @else
                                    ❌
                                @endif
                            </span>
                        </div>
                        @if (!empty($appointment['pateint_allocated_dr_confirmation_date_time']))
                            <div>
                                <span class="font-semibold">Confirmation Date/Time:</span>
                                <span>{{ $appointment['pateint_allocated_dr_confirmation_date_time'] }}</span>
                            </div>
                        @endif
                        @if (!empty($appointment['pateint_allocated_dr_meeting_hall']))
                            <div>
                                <span class="font-semibold">Meeting Hall:</span>
                                <span>{{ $appointment['pateint_allocated_dr_meeting_hall'] }}</span>
                            </div>
                        @endif
                        @if (!empty($appointment['pateint_allocated_dr_meeting_message']))
                            <div>
                                <span class="font-semibold">Meeting Message:</span>
                                <span>{{ $appointment['pateint_allocated_dr_meeting_message'] }}</span>
                            </div>
                        @endif
                        <div>
                            <span class="font-semibold">Meeting Done?</span>
                            <span>
                                @if ($appointment['pateint_allocated_dr_meeting_done_status'])
                                    ✅
                                @else
                                    ❌
                                @endif
                            </span>
                        </div>
                        @if (!empty($appointment['pateint_allocated_dr_meeting_done_number']))
                            <div>
                                <span class="font-semibold">Meeting Done Number:</span>
                                <span>{{ $appointment['pateint_allocated_dr_meeting_done_number'] }}</span>
                            </div>
                        @endif

                        <div class="pt-2 text-xs text-gray-500">
                            <span class="font-semibold">Created:</span>
                            <span>{{ \Carbon\Carbon::parse($appointment['created_at'])->format('d-m-Y H:i') }}</span>
                        </div>
                    </div>
                @endforeach --}}
            </div>
        </div>
    @endsession
</div>

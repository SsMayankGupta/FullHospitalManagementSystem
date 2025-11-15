<div>
    <div class="p-3 text-3xl text-black">New Appointment Registration</div>

    @forelse ($pateintNewData as $item)
        <div class="max-w-4xl mx-auto p-4">
            <form wire:submit.prevent="submit">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div>
                        <label class="text-gray-700 font-semibold">Patient ID</label>
                        <div class="border rounded px-3 py-2">{{ $item->patient_id }}</div>
                    </div>
                    <div>
                        <label class="text-gray-700 font-semibold">Name</label>
                        <div class="border rounded px-3 py-2">{{ $item->patient_name }}</div>
                    </div>
                    <div>
                        <label class="text-gray-700 font-semibold">Email</label>
                        <div class="border rounded px-3 py-2">{{ $item->patient_email }}</div>
                    </div>
                    <div>
                        <label class="text-gray-700 font-semibold">Phone</label>
                        <div class="border rounded px-3 py-2">{{ $item->patient_phone }}</div>
                    </div>
                    <div>
                        <label class="text-gray-700 font-semibold">Address</label>
                        <div class="border rounded px-3 py-2">{{ $item->patient_address }}</div>
                    </div>
                    <div>
                        <label class="text-gray-700 font-semibold">Appointment Time</label>
                        <div class="border rounded px-3 py-2">{{ $item->patient_appointment_time }}</div>
                    </div>
                    <div>
                        <label class="text-gray-700 font-semibold">Appointment Date</label>
                        <div class="border rounded px-3 py-2">{{ $item->patient_appointment_date }}</div>
                    </div>
                    <div>
                        <label class="text-gray-700 font-semibold">Preferred Contact</label>
                        <div class="border rounded px-3 py-2">{{ $item->patient_prefered_contact }}</div>
                    </div>
                    <div>
                        <label class="text-gray-700 font-semibold">Problem Statement</label>
                        <div class="border rounded px-3 py-2">{{ $item->patient_problem_statement }}</div>
                    </div>
                    <div class="md:col-span-3">
                        <label class="text-gray-700 font-semibold">Extra Info</label>
                        <div class="border rounded px-3 py-2">
                            {{ $item->patient_extra_info ?? 'N/A' }}
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div>
                        <label for="doctor_id" class="text-gray-700 font-semibold">Select Doctor</label>
                        <select wire:model="doctor_id" id="doctor_id" class="border rounded px-3 py-2 w-full">
                            <option value="">Choose Doctor</option>
                            {{-- @foreach ($doctors as $doctor)
                            <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                        @endforeach --}}
                        </select>
                    </div>
                    <div class="md:col-span-2">
                        <label for="message" class="text-gray-700 font-semibold">Appointment Message</label>
                        <textarea wire:model.defer="message" id="message" rows="4" class="border rounded px-3 py-2 w-full"
                            placeholder="Enter details for your doctor appointment..."></textarea>
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                        Submit Appointment
                    </button>
                </div>

            </form>
        </div>
    @empty
        <div class="text-lg p-3">No data founded.....</div>
    @endforelse
</div>

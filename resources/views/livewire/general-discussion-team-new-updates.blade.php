<div>
    <h2 class="text-xl font-semibold text-slate-800 p-3">General Discussion Requests</h2>

    <button id="buttonn" type="button" wire:click="getGeneralDetailsUpdates" wire:loading.attr="disabled"
        class="cursor-pointer inline-flex items-center gap-2 rounded-md bg-blue-600 px-4 py-2 text-white text-sm font-medium
         hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2
         disabled:opacity-60 disabled:cursor-not-allowed transition-colors"
        aria-label="Fetch latest updates">
        <!-- Idle icon -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 shrink-0" viewBox="0 0 24 24" fill="none"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 4v6h6M20 20v-6h-6M20 8a8 8 0 10-6.906 12.32" />
        </svg>
        <span>Latest Updates</span>

        <!-- Loading spinner -->
        <svg wire:loading wire:target="getGeneralDetailsUpdates" class="h-4 w-4 animate-spin text-white"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" aria-hidden="true">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4">
            </circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
        </svg>
    </button>


    <!-- resources/views/livewire/general-discussion-table.blade.php -->
    <div class="mx-auto p-4">


        <div class="relative overflow-x-auto bg-white shadow-sm ring-1 ring-slate-200 rounded-lg">
            <table class="min-w-full table-auto text-sm text-left text-slate-700">
                <thead class="bg-slate-50 text-slate-600 text-xs uppercase">
                    <tr class="divide-x divide-slate-200">

                        <th class="px-3 py-2 w-10">
                            Select And Submit
                        </th>

                        <th class="px-3 py-2 whitespace-nowrap">Name</th>
                        <th class="px-3 py-2 whitespace-nowrap">Email</th>
                        <th class="px-3 py-2 whitespace-nowrap">Phone</th>
                        <th class="px-3 py-2 whitespace-nowrap">Gender</th>
                        <th class="px-3 py-2 whitespace-nowrap">Pregnancy</th>
                        <th class="px-3 py-2 whitespace-nowrap">Age</th>
                        <th class="px-3 py-2 w-[40%]">Problem</th>
                        <th class="px-3 py-2 whitespace-nowrap">Created At</th>
                        <th class="px-3 py-2 w-40 text-right">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-200">

                    @forelse($patien_data as $item)
                        <tr class="divide-x divide-slate-200 align-top">

                            <td class="px-3 py-3">
                                <input type="checkbox" value="{{ $item->general_dis_patient_id }}" wire:model="selected"
                                    class="h-4 w-4 rounded border-slate-300 text-emerald-600 focus:ring-emerald-500" />
                            </td>

                            <td class="px-3 py-3">{{ $item->general_dis_patient_name }}</td>

                            <td class="px-3 py-3">
                                <a href="mailto:{{ $item->general_dis_patient_email }}"
                                    class="text-blue-600 hover:underline">
                                    {{ $item->general_dis_patient_email }}
                                </a>
                            </td>

                            <td class="px-3 py-3">
                                <a href="tel:{{ $item->general_dis_patient_phone }}"
                                    class="text-blue-600 hover:underline">
                                    {{ $item->general_dis_patient_phone }}
                                </a>
                            </td>

                            <td class="px-3 py-3 capitalize">{{ $item->general_dis_patient_gender ?? '—' }}</td>

                            <td class="px-3 py-3">{{ $item->general_dis_patient_preganency_status ?? '—' }}</td>

                            <td class="px-3 py-3">{{ $item->general_dis_patient_age_status ?? '—' }}</td>

                            <td class="px-3 py-3">
                                <div class="prose prose-sm max-w-none text-slate-700">
                                    {{ $item->general_dis_patient_problem }}
                                </div>
                            </td>

                            <td class="px-3 py-3 whitespace-nowrap">
                                {{ \Illuminate\Support\Carbon::parse($item->created_at)->format('Y-m-d H:i') }}</td>

                            <td class="px-3 py-3">
                                <div class="flex items-center justify-end gap-2">

                                    @php
                                        $sessionname = 'general' . $item->general_dis_patient_id;
                                    @endphp

                                    @unsetsession($sessionname)
                                        <button type="button"
                                            wire:click="confirmOne('{{ $item->general_dis_patient_id }}','{{ $loop->index }}')"
                                            class="inline-flex items-center rounded-md bg-emerald-600 px-3 py-2 text-white text-xs font-medium hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500">
                                            Confirm Request
                                        </button>
                                    @endunsetsession


                                    @session($sessionname)
                                        <div class="text-green"> {{ session($sessionname) }}</div>
                                    @endsession
                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="11" class="px-3 py-8 text-center text-slate-500">No requests found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="flex items-center justify-between mb-4 mt-4">
            <button type="button" wire:click="confirmSelected"
                class="cursor-pointer inline-flex items-center gap-2 rounded-md bg-emerald-600 px-4 py-2 text-white text-sm font-medium shadow hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-500">
                Confirm Selected
            </button>
        </div>
    </div>


    <script>
        window.addEventListener('load', () => {
            window.Echo
                .channel('General_discussion_event_channel')
                .listen('.General_discussion_event_event', () => {
                    document.getElementById('buttonn').click();
                });
        });
    </script>
</div>

<div>
    <div id="chat-container" class="p-2 w-full">

        <div class="bg-white shadow-md rounded w-full">
            <!-- Header -->

            <div class="p-4 border-b bg-blue-500 text-white rounded-t-lg flex justify-between items-center w-full">
                <p class="text-lg font-semibold">General Discussion Chat</p>

                @session('chatId')
                    <button type="button" wire:click="switchUser">Switch To Other</button>
                @endsession
            </div>

            <!-- Chatbox -->
            <div id="chatbox" class="p-4 overflow-y-auto w-full">
                <!-- Chat messages will be displayed here -->

                @unsetsession('chatId')
                    <div>
                        <select class="w-full p-2 border rounded text-black" wire:model="chatId">
                            <option>Select Patient to Chat</option>
                            @foreach ($userdata as $user)
                                <option value="{{ $user->general_dis_patient_id }}">
                                    {{ $user->general_dis_patient_name }} / {{ $user->general_dis_patient_id }}
                                </option>
                            @endforeach
                        </select>
                        @error('chatId')
                            <div class="text-red-500 text-sm p-2">{{ $message }}</div>
                        @enderror
                        <button type="button" wire:click="setChatId"
                            class="p-2 mt-3 rounded bg-blue-600 border text-white cursor-pointer">Select</button>
                    </div>
                @endunsetsession


                @session('chatId')
                    <div>
                        @foreach ($chatDetails as $item)
                            @if ($item->from_id === session('general_dis_dashboard_login')->gen_d_login_id)
                                <div class="mb-2 text-right">
                                    <p class="bg-blue-500 text-white rounded-lg py-2 px-4 inline-block">
                                        {{ $item->message }}
                                    </p>
                                    <p class="text-sm p-2 text-gray-700">{{ $item->message_time }}</p>
                                </div>
                            @elseif($item->to_id === session('general_dis_dashboard_login')->gen_d_login_id)
                                <div class="mb-2">
                                    <p class="bg-gray-200 text-gray-700 rounded-lg py-2 px-4 inline-block">
                                        {{ $item->message }}
                                    </p>
                                    <p class="text-sm p-2 text-gray-700">{{ $item->message_time }}</p>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endsession

            </div>

            @session('chatId')
                <div class="p-4 border-t flex">

                    <form wire:submit.prevent="submitChatMessageHere" class="flex w-full">

                        <input id="user-input" type="text" placeholder="Type a message" wire:model="newChatMessage"
                            class="w-full px-3 py-2 border rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            autocomplete="off" />

                        <button type="submit"
                            class="bg-blue-500 text-white px-4 py-2 rounded-r-md hover:bg-blue-600 transition duration-300">
                            Send
                        </button>

                        @error('newChatMessage')
                            <script>
                                document.getElementById("user-input").placeholder = {{ message }};
                            </script>
                        @enderror

                    </form>

                </div>
            @endsession

        </div>
    </div>

</div>

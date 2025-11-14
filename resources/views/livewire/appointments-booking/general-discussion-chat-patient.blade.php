<div>

    <div id="chat-container" class="">
        <div class="bg-white w-full p-3">

            <div class="p-4 border-b bg-blue-500 text-white rounded-t-lg flex justify-between items-center">
                <p class="text-lg font-semibold">General Discussion Admin Chat</p>
            </div>

            <div id="chatbox" class="p-4 h-100 overflow-y-auto">

                @foreach ($chatData as $item)
                    @dump($item)
                    {{-- @if ($item->from_id == session('general_discussion_data.general_dis_patient_id'))
                        <div class="mb-2 text-right">
                            <p class="bg-blue-500 text-white rounded-lg py-2 px-4 inline-block">
                                {{ $item->message }}
                            </p>
                            <p class="text-sm p-2 text-gray-700">{{ $item->message_time }}</p>
                        </div>
                    @elseif($item->to_id == session('general_discussion_data.general_dis_patient_id'))
                        <div class="mb-2">
                            <p class="bg-gray-200 text-gray-700 rounded-lg py-2 px-4 inline-block">
                                {{ $item->message }}
                            </p>
                            <p class="text-sm p-2 text-gray-700">{{ $item->message_time }}</p>
                        </div>
                    @endif --}}
                @endforeach

            </div>

            <div>
                <form wire:submit.prevent="sendMessage" class="flex border-t p-4">
                    <div class="w-full flex">
                        <input id="user-input" type="text" wire:model.lazy="message" placeholder="Type a message"
                            class="w-full px-3 py-2 border rounded-l-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('message') border-red-500 @enderror"
                            autocomplete="off">

                        <button id="send-button" type="submit"
                            class="bg-blue-500 text-white px-4 py-2 rounded-r-md hover:bg-blue-600 transition duration-300 flex items-center">
                            {{-- @if ($loading)
                                <svg class="animate-spin h-5 w-5 text-white mr-2" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="10" stroke="white" stroke-width="4"
                                        fill="none" />
                                    <path d="M4 12a8 8 0 018-8" stroke="white" stroke-width="4"
                                        stroke-linecap="round" />
                                </svg>
                                Sending...
                            @else
                                Send
                            @endif --}}
                        </button>
                    </div>
                </form>
                @error('message')
                    <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                @enderror
            </div>


        </div>
    </div>

</div>

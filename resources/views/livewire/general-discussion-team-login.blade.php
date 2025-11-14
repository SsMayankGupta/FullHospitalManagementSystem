<div>
    <div class="bg-white rounded w-full mx-auto">
        <h2 class="text-xl font-semibold mb-4">Staff Login</h2>
        <p>Staff login feature single device session management","Single user login restrict multiple devices","Login
            using correct credentials explanation</p>

        @session('message')
            <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
                {{ session('message') }}


                @session('logout_massage')
                    <button wire:click="logoutInPreviousSystem"
                        class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                        Logout
                    </button>
                @endsession

            </div>
        @endsession


        <form wire:submit.prevent="login" class="space-y-4 mt-5">
            <div class="flex flex-row gap-2">
                <label for="mobile" class="block text-gray-700 font-semibold">Mobile Number</label>
                <input id="mobile" type="tel" placeholder="Enter mobile number" wire:model.defer="mobile"
                    autocomplete="mobile"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('mobile') border-red-500 @enderror" />
                @error('mobile')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col gap-2">
                <label for="password" class="block text-gray-700 font-semibold">Password</label>
                <input id="password" type="password" placeholder="Enter password" wire:model.defer="password"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 @error('password') border-red-500 @enderror" />
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <p class="text-sm text-gray-600">Note: Only authorized staff can use this password to login.</p>

            <button type="submit" class="cursor-pointer bg-blue-600 text-white rounded px-4 py-2 hover:bg-blue-700">
                Login
            </button>

            <div wire:loading wire:target="login" class="mt-2 text-blue-600 font-semibold">
                Logging in, please wait...
            </div>
        </form>

        @session('general_dis_dashboard_login')
            <div class="bg-white rounded shadow p-3 w-full flex items-center">
                <p class="text-gray-800 font-semibold">
                    User login done for {{ session('general_dis_dashboard_login.gen_d_login_name') }}
                </p>

                <button wire:click="logout"
                    class="ml-6 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                    Logout
                </button>
            </div>
        @endsession


    </div>

</div>

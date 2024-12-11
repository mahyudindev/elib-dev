
<x-app-layout>



    <x-admin-sidebar />
    <div class="p-4 sm:ml-64 mt-6">
        <div class="bg-blue-500 shadow-md rounded px-8 pt-6 pb-8 mb-4" style="height: 70px;">
            <h1 class="text-2xl font-bold mb-4 text-center text-white">Edit User {{ $user->name }}</h1>
        </div>
    <div class="p-4">
        <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$user->name" required autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <br>
            <!-- Email -->
                <label for="email-address-icon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                            <path d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z"/>
                            <path d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z"/>
                        </svg>
                    </div>
                    <input type="text" id="email-address-icon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com" name="email" value="{{ $user->email }}" required>
                </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <div class="relative">
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" autocomplete="new-password" />
                    <button type="button" onclick="togglePasswordVisibility('password')" class="absolute inset-y-0 end-0 pe-3 flex items-center text-gray-500">
                        <svg id="password-toggle-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 4.5C7.3 4.5 3.4 7.1 1 12c2.4 4.9 6.3 7.5 11 7.5S20.6 16.9 23 12c-2.4-4.9-6.3-7.5-11-7.5zm0 13c-3.4 0-6.4-2.1-8-5.5 1.6-3.4 4.6-5.5 8-5.5s6.4 2.1 8 5.5c-1.6 3.4-4.6 5.5-8 5.5z"/>
                            <path d="M12 9.5c-1.4 0-2.5 1.1-2.5 2.5s1.1 2.5 2.5 2.5 2.5-1.1 2.5-2.5-1.1-2.5-2.5-2.5zm0 3c-.3 0-.5-.2-.5-.5s.2-.5.5-.5.5.2.5.5-.2.5-.5.5z"/>
                        </svg>
                    </button>
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>


            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <div class="relative">
                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" autocomplete="new-password" />
                    <button type="button" onclick="togglePasswordVisibility('password')" class="absolute inset-y-0 end-0 pe-3 flex items-center text-gray-500">
                        <svg id="password-toggle-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 4.5C7.3 4.5 3.4 7.1 1 12c2.4 4.9 6.3 7.5 11 7.5S20.6 16.9 23 12c-2.4-4.9-6.3-7.5-11-7.5zm0 13c-3.4 0-6.4-2.1-8-5.5 1.6-3.4 4.6-5.5 8-5.5s6.4 2.1 8 5.5c-1.6 3.4-4.6 5.5-8 5.5z"/>
                            <path d="M12 9.5c-1.4 0-2.5 1.1-2.5 2.5s1.1 2.5 2.5 2.5 2.5-1.1 2.5-2.5-1.1-2.5-2.5-2.5zm0 3c-.3 0-.5-.2-.5-.5s.2-.5.5-.5.5.2.5.5-.2.5-.5.5z"/>
                        </svg>
                    </button>
                </div>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- Role -->
            <div class="mt-4">
                <x-input-label for="role" :value="__('Role')" />
                <select id="role" name="role" class="block mt-1 w-full">
                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                    <!-- Tambahkan opsi lain sesuai kebutuhan -->
                </select>
                <x-input-error :messages="$errors->get('role')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4 space-x-3">
                    <x-secondary-button type="button" onclick="history.back()">
                        {{ __('Cancel') }}
                    </x-secondary-button>
                    <x-primary-button type="submit">
    {{ __('Update') }}
</x-primary-button>
                </div>


        </form>
        <script>
            function togglePasswordVisibility(id) {
                const input = document.getElementById(id);
                const icon = document.getElementById(id + '-toggle-icon');
                const inputConf = document.getElementById('password_confirmation');
                if (input.type === 'password') {
                    input.type = 'text';
                    inputConf.type = 'text';
                    icon.classList.toggle('text-blue-500');
                } else {
                    input.type = 'password';
                    inputConf.type = 'password';
                    icon.classList.toggle('text-blue-500');
                }
            }
        </script>
    </div>
    </div>
</x-app-layout>



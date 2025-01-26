<section>
    <header class="mb-8">
        <h2 class="text-xl font-bold text-gray-900">
            Update Password
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            Ensure your account is using a long, random password to stay secure.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <div>
            <label for="current_password" class="block text-sm font-medium text-gray-700 mb-1">
                Current Password
            </label>
            <input type="password" 
                   id="current_password" 
                   name="current_password" 
                   class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-[#FF2D20]/50 focus:border-[#FF2D20] transition-colors duration-200"
                   autocomplete="current-password" />
            @error('current_password')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                New Password
            </label>
            <input type="password" 
                   id="password" 
                   name="password" 
                   class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-[#FF2D20]/50 focus:border-[#FF2D20] transition-colors duration-200"
                   autocomplete="new-password" />
            @error('password')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">
                Confirm Password
            </label>
            <input type="password" 
                   id="password_confirmation" 
                   name="password_confirmation" 
                   class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-[#FF2D20]/50 focus:border-[#FF2D20] transition-colors duration-200"
                   autocomplete="new-password" />
            @error('password_confirmation')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password Requirements -->
        <div class="bg-[#FF2D20]/5 rounded-xl p-6 space-y-4">
            <h3 class="text-base font-semibold text-gray-900 flex items-center">
                <svg class="w-5 h-5 text-[#FF2D20] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                Password Requirements
            </h3>
            <ul class="text-sm text-gray-600 space-y-2">
                <li class="flex items-center">
                    <svg class="w-4 h-4 text-[#FF2D20] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    At least 8 characters long
                </li>
                <li class="flex items-center">
                    <svg class="w-4 h-4 text-[#FF2D20] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Mix of uppercase and lowercase letters
                </li>
                <li class="flex items-center">
                    <svg class="w-4 h-4 text-[#FF2D20] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Include numbers and special characters
                </li>
            </ul>
        </div>

        <div class="flex items-center justify-end gap-4 pt-4">
            <button type="submit" 
                    class="inline-flex items-center px-6 py-3 bg-[#FF2D20] text-white rounded-xl hover:bg-[#FF2D20]/90 transition-all duration-300 shadow-lg shadow-[#FF2D20]/10">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                </svg>
                Update Password
            </button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }"
                   x-show="show"
                   x-transition
                   x-init="setTimeout(() => show = false, 2000)"
                   class="text-sm text-green-600 flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Password updated successfully
                </p>
            @endif
        </div>
    </form>
</section>

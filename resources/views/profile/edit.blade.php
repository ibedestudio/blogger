<x-app-layout>
    <!-- Header Section -->
    <section class="relative bg-gradient-to-br from-gray-900 via-gray-800 to-black text-white py-12">
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[800px] bg-[#FF2D20] rounded-full blur-3xl opacity-10"></div>
            <div class="absolute inset-0" style="background-image: radial-gradient(rgba(255, 255, 255, 0.1) 1px, transparent 1px); background-size: 40px 40px;"></div>
        </div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                <div>
                    <h1 class="text-3xl font-bold text-white mb-2">Profile Settings</h1>
                    <p class="text-gray-400">Manage your account settings and preferences</p>
                </div>
            </div>
        </div>
    </section>

    <div class="py-12 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Navigation -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">
                        <nav class="space-y-1 p-4">
                            <a href="#profile-info" 
                               class="flex items-center px-4 py-3 text-gray-900 bg-[#FF2D20]/5 rounded-xl group">
                                <svg class="w-5 h-5 text-[#FF2D20] mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                Profile Information
                            </a>
                            <a href="#update-password" 
                               class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-xl group">
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-[#FF2D20] mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                                </svg>
                                Update Password
                            </a>
                            <a href="#delete-account" 
                               class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-xl group">
                                <svg class="w-5 h-5 text-gray-400 group-hover:text-red-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                                Delete Account
                            </a>
                        </nav>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Profile Information -->
                    <div id="profile-info" class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">
                        <div class="p-8">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>

                    <!-- Update Password -->
                    <div id="update-password" class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">
                        <div class="p-8">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>

                    <!-- Delete Account -->
                    <div id="delete-account" class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">
                        <div class="p-8">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

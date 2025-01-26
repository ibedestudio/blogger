<x-app-layout>
    <article class="min-h-screen bg-gray-50">
        <!-- Article Header -->
        <section class="relative bg-gradient-to-br from-gray-900 via-gray-800 to-black text-white py-16">
            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[800px] bg-[#FF2D20] rounded-full blur-3xl opacity-10"></div>
                <div class="absolute inset-0" style="background-image: radial-gradient(rgba(255, 255, 255, 0.1) 1px, transparent 1px); background-size: 40px 40px;"></div>
            </div>
            
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
                <div class="max-w-3xl mx-auto">
                    <!-- Meta Info -->
                    <div class="flex flex-wrap items-center justify-center gap-4 mb-10">
                        <div class="flex items-center gap-3 px-4 py-2 bg-white/10 backdrop-blur-lg rounded-full">
                            <img class="h-8 w-8 rounded-full ring-2 ring-[#FF2D20]/20" 
                                 src="https://ui-avatars.com/api/?name={{ urlencode($post->user->name) }}&background=FF2D20&color=ffffff" 
                                 alt="{{ $post->user->name }}">
                            <span class="text-white/90 font-medium">{{ $post->user->name }}</span>
                        </div>
                        <div class="flex items-center gap-4">
                            <time class="flex items-center px-4 py-2 bg-white/10 backdrop-blur-lg rounded-full text-sm text-white/90">
                                <svg class="w-4 h-4 mr-2 text-[#FF2D20]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                {{ $post->created_at->format('F d, Y') }}
                            </time>
                        </div>
                    </div>

                    <!-- Title -->
                    <h1 class="text-4xl md:text-5xl font-bold text-white text-center mb-8">{{ $post->title }}</h1>

                    <!-- Tags -->
                    <div class="flex flex-wrap justify-center gap-2 mb-12">
                        <span class="px-4 py-1.5 bg-white/10 backdrop-blur-lg text-white rounded-full text-sm font-medium hover:bg-white/20 transition duration-300">#Laravel</span>
                        <span class="px-4 py-1.5 bg-white/10 backdrop-blur-lg text-white rounded-full text-sm font-medium hover:bg-white/20 transition duration-300">#WebDev</span>
                        <span class="px-4 py-1.5 bg-white/10 backdrop-blur-lg text-white rounded-full text-sm font-medium hover:bg-white/20 transition duration-300">#PHP</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main Content -->
        <div class="relative -mt-10">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">
                    <!-- Content -->
                    <div class="p-8 md:p-12">
                        <div class="prose prose-lg max-w-none">
                            {!! nl2br(e($post->content)) !!}
                        </div>

                        <!-- Share Section -->
                        <div class="mt-12 pt-12 border-t border-gray-100">
                            <h3 class="text-lg font-semibold text-gray-900 mb-6 text-center">Share this article</h3>
                            <div class="flex flex-wrap justify-center gap-4">
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($post->title) }}" 
                                   target="_blank"
                                   class="flex items-center gap-2 px-5 py-2 bg-[#1DA1F2]/10 text-[#1DA1F2] rounded-xl hover:bg-[#1DA1F2] hover:text-white transition-all duration-300">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                    </svg>
                                    <span>Twitter</span>
                                </a>
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" 
                                   target="_blank"
                                   class="flex items-center gap-2 px-5 py-2 bg-[#1877F2]/10 text-[#1877F2] rounded-xl hover:bg-[#1877F2] hover:text-white transition-all duration-300">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                    </svg>
                                    <span>Facebook</span>
                                </a>
                                <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->url()) }}" 
                                   target="_blank"
                                   class="flex items-center gap-2 px-5 py-2 bg-[#0A66C2]/10 text-[#0A66C2] rounded-xl hover:bg-[#0A66C2] hover:text-white transition-all duration-300">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                    </svg>
                                    <span>LinkedIn</span>
                                </a>
                            </div>
                        </div>

                        <!-- Author Card -->
                        <div class="mt-12 pt-12 border-t border-gray-100">
                            <div class="bg-gradient-to-br from-gray-900 via-gray-800 to-black rounded-3xl p-8 relative overflow-hidden">
                                <div class="absolute inset-0 overflow-hidden">
                                    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[400px] h-[400px] bg-[#FF2D20] rounded-full blur-3xl opacity-10"></div>
                                    <div class="absolute inset-0" style="background-image: radial-gradient(rgba(255, 255, 255, 0.1) 1px, transparent 1px); background-size: 40px 40px;"></div>
                                </div>
                                <div class="relative flex flex-col sm:flex-row items-center gap-8">
                                    <div class="relative">
                                        <div class="w-28 h-28 rounded-2xl overflow-hidden ring-4 ring-white/20 transform -rotate-3">
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($post->user->name) }}&background=FF2D20&color=ffffff&size=112" 
                                                 alt="{{ $post->user->name }}"
                                                 class="w-28 h-28 rounded-2xl object-cover">
                                        </div>
                                        <div class="absolute -top-2 -right-2 bg-[#FF2D20] text-white text-xs font-bold px-2 py-1 rounded-lg shadow-lg">
                                            Author
                                        </div>
                                    </div>
                                    <div class="flex-1 text-center sm:text-left">
                                        <h3 class="text-2xl font-bold text-white mb-2">{{ $post->user->name }}</h3>
                                        <p class="text-gray-400 mb-4">Content Creator & Digital Marketing Specialist</p>
                                        <div class="flex flex-wrap justify-center sm:justify-start gap-4">
                                            <a href="mailto:{{ $post->user->email }}" 
                                               class="inline-flex items-center px-6 py-3 bg-white text-gray-900 rounded-xl hover:bg-[#FF2D20] hover:text-white transition-all duration-300">
                                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                                </svg>
                                                Contact Me
                                            </a>
                                            <div class="flex items-center gap-2 px-4 py-2 bg-white/10 backdrop-blur-lg rounded-xl text-white/90">
                                                <svg class="w-5 h-5 text-[#FF2D20]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15"/>
                                                </svg>
                                                <span>12 Articles</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Navigation & Admin Actions -->
                        <div class="mt-12 flex flex-col items-center gap-6">
                            <a href="{{ route('blog') }}" 
                               class="inline-flex items-center px-6 py-3 bg-gray-900 text-white rounded-xl hover:bg-[#FF2D20] transition-all duration-300 shadow-lg">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                                </svg>
                                Back to Articles
                            </a>

                            @can('update', $post)
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('posts.edit', $post) }}" 
                                       class="inline-flex items-center px-5 py-2.5 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition-all duration-300">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                        Edit Article
                                    </a>
                                    <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="inline-flex items-center px-5 py-2.5 bg-red-50 text-red-600 rounded-xl hover:bg-red-100 transition-all duration-300"
                                                onclick="return confirm('Are you sure you want to delete this article?')">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                            Delete Article
                                        </button>
                                    </form>
                                </div>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>
</x-app-layout> 
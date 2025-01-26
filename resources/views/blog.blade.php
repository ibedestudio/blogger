<x-app-layout>
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-gray-900 via-gray-800 to-black text-white py-24">
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[800px] bg-[#FF2D20] rounded-full blur-3xl opacity-10"></div>
            <div class="absolute inset-0" style="background-image: radial-gradient(rgba(255, 255, 255, 0.1) 1px, transparent 1px); background-size: 40px 40px;"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-6">Discover Amazing Articles</h1>
                <p class="text-xl text-gray-400 max-w-2xl mx-auto mb-8">
                    Explore insightful stories and knowledge shared by our community
                </p>
                @auth
                    <a href="{{ route('posts.create') }}" 
                       class="inline-flex items-center px-6 py-3 bg-[#FF2D20] text-white rounded-xl hover:bg-[#FF2D20]/90 transition-all duration-300 shadow-lg shadow-[#FF2D20]/10">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Write an Article
                    </a>
                @else
                    <a href="{{ route('register') }}" 
                       class="inline-flex items-center px-6 py-3 bg-[#FF2D20] text-white rounded-xl hover:bg-[#FF2D20]/90 transition-all duration-300 shadow-lg shadow-[#FF2D20]/10">
                        Get Started
                    </a>
                @endauth
            </div>
        </div>
    </section>

    <!-- Featured Post -->
    @if($featuredPost)
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <div class="space-y-6">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-[#FF2D20]/10 text-[#FF2D20]">
                            Featured Article
                        </span>
                        <h2 class="text-3xl font-bold text-gray-900">
                            <a href="{{ route('posts.show', $featuredPost) }}" class="hover:text-[#FF2D20] transition duration-300">
                                {{ $featuredPost->title }}
                            </a>
                        </h2>
                        <div class="flex items-center text-gray-600">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                <span>{{ $featuredPost->user->name }}</span>
                            </div>
                            <span class="mx-2">•</span>
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span>{{ $featuredPost->created_at->format('M d, Y') }}</span>
                            </div>
                        </div>
                        <p class="text-gray-600 leading-relaxed">
                            {{ Str::limit($featuredPost->content, 300) }}
                        </p>
                        <a href="{{ route('posts.show', $featuredPost) }}" 
                           class="inline-flex items-center text-[#FF2D20] font-semibold hover:text-[#FF2D20]/80 transition duration-300">
                            Read Article 
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </a>
                    </div>
                    <div class="relative h-[400px] rounded-3xl overflow-hidden shadow-xl bg-gradient-to-br from-[#FF2D20]/5 to-[#FF2D20]/10 border border-gray-100">
                        <div class="absolute inset-0 bg-white/40"></div>
                        <div class="absolute inset-0" style="background-image: radial-gradient(rgba(255, 45, 32, 0.1) 1px, transparent 1px); background-size: 20px 20px;"></div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- Latest Posts -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-12">
                <h2 class="text-2xl font-bold text-gray-900">Latest Articles</h2>
            </div>

            @if($posts->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($posts as $post)
                        <article class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100 hover:shadow-2xl transition-all duration-300">
                            <div class="p-6">
                                <div class="flex items-center text-sm text-gray-500 mb-4">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                        <span>{{ $post->user->name }}</span>
                                    </div>
                                    <span class="mx-2">•</span>
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                        <span>{{ $post->created_at->format('M d, Y') }}</span>
                                    </div>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-3">
                                    <a href="{{ route('posts.show', $post) }}" class="hover:text-[#FF2D20] transition duration-300">
                                        {{ Str::limit($post->title, 60) }}
                                    </a>
                                </h3>
                                <p class="text-gray-600 mb-4 line-clamp-3">
                                    {{ Str::limit($post->content, 150) }}
                                </p>
                                <div class="flex justify-between items-center">
                                    <a href="{{ route('posts.show', $post) }}" 
                                       class="inline-flex items-center text-[#FF2D20] font-medium hover:text-[#FF2D20]/80 transition duration-300">
                                        Read More
                                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                        </svg>
                                    </a>
                                    @can('update', $post)
                                        <div class="flex space-x-2">
                                            <a href="{{ route('posts.edit', $post) }}" 
                                               class="text-gray-400 hover:text-[#FF2D20] transition-colors duration-300"
                                               title="Edit">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                </svg>
                                            </a>
                                        </div>
                                    @endcan
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-12">
                    {{ $posts->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-1">No articles yet</h3>
                    <p class="text-gray-500 mb-6">Be the first one to share your thoughts</p>
                    @auth
                        <a href="{{ route('posts.create') }}" 
                           class="inline-flex items-center px-6 py-3 bg-[#FF2D20] text-white rounded-xl hover:bg-[#FF2D20]/90 transition-all duration-300 shadow-lg shadow-[#FF2D20]/10">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                            Write an Article
                        </a>
                    @else
                        <a href="{{ route('register') }}" 
                           class="inline-flex items-center px-6 py-3 bg-[#FF2D20] text-white rounded-xl hover:bg-[#FF2D20]/90 transition-all duration-300 shadow-lg shadow-[#FF2D20]/10">
                            Get Started
                        </a>
                    @endauth
                </div>
            @endif
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto text-center">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Stay Updated</h2>
                <p class="text-gray-600 mb-8">Get the latest articles and insights delivered straight to your inbox.</p>
                <form class="flex gap-2 max-w-md mx-auto">
                    <input type="email" 
                           placeholder="Enter your email" 
                           class="flex-1 px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#FF2D20] focus:border-transparent">
                    <button type="submit" 
                            class="px-6 py-3 bg-[#FF2D20] text-white rounded-lg font-semibold hover:bg-[#FF2D20]/90 transition duration-300">
                        Subscribe
                    </button>
                </form>
            </div>
        </div>
    </section>
</x-app-layout> 
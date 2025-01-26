<x-app-layout>
    <!-- Hero Section -->
    <section x-data="{ navHeight: 0 }" 
             x-init="navHeight = $refs.nav.offsetHeight"
             :style="`min-height: calc(100vh - ${navHeight}px)`"
             class="relative bg-gradient-to-br from-gray-900 via-gray-800 to-black text-white flex items-center">
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[800px] bg-[#FF2D20] rounded-full blur-3xl opacity-10"></div>
            <div class="absolute inset-0" style="background-image: radial-gradient(rgba(255, 255, 255, 0.1) 1px, transparent 1px); background-size: 40px 40px;"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative py-20">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6">
                    Share Your Stories with the World
                </h1>
                <p class="text-xl text-gray-400 max-w-2xl mx-auto mb-10">
                    Join our community of writers and readers. Create, share, and discover amazing content.
                </p>
                <div class="flex flex-wrap justify-center gap-4">
                    @auth
                        <a href="{{ route('posts.create') }}" 
                           class="inline-flex items-center px-8 py-4 bg-[#FF2D20] text-white rounded-xl hover:bg-[#FF2D20]/90 transition-all duration-300 shadow-lg shadow-[#FF2D20]/10">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                            Start Writing
                        </a>
                    @else
                        <a href="{{ route('register') }}" 
                           class="inline-flex items-center px-8 py-4 bg-[#FF2D20] text-white rounded-xl hover:bg-[#FF2D20]/90 transition-all duration-300 shadow-lg shadow-[#FF2D20]/10">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14"/>
                            </svg>
                            Get Started
                        </a>
                        <a href="{{ route('login') }}" 
                           class="inline-flex items-center px-8 py-4 bg-white/10 backdrop-blur-lg text-white rounded-xl hover:bg-white/20 transition-all duration-300">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                            </svg>
                            Sign In
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Articles -->
    @if($featuredPosts->count() > 0)
        <section class="py-20 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <span class="text-[#FF2D20] font-semibold tracking-wider uppercase text-sm">Featured Content</span>
                    <h2 class="mt-3 text-3xl font-bold text-gray-900">Must-Read Articles</h2>
                    <div class="mt-4 mx-auto w-24 h-1 bg-gradient-to-r from-[#FF2D20] to-[#FF2D20]/60 rounded-full"></div>
                </div>

                <div class="grid lg:grid-cols-2 gap-8">
                    @foreach($featuredPosts as $post)
                        <article class="group bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100 hover:shadow-2xl transition-all duration-300">
                            <div class="p-8">
                                <div class="flex items-center gap-4 mb-6">
                                    <img class="h-12 w-12 rounded-xl ring-4 ring-[#FF2D20]/10" 
                                         src="https://ui-avatars.com/api/?name={{ urlencode($post->user->name) }}&background=FF2D20&color=ffffff" 
                                         alt="{{ $post->user->name }}">
                                    <div>
                                        <h3 class="font-medium text-gray-900">{{ $post->user->name }}</h3>
                                        <p class="text-sm text-gray-500">{{ $post->created_at->format('M d, Y') }}</p>
                                    </div>
                                </div>
                                <h2 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-[#FF2D20] transition-colors duration-300">
                                    <a href="{{ route('posts.show', $post) }}">
                                        {{ $post->title }}
                                    </a>
                                </h2>
                                <p class="text-gray-600 mb-6 line-clamp-3">
                                    {{ Str::limit($post->content, 150) }}
                                </p>
                                <a href="{{ route('posts.show', $post) }}" 
                                   class="inline-flex items-center text-[#FF2D20] font-medium group-hover:translate-x-2 transition-transform duration-300">
                                    Read Article 
                                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                    </svg>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Latest Articles -->
    @if($latestPosts->count() > 0)
        <section class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <span class="text-[#FF2D20] font-semibold tracking-wider uppercase text-sm">Latest Updates</span>
                    <h2 class="mt-3 text-3xl font-bold text-gray-900">Fresh Content</h2>
                    <div class="mt-4 mx-auto w-24 h-1 bg-gradient-to-r from-[#FF2D20] to-[#FF2D20]/60 rounded-full"></div>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($latestPosts as $post)
                        <article class="group bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100 hover:shadow-2xl transition-all duration-300">
                            <div class="p-8">
                                <div class="flex items-center gap-4 mb-6">
                                    <img class="h-10 w-10 rounded-xl ring-4 ring-[#FF2D20]/10" 
                                         src="https://ui-avatars.com/api/?name={{ urlencode($post->user->name) }}&background=FF2D20&color=ffffff" 
                                         alt="{{ $post->user->name }}">
                                    <div>
                                        <h3 class="font-medium text-gray-900">{{ $post->user->name }}</h3>
                                        <p class="text-sm text-gray-500">{{ $post->created_at->format('M d, Y') }}</p>
                                    </div>
                                </div>
                                <h2 class="text-xl font-bold text-gray-900 mb-4 group-hover:text-[#FF2D20] transition-colors duration-300 line-clamp-2">
                                    <a href="{{ route('posts.show', $post) }}">
                                        {{ $post->title }}
                                    </a>
                                </h2>
                                <p class="text-gray-600 mb-6 line-clamp-3">
                                    {{ Str::limit($post->content, 120) }}
                                </p>
                                <a href="{{ route('posts.show', $post) }}" 
                                   class="inline-flex items-center text-[#FF2D20] font-medium group-hover:translate-x-2 transition-transform duration-300">
                                    Read Article 
                                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                    </svg>
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="mt-12 text-center">
                    <a href="{{ route('blog') }}" 
                       class="inline-flex items-center px-8 py-4 bg-gray-900 text-white rounded-xl hover:bg-[#FF2D20] transition-all duration-300 shadow-lg">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15"/>
                        </svg>
                        View All Articles
                    </a>
                </div>
            </div>
        </section>
    @endif

    <!-- CTA Section -->
    <section class="relative bg-gradient-to-br from-gray-900 via-gray-800 to-black text-white py-20">
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[800px] bg-[#FF2D20] rounded-full blur-3xl opacity-10"></div>
            <div class="absolute inset-0" style="background-image: radial-gradient(rgba(255, 255, 255, 0.1) 1px, transparent 1px); background-size: 40px 40px;"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                    Ready to Share Your Story?
                </h2>
                <p class="text-xl text-gray-400 max-w-2xl mx-auto mb-10">
                    Join our community and start sharing your knowledge and experiences with readers around the world.
                </p>
                @guest
                    <a href="{{ route('register') }}" 
                       class="inline-flex items-center px-8 py-4 bg-[#FF2D20] text-white rounded-xl hover:bg-[#FF2D20]/90 transition-all duration-300 shadow-lg shadow-[#FF2D20]/10">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14"/>
                        </svg>
                        Get Started Today
                    </a>
                @endguest
            </div>
        </div>
    </section>
</x-app-layout>

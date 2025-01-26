<x-app-layout>
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-blue-600 to-indigo-800 h-[600px] flex items-center">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg fill=\"%23ffffff\" fill-opacity=\"1\"%3E%3Cpath d=\"M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center">
                <h1 class="text-5xl md:text-6xl font-bold text-white mb-6">
                    Discover Amazing Stories
                </h1>
                <p class="text-xl md:text-2xl text-blue-100 mb-8 max-w-2xl mx-auto">
                    Share your thoughts, experiences, and expertise with our growing community of readers and writers.
                </p>
                <div class="flex justify-center space-x-4">
                    @auth
                        <a href="{{ route('posts.create') }}" 
                           class="px-8 py-4 bg-white text-blue-600 rounded-full font-semibold hover:bg-blue-50 transition duration-300 shadow-lg hover:shadow-xl">
                            Start Writing
                        </a>
                    @else
                        <a href="{{ route('register') }}" 
                           class="px-8 py-4 bg-white text-blue-600 rounded-full font-semibold hover:bg-blue-50 transition duration-300 shadow-lg hover:shadow-xl">
                            Get Started
                        </a>
                        <a href="{{ route('login') }}" 
                           class="px-8 py-4 border-2 border-white text-white rounded-full font-semibold hover:bg-white hover:text-blue-600 transition duration-300">
                            Sign In
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Post Section -->
    @if($featuredPost = $posts->shift())
        <section class="py-20 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-bold text-gray-900">Featured Post</h2>
                    <div class="mt-2 h-1 w-20 bg-blue-600 mx-auto"></div>
                </div>

                <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                    <div class="p-8 md:p-12">
                        <h3 class="text-4xl font-bold text-gray-900 mb-6">
                            <a href="{{ route('posts.show', $featuredPost) }}" class="hover:text-blue-600 transition duration-300">
                                {{ $featuredPost->title }}
                            </a>
                        </h3>
                        <div class="flex items-center text-gray-600 mb-6">
                            <span class="font-medium">{{ $featuredPost->user->name }}</span>
                            <span class="mx-2">•</span>
                            <span>{{ $featuredPost->created_at->format('M d, Y') }}</span>
                        </div>
                        <p class="text-gray-600 text-lg mb-8 leading-relaxed">
                            {{ Str::limit($featuredPost->content, 300) }}
                        </p>
                        <a href="{{ route('posts.show', $featuredPost) }}" 
                           class="inline-flex items-center text-blue-600 font-semibold hover:text-blue-800 transition duration-300">
                            Read Full Story 
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- Latest Posts Section -->
    <section class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900">Latest Stories</h2>
                <div class="mt-2 h-1 w-20 bg-blue-600 mx-auto"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($posts as $post)
                    <article class="bg-white rounded-2xl shadow-lg overflow-hidden transform hover:-translate-y-1 transition duration-300">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-4">
                                <a href="{{ route('posts.show', $post) }}" class="hover:text-blue-600 transition duration-300">
                                    {{ Str::limit($post->title, 50) }}
                                </a>
                            </h3>
                            <div class="flex items-center text-sm text-gray-600 mb-4">
                                <span class="font-medium">{{ $post->user->name }}</span>
                                <span class="mx-2">•</span>
                                <span>{{ $post->created_at->format('M d, Y') }}</span>
                            </div>
                            <p class="text-gray-600 mb-6 line-clamp-3">
                                {{ Str::limit($post->content, 150) }}
                            </p>
                            <a href="{{ route('posts.show', $post) }}" 
                               class="inline-flex items-center text-blue-600 font-semibold hover:text-blue-800 transition duration-300">
                                Read More 
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-12">
                {{ $posts->links() }}
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-blue-600 to-indigo-800 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\"60\" height=\"60\" viewBox=\"0 0 60 60\" xmlns=\"http://www.w3.org/2000/svg\"%3E%3Cg fill=\"none\" fill-rule=\"evenodd\"%3E%3Cg fill=\"%23ffffff\" fill-opacity=\"1\"%3E%3Cpath d=\"M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">
                    Ready to Share Your Story?
                </h2>
                <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
                    Join our community and start sharing your knowledge and experiences with readers around the world.
                </p>
                @guest
                    <a href="{{ route('register') }}" 
                       class="px-8 py-4 bg-white text-blue-600 rounded-full font-semibold hover:bg-blue-50 transition duration-300 shadow-lg hover:shadow-xl">
                        Get Started Today
                    </a>
                @endguest
            </div>
        </div>
    </section>
</x-app-layout> 
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Blog') }}
            </h2>
            @auth
                <a href="{{ route('posts.create') }}" 
                   class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
                    {{ __('✏️ Write New Post') }}
                </a>
            @else
                <a href="{{ route('login') }}" 
                   class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
                    {{ __('Login to Write') }}
                </a>
            @endauth
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Featured Post -->
            @if($featuredPost = $posts->first())
                <div class="mb-8">
                    <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                        <div class="p-8">
                            <h2 class="text-3xl font-bold mb-4">
                                <a href="{{ route('posts.show', $featuredPost) }}" 
                                   class="text-gray-900 hover:text-indigo-600">
                                    {{ $featuredPost->title }}
                                </a>
                            </h2>
                            <div class="flex items-center text-gray-600 mb-4">
                                <span>By {{ $featuredPost->user->name }}</span>
                                <span class="mx-2">•</span>
                                <span>{{ $featuredPost->created_at->format('M d, Y') }}</span>
                            </div>
                            <p class="text-gray-600 mb-4">
                                {{ Str::limit($featuredPost->content, 300) }}
                            </p>
                            <a href="{{ route('posts.show', $featuredPost) }}" 
                               class="inline-flex items-center text-indigo-600 hover:text-indigo-800">
                                Read More 
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Post Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($posts->skip(1) as $post)
                    <div class="bg-white overflow-hidden shadow-sm rounded-lg hover:shadow-md transition-shadow duration-300">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-2">
                                <a href="{{ route('posts.show', $post) }}" 
                                   class="text-gray-900 hover:text-indigo-600">
                                    {{ $post->title }}
                                </a>
                            </h3>
                            <div class="flex items-center text-sm text-gray-600 mb-3">
                                <span>{{ $post->user->name }}</span>
                                <span class="mx-2">•</span>
                                <span>{{ $post->created_at->format('M d, Y') }}</span>
                            </div>
                            <p class="text-gray-600 mb-4">
                                {{ Str::limit($post->content, 150) }}
                            </p>
                            <div class="flex justify-between items-center">
                                <a href="{{ route('posts.show', $post) }}" 
                                   class="text-indigo-600 hover:text-indigo-800 text-sm">
                                    Read More →
                                </a>
                                @can('update', $post)
                                    <div class="flex space-x-2">
                                        <a href="{{ route('posts.edit', $post) }}" 
                                           class="text-gray-600 hover:text-gray-900">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                        </a>
                                        <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    onclick="return confirm('Are you sure?')"
                                                    class="text-gray-600 hover:text-red-600">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                @endcan
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</x-app-layout> 
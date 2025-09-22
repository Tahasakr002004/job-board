<x-layout :tabTitle='$tabTitle' :pageTitle='$pageTitle'>
    <h2 class="text-2xl font-bold">{{ $post->title }}</h2>
    <p class="mt-2 text-gray-700">{{ $post->body }}</p>
    <h3 class="mt-1 text-sm text-gray-500">By {{ $post->author }}</h3>

    @if (session('success'))
        <div class="bg-green-50 px-3 py-2 mt-4 rounded-md text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <ul class="mt-6 space-y-4">
        @foreach ($post->comments as $comment)
            <li class="p-4 bg-gray-100 rounded-md shadow-sm">
                <p class="text-gray-800">{{ $comment->content }}</p>
                <span class="mt-1 text-sm text-gray-600">{{ $comment->author }}</span>
            </li>
        @endforeach
    </ul>

    <div class="border border-gray-300 px-3 py-2 mt-2">
        <form action="{{ url('blog/' . $post->id . '/comments') }}" method="POST" class="mt-8">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <div class="space-y-6">
                <div>
                    <label for="author" class="block text-sm/6 font-medium text-gray-900">Your Name</label>
                    <div class="mt-2">
                        <input 
                            value="{{ old('author') }}"
                            id="author" 
                            type="text" 
                            name="author"
                            class="block w-full rounded-md border px-3 py-1.5 text-base text-gray-900 placeholder:text-gray-400 focus:border-indigo-600 focus:ring-1 focus:ring-indigo-600 sm:text-sm
                            {{ $errors->has('author') ? 'border-red-500' : 'border-gray-300' }}"
                        />
                    </div>
                    @error('author')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>  

                <div>
                    <label for="content" class="block text-sm/6 font-medium text-gray-900">Content</label>
                    <div class="mt-2">
                        <textarea  
                            id="content" 
                            name="content" 
                            rows="3"
                            class="block w-full rounded-md border px-3 py-1.5 text-base text-gray-900 placeholder:text-gray-400 focus:border-indigo-600 focus:ring-1 focus:ring-indigo-600 sm:text-sm
                            {{ $errors->has('content') ? 'border-red-500' : 'border-gray-300' }}"
                        >{{ old('content') }}</textarea>
                    </div>
                    <p class="mt-3 text-sm/6 text-gray-600">Write a few sentences about the article.</p>
                    @error('content')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="submit" 
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    Add Comment
                </button>
            </div>
        </form>
    </div>
</x-layout>

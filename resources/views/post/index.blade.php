<x-layout :title='$tabTitle' :pageTitle='$pageTitle'>
     @if (session('success'))
            <div class="bg-green-50 px-3 py-2">
                {{ session('success') }}
            </div>
     @endif
     <div class="mt-6 flex items-center justify-end gap-x-6">
      <a href="/blog/create" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
        Create
    </a>
    </div>
    @foreach ($posts as $post )
        <h1>{{ $post->title }}</h1>
        <h1>{{ $post->body }}</h1>
        <h1>{{ $post->author }}</h1>
        <h1>{{ $post->published }}</h1>
        
    @endforeach
    {{ $posts->links() }}
</x-layout>

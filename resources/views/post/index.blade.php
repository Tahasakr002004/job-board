<x-layout :tabTitle='$tabTitle' :pageTitle='$pageTitle'>
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
        <div class="flex justify-between items-center border border-gray-200 px-4 py-6 my-2">
            <div>
               <h1>
                <a href="/blog/{{ $post->id }}">
                 {{$post->title}}</a>    
              </h1>
               <h1>{{ $post->author }}</h1>
            </div>
            <div>
                <a class="text-gray-500 hover:text-green -500" href="/blog/{{ $post->id }}/edit">Edit</a>
                <form method="POST" action="/blog/{{ $post->id }}" onsubmit="return confirm('Are you sure to delete it permenantly?')">
                    @csrf
                    @method('DELETE')
                     <button class="text-red-500 hover:text-gray-500">Delete</button>
                </form>
                
            </div>
        </div>
    @endforeach
    {{ $posts->links() }}
</x-layout>

<x-layout :title='$tabTitle' :pageTitle='$pageTitle'>
    <h1>{{$pageTitle}}</h1>
    @foreach ($posts as $post )
        <h1>{{ $post->title }}</h1>
        <h1>{{ $post->body }}</h1>
        <h1>{{ $post->author }}</h1>
        <h1>{{ $post->published }}</h1>
        
    @endforeach
    {{ $posts->links() }}
</x-layout>

<x-layout :title='$tabTitle' :pageTitle='$pageTitle'>
    <h1>{{$pageTitle}}</h1>
    @foreach ($comments as $comment )
        <h3>{{ $comment->author }}</h3>
        <p>{{$comment->content}}</p>
        <p>{{$comment->post->body}}</p>
        <a href="/blog/{{ $comment->post->id }}">{{ $comment->post->title }}</a>
    @endforeach
</x-layout>

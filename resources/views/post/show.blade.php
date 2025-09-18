<x-layout :title='$tabTitle' :pageTitle='$pageTitle'>
    <h1>{{$pageTitle}}</h1>
    <h2>{{$post->author}}</h2>
    <h2>{{$post->title}}</h2>
    <h2>{{$post->body}}</h2>
         <ul>
            @foreach ($post->comments as $comment)
                <li>{{$comment->content}},{{$comment->author}}</li>
            @endforeach
        </ul>
</x-layout>

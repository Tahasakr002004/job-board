<x-layout :tabTitle='$tabTitle' :pageTitle='$pageTitle'>
    <h1>{{$pageTitle}}</h1>
    @foreach ($tags as $tag )
        <h3>{{ $tag->name }}</h3>

    @endforeach

</x-layout>

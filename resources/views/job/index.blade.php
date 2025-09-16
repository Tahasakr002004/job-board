<div>

        <h1>HERE IS FIRST JOB INDEX</h1>
        <h3>my name is {{ $name }}</h3>
        @foreach ($jobs as $job )
             <div>{{ $job['title'] }} , {{ $job['salary'] }}</div>
        @endforeach

</div>

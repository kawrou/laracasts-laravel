<x-layout>
    <x-slot:heading>
        Job 
    </x-slot:heading>

    <h2><strong>{{$job['title']}}</strong></h2>

    <p>The job pays {{$job['salary']}}</p>
</x-layout>
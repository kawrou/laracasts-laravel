<x-layout>
    <x-slot:heading>
        Job 
    </x-slot:heading>

    <h2><strong>{{$job->title}}</strong></h2>

    <p>The job pays {{$job->salary}}</p>

    <p class="mt-6">
        <x-button href="/jobs/{{$job->id}}/edit">Edit Job</x-button>
    </p>
</x-layout>
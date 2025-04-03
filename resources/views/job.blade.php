<x-layout>
    <x-slot:page_title>Job: {{ $job['title']}} </x-slot:heading>

    <h2 class="text-2xl font-bold"> {{ $job['title']}} </h2>
    <p> Pays {{ $job['salary']}} per year.</p>
</x-layout>

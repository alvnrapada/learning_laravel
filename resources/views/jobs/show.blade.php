<x-layout>
    <x-slot:page_title>Job: {{ $job->title}} </x-slot:page_title>

    <h2 class="text-2xl font-bold"> {{ $job->title}} </h2>
    <p> Pays {{ $job->salary}} per year.</p>

    @can('edit', $job)
        <div class="mt-4">
            <x-button-link href="/jobs/{{ $job->id}}/edit">Edit Job</x-button-link>
        </div>
    @endcan
</x-layout>

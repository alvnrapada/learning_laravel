<x-layout>
    <x-slot:page_title>Job Listings</x-slot:heading>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
    @foreach ($jobs as $job)
            <a class="block p-6 rounded-md shadow-md group" href="/jobs/{{ $job['id'] }}">
                <p class="text-xs mb-4 font-bold text-blue-600">{{ $job->employer->name }}</p>
                <h1 class="text-lg group-hover:underline font-bold">{{ $job['title'] }}</h1>
                <p class="text-sm">Pays {{ $job['salary'] }} per year.</p>
            </a>
    @endforeach
    </div>
</x-layout>

<x-layout>
    <x-slot:page_title>Job Listings</x-slot:page_title>
    <div class="flex justify-end mb-4">
        <a href="/jobs/create"
            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create
            New Job</a>
    </div>
   
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
    @foreach ($jobs as $job)
            <a class="block p-6 rounded-md shadow-md group" href="/jobs/{{ $job['id'] }}">
                <p class="text-xs mb-4 font-bold text-blue-600">{{ $job->employer->name }}</p>
                <h1 class="text-lg group-hover:underline font-bold">{{ $job['title'] }}</h1>
                <p class="text-sm">Pays {{ $job['salary'] }} per year.</p>
            </a>
    @endforeach
    </div>
    <div class="mt-4">
        {{ $jobs->links() }}
    </div>
</x-layout>

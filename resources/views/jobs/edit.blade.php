<x-layout>
    <x-slot:page_title>Job: Edit </x-slot:page_title>
    <h2 class="text-2xl font-bold"> Edit Job: {{ $job['title'] }} </h2>
    </p>
    <form action="/jobs/{{ $job->id }}" method="POST">
        @csrf
        @method('PATCH')
       <div class="space-y-6">
            <div class="pb-6">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
                        <div class="mt-2">
                            <input 
                            value="{{ $job->title }}"
                            placeholder="Software Engineer" 
                            type="text" 
                            name="title" 
                            id="title"
                            autocomplete="title"
                            class="border border-gray-300 block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" 
                            required>
                        </div>
                        @error('title')
                            <p class="italic text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="sm:col-span-3">
                        <label for="salary" class="block text-sm/6 font-medium text-gray-900">Salary</label>
                        <div class="mt-2">
                            <input 
                            value="{{ $job->salary }}"
                            placeholder="$50,000 USD" 
                            type="text" 
                            name="salary" 
                            id="salary" 
                            autocomplete="salary"
                            class="border border-gray-300 block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                            required>
                            </div>
                        @error('salary')
                            <p class="italic text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="sm:col-span-3">
                        <label for="country" class="block text-sm/6 font-medium text-gray-900">Employer</label>
                        <div class="mt-2 grid grid-cols-1">
                            <select 
                            name="employer_id"
                            id="employer_id" 
                            autocomplete="employer-name"
                            class="border border-gray-300 col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pr-8 pl-3 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                            required>   
                            <option value="{{ $job->employer_id }}">{{ $job->employer->name }}</option>
                                @foreach ($employers as $employer)
                                    <option value="{{ $employer['id'] }}">{{ $employer['name'] }}</option>
                                @endforeach
                            </select>
                            <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4"
                                viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                                <path fill-rule="evenodd"
                                    d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        @error('employer_id')
                            <p class="italic text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mt-6 flex items-center justify-between gap-x-6 pt-6 border-t border-gray-200">
                <div class="flex items-center gap-x-6">
                    <button type="submit"
                        class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-red-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                        form="delete-job">
                        Delete
                    </button>
                </div>
                <div class="flex items-center gap-x-6">
                    <a href="/jobs/{{ $job->id }}" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
                    <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        Update
                    </button>
                </div>
            </div>
    </form>

    <form action="/jobs/{{ $job->id }}" method="POST" class="hidden" id="delete-job">
        @csrf
        @method('DELETE')
    </form>

</x-layout>
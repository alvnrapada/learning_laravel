<x-layout>
    <x-slot:page_title>Job: Create </x-slot:page_title>
    <h2 class="text-2xl font-bold"> Create New Job </h2>
    <p class="mt-1 text-sm/6 text-gray-600">This information will be displayed publicly so be careful what you share.
    </p>
    <form action="/jobs" method="POST">
        @csrf
       <div class="space-y-6">
            <div class="pb-6">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="title">Title</x-form-label>
                        <x-form-input type="text" name="title" id="title" placeholder="Software Engineer" autocomplete="title" required />
                        <x-form-error name="title" />
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="salary">Salary</x-form-label>
                        <x-form-input placeholder="$50,000 USD" type="text" name="salary" id="salary" autocomplete="salary" required />
                        <x-form-error name="salary" />
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="employer_id">Employer</x-form-label>
                        <x-form-select :dropdownItems="$employers" name="employer_id" id="employer_id" autocomplete="employer-name" required />
                        <x-form-error name="employer_id" />
                    </x-form-field>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6 pt-6 border-t border-gray-200">
                <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
                <x-form-button>Save</x-form-button>
            </div>
    </form>

</x-layout>
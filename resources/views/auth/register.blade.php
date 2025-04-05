<x-layout>
    <x-slot:page_title>Register </x-slot:page_title>
    <h2 class="text-2xl font-bold"> Register New Account </h2>
    <form action="/register" method="POST">
        @csrf
       <div class="space-y-6">
            <div class="pb-6">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="first_name">First Name</x-form-label>
                        <x-form-input type="text" name="first_name" id="first_name" autocomplete="first_name" required :value="old('first_name')" />
                        <x-form-error name="first_name" />
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="last_name">Last Name</x-form-label>
                        <x-form-input type="text" name="last_name" id="last_name" autocomplete="last_name" required :value="old('last_name')" />
                        <x-form-error name="last_name" />
                    </x-form-field>
                    
                    <x-form-field>
                        <x-form-label for="email">Email</x-form-label>
                        <x-form-input type="email" name="email" id="email" autocomplete="email" required :value="old('email')" />
                        <x-form-error name="email" />
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="password">Password</x-form-label>
                        <x-form-input type="password" name="password" id="password" required />
                        <x-form-error name="password" />
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="password_confirmation">Password Confirmation</x-form-label>
                        <x-form-input type="password" name="password_confirmation" id="password_confirmation" required />
                        <x-form-error name="password_confirmation" />
                    </x-form-field>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6 pt-6 border-t border-gray-200">
                <a href="/login" type="button" class="text-sm/6 font-semibold text-gray-900">Already have an account? Login</a>
                <x-form-button>Register</x-form-button>
            </div>
    </form>

</x-layout>
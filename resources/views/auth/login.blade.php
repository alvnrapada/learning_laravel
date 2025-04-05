<x-layout>
    <x-slot:page_title>Login </x-slot:page_title>
    <h2 class="text-2xl font-bold"> Login to Your Account </h2>
    <form action="/login" method="POST">
        @csrf
       <div class="space-y-6">
            <div class="pb-6">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="email">Email</x-form-label>
                        <x-form-input type="email" name="email" id="email" autocomplete="email" :value="old('email')" required />
                        <x-form-error name="email" />
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="password">Password</x-form-label>
                        <x-form-input type="password" name="password" id="password" required />
                        <x-form-error name="password" />
                    </x-form-field>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6 pt-6 border-t border-gray-200">
                <a href="/register" type="button" class="text-sm/6 font-semibold text-gray-900">Don't have an account? Register</a>
                <x-form-button>Login</x-form-button>
            </div>
    </form>

</x-layout>
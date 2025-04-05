<!DOCTYPE html>
<html lang="en" class="h-full">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>{{ $page_title }}</title>
    </head>
    <body class="h-full">
          <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
            <div class="flex lg:flex-1">
              <a href="#" class="-m-1.5 p-1.5">
                <span class="sr-only">Your Company</span>
                <img class="h-8 w-auto" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="">
              </a>
            </div>
            <div class="hidden lg:flex lg:gap-x-12">
                <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                <x-nav-link href="/jobs" :active="request()->is('jobs')">Jobs</x-nav-link>
                <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
            </div>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end lg:gap-x-6">
              @auth
                <form action="/logout" method="POST">
                  @csrf
                  <x-form-button>Logout</x-form-button>
                </form>
              @else
                <x-nav-link href="/login" :active="request()->is('login')">Login</x-nav-link>
                <x-nav-link href="/register" :active="request()->is('register')">Register</x-nav-link>
              @endauth
            </div>
          </nav>

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        {{ $slot }}
        </div>
    </body>
</html>

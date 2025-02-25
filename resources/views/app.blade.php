<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>
            @isset($title)
                {{ strip_tags($title) . ' - ' }}
            @endisset
            {{ config('app.name') }}
        </title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        @vite('resources/js/app.js')
        @livewireStyles
    </head>
    <body
        x-data
        x-cloak
        class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col"
    >
        <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 flex justify-between items-center">
            <a
                wire:navigate
                href="{{ route('home') }}"
                class="text-lg font-semibold"
            >
                {{ config('app.name') }}
            </a>

            <nav class="flex space-x-4">
                <a
                    wire:navigate
                    wire:current="font-bold underline"
                    href="{{ route('contacts.index') }}"
                    class="hover:underline"
                >
                    Contact
                </a>
            </nav>
        </header>
        <div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
            <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row">
                {{ $slot }}
            </main>
        </div>

        @livewireScriptConfig
    </body>
</html>

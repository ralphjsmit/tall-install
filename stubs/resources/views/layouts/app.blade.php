<!DOCTYPE html>
<html lang="{{ \Illuminate\Support\Str::of(app()->getLocale())->lower()->kebab() }}" class="min-h-screen {{ $htmlClass ?? '' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
    
    @livewireStyles
    @stack('styles')
</head>

<body class="w-screen min-h-screen font-sans antialiased {{ $bodyClass ?? ''}}">
    <livewire:toasts />
    {{ $slot }}
    
    @stack('scripts')
    @livewireScripts
</body>
</html>

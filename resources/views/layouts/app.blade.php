<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Icon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Notificaciones -->
        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- Errores: --}}
        @if ($errors->any())
            <div class="bg-red-500 text-white p-4 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    <footer class="bg-gray-800 text-white py-6 mt-10">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap justify-around">
            <!-- Información del grupo -->
            <h5 class="text-xl font-semibold mb-2">Grupo n&uacute;mero 3</h5>
            <div class="w-full mx-auto flex flex-wrap  border-b border-gray-700">
                <div class="w-1/2 text-center">
                    <p class="mb-1">Facultad de Informatica</p>
                    <p class="mb-1">Universidad Nacional del Comahue</p>
                </div>
                <div class="w-1/2 text-center">
                    <p class="mb-1">Programaci&oacute;n web avanzada </p>
                    <p class="mb-0">Año 2024</p>
                </div>
            </div>
            <!-- Contacto -->
             <hr>
            <h5 class="text-xl font-semibold mb-2 text-center">Integrantes</h5>
            <div class="w-full flex flex-wrap text-center">
                <div  class="w-1/3 ">
                    <p class="mb-1">Nombre: Benjamin Diego FAI -</p>
                    <p class="mb-1">Mail: <a href="mailto:diego.benjamin@est.fi.uncoma.edu.ar" class="text-white hover:underline">diego.benjamin@est.fi.uncoma.edu.ar</a> </p>
                    <p class="mb-0">GitHub: <a href="https://github.com/Diego966-b"  class="text-white hover:underline">Diego-Benjamin</a></p>
                </div>
                <div  class="w-1/3 ">
                    <p class="mb-1">Nombre: Bilo faoust FAI - 3616 </p>
                    <p class="mb-1">Mail: <a href="mailto:fausto.bilo@est.fi.uncoma.edu.ar" class="text-white hover:underline">fausto.bilo@est.fi.uncoma.edu.ar</a> </p>
                    <p class="mb-0">GitHub: <a href="https://github.com/IgnacioCooper47"  class="text-white hover:underline"> Fausto-Bilo</a></p>
                </div>
                <div  class="w-1/3 ">
                    <p class="mb-1">Nombre: Alcaraz Julian FAI - 4261 </p>
                    <p class="mb-1">Mail: <a href="mailto:julian.alcaraz@est.fi.uncoma.edu.ar" class="text-white hover:underline">julian.alcaraz@est.fi.uncoma.edu.ar</a> </p>
                    <p class="mb-0">GitHub: <a href="https://github.com/Julian-Alcaraz"  class="text-white hover:underline">Julian-Alcaraz</a></p>
                </div>
            </div>
        </div>
        <div class="text-center border-t border-gray-700 pt-4 mt-4">
            <a href="https://github.com/Julian-Alcaraz/myblog"    class="text-white hover:underline" >Repositiorio del proyecto</a>
        </div>
    </div>
</footer>
    </div>
</body>

</html>
<html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>
        <link rel="icon" href="https://broker-centra.fisioacasa.pe/favicon.ico" type="image/x-icon">
        
        <!-- Metatags -->
        <title>Centra Broker - Sistema</title>
        <meta name="title" content="Centra Broker - Sistema" />
        <meta name="description" content="Sistema de gestión de Pólizas y Siniestros para Broker de seguros. Desarrollado por e-Pask." />

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website" />
        <meta property="og:url" content="https://metatags.io/" />
        <meta property="og:title" content="Centra Broker - Sistema" />
        <meta property="og:description" content="Sistema de gestión de Pólizas y Siniestros para Broker de seguros. Desarrollado por e-Pask." />
        <meta property="og:image" content="https://broker-centra.fisioacasa.pe/logo.png" />

        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image" />
        <meta property="twitter:url" content="https://metatags.io/" />
        <meta property="twitter:title" content="Centra Broker - Sistema" />
        <meta property="twitter:description" content="Sistema de gestión de Pólizas y Siniestros para Broker de seguros. Desarrollado por e-Pask." />
        <meta property="twitter:image" content="https://broker-centra.fisioacasa.pe/logo.png" />

        <!-- iOS -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead

        <!-- Flowbite -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/2780e63ff4.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    </head>
    <body class="font-sans antialiased"">
        @inertia
    
    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    </body>
</html>

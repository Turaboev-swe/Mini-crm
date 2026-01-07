<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body id="appBody">

@include('layouts.navbar')

<div class="container my-4">
    @yield('content')
</div>

<!-- THEME SCRIPT -->
<script>
    const body = document.getElementById("appBody");
    const icon = document.getElementById("themeIcon");
    const label = document.getElementById("themeLabel");

    function applyTheme(mode) {
        body.setAttribute("data-theme", mode);
        localStorage.setItem("theme", mode);

        if (icon && label) {
            if (mode === "dark") {
                icon.className = "bi bi-moon-fill me-2";
                label.textContent = "Dark";
            } else {
                icon.className = "bi bi-sun-fill me-2";
                label.textContent = "Light";
            }
        }
    }

    const saved = localStorage.getItem("theme") || "dark";
    applyTheme(saved);
</script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

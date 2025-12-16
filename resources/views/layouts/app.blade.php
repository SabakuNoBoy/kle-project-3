<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>KLE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
 
</head>
<body class="cp-app-bg">

<div class="cp-app-container">

    <!-- SIDEBAR -->
    <aside class="cp-sidebar" id="cpSidebar">
        <div class="cp-sidebar-logo">KLE</div>

        <nav class="cp-sidebar-nav">
            <a href="{{ route('products.index') }}" class="cp-nav-link">ÜRÜNLER</a>
            <a href="{{ route('products.create') }}" class="cp-nav-link">ÜRÜN EKLE</a>
        </nav>

        <form method="POST" action="{{ route('logout') }}" class="cp-logout">
            @csrf
            <button type="submit" class="cp-logout-btn">ÇIKIŞ YAP</button>
        </form>
    </aside>

    <!-- MAIN -->
    <main class="cp-main">
        <header class="cp-header">
            <span class="cp-sidebar-toggle" id="sidebarToggle">&#9776;</span>
            <span class="cp-header-title">SİSTEM :: ONLİNE</span>

            @if(session('success'))
                <div class="alert alert-success mb-3">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger mb-3">
                    {{ session('error') }}
                </div>
            @endif

        </header>

        <section class="cp-content">
            @yield('content')
        </section>
    </main>

</div>

<script>
    const sidebar = document.getElementById('cpSidebar');
    const toggle = document.getElementById('sidebarToggle');

    toggle.addEventListener('click', () => {
        sidebar.classList.toggle('active');
    });
</script>

</body>
</html>

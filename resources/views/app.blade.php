<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Sports News' }}</title>
    {{-- ตัวอย่างใส่ Tailwind/Bootstrap ได้ตามสะดวก --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg bg-white border-bottom mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">ข่าวกีฬา</a>
        </div>
    </nav>

    <main class="container">
        {{ $slot }}
    </main>

    <footer class="text-center py-4 text-muted">
        <small>© {{ date('Y') }} Sports News</small>
    </footer>
</body>
</html>

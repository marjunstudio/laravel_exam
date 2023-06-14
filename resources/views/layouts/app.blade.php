<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @vite('resources/css/app.css')

  <title>@yield('title')</title>
</head>
<body>
  {{-- ヘッダーを表示 --}}
  @component('components.header')
  @endcomponent

  <main>
    @yield('content')
  </main>

  {{-- フッターを表示 --}}
  @component('components.footer')
  @endcomponent  
</body>
</html>
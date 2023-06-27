<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<title>@yield('title')</title>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.bunny.net">
	<link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

	<!-- Scripts -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

	
	@vite('resources/css/app.css')
</head>
<body>
	{{-- ヘッダーを表示 --}}
	@component('components.header')
	@endcomponent

	{{-- フラッシュメッセージがある場合表示 --}}
	@if (session()->exists('msg'))
		@component('components.messages')
		@endcomponent
	@endif

	{{-- メインコンテンツを表示 --}}
	<main>
		@yield('content')
	</main>

  {{-- フッターを表示 --}}
  @component('components.footer')
  @endcomponent  
</body>
</html>

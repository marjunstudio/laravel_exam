@extends('layouts.app')

@section('title', '会員登録')

@section('content')
<body class="bg-gray-100">
  <div class="container mx-auto py-8">
    <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-8 lg:text-3xl">会員登録</h2>

			{{-- エラーメッセージを表示 --}}
			@if (count($errors) > 0)
				@component('components.error_messages', ['errors' => $errors])
				@endcomponent
			@endif
			
			<form method="POST" action="{{ route('register') }}" class="w-full max-w-sm mx-auto bg-white p-8 rounded-md shadow-md">
				@csrf
				<div class="mb-4">        
					<label for="name" class="block text-gray-700 text-sm font-bold mb-2">ユーザー名</label>
					<input id="name" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" name="name" required autocomplete="name" autofocus>
				</div>	
				<div class="mb-4">        
					<label for="email" class="block text-gray-700 text-sm font-bold mb-2">メールアドレス</label>
					<input id="email" type="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" name="email" required autocomplete="email" autofocus>
				</div>
				<div class="mb-4">       
					<label for="password"class="block text-gray-700 text-sm font-bold mb-2">パスワード</label>
					<input id="password" type="password" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" name="password" required autocomplete="current-password">
				</div>
				<div class="mb-4">       
					<label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">パスワード（確認用）</label>
					<input id="password" type="password" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" name="password_confirmation" required autocomplete="current-password">
				</div>
      <button
        class="w-full bg-indigo-500 text-white text-sm font-bold py-2 px-4 rounded-md hover:bg-indigo-600 transition duration-300" type="submit">
				登録する
			</button>

			<div class="flex items-center justify-center p-4 mt-3">
				<a href="/login" class="text-xs text-indigo-500 transition duration-100 hover:text-indigo-600 active:text-indigo-700">ログインはこちら</a>
      </div>
    </form>
  </div>
</body>
@endsection

@extends('layouts.app')

@section('title', 'ログイン')

@section('content')
<body class="bg-gray-100">
  <div class="container mx-auto py-8">
    <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-8 lg:text-3xl">ログイン</h2>

			{{-- エラーメッセージを表示 --}}
			@if (count($errors) > 0)
				@component('components.error_messages', ['errors' => $errors])
				@endcomponent
			@endif
			
			<form method="POST" action="{{ route('login') }}" class="w-full max-w-sm mx-auto bg-white p-8 rounded-md shadow-md">
				@csrf
				<div class="mb-4">        
					<label for="email" class="block text-gray-700 text-sm font-bold mb-2">メールアドレス</label>
					<input id="email" type="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
				</div>
				<div class="mb-4">       
					<label for="password"class="block text-gray-700 text-sm font-bold mb-2">パスワード</label>
					<input id="password" type="password" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
					@if (Route::has('password.request'))
						<a class="text-gray-500 border-b hover:text-gray-900 text-xs btn btn-link" href="{{ route('password.request') }}">
							パスワードを忘れた方
						</a>
					@endif
				</div>
				<div class="mb-4">
					<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
					<label class="form-check-label text-gray-700 text-sm font-bold mb-2" for="remember">
						アカウント情報を保持する
					</label>
				</div>
      <button
        class="w-full bg-indigo-500 text-white text-sm font-bold py-2 px-4 rounded-md hover:bg-indigo-600 transition duration-300"
        type="submit">ログイン</button>

			<div class="flex items-center justify-center p-4 mt-3">
				<a href="/register" class="text-xs text-indigo-500 transition duration-100 hover:text-indigo-600 active:text-indigo-700">会員登録はこちら</a>
      </div>
    </form>
  </div>
</body>
@endsection
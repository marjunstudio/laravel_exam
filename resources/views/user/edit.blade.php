@extends('layouts.app')

@section('title', 'プロフィール編集')

@section('content')
<body class="bg-gray-100">
  <div class="container mx-auto py-8">
    <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-8 lg:text-3xl">プロフィール編集</h2>

			{{-- エラーメッセージを表示 --}}
			@if (count($errors) > 0)
				@component('components.error_messages', ['errors' => $errors])
				@endcomponent
			@endif
			
			<form action="{{ route('user.update', ['id'=>$user->id]) }}" method="POST" class="w-full max-w-sm mx-auto bg-white p-8 rounded-md shadow-md" enctype="multipart/form-data">
				@csrf
        @method('PUT')
				<div class="mb-4">        
					<label for="name" class="block text-gray-700 text-sm font-bold mb-2">ユーザー名</label>
					<input id="name" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" value="{{ $user->name }}" name="name" required autocomplete="name" autofocus>
				</div>	
				<div class="mb-4">        
					<label for="email" class="block text-gray-700 text-sm font-bold mb-2">メールアドレス</label>
					<input id="email" type="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" value="{{ $user->email }}" name="email" required autocomplete="email" autofocus>
				</div>

        <div class="mb-4"> 
          <label for="image" class="block text-gray-700 text-sm font-bold mb-2">アイコン</label>
          <input id="image" type="file" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-indigo-500" value="{{ $user->image }}" name="image" autocomplete="image" autofocus>
        </div>

      <button
        class="w-full bg-indigo-500 text-white text-sm font-bold py-2 px-4 rounded-md hover:bg-indigo-600 transition duration-300" type="submit">
				更新する
			</button>
    </form>
  </div>
</body>
@endsection

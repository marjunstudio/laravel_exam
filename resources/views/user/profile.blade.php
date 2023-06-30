@extends('layouts.app')

@section('title', 'ユーザープロフィール')

@section('content')
<div class="bg-white px-16 py-7 sm:py-8 lg:py-12">
  <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
    <div class="mb-10 md:mb-3">
      <h2 class="text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">ユーザープロフィール</h2>
    </div>

    {{-- ユーザー情報 --}}
    <div class="lg:w-1/2 md:w-2/3 mx-auto">
      <div class="flex flex-wrap -m-2">
        <div class="flex mx-auto border-slate-300">
          {{-- プロフィールアイコン --}}
          <div class="p-2">
            <div class="relative">
              <p class="w-full rounded focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                <img src="{{ asset($user->image) }}" class="w-14 h-14">
              </p>
            </div>
          </div>
          {{-- ユーザー名 --}}
          <div class="p-2 mr-10">
            <div class="relative">
              <label for="name" class="leading-7 text-sm text-gray-600">ユーザー名</label>
              <p class="w-full bg-opacity-50 rounded focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                {{ $user->name }}
              </p>
            </div>
          </div>
          {{-- メールアドレス --}}
          <div class="p-2">
            <div class="relative">
              <label for="email" class="leading-7 text-sm text-gray-600">メールアドレス</label>
              <p class="w-full rounded focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                {{ $user->email }}
              </p>
            </div>
          </div>
        </div>
        {{-- プロフィール編集ボタン --}}
        <a href="{{ route('user.edit', ['id'=>$user->id]) }}">編集</a>

        <div class="flex flex-col text-center w-full mt-12">
          <h1 class="sm:text-2xl text-xl font-medium title-font mb-4 text-gray-900">投稿した日記</h1>
        </div>
        
        {{-- 投稿一覧表示 --}}
        <x-diary_index :items="$diaries" />
      </div>
    </div>
  </section>
@endsection
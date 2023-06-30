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
      <div class="flex flex-wrap">
        <div class="flex mx-auto">
          {{-- プロフィールアイコン --}}
          <div class="justify-center mr-2">
            <img src="{{ asset($user->image) }}" class="w-20 h-20 rounded-full inline-flex items-center justify-center">
          </div>
          {{-- ユーザー名 --}}
          <div class="mr-20 flex item-center">
            <p class="flex justify-center items-center w-full text-lg outline-none font-bold text-gray-700 leading-8 transition-colors duration-200 ease-in-out">
              {{ $user->name }}
            </p>
          </div>
          {{-- プロフィール編集ボタン --}}
          <div class="flex justify-center items-center">
            <a href="{{ route('user.edit', ['id'=>$user->id]) }}" class="rounded-lg bg-indigo-500 px-5 py-2 text-center text-sm font-medium text-white outline-none ring-indigo-300 transition duration-100 hover:bg-indigo-600 active:bg-indigo-700 md:text-base">
              <button>プロフィールを編集</button>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="flex flex-col text-center w-full mt-12">
  <h2 class="text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">投稿した日記</h2>
</div>

{{-- 投稿一覧表示 --}}
<x-diary_index :items="$diaries" />


@endsection
@extends('layouts.app')

@section('title', 'DiariesCreate')

@section('content')
<div class="bg-white py-6 sm:py-8 lg:py-12">
  <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
    <div class="mb-10 md:mb-16">
      <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">日記作成</h2>
    </div>
    
    {{-- エラーを表示 --}}
    @if (count($errors) > 0)
      @component('components.error_messages', ['errors' => $errors])
      @endcomponent
    @endif

    <form class="mx-auto grid max-w-screen-md gap-4 sm:grid-cols-2" method="POST" action="{{ route('diary.store') }}">
      @csrf
      <div class="sm:col-span-2">
        <label for="title" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">タイトル</label>
        <input name="title" class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
      </div>

      <div class="sm:col-span-2">
        <label for="content" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">本文</label>
        <textarea name="content" class="h-64 w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring"></textarea>
      </div>

      <div class="flex items-center justify-between sm:col-span-2">
        <button class="inline-block rounded-lg bg-indigo-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-indigo-600 focus-visible:ring active:bg-indigo-700 md:text-base">登録</button>
      </div>
    </form>
  </div>
</div>
@endsection
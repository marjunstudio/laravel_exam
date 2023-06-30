@extends('layouts.app')

@section('title', '日記一覧')

@section('content')
  <div class="bg-white px-16 py-7 sm:py-8 lg:py-12">
    <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
      <div class="mb-10 md:mb-3">
        <h2 class="text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">日記一覧</h2>
      </div>
      
      {{-- 日記検索フォーム --}}
      <x-search_form :items="$items" :keyword="$keyword" />

      {{-- 日記一覧表示 --}}
      <x-diary_index :items="$items" />
    </div>
  </div>
@endsection
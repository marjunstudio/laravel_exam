@extends('layouts.app')

@section('title', '日記作成')

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
      <x-diary_form>
        登録
      </x-diary_form>
    </form>
  </div>
</div>
@endsection
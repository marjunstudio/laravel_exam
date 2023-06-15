@extends('layouts.app')

@section('title', '日記一覧')

@section('content')
  <div class="bg-white px-16 py-7 sm:py-8 lg:py-12">
    <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
      <div class="mb-10 md:mb-16">
        <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">日記一覧</h2>
      </div>
      <section class="text-gray-600 body-font overflow-hidden">
        <div class="container px-5 p-4 mx-auto">
          <div class="-my-8 divide-y-2 divide-gray-100">
            @foreach ($items as $item)
            <div class="py-6 flex flex-wrap md:flex-nowrap">
              <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
                <span class="font-semibold title-font text-gray-700">ユーザー名</span>
                <span class="mt-1 text-gray-500 text-sm">{{$item->created_at}}</span>
              </div>
              <div class="md:flex-grow">
                <a href="/edit/{{$item->id}}">
                  <h3 class="text-2xl font-medium text-gray-900 title-font mb-2 hover:text-blue-400">{{$item->title}}</h3>
                </a>
                <p class="leading-relaxed">{{$item->content}}</p>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection
@extends('layouts.app')

@section('title', '日記詳細')

@section('content')
  <section class="text-gray-600 body-font">
    <div class="container px-4 py-7 sm:py-8 lg:py-12 mx-auto flex flex-col">
      <div class="lg:w-5/6 mx-auto">
        <div class="mb-10 md:mb-16">
          <h2 class="mb-4 text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">{{$diary->title}}</h2>
        </div>
        <div class="flex flex-col sm:flex-row mt-10">
          <div class="sm:w-1/3 text-center sm:pr-8 sm:py-8">
            <div class="w-20 h-20 rounded-full inline-flex items-center justify-center">
              <img src="{{asset($diary->user->image)}}">
            </div>
            <div class="flex flex-col items-center text-center justify-center">
              <h2 class="font-medium title-font mt-4 text-gray-900 text-lg">{{$diary->user->name}}</h2>
              <div class="w-12 h-1 bg-indigo-500 rounded mt-2 mb-4"></div>
              <p class="text-base">投稿日：{{$diary->created_at}}</p>
            </div>
          </div>
          <div class="sm:w-2/3 sm:pl-8 sm:py-8 sm:border-l border-gray-200 sm:border-t-0 border-t mt-4 pt-4 sm:mt-0 text-center sm:text-left">
            <p class="leading-relaxed text-lg mb-4">{{$diary->content}}</p>
          </div>
          <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex items-end">
            @if ($diary->user->id === auth()->id())
              {{-- 編集ボタン --}}
              <div class="m-3">
                <a href="{{ route('diary.edit', ['id'=>$diary->id]) }}">
                  <p class="font-semibold title-font text-gray-700 hover:text-indigo-400">
                    <i class="fa-solid fa-pen-to-square fa-lg"></i
                  ></p>
                </a>
              </div>
              {{-- 削除ボタン --}}
              <div class="m-3">
                <form action="{{ route('diary.destroy', ['id'=>$diary->id]) }}" method="POST", onsubmit="return confirm('本当に削除しますか？')">
                  @csrf
                  @method('DELETE')
                  <button class="font-semibold title-font text-gray-700 hover:text-red-400">
                    <i class="fa-solid fa-trash fa-lg"></i>
                  </button>
                </form>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
@extends('layouts.app')

@section('title', 'ユーザープロフィール')

@section('content')
<div class="bg-white px-16 py-7 sm:py-8 lg:py-12">
  <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
    <div class="mb-10 md:mb-3 ">
      <h2 class="text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">ユーザープロフィール</h2>
    </div>
    <div>
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="flex mx-auto text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">
          ログアウト
        </button>
      </form> 
      <a class="inline-block rounded-lg px-4 py-3 text-center text-sm font-semibold text-gray-500 outline-none ring-indigo-300 transition duration-100 hover:text-indigo-500 focus-visible:ring active:text-indigo-600 md:text-base" href="{{ route('diary_csv.export') }}">エクスポート</a>
    </div>
      <div class="lg:w-1/2 md:w-2/3 mx-auto">
        <div class="flex flex-wrap -m-2">
          <div>
            
          </div>
          <div class="flex mx-auto border-slate-300">
            <div class="p-2 mr-10 ">
              <div class="relative">
                <label for="name" class="leading-7 text-sm text-gray-600">ユーザー名</label>
                <p class="w-full bg-opacity-50 rounded focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                  {{$user->name}}
                </p>
              </div>
            </div>
            <div class="p-2">
              <div class="relative">
                <label for="email" class="leading-7 text-sm text-gray-600">メールアドレス</label>
                <p class="w-full rounded focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                  {{$user->email}}
                </p>
              </div>
            </div>
          </div>
          <div class="flex flex-col text-center w-full mt-12">
            <h1 class="sm:text-2xl text-xl font-medium title-font mb-4 text-gray-900">投稿した日記</h1>
          </div>
          <div class="container px-5 p-4 mx-auto">
            <div class="-my-8 divide-y-2 divide-gray-100">
              @foreach ($diaries as $diary)
              <div class="py-6 flex flex-wrap md:flex-nowrap">
                <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
                  <span class="font-semibold title-font text-gray-700">{{$user->name}}</span>
                </div>
                <div class="md:flex-grow">
                  <a href="{{ route('diary.show', ['id'=>$diary->id]) }}">
                    <h3 class="text-2xl font-medium text-gray-900 title-font mb-2 hover:text-blue-400">{{$diary->title}}</h3>
                  </a>
                  <p class="leading-relaxed">{{$diary->content}}</p>
                </div>
              </div>
              @endforeach
            </div>
          </div>
          <div class="p-2 w-full">   
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
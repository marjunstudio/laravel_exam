<!-- component -->
@extends('layouts.app')

@section('title', 'ダッシュボード')

@section('content')
<div class="bg-white px-16 py-7 sm:py-8 lg:py-12">
  <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
    <div class="mb-10 md:mb-3 ">
      <h2 class="text-center text-2xl font-bold text-gray-800 md:mb-6 lg:text-3xl">ダッシュボード</h2>
    </div>

    <section class="container px-4 mx-auto">
      <div class="sm:flex sm:items-center sm:justify-between">
        <div class="flex items-center mt-4 gap-x-3">
          {{-- csvインポート・エクスポート --}}
          <div class="flex">
            <div>
              <form action="{{ route('diary_csv.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" id="file" name="file" class="form-control" />
                <button class="w-1/2 px-5 py-2 mr-5 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">
                  インポート
                </button>
              </form> 
            </div>
            <a class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-gray-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-gray-600 dark:hover:bg-blue-500 dark:bg-blue-600" href="{{ route('diary_csv.export') }}">エクスポート</a>
          </div>
        </div>
      </div>
      {{-- ナビバー --}}
      <div class="mt-6 md:flex md:items-center md:justify-between">
          <div class="inline-flex overflow-hidden bg-white border divide-x rounded-lg dark:bg-gray-900 rtl:flex-row-reverse dark:border-gray-700 dark:divide-gray-700">
            <div class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 bg-gray-100 sm:text-sm dark:bg-gray-800 dark:text-gray-300">
              <a href="{{ route('dashboard.user_index') }}">ユーザー</a> 
              </div>

              <div class="px-5 py-2 text-xs font-medium text-gray-600 transition-colors duration-200 sm:text-sm dark:hover:bg-gray-800 dark:text-gray-300 hover:bg-gray-100">
                <a href="{{ route('dashboard.diary_index') }}">日記</a> 
              </div>
          </div>

        <div class="relative flex items-center mt-4 md:mt-0">
        </div>
      </div>

      <div class="flex flex-col mt-6">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
            <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
              {{-- テーブル --}}
              <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-800">
                  <tr>
                    <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                      ID
                    </th>
                    <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                      タイトル
                    </th>
                    <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                      コンテンツ
                    </th>                    
                    <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                      ユーザーID
                    </th>                    
                    <th scope="col" class="relative py-3.5 px-4">
                      <span class="sr-only">Edit</span>
                    </th>

                    <th scope="col" class="relative py-3.5 px-4">
                        <span class="sr-only">Destroy</span>
                    </th>
                  </tr>
                </thead>
                @foreach ($items as $item)
                  <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                    <tr>
                      <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                        <div>
                          <h2 class="font-medium text-gray-800 dark:text-white ">{{$item->id}}</h2>
                        </div>
                      </td>
                      <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                        <div>
                          <h2 class="font-medium text-gray-800 dark:text-white ">{{$item->title}}</h2>
                        </div>
                      </td>
                      <td class="px-4 py-4 text-sm whitespace-nowrap">
                        <div>
                          <h4 class="text-gray-700 dark:text-gray-200">{{$item->content}}</h4>
                        </div>
                      </td>
                      <td class="px-4 py-4 text-sm whitespace-nowrap">
                        <div class="flex items-center">
                          <h4 class="text-gray-700 dark:text-gray-200">{{$item->user_id}}</h4>
                        </div>
                      </td>
                      <td class="px-4 py-4 text-sm whitespace-nowrap">
                        <div class="px-1 py-1 text-gray-500 transition-colors duration-200 rounded-lg dark:text-gray-300 hover:bg-gray-100">
                          <a href="">編集</a> 
                        </div>
                      </td>

                      <td class="px-4 py-4 text-sm whitespace-nowrap">
                        <div class="px-1 py-1 text-gray-500 transition-colors duration-200 rounded-lg dark:text-gray-300 hover:bg-gray-100">
                          <a href="">削除</a> 
                        </div>
                      </td>
                    </tr>
                  </tbody>
                @endforeach
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
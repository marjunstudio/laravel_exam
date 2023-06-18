@extends('layouts.app')

@section('title', '日記一覧')

@section('content')
<!-- hero - start -->
<div class="bg-white pb-6 sm:pb-8 lg:pb-12">
  <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
    <section class="min-h-96 relative flex flex-1 shrink-0 items-center justify-center overflow-hidden rounded-lg bg-gray-100 py-16 shadow-lg md:py-20 xl:py-48">
      <!-- image - start -->
      <img src="https://cdn.pixabay.com/photo/2016/11/22/19/25/adult-1850177_1280.jpg" loading="lazy" alt="Photo by Fakurian Design" class="absolute inset-0 h-full w-full object-cover object-center" />
      <!-- image - end -->

      <!-- overlay - start -->
      <div class="absolute inset-0 bg-slate-300 mix-blend-multiply"></div>
      <!-- overlay - end -->

      <!-- text start -->
      <div class="relative flex flex-col items-center p-4 sm:max-w-xl">
        <h1 class="mb-8 text-center text-5xl font-bold text-zinc-300 sm:text-5xl md:mb-12 md:text-6xl">My Diary</h1>
        <p class="mb-4 text-center text-lg text-gray-200 sm:text-xl md:mb-8">"あなたの日記をシェアしよう。<br>共感とつながりを生む、共有できる日記アプリ。"</p>
        <div class="flex w-full flex-col gap-2.5 sm:flex-row sm:justify-center">
          <a href="/login" class="inline-block rounded-lg bg-gray-300 px-8 py-3 text-center text-sm font-semibold text-gray-600 outline-none ring-indigo-300 transition duration-100 hover:bg-gray-400 focus-visible:ring active:text-gray-700 md:text-base">ログインして、投稿する</a>
        </div>
      </div>
      <!-- text end -->
    </section>
  </div>
</div>
<!-- hero - end -->

<!-- call to action - start -->
<div class="bg-white py-6 sm:py-8 lg:py-12">
  <div class="mx-auto max-w-screen-2xl px-4 md:px-8">
    <div class="flex flex-col overflow-hidden rounded-lg bg-gray-200 sm:flex-row md:h-80">
      <!-- image - start -->
      <div class="order-first h-48 w-full bg-gray-300 sm:order-none sm:h-auto sm:w-1/2 lg:w-2/5">
        <img src="https://cdn.pixabay.com/photo/2021/10/14/13/50/book-6709160_1280.jpg" loading="lazy" alt="Photo by Andras Vas" class="h-full w-full object-cover object-center" />
      </div>
      <!-- image - end -->

      <!-- content - start -->
      <div class="flex w-full flex-col p-4 sm:w-1/2 sm:p-8 lg:w-3/5">
        <h2 class="mb-4 text-xl font-bold text-gray-800 md:text-2xl lg:text-4xl">思い出を共有</h2>

        <p class="mb-8 max-w-md text-gray-600">心の瞬間を共有し、思い出を永遠に。一緒に笑い、涙し、成長する喜びを分かち合う、思い出共有の場所。</p>

        <div class="mt-auto">
          <a href="/diary" class="inline-block rounded-lg bg-white px-8 py-3 text-center text-sm font-semibold text-gray-800 outline-none ring-indigo-300 transition duration-100 hover:bg-gray-100 focus-visible:ring active:bg-gray-200 md:text-base">投稿を見る</a>
        </div>
      </div>
      <!-- content - end -->
    </div>
  </div>
</div>
<!-- call to action - end -->
@endsection
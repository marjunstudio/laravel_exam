<header class="text-gray-600 body-font">
  <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
    <a href="/" class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
      <span class="ml-3 text-xl">MyDiary</span>
    </a>
    
    <nav class="md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-l md:border-gray-400	flex flex-wrap items-center text-base justify-center">
      <a href="{{ route('diary.index') }}" class="mr-5 hover:text-gray-900">日記一覧</a>
      <a href="{{ route('diary.create') }}" class="mr-5 hover:text-gray-900">日記作成</a>
    </nav>

    <div class="-ml-8 hidden flex-col gap-2.5 sm:flex-row sm:justify-center lg:flex lg:justify-start">
      {{-- ユーザーが未ログインの場合 --}}
      @guest
        @if (Route::has('login'))
          <a class="inline-block rounded-lg px-4 py-3 text-center text-sm font-semibold text-gray-500 outline-none ring-indigo-300 transition duration-100 hover:text-indigo-500 focus-visible:ring active:text-indigo-600 md:text-base" href="{{ route('login') }}">ログイン</a>
        @endif

        @if (Route::has('register'))
          <a class="inline-block rounded-lg bg-indigo-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-indigo-600 focus-visible:ring active:bg-indigo-700 md:text-base" href="{{ route('register') }}">新規登録</a>
        @endif
      {{-- ログイン済みの場合 --}}
      @else
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button class="font-semibold title-font text-gray-700 hover:text-red-400">
            ログアウト
          </button>
        </form>
      @endguest
    </div>
  </div>
</header>
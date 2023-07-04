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
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        <div @click.away="open = false" class="relative" x-data="{ open: false }">
          <button @click="open = !open" >
              <img src="{{ asset(Auth::user()->image) }}" alt="" class="w-16 h-16 rounded-full inline-flex items-center justify-center hover:bg-gray-300">
          </button>
          
          <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
            <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
              <a href="/profile" class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">プロフィール</a>
              
              {{-- 管理者ユーザーの場合表示 --}}
              @if (Auth::user()->is_admin == 'true')
                <a href="{{ route('dashboard.user_index') }}" class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">管理画面</a>
              @endif

              <form action="{{ route('logout') }}" method="POST" class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                @csrf
                <button>ログアウト</button>
              </form> 
            </div>
          </div>
        </div>
      @endguest
    </div>
  </div>
</header>
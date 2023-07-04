<div class="bg-white pt-6 sm:pt-8 lg:pt-12">
  <div class="mx-auto max-w-screen-2xl px-4 pb-4 md:px-8">
  @if (session('msg') && session('type') === 'success')
    {{-- 成功メッセージ --}}
    <div class="relative flex flex-wrap rounded-lg bg-sky-500 px-4 py-3 shadow-lg sm:flex-nowrap sm:items-center sm:justify-center sm:gap-3 sm:pr-8 md:px-8">
      <div class="order-1 mb-2 inline-block w-11/12 max-w-screen-sm text-sm text-white sm:order-none sm:mb-0 sm:w-auto md:text-base">{{session('msg')}}</div>
    </div>  
  @else
    {{-- エラーメッセージ --}}
    <div class="relative flex flex-wrap rounded-lg bg-red-500 px-4 py-3 shadow-lg sm:flex-nowrap sm:items-center sm:justify-center sm:gap-3 sm:pr-8 md:px-8">
      <div class="order-1 mb-2 inline-block w-11/12 max-w-screen-sm text-sm text-white sm:order-none sm:mb-0 sm:w-auto md:text-base">{{session('msg')}}</div>
    </div>
  @endif
</div>
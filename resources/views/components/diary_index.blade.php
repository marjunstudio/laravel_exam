<div class="container px-5 p-4 mx-auto">
  <div class="-my-8 divide-y-2 divide-gray-100">
    @foreach ($items as $item)
    <div class="py-6 flex flex-wrap md:flex-nowrap">
      <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col items-center">
        <p class="font-semibold title-font text-gray-700">{{ $item->user->name }}</p>
      </div>
      <div class="md:flex-grow">
        <a href="{{ route('diary.show', ['id'=>$item->id]) }}">
          <h3 class="text-2xl font-medium text-gray-900 title-font mb-2 hover:text-blue-400">{{ $item->title }}</h3>
        </a>
        <p class="leading-relaxed">{!! nl2br(e($item->content)) !!}</p>
      </div>
    </div>
    @endforeach
  </div>
</div>
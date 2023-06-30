<div class="sm:col-span-2">
  <label for="title" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">タイトル</label>
  <input name="title" value="{{ old('title', $form->title ?? '') }}" class="w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring" />
</div>

<div class="sm:col-span-2">
  <label for="content" class="mb-2 inline-block text-sm text-gray-800 sm:text-base">本文</label>
  <textarea name="content" class="h-64 w-full rounded border bg-gray-50 px-3 py-2 text-gray-800 outline-none ring-indigo-300 transition duration-100 focus:ring">{{ old('content', $form->content ?? '') }}</textarea>
</div>

<div class="flex items-center justify-between sm:col-span-2">
  <button class="inline-block rounded-lg bg-indigo-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-indigo-300 transition duration-100 hover:bg-indigo-600 focus-visible:ring active:bg-indigo-700 md:text-base">{{ $slot }}</button>
</div>
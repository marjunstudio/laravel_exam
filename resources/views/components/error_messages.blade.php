<div class="flex mx-auto max-w-screen-md p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
  <div>
    <span class="font-medium">入力内容に不備があります。</span>
    <ul class="mt-1.5 ml-4 list-disc list-inside">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
</div>

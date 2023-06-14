<html>
  <head>
  <title>Hello/Index</title>
    <style>
    body {font-size:16pt; color:#999; }
    h1 { font-size:100pt; text-align:right; color:#eee; margin:-40px 0px -50px 0px; }
    </style>
    @vite('resources/css/app.css')
  </head>
  <body>
    <h1>DiaryIndex</h1>
    <h3>投稿一覧</h3>
    @foreach ($items as $item)
    <p>タイトル：{{ $item->title }}</p>
    <p>内容：{{ $item->content }}</p>
    <p>{{ $item->created_at }}</p>

    @endforeach
  </body>
</html>
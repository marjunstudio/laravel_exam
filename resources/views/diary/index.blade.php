@extends('layouts.app')

@section('title', 'DiariesCreate')

@section('content')
  <h1>DiaryIndex</h1>
  <h3>投稿一覧</h3>
  @foreach ($items as $item)
  <p>タイトル：{{ $item->title }}</p>
  <p>内容：{{ $item->content }}</p>
  <p>{{ $item->created_at }}</p>

  @endforeach
@endsection
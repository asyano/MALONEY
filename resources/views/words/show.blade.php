{{-- words一覧・投稿画面 --}}
@extends('layouts.app')

@section('content')
 <div class="row">
        <aside class="col-sm-4">
          @include('users.card')
        </aside>
           <div class="col-sm-8">
      @include('users.navtabs')
    @if (Auth::id() == $user->id)
        {{-- 投稿フォーム --}}
        @include('words.form')
    @endif
        {{-- 投稿一覧 --}}
        @include('words.words')
        </div>
  </div>
@endsection
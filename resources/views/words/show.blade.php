{{-- words一覧・投稿画面 --}}
@csrf

@extends('layouts.app')

@section('content')
<div class="row">
    <aside class="col-sm-2">
      @include('users.card')
    </aside>
    <div class="col-sm-8">
        @include('users.navtabs')
    
        {{-- 投稿一覧 --}}
        @include('words.words')
    </div>
    <div class = "col-sm-2">
       @if (Auth::id() == $user->id)
            {{-- 投稿フォーム --}}
            @include('words.form')
        @endif
    </div>
</div>
@endsection
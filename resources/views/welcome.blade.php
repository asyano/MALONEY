@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="row">
            <aside class="col-sm-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ Auth::user()->name }}</h3>
                    </div>
                    <div class="card-body">
                        {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                        <img class="rounded img-fluid" src="" alt="">
                    </div>
                </div>
            </aside>
            
            <div class="col-sm-8">
            <ul class="nav nav-tabs nav-justified mb-3">
                {{-- 投稿タブ --}}
                <li class="nav-item"><a href="#" class="nav-link">TimeLine</a></li>
                {{-- Diaryタブ --}}
                <li class="nav-item"><a href="#" class="nav-link">Followings</a></li>
                {{-- Words一覧タブ --}}
                <li class="nav-item"><a href="#" class="nav-link">Followers</a></li>
            </ul>
        </div>
        
            <div class="col-sm-8">
                {{-- 投稿フォーム --}}
                @include('posts.form')
                {{-- 投稿一覧 --}}
                @include('posts.posts')
            </div>
        
            
        </div>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the posts</h1>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection
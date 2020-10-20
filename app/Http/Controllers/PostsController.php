<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
            $data = [];
            if(\Auth::check()) { // 認証済みの場合
             // 認証済みユーザを取得
              $user = \Auth::user();
             // ユーザの投稿の一覧を作成日時の降順で取得
             $posts = $user->posts() -> orderBy('created_at','desc')->paginate(10);
             
             $data = [
                 'user' => $user,
                 'posts' => $posts,
                 ];
        }
    
        return view('users.show', $data);
    }
    
      public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'content' => 'required|max:255',
        ]);

        // 認証済みユーザ（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
        $request->user()->posts()->create([
            'title' => $request->title,
            'content' => $request->content,
            'icon' => $request->icon,
            'color' => $request->color,
            'before_post_id' => $request->before_post_id,
            'first_post_flag' => $request->first_post_flag,
        ]);

        // 前のURLへリダイレクトさせる
        return back();
    }
    
     public function destroy($id)
    {
        // idの値で投稿を検索して取得
        $post = \App\Post::findOrFail($id);

        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
        if (\Auth::id() === $post->user_id) {
            $post->delete();
        }

        // 前のURLへリダイレクトさせる
        return back();
    }
}
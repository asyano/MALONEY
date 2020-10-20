<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
   public function show($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);

        // 関係するモデルの件数をロード
       $user->loadRelationshipCounts();

        // ユーザの投稿一覧を作成日時の降順で取得
        $posts = $user->posts()->orderBy('created_at', 'desc')->paginate(10);

        // ユーザ詳細ビューでそれらを表示
        return view('users.show', [
            'users'=> $user,
            'posts' => $posts,
        ]);
    }
}

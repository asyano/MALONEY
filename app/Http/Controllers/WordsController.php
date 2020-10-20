<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $data =[];
       if(\Auth::check()){
           $user = \Auth::user();
           $words = $user->words() -> orderBy('created_at','desc')->paginate(10);
     
     $data = [
         'user' => $user,
         'words' => $words,
         ];
     
            return view('words.show', $data);
       }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //認証済みユーザーの投稿として作成
        $request->user()->words()->create([
            'content' => $request->content,
            'category_id' => $request-> category_id,
        ]);
            
        //前のURLにリダイレクト
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $word = \App\Word::findOrFail($id);
        
        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
        if (\Auth::id() === $word->user_id) {
            $word->delete();
        }
        
        // 前のURLへリダイレクトさせる
        return back();
    }
}

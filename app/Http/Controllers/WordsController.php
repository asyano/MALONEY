<?php

namespace App\Http\Controllers;
use App\Word; // 追加
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
    public function store(Request $request, $content, $category_id)
    {
        //認証済みユーザーの投稿として作成
        $request->user()->words()->create([
            'content' => $content,
            'category_id' => $category_id,
        ]);
            
        //もとのページに戻る
        return response()->json([
            ], 200); //200が正常
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
        // idの値でWordを検索して取得
        $word = Word::findOrFail($id);

         // Wordの情報を更新する時
        $word->content = $request->content;
        $word->category_id = $request->category_id;
            
        $word->save();

        return redirect()->route('word.show', ['word' => $id]);
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
        
       //もとのページに戻る
        return response()->json([
            ], 200); //200が正常
    }
    
    
    
    /**
     * ドラッグ＆ドロップでカードのカテゴリを変更する
     */
     public function drop_category_change(Request $request, $id, $category_id)
     {
        // idの値で検索して取得
        $word = Word::findOrFail($id);
        
        //カテゴリを変更
        $word->category_id = $category_id;
        $word->save();

        //もとのページに戻る
        return response()->json([
                'category_id' => $word->category_id,
            ], 200); //200が正常
     }
     
      /**
     * 更新
     */
     public function word_edit(Request $request, $id, $contents)
     {
        // idの値で検索して取得
        $word = Word::findOrFail($id);
        
        //カテゴリを変更
        $word->content = $contents;
        $word->save();

        //もとのページに戻る
        return response()->json([
            ], 200); //200が正常
     }
}

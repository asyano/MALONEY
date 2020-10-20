@if(count($words) > 0)
   <ul class="test list-unstyled ui-widget-content" id="div1">
        @foreach ($words as $word)
            <li class=" media mb-3" >
                <div class="media-body" >
                    
                    {{-- ここで色を分けたい --}}
                    @if ($word->category_id == 1)
                        <div class ="card col-sm-4 bg-danger">
                    @else
                         <div class ="card col-sm-4 bg-info">
                    @endif
                        
                        
                        {{-- 投稿内容 --}}
                        <p class="mb-0">{!! nl2br(e($word->content)) !!}</p>
                        <p class="mb-0">{!! nl2br(e($word->category_id)) !!}</p>
                        <p class="mb-0">{!! nl2br(e($word->created_at)) !!}</p>
                        <div>
                        @if (Auth::id() == $word->user_id)
                            {{-- 投稿削除ボタンのフォーム --}}
                            {!! Form::open(['route' => ['words.destroy', $word->id], 'method' => 'delete']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                            {{-- 編集ボタンのフォーム --}}
                            {!! Form::open(['route' => ['words.edit', $word->id], 'method' => 'edit']) !!}
                                  {!! Form::submit('Edit', ['class' => 'btn btn-sm']) !!}
                            {!! Form::close() !!}
                        @endif
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    
    <div class ="card ui-widget-header" id = "delete">
        削除<br>
        削除<br>
          削除<br>
            削除<br>  削除<br>
              削除<br>
                削除<br>
                  削除<br>
    </div>
    {{-- ページネーションのリンク --}}
    {{ $words->links() }}
@endif
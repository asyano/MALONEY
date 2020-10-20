{{-- word投稿フォーム --}}
{!! Form::open(['route' => 'words.store']) !!}
    <div class="form-group">
        {{-- 内容 --}}
        内容{!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
        {{-- カテゴリ --}}
        カテゴリ{!! Form::textarea('category_id', old('category_id'), ['class' => 'form-control', 'rows' => '1']) !!}
        {!! Form::submit('Word', ['class' => 'btn btn-primary btn-block']) !!}
    </div>
{!! Form::close() !!}
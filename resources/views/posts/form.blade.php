{{-- post投稿フォーム --}}

{!! Form::open(['route' => 'posts.store']) !!}
    <div class="form-group">
       タイトル {!! Form::textarea('title', old('title'), ['class' => 'form-control', 'rows' => '2']) !!}
         内容 {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
       アイコン {!! Form::textarea('icon', old('icon'), ['class' => 'form-control', 'rows' => '2']) !!}
         色 {!! Form::textarea('color', old('color'), ['class' => 'form-control', 'rows' => '2']) !!}
       前投稿ID {!! Form::textarea('before_post_id', old('before_post_id'), ['class' => 'form-control', 'rows' => '2']) !!}
       頭投稿フラグ{!! Form::textarea('first_post_flag', old('first_post_flag'), ['class' => 'form-control', 'rows' => '2']) !!}
        {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}
    </div>
{!! Form::close() !!}
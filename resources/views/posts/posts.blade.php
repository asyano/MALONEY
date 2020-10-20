@if (count($posts ?? '') > 0)
    <ul class="list-unstyled">
        @foreach ($posts ?? '' as $post)
            <li class="media mb-3">
                <div class="media-body">
                    
                    
                {{-- ここが六角形 --}}   
                {{-- 六角形参考： https://spyweb.media/2017/12/21/css-responsive-hexagon/ --}}
                {{-- 吹き出し参考： http://php.o0o0.jp/article/jquery-balloons --}} 
                <div >
                    <span>
                        <div class="hexagon">
                            <div class="hexagon__inner-1"></div>
                            <div class="hexagon__inner-2"></div>
                            <div class="hexagon__inner-3"></div>
                        </div>
                    </span>
                    <p class="arrow_box">
                    {!! nl2br(e($post->title)) !!}<br>
                    {!! nl2br(e($post->content)) !!}<br>
                    {!! nl2br(e($post->icon)) !!}<br>
                    {!! nl2br(e($post->color)) !!}<br>
                    {!! nl2br(e($post->before_post_id)) !!}<br>
                    {!! nl2br(e($post->first_post_flag)) !!}<br>
                    </p>
                </div>

                <div>
                @if (Auth::id() == $post->user_id)
                    {{-- 投稿削除ボタンのフォーム --}}
                    {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'delete']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                        {{-- 編集ボタンのフォーム --}}
                    {!! Form::open(['route' => ['posts.edit', $post->id], 'method' => 'edit']) !!}
                          {!! Form::submit('Edit', ['class' => 'btn btn-sm']) !!}
                    {!! Form::close() !!}
                @endif
                </div>
            </div>
        </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $posts ?? ''->links() }}
@endif
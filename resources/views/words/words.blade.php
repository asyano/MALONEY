  {{-- 収納部分 --}}
<div class ="row">
      <div class ="card ui-widget-header category_1 col-2 selected" id = "category_1">
        category_1
           <br>
        <br>
          <br>
            <br>  
      </div>
      <div class ="card ui-widget-header category_2 col-2" id = "category_2">
        category_2
           <br>
        <br>
          <br>
            <br>  
      </div>
      <div class ="card ui-widget-header category_3 col-2" id = "category_3">
        category_3
          <br>
        <br>
          <br>
            <br>  
      </div>
      <div class ="card ui-widget-header category_4 col-2" id = "category_4">
        category_4
          <br>
        <br>
          <br>
            <br>  
      </div>
      
       <div class ="card ui-widget-header category_delete col-2" id = "category_delete">
        category_削除
         <br>
        <br>
          <br>
            <br>  
      </div>
</div>
    
    {{--4つ表示したら列を移動する  --}}
    <?php
    $i = 0;
    
    ?>
<div class = "row">
   <ul class="list-unstyled ui-widget-content col-3" id="div1">
     @if(count($words) > 0)
        @foreach ($words as $word)
        
          <li class="media mb-2" data-id = "{!! $word->id !!}" data-cate ="category_{!! $word->category_id !!}">
            <div class="media-body" >
              <div  class ="card category_{!! $word->category_id !!} p-2">
                {{-- 投稿内容 --}}
                <p class="mb-0">
                  <h3 contentEditable="true">{!! nl2br(e($word->content)) !!}</h3>
                </p>
              </div>
            </div>
          </li>
        @endforeach
      @endif  
        {{-- 新規投稿 --}}
        @if (Auth::id() == $user->id)
          <li class=" media mb-2">
            <div class="media-body" >
              <div class ="card category_10 p-2">
               <h3 contentEditable="true"> + </h3>
              </div>
            </div>
          </li>
        @endif
    </ul>
 </div>  

 
  

    {{-- ページネーションのリンク --}}
    {{ $words->links() }}

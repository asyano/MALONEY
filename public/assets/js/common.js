


//吹き出しマウスオーバー表示
$(function () {
  $('span').hover(function() {
    $(this).next('p').show();
  }, function(){
    $(this).next('p').hide();
  });
  
  
});




let defWord; 

//マウスクリック検出
$(function() {
  // #div1をdrag可能に
  
  
	$("#div1").sortable();
	$("#div1").disableSelection();
  
    let elem = document.getElementById('div1');
    
    
    //ダブルクリック
	 function dblclick(){ $(".card").dblclick(function () {
        //console.log( $(this).find("h3")[0].focus());
        
      defWord = $(this).find("h3")[0].innerText;
      
        const node =$(this).find("h3")[0];
        const editorRange = document.createRange();
        const editorSel = window.getSelection();
        editorRange.setStart(node, node.childNodes.length ? node.childNodes.length : node.length);
        editorRange.collapse(true);
        editorSel.removeAllRanges();
        editorSel.addRange(editorRange);
        
    });
	 }
	 
	  //登録
	  function touroku() { $(".media").focusout(function () {
	     
	    // console.log(defWord);
	     
	     //更新
	     if(defWord != $(this)[0].innerText){
	       if($(this)[0].dataset.id != "" && $(this)[0].dataset.id != null){
	         fetch('/word/word_edit/'+  $(this)[0].dataset.id + '/' +  $(this)[0].innerText, {method: 'POST'}).then(
	       );
	         
	       }
	       //新規
	       else{
	         fetch('/word/store/'+ $(this)[0].innerText + '/' + 10 , {method: 'POST'}).then(
	            function(response){
                response.json().then(function(json){
                   //新規専用カードを一つ増やす
                   //appendTo = jqueryのやつ
                   //[0]がdom
                   var newDiv = document.createElement("li"); 
                  $('<div class="media-body" ><div class ="card category_10 p-2"><h3 contentEditable="true"> + </h3></div></div>').appendTo(newDiv);
                 
                  $(newDiv).addClass("media mb-2 ui-sortable-handle");
                  
                  	$("#div1")[0].appendChild(newDiv);
                    dblclick();
                    touroku();
                })
               }
	           
	           );
	         
	       }
	        
	     }
	   });
	  }
	  
      dblclick();
      touroku();
  
	
  	//削除
  $("#category_delete" ).droppable({
      classes: {
        "ui-droppable-hover": "ui-state-hover"
       },
       drop: function( event, ui ) {
          fetch('/words/'+ ui.draggable[0].dataset.id , {method: 'DELETE'}).then(
             function(response){
                response.json().then(function(json){
                   ui.draggable[0].remove();
          })
         }
        );
      }
  	})

	let num =1;
  	let cate = [1,2,3,4];
  	
	cate.forEach(
	  num =>$( "#category_" + num ).droppable({
      classes: {
        "ui-droppable-hover": "ui-state-hover"
      },
      
      drop: function( event, ui ) {
        let cate_num = "category_" + num ;

        fetch('/word/drop_category_change/'+ ui.draggable[0].dataset.id + '/' + num, {method: 'POST'}).then(
          function(response){
            //ここで色を変える
            console.log(ui.draggable[0].dataset.cate, cate_num);
   
            response.json().then(function(json){
              if(ui.draggable[0].dataset.cate != cate_num){
                //もとの色と違くなる場合のみ
                ui.draggable.find('.card').switchClass(ui.draggable[0].dataset.cate, cate_num );
                ui.draggable[0].dataset.cate = cate_num;
              }
            });
          }
        );
      }
    })
  )

	
  $( "#delete" ).droppable({
      classes: {
        "ui-droppable-hover": "ui-state-hover"
      },
      
      drop: function( event, ui ) {
        
        //消しても良い
        //ここのthisは置き側のカード
        $( this )
          .addClass( "ui-state-highlight" )
          .find( "p" )
            .html( "Dropped!" );

          //  let elem = $( this )[0];
          //  let word_id = elem.dataset.id; 
            
            word_id = ui.draggable[0].dataset.id;
            console.log($(this)[0]);
             
             //テストなのでcate_idが２で固定。あとで直すこと
            fetch('/word/drop_category_change/'+ word_id + '/' + cate_id, {method: 'POST'}).then(
              function(response){
 
              console.log(ui.draggable.find('.card'));
              console.log(response);
              // response.json().then(function(json){
              //  disp.innerText = json.cute_count; //中身のテキストをCuteCountに変える
              // });
              
              //ここで収納部分のdata-idを取得したい
              console.log(ui.draggable[0].dataset);
              console.log($(this)[0]);
           
           
                //ここで色を変える
                response.json().then(function(json){

                  if(json.category_id == 2)
                  {
                    console.log("赤になるよ");
                    ui.draggable.find('.card').switchClass("bg-info", "bg-danger" );
                    //赤
                  }
                  else
                  {
                    console.log("青になるよ");
                    ui.draggable.find('.card').switchClass("bg-danger", "bg-info" );
                    //青
                  }
              });
            }
          );
        }
    });
});



//吹き出しマウスオーバー表示
$(function () {
  $('span').hover(function() {
    $(this).next('p').show();
  }, function(){
    $(this).next('p').hide();
  });
  
  
});

//マウスクリック検出
$(function() {
  // #div1をdrag可能に
	$("#div1").sortable();
	$("#div1").disableSelection();
	  
	$("#div1").draggable();
  $( "#delete" ).droppable({
      classes: {
        "ui-droppable-hover": "ui-state-hover"
      },
      drop: function( event, ui ) {
        $( this )
          .addClass( "ui-state-highlight" )
          .find( "p" )
            .html( "Dropped!" );
      }
    });
});
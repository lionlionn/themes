var timer;

function scrollingLeft(){
  var outterCWidth = $('#outtercontainer').width();
  var innerCWidth = $('#contenttable').width();
  if(parseInt($('#innercontainer').css('margin-left')) < 0){
    var newMargin = parseInt($('#innercontainer').css('margin-left')) + 5;
    if(newMargin > 0){
      newMargin = 0;
    }
    $('#innercontainer').css('margin-left', newMargin + 'px');
  }
  timer = setTimeout(function(){scrollingLeft();}, 30);
  
  checkLeft();
  checkRight();
}

function scrollingRight(){
  var outterCWidth = $('#outtercontainer').width();
  var innerCWidth = $('#contenttable').width();
  if(parseInt($('#innercontainer').css('margin-left')) > (outterCWidth - innerCWidth)){
    var newMargin = parseInt($('#innercontainer').css('margin-left')) - 5;
    if(newMargin < (outterCWidth - innerCWidth)){
      newMargin = (outterCWidth - innerCWidth);
    }
    $('#innercontainer').css('margin-left', newMargin + 'px');
  }
  timer = setTimeout(function(){scrollingRight();}, 30);
  
  checkLeft();
  checkRight();
}

function checkLeft(){
  if(parseInt($('#innercontainer').css('margin-left')) >= 0){
      //$('#scrollLeftButton').hide();
	  $('#scrollLeftButton').css("color","#ccc");
  }else{
	  $('#scrollLeftButton').show();  
	  $('#scrollLeftButton').css("color","#666666");
  }
}

function checkRight(){
  var outterCWidth = $('#outtercontainer').width();
  var innerCWidth = $('#contenttable').width();
	
  if(parseInt($('#innercontainer').css('margin-left')) <= (outterCWidth - innerCWidth)){
      //$('#scrollRightButton').hide();
	  $('#scrollRightButton').css("color","#ccc");
  }else{
	  $('#scrollRightButton').show(); 
	  $('#scrollRightButton').css("color","#666666");
  }
}

function getMLeft(){
   alert("margin-left--->"+parseInt($('#innercontainer').css('margin-left')))
}

function scrollingStop(){
  clearTimeout(timer);
}
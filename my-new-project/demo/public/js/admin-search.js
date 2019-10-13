$("#inp_search").click(function(){
  if(parseInt($("#search-load-data").attr("has-load")) == 0 && $(this).val() != "")
  {
    var url = $("#form-search").attr("load");
    $.get(url+"?search="+$(this).val(),function(data){
      $("#search-load-data").html(data).attr("has-load",1);
    });
  }
})
$("#inp_search").keydown(function(event){
  var x = event.keyCode|| event.which;
  var y = String.fromCharCode(x);
  var url = $("#form-search").attr("load");
  console.log("________________key search: "+$(this).val()+y+"________________");
  $.get(url+"?search="+$(this).val()+y,function(data){
    $("#search-load-data").html(data).attr("has-load",1);
  });

});

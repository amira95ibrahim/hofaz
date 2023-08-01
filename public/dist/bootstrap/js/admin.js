/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    function loading(){
        $("#maincontent").html('<div id="wait" style="width:120px;height:89px;border:0px solid black;position:absolute;top:50%;left:40%;padding:2px;"><img src="img/demo_wait.gif" width="64" height="64" /><br>جاري التحميل..</div>');
    }
 
$('.treeview-menu li a').click(function(){
 var object=$(this).parent('li');
   object.attr("class","active");
  $( ".treeview-menu  .active" ).removeClass("active");

  if(object.attr("data-go")!=""){
    loading();
  $("#maincontent").load(object.attr("data-go"));
    
  }
});

$('.treeview-menu li').click(function(){
 var object=$(this);
   $(this).attr("class","active");
  $( ".treeview-menu  .active" ).removeClass("active");

  if($(this).attr("data-go")!=""){
    loading();
  $("#maincontent").load($(this).attr("data-go"));
    
  }
});
        
   $('#users').click(function(){
            loading();
        $("#maincontent").load($(this).attr("data-go"));
       
         });
         $('#admins').click(function(){
            loading();
        $("#maincontent").load($(this).attr("data-go"));
       
         });
         
         $('#said').click(function(){
        loading();
             $("#maincontent").load($(this).attr("data-go"));
       
         });
         });
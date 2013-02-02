 
var currentIndex = 1;
$("document").ready(function(){
    $("#SearchBox").select();
    $('#NewSearchResults').hide();
    $("#SearchBox").click(function(){
        if($("#SearchBox").val()!=""){
            $('#NewSearchResults').show();				
        }
    });  	
    $("#SearchBox").focus(function(){
        if($("#SearchBox").val()!=""){
            $('#NewSearchResults').show();
        }
    });
	
    $("#SearchBox").blur(function(){
        if($("#SearchBox").val()!="")	{
           // $('#NewSearchResults').fadeOut(300);
        }

    });
    $("#SearchBox").keydown(function(e){  
        switch(e.keyCode) { 
            // User pressed "up" arrow
            case 38:
                if(--currentIndex<1)currentIndex = $("li").size() ;
                $("li").removeClass("highLight");
                $("#"+currentIndex).addClass("highLight");
                event.preventDefault();
          
                break;
            // User pressed "down" arrow
            case 40:
                event.preventDefault();
                if($("#message").is(":hidden") == true){
                    $('#message').show();
                }
                if(++currentIndex>$("li").size()){
                    currentIndex = 1;
                }
                $("li").removeClass("highLight");
                $("#"+currentIndex).addClass("highLight");         
                //$('#detailedMessage2').html(currentIndex);
                break;
            // User pressed "enter"
            case 13:
                event.preventDefault();
                getSelectedItem($("#"+currentIndex).val());        
           
                break;
        }
    });
    $("#SearchBox").keyup(function(e){
        if(e.keyCode==13 || e.keyCode==38 || e.keyCode==40)return;
        if($("#SearchBox").val()==""){
            $('#NewSearchResults').hide();
            return;
        }		
        $.post("membersearch/search",{
            searchword:$("#SearchBox").val(),
            criteria:active//"Native"//$("input[name='radio']:checked").attr("id")
            },function(data){
            if(data == ""){
                $('#NewSearchResults').hide();
                return;
            }	
            $("#NewSearchResults").show();             
            $("#data").html(data).show();
        });
    });
});
function getSelectedItem(t){
    /*
    $.post("MemberSearch/GetMemberInformation",{
        MemberId:t
    },function(data){
        $('#detailedMessage2').html(data).fadeIn();
    });
*/
}
function setSelectItem(s){   		
    currentIndex = parseInt(s); 
    $("li").removeClass("highLight");
    $("#"+s).addClass("highLight");
}
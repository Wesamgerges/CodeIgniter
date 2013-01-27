
/**
 * @author Wesam Gerges
 */

$("document").ready(function(){   
                            //Starting();
    $("#AdminLoginForm").submit(function(){
    	GetLoginInfo(); 
    	return false;
    });
 });
   
function GetLoginInfo(){ 
        $.post('login/logins',{UserName:$("#UserName").val() ,Password:$("#Password").val()},
        		 function(data) {
                            if(data != "FALSE")
                            {
                                $('#Message').html("<div class='TopMessage success'>Welcome "+ data +"</div>");
	          		$('#Message').delay(1000).fadeOut("slow",function(){
                                                     $('#Message').html("<br/>");
                                                     $('#Message').show();
                                             });
                                Exiting(1000, function(){
                                    $(".TopMessage").removeClass("TopMessage success");
                                    window.location = mainPageLocation;
                                });
                            }
                            else
                            {
                                 $('#Message').html("<div class='TopMessage error'> invalid user name or passsword</div>");
                                 $('#Message').delay(1000).fadeOut("slow",function(){
                                    $('#Message').html("<br/>");
                                    $('#Message').show()
                                });
                            }
                        });
}                 
    

function logOut()
{
	$.post("login/logout");
	//window.location = "logIn.php";	
	//$("#WelcomeMessage").html("<a href='javascript:Starting();' id='loginlink'>login</a> ");   
}
 function Exiting(c,f) {
         $('#LoginWindow').delay(c).hide('slow',
         	function(){
                    $("#UserName").val("");
                    $("#Password").val("");
                    f();
            });
 }
 function Starting()
 {
     $('#UserName').val(" ");     
     $('#Password').css("color","white");
     $('#Password').val(" ");    
     
     $('#LoginWindow').toggle('slow',
     				function(){ ;         
                           $("#UserName").val(""); 
                            $("#Password").val("");
                            $('#Password').css("color","black");
                     });
                  $('#UserName').focus();
 }
 
 

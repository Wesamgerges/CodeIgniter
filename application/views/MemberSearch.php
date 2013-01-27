<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title> Member Search </title>
        <link href="include/CSS/stylesheet.css" media="all" rel="stylesheet" type="text/css" />
        <link href="include/bootstrap/css/bootstrap.css" media="all" rel="stylesheet" type="text/css" />
        <link href="include/bootstrap/css/bootstrap-responsive.min.css" media="all" rel="stylesheet" type="text/css" />
    </head>
    <body> 
        <br/>
        <br/>
        <div class="container-fluid"> 
            <div class="row-fluid ">
                <div class="span12 center">

                    <div class="btn-group" data-toggle="buttons-radio" id="Searchcriteria">
                        <button type="button" class="btn btn-primary btn-large active" id ="native" onclick="active = 'Native';">Native</button>
                        <button type="button" class="btn btn-primary btn-large" onclick="active = 'Name';">Name</button>
                        <button type="button" class="btn btn-primary btn-large" onclick="active = 'Phone';">Phone</button>
                        <button type="button" class="btn btn-primary btn-large" onclick="active = 'Email';">Email</button>
                    </div> 
                    <br/><br/>  
                    <table align="center">
                        <tr><td align="center">
                                
                           
                    <div align = "right" id = "container" style = "width: 388px; " >  
                        <form class="form-search" style = " ">
                            <div class="input-append">
                                <input type="text" class=" input-xlarge search-query" id="SearchBox">
                                <button type="submit" class="btn search-btn"><i class="icon-search"></i></button>
                            </div>




                            <div id="NewSearchResults" style="max-height:420px; overflow: auto;">                           
                                <div id="data">
                                </div>
                            </div>
                        </form>
                    </div>
 </td></tr>
                    </table>
                    <br/>
                    <div id="detailedMessage" align="center" ></div>
                    <div id="detailedMessage2" align="center"></div>
                </div>
            </div>                      
        </div>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script>
            var active = "Native";
        $("#SearchBox").attr("dir","rtl");
        $("#NewSearchResults").attr("dir","rtl");
        $(function(){
            $('.btn').click(function(){
                $("#SearchBox").focus();
                //$('#NewSearchResults').hide();
                //$("#SearchBox").val("");
                $("#SearchBox").select();
                $("#SearchBox").keyup();
                //$("#data").attr("dir","rtl");
                if(active == "Native")
                {
                    $("#SearchBox").attr("dir","rtl");
                    $("#NewSearchResults").attr("dir","rtl");
                           
                }
                else
                {
                    $("#SearchBox").attr("dir","ltr");
                    $("#NewSearchResults").attr("dir","ltr");
                           
                }
            }) ;
            $("#NewSearchResults").click(function(){
                $("#SearchBox").focus();
            });
        });
        /*
            $(function () {
                //scroller = $('.box-wrap').antiscroll().data('antiscroll');
                $( "#Searchcriteria" ).buttonset();
                $("input[name=radio]:radio").change(function(){
                   
                    $("#data").html("");
                    $("#detailedMessage").html("");
                    $("#detailedMessage2").html("");
                    $("#SearchBox").val("").focus();
               
                });
                $("#nn").click(function(){alert("meeee");
                });
                // $().button('toggle');
                /* $("button").click(function(){
                    alert(",e");
                });*/
        /*});
         */
        </script>
        <script lang="text/javascript" src="include/JS/memberSearch.js"></script> 
        <script lang="text/javascript" src="include/bootstrap/js/bootstrap-button.js"></script> 


    </body>
</html>

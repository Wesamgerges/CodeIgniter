<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title> Member Search </title>
        <link href="include/CSS/stylesheet.css" media="all" rel="stylesheet" type="text/css" />
        <link href="include/bootstrap/css/bootstrap.css" media="all" rel="stylesheet" type="text/css" />
        <link href="include/bootstrap/css/bootstrap-responsive.min.css" media="all" rel="stylesheet" type="text/css" />
        <!-- HTML5 shim for IE backwards compatibility -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>    
        
        
        <nav class="navbar navbar-inverse">
            <div class="navbar-inner">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a class="brand" href="#">Wesam Gerges</a>
                <div class="nav-collapse">
                    <ul class="nav">
                        <li class="active"><a href="main">Home</a></li>
                        <li><a href="#">Skills</a></li>
                        <li><a href="#">Projects</a></li>
                        <li><a href="#">Education</a></li>                        
                    </ul>
                    <ul class="nav pull-right">
                        <li>
                        </li>
                        <li class="">
                            <a href="#">
                                <img src="include/images/bluemanmxxl.png" width="25px"> Login</a>
                        </li>
                        <li>
                            <a href="#"></a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>  
        
        <div class="container-fluid"> 
            <div class="row-fluid ">

                <div class="span4"></div>
                <div class="span4">
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="btn-group" data-toggle="buttons-radio" id="Searchcriteria">
                        <button type="button" class="btn btn-primary btn-large active" id ="native" onclick="active = 'Native';">Native</button>
                        <button type="button" class="btn btn-primary btn-large" onclick="active = 'Name';">Name</button>
                        <button type="button" class="btn btn-primary btn-large" onclick="active = 'Phone';">Phone</button>
                        <button type="button" class="btn btn-primary btn-large" onclick="active = 'Email';">Email</button>
                    </div> 
                </div>
                <div class="span4"></div>
            </div>
            <br/>
            <div class="row-fluid ">
                <div class="span12 center">
                    <div class="span4"></div>
                    <div class="span4">
                        <div align = "right" id = "container" style = "width: 388px; " >  
                            <form class="form-search" style = " ">
                                <div class="input-append">
                                    <input type="text" class=" input-xlarge search-query" id="SearchBox" autocomplete="off">
                                    <button type="submit" class="btn search-btn"><i class="icon-search"></i></button>
                                </div>


                                <div id="NewSearchResults" style="max-height:420px; overflow: auto;">                           
                                    <div id="data">
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                    <div class="span4" id="memberInformation">
            
                    </div>                    
                </div>
            </div>


            <br/><br/>  

            <br/>
            <div id="detailedMessage3" align="center" ></div>
            <div id="detailedMessage23" align="center"></div>

        </div>

        <script type="text/template" id="MemberInfo">
            <div class="img-polaroid img-rounded" >
                <img src="include/images/cross-icon.png" style="width: 180px;height: 180px" class=" pull-right"/>
                <br/>
                <h3><%= FirstName + " " + LastName %></h3>
                <% if ( native_name ) { %>
                    <h3><%= native_name %> </h3>
                    <% }else{ %>
                    <br/>
                    <%}%>
                <h4 style="color:gray;"><%= Phone %></h4>
                <div style="text-align: left; padding: 15px;">
                    <h5> <%= HouseNo  + " " + Street  + " " + Floor + ",<br/> " + City + " " + State  + ". " + ZIP  %> </h5>
                    <h5>Single</h5>
                    <h5><%= Email %></h5>

                </div>
            </div>
            
        </script>
        <script src="//code.jquery.com/jquery.js"></script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.4.3/underscore-min.js"></script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/backbone.js/0.9.10/backbone-min.js"></script>
        <!--        BackboneJS              -->
        <script>
            person = Backbone.Model.extend({
		initialize:function (){
			//console.log("Hello world!");
			this.bind("change:name",function(){
				console.log(this.get("name")+"hello");
			});
		},	
		
		defaults:{	
                    
		},
		
		validate: function(){
                   
		},
		urlRoot:"members/member/id/"
            });
            
            var BBView = Backbone.View.extend({
		initialize: function(){
           
                },
                
		events:
                    {
                        "click li": "getId"
                    },
		el: "#container",		
		template:   _.template($("#MemberInfo").html()),
                
                getId: function(event){
                    this.model.set( "id", parseInt( $(event.currentTarget).val() ));  
                   
                    var self = this;
                    this.model.fetch({
                            success: function ( user ) {
                                     if(    self.model.get(  "City"     )   == null )  self.model.set(  "City"      , " "   );
                                     if(    self.model.get(  "Floor"    )   == null )  self.model.set(  "Floor"     , " "   );
                                     if(    self.model.get(  "HouseNo"  )   == null )  self.model.set(  "HouseNo"   , " "   );
                                     if(    self.model.get(  "Street"   )   == null )  self.model.set(  "Street"    , " "   );
                                     if(    self.model.get(  "State"    )   == null )  self.model.set(  "State"     , " "   );
                                     if(    self.model.get(  "ZIP"      )   == null )  self.model.set(  "ZIP"       , " "   );
                                    self.render();
                            }
                    });
                },
		render:function(){
			
			$("#memberInformation").html(this.template(this.model.toJSON()));
			return this;
		}
		
            });
            var person = new person();
           
            var v = new BBView({model:person});
            
        </script>
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
         <script type="text/javascript" src="include/bootstrap/js/bootstrap.min.js"></script>   
        <script lang="text/javascript" src="include/bootstrap/js/bootstrap-button.js"></script> 


    </body>
</html>

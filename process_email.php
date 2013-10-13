 
 
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>CSS and jQuery Tutorial: Overlay with Slide Out Box</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" href="css/style.css" type="text/css" charset="utf-8"/>
    </head>
    <style>
        body{
/*            background:transparent url(title.png) no-repeat top center;*/
            font-family:Arial;
            height:2000px;
        }
        .header
        {
            width:600px;
            height:56px;
            position:absolute;
            top:0px;
            left:25%;
/*            background:#fff url(title.png) no-repeat top left;*/
        }
/*        a.back{
            width:256px;
            height:73px;
            position:fixed;
            bottom:15px;
            right:15px;
            background:#fff url(codrops_back.png) no-repeat top left;
            z-index:1;
            cursor:pointer;
        }*/
       
        /* Style for overlay and box */
        .overlay{
/*            background:transparent url(views/img/overlay.png) repeat top left;*/
            position:fixed;
            top:0px;
            bottom:0px;
            left:0px;
            right:0px;
            z-index:100;
        }
        .box{
            position:fixed;
            top:-200px;
            left:30%;
            right:30%;
            background-color:#fff;
            color:#7F7F7F;
            padding:20px;
            border:2px solid #ccc;
            -moz-border-radius: 20px;
            -webkit-border-radius:20px;
            -khtml-border-radius:20px;
            -moz-box-shadow: 0 1px 5px #333;
            -webkit-box-shadow: 0 1px 5px #333;
            z-index:101;
        }
        .box h1{
            border-bottom: 1px dashed #7F7F7F;
            margin:-20px -20px 0px -20px;
            padding:10px;
            background-color:#FFEFEF;
            color:#EF7777;
            -moz-border-radius:20px 20px 0px 0px;
            -webkit-border-top-left-radius: 20px;
            -webkit-border-top-right-radius: 20px;
            -khtml-border-top-left-radius: 20px;
            -khtml-border-top-right-radius: 20px;
        }
        a.boxclose{
            float:right;
            width:26px;
            height:26px;
            background:transparent url(views/img/cancel.png) repeat top left;
            margin-top:-30px;
            margin-right:-30px;
            cursor:pointer;
        }

    </style>
    <body>
        
        
        
        <div class="content">
            <!-- The activator -->
            <a class="activator" id="activator"></a>
        </div>

        <div class="footer">
            <a class="back" href="http://www.tympanus.net/codrops/2009/12/03/css-and-jquery-tutorial-overlay-with-slide-out-box/"></a>
        </div>

        <!-- The overlay and the box -->
        <div class="overlay" id="overlay" style="display:none;"></div>
        <div class="box" id="box">
            
        
            <a class="boxclose" id="boxclose"></a>
            <h1>Your password is sent to the below email address</h1>
            <p>
                <?php echo $login->email; ?>
            </p>
        </div>

        <!-- The JavaScript -->
        <script type="text/javascript" src="jquery-1.3.2.js"></script>
        <script type="text/javascript">
          
    $(function() {
        
        
             
                $('#overlay').fadeIn('fast',function(){
                    $('#box').animate({'top':'160px'},500);
                });

                $('#boxclose').click(function(){
                    $('#box').animate({'top':'-200px'},500,function(){
                        $('#overlay').fadeOut('fast');
                        
                        // similar behavior as an HTTP redirect
                window.location.replace("index.php");
                
                    });
                });

        });
            
        </script>
    </body>
</html>
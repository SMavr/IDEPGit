
 <!DOCTYPE html>
    <html>
    <head>
        
        <title>IDEP Login Form</title>
       
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
   
    </head>
    <body>
    <div class= "well" style=" width:400px; margin:0 auto; margin-top: 100px;" >
        <form id ="loginform" action="login.php" method="post">
            <fieldset>
                <legend style="text-align: center;">Please Login</legend>
                <input type="text" class="input-block-level" placeholder="username" name="username" id="username">
                <input type="password" class="input-block-level" placeholder="password" name="password" id="password">
                <input type="submit" class="btn btn-primary" value="Login" >
                  <a class="btn btn-info">Register</a>
                <label class="checkbox">
                    <input type="checkbox">Remember me
                </label>
            </fieldset>  
        </form>
        
      
    </div>
                 
      <div id=display> </div>
    
     <?php require_once BOOTSTRAP; //I have to test if works?>

  
    </body>
    </html>

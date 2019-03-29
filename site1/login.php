<?php 
    require_once('config.php');
?>
<html lang="en">
    <head>
        <?php 
            require_once('includes/inc.head.php') ;
        ?>
        <title>Create Event</title>
    </head>
    <body>
        <header>
           <?php require_once('includes/inc.header.php') ?>
            
            
        </header>
        <main>
            <div class="container">
                  <div class="loginDropdown">
                        <form>
                              <input placeholder="Email" type="text" name="email"/>
                              <input placeholder="Password" type="password"/>
                              <input type="checkbox" />
                              <label>Remember me</label>
                              <button class="btn">Submit</button>
                              <a href="#">Forgot Password?</a>
                              <button class="loginCloseBtn">Close</button>
                        </form>
                  </div>
            </div>
            
        </main>
        <footer>

        </footer>
    </body>
    
    

<script>
      $('.loginDropdown form').on('submit', function(e){
            e.preventDefault();
            var email = $(this).find('input[name="email"]').val();
            var password = $(this).find('input[type="password"]').val();
            console.log(email);
            var data = {
                  method:'userLogin',
                  email:email,
                  password:password,
            }  
            $.ajax({
                  url:'api.php',
                  data:data,
                  dataType:'json',
                  success:function(result){
                        console.log(result);
                        if(result.status=='active'){
                              if(result.data==null){
                                    alert('User doesnt exist');
                              }
                              // else if(result.data == )
                              else{
                                    // window.location.href="home.php";
                              }
                        }
                  }
            })
      })
      
      $('.loginCloseBtn').on('click', function(){
            $('.loginDropdown').hide();
      })
</script>

</html>

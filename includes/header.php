    
<div class="head">
            <a href="index.html">
                <img alt="PGlogo" src="img/logo.png" class="logo">
            </a> 
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#my-navbar">
            <span class="navbar-toggler-icon"></span>
        </button>
              
<?php
            
            //Check if user is loging or not
            
            
           
            if (isset($_SESSION["user_id"])) 
            {
           
            ?>
            <div  class="register">
                Hi, <?php echo $_SESSION["full_name"] ?>  
                
                
               
                <a  id="signup" class="nav-link" href="dashboard.php" >
                        <i class="fas fa-user"></i>Dashboard
                </a>
                
                
           
                    <a class="nav-link" href="logout.php">
                        <i class="fas fa-sign-out-alt"></i>Logout
                    </a>
            
            </div>
            <?php
            }else{
            
                 ?>
 
                 <div class="register">
                 <a id="signup"  class="nav-link" href="#" data-toggle="modal" data-target="#signup-modal" >
                 <i class="fas fa-user"></i>Signup
                 </a>
                 
                 
                 <a class="nav-link " href="#" data-toggle="modal" data-target="#login-modal">
                 <i class="fas fa-sign-in-alt"></i>Login
                 </a>
                 </div>
                 <?php
            }?>
            </div>
<div id="loading">
</div>



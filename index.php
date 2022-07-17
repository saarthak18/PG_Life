<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
       
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/index2.css" rel="stylesheet"/>
        <title>Welcome | PG Life</title>
        <?php
        include "includes/head_links.php";
        ?>
    
    </head>
    <body>
        
     <?php
     
     include "includes/header.php";
     ?>
 
        
        

       
        <div class="search">
           
            
            
            <form id="search-form">
                <h2 class="shead">Happines per Square Foot</h2>
                <div class="input-group city-search">
                    <input type="text" class="form-control input-city" id='city' name='city' placeholder="Enter your city to search for PGs" />
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        
        </div>
        <div class="cities">
            <h1 class="hcity">Major Cities</h1>
            <div class="city-imgs">
                <a href="property_list.html" style="text-decoration: none;">
                    <img src="img/delhi.png" class="city-img" id="city1" />
                    <img src="img/mumbai.png" class="city-img" />
                    <img src="img/bangalore.png" class="city-img" />
                    <img src="img/hyderabad.png" class="city-img" />
                </a>
            </div>
        </div>

       

        
    
    <?php
    include "includes/signup_modal.php";
    include "includes/login_modal.php";
    include "includes/footer.php";
    ?>
        
    </body>
</html>
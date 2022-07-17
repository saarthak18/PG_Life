
<?php
session_start();
require "includes/database_connect.php";

if (!isset($_SESSION["user_id"])) {
    header("location: index.php");
    die();
}
$user_id = $_SESSION['user_id'];

$sql_1 = "SELECT * FROM users WHERE id = $user_id";
$result_1 = mysqli_query($conn, $sql_1);
if (!$result_1) {
    echo "Something went wrong!";
    return;
}
$user = mysqli_fetch_assoc($result_1);
if (!$user) {
    echo "Something went wrong!";
    return;
}

$sql_2 = "SELECT * 
            FROM interested_users_properties iup
            INNER JOIN properties p ON iup.property_id = p.id
            WHERE iup.user_id = $user_id";
$result_2 = mysqli_query($conn, $sql_2);
if (!$result_2) {
    echo "Something went wrong!";
    return;
}
$interested_properties = mysqli_fetch_all($result_2, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | PG Life</title>
    <?php
    include "includes/head_links.php";
    ?>
    <link rel="stylesheet" href="css/dashboard.css">
</head>

<body>
    <?php
    include "includes/header.php";
    ?>

    <div class="navbar">
        <a class="navbutton" href="index.php" >
            Home
        </a> 
    
        
        <h1 class="navtxt"> 
            
        / Dashboard
     </h1>
        
    </div>
    <div class="profile">
        <div class="myprofile">
            <h1>My Profile</h1>
            <i class="fas fa-user profile-img"></i>
            <div class="details">
                
                   
                        <div class="name"><h4><?= $user['full_name'] ?></h4></div>
                        <div class="email"><?= $user['email'] ?></div>
                        <div class="phone"><?= $user['phone'] ?></div>
                        <div class="college"><?= $user['college_name'] ?>
                
                    
                        <i class="edit">Edit Profile</i>
                    </div>
                    
                        
                
            </div>
        </div>
        
    </div>

    <?php
    if (count($interested_properties) > 0) {
    ?>
    <div class="interested_props">
        <div class="props_head">
            <h1 style="font-size:36px;font-weight:600px:margin-bottom:40px">My Interested Properties</h1>
            <?php
                foreach ($interested_properties as $property) {
                    $property_images = glob("img/properties/" . $property['id'] . "/*");
                ?>
                <div class="propertycards" >
                    <div class="prop_img">
                        <img class="pimg" src="<?= $property_images[0] ?>" />
                    </div>
                    <div class="content">
                        <?php
                                    $total_rating = ($property['rating_clean'] + $property['rating_food'] + $property['rating_safety']) / 3;
                                    $total_rating = round($total_rating, 1);
                        ?>
                          <div class="star-container" title="<?= $total_rating ?>">
                                    <?php
                                    $rating = $total_rating;
                                    
                                    for ($i = 0; $i < 5; $i++) {
                                        if ($rating >= $i + 0.8) {
                                    ?>
                                            <i id="star1" class="fas fa-star"></i>
                                        <?php
                                        } elseif ($rating >= $i + 0.3) {
                                        ?>
                                            <i class="fas fa-star-half-alt"></i>
                                        <?php
                                        } else {
                                        ?>
                                            <i class="far fa-star"></i>
                                    <?php
                                        }
                                    }
                                    ?>
                            </div>
                            <div class="interested-container">
                                    <i class="is-interested-image fas fa-heart" property_id="<?= $property['id'] ?>"></i>
                                </div>
                                <div class="detail-container">
                                <div class="property-name"><?= $property['name'] ?></div>
                                <div class="property-address"><?= $property['address'] ?></div>
                                <div class="property-gender">
                                    <?php
                                    if ($property['gender'] == "male") {
                                    ?>
                                        <img src="img/male.png">
                                    <?php
                                    } elseif ($property['gender'] == "female") {
                                    ?>
                                        <img src="img/female.png">
                                    <?php
                                    } else {
                                    ?>
                                        <img src="img/unisex.png">
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="row no-gutters">
                                <div class="rent-container col-6">
                                    <div class="rent">₹ <?= number_format($property['rent']) ?>/-</div>
                                    <div class="rent-unit">per month</div>
                                </div>
                                <div class="button-container col-6">
                                    <a href="property_detail.php?property_id=<?= $property['id'] ?>" class="btn btn-primary">View</a>
                                </div>
                            </div>



                    </div>

                    
                 </div>
       
    <?php
                }
                ?>
                 </div>
 <?php
    }
    ?>  
    

    </div>
    <?php
    include "includes/footer.php";
    ?>
</body>
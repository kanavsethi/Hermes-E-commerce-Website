<?php
    $conn =mysqli_connect("localhost", "root", "","hermes") or die("Error connecting to database: ".mysqli_error());
   
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Search results</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="searchcss.css">
    <script type="text/javascript">function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}</script>
</head>
<body>
<?php
    
    echo '<div id="header">
    <header>
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
    <form action="searchresult.php" method="GET">
        <input type="text" placeholder="Search Here" name="search">
        <input type="submit" value="Search">
    </form>
    <img src="hermes_our_logo.png" alt="Hermes">
    <a href="login.html" alt="Login"><input class="button" type="button" value="Login" ></a>
    </header>
    </div>
            <h2 style="margin: 0 0 5px 25%">Search Result</h2>
            <div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="homepage.html">Homepage</a>
  <a href="fashion.html">Fashion</a>
  <a href="bags.html">Bags</a>
  <a href="shoes.php">Shoes</a>
  <a href="laptop.html">Laptop</a>
  <a href="mobile.html">Mobile</a>
  <a href="#">Cart</a>
  <a href="Login.html">Login</a>
  <a href="#">Terms & Conditions</a>
</div>';
      
    
    $query = $_GET['search']; 

     
    $min_length = 3;
    
     
    if(strlen($query) >= $min_length){ 
         
        $query = htmlspecialchars($query); 
       
         
        $query = mysqli_real_escape_string($conn,$query);

         $qry ="SELECT * FROM search WHERE SearchTerm LIKE '%".$query."%'"; 
        
        $raw_results = mysqli_query($conn,$qry) or die(mysqli_error($conn));
        
         
        if(mysqli_num_rows($raw_results) > 0){ 
           echo '<div class="content">' ;
            while($results = mysqli_fetch_array($raw_results)){
             
                echo '
                    <div class="item">
                        <div class="image_container">
                          <a href="single'.$results['ID'].'.php"><img src="'.$results['ID'].'.jpg" alt="'.$results['model'].'" class="item_image"></a>
                          <div class="middle">
                            <div class="text"><button style="width: 100%;height: 100%;background-color: #ffe6ff;"><img class="cart_icon" src="cartr.png"></button></div>
                          </div>
                        </div>
                        <div class="item_details">
                            <div class="item_name">
                                <strong style="margin-bottom: 0px; margin: auto;">'.$results['company'].'</strong><p style="margin-bottom: 0px;margin: auto;">'.$results['model'].'</p><strike style="margin-top: 0px; margin: auto;">'.$results['price'].'</strike><strong style="margin-top: 0px; margin: auto;">'.$results['offered'].'</strong>
                            </div>
                        </div>
                    </div>';
                    
            }
             echo'</div>';
        }
        else{ 
            echo "No results";
        }
         
    }
    else{ 
        echo "Minimum length is ".$min_length;
    }

    
    echo'
    <div class="footer">
<footer>
<div class="column">
<h2>About Us</h2>
<p>We live in the 21st centery and here we phaadh people need to buy stuff online. 
    So we ultra phaadh people came up with a site where normal phaadh people and G ,
    can buy stuff and chill out.</p>
<img src="fb.png">
<img src="insta.png">
<img src="twi.png">
<img src="pin.png">
</div>
<div class="column">
    <h2>Our Guarantee</h2>
    <p>We are so phaadh that you dont even need a guarantee. We will deliver amazing stuff to you toally free of cost and you will just fall in love with us. </p>
<img src="freedelivery.png">
<img src="30day.png">
     </div>
<div class="column">
    <h2>Subscribe</h2>
<p>Subscribe to our amazing page to get the latest updates on our amazing collection of clothes and ultimate offers and discounts.</p>
<input type="text" placeholder="Enter your email address" class="subscribe">
<input type="submit" value="Subscribe" class=" subscribe_btn">
</div>
</footer>
</div>'
    ?>
</body>
</html>
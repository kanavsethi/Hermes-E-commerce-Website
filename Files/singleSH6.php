<?php
    $conn =mysqli_connect("localhost", "root", "","hermes") or die("Error connecting to database: ".mysqli_error());
   
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Company Name</title>
        <link rel="icon" href="icon.png">
        <style>
            *{
                box-sizing: border-box;
            }
            @font-face 
            {
                font-family: WorkSans-Thin;
                src: url(WorkSans-Thin.ttf);
            }
            *{
                font-family: WorkSans-Thin;
                color: black;
            }
            body
            {
                padding: 0;
                margin: 0;                
            }
            .header
            {
                z-index: 10;
                background: linear-gradient(to right, #AD1457,#6A1B9A);
                width: 100%;
                height:15%;
                position: fixed;
                top: 0;
                left: 0;
            }
            .header_logo
            {
                position: fixed;
                width: 18%;
                height: 8%;
                float: left;
                margin: 2% 0 0 15%;                
            }
            .body
            {
                padding: 10% 15% 0% 15%;
                margin-bottom: 50px;
            }            
            .side_menu
            {
                float: left;
                width: 40%;
                height: auto;
                border-right: 4px solid #ffe6ff;
                overflow: scroll;                
            }
            .content::-webkit-scrollbar
            {
                display: none;
            }
            .side_menu::-webkit-scrollbar
            {
                display: none;
            }
            .content
            {                
                float: right;
                width: 55%;
                height: 80%;
                overflow: scroll;
                margin-bottom: 20px;
            }
            .content::-webkit-scrollbar
            {
                display: none;
            }            
            .item
            {
                float: left;
                margin: 1%;
                max-width: 380px;
                max-height: 600px;
                min-width: 380px;
                min-height: 600px;
                transition: box-shadow 0.5;
            }
            .item:hover
            {
                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            }
            .image_container 
            {
                position:sticky;
                float: left;
                width: 380px;
                height: 600px;
                padding: 0%;
                background-color:#ffffff;
            }
            .item_image 
            {
                opacity: 1;
                display: block;
                width: 100%;
                height: 600px;
                transition: .5s ease;
            }
            .text 
            {
                color: white;
                text-align: center;
                font-size: 16px;
                padding: 1px;
            }
            .item_details
            {
                
                width: 100%;
                height: auto;
            }
            .item_name
            {
                width: 100%;
                margin-bottom: 20px;
            }
            .footer
            {
                background-color:#ffe6ff;
                width: 100%;
                height: auto;
                clear: both;
                position: relative;
                z-index: 0;
                margin-top: 5%;
                padding: 2% 15% 5% 15%;                
            }
            .footer_text 
            {               
                column-count: 3;   
                column-gap: 40px;                
                column-rule-style: solid;             
                column-rule-width: 1px;               
                column-rule-color: lightblue;
            }
            .icons
            {
                width: 100%;
                height: auto;
                b
                padding: 1px;
            }
            .icon_container
            {
                width: 100%;
                height: auto;
                b
                padding: 1px;
                text-align: left;
            }
            .icon
            {
                width: 50px;
                height: 50px;
                margin: 0px 2px 0px 0px;             
            }
            .social
            {
                width: 100%;
                height: 70px;
                display: block;                
                margin:0 0 0 0;                
            }
            .social_icon
            {
                width: 50px;
                height: 50px;
                margin: 0px 2px 0px 3px;
            }
            .cart_icon
            {
                width: 38px;
                height: 38px;
                margin: 0px 2px 0px 3px;
            }
            ul 
            {
                list-style-type: none;
            }
            li
            {
                float: left;
            }
            .rights
            {
                padding: 1px;
                width: 100%;
                height: 70px;
                margin: 0px 0px 0px 0px;
            }
    </style>
    </head>
    <body>
        <?php
        $qry ="SELECT * FROM shoes WHERE id='SH6'";
        $raw_results = mysqli_query($conn,$qry) or die(mysqli_error($conn));
        $results = mysqli_fetch_array($raw_results);
        echo'
        <div class="header"><img class="header_logo" src="hermes_our_logo.png"></div>
        <div class="body">
            <h2 style="margin: 0 0 5px 0">Model</h2>
            <div class="side_menu">
                <div>
                    <div class="item">
                        <div class="image_container">
                          <img src="'.$results['id'].'.jpg" alt="'.$results['model'].'" class="item_image">
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="content">
                <div class="item_details">
                    <div class="item_name">
                        <strong style="margin-bottom: 10px; margin: auto; font-size: 40px;float: left;">'.$results['company']. '" "'.$results['model'].'</strong><strong style="margin-bottom: : 10px; margin: auto;font-size: 30px;float: right;">'.$results['offered'].'</strong><strike style="margin-top: 0px; margin: auto;font-size: 30px;float: right;">'.$results['price'].'</strike>
                    </div>
                </div>
                <!--<button style="width: 100%;height: 100%;background-color: #ffe6ff; margin-top: 10px;"><img class="cart_icon" src="cartr.png"></button>-->
                <div style="border-bottom: 4px solid #ffe6ff; margin: 20px 0 20px 0;" ></div>
                <div id="desc">
                    <img src="'.$results['details'].'" alt="Item Details" id="desc_image" style="width:100%">
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="footer_text">
                <div class="icons">
                    <div class="icon_container">
                        <img class="icon" src="original.png">
                        <p style="float: right; width: 80%; margin:1px 0px 1px 2px;"><strong>100% ORIGINAL </strong>guarantee for all products at our store</p>
                    </div>
                    <div class="icon_container">
                        <img class="icon" src="30day.png">
                        <p style="float: right; width: 80%; margin:1px 0px 1px 2px;"><strong>Return within 30days </strong>of placing your order</p>
                    </div>
                    <div class="icon_container">
                        <img class="icon" src="free%20delivery.png">
                        <p style="float: right; width: 80%; margin:1px 0px 1px 2px;"><strong>Get free delivery </strong>for every order above Rs.1199</p>
                    </div>
                </div>
            </div>
            <div class="social">
                <ul>
                    <li><strong><br>Stay Connected </strong></li>
                    <li><a href="https://www.facebook.com/" target="_blank"><img class="social_icon" src="fb.png"></a></li>
                    <li><a href="https://www.instagram.com/?hl=en" target="_blank"><img class="social_icon" src="insta.png"></a></li>
                    <li><a href="https://twitter.com/login" target="_blank"><img class="social_icon" src="twi.png"></a></li>
                    <li><a href="https://in.pinterest.com/" target="_blank"><img class="social_icon" src="pin.png"></a></li>
                </ul>
            </div>
            <div class="rights"><p style="float: left;">In case of any concern, <strong>Contact Us</strong></p><p style="float: right;">© 2017 Hermes. All rights reserved.</p></div>
        </div>';
        ?>
    </body>
</html>
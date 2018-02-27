<?php
    $conn =mysqli_connect("localhost", "root", "","hermes") or die("Error connecting to database: ".mysqli_error());
   
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shoes</title>
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
                width: 20%;
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
            .brand
            {
                box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1), 0 2px 4px 0 rgba(0, 0, 0, 0.08);
                padding-bottom: 10px;
            }
            .price
            {
                box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1), 0 2px 4px 0 rgba(0, 0, 0, 0.08);            
                padding-bottom: 10px;
            }
            .single_check_option
            {
                width:100%;
                height: 25px;
                margin-top: 5px;
                transition: box-shadow 0.5;
            }
            .single_check_option:hover
            {
                box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1), 0 2px 4px 0 rgba(0, 0, 0, 0.08);
            }
            .check_box
            {
                width:15%;
                height: 100%;
                float: left;
            }
            .label
            {
                width: 70%;
                height: 100%;
                padding: 2px 0px 0px 0px;
                float: right;
            }
            .switch 
            {
                position: relative;
                display: inline-block;
                width: 50px;
                height: 25px;
            }
            .switch input
            {
                display:none;
            }
            .slider 
            {
                position: absolute;
                cursor: pointer;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: #ffe6ff;
                transition: .5s;
            }
            .slider:before 
            {
                position: absolute;
                content: "";
                height: 20px;
                width: 20px;
                left: 5px;
                bottom: 2.5px;
                background-color: #76ffff;
                transition: .5s;
            }
            input:checked + .slider 
            {
                background: linear-gradient(to right, #AD1457,#6A1B9A);
            }
            input:focus + .slider
            {
                box-shadow: 0 0 1px #2196F3;
            }
            input:checked + .slider:before 
            {
                transform: translateX(20px);
            }
            .side_menu::-webkit-scrollbar
            {
                display: none;
            }            
            label
            {
                text-transform:uppercase;
                font-weight:bolder;
                letter-spacing:1px;
                font-size:15px;
            } 
            .content
            {                
                float: right;
                width: 75%;
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
                max-width: 180px;
                max-height: 300px;
                min-width: 180px;
                min-height: 300px;
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
                width: 180px;
                height: 240px;
                padding: 0%;
                background-color:#ffffff;
            }
            .item_image 
            {
                opacity: 1;
                display: block;
                width: 100%;
                height: 240px;
                transition: .5s ease;
            }
            .middle 
            {
                position: absolute;
                bottom: 0;
                left: 0;
                right: 0;
                background-color: #ffe6ff;
                overflow: hidden;
                width: 100%;
                height: 0;
                transition: .5s ease;
            }
            .image_container:hover .middle 
            {
                height: 50px;
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
                margin: auto;
                width: 100%;
                height: 80px;
            }
            .item_name
            {
                width: 100%;
                text-align: center;
            }
            .page
            {
                text-align: center;
            }
            .pagination 
            {
                display: inline-block;
                margin: auto;
            }
            .pagination a 
            {
                color: black;
                float: left;
                padding: 8px 16px;
                text-decoration: none;
            }
            .pagination a.active 
            {
                background: linear-gradient(to right, #AD1457,#6A1B9A);
                color: white;
                border-radius: 5px;
            }
            .pagination a:hover:not(.active) 
            {
                background-color: #ddd;
                border-radius: 5px;
            }
            .footer
            {
                background-color:#ffe6ff;
                width: 100%;
                height: auto;
                clear: both;
                position: relative;
                z-index: 0;
                margin-top: 90%;
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
        <div class="header"><img class="header_logo" src="hermes_our_logo.png"></div>
        <div class="body">
            <h2 style="margin: 0 0 5px 25%">Shoes</h2>
            <div class="side_menu">
                <form action="shoefiltered.php" method="post">
          <div class="brand">
                <h2 style="margin-bottom: 0px;">Brand</h2>
                <h3 style="margin-top: 0px; font-size: 12px">Choose your preferences</h3>
                <div class="single_check_option">
                    <div class="check_box">
                        <label class="switch">
                            <input type="checkbox" id="Woodland" name="brand[]" value ="Woodland">
                            <span class="slider"></span>
                        </label></div>
                    <div class="label" for="Woodland"><label for="Woodland">Woodland</label></div>
                </div>
                <div class="single_check_option">
                    <div class="check_box">
                        <label class="switch">
                            <input type="checkbox" id="UCB"name="brand[]" value ="UCB">
                            <span class="slider"></span>
                        </label></div>
                    <div class="label" for="UCB"><label for="UCB">UCB</label></div>
                </div> 
                <div class="single_check_option">
                    <div class="check_box">
                        <label class="switch">
                            <input type="checkbox" id="Auserio"name="brand[]" value ="Auserio">
                            <span class="slider"></span>
                        </label></div>
                    <div class="label" for="Auserio"><label for="Auserio">Auserio</label></div>
                </div>
                <div class="single_check_option">
                    <div class="check_box">
                        <label class="switch">
                            <input type="checkbox" id="Nike"name="brand[]" value ="Nike">
                            <span class="slider"></span>
                        </label></div>
                    <div class="label" for="Nike"><label for="Nike">Nike</label></div>
                </div>
                <div class="single_check_option">
                    <div class="check_box">
                        <label class="switch">
                            <input type="checkbox" id="Red-Tape"name="brand[]" value ="Red-Tape">
                            <span class="slider"></span>
                        </label></div>
                    <div class="label" for="Red-Tape"><label for="Red-Tape">Red Tape</label></div>
                </div> 
                <div class="single_check_option">
                    <div class="check_box">
                        <label class="switch">
                            <input type="checkbox" id="Jordan"name="brand[]" value ="Jordan">
                            <span class="slider"></span>
                        </label></div>
                    <div class="label" for="Jordan"><label for="Jordan">Jordan</label></div>
                </div>
                <div class="single_check_option">
                    <div class="check_box">
                        <label class="switch">
                            <input type="checkbox" id="Puma"name="brand[]" value ="Puma">
                            <span class="slider"></span>
                        </label></div>
                    <div class="label" for="Puma"><label for="Puma">Puma</label></div>
                </div>
            </div>
            <div class="price">
                <h2 style="margin-bottom: 0px;">Price</h2>
                <h3 style="margin-top: 0px; font-size: 12px">Choose your preferences</h3>
                <label>MIN: </label><input type="number" name="min_price" value="0"><br><br>
                <label>MAX: </label><input type="number" name="max_price" value="100000">
            </div>
            <div class="brand">
                <h2 style="margin-bottom: 0px;">Category</h2>
                <h3 style="margin-top: 0px; font-size: 12px">Choose your preferences</h3>
                <div class="single_check_option">
                    <div class="check_box">
                        <label class="switch">
                            <input type="checkbox" id="Basketball" name="category[]" value ="Basketball">
                            <span class="slider"></span>
                        </label></div>
                    <div class="label" for="Basketball"><label for="Basketball">Basketball</label></div>
                </div>
                <div class="single_check_option">
                    <div class="check_box">
                        <label class="switch">
                            <input type="checkbox" id="Sneakers" name="category[]" value ="Sneakers">
                            <span class="slider"></span>
                        </label></div>
                    <div class="label" for="Sneakers"><label for="Sneakers">Sneakers</label></div>
                </div> 
                <div class="single_check_option">
                    <div class="check_box">
                        <label class="switch">
                            <input type="checkbox" id="Running" name="category[]" value ="Running">
                            <span class="slider"></span>
                        </label></div>
                    <div class="label" for="Running"><label for="Running">Running</label></div>
                </div>
                <div class="single_check_option">
                    <div class="check_box">
                        <label class="switch">
                            <input type="checkbox" id="Formal" name="category[]" value ="Formal">
                            <span class="slider"></span>
                        </label></div>
                    <div class="label" for="Formal"><label for="Formal">Formal</label></div>
                </div>
                <div class="single_check_option">
                    <div class="check_box">
                        <label class="switch">
                            <input type="checkbox" id="Loafers" name="category[]" value ="Loafers">
                            <span class="slider"></span>
                        </label></div>
                    <div class="label" for="Loafers"><label for="Loafers">Loafers</label></div>
                </div>
                <div class="single_check_option">
                    <div class="check_box">
                        <label class="switch">
                            <input type="checkbox" id="Boots" name="category[]" value ="Boots">
                            <span class="slider"></span>
                        </label></div>
                    <div class="label" for="Boots"><label for="Boots">Boots</label></div>
                </div>
                <div class="single_check_option">
                    <div class="check_box">
                        <label class="switch">
                            <input type="checkbox" id="Flip-Flop" name="category[]" value ="Flip-Flop">
                            <span class="slider"></span>
                        </label></div>
                    <div class="label" for="Flip-Flop"><label for="Flip-Flop">Flip Flop</label></div>
                </div>
            </div>
            <br>
            <input type="submit" style="width: 100%;height: 40px;background-color: #ffe6ff;">
            </form>
        </div>        
        <div class="content">
                <div>
					<?php
                    $brand = $_POST['brand'];
                    $category = $_POST['category'];
                    $min = $_POST['min_price'];
                    $max = $_POST['max_price'];
                global $z,$x;
                    
                    foreach ($brand as $a){ 
                        $z.="'".$a."'";
                        $z.=" , ";
                        }$z.="'none'";
                    
                    foreach ($category as $c){ 
                        $x.="'".$c."'";
                        $x.=" , ";
                        }$x.="'none'";
                    
						global $dbc;
						$q= "SELECT id,image, company, model, price,offered FROM shoes where company IN ($z) AND category IN ($x) AND offered BETWEEN $min AND $max";
						$conn = new mysqli("localhost","root","","hermes");
						$result=mysqli_query($conn,$q);
						while($fetch = mysqli_fetch_assoc($result)){
						
						echo '<div class="item">';
						echo '<div class="image_container">';
						echo '<a href="single'.$fetch['id'].'.php"><img src="'.$fetch['image'].'" alt="Shoe" class="item_image"/></a>';
						echo '<div class="middle">
                            <div class="text">
							<a href="cart.php?add='.$fetch['id'].'" type="button" style="width: 100%;height: 100%;background-color: #ffe6ff;"><img class="cart_icon" src="cartr.png" ></a>
							</div>
                          </div>
						 </div>';
                       
						echo '<div class="item_details">
                            <div class="item_name">
                                <strong style="margin-bottom: 0px; margin: auto;">';
								echo "{$fetch['company']}";
								echo '</strong><p style="margin-bottom: 0px;margin: auto;">';
								echo "{$fetch['model']}";
								echo'</p><strike style="margin-top: 0px; margin: auto;">';
								echo "&#8377;{$fetch['price']}";
								echo '</strike><strong style="margin-top: 0px; margin: auto;">';
								echo "&#8377;{$fetch['offered']}";
								echo '</strong>';
                            echo '</div>';
                        echo '</div>';
						echo '</div>';
						echo '</div>';
						}
						
						//}
						
						
						?>
                        
                    </div>
                </div>
         
            </div>

        <div class="footer">
            <div class="footer_text">
                <h2 style="column-span: all; text-align: center;">BUY FOOTWEAR & SHOES</h2>
                <h3>STYLISH SHOES TO ELEVATE YOUR WARDROBE</h3>
                <p>Shoes are the last wardrobe item to go on – they also receive the least amount of attention when one is putting together an outfit. We at Myntra are committed to providing you with complete wardrobe solutions from head to toe; open your shoe closet to a whiff of fresh air by stocking it up with stylish shoes from our selection online. Our range of formal shoes casual shoes, heels, flats, clogs, sports shoes and more will have you at a loss for words. Be amazed by the hues and styles of shoes, perfect for nearly every occasion.</p>
                <h3>THE BEST FOOT FASHION FOR MEN, WOMEN AND CHILDREN</h3>
                <p>Accessorise your dapper suit with a pair of elegant brown formal shoes. Should you be vying for a promotion at work, the weekend polo game is an excuse for you to dress to impress. Look impeccable in your favourite pair of olive green cotton trousers and a white and green checked shirt. Add a dash of sophistication with a charcoal grey dinner jacket. Get set for a little post-game bonding and kick back with the boss in a pair of black lace-up formal shoes. Sport an elegant, statement watch and you will not be easily forgotten. If you are meeting your editor to discuss how to rework your latest book, a pair of capris with elegant sandals and a black and white striped T-shirt is the look to sport. Bunch your hair up in a messy updo and don't forget to carry your manuscript in a bright red leather bag. When heading out for a weekend trip, pair blue and white canvas shoes with a ruffled top, low-rise denims, and light grey aviators to reveal your casual sense of style. Keep your little one warm with a pair of pink canvas booties with cartoon-themed print on the upper</p>
                <h3>SPORTY AND STYLISH WITH SNEAKERS</h3>
                <p>Wind down at the end of the day with a friendly game of basketball in your backyard with a few friends. A pair of khaki shorts and a light blue loose T-shirt should do the trick. Add a dash of colour with a pair of casual blue shoes and let your look say it all – cool, casual and sporty. With the mercury dipping, it is the perfect time for you to start your morning jogs again. A pair of crimson running shoes is ideal with its padded soles that offer extra comfort. Wear a pair of black cycling shorts and a white racerback top. Tie your hair up in a high ponytail and hit the tracks in style.
                <br>
               </p><br>
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
        </div>
    </body>
</html>
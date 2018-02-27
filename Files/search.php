<?php
    $conn =mysqli_connect("localhost", "root", "","hermes") or die("Error connecting to database: ".mysqli_error());
   
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Search results</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<?php
    $query = $_GET['search']; 

     
    $min_length = 3;
    
     
    if(strlen($query) >= $min_length){ 
         
        $query = htmlspecialchars($query); 
       
         
        $query = mysqli_real_escape_string($conn,$query);

         $qry ="SELECT * FROM search WHERE SearchTerm LIKE '%".$query."%'";
        
        
        /*
        
        "SELECT b.*,j.*,l.*,m.*,sh.*,sho.*,k.*,t.* FROM bag b,jeans j,laptop l,mobile m,shirt sh,shoes sho,shorts k,tshirt t WHERE (b.id OR j.id OR l.id OR m.id OR sh.id OR sho.id OR k.id OR t.id) IN ( SELECT ID FROM search WHERE SearchTerm LIKE '%".$query."%')"
        
        
        
        
        "SELECT b.*,j.*,l.*,m.*,sh.*,sho.*,k.*,t.* FROM bag b,jeans j,laptop l,mobile m,shirt sh,shoes sho,shorts k,tshirt t WHERE (`b.model` LIKE '%".$query."%') OR (`j.model` LIKE '%".$query."%') OR (`l.model` LIKE '%".$query."%') OR (`m.model` LIKE '%".$query."%') OR (`sh.model` LIKE '%".$query."%') OR (`sho.model` LIKE '%".$query."%') OR (`k.model` LIKE '%".$query."%') OR (`t.model` LIKE '%".$query."%') OR (`l.ram` LIKE '%".$query."%') OR  (`l.rom` LIKE '%".$query."%') OR  (`l.colour` LIKE '%".$query."%') OR  (`l.graphics` LIKE '%".$query."%') OR  (`l.processor` LIKE '%".$query."%') OR  (`l.display` LIKE '%".$query."%') OR  (`l.company` LIKE '%".$query."%') OR (`l.os` LIKE '%".$query."%') OR  (`l.processor` LIKE '%".$query."%') OR  (`b.company` LIKE '%".$query."%') OR
         (`b.catagory` LIKE '%".$query."%') OR  (`j.type` LIKE '%".$query."%') OR  (`j.color` LIKE '%".$query."%') OR  (`j.design` LIKE '%".$query."%') OR (`j.company` LIKE '%".$query."%') OR  (`m.company` LIKE '%".$query."%') OR (`m.ram` LIKE '%".$query."%') OR  (`m.os` LIKE '%".$query."%') OR  (`m.color` LIKE '%".$query."%') OR (`m.battery` LIKE '%".$query."%') OR 
         (`m.memory` LIKE '%".$query."%') OR (`m.camera` LIKE '%".$query."%') OR (`m.type` LIKE '%".$query."%') OR (`m.display` LIKE '%".$query."%') OR (`sh.type` LIKE '%".$query."%') OR (`sh.color` LIKE '%".$query."%') OR (`sh.design` LIKE '%".$query."%') OR (`sho.company` LIKE '%".$query."%') OR (`sho.category` LIKE '%".$query."%') OR  (`k.type` LIKE '%".$query."%') OR  (`k.color` LIKE '%".$query."%') OR  (`k.design` LIKE '%".$query."%') OR  (`k.company` LIKE '%".$query."%') OR  (`t.type` LIKE '%".$query."%') OR  (`t.color` LIKE '%".$query."%') OR (`t.design` LIKE '%".$query."%') OR  (`t.company` LIKE '%".$query."%')"
        
        
        
        
        
        
        
        
        
        "SELECT b.*,j.*,l.*,m.*,sh.*,sho.*,k.*,t.* FROM bag b,jeans j,laptop l,mobile m,shirt sh,shoes sho,shorts k,tshirt t WHERE ('b.model' LIKE '%".$query."%') OR ('j.model' LIKE '%".$query."%') OR ('l.model' LIKE '%".$query."%') OR ('m.model' LIKE '%".$query."%') OR ('sh.model' LIKE '%".$query."%') OR ('sho.model' LIKE '%".$query."%') OR ('k.model' LIKE '%".$query."%') OR ('t.model' LIKE '%".$query."%') OR ('l.ram' LIKE '%".$query."%') OR  ('l.rom' LIKE '%".$query."%') OR  ('l.colour' LIKE '%".$query."%') OR  ('l.graphics' LIKE '%".$query."%') OR  ('l.processor' LIKE '%".$query."%') OR  ('l.display' LIKE '%".$query."%') OR  ('l.company' LIKE '%".$query."%') OR ('l.os' LIKE '%".$query."%') OR  ('l.processor' LIKE '%".$query."%') OR  ('b.company' LIKE '%".$query."%') OR
         ('b.catagory' LIKE '%".$query."%') OR  ('j.type' LIKE '%".$query."%') OR  ('j.color' LIKE '%".$query."%') OR  ('j.design' LIKE '%".$query."%') OR ('j.company' LIKE '%".$query."%') OR  ('m.company' LIKE '%".$query."%') OR ('m.ram' LIKE '%".$query."%') OR  ('m.os' LIKE '%".$query."%') OR  ('m.color' LIKE '%".$query."%') OR ('m.battery' LIKE '%".$query."%') OR 
         ('m.memory' LIKE '%".$query."%') OR ('m.camera' LIKE '%".$query."%') OR ('m.type' LIKE '%".$query."%') OR ('m.display' LIKE '%".$query."%') OR ('sh.type' LIKE '%".$query."%') OR ('sh.color' LIKE '%".$query."%') OR ('sh.design' LIKE '%".$query."%') OR ('sho.company' LIKE '%".$query."%') OR ('sho.category' LIKE '%".$query."%') OR  ('k.type' LIKE '%".$query."%') OR  ('k.color' LIKE '%".$query."%') OR  ('k.design' LIKE '%".$query."%') OR  ('k.company' LIKE '%".$query."%') OR  ('t.type' LIKE '%".$query."%') OR  ('t.color' LIKE '%".$query."%') OR ('t.design' LIKE '%".$query."%') OR  ('t.company' LIKE '%".$query."%')" 
         */
        
        
        
        $raw_results = mysqli_query($conn,$qry) or die(mysqli_error($conn));
        
         
        if(mysqli_num_rows($raw_results) > 0){ 
             
            while($results = mysqli_fetch_array($raw_results)){
             
                echo "<p><h3>".$results['ID']."</p>";
                echo "<p><h3>".$results['model']."</p>";
                echo "<p><h3>".$results['company']."</p>";
                echo "<p><h3>".$results['price']."</p>";
            }
             
        }
        else{ 
            echo "No results";
        }
         
    }
    else{ 
        echo "Minimum length is ".$min_length;
    }
?>
</body>
</html>
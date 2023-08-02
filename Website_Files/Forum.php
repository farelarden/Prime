<?php
   session_start();

   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Categories</title>
      <link rel="stylesheet" href="style.css">
      <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&family=Montserrat:wght@500&display=swap" rel="stylesheet">
      <link href="google.com">
      <style>
         body{
         font-family: 'Montserrat', sans-serif;
         background-image:url(bg.jpg);
         overflow-x: hidden; /* Hide horizontal scrollbar */
         background-position: center;
         background-repeat: no-repeat;
         background-size:cover;
         text-align: center;
         justify-content: center;
         background-attachment: fixed;
         }
         /* width */
         ::-webkit-scrollbar {
         width: 10px;
         }
         /* Track */
         ::-webkit-scrollbar-track {
         background: #f1f1f1;
         }
         /* Handle */
         ::-webkit-scrollbar-thumb {
         background: #888;
         }
         /* Handle on hover */
         ::-webkit-scrollbar-thumb:hover {
         background: #555;
         }

         .row{
         background-color: black;
         color:white;
         height: 150px;
         }
         .title{
         color:white;
         text-decoration: none;
         font-size:40px;
         margin-bottom: 20px;
         font-family: 'Montserrat', sans-serif;
         font-weight: bold;
         }
         hr{
         font-weight: bold;
         }
         table{
         margin-left:385px;
         }
          #Title2{
              color:white;
              font-size:40px;
              background-color: rgba(24,24, 24, 0.7);
              padding: 30px 20px 30px 20px;
              width:30%;
              margin-top: 60px;
              margin-left: 525px;
          }
          #input-search{
               padding-top: 17px;
              margin-top:5px;
              background-color:white ;
              width:40%;
              color:black;
          }
          #submit-search{
               margin-left:-4px;
                width:10%;
             padding-bottom: 12px;
            
          }
          .searchbar{
              background-color: #202020;
              margin-top: -10px;
              margin-left:-10px;
              margin-right:-10px;
              padding-bottom: 5px;
              transform: translateY(0%);
          }
          #order-by1{
              width:10%;
           
        
          }
          #order-by2{
              width:10%;
          }
          
      </style>
   </head>
   <body>
     <div class="searchbar">
       <form class="form1" action="Forum.php" method="post">
         <input  id="input-search"type="text" name="search" placeholder="Search">
          <button id="submit-search"type="submit" name="search-submit">Search</button>
          <button id="order-by1"type="submit" name="order-submit1">A - Z</button>
            <button id="order-by2"type="submit" name="order-submit2">Z - A</button>
       </form>
         
     </div>
      <header>
         <div id="content">
              <h1 id='Title2'>Categories</h1>
          
          
            <?php
             
                  require 'db.inc.php';
               
             
            
             if(isset($_POST['order-submit2'])){
               $sql= "SELECT * FROM categories ORDER BY category_title DESC";
               $res = mysqli_query($conn,$sql) or die(mysqli_connect_error());
               $categories="";
              
               if(mysqli_num_rows($res)>0){
                   $categories = "<table width='50%' style='border-collapse:collapse;'>";
                   while($row=mysqli_fetch_assoc($res)){
                       $id=$row['id'];
                       $title=$row['category_title'];
                       $description=$row['category_description'];

                        $categories .= "<tr class='row'><td><a href='view_category.php?cid=".$id."' class='title'>".$title."</a><br><br> <span class='post_info'>".$description."</span></td></tr>";
                        $categories .= "<tr><td colspan='3'><hr/></td></tr>";
                   }
                   $categories.="</table>";
                   echo $categories;

               }else{
                   echo"<p>There are no categories</p>";
               }  
             }
             else if(isset($_POST['order-submit1'])){
                 $sql= "SELECT * FROM categories ORDER BY category_title ASC";
               $res = mysqli_query($conn,$sql) or die(mysqli_connect_error());
               $categories="";
              
               if(mysqli_num_rows($res)>0){
                   $categories = "<table width='50%' style='border-collapse:collapse;'>";
                   while($row=mysqli_fetch_assoc($res)){
                       $id=$row['id'];
                       $title=$row['category_title'];
                       $description=$row['category_description'];

                        $categories .= "<tr class='row'><td><a href='view_category.php?cid=".$id."' class='title'>".$title."</a><br><br> <span class='post_info'>".$description."</span></td></tr>";
                        $categories .= "<tr><td colspan='3'><hr/></td></tr>";
                   }
                   $categories.="</table>";
                   echo $categories;

               }else{
                   echo"<p>There are no categories</p>";
               }  
             }
             else if(isset($_POST['search-submit'])){
                 $search=mysqli_real_escape_string($conn,$_POST['search']);
                 $sql= "SELECT * FROM categories WHERE category_title LIKE '%$search%' OR category_description LIKE '%$search%' OR last_post_date LIKE '%$search%'";
                 $res=mysqli_query($conn,$sql) or die(mysqli_connect_error());
                 $categories="";
                  if(mysqli_num_rows($res)>0){
                   $categories = "<table width='50%' style='border-collapse:collapse;'>";
                   while($row=mysqli_fetch_assoc($res)){
                       $id=$row['id'];
                       $title=$row['category_title'];
                       $description=$row['category_description'];

                        $categories .= "<tr class='row'><td><a href='view_category.php?cid=".$id."' class='title'>".$title."</a><br><br> <span class='post_info'>".$description."</span></td></tr>";
                        $categories .= "<tr><td colspan='3'><hr/></td></tr>";
                   }
                   $categories.="</table>";
                   echo $categories;

               }else{
                   echo"<p>No categories according to your search</p>";
               }  
             }
             else{
                 $sql= "SELECT * FROM categories ORDER BY category_title ASC";
               $res = mysqli_query($conn,$sql) or die(mysqli_connect_error());
               $categories="";
              
               if(mysqli_num_rows($res)>0){
                   $categories = "<table width='50%' style='border-collapse:collapse;'>";
                   while($row=mysqli_fetch_assoc($res)){
                       $id=$row['id'];
                       $title=$row['category_title'];
                       $description=$row['category_description'];

                        $categories .= "<tr class='row'><td><a href='view_category.php?cid=".$id."' class='title'>".$title."</a><br><br> <span class='post_info'>".$description."</span></td></tr>";
                        $categories .= "<tr><td colspan='3'><hr/></td></tr>";
                   }
                   $categories.="</table>";
                   echo $categories;

               }else{
                   echo"<p>There are no categories</p>";
               }  
             }
               ?>
         </div>
      </header>
   </body>
</html>

<?php
  include("includes/db.php"); //including the database file
  include("functions/functions.php");//including function file with all functions used
 ?>

<!DOCTYPE html>
<html>
<head>
  <title>My Store</title>

        <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
      <!--Font-Awesome CDN-->

      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
      integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

      <link rel="stylesheet" type="text/css" href="style/style.css"/>

      <link href="https://fonts.googleapis.com/css?family=Staatliches&display=swap" rel="stylesheet">
</head>
<html>

<body>
  <div id="top" >                                         <!--Top Bar Start-->
    <div class="container">                               <!--Container Start-->
      <div class="col-md-6 offer">                        <!--col-md-6 Start-->
        <a href="shop.php" class="btn btn-success btn-sm" >
          Welcome Member
        </a> <!--using bootstrap's btn and btn-success class and making the button small with btn-sm class-->
        <!--Bootstrap classes- https://www.w3schools.com/bootstrap/bootstrap_ref_all_classes.asp-->

        <a href="#" id="topGuest">Shopping Cart Total Price: CAD <?php totalPrice(); ?>, Total Items <?php item(); ?></a>
      </div><!--col-md-6 End-->

      <div class="col-md-6"><!---->
        <ul class="menu">
          <li>
            <a href="register.php">Register Here</a>
          </li>
          <li>
            <a href="cart.php">Go to Cart</a>
          </li>
          <li>
            <a href="index.php">Logout</a>
          </li>
      </div>

    </div><!--Container End-->
  </div><!--Top Bar End-->


  <div class="navbar navbar-default" id="navbar"> <!--navbar Start-->
    <div class="container"> <!--navbar container start-->
      <div class="navbar-header"> <!--navbar header start-->
        <a class="navbar-brand home" href="index-member.php">
          <img src="images/logo.jpg" alt="logo" class="hidden-xs"> <!--hidden xs hides the logo when screen is extra small-->
          <img src="images/logoShort.jpg" alt="logo" class="visible-xs">
        </a>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
          <span class="sr-only">Toggle Navigation</span>
          <i class="fa fa-align-justify"></i> <!--Icon taken and copy pasted from https://fontawesome.com/icons/align-justify?style=solid-->
        </button>


      </div><!--navbar header end-->

      <div class="navbar-collapse collapse" id="navigation"> <!--navbar collapse start--> <!--bootstrap nav classes= https://getbootstrap.com/docs/4.3/components/navbar/-->
        <div class="padding-nav"> <!--padding nav start-->
          <ul class="nav navbar-nav navbar-left" id="ulnav">
            <li >
              <a href="index-member.php">Home</a>
            </li>

            <li class="active">
              <a href="shop.php">Shop</a>
            </li>

            <li>
              <a href="contactus.php">Contact Us</a>
            </li>

          </ul>
        </div><!--padding nav end-->
        <a href="cart.php" class="btn btn-primary navbar-btn right" id="cartbtn"> <!--bootstrap default button class-->
          <i class="fa fa-shopping-cart"></i>
          <span> <?php item(); ?> items in cart </span>
        </a>

      </div> <!--navbar collapse end-->
    </div> <!--navbar container end-->

  </div><!--navbar default end-->

 <div id="content">
    <div  class="container">
      <div class="col-md-12"><!--colmd12 start-->
        <div class="col-md-3"><!--colmd3 start-->
          <?php
            include("includes/sidebar.php");
           ?>
         </div><!--colmd3 end-->

      <div class="col-md-9"><!--colmd9 start-->
        <?php
        if(!isset($_GET['sub_cat_id'])){//to set which product category is selected in the sidebar on shop.php
          $query ='SELECT DISTINCT(chra) FROM `products`';
          $data = mysqli_query($con,$query);
          if(!isset($_GET['cat_id'])){//if both product category and categories are not active, then do this
            echo "<div class='box'>
            <h1>Shop  ( Displaying All Products )</h1>
            <p>Start Shopping , choose categories on the left.</p>";
          }

         while($chra = mysqli_fetch_assoc($data)){
          if($chra['chra']!=''){
         ?>
        <label class="radio-inline">
      <input type="radio" class='chra' name='chra' value="<?php echo $chra['chra'];?>"><?php echo $chra['chra'];?></input>
    </label>
  <?php } } } ?>
</div>
        <!--making this dynamic, commenting out the static part
        <div class="box">
        <h1>Shop</h2>
          <p>This is the shop bla bla bla bla blabla bla bla bla bla<p>
        </div>---------->
<div class='section'>
        <div class="row old" > <!--This row div has php inside it after the long commented out part--->
          <!--This is the static version of a product in the shop.pjp
          Commenting this out to make dynamic products
          <div class="col-md-4 col-sm-6 center responsive">
            <div class="product">
                <a href="details.php">
                  <img src="Jastej_Admin/product_images/ONWhey2.2.jpg" class="img-responsive">
                </a>

            <div class="text">
                  <h3>
                    <a href="details.php">
                      Whey Protein for the best
                    </a>
                  </h3>
                  <p class="price">CAD93.00</p>
                  <p class="buttons">
                    <a href="details.php" class="btn btn-view-details">View Details</a>
                    <a href="details.php" class="btn btn-custom-cart"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
                  </p>
            </div>
            </div>
          </div>Static Product code div end------------------------------------------------------------------>
          <?php
          if(!isset($_GET['sub_cat_id'])){
            if(!isset($_GET['cat_id'])){
              $per_page=6;//6 items per page
              if(isset($_GET['page'])){
                $page=$_GET['page'];
              }else{
                $page=1;//default page
              }
              $start_from=($page-1)* $per_page; //because first page is 0, example: If page is 4, then products starts from 18 number through the formula
              $get_product="select * from products order by 1 DESC LIMIT $start_from, $per_page"; //just like we did LIMIT 0,6
              $run_pro=mysqli_query($con,$get_product);
              while($row=mysqli_fetch_array($run_pro)){
                $pro_id=$row['product_id'];
                $pro_title=$row['product_title'];
                $pro_price=$row['product_price'];
                $pro_img1=$row['product_img1'];

                echo "
                <div class='col-md-4 col-sm-6 center-responsive'>
                  <div class='product'>
                  <a href='details.php?pro_id=$pro_id'>
                    <img src='Jastej_Admin/product_images/$pro_img1' class='img-responsive'>
                  </a>
                  <div class='text'>
                    <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
                    <p class='price'>CAD $pro_price </p>
                    <p class='buttons'>
                      <a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
                      <a href='details.php?pro_id=$pro_id' class='btn btn-primary'>
                        <i class='fa fa-shopping-cart'> </i>Add To Cart
                      </a>
                    </p>
                  </div>
                  </div>
                </div>
                "; //echo statement end for html layout in shop.php
              }

           ?>
         </div><!--row end-->
    </div>
         <center>
           <ul class="pagination">
             <?php
                $query="select * from products";
                $result=mysqli_query($con,$query);
                $total_record=mysqli_num_rows($result); //returns how many rows are stored in our products mysql_list_tables
                $total_pages=ceil($total_record / $per_page);//calculates how many pages to make according to total products we have in the database
                echo "
                <li><a href='shop.php?page=1'>".'First Page'."</a></li>
                ";
                for($i=1; $i<=$total_pages; $i++)
                { //for loop , to display the number of pages under shop products
                  //i is the working variable of the for loop
                  echo "<li><a href='shop.php?page=".$i."'>".$i." </a></li> ";
                }
                echo "<li><a href='shop.php?page=$total_pages'>".'First Page'."</a></li>";
                 }
               }
              ?>

           </ul>
         </center>

           <?php
            getPcatPro();
            getCatPro();
            ?>

      </div><!--colmd9 end-->
    </div><!--colmd12 end-->
  </div><!--container end-->
</div><!--content end-->





  <!--Footer start-->
<?php
  include("includes/footer.php");
 ?>

  <!--Footer start-->



<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</html>

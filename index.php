<!DOCTYPE html>
<html>
  <head>
    <title>Simple Cart Demo</title>
    <link rel="stylesheet" href="public/cart.css">
    <script src="public/cart.js"></script>
  </head>
  <body>
    <!-- (A) HEADER -->
    <header id="scHead">
      <div id="scTitle" title="Product List"  onclick="reload();" >AMOL TOY SHOP</div>
      <div id="scCartIcon" title="Checkout" onclick="cart.toggle();">
        &#128722; <span id="scCartCount">0</span>
      </div>
    </header>

    <!-- (B) PRODUCTS -->	
    <div id="scProduct" ><?php
      // (B1) GET PRODUCTS
      require "lib/core.php";
      $products = $_CC->pdtGetAll();

      // (B2) LIST PRODUCTS
      if (is_array($products)) { foreach ($products as $id => $row) { ?>
     
     <?php 

     $active= "";
     $disabled = "";
     $dis = "";



     if ($row['status'] == 'N' ) {
     $active= "active";
     $dis = "display: block;";
     $disabled="hide_btn";  
     }


      ?>

      <div class="pdt <?=$active;?>  ">
        <img class="pImg" src="public/<?= $row['product_image'] ?>"/>
        <h3 class="pName"><?= $row['product_name'] ?>  <span class="status" style="<?=$dis;?>" >Status : Out Of Stock</span>   </h3>


        <h4 class="p_short"> (<?= $row['short_description'] ?>) </h4>
        <div class="pPrice">$<?= $row['product_price'] ?></div>
        <div class="pDesc"><?= $row['product_description'] ?></div>
        <input class="pAdd bRed <?=$disabled;?>"  type="button" value="Add to cart" onclick="cart.add(<?= $row['product_id'] ?>);"/>
      </div>
      <?php }} else { echo "No products found."; }
    ?></div>

    <!-- (C) CART -->
    <div id="scCart" class="ninja"></div>
  </body>
</html>
<?php
      $products_cart = array();
      if(isset($cart)){
          foreach($cart as &$cart_product){
              foreach($products as $product){
                  if($cart_product->product_id == $product["products_id"]){
                    array_push($product, $cart_product->product_q);
                      array_push($products_cart, $product);
                  }
              }
          }
      }

      $total_final = 0;
      foreach($products_cart as $product){

      }
?>


<nav class="navbar">
    <a href="javascript:void(0)" onclick="toggleCart()">&#9776</a>
    <a href="/">
    <h2 class="title">E-foraxis</h2>
  </a>
    
<!--     <a href="">Menu1</a>
    <a href="">Menu2</a> -->
</nav>
<div id="cart" class="right-drawer">
  <a href="javascript:void(0)" class="closeCart" onclick="closeCart()">&times;</a>
  <div class="cart-element">
    <?php 
      foreach($products_cart as $product){
        include './src/Components/CartElement.php';
      }

      if(count($products_cart) > 0){
        ?>
        <h3 class="title">
          <?php
            echo "Total: "
          ?>
        </h3>
        <form action="./checkout">
        <button class="button" type="submit">
            Checkout
          </button>
      </form>
          
        <?php
      }
      if(count($products_cart) <= 0){
        ?>
          <span>No hay elementos en el carrito.</span>
        <?php
      }
    ?>
    
  </div>

</div>
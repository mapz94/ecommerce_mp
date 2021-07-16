<?php

?>

<section>
    <h2 class="title">
        Checkout:
    </h2>
    <section>
    <div class="container catalog">
        <?php
              $products_cart = array();
              if(isset($cart)){
                  foreach($cart as &$cart_product){
                      foreach($products as $product){
                          if($cart_product->product_id == $product["products_id"]){
                            $product["q"]  = $cart_product->product_q;
                              array_push($products_cart, $product);
                          }
                      }
                  }
              }
        
              $total_final = 0;
              foreach($products_cart as $product){
                $total_final += ($product["price"] + $product["price"] * $product["discount"]) * $product["q"];
              }
            foreach($products_cart as $product){
                if(isset($product["products_id"])){
                    include "./src/Components/ProductCheckout.php";
                }
            }?>
        
    </div>
    <h2 class="title" id="pagar">
        Pagar:
    </h2>
    <h3 class="title">Total: $
        <?php 
            echo number_format($total_final,0,",",".");
        ?>
    </h3>
    <form action="/pay" method="POST">
        <label for="">Dirección: </label>
        <input required type="text" name="address" id="addressInput">
        <label for="">Comuna: </label>
        <input required type="text" name="comune" id="comuneInput">
        <label for="">Región: </label>
        <input required type="text" name="region" id="regionInput">
        <button class="button" type="submit">Pagar</button>
    </form>
    
</section>

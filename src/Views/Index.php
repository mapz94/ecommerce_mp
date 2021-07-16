<?php
?>

<section>
    <span class="content">
        Este es un ecommerce aún en producción. Somos un supermercado en línea.
    </span>
</section>
<section>
    <div class="card">
        <img class="card-img"
            src="https://images.unsplash.com/photo-1606787366850-de6330128bfc?ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80"
            alt="">
    </div>
</section>
<!-- <section>
    <div class="card light-bg">
        <div class="container">
            <h2 class="title">This is a Card Title</h2>
            <div class="content">
                <span>This is a card content.</span>
            </div>
            <div class="actions">
                <button class="button">Aceptar</button>
            </div>
        </div>
    </div>
</section> -->
<section>
    <div class="container catalog">
        <?php
            foreach($products as $product){
                if(isset($product["products_id"])){
                    include "./src/Components/Product.php";
                }
            }
        ?>
    </div>
</section>
<?php  
    $id = isset($product["products_id"]) ? $product["products_id"] : 0;
    $html_id = "prod-" . $id;
    $featured_image = isset($product["featured_image"]["location"]) ? $product["featured_image"]["location"] : "./public/assets/no-image.png";
    $name = isset($product["name"]) ? strtoupper($product["name"]) : "Nombre Producto.";
    $final_price =  isset($product["price"]) ? number_format($product["price"],0, ',','.') : 0;
    if(isset($product["discount"])){
        $final_price = $product["price"] - $product["discount"] * $product["price"];
    }
    $discount = isset($product['discount']) ? $product['discount'] * 100 : 0;

?>

<div class="card" style="max-width: 400px">
    <div class="container">
        <span class="content">id: <?php echo $id ?></span>
        <img style="object-fit: cover !important; max-height: 175px !important" class="card-img" src="<?php echo $featured_image ?>" alt="image">
        <h2  class="title"><?php echo $name ?></h4>
        <h3 class="title">$<?php echo number_format($final_price,0,',','.');  ?></h5>
        <div class="actions">
        <form method="post" class="container">
            <input hidden readonly type="text" name="action" value="insertCart" >
            <input hidden readonly type="number" name="product_id" value="<?php echo $id ?>" >
            <input hidden readonly type="text" name="product_featured_image" value="<?php echo $featured_image ?>" >
            <input hidden type="number" name="product_q" value="1" min="1" max="99" >
            <button style="width: 100%" class="button" type="submit">
                Agregar
            </button>
        </form>
        </div>
    </div>
</div>
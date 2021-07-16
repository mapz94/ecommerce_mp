<?php

// Realizado por Miguel Pérez
session_start();

include_once './src/Models/Products.php';
include_once './src/Models/Files.php';
/* echo "SESSION:";
var_dump($_SESSION);
echo "POST";
var_dump($_POST); */

$products_conn = new Products();
$products = $products_conn->selectAll();

foreach($products as &$product){
    if(isset($product["featured_image"])){
        $file_conn = new Files();
        $file = $file_conn->selectOne($product["featured_image"]);
        $product["featured_image"] = $file;
    }
}

/* echo var_dump($products); */

$cart = isset($_SESSION["cart"]) ? json_decode($_SESSION["cart"])  : array();
if($cart == null) $cart = array();

/* echo var_dump($cart); */

if(isset($_POST["action"])){
    switch($_POST["action"]){
        case "insertCart":
            $product = null;
            foreach($cart as $cart_product){
                if($cart_product->product_id === $_POST["product_id"])
                    $product = &$cart_product;
            }
            if($product){
                $product->product_q++;
            }
            else{
                array_push($cart,(object)$_POST);
            }
            break;
        case "removeCart":
            for($i = 0; $i < count($cart);$i++){
                if($cart[$i]->product_id == $_POST["product_id"]){
                    if($cart[$i]->product_q > 1){
                        $cart[$i]->product_q--;
                    }
                    else{
                        array_splice($cart,$i);
                    }
                    
                }
            }
            break;
    }
}

$_SESSION["cart"] = json_encode($cart);
$_POST = array();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-foraxis</title>
    <link rel="stylesheet" href="/public/css/style.css">
    <script src="/public/js/navbar.js" defer></script>
    <script src="/public/js/Product.js" defer></script>
</head>

<body>
    <div id="main">
        <?php include './src/Components/Navbar.php'; ?>
        <?php 
        // Enrutamiento
            //var_dump($_SERVER);
            $query = $_SERVER["QUERY_STRING"];
            $uri = parse_url( $_SERVER['REQUEST_URI']);
            if(strpos($uri['path'],"#")){
                $uri['path'] = explode("#",$uri['path'])[0];
            }
            /* echo var_dump( $uri); */
            switch ($uri['path']){
                case '/':
                    include './src/Views/Index.php';
                    break;
                case '/checkout':
                    include './src/Views/Checkout.php';
                    break;
                case '/pay':
                    include './src/Views/Pay.php';
                    break;
                default:
                    include './src/Views/404.php';
                    break;
            }
        ?>
    </div>

    <script>
        console.log("Ready!");
        const body = document.body;
        const config = {
            attributes: true,
            childList: true,
            subtree: true
        };

        // Callback function to execute when mutations are observed
        const callback = function (mutationsList, observer) {
            for (const mutation of mutationsList) {
                if (mutation.type === 'childList') {
                    console.log('A child node has been added or removed.');
                } else if (mutation.type === 'attributes') {
                    console.log('The ' + mutation.attributeName + ' attribute was modified.');
                }
            }
        };
        console.log(body);
        const observer = new MutationObserver(callback);
        observer.observe(body, config);
    </script>
</body>

</html>
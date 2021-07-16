<?php
    include_once './src/Models/Orders.php';
    $order_conn = new Orders();
    $SESSION["cart"] = json_encode( array());
    // No termine de enviar las ordenes.
    /*
    Pretendia pasarle lo que tengo en $_POST para hacer la orden y con lo que estaba
    en carrito armar el detalle de la orden.
    Me quedaba super poco.
    */
?>
<p>
No termine de enviar las ordenes.
</p>
<p>

Pretendia pasarle lo que tengo en $_POST para hacer la orden y con lo que estaba
    en carrito armar el detalle de la orden.
    Me quedaba super poco.
</p>

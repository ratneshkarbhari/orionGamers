<main class="page-content" id="transaction-details">

    <div class="container">

        <h1 class="page-title"><?php  echo $title; ?></h1>

        <h2>Date: <?php echo $transaction['date']; ?></h2>

        <h3>Customer Details:</h3>

        <h4>Name: <?php echo $customer['first_name'].' '.$customer['last_name']; ?></h4>
        <h4>Email: <?php echo $customer['email']; ?></h4>
        <h4>Country: <?php echo $customer['country']; ?> </h4>
        <h4>City: <?php echo $customer['city']; ?> </h4>
        <h4>State:<?php echo $customer['state']; ?></h4>
        <h4>Pincode:<?php echo $customer['pincode']; ?></h4>


        <h3>Product Details:</h3>

        <h4>Title: <?php echo $product['title']; ?></h4>
        <h4>Price:<?php echo $product['sale_price']; ?></h4>

    </div>

</main>
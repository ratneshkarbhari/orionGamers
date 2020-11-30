<main class="page-content" id="all-transactions">

    <div class="container">

        <h1 class="page-title"><?php echo $title; ?></h1>
        <br>
        
        <table class="responsive-table">
            <thead>
                <tr>
                    <th>Amount</th>
                    <th>Game Product ID:</th>
                    <th>Customer Email</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                
                <?php $all_transactions = array_reverse($all_transactions); foreach($all_transactions as $transaction):  ?>
                <tr>
                    <td><?php echo $transaction['amount']; ?></td>
                    <td><?php echo $transaction['product_id']; ?></td>
                    <td><?php echo $transaction['payee_customer_email']; ?></td>
                    <td><?php echo $transaction['date']; ?></td>
                    <td>
                        <a href="<?php echo site_url('transaction-details/'.$transaction['id']); ?>" class="btn blue darken-3"><i class="material-icons">visibility</i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
                
            </tbody>
      </table>

    </div>

</main>
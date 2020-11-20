<main class="page-content" id="all-google-play-credit-requests">
    <div class="container">

        <h1 class="page-title">All GooglePlay Credit Requests</h1>

        <table class="responsive-table">
            <thead>
                <tr>
                    <th>Google Account Email</th>
                    <th>Customer Details</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                
                <?php 
                 foreach($google_play_credit_requests as $gpcr): $customer = $this->AuthModel->fetch_customer_data_by_id($gpcr['customer_id']);  ?>
                <tr>
                    <td><?php echo $gpcr['email']; ?></td>
                    <td><?php echo $gpcr['customer_id'].'<br>'.$customer['first_name'].' '.$customer['last_name'].'<br>'.$customer['platform']; ?></td>
                    <td><?php echo ucfirst($customer['gpay_credit_claim_status']); ?></td>
                    <td>
                    <form method="POST" action="<?php echo site_url('update-claim-status-to-settled'); ?>" style="display: inline;">
                        <input type="hidden" name="customer-id" value="<?php echo $customer['id']; ?>">
                        <button type="submit" class="btn blue" <?php if($customer['gpay_credit_claim_status']=='settled'){echo 'disabled';} ?>>Mark Settled</button>
                    </form>
                    </td>
                </tr>
                <?php endforeach; ?>
                
            </tbody>
      </table>


    </div>
</main>
<main class="page-content" id="admin-dashboard">

    <div class="container">
    
        <h2 class="page-title"><?php

use function GuzzleHttp\json_decode;

echo $title; ?></h2>
        <p class="green-text darken-4"><?php echo $success; ?></p>
        <p class="red-text darken-4"><?php echo $error; ?></p>

        <?php if(!empty($refund_requests)): ?>
        <table class="responsive-table">
            <thead>
                <tr>
                    <td>
                        User Id
                    </td>
                    <td>
                        Mobile Number
                    </td>
                    <td>
                        Email
                    </td>
                    <td>
                        Bank Details
                    </td>
                    <td>
                        Actions
                    </td>
                </tr>
            </thead>
            <tbody>
                <?php  foreach($refund_requests as $refund_request): ?>
                <tr>
                    <td>
                        <?php echo $refund_request['customer_id']; ?>
                    </td>
                    <td>
                        <?php echo $refund_request['mobile_number']; ?>
                    </td>
                    <td>
                        <?php echo $refund_request['email']; ?>
                    </td>
                    <td>
                        <?php $bankDetails = var_dump($refund_request['bank_details']); 
                        ?>
                    </td>
                    <td>
                        <form action="<?php echo site_url('delete-refund-request'); ?>" method="post">
                            <input type="hidden" name="id" value="<?php echo $refund_request['id']; ?>">
                            <button class="btn red"><i class="material-icons">delete</i></button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
        <?php else:  ?>
            <p>No Refund Requests Added</p>
        <?php endif; ?>
    </div>

</main>
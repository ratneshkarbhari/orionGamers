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
                        <?php $bank_details = json_decode($refund_request['bank_details'],TRUE); echo $bank_details['account_number'].'<br>'.$bank_details['ifsc'].'<br>'.$bank_details['bank_name'].'<br>'.$bank_details['branch_name'].'<br>'; ?>
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

    <div style="margin-top: 5%;" class="container" id="addVideoBox">
    
        <h4>Add New Video</h4>

        <form enctype="multipart/form-data" action="<?php echo site_url('add-new-video-exe'); ?>" method="post">
        
            <input type="file" name="videothumb" accept="image/*">

            <input type="text" name="link" id="link">
        
            <button type="submit" class="btn">Add Video</button>

        </form>

    </div>

</main>
<main class="page-content" id="admin-dashboard">

    <div class="container">
    
        <h2 class="page-title"><?php echo $title; ?></h2>
        <p class="green-text darken-4"><?php echo $success; ?></p>
        <p class="red-text darken-4"><?php echo $error; ?></p>

        <?php if(!empty($videos)): ?>
        <table class="responsive-table">
            <thead>
                <tr>
                    <td>
                        Link
                    </td>
                    <td>
                        Actions
                    </td>
                </tr>
            </thead>
            <tbody>
                <?php  foreach($videos as $video): ?>
                <tr>
                    <td>
                        <?php echo $video['link']; ?>
                    </td>
                    <td>
                        <form action="<?php echo site_url('delete-video'); ?>" method="post">
                            <input type="hidden" name="id" value="<?php echo $video['id']; ?>">
                            <button class="btn red"><i class="material-icons">delete</i></button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
        <?php else:  ?>
            <p>No Videos Added</p>
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
<main class="page-content" id="admin-dashboard">

    <div class="container">
    
        <h2 class="page-title"><?php echo $title; ?></h2>
        <p class="green-text darken-4"><?php echo $success; ?></p>
        <p class="red-text darken-4"><?php echo $error; ?></p>


        <div class="row">
        
            <?php if($games): foreach($games as $game): ?>
            <div class="col l4 m6 s12">
            
                <div class="card">
                    <div class="card-image">
                        <img src="<?php echo site_url('assets/images/game_featured_images/'.$game['featured_image']); ?>">
                    </div>
                    <span class="card-title" style="margin-left: 3%;"><?php echo $game['title']; ?></span>

                    <div class="card-action center-align">
                        <a class="btn darken-2 green" href="<?php echo site_url('edit-game/'.$game['slug']); ?>"><i class="material-icons">edit</i></a>
                        <a class="btn darken-2 red modal-trigger" href="#delete-game-modal-<?php echo $game['id']; ?>"><i class="material-icons">delete</i></a>
                    </div>
                    <div id="delete-game-modal-<?php echo $game['id']; ?>" class="modal" style="padding: 5%;">
                        <h4>Are you sure?</h4>
                        <form action="<?php echo site_url('delete-game-exe'); ?>" method="post">
                            <input type="hidden" name="game-id" value="<?php echo $game['id']; ?>">
                            <button type="submit" class="btn red">Yes Delete it.</button>
                        </form>
                    </div>
                </div>
            
            </div>
            <?php endforeach; endif; ?>

        </div>
        

    </div>

    <div class="fixed-action-btn">
    <a class="btn-floating btn-large red " href="<?php echo site_url('add-new-game'); ?>">
        <i class="large material-icons">add</i>
        </a>
    </div>

</main>
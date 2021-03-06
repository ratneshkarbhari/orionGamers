<main class="page-content" id="admin-dashboard">

    <div class="container">
    
        <h2 class="page-title"><?php echo $title; ?></h2>
        <p class="green-text darken-4"><?php echo $success; ?></p>
        <p class="red-text darken-4"><?php echo $error; ?></p>


        <div class="row">
        
            <?php if(!empty($game_products)): foreach($game_products as $game_product): ?>
            <div class="col l4 m6 s12">
            
                <div class="card center-align">
                    <div class="card-image">
                        <img src="<?php echo site_url('assets/images/game_product_featured_images/'.$game_product['featured_image']); ?>">
                    </div>
                    <span class="card-title" style="margin-left: 3%;"><?php echo $game_product['title']; ?></span>

                    <div class="card-action center-align">
                        <a class="btn darken-2 green" href="<?php echo site_url('edit-game-product/'.$game_product['slug']); ?>"><i class="material-icons">edit</i></a>
                        <a class="btn darken-2 red modal-trigger" href="#delete-game-product-modal-<?php echo $game_product['id']; ?>"><i class="material-icons">delete</i></a>
                    </div>
                    <div id="delete-game-product-modal-<?php echo $game_product['id']; ?>" class="modal" style="padding: 5%;">
                        <h4>Are you sure?</h4>
                        <form action="<?php echo site_url('delete-game-product-exe'); ?>" method="post">
                            <input type="hidden" name="game-product-id" value="<?php echo $game_product['id']; ?>">
                            <button type="submit" class="btn red">Yes Delete it.</button>
                        </form>
                    </div>
                </div>
            
            </div>
            <?php endforeach; endif; ?>

        </div>
        

    </div>

    <div class="fixed-action-btn">
    <a class="btn-floating btn-large red " href="<?php echo site_url('add-new-game-product'); ?>">
        <i class="large material-icons">add</i>
        </a>
    </div>

</main>
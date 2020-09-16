<link rel="stylesheet" href="<?php echo site_url('assets/owl-carousel/assets/owl.carousel.min.css'); ?>">

<main class="page-content" id="admin-dashboard">

    <div class="container">
    
        <h2 class="page-title"><?php echo $title; ?></h2>
        <p class="green-text darken-4"><?php echo $success; ?></p>
        <p class="red-text darken-4"><?php echo $error; ?></p>


        <?php
        echo form_open_multipart('update-game-exe');
          ?>

            <input type="hidden" name="game-id" value="<?php echo $game['id']; ?>">

            <div class="ip-field-container">

                <label for="product-title">Game title</label>
                <input id="product-title" value="<?php echo $game['title']; ?>" class="ip-field" type="text" name="title" required>

            </div>

            <div class="ip-field-container">

                <label for="product-slug">Game slug</label>
                <input id="product-slug" value="<?php echo $game['slug']; ?>" class="ip-field" type="text" name="slug">

            </div>

            <div class="row" >
                <div class="col l12 m12 s12 center-align">
                    <img src="<?php echo site_url('assets/images/game_featured_images/'.$game['featured_image']); ?>" style="width: 100%;"><br>
                                <a class="btn darken-2 red" href="<?php echo site_url() ?>"><i class="material-icons">delete</i></a>
                    <div class="ip-field" style="margin: 3% 0;" >
                    <span>FEATURED IMAGE</span>
                        <input type="file" name="featured_image" accept="image/*">    
                    </div>
                </div>

                <div class="col l12 m12 s12 center-align">
                
                    <div class="owl-carousel">
                    
                    <?php $slider_images = $game['banner_images']; $banner_images_array = json_decode($slider_images,TRUE); $i=0; if(is_array($banner_images_array)): foreach ($banner_images_array as $banner_image): ?>
                        <div class="slider-image-item">
                            <img src="<?php echo site_url('assets/images/game_slider_images/'.$banner_image); ?>" style="width: 100%;"><br>
                            <?php echo form_open('delete-slider-image'); ?>
                                <input type="hidden" name="slider_image_key" value="<?php echo $i; ?>">
                                <input type="hidden" name="game-id" value="<?php echo $game['id']; ?>">
                                <button type="submit" class="btn darken-2 red"><i class="material-icons">delete</i></button>
                            <?php echo form_close(); ?>
                        </div>
                    <?php $i++; endforeach; endif; ?>
                    </div>
                    <div class="ip-field" style="margin: 3% 0;">
                    <span>SLIDER IMAGES</span>
                            <input type="file" name="slider_images[]" accept="image/*" multiple>
                       
                    </div>

                </div>
            </div>

            <div class="ip-field-container">

                <label for="product-description">Game description</label>
                <textarea class="materialize-textarea" id="product-description" class="ip-field" type="text" name="description"><?php echo $game['description']; ?>"</textarea>

            </div>

            <button type="submit" class="btn red" style="width: 100%; margin: 3% 0;">Add New Game</button>

        <?php echo 
        form_close();
         ?>
        

    </div>

</main>

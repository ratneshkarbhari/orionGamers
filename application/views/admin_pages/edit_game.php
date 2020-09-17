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
                    <div class="ip-field" style="margin: 3% 0;" >
                    <span>CHANGE FEATURED IMAGE</span>
                        <input type="file" name="featured_image" accept="image/*">    
                    </div>
                </div>

                <div class="col l12 m12 s12 center-align">
                
                    <div class="owl-carousel">
                    
                    <?php $slider_images = $game['banner_images']; $banner_images_array = json_decode($slider_images,TRUE); $i=0; if(count($banner_images_array)>0): foreach ($banner_images_array as $banner_image): ?>
                        <div class="slider-image-item">
                            <img src="<?php echo site_url('assets/images/game_slider_images/'.$banner_image); ?>" style="width: 100%;"><br>
                            <?php echo form_open('delete-slider-image'); ?>
                                <input type="hidden" name="slider_image_key" value="<?php echo $i; ?>">
                                <input type="hidden" name="game-id" value="<?php echo $game['id']; ?>">
                                <?php $sliderImgCount = count($banner_images_array); if ($sliderImgCount>1): ?>
                                <button type="submit" class="btn darken-2 red"><i class="material-icons">delete</i></button>
                                <?php endif; ?>
                            <?php echo form_close(); ?>
                        </div>
                    <?php $i++; endforeach; endif; ?>
                    </div>
                    <br>
                    <div class="col l12 m12 s12 center-align" id="slider_image_container">
                        <span>ADD SLIDER IMAGES:</span>

                        <div class="ip-field" style="margin: 3% 0;">
                            <input type="file" name="slider_images[]" id="slider_img_0" accept="image/*" >
                            <button type="button" target="slider_img_0" class="btn red delete-slider-img-field"><i class="material-icons">delete</i></button>
                        </div>

                    </div>
                    <div class="center-align">
                        <button type="button" class="btn" id="addSliderImage"><i class="material-icons">add</i></button>
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

<script>
let i = 1;
$("button#addSliderImage").click(function () {
    $("div#slider_image_container").append('<div class="ip-field" style="margin: 3% 0;"> <input type="file" name="slider_images[]" id="slider_img_'+i+'" accept="image/*"> <button type="button" target="slider_img_'+i+'" class="btn red delete-slider-img-field"><i class="material-icons">delete</i></button> </div>');
    i++;
});
$(document).on("click", ".delete-slider-img-field" , function() {
    let target = $(this).attr('target');
   $("input#"+target).css('display','none'); 
   $(this).css('display','none'); 
});
</script>
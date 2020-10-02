
<main class="page-content" id="admin-dashboard">

<div class="container">

    <h2 class="page-title"><?php echo $title; ?></h2>
    <p class="green-text darken-4"><?php echo $success; ?></p>
    <p class="red-text darken-4"><?php echo $error; ?></p>


    <?php
    echo form_open_multipart('update-game-product-exe');
      ?>

        <input type="hidden" name="game-product-id" value="<?php echo $gameProduct['id']; ?>">

        <div class="ip-field-container">

            <label for="product-title">Game Product title</label>
            <input id="product-title" class="ip-field" type="text" name="title" value="<?php echo $gameProduct['title']; ?>" required>

        </div>

        <div class="ip-field-container">

            <label for="product-slug">Game Product slug</label>
            <input id="product-slug" class="ip-field" value="<?php echo $gameProduct['slug']; ?>" type="text" name="slug">

        </div>
        <br>
        <div class="ip-field-container">

            <label for="game-select">Select a Game</label>


            <select name="game-id" class="browser-default" id="game-select" style="border: 1px solid darkgray;">


                <?php foreach($all_games as $game): ?>
                <option value="<?php echo $game['id']; ?>" <?php if ($gameProduct['parent_game']==$game['id']) {
                    echo 'selected';
                } ?>><?php echo $game['title']; ?></option>
                <?php endforeach; ?>

            </select>

        </div><br>

        <div class="row">
        
            <div class="ip-field-container col l6 m12 s12">

                <label for="product-price">Game Product Price</label>
                <input id="product-price" class="ip-field" value="<?php echo $gameProduct['price']; ?>" type="text" name="product-price">

            </div>
            <div class="ip-field-container col l6 m12 s12">

                <label for="product-sale-price">Game Product Sale Price</label>
                <input value="<?php echo $gameProduct['sale_price']; ?>" id="product-sale-price" class="ip-field" type="text" name="product-sale-price">

            </div>
        
        </div>


        <div class="center-align">
            <img src="<?php echo site_url('assets/images/game_product_featured_images/'.$gameProduct['featured_image']); ?>" style="width: 30%;">
        </div>
        

        <div class="row" >
            <div class="col l12 m12 s12 center-align">
                <div class="ip-field" style="margin: 3% 0;" >
                <span>FEATURED IMAGE</span>
                    <input type="file" name="featured_image" accept="image/*">    
                </div>
            </div>
            
            
        </div>

        <div class="ip-field-container">

            <label for="product-description">Game product description</label>
            <textarea class="materialize-textarea" id="product-description" class="ip-field" type="text" name="description"><?php echo $gameProduct['description']; ?></textarea>

        </div>

        <button type="submit" class="btn red" style="width: 100%; margin: 3% 0;">Update Game Product</button>

    <?php echo 
    form_close();
     ?>
    

</div>

</main>


<script>
let x = 1;
$("button#addSliderImage").click(function () {
$("div#slider_image_container").append('<div class="ip-field" style="margin: 3% 0;"> <input type="file" name="slider_images[]" id="slider_img_'+x+'" accept="image/*"> <button type="button" target="slider_img_'+x+'" class="btn red delete-slider-img-field"><i class="material-icons">delete</i></button> </div>');
i++;
});
$(document).on("click", ".delete-slider-img-field" , function() {
let target = $(this).attr('target');
$("input#"+target).css('display','none'); 
$(this).css('display','none'); 
});
</script>
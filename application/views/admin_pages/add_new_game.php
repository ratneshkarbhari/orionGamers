
<main class="page-content" id="admin-dashboard">

    <div class="container">
    
        <h2 class="page-title"><?php echo $title; ?></h2>
        <p class="green-text darken-4"><?php echo $success; ?></p>
        <p class="red-text darken-4"><?php echo $error; ?></p>


        <?php
        echo form_open_multipart('add-new-game-exe');
          ?>


            <div class="ip-field-container">

                <label for="product-title">Game title</label>
                <input id="product-title" class="ip-field" type="text" name="title" required>

            </div>

            <div class="ip-field-container">

                <label for="product-slug">Game slug</label>
                <input id="product-slug" class="ip-field" type="text" name="slug">

            </div>

            <div class="row" >
                <div class="col l12 m12 s12 center-align">
                    <div class="ip-field" style="margin: 3% 0;" >
                    <span>FEATURED IMAGE</span>
                        <input type="file" name="featured_image" accept="image/*">    
                    </div>
                </div>
                <div class="col l12 m12 s12 center-align" id="slider_image_container">
                    <span>SLIDER IMAGES:</span>

                    <div class="ip-field" style="margin: 3% 0;">
                        <input type="file" name="slider_images[]" id="slider_img_0" accept="image/*" >
                        <button type="button" target="slider_img_0" class="btn red delete-slider-img-field"><i class="material-icons">delete</i></button>
                    </div>

                </div>
                <div class="center-align">
                    <button type="button" class="btn" id="addSliderImage"><i class="material-icons">add</i></button>
                </div>
            </div>

            <div class="ip-field-container">

                <label for="product-description">Game description</label>
                <textarea class="materialize-textarea" id="product-description" class="ip-field" type="text" name="description"></textarea>

            </div>

            <button type="submit" class="btn red" style="width: 100%; margin: 3% 0;">Add New Game</button>

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
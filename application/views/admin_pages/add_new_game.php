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
                <div class="col l6 m12 s12">
                    <div class="ip-field" style="margin: 3% 0;" >
                    <span>FEATURED IMAGE</span>
                        <input type="file" name="featured_image" accept="image/*">    
                    </div>
                </div>
                <div class="col l6 m12 s12">

                    <div class="ip-field" style="margin: 3% 0;">
                    <span>SLIDER IMAGES</span>
                            <input type="file" name="slider_images[]" accept="image/*" multiple>
                       
                    </div>

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
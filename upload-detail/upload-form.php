<div class="upload__form">
    <div class="container">
        <div class="row rowWithFullWidth">
            

            <form enctype="multipart/form-data" method="post">

                <?php if ( $upload_errors ) { ?>
                    <div class="bg-danger red">
                        <?php foreach ( $upload_errors as $error ) { echo $error . '<br />';} ?>
                    </div>
                <?php } ?>


                <div class="form-group <?php echo isset( $upload_errors['title'] ) ? 'has-error' : '' ?>">
                    <label>Image title</label>
                    <input type="text" 
                           class="form-control" 
                           name="title"
                           placeholder="Title"
                           value="<?php echo filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING) ?>">
                </div>



                <div class="form-group <?php echo isset( $upload_errors['description'] ) ? 'has-error' : '' ?>">
                    <label>Image description</label>
                    <textarea type="text"
                              class="form-control"
                              name="description"
                              placeholder="Description"
                              ><?php echo filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING) ?></textarea>
                </div>



                <div class="form-group <?php echo isset( $upload_errors['image'] ) ? 'has-error' : '' ?>">
                    <label for="fileInput">File input</label>
                    <input type="file"
                           name="image"
                           value="<?php echo filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING) ?>">

                    <p class="help-block"></p>
                </div>


                <button type="submit"
                        class="btn btn-default"
                        name="upload_image">
                    Submit</button>
            </form>

            
        </div>
    </div>
</div>
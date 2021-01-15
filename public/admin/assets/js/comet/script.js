(function ($){
    $(document).ready(function (){

        // CK Editor use
        CKEDITOR.replace('post_editor');

        //datatable
        $('table.data-table').dataTable();


        /**
         * logout system
         */
        $('a#logout-button').click(function (e){
            e.preventDefault();
            $('form#logout-form').submit();
        });

        // Category edit

        $(document).on('click','a#category-edit', function (e){
            e.preventDefault();

            let id = $(this).attr('edit_id');

            $.ajax({
                url: 'post-category-edit/' + id,
                dataType : 'json',
                // data : new FormData(this),
                // contentType: false,
                // processData: false,
                success: function (data){
                    $('#category-modal-update form input[name="name"]').val(data.name);
                    $('#category-modal-update form input[name="id"]').val(data.id);
                }
            });
        });

        // Post Featured image load
        $(document).on('change','input#fimage',function (event){
            event.preventDefault();
            // event theke file dhore niye asar jonno
            let post_image_url = URL.createObjectURL(event.target.files[0]);

            $('img#post-featured-image-load').attr('src',post_image_url);

        });

        // Post Featured image edit
        $(document).on('change','input#fimage_edit',function (event){
            event.preventDefault();
            // event theke file dhore niye asar jonno
            let post_image_url = URL.createObjectURL(event.target.files[0]);

            $('img#post_featured_image_edit').attr('src',post_image_url);

        });


        // Post featured Edit
        $(document).on('click','#post-edit', function (e) {
            e.preventDefault();


            let edit_id = $(this).attr('edit_id');

            $.ajax({
                url: 'post-edit/' + edit_id,
                success: function (data) {
                    $('#post_modal_update input[name="id"]').val(data.id);
                    $('#post_modal_update input[name="title"]').val(data.title);
                    $('#post_modal_update textarea').text(data.content);
                    $('#post_featured_image_edit').attr('src', 'media/posts/' + data.image);
                    $('#post_modal_update .cl').html(data.cat_list);
                    $('#post_modal_update .tl').html(data.tag_list);

                    //modal show using js
                    $('#post_modal_update').modal('show');
                }
            });

        });

        // Comet slider Script
        $(document).on('click','#comet-add-slide',function (e) {
            e.preventDefault();

            let rand = Math.floor(Math.random() * 10000);
            $('.comet-slider-container').append('<div id="slider-card-'+ rand +'" class="card">\n' +
                '                                                <div data-toggle="collapse" data-target="#slide-'+ rand +'" class="card-header"><h4 style="cursor: pointer;">#slide-'+ rand +'<button id="comet-slide-remove-btn" remove_id="'+ rand +'" class="close">&times;</button></h4></div>\n' +
                '                                                <div id="slide-'+ rand +'"  class="collapse">\n' +
                '                                                    <div class="card-body">\n' +
                '                                                        <div class="form-group">\n' +
                '                                                            <label for="">Sub Tittle</label>\n' +
                '                                                            <input type="hidden" name="slide_code[]" value="'+ rand +'" class="form-control">\n<input type="text" name="subtitle[]" class="form-control">\n' +
                '                                                        </div>\n' +
                '                                                        <div class="form-group">\n' +
                '                                                            <label for="">Title</label>\n' +
                '                                                            <input type="text" name="title[]" class="form-control">\n' +
                '                                                        </div>\n' +
                '                                                        <div class="form-group">\n' +
                '                                                            <label for="">Button 01 Title</label>\n' +
                '                                                            <input type="text" name="btn1_title[]" class="form-control">\n' +
                '                                                        </div>\n' +
                '                                                        <div class="form-group">\n' +
                '                                                            <label for="">Button 01 Link</label>\n' +
                '                                                            <input type="text" name="btn1_link[]" class="form-control">\n' +
                '                                                        </div>\n' +
                '                                                        <div class="form-group">\n' +
                '                                                            <label for="">Button 02 Title</label>\n' +
                '                                                            <input type="text" name="btn2_title[]" class="form-control">\n' +
                '                                                        </div>\n' +
                '                                                        <div class="form-group">\n' +
                '                                                            <label for="">Button 02 Link</label>\n' +
                '                                                            <input type="text" name="btn2_link[]" class="form-control">\n' +
                '                                                        </div>\n' +
                '                                                    </div>\n' +
                '                                                </div>\n' +
                '                                            </div>');
        });

        // slider Remove
        $(document).on('click','#comet-slide-remove-btn',function (e) {
            e.preventDefault();
            let remove_code = $(this).attr('remove_id');
            $('#slider-card-'+ remove_code).remove();
        });

    });
})(jQuery)

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


    });
})(jQuery)

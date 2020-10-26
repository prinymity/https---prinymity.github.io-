jQuery(document).ready(function ($) {
    /*Color Picker*/
    $('.seb-color-picker').wpColorPicker();

    /*Media Upload Image*/
    $('.seb-image-upload').click(function (e) {
        e.preventDefault();
        var uploadButton = $(this);
        var image = wp.media({
            title: 'Upload Image',
            multiple: false
        }).open().on('select', function () {
            var uploaded_image = image.state().get('selection').first();
            console.log(uploaded_image);
            var image_url = uploaded_image.toJSON().url;
            uploadButton.siblings('.seb-image-source').attr('value',image_url);   
        });
    });

    /*Media Upload Video*/
    $('.seb-video-upload').click(function (e) {
        e.preventDefault();
        var uploadButton = $(this);
        var image = wp.media({
            title: 'Upload Video',
            multiple: false,
            library: {
                type: 'video'
            }
        }).open().on('select', function () {
            var uploaded_image = image.state().get('selection').first();
            console.log(uploaded_image);
            var image_url = uploaded_image.toJSON().url;
            uploadButton.siblings('.seb-video-source').attr('value',image_url);   
        });
    });

    $('.seb-background-type').on('change',function(){
        var seb_background_type = $(this); 
        var seb_background_type_val = $('option:selected',this).val();
        switch(seb_background_type_val){
            case 'color':
                $(this).closest('.seb-post-field-wrapper').siblings('.seb-post-field-outer-wrapper').hide();
                $(this).closest('.seb-post-field-wrapper').siblings('.seb-color-field-wrapper').show();
            break;
            case 'image':
                $(this).closest('.seb-post-field-wrapper').siblings('.seb-post-field-outer-wrapper').hide();
                $(this).closest('.seb-post-field-wrapper').siblings('.seb-image-field-wrapper').show();
            break;
            case 'video':
                $(this).closest('.seb-post-field-wrapper').siblings('.seb-post-field-outer-wrapper').hide();
                $(this).closest('.seb-post-field-wrapper').siblings('.seb-video-field-wrapper').show();
            break;
        }
    });

    $('.seb-video-type').on('change',function(){
        var seb_video_type = $(this); 
        var seb_video_type_val = $('option:selected',this).val();
        switch(seb_video_type_val){
            case 'custom':
                $(this).closest('.seb-post-field-wrapper').siblings('.seb-video-options').hide();
                $(this).closest('.seb-post-field-wrapper').siblings('.seb-video-custom').show();
            break;
            case 'youtube':
                $(this).closest('.seb-post-field-wrapper').siblings('.seb-video-options').hide();
                $(this).closest('.seb-post-field-wrapper').siblings('.seb-video-youtube').show();
            break;
            case 'vimeo':
                $(this).closest('.seb-post-field-wrapper').siblings('.seb-video-options').hide();
                $(this).closest('.seb-post-field-wrapper').siblings('.seb-video-vimeo').show();
            break;
        }
    });

    /*Overlay option*/
    $('.seb-overlay').on('click',function(){
        $(this).closest('.seb-post-field-wrapper').siblings('.seb-color-picker-wrapper').slideUp();
        if(this.checked){
            $(this).closest('.seb-post-field-wrapper').siblings('.seb-color-picker-wrapper').slideDown();
        }
    });

    
    /*Volumn Slider*/
    var handle1 = $( "#seb-large-custom-handle" );
    $( "#seb-col-large" ).slider({
        range: "min",
        min: 0,
        max: 99,
        value: $('#seb-col-large-val').val(),
        step: 1,
        create: function() {
            handle1.text( $( this ).slider( "value" ) );
        },
        slide: function( event, ui ) {
            handle1.text( ui.value );
            $(this).siblings( "#seb-col-large-val" ).val(ui.value );

        }
    });
    $( "#seb-col-large-val" ).val($( "#seb-col-large" ).slider( "value" ) );

    /*Contextual Help*/
    $('.post-type-seb_posts').find('#contextual-help-link').css({
        'color':'red',
        'font-weight':'bold'
    });
});

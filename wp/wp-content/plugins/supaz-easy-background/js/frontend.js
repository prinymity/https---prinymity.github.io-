jQuery(document).ready(function ($) {


    /* Custom Toggle Js */
    var seb_json_str = seb_settings.seb_arr.replace(/&quot;/g, '"');
    var seb_php_arr = jQuery.parseJSON(seb_json_str);
    var arr = $.map(seb_php_arr, function(el) { return el; });
        
    $.each(arr, function(index, seb_settings) {
        var seb_menu_id = seb_settings.seb_postid;
        var seb_disable = seb_settings.seb_disable;
        
        var seb_element_identifier = seb_settings.seb_element_identifier;
        
        var seb_background_type = seb_settings.seb_background_type;

        var seb_background_color = seb_settings.seb_background_color;

        var seb_image_source = seb_settings.seb_image_source;
        var seb_image_size = seb_settings.seb_image_size;
        var seb_image_position = seb_settings.seb_image_position;
        var seb_image_repeat = seb_settings.seb_image_repeat;

        var seb_video_type = seb_settings.seb_video_type;
        var seb_video_source = seb_settings.seb_video_source;
        var seb_youtube_source = seb_settings.seb_youtube_source;
        var seb_vimeo_source = seb_settings.seb_vimeo_source;
        var seb_start_time = seb_settings.seb_start_time;
        var seb_end_time = seb_settings.seb_end_time;
        var seb_mute_vol = seb_settings.seb_mute_vol;

        var seb_vol_val = 0;        
        if(seb_mute_vol != 1){
            seb_vol_val = seb_settings.seb_vol_val;
        }


        var seb_is_visible = seb_settings.seb_is_visible;
        
        var seb_z_index = seb_settings.seb_z_index;
        var seb_is_android = seb_settings.seb_is_android;
        var seb_is_ios = seb_settings.seb_is_ios;
        var seb_parallax = seb_settings.seb_parallax;
        var seb_overlay = seb_settings.seb_overlay;
        var seb_overlay_color = seb_settings.seb_overlay_color;

        seb_id = '#'+seb_element_identifier;
        seb_class = '.'+seb_element_identifier;

        if(seb_disable != 1){   
            $(seb_id).addClass('seb-enabled seb-'+seb_menu_id);
            $(seb_class).addClass('seb-enabled seb-'+seb_menu_id);
        }else{
            $(seb_id).removeClass('seb-enabled seb-'+seb_menu_id);
            $(seb_class).removeClass('seb-enabled seb-'+seb_menu_id);
        }
        
        if(seb_parallax == 1){
            $(seb_id).addClass('seb-parallax-disabled');
            $(seb_class).addClass('seb-parallax-disabled');
        }else{
            $(seb_id).removeClass('seb-parallax-disabled');
            $(seb_class).removeClass('seb-parallax-disabled');
        }

        if(seb_overlay == 1){
            $(seb_id).addClass('seb-overlay');
            $(seb_class).addClass('seb-overlay');
        }else{
            $(seb_id).removeClass('seb-overlay');
            $(seb_class).removeClass('seb-overlay');
        }

        if(seb_disable != 1){
            switch(seb_background_type){
                case 'color':
                    $(seb_class).css('background-color',seb_background_color);
                    $(seb_id).css('background-color',seb_background_color);
                break;
                case 'image':
                    jarallax(document.querySelectorAll(seb_class), {
                        imgSrc: seb_image_source,
                        imgSize: seb_image_size,
                        imgPosition: seb_image_position,
                        imgRepeat: seb_image_repeat, 
                        zIndex: seb_z_index,
                        noAndroid: seb_is_android,
                        noIos: seb_is_ios, 
                    });
                    jarallax(document.querySelectorAll(seb_id), {
                        imgSrc: seb_image_source,
                        imgSize: seb_image_size,
                        imgPosition: seb_image_position,
                        imgRepeat: seb_image_repeat, 
                        zIndex: seb_z_index,
                        noAndroid: seb_is_android,
                        noIos: seb_is_ios, 
                    });
                break;
                case 'video':
                    switch(seb_video_type){
                        case 'custom':
                            var video_src = seb_video_source;
                        break;
                        case 'youtube':
                            var video_src = seb_youtube_source;
                        break;
                        case 'vimeo':
                            var video_src = seb_vimeo_source;
                        break;
                    }
                    console.log( seb_vol_val);
                    jarallax(document.querySelectorAll(seb_class), {
                        videoSrc: video_src,
                        videoStartTime: seb_start_time,
                        videoEndTime: seb_end_time,
                        videoVolume: seb_vol_val,
                        videoPlayOnlyVisible: seb_is_visible, 
                        zIndex: seb_z_index,
                        noAndroid: seb_is_android,
                        noIos: seb_is_ios, 
                    });
                    jarallax(document.querySelectorAll(seb_id), {
                        videoSrc: video_src,
                        videoStartTime: seb_start_time,
                        videoEndTime: seb_end_time,
                        videoVolume: seb_vol_val,   
                        videoPlayOnlyVisible: seb_is_visible, 
                        zIndex: seb_z_index,
                        noAndroid: seb_is_android,
                        noIos: seb_is_ios, 
                    });
                break;
            }
        }
    });


});

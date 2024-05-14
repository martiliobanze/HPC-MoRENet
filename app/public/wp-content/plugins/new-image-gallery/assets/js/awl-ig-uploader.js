jQuery(function(jQuery) {
    
    var file_frame,
    awl_image_gallery = {
        ul: '',
        init: function() {
            this.ul = jQuery('.sbox');
            this.ul.sortable({
                placeholder: '',
				revert: true,
            });			
			
            /**
			 * Add Slide Callback Funtion
			 */
            jQuery('#add-new-slider').on('click', function(event) {
				var igp_add_images_nonce = jQuery("#igp_add_images_nonce").val();
                event.preventDefault();
                if (file_frame) {
                    file_frame.open();
                    return;
                }
                file_frame = wp.media.frames.file_frame = wp.media({
                    multiple: true
                });

                file_frame.on('select', function() {
                    var images = file_frame.state().get('selection').toJSON(),
                            length = images.length;
                    for (var i = 0; i < length; i++) {
                        awl_image_gallery.get_thumbnail(images[i]['id'], '', igp_add_images_nonce);
                    }
                });
                file_frame.open();
            });
			
			/**
			 * Delete Slide Callback Function
			 */
            this.ul.on('click', '#remove-slide', function() {
                if (confirm('Are sure to delete this images?')) {
                    jQuery(this).parent().fadeOut(700, function() {
                        jQuery(this).remove();
                    });
                }
                return false;
            });
			
			/**
			 * Delete All Slides Callback Function
			 */
			jQuery('#remove-all-slides').on('click', function() {
                if (confirm('Are sure to delete all images?')) {
                    awl_image_gallery.ul.empty();
                }
                return false;
            });
           
        },
        get_thumbnail: function(id, cb, igp_add_images_nonce) {
            cb = cb || function() {
            };
            var data = {
                action: 'image_gallery_js',
                slideId: id,
				igp_add_images_nonce: igp_add_images_nonce,
            };
            jQuery.post(ajaxurl, data, function(response) {
                awl_image_gallery.ul.append(response);
                cb();
            });
        }
    };
    awl_image_gallery.init();
});
// Widget Media Uploader for counter
jQuery(document).ready( function(){
function media_upload( button_class) {
var _custom_media = true,
_orig_send_attachment = wp.media.editor.send.attachment;
jQuery('body').on('click',button_class, function(e) {

    var button_id ='#'+jQuery(this).attr('id');
     
    var self = jQuery(button_id);
    var send_attachment_bkp = wp.media.editor.send.attachment;
    var button = jQuery(button_id);
    var id = button.attr('id').replace('_button', '');
    _custom_media = true;
    wp.media.editor.send.attachment = function(props, attachment){
        if ( _custom_media  ) {
            jQuery(button_id).parent().find('input[type="hidden"]').val(attachment.url); 
           jQuery(button_id).parent().find('img').attr('src',attachment.url);
           jQuery('.yala-travel-remove-counter').show();
        } else {
            return _orig_send_attachment.apply( button_id, [props, attachment] );
        }
        jQuery('input[name="savewidget"]').removeAttr('disabled');
    }
    wp.media.editor.open(button);
    return true;
});
}
media_upload( '.custom_media_upload');
jQuery('body').on('click','.yala-travel-remove-counter',function(e){
    jQuery(this).parent().find('img').attr('src','');
    jQuery(this).parent().find('input[type="hidden"]').val(''); 
    jQuery(this).hide();
    jQuery('input[name="savewidget"]').removeAttr('disabled');
});
});
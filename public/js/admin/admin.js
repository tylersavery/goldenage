var KEYCODE_ENTER = 13;
var KEYCODE_ESC = 27;
var KEYCODE_LEFT_ARROW = 37;
var KEYCODE_RIGHT_ARROW = 39;

$(document).ready(function() {
    $(".alert-message .close").click(function(){
        $(this).parent().fadeOut(400);
    });
    $(".modal_btn").click(function(){
        scroll_top();
    });
    $(".filtering select").change(function(){
        var key = $(this).attr("rel");
        var val = $(this).val();
        var url = $.url();
        var params = url.param();
        var new_url = url.attr('path');
        var str = '?1=1';
        
        //get values
        for (var param in params) {
            if(param != "1" && param != key){
                str += "&" + param;
                str += "=" + params[param];
            }
        }
        if(val != ''){ str += "&" + key + "=" + val; }
        window.location = new_url + str;  
    });
    
    $('#category_id').change(function() {
        
        $('#subcat option').attr('disabled', 'disabled');
        $('.category_id' + $(this).val()).removeAttr('disabled');
        
        if ($(this).val() == '0') {
            $('#subcat').fadeOut('fast');
        } else {
            $('#subcat').fadeIn('fast');
        }
    });
    $('#category_id').trigger('change');
    
    tinyMCE.baseURL = "/js/admin/tinymce";
    tinyMCE.init({
        mode : "exact",
        elements: "body",
        theme : "advanced",
        plugins : "paste,pigeonimage,advlink",
        width : '900px',
        height : '600px',
        apply_source_formatting : false,
        theme_advanced_buttons1 : 'bold,italic,underline,strikethrough,|,bullist,numlist,|,undo,redo,cleanup,|,pigeonimage,advlink,autolink,link',
        theme_advanced_buttons2 : '',
        theme_advanced_buttons3 : '',
        theme_advanced_toolbar_location : 'top',
        theme_advanced_toolbar_align : 'left',
        theme_advanced_resizing : false,
        paste_auto_cleanup_on_paste : true,
        paste_remove_styles : true,
        paste_remove_styles_if_webkit : true,
        paste_strip_class_attributes : true,
        content_css : '/css/bootstrap.min.css',
        extended_valid_elements : 'img[src|path],iframe[src|style|width|height|scrolling|marginwidth|marginheight|frameborder], a',
        relative_urls : false,
//        extended_valid_elements : '\"a[class|name|href|target|title|onclick|rel],script[type|src],iframe[src|style|width|height|scrolling|marginwidth|marginheight|frameborder],img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name],$elements\",'
    });
    
    $(".delete").click(function(){   
       return(confirm("Are you sure?"));  
    });
    
    $(".add_dailycable").click(function(){
        
        var id = $("#id").val();
        var article_id = $(this).attr("rel")
        
        $("#article_id").val(id);
        
        var date = $("#date").val();
        var datastring = "id="+ id + "&article_id=" + article_id + "&date=" + date;
        
        $.ajax({
            url: "/ajax/post/dailycable",
            type: "POST",
            data: datastring,
            success: function(d) {
                window.location = '/admin/dailycable';
            }
        });
        
       return false; 
    });
 
    
    
    
    $( ".datepicker" ).datepicker({dateFormat: "mm/dd/yy"});
    
    
});
function generateSlug() {
    $('#slug').val(string_to_slug($('#title').val()));
}
function updateCount(elem) {
    $('#' + $(elem).attr('id') + '_count span').html($(elem).val().length);
}


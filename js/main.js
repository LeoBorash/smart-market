function remove_img_input (block) {
    var btn = $('<span  style="color: red;font-weight: bold;cursor: pointer">X</span>');
    btn.click(function() {
        $(this).parents('.img_block').eq(0).remove();
    });
    $(block).append(btn);
}

$('.add_image').click(function() {
    var img_block = $('.img_block').eq(0).clone();
    remove_img_input(img_block);
    $('.imgs_blocks').append(img_block);
});
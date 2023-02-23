/**
 * Created by zia on 24/11/15.
 */
/*========================================Image Upload=================================================*/
function more_upload() {

    $("#more_upload").before($('<div class="fileupload fileupload-new" data-provides="fileupload"><span class="btn btn-default btn-file"><span class="fileupload-new">Select file</span><span class="fileupload-exists">Change</span><input type="file" name="image[]"></span><span class="fileupload-preview"></span><button class="close fileupload-exists" data-dismiss="fileupload" style="float:none" type="button">&times;</button></div>'));

}
function show_rmv_btn(which) {
    $("#rmv_btn_" + which).show();
}
function hide_rmv_btn(which) {
    $("#rmv_btn_" + which).hide();
}
function remove_img(base_url, img_id) {
    $.ajax({
        type: "POST",
        url: base_url + "/remove_img",
        data: "img_id=" + img_id,
        cache: false,
        success: function (result) {
            $('#img_container_' + img_id).hide('slow');
        }
    });
}
function change_language(current_url, lan) {
    var base_url = location.href.split('/');
    base_url = base_url[0] + '/' + base_url[1] + '/' + base_url[2];

    $.ajax({
        type: "POST",
        url: base_url + "/change_language",
        data: "current_url=" + current_url + "&lan=" + lan,
        cache: false,
        success: function (result) {
            location.reload();
        }
    });
}

/*==========================================End Image Upload============================================*/
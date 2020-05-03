/**
 * Created by sisadmin on 31.01.2018.
 */
$('#ajaxBusy').css({
    display:"none",
    margin:"0px",
    paddingLeft:"0px",
    paddingRight:"0px",
    paddingTop:"0px",
    paddingBottom:"0px",
    position:"absolute",
    right:"3px",
    top:"3px",
    width:"auto"
});
// Ajax activity indicator bound to ajax start/stop document events
$(document).ajaxStart(function(){
    $('#ajaxBusy').show();
    $.blockUI({ message: 'Пожалуйста подождите', overlayCSS: { backgroundColor: '#e2e1e0' },css: {border: 'none', padding: '15px', backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .5, color: '#fff'}
    });
}).ajaxStop(function(){
    $('#ajaxBusy').hide();
    $.unblockUI();
    $.growlUI('', 'Данные загружены!');

});
$(function(){
    $('.selector').bind('click',function(){
        $("#save_dost").hide();
        var id=$(this).attr('data-id');
        var $img = $("#foto-prof");
        $img.attr("src", $img.attr("src").split("?")[0] + "?" + Math.random());
        $.ajax({
            type:"POST",
            url:'ajax.php',
            data:'id='+id,
            dataType : "json",
            success:function(data){
                $.each(data, function(key, val){
                    $('#ajax_'+key).html(val);
                    if (key=="birthday"){
                        $("input[name=ajax_birthday_input]").val(val);
                    }
                    if (key=="groups_id"){
                        $('#index_groups_fuul').val(val);
                    }
                    if (key=="spec_id"){
                        $('#name_spec').val(val);
                    }
                    $('#undo').attr('data-id', id);
                });
            },
            error: function(jqXHR, exception)
            {
                if (jqXHR.status === 0) {
                    location.reload();
                } else if (jqXHR.status == 404) {
                    location.reload();
                } else if (jqXHR.status == 500) {
                    location.reload();
                } else if (exception === 'parsererror') {
                    location.reload();
                } else if (exception === 'timeout') {
                    location.reload();
                } else if (exception === 'abort') {
                    location.reload();
                } else {
                    location.reload();
                }
            }
        });
        $.ajax({
            type:"POST",
            url:'ajax-reiting.php',
            data:'id='+id,
            dataType : "html",
            success:function(data){
                $('#ajax_reiting').html(data);
            },
            error: function(jqXHR, exception)
            {
                if (jqXHR.status === 0) {
                    location.reload();
                } else if (jqXHR.status == 404) {
                    location.reload();
                } else if (jqXHR.status == 500) {
                    location.reload();
                } else if (exception === 'parsererror') {
                    location.reload();
                } else if (exception === 'timeout') {
                    location.reload();
                } else if (exception === 'abort') {
                    location.reload();
                } else {
                    location.reload();
                }
            }
        });
        $.ajax({
            type:"POST",
            url:'ajax-nirs.php',
            data:'id='+id,
            dataType : "html",
            success:function(data){
                $('#ajax_nirs').html(data);
            },
            error: function(jqXHR, exception)
            {
                if (jqXHR.status === 0) {
                    location.reload();
                } else if (jqXHR.status == 404) {
                    location.reload();
                } else if (jqXHR.status == 500) {
                    location.reload();
                } else if (exception === 'parsererror') {
                    location.reload();
                } else if (exception === 'timeout') {
                    location.reload();
                } else if (exception === 'abort') {
                    location.reload();
                } else {
                    location.reload();
                }
            }
        });
        return false;
    });
    $('#save').bind('click',function(){
        ajax_id = document.getElementById('ajax_id').textContent;
        ajax_famaly = document.getElementById('ajax_famaly').textContent;
        ajax_index_groups_fuul = document.getElementById('ajax_index_groups_fuul').textContent;
        ajax_kurs = document.getElementById('ajax_kurs').textContent;
        ajax_name = document.getElementById('ajax_name').textContent;
        ajax_name_spec = document.getElementById('ajax_name_spec').textContent;
        ajax_birthday = document.getElementById('ajax_birthday').textContent;
        arrr=ajax_famaly+" "+ajax_index_groups_fuul+" "+ajax_kurs+" "+ajax_name+" "+ajax_name_spec+" "+ajax_birthday;
        //document.write(arrr);
        $.ajax({
            type:"POST",
            url:'ajax-save.php',
            data:{'id': id, 'ajax_famaly': key, 'ajax_index_groups_fuul': key, 'ajax_kurs': key, 'ajax_name': key, 'ajax_name_spec': key, 'ajax_birthday': key,},
            dataType : "html",
            success:function(data){
                $('#ajax_nirs').html(data);
            },
            error: function(jqXHR, exception)
            {
                if (jqXHR.status === 0) {
                    location.reload();
                } else if (jqXHR.status == 404) {
                    location.reload();
                } else if (jqXHR.status == 500) {
                    location.reload();
                } else if (exception === 'parsererror') {
                    location.reload();
                } else if (exception === 'timeout') {
                    location.reload();
                } else if (exception === 'abort') {
                    location.reload();
                } else {
                    location.reload();
                }
            }
        });
        return false;
    });
    $('#save_dost').bind('click',function(){
        ajax_id = document.getElementById('ajax_id').textContent;
        ajax_famaly = document.getElementById('ajax_famaly').textContent;
        ajax_index_groups_fuul = document.getElementById('ajax_index_groups_fuul').textContent;
        ajax_kurs = document.getElementById('ajax_kurs').textContent;
        ajax_name = document.getElementById('ajax_name').textContent;
        ajax_name_spec = document.getElementById('ajax_name_spec').textContent;
        ajax_birthday = document.getElementById('ajax_birthday').textContent;
        ajax_id=
        ajax_id=$("#myselect").val();
        //document.write(arrr);?????????????????????????????????????????ТТТТТТТТТТТТТТТТТТТУУУУУУУУУУУУУУУУУУУУУУУУУУУУУУУУУУУУУ
        $.ajax({
            type:"POST",
            url:'ajax-save_dost.php',
            data:{'id': id, 'ajax_famaly': key, 'ajax_index_groups_fuul': key, 'ajax_kurs': key, 'ajax_name': key, 'ajax_name_spec': key, 'ajax_birthday': key,},
            dataType : "html",
            success:function(data){
                $('#ajax_nirs').html(data);
            },
            error: function(jqXHR, exception)
            {
                if (jqXHR.status === 0) {
                    location.reload();
                } else if (jqXHR.status == 404) {
                    location.reload();
                } else if (jqXHR.status == 500) {
                    location.reload();
                } else if (exception === 'parsererror') {
                    location.reload();
                } else if (exception === 'timeout') {
                    location.reload();
                } else if (exception === 'abort') {
                    location.reload();
                } else {
                    location.reload();
                }
            }
        });
        return false;
    });
    $('.change').bind('click',function(){
        $("#save_dost").show();
    });
});

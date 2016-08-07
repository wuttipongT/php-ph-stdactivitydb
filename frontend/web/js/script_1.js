/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


(function ($) {
   /* $(document).on("beforeSubmit", "#login-form", function () {
        // send data to actionSave by ajax request.
        //return false; // Cancel form submitting.
    });

     $(document).on('submit','form.edit_form',function (e) {
     e.preventDefault();
     var form = $(this);
     //if (form.find('.has-error').length) {
     // return false;
     //}
     
     $.ajax({
     type: form.attr("method"),
     url: form.attr("action"),
     data: form.serialize(),
     //contentType: "application/json; charset=UTF-8",
     dataType: 'json',
     cache: false,
     success : function (response) {
     
     //arr.push($.map(response, function(el) { return el })); //Object.keys(response).map(function(k) { return response[k] });
     
     
     $.each(response, function (i, item) {
     
     if (item["loginform-password"] == "success") {
     for ($data in response) {
     $('.field-' + $data).removeClass('has-error').addClass('has-success');
     $('.has-error .help-block-success').text(response[$data] + "");
     
     }
     } else {
     for ($data in response) {
     $('.field-' + $data).removeClass('has-success').addClass('has-error');
     $('.has-error .help-block-error').text(response[$data] + "");
     
     }
     }
     });
     console.log(response);
     //console.log(arr);
     /* if(!$.isEmptyObject(response)){
     
     }
     
     if(data['loginform-username'] != 'undefined'){
     
     }
     else{
     alert('ko');
     }
     */
    /* if (data['redirect'] == undefined) {
     for (propety in data) {
     $('.field-' + propety).removeClass('has-success').addClass('has-error');
     $('.has-error .help-block-error').text(data[propety] + "");
     
     }
     } else {
     //windows.location.href = data['undefined'];
     //window.location.href = 'http://localhost:8888'+data['redirect']
     console.log(data['redirect']+'55');
     }
     //console.log(data);
     var len = $.map(data, function (n, i) {
     return i;
     }).length;
     if (len > 0) {
     
     }
     },
     /*complete: function (xhr, status) {
     console.log('c');
     },
     error: function (xhr, status) {
     console.log('e');
     },
     });
     
     });*/
    /* $('#salmple').on('click', function(e){
     e.preventDefault();
     $.ajax({
     url: '?r=site/sample',
     type: 'post',
     contentType: "application/json; charset=UTF-8",
     dataType: 'json',
     //data: '',
     complete: function(data){
     var d = data.responseJSON
     for (property in d ){
     console.log(property + ':' + d[property]);
     }
     },
     error: function(e){
     //alert('<?php echo Yii::$app->request->baseUrl. \'/site/sample\' ?>');
     console.log(e)
     }
     
     });
     });
     $('#salmple2').on('click', function(e){
     e.preventDefault();
     $.ajax({
     url: '?r=site/about',
     type: 'get',
     contentType: 'html',
     success: function(data){
     $('body').html(data);
     },
     error: function(xhr, status){
     console.log(xhr + status)
     },
     complete: function(xhr, status){
     console.log(xhr + status)
     }
     
     });
     
     var obj = {
     id: $('#edu-id').val(),
     acadyear: $('#edu-edit-year').text(),
     $class: $('#class-edu-edit option:selected').val(),
     semester: $('#semester-edu-edit option:selected').val(),
     subid: $('#subid-edu-edit').val(),
     subname: $('#subname-edu-edit').val(),
     suben: $('#suben-edu-edit').val(),
     credit: $('#credit-edu-edit').val(),
     is_ajax: 14
     }
     });

    $(document).on('submit', 'form#w0', function (e) {
        e.preventDefault();
        //the rest
       /* var data = {};
        data.stdName = $('#info-student_name').val();
        data.stdLasname = $('#info-student_lastname').val();
        data.stdId = $('#info-student_id').val();
        data.address1 = $('#info-address1').val();
        data.address2 = $('#info-address2').val();
        data.phone1 = $('#info-phone1').val();
        data.phone2 = $('#info-phone2').val();
        data.nameF = $('#info-name_father').val();
        data.nameM = $('#info-name_mother').val();
        data.nameP = $('#info-name_parent').val();
        data.phoneP = $('#info-phone_parent').val();
        data.addressP = $('#info-work_address_parent').val();
        data.advisorsId = $('#info-advisors_id').val();//select
        data.congenitalDisease = $('#info-congenital_disease').val();
        data.beAllergic = $('#info-be_allergic').val();
        data.foodAllergy = $('#info-food_allergy').val();
        data.buddy = $('#info-buddy').val();
        data.buddyPhone = $('#info-buddy_phone').val();
        data.hobby = $('#info-hobby').val();
        data.ambition = $('#info-ambition').val();

        var favoriteSport = Array.prototype.map.call($('input[name="Info[Favorite_Sport][]"]:checked'), function (el, i) {
            return el.value;
        });

        var genius = Array.prototype.map.call($('input[name="Info[Genius][]"]:checked'), function (el, i) {
            return el.value;
        });
        data.favoriteSport = favoriteSport;
        data.genius = genius;
        data.rotcs = $('#info-rotcs').val();
        if ($('input[type="radio"][name="Info[Clement_Military]"]').is(':checked')) {
            var cm = $('input[type="radio"][name="Info[Clement_Military]"]:checked').val();
            data.clementMilitary = ((cm == '0') ? cm : $('input[type="text"][name="Info[Clement_Military]"]').val());
        }
        
        //console.log(data);
        // alert(cm);
        var form = $(this);
        var data = form.serializeArray();
            data.push({name: 'isAjax', value: 2});
        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: data,//JSON.parse(JSON.stringify(data)),//,
            dataType: 'json',
            success: function(res){
             $.each(res, function(key, obj){
                 if(obj['log'] == 'success') {
                     Lobibox.notify(
                        'success',  { position: 'top right',msg: 'บันทึกข้อมูลเรียบร้อยแล้ว! ขอบคุณที่สะละเวลา', delay: 15000,sound: false,}// Available types 'warning', 'info', 'success', 'error'
                    );
                    
                 }else{
                     Lobibox.notify(
                        'error',  {msg: 'การบันทึกข้อมูลล้มเหลว กรุณาติดต่อเจ้าหน้าที่!', delay: 15000,sound: false,}// Available types 'warning', 'info', 'success', 'error'
                    );
                 }
             });
               console.log(res);
            },
            error: function(xhr, status){console.log(xhr);},
        });
    });
    
*/
    alert('ko');
    $(document).on('submit', 'form#w0', function (e) {
        e.preventDefault();

        var form = $(this);
        console.log(form);
        /*var data = form.serializeArray();
            data.push({name: 'isAjax', value: 2});
        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            data: data,
            dataType: 'json',
            success: function(res){
                $.each(res, function(key, obj){
                    if(obj['log'] == 'success') {
                        Lobibox.notify(
                           'success',  { position: 'top right',msg: 'บันทึกข้อมูลเรียบร้อยแล้ว!', delay: 10000,sound: false,}// Available types 'warning', 'info', 'success', 'error'
                       );
                       $('.mn-left li:first-child a').attr('href','".$update."');
                    }else{
                        Lobibox.notify(
                           'error',  {msg: 'การบันทึกข้อมูลล้มเหลว กรุณาติดต่อเจ้าหน้าที่!', delay: 10000,sound: false,}// Available types 'warning', 'info', 'success', 'error'
                       );
                    }
                });
               console.log(res);
            },
            error: function(xhr, status){console.log(xhr);},
        });*/
    });
    $(document).on('submit', 'form#w02', function(e){
        e.preventDefault();
        var form = $(this);

        /*var data = form.serializeArray();
            data.push({name: 'isAjax', value: 4});
            $.ajax({
                    url: form.attr('action'),
                    type: form.attr('method'),
                    data: data,//JSON.parse(JSON.stringify(data)),//,
                    dataType: 'json',
                    success: function(res){
                     $.each(res, function(key, obj){
                             if(obj['log'] == 'success') {
                                     Lobibox.notify(
                                            'success',  { position: 'top right',msg: 'บันทึกข้อมูลเรียบร้อยแล้ว!', delay: 15000,sound: false,}// Available types 'warning', 'info', 'success', 'error'
                                    );
                                    $('.mn-left li:nth-child(2) a').attr('href','".$update."');
                             }else{
                                     Lobibox.notify(
                                            'error',  {msg: 'การบันทึกข้อมูลล้มเหลว กรุณาติดต่อเจ้าหน้าที่!', delay: 15000,sound: false,}// Available types 'warning', 'info', 'success', 'error'
                                    );
                             }

                     });
                       console.log(res);
                    },
                    error: function(xhr, status){console.log(xhr);},
            });*/
    });
});
function fnc_create() {
    //e.preventDefault();


    alert("ok");
    /*$.ajax({
     url: '/info/save',
     type: 'post',
     contentType: "application/json; charset=UTF-8",
     dataType: 'json',
     //data: '',
     complete: function (data) {
     var d = data.responseJSON
     for (property in d) {
     console.log(property + ':' + d[property]);
     alert(property + ':' + d[property]);
     }
     },
     error: function (e) {
     //alert('<?php echo Yii::$app->request->baseUrl. \'/site/sample\' ?>');
     console.log(e)
     }
     
     });*/
    return false;
}
function fncAwardOthor($this) {

    //console.log($($this).val());
    var tag = $($this);
/*
    if ($($this).val() == 3) {
        tag.parent().html('<input id="' + tag.attr('id') + '" class="' + tag.attr('class') + '" name="' + tag.attr('name') + '[]' + '" maxlength="32" type="text"/>');
    }*/
}

function fnc_ClementMilitary($this) {
    var ClementMilitary = $('input[name="Info[Clement_Military]"]:checked').val();
    //console.log($($this).is('#xx'));
    if (ClementMilitary == 1) {
        if (!$('#xx').length) {
            $($this).append('<div id="xx" class="form-group field-info-Clement-Military required"><label class="col-sm-2 control-label">เมื่อวันที่</label><div class="col-sm-10"><input name="Info[Clement_Military]" class="form-control" type="text"/></div></div>');
        }
    } else {
        $('#xx').remove();
    }
    
    uploadAjax(function(filename){
           //console.log(localStorage.getItem('filename'));
            data[5].value = filename;
            console.log(data);
            //localStorage.clear();
            //localStorage.removeItem('filename');
            //console.log(localStorage.getItem('filename'));
            $.ajax({
                url: form.attr('action'),
                type: form.attr('method'),
                data: data,
                dataType: 'json',
                success: function(res){
                    $.each(res, function(key, obj){
                        if(obj['log'] == 'success') {
                            Lobibox.notify(
                                'success',  { position: 'top right',msg: 'บันทึกข้อมูลเรียบร้อยแล้ว!', delay: 10000,sound: false,}// Available types 'warning', 'info', 'success', 'error'
                            );
                            if(form.find(':submit').data('record') == '1'){
                                 $('.mn-left li:first-child a').attr('href',action);
                                 form.attr('action', action);
                                 $('.mn-left li:nth-child(2) a').click();
                                 $("html, body").animate({ scrollTop: 0 }, "slow");
                            }
                        }else{
                             Lobibox.notify(
                                'error',  {msg: 'การบันทึกข้อมูลล้มเหลว กรุณาติดต่อเจ้าหน้าที่!', delay: 10000,sound: false,}// Available types 'warning', 'info', 'success', 'error'
                            );
                        }
                    });
                    console.log(res);
                },
                error: function(xhr, status){console.log(xhr);},
            }); 
        }); 

}
	
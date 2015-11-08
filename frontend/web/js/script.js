/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


(function ($) {

    $("ul.mn-left-ul li > a").on("click", function (e) {
        e.preventDefault();

        $.ajax({
            url: $(this).attr('href'),
            cache: false,
           // data: {id: '<id>', 'other': '<other>'},
            success: function (data) {
                // process data
                $("._form-content").html(data);

                console.log(data);

            },
            error: function (e) {
                alert(e);
            }
        });

    });

    $(document).on("beforeSubmit", "#login-form", function () {
        // send data to actionSave by ajax request.
        //return false; // Cancel form submitting.
    });

    $('.edit_form').submit(function (e) {
        //e.preventDefault();
        var form = $(this);
        //if (form.find('.has-error').length) {
        // return false;
        //}

        $.ajax({
            type: form.attr("method"),
            url: form.attr("action"),
            data: form.serialize(),
         //   contentType: "application/json; charset=UTF-8",
          // dataType: 'json',
            cache: false,
            success: function (response) {
                /*if(response["loginform-password"] != "success"){
                    for ($data in response) {
                        $('.field-' + $data).removeClass('has-success').addClass('has-error');
                        $('.has-error .help-block-error').text(response[$data] + "");
                        
                    }
                }
                if(response["loginform-password"] == "success"){
                     window.location.href = response['redirect'];
                     
                }*/
                console.log(response);
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
                 
                 }*/
            },
            /*complete: function (xhr, status) {
                console.log('c');
            },
            error: function (xhr, status) {
                console.log('e');
            },*/
        });
        return false;
    });
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
     });*/
})(jQuery);
function fnc_create(e) {
    e.preventDefault();

    var stdName = $('#txtStudent-Name').val();
    alert(stdName);
    $.ajax({
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

    });
}
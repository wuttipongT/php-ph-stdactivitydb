/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function(){
    
   $(document).on('submit', 'form#w0', function (e) {
        e.preventDefault();

        var form = $(this);
        var action = form.find(':submit').data('action');
       
        var data = form.serializeArray();
            data.push({name: 'isAjax', value: 2});
           
        var filename = uploadImage();
            data[6].value = filename;
            
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
    /*
    function uploadAjax(handleData){
        
        var formData = new FormData($('form#w0')[0]);
        formData.append('tax_file', $('input[type=file]')[0].files[0]);
        
        $.ajax({
            type: "POST",
            url: "image",
            data: formData,
            //use contentType, processData for sure.
            contentType: false, 
            processData: false,
            async: false, 
            beforeSend: function() {},
            success: function(res) {
                //localStorage.setItem('filename',msg);
                //console.log(msg);
                handleData(res);
            },
            error: function() {console.log('error');}
        });
        
    }
    */
    function uploadImage() {
        
        var result="";
        var formData = new FormData($('form#w0')[0]);
        formData.append('tax_file', $('input[type=file]')[0].files[0]);

        $.ajax({
            type: "POST",
            url: "image",
            data: formData,
            contentType: false, 
            processData: false,
            async: false,
            success: function(res) {result = res;},
            //error: function() {console.log('error');}
        });
        
       return result;
    }
    
    $(document).on('submit', 'form#w02', function(e){
        e.preventDefault();
        var form = $(this);
        var action = form.find(':submit').data('action');
        var data = form.serializeArray();
            data.push({name: 'isAjax', value: 4});
            data.push({name: 'seq', value: form.find(':submit').data('seq')});
            
            console.log(form.attr('action') + form.find(':submit').data('seq'));
            $.ajax({
                    url: form.attr('action'),
                    type: form.attr('method'),
                    data: data,//JSON.parse(JSON.stringify(data)),//,
                    dataType: 'json',
                    success: function(res){
                        console.log(res);
                     $.each(res, function(key, obj){
                             if(obj['log'] == 'success') {
                                     Lobibox.notify(
                                            'success',  { position: 'top right',msg: 'บันทึกข้อมูลเรียบร้อยแล้ว!', delay: 15000,sound: false,}// Available types 'warning', 'info', 'success', 'error'
                                    );
                            
                                
                             }else{
                                     Lobibox.notify(
                                            'error',  {msg: 'การบันทึกข้อมูลล้มเหลว กรุณาติดต่อเจ้าหน้าที่!', delay: 15000,sound: false,}// Available types 'warning', 'info', 'success', 'error'
                                    );
                             }

                     });
                       console.log(res);
                       
                       $('#activity-modal').modal('hide');
                         $('.mn-left li:eq(1) a').click();
                    },
                    error: function(xhr, status){console.log(xhr);},
            });
            
    });
    
    $(document).on('submit', 'form#w03', function(e){
        e.preventDefault();
        var form = $(this);
        var action = form.find(':submit').data('action');
       
        var data = form.serializeArray();
            data.push({name: 'isAjax', value: 6});
            $.ajax({
                    url: form.attr('action'),
                    type: form.attr('method'),
                    data: data,//JSON.parse(JSON.stringify(data)),//,
                    dataType: 'json',
                    success: function(res){
                        
                     $.each(res, function(key, obj){
                         
                        
                             if(obj['log'] == 'success') {
                               /*  $('table.table tr:eq(1) td[colspan="3"]').remove();
                        $('table.table').append("<tr><td>"+data[1].value+"</td><td>"+data[2].value+"</td><td>"+data[2].value+"</td></tr>");
                        $('#transcript-gpa').val('');
                        $('#transcript-academic_year').prop('selectedIndex', 0);*/
                        
                                     Lobibox.notify(
                                            'success',  { position: 'top right',msg: 'บันทึกข้อมูลเรียบร้อยแล้ว!', delay: 5000,sound: false,}// Available types 'warning', 'info', 'success', 'error'
                                    );
                               
                             }else{
                                     Lobibox.notify(
                                            'error',  {msg: 'การบันทึกข้อมูลล้มเหลว กรุณาติดต่อเจ้าหน้าที่!', delay: 5000,sound: false,}// Available types 'warning', 'info', 'success', 'error'
                                    );
                             }

                     });
                       console.log($('.mn-left li:nth-child(3) a').attr());
                    },
                    error: function(xhr, status){console.log(xhr);},
            });
        console.log($('ul.mn-left li:nth-child(3) a').attr('href'));
        if($('#activity-modal').modal('show')) $('#activity-modal').modal('hide');
         $('.mn-left li:eq(2) a').click();
    });
    
    $(document).on('click', '#falseinput',function(){
        $('#info-file').click();
    });
    
    $(document).on('change', '#info-file',function(){
        readURL(this);
    });
    
    function readURL(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#Avatar').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $(document).on('click','#btnAdd-scholarship', function(){
        
        var $length = $(this).prev().children('.scholarship-item').children().length -1;
        var $this = $(this);
        $.ajax({
          url: 'scholarship',
          type: 'POST',
          data: JSON.parse(JSON.stringify({'length': $length + 1})),
          dataType: 'html',
          success: function(res){
              $this.prev().children('.scholarship-item').append(res);
          },
          error: function(xhr, status){console.log(xhr);},
          
        });
    });
    
    $(document).on('click','#btnRem-scholarship', function(){
        var $length = $(this).prev().prev().children('.scholarship-item').children().length -1;
        if ($length != 0){
            $(this).prev().prev().children('.scholarship-item').children()[$length].remove();
        }
        
    });
    
    $(document).on('click','#btnAdd-award', function(){
        
        var $length = $(this).prev().children('.award-item').children().length -1;
        var $this = $(this);
        $.ajax({
          url: 'award',
          type: 'POST',
          data: JSON.parse(JSON.stringify({'length': $length + 1})),
          dataType: 'html',
          success: function(res){
              $this.prev().children('.award-item').append(res);
          },
          error: function(xhr, status){console.log(xhr);},
          
        });
    });
    
    $(document).on('click','#btnRem-award', function(){
        var $length = $(this).prev().prev().children('.award-item').children().length -1;
        if ($length != 0){
            $(this).prev().prev().children('.award-item').children()[$length].remove();
        }
        
    });
    
    $(document).on('click','#btnAdd-Activ', function(){
        
        //var $length = $('div[class^="activity-item-"]').length -1;
        var $length = $(this).prev().children().length -1;
        var $this = $(this);
        $.ajax({
          url: 'activ',
          type: 'POST',
          data: JSON.parse(JSON.stringify({'length': $length + 1})),
          dataType: 'html',
          success: function(res){
              console.log($this.prev())
              //$this.prev().children('.activity-item').append(res);
              $this.prev().append(res);
          },
          error: function(xhr, status){console.log(xhr);},
          
        });
    });
    
    $(document).on('click','#btnAdd-posi', function(){
        
        //var $length = $('div[class^="activity-item-"]').length -1;
        var $length = $(this).prev().children().length -1;
        var $this = $(this);
        $.ajax({
          url: 'position',
          type: 'POST',
          data: JSON.parse(JSON.stringify({'length': $length + 1})),
          dataType: 'html',
          success: function(res){
              console.log($this.prev())
              //$this.prev().children('.activity-item').append(res);
              $this.prev().append(res);
          },
          error: function(xhr, status){console.log(xhr);},
          
        });
    });
});

function fncAwardOthor($this) {

    //console.log($($this).val());
    var tag = $($this);
/*
    if ($($this).val() == 3) {
        tag.parent().html('<input id="' + tag.attr('id') + '" class="' + tag.attr('class') + '" name="' + tag.attr('name') + '[]' + '" maxlength="32" type="text"/>');
    }*/
}

function fnc_ClementMilitary($this) {
    /*var ClementMilitary = $('input[name="Info[Clement_Military]"]:checked').val();
    //console.log($($this).is('#xx'));
    
    if (ClementMilitary == 1) {
        if (!$('#xx').length) {
            var $value =  $($this).data('value') == undefined ? '' : $($this).data('value');
            $($this).append('<div id="xx" class="form-group field-info-Clement-Military required"><label class="col-sm-2 control-label">เมื่อวันที่</label><div class="col-sm-10"><input name="Info[txtClement_Military]" class="form-control" type="text" value="'+$value+'"/></div></div>');
        }
    } else {
        $('#xx').remove();
    }*/
    var ClementMilitary = $('input[name="Info[Clement_Military]"]:checked').val();
    //console.log($($this).is('#xx'));
    
    if (ClementMilitary == 1) {
        if (!$('#xx').length) {
            var $value =  $($this).data('value') == undefined ? '' : $($this).data('value');
            $.ajax({
                url: "datetime",
                type: 'post',
                //contentType: "application/json; charset=UTF-8",
                //dataType: 'html',
                data: JSON.parse(JSON.stringify({'value': $value})),
                complete: function (data) {
                    $($this).append(data.responseText);
                    console.log(data.responseText);
                },
                error: function (e) {
                //alert('<?php echo Yii::$app->request->baseUrl. \'/site/sample\' ?>');
                    console.log(e)
                }
     
            });
        }
    } else {
        $('#xx').remove();
    }
}
function fnc_Sport($this){
    //'input[name="Info[Sport][]"]'
        if ($('input[name="Info[Sport][]"]:eq(4)').is(':checked')){
            if (!$('#cc').length){
                var $value =  $($this).data('value') == undefined ? '' : $($this).data('value');
                $($this).after('&nbsp;<label id="cc"><input id="gg" name="Info[Str]" type="text" value="'+$value+'" style="font-size: 14px;color: #555; background-color: #FFF; background-image: none;border: 1px solid #CCC; border-radius: 4px;box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset;transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;height: 30px;"/></label>');
            }
        }else{
             $('#cc').remove();
        }
    /*$.each($($this).find('input[name="Info[Sport][]"]'), function(i, v){
        if (i == 4 && $(v).is(':checked')){
            if (!$('#cc').length){
                $($this).after('&nbsp;<label id="cc"><input name="gg" type="text" value="" onchange="js:fnc_insertData();" style="font-size: 14px;color: #555; background-color: #FFF; background-image: none;border: 1px solid #CCC; border-radius: 4px;box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset;transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;height: 30px;"/></label>');
            }
        }else{
             $('#cc').remove();
        }
        
    });*/
    //var sport = $('input[name="Info[Sport][]"]:checked').val();
    //alert(sport);
    //console.log($this);
}
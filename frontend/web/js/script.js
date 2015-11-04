/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


(function($){
    $('#salmple').on('click', function(e){
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
    });
})(jQuery);
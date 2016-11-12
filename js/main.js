$(document).ready(function () {
    $('#photo').submit(function () {
        var fd = new FormData(document.forms.photo);
        $.ajax({
            url: "addphoto.php",
            type: "post",
            data:fd,
            processData: false,
            contentType: false,
            success: function (data) {
                $('#photo[type="file"]').val('');
                $('.gallery').empty();
                $.each(data, function(id,src){
                    $('.gallery').append('<img src="'+src.src+'"/>');
                });                
            }
            // error: function (data) {
            //     var arr=[];
            //     $.each(data,function(i,val){
            //         var result="";
            //         result+="error:";
            //         result+=val;
            //         arr.push(result);
            //     });
            //     alert(arr.join(", "));
            // }
            
           
        });
        return false;
    });
});

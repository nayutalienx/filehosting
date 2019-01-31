$('document').ready(function(){
    $('.progress').hide();
    
    $('#upload_button').click(function(event){
        event.preventDefault();
        var file = $("#file").prop('files')[0];
        var formdata = new FormData();
        formdata.append('file',file);
        $.ajax({ 
            xhr: function(){
                var xhr = new window.XMLHttpRequest();
                // прогресс загрузки на сервер
                xhr.upload.addEventListener("progress", function(evt){
                    if (evt.lengthComputable) {
                        var percentComplete = evt.loaded / evt.total;
                        console.log(percentComplete);
                    }
                }, false);
                return xhr;
            },
            url: "add",
            data: formdata,
            cache: false,
            contentType: false,
            processData: false,
            type: "POST",
            success: function(response){
                console.log(response);
            }

        });

    });
});
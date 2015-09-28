'use strict';

window.BoatCtrl = {
    _construct: function () {
        var self = this;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        self.initUploadImage();
    },

    updateBoat: function() {
        var self = this,
            data = {
                id: $('.boat-id').html(),
                name: $('#name').val(),
                width: $('#width').val(),
                length: $('#length').val(),
                password: $('#password').val()
            };

        $.post('/boats/update-boat', {
            data: data
        }).success(function(response) {
            window.location.replace("/boats");
        }).error(function(response) {

        });
    },

    saveBoat: function() {
        var data = {
            name: $('#name').val(),
            width: $('#width').val(),
            length: $('#length').val()
        };

        $.post('/boats/save-boat', {
            data: data
        }).success(function(response) {
            console.log(response);
        }).error(function(response) {

        });
    },

    initUploadImage: function() {
        var self = this,
            maxPostSize = 10485760;

        $('#image').change(function(event) {
            var files = event.target.files,
                data = new FormData(),
                totalPostSize = 0;

            _.each(files, function(file, key) {
                totalPostSize = totalPostSize + file.size;
                data.append('image', file);
            });

            if (totalPostSize >= maxPostSize) {
                alert('The image you tried to upload is too large. The maximum file size is 10MB');
                return;
            }

            $.ajax({
                type: 'POST',
                url: '/boats/upload-image',
                data: data,
                processData: false,
                contentType: false,
                success: function(response) {
                    //console.log(response);
                    $('.deck-image').css({'background': 'url("/temp_uploads/' + response.filename + '") 50% 50% / cover'});
                },
                error: function(response) {
                    console.log("Uh oh, something went wrong!");
                }
            });
        });
    }
}

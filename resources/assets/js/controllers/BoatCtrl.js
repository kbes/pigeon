'use strict';

window.BoatCtrl = {
    _construct: function () {
        var self = this;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
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
    }
}

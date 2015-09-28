'use strict';

window.BaseCtrl = {
    _construct: function () {
        var self = this;
        self.initNumericInput();
    },

    // Filter user input on numeric fields
    initNumericInput: function() {
        $('.numeric').on('input', function (element) {
            var userValue = parseInt($(this).val());

            if(userValue < 0 || isNaN(userValue)) {
                $(this).val(0);
            } else {
                $(this).val(userValue);
            }
        });
    }
}
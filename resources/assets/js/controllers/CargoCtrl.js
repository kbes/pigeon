'use strict';

window.BaseCtrl = {
    _construct: function () {
        var self = this;
        self.initCategoryList();
        self.initNewItem();
    },

    initCategoryList: function() {
        var $categoryList = $('.category-list');

        var options = {
            valueNames: ['category']
        };

        var itemsList = new List('items', options);

        // Configure category-link styles
        $categoryList.find('a').click(function(event) {
            event.preventDefault();
            var $categoryLink = $(this);

            if (!$categoryLink.hasClass('active')) {
                $('.active').removeClass('active');
                $categoryLink.addClass('active');

                var category = $categoryLink.html();

                if (category != "All") {
                    itemsList.filter(function (item) {
                        if (item.values().category == category) {
                            return true;
                        }

                        return false;
                    });
                } else {
                    itemsList.filter(function (item) {
                        return true;
                    });
                }
            };
        });
    },

    initNewItem: function() {
        $('.new-item-button').click(function (event) {
            event.preventDefault();

            $.magnificPopup.open({
                items: {
                    src: $('.new-item'),
                    type: 'inline'
                },
                showCloseBtn: true,
                closeOnBgClick: true
            });
        });
    }
}
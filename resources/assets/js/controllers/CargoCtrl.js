'use strict';

window.CargoCtrl = {
    _construct: function () {
        var self = this;
        self.initCategoryList();
        self.initNewItem();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
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
            }
        });
    },

    initNewItem: function() {
        $('.new-item-button').click(function (event) {
            $.magnificPopup.open({
                items: {
                    src: $('.new-item'),
                    type: 'inline'
                },
                showCloseBtn: true,
                closeOnBgClick: true
            });
        });
    },

    editItem: function(id) {
        $.post('/cargo/item',{
            'id': id
        }).success(function(response) {
            var item = response.item;
            $('.item-id').html(item.id);
            $('.edit-item #name').val(item.name);
            $('.edit-item #width').val(item.width);
            $('.edit-item #length').val(item.length);
            $('.edit-item #category').val(item.category_id);

            $.magnificPopup.open({
                items: {
                    src: $('.edit-item'),
                    type: 'inline'
                },
                showCloseBtn: true,
                closeOnBgClick: true
            });
        }).error(function(response) {
            console.log('no');
        });
    },

    saveItem: function() {
        var self = this,
            data = {
            id: $('.item-id').html(),
            name: $('#name').val(),
            width: $('#width').val(),
            length: $('#length').val(),
            category_id: $('#category').val()
        };

        $.post('cargo/save-item', {
            data: data
        }).success(function (response) {
            $('tr[data-id="' + data.id + '"] .name').html(data.name);
            self.closePopups();
        })
        .error(function(response) {
            console.log(response);
        });
    },

    closePopups: function() {
        $.magnificPopup.close();
    }
}
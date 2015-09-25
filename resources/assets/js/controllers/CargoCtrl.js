'use strict';

window.CargoCtrl = {
    _construct: function () {
        var self = this;
        self.initCategoryList();
        self.initNewItem();
        self.initNumericInput();

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

                    $('.edit-category').removeClass('hide');
                } else {
                    itemsList.filter(function (item) {
                        return true;
                    });

                    $('.edit-category').addClass('hide');
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

    initNumericInput: function() {
        $('.numeric').on('input', function (element) {
            var userValue = parseInt($(this).val());

            if(userValue < 0 || isNaN(userValue)) {
                $(this).val(0);
            } else {
                $(this).val(userValue);
            }
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
            console.log('that didn\'t work');
        });
    },

    // Update existing item or insert new item
    saveItem: function() {
        var self = this,
            data = {
            id: $('.edit-item .item-id').html(),
            name: $('#name').val(),
            width: $('#width').val(),
            length: $('#length').val(),
            category_id: $('#category').val()
        };

        $.post('cargo/save-item', {
            data: data
        }).success(function (response) {
            if (response.new == true) {
                var itemRow = {
                    id: response.id,
                    name: data.name,
                    width: data.width,
                    length: data.length,
                    category: data.category_id
                };

                // Add new row to items table
                var renderedItemRow = Mustache.render($('.new-item-row').html(), itemRow);
                $('.list').append(renderedItemRow);
                self.closePopups();

                //Reset form
                $.each($('.new-item input'), function (i, element) {
                    $(element).val('');
                });
                $('.new-item select').val(1);
            } else {
                // Update row in items table
                $('tr[data-id="' + data.id + '"] .name').html(data.name);
                self.closePopups();
            }
        })
        .error(function(response) {
            console.log(response);
        });
    },
    deleteItem: function(id) {

    },

    closePopups: function() {
        $.magnificPopup.close();
    }
}
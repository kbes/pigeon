'use strict';

window.CargoCtrl = {
    _construct: function () {
        var self = this;
        self.initCategoryList();
        self.initNumericInput();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    },

    // Hook up list.js to category menu
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

                    $('.edit-category-button').removeClass('hide');
                } else {
                    itemsList.filter(function (item) {
                        return true;
                    });

                    $('.edit-category-button').addClass('hide');
                }
            }
        });
    },

    // Display form to create a new item
    newItem: function() {
        $.magnificPopup.open({
            items: {
                src: $('.new-item'),
                type: 'inline'
            },
            showCloseBtn: true,
            closeOnBgClick: true
        });
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
    },

    // Display item editing form
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

    // Insert new item
    saveItem: function() {
        var self = this,
            data = {
                name: $('.new-item #name').val(),
                width: $('.new-item #width').val(),
                length: $('.new-item #length').val(),
                category_id: $('.new-item #category').val()
        };

        $.post('cargo/save-item', {
            data: data
        }).success(function (response) {
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
        })
        .error(function(response) {
            console.log(response);
        });
    },

    // Update edited item
    updateItem: function() {
        var self = this,
            data = {
                id: $('.edit-item .item-id').html(),
                name: $('.edit-item #name').val(),
                width: $('.edit-item #width').val(),
                length: $('.edit-item #length').val(),
                category_id: $('.edit-item #category').val()
            };

        $.post('cargo/update-item', {
            data: data
        }).success(function (response) {
            // Update row in items table
            $('tr[data-id="' + data.id + '"] .name').html(data.name);
            self.closePopups();
        }).error(function(response) {
            console.log(response);
        });
    },

    // Delete item
    deleteItem: function() {
        if (!window.confirm("Are you sure?")) {
            return false;
        }

        var self = this,
            id = $('.edit-item .item-id').html();

        $.post('cargo/delete-item', {
            id: id
        }).success(function(response) {
            self.closePopups();
            $('tr[data-id="' + id + '"]').remove();
        }).error(function(response) {
            console.log('Couldn\'t delete item.');
        });
    },

    // Display form to create new category
    newCategory: function() {
        $.magnificPopup.open({
            items: {
                src: $('.new-category'),
                type: 'inline'
            },
            showCloseBtn: true,
            closeOnBgClick: true
        });
    },

    // Display form for editing categories
    editCategory: function() {
        var name = $('.category-list .active').html(),
            id = $('.category-list .active').attr('data-id');

        $('.edit-category #name').val(name);
        $('.edit-category .category-id').html(id);

        $.magnificPopup.open({
            items: {
                src: $('.edit-category'),
                type: 'inline'
            },
            showCloseBtn: true,
            closeOnBgClick: true
        });
    },

    // Insert new category
    saveCategory: function() {
        var self = this,
            name = $('.new-category #name').val();

        $.post('cargo/save-category', {
            name: name
        }).success(function (response) {
            $('.category-list').append('<li><a href="#">' + name + '</a></li>');
            self.closePopups();
            $('.new-category #name').val('');

            self.initCategoryList();
        }).error(function (response) {

        });
    },

    updateCategory: function()
    {
        var self = this,
            data = {
                name : $('.edit-category #name').val(),
                id : $('.edit-category .category-id').html()
            };

        $.post('cargo/update-category', {
            data: data
        }).success(function (response) {
            $('.category-list .active').html(data.name);
            self.closePopups();
            self.initCategoryList();
        }).error(function (response) {

        });
    },

    deleteCategory: function()
    {
        if (!window.confirm("Are you sure?")) {
            return false;
        }

        var self = this,
            id = $('.edit-category .category-id').html();

        $.post('cargo/delete-category', {
            id: id
        }).success(function(response) {
            self.closePopups();
            $('.category-list li:has(a.active)').remove();
            console.log(response);
        }).error(function(response) {
            console.log('Couldn\'t delete category.');
        });
    },

    // Un-display and reset open modal boxes
    closePopups: function() {
        $.magnificPopup.close();

        $.each($('.form-fields input'), function (i, element) {
            $(element).val('');
        });
        $('.form-fields select').val(1);
    }
}
define([
    'jquery'
], function ($) {
    'use strict';

    return function (config, element) {
        $('#apply_discount').on('click', function () {
            // Add functionality to apply discount code
            alert('Discount Code Applied!');
        });

        $('#toggle_discount_code').on('click', function () {
            $('#discount_code').toggle();
        });
    };
});

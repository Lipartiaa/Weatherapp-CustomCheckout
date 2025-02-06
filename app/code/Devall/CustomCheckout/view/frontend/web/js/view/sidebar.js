define([
    'Magento_Checkout/js/view/sidebar',
    'uiComponent',
    'Magento_Ui/js/modal/alert'
], function (Component, uiComponent, alert) {
    'use strict';

    return Component.extend({
        initialize: function () {
            this._super();
        },

        getViewCartUrl: function() {
            return window.checkoutConfig.checkoutUrl + 'cart';
        }
    });
});

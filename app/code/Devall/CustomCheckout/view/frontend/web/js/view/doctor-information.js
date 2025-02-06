define([
    'uiComponent',
    'Magento_Checkout/js/model/step-list'
], function (Component, stepList) {
    'use strict';

    return Component.extend({
        defaults: {
            template: 'Devall_CustomCheckout/doctor-information'
        },

        isVisible: true,

        initialize: function () {
            this._super();

            stepList.push({
                code: 'doctor-information-step',
                title: 'Doctor Information',
                component: 'Devall_CustomCheckout/js/view/doctor-information',
                sortOrder: 999
            });

            return this;
        }
    });
});

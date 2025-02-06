define([], function() {
    'use strict';

    return function(subject) {
        return subject.extend({
            defaults: {
                detailsTemplate: 'Devall_CustomCheckout/billing-address/details'
            }
        });
    };
});

define([
    'uiComponent',
    'Magento_Customer/js/model/customer',
    'Magento_ConfigurableProduct/js/configurable-attributes-config'
], function (Component, customer) {
    'use strict';

    return Component.extend({
        isLoggedIn: customer.isLoggedIn(),  // Check if the customer is logged in
        storePhoneNumber: window.checkoutConfig.storePhoneNumber,  // Store phone number from config
        firstName: customer.customerData.firstname,  // Get the customer's first name
    });
});

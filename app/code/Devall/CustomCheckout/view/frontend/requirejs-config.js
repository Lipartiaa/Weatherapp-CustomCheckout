let config = {
    deps: [
        'Devall_CustomCheckout/js/mask-telephone-inputs',
        'Devall_CustomCheckout/js/discount-code'
    ],
    map: {
        '*': {
            'Magento_Checkout/template/sidebar.html': 'Devall_CustomCheckout/template/sidebar.html',
            'Devall_CustomCheckout/doctor-information': 'Devall_CustomCheckout/js/view/doctor-information',
            'Magento_Checkout/template/discount-code': 'Devall_CustomCheckout/checkout/discount-code',
            'Magento_Checkout/js/view/sidebar': 'Devall_CustomCheckout/js/view/sidebar'
        }
    },
    config: {
        mixins: {
            'Magento_Checkout/js/action/set-shipping-information': {
                'Devall_CustomCheckout/js/action/set-shipping-information-mixin': true
            },
            'Magento_Checkout/js/view/billing-address': {
                'Devall_CustomCheckout/js/view/billing-address-mixin': true
            }
        }
    }
};

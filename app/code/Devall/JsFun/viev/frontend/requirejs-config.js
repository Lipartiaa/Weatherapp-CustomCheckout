var config = {
    "map": {
        "*": {
            "fadeInElement": "Devall_JsFun/js/fade-in-element",
            "Magento_Review/js/submit-review": "Devall_JsFun/js/submit-review"
        }
    },
    "paths": {
        "vue": [
            "https://cdn.jsdelivr.net/npm/vue/dist/vue",
            "Devall_JsFun/js/vue"
        ]
    },
    "shim": {
        "Devall_JsFun/js/jquery-log": ["jquery"]
    },
    "deps": ["Devall_JsFun/js/every-page"],
    "config": {
        "mixins": {
            "Magento_Ui/js/view/messages": {
                "Devall_JsFun/js/messages-mixin": true
            }
        }
    }
};

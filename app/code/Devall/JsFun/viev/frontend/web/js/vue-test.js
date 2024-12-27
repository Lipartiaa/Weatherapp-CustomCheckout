// When you request both "jquery" and "Devall_JsFun/js/jquery-log", async
// requests are made to request both files.
define(['vue', 'jquery', 'Devall_JsFun/js/jquery-log'], function(Vue, $) {
    'use strict';


    $.log('Testing output to the console');
});

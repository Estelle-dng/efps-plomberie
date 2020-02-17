/*================================================================================== */
/* Jquery START ==================================================================== */
jQuery(document).ready(function ($) {
    "use strict";

    var cookieName = 'noticeCookie';

    if (!readCookie(cookieName)) {
        $('#notice-cookie').show();

        $('#agree-cookie').on('click', function(ev){
            createCookie(cookieName, 1, 365);
            return ev.preventDefault();
        });

        $('#agree-cookie').on('click', function () {
            $('#notice-cookie').fadeOut();
        });
    }

    var cookieExplorerName = 'noticeExplorerCookie';

    if (!readCookie(cookieExplorerName) && msieversion()) {
        $('#notice-explorer-cookie').modal('show');

        $('#agree-explorer-cookie').on('click', function(ev){
            createCookie(cookieExplorerName, 1, 365);
            return ev.preventDefault();
        });

        $('#agree-explorer-cookie').on('click', function () {
            $('#notice-explorer-cookie').fadeOut();
        });
    }
});

function createCookie(name,value,days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime()+(days*24*60*60*1000));
        var expires = "; expires="+date.toGMTString();
    }
    else var expires = "";
    document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

function eraseCookie(name) {
    createCookie(name,"",-1);
}

// POPUP FOR IEXPLORER

/**
 * detect IE
 * returns version of IE or false, if browser is not Internet Explorer
 */
function msieversion() {

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE ");

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))  // If Internet Explorer, return version number
    {
        return true
    }
    else  // If another browser, return 0
    {
        return false
    }
}
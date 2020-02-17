(function($) {

    // jQuery plugin definition
    $.fn.createlogo = function(params) {

        // merge default and user parameters
        params = $.extend( {}, params);

        // // traverse all nodes
        $('.infinitAnimateLogo').each(function() {


            var $this = $(this);
            var svg = $this.find('object').eq(0);
            var img = $this.find('img').eq(0);

            new Vivus(svg.attr('id'), {duration: 50}, myCallback);

            function myCallback(){
                $this.addClass('ended');
            }
        });

        return this;
    };

})(jQuery);

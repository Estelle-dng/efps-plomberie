<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBqcrUXB4BY4fGLn6NOc88-q45E2TFc1kU&language=<?php echo function_exists('pll_current_language') ? pll_current_language() : 'fr'; ?>">
</script>
<div class="container-fluid block-contact">
    <div id="map">

    </div>

    <div class="block-contact__form">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-6 col-md-8 col-md-offset-4">
                    <div class="block-contact__formcanvas">
                        <div class="block-contact__title mb--50">
                            <h1 class="title text-color-1">
                                Second titre
                            </h1>
                            <h2 class="subtitle subtitle--border-left">
                                Sous titre
                            </h2>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <input type="text" name="contact[lastname]" title="<?php pll_e('Nom *'); ?>" placeholder="<?php pll_e('Nom *'); ?>" required />
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <input type="text" name="contact[firstname]" title="<?php pll_e('Prénom *'); ?>" placeholder="<?php pll_e('Prénom *'); ?>" required />
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <input type="text" name="contact[country]" title="<?php pll_e('Pays'); ?>" placeholder="<?php pll_e('Pays'); ?>" required />
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <input type="text" name="contact[city]" title="<?php pll_e('Ville'); ?>" placeholder="<?php pll_e('Ville'); ?>" />
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <input type="text" name="contact[phone]" title="<?php pll_e('Téléphone'); ?>" placeholder="<?php pll_e('Téléphone'); ?>" />
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="contact[mail]" title="<?php pll_e('E-mail *'); ?>" placeholder="<?php pll_e('E-mail *'); ?>" required />
                                </div>
                                <div class="col-sm-12 col-xs-12">
                                    <textarea rows="6" placeholder="<?php pll_e('Message ...'); ?>" name="contact[message]" id="message"></textarea>
                                </div>
                                <div class="col-xs-12">
                                    <div class="flex-v flex-v--wrap flex-v--spaced">
                                        <div class="file-upload-container">
                                            <label for="file" class="label-file">
                                                <i class="ppicon-download" aria-hidden="true"></i> <?php pll_e('Joindre des fichiers') ?>
                                            </label>
                                            <input id="file" type="file" name="file">
                                        </div>

                                        <button class="btn" type="submit">
                                            <?php pll_e('Envoyer') ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    google.maps.event.addDomListener(window, 'load', init);
    function init() {
        var isDraggable = true;

        var mapOptions = {

            zoom: 14,

            center: new google.maps.LatLng(44.8473454,-0.5248151),
            draggable: isDraggable,
            streetViewControl: false,
            scrollwheel: false,
            mapTypeControl: false,
            fullscreenControl: false,
            styles:
            [{"featureType":"administrative","elementType":"all","stylers":[{"hue":"#000000"},{"lightness":-100},{"visibility":"off"}]},{"featureType":"administrative.locality","elementType":"labels","stylers":[{"weight":"0.35"},{"visibility":"on"},{"color":"#666666"}]},{"featureType":"administrative.neighborhood","elementType":"labels","stylers":[{"visibility":"on"},{"color":"#606060"},{"weight":"0.28"}]},{"featureType":"administrative.land_parcel","elementType":"geometry","stylers":[{"hue":"#b0ff00"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"hue":"#ff0000"},{"saturation":-100},{"lightness":-3},{"visibility":"on"}]},{"featureType":"landscape","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#f2f2f2"}]},{"featureType":"landscape","elementType":"labels","stylers":[{"hue":"#000000"},{"saturation":-100},{"lightness":-100},{"visibility":"off"}]},{"featureType":"poi","elementType":"all","stylers":[{"hue":"#000000"},{"saturation":-100},{"lightness":-100},{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"weight":"0.01"}]},{"featureType":"road","elementType":"geometry","stylers":[{"hue":"#ff0000"},{"saturation":-100},{"lightness":26},{"visibility":"on"}]},{"featureType":"road","elementType":"labels","stylers":[{"saturation":-100},{"lightness":100},{"visibility":"off"},{"color":"#bfbfbf"},{"weight":"0.01"}]},{"featureType":"road.local","elementType":"all","stylers":[{"hue":"#ff0000"},{"saturation":-100},{"lightness":100},{"visibility":"on"}]},{"featureType":"road.local","elementType":"labels","stylers":[{"visibility":"on"},{"color":"#bfbfbf"}]},{"featureType":"transit","elementType":"labels","stylers":[{"hue":"#000000"},{"lightness":-100},{"visibility":"off"}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffffff"},{"saturation":-100},{"lightness":100},{"visibility":"on"}]},{"featureType":"water","elementType":"labels","stylers":[{"hue":"#000000"},{"saturation":-100},{"lightness":-100},{"visibility":"off"}]}]
        };

        var mapElement = document.getElementById('map');

        var map = new google.maps.Map(mapElement, mapOptions);

    }
</script>

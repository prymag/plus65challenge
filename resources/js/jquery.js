const drawForm = require('./draw-form');

(function($) {

    $(document).ready(function() {
        $('select').formSelect();

        drawForm.init();
    });

})(jQuery);
const drawForm = require('./draw-form');
const winnersCard = require('./winners-card');

(function($) {

    $(document).ready(function() {
        $('select').formSelect();

        drawForm.init();
        winnersCard.init();
    });

})(jQuery);
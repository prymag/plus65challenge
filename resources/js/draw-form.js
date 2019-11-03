module.exports = function() {

    let $form_toggle,
    $form_container,
    $rand_toggle,
    $winning_no;

    function init() {
        
        setVars();
        onToggleClicked();
        onRandToggle();

    }

    function setVars() {
        $form_toggle = $('#draw_toggle')
        $form_container = $('#draw_form_container');
        $rand_toggle = $('#rand_toggle');
        $winning_no = $('#winning_number');
    }

    function onToggleClicked() {
        $form_toggle.on('click', function(e) {
            
            e.preventDefault();

            $form_container.slideToggle();
        })
    }

    function onRandToggle() {
        const checked = $rand_toggle.prop('checked');
        
        if (checked) {
            $winning_no.attr('disabled', true);
        }

        $rand_toggle.on('change', function(e) {
            const checked = $(this).prop('checked');
            
            if (checked) {
                $winning_no.val('').attr('disabled', true);
            } else {
                $winning_no.val('').attr('disabled', false);
            }
        })
    }

    return {
        init:init
    }

}()
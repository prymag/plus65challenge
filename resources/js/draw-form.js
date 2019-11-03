module.exports = function() {

    let $formToggle,
    $formContainer,
    $randToggle,
    $winningNo;

    function init() {
        
        setVars();
        onToggleClicked();
        onRandToggle();

    }

    function setVars() {
        $formToggle = $('#draw_toggle')
        $formContainer = $('#draw_form_container');
        $randToggle = $('#rand_toggle');
        $winningNo = $('#winning_number');
    }

    function onToggleClicked() {
        $formToggle.on('click', function(e) {
            
            e.preventDefault();

            $formContainer.slideToggle();
        })
    }

    function onRandToggle() {
        const checked = $randToggle.prop('checked');
        
        if (checked) {
            $winningNo.attr('disabled', true);
        }

        $randToggle.on('change', function(e) {
            const checked = $(this).prop('checked');
            
            if (checked) {
                $winningNo.val('').attr('disabled', true);
            } else {
                $winningNo.val('').attr('disabled', false);
            }
        })
    }

    return {
        init:init
    }

}()
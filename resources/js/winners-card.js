module.exports = function() {

    let $cardWrapper

    function init() {
        setVars();
        setCardHeight();
        onresize();
    }

    function setVars() {
        $cardWrapper = $('.table-prize-row');
    }

    function onresize() {
        $( window ).resize(function() {
            if($( window ).width() < 768) {
                $('.table-prize-row .card').removeAttr('style');
            } else {
                setCardHeight();
            }
        });
    }

    function setCardHeight() {
        let max = 0;

        $cardWrapper.find('.card')
            .each(function(index, el) {
                $(el).removeAttr('style');
                let h = Math.ceil($(el).height());
                
                max = (h > max) ? h : max;
            });

        $cardWrapper.find('.card')
            .each(function(index, el) {
                $(el).css({height: max + 'px'});
            })
    }

    return {
        init:init
    }

}()
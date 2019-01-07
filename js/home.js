jQuery(".mySearch").ajaxlivesearch({
    loaded_at: <?php echo time(); ?>,
    token: <?php echo "'" . $handler->getToken() . "'"; ?>,
    max_input: <?php echo Config::getConfig('maxInputLength'); ?>,
    onResultClick: function (e, data) {
        // get the index 1 (second column) value
        var selectedOne = jQuery(data.selected).find('td').eq('1').text();

        // set the input value
        jQuery('#ls_query').val(selectedOne);

        // hide the result
        jQuery("#ls_query").trigger('ajaxlivesearch:hide_result');
    },
    onResultEnter: function (e, data) {
        // do whatever you want
        // jQuery("#ls_query").trigger('ajaxlivesearch:search', {query: 'test'});
    },
    onAjaxComplete: function (e, data) {

    }
});
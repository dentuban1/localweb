(function($, admin_base_url) {
    "use strict";

    function compileList() {
        let pages = $('.tld-sortable');
        let array = [];
        for (let i = 0; i < pages.length; i++) {
            array.push(pages[i].dataset.id);
        }

        return array;
    };

    let ids = compileList();

    $('#sortable-list').sortable({
        opacity: 0.5,
        cursor: "move",
        stop: function(e) {
            ids = compileList();

            $.post(
                admin_base_url + '/domain_generator/order', {
                    order: JSON.stringify(ids),
                    ref: 'admin-panel',
                },
                function(data) {
                    if (data.success) {
                        console.log('Updated TLD order.');
                    }
                },
                'json'
            )
        }
    });
})(jQuery, admin_base_url)
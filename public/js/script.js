$( document ).ready(function() {
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });
    $('table.db tbody').sortable({
        'containment': 'parent',
        'handle': '.handle',
        update: function (event, ui) {
            ids = [];
            $('.id').each(function () {
                ids.push($(this).html());
            });
            $.post('/tasks/repriority', {'ids': ids}, function (data) {
                if (!data.success) {
                    alert('Whoops, something went wrong :/');
                } else {
                    idsLength = $('.priority').length;
                    $('.priority').each(function () {
                        $(this).html(idsLength);
                        idsLength--;
                    });
                }
            }, 'json');
        }
    });
    $(window).resize(function () {
        $('table.db tr').css('min-width', $('table.db').width());
    });
});

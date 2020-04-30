(function () {
    $('button[data-id').click(function () {
        let id = $(this).data('id');
        $('#confirmDelete form').attr('action', document.location.origin + '/members/' + id);
    });
})();

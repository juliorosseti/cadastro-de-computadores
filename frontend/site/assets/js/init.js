// Autofocus no primeiro campo do form
modalComputadorAddEdit.on('shown.bs.modal', function () {
    $(this).find('input[type=text]:first').focus();
});

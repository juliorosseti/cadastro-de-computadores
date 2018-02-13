var modalComputador = {

    preencheFormulario: function(item)
    {
        $.each(item, function(field, value) {
            modalComputadorAddEdit.find('[name="'+field+'"]').val(value);
        });
    },

    inicializaFormulario: function(id)
    {
        var self = this;
        var repop = {
            id: null,
            nr_serial: null,
            cpu: null,
            gpu: null,
            ram: null,
            hd: null
        }

        if (typeof id != "undefined") {

            myAjax.get(apiUrl + '/api/computer/' + id, [], function(e) {
                if (Object.keys(e.data).length > 0) {
                    self.preencheFormulario(e.data);
                } else {
                    self.preencheFormulario(repop);
                }
            });

        } else {
            self.preencheFormulario(repop);
        }
    },

    salvar: function(form, that)
    {
        var self = this;

        var request = apiUrl + '/api/computer',
            $form = $(form),
            serialize = $form.serialize(),
            id = $form.find('[name="id"]').val();

        $form.find('.form-group').removeClass('has-error');
        $(that).prop('disabled', true);

        // Caso for update (não implementado)
        if (id) {

            swal(
                "Ocorreu um erro!",
                "Essa função ainda não foi implementada.",
                "error"
            );

        } else {

            myAjax.post(request, serialize, function(e) {

                if (e.status == true) {

                    swal(
                        "Computador adicionado!",
                        "Um novo computador foi adicionado na categoria "+e.data.category+".",
                        "success"
                    );

                    categoria.mostraItens(e.data.category);
                    self.fecha();

                } else {

                    $.each(e.data, function(field, v) {
                        $form.find('input[name="'+field+'"]')
                              .parent()
                              .addClass('has-error');
                    });

                }

            });

        }

        $(that).prop('disabled', false);
    },

    abre: function()
    {
        modalComputadorAddEdit.modal('show');
    },

    fecha: function()
    {
        modalComputadorAddEdit.modal('hide');
    },
}

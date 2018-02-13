var tabelaComputadores = {

    recarregaItens: function(categoriaSlug)
    {
        tabelaComputadores.habilitaLoader();

        myAjax.get(apiUrl + '/api/computers', { 'category': categoriaSlug }, function(e) {
            tabelaComputadores.removeResultados();
            if (Object.keys(e.data).length > 0) {
                tabelaComputadores.preencheResultados(e.data);
            } else {
                tabelaComputadores.preencheSemResultados();
            }
        });
    },

    removeResultados: function()
    {
        baseComputadorInfoTbody.find('tr').remove();
    },

    preencheSemResultados: function()
    {
        baseComputadorInfoTbody.hide()
            .html(baseComputadorSemItem)
            .fadeIn();
    },

    preencheResultados: function(data)
    {
        var output = data.map(function(item) {

            var cloned = baseComputadorItem.clone();

            cloned.find('[data-item="nr_serial"]').html(item.nr_serial);
            cloned.find('[data-item="cpu"]').html(item.cpu);
            cloned.find('[data-item="gpu"]').html(item.gpu);
            cloned.find('[data-item="ram"]').html(item.ram);
            cloned.find('[data-item="hd"]').html(item.hd);
            cloned.find('[data-item="editar"], [data-item="remover"]').attr("data-item-id", item.id);

            return cloned;

        });

        baseComputadorInfoTbody.hide()
            .html(output)
            .fadeIn();
    },

    habilitaLoader: function()
    {
        var self = this;
        self.removeResultados();
        baseComputadorInfoTbody.html(baseComputadorLoader);
    },

    adicionar: function()
    {
        modalComputador.inicializaFormulario();
        modalComputador.abre();
    },

    remover: function()
    {
        swal(
            "Ocorreu um erro!",
            "Essa função ainda não foi implementada.",
            "error"
        );
    },

    editar: function(that)
    {
        var id = $(that).data('item-id');
        modalComputador.inicializaFormulario(id);
        modalComputador.abre();
    },

}

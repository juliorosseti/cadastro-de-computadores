var categoria = {

    abreInfoBox: function()
    {
        baseComputadorInfo.stop().hide().fadeIn();
    },

    removeActive: function()
    {
        baseBtnCategoria.removeClass('active');
    },

    mostraItens: function(categoriaSlug)
    {
        var self = this;

        self.removeActive();
        self.abreInfoBox();

        $('[data-show-item="'+categoriaSlug+'"]').addClass('active');

        tabelaComputadores.recarregaItens(categoriaSlug);
    }
}

var tabelaComputadores={recarregaItens:function(a){tabelaComputadores.habilitaLoader(),myAjax.get(apiUrl+"/api/computers",{category:a},function(a){tabelaComputadores.removeResultados(),Object.keys(a.data).length>0?tabelaComputadores.preencheResultados(a.data):tabelaComputadores.preencheSemResultados()})},removeResultados:function(){baseComputadorInfoTbody.find("tr").remove()},preencheSemResultados:function(){baseComputadorInfoTbody.hide().html(baseComputadorSemItem).fadeIn()},preencheResultados:function(a){var e=a.map(function(a){var e=baseComputadorItem.clone();return e.find('[data-item="nr_serial"]').html(a.nr_serial),e.find('[data-item="cpu"]').html(a.cpu),e.find('[data-item="gpu"]').html(a.gpu),e.find('[data-item="ram"]').html(a.ram),e.find('[data-item="hd"]').html(a.hd),e.find('[data-item="editar"], [data-item="remover"]').attr("data-item-id",a.id),e});baseComputadorInfoTbody.hide().html(e).fadeIn()},habilitaLoader:function(){this.removeResultados(),baseComputadorInfoTbody.html(baseComputadorLoader)},adicionar:function(){modalComputador.inicializaFormulario(),modalComputador.abre()},remover:function(){swal("Ocorreu um erro!","Essa função ainda não foi implementada.","error")},editar:function(a){var e=$(a).data("item-id");modalComputador.inicializaFormulario(e),modalComputador.abre()}};
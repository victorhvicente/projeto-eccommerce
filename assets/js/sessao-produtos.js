//Filtro funcional
document.addEventListener('DOMContentLoaded', function () {
    const filtro = document.getElementById('filtro-tipo');
    const cards = document.querySelectorAll('.card');
    const contador = document.getElementById('contador-produtos');

    //Total de produtos sendo mostrado
    function atualizarContador() {
        let visiveis = 0;
        cards.forEach(card => {
            if (!card.classList.contains('oculto')) {
                visiveis++;
            }
        });
        contador.textContent = visiveis;
    }

    filtro.addEventListener('change', function () {
        const tipoSelecionado = this.value;

        cards.forEach(card => {
            const tipoDrone = card.getAttribute('data-tipo');

            if (tipoSelecionado === 'todos' || tipoDrone === tipoSelecionado) {
                card.classList.remove('oculto');
            } else {
                card.classList.add('oculto');
            }
        });

        atualizarContador();
    });

    // Atualiza o número na primeira carga da página
    atualizarContador();
});

//Acrescentar +1 no contador do carrinho
document.addEventListener('DOMContentLoaded', function () {
    const botoesComprar = document.querySelectorAll('.card button');
    const contadorCarrinho = document.querySelector('.cart-count');
    let totalCarrinho = 0;

    botoesComprar.forEach(botao => {
        botao.addEventListener('click', function () {
            alert('Produto adicionado ao carrinho!');
            totalCarrinho++;
            contadorCarrinho.textContent = totalCarrinho;
        });
    });
});

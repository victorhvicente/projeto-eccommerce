// Filtro funcional
document.addEventListener('DOMContentLoaded', function () {
    const filtro = document.getElementById('filtro-tipo');
    const busca = document.querySelector('.busca');
    const cards = document.querySelectorAll('.card');
    const contador = document.getElementById('contador-produtos');

    function atualizarVisibilidade() {
        const tipoSelecionado = filtro.value;
        const termoBusca = busca.value.trim().toLowerCase();
        let visiveis = 0;

        cards.forEach(card => {
            const tipoDrone = card.getAttribute('data-tipo');
            const nomeDrone = card.querySelector('.descricao-produto')?.textContent.toLowerCase();

            const correspondeTipo = tipoSelecionado === 'todos' || tipoDrone === tipoSelecionado;
            const correspondeBusca = nomeDrone.includes(termoBusca);

            if (correspondeTipo && correspondeBusca) {
                card.classList.remove('oculto');
                visiveis++;
            } else {
                card.classList.add('oculto');
            }
        });

        contador.textContent = visiveis;
    }

    // Agora tipoInicial vem do PHP inline
    if (tipoInicial) {
        filtro.value = tipoInicial;
    }

    atualizarVisibilidade();

    filtro.addEventListener('change', atualizarVisibilidade);
    busca.addEventListener('input', atualizarVisibilidade);
});

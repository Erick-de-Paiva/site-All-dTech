document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.prodt-card').forEach(card => {
        const nome = card.querySelector('.prodt-nome');
        const preco = card.querySelector('.valor-novo');
        if (!nome || !preco) return;

        const btn = document.createElement('button');
        btn.type = 'button';
        btn.className = 'btn-add-carrinho';
        btn.textContent = '🛒 Adicionar ao carrinho';

        btn.addEventListener('click', async (e) => {
            e.stopPropagation();
            const dados = new URLSearchParams({
                acao: 'add',
                nome: nome.textContent.trim(),
                preco: preco.textContent.trim()
            });

            try {
                const resp = await fetch('carrinho.php', { method: 'POST', body: dados });
                const json = await resp.json();
                if (!json.ok) throw new Error('falha');

                const contador = document.getElementById('cartCount');
                if (contador) contador.textContent = json.count;

                btn.textContent = '✔ Adicionado!';
            } catch (err) {
                btn.textContent = '✖ Erro, tente de novo';
            }
            setTimeout(() => { btn.textContent = '🛒 Adicionar ao carrinho'; }, 1500);
        });

        card.appendChild(btn);
    });
});

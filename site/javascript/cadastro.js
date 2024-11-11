document.getElementById('celular').addEventListener('blur', function() {
    const celular = this.value.replace(/\D/g, ''); // Remove a máscara para obter apenas os números
    if (celular.length === 11) {
        buscarClientePorCelular(celular);
    }
});

function buscarClientePorCelular(celular) {
    fetch(`/site/php/buscar_cliente.php?celular=${celular}`)
        .then(response => response.json())
        .then(data => {
            if (data.encontrado) {
                // Cliente encontrado, preenche os dados
                document.getElementById('nome').value = data.nome;
                document.getElementById('sobrenome').value = data.sobrenome;
                document.getElementById('cidade_endereco').value = data.cidade;
                document.getElementById('rua_endereco').value = data.rua;
                document.getElementById('numero_endereco').value = data.numero;
                document.getElementById('complemento_endereco').value = data.complemento;
            } else {
                // Cliente não encontrado, sugere cadastro
                alert("Cliente não encontrado. Complete os dados para realizar o cadastro.");
                cadastrarCliente();
            }
        })
        .catch(error => {
            console.error('Erro ao buscar cliente:', error);
            alert('Ocorreu um erro ao buscar o cliente. Tente novamente.');
        });
}

function cadastrarCliente() {
    const formData = new FormData(document.getElementById('formCadastro'));
    
    fetch('/site/php/cadastrar_cliente.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.sucesso) {
            alert('Cadastro realizado com sucesso!');
            // Redirecionar ou outra ação
        } else {
            alert('Erro ao cadastrar. Tente novamente.');
        }
    })
    .catch(error => {
        console.error('Erro ao cadastrar cliente:', error);
        alert('Ocorreu um erro ao cadastrar. Tente novamente.');
    });
}



// Ao submeter o formulário, você pode realizar a inserção no banco
document.getElementById('formCadastro').addEventListener('submit', function(event) {
    event.preventDefault();
    
    const formData = new FormData(this);
    
    // Enviar os dados para o servidor para cadastro
    fetch('/cadastrar_cliente.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.sucesso) {
            alert('Cadastro realizado com sucesso!');
            // Redirecionar para a página de finalização ou outra ação
        } else {
            alert('Erro ao cadastrar. Tente novamente.');
        }
    });
});

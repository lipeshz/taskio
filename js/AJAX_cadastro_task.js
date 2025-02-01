let erros = {};
document.getElementById('form-cadastro-task').addEventListener('submit', function(event){
    event.preventDefault();
    const titulo = document.getElementById('titulo-task').value;
    const descricao = document.getElementById('descricao-task').value;
    const data_limite = document.getElementById('data_limite').value;
    const data_atual = new Date().toISOString();
    validarCampos(titulo, descricao, data_limite, data_atual,document.getElementById('form-cadastro-task').getAttribute('data-action'));
})

function validarCampos(titulo, descricao, data_limite, data_atual, caminho){
    if(titulo == ''){
        document.getElementById('err_titulo').textContent = 'Título não pode estar vazio!';
        erros['err_titulo'] = true;
    }else{
        document.getElementById('err_titulo').textContent = '';
        delete erros.err_titulo;
    }

    if(!data_limite){
        document.getElementById('err_data').textContent = 'Insira uma data!';
        erros['err_data'] = true;
    }else{
        if(data_limite <= data_atual){
            document.getElementById('err_data').textContent = 'A data não pode ser anterior ao dia de hoje!';
            erros['err_data'] = true;
        }else{
            document.getElementById('err_data').textContent = '';
            delete erros.err_data;
        }

        if(Object.keys(erros) > 0){
            return;
        }else{
            const dados = new FormData();
            if(caminho == "update"){
                dados.append('titulo', titulo);
                dados.append('descricao', descricao);
                dados.append('data_limite', data_limite);
                dados.append('data_atual', data_atual);
                dados.append('caminho', caminho)
                dados.append('token', document.getElementById('dialog-modal').getAttribute('dialog-token'));
            }else if(caminho == "cadastro"){
                dados.append('titulo', titulo);
                dados.append('descricao', descricao);
                dados.append('data_limite', data_limite);
                dados.append('data_atual', data_atual);
                dados.append('caminho', caminho)
            }
    
            //Verificação do botão
    
            const xhr = new XMLHttpRequest();
            xhr.open('POST', '../controller/cadastro_task.php', true);
            xhr.send(dados);
            xhr.onload = function(){
                if(xhr.status === 200){
                    const resposta = JSON.parse(xhr.responseText);
                    if(resposta.errors){
                        if(resposta.errors.err_titulo){
                            document.getElementById('err_titulo').textContent = resposta.errors.err_titulo;
                        }
                        if(resposta.errors.err_data){
                            document.getElementById('err_data').textContent = resposta.errors.err_data;
                        }
                    }
    
                    if(resposta.sucesso_cadastro){
                        loadTask();
                        const titulo = document.getElementById('titulo-task').value = '';
                        const descricao = document.getElementById('descricao-task').value = '';
                        const data_limite = document.getElementById('data_limite').value = '';
                    }

                    if(resposta.sucesso_update){
                        // modal.close();
                        // document.querySelector(`[data-token="${resposta.tarefa.token}"]`).textContent = `${resposta.tarefa.titulo} | ${resposta.tarefa.descricao} | ${resposta.tarefa.data_limite}`;
                        
                        loadTask();
                        //Mudar código para atualizar a tarefa via fetch para não precisar recarregar toda a lista.
                    }
                }
            }
        }
    }
}
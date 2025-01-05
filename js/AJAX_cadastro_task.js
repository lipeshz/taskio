let erros = {};
const modal = document.querySelector("#dialog-modal");
function loadTask(){

    fetch('../controller/AJAX_load_task.php')
        .then(response => response.json())
        .then(resposta => {
            if(resposta.tarefas){
                const taskList = document.getElementById('tasks');
                taskList.innerHTML = '';

                modal.close();
                resposta.tarefas.forEach(tarefa => {
                    const newTaskList = document.createElement('div');
                    const button_delete = document.createElement('button');
                    button_delete.textContent = 'Excluir';                    
                    button_delete.addEventListener('click', () => {
                    console.log('APAGADO' + tarefa.id_task);
                    }) 
                    if(!tarefa.descricao){
                        newTaskList.textContent = `${tarefa.titulo} | ${tarefa.data_limite}`;
                
                        newTaskList.appendChild(button_delete);
                        taskList.appendChild(newTaskList);
                    }

                    if(tarefa.descricao){
                        newTaskList.textContent = `${tarefa.titulo} | ${tarefa.descricao} | ${tarefa.data_limite}`;

                        newTaskList.appendChild(button_delete);
                        taskList.appendChild(newTaskList);
                    }
                })

            }
        })
        .catch(console.log('erro'));
}
document.addEventListener('DOMContentLoaded', loadTask);
document.getElementById('form-cadastro-task').addEventListener('submit', function(event){
    event.preventDefault();

    const titulo = document.getElementById('titulo-task').value;
    const descricao = document.getElementById('descricao-task').value;
    const data_limite = document.getElementById('data-limite').value;
    const data_atual = new Date().toISOString();

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
    }

    if(Object.keys(erros) > 0){
        return;
    }else{
        const dados = new FormData();
        dados.append('titulo', titulo);
        dados.append('descricao', descricao);
        dados.append('data_limite', data_limite);
        dados.append('data_atual', data_atual);

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

                if(resposta.sucesso){
                    loadTask();
                    const titulo = document.getElementById('titulo-task').value = '';
                    const descricao = document.getElementById('descricao-task').value = '';
                    const data_limite = document.getElementById('data-limite').value = '';
                }
            }
        }
    }
})
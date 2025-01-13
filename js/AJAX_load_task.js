function loadTask(){
    fetch('../controller/AJAX_load_task.php')
        .then(response => response.json())
        .then(resposta => {
            if(resposta.tarefas){
                const taskList = document.getElementById('tasks');
                const tarefas = resposta.tarefas
                taskList.innerHTML = '';

                modal.close();
                tarefas.forEach(tarefa => {
                    let newTaskList = document.createElement('div');
                    newTaskList.setAttribute('data-token', tarefa.token_task);
                    const button_delete = document.createElement('button');
                    button_delete.textContent = 'Excluir';                    
                    button_delete.addEventListener('click', () => {
                        removeTask(tarefa.token_task, newTaskList);
                        // newTaskList.remove();
                    }) 

                    const button_edit = document.createElement('button');
                    button_edit.textContent = 'Editar';
                    button_edit.addEventListener('click', () => {
                        modal.showModal();
                        editTask();
                    })
                    
                    if(!tarefa.descricao){
                        newTaskList.textContent = `${tarefa.titulo} | ${tarefa.data_limite}`;
                
                        newTaskList.appendChild(button_delete);
                        newTaskList.appendChild(button_edit);
                        taskList.appendChild(newTaskList);
                    }

                    if(tarefa.descricao){
                        newTaskList.textContent = `${tarefa.titulo} | ${tarefa.descricao} | ${tarefa.data_limite}`;

                        newTaskList.appendChild(button_delete);
                        newTaskList.appendChild(button_edit);
                        taskList.appendChild(newTaskList);
                    }
                })

            }
        })
        .catch(error => console.error('Erro ao carregar as tarefas:', error));
}

function removeTask(token, tarefa){
    fetch('../controller/AJAX_remove_task.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams({'data-token': token}),
    })
        .then(response => response.json())
        .then(resposta_remove => {
            if(resposta_remove.token_sucesso){
                tarefa.remove();
            }else{
                error => console.error('Erro ao remover as tarefas:', error);
            }
        })
        .catch(error => console.error('Erro ao carregar as tarefas:', error));
}

document.addEventListener('DOMContentLoaded', loadTask);
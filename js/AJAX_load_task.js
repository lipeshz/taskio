const taskButtons = {};

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
                    newTaskList.setAttribute('class', 'task');

                    const button_delete = document.createElement('button');
                    button_delete.textContent = 'Excluir'; 
                    button_delete.addEventListener('click', () => {
                        removeTask(tarefa.token_task, newTaskList);
                        // newTaskList.remove();
                    })

                    const button_edit = document.createElement('button');
                    button_edit.textContent = 'Editar';
                    button_edit.setAttribute('id', 'edit');
                    button_edit.onclick = function(){
                        modal.showModal();
                        document.getElementById('form-cadastro-task').setAttribute('data-action', 'update');
                        document.getElementById('dialog-modal').setAttribute('dialog-token', tarefa.token_task);

                        document.getElementById('titulo-task').value = tarefa.titulo;
                        document.getElementById('descricao-task').value = tarefa.descricao;
                        document.getElementById('data_limite').value = tarefa.data_limite;
                    }

                    taskButtons[tarefa.token_task] = {
                        edit: button_edit,
                        delete: button_delete
                    }
                    
                    if(!tarefa.descricao){
                        newTaskList.innerHTML = `${tarefa.titulo} | <span class="task-date">${tarefa.data_limite}</span>`;
                
                        newTaskList.appendChild(button_edit);
                        newTaskList.appendChild(button_delete);
                        taskList.appendChild(newTaskList);
                    }

                    if(tarefa.descricao){
                        newTaskList.innerHTML = `${tarefa.titulo} | ${tarefa.descricao} | <span class="task-date">${tarefa.data_limite}</span>`;

                        newTaskList.appendChild(button_edit);
                        newTaskList.appendChild(button_delete);
                        taskList.appendChild(newTaskList);
                    }
                })
                reordearTasks();
            }
        })
        .catch(error => console.error('Erro ao carregar as tarefas:', error));
}

function removeTask(token, tarefa){
    fetch('../controller/AJAX_remove_task.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams({'data-token': token})
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

function updateTask(token){
    fetch('../controller/AJAX_update_task.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: new URLSearchParams({'token': token})
    })
        .then(response => response.json())
        .then(resposta => {
            if(resposta.sucesso){
                let task = document.querySelector(`[data-token="${token}"]`);
                if(!resposta.tarefa.descricao){
                    task.innerHTML = `${resposta.tarefa.titulo} | <span class="task-date">${resposta.tarefa.data_limite}</span>`;
                }

                if(resposta.tarefa.descricao){
                    task.innerHTML = `${resposta.tarefa.titulo} | ${resposta.tarefa.descricao} | <span class="task-date">${resposta.tarefa.data_limite}</span>`;
                }
                
                if(taskButtons[token]){
                    task.appendChild(taskButtons[token].edit);
                    task.appendChild(taskButtons[token].delete);
                }

                taskButtons[token].edit.onclick = function(){
                        modal.showModal();
                        document.getElementById('form-cadastro-task').setAttribute('data-action', 'update');
                        document.getElementById('dialog-modal').setAttribute('dialog-token', token);

                        document.getElementById('titulo-task').value = resposta.tarefa.titulo;
                        document.getElementById('descricao-task').value = resposta.tarefa.descricao;
                        document.getElementById('data_limite').value = resposta.tarefa.data_limite;
                        
                }
                reordearTasks();
            }
        })
}

function reordearTasks(){
    const taskList = document.getElementById('tasks');
    const tasks = Array.from(taskList.children);
    tasks.sort(compararData);
    taskList.innerHTML = '';
    tasks.forEach(task => taskList.appendChild(task));
}

function compararData(taskA, taskB){
    const dataA = new Date(taskA.querySelector('.task-date').textContent);
    const dataB = new Date(taskB.querySelector('.task-date').textContent);
    return dataA - dataB;
}

document.addEventListener('DOMContentLoaded', loadTask);
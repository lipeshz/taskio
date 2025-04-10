const button_open = document.querySelector("#button-modal-open");
const button_conta = document.querySelector("#conta-usuario");
const button_close = document.querySelector("#button-modal-close");
const modal = document.querySelector("#dialog-modal");

button_open.onclick = function(){
    document.getElementById('form-cadastro-task').setAttribute('data-action', 'cadastro');
    document.getElementById('titulo-task').value = '';
    document.getElementById('descricao-task').value = '';
    document.getElementById('data_limite').value = '';

    document.getElementById('err_titulo').textContent = '';
    document.getElementById('err_data').textContent = '';
    modal.showModal();
};

button_close.onclick = function(){
    modal.close();
}

button_conta.onclick = function(){
    window.location.href = '../view/perfil.php';
}
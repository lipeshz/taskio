document.addEventListener("DOMContentLoaded", () => {
    const button_open = document.querySelector("#button-modal-open");
    const button_conta = document.querySelector("#conta-usuario");
    const modal = document.querySelector("#dialog-modal");
    const button_close = document.querySelector("#button-modal-close");

    button_open.onclick = function(){
        modal.showModal();
    };

    button_close.onclick = function(){
        document.getElementById('titulo-task').value = '';
        document.getElementById('descricao-task').value = '';
        document.getElementById('data-limite').value = '';

        document.getElementById('err_titulo').textContent = '';
        document.getElementById('err_data').textContent = '';
        modal.close();
    }

    button_conta.onclick = function(){
        window.location.href = '../view/perfil.php';
    }
});

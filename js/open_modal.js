document.addEventListener("DOMContentLoaded", () => {
    const button = document.querySelector("#button-modal-open");
    const modal = document.querySelector("#dialog-modal");
    const button_close = document.querySelector("#button-modal-close");

    button.onclick = function(){
        modal.showModal();
    };

    button_close.onclick = function(){
        modal.close();
    }
});

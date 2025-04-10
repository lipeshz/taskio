let erros = {};

document.getElementById('user-email').addEventListener('blur', function(){
    const email = document.getElementById('user-email').value;

    if(email){
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '../controller/AJAX_verificar_email.php'), true;
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('email=' + encodeURIComponent(email));
        if(xhr.status === 200){
            const resposta = JSON.parse(xhr.responseText);
            if(resposta.email_existe){
                document.getElementById('err-email').textContent = 'E-Mail já cadastrado!';
                erros['err_email'] = true;
            }else{
                document.getElementById('err-email').textContent = '';
                delete erros.err_email;
            }
        }
    }
})

document.getElementById('form-edit-password').addEventListener('submit', function(e){
    e.preventDefault();

    senha = document.getElementById('user-password').value;
    conf_senha = document.getElementById('confirm-user-password').value;

    if(senha == '' || conf_senha == ''){
        document.getElementById('err-senha').textContent = 'A senha não pode estar vazia!';
        erros['err_senha'] = true;
    }else{
        document.getElementById('err-senha').textContent = '';
        delete erros.err_senha;
    }

    if(senha != conf_senha){
        document.getElementById('err-senha').textContent = 'Senhas não condizem!';
        erros['err_senha'] = true;
    }else{
        document.getElementById('err-senha').textContent = '';
        delete erros.err_senha;
    }
    
    if(Object.keys(erros) > 0){
        return;
    }else{
        const dados = new FormData();
        dados.append('senha', senha);
        dados.append('conf_senha', conf_senha);
        dados.append('form', 'senha');

        const xhr = new XMLHttpRequest();
        xhr.open('POST', '../controller/update_usuario.php', true);
        xhr.send(dados);
        xhr.onload = function(){
            if(xhr.status === 200){
                const resposta = JSON.parse(xhr.responseText);

                if(resposta.erros){
                    if(resposta.erros.senha){
                        document.getElementById('err-senha').textContent = resposta.erros.senha;
                    }
                }
                if(resposta.sucesso){
                    window.alert('Update feito com sucesso!');
                    document.getElementById('user-password').value = '';
                    document.getElementById('confirm-user-password').value = '';
                }
            }
        }
    }
})

document.getElementById('form-edit-user').addEventListener('submit', function(e){
    e.preventDefault();

    nome = document.getElementById('user-name').value;
    email = document.getElementById('user-email').value;

    if(nome == ''){
        document.getElementById('err-nome').textContent = 'Nome inválido!';
        erros['err_nome'] = true;
    }else{
        document.getElementById('err-nome').textContent = '';
        delete erros.err_nome;
    }

    if(email == ''){
        document.getElementById('err-email').textContent = 'E-Mail inválido!';
        erros['err_email'] = true;
    }else{
        document.getElementById('err-email').textContent = '';
        delete erros.err_email;
    }

    if(Object.keys(erros) > 0){
        return;
    }else{
        const dados = new FormData();
        dados.append('nome', nome);
        dados.append('email', email);
        dados.append('form', 'email');

        const xhr = new XMLHttpRequest();
        xhr.open('POST', '../controller/update_usuario.php', true);
        xhr.send(dados);
        xhr.onload = function(){
            if(xhr.status === 200){
                const resposta = JSON.parse(xhr.responseText);
                if(resposta.erros){
                    if(resposta.erros.nome){
                        document.getElementById('err_nome').textContent = resposta.erros.nome;
                    }
    
                    if(resposta.erros.email){
                        document.getElementById('err_email').textContent = resposta.erros.email;
                    }
                }
                if(resposta.sucesso){
                    window.alert('Update feito com sucesso!');
                }
                
            }
        }
    }
})

function loadUser(){
    fetch('../controller/AJAX_load_user.php')
    .then(response => response.json())
    .then(resposta => {
        if(resposta.usuario){
            document.getElementById('user-name').value = resposta.usuario.nome;
            document.getElementById('user-email').value = resposta.usuario.email;
        }
    })
}

document.addEventListener('DOMContentLoaded', loadUser);
let erros = {};
document.getElementById('email-usuario').addEventListener('blur', function(){
    const email = document.getElementById('email-usuario').value;

    if(email){
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '../controller/AJAX_verificar_email.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onload = function(){
            if(xhr.status === 200){
                const resposta = JSON.parse(xhr.responseText);
                if(resposta.email_existe){
                    document.getElementById('err_email').textContent = 'E-Mail já cadastrado!';
                    erros['err_email'] = true;
                }else{
                    document.getElementById('err_email').textContent = '';
                    delete erros.err_email;
                }
            }
        }
        xhr.send('email=' + encodeURIComponent(email));
    }
})

document.getElementById('formulario-cadastro').addEventListener('submit', function(event){
    event.preventDefault();

    const nome = document.getElementById('nome-usuario').value;
    const email = document.getElementById('email-usuario').value;
    const senha = document.getElementById('senha-usuario').value;
    const confirmarSenha = document.getElementById('confirmar-senha-usuario').value;

    if(!nome){
        document.getElementById('err_nome').textContent = 'Nome inválido!';
        erros['err_nome'] = true;
    }else{
        document.getElementById('err_nome').textContent = '';
        delete erros.err_nome;
    }

    if(email === ''){
        document.getElementById('err_email').textContent = 'E-Mail inválido!';
    }

    if(!senha && !confirmarSenha){
        document.getElementById('err_senha').textContent = 'Senhas não podem estar vazias!';
        erros['err_senha'] = true;
    }else if(senha != confirmarSenha){
        document.getElementById('err_senha').textContent = 'Senhas não condizem!';
        erros['err_senha'] = true;
    }else{
        document.getElementById('err_senha').textContent = '';
        delete erros.err_senha;
    }

    if(Object.keys(erros).length > 0){
        return;
    }else{
        const dados = new FormData();
        dados.append('nome', nome);
        dados.append('email', email);
        dados.append('senha', senha);
        dados.append('conf_senha', confirmarSenha);
    
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '../controller/cadastro_usuario.php', true);
        xhr.send(dados);  
        xhr.onload = function(){
            if(xhr.status === 200){
                const resposta = JSON.parse(xhr.responseText);
                if(resposta.errors){
                    if(resposta.errors.nome){
                        document.getElementById('err_nome').textContent = resposta.errors.nome;
                    }
                    if(resposta.errors.senha){
                        document.getElementById('err_senha').textContent = resposta.errors.senha;
                    }
                    if(resposta.errors.email){
                        document.getElementById('err_email').textContent = resposta.errors.email;
                    }
                }

                if(resposta.sucesso){
                    window.location.href = '../view/index.php'; 
                }
            }
        } 
    }
})
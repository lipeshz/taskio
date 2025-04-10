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
                    delete erros.err_email;
                }else{
                    document.getElementById('err_email').textContent = 'E-Mail não cadastrado!';
                    erros['err_email'] = true; 
                }
            }
        }
        xhr.send('email=' + encodeURIComponent(email));
    }
})

document.getElementById('formulario-login').addEventListener('submit', function(event){
    event.preventDefault();

    const email = document.getElementById('email-usuario').value;
    const senha = document.getElementById('senha-usuario').value;

    if(!email){
        document.getElementById('err_email').textContent = 'E-Mail inválido!';
        erros['err_email'] = true;
    }else{
        document.getElementById('err_email').textContent = '';
        delete erros.err_email;
    }

    if(!senha){
        document.getElementById('err_senha').textContent = 'Insira a senha!';
        erros['err_senha'] = true;
    }else{
        document.getElementById('err_senha').textContent = '';
        delete erros.err_senha;
    }

    if(Object.keys(erros).length > 0){
        console.log(Object.keys(erros));
        return;
    }else{
        const dados = new FormData();
        dados.append('email', email);
        dados.append('senha', senha);

        const xhr = new XMLHttpRequest();
        xhr.open('POST', '../controller/login.php', true);
        xhr.send(dados);
        xhr.onload = function(){
            if(xhr.status === 200){
                const resposta = JSON.parse(xhr.responseText);
                if(resposta.errors){
                    if(resposta.errors.email){
                        document.getElementById('err_email').textContent = resposta.errors.email;
                    }
                    if(resposta.errors.senha){
                        document.getElementById('err_senha').textContent = resposta.errors.senha;
                    }
                }else if(resposta.sucesso){
                    window.location.href = '../view/tasks.php';
                }
            }
        }

    }
})
// Melhorar lógica da validação da senha
const openModalLogin = () => {
    document.getElementById('modal-login').classList.add('active');
    document.getElementById('modal-footer-login').classList.add('active');
};

const closeModalLogin = () => {
    document.getElementById('modal-login').classList.remove('active');
};

const updateDadosLogin = () => {
    // Logar no sistema
    console.log("salvando dados de login");

    // usuario e senha confere
    window.location.href="Home.php?login=USUARIO_LOGADO";
};

// Acoes do modal login
// document.getElementById('loginSistema')
//.addEventListener('click', openModalLogin);

// Eventos
document.getElementById('cancelarLogin')
.addEventListener('click', closeModalLogin);

document.getElementById('modalCloseLogin')
.addEventListener('click', closeModalLogin);

document.getElementById('salvarLogin')
.addEventListener('click', updateDadosLogin);

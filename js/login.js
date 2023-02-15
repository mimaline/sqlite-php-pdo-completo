const openModalLogin = () => {
    document.getElementById('modal-login').classList.add('active');
    document.getElementById('modal-footer-login').classList.add('active');
};

const closeModalLogin = () => {
    document.getElementById('modal-login').classList.remove('active');
};

const updateDadosLogin = () => {
    console.log("salvando dados de login");
};

// Acoes do modal login
document.getElementById('loginSistema')
.addEventListener('click', openModalLogin);

// Eventos
document.getElementById('cancelarLogin')
.addEventListener('click', closeModalLogin);

document.getElementById('modalCloseLogin')
.addEventListener('click', closeModalLogin);

document.getElementById('salvarLogin')
.addEventListener('click', updateDadosLogin);

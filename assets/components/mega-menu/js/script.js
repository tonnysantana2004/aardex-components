function changePannel(pannel_id) {

    const allPannels = document.querySelectorAll('.aardex-mega-menu--pannel:not(#' + pannel_id + ')');

    allPannels.forEach(pannel => {
        // pannel.classList.remove('open')
    })

    document.getElementById(pannel_id).classList.toggle('open')

}

function toogleMenu() {

    document.querySelector('.aardex-mega-menu--wrapper').classList.toggle('open');

}

document.addEventListener('DOMContentLoaded', () => {

    const pannelButtons = document.querySelectorAll('[data-pannel-id]');

    pannelButtons.forEach(button => {

        button.addEventListener('click', (e) => {

            changePannel(e.target.getAttribute('data-pannel-id'))

        })

    });

    const toogleMenuButtons = document.querySelectorAll('.aardex-mega-menu--toggle-button')

    toogleMenuButtons.forEach(button => {

        button.addEventListener('click', (e) => {

            toogleMenu()

        })

    });
})
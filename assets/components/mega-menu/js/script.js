function changePannel(pannel_id) {

    const allPannels = document.querySelectorAll('.aardex-mega-menu--pannel:not(#' + pannel_id + ')');

    allPannels.forEach(pannel => {
        // pannel.classList.remove('open')
    })

    document.getElementById(pannel_id).classList.toggle('open')

}

document.addEventListener('DOMContentLoaded', () => {

    const pannelButtons = document.querySelectorAll('[data-pannel-id]');

    pannelButtons.forEach(button => {

        button.addEventListener('click', (e) => {

            changePannel(e.target.getAttribute('data-pannel-id'))

        })

    });

})
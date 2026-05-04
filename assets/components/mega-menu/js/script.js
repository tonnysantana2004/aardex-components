// TODO: Refatorar posteriormente.

let activePannel = null;
let pinnedPannel = null;
let closeTimeout = null;

const CLOSE_DELAY = 2000;

function openPannel(id) {
    const target = document.getElementById(id);
    if (!target) return;

    // encontra o container pai (nível)
    const parentContainer = target.parentElement;

    // fecha apenas os irmãos (mesmo nível)
    const siblings = parentContainer.querySelectorAll(
        ':scope > .aardex-mega-menu--pannel'
    );

    siblings.forEach(p => {
        if (p !== target) {
            p.classList.remove('open');
        }
    });

    // abre o atual
    target.classList.add('open');
}
function closeAll() {
    document.querySelectorAll('.aardex-mega-menu--pannel')
        .forEach(p => p.classList.remove('open'));

    activePannel = null;
    pinnedPannel = null;
}

function startCloseTimer() {
    clearTimeout(closeTimeout);
    closeTimeout = setTimeout(() => {
        if (!pinnedPannel) {
            closeAll();
        }
    }, CLOSE_DELAY);
}

function cancelCloseTimer() {
    clearTimeout(closeTimeout);
}

document.addEventListener('DOMContentLoaded', () => {

    const menu = document.querySelector('.aardex-mega-menu');

    // FIRST LEVEL (hover + click)
    const firstLevelButtons = document.querySelectorAll(
        '.aardex-mega-menu--first_level_button[data-pannel-id]'
    );

    firstLevelButtons.forEach(button => {
        const id = button.getAttribute('data-pannel-id');

        // hover abre
        button.addEventListener('mouseenter', () => {
            if (!pinnedPannel) {
                openPannel(id);
            }
            cancelCloseTimer();
        });

        // saiu do botão → inicia delay
        button.addEventListener('mouseleave', () => {
            startCloseTimer();
        });

        // click fixa
        button.addEventListener('click', (e) => {
            e.stopPropagation();

            if (pinnedPannel === id) {
                closeAll();
            } else {
                pinnedPannel = id;
                openPannel(id);
            }
        });
    });

    // PANELS (mantém aberto enquanto mouse está dentro)
    const panels = document.querySelectorAll('.aardex-mega-menu--pannel');

    panels.forEach(panel => {
        panel.addEventListener('mouseenter', cancelCloseTimer);
        panel.addEventListener('mouseleave', startCloseTimer);
    });

    // SECOND + THIRD LEVEL → apenas click
    const innerButtons = document.querySelectorAll(
        '.aardex-mega-menu--second_level_button, .aardex-mega-menu--third_level_button'
    );

    innerButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            e.stopPropagation();

            const id = button.getAttribute('data-pannel-id');
            if (id) {
                openPannel(id);
            }
        });
    });

    // clique fora
    document.addEventListener('click', (e) => {
        if (!menu.contains(e.target)) {
            closeAll();
        }
    });
});
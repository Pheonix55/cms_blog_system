document.addEventListener("DOMContentLoaded", function () {
    const body = document.getElementById('body');

    const mega_menu_trigger = document.getElementById('meqa_menu_trigger');
    const megamenuContainer = document.querySelector('.mega_menu');

    let menuTimeout;

    const showMenu = () => {
        clearTimeout(menuTimeout);
        megamenuContainer.style.display = 'block';
    };

    const hideMenu = () => {
        menuTimeout = setTimeout(() => {
            megamenuContainer.style.display = 'none';
        }, 200);
    };
    mega_menu_trigger.addEventListener('mouseenter', showMenu);
    mega_menu_trigger.addEventListener('mouseleave', hideMenu);

    megamenuContainer.addEventListener('mouseenter', showMenu);
    megamenuContainer.addEventListener('mouseleave', hideMenu);


    document.querySelectorAll('.tab_item').forEach(tab => {
        tab.addEventListener('mouseover', function () {
            document.querySelectorAll('.tab_item').forEach(item => item.classList.remove('active'));
            document.querySelectorAll('.tab_content').forEach(content => content.style.display = 'none');

            this.classList.add('active');

            const contentId = this.getAttribute('data-content');
            if (contentId) {
                document.getElementById(contentId).style.display = 'grid';
            }
        });
    });

    document.querySelectorAll('.side_menu_item').forEach(sideTab => {
        sideTab.addEventListener('mouseover', function () {
            document.querySelectorAll('.sub_tabs_content').forEach(subTabContent => subTabContent.style.display = 'none');

            const subContentId = this.getAttribute('data-content');
            if (subContentId) {
                document.getElementById(subContentId).style.display = 'block';
            }
        });
    });


    const megaMenuToggler = document.querySelector('.mega_menu_toggler');
    const megaMenu = document.querySelector('.mega_menu');

    function closeMegaMenu() {
        console.log('closeMegaMenu');
        document.getElementById('megaMenuContainer').style.display = 'none';
        body.classList.remove('overlay');
    }

    window.onclick = function (event) {

        console.log('clicked on', event.target);
        if (!megaMenu.contains(event.target)) {
            closeMegaMenu();
            // console.log(megaMenu.innerHTML);
        }
    }

});

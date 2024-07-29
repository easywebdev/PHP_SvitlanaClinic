console.log('ddd');

const toggleEl = document.querySelector('.toggle-btn');

toggleEl.addEventListener('click', function() {
    let menuItems = document.querySelectorAll('.toggle-item');

    menuItems.forEach(function(el) {
        el.classList.toggle('toggle-item-show');
        console.log(el);
    })
});
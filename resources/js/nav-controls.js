// Event listener for collapse
let collapse = document.getElementsByClassName('collapsed');
for (let each of collapse) {
    each.addEventListener('click', function () {
        let target = this.dataset.target,
            el = document.querySelector(target);

        if (el.classList.contains('show')) {
            this.classList.remove('open');
            el.classList.remove('show');
        } else {
            this.classList.add('open');
            el.classList.add('show');
        }
    });
}

// Event listener for dropdowns
let dropdown = document.getElementsByClassName('dropdown-toggle');
for (let each of dropdown) {
    each.addEventListener('click', function () {
        let el = this.closest('li.dropdown').querySelector('.dropdown-menu');

        if (el.classList.contains('show')) {
            el.classList.remove('show');
        } else {
            el.classList.add('show');
        }
    });
}

// Logout
if (document.getElementById('logout-btn')) {
    document.getElementById('logout-btn').addEventListener('click', function (e) {
        e.preventDefault();
        document.getElementById('logout-form').submit();
    });
}
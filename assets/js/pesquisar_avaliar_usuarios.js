document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById('search');
    const userList = document.getElementById('userList');

    searchInput.addEventListener('input', function() {
        const searchValue = this.value.toLowerCase();
        const users = userList.querySelectorAll('li');

        users.forEach(user => {
            const userName = user.textContent.toLowerCase();
            if (userName.includes(searchValue)) {
                user.style.display = '';
            } else {
                user.style.display = 'none';
            }
        });
    });

    userList.addEventListener('click', function(e) {
        if (e.target && e.target.nodeName === "LI") {
            const userId = e.target.getAttribute('data-id');
            window.location.href = 'avaliar_usuario.php?id=' + userId;
        }
    });
});

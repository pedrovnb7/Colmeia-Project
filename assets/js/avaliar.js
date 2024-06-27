document.addEventListener("DOMContentLoaded", function() {
    const labels = document.querySelectorAll('.rating label');

    labels.forEach(label => {
        label.addEventListener('click', function() {
            const value = this.getAttribute('for').replace('rating', '');
            labels.forEach(l => {
                if (l.getAttribute('for').replace('rating', '') <= value) {
                    l.classList.add('selected');
                } else {
                    l.classList.remove('selected');
                }
            });
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    // Add glitch effect to header randomly
    const header = document.querySelector('.site-header');
    if (header) {
        setInterval(() => {
            if (Math.random() < 0.05) { // 5% chance
                header.classList.add('glitch');
                setTimeout(() => {
                    header.classList.remove('glitch');
                }, 200);
            }
        }, 2000);
    }
    
    // Add confirm dialog to delete buttons
    const deleteLinks = document.querySelectorAll('a[href*="action=delete"]');
    deleteLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            if (!confirm('Are you sure you want to delete this record? This action cannot be undone.')) {
                e.preventDefault();
            }
        });
    });
    
    // Toggle description visibility for long text
    const toggleButtons = document.querySelectorAll('.toggle-description');
    toggleButtons.forEach(button => {
        button.addEventListener('click', function() {
            const target = document.querySelector(this.dataset.target);
            if (target.classList.contains('collapsed')) {
                target.classList.remove('collapsed');
                this.textContent = 'Show Less';
            } else {
                target.classList.add('collapsed');
                this.textContent = 'Show More';
            }
        });
    });
});

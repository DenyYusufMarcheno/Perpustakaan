// Dark Mode Toggle Functionality
document.addEventListener('DOMContentLoaded', function() {
    // Check for saved dark mode preference or default to light mode
    const isDarkMode = localStorage.getItem('darkMode') === 'true';
    
    if (isDarkMode) {
        document.body.classList.add('dark-mode');
        updateToggleIcon(true);
    }
    
    // Toggle dark mode
    const darkModeToggle = document.getElementById('darkModeToggle');
    if (darkModeToggle) {
        darkModeToggle.addEventListener('click', function() {
            document.body.classList.toggle('dark-mode');
            const isDark = document.body.classList.contains('dark-mode');
            localStorage.setItem('darkMode', isDark);
            updateToggleIcon(isDark);
        });
    }
    
    function updateToggleIcon(isDark) {
        const icon = document.querySelector('#darkModeToggle i');
        if (icon) {
            if (isDark) {
                icon.className = 'bi bi-sun-fill';
            } else {
                icon.className = 'bi bi-moon-fill';
            }
        }
    }
});

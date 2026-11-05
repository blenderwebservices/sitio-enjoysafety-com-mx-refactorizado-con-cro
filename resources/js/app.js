import Alpine from 'alpinejs';

window.Alpine = Alpine;

// Theme store: Claro (default), Oscuro, Sistema
Alpine.store('theme', {
    current: localStorage.getItem('theme') || 'light',

    init() {
        this.apply(this.current);

        // Listen for OS preference changes when in 'system' mode
        window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
            if (this.current === 'system') {
                this.apply('system');
            }
        });
    },

    setTheme(theme) {
        this.current = theme;
        localStorage.setItem('theme', theme);
        this.apply(theme);
    },

    apply(theme) {
        const isDark = theme === 'dark' || (theme === 'system' && window.matchMedia('(prefers-color-scheme: dark)').matches);
        if (isDark) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    }
});

Alpine.start();

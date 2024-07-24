import AOS from 'aos';
import 'aos/dist/aos.css';
document.addEventListener('DOMContentLoaded', () => {
    AOS.init({
        once: true,
        disable: 'phone',
        duration: 700,
        easing: 'ease-out-cubic',
    });
});

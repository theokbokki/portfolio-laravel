import './bootstrap';
import Posts from './parts/posts.js';
import Contact from './parts/contact.js';

class App {
    constructor() {
        document.body.style.opacity = 0;
        document.body.style.transform = 'translateY(4rem)';
        document.body.classList.remove('hidden');

        setTimeout(() => {
            window.scrollTo(0, 0);
            document.body.style.opacity = 1;
            document.body.style.transform = 'translateY(0)';
        }, 300);

        window.addEventListener('transitionpage', (e) => {
            document.body.style.opacity = 0;
            document.body.style.transform = 'translateY(4rem)';

            console.log(e);

            setTimeout(() => {
                window.location = e.detail;
            }, 300);
        })

        if (document.querySelector('.posts')) {
            new Posts();
        }
        new Contact();
    }
}

window.addEventListener('load', () => new App());

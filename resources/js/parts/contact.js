class Contact {
    constructor() {
        this.getElements();
        this.setEventListeners();
    }

    getElements() {
        this.container = document.getElementById('contact');
        this.openTrigger = document.querySelector('.nav__item--contact');
        this.closeTrigger = document.querySelector('.contact__background');
        this.form = document.querySelector('.contact__form');
        this.fields = document.querySelector('.contact__fields');
    }

    setEventListeners () {
        this.openTrigger.addEventListener('click', this.handleOpen.bind(this));
        this.closeTrigger.addEventListener('click', this.handleClose.bind(this));
        this.container.addEventListener('animationend', this.handleAnimation.bind(this))
        this.form.addEventListener('submit', this.handleSubmit.bind(this));
    }

    handleOpen(e) {
        e.preventDefault();

        this.scrollPosition = window.scrollY;
        document.body.classList.add('bodyblock');
        document.body.style.top = -this.scrollPosition + 'px';
        this.container.style.top = this.scrollPosition + 'px';
        this.container.dataset.visible = true;
    }

    handleClose(e) {
        e.preventDefault();

        document.body.classList.remove('bodyblock');
        window.scrollTo(0, this.scrollPosition);
        this.container.classList.add('contact--hide');
    }

    handleAnimation(e) {
        if (e.animationName === 'fade-out') {
            this.container.dataset.visible = false;
            this.container.classList.remove('contact--hide');
        }
    }

    async handleSubmit (e) {
        e.preventDefault();

        const formData = new FormData(e.target);
        const res = await axios.post('/contact', formData);

        this.fields.innerHTML = res.data.html;

        if (res.data.success) {
            this.handleClose(e);
        }
    }
}

export default Contact;

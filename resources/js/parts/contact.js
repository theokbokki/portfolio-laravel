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

        this.container.dataset.visible = true;
    }

    handleClose(e) {
        e.preventDefault();

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

        this.fields.innerHTML = res.data;
    }
}

export default Contact;

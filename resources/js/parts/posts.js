class Posts {
    constructor() {
        this.setDefaults();
        this.getElements();
        this.setEventListeners();
    }

    setDefaults() {
        this.posts = null;
    }

    getElements() {
        this.container = document.querySelector('.posts');
        this.typesForm = document.querySelector('.posts__types');
        this.typesButtons = document.querySelectorAll('.posts__type');
        this.links = document.querySelectorAll('.post-card__link');
    }

    setEventListeners() {
        this.typesForm.addEventListener('submit', this.handleSubmit.bind(this));
        this.container.addEventListener('animationend', this.handleAnimation.bind(this));
        this.links.forEach((el) => {
            el.addEventListener('click', (e) => {
                e.preventDefault();
                dispatchEvent(new CustomEvent('transitionpage', {
                    detail: e.target.href,
                }));
            });
        });
    }

    async handleSubmit(e) {
        e.preventDefault();

        this.posts = await axios.post('/filter-posts', {
            button: e.submitter.value,
        })

        this.container.classList.remove('posts__show');
        this.container.classList.add('posts__hide');

        for (const typeButton of this.typesButtons) {
            typeButton.classList.remove('posts__type--selected');
        }

        e.submitter.classList.add('posts__type--selected');
    }

    handleAnimation(e) {
        if (e.animationName === "fade-out") {
            this.container.innerHTML = this.posts.data;
            this.container.classList.remove('posts__hide');
            this.container.classList.add('posts__show');
        }
    }
}

export default Posts;

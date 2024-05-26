<section class="contact" id="contact">
    <a href="{{ LaravelLocalization::localizeUrl(route('home')) }}" class="contact__background"></a>
    <div class="contact__content">
        <h2 class="contact__title">@lang('contact.title')</h2>
        <form action="{{ LaravelLocalization::localizeUrl(route('contact')) }}" method="post" class="contact__form">
            @csrf
            <div class="contact__field contact__field--name">
                <label for="name" class="contact__label">@lang('contact.name')</label>
                <input type="text"
                    name="name"
                    id="name"
                    placeholder="Rick Astley"
                    class="contact__input"
                    value="{{ old('name') }}"
                >
                @error('name')
                    <p class="contact__error">{{ $message }}</p>
                @enderror
            </div>
            <div class="contact__field contact__field--email">
                <label for="email" class="contact__label">@lang('contact.email')</label>
                <input type="email"
                    name="email"
                    id="email"
                    placeholder="rick@nggyu.com"
                    class="contact__input"
                    value="{{ old('email') }}"
                >
                @error('email')
                    <p class="contact__error">{{ $message }}</p>
                @enderror
            </div>
            <div class="contact__field contact__field--message">
                <label for="message" class="contact__label">@lang('contact.message')</label>
                <textarea name="message"
                    id="message"
                    placeholder="Never gonna give you up, Never gonna let you down..."
                    class="contact__input contact__input--textarea">{{ old('message') }}</textarea>
                    @error('message')
                        <p class="contact__error">{{ $message }}</p>
                    @enderror
            </div>
            <button type="submit" class="contact__submit">
                @lang('contact.submit')
                <span class="contact__submit--icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                    </svg>
                </span>
            </button>
        </form>
        <p class="contact__mail">@lang('contact.prefer-email', ['email' => 'hello@theoo.be'])</p>
    </div>
</section>

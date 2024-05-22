<div class="block">
    <div class="block__item">
        <h2 class="h2">
            {{ config('app.name', 'Laravel') }}
        </h2>
        <ul class="list">
            <li>
                address
            </li>
            <li>
                phone
            </li>
            <li>
                email
            </li>
            <li>
                <a class="" href="" target="_blank"><i class="fab fa-facebook"></i></a>
            </li>
        </ul>
    </div>

    <div class="block__item">
        <h2 class="h2">
            Contactez-moi
        </h2>
        <form id="message" class="form" method="POST" action="">
            @csrf
            <div class="form__item">
                <label class="form__label" for="name">Nom *</label>
                <input id="name" class="form__control" type="text" name="name" required>
            </div>
            <div class="form__item">
                <label class="form__label" for="email">E-mail *</label>
                <input id="email" class="form__control" type="email" name="email" required>
            </div>
            <div class="form__item">
                <label class="form__label" for="text">Message</label>
                <textarea id="text" class="form__control" name="text"></textarea>
            </div>

            <a class="btn" href="javascript:sendMessage('')">Envoer</a>
        </form>
    </div>
</div>

<div class="container copyright">
    &copy; {{ config('app.name', '') }}
</div>
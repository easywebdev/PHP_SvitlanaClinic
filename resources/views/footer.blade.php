<?php $contact = App\Models\Contact::find(1)->get(['address', 'phone', 'email', 'facebook'])[0] ?>
<div class="container flex-grid flex-grid_justify mb-1 footer-grid-adaptive">
    <div class="footer-block-wlimit">
        <h2 class="h2">
            {{ config('app.name', 'Laravel') }}
        </h2>
        <ul class="list-none">
            <li>
                <span class="text-label">Address:</span>{{ $contact->address }}
            </li>
            <li>
                <span class="text-label">Phone:</span>{{ $contact->phone }}
            </li>
            <li>
                <span class="text-label">Email:</span>{{ $contact->email }}
            </li>
            <li>
                <a class="link-custome" href="{{ $contact->facebook }}" target="_blank"><i class="fab fa-facebook"></i></a>
            </li>
        </ul>
    </div>

    <div class="">
        <h2 class="h2">
            Contactez-moi
        </h2>
        <form id="message" class="form mb-1" method="POST" action="">
            @csrf
            <div class="form__item">
                <label class="form__label text-label" for="name">Nom*</label>
                <input id="name" class="form__control" type="text" name="name" required>
            </div>
            <div class="form__item">
                <label class="form__label text-label" for="email">E-mail*</label>
                <input id="email" class="form__control" type="email" name="email" required>
            </div>
            <div class="form__item">
                <label class="form__label text-label" for="text">Message*</label>
                <textarea id="text" class="form__control textarea" name="text"></textarea>
            </div> 
        </form>

        <div class="text-center">
            <a class="link-btn" href="javascript:sendMail('message')">Envoer</a>
        </div>
    </div>
</div>

<div class="container copyright">
    &copy; {{ config('app.name', '') }}
</div>

@push('scripts')
<script src="{{asset('js/alertify.js')}}" type="application/javascript"></script>    
<script src="{{asset('js/mail_processing.js')}}" type="application/javascript"></script>
@endpush

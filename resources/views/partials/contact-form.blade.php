    <div class="cell small-12 general-info__contact-form">
        <h1>CONTACT FORMULIER</h1>
       @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if (Session::has('message'))
                <div class="cell small-12 large-6 sent-message">
                    <div class="message-{{ Session::get('message')['type'] }}">{{ Session::get('message')['text'] }}</div>
                </div>
            @endif
        @if (!Session::has('message'))
        <form action="/contact" method="post" class="grid-x general-info__form">
            {{@csrf_field()}}
            <div class="cell small-12 medium-6">
                <label for="firstname">Voornaam: *</label>
                <input type="text" id="first-name" name="firstname" class="{{$errors->has('firstname') ? 'is-invalid-input' : null}}" placeholder='Voornaam' required value="{{ old('firstname') }}">
            </div>

            <div class="cell small-12 medium-6">
                <label for="lastname">Achternaam: *</label>
                <input type="text" id="lastname" name="lastname" class="{{$errors->has('lastname') ? 'is-invalid-input' : null}}" placeholder="Achternaam" required value="{{ old('lastname') }}">
            </div>

            <div class="cell small-12 medium-6">
                <label for="email">E-mailadres: *</label>
                <input type="email" id="email" name="email" class="{{$errors->has('email') ? 'is-invalid-input' : null}}" placeholder="E-mailadres" required value="{{ old('email') }}">
            </div>

            <div class="cell small-12 medium-6">
                <label for="telefoon">Telefoonnummer:</label>
                <input type="tel" id="telephone" name="telephone" class="{{$errors->has('telephone') ? 'is-invalid-input' : null}}" placeholder="Telefoonnummer" value="{{ old('telephone') }}">
            </div>

            <div class="cell small-12 medium-6 end">
                <label for="subject">Onderwerp: *</label>
                <input type="text" id="subject" name="subject" class="{{$errors->has('subject') ? 'is-invalid-input' : null}}" placeholder="Onderwerp" required value="{{ old('subject') }}">
            </div>

            <div class="cell small-12">
                <label for="textblock">Vragen en opmerkingen:</label>
                <textarea id="textblock" name="textblock" class="{{$errors->has('textblock') ? 'is-invalid-input' : null}}" placeholder="Vragen en opmerkingen" required>{{ old('textblock') }}</textarea>
            </div>

            <div class="cell small-12">
                <input required type="checkbox" id="voorwaarden" name="voorwaarden" class="{{$errors->has('voorwaarden') ? 'is-invalid-input' : null}}" required value="1" {{ old('voorwaarden') == 1 ? 'checked' : null}}>
                <label class="checkbox-label" for="voorwaarden" >Ja, ik ga akkoord met de</label> <a class="checkbox-label" id="voorwaarden_file" target="_blank"href="{{ URL::to('resources/Privacy_en_Cookie_Statement_GAM.pdf') }}">voorwaarden. </a>
            </div>

            <div class="cell small-12">
                <button id="general-info__form-button" class="general-info__form-button" type="submit">VERZENDEN</button>
            </div>

        </form>
        @endif
    </div>
@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" autocomplete="name" autofocus>
                                    <div id="name-error" class="mex invalid-feedback"></div>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="last_name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text"
                                        class="form-control @error('last_name') is-invalid @enderror" name="last_name"
                                        value="{{ old('last_name') }}" autocomplete="last_name" autofocus>
                                    <div id="last-name-error" class="mex invalid-feedback"></div>
                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="date_of_birth"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Date of Birth') }}</label>

                                <div class="col-md-6">
                                    <input id="date_of_birth" type="date"
                                        class="form-control @error('date_of_birth') is-invalid @enderror"
                                        name="date_of_birth" value="{{ old('date_of_birth') }}" min="1920-01-01"
                                        max="<?= date('Y-m-d', strtotime('18 years ago')) ?>" autocomplete="date_of_birth"
                                        autofocus>
                                    <div id="date-error" class="mex invalid-feedback"></div>
                                    @error('date_of_birth')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address*') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">
                                    <div id="email-error" class="mex invalid-feedback"></div>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password*') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">
                                    <div id="password-error" class="mex invalid-feedback"></div>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password*') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                    <div id="password-c-error" class="mex invalid-feedback"></div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" id="button">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                            <div class="row mb-0 required">
                                <span class="text-secondary mt-5">The fields marked with * are required</span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const registration = document.querySelector("form");

        registration.addEventListener("submit", function(e) {

            let success = true;

            const mex = document.querySelectorAll("mex");
            mex.forEach(element => {
                element.innerHTML = "";
            });

            //verify name
            const name = document.getElementById("name");
            const nameErrorMessage = document.getElementById("name-error");
            let nameError = "";
            const nameValue = name.value.trim();
            if (nameValue.length < 3 || nameValue.length > 255) {
                success = false;
                nameError = "Il nome deve essere compreso tra 3 e 255 caratteri";
                name.classList.add("is-invalid");
            } else if (!/^[a-zA-Z]+$/.test(nameValue)) {
                success = false;
                nameError = "Il nome non può contenere caratteri speciali";
                name.classList.add("is-invalid");
            } else {
                name.classList.remove("is-invalid");
                name.classList.add("is-valid");
            }
            nameErrorMessage.innerHTML = nameError;

            //verify last name
            const lastName = document.getElementById("last_name");
            const lastNameErrorMessage = document.getElementById("last-name-error");
            let lastNameError = "";
            const lastNameValue = lastName.value.trim();
            if (lastNameValue.length < 3 || lastNameValue.length > 255) {
                success = false;
                lastNameError = "Il cognome deve essere compreso tra 3 e 255 caratteri";
                lastName.classList.add("is-invalid");
            } else if (!/^[a-zA-Z]+$/.test(lastNameValue)) {
                success = false;
                lastNameError = "Il cognome non può contenere caratteri speciali";
                lastName.classList.add("is-invalid");
            } else {
                lastName.classList.remove("is-invalid");
                lastName.classList.add("is-valid");
            }
            lastNameErrorMessage.innerHTML = lastNameError;

            //verify date of birth
            const date = document.getElementById("date_of_birth");
            const dateError = document.getElementById("date-error");
            let dateErrrorMessage = "";
            const dateValue = date.value.trim();
            if (dateValue.length === 10) {
                const today = new Date();
                const birthDate = new Date(dateValue);
                const age = today.getFullYear() - birthDate.getFullYear();
                const m = today.getMonth() - birthDate.getMonth();
                if (age < 18 || age === 18 && m < 0) {
                    success = false;
                    dateErrrorMessage = "Devi avere almeno 18 anni";
                    date.classList.add("is-invalid");
                } else if (age > 110 || age === 110 && m > 0) {
                    success = false;
                    dateErrrorMessage = "Devi avere meno di 110 anni";
                    date.classList.add("is-invalid");
                } else {
                    date.classList.remove("is-invalid");
                    date.classList.add("is-valid");
                }
            }
            dateError.innerHTML = dateErrrorMessage;

            //verify email
            const email = document.getElementById("email");
            const emailError = document.getElementById("email-error");
            let emailErrorMessage = "";
            const emailValue = email.value.trim();
            if (emailValue.length < 5 || emailValue.length > 255) {
                success = false;
                emailErrorMessage = "L'email deve essere compresa tra 5 e 255 caratteri";
                email.classList.add("is-invalid");
            } else if (!/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/.test(emailValue)) {
                success = false;
                emailErrorMessage = "L'email non ha un formato valido";
                email.classList.add("is-invalid");
            } else {
                email.classList.remove("is-invalid");
                email.classList.add("is-valid");
            }
            emailError.innerHTML = emailErrorMessage;

            //verify password
            const password = document.getElementById("password");
            const confirmPassowrd = document.getElementById("password-confirm");
            const passwordError = document.getElementById("password-error");
            const confirmPasswordError = document.getElementById("password-c-error");
            let passwordErrorMessage = "";
            let confirmPasswordErrorMessage = "";
            if (password.value.length < 8) {
                success = false;
                passwordErrorMessage = "La password deve essere almeno di 8 caratteri";
                password.classList.add("is-invalid");
                confirmPassowrd.classList.add("is-invalid");
            } else if (password.value !== confirmPassowrd.value) {
                success = false;
                confirmPasswordErrorMessage = "La password di conferma non corrisponde";
                password.classList.remove("is-invalid");
                password.classList.add("is-valid");
                confirmPassowrd.classList.add("is-invalid");
            } else {
                password.classList.remove("is-invalid");
                confirmPassowrd.classList.remove("is-invalid");
                password.classList.add("is-valid");
                confirmPassword.classList.add("is-valid");
            }
            passwordError.innerHTML = passwordErrorMessage;
            confirmPasswordError.innerHTML = confirmPasswordErrorMessage;


            //prevent sending form
            if (!success) {
                e.preventDefault();
            }
        })
    </script>
@endsection

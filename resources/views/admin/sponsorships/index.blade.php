@extends('layouts.app')

@section('content')
    <div class="container">
        <!--<form action="{{ route('admin.sponsorships.store') }}" id="payment" method="POST" class="mt-5">-->
        <form action="{{ route('admin.sponsorships.store') }}" id="payment" method="POST" class="mt-5">
            @csrf
            <!--Sponsorships-->
            <div class="row">
                @foreach ($sponsorships as $sponsorship)
                    <div class="col-4">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sponsorship"
                                id="radio-sponsorship-{{ $sponsorship->id }}" value="{{ $sponsorship->duration }}">
                            <label class="form-check-label" for="radio-sponsorship-{{ $sponsorship->id }}">
                                <b> {{ $sponsorship->name }}</b>
                            </label>
                        </div>
                    </div>
                @endforeach

                <select class="form-select" aria-label="Default select example" name="property" required>
                    @foreach ($properties as $property)
                        <option value="{{ $property->id }}">{{ $property->title }}</option>
                    @endforeach
                </select>

            </div>
            <section id="payment">
                <div id="dropin-container"></div>
                <button id="submit-button" class="button button--small button--green" type="submit">Purchase</button>
            </section>
        </form>
    </div>

    <!--script-->
    <script src="https://js.braintreegateway.com/web/dropin/1.43.0/js/dropin.js"></script>
    <script>
        const form = document.getElementById('payment');
        var button = document.querySelector('#submit-button');

        braintree.dropin.create({
            authorization: 'sandbox_g42y39zw_348pk9cgf3bgyw2b',
            selector: '#dropin-container'
        }, function(errOne, instance) {
            form.addEventListener('submit', function(e) {
                //prevent send form
                e.preventDefault();

                instance.requestPaymentMethod(function(err, payload) {
                    if (err) {
                        return
                    }

                    form.submit()
                });

            })
        });
    </script>
    <style>
        .button {
            cursor: pointer;
            font-weight: 500;
            left: 3px;
            line-height: inherit;
            position: relative;
            text-decoration: none;
            text-align: center;
            border-style: solid;
            border-width: 1px;
            border-radius: 3px;
            -webkit-appearance: none;
            -moz-appearance: none;
            display: inline-block;
        }

        .button--small {
            padding: 10px 20px;
            font-size: 0.875rem;
        }

        .button--green {
            outline: none;
            background-color: #64d18a;
            border-color: #64d18a;
            color: white;
            transition: all 200ms ease;
        }

        .button--green:hover {
            background-color: #8bdda8;
            color: white;
        }
    </style>
@endsection

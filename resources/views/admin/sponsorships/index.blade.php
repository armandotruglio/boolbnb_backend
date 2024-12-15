@extends('layouts.app')

@section('content')
    <div class="container">
        <!--<form action="{{ route('admin.sponsorships.store') }}" id="payment" method="POST" class="mt-5">-->
        <form action="{{ route('admin.sponsorships.store') }}" id="payment" method="POST" class="mt-5">
            @csrf
            <!--Sponsorships-->
            <div class="row">
                <div class="col-12 chechbox-sponsor">
                    @foreach ($sponsorships as $sponsorship)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sponsorship"
                                id="radio-sponsorship-{{ $sponsorship->id }}" value="{{ $sponsorship->duration }}">
                            <label class="form-check-label" for="radio-sponsorship-{{ $sponsorship->id }}">
                                <b> {{ $sponsorship->name }}</b>
                            </label>
                        </div>
                    @endforeach
                </div>
                <div class="col-12">
                    <div id="error-check" class="mex d-none">select a sponsorship</div>
                </div>
                <div class="col-12">
                    <select class="form-select mt-4" id="property-select" aria-label="Default select example"
                        name="property" required>
                        @foreach ($properties as $property)
                            <option value="{{ $property->id }}">{{ $property->title }}</option>
                        @endforeach
                    </select>
                    <div id="error-select" class="mex d-none">select a property to sponsor</div>
                </div>

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

                //take select of property
                const property = document.getElementById("property-select");

                // validate if a checkbox is checked
                let countChecked;
                let checkboxNumb;
                for (let i = 1; i <= {{ count($sponsorships) }}; i++) {
                    let check = document.getElementById(`radio-sponsorship-${i}`);
                    if (check.checked) {
                        document.getElementById('error-check').classList.add("d-none");
                        checkboxNumb = i;
                        countChecked = {{ count($sponsorships) }};
                        break
                    }
                }

                if (countChecked !== {{ count($sponsorships) }}) {
                    document.getElementById('error-check').classList.remove("d-none");
                    instance.requestPaymentMethod(function() {});
                    if (!property.value) {
                        document.getElementById('error-select').classList.remove("d-none");
                    } else {
                        document.getElementById('error-select').classList.add("d-none");
                    }
                    return
                }

                //validate if was selected a property
                if (!property.value) {
                    document.getElementById('error-select').classList.remove("d-none");
                    return
                } else {
                    document.getElementById('error-select').classList.add("d-none");
                }

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
        .mex {
            padding: 10px 20px;
            border-radius: 10px;
            margin-top: 10px;
            background-color: #ea192e;
            color: white;
            width: 30%;
        }

        #payment {
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .row {
            padding: 0 10px;
            flex-wrap: wrap;
        }

        .chechbox-sponsor {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

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

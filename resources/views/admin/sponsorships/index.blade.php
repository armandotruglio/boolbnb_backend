@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <h1 class="mt-5">Sponsor your property</h1>
        <div class="p mt-5">A sponsored apartment has the following characteristics: It appears on the Homepage in the
            "Featured Apartments" section. On the search page, it is always positioned before a non-sponsored apartment that
            meets the same search characteristics. Once the sponsorship period has ended, the apartment will return to being
            viewed normally, without any particularity.</div>
        <form action="{{ route('admin.sponsorships.store') }}" id="payment" method="POST" class="mt-5">
            @csrf
            <!--Sponsorships-->
            <div class="row">
                <div class="col-12 chechbox-sponsor">
                    <h2>Select one sponsorship:</h2>
                    @foreach ($sponsorships as $sponsorship)
                        <div class="form-check mb-4" id="form-check-{{ $sponsorship->id }}"
                            data-sponsorname="{{ $sponsorship->name }}" data-id="radio-sponsorship-{{ $sponsorship->id }}">
                            <input class="form-check-input" type="radio" name="sponsorship"
                                id="radio-sponsorship-{{ $sponsorship->id }}" value="{{ $sponsorship->duration }}">
                            <label class="form-check-label ms-3" for="radio-sponsorship-{{ $sponsorship->id }}"
                                id="label-sponsorship-{{ $sponsorship->id }}">
                                <h4>{{ $sponsorship->name }}</h4>
                            </label>
                            <ul>
                                @if ($sponsorship->duration === 24)
                                    <li>
                                        <b>Price:</b>2,99€
                                    </li>
                                    <li>
                                        <b>Duration:</b>24:00 h
                                    </li>
                                @elseif ($sponsorship->duration === 72)
                                    <li>
                                        <b>Price:</b>5,99€
                                    </li>
                                    <li>
                                        <b>Duration:</b>72:00 h
                                    </li>
                                @else
                                    <li>
                                        <b>Price:</b>9,99€
                                    </li>
                                    <li>
                                        <b>Duration:</b>144:00 h
                                    </li>
                                @endif
                            </ul>
                        </div>
                    @endforeach
                </div>
                <div class="col-12">
                    <div id="error-check" class="mex d-none">select a sponsorship</div>
                </div>
                <div class="col-12">
                    <h2>Select one your property:</h2>
                    <select class="form-select mt-4" id="property-select" onchange="getTextOption(this)"
                        aria-label="Default select example" name="property" required>
                        @foreach ($properties as $property)
                            <option value="{{ $property->id }}">{{ $property->title }}</option>
                        @endforeach
                    </select>
                    <div id="error-select" class="mex d-none">select a property to sponsor</div>
                </div>
            </div>
            <section id="payment">
                <h2 class="mt-3 ps-4">Payment</h2>
                <ul class="cart-payment">
                    <li class="justify-content-center">
                        <h5><b>Cart</b></h5>:
                    </li>
                    <li><b>sponsorship:</b><span id="sponsor-buy" class="ps-2"></span></li>
                    <li><b>property:</b><span id="property-buy" class="ps-2"></span></li>
                </ul>
                <div id="dropin-container"></div>
                <button class="button button--small button--green" type="submit" id="submit-button">Purchase</button>
            </section>
        </form>
    </div>

    <!--script-->
    <script src="https://js.braintreegateway.com/web/dropin/1.43.0/js/dropin.js"></script>
    <script>
        const form = document.getElementById('payment');
        const button = document.querySelector('#submit-button');
        let sponsorChart = document.getElementById("sponsor-buy");
        let propertyChart = document.getElementById("property-buy");
        //take select of property
        const property = document.getElementById("property-select");
        propertyChart.innerHTML = property.options[property.selectedIndex].text;
        property.addEventListener('change', function() {
            propertyChart.innerHTML = property.options[property.selectedIndex].text;
        })

        const checks = document.querySelectorAll('.form-check');
        checks.forEach(sponsor => {
            sponsor.addEventListener('click', function() {

                checks.forEach(sc => {
                    sc.classList.remove('checkedbox');
                });

                sponsor.classList.add('checkedbox');


                if (sponsor.classList.contains('checkedbox')) {
                    let checkboxInput = document.getElementById(sponsor.getAttribute('data-id'));
                    sponsorChart.innerHTML = sponsor.getAttribute('data-sponsorname');
                    checkboxInput.checked = true;
                }

            })
        });



        braintree.dropin.create({
            authorization: 'sandbox_g42y39zw_348pk9cgf3bgyw2b',
            selector: '#dropin-container'
        }, function(errOne, instance) {
            form.addEventListener('submit', function(e) {
                //prevent send form
                e.preventDefault();


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
        .checkedbox {
            border-color: rgb(60, 60, 241) !important;
            box-shadow: #0D6EFD 0px 7px 29px 0px;
            background-color: #0D6EFD;
            color: white;
        }

        .form-check-input {
            display: none;
        }

        .cart-payment {
            padding: 0;
            padding: 20px;
            border-radius: 20px;
            border: 2px solid #DEE2E6;
        }

        .braintree-form__notice-of-collection>a {
            display: none;
        }

        .mex {
            padding: 10px 20px;
            border-radius: 10px;
            margin-top: 10px;
            background-color: #ea192e;
            color: white;
            width: 30%;
            min-width: 120px;
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
            width: 100%;
        }

        .form-check {
            border: 1px solid #DEE2E6;
            min-width: 30%;
            width: 350px;
            display: flex;
            justify-content: start;
            align-items: center;
            padding: 20px 10px;
            border-radius: 15px;
            cursor: pointer;
        }



        .form-check-label {
            flex-basis: 30%;
        }

        ul {
            display: block;
            margin: 0 20px;
            list-style-type: none;
        }

        li {
            display: flex;
            font-weight: 500;
        }

        h4,
        h6 {
            margin: 0;
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

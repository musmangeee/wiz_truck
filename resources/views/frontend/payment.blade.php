@extends('layouts.frontend')

@section('style')
<style>
    /**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
    .StripeElement {
        box-sizing: border-box;
        height: 40px;
        padding: 10px 12px;
        border: 1px solid transparent;
        border-radius: 4px;
        background-color: white;
        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
    }

    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
    }

    .StripeElement--invalid {
        border-color: #fa755a;
    }

    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }
</style>

@endsection





@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10 col-xl-8">

            <!-- Header -->
            <div class="header mt-md-5">
                <div class="header-body">
                    <div class="row align-items-center">
                        <div class="col">

                            <!-- Pretitle -->
                            <h6 class="header-pretitle">
                 
                            </h6>

                            <!-- Title -->
                            <h1 class="header-title">
                                Payment
                            </h1>

                        </div>
                    </div> <!-- / .row -->
                </div>
            </div>
             @if(Session::has('success'))
             <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
             @endif
             @if(Session::has('error'))
             <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
             @endif

            <!-- Form -->
            <form class="mb-4" method="POST" action="" enctype="multipart/form-data">

            @csrf
                <!-- Project name -->
                <div class="form-group">

                    <!-- Label  -->
                    <label>
                        Category name
                    </label>

                    <!-- Input -->
                    <input type="text" name="name" class="form-control">

                </div>
                <!-- Project name -->
                <div class="form-group">
    
                    <label for="card-element">
                        Credit or debit card
                    </label>
                    <div id="card-element">
                        <!-- a Stripe Element will be inserted here. -->
                    </div>

                    <!-- Used to display form errors -->
                    <div id="card-errors" role="alert"></div>
                </div>

                <!-- Divider -->
                <hr class="mt-5 mb-5">

                <!-- Buttons -->
                <input type="submit" name="submit" value="Create Category" class="btn btn-block btn-primary">

                {{-- <a href="#" class="btn btn-block btn-primary">
                    Create project
                </a> --}}
                <a href="" class="btn btn-block btn-link text-muted">

                    
                </a>

            </form>
            <script src="https://js.stripe.com/v3/"></script>
        </div>
    </div> <!-- / .row -->
</div>

@endsection

@section('script')
<!-- Libs JS -->

{{-- <script>
    cardElement.mount('#card-element');
</script> --}}

<script>
// $("#get_package").click(function(){
//     var package = $('.get_package_id').val();
//     console.log(package);

// });
        // Create a Stripe client
            var stripe = Stripe('pk_test_51HJOqaFbtkGc4x7hioioAihztNfPkMtbGymnFayhWp9n8EKVY8kGgjMruOhdb65YEtCdzNthxB1lu6QSfiNvzlkD00l3jeG0QN');
            
                // Create an instance of Elements
                var elements = stripe.elements();
            
                // Custom styling can be passed to options when creating an Element.
                // (Note that this demo uses a wider set of styles than the guide below.)
                var style = {
                    base: {
                        color: '#32325d',
                        lineHeight: '18px',
                        fontFamily: '"Roboto", Helvetica Neue", Helvetica, sans-serif',
                        fontSmoothing: 'antialiased',
                        fontSize: '16px',
                        '::placeholder': {
                            color: '#aab7c4'
                        }
                    },
                    invalid: {
                        color: '#fa755a',
                        iconColor: '#fa755a'
                    }
                };
            
                // Create an instance of the card Element
                var card = elements.create('card', {
                    style: style
                });
            
                // Add an instance of the card Element into the `card-element` <div>
                card.mount('#card-element');
            
                // Handle real-time validation errors from the card Element.
                card.addEventListener('change', function(event) {
                    var displayError = document.getElementById('card-errors');
                    if (event.error) {
                        displayError.textContent = event.error.message;
                    } else {
                        displayError.textContent = '';
                    }
                });
            
                // Handle form submission
                var form = document.getElementById('wizardSteps');
                form.addEventListener('submit', function(event) {
                    event.preventDefault();
            
                    // Disable the submit button to prevent repeated clicks
                    // document.getElementById('save_add').disabled = true;
            
                    var options = {
                        name: document.getElementById('name_on_card').value,
            
                    }
            
                    stripe.createToken(card, options).then(function(result) {
                        if (result.error) {
                            // Inform the user if there was an error
                            var errorElement = document.getElementById('card-errors');
                            errorElement.textContent = result.error.message;
            
                            // Enable the submit button
                            document.getElementById('complete-order').disabled = false;
                        } else {
                            // Send the token to your server
                            stripeTokenHandler(result.token);
                        }
                    });
                });
            
                function stripeTokenHandler(token) {
                    // Insert the token ID into the form so it gets submitted to the server
                    var form = document.getElementById('wizardSteps');
                    var hiddenInput = document.createElement('input');
                    hiddenInput.setAttribute('type', 'hidden');
                    hiddenInput.setAttribute('name', 'stripeToken');
                    hiddenInput.setAttribute('value', token.id);
                    form.appendChild(hiddenInput);
            
                    // Submit the form
                    form.submit();
                }
            </script>


@endsection



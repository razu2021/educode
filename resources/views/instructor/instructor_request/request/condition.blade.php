@extends('dashboard')
@section('instructor_request_content')
<!-- Main Content Start -->

@push('styles')
    <style>
        .our-condtion {
            height: 70vh;
            width: 100%;
            box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
            padding: 1rem;
            overflow: hidden;
            transition: all 1s ease;
        }

        /* Scrollbar তো হবে, কিন্তু smooth হবে না কারণ overflow animate হয় না */
        .our-condtion:hover {
            overflow-y: scroll;
            scroll-behavior: smooth;
        }
    </style>
@endpush

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="our-condtion">

                    <p>
                        You need an account for most activities on our platform, including to purchase and access content or to submit content for publication. When setting up and maintaining your account, you must provide and continue to provide accurate and complete information, including a valid email address. You have complete responsibility for your account and everything that happens on your account, including for any harm or damage (to us or anyone else) caused by someone using your account without your permission. This means you need to be careful with your password. You may not transfer your account to someone else or use someone else’s account. If you contact us to request access to an account, we will not grant you such access unless you can provide us with the information that we need to prove you are the owner of that account. In the event of the death of a user, the account of that user will be closed.
                        You may not share your account login credentials with anyone else. You are responsible for what happens with your account and Udemy will not intervene in disputes between students or instructors who have shared account login credentials. You must notify us immediately upon learning that someone else may be using your account without your permission (or if you suspect any other security incident) by contacting our Support Team. We may request some information from you to confirm that you are indeed the owner of your account.
                        Students and instructors must be at least 18 years of age to create an account on Udemy and use the Services. If you are younger than 18 but above the required age for consent to use online services where you live (for example, 13 in the US or 16 in Ireland), you may not set up an account, but we encourage you to invite a parent or guardian to open an account and help you access content that is appropriate for you. If you are below this age of consent to use online services, you may not create a Udemy account or use the Services, regardless of parental or guardian assistance or consent. If we discover that you have created an account that violates these rules, we will terminate your account. Under our Instructor Terms, you may be requested to verify your identity before you are authorized to submit content for publication on Udemy.
                                            </p>
                        You need an account for most activities on our platform, including to purchase and access content or to submit content for publication. When setting up and maintaining your account, you must provide and continue to provide accurate and complete information, including a valid email address. You have complete responsibility for your account and everything that happens on your account, including for any harm or damage (to us or anyone else) caused by someone using your account without your permission. This means you need to be careful with your password. You may not transfer your account to someone else or use someone else’s account. If you contact us to request access to an account, we will not grant you such access unless you can provide us with the information that we need to prove you are the owner of that account. In the event of the death of a user, the account of that user will be closed.
                        You may not share your account login credentials with anyone else. You are responsible for what happens with your account and Udemy will not intervene in disputes between students or instructors who have shared account login credentials. You must notify us immediately upon learning that someone else may be using your account without your permission (or if you suspect any other security incident) by contacting our Support Team. We may request some information from you to confirm that you are indeed the owner of your account.
                        Students and instructors must be at least 18 years of age to create an account on Udemy and use the Services. If you are younger than 18 but above the required age for consent to use online services where you live (for example, 13 in the US or 16 in Ireland), you may not set up an account, but we encourage you to invite a parent or guardian to open an account and help you access content that is appropriate for you. If you are below this age of consent to use online services, you may not create a Udemy account or use the Services, regardless of parental or guardian assistance or consent. If we discover that you have created an account that violates these rules, we will terminate your account. Under our Instructor Terms, you may be requested to verify your identity before you are authorized to submit content for publication on Udemy.
                                            </p>
                        You need an account for most activities on our platform, including to purchase and access content or to submit content for publication. When setting up and maintaining your account, you must provide and continue to provide accurate and complete information, including a valid email address. You have complete responsibility for your account and everything that happens on your account, including for any harm or damage (to us or anyone else) caused by someone using your account without your permission. This means you need to be careful with your password. You may not transfer your account to someone else or use someone else’s account. If you contact us to request access to an account, we will not grant you such access unless you can provide us with the information that we need to prove you are the owner of that account. In the event of the death of a user, the account of that user will be closed.
                        You may not share your account login credentials with anyone else. You are responsible for what happens with your account and Udemy will not intervene in disputes between students or instructors who have shared account login credentials. You must notify us immediately upon learning that someone else may be using your account without your permission (or if you suspect any other security incident) by contacting our Support Team. We may request some information from you to confirm that you are indeed the owner of your account.
                        Students and instructors must be at least 18 years of age to create an account on Udemy and use the Services. If you are younger than 18 but above the required age for consent to use online services where you live (for example, 13 in the US or 16 in Ireland), you may not set up an account, but we encourage you to invite a parent or guardian to open an account and help you access content that is appropriate for you. If you are below this age of consent to use online services, you may not create a Udemy account or use the Services, regardless of parental or guardian assistance or consent. If we discover that you have created an account that violates these rules, we will terminate your account. Under our Instructor Terms, you may be requested to verify your identity before you are authorized to submit content for publication on Udemy.
                                            </p>
                        You need an account for most activities on our platform, including to purchase and access content or to submit content for publication. When setting up and maintaining your account, you must provide and continue to provide accurate and complete information, including a valid email address. You have complete responsibility for your account and everything that happens on your account, including for any harm or damage (to us or anyone else) caused by someone using your account without your permission. This means you need to be careful with your password. You may not transfer your account to someone else or use someone else’s account. If you contact us to request access to an account, we will not grant you such access unless you can provide us with the information that we need to prove you are the owner of that account. In the event of the death of a user, the account of that user will be closed.
                        You may not share your account login credentials with anyone else. You are responsible for what happens with your account and Udemy will not intervene in disputes between students or instructors who have shared account login credentials. You must notify us immediately upon learning that someone else may be using your account without your permission (or if you suspect any other security incident) by contacting our Support Team. We may request some information from you to confirm that you are indeed the owner of your account.
                        Students and instructors must be at least 18 years of age to create an account on Udemy and use the Services. If you are younger than 18 but above the required age for consent to use online services where you live (for example, 13 in the US or 16 in Ireland), you may not set up an account, but we encourage you to invite a parent or guardian to open an account and help you access content that is appropriate for you. If you are below this age of consent to use online services, you may not create a Udemy account or use the Services, regardless of parental or guardian assistance or consent. If we discover that you have created an account that violates these rules, we will terminate your account. Under our Instructor Terms, you may be requested to verify your identity before you are authorized to submit content for publication on Udemy.
                                            </p>
                        You need an account for most activities on our platform, including to purchase and access content or to submit content for publication. When setting up and maintaining your account, you must provide and continue to provide accurate and complete information, including a valid email address. You have complete responsibility for your account and everything that happens on your account, including for any harm or damage (to us or anyone else) caused by someone using your account without your permission. This means you need to be careful with your password. You may not transfer your account to someone else or use someone else’s account. If you contact us to request access to an account, we will not grant you such access unless you can provide us with the information that we need to prove you are the owner of that account. In the event of the death of a user, the account of that user will be closed.
                        You may not share your account login credentials with anyone else. You are responsible for what happens with your account and Udemy will not intervene in disputes between students or instructors who have shared account login credentials. You must notify us immediately upon learning that someone else may be using your account without your permission (or if you suspect any other security incident) by contacting our Support Team. We may request some information from you to confirm that you are indeed the owner of your account.
                        Students and instructors must be at least 18 years of age to create an account on Udemy and use the Services. If you are younger than 18 but above the required age for consent to use online services where you live (for example, 13 in the US or 16 in Ireland), you may not set up an account, but we encourage you to invite a parent or guardian to open an account and help you access content that is appropriate for you. If you are below this age of consent to use online services, you may not create a Udemy account or use the Services, regardless of parental or guardian assistance or consent. If we discover that you have created an account that violates these rules, we will terminate your account. Under our Instructor Terms, you may be requested to verify your identity before you are authorized to submit content for publication on Udemy.
                     </p>

                    <form action="{{route('instructor_request.condition_update')}}" id="myForm" method="post" >
                        @csrf 
                        <div class="accept_condition">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="agrees_to_terms" id="exampleRadios1" value="1"  onclick="submitForm()">
                                <label class="form-check-label" for="exampleRadios1">
                                    Yes, I accept terms and condition
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="agrees_to_terms" id="exampleRadios2" value="0" onclick="submitForm()">
                                <label class="form-check-label" for="exampleRadios2">
                                     No, I disagree
                                </label>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</section>


<script>
function submitForm() {
    document.getElementById('myForm').submit();
}
</script>

@endsection
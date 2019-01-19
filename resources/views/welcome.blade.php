@extends('layouts.app')

@section('header')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0 bg-primary vh-50 py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-7 py-2 text-light">
                            <h1 class="display-3 mb-0">
                                <span>Qontacs</span>
                            </h1>
                            <p class="lead mb-3 w-75">
                                <span>If you’re looking for an easy way to clean, 
                                    manage, and grow your contacts list, our app will help 
                                    you stay organized year round.</span> 
                            </p>
                            <div class="row">
                                <div class="col-md-8">
                                    <a class="btn btn-outline-light btn-lg btn-block" href="{{ route('contacts.index') }}">
                                        Start Now
                                    </a> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
@endsection

@section('content')

    @component('components.navbar')@endcomponent
    <main>
        <section class="container h-100">
            <div class="row">
                <div class="col-12 my-auto">
                    <div class="row text-center">
                        <div class="col-lg-4 mb-4">
                            <div class="card h-100">
                                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                    <h1 class="display-2 text-primary"><span class="ion ion-ios-snow-outline"></span></h1>
                                    <h4 class="card-title text-primary">Ecologic</h4>
                                    <p class="card-text">You met someone at work today? You need to keep his contact informations? Qontacts is the most ecological way to do that!</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-4">
                            <div class="card h-100">
                                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                    <h1 class="display-2 text-primary"><span class="ion ion-ios-tablet-portrait-outline"></span></h1>
                                    <h4 class="card-title text-primary">Cross-Devices</h4>
                                    <p class="card-text">Access your contacts lists anywhere and anytime. You just need to be connected :) . Easy access and simple managment.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-4">
                            <div class="card h-100">
                                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                    <h1 class="display-2 text-primary"><span class="ion ion-ios-checkmark-circle-outline"></span></h1>
                                    <h4 class="card-title text-primary">To the point</h4>
                                    <p class="card-text">Let's make your contacts list organized and make every information easy to find. List transfrom your list to a Qontacts List.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 mb-4">
                    <div class="card bg-primary text-white h-20">
                        <div class="card-body d-flex flex-column align-items-start">
                            <h4 class="card-title">New !</h4>
                            <p class="card-text">Now you can export your contacts to Excel and PDF.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 mb-4">
                    <div class="card bg-primary text-white h-20">
                        <div class="card-body d-flex flex-column align-items-start">
                            <h4 class="card-title">Try Qontacts Now !</h4>
                            <p class="card-text">Get up to 10,000 records free. No credit card needed.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
    </main>
    @component('components.footer')@endcomponent
@endsection
    

@extends('layouts.app')

@section('header')
<header class="bg-primary">
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-12">
                <div class="text-center d-flex flex-column justify-content-center text-light">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="display-5"></h4>
                            <p class="lead">Hey there! You have 654 contacts.</p>
                        </div>
                        <div class="col-md-6">
                            <div class="mt-2 mx-auto">
                                <button type="button" class="btn btn-outline-light">
                                    Add new contact
                                </button>
                                <button type="button" class="btn btn-outline-light">List my contacts</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>    
@endsection

@section('content')

    @component('components.navbar')@endcomponent

    <contacts-form></contacts-form>
    
@endsection
    

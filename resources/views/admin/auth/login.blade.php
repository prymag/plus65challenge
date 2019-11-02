@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-3 col-sm-12">
            
            <div class="card">
                <div class="card-header">
                    <h1 class="mb-0 text-center">{{ __('Hello') }}</h1>
                </div>
                {{ Form::open(['url' => route('admin.do.login'), 'method' => 'post']) }}
                <div class="card-body">

                    <div class="input-field">
                        {{ Form::text('username', '', ['class' => 'form-control']) }}
                        <label for="form1">{{ __('Username') }}</label>
                    </div>
                    <div class="input-field">
                        {{ Form::password('password', ['class' => 'form-control']) }}
                        <label for="form1">{{ __('Password') }}</label>
                    </div>


                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-primary">{{ __('Login') }}</button>
                </div>
                {{ Form::close() }}
            </div>

        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-3 col-sm-12">
            
            @if(Session::get('errors')||count( $errors ) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                      <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            
            <div class="card">
                <div class="card-header">
                    <h3 class="m-0 text-center">{{ __('Admin Login') }}</h3>
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
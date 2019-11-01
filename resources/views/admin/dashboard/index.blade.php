@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="card">
                {{ Form::open() }}
                <div class="card-body">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-md-4">
                            <div class="input-field">
                                <select>
                                    <option value="" disabled selected>Choose your option</option>
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                    <option value="3">Option 3</option>
                                </select>
                                <label for="">{{ __('Select')}}</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-field">
                                {{ Form::text('username', '', ['class' => 'form-control']) }}
                                <label for="form1">{{ __('Username') }}</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            {{ __('Randomize') }}
                            <div class="switch">
                                <label>
                                    No
                                    <input type="checkbox">
                                    <span class="lever"></span>
                                    Yes
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-primary">{{ __('Draw')}}</button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection
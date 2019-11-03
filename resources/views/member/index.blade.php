@extends('layouts.app')

@section('content')
    
    {{-- Empty div to emulate admin page --}}
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
            </div>
        </div>
    </div>
    {{-- Empty Div end --}}

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('components.quick-nav')
            </div>
        </div>
    </div>

    <div class="mb-3"></div>

    @include('components.members-winning-numbers')
    
@endsection
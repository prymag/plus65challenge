@extends('layouts.app')

@section('content')

    @include('admin.dashboard.components.notices')

    @include('admin.dashboard.components.clear-btn')

    @include('components.prize-board')

    @include('admin.dashboard.components.draw-btns')

    @include('admin.dashboard.components.draw-form')

    @include('components.members-winning-numbers')
    
@endsection
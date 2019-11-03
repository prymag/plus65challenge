<a href="{{route('home')}}" class="btn btn-primary">{{__('Home Page')}}</a>
<a href="{{route('member.index')}}" class="btn btn-primary">{{__('Members Page')}}</a>
@if (!Auth::user())
    <a href="{{route('admin.login.form')}}" 
        class="btn btn-primary">
        {{ __('Admin Login')}}
    </a>
@else 
    <a href="{{route('admin.dashboard')}}" 
        class="btn btn-primary">
        {{ __('Admin Page')}}
    </a>
@endif
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ __('Success!') }}: {{ session('success') }}
                </div>
            @endif
        
            @if (session('process-error'))
                <div class="alert alert-danger">
                    {{ __('Error!')}}: {{ session('process-error') }}
                </div>
            @endif

            @if (session('process-warning'))
                <div class="alert alert-danger">
                    {{ __('Warning!')}}: {{ session('process-warning') }}
                </div>
            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>
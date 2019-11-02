<div class="container-fluid">
    <div class="row justify-content-center align-items-stretch table-prize-row">
        @foreach($prizes_grouped as $key => $prizes)
            <div class="col-md-4">
                @include("components.prize-table", ['prizes' => $prizes, 'key' => $key ])
            </div>
        @endforeach
    </div>
</div>
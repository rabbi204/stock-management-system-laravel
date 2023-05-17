{{-- @if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ $errors->first() }}</strong>
        <button class="close" data-dismiss="alert" aria-label="close">&times;</button>
    </div>
@endif --}}

@if ($errors->any())
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <i class="mdi mdi-alert-outline me-2"></i>
    <strong>{{ $errors->first() }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


{{-- @if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="mdi mdi-check-all me-2"></i>
        <strong>{{ Session::get('success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif --}}

{{-- @if (Session::has('error'))
    <div class="alert alert-danger">
        <div>
            <p>{{ Session::get('error') }}</p>
        </div>
    </div>
@endif --}}
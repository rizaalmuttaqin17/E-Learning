@extends('layouts.app')
@section('title')
@lang('models/ujians.plural')
@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h1>@lang('models/ujians.plural')</h1>
        <div class="section-header-breadcrumb">
            <a href="{{ route('ujians.create')}}" class="btn btn-primary form-btn">@lang('crud.add_new')<i
                    class="fas fa-plus"></i></a>
        </div>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-body">
                @include('ujians.table')
            </div>
        </div>
    </div>

</section>

@push('scripts')
<script type="text/javascript">
    function confirmDelete() {
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                $('#form_id').submit();
            } 
        });
    }
</script>
<script type="text/javascript">
    function show(id) {
        $('.soals').addClass('hidden');
        $('#' + id).removeClass('hidden');
    }
</script>
@endpush
@endsection
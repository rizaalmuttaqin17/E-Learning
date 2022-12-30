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
            title: "Are you sure you want to delete this record?",
            text: "If you delete this, it will be gone forever.",
            icon: "warning",
            type: "warning",
            buttons: ["Cancel","Yes!"],
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
    }
</script>
@endpush

@endsection
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
<script type="module">
    import swal from 'sweetalert;

     $('#status_selesai').on('click', function (e) {
            e.preventDefault();
            let id = $(this).data('id');
            swal({
                title: 'Are you sure ?',
                text: "You won't be able to revert this !",
                icon: 'warning',
                buttons: "true"
            })
        });
</script>
@endpush

@endsection
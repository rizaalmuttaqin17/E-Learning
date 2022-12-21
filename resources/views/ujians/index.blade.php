@extends('layouts.app')
@section('title')
     @lang('models/ujians.plural')
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>@lang('models/ujians.plural')</h1>
            <div class="section-header-breadcrumb">
                <a href="{{ route('ujians.create')}}" class="btn btn-primary form-btn">@lang('crud.add_new')<i class="fas fa-plus"></i></a>
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
@endsection

@push('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $('.toggle').click(function () {
            var status = $(this).children().prop('checked') == true ? 'false' : 'true';
            var id = $(this).children().data('id');
            $.ajax({
                type: 'POST',
                dataType: "json",
                url: "changeStatus",
                data: {
                    'status': status,
                    'id': id
                },
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function (data) {
                    Swal.fire(
                        'GREAT!', 'Status changed successfully', 'success')
                    location.reload();
                    console.log(data.success);
                }
            });
        });
    })
</script>
@endpush
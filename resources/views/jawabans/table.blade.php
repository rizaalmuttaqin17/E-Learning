@section('css')
    @include('layouts.datatables_css')
@endsection


@push('scripts')
@include('layouts.datatables_js')
{!! $dataTable->scripts() !!}
@endpush
{!! $dataTable->table(['width' => '100%', 'class' => 'table table-striped table-bordered']) !!}
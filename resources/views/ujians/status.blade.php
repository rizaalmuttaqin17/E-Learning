{{-- <input data-id="{{ $id }}" class="toggle-class" data-toggle="toggle" data-on="true" data-off="false" data-onstyle="warning" data-offstyle="dark" type="checkbox" {{ $status == '1' ? 'checked' : '' }}> --}}
{!! Form::open(['route' => ['ujians.changeStatus', $id], 'method' => 'post']) !!}
@if ($status == '1')
    <input type="text" name="status" value="0" id="status" hidden>
@else
    <input type="text" name="status" value="1" id="status" hidden>
@endif
    {!! Form::button($status == '1' ? 'Ujian Selesai' : 'Berjalan', [
        'type' => 'submit',
        'class' => ['btn',  $status == '1' ? 'btn-success' : 'btn-danger' ],
        'onclick' => 'return confirm("'.__('crud.are_you_sure').'")'
    ]) !!}
{!! Form::close() !!}

{{-- @if ($status == '1')
    <input type="text" name="status" value="0" id="status" hidden>
    <a href="/ujians/{{ $id }}/changeStatus" @method('post') class="btn {{ $status == '1' ? 'btn-success' : 'btn-danger' }}" onclick={{ 'return confirm("'.__('crud.are_you_sure').'")' }} value="1">{{ $status == '1' ? 'Ujian Selesai' : 'Berjalan' }}</a>
@else
    <input type="text" name="status" value="1" id="status" hidden>
    <a href="/ujians/{{ $id }}/changeStatus" @method('post') class="btn {{ $status == '1' ? 'btn-success' : 'btn-danger' }}" onclick={{ 'return confirm("'.__('crud.are_you_sure').'")' }} value="1">{{ $status == '1' ? 'Ujian Selesai' : 'Berjalan' }}</a>
@endif --}}
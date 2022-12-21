{{-- <input data-id="{{ $id }}" class="toggle-class" data-toggle="toggle" data-on="true" data-off="false" data-onstyle="warning" data-offstyle="dark" type="checkbox" {{ $selesai == 'true' ? 'checked' : '' }}> --}}

<label class="custom-switch">
    <input type="radio" name="option" value="{{ $selesai }}" class="custom-switch-input" checked="">
    <span class="custom-switch-indicator"></span>
</label>
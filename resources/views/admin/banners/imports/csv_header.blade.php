<tr>
    <td>
        {{ __("Name") }}
    </td>
    <td>
        <div class="form-group">
            <select name="name" id="" class="form-control select2">
                <option value="">{{ __('Select') }}</option>
               @foreach ($headings as $header_name)
                    @if ($header_name)
                        <option value="{{ $header_name }}">{{ str_replace('_', ' ', $header_name) }}</option>
                    @endif
               @endforeach
            </select>
        </div>
    </td>
</tr>

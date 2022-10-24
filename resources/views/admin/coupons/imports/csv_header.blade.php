<tr>
    <td>
        {{ __("Code") }}
    </td>
    <td>
        <div class="form-group">
            <select name="code" id="" class="form-control select2">
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
<tr>
    <td>
        {{ __("Type") }}
    </td>
    <td>
        <div class="form-group">
            <select name="type" id="" class="form-control">
                <option value="">{{ __('Select') }}</option>
                <option value="flat">{{ __("Flat") }}</option>
                <option value="percentage">{{ __("Percentage") }}</option>
            </select>
        </div>
    </td>
</tr>
<tr>
    <td>
        {{ __("Amount") }}
    </td>
    <td>
        <div class="form-group">
            <select name="value" id="" class="form-control select2">
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

<tr>
    <td>
        {{ __("Expiry Date") }} (YYYY-MM-DD) ({{ __("Please ensure correct date format to avoid 500 error") }})
    </td>
    <td>
        <div class="form-group">
            <select name="expiry_date" id="" class="form-control select2">
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

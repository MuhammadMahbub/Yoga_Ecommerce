<tr>
    <td>
       {{ __("Name") }}
    </td>
    <td>
        <div class="form-group">
            <select name="name" id="" class="form-control select2" required>
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
        {{ __("Email") }}
    </td>
    <td>
        <div class="form-group">
            <select name="email" id="" class="form-control select2" required>
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
        {{ __("Phone") }}
    </td>
    <td>
        <div class="form-group">
            <select name="phone" id="" class="form-control select2" required>
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
        {{ __("Date And Time") }}
    </td>
    <td>
        <div class="form-group">
            <select name="date_time" id="" class="form-control select2">
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
        {{ __("Link") }}
    </td>
    <td>
        <div class="form-group">
            <select name="link" id="" class="form-control select2" required>
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
        {{ __("Created By") }}
    </td>
    <td>
        <div class="form-group">
            <select name="created_by" id="product_subcategory" class="form-control select2">
                <option value="">{{ __('Select') }}</option>
                @foreach (\App\Models\User::orderBy('name', 'asc')->get() as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
    </td>
</tr>

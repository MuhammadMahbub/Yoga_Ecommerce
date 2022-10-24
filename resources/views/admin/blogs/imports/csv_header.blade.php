<tr>
    <td>
        {{ __("Blog Title") }}
    </td>
    <td>
        <div class="form-group">
            <select name="title" id="" class="form-control select2" required>
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
        {{ __("Blog Description") }}
    </td>
    <td>
        <div class="form-group">
            <select name="description" id="" class="form-control select2" required>
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
        {{ __("Meta Title") }}
    </td>
    <td>
        <div class="form-group">
            <select name="meta_title" id="" class="form-control select2" required>
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
        {{ __("Meta Keywords") }}
    </td>
    <td>
        <div class="form-group">
            <select name="meta_keyword" id="" class="form-control select2" required>
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
        {{ __("Meta Description") }}
    </td>
    <td>
        <div class="form-group">
            <select name="meta_description" id="" class="form-control select2" required>
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
        {{ __("Created by") }}
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
<tr>
    <td>
        {{ __("Status") }}
    </td>
    <td>
        <div class="form-group">
            <select name="status" id="product_subcategory" class="form-control select2" required>
                <option value="active"> {{ __("Active") }} </option>
                <option value="inactive"> {{ __("Inactive") }} </option>
            </select>
        </div>
    </td>
</tr>

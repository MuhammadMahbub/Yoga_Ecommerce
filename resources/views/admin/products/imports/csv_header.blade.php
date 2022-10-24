<tr>
    <td> 
        Product Name 
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
        Product SKU 
    </td> 
    <td> 
        <div class="form-group"> 
            <select name="sku" id="" class="form-control select2" required> 
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
        Short Description
    </td> 
    <td> 
        <div class="form-group"> 
            <select name="short_description" id="" class="form-control select2" required> 
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
        Long Description
    </td> 
    <td> 
        <div class="form-group"> 
            <select name="long_description" id="" class="form-control select2"> 
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
        Price (Must be a number)
    </td> 
    <td> 
        <div class="form-group"> 
            <select name="price" id="" class="form-control select2" required> 
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
        Discount (Must be a number)
    </td> 
    <td> 
        <div class="form-group"> 
            <select name="discount" id="" class="form-control select2"> 
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
        Quantity (Must be a number)
    </td> 
    <td> 
        <div class="form-group"> 
            <select name="quantity" id="" class="form-control select2" required> 
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
        Category
    </td>
    <td>
        <div class="form-group"> 
            <select name="category_id" id="product_category" class="form-control select2" required> 
                <option value="">{{ __('Select') }}</option> 
               @foreach (\App\Models\Category::orderBy('name', 'asc')->get() as $category)
               @if($category->subCategories->count() > 0)
               <option value="{{ $category->id }}">{{ $category->name }}</option>
               @endif
               @endforeach
            </select>
        </div>
    </td>
</tr>
<tr>
    <td>
        Sub Category
    </td>
    <td>
        <div class="form-group"> 
            <select name="sub_category_id[]" id="product_subcategory" class="form-control select2"> 

            </select>
        </div>
    </td>
</tr>
<tr>
    <td>
        Created by
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
        Status
    </td>
    <td>
        <div class="form-group"> 
            <select name="status" id="product_subcategory" class="form-control select2" required> 
                <option value="active"> Active </option> 
                <option value="inactive"> Inactive </option> 
            </select>
        </div>
    </td>
</tr>
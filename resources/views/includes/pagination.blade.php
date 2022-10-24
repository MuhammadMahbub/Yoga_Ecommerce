@if ($variables instanceof \Illuminate\Pagination\AbstractPaginator)
    @if($variables != "")
        <div class="{{ $pagination_col_class ?? 'col-12' }}">
            <div class="pagination-parent">
            {{ $variables->appends($data_variables)->render() }}
            </div>
        </div>
    @endif 
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-4">
            <h1>{{ __('products::main.products_datatable') }}</h1>
        </div>
    </div>
    @include('products::products.index-filter')
    <table class="table table-bordered data-table" id="products-data-table">
        <thead>
            <tr>
                <th>{{ __('products::main.id') }}</th>
                <th>{{ __('products::main.category_name') }}</th>
                <th>{{ __('products::main.product_name') }}</th>
                <th>{{ __('products::main.price') }}</th>
                <th>{{ __('products::main.created_at') }}</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

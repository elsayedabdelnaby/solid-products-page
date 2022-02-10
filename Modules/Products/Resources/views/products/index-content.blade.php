<div class="container">
    <div class="row justify-content-center">
        <div class="col-4">
            <h1>{{ __('products::main.products_datatable') }}</h1>
        </div>
    </div>
    @include('products::products.index-filter')
    <div class="row my-3">
        <div class="col-10"></div>
        <div class="col-2">
            <button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#createProductModal">
                {{ __('products::main.create') }}
            </button>
        </div>
    </div>
    @include('products::products.modals.create')
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

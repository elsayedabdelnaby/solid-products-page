<div class="row justify-content-center my-4">
    <div class="col-sm-12 col-lg-8">
        <form id="search-products-datatable-form" action="" method="POST">
            @csrf
            @method("post")
            <div class="row">
                <div class="col-3">
                    <label for="categories">{{ __('products::main.filter_by_category') }}</label>
                </div>
                <div class="col-5">
                    <select class="form-control select-categories-multiple" name="categories_ids[]" multiple="multiple">
                        <option disabled> {{ __('products::main.select_category') }} </option>
                        @forelse ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
                <div class="col-1">
                    <button type="submit" class="btn btn-primary btn-md btn-icon-sm" id="m_search">{{ trans('products::main.filter') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="createProductModal" tabindex="-1" role="dialog" aria-labelledby="createProductModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createProductModalTitle">{{ __('products::main.create_product') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('products.store') }}" id="create-product-form" class="repeater">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12" id="answers">
                        </div>
                        <div class="col-12" id="errors">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="category"> {{ __('products::main.category') }} *</label><br>
                            <select class="form-control select-categories-multiple" name="cat_id" required>
                                <option disabled> {{ __('products::main.select_category') }} </option>
                                @forelse ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="price"> {{ __('products::main.price') }} *</label>
                            <input type="number" class="form-control" name="price"
                                title="{{ __('products::main.price') }}"
                                placeholder="{{ __('products::main.price') }}" required>
                        </div>
                    </div>
                    <div data-repeater-list="translations">
                        <div class="row align-items-end" data-repeater-item>
                            <div class="col-4">
                                <label for="language">{{ __('products::main.langauge') }} </label>
                                <select class="form-control" name="langauge" required>
                                    @foreach($languages as $language)
                                        <option value="{{ $language->id }}"> {{ $language->code }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-5">
                                <label for="name"> {{ __('products::main.name') }} </label>
                                <input type="text" name="name" placeholder="{{ __('products::main.name') }}" class="form-control" required/>
                            </div>
                            <div class="col-3">
                                <input data-repeater-delete type="button" value="{{ __('products::main.delete') }}" class="btn btn-danger"/>
                            </div>
                        </div>
                    </div>
                    <input data-repeater-create type="button" value="{{ __('products::main.add') }}" class="btn btn-primary my-2"/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ __('products::main.close') }}</button>
                    <button type="submit" class="btn btn-primary">{{ __('products::main.save') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {

        var productsDatatable = $('#products-data-table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: "{{ route('products.index') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'category_name',
                    name: 'category_name'
                },
                {
                    data: 'name',
                    name: 'product name'
                },
                {
                    data: 'price',
                    name: 'price'
                },
                {
                    data: 'created_at',
                    name: 'created at'
                }
            ],
            language: {
                search: "{{ __('datatables.search') }}",
                emptyTable: "{{ __('datatables.no_records_available') }}",
                info: "{{ __('datatables.showing_page') }} _START_ {{ __('datatables.of') }} _END_ {{ __('datatables.of') }} _TOTAL_",
                infoEmpty: "{{ __('datatables.showing_page') }} _START_ {{ __('datatables.of') }} _END_ {{ __('datatables.of') }} _TOTAL_",
            }
        });

        $('.select-categories-multiple').select2();

        $('.repeater').repeater({
            show: function() {
                $(this).slideDown();
            },
            hide: function(deleteElement) {
                $(this).slideUp(deleteElement);
            },
            ready: function(setIndexes) {}
        });


    });

    $('#m_search').on('click', function(e) {
        e.preventDefault();
        var query = $('#search-products-datatable-form').serialize();
        let table = $('#products-data-table').DataTable();
        table.ajax.url('{{ route('products.index') }}' + '?' + query).load();
    });

    $("#create-product-form").validate({
        rules: {
            price: "required",
            cat_id: "required",
        },
        messages: {
            price: '{{ __('products::main.price_is_required') }}'
        },
        invalidHandler: function(form, validator) {
            var errors = validator.numberOfInvalids();
            if (errors) {
                validator.errorList[0].element.focus();
            }
        },
        submitHandler: function(form) {
            $.ajax({
                url: form.action,
                type: form.method,
                data: $(form).serialize(),
                success: function(response) {
                    if(response.status){
                        $.notify(response.message, "success");
                        $('#createProductModal').modal('toggle');
                        $('#create-product-form').trigger("reset");
                        let table = $('#products-data-table').DataTable();
                        table.ajax.reload();
                    } else {
                        $.notify(response.message, "error");
                    }
                },
                error: function(data) {
                    let response = JSON.parse(data.responseText.toString());
                    let errors = response['errors'];
                    if (response.message) {
                        errors = Object.entries(errors);
                        errors.forEach(error => {
                            $.notify(error[1][0], "error");
                        });
                    } else {
                        errors.forEach(error => {
                            $.notify(error.message, "error");
                        });
                    }
                }
            });
        }
    });
</script>

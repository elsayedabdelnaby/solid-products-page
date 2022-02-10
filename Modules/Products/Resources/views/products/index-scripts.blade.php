<script type="text/javascript">
    $(function() {

        var table = $('#products-data-table').DataTable({
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

    });

    $('#m_search').on('click', function(e) {
        e.preventDefault();
        var query = $('#search-products-datatable-form').serialize();
        var table = $('#products-data-table').DataTable();
        table.ajax.url('{{ route('products.index') }}' + '?' + query).load();
    });
</script>

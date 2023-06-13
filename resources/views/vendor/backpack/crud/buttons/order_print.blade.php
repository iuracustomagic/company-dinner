@if ($crud->hasAccess('orderPrint'))
    <a href="{{ url($crud->route.'/'.$entry->getKey().'/orderPrint') }}" target="print_frame" class="btn btn-sm btn-link"><i class="la la-print"></i> Print</a>
@endif

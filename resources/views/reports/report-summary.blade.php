@extends(backpack_view('blank'))
<style>
    .own:before{
        content: "";
        width: 13px;
        border-bottom: 1px solid #ccc;
        position: absolute;
        top: 50%;
    }
    .table td, .table th{
        vertical-align: middle !important;
    }
    .table td table {
        width: 100%;
    }
    .toggler{
        display: block;
        width: 20px;
        height: 20px;
        border: 1px solid #ccc;
        text-align: center;
        line-height: 18px;
        /*position: absolute;*/
        /*top: calc(50% - 10px);*/
        /*bottom: 0;*/
        left: -10px;
        background-color: #fff;
        z-index: 2;
        cursor: pointer;
    }
    .toggler.revealed:before{
        content: "";
        position: absolute;
        border-left: 1px solid #ccc;
        height: 50%;
        z-index: 1;
        top: calc(50% + 10px);
    }
    .toggler.t-lvl-0,
    .toggler.t-lvl-0:before{
        border-color: #7c69ef;
    }
    .toggler.t-lvl-1{
        border-color: #00a65a;
        margin-left: 20px;
    }
    .toggler.t-lvl-1:before{
        border-color: #00a65a;
    }
    .toggler.t-lvl-2{
        border-color: #1b2a4e;
        margin-left: 40px;
    }
    .toggler.t-lvl-2:before{
        border-color: #1b2a4e;
    }
    tr.may-hide{
        position: relative;
    }
    tr.may-hide.hidden > td > table{
        display: none;
    }
    tr.may-hide > td {
        padding: 0;
    }
    table.lvl:before{
        content: "";
        position: absolute;
        height: 100%;
        z-index: 1;
    }
    table.lvl-0:before{
        border-left: 1px solid #7c69ef;
        left: 20px;
    }
    .own.o-lvl-1:before{
        border-color: #7c69ef;
        left: 20px;
    }
    table.lvl-1:before{
        border-left: 1px solid #00a65a;
        left: 40px;
    }
    .own.o-lvl-2:before{
        border-color: #00a65a;
        left: 40px;
    }
    table.lvl-2:before{
        border-left: 1px solid #1b2a4e;
        left: 60px;
    }
    .own.o-lvl-3:before{
        border-color: #1b2a4e;
        left: 60px;
    }
    td.controls{
        position: relative;
        width: 86px;
        padding: .75rem 10px;
    }
    td.index{
        width: 50px;
    }
    td.prof{
        width: 20%;
    }
    td.employee{
        width: 10%;
    }
    td.date{
        width: 120px;
        text-align: center;
    }
    td.available,
    td.passed{
        width: 110px;
        text-align: center;
    }
    .ev-list{
        width: 110px;
    }
    .ev-list button{
        float: right;
    }
    td.avg{
        width: 130px;
        text-align: center;
    }
    td.res{
        width: 90px;
        text-align: center;
    }
    td.supervisor{
        width: 10%;
    }
    .table-danger > td{
        background-color: rgba(214, 48, 49, .4) !important;
    }
    .table-warning > td{
        background-color: rgba(253, 203, 110, .4) !important;
    }
    .table-success > td{
        background-color: rgba(0, 184, 148, .4) !important;
    }
    .table-perfect{
        background-color: rgba(129, 236, 236, .4) !important;
    }
    @media (min-width: 576px) {
        .modal-dialog {
            max-width: 600px !important;
        }
    }
</style>
@section('content')
    <table class="bg-white table table-striped nowrap rounded">
        <thead>
        <tr>

            <th>{{trans('labels.division')}}</th>
            <th>{{trans('labels.user')}}</th>
            <th>{{trans('labels.price')}}</th>
            <th>{{trans('labels.count')}}</th>
            <th>{{trans('labels.sum')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($rows as $row)
            <tr>
                <td>{{$row['division']}}</td>
                <td>{{$row['user_name']}}</td>
                <td>{{$row['price']}}</td>
                <td>{{$row['count']}}</td>
                <td>{{$row['sum']}}</td>

            </tr>

        @endforeach
        </tbody>
        <table>
        @endsection



            @push('after_scripts')
                <script>

                </script>
    @endpush

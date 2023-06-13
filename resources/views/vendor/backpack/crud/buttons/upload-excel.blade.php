{{--@if ($crud->hasAccess('upload-excel'))--}}
<div class="container text-center">
<div class="row">
    <div class="col">
        <form method="POST" class="pt-4 pb-4" action="{{ route('upload') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <input class="form-control p-1" name="excel_file" type="file" id="formFile">
            </div>
            <div class="input-group">
                <span class="input-group-text">от</span>
                <input type="date" name="date_from" aria-label="First name" class="form-control">
                <span class="input-group-text">до</span>
                <input type="date" name="date_to" aria-label="Last name" class="form-control">
            </div>

            <div class="input-group d-flex justify-content-center mt-3 mb-3">
                <button type="submit" class="btn btn-primary ml-3">Upload Excel</button>
            </div>
        </form>
    </div>
    <div class="col pt-3">
        <h4>Можно загрузить таблицу Excel с обязательными столбцами:</h4>
        <ul class="d-flex" style="list-style: none; font-size: 20px">
            <li class="mr-2">1.Номер карты</li>
            <li class="mr-2">2.Имя</li>
            <li class="mr-2">3.Стоимость</li>
            <li class="mr-2">4.Организация</li>
        </ul>
    </div>

</div>
</div>

{{--  <a href="{{ url($crud->route.'/'.$entry->getKey().'/upload-exsel-btn') }}" class="btn btn-sm btn-link text-capitalize"><i class="la la-question"></i> upload-exsel-btn</a>--}}
{{--@endif--}}

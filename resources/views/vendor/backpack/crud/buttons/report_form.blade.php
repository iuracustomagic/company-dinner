
    <div class="container text-center">
        <div class="row">
{{--            <div class="col">--}}
                <form method="POST" class="pt-4 pb-4" action="{{ route('report') }}" enctype="multipart/form-data">
                    @csrf


                    <div class="input-group mb-3">
                        <span class="input-group-text">от</span>
                        <input type="date" name="date_from" aria-label="First name" class="form-control">
                        <span class="input-group-text">до</span>
                        <input type="date" name="date_to" aria-label="Last name" class="form-control">
                    </div>
                    <div class="mb-3 d-flex">
                        <span class="mr-3 w-50">Сотрудник</span>
                        <select class="form-control" aria-label="Default select example" name="user_name">
                            <option value="0" selected>Выберите сотрудника</option>
                            @php
                           $users = \Illuminate\Support\Facades\DB::table('users')->get();
                            @endphp
                            @foreach ($users as $user)
                            <option value="{{$user->name}}">{{$user->name}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="mb-3 d-flex">
                        <span class="mr-3 w-50">Подразделение</span>
                        <select class="form-control" aria-label="Default select example" name="division">
                            <option value="0" selected>Выберите подразделение</option>
                            @php
                                $divisions = \Illuminate\Support\Facades\DB::table('divisions')->get();
                            @endphp
                            @foreach ($divisions as $division)
                                <option value="{{$division->name}}">{{$division->name}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="input-group d-flex justify-content-center mt-3 mb-3">
                        <button type="submit" class="btn btn-primary ml-3">Создать отчет</button>
                    </div>
                </form>
{{--            </div>--}}

    </div>
    </div>



<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Customagic-dinner</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{asset('css/home.css')}}">


    <!-- Styles -->
    <style>

.btn_form {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-between;
    padding: 20px 30px;
    width: 500px;
    height: 400px;
    border: 1px solid #6a6262;
    border-radius: 4px;
}
   </style>
</head>
<body>

    <div class="form_container">
        @if(Session::has('message-success'))
            <div style="position: absolute; top: 150px; right: 50px;" >
            <div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{!! session('message-success') !!}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            </div>
        @endif
            @if(Session::has('message-error'))
                <div style="position: absolute; top: 150px; right: 50px;" >
                    <div id="alert" class="alert alert-danger alert-dismissible fade show" role="alert">
{{--                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">×</button>--}}
                        <strong>{!! session('message-error') !!}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif

            <div class="btn_form">
               <a href="{{url('/')}}" class="btn btn-primary btn-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                        <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                    </svg>
                    <span class="ml-3">Вернуться</span></a>
                <a href="{{url('/repeat')}}" class="btn btn-primary btn-lg">Повторно распечатать</a>


            </div>


    </div>




    <script type="text/javascript" src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min-5.3.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/javascript">



    </script>

{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>--}}
</body>
</html>

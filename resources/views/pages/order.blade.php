<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Customagic-dinner</title>
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">--}}

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{asset('css/home.css')}}">


    <!-- Styles -->
    <style>
        @media print {
            /*.print_header, .hide { visibility: hidden }*/

            body {

            }
            .printFrame {
                padding: 10px;

            }

        }

   </style>
</head>
<body>

{{--    <header class="header">--}}
{{--        <div class="container d-flex align-items-center">--}}
{{--        <img src="{{asset('images/logo-home.png')}}" alt="logo" width="200px">--}}
{{--        <h2 class="title">Заказ еды сотрудниками Customagic</h2>--}}
{{--        </div>--}}
{{--    </header>--}}
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

            <div>
{{--                <button class="btnprn btn btn-default">Print</button>--}}
{{--                <a href="{{ url('/print-view') }}?date={{ $order->date}}&price={{ $order->price}}&name={{ $order->user_name}}" class="btnprn btn btn-default">Print</a>--}}
                <button class="btnprn btn btn-default">Print</button>
                <h1>Заказ</h1>
                <table class="table" >
                    <tr><th>Имя</th><th>Стоимость</th><th>Дата</th></tr>

                        <tr><td>{{ $order->user_name }}</td>
                            <td>{{ $order->price }}</td>
                            <td>{{ $order->date }}</td>
                        </tr>
                </table>
                @if($admin)
                    <div>
                        <button>Action 1</button>
                        <button>Action 2</button>
                    </div>
                    @endif
            </div>
    </div>




    <script type="text/javascript" src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min-5.3.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{--    <script type="text/javascript" src="{{ asset('js/jquery.print-page.js') }}"></script>--}}

    <script type="text/javascript">
        /**
         * jQuery printPage Plugin
         * @version: 1.0
         * @author: Cedric Dugas, http://www.position-absolute.com
         * @licence: MIT
         * @desciption: jQuery page print plugin help you print your page in a better way
         */



        function openPrintDialogue(){
            $('<iframe>', {
                name: 'myiframe',
                class: 'printFrame'
            })
                .appendTo('body')
                .contents().find('body')
                .append(`
            <div id="content" style="display: flex;
                flex-direction: column;
                justify-content: space-between;
                align-items: center;
                border: 1px solid black;
                width: 100%;
                height: 100%;">
                <p style="font-size: 18px">{{ $order->date }}</p>
                <p style="font-size: 26px">{{$order->price }} MDL</p>
                <p style="font-size: 14px">Сотрудник:{{$order->user_name }}</p>
            </div>
  `);

            window.frames['myiframe'].focus();
            window.frames['myiframe'].print();
            window.location.href = "/";


            setTimeout(() => { $(".printFrame").remove(); }, 1000);
        };



        $(document).ready(function(){
            $('.btnprn').on('click', openPrintDialogue);
            // $('.btnprn').printPage();
            @if($admin)
             setTimeout(()=> {$('.btnprn').trigger('click');}, 5000)
            @else
            setTimeout(()=> {$('.btnprn').trigger('click');}, 500)
            @endif
        });

    </script>

{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>--}}
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SUPERIOR COMPUTER ASSISTED TEST - KECERDASAN</title>
    <link rel="icon" type="image/x-icon" href="{{asset('assets-quiz')}}/assets/images/favicon.png">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets-quiz')}}/assets/css/materialize.min.css"
          media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets-quiz')}}/assets/css/styles.css"
          media="screen,projection"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <style>
        .sidenav-overlay {
            z-index: 996;
        }

        nav ul a {
            margin-top: -10px;
        }

        nav ul a.btn {
            margin-top: -20px;
        }

        span.navigate-header {
            margin-bottom: 20px;
            text-align: center;
            /*background-color:white; padding: 20px 0; border-radius: 50px; border: solid 1px lightgrey*/
        }

        span.navigate-header .number {
            font-size: 2rem;
            border-radius: 50px;
            padding: 20px 0 20px 20px;
        }

        span.navigate-header .timer {
            font-size: 3rem;
            background-color: white;
            padding: 20px;
            border-radius: 50px;
            border: none;
        }

        .hide {
            display: none
        }
    </style>
</head>
<body>
<header>
    <div class="navbar-fixed">
        <nav class="z-depth-0 white">
            <div class="nav-wrapper" style="padding: 10px 50px">
                <a href="#!" class="brand-logo black-text"><img src="{{asset('assets-quiz')}}/assets/images/tes.png"
                                                                alt="logo" width="180px"></a>
                <a href="#" data-target="side-nav" class="sidenav-trigger black-text right"
                   style="margin: -10px -25px 0"><i class="material-icons">menu</i></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a class="black-text"><span class="fa fa-user-circle-o"></span> Hi, {{$participant->name}}</a>
                    </li>
                    <li><a class="black-text"><span class="grey-text text-darken-1">Jenis Soal: </span><span
                                class="bolder">{{ucwords($question_group->type)}}</span></a></li>
                    {{--                    <li><a class="btn red lighten-2 waves-effect waves-light"><span class="fa fa-tasks"></span>--}}
                    {{--                            Logout</a></li>--}}
                </ul>
            </div>
        </nav>
        <ul class="sidenav" id="side-nav">
            <li><a class="black-text"><i class="material-icons">account_circle</i> {{$participant->name}}</a></li>
            <li><a class="black-text dropdown-trigger" data-target='jenisSoal'><i class="material-icons">assignment</i>
                    {{ucwords($question_group->type)}}</a></li>
            {{--            <li><a class="btn red lighten-2 waves-effect waves-light"><span class="fa fa-tasks"></span> Logout</a></li>--}}
        </ul>
    </div>
</header>
<main class="grey lighten-5 position-relative">
    <div class="row">
        <!-- pertanyaan -->
        <div class="col m12 s12">
            <div id="quiz1" class="section scrollspy">
                <div class="card-panel transparent z-depth-0 center animate__animated animate__fadeIn animate__slow"
                     style="height: max-content">
                    <span class="navigate-header">
{{--                        <span class="number">Waktu Pengerjaan</span>--}}
                        <span class="timer pulse red lighten-4"><span id="minutes">00</span>:<span
                                id="seconds">00</span></span>
    </span>
                </div>
            </div>
        </div>
        <!-- jawaban -->
        <div class="col m12 s12 center">
            <h4>Quiz Selanjutnya akan segera di mulai</h4>
            <h5>{{$question_group->type}}</h5>
            <p>Type : {{$question_group->type_str}}</p>
            <p>Jumlah Soal : {{$question_group->total_question}}</p>
            <p>Lama Waktu Pengerjaan : {{$question_group->duration_per_section * $question_group->section_ammount}}
                Menit</p>            <span>

            </span>
        </div>
    </div>
</main>


<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="{{asset('assets-quiz')}}/assets/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="{{asset('assets-quiz')}}/assets/js/materialize.min.js"></script>

<script>
    let now = new Date();
    let end = new Date("{{$start_at}}");
    let waiting = end.getTime() - now.getTime()
    setTimeout(function (){
        endSection()
    },waiting)
    function endSection() {
        $.post('{{route('save-progress')}}', {
            _token: '{{csrf_token()}}',
            data: {}
        }).then(function () {
            location.reload();
        }, function (er) {
            alert('session ended with error')
            console.log(er)
            {{--location.href = '{{route('home')}}'--}}
        })
    }

    let milisecond = now.getTime() - end.getTime();

    var totalSeconds = milisecond / 1000;
    setInterval(setTime, 1000);

    function setTime() {
        ++totalSeconds;
        $('#seconds').html(pad(parseInt(Math.abs(totalSeconds % 60))));
        $('#minutes').html(pad(parseInt(Math.abs(totalSeconds / 60))));
    }

    function pad(val) {
        var valString = val + "";
        if (valString.length < 2) {
            return "0" + valString;
        } else {
            return valString;
        }
    }
</script>
</body>
</html>

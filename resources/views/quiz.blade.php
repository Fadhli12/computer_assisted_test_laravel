<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SUPERIOR COMPUTER ASSISTED TEST</title>
    <link rel="icon" type="image/x-icon" href="{{asset('assets-quiz')}}/assets/images/favicon.png">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets-quiz')}}/assets/css/materialize.min.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="{{asset('assets-quiz')}}/assets/css/styles.css"  media="screen,projection"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <style>
        .sidenav-overlay{
            z-index: 996;
        }
        nav ul a{
            margin-top: -10px;
        }
        nav ul a.btn{
            margin-top: -20px;
        }
        span.navigate-header{
            margin-bottom:20px; text-align:center;
            /*background-color:white; padding: 20px 0; border-radius: 50px; border: solid 1px lightgrey*/
        }
        span.navigate-header .number{
            font-size: 2rem;
            border-radius: 50px; padding: 20px 0 20px 20px;
        }
        span.navigate-header .timer{
            font-size: 3rem;
            background-color: white; padding: 20px; border-radius: 50px; border: none;
        }
    </style>
</head>
<body>
<header>
    <div class="navbar-fixed">
        <nav class="z-depth-0 white">
            <div class="nav-wrapper" style="padding: 10px 50px">
                <a href="#!" class="brand-logo black-text"><img src="{{asset('assets-quiz')}}/assets/images/tes.png" alt="logo" width="180px"></a>
                <a href="#" data-target="side-nav" class="sidenav-trigger black-text right" style="margin: -10px -25px 0"><i class="material-icons">menu</i></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a class="black-text"><span class="fa fa-user-circle-o"></span> Hi, Muhammad Fadhli</a></li>
                    <li><a class="black-text"><span class="fa fa-tasks"></span> <span class="grey-text text-darken-1">Kelas: </span><span class="bolder">A</span></a></li>
                    <li><a class="black-text"><span class="grey-text text-darken-1">Jenis Soal: </span><span class="bolder">Kecerdasan</span></a></li>
                    <li><a class="btn red lighten-2 waves-effect waves-light"><span class="fa fa-tasks"></span> Logout</a></li>
                </ul>
            </div>
        </nav>
        <ul class="sidenav" id="side-nav">
            <li><a class="black-text"><i class="material-icons">account_circle</i> Muhammad Fadhli</a></li>
            <li><a class="black-text dropdown-trigger" data-target='jenisSoal'><i class="material-icons">assignment</i> Kecerdasan</a></li>
            <li><a class="btn red lighten-2 waves-effect waves-light"><span class="fa fa-tasks"></span> Logout</a></li>
        </ul>
    </div>
</header>
<main class="grey lighten-5 position-relative">
    <div class="row">
        <!-- pertanyaan -->
        <div class="col m8 s12">
            <div id="quiz1" class="section scrollspy">
                <div class="card-panel transparent z-depth-0 center animate__animated animate__fadeIn animate__slow" style="height: max-content">
                    <span class="navigate-header">
{{--                        <span class="number">Waktu Pengerjaan</span>--}}
                        <span class="timer pulse red lighten-4">00:00:30</span>
                    </span>

                    <h6 class="grey-text text-darken-2" style="margin-top: 2rem">Urutkan potongan gambar berikut menjadi gambar utuh</h6>

                    <div class="row no-margin">
                        <div class="col offset-m2 m8">
                            <img src="https://www.kibrispdr.org/data/gambar-wartegg-test-yang-benar-5.jpg" alt="gambar-soal" class="responsive-img" style="max-height: 200px">
                        </div>
                    </div>
                    <div class="row">
                        <form action="#">
                            <p>
                                <label>
                                    <input name="quest1" type="radio" checked />
                                    <span> <span class="option">A</span>3 - 2 - 1 - 4 </span>
                                </label>
                            </p>
                            <p>
                                <label>
                                    <input name="quest1" type="radio" />
                                    <span> <span class="option">B</span>3 - 2 - 1 - 4 </span>
                                </label>
                            </p>
                            <p>
                                <label>
                                    <input name="quest1" type="radio"  />
                                    <span> <span class="option">C</span>3 - 2 - 1 - 4 </span>
                                </label>
                            </p>
                            <p>
                                <label>
                                    <input name="quest1" type="radio"  />
                                    <span> <span class="option">D</span>3 - 2 - 1 - 4 </span>
                                </label>
                            </p>
                        </form>
                    </div>
                    <div class="center">
                        <button class="btn btn-flat btn-lg col m4 s12">SEBELUMNYA</button>
                        <button class="btn btn-lg col m4 s12">JAWAB</button>
                        <button class="btn btn-flat btn-lg col m4 s12">SELANJUTNYA</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- jawaban -->
        <div class="col m4 s12">
            <div class="card-panel no-padding z-depth-0">
                @for ($i =1; $i <= 100; $i++)
                    <a href="#" class="btn grey lighten-3 grey-text text-darken-2 hoverable waves-light waves-effect" style="margin: 5px; line-height: 1.5; height: 50px; width: 50px"><span class="white">{{$i}}</span><br><span style="font-weight: 900">A</span></a>
                @endfor
            </div>
        </div>
    </div>
</main>


<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="{{asset('assets-quiz')}}/assets/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="{{asset('assets-quiz')}}/assets/js/materialize.min.js"></script>

<script>
    var data =
    $(document).ready(function (){
        $('.sidenav').sidenav();
        $('.tabs').tabs();
        $('.dropdown-trigger').dropdown();
        $('select').formSelect();
    })
</script>
</body>
</html>

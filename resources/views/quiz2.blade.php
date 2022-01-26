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
            background-color: white; padding: 20px; border-radius: 50px; border: solid 2px lightgrey;
        }

        .button {
            -webkit-border-radius: 28px;
            -moz-border-radius: 28px;
            border-radius: 28px;
            color: #000000;
            font-size: 20px;
            padding: 20px;
            border: solid #E6F3FF 2px;
            text-decoration: none;
        }

        a.btn:hover {
            background: none;
            text-decoration: none;
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
                    <li><a class="black-text dropdown-trigger" href="#!" data-target='jenisSoal'><span class="grey-text text-darken-1">Jenis Soal: </span><span class="bolder">Soal 1</span></a></li>
                    <li><a class="btn red lighten-2 waves-effect waves-light"><span class="fa fa-tasks"></span> Logout</a></li>
                </ul>
            </div>
        </nav>
        <ul class="sidenav" id="side-nav">
            <li><a class="black-text"><i class="material-icons">account_circle</i> Muhammad Fadhli</a></li>
            <li><a class="black-text dropdown-trigger" data-target='jenisSoal'><i class="material-icons">assignment</i> SOAL 1</a></li>
            <li><a class="btn red lighten-2 waves-effect waves-light"><span class="fa fa-tasks"></span> Logout</a></li>
        </ul>
        <!-- Dropdown Structure -->
        <ul id="jenisSoal" class="dropdown-content">
            <li><a href="#!">SOAL 1</a></li>
            <li><a href="#!">SOAL 2</a></li>
            <li class="divider"></li>
            <li><a href="#!">SOAL 3</a></li>
        </ul>
    </div>
</header>
<main class="grey lighten-5 position-relative">
    <div class="row">
        <!-- pertanyaan -->
        <div class="col m12 s12">
            <div id="quiz1" class="section scrollspy">
                <div class="card-panel transparent z-depth-0 center animate__animated animate__fadeIn animate__slow" style="height: max-content">
                    <span class="navigate-header">
{{--                        <span class="number">Waktu Pengerjaan</span>--}}
                        <span class="timer pulse red lighten-4">00:00:20</span>
                    </span>

                    <div style="margin-top: 5rem">
                        <h1> a       %       b       8</h1>
                    </div>

                    <div class="row">
                        <form action="#">
                            <span style="margin-right: 90px">
                                <label>
                                    <input name="quest1" type="radio" checked />
                                    <span> <span class="option">A</span>3 </span>
                                </label>
                            </span>
                            <span style="margin-right: 90px">
                                <label>
                                    <input name="quest1" type="radio" />
                                    <span> <span class="option">B</span>3 </span>
                                </label>
                            </span>
                            <span style="margin-right: 90px">
                                <label>
                                    <input name="quest1" type="radio"  />
                                    <span> <span class="option">C</span>3 </span>
                                </label>
                            </span>
                            <span style="margin-right: 90px">
                                <label>
                                    <input name="quest1" type="radio"  />
                                    <span> <span class="option">D</span>3 </span>
                                </label>
                            </span>
                            <span style="margin-right: 90px">
                                <label>
                                    <input name="quest1" type="radio"  />
                                    <span> <span class="option">E</span>3 </span>
                                </label>
                            </span>
                        </form>
                    </div>
                </div>
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

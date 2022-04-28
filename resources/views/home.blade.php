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
        @import url('https://fonts.googleapis.com/css2?family=Jost&display=swap');
        body, h3, a{
            font-family: 'Jost', sans-serif;
        }
        #background {
            position: fixed;
            top: 0;
            left: 0;
            width: 50%;
            height: 100%;
            /*background-color: #FBB03A;*/

            background: linear-gradient(to right,rgba(230, 243, 255, 0.8), rgba(162, 223, 242, 0.7)), url("../assets-quiz/assets/images/bg_0.png") ;
            background-repeat: no-repeat;
            background-size: 100% 100%;
            z-index: 1;
        }

        #content {
            position: relative;
            z-index: 2;
            margin-top: 50px;
            text-align: center;
            font-weight: bold;
            font-family: Arial, sans-serif;
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

        .button:hover {
            background: #a3dcff;
            text-decoration: none;
        }
    </style>

</head>
<body onload="typeWriter()">
<header>
    <div class="navbar-fixed">
        <nav class="z-depth-0 transparent">
            <div class="nav-wrapper" style="padding: 20px 50px">
                <a href="#!" class="brand-logo black-text"><img src="{{asset('assets-quiz')}}/assets/images/tes.png" alt="logo" width="180px"></a>
            </div>
        </nav>
    </div>
</header>
<main>
    <div id="content">
        <div class="row">
            <div class="col offset-m6 m6 offset-s1 s10">
                <img src="{{asset('assets-quiz')}}/assets/images/illustration/ilustrasi1.png" alt="ilustrasi1" class="responsive-img">
                <h3 style="margin-bottom: 50px">Computer Assisted Test</h3>
                <a class="button modal-trigger" href="#modalPin">MULAI SEKARANG</a>
            </div>
        </div>

    </div>
    <div id="background" class="hide-on-med-and-down">
        <div class="row" style="margin-top: 50%; margin-bottom: auto; padding-left: 50px">
            <h3>Selamat datang
            </h3>
            <h5 id="name"></h5>
        </div>
    </div>

    <!-- Modal Structure -->
    <div id="modalPin" class="modal" style="width: 300px; text-align: center">
        <form action="{{route('submit-key')}}" method="post">
            @csrf
            <div class="modal-content">
                <div class="row text-center">
                    <h5>Masukkan PIN keamanan anda</h5>
                    <div class="row">
                        <div class="input-field col s12">
                            <input name="key" id="password" type="password" class="validate" style="text-align: center">
{{--                            <label for="password">Password</label>--}}
                        </div>
                    </div>
                    <button type="submit" class="modal-close waves-effect waves-light btn-flat btn-lg">KIRIM</button>
                </div>
            </div>
        </form>

    </div>


</main>




<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="{{asset('assets-quiz')}}/assets/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="{{asset('assets-quiz')}}/assets/js/materialize.min.js"></script>

<script>
    $(document).ready(function(){
        $('.modal').modal({
            preventScrolling: false,
            dismissible:false
        });
    });
    var i = 0;
    var txt = 'Silahkan klik mulai sekarang untuk memulai quiz';
    var speed = 50;

    function typeWriter() {
        if (i < txt.length) {
            document.getElementById("name").innerHTML += txt.charAt(i);
            i++;
            setTimeout(typeWriter, speed);
        }
    }
    // $.post("https://api-rameauite-ra07.antikode.dev/oauth/token",{
    //     "grant_type" : "client_credentials",
    //     "client_id" : 1,
    //     "client_secret" : "pQJZaul6nipUiRQ9g7OzZeQAxmcVQ71w76gwBDj6"
    // })
    // .then(function (res) {
    //     console.log(res);
    // })
</script>
</body>
</html>

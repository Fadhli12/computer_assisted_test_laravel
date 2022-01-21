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
            text-align: center;
            position: fixed;
            width: 500px;
            height: 200px;
            top: 50%;
            left: 50%;
            margin-top: -100px; /* Negative half of height. */
            margin-left: -250px; /* Negative half of width. */

        }

        #content {
            position: relative;
            z-index: 2;
            margin-top: 50%;
            margin-bottom: auto;
            text-align: center;
            font-weight: bold;
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
<body style=" background: linear-gradient(to right,rgba(230, 243, 255, 0.8), rgba(162, 223, 242, 0.7)) ;
            background-repeat: no-repeat;
            background-size: 100% 100%;">
<header>
    <div class="navbar-fixed">
        <nav class="z-depth-0 transparent">
            <div class="nav-wrapper" style="padding: 20px 50px">
                <a href="#!" class="brand-logo black-text"><img src="{{asset('assets-quiz')}}/assets/images/tes.png" alt="logo" width="180px"></a>
            </div>
        </nav>
    </div>
</header>
<main id="background">
    <div class="row">
        <div class="col m12 col offset-s2 s8 ">
            <h4>Verifikasi Keamanan</h4>
            <h6>Masukkan PIN anda</h6>
            <form class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="password" type="password" class="validate" style="text-align: center">
{{--                        <label for="password">Masukkan PIN</label>--}}
                    </div>
                </div>
            </form>
            <a class="button" href="">KIRIM</a>

        </div>
    </div>
</main>


<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="{{asset('assets-quiz')}}/assets/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="{{asset('assets-quiz')}}/assets/js/materialize.min.js"></script>

<script>
    var data =
        $(document).ready(function (){

        })
</script>
</body>
</html>

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
<body>
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
                <h5>Lengkapi Data Kamu Disini !</h5>

                <form class="col offset-m3 m6 s12" action="{{url()->current()}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="input-field col m12 s12">
                            <input name="name" id="nama" type="text" class="validate" required>
                            <label for="name">Nama *</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col m12 s12">
                            <input name="phone" id="phone" type="text" class="validate" required>
                            <label for="phone">Nomor Telepon *</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col m12 s12">
                            <input name="email" id="email" type="email" class="validate">
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <button class="button modal-trigger" type="submit">DAFTAR SEKARANG</button>
                </form>
            </div>
        </div>

    </div>
    <div id="background" class="hide-on-med-and-down"></div>
</main>



<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="{{asset('assets-quiz')}}/assets/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="{{asset('assets-quiz')}}/assets/js/materialize.min.js"></script>

<script>
    var data =
        $(document).ready(function(){
            $('.modal').modal();
        });
</script>
</body>
</html>

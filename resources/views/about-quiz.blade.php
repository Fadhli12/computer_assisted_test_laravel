<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SUPERIOR COMPUTER ASSISTED TEST</title>
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
        @import url('https://fonts.googleapis.com/css2?family=Jost&display=swap');

        body, h3, a {
            font-family: 'Jost', sans-serif;
        }

        #background {
            position: fixed;
            top: 0;
            left: 0;
            width: 50%;
            height: 100%;
            /*background-color: #FBB03A;*/

            background: linear-gradient(to right, rgba(230, 243, 255, 0.8), rgba(162, 223, 242, 0.7)), url("../assets-quiz/assets/images/bg_0.png");
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
            color: white;
            font-size: 20px;
            padding: 20px;
            border: solid #E6F3FF 2px;
            text-decoration: none;
            background-color: teal;
        }

        .button:hover {
            background: #a3dcff;
            color: black;
            transition: background-color .2s ease-in-out;
            text-decoration: none;
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
            </div>
        </nav>
    </div>
</header>
<main>
    <div id="content">
        <div class="row">
            <div class="col offset-m6 m6 offset-s1 s10">
                <div class="card-panel z-depth-0">
                    <div class="row">
                        <div class="col m4 s12" style="margin-bottom: 20px; border: solid 1px grey; border-radius: 20px; padding:5px 0">
                            <label class="black-text">Nama : {{$participant->name}} </label><br>
                            <label class="black-text">Nomor Telepon : {{$participant->phone}} </label><br>
                            <label class="black-text">Email : {{$participant->email}} </label><br>
                        </div>
                        <div class="col m8 s12">
                            <form action="{{url()->current()}}" method="post">
                                @csrf
                                <button type="submit" class="button modal-trigger" style="cursor: pointer; width: 100%">
                                    <h4 style="margin: 0">Mulai Quiz</h4>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-panel grey lighten-4 z-depth-0" style="border-radius: 20px">
                    <h6>DESKRIPSI QUIZ</h6> <br>
                    @foreach ($access_room->room->questionGroups AS $group)
                        <ul class="collapsible popout">
                            <li class="active z-depth-0">
                                <div class="collapsible-header"><i class="material-icons">event_note</i> {{$group->name}} </div>
                                <div class="collapsible-body white" style="text-align: left!important;">
                                    <i>{{$group->group_type}}</i>
                                    <p>Type : {{$group->type_str}}</p>
                                    <p>Jumlah Soal : {{$group->total_question}}</p>
                                    <p>Lama Waktu Pengerjaan : {{$group->duration_per_section * $group->section_ammount}}
                                        Menit</p>
                                </div>
                            </li>
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div id="background" class="hide-on-med-and-down">
        <div class="row" style="margin-top: 10%; margin-bottom: auto; padding-left: 50px">
{{--            <h3>SuperiorSulbar</h3>--}}
{{--            <h4>Nama : {{$participant->name}} </h4>--}}
{{--            <h4>Nomor Telepon : {{$participant->phone}} </h4>--}}
{{--            <h4>Email : {{$participant->email}} </h4>--}}
        </div>
    </div>
</main>


<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="{{asset('assets-quiz')}}/assets/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="{{asset('assets-quiz')}}/assets/js/materialize.min.js"></script>

<script>
    var data =
        $(document).ready(function () {
            $('.collapsible').collapsible();
        });
</script>
</body>
</html>

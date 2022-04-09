<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SUPERIOR COMPUTER ASSISTED TEST - KECERMATAN</title>
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
            border: solid 2px lightgrey;
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

        .text-center {
            text-align: center;
        }

        .soal {
            font-size: xxx-large;
        }

        .clue {
            letter-spacing: 4rem;
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
                    <li><a class="black-text"><span class="fa fa-user-circle-o"></span> Hi, Muhammad Fadhli</a></li>
                    <li><a class="black-text"><span class="fa fa-tasks"></span> <span class="grey-text text-darken-1">Kelas: </span><span
                                class="bolder">A</span></a></li>
                    <li><a class="black-text dropdown-trigger" href="#!" data-target='jenisSoal'><span
                                class="grey-text text-darken-1">Jenis Soal: </span><span
                                class="bolder">Soal 1</span></a></li>
                    <li><a class="btn red lighten-2 waves-effect waves-light"><span class="fa fa-tasks"></span>
                            Logout</a></li>
                </ul>
            </div>
        </nav>
        <ul class="sidenav" id="side-nav">
            <li><a class="black-text"><i class="material-icons">account_circle</i> Muhammad Fadhli</a></li>
            <li><a class="black-text dropdown-trigger" data-target='jenisSoal'><i class="material-icons">assignment</i>
                    SOAL 1</a></li>
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
                <div class="card-panel transparent z-depth-0 center animate__animated animate__fadeIn animate__slow"
                     style="height: max-content">
                    <span class="navigate-header">
{{--                        <span class="number">Waktu Pengerjaan</span>--}}
                        <span class="timer pulse red lighten-4"><span id="minutes">00</span>:<span
                                id="seconds">00</span></span>
                    </span>
                    <div>
                        @foreach($question_group->sections AS $section_index => $section)
                            <div id="section-{{$section_index}}" style="{{$section_index > 0 ? 'display:none' : ''}}">
                                @foreach($section->questions AS $question_index => $question)
                                    <div id="question-{{$question_index}}"
                                         style="{{$question_index > 0 ? 'display:none' : ''}}">
                                        <div style="margin-top: 5rem;" class="text-center">
                                            <table style="width: 60%; margin: auto">
                                                <tr>
                                                    @foreach($question->answers AS $answer)
                                                        <th class="text-center soal">{!! strip_tags($answer->answer) !!}</th>
                                                    @endforeach
                                                </tr>
                                                <tr>
                                                    <th class="text-center">A</th>
                                                    <th class="text-center">B</th>
                                                    <th class="text-center">C</th>
                                                    <th class="text-center">D</th>
                                                    <th class="text-center">E</th>
                                                </tr>
                                            </table>
                                            <h1 class="clue"> {!! strip_tags($question->question) !!}</h1>
                                        </div>
                                        <div class="row">
                                            <form action="#">
                                <span style="margin: 0 20px">
                                    <label>
                                        <input class="answer" name="quest-{{$section_index}}-{{$question_index}}" type="radio" section-index="{{$section_index}}" index="{{$question_index}}" value="a"/>
                                        <span> <span class="option">A</span> </span>
                                    </label>
                                </span>
                                                <span style="margin: 0 20px">
                                    <label>
                                        <input class="answer" name="quest-{{$section_index}}-{{$question_index}}" type="radio" section-index="{{$section_index}}" index="{{$question_index}}" value="b"/>
                                        <span> <span class="option">B</span> </span>
                                    </label>
                                </span>
                                                <span style="margin: 0 20px">
                                    <label>
                                        <input class="answer" name="quest-{{$section_index}}-{{$question_index}}" type="radio" section-index="{{$section_index}}" index="{{$question_index}}" value="c"/>
                                        <span> <span class="option">C</span> </span>
                                    </label>
                                </span>
                                                <span style="margin: 0 20px">
                                    <label>
                                        <input class="answer" name="quest-{{$section_index}}-{{$question_index}}" type="radio" section-index="{{$section_index}}" index="{{$question_index}}" value="d"/>
                                        <span> <span class="option">D</span> </span>
                                    </label>
                                </span>
                                                <span style="margin: 0 20px">
                                    <label>
                                        <input class="answer" name="quest-{{$section_index}}-{{$question_index}}" type="radio" section-index="{{$section_index}}" index="{{$question_index}}" value="e"/>
                                        <span> <span class="option">E</span> </span>
                                    </label>
                                </span>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
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
    $(document).ready(function () {
        $('.sidenav').sidenav();
        $('.tabs').tabs();
        $('.dropdown-trigger').dropdown();
        $('select').formSelect();
    })
    let quiz_name = 'question-group-{{$question_group->id}}';
    if (!localStorage.getItem(quiz_name)) {
        localStorage.setItem(quiz_name, '{!! json_encode($data_quiz) !!}')
    }
    let data_quiz = JSON.parse(localStorage.getItem(quiz_name))
    console.log(data_quiz);
    let now = new Date();
    let start = new Date();
    let count = 0;
    cekSection();

    function cekSection() {
        count = 0;
        let data_quiz = JSON.parse(localStorage.getItem(quiz_name))
        data_quiz.forEach(function (val, index) {
            if (index == 0) {
                start = new Date(val.start)
            }
            if (val.status == 'start') {
                console.log('ini index nya', index);
                let start_section = new Date(val.start)
                console.log(now);
                console.log(start_section);
                let begin = now >= start_section ? now : start_section;
                let end = new Date(val.end);
                console.log(now > end);
                console.log(now)
                console.log(end)
                if (now > end) {
                    endSection(index)
                } else {
                    $('#section-' + index).show().siblings().hide();
                    val.questions.forEach(function (question,index2){
                        if (question.user_answer){
                            $('#section-'+index+'>#question-'+index2).hide();
                        } else {
                            let next = $('#section-'+index+'>#question-'+index2);
                            if (next.length){
                                next.show()
                            }
                        }
                    })
                    let dif = end.getTime() - begin.getTime();
                    console.log(dif);
                    setTimeout(function () {
                        endSection(index)
                    }, dif)
                }
            } else if (val.status == 'end') {
                count++;
            }
        })
        localStorage.setItem(quiz_name, JSON.stringify(data_quiz));
        if (data_quiz.length == count) {
            let data_final = JSON.parse(localStorage.getItem(quiz_name));
            $.post('{{route('save-progress')}}',{
                _token : '{{csrf_token()}}',
                data : data_final
            }).then(function (){
                location.reload();
            },function (er){
                alert('session ended with error')
                console.log(er)
                location.href = '{{route('home')}}'
            })
        }
        console.log('ini data final', JSON.parse(localStorage.getItem(quiz_name)));
    }

    function endSection(section) {
        let data_quiz = JSON.parse(localStorage.getItem(quiz_name))
        data_quiz[section].status = 'end';
        if ($('#section-' + (section + 1)).length) {
            data_quiz[section + 1].status = 'start';
            $('#section-' + (section + 1)).show().siblings().hide()
        }
        localStorage.setItem(quiz_name, JSON.stringify(data_quiz));
        cekSection();
    }

    let milisecond = now.getTime() - start.getTime();

    var minutesLabel = document.getElementById("minutes");
    var secondsLabel = document.getElementById("seconds");
    var totalSeconds = milisecond / 1000;
    setInterval(setTime, 1000);

    function setTime() {
        ++totalSeconds;
        secondsLabel.innerHTML = pad(parseInt(totalSeconds % 60));
        minutesLabel.innerHTML = pad(parseInt(totalSeconds / 60));
    }
    $('.answer').click(function (e){
        e.preventDefault();
        var index = $(this).attr('index');
        var section_index = $(this).attr('section-index');
        var value = $(this).val();
        $('#section-'+section_index+'>#question-'+index).hide();
        var next = $('#section-'+section_index+'>#question-'+parseInt(index+1));
        if (next.length){
            next.show();
        }
        let data_quiz = JSON.parse(localStorage.getItem(quiz_name))
        data_quiz[section_index]['questions'][index]['user_answer'] = value
        localStorage.setItem(quiz_name,JSON.stringify(data_quiz));
    });

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

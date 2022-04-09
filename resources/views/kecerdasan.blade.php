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
            border: solid 2px lightgrey;
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
                    <li><a class="black-text"><span class="fa fa-user-circle-o"></span> Hi, Muhammad Fadhli</a></li>
                    <li><a class="black-text"><span class="fa fa-tasks"></span> <span class="grey-text text-darken-1">Kelas: </span><span
                                class="bolder">A</span></a></li>
                    <li><a class="black-text"><span class="grey-text text-darken-1">Jenis Soal: </span><span
                                class="bolder">Kecerdasan</span></a></li>
                    <li><a class="btn red lighten-2 waves-effect waves-light"><span class="fa fa-tasks"></span>
                            Logout</a></li>
                </ul>
            </div>
        </nav>
        <ul class="sidenav" id="side-nav">
            <li><a class="black-text"><i class="material-icons">account_circle</i> Muhammad Fadhli</a></li>
            <li><a class="black-text dropdown-trigger" data-target='jenisSoal'><i class="material-icons">assignment</i>
                    Kecerdasan</a></li>
            <li><a class="btn red lighten-2 waves-effect waves-light"><span class="fa fa-tasks"></span> Logout</a></li>
        </ul>
    </div>
</header>
<main class="grey lighten-5 position-relative">
    <div class="row">
        <!-- pertanyaan -->
        <div class="col m8 s12">
            <div id="quiz1" class="section scrollspy">
                <div class="card-panel transparent z-depth-0 center animate__animated animate__fadeIn animate__slow"
                     style="height: max-content">
                    <span class="navigate-header">
{{--                        <span class="number">Waktu Pengerjaan</span>--}}
                        <span class="timer pulse red lighten-4">
                            <span id="minutes">00</span>:<span
                                id="seconds">00</span></span>
                    </span>
                    <div>
                        @foreach($question_group->sections AS $section_index => $section)
                            <div id="section-{{$section_index}}" class="{{$section_index > 0 ? 'hide' : ''}}">
                                @foreach($section->questions AS $question_index => $question)
                                    <div id="question-{{$section_index}}-{{$question_index}}"
                                         data-question="{{$question_index}}"
                                         data-section="{{$section_index}}"
                                         class="{{$question_index > 0 ? 'hide' : ''}}">
                                        <h6 class="grey-text text-darken-2" style="margin-top: 2rem">
                                            <b>{{$loop->iteration}}</b>
                                        </h6>

                                        <div class="row no-margin">
                                            {!! $question->question !!}
                                        </div>
                                        <div class="row">
                                            <form action="#">
                                                @foreach($question->answers AS $answer)
                                                <p>
                                                    <label>
                                                        <input value="{{$answer->choice}}" data-section="{{$section_index}}" data-question="{{$question_index}}" name="quest-{{$section_index}}-{{$question_index}}" type="checkbox"/>
                                                        <span>
                                                            <span class="option">{{strtoupper($answer->choice)}}</span>
                                                            {!! $answer->answer !!}
                                                        </span>
                                                    </label>
                                                </p>
                                                @endforeach
                                            </form>
                                        </div>
                                        <div class="center">
                                            <button class="btn btn-flat btn-lg col m4 s12 prev" data-index="-1">SEBELUMNYA</button>
                                            <button class="btn btn-lg col m4 s12 answers">JAWAB</button>
                                            <button class="btn btn-flat btn-lg col m4 s12 next" data-index="1">SELANJUTNYA</button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- jawaban -->
        <div class="col m4 s12">
            <div class="card-panel no-padding z-depth-0" id="answer-container">
                {{--@for ($i =1; $i <= 100; $i++)
                    <a href="#" class="btn grey lighten-3 grey-text text-darken-2 hoverable waves-light waves-effect"
                       style="margin: 5px; line-height: 1.5; height: 50px; width: 50px"><span
                            class="white">{{$i}}</span><br><span style="font-weight: 900">A</span></a>
                @endfor--}}
            </div>
        </div>
    </div>
</main>


<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="{{asset('assets-quiz')}}/assets/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="{{asset('assets-quiz')}}/assets/js/materialize.min.js"></script>

<script>
    var data =
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
    showAnswer()
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
                    val.questions.forEach(function (question, index2) {
                        if (question.user_answer.length > 0) {
                            question.user_answer.forEach(function (val){
                                $('[name=quest-'+index+'-'+index2+'][value='+val+']').prop('checked',true)
                            })
                            let next = $('#section-' + index + '>#question-'+index+'-'+ (index2+1));
                            if (next.length) {
                                next.removeClass('hide')
                                $('#section-' + index + '>#question-'+index+'-'+ index2).addClass('hide');
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
            $.post('{{route('save-progress')}}', {
                _token: '{{csrf_token()}}',
                data: data_final
            }).then(function () {
                location.reload();
            }, function (er) {
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

    function pad(val) {
        var valString = val + "";
        if (valString.length < 2) {
            return "0" + valString;
        } else {
            return valString;
        }
    }

    $('.answers').click(function (e){
        e.preventDefault();
        var input = $('input:checked')
        let data_quiz = JSON.parse(localStorage.getItem(quiz_name))
        data_quiz.forEach(function (section, index){
            console.log('ini section',section);
            section.questions.forEach(function (question,index2){
                console.log('ini q',question);
                data_quiz[index]['questions'][index2]['user_answer'] = [];
            })
        })
        input.each(function (i, el){
            var answer = $(el).val();
            var section = $(el).data('section');
            var question = $(el).data('question');
            data_quiz[section]['questions'][question]['user_answer'].push(answer)
        })
        localStorage.setItem(quiz_name, JSON.stringify(data_quiz));
        var questions = $('[id*=section]:not(.hide)>[id*=question-]:not(.hide)')
        console.log(questions);
        var index = questions.data('question');
        var section = questions.data('section');
        var next = $('#question-'+section+'-'+(index+1))
        console.log('#question-'+section+'-'+(index+1));
        console.log(next);
        if (next.length){
            next.removeClass('hide')
            questions.addClass('hide')
        }
        showAnswer();
    })

    function showAnswer(){
        let data_quiz = JSON.parse(localStorage.getItem(quiz_name));
        $('#answer-container').html("");
        data_quiz.forEach(function (section,index){
            section.questions.forEach(function (question,index2){
                var answer = question.user_answer.join(',');
                var content = '<a href="#" class="btn grey lighten-3 grey-text text-darken-2 hoverable waves-light waves-effect show-question" ' +
                    'data-question="' + index2 +'"'+
                    'data-section="' + index +'"'+
                    'style="margin: 5px; line-height: 1.5; height: 50px; width: 50px"><span ' +
                    'class="white">'+(index2 + 1)+'</span><br><span style="font-weight: 900">'+answer+'</span></a>'
                $('#answer-container').append(content);
            })
        })
    }

    $('body').on('click','.show-question',function (e){
        e.preventDefault();
        console.log(this);
        var question = $(this).data('question');
        var section = $(this).data('section');
        $('#section-'+section).removeClass('hide').siblings().addClass('hide');
        $('#question-'+section+'-'+question).removeClass('hide').siblings().addClass('hide');
    })
    $('.prev,.next').click(function (e){
        e.preventDefault();
        var i = $(this).data('index')
        var questions = $('[id*=section]:not(.hide)>[id*=question-]:not(.hide)')
        var index = questions.data('question');
        var section = questions.data('section');
        var show = $('#question-'+section+'-'+(index+i))
        if (show.length){
            show.removeClass('hide')
            questions.addClass('hide')
        }
    })
</script>
</body>
</html>

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
</head>
<body>
<header>
    <div class="navbar-fixed">
        <nav class="amber accent-4">
            <div class="nav-wrapper">
                <a href="#!" class="brand-logo center black-text"><img src="{{asset('assets-quiz')}}/assets/images/logo.png" alt="logo" width="180px"></a>
            </div>
        </nav>
    </div>
</header>
<main>
    <div class="row">
        <div class="col s12 m4">
            <div class="card-panel grey lighten-4 z-depth-0">
                <div class="row no-margin valign-wrapper">
                    <div class="col s4 center">
                        <span class="material-icons grey-text text-lighten-2" style="font-size: 4rem">account_box</span>
                    </div>
                    <div class="col s8">
            <span class="grey-text text-darken-3">
              <h6>Nama Peserta</h6>
              <h5>Fadhli</h5>
            </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12 m4">
            <div class="card-panel grey lighten-4 z-depth-0">
                <div class="row no-margin valign-wrapper">
                    <div class="col s4 center">
                        <span class="material-icons grey-text text-lighten-2" style="font-size: 4rem">watch_later</span>
                    </div>
                    <div class="col s8">
            <span class="grey-text text-darken-3">
              <h6>Waktu Pengerjaan</h6>
              <h5> menit</h5>
            </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12 m4">
            <div class="card-panel grey lighten-4 z-depth-0">
                <div class="row no-margin valign-wrapper">
                    <div class="col s4 center">
                        <span class="material-icons grey-text text-lighten-2" style="font-size: 4rem">description</span>
                    </div>
                    <div class="col s8">
            <span class="grey-text text-darken-3">
              <h6>Jenis Soal</h6>
              <h5></h5>
            </span>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <!-- pertanyaan -->
        <div class="col m8 s12">
            <div class="card-panel z-depth-0 center no-padding animate__animated animate__fadeIn animate__slow">
                <h5>Pertanyaan nomor 1</h5>
                <h6 class="grey-text text-darken-2">Urutkan potongan gambar berikut menjadi gambar utuh</h6>

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
                    <a class="btn btn-lg waves-effect waves-light amber accent-4 white-text">JAWAB</a>
                </div>
            </div>
        </div>
        <!-- jawaban -->
        <div class="col m4 s12">
            <div class="card-panel no-padding z-depth-0">
                <div class="row answer-row">
                    <div class="col s6">
                        <div class="row no-margin">
                            <div class="col s3">
                                <div class="card-panel answer-column selected hoverable no-margin center">
                                    <span>1. A</span>
                                </div>
                            </div>
                            <div class="col s3">
                                <div class="card-panel answer-column hoverable no-margin center">
                                    <span>1. A</span>
                                </div>
                            </div>
                            <div class="col s3">
                                <div class="card-panel answer-column hoverable no-margin center">
                                    <span>1. A</span>
                                </div>
                            </div>
                            <div class="col s3">
                                <div class="card-panel answer-column hoverable no-margin center">
                                    <span>1. A</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col s6">
                        <div class="row no-margin">
                            <div class="col s3">
                                <div class="card-panel answer-column hoverable no-margin center">
                                    <span>1. A</span>
                                </div>
                            </div>
                            <div class="col s3">
                                <div class="card-panel answer-column hoverable no-margin center">
                                    <span>1. A</span>
                                </div>
                            </div>
                            <div class="col s3">
                                <div class="card-panel answer-column hoverable no-margin center">
                                    <span>1. A</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="sample-answer"></div>
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

    })
</script>
</body>
</html>

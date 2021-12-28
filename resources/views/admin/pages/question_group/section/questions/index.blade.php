@extends('admin.app')
@section('content')
    <div class="content-i">
        <div class="content-box">
            <div class="element-wrapper">
                <h6 class="element-header">
                    Questions
                </h6>
                <div class="">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button aria-label="Close" class="close" data-dismiss="alert" type="button"><span
                                    aria-hidden="true"> ×</span></button>
                            {{session('success')}}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="">
                                <!--START - Projects list-->
                                <div class="projects-list">
                                    @foreach ($section->questions AS $question)
                                        <div class="project-box" style="display: none"
                                             id="question-form-{{$loop->iteration}}">
                                            <form method="post"
                                                  action="{{route('admin.question-group.section.questions.update',['question_group' => $question_group->id, 'section' => $section->id, 'question' => $question->id])}}">
                                                @method('put')
                                                @csrf
                                                <div style="position: absolute">
                                                    <span class="btn btn-primary">{{$loop->iteration}}</span>

                                                </div>
                                                <div class="project-head">
                                                <textarea name="question" class="form-control"
                                                          placeholder="Question here ...."
                                                          required>{{$question->question}}</textarea>
                                                </div>
                                                <div class="project-info">
                                                    @foreach ($question->answers AS $answer)
                                                        <div class="row align-items-center pb-2">
                                                            <div class="col-sm-1">
                                                            <span
                                                                class="btn btn-success text-capitalize">{{$answer->choice}}</span>
                                                                <br>
                                                                @if ($question_group->type == \App\Models\QuestionGroup::TYPE_NORMAL)
                                                                    <div class="form-check">
                                                                        <input class="form-check-input"
                                                                               value="{{$answer->choice}}"
                                                                               type="radio" name="value"
                                                                               id="answer-{{$question->id}}-{{$answer->id}}"
                                                                            {{$answer->value ? 'checked' : ''}}>
                                                                        <label class="form-check-label"
                                                                               for="answer-{{$question->id}}-{{$answer->id}}">
                                                                        </label>
                                                                    </div>
                                                                @elseif ($question_group->type == \App\Models\QuestionGroup::TYPE_MULTI_JAWABAN)
                                                                    <div class="form-check">
                                                                        <input class="form-check-input"
                                                                               value="{{$answer->choice}}"
                                                                               type="checkbox"
                                                                               name="value[{{$answer->id}}]"
                                                                               id="answer-{{$question->id}}-{{$answer->id}}"
                                                                            {{$answer->value ? 'checked' : ''}}
                                                                        >
                                                                        <label class="form-check-label"
                                                                               for="answer-{{$question->id}}-{{$answer->id}}">
                                                                        </label>
                                                                    </div>
                                                                @elseif ($question_group->type == \App\Models\QuestionGroup::TYPE_KEPRIBADIAN)
                                                                    <input style="padding: 0" type="number"
                                                                           value="{{$answer->value}}"
                                                                           name="value[{{$answer->choice}}]"
                                                                           class="form-control" required>
                                                                @endif
                                                            </div>
                                                            <div class="col-sm-11">
                                                        <textarea name="answer[{{$answer->id}}]" class="form-control"
                                                                  placeholder="Answer {{$answer->choice}}..."
                                                                  required>{{$answer->answer}}</textarea>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <button class="btn btn-dark"
                                                                    data-question="{{$loop->iteration}}">
                                                                Cancel
                                                            </button>
                                                            <button class="btn btn-primary float-sm-right"
                                                                    type="submit">
                                                                Update
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="project-box"
                                             id="question-{{$loop->iteration}}" {{$loop->first ? 'style=margin-top:0!important' : ''}}>
                                            <div class="project-head" style="padding-left: 5px!important;">
                                                <div class="col-sm-1">
                                                    <span class="btn btn-primary">{{$loop->iteration}}</span>
                                                </div>
                                                <div class="col-sm-11">
                                                    {!! $question->question  !!}
                                                </div>
                                            </div>
                                            <div class="project-info">
                                                @foreach ($question->answers AS $answer)
                                                    <div class="row align-items-center pb-2">
                                                        <div class="col-sm-1">
                                                            <span
                                                                class="btn btn-{{$answer->value ? 'success' : 'danger'}} text-capitalize">{{$answer->choice}}
                                                                @if ($question_group->type === \App\Models\QuestionGroup::TYPE_KEPRIBADIAN)
                                                                    ({{$answer->value}})
                                                                @endif
                                                            </span>
                                                        </div>
                                                        <div class="col-sm-11">
                                                            <div class="border p-2">
                                                                {!!$answer->answer!!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <button class="btn btn-primary float-sm-right"
                                                                data-question="{{$loop->iteration}}">
                                                            <span class="os-icon os-icon-edit"></span> Edit
                                                        </button>
                                                        <button class="btn btn-warning delete-question"
                                                                data-target="#delete-question-{{$question->id}}">
                                                            <i class="os-icon os-icon-trash"></i> Delete
                                                        </button>
                                                        <form action="{{route('admin.question-group.section.questions.delete',['question_group' => $question_group,'section' => $section, 'question' => $question])}}" method="post" id="delete-question-{{$question->id}}">
                                                            @method('delete')
                                                            @csrf
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    @if ($section->total_question_filled < $question_group->question_ammount_per_section)
                                        <hr>
                                        <div class="project-box">
                                            <form method="post" id="form-question"
                                                  action="{{route('admin.question-group.section.questions',['question_group' => $question_group->id, 'section' => $section->id])}}">
                                                @csrf
                                                <div class="project-head">
                                            <textarea name="question" class="form-control"
                                                      placeholder="Question here ...." required></textarea>
                                                </div>
                                                <div class="project-info">
                                                    @php($x = 1)
                                                    @for ($i = "a"; $i <= "e"; $i++)
                                                        <div class="row align-items-center pb-2">
                                                            <div class="col-sm-1">
                                                                <span
                                                                    class="btn btn-success text-capitalize">{{$i}}</span>
                                                                <br>
                                                                @if ($question_group->type == \App\Models\QuestionGroup::TYPE_NORMAL)
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" value="{{$i}}"
                                                                               type="radio" name="value"
                                                                               id="answer-{{$i}}"
                                                                               checked>
                                                                        <label class="form-check-label"
                                                                               for="answer-{{$i}}">
                                                                        </label>
                                                                    </div>
                                                                @elseif ($question_group->type == \App\Models\QuestionGroup::TYPE_MULTI_JAWABAN)
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" value="{{$i}}"
                                                                               type="checkbox" name="value[{{$x}}]"
                                                                               id="answer-{{$i}}">
                                                                        <label class="form-check-label"
                                                                               for="answer-{{$i}}">
                                                                        </label>
                                                                    </div>
                                                                @elseif ($question_group->type == \App\Models\QuestionGroup::TYPE_KEPRIBADIAN)
                                                                    <input style="padding: 0" type="number" value=""
                                                                           name="value[{{$i}}]" class="form-control"
                                                                           required>
                                                                @endif
                                                            </div>
                                                            <div class="col-sm-11">
                                                        <textarea name="answer[{{$x++}}]" class="form-control"
                                                                  placeholder="Answer {{$i}}..." required></textarea>
                                                            </div>
                                                        </div>
                                                    @endfor
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <button class="btn btn-primary float-sm-right"
                                                                    type="submit">
                                                                Save
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                                <!--END - Projects list-->
                            </div>
                        </div>
                        <div class="col-lg-5 b-l-lg">
                            <div class="">
                                <!--START - Projects Statistics-->
                                <div class="element-wrapper">
                                    <div class="element-box">
                                        <div class="padded">
                                            <div class="centered-header">
                                                <h6>
                                                    {{$question_group->name}}
                                                </h6>
                                            </div>
                                            <div class="row">
                                                <div class="col-6 b-r b-b">
                                                    <div class="el-tablo centered padded-v-big highlight bigger">
                                                        <div class="label">
                                                            Section
                                                        </div>
                                                        <div class="value">
                                                            {{$question_group->section_ammount}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6 b-b">
                                                    <div class="el-tablo centered padded-v-big highlight bigger">
                                                        <div class="label">
                                                            Question
                                                        </div>
                                                        <div class="value">
                                                            {{$question_group->total_question}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="padded m-b">
                                            <div class="centered-header">
                                                <h6>
                                                    Section : {{$section->section}}
                                                </h6>
                                            </div>
                                            <div class="centered-header">
                                                <h6>
                                                    Question / Section : {{$question_group->question_ammount_per_section}}
                                                </h6>
                                            </div>
                                            <div class="centered-header">
                                                <h6>
                                                    Type : {{$question_group->type}}
                                                </h6>
                                            </div>
                                            <div class="centered-header">
                                                <h6>
                                                    Duration / Section : {{$question_group->duration_per_section}}
                                                    Minutes
                                                </h6>
                                            </div>
                                            <hr>
                                            <div class="centered-header">
                                                <h6>
                                                    Question Filled
                                                </h6>
                                            </div>
                                            <div class="os-progress-bar primary">
                                                <div class="bar-labels">
                                                    <div class="bar-label-left">

                                                    </div>
                                                    <div class="bar-label-right">
                                                        <span
                                                            class="info">{{$section->total_question_filled}}/{{$question_group->question_ammount_per_section}}</span>
                                                    </div>
                                                </div>
                                                <div class="bar-level-1" style="width: 100%">
                                                    <div class="bar-level-2"
                                                         style="width: {{$section->total_question_filled ? $section->total_question_filled / $question_group->question_ammount_per_section * 100 : 0}}%">
                                                        {{--                                                            <div class="bar-level-3" style="width: 25%"></div>--}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="centered-header p-5">
                                                <a class="btn btn-primary form-control"
                                                   href="{{route('admin.question-group.section',$question_group)}}">
                                                    <h6>
                                                        Back
                                                    </h6>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--END - Projects Statistics-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('add-style')

@endpush
@push('add-script')
    <script src="https://cdn.tiny.cloud/1/g3wr134u3vszbcyiwp2yyk9wgbvuv4o98u2eds1jugoqna4e/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>
    <script>
        $(document).ready(function () {
            tinymce.init({
                selector: 'textarea',
                plugins: [
                    'image',
                ],
                menubar: '',  // skip file
                toolbar: 'image',
                toolbar_mode: 'floating',
                tinycomments_mode: 'embedded',
                tinycomments_author: 'SuperiorSulbar',
                width: "100%",
                setup: function (editor) {
                    editor.on('change', function () {
                        editor.save();
                    });
                },
                /* enable title field in the Image dialog*/
                image_title: true,
                /* enable automatic uploads of images represented by blob or data URIs*/
                automatic_uploads: true,
                /*
                  URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
                  images_upload_url: 'postAcceptor.php',
                  here we add custom filepicker only to Image dialog
                */
                file_picker_types: 'image',
                /* and here's our custom image picker*/
                file_picker_callback: function (cb, value, meta) {
                    var input = document.createElement('input');
                    input.setAttribute('type', 'file');
                    input.setAttribute('accept', 'image/*');

                    /*
                      Note: In modern browsers input[type="file"] is functional without
                      even adding it to the DOM, but that might not be the case in some older
                      or quirky browsers like IE, so you might want to add it to the DOM
                      just in case, and visually hide it. And do not forget do remove it
                      once you do not need it anymore.
                    */

                    input.onchange = function () {
                        var file = this.files[0];

                        var reader = new FileReader();
                        reader.onload = function () {
                            /*
                              Note: Now we need to register the blob in TinyMCEs image blob
                              registry. In the next release this part hopefully won't be
                              necessary, as we are looking to handle it internally.
                            */
                            var id = 'blobid' + (new Date()).getTime();
                            var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                            var base64 = reader.result.split(',')[1];
                            var blobInfo = blobCache.create(id, file, base64);
                            blobCache.add(blobInfo);

                            /* call the callback and populate the Title field with the file name */
                            cb(blobInfo.blobUri(), {title: file.name});
                        };
                        reader.readAsDataURL(file);
                    };

                    input.click();
                },
            });
            $.scrollTo($('#form-question'));
        });
        $('[data-question]').click(function (e) {
            e.preventDefault();
            var question = $(this).data('question');
            $('#question-form-' + question).toggle();
            $('#question-' + question).toggle();
        })
        $('.delete-question').click(function (e) {
            e.preventDefault();
            if (confirm('Delete Question ?')) {
                var target = $(this).data('target')
                $(target).submit();
            }
        })
        $('.redirect').click(function (e) {
            e.preventDefault();
            window.location = $(this).data('href');
        })
    </script>
@endpush

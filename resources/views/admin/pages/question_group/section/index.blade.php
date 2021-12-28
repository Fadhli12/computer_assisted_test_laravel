@extends('admin.app')
@section('content')
    <div class="content-i">
        <div class="content-box">
            <div class="element-wrapper">
                <h6 class="element-header">
                    Section
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
                                    @foreach ($question_group->sections AS $section)
                                        <div class="project-box">
                                            <div class="project-head">
                                                <div class="project-title">
                                                    <h5>
                                                        Section {{$section->section}}
                                                    </h5>
                                                </div>
                                                <div class="">
                                                    <div class="btn btn-success redirect"
                                                         data-href="{{route('admin.question-group.section.questions',['question_group' => $question_group->id, 'section' => $section->id])}}">
                                                        <i class="os-icon os-icon-plus"></i> Question
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="project-info">
                                                <div class="row align-items-center">
                                                    <div class="col-sm-5">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div class="el-tablo highlight">
                                                                    <div class="label">

                                                                    </div>
                                                                    <div class="value">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="el-tablo highlight">
                                                                    <div class="label">

                                                                    </div>
                                                                    <div class="value">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-5 offset-sm-2">
                                                        <div class="os-progress-bar primary">
                                                            <div class="bar-labels">
                                                                <div class="bar-label-left">
                                                                    <span>Question Filled</span>
                                                                </div>
                                                                <div class="bar-label-right">
                                                                    <span class="info">{{$section->total_question_filled}}/{{$question_group->question_ammount_per_section}}</span>
                                                                </div>
                                                            </div>
                                                            <div class="bar-level-1" style="width: 100%">
                                                                <div class="bar-level-2"
                                                                     style="width: {{$section->total_question_filled ? $section->total_question_filled / $question_group->question_ammount_per_section * 100 : 0}}%">
                                                                    {{--                                                                    <div class="bar-level-3" style="width: 36%"></div>--}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
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
                                                    Type : {{$question_group->type}}
                                                </h6>
                                            </div>
                                            <div class="centered-header">
                                                <h6>
                                                    Duration / Section : {{$question_group->duration_per_section}}
                                                    Minutes
                                                </h6>
                                            </div>
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
                                                            class="info">{{$question_group->total_question_filled}}/{{$question_group->total_question}}</span>
                                                    </div>
                                                </div>
                                                <div class="bar-level-1" style="width: 100%">
                                                    <div class="bar-level-2"
                                                         style="width: {{$question_group->total_question_filled ? $question_group->total_question_filled / $question_group->total_question * 100 : 0}}%">
                                                        {{--                                                            <div class="bar-level-3" style="width: 25%"></div>--}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="centered-header p-5">
                                                <a class="btn btn-primary form-control" href="{{route('admin.question-group')}}">
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
@push('add-script')
    <script>
        $('.delete').click(function (e) {
            e.preventDefault();
            if (confirm('Delete Question Group ?')) {
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

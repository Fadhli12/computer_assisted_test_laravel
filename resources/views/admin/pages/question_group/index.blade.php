@extends('admin.app')
@section('content')
    <div class="content-i">
        <div class="content-box">
            <div class="element-wrapper">
                <h6 class="element-header">
                    Question Group
                </h6>
                <div class="">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button aria-label="Close" class="close" data-dismiss="alert" type="button"><span
                                    aria-hidden="true"> ×</span></button>
                            {{session('success')}}
                        </div>
                    @endif
                    <div class="row pb-3">
                        <div class="col-lg-12 form-inline justify-content-lg-end">
                            <div class="">
                                <a href="{{route('admin.question-group.add')}}" class="btn btn-primary"><i
                                        class="os-icon os-icon-plus"></i> Question Group</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="">
                                <!--START - Projects list-->
                                <div class="projects-list">
                                    @foreach ($data AS $row)
                                        <div class="project-box">
                                            <div class="project-head">
                                                <div class="project-title">
                                                    <h5>
                                                        {{$row->name}}
                                                    </h5>
                                                </div>
                                                <div class="">
                                                    <div class="btn btn-dark redirect"
                                                         data-href="{{$row->section_url}}">
                                                        <span class="os-icon os-icon-list"></span> Section
                                                    </div>
                                                    <div class="btn btn-primary redirect"
                                                         data-href="{{$row->detail_url}}">
                                                        <span class="os-icon os-icon-edit"></span> Edit
                                                    </div>
                                                    <div class="btn btn-danger delete"
                                                         data-target="#delete-{{$row->id}}">
                                                        <span class="os-icon os-icon-trash"></span> Delete
                                                        <form id="delete-{{$row->id}}" action="{{$row->detail_url}}"
                                                              method="post">
                                                            @csrf
                                                            @method('delete')
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="project-info">
                                                <div class="row align-items-center">
                                                    <div class="col-sm-8">
                                                        <div class="row">
                                                            <div class="col-4">
                                                                <div class="el-tablo highlight">
                                                                    <div class="label">
                                                                        Type
                                                                    </div>
                                                                    <div class="value text-uppercase" style="font-size: large">
                                                                        {{$row->type_str}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="el-tablo highlight">
                                                                    <div class="label">
                                                                        Section
                                                                    </div>
                                                                    <div class="value">
                                                                        {{$row->section_ammount}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                <div class="el-tablo highlight">
                                                                    <div class="label">
                                                                        Question
                                                                    </div>
                                                                    <div class="value">
                                                                        {{$row->total_question}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="os-progress-bar primary">
                                                            <div class="bar-labels">
                                                                <div class="bar-label-left">
                                                                    <span>Question Filled</span>
                                                                </div>
                                                                <div class="bar-label-right">
                                                                    <span
                                                                        class="info">{{$row->total_question_filled}}/{{$row->total_question}}</span>
                                                                </div>
                                                            </div>
                                                            <div class="bar-level-1" style="width: 100%">
                                                                <div class="bar-level-2"
                                                                     style="width: {{$row->total_question_filled ? $row->total_question_filled / $row->total_question * 100 : 0}}%">
                                                                    {{--                                                                <div class="bar-level-3" style="width: 36%"></div>--}}
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

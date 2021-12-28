@extends('admin.app')
@section('content')
    <div class="element-wrapper">
        <h6 class="element-header">
            Create Question Group
        </h6>
        <div class="element-box">
            <form method="post" action="{{$question_group->id ? $question_group->detail_url : route('admin.question-group.add')}}">
                @if ($question_group->id)
                    @method('put')
                @endif
                @csrf
                <h5 class="form-header">
                    Question Group
                </h5>
                <div class="form-desc">
                    Add Group Question base on type, ammount section, duration, etc.
                </div>
                <div class="form-group">
                    <label for=""> Group Name</label>
                    <input class="form-control"
                           name="name"
                           placeholder="Enter Group Name"
                           value="{{$question_group->name ?? old('name')}}"
                           type="text" required/>
                    <div class="help-block form-text with-errors form-control-feedback">
                        <ul class="list-unstyled">
                            @foreach ($errors->get('name') AS $err)
                                <li>{{$err}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="form-group">
                    <label for=""> Type</label>
                    <select name="type" class="form-control" required>
                        @foreach ($types AS $key => $type)
                            <option value="{{$type}}" {{$question_group->type === $type ? 'selected' : (old('type') === $type ? 'selected' : '')}}>{{$key}}</option>
                        @endforeach
                    </select>
                    <div class="help-block form-text with-errors form-control-feedback">
                        <ul class="list-unstyled">
                            @foreach ($errors->get('type') AS $err)
                                <li>{{$err}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Section</label>
                    <select name="section_ammount" class="form-control" required>
                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{$i}}" {{$question_group->section_ammount === $i ? 'selected' : old('section_ammount') === $i ? 'selected' : ''}}>{{$i}} Section</option>
                        @endfor
                    </select>
                    <div class="help-block form-text with-errors form-control-feedback">
                        <ul class="list-unstyled">
                            @foreach ($errors->get('section_ammount') AS $err)
                                <li>{{$err}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Question Per Section</label>
                    <input name="question_ammount_per_section" value="{{$question_group->question_ammount_per_section ?? old('question_ammount_per_section')}}" placeholder="Example : 100" type="number" class="form-control" required>
                    <div class="help-block form-text with-errors form-control-feedback">
                        <ul class="list-unstyled">
                            @foreach ($errors->get('question_ammount_per_section') AS $err)
                                <li>{{$err}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Duration Per Section (minutes)</label>
                    <input name="duration_per_section" value="{{$question_group->duration_per_section ?? old('duration_per_section')}}" placeholder="Example : 60" type="number" class="form-control" required>
                    <div class="help-block form-text with-errors form-control-feedback">
                        <ul class="list-unstyled">
                            @foreach ($errors->get('duration_per_section') AS $err)
                                <li>{{$err}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="form-group">
                    <label class="">Skippable ?</label>
                    <div class="">
                        <div class="form-check">
                            <label class="form-check-label"><input {{$question_group->is_skippable ? 'checked' : ''}} class="form-check-input" name="is_skippable" type="radio" value="1">Yes</label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label"><input {{!$question_group->is_skippable ? 'checked' : ''}} class="form-check-input" name="is_skippable" type="radio" value="0">No</label>
                        </div>
                    </div>
                    <div class="help-block form-text with-errors form-control-feedback">
                        <ul class="list-unstyled">
                            @foreach ($errors->get('is_skippable') AS $err)
                                <li>{{$err}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="form-buttons-w">
                    <a href="{{route('admin.question-group')}}" class="btn btn-dark">Kembali</a>
                    <button class="btn btn-primary" type="submit"> Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection

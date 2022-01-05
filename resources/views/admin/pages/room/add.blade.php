@extends('admin.app')
@section('content')
    <div class="element-wrapper">
        <h6 class="element-header">
            Create Room
        </h6>
        <div class="element-box">
            <form method="post" action="{{$room->id ? $room->detail_url : route('admin.room.add')}}">
                @if ($room->id)
                    @method('put')
                @endif
                @csrf
                <h5 class="form-header">
                    Room
                </h5>
                <div class="form-desc">
                </div>
                <div class="form-group">
                    <label for=""> Room Name</label>
                    <input class="form-control"
                           name="name"
                           placeholder="Enter Room Name"
                           value="{{$room->name ?? old('name')}}"
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
                    <label for=""> Question Group</label>
                    <select id="question_group" class="form-control">
                        <option value="">-- Question Group --</option>
                        @foreach ($question_group AS $group)
                            <option
                                data-id="{{$group->id}}"
                                data-name="{{$group->name}}"
                                data-type="{{$group->type}}"
                                data-section="{{$group->section_ammount}}"
                                data-total="{{$group->total_question}}"
                                data-duration="{{$group->section_ammount * $group->duration_per_section}}"
                                value="{{$group->id}}">{{$group->name}} | type :{{$group->type}} | section
                                : {{$group->section_ammount}} | total question : {{$group->total_question}} | total
                                duration : {{$group->section_ammount * $group->duration_per_section}} </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-inline justify-content-sm-end">
                    <a href="" class="btn btn-success" id="add_group">Add Group</a>
                </div>
                <div class="form-group pt-2">
                    <div style="display: none" id="group_container">
                        @foreach ($room->questionGroups AS $group)
                            <input value="{{$group->id}}" name="question_group[]">
                        @endforeach
                    </div>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Question Group</th>
                            <th>Type</th>
                            <th>Total Section</th>
                            <th>Total Question</th>
                            <th>Total Duration (Minute)</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody id="group_table">
                        @foreach ($room->questionGroups AS $group)
                            <tr id="row-{{$group->id}}">
                                <td>{{$group->name}}</td>
                                <td>{{$group->type}}</td>
                                <td>{{$group->section_ammount}}</td>
                                <td>{{$group->total_question}}</td>
                                <td>{{$group->section_ammount * $group->duration_per_section}}</td>
                                <td><a href="#" class="btn btn-danger delete-group" data-id="{{$group->id}}"><span
                                            class="os-icon os-icon-trash-2"></span></a></td>
                            </tr>
                        @endforeach
                        <tr class="empty">
                            <td colspan="6" class="text-center">No Group Added</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="form-group">
                    <label class="">Is Active ?</label>
                    <div class="">
                        <div class="form-check">
                            <label class="form-check-label"><input
                                    {{$room->is_active ? 'checked' : ''}} class="form-check-input" name="is_active"
                                    type="radio" value="1">Yes</label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label"><input
                                    {{!$room->is_active ? 'checked' : ''}} class="form-check-input" name="is_active"
                                    type="radio" value="0">No</label>
                        </div>
                    </div>
                    <div class="help-block form-text with-errors form-control-feedback">
                        <ul class="list-unstyled">
                            @foreach ($errors->get('is_active') AS $err)
                                <li>{{$err}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="form-buttons-w">
                    <a href="{{route('admin.room')}}" class="btn btn-dark">Back</a>
                    <button class="btn btn-primary" type="submit" disabled> Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('add-script')
    <script>
        $(document).ready(function () {
            var group_exist = {{optional($room->questionGroups)->count() ? $room->questionGroups->pluck('id') : "[]"}};
            @if (optional($room->questionGroups)->count())
            $('[type=submit]').prop('disabled', false);
            $('.empty').hide()
            @endif
            $('#add_group').click(function (e) {
                e.preventDefault();
                var group = parseInt($('#question_group').val());
                if (group) {
                    var group_data = $('option[value=' + group + ']').data();
                    if (!group_exist.includes(group)) {
                        group_exist.push(group);
                        var input = '<input name="question_group[]" value="' + group + '">'
                        var row = '<tr id="row-' + group_data.id + '">' +
                            '<td>' + group_data.name + '</td>' +
                            '<td>' + group_data.type + '</td>' +
                            '<td>' + group_data.section + '</td>' +
                            '<td>' + group_data.total + '</td>' +
                            '<td>' + group_data.duration + '</td>' +
                            '<td><a href="#" class="btn btn-danger delete-group" data-id="' + group_data.id + '"><span class="os-icon os-icon-trash-2"></span></a></td>' +
                            '</tr>'
                        $('#group_container').append(input)
                        $('#group_table').append(row)
                        $('[type=submit]').prop('disabled', false);
                        $('.empty').hide()
                    }
                }
            })
            $('body').on('click', '.delete-group', function (e) {
                e.preventDefault();
                var group = $(this).data('id');
                $('tr#row-' + group).remove();
                $('[name="question_group[]"][value=' + group + ']').remove();
                group_exist = group_exist.filter(function (value) {
                    return value != group;
                });
                if (!group_exist.length) {
                    $('.empty').show();
                    $('[type=submit]').prop('disabled', true);
                }
            })
        })
    </script>
@endpush

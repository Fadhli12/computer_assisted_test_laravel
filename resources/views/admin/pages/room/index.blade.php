@extends('admin.app')
@section('content')
    <div class="element-wrapper">
        <h6 class="element-header">
            Room
        </h6>
        <div class="element-box">
            <h5 class="form-header">
                Room
            </h5>
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
                            <a class="btn btn-sm btn-primary" href="{{route('admin.room.add')}}"><span
                                    class="os-icon os-icon-plus"></span> Room</a>

                        </div>
                    </div>
                </div>
            </div>
            <!--------------------
            START - Controls Above Table
            -------------------->
            <div class="controls-above-table">
                {{--                <div class="row">--}}
                {{--                    <div class="col-sm-6">--}}
                {{--                        <a class="btn btn-sm btn-secondary" href="#">Download CSV</a>--}}
                {{--                        <a class="btn btn-sm btn-secondary" href="#">Archive</a>--}}
                {{--                        <a class="btn btn-sm btn-danger" href="#">Delete</a>--}}
                {{--                    </div>--}}
                {{--                    <div class="col-sm-6">--}}
                {{--                        <form class="form-inline justify-content-sm-end">--}}
                {{--                            <input class="form-control form-control-sm rounded bright"--}}
                {{--                                   placeholder="Search" type="text"/><select--}}
                {{--                                class="form-control form-control-sm rounded bright">--}}
                {{--                                <option selected="selected" value="">--}}
                {{--                                    Select Status--}}
                {{--                                </option>--}}
                {{--                                <option value="Pending">--}}
                {{--                                    Pending--}}
                {{--                                </option>--}}
                {{--                                <option value="Active">--}}
                {{--                                    Active--}}
                {{--                                </option>--}}
                {{--                                <option value="Cancelled">--}}
                {{--                                    Cancelled--}}
                {{--                                </option>--}}
                {{--                            </select>--}}
                {{--                        </form>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>
            <!--------------------
            END - Controls Above Table
            -------------------->
            <div class="table-responsive">
                <!--------------------
                START - Basic Table
                -------------------->
                <table class="table table-lightborder">
                    <thead>
                    <tr>
                        <th>
                            Name
                        </th>
                        <th>
                            Question Group
                        </th>
                        <th class="text-center">
                            Status
                        </th>
                        <th class="text-right">

                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($rooms AS $room)
                        <tr>
                            <td>{{$room->name}}</td>
                            <td>
                                <ul>
                                    @foreach($room->questionGroups AS $group)
                                        <li>{{$group->name}} | type :{{$group->type}} | section
                                            : {{$group->section_ammount}} | total question : {{$group->total_question}}
                                            | total duration
                                            : {{$group->section_ammount * $group->duration_per_section}}</li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                {{$room->is_active ? 'Active' : 'Not-Active'}}
                            </td>
                            <td>
                                <a href="{{$room->detail_url}}" class="btn btn-primary"><span
                                        class="os-icon os-icon-edit"></span> Edit</a>
                                <a href="" class="btn btn-danger delete" data-target="#delete-{{$room->id}}">
                                    <span class="os-icon os-icon-trash"></span> Delete</a>
                                <form id="delete-{{$room->id}}" action="{{$room->detail_url}}"
                                      method="post">
                                    @csrf
                                    @method('delete')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <!--------------------
                END - Basic Table
                -------------------->
            </div>
        </div>
    </div>
@endsection
@push('add-script')
    <script>
        $('.delete').click(function (e) {
            e.preventDefault();
            if (confirm('Delete Room ?')) {
                var target = $(this).data('target')
                $(target).submit();
            }
        })
    </script>
@endpush

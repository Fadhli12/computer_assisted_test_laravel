@extends('admin.app')
@section('content')
    <div class="element-wrapper">
        <h6 class="element-header">
            Create Access Room
        </h6>
        <div class="element-box">
            <form method="post" action="{{$access_room->id ? $access_room->detail_url : route('admin.access-room.add')}}">
                @if ($access_room->id)
                    @method('put')
                @endif
                @csrf
                <h5 class="form-header">
                    Access Room
                </h5>
                <div class="form-desc">
                </div>
                <div class="form-group">
                    <label for="">Room</label>
                    <select name="room_id" class="form-control" required>
                        <option value="">-- Room --</option>
                        @foreach ($rooms AS $room)
                            <option
                                value="{{$room->id}}" {{$access_room->room_id == $room->id ? 'selected' : (old('room_id') == $room->id ? 'selected' : '')}}>
                                {{$room->name}}
                            </option>
                        @endforeach
                    </select>
                    <div class="help-block form-text with-errors form-control-feedback">
                        <ul class="list-unstyled">
                            @foreach ($errors->get('room_id') AS $err)
                                <li>{{$err}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Key</label>
                    <input class="form-control"
                           name="key"
                           placeholder="Enter Access Room Key"
                           value="{{$access_room->key ?? old('key')}}"
                           type="text" required/>
                    <div class="help-block form-text with-errors form-control-feedback">
                        <ul class="list-unstyled">
                            @foreach ($errors->get('key') AS $err)
                                <li>{{$err}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Type</label>
                    <select name="type" class="form-control" required>
                        <option value="">-- Type --</option>
                        @foreach($type_access_room AS $key => $type)
                            <option
                                value="{{$type}}" {{$access_room->type === $type ? 'selected' : (old('type') === $type ? 'selected' : '')}}>{{$key}}</option>
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
                    <label for="">Limit Access</label>
                    <input class="form-control"
                           name="limit_access"
                           placeholder="Enter Limit Access, ex : 10"
                           value="{{$access_room->limit_access ?? old('limit_access')}}"
                           type="number" required/>
                    <div class="help-block form-text with-errors form-control-feedback">
                        <ul class="list-unstyled">
                            @foreach ($errors->get('limit_access') AS $err)
                                <li>{{$err}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Valid Until</label>
                    <input class="form-control"
                           name="valid_until"
                           placeholder="Enter Valid Until"
                           value="{{optional($access_room->valid_until)->format('Y-m-d\TH:i:s') ?? old('valid_until')}}"
                           type="datetime-local" required/>
                    <div class="help-block form-text with-errors form-control-feedback">
                        <ul class="list-unstyled">
                            @foreach ($errors->get('valid_until') AS $err)
                                <li>{{$err}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Access Counter</label>
                    <input class="form-control"
                           placeholder=""
                           value="{{$access_room->access_counter ?? 0}}"
                           type="number" readonly/>
                </div>
                <div class="form-group">
                    <label class="">Is Active ?</label>
                    <div class="">
                        <div class="form-check">
                            <label class="form-check-label"><input
                                    {{$access_room->is_active ? 'checked' : ''}} class="form-check-input"
                                    name="is_active"
                                    type="radio" value="1">Yes</label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label"><input
                                    {{!$access_room->is_active ? 'checked' : ''}} class="form-check-input"
                                    name="is_active"
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
                    <a href="{{route('admin.access-room')}}" class="btn btn-dark">Back</a>
                    <button class="btn btn-primary" type="submit"> Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('add-script')
    <script>
        $(document).ready(function () {
        })
    </script>
@endpush

@extends('admin.app')
@section('content')
    <div class="element-wrapper">
        <h6 class="element-header">
            User Profile
        </h6>
        <div class="element-box">
            <form method="post" action="{{route('admin.profile')}}">
                @method('put')
                @csrf
                <h5 class="form-header">
                    Profile
                </h5>
                <div class="form-desc">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button aria-label="Close" class="close" data-dismiss="alert" type="button"><span
                                    aria-hidden="true"> ×</span></button>
                            {{session('success')}}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for=""> Name</label>
                    <input class="form-control"
                           name="name"
                           placeholder="Enter Room Name"
                           value="{{$user->name ?? old('name')}}"
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
                    <label for=""> Email</label>
                    <input class="form-control"
                           name="email"
                           placeholder="Enter Room Name"
                           value="{{$user->email ?? old('email')}}"
                           type="email" readonly/>
                    <div class="help-block form-text with-errors form-control-feedback">
                        <ul class="list-unstyled">
                            @foreach ($errors->get('email') AS $err)
                                <li>{{$err}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="form-group">
                    <label for=""> Old Password</label>
                    <input class="form-control"
                           name="old_password"
                           placeholder="Enter Old Password"
                           value=""
                           type="password" />
                    <div class="help-block form-text with-errors form-control-feedback">
                        <ul class="list-unstyled">
                            @foreach ($errors->get('old_password') AS $err)
                                <li>{{$err}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="form-group">
                    <label for=""> New Password</label>
                    <input class="form-control"
                           name="password"
                           placeholder="Enter New Password"
                           value=""
                           type="password" />
                    <div class="help-block form-text with-errors form-control-feedback">
                        <ul class="list-unstyled">
                            @foreach ($errors->get('password') AS $err)
                                <li>{{$err}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="form-group">
                    <label for=""> Confirmation Password</label>
                    <input class="form-control"
                           name="password_confirmation"
                           placeholder="Enter Confirmation Password"
                           value=""
                           type="password" />
                    <div class="help-block form-text with-errors form-control-feedback">
                        <ul class="list-unstyled">
                            @foreach ($errors->get('password_confirmation') AS $err)
                                <li>{{$err}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="form-buttons-w">
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

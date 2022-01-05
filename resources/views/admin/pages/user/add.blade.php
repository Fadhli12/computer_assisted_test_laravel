@extends('admin.app')
@section('content')
    <div class="element-wrapper">
        <h6 class="element-header">
            Create User Admin
        </h6>
        <div class="element-box">
            <form method="post" action="{{$user->id ? $user->detail_url : route('admin.user.add')}}">
                @if ($user->id)
                    @method('put')
                @endif
                @csrf
                <h5 class="form-header">
                    User Admin
                </h5>
                <div class="form-desc">
                </div>
                <div class="form-group">
                    <label for="">Name</label>
                    <input class="form-control"
                           name="name"
                           placeholder="Enter Name"
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
                    <label for="">Email</label>
                    <input class="form-control"
                           name="email"
                           placeholder="Enter Email"
                           value="{{$user->email ?? old('email')}}"
                           type="email" required/>
                    <div class="help-block form-text with-errors form-control-feedback">
                        <ul class="list-unstyled">
                            @foreach ($errors->get('email') AS $err)
                                <li>{{$err}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input class="form-control"
                           name="password"
                           placeholder="Enter Password"
                           value=""
                           type="password" {{$user->id ? '' : 'required'}}/>
                    <div class="help-block form-text with-errors form-control-feedback">
                        <ul class="list-unstyled">
                            @foreach ($errors->get('password') AS $err)
                                <li>{{$err}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Password Confirmation</label>
                    <input class="form-control"
                           name="password_confirmation"
                           placeholder="Enter Password"
                           value=""
                           type="password" {{$user->id ? '' : 'required'}}/>
                    <div class="help-block form-text with-errors form-control-feedback">
                        <ul class="list-unstyled">
                            @foreach ($errors->get('password_confirmation') AS $err)
                                <li>{{$err}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="form-buttons-w">
                    <a href="{{route('admin.user')}}" class="btn btn-dark">Back</a>
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

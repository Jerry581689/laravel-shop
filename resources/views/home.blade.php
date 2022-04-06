@extends('layouts.app')

@section('content')
<div class="card-body">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">個人資料</div>
                <form>
                    <div class="mb-3">
                        <label for="InputEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$user->email}}" readonly="readonly">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">名字</label>
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="{{$user->name}}" name="name" value="{{$user->name}}" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">電話</label>
                        <input type="text" id="disabledTextInput" class="form-control" placeholder="{{$user->phone}}" name="phone" value="{{$user->phone}}" required>
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button type="submit" class="btn btn-outline-info editpersonbtn  btn-block" text-right>修改</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
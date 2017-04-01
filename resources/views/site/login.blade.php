@extends('layouts.layout')
@section('title','Login')
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form action="{{route('post.login')}}" method="post" class="form-group">
                {{csrf_field()}}


                <div class="form-group">
                    <label for="inputEmail" class="sr-only"> Email: </label>
                    <input type="EMAIL" name="email" class="form-control" placeholder="Email address" id="inputEmail" required>
                </div>

                <div class="form-group">
                    <label for="inputPassword" class="sr-only"> Password: </label>
                    <input type="password" name="password" class="form-control" placeholder="your Password" id="inputPassword" required>
                </div>

                <div class="form-group">

                    <input type="submit" class="btn  btn-primary"  value="Login">

                </div>
            </form>

        </div>
    </div>
    @endsection
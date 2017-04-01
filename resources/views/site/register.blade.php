@extends('layouts.layout')
@section('title','Register')
@section('content')
    <div class="row">
        <form action="{{route('post.register')}}" method="post" class="form-group">
            {{csrf_field()}}
            <div class="col-md-6 form-group">
                <div class="form-group">
                    <label for="inputfirst_name">First Name: </label>
                    <input type="text" class="form-control" name="first_name" id="inputfirst_name" required>
                </div>
                <div class="form-group">
                    <label for="inputlast_name">Last Name: </label>
                    <input type="text" class="form-control" name="last_name" id="inputlast_name" required>
                </div>
                <div class="form-group">
                    <label for="inputEmail">Email : </label>
                    <input type="Email" class="form-control" name="email" id="inputEmail" required>
                </div>
                <div class="form-group">
                    <label for="inputPassword">Password : </label>
                    <input type="password" class="form-control" name="password" id="inputPassword" required>
                </div>
                <div class="form-group">
                    <label for="inputRepassword">Confirm Password: </label>
                    <input type="password" class="form-control" name="repassword" id="inputRepassword" required>
                </div>
                <div class="form-group">
                    <label for="inputSex">Sex: </label>
                    <input type="number" class="form-control" name="sex" id="inputsex" required>
                </div>
            </div>
            <div class="col-md-6 form-group">
                <div class="form-group">
                    <label for="inputPhone">Your Phone: </label>
                    <input type="number" class="form-control" name="phone" id="inputphone" required>
                </div>
                <div class="form-group">
                    <label for="inputBirthday">Birthday : </label>
                    <input type="date" class="form-control" name="birthday" id="inputbirthday" required>
                </div>

                <div class="form-group">
                    <label for="inputAddress">Address: </label>
                    <input type="text" class="form-control" name="address" id="inputAddress" required>
                </div>
                <div class="form-group">
                    <label for="inputCompany">Company: </label>
                    <input type="text" class="form-control" name="company" id="inputCompany" required>
                </div>
                <div class="form-group">
                    <label for="inputRelationships">Relationships: </label>
                    <input type="number" class="form-control" name="relationships" id="inputRelationships" required>
                </div>
                <div class="form-group">
                    <label for="inputPhoneParent">Phone Parent: </label>
                    <input type="number" class="form-control" name="phone_parent" id="inputPhoneParent" required>
                </div>
                <div class="form-group">
                    <label for="inputDescription">Description: </label>
                    <textarea class="form-control" name="description" id="inputDescription" required></textarea>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <input type="submit" class="btn btn-success" value="Register">
            </div>
            <hr>


        </form>
    </div>

    @endsection
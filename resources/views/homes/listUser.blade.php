@extends('layouts.layout')
@section('title','List User')
@section('content')
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>first_name</th>
                    <th>last_name</th>
                    <th>email</th>
                    <th>sex</th>
                    <th>phone</th>
                    <th>birthday</th>
                    <th>description</th>
                    <th>address</th>
                    <th>company</th>
                    <th>relationships</th>
                    <th>Phone_parent</th>
                </tr>
            </thead>
            <tbody>
            @foreach($listUser as $item )
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->first_name}}</td>
                    <td>{{$item->last_name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->sex}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->birthday}}</td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->address}}</td>
                    <td>{{$item->company}}</td>
                    <td>{{$item->relationships}}</td>
                    <td>{{$item->phone_parent}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @endsection
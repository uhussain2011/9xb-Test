

@extends('layout.layout')

@section('content')


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::has('Message'))
    <div class="alert alert-danger">
       <p> {{ Session::get('Message') }}</p>
    </div>
@endif

<form action="{{route('people.store')}}" method="post">
    {{csrf_field()}}
    <table>
        <tr>
            <th>#</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Email Address</th>
            <th>Job Role</th>
            <th>Delete</th>
        </tr>
        @foreach ($people as $id => $values)
            <tr>
                <td>{{$loop->iteration}}<input type="hidden" name="{{'people['.$id.'][id]'}}"  value="{{$values->id}}" /></td>
                <td><input type="text" name="{{'people['.$id.'][firstname]'}}"  value="{{$values->firstname}}" /></td>
                <td><input type="text" name="{{'people['.$id.'][lastname]'}}"  value="{{$values->lastname}}" /></td>
                <td><input type="text" name="{{'people['.$id.'][email]'}}"  value="{{$values->email}}" /></td>
                <td><input type="text" name="{{'people['.$id.'][job_role]'}}"  value="{{$values->role}}" /></td>
                <td><input  type="checkbox" name="{{'delete['.$id.']'}}" value="{{$values->id}}" /></td>
            </tr>
        @endforeach
        <tr>
        <tr>
            <td/>
            <td><input type="text" name="firstname" placeholder="Add new..." value="{{old('firstname')}}" /></td>
            <td><input type="text" name="lastname" placeholder="Add new..." value="{{old('lastname')}}" /></td>
            <td><input type="text" name="email" placeholder="Add new..." value="{{old('email')}}" /></td>
            <td><input type="text" name="job_role" placeholder="Add new..." value="{{old('job_role')}}" /></td>
        </tr>
    </table>
    <input type="submit" value="Submit!" />
</form>

@endsection

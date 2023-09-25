@extends('admin.admin')
@section('title','View Data')
@section('main-content')
<div class="form-container">
    <div class="table-wrapper">
        <table class="table"> 
            <tr>
                <th>Sr.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Class</th>
                <th>Image</th>
                <th>View Details</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            @php
                $counter = 1;   
            @endphp
            @foreach ($students as $student)
                <tr>
                    <td>{{$counter++}}</td>
                    <td>{{$student->Name}}</td>
                    <td>{{$student->Email}}</td>
                    <td>{{$student->Class}}</td>
                    <td><a href="{{ asset('storage/'.$student->Img_Path) }}" target="_blank"> <img class="img" src="{{ asset('storage/'.$student->Img_Path) }}" ></a></td>
                    <td><a href="/view-student/{{$student->id}}">View</a></td>
                    <td><a href="/update-student/{{$student->id}}"><i class="fas fa-pencil-alt"></i> Update </a></td>
                    <td><a onclick="return confirm('Are you sure you want to delete?') " href="/delete-student/{{$student->id}}"><i class="fas fa-trash"></i> Delete</a></td>
                <tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
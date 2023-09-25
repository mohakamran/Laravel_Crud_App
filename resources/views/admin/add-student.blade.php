@extends('admin.admin')
@php
    $title = $page_title
@endphp
@section('title',$title)
@section('main-content')
<div class="form-container">
    
    <form action="{{$url}}" method="POST" enctype="multipart/form-data">
        @csrf 
        <div class="form-lable">
            <label>Student Name</label>
            <input type="text"  value="{{ isset($student->Name) ? $student->Name : old('stu_name') }}" name="student_name" placeholder="Enter Full Name" >
            @error('student_name')
                <span class="red">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-lable">
            <label>Student Email</label>
            <input type="email" value="{{ isset($student->Email) ? $student->Email : old('stu_email') }}"  name="student_email" placeholder="Enter Full Name" >     
              @error('student_email')
                <span class="red">{{ $message }}</span>
              @enderror
        </div>
        <div class="form-lable">
            <label>Address</label>
            <input type="text" value="{{ isset($student->Address) ? $student->Address : old('stu_address') }}"  name="student_address" placeholder="Enter address" >
            @error('student_address')
                <span class="red">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-lable">
            <label>Select Class:</label>
            <select class="" name="student_class" >
                <option value="9" {{ ( isset($student->Class) && ($student->Class) == "9") ? "selected" : ""}}>9</option>
                <option value="10" {{ ( isset($student->Class) && ($student->Class) == "10") ? "selected" : ""}}>10</option>
                <option value="11" {{ ( isset($student->Class) && ($student->Class) == "11") ? "selected" : ""}}>11</option>
                <option value="12" {{ ( isset($student->Class) && ($student->Class) == "12") ? "selected" : ""}}>12</option>
            </select>
        </div>
        <div class="form-lable">
            <label>Student Picture</label>
            <input type="file" name="student_picture" >
        </div>
        <input type="submit" value="{{$btn_title}}" class="login">
    </form>
</div>
@endsection
@extends('contacts.layout')
@section('content')


<div class="card">
    <div class="card-header">Contactus Page</div>
    <div class="card-body">


        <div class="card-body">
            <h5 class="card-title">Name : {{ $contacts->book_name }}</h5>
            <p class="card-text">image : <img src="{{asset('uploads/contacts/' .$contacts->image_file )}}" alt="" width="100" height="100"srcset=""></p>
            <p class="card-text">Borrow Date : {{ $contacts->borrow_date }}</p>
            <p class="card-text">Return Date : {{ $contacts->return_date }}</p>
            <p class="card-text">Student Name : {{ $contacts->student_name }}</p>
            <p class="card-text">Member Type : {{ $contacts->member_type }}</p>
            <p class="card-text">Description : {{ $contacts->description }}</p>
            <p class="card-text">Academic class : {{ $contacts->academic_class }}</p>
        </div>

        </hr>

    </div>
</div>
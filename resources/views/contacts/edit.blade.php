@extends('contacts.layout')
@section('content')

<div class="card">
    
    

      
        <div class="container my-4">


            <h2 class="my-3">Update A Book Information</h2>
            <form action="{{ url('/contact/update/' .$contacts->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="id" value="{{$contacts->id}}" id="id" />
                
                <div class="form-group">
                    <label for="book_name">Book Name</label>
                    <input type="text" class="form-control" id="book_name" value="{{$contacts->book_name}}" name="book_name" 
                        required>
                </div>
    
                <div class="form-group">
                    <label for="image_file">Book Image</label>
                    <input type="file" class="form-control"  name="image_file"  required>
                    <img src="{{asset('uploads/contacts/' .$contacts->image_file )}}" alt="" width="100" height="100"srcset="">
                </div>
                <div class="form-group">
                    <label for="borrow_date">Borrow Date</label>
                    <input type="date" class="form-control" id="borrow_date" name="borrow_date" value="{{$contacts->borrow_date}}" aria-describedby="emailHelp"
                        required>
                </div>
                <div class="form-group">
                    <label for="return_date">Return-date</label>
                    <input type="date" class="form-control" id="return_date" name="return_date" value="{{$contacts->return_date}}" aria-describedby="emailHelp"
                        required>
                </div>
                <div class="form-group">
                    <label for="student_name">Student Name</label>
                    <input type="text" class="form-control" id="student_name" name="student_name" value="{{$contacts->student_name}}"
                        aria-describedby="emailHelp" required>
                </div>
    
                <div class="form-group">
                    <label for="student_name">Member Type</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="member_type" id="member_type" value="{{$contacts->member_type}}"
                            required>
                        <label class="form-check-label" for="member_type">
                            Monthly
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="member_type" id="member_type" value="{{$contacts->member_type}}"
                            checked required>
                        <label class="form-check-label" for="member_type">
                            Yearly
                        </label>
                    </div>
                </div>
    
    
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" value="{{$contacts->description}}" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <select class="form-select" name="academic_class" value="{{$contacts->academic_class}}" aria-label="Default select example" required>
                        <option selected>academic class</option>
                        <option value="5">Class 5</option>
                        <option value="6">class 6</option>
                        <option value="7">class 7</option>
                        <option value="8">class 8</option>
                        <option value="9">class 9</option>
                        <option value="10">class 10</option>
                        <option value="11">class 11</option>
                        <option value="12">class 12</option>
                    </select>
                </div>
                <button type="submit" name="submit" class="btn btn-primary my-3">Update Book Record</button>
            </form>
        </div>

    
</div>

@stop
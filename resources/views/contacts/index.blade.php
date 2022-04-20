@extends('contacts.layout')
@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-9 col-lg-12">
            <div class="card">
                <div class="card-header">Book Information</div>
                <div class="card-body">
                    <a href="{{ url('/contact/create') }}" class="btn btn-success btn-sm" title="Add New Contact">
                        <i class="fa fa-plus" aria-hidden="true"></i> Add New
                    </a>
                    <br />
                    <br />
                    <form action="" class="col-4" method="GET">
                     
                        .<div class="form-group">
                          
                          <input type="search" name="search" id="" value="{{$search}}" class="form-control" placeholder="Search" >
                         
                         
                        </div>
                        <button class="btn btn-primary">Search</button>
                        <a href="{{url('/contact')}}" class="btn btn-primary">Reset</a>
                    </form>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">S.No</th>
                                <th scope="col">Book Name</th>
                                <th scope="col">Book Image</th>
                                <th scope="col">Borrow Date</th>
                                <th scope="col">Return Date</th>
                                <th scope="col">Student Name</th>
                                <th scope="col">Member Type</th>
                                <th scope="col">Decscription</th>
                                <th scope="col">Academic Class</th>
                                <th scope="col">Action</th>
                                    {{-- <th>#</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Telephone</th>
                                    <th>Actions</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contacts as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->book_name }}</td>
                                    <td><img src="{{asset('uploads/contacts/' .$item->image_file )}}" alt="" width="100" height="100"srcset=""></td>
                                    <td>{{ $item->borrow_date }}</td>
                                    <td>{{ $item->return_date }}</td>
                                    <td>{{ $item->student_name }}</td>
                                    <td>{{ $item->member_type }}</td>
                                    <td>{{ $item->description }}</td>
                                    
                                    <td>{{ $item->academic_class }}</td>

                                    <td>
                                        <a href="{{ url('/contact/show/' . $item->id) }}" title="View Student"><button
                                                class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>
                                                View</button></a>
                                        <a href="{{ url('/contact/edit/' . $item->id) }}"
                                            title="Edit Student"><button class="btn btn-primary btn-sm"><i
                                                    class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                Edit</button></a>

                                        <form method="POST" action="{{ url('/contact/destroy' . '/' . $item->id) }}"
                                            accept-charset="UTF-8" style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Contact"
                                                onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                                    class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$contacts->links()}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
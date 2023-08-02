@extends('dashboard')
@section('content')

<a href="{{route('contacts.create')}}" class="btn btn-primary">Create Contact</a>
@if($contacts->isNotEmpty())

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">address</th>
      <th scope="col">city</th>
      <th scope="col">mobile</th>
      <th scope="col">email</th>
      <th scope="col">dateofbirth</th>
      <th scope="col">gender</th>
      <th scope="col">maritalstatus</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach ($contacts as $contact)
  <tr>
      <th scope="row">{{$contact->id}}</th>
      @if(isset($contact->image_path))
      <td><img src=" {{asset('storage/'.$contact->image_path)}}" style="width:50px;height:50px"></td>
      @else
      <td><img src=" {{asset('assets/'.'placeholder.jpg')}}" style="width:50px;height:50px"></td>
    @endif
      <td>{{$contact->getFullNameAttribute()}}</td>
      <td>{{$contact->address}}</td>
      <td>{{$contact->city}}</td>
      <td>{{$contact->mobile}}</td>
      <td>{{$contact->email}}</td>
      <td>{{$contact->dateofbirth}}</td>
      <td>{{$contact->getGender()}}</td>
      <td>{{$contact->getMaritalStatus()}}</td>
      <td> <a href="{{route('contacts.edit',$contact->id)}}" class="btn btn-dark">Edit</a></td>
      <td>  <form action="{{route('contacts.destroy',$contact->id)}}" method="post">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger">Delete</button></td>
    </tr>

  @endforeach

    
  </tbody>
</table>
@else
<h1>No data yet</h1>
@endif

@endsection
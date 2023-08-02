 <div class="container">
  <h1>{{$title}}</h1>
<form class="row g-3" action="{{$route}}" enctype='multipart/form-data' method='post'>
@csrf
@if($type==2)
@method('put')
@endif
<div class="col-12">
    <label for="firstname" class="form-label">Firstname:</label>
   
    <input type="text" @class(['form-control','is-invalid'=>$errors->has('firstname')]) value="{{ old('firstname', isset($contact) ? $contact->firstname : '') }}" id="firstname" name="firstname">
</div>
@error('firstname')
<div class="text-danger">{{$message}}</div>
@enderror
<div class="col-12">
    <label for="middle" class="form-label">Middle:</label>
    <input type="text" @class(['form-control','is-invalid'=>$errors->has('middle')]) id="middle" name="middle" value="{{ old('middle', isset($contact) ? $contact->middle : '') }}" >
</div>
@error('middle')
<div class="text-danger">{{$message}}</div>
@enderror
  <div class="col-12">
    <label for="lastname" class="form-label">Lastname:</label>
    <input type="text" @class(['form-control','is-invalid'=>$errors->has('lastname')]) id="lastname" name="lastname" value="{{ old('lastname', isset($contact) ? $contact->lastname : '') }}">
  </div>
  @error('lastname')
<div class="text-danger">{{$message}}</div>
@enderror
  <div class="col-12">
    <label for="address" class="form-label">Address:</label>
    <input type="text" @class(['form-control','is-invalid'=>$errors->has('address')]) id="address" name="address" value="{{ old('address', isset($contact) ? $contact->address : '') }}">
  </div>
    @error('address')
<div class="text-danger">{{$message}}</div>
@enderror
  <div class="col-12">
    <label for="city" class="form-label">City:</label>
    <input type="text" @class(['form-control','is-invalid'=>$errors->has('city')]) id="city" name="city" value="{{ old('city', isset($contact) ? $contact->city : '') }}">
  </div>

      @error('city')
<div class="text-danger">{{$message}}</div>
@enderror
  <div class="col-12">
    <label for="mobile" class="form-label">Mobile:</label>
    <input type="text" @class(['form-control','is-invalid'=>$errors->has('mobile')]) id="mobile" name="mobile" value="{{ old('mobile', isset($contact) ? $contact->mobile : '') }}">
  </div>
      @error('mobile')
<div class="text-danger">{{$message}}</div>
@enderror
  <div class="col-12">
    <label for="email" class="form-label">Email:</label>
    <input type="text" @class(['form-control','is-invalid'=>$errors->has('email')]) id="email" name="email" value="{{ old('email', isset($contact) ? $contact->email : '') }}">
  </div>
        @error('email')
<div class="text-danger">{{$message}}</div>
@enderror
  <div class="col-12">
  <label for="dateofbirth" class="form-label">Date of Birth:</label>

<div id="dateofbirth" class="md-form md-outline input-with-post-icon datepicker" inline="true">
  <input placeholder="Select date" type="date" id="dateofbirth" @class(['form-control','is-invalid'=>$errors->has('dateofbirth')])  value="{{ old('dateofbirth', isset($contact) ? $contact->dateofbirth : '') }}" name="dateofbirth">
  <i class="fas fa-calendar input-prefix"></i>
</div>
  </div>

       @error('dateofbirth')
<div class="text-danger">{{$message}}</div>
@enderror
  <div class="col-12">

    <label for="gender" class="form-label">Gender:</label>
    <select id="gender" name="gender" class="form-select">
      <option selected>Choose...</option>
      <option @if(isset($contact) && $contact->gender == 0) selected @endif value="0">Male</option>
      <option @if(isset($contact) && $contact->gender == 1) selected @endif value="1">Female</option>
    </select>
    @error('gender')
<div class="text-danger">{{$message}}</div>
@enderror
  </div>

      
  <div class="col-12">

    <label for="maritalstatus" class="form-label">Marital Status:</label>
    <select id="maritalstatus" name="maritalstatus" class="form-select">
      <option selected>Choose...</option>
     <option @if(isset($contact) && $contact->maritalstatus == 0) selected @endif value="0">single</option>
    <option @if(isset($contact) && $contact->maritalstatus == 1) selected @endif value="1">married</option>
    <option @if(isset($contact) && $contact->maritalstatus == 2) selected @endif value="2">divorced</option>
    </select>

      @error('maritalstatus')
<div class="text-danger">{{$message}}</div>
@enderror
    </div>


      
  <div class="col-md-6">
    <label for="image_path" class="form-label">Image:</label>
    <input type="file" @class(['form-control','is-invalid'=>$errors->has('image_path')]) id="image_path" name="image_path">
     @isset($contact)
     @isset($contact->image_path)
    <img class="card-img" style="width:40%" src="{{asset("storage/$contact->image_path")}}" alt="contact image">
    @endisset
    @endisset

     @error('image_path')
<div class="text-danger">{{$message}}</div>
@enderror
  </div>

         
   

 
  
  <div class="col-12">
          <button type="submit" class="btn btn-primary">Submit</button>
  </div>
    </form>
  </div>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>

  <div class="card border-success container d-flex justify-content-center mt-5" style="max-width: 50rem;">
    <div class="card-header bg-transparent border-success text-center">
     <h4>{{$title}}</h4>
    </div>

    <div class="card-body text-success">
      <form class="container" method="POST" action="{{$url}}">
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">First Name</label>
          <input type="text" class="form-control" name="fname" value="{{$title == 'Update Employee' ? $emp->fname : ''}}">
           <span class="text-danger">
                @error('fname')
                {{$message}}
                @enderror
            </span>
        </div>

        <div class=" mb-3">
          <label for="exampleInputEmail1" class="form-label">Last Name</label>
          <input type="text" class="form-control" name="lname" value="{{$title == 'Update Employee' ? $emp->lname : ''}}" >
          <span class="text-danger">
            @error('lname')
            {{$message}}
            @enderror
        </span>
        </div>

        <div class=" mb-3">
          <label for="exampleInputPassword1" class="form-label">Email</label>
          <input type="email" class="form-control" name="email" value="{{$title == 'Update Employee' ? $emp->email : ''}}">
          <span class="text-danger">
            @error('email')
            {{$message}}
            @enderror
        </span>
        </div>

        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Address Proof</label>
          <input type="text" class="form-control" name="addproof"  value="{{$title == 'Update Employee' ? $emp->address_proof : ''}}">
          <span class="text-danger">
            @error('addproof')
            {{$message}}
            @enderror
        </span>
        </div>

        <div class="mb-5">
          <label for="exampleInputPassword1" class="form-label">Proof Status</label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="proofstat" value="1" id="flexRadioDefault1" 

            @if($title == 'Update Employee') 
            {{$emp->proof_status==1? "checked" : ""}} @endif>
            
            <label class="form-check-label" for="flexRadioDefault1">
              Active
            </label>
          </div>

          <div class="form-check">
            <input class="form-check-input" type="radio" name="proofstat" value="0" id="flexRadioDefault2"  @if($title == 'Update Employee') 
            {{$emp->proof_status==0? "checked" : ""}} @endif>
            <label class="form-check-label" for="flexRadioDefault2">
              Inactive
            </label>
          </div>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        <a href="javascript:void(0)" class="btn add-more-form btn-primary rt-button">More <i
            class="fa-sharp fa-solid fa-plus"></i></a>

        <a href="/myform/view-employee" class="btn btn-dark text-end" style="float:right">Browse <i
            class="fa-solid fa-globe"></i></a>

      </form>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
</body>

</html>
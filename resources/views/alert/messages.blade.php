@if ($errors->any())
    @foreach ($errors->all() as $error)
    <div class="alert alert-danger alert-dismissable">
        <strong>Error!</strong>{{ $error }}
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
      </div>
    @endforeach
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissable">
        <strong>Error!</strong>{{ $error }}
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success alert-dismissable">
        <strong>Success!</strong>{{session('success')}}
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
    </div>
@endif
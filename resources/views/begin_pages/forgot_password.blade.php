@extends('index')
@section('body')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
  <h2>Quên mật khẩu</h2>
     <form class="form-lable" method="POST" action="..." >
         <p>  <label class="control-label">Email:</label>            
              <input class="form-control" name="email">     
         </p>       
         <p><button type="submit" class="btn btn-warning">Gửi mail</button></p>
     </form> 
@endsection
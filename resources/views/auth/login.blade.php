<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LaraProduct</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/materialize/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

<div class="container">
  <br>
  <br>
    <div class="row">
        <div class="col s3"></div>
          <div class="card col s6" style="padding:0px 20px 0px 20px;">
              <form  role="form" method="POST" action="{{ url('login') }}">
                        {{ csrf_field() }}
                        <div class="row">
                          <div class="col s12">
                            <div class="card-image">
                              <img src="/samplepic.jpg" />
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <i class="material-icons prefix">perm_identity</i>
                            <input type="text" name="email" id="email" class="validate"/>
                            <label for="email">Enter your Email</label>
                          </div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <i class="material-icons prefix">lock_outline</i>
                            <input class="validate" type="password" name="password" id="password"/>
                            <label for="password">Enter your password</label>
                          </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <button type="submit" name="btn_login" class="btn waves-effect indigo col s12">Login</button>
                            </div>
                        </div>
                      </form>
                      <p class="text-center mt-3 text-secondary">Doesn't have an account, Please <a href="{{ url('/register')}}">Register Now</a></p>
          </div>
        <div class="col s3"></div>
    </div>
</div> 
    <script src="/jquery/dist/jquery.min.js"></script>
    <script src="/materialize/js/materialize.min.js"></script>
    <script src="/select2/dist/js/select2.js"></script>
    <script src="/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="/DataTables/datatables.min.js"></script>
    <script src="/DataTables/Data/js/dataTables.bootstrap4.min.js"></script>
    <script src="/node_modules/popper/popper.min.js"></script>
    <script src="/jquery/additional-methods.min.js"></script>
    <script src="/js/_script.js"></script>
    @yield('scripts')
</body>
</html>




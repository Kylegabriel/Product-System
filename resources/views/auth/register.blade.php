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
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-md-3">
                        <div class="signup-form">
                            <form method="POST" action="{{ route('register') }}" class="mt-5 border p-4 bg-light shadow">
                                {{ csrf_field() }}
                                <h4 class="mb-5 text-secondary">Create Your Account</h4>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label>Name<span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter First Name">
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label>Email<span class="text-danger">*</span></label>
                                        <input type="text" name="email" id="email" class="form-control {{ $errors->has('email') ? 'has-error' : '' }}" placeholder="Enter First Name">
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="mb-3 col-md-12">
                                        <label>Password<span class="text-danger">*</span></label>
                                        <input type="password" name="password" id="password" class="form-control {{ $errors->has('password') ? 'has-error' : '' }}" placeholder="Enter Password">
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="mb-3 col-md-12">
                                        <label>Confirm Password<span class="text-danger">*</span></label>
                                        <input type="password" name="password_confirmation" id="password-confirm" class="form-control" placeholder="Enter Password">
                                    </div>

                                    <div class="col-md-12">
                                       <button class="btn btn-primary float-end" type="submit" value="Register" id="register" name="register">Signup Now</button>
                                    </div>
                                </div>
                            </form>
                            <p class="text-center mt-3 text-secondary">If you have account, Please <a href="">Login Now</a></p>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        <div class="col s3"></div>
    </div>
</div> 
    <script src="/jquery/dist/jquery.min.js"></script>
    <script src="/materialize/js/materialize.min.js"></script>
</body>
</html>




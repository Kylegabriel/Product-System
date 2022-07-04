
                <!-- Navbar primary -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary mt-1">
            <a class="navbar-brand" href="#">
              <img src="" class="img-responsive" width="auto" height="auto" alt="">
              LaraProducts
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-primary" aria-controls="navbar-primary" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-primary">
              <div class="navbar-collapse-header">
                <div class="row">
                  <div class="col-6 collapse-brand">
                  </div>
                  <div class="col-6 collapse-close">
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-primary" aria-controls="navbar-primary" aria-expanded="false" aria-label="Toggle navigation">
                      <span></span>
                      <span></span>
                    </button>
                  </div>
                </div>
              </div>
              <ul class="navbar-nav ml-lg-auto">
<!--                 <li class="nav-item">
                  <a class="nav-link" href="{{ url('/dashboard')}}">Dashboard
                  </a>
                </li> -->
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/products')}}">Products
                  </a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link" href="#" id="navbar-primary_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="nav-link-inner--text">REMAR PADILLA</span>
                      <i class="fa fa-ellipsis-v"></i>
                  </a>    
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-primary_dropdown_1">

                    <a class="dropdown-item" href="{{ url('/settings')}}">
                      <span class="fa fa-cog"></span>
                      Setting
                    </a>
                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      <form id="logout-form" action="{{ route('logout') }}" method="POST">
                          @csrf
                      </form>
                      <span class="fa fa-power-off"></span>
                      Logout
                    </a>
                  </div>
                </li>
              </ul>
            </div>
        </nav>
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <ul class="navbar-nav ml-auto">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid ">
              <a class="navbar-brand" href="#">Navbar</a>
        
              </div>
            </div>
          </nav>
    </ul>
</nav>

<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <ul class="navbar-nav ml-auto">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Aplication
                    </a>
                    <ul class="dropdown-menu">
                      @can('system index')
                      <li><a class="dropdown-item" href="/system">System</a></li>
                      @endcan
                      @can('module index')
                      <li><a class="dropdown-item" href="/module">Module</a></li>
                      @endcan
                      @can('action index')
                      <li><a class="dropdown-item" href="/action">Action</a></li>
                      @endcan
                    </ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     permision and rolle
                    </a>
                    <ul class="dropdown-menu">
                      @can('permision index')
                      <li><a class="dropdown-item" href="/permision">permision</a></li>
                      @endcan
                      @can('rolle index')
                      <li><a class="dropdown-item" href="/rolle">rolle</a></li>
                      @endcan
                      {{-- @can('user index') --}}
                      <li><a class="dropdown-item" href="/user">user</a></li>
                      {{-- @endcan --}}
                    </ul>
                  </li>
                  <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                </ul>
              </div>
            </div>
          </nav>
    </ul>
</nav>
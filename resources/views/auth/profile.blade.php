@extends('adminlte::page',['auth_type' => 'register'])

@php( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') )
@php( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') )

@if (config('adminlte.use_route_url', false))
    @php( $login_url = $login_url ? route($login_url) : '' )
    @php( $register_url = $register_url ? route($register_url) : '' )
@else
    @php( $login_url = $login_url ? url($login_url) : '' )
    @php( $register_url = $register_url ? url($register_url) : '' )
@endif

@section('auth_header', __('adminlte::adminlte.register_message'))


@section('title', 'BRAVE')




@section('content_header')


@if (isset($message))

  
  <div class="row sucesso">
    <div class="col-4">
    {{-- <div class="card-footer"> --}}
      {{-- <div class="alert  alert-success" role="alert">
        {{$message}}
      </div> --}}
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
          {{$message}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        {{-- </div> --}}
      </div>
    </div>
  </div>


@endif
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Administração de Usuáios do Sistema</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">dash</a></li>
            <li class="breadcrumb-item active">page</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
    <div class="col-md-9">
        <div class="card">
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Criar Novo Usuário</a></li>
              <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Administrar Usuários</a></li>
              <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Teste2</a></li>
            </ul>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <form action="{{ $register_url }}" method="post">
                  {{ csrf_field() }}
                  {{-- {{var_dump($errors)}} --}}
                  {{-- Name field --}}
                  <div class="input-group mb-3">
                      <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                             value="{{ old('name') }}" placeholder="{{ __('adminlte::adminlte.full_name') }}" autofocus>
                      <div class="input-group-append">
                          <div class="input-group-text">
                              <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
                          </div>
                      </div>
                      @if($errors->has('name'))
                          <div class="invalid-feedback">
                              <strong>{{ $errors->first('name') }}</strong>
                          </div>
                      @endif
                  </div>
          
                  {{-- Email field --}}
                  <div class="input-group mb-3">
                      <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                             value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}">
                      <div class="input-group-append">
                          <div class="input-group-text">
                              <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                          </div>
                      </div>
                      @if($errors->has('email'))
                          <div class="invalid-feedback">
                              <strong>{{ $errors->first('email') }}</strong>
                          </div>
                      @endif
                  </div>
          
                  {{-- Password field --}}
                  <div class="input-group mb-3">
                      <input type="password" name="password"
                             class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                             placeholder="{{ __('adminlte::adminlte.password') }}">
                      <div class="input-group-append">
                          <div class="input-group-text">
                              <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                          </div>
                      </div>
                      @if($errors->has('password'))
                          <div class="invalid-feedback">
                              <strong>{{ $errors->first('password') }}</strong>
                          </div>
                      @endif
                  </div>
          
                  {{-- Confirm password field --}}
                  <div class="input-group mb-3">
                      <input type="password" name="password_confirmation"
                             class="form-control {{ $errors->has('msgPassword') ? 'is-invalid' : '' }}"
                             placeholder="{{ __('adminlte::adminlte.retype_password') }}">
                      <div class="input-group-append">
                          <div class="input-group-text">
                              <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                          </div>
                      </div>
                      @if($errors->has('password_confirmation'))
                          <div class="invalid-feedback">
                              <strong>{{ $errors->first('msg') }}</strong>
                          </div>
                      @endif
                  </div>
          
                  {{-- Register button --}}
                  <button type="submit" class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
                      <span class="fas fa-user-plus"></span>
                      {{ __('adminlte::adminlte.register') }}
                  </button>
          
              </form>
               
                  
                <!-- Post -->
                {{-- <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                    <span class="username">
                      <a href="#">Jonathan Burke Jr.</a>
                      <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                    </span>
                    <span class="description">Shared publicly - 7:30 PM today</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>

                  <p>
                    <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                    <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                    <span class="float-right">
                      <a href="#" class="link-black text-sm">
                        <i class="far fa-comments mr-1"></i> Comments (5)
                      </a>
                    </span>
                  </p>

                  <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                </div> --}}
                <!-- /.post -->

                <!-- Post -->
                {{-- <div class="post clearfix">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg" alt="User Image">
                    <span class="username">
                      <a href="#">Sarah Ross</a>
                      <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                    </span>
                    <span class="description">Sent you a message - 3 days ago</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>

                  <form class="form-horizontal">
                    <div class="input-group input-group-sm mb-0">
                      <input class="form-control form-control-sm" placeholder="Response">
                      <div class="input-group-append">
                        <button type="submit" class="btn btn-danger">Send</button>
                      </div>
                    </div>
                  </form>
                </div> --}}
                <!-- /.post -->

                <!-- Post -->
                {{-- <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="../../dist/img/user6-128x128.jpg" alt="User Image">
                    <span class="username">
                      <a href="#">Adam Jones</a>
                      <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                    </span>
                    <span class="description">Posted 5 photos - 5 days ago</span>
                  </div>
                  <!-- /.user-block -->
                  <div class="row mb-3">
                    <div class="col-sm-6">
                      <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                      <div class="row">
                        <div class="col-sm-6">
                          <img class="img-fluid mb-3" src="../../dist/img/photo2.png" alt="Photo">
                          <img class="img-fluid" src="../../dist/img/photo3.jpg" alt="Photo">
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                          <img class="img-fluid mb-3" src="../../dist/img/photo4.jpg" alt="Photo">
                          <img class="img-fluid" src="../../dist/img/photo1.png" alt="Photo">
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->

                  <p>
                    <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                    <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                    <span class="float-right">
                      <a href="#" class="link-black text-sm">
                        <i class="far fa-comments mr-1"></i> Comments (5)
                      </a>
                    </span>
                  </p>

                  <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                </div> --}}
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <div class="col-12">
                  <div class="card card-info ">
                      <div class="card-header">
                        <h3 class="card-title">Lista Usuários</h3>
                      </div>
                      <div >  
                        <br />
                        <div class="table-responsive">  
                         {{-- <h3 align="center">Inline Table Insert Update Delete in PHP using jsGrid</h3><br /> --}}
                         <div id="grid_table_listuser"></div>
                        </div>  
                       </div>
                      
                      <!-- /.card-body -->
                    </div>
              </div>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                <form class="form-horizontal">
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputName2" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      @if($errors->any())
      <div class="row erros">
        <div class="col-4">
      <div class="card-footer">
      @foreach($errors->all() as $erro)
          <div class="alert alert-danger" role="alert">
              {{ $erro }}
          </div>
      @endforeach
      
      </div>
    </div>
  </div>
  @endif
  
  </section>

  

  @yield('scrptslocal')


   

    <script>
  

    $(document).ready(function() {

     if ($( ".sucesso" ).is( ":visible")){

      console.log('apareceu')

      window.setTimeout(function() {
                $('.sucesso').hide(1000);
 
            },4000);
      
     }
     if ($( ".erros" ).is( ":visible")){

      console.log('apareceu')

      window.setTimeout(function() {
                $('.erros').hide(1000);

            },8000);

}
     
     

     

    })


     </script>
@stop



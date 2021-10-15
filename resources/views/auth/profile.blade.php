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
<style>
  .table_profiles{
      position: relative;
      padding: 2%;
      left: 25%;
      /* bottom: 400px;  */
  }
  .inputPerfil{
      
     
     
  }
  
  
  </style>

@section('headerScripts')
  @parent
@endsection


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
              <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Administrar Perfis</a></li>
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
                  <div class="form-group">
                    <label for="perfil">Perfil</label>
                    <select class="custom-select" id="perfil">
                      <option value="">Selecione</option>
                    </select>
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

              <div class="tab-pane inputPerfil" id="settings">
                <form action="/novoPerfil" method="POST" class="form-horizontal">
                  @csrf
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Nome</label>
                    <div class="col-sm-4">
                      <input type="text" class="form-control" name="nomePerfil" id="nomePerfil" placeholder="Novo Perfil">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <button type="submit" class="btn btn-success">Criar</button>
                    </div>
                  </div>
                </form>
                <div class="row table_profiles">
                  <div class="col-6">
                    <div class="card card-info">
                      <div class="card-header">
                        <h3 class="card-title">Administrar Perfis</h3>
                      </div>
                      <div class="card-body">
                        <div class="table-responsive">  
                          {{-- <h3 align="center">Inline Table Insert Update Delete in PHP using jsGrid</h3><br /> --}}
                          <div id="grid_table_profiles"></div>
                         </div>  
                      </div>
                    </div>
                  </div>
                </div>
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

  

@stop

@section('footerScripts')


<link type="text/css" rel="stylesheet" href="/plugins/jsgrid/jsgrid.min.css" />
<link type="text/css" rel="stylesheet" href="/plugins/jsgrid/jsgrid-theme.min.css" />
<script type="text/javascript" src="/plugins/jsgrid/jsgrid.min.js"></script>
<script type="text/javascript" src="/plugins/jsgrid/i18n/jsgrid-pt-br.js"></script>


<script>

  
  
  

    $(document).ready(function() {

      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        }
      })

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

      $.get('/novoPerfil', function(resp) {

                

      const inserirPefil = e => {

        // console.log(e.id)
      $('#perfil').append(`<option value='${e.id}'>${e.Perfil}</option>`)

      }

      resp.map(inserirPefil)


      })


      $('.jsgrid-update-button').click(function(){
         
        console.log('Clicou')
        // location.reload(true)
     
       })


// $.when(

// $.get("/api/v1/clients", function(clients) {
//     db.clients = clients;
// }),

$.get("/novoPerfil", function(profiles) {
    // db.Perfil = owners;

    // const allProfiles = []

    // profiles.map(e => allProfiles.push(e.Perfil))

    // console.log(profiles)

    profiles.unshift({ id: 0, Perfil: "" });
    


// ).then(function() {

    jsGrid.locale("pt-br");
    $('#grid_table_listuser').jsGrid({

      width: "100%",
      height: "600px",

      filtering: true,
      // inserting:true,
      editing: true,
      sorting: true,
      paging: true,
      autoload: true,
      pageSize: 5,
      pageButtonCount: 5,

      controller: {
      loadData: function(filter){
        return $.ajax({
        type: "GET",
        url: "/adminUser",
        data: filter
        });
      },
      // insertItem: function(item){
      // return $.ajax({
      // type: "POST",
      // url: "/adminUser",
      // data:item

      // });

      // },
      updateItem: function(item){
        return $.ajax({
        type: "PUT",
        url: "/adminUser",
        data: item
      });
      },
      deleteItem: function(item){
        return $.ajax({
        type: "DELETE",
        url: "/adminUser",
        data: item
      });
      },
      },

      fields: [
      {
          autosearch: true, 
          align: "center", 
          name: "id",
          type: "hidden",
          width: 5,
          css: 'hide'
      },
      { 
          autosearch: true, 
          align: "center", 
          name: "Nome", 
          type: "text", 
          width: 60, 
          validate: "required"
      },

      {
          autosearch: true, 
          align: "center", 
          name: "Email", 
          type: "text", 
          width: 60, 
          validate: "required"
          },
      {
          autosearch: true,         
          align: "center", 
          name: "Perfil", 
          title: "Perfil Atual", 
          type: "text", 
          width: 60, 
          type: "hidden"
      },
          { 
            align: "center", 
            name: "edit", 
            title: "Editar Perfil", 
            type: "select", 
            items: profiles, 
            valueField: "id", 
            textField: "Perfil" 
          },
           
          

      // {
      // name: "Email", 
      // type: "select", 
      // width: 60, 
      // items: [
      // { Name: "", Id: '' },
      // { Name: "Janeiro", Id: '1' },
      // { Name: "Fevereiro", Id: '2' },
      // { Name: "Março", Id: '3' },
      // { Name: "Abril", Id: '4' },
      // { Name: "Maio", Id: '5' },
      // { Name: "Junho", Id: '6' },
      // { Name: "Julho", Id: '7' },
      // { Name: "Agosto", Id: '8' },
      // { Name: "Setembro", Id: '9' },
      // { Name: "Outubro", Id: '10' },
      // { Name: "Novembro", Id: '11' },
      // { Name: "Dezembro", Id: '12' }
      // ], 
      // valueField: "Id", 
      // textField: "Name", 
      // validate: "required"
      // },
      {
          align: "center", 
          name: "Data de criação", 
          type: "text", 
          width: 60,
          type: "hidden" 
      },

      {
          align: "center", 
          name: "Data de Atualização", 
          type: "text", 
          width: 60,
          type: "hidden", 
      },

      {
          align: "center", 
          name: "Resetar Senha", 
          type: "checkbox", 
          width: 60, 
      },
      // {
      //     name: "Confirma senha", 
      //     type: "text", 
      //     width: 60, 
      // },

      // {
      // name: "age", 
      // type: "text", 
      // width: 50, 
      // validate: function(value)
      // {
          
      // if(value > 0)
      // {
          
      //     return true;
      // }
      // }
      // },
      // {
      // name: "nome", 
      // type: "text", 
      // validate: "required"
      // },
      // {
      // name: "categorias",
      // title: "Selecionar nova categorias",
      // type: "select",
      // width: 100,
      // items: categorias, valueField: "id", textField: "nome" },
      {
          type: "control"
      }
      ]



      // });

  })
})

  jsGrid.locale("pt-br");
    $('#grid_table_profiles').jsGrid({

      width: "100%",
      height: "300px",

      filtering: true,
      // inserting:true,
      editing: true,
      sorting: true,
      paging: true,
      autoload: true,
      pageSize: 10,
      pageButtonCount: 5,

      controller: {
      loadData: function(filter){
        return $.ajax({
        type: "GET",
        url: "/novoPerfil",
        data: filter
        });
      },
      // insertItem: function(item){
      // return $.ajax({
      // type: "POST",
      // url: "/adminUser",
      // data:item

      // });

      // },
      updateItem: function(item){
        return $.ajax({
        type: "PUT",
        url: "/novoPerfil",
        data: item
      });
      },
      deleteItem: function(item){
        return $.ajax({
        type: "DELETE",
        url: "/novoPerfil",
        data: item
      });
      },
      },

      fields: [
      { 
          autosearch: true, 
          name: "id",
          type: "hidden",
          width: 5,
          css: 'hide'
      },
      { 
          autosearch: true, 
          name: "Perfil", 
          type: "text", 
          width: 60, 
          validate: "required"
      },

      {
          autosearch: true, 
          name: "Data de criação", 
          type: "text", 
          width: 60, 
          validate: "required",
          type: "hidden"
          },

       {
          type: "control"
      }
      ]



      // });

  })


})
</script>
@endsection


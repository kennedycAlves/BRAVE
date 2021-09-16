@extends('adminlte::page')

@section('title', 'BRAVE')


@section('content_header')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          {{-- <h1></h1> --}}
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">Controle de Estoque</li>
            <li class="breadcrumb-item active">Cadastro</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
@stop
<style>
.novaCategoria{
    position: relative;
    /* margin: 8%; */
    left:15%;
}
.salvarNovaCat{
    position: relative;
    margin: 1%;
    left: 2%;
}.chartTodosMedes{
  position: relative;
    /* margin: 1%; */
    left: 15%;
}

.consolidadoCreditoMesAtual
{
  position: relative;
    /* margin: 1%; */
  left: 15%;
}

.consolidadoDebitosMesAtual{
  position: relative;
    /* margin: 1%; */
  left: 15%;
}


</style>

@section('content')
<div class="row">
<div class="col-lg-4 col-6 consolidadoCreditoMesAtual">
  <!-- small card -->
  <div class="small-box bg-success">
    <div class="inner">
      <h3>R$ {{number_format($creditosMesAtual[0]->total, 2,",",".")}}<sup style="font-size: 20px"></sup></h3>

      <p>Total de Creditos Mês Atual</p>
    </div>
    <div class="icon">
      <i class="fas fa-money-check-alt"></i>
    </div>
    <a href="#" class="small-box-footer">
      More info <i class="fas fa-arrow-circle-right"></i>
    </a>
  </div>
</div>
<div class="col-lg-4 col-6 consolidadoDebitosMesAtual">
  <!-- small card -->
  <div class="small-box bg-danger">
    <div class="inner">
      <h3>R$ {{number_format($debitosMesAtual[0]->total, 2,",",".")}}<sup style="font-size: 20px"></sup></h3>

      <p>Total de Debitos Mês Atual</p>
    </div>
    <div class="icon">
      <i class="fas fa-money-check-alt"></i>
    </div>
    <a href="#" class="small-box-footer">
      More info <i class="fas fa-arrow-circle-right"></i>
    </a>
  </div>
</div>
</div>
    <div class="row novaCategoria">
        <div class="col-4">
            <div class="card card-success ">
                <div class="card-header">
                  <h3 class="card-title">Créditos</h3>
                </div>
                <div >  
                  <br />
                  <div class="table-responsive">  
                    {{-- <h3 align="center">Controle</h3><br /> --}}
                    <div id="grid_table_creditos"></div>
                  </div>  
                 </div>
            </div>
        </div>
        <div class="col-4">
          <div class="card card-danger ">
              <div class="card-header">
                <h3 class="card-title">Débitos</h3>
              </div>
              <div >  
                <br />
                <div class="table-responsive">  
                 {{-- <h3 align="center">Inline Table Insert Update Delete in PHP using jsGrid</h3><br /> --}}
                 <div id="grid_table_debitos"></div>
                </div>  
               </div>
              
              <!-- /.card-body -->
            </div>
      </div>
    </div>
      
  </div>
 
  <div class="row">
    
    <div class="col-md-4 chartTodosMedes">
      <!-- LINE CHART -->
      <div class="card card-success">
        <div class="card-header">
          <h3 class="card-title">Consolidação Créditos Anual</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
            <canvas id="myChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 1058px;" width="1058" height="250" class="chartjs-render-monitor"></canvas>
          </div>
        </div>
        <!-- /.card-body -->
      </div>

    </div>
    <!-- /.col (RIGHT) -->
    <div class="col-md-4 chartTodosMedes">
      <!-- LINE CHART -->
      <div class="card  card-danger">
        <div class="card-header">
          <h3 class="card-title">Consolidação Débitos Anual</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
            <canvas id="" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 1058px;" width="1058" height="250" class="chartjs-render-monitor"></canvas>
          </div>
        </div>
        <!-- /.card-body -->
      </div>

    </div>
  </div> 
 
    
     
@stop

{{-- <script type="text/javascript" src="/plugins/jsgrid/grids.js"></script> --}}




@extends('adminlte::page')

@section('title', 'BRAVE')


@section('content_header')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Cadastramento</h1>
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
    left: 25%;
}
.salvarNovaCat{
    position: relative;
    margin: 1%;
    left: 2%;
}

</style>

@section('content')
    <div class="row novaCategoria">
        <div class="col-6">
            <div class="card card-primary ">
                <div class="card-header">
                  <h3 class="card-title">Nova Categoria</h3>
                </div>
                <div class="card-body">
                  <div role="form">
  <div class="box-body">
    <field id="billingCycleClientId" label="Nome" model="billingCycle.name"
         placeholder="Informe o Nome" grid="12 6 4" readonly="tabDelete"></field>
    <field id="billingCycleType" label="Mês" model="billingCycle.month" type="number"
         placeholder="Informe o Mês" grid="12 6 4" readonly="tabDelete"></field>
    <field id="billingCyclePath" label="Ano" model="billingCycle.year" type="number"
         placeholder="Informe o Ano" grid="12 6 4" readonly="tabDelete"></field>
    <hr>

    <div class="col-xs-12">
      <fieldset>
        <legend>Resumo</legend>
        <div ng-include="'billingCycle/summary.html'"></div>
      </fieldset>
    </div>

    <div class="col-xs-12 col-lg-6">
      <fieldset>
        <legend>Créditos</legend>
        <div ng-include="'billingCycle/creditList.html'"></div>
      </fieldset>
    </div>


    <div class="col-xs-12 col-lg-6">
      <fieldset>
        <legend>Débitos</legend>
        <div ng-include="'billingCycle/debtList.html'"></div>
      </fieldset>
    </div>
  </div>

  <div class="box-footer">
    <button class="btn btn-primary" ng-click="createBillingCycle()"
         ng-if="tabCreate">Incluir</button>
    <button class="btn btn-info" ng-click="updateBillingCycle()"
         ng-if="tabUpdate">Alterar</button>
    <button class="btn btn-danger" ng-click="deleteBillingCycle()"
         ng-if="tabDelete">Excluir</button>
    <button class="btn btn-default" ng-click="cancel()">Cancelar</button>
  </div>
</div>
                   </div>
               
                <!-- /.card-body -->
              </div>
        </div>
    </div>
    
      
@stop



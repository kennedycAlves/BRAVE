<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    

    {{-- Base Meta Tags --}}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Custom Meta Tags --}}
    @yield('meta_tags')

    {{-- Title --}}
    <title>
        @yield('title_prefix', config('adminlte.title_prefix', ''))
        @yield('title', config('adminlte.title', 'AdminLTE 3'))
        @yield('title_postfix', config('adminlte.title_postfix', ''))
    </title>

    {{-- Custom stylesheets (pre AdminLTE) --}}
    @yield('adminlte_css_pre')

    {{-- Base Stylesheets --}}
    @if(!config('adminlte.enabled_laravel_mix'))
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

        {{-- Configured Stylesheets --}}
        @include('adminlte::plugins', ['type' => 'css'])

        <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    @else
        <link rel="stylesheet" href="{{ mix(config('adminlte.laravel_mix_css_path', 'css/app.css')) }}">
    @endif

    {{-- Livewire Styles --}}
    @if(config('adminlte.livewire'))
        @if(app()->version() >= 7)
            @livewireStyles
        @else
            <livewire:styles />
        @endif
    @endif

    {{-- Custom Stylesheets (post AdminLTE) --}}
    @yield('adminlte_css')

    {{-- Favicon --}}
    @if(config('adminlte.use_ico_only'))
        <link rel="shortcut icon" href="{{ asset('favicons/favicon.ico') }}" />
    @elseif(config('adminlte.use_full_favicon'))
        <link rel="shortcut icon" href="{{ asset('favicons/favicon.ico') }}" />
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicons/apple-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicons/apple-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicons/apple-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicons/apple-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicons/apple-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicons/apple-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicons/apple-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicons/apple-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/apple-icon-180x180.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicons/favicon-16x16.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicons/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicons/favicon-96x96.png') }}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('favicons/android-icon-192x192.png') }}">
        <link rel="manifest" href="{{ asset('favicons/manifest.json') }}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{ asset('favicon/ms-icon-144x144.png') }}">
    @endif

</head>

<body class="@yield('classes_body')" @yield('body_data')>

    {{-- Body Content --}}
    @yield('body')

    {{-- Base Scripts --}}
    @if(!config('adminlte.enabled_laravel_mix'))
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
        

        {{-- Configured Scripts --}}
        @include('adminlte::plugins', ['type' => 'js'])

        <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
    @else
        <script src="{{ mix(config('adminlte.laravel_mix_js_path', 'js/app.js')) }}"></script>
    @endif

    {{-- Livewire Script --}}
    @if(config('adminlte.livewire'))
        @if(app()->version() >= 7)
            @livewireScripts
        @else
            <livewire:scripts />
        @endif
    @endif

    {{-- Custom Scripts --}}
    @yield('adminlte_js')
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <link type="text/css" rel="stylesheet" href="/plugins/jsgrid/jsgrid.min.css" />
    <link type="text/css" rel="stylesheet" href="/plugins/jsgrid/jsgrid-theme.min.css" />
    <link type="text/css" rel="stylesheet" href="/plugins/chartjs/chart.min.css" />
    <script type="text/javascript" src="/plugins/jsgrid/jsgrid.min.js"></script>
    <script type="text/javascript" src="/plugins/jsgrid/i18n/jsgrid-pt-br.js"></script>
    <script type="text/javascript" src="/plugins/jsgrid/grids.js"></script>
    <script type="text/javascript" src="/plugins/chartjs/chart.min.js"></script>
    <script type="text/javascript" src="/plugins/chartjs/charts.js"></script>
   <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
        }
    })
    </script>

   {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> --}}
     {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css"/>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script> --}}
  
    
    
    {{-- <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            }
            })
        $(function() {
            
        // $.ajax({
            // type: "GET",
            // url: "/getCategoriasEstoque/"
            // }).done(function(categorias) {

                // categorias.unshift({ id: "", name: "" });
                
        jsGrid.locale("pt-br");   
        $('#grid_table_creditos').jsGrid({

            width: "100%",
            height: "600px",

            filtering: true,
            inserting:true,
            editing: true,
            sorting: true,
            paging: true,
            autoload: true,
            pageSize: 10,
            pageButtonCount: 5,
            deleteConfirm: "Do you really want to delete data?",

            controller: {
            loadData: function(filter){
            return $.ajax({
            type: "GET",
            url: "/creditos",
            data: filter
            });
            },
                insertItem: function(item){
                return $.ajax({
                type: "POST",
                url: "/creditos",
                data:item
                
                });
                
                },
                updateItem: function(item){
                return $.ajax({
                type: "PUT",
                url: "/creditos",
                data: item
                });
                },
                deleteItem: function(item){
                return $.ajax({
                type: "DELETE",
                url: "/creditos",
                data: item
                });
                },
            },

            fields: [
            {
            name: "id",
            type: "hidden",
            width: 5,
            css: 'hide'
            },
            {
            name: "Descrição do Crédito", 
            type: "text", 
            width: 60, 
            validate: "required"
            },
            {
            name: "Mês de lançamento", 
            type: "select", 
            width: 60, 
            items: [
            { Name: "", Id: '' },
            { Name: "Janeiro", Id: '1' },
            { Name: "Fevereiro", Id: '2' },
            { Name: "Março", Id: '3' },
            { Name: "Abril", Id: '4' },
            { Name: "Maio", Id: '5' },
            { Name: "Junho", Id: '6' },
            { Name: "Julho", Id: '7' },
            { Name: "Agosto", Id: '8' },
            { Name: "Setembro", Id: '9' },
            { Name: "Outubro", Id: '10' },
            { Name: "Novembro", Id: '11' },
            { Name: "Dezembro", Id: '12' }
            ], 
            valueField: "Id", 
            textField: "Name", 
            validate: "required"
            },
            {
            name: "Ano de lançamento", 
            type: "number", 
            width: 60, 
            validate: function(value)
            {
                
            if(value >= 2021)
            {
                
                return true;
            }
            }
            },
            {
            name: "Valor do crédito", 
            type: "number", 
            width: 60, 
            itemTemplate: function(value) {
                return value.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
            },
            validate: function(value)
            {
                
            if(value > 0)
            {
                
                return true;
            }
            }
            },
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
            
});
    jsGrid.locale("pt-br");
    $('#grid_table_debitos').jsGrid({

    width: "100%",
    height: "600px",

    filtering: true,
    inserting:true,
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
    url: "/debitos",
    data: filter
    });
    },
        insertItem: function(item){
        return $.ajax({
        type: "POST",
        url: "/debitos",
        data:item
        
        });
        
        },
        updateItem: function(item){
        return $.ajax({
        type: "PUT",
        url: "/debitos",
        data: item
        });
        },
        deleteItem: function(item){
        return $.ajax({
        type: "DELETE",
        url: "/debitos",
        data: item
        });
        },
    },

        fields: [
        {
        name: "id",
        type: "hidden",
        width: 5,
        css: 'hide'
        },
        {
        name: "Descrição do débito", 
        type: "text", 
        width: 60, 
        validate: "required"
        },
        {
        name: "Mês de lançamento", 
        type: "select", 
        width: 60, 
        items: [
        { Name: "", Id: '' },
        { Name: "Janeiro", Id: '1' },
        { Name: "Fevereiro", Id: '2' },
        { Name: "Março", Id: '3' },
        { Name: "Abril", Id: '4' },
        { Name: "Maio", Id: '5' },
        { Name: "Junho", Id: '6' },
        { Name: "Julho", Id: '7' },
        { Name: "Agosto", Id: '8' },
        { Name: "Setembro", Id: '9' },
        { Name: "Outubro", Id: '10' },
        { Name: "Novembro", Id: '11' },
        { Name: "Dezembro", Id: '12' }
        ], 
        valueField: "Id", 
        textField: "Name", 
        validate: "required"
        },
        {
        name: "Ano de lançamento", 
        type: "number", 
        width: 60, 
        validate: function(value)
        {
            
        if(value >= 2021)
        {
            
            return true;
        }
        }
        },
        {
        name: "Valor do débito", 
        type: "text", 
        width: 60, 
        itemTemplate: function(value) {
                return value.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
            },
        validate: function(value)
        {
            
        if(value > 0)
        {
            
            return true;
        }
        }
        },
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

    });
});
    </script> --}}
        

</body>

</html>

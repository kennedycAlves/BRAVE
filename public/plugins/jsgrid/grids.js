

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
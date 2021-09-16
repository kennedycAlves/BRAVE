$(function() {

    $.ajax({
        url: "/getLancamentoAnualCreditos",
        type: 'GET',
        dataType: 'json',
        })
        .done(function (data) {
           

            let mes = []
            let total = []
            let totalFormat = []

           

            data.map(e => mes.push(e.mes))

            const convertereal = e => e.toLocaleString('pt-br')

            // const convertereal = e => `${parseFloat(e).toFixed(2).replace('.',',')}`
            
            // const pushTotal = e => total.push(e.total)
            // data.map(e => total.push(e.total).map(convertereal))

            // const totalFormat = data.map(pushTotal)

            data.map(e => total.push(e.total))

            for(var i = 0; i <= mes.length; i++){

                if(mes[i] == '1'){
                    mes[i] = 'Janeiro'
                }else if (mes[i] == '2'){
                    mes[i] = 'Fevereiro'
                }else if (mes[i] == '3'){
                    mes[i] = 'Março'
                }else if (mes[i] == '4'){
                    mes[i] = 'Abril'
                }else if (mes[i] == '5'){
                    mes[i] = 'Maio'
                }else if (mes[i] == '6'){
                    mes[i] = 'Junho'
                }else if (mes[i] == '7'){
                    mes[i] = 'Julho'
                }else if (mes[i] == '8'){
                    mes[i] = 'Agosto'
                }else if (mes[i] == '9'){
                    mes[i] = 'Setembro'
                }else if (mes[i] == '10'){
                    mes[i] = 'Outubro'
                }else if (mes[i] == '11'){
                    mes[i] = 'Novembro'
                }else if (mes[i] == '12'){
                    mes[i] = 'Dezembro'
                }

            }

            

            // loadGraficoTotalMesAno(mes, total)
            totalFormat  = total.map(convertereal)

            console.log(totalFormat)

            

            let dia = new Date()

            let ano = dia.getFullYear()

            console.log(ano)

            // $.ajax({
            //     url: "/getLancamentoAnualDeditos",
            //     type: 'GET',
            //     dataType: 'json',
            //     })
            //     .done(function (data) {
                   
        
            //         let mes = []
            //         var totalDebitos = []
            //         let totalFormatDebitos = []
        
                   
        
            //         data.map(e => mes.push(e.mes))
        
            //         const convertereal = e => e.toLocaleString('pt-br')
        
            //         // const convertereal = e => `${parseFloat(e).toFixed(2).replace('.',',')}`
                    
            //         // const pushTotal = e => total.push(e.total)
            //         // data.map(e => total.push(e.total).map(convertereal))
        
            //         // const totalFormat = data.map(pushTotal)
        
            //         data.map(e => totalDebitos.push(e.total))
        
            //         for(var i = 0; i <= mes.length; i++){
        
            //             if(mes[i] == '1'){
            //                 mes[i] = 'Janeiro'
            //             }else if (mes[i] == '2'){
            //                 mes[i] = 'Fevereiro'
            //             }else if (mes[i] == '3'){
            //                 mes[i] = 'Março'
            //             }else if (mes[i] == '4'){
            //                 mes[i] = 'Abril'
            //             }else if (mes[i] == '5'){
            //                 mes[i] = 'Maio'
            //             }else if (mes[i] == '6'){
            //                 mes[i] = 'Junho'
            //             }else if (mes[i] == '7'){
            //                 mes[i] = 'Julho'
            //             }else if (mes[i] == '8'){
            //                 mes[i] = 'Agosto'
            //             }else if (mes[i] == '9'){
            //                 mes[i] = 'Setembro'
            //             }else if (mes[i] == '10'){
            //                 mes[i] = 'Outubro'
            //             }else if (mes[i] == '11'){
            //                 mes[i] = 'Novembro'
            //             }else if (mes[i] == '12'){
            //                 mes[i] = 'Dezembro'
            //             }
        
            //         }
        
                    
        
            //         // loadGraficoTotalMesAno(mes, total)
            //         totalFormatDebitos  = totalDebitos.map(convertereal)
        
            //         console.log(totalFormatDebitos)
        
                    
        
            //         let dia = new Date()
        
            //         let ano = dia.getFullYear()
        
            //         console.log(ano)
        
            //         // loadGraficoTotalMesAno(mes, totalFormatDebitos, ano)   
        
        
            // })

            loadGraficoTotalMesAno(mes, totalFormat, ano)   


    })

    

    function loadGraficoTotalMesAno(mes, total, ano){


        
       
        // 


        const ctx = document.getElementById('myChart').getContext('2d');
        
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: mes,
                datasets: [{
                    label: ano,
                    data: total,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: false
                    }
                }
            }
        });
   
    }

});
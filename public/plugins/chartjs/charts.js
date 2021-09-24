$(function() {

    $.ajax({
        url: "/getLancamentoAnualCreditos",
        type: 'GET',
        dataType: 'json',
        })
        .done(function (data) {
           

            let mes = []

            let total = []
            let totaldeb = []
            let totalLiq = []


            let totalFormatDeb = []
            let totalFormat = []
            let totalFormatLiq = []

           

            data.map(e => mes.push(e.mes))

            // const convertereal = e => e.toLocaleString('pt-br')

            const convertereal = e => `${(parseFloat(e)).toFixed(2)}`
            
            // const pushTotal = e => total.push(e.total)
            // data.map(e => total.push(e.total).map(convertereal))

            // const totalFormat = data.map(pushTotal)

            data.map(e => total.push(e.total))
            data.map(e => totaldeb.push(e.totaldeb))
            data.map(e => totalLiq.push(e.totalLiq))


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

            totalFormatDeb  = totaldeb.map(convertereal)

            totalFormatLiq  = totalLiq.map(convertereal)


            // console.log(totalFormatLiq)

            

            let dia = new Date()

            let ano = dia.getFullYear()

           
            loadGraficoTotalMesAno(mes, totalFormat, totalFormatDeb, totalFormatLiq, ano)   


    })

    

    function loadGraficoTotalMesAno(mes, total, totaldeb, totalFormatLiq, ano){


        
       
        // 


        const ctx = document.getElementById('myChart').getContext('2d');
        
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: mes,
                datasets: [
                    {
                        label: "Creditos",
                        data: total,
                        borderColor: "green",
                        fill: false
                    },
                    {
                        label: "Lucro Liquido",
                        data: totalFormatLiq,
                        borderColor: "blue",
                        fill: false
                    },
                    {
                        label:'Débitos',
                        data: totaldeb,
                        borderColor: "red",
                        fill: false
                    }
                    ]
                },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },

                title: {
                    display: true,
                    text: "Ano: "+ano
                  }
            }
        });
   
    }

});
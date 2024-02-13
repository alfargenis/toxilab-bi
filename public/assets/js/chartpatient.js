(function() {
    var canvas = document.getElementById('lineChart');
    var patientCountsJson = canvas.getAttribute('data-patient-counts');
    var ctx = canvas.getContext('2d');
    var months = "Ene,Feb,Mar,Abr,May,Jun,Jul,Ago,Sep,Oct,Nom,Dic";
    var monthsArray = months.split(",");
    var data = JSON.parse(patientCountsJson);

    var chartConfig = {
        type: 'line',
        data: {
            labels: monthsArray,
            datasets: [{
                label: 'Número de pacientes',
                data: data,
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderWidth: 2
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    };

    var lineChart = new Chart(ctx, chartConfig);
})();

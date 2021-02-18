<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajax</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css" integrity="sha512-/zs32ZEJh+/EO2N1b0PEdoA10JkdC3zJ8L5FTiQu82LR9S/rOQNfQN7U59U9BC12swNeRAz3HSzIL2vpp4fv3w==" crossorigin="anonymous" />
</head>
<body>

    <canvas id="myChart"></canvas>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" integrity="sha512-d9xgZrVZpmmQlfonhQUvTR7lMPtO7NkZMkA0ABN3PHCbKA5nqylQ/yWlFAyY6hYgdF1Qh6nYiuADWwKB4C2WSw==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

    <script>
        $(function () {

            const countOccurrences = (arr, val) => arr.reduce((a, v) => (v === val ? a + 1 : a), 0);

            $.ajax({
                type: "GET",
                url: "https://api.skyhub.com.br/orders?filters[statuses][]=payment_received",
                headers: {
                    'X-User-Email': '',
                    'X-Api-Key': '',
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                },
                dataType: "json",
                success: function (data) {

                    let totalApprovedOrders = data.total;
                    let newData = data.orders;

                    let shops = [];
                    let shopValues = [];

                    for (let index = 0; index < newData.length; index++)
                    {
                        shops.push(newData[index].channel);
                    }
                    shops[6] = 'Total de vendas';
                    //console.log(shops);
                    //return;

                    let availableBrands = {
                        0: "Lojas Americanas",
                        1: "Shoptime",
                        2: "Submarino"
                    };
                    
                    for (let index = 0; index < shops.length; index++)
                    {
                        shopValues.push(countOccurrences(shops, availableBrands[index]));
                    }
                    shopValues[6] = totalApprovedOrders;
                    //console.log(shopValues)
                    //return;

                    chart(shops, shopValues);
                }
            });

            function chart(shops, shopValues)
            {
                let backgroundColor = '#014f86';
                let borderColor = '#ccc';
                let hoverBackgroundColor = '#012a4a';

                var ctx = document.getElementById('myChart').getContext('2d');
                var chart = new Chart(ctx, {
                    // The type of chart we want to create
                    type: 'bar',

                    // The data for our dataset
                    data: {
                        labels: shops,
                        datasets: [{
                            label: 'Gráfico',
                            backgroundColor: backgroundColor,
                            borderColor: borderColor,
                            borderWidth: 2,
                            hoverBackgroundColor: hoverBackgroundColor,
                            data: shopValues
                        }]
                    },

                    // Configuration options go here
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            }
        });
    </script>
</body>
</html>

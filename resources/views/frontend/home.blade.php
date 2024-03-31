<x-frontend-template>
    <section class="section">
        <div class="row ">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-15">Total Product</h5>
                                        <h2 class="mb-3 font-18">{{ $total_product }}</h2>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                    <div class="banner-img">
                                        <img src="../assets/img/banner/1.png">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="align-items-center justify-content-between">
                            <div class="row ">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                                    <div class="card-content">
                                        <h5 class="font-15">Total Category</h5>
                                        <h2 class="mb-3 font-18">{{ $total_inventory }}</h2>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                                    <div class="banner-img">
                                        <img src="../assets/img/banner/2.png">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="container">
                <div class="col-md-6">
                    <canvas id="productChart" width="20px" height="15px"></canvas>
                <script>
                    // Retrieve the data passed from the controller
                    var products = @json($products);
                    // Extract the necessary data for the chart (e.g., product names, quantities, and prices)
                    var productNames = products.map(product => product.name);
                    var productQuantities = products.map(product => product.quantity);
                    var productManufacturePrices = products.map(product => product.manufacture_price);
                    var productSellingPrices = products.map(product => product.selling_price);

                    // Create a Chart.js chart
                    var ctx = document.getElementById('productChart').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: productNames,
                            datasets: [{
                                label: 'Product Quantities',
                                data: productQuantities,
                                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                borderColor: 'rgba(255, 99, 132, 1)',
                                borderWidth: 1
                            }, {
                                label: 'Manufacture Price',
                                data: productManufacturePrices,
                                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                borderColor: 'rgba(54, 162, 235, 1)',
                                borderWidth: 1
                            }, {
                                label: 'Selling Price',
                                data: productSellingPrices,
                                backgroundColor: 'rgba(255, 206, 86, 0.2)',
                                borderColor: 'rgba(255, 206, 86, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            },
                            tooltips: {
                                callbacks: {
                                    label: function (tooltipItem, data) {
                                        var datasetLabel = data.datasets[tooltipItem.datasetIndex].label || '';
                                        var value = tooltipItem.yLabel;
                                        if (datasetLabel === 'Product Quantities') {
                                            value += ' (Quantity)';
                                        } else {
                                            value += ' (Price)';
                                        }
                                        return datasetLabel + ': ' + value;
                                    }
                                }
                            }
                        }
                    });
                </script>
                </div>
            </div>


        </div>
    </section>
</x-frontend-template>

@extends('layouts.main.index')
@section('container')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    .chart-container {
        position: relative;
        height: 400px;
        margin-bottom: 30px;
    }

    .metrics-card {
        background: linear-gradient(135deg, #a29bfe 0%, #6c5ce7 100%);
        color: white;
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 20px;
        transition: all 0.3s ease;
        box-shadow: 0 8px 25px rgba(162, 155, 254, 0.3);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .metrics-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 35px rgba(162, 155, 254, 0.4);
    }
</style>

<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="fw-bold text-primary">Gestión integral de productos, ventas y análisis de rendimiento</h2>
        </div>
    </div>

    <!-- Métricas principales de productos -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="metrics-card text-center">
                <h4 class="fw-bold">1,847</h4>
                <p class="mb-0">Productos Activos</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="metrics-card text-center" style="background: linear-gradient(135deg, #fd79a8 0%, #e84393 100%); box-shadow: 0 8px 25px rgba(253, 121, 168, 0.3);">
                <h4 class="fw-bold">234</h4>
                <p class="mb-0">Stock Bajo</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="metrics-card text-center" style="background: linear-gradient(135deg, #00cec9 0%, #00b894 100%); box-shadow: 0 8px 25px rgba(0, 206, 201, 0.3);">
                <h4 class="fw-bold">$567K</h4>
                <p class="mb-0">Valor Inventario</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="metrics-card text-center" style="background: linear-gradient(135deg, #fdcb6e 0%, #f39c12 100%); box-shadow: 0 8px 25px rgba(253, 203, 110, 0.3);">
                <h4 class="fw-bold">87.3%</h4>
                <p class="mb-0">Rotación</p>
            </div>
        </div>
    </div>

    <!-- Primera fila de gráficas -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="card-title fw-bold">Productos por Categoría</h5>
                    <small class="text-muted">Distribución del catálogo</small>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="productCategoryChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="card-title fw-bold">Ventas por Producto Top</h5>
                    <small class="text-muted">Productos más vendidos</small>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="topProductsChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Segunda fila de gráficas -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="card-title fw-bold">Estado de Stock</h5>
                    <small class="text-muted">Niveles de inventario</small>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="stockStatusChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="card-title fw-bold">Rotación de Inventario</h5>
                    <small class="text-muted">Velocidad de movimiento por categoría</small>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="inventoryTurnoverChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tercera fila de gráficas -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="card-title fw-bold">Margen de Ganancia</h5>
                    <small class="text-muted">Rentabilidad por categoría</small>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="profitMarginChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="card-title fw-bold">Tendencia de Precios</h5>
                    <small class="text-muted">Evolución promedio últimos 6 meses</small>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="priceTrendChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Cuarta fila - Gráfica grande -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title fw-bold">Análisis Integral de Productos - Últimos 12 Meses</h5>
                    <small class="text-muted">Ventas, stock, rentabilidad y tendencias del mercado</small>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="comprehensiveProductChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Colores para gráficas de productos
        const productColors = ['#a29bfe', '#fd79a8', '#00cec9', '#fdcb6e', '#74b9ff', '#e17055', '#6c5ce7', '#55a3ff'];
        const gradientColors = [
            'rgba(162, 155, 254, 0.8)', 'rgba(253, 121, 168, 0.8)',
            'rgba(0, 206, 201, 0.8)', 'rgba(253, 203, 110, 0.8)',
            'rgba(116, 185, 255, 0.8)', 'rgba(225, 112, 85, 0.8)',
            'rgba(108, 92, 231, 0.8)', 'rgba(85, 163, 255, 0.8)'
        ];

        // 1. Gráfica de Productos por Categoría (Doughnut)
        const categoryCtx = document.getElementById('productCategoryChart').getContext('2d');
        new Chart(categoryCtx, {
            type: 'doughnut',
            data: {
                labels: ['Electrónicos', 'Ropa', 'Hogar', 'Deportes', 'Libros', 'Salud'],
                datasets: [{
                    data: [423, 312, 287, 198, 156, 89],
                    backgroundColor: productColors.slice(0, 6),
                    borderWidth: 0,
                    cutout: '65%'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 20,
                            usePointStyle: true
                        }
                    }
                }
            }
        });

        // 2. Top Productos (Horizontal Bar)
        const topProductsCtx = document.getElementById('topProductsChart').getContext('2d');
        new Chart(topProductsCtx, {
            type: 'bar',
            data: {
                labels: ['Laptop Pro X1', 'Smartphone Z5', 'Auriculares BT', 'Tablet Ultra', 'Monitor 4K'],
                datasets: [{
                    label: 'Unidades Vendidas',
                    data: [1847, 1623, 1456, 1289, 1134],
                    backgroundColor: gradientColors.slice(0, 5),
                    borderColor: productColors.slice(0, 5),
                    borderWidth: 2,
                    borderRadius: 6
                }]
            },
            options: {
                indexAxis: 'y',
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    x: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0,0,0,0.1)'
                        }
                    },
                    y: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });

        // 3. Estado de Stock (Pie)
        const stockCtx = document.getElementById('stockStatusChart').getContext('2d');
        new Chart(stockCtx, {
            type: 'pie',
            data: {
                labels: ['En Stock', 'Stock Bajo', 'Agotado', 'Sobrestock'],
                datasets: [{
                    data: [1289, 234, 67, 145],
                    backgroundColor: ['#00cec9', '#fdcb6e', '#fd79a8', '#a29bfe'],
                    borderWidth: 3,
                    borderColor: '#ffffff'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 20,
                            usePointStyle: true
                        }
                    }
                }
            }
        });

        // 4. Rotación de Inventario (Bar)
        const turnoverCtx = document.getElementById('inventoryTurnoverChart').getContext('2d');
        new Chart(turnoverCtx, {
            type: 'bar',
            data: {
                labels: ['Electrónicos', 'Ropa', 'Hogar', 'Deportes', 'Libros', 'Salud'],
                datasets: [{
                    label: 'Rotación Alta',
                    data: [156, 89, 134, 67, 45, 23],
                    backgroundColor: 'rgba(0, 206, 201, 0.8)',
                    borderColor: '#00cec9',
                    borderWidth: 1
                }, {
                    label: 'Rotación Media',
                    data: [198, 156, 112, 89, 78, 34],
                    backgroundColor: 'rgba(253, 203, 110, 0.8)',
                    borderColor: '#fdcb6e',
                    borderWidth: 1
                }, {
                    label: 'Rotación Baja',
                    data: [69, 67, 41, 42, 33, 32],
                    backgroundColor: 'rgba(253, 121, 168, 0.8)',
                    borderColor: '#fd79a8',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        stacked: true,
                        grid: {
                            display: false
                        }
                    },
                    y: {
                        stacked: true,
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0,0,0,0.1)'
                        }
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            usePointStyle: true,
                            padding: 15
                        }
                    }
                }
            }
        });

        // 5. Margen de Ganancia (Radar)
        const marginCtx = document.getElementById('profitMarginChart').getContext('2d');
        new Chart(marginCtx, {
            type: 'radar',
            data: {
                labels: ['Electrónicos', 'Ropa', 'Hogar', 'Deportes', 'Libros', 'Salud'],
                datasets: [{
                    label: 'Margen (%)',
                    data: [25, 45, 35, 40, 60, 55],
                    borderColor: '#a29bfe',
                    backgroundColor: 'rgba(162, 155, 254, 0.2)',
                    borderWidth: 3,
                    pointBackgroundColor: '#a29bfe',
                    pointBorderColor: '#ffffff',
                    pointBorderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    r: {
                        beginAtZero: true,
                        max: 70,
                        grid: {
                            color: 'rgba(0,0,0,0.1)'
                        },
                        ticks: {
                            callback: function(value) {
                                return value + '%';
                            }
                        }
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            usePointStyle: true,
                            padding: 20
                        }
                    }
                }
            }
        });

        // 6. Tendencia de Precios (Line)
        const priceCtx = document.getElementById('priceTrendChart').getContext('2d');
        new Chart(priceCtx, {
            type: 'line',
            data: {
                labels: ['Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                datasets: [{
                    label: 'Precio Promedio ($)',
                    data: [127.50, 132.80, 129.40, 135.20, 131.90, 138.70],
                    borderColor: '#fd79a8',
                    backgroundColor: 'rgba(253, 121, 168, 0.1)',
                    borderWidth: 4,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#fd79a8',
                    pointBorderColor: '#ffffff',
                    pointBorderWidth: 3,
                    pointRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: false,
                        grid: {
                            color: 'rgba(0,0,0,0.1)'
                        },
                        ticks: {
                            callback: function(value) {
                                return '$' + value.toFixed(2);
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });

        // 7. Análisis Integral (Multi-line)
        const comprehensiveCtx = document.getElementById('comprehensiveProductChart').getContext('2d');
        new Chart(comprehensiveCtx, {
            type: 'line',
            data: {
                labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                datasets: [{
                    label: 'Ventas ($K)',
                    data: [456, 523, 478, 612, 589, 678, 723, 654, 712, 789, 834, 901],
                    borderColor: '#a29bfe',
                    backgroundColor: 'rgba(162, 155, 254, 0.1)',
                    borderWidth: 3,
                    yAxisID: 'y',
                    tension: 0.4
                }, {
                    label: 'Unidades Vendidas',
                    data: [3456, 3789, 3234, 4123, 3987, 4567, 4789, 4234, 4678, 5123, 5456, 5789],
                    borderColor: '#fd79a8',
                    backgroundColor: 'rgba(253, 121, 168, 0.1)',
                    borderWidth: 3,
                    yAxisID: 'y1',
                    tension: 0.4
                }, {
                    label: 'Productos Nuevos',
                    data: [23, 18, 31, 27, 34, 29, 41, 36, 28, 33, 39, 45],
                    borderColor: '#00cec9',
                    backgroundColor: 'rgba(0, 206, 201, 0.1)',
                    borderWidth: 3,
                    yAxisID: 'y1',
                    tension: 0.4
                }, {
                    label: 'Rotación Promedio (%)',
                    data: [78, 82, 76, 87, 84, 91, 89, 85, 92, 88, 94, 87],
                    borderColor: '#fdcb6e',
                    backgroundColor: 'rgba(253, 203, 110, 0.1)',
                    borderWidth: 3,
                    yAxisID: 'y2',
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: {
                    mode: 'index',
                    intersect: false,
                },
                scales: {
                    y: {
                        type: 'linear',
                        display: true,
                        position: 'left',
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0,0,0,0.1)'
                        },
                        ticks: {
                            callback: function(value) {
                                return '$' + value + 'K';
                            }
                        }
                    },
                    y1: {
                        type: 'linear',
                        display: true,
                        position: 'right',
                        beginAtZero: true,
                        grid: {
                            drawOnChartArea: false
                        }
                    },
                    y2: {
                        type: 'linear',
                        display: false,
                        beginAtZero: true,
                        max: 100
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            usePointStyle: true,
                            padding: 20
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0,0,0,0.8)',
                        titleColor: '#ffffff',
                        bodyColor: '#ffffff',
                        borderColor: '#a29bfe',
                        borderWidth: 1
                    }
                }
            }
        });
    });
</script>
@endsection
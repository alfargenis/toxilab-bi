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
        background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
        color: white;
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 20px;
        transition: all 0.3s ease;
        box-shadow: 0 8px 25px rgba(255, 107, 107, 0.3);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .metrics-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 35px rgba(255, 107, 107, 0.4);
    }
</style>

<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="fw-bold text-danger">Seguimiento completo de compras, proveedores y gestión de inventario</h2>
        </div>
    </div>

    <!-- Métricas principales de compras -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="metrics-card text-center">
                <h4 class="fw-bold">$234,750</h4>
                <p class="mb-0">Total Compras Mes</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="metrics-card text-center" style="background: linear-gradient(135deg, #74b9ff 0%, #0984e3 100%); box-shadow: 0 8px 25px rgba(116, 185, 255, 0.3);">
                <h4 class="fw-bold">147</h4>
                <p class="mb-0">Órdenes Pendientes</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="metrics-card text-center" style="background: linear-gradient(135deg, #00cec9 0%, #00b894 100%); box-shadow: 0 8px 25px rgba(0, 206, 201, 0.3);">
                <h4 class="fw-bold">89.3%</h4>
                <p class="mb-0">Entregas a Tiempo</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="metrics-card text-center" style="background: linear-gradient(135deg, #fdcb6e 0%, #e17055 100%); box-shadow: 0 8px 25px rgba(253, 203, 110, 0.3);">
                <h4 class="fw-bold">23</h4>
                <p class="mb-0">Proveedores Activos</p>
            </div>
        </div>
    </div>

    <!-- Primera fila de gráficas -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="card-title fw-bold">Compras por Categoría</h5>
                    <small class="text-muted">Distribución del gasto mensual</small>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="categoryChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="card-title fw-bold">Evolución de Compras</h5>
                    <small class="text-muted">Tendencia últimos 6 meses</small>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="purchaseTrendChart"></canvas>
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
                    <h5 class="card-title fw-bold">Top Proveedores</h5>
                    <small class="text-muted">Por volumen de compras</small>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="suppliersChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="card-title fw-bold">Estado de Órdenes de Compra</h5>
                    <small class="text-muted">Seguimiento del proceso de adquisición</small>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="orderStatusChart"></canvas>
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
                    <h5 class="card-title fw-bold">Métodos de Pago</h5>
                    <small class="text-muted">Distribución por forma de pago</small>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="paymentChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="card-title fw-bold">Costos vs Presupuesto</h5>
                    <small class="text-muted">Análisis de desviaciones</small>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="budgetChart"></canvas>
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
                    <h5 class="card-title fw-bold">Análisis Detallado de Compras - Últimos 12 Meses</h5>
                    <small class="text-muted">Seguimiento completo de volumen, costos y eficiencia</small>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="detailedAnalysisChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Colores para gráficas de compras
        const purchaseColors = ['#ff6b6b', '#74b9ff', '#00cec9', '#fdcb6e', '#a29bfe', '#fd79a8', '#e17055', '#81ecec'];
        const gradientColors = [
            'rgba(255, 107, 107, 0.8)', 'rgba(116, 185, 255, 0.8)',
            'rgba(0, 206, 201, 0.8)', 'rgba(253, 203, 110, 0.8)',
            'rgba(162, 155, 254, 0.8)', 'rgba(253, 121, 168, 0.8)',
            'rgba(225, 112, 85, 0.8)', 'rgba(129, 236, 236, 0.8)'
        ];

        // 1. Gráfica de Compras por Categoría (Pie)
        const categoryCtx = document.getElementById('categoryChart').getContext('2d');
        new Chart(categoryCtx, {
            type: 'pie',
            data: {
                labels: ['Materias Primas', 'Equipos', 'Servicios', 'Suministros', 'Tecnología'],
                datasets: [{
                    data: [89750, 45200, 32800, 28950, 38050],
                    backgroundColor: purchaseColors.slice(0, 5),
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
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return context.label + ': $' + context.parsed.toLocaleString();
                            }
                        }
                    }
                }
            }
        });

        // 2. Evolución de Compras (Línea)
        const trendCtx = document.getElementById('purchaseTrendChart').getContext('2d');
        new Chart(trendCtx, {
            type: 'line',
            data: {
                labels: ['Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                datasets: [{
                    label: 'Compras ($)',
                    data: [198450, 223780, 234750, 198230, 245680, 267890],
                    borderColor: '#ff6b6b',
                    backgroundColor: 'rgba(255, 107, 107, 0.1)',
                    borderWidth: 4,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#ff6b6b',
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
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0,0,0,0.1)'
                        },
                        ticks: {
                            callback: function(value) {
                                return '$' + value.toLocaleString();
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

        // 3. Top Proveedores (Horizontal Bar)
        const suppliersCtx = document.getElementById('suppliersChart').getContext('2d');
        new Chart(suppliersCtx, {
            type: 'bar',
            data: {
                labels: ['TechCorp', 'Materiales SA', 'Equipos Pro', 'Suministros XY', 'Global Supply'],
                datasets: [{
                    label: 'Compras ($)',
                    data: [78450, 65230, 54780, 43290, 38920],
                    backgroundColor: gradientColors.slice(0, 5),
                    borderColor: purchaseColors.slice(0, 5),
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
                        },
                        ticks: {
                            callback: function(value) {
                                return '$' + value.toLocaleString();
                            }
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

        // 4. Estado de Órdenes (Stacked Bar)
        const statusCtx = document.getElementById('orderStatusChart').getContext('2d');
        new Chart(statusCtx, {
            type: 'bar',
            data: {
                labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun'],
                datasets: [{
                    label: 'Completadas',
                    data: [45, 52, 48, 61, 55, 67],
                    backgroundColor: 'rgba(0, 206, 201, 0.8)',
                    borderColor: '#00cec9',
                    borderWidth: 1
                }, {
                    label: 'En Proceso',
                    data: [12, 15, 18, 14, 16, 19],
                    backgroundColor: 'rgba(116, 185, 255, 0.8)',
                    borderColor: '#74b9ff',
                    borderWidth: 1
                }, {
                    label: 'Pendientes',
                    data: [8, 6, 9, 7, 11, 8],
                    backgroundColor: 'rgba(253, 203, 110, 0.8)',
                    borderColor: '#fdcb6e',
                    borderWidth: 1
                }, {
                    label: 'Canceladas',
                    data: [3, 2, 1, 4, 2, 3],
                    backgroundColor: 'rgba(255, 107, 107, 0.8)',
                    borderColor: '#ff6b6b',
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

        // 5. Métodos de Pago (Doughnut)
        const paymentCtx = document.getElementById('paymentChart').getContext('2d');
        new Chart(paymentCtx, {
            type: 'doughnut',
            data: {
                labels: ['Transferencia', 'Crédito 30 días', 'Crédito 60 días', 'Contado'],
                datasets: [{
                    data: [45, 30, 15, 10],
                    backgroundColor: ['#74b9ff', '#00cec9', '#fdcb6e', '#ff6b6b'],
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

        // 6. Costos vs Presupuesto (Radar)
        const budgetCtx = document.getElementById('budgetChart').getContext('2d');
        new Chart(budgetCtx, {
            type: 'radar',
            data: {
                labels: ['Materias Primas', 'Equipos', 'Servicios', 'Suministros', 'Tecnología', 'Logística'],
                datasets: [{
                    label: 'Presupuesto',
                    data: [90, 85, 80, 92, 88, 86],
                    borderColor: '#74b9ff',
                    backgroundColor: 'rgba(116, 185, 255, 0.2)',
                    borderWidth: 2
                }, {
                    label: 'Gasto Real',
                    data: [95, 82, 88, 89, 91, 84],
                    borderColor: '#ff6b6b',
                    backgroundColor: 'rgba(255, 107, 107, 0.2)',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    r: {
                        beginAtZero: true,
                        max: 100,
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
                            padding: 20
                        }
                    }
                }
            }
        });

        // 7. Análisis Detallado (Multi-line)
        const detailedCtx = document.getElementById('detailedAnalysisChart').getContext('2d');
        new Chart(detailedCtx, {
            type: 'line',
            data: {
                labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                datasets: [{
                    label: 'Volumen de Compras ($)',
                    data: [198450, 223780, 189650, 234560, 198230, 245680, 267890, 234750, 198450, 223780, 234750, 245680],
                    borderColor: '#ff6b6b',
                    backgroundColor: 'rgba(255, 107, 107, 0.1)',
                    borderWidth: 3,
                    yAxisID: 'y',
                    tension: 0.4
                }, {
                    label: 'Número de Órdenes',
                    data: [85, 92, 78, 105, 89, 112, 118, 97, 85, 92, 97, 105],
                    borderColor: '#74b9ff',
                    backgroundColor: 'rgba(116, 185, 255, 0.1)',
                    borderWidth: 3,
                    yAxisID: 'y1',
                    tension: 0.4
                }, {
                    label: 'Tiempo Promedio Entrega (días)',
                    data: [12, 11, 14, 10, 13, 9, 8, 11, 12, 10, 9, 8],
                    borderColor: '#00cec9',
                    backgroundColor: 'rgba(0, 206, 201, 0.1)',
                    borderWidth: 3,
                    yAxisID: 'y1',
                    tension: 0.4
                }, {
                    label: 'Satisfacción Proveedor (%)',
                    data: [88, 91, 86, 93, 89, 95, 97, 94, 88, 91, 94, 96],
                    borderColor: '#fdcb6e',
                    backgroundColor: 'rgba(253, 203, 110, 0.1)',
                    borderWidth: 3,
                    yAxisID: 'y1',
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
                                return '$' + value.toLocaleString();
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
                        borderColor: '#ff6b6b',
                        borderWidth: 1
                    }
                }
            }
        });
    });
</script>
@endsection
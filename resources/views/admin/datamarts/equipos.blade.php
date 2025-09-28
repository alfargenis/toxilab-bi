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
        background: linear-gradient(135deg, #00b894 0%, #00a085 100%);
        color: white;
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 20px;
        transition: all 0.3s ease;
        box-shadow: 0 8px 25px rgba(0, 184, 148, 0.3);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .metrics-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 35px rgba(0, 184, 148, 0.4);
    }
</style>

<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="fw-bold text-success">Control integral de equipos, mantenimiento y rendimiento operacional</h2>
        </div>
    </div>

    <!-- Métricas principales de equipos -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="metrics-card text-center">
                <h4 class="fw-bold">342</h4>
                <p class="mb-0">Equipos Activos</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="metrics-card text-center" style="background: linear-gradient(135deg, #6c5ce7 0%, #5f3dc4 100%); box-shadow: 0 8px 25px rgba(108, 92, 231, 0.3);">
                <h4 class="fw-bold">28</h4>
                <p class="mb-0">En Mantenimiento</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="metrics-card text-center" style="background: linear-gradient(135deg, #fd79a8 0%, #e84393 100%); box-shadow: 0 8px 25px rgba(253, 121, 168, 0.3);">
                <h4 class="fw-bold">94.7%</h4>
                <p class="mb-0">Disponibilidad</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="metrics-card text-center" style="background: linear-gradient(135deg, #fdcb6e 0%, #f39c12 100%); box-shadow: 0 8px 25px rgba(253, 203, 110, 0.3);">
                <h4 class="fw-bold">$156K</h4>
                <p class="mb-0">Costo Mantenimiento</p>
            </div>
        </div>
    </div>

    <!-- Primera fila de gráficas -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="card-title fw-bold">Equipos por Categoría</h5>
                    <small class="text-muted">Distribución del inventario</small>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="equipmentCategoryChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="card-title fw-bold">Estado Operacional</h5>
                    <small class="text-muted">Condición actual de equipos</small>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="operationalStatusChart"></canvas>
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
                    <h5 class="card-title fw-bold">Antigüedad de Equipos</h5>
                    <small class="text-muted">Distribución por años</small>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="equipmentAgeChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="card-title fw-bold">Mantenimientos por Mes</h5>
                    <small class="text-muted">Tendencia de mantenimiento preventivo y correctivo</small>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="maintenanceChart"></canvas>
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
                    <h5 class="card-title fw-bold">Disponibilidad por Departamento</h5>
                    <small class="text-muted">Rendimiento operacional</small>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="availabilityChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="card-title fw-bold">Costos de Mantenimiento</h5>
                    <small class="text-muted">Comparación mensual</small>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="maintenanceCostChart"></canvas>
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
                    <h5 class="card-title fw-bold">Análisis Integral de Equipos - Últimos 12 Meses</h5>
                    <small class="text-muted">Métricas de rendimiento, disponibilidad y costos</small>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="comprehensiveAnalysisChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Colores para gráficas de equipos
        const equipmentColors = ['#00b894', '#6c5ce7', '#fd79a8', '#fdcb6e', '#74b9ff', '#e17055', '#a29bfe', '#55a3ff'];
        const gradientColors = [
            'rgba(0, 184, 148, 0.8)', 'rgba(108, 92, 231, 0.8)',
            'rgba(253, 121, 168, 0.8)', 'rgba(253, 203, 110, 0.8)',
            'rgba(116, 185, 255, 0.8)', 'rgba(225, 112, 85, 0.8)',
            'rgba(162, 155, 254, 0.8)', 'rgba(85, 163, 255, 0.8)'
        ];

        // 1. Gráfica de Equipos por Categoría (Doughnut)
        const categoryCtx = document.getElementById('equipmentCategoryChart').getContext('2d');
        new Chart(categoryCtx, {
            type: 'doughnut',
            data: {
                labels: ['Maquinaria Industrial', 'Equipos de Oficina', 'Herramientas', 'Vehículos', 'Equipos Médicos'],
                datasets: [{
                    data: [89, 67, 124, 23, 39],
                    backgroundColor: equipmentColors.slice(0, 5),
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

        // 2. Estado Operacional (Pie)
        const statusCtx = document.getElementById('operationalStatusChart').getContext('2d');
        new Chart(statusCtx, {
            type: 'pie',
            data: {
                labels: ['Operativo', 'Mantenimiento', 'Fuera de Servicio', 'En Reparación'],
                datasets: [{
                    data: [324, 28, 8, 12],
                    backgroundColor: ['#00b894', '#fdcb6e', '#fd79a8', '#6c5ce7'],
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

        // 3. Antigüedad de Equipos (Bar)
        const ageCtx = document.getElementById('equipmentAgeChart').getContext('2d');
        new Chart(ageCtx, {
            type: 'bar',
            data: {
                labels: ['0-2 años', '3-5 años', '6-10 años', '11-15 años', '+15 años'],
                datasets: [{
                    label: 'Cantidad',
                    data: [67, 89, 124, 45, 17],
                    backgroundColor: gradientColors.slice(0, 5),
                    borderColor: equipmentColors.slice(0, 5),
                    borderWidth: 2,
                    borderRadius: 6
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

        // 4. Mantenimientos por Mes (Stacked Bar)
        const maintenanceCtx = document.getElementById('maintenanceChart').getContext('2d');
        new Chart(maintenanceCtx, {
            type: 'bar',
            data: {
                labels: ['Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                datasets: [{
                    label: 'Preventivo',
                    data: [23, 28, 25, 32, 29, 35],
                    backgroundColor: 'rgba(0, 184, 148, 0.8)',
                    borderColor: '#00b894',
                    borderWidth: 1
                }, {
                    label: 'Correctivo',
                    data: [8, 12, 15, 9, 11, 7],
                    backgroundColor: 'rgba(253, 203, 110, 0.8)',
                    borderColor: '#fdcb6e',
                    borderWidth: 1
                }, {
                    label: 'Emergencia',
                    data: [3, 2, 4, 1, 3, 2],
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

        // 5. Disponibilidad por Departamento (Radar)
        const availabilityCtx = document.getElementById('availabilityChart').getContext('2d');
        new Chart(availabilityCtx, {
            type: 'radar',
            data: {
                labels: ['Producción', 'Mantenimiento', 'Calidad', 'Logística', 'Administración', 'I+D'],
                datasets: [{
                    label: 'Disponibilidad (%)',
                    data: [96, 92, 98, 94, 97, 89],
                    borderColor: '#00b894',
                    backgroundColor: 'rgba(0, 184, 148, 0.2)',
                    borderWidth: 3,
                    pointBackgroundColor: '#00b894',
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
                        max: 100,
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

        // 6. Costos de Mantenimiento (Line)
        const costCtx = document.getElementById('maintenanceCostChart').getContext('2d');
        new Chart(costCtx, {
            type: 'line',
            data: {
                labels: ['Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                datasets: [{
                    label: 'Costo Total ($)',
                    data: [24500, 28750, 31200, 26800, 29500, 32100],
                    borderColor: '#6c5ce7',
                    backgroundColor: 'rgba(108, 92, 231, 0.1)',
                    borderWidth: 4,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#6c5ce7',
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

        // 7. Análisis Integral (Multi-line)
        const comprehensiveCtx = document.getElementById('comprehensiveAnalysisChart').getContext('2d');
        new Chart(comprehensiveCtx, {
            type: 'line',
            data: {
                labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                datasets: [{
                    label: 'Disponibilidad (%)',
                    data: [93, 95, 92, 96, 94, 97, 95, 94, 96, 97, 95, 94],
                    borderColor: '#00b894',
                    backgroundColor: 'rgba(0, 184, 148, 0.1)',
                    borderWidth: 3,
                    yAxisID: 'y',
                    tension: 0.4
                }, {
                    label: 'Eficiencia Operacional (%)',
                    data: [88, 91, 87, 93, 89, 95, 92, 90, 94, 96, 93, 91],
                    borderColor: '#6c5ce7',
                    backgroundColor: 'rgba(108, 92, 231, 0.1)',
                    borderWidth: 3,
                    yAxisID: 'y',
                    tension: 0.4
                }, {
                    label: 'Costo Mantenimiento ($K)',
                    data: [22, 25, 21, 28, 24, 30, 26, 29, 31, 27, 30, 32],
                    borderColor: '#fd79a8',
                    backgroundColor: 'rgba(253, 121, 168, 0.1)',
                    borderWidth: 3,
                    yAxisID: 'y1',
                    tension: 0.4
                }, {
                    label: 'Tiempo Parada (horas)',
                    data: [18, 12, 22, 8, 15, 6, 11, 14, 9, 7, 12, 13],
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
                        max: 100,
                        grid: {
                            color: 'rgba(0,0,0,0.1)'
                        },
                        ticks: {
                            callback: function(value) {
                                return value + '%';
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
                        borderColor: '#00b894',
                        borderWidth: 1
                    }
                }
            }
        });
    });
</script>
@endsection
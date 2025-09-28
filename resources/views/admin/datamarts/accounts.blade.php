@extends('layouts.main.index')
@section('container')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    .branding-info {
        display: none !important;
    }

    .chart-container {
        position: relative;
        height: 400px;
        margin-bottom: 30px;
    }

    .metrics-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }
</style>

<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="fw-bold text-primary">Análisis completo del comportamiento y estadísticas de clientes </h2>
        </div>
    </div>

    <!-- Métricas principales -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="metrics-card text-center">
                <h4 class="fw-bold">1,247</h4>
                <p class="mb-0">Clientes Activos</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="metrics-card text-center" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); box-shadow: 0 8px 25px rgba(240, 147, 251, 0.3);">
                <h4 class="fw-bold">$89,420</h4>
                <p class="mb-0">Ingresos Mensuales</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="metrics-card text-center" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); box-shadow: 0 8px 25px rgba(79, 172, 254, 0.3);">
                <h4 class="fw-bold">73.2%</h4>
                <p class="mb-0">Tasa de Retención</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="metrics-card text-center" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%); box-shadow: 0 8px 25px rgba(67, 233, 123, 0.3);">
                <h4 class="fw-bold">156</h4>
                <p class="mb-0">Nuevos este Mes</p>
            </div>
        </div>
    </div>

    <!-- Primera fila de gráficas -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="card-title fw-bold">Clientes por Edad</h5>
                    <small class="text-muted">Distribución demográfica</small>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="ageChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="card-title fw-bold">Ingresos por Trimestre</h5>
                    <small class="text-muted">Evolución financiera 2024</small>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="revenueChart"></canvas>
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
                    <h5 class="card-title fw-bold">Tipos de Cliente</h5>
                    <small class="text-muted">Segmentación por categoría</small>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="customerTypeChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="card-title fw-bold">Satisfacción del Cliente</h5>
                    <small class="text-muted">Puntuaciones mensuales de satisfacción</small>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="satisfactionChart"></canvas>
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
                    <h5 class="card-title fw-bold">Canales de Adquisición</h5>
                    <small class="text-muted">Fuentes de nuevos clientes</small>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="acquisitionChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="card-title fw-bold">Retención vs Churn</h5>
                    <small class="text-muted">Análisis de permanencia</small>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="retentionChart"></canvas>
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
                    <h5 class="card-title fw-bold">Actividad de Clientes - Últimos 12 Meses</h5>
                    <small class="text-muted">Seguimiento detallado de interacciones y transacciones</small>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="activityChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Colores personalizados para las gráficas
        const primaryColors = ['#667eea', '#f093fb', '#4facfe', '#43e97b', '#ffa726', '#ab47bc', '#26c6da', '#ff7043'];
        const gradientColors = [
            'rgba(102, 126, 234, 0.8)', 'rgba(240, 147, 251, 0.8)',
            'rgba(79, 172, 254, 0.8)', 'rgba(67, 233, 123, 0.8)',
            'rgba(255, 167, 38, 0.8)', 'rgba(171, 71, 188, 0.8)',
            'rgba(38, 198, 218, 0.8)', 'rgba(255, 112, 67, 0.8)'
        ];

        // 1. Gráfica de Clientes por Edad (Barras)
        const ageCtx = document.getElementById('ageChart').getContext('2d');
        new Chart(ageCtx, {
            type: 'bar',
            data: {
                labels: ['18-25', '26-35', '36-45', '46-55', '56-65', '65+'],
                datasets: [{
                    label: 'Número de Clientes',
                    data: [156, 324, 289, 198, 142, 87],
                    backgroundColor: gradientColors.slice(0, 6),
                    borderColor: primaryColors.slice(0, 6),
                    borderWidth: 2,
                    borderRadius: 8
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

        // 2. Gráfica de Ingresos por Trimestre (Línea)
        const revenueCtx = document.getElementById('revenueChart').getContext('2d');
        new Chart(revenueCtx, {
            type: 'line',
            data: {
                labels: ['Q1 2024', 'Q2 2024', 'Q3 2024', 'Q4 2024'],
                datasets: [{
                    label: 'Ingresos ($)',
                    data: [65420, 78930, 89420, 95650],
                    borderColor: '#667eea',
                    backgroundColor: 'rgba(102, 126, 234, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#667eea',
                    pointBorderColor: '#ffffff',
                    pointBorderWidth: 3,
                    pointRadius: 6
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

        // 3. Gráfica de Tipos de Cliente (Pie)
        const customerTypeCtx = document.getElementById('customerTypeChart').getContext('2d');
        new Chart(customerTypeCtx, {
            type: 'doughnut',
            data: {
                labels: ['Premium', 'Estándar', 'Básico', 'VIP'],
                datasets: [{
                    data: [245, 567, 334, 101],
                    backgroundColor: ['#667eea', '#f093fb', '#4facfe', '#43e97b'],
                    borderWidth: 0,
                    cutout: '60%'
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

        // 4. Gráfica de Satisfacción del Cliente (Área)
        const satisfactionCtx = document.getElementById('satisfactionChart').getContext('2d');
        new Chart(satisfactionCtx, {
            type: 'line',
            data: {
                labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                datasets: [{
                    label: 'Muy Satisfecho',
                    data: [4.2, 4.3, 4.1, 4.4, 4.5, 4.3, 4.6, 4.4, 4.7, 4.5, 4.8, 4.6],
                    borderColor: '#43e97b',
                    backgroundColor: 'rgba(67, 233, 123, 0.2)',
                    fill: true,
                    tension: 0.4
                }, {
                    label: 'Satisfecho',
                    data: [3.8, 3.9, 3.7, 4.0, 4.1, 3.9, 4.2, 4.0, 4.3, 4.1, 4.4, 4.2],
                    borderColor: '#4facfe',
                    backgroundColor: 'rgba(79, 172, 254, 0.2)',
                    fill: true,
                    tension: 0.4
                }, {
                    label: 'Neutral',
                    data: [3.2, 3.1, 3.3, 3.0, 2.9, 3.1, 2.8, 3.0, 2.7, 2.9, 2.6, 2.8],
                    borderColor: '#ffa726',
                    backgroundColor: 'rgba(255, 167, 38, 0.2)',
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 5,
                        grid: {
                            color: 'rgba(0,0,0,0.1)'
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
                    }
                }
            }
        });

        // 5. Gráfica de Canales de Adquisición (Polar Area)
        const acquisitionCtx = document.getElementById('acquisitionChart').getContext('2d');
        new Chart(acquisitionCtx, {
            type: 'polarArea',
            data: {
                labels: ['Redes Sociales', 'Google Ads', 'Referidos', 'Email Marketing', 'SEO Orgánico'],
                datasets: [{
                    data: [234, 189, 156, 123, 98],
                    backgroundColor: [
                        'rgba(102, 126, 234, 0.8)',
                        'rgba(240, 147, 251, 0.8)',
                        'rgba(79, 172, 254, 0.8)',
                        'rgba(67, 233, 123, 0.8)',
                        'rgba(255, 167, 38, 0.8)'
                    ],
                    borderWidth: 2,
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
                            padding: 15,
                            usePointStyle: true
                        }
                    }
                }
            }
        });

        // 6. Gráfica de Retención vs Churn (Barras mixtas)
        const retentionCtx = document.getElementById('retentionChart').getContext('2d');
        new Chart(retentionCtx, {
            type: 'bar',
            data: {
                labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun'],
                datasets: [{
                    label: 'Retención (%)',
                    data: [89, 91, 87, 93, 88, 94],
                    backgroundColor: 'rgba(67, 233, 123, 0.8)',
                    borderColor: '#43e97b',
                    borderWidth: 2,
                    yAxisID: 'y'
                }, {
                    label: 'Churn (%)',
                    data: [11, 9, 13, 7, 12, 6],
                    backgroundColor: 'rgba(240, 147, 251, 0.8)',
                    borderColor: '#f093fb',
                    borderWidth: 2,
                    yAxisID: 'y'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        type: 'linear',
                        display: true,
                        position: 'left',
                        beginAtZero: true,
                        max: 100,
                        grid: {
                            color: 'rgba(0,0,0,0.1)'
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
                    }
                }
            }
        });

        // 7. Gráfica de Actividad de Clientes (Línea múltiple grande)
        const activityCtx = document.getElementById('activityChart').getContext('2d');
        new Chart(activityCtx, {
            type: 'line',
            data: {
                labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
                datasets: [{
                    label: 'Nuevos Registros',
                    data: [156, 189, 167, 201, 234, 198, 278, 245, 289, 267, 298, 324],
                    borderColor: '#667eea',
                    backgroundColor: 'rgba(102, 126, 234, 0.1)',
                    borderWidth: 3,
                    fill: false,
                    tension: 0.4
                }, {
                    label: 'Transacciones',
                    data: [1245, 1456, 1398, 1567, 1689, 1534, 1789, 1678, 1834, 1723, 1956, 2034],
                    borderColor: '#43e97b',
                    backgroundColor: 'rgba(67, 233, 123, 0.1)',
                    borderWidth: 3,
                    fill: false,
                    tension: 0.4
                }, {
                    label: 'Interacciones',
                    data: [3456, 3789, 3567, 4123, 4456, 4234, 4789, 4567, 4934, 4712, 5123, 5456],
                    borderColor: '#f093fb',
                    backgroundColor: 'rgba(240, 147, 251, 0.1)',
                    borderWidth: 3,
                    fill: false,
                    tension: 0.4
                }, {
                    label: 'Soporte Técnico',
                    data: [89, 76, 92, 68, 84, 71, 95, 82, 78, 86, 73, 91],
                    borderColor: '#ffa726',
                    backgroundColor: 'rgba(255, 167, 38, 0.1)',
                    borderWidth: 3,
                    fill: false,
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
                        borderColor: '#667eea',
                        borderWidth: 1
                    }
                }
            }
        });

        // Función para ocultar elementos de Looker Studio
        function ocultarLookerStudio() {
            const elemento = document.querySelector('.branding-info');
            if (elemento) {
                elemento.style.display = 'none';
            }
        }

        const observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                ocultarLookerStudio();
            });
        });

        observer.observe(document.body, {
            childList: true,
            subtree: true
        });
        ocultarLookerStudio();
    });
</script>
@endsection
@extends('layouts.dashboard')
@section('content')

<div class="bg-blue-50 rounded-lg">
    <div class="p-5 text-2xl font-bold">
        <nav class="text-sm font-semibold mb-4 flex justify-between items-center">
            <ol class="list-reset flex">
                <li><a href="{{ route('dashboard') }}" class="text-gray-500 hover:text-gray-500">Home</a></li>
                <li><span class="mx-2">/</span></li>
                <li class="text-blue-600">Dashboard</li>
            </ol>
        </nav>  
        <h1>Welcome, {{ Auth::user()->username }}!</h1>
        <p class="mt-4 text-lg">Use the sidebar to navigate through different management sections.</p>
    </div>
</div>
<!-- Cards Section -->
    <div class="flex-1 text-2xl font-bold">
        
        <section>
            <div class="grid grid-cols-1 grid-rows-4 md:grid-rows-2 md:grid-cols-2 2xl:grid-cols-4 2xl:grid-rows-1 gap-5 mt-5">
                <div class="flex flex-col px-5 py-7 gap-y-5 bg-blue-100 rounded-xl text-navy-night">
                    <div>
                        <div class="bg-blue-500 rounded-full p-3 w-12 h-12 flex justify-center items-center">
                            <svg class="h-6 w-6 text-white " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor">
                                <path strokeLinecap="round" strokeLinejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h1 class="text-sm/5">Total Books</h1>
                        <h1 class="text-base/7 font-semibold" id="booksCount">Loading...</h1>
                    </div>
                </div>
                <div class="flex flex-col px-5 py-7 gap-y-5 bg-green-100 rounded-xl">
                    <div>
                        <div class="bg-green-500 rounded-full p-3 w-12 h-12 flex justify-center items-center">
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor">
                                <path strokeLinecap="round" strokeLinejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h1 class="text-sm/5">Total Users</h1>
                        <h1 class="text-base/7 font-semibold" id="usersCount">Loading...</h1>
                    </div>
                </div>
                <div class="flex flex-col px-5 py-7 gap-y-5 bg-yellow-100 rounded-xl">
                    <div>
                        <div class="bg-yellow-500 rounded-full p-3 w-12 h-12 flex justify-center items-center">
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor">
                                <path strokeLinecap="round" strokeLinejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0-3-3m3 3 3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h1 class="text-sm/5">Total Loans</h1>
                        <h1 class="text-base/7 font-semibold" id="loansCount">Loading...</h1>
                    </div>
                </div>
                <div class="flex flex-col px-5 py-7 gap-y-5 bg-red-100 rounded-xl">
                    <div>
                        <div class="bg-red-500 rounded-full p-3 w-12 h-12 flex justify-center items-center">
                            <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5} stroke="currentColor">
                                <path strokeLinecap="round" strokeLinejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h1 class="text-sm/5">Total Articles</h1>
                        <h1 class="text-base/7 font-semibold" id="articlesCount">Loading...</h1>
                    </div>
                </div>
            </div>
            <section class="mt-5">
                {{-- <h2 class="text-xl font-semibold mb-4">Loans Over Time</h2>
                <div class="bg-white p-6 rounded-lg shadow-md w-[500px] h-[300px] mx-auto border">
                    <canvas id="loansChart"></canvas>
                </div> --}}
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                    <!-- Area Chart Card -->
                    <div class="col-span-2 bg-white rounded-lg border shadow-lg dark:bg-gray-800 p-4 md:p-6">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-base font-bold text-gray-900 dark:text-gray-400">Loans Overtime</p>
                            </div>
                        </div>
                        <canvas id="area-chart" height="150"></canvas>
                    </div>
                    <!-- Donut Chart Card -->
                    <div class="bg-white rounded-lg border shadow-lg dark:bg-gray-800 p-4 md:p-6">
                        <div class="flex justify-between mb-3">
                            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white">Books</h5>
                        </div>
                        <canvas id="donut-chart" height="150"></canvas>
                    </div>
                </div>

            </section>
        </section>
        <!-- End Cards Section -->
        <!-- Line Chart Section -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', async () => {
            const token = localStorage.getItem('auth_token');

            console.log('Token:', token);
            try {
                const response = await fetch('http://127.0.0.1:8000/api/dashboard', {
                    headers: {
                        'Authorization': `Bearer ${token}`,
                        'Accept': 'application/json'
                    }
                });
                const data = await response.json();

                document.getElementById('booksCount').innerText = `${data.booksCount} Books`;
                document.getElementById('usersCount').innerText = `${data.usersCount} Users`;
                document.getElementById('loansCount').innerText = `${data.loansCount} Loans`;
                document.getElementById('articlesCount').innerText = `${data.articlesCount} Articles`;


                const donutChartCtx = document.getElementById('donut-chart').getContext('2d');
                const areaChartCtx = document.getElementById('area-chart').getContext('2d');
                // const ctx = document.getElementById('loansChart').getContext('2d');
                // const loansChart = new Chart(ctx, {
                //     type: 'line',
                //     data: {
                //         labels: data.loanDates,
                //         datasets: [{
                //             label: 'Loans',
                //             data: data.loanCounts,
                //             backgroundColor: 'rgba(54, 162, 235, 0.2)',
                //             borderColor: 'rgba(54, 162, 235, 1)',
                //             borderWidth: 1,
                //             fill: true,
                //             tension: 0.4 // Disarankan untuk smoothing garis
                //         }]
                //     },
                //     options: {
                //         responsive: true,
                //         scales: {
                //             x: {
                //                 title: {
                //                     display: true,
                //                     text: 'Date'
                //                 },
                //                 ticks: {
                //                     autoSkip: false, // Memastikan semua label terlihat
                //                     stepSize: 5 // Menentukan jarak antar label
                //                 }
                //             },
                //             y: {
                //                 title: {
                //                     display: true,
                //                     text: 'Number of Loans'
                //                 },
                //                 beginAtZero: true,
                //                 ticks: {
                //                     stepSize: 1 // Menentukan jarak antar angka di sumbu y
                //                 }
                //             }
                //         }
                //     }
                // });

                const areaChart = new Chart(areaChartCtx,{
                    type: 'line',
                    data:{
                        labels: data.loanDates,
                        datasets: [{
                            label: 'Loans',
                            data: data.loanCounts,
                            borderColor: "#4F46E5",
                            backgroundColor: "rgba(79, 70, 229, 0.2)",
                            borderWidth: 2,
                            fill: true
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: true,
                        scales: {
                            y: {
                                beginAtZero: true
                                
                            }
                        }
                    }
                });

                const donutChart = new Chart(donutChartCtx,{
                    type: 'doughnut',
                    data: {
                        labels: ["Fiction", "Non-Fiction", "Science", "History", "Others"],
                        datasets: [{
                            label: 'Books',
                            data: [30, 20, 15, 25, 10],
                            backgroundColor: ["#FF6384", "#36A2EB", "#FFCE56", "#4BC0C0", "#9966FF"]
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: true
                    }
                    
                });
                
                
            } catch (error) {
                console.error('Error fetching dashboard data:', error);
            }
        });
        

        
    </script>
    
@endsection
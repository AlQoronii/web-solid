@extends('layouts.dashboard')
@section('content')
        <div class="flex-1 p-10 text-2xl font-bold">
            <nav class="text-sm font-semibold mb-4 flex justify-between items-center">
                <ol class="list-reset flex">
                    <li><a href="{{ route('dashboard') }}" class="text-gray-500 hover:text-gray-500">Home</a></li>
                    <li><span class="mx-2">/</span></li>
                    <li class="text-blue-600">Dashboard</li>
                </ol>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600">{{ Auth::user()->username }}</span>
                    {{-- <img class="w-10 h-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"> --}}
                    <form method="POST" action="{{ route('logout') }}" onsubmit="event.preventDefault(); this.submit();">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Logout</button>
                    </form>
                </div>
            </nav>  
            <h1>Welcome, {{ Auth::user()->username }}!</h1>
            <p class="mt-4 text-lg">Use the sidebar to navigate through different management sections.</p>
            <!-- Cards Section -->
            <section>
                <div class="grid grid-cols-1 grid-rows-4 md:grid-rows-2 md:grid-cols-2 2xl:grid-cols-4 2xl:grid-rows-1 gap-5 mt-8">
                    <div class="flex flex-col px-5 py-7 gap-y-5 bg-white rounded-xl text-navy-night">
                        <div>
                            <div class="bg-blue-500 rounded-full p-3 w-12 h-12 flex justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zM12 2a10 10 0 100 20 10 10 0 000-20z" />
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h1 class="text-sm/5">Total Books</h1>
                            <h1 class="text-base/7 font-semibold">{{ $booksCount }} Books</h1>
                        </div>
                    </div>
                    <div class="flex flex-col px-5 py-7 gap-y-5 bg-white rounded-xl">
                        <div>
                            <div class="bg-green-500 rounded-full p-3 w-12 h-12 flex justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 19.121A3 3 0 007 20h10a3 3 0 001.879-.879l3-3A3 3 0 0022 14V7a3 3 0 00-.879-2.121l-3-3A3 3 0 0017 1H7a3 3 0 00-2.121.879l-3 3A3 3 0 001 7v7a3 3 0 00.879 2.121l3 3z" />
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h1 class="text-sm/5">Total Users</h1>
                            <h1 class="text-base/7 font-semibold">{{ $usersCount }} Users</h1>
                        </div>
                    </div>
                    <div class="flex flex-col px-5 py-7 gap-y-5 bg-white rounded-xl">
                        <div>
                            <div class="bg-yellow-500 rounded-full p-3 w-12 h-12 flex justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h1 class="text-sm/5">Total Loans</h1>
                            <h1 class="text-base/7 font-semibold">{{ $loansCount }} Loans</h1>
                        </div>
                    </div>
                    <div class="flex flex-col px-5 py-7 gap-y-5 bg-white rounded-xl">
                        <div>
                            <div class="bg-red-500 rounded-full p-3 w-12 h-12 flex justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zM12 2a10 10 0 100 20 10 10 0 000-20z" />
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h1 class="text-sm/5">Total Articles</h1>
                            <h1 class="text-base/7 font-semibold">{{ $articlesCount }} Articles</h1>
                        </div>
                    </div>
                </div>
                <section class="mt-10">
                    <h2 class="text-xl font-semibold mb-4">Loans Over Time</h2>
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <canvas id="loansChart"></canvas>
                    </div>
                </section>
    
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    const ctx = document.getElementById('loansChart').getContext('2d');
                    const loansChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: @json($loanDates),
                            datasets: [{
                                label: 'Loans',
                                data: @json($loanCounts),
                                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                borderColor: 'rgba(54, 162, 235, 1)',
                                borderWidth: 1,
                                fill: true,
                                tension: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                x: {
                                    title: {
                                        display: true,
                                        text: 'Date'
                                    },
                                    
                                },
                                y: {
                                    title: {
                                        display: true,
                                        text: 'Number of Loans'
                                    },
                                    beginAtZero: true,
                                    ticks: {
                                        autoSkip: true,
                                        maxTicksLimit: 10// Adjust this value as needed
                                    }
                                }
                            }
                        }
                    });
                </script>
            </section>
            <!-- End Cards Section -->
            <!-- Line Chart Section -->
            
        </div>
    </div>
@endsection
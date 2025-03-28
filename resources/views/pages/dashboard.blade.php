<x-basedashboard active_link="{{$active_link}}">

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12 mb-2">
                <div class="d-md-flex align-items-center mb-3 mx-2">
                    <div class="mb-md-0 mb-3">
                        <h3 class="font-weight-bold  text-white mb-0">LC BPO</h3>
                        <p class="mb-0">Today is {{ $data['today'] }}</p>
                    </div>
                </div>
            </div>

        </div>
        <div class="d-md-flex d-none flex-lg-row flex-column justify-content-evenly mt-4">
            
            {{-- <div class="card w-100 bg-gray-500 mx-3">
                <div class="card-header bg-gray-500 border-buttom border-dark border-1">
                    <div class="row text-dark">
                        <div class="col-lg-5 p-0">
                            <img src="{{asset('assets/img/mypic.jpg')}}" alt="" class="avatar avatar-xxl border-radius-xl mx-3">
                        </div>
                        <div class="col p-0">
                            <p class="fs-4 fw-bold text-dark"> Lloyd Jay Edradan </p>
                        </div>
                        
                    </div>
                </div>
                <div class="card-body ">
                    <p class="fs-3 fw-bold text-dark m-0">Nigth Shift</p>
                    <p class="mb-0 text-dark">10 PM - 6 AM</p>
                </div>
            </div> --}}



            <div class="card bg-gray-600 text-white w-100 mx-3">
               <div class="card-header bg-gray-600 border-bottom">
                    <div class="d-flex flex-row ">
                        <i class="px-3 bg-white border-radius-md bi bi-currency-rupee opacity-8 fs-1 text-dark"></i>
                    </div>
               </div>
               
               <div class="card-body">
                    <p class="fs-5 fw-bold  opacity-7">Ammount</p>
                    <p class="fs-5 opacity-10"> 
                        &#x20B9
                        <script>
                            let ammount = @json($data['ammount']);
                            document.write(ammount.toLocaleString());
                        </script>
                    </p>
               </div>
            </div>

            <div class="card bg-primary text-white w-100 mx-3">
               <div class="card-header bg-primary border-bottom">
                    <div class="d-flex flex-row ">
                        <i class="px-3 bg-white border-radius-md bi bi-clipboard-data opacity-8 fs-1 text-dark"></i>
                    </div>
               </div>

               <div class="card-body">
                    <p class="fs-5 fw-bold  opacity-6">Transactions</p>
                    <p class="fs-5 opacity-10">{{ $data['total'] }}</p>
               </div>
            </div>

            <div class="card bg-secondary text-white w-100 mx-3">
               <div class="card-header bg-secondary border-bottom">
                    <div class="d-flex flex-row ">
                        <i class="px-3 bg-white border-radius-md bi bi-credit-card opacity-8 fs-1 text-dark"></i>
                    </div>
                    
               </div>
               <div class="card-body">
                    <p class="fs-5 fw-bold  opacity-6">Debit</p>
                    <p class="fs-5 opacity-10">{{ $data['debit'] }}</p>
               </div>
            </div>


            <div class="card bg-success text-white w-100 mx-3">
               <div class="card-header bg-success border-bottom">
                    <div class="d-flex flex-row ">
                        <i class="px-3 bg-white border-radius-md bi bi-credit-card-2-back opacity-8 fs-1 text-dark"></i>
                    </div>
                    
               </div>
               <div class="card-body">
                    <p class="fs-5 fw-bold  opacity-6">Credit</p>
                    <p class="fs-5 opacity-10">{{ $data['credit'] }}</p>
               </div>
            </div>


            
        </div>
    </div>


    <div class="container-fluid d-md-block my-5 d-none">
        <div class="row">
            <div class="col">
                <h3 class="font-weight-bold mb-3 text-white">7 day traffic</h3>
                <div class="card bg-dark text-white">
                    <div class="card-body px-3 position-relative">
                        <div class="chart mb-2 ">
                            <canvas id="chart-bars" class="chart-canvas " height="80" width="auto"> </canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid d-md-block my-5 d-none">
        <div class="row">
            <div class="col">
                <h3 class="font-weight-bold mb-3 text-white">7 day ammount</h3>
                <div class="card bg-dark text-white">
                    <div class="card-body px-3 position-relative">
                        <div class="chart mb-2 ">
                            <canvas id="chart-bars-2" class="chart-canvas" height="80" width="auto"> </canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
   
        let data = @json($data['table']);
        console.log(data);
        
        let ctx = document.getElementById("chart-bars").getContext("2d");
        let ctx2 = document.getElementById("chart-bars-2").getContext("2d");

        new Chart(ctx, {
            type: "bar",
        
            data: {
                labels: data.date,
                datasets: [
                    {
                        label: "Transactions",
                        backgroundColor: "#377dff",
                        borderColor: "#ffffff",
                        data: data.count,
                        borderWidth: 1
                    },
                   
                ]
            },
            options: {
                scales: {
                    x: {
                        ticks: {
                            color: "#FF5733", // X-axis text color
                            font: { size: 14 }
                        },
                        grid: {
                            color: "white",
                        }
                    },
                    y: {
                        ticks: {
                            color: "#33FF57", // Y-axis text color
                            font: { size: 14 }
                        },
                        grid: {
                            color: "white",
                        },
                        beginAtZero: true,
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            color: "#007bff", // Legend text color
                            font: { size: 14 }
                        }
                    },
                    title: {
                        display: true,
                        text: "Transactions for the last 7 days",
                        color: "#ff9900", // Title text color
                        font: { size: 18 }
                    },
                    tooltip: {
                        bodyColor: "#FFFFFF", // Tooltip text color
                        titleColor: "#FFD700", // Tooltip title color
                        backgroundColor: "#333333" // Tooltip background color
                    }
                },
            },

            
        });

        new Chart(ctx2, {
            type: "bar",
        
            data: {
                labels: data.date,
                datasets: [
                    {
                        label: "INR",
                        backgroundColor: "#00ddff",
                        borderColor: "#ffffff",
                        data: data.ammount,
                        borderWidth: 1
                    },
                   
                ]
            },
            options: {
                scales: {
                    x: {
                        ticks: {
                            color: "#FF5733", // X-axis text color
                            font: { size: 14 }
                        },
                        grid: {
                            color: "white",
                        }
                    },
                    y: {
                        ticks: {
                            color: "#33FF57", // Y-axis text color
                            font: { size: 14 }
                        },
                        grid: {
                            color: "white",
                        },
                        beginAtZero: true,
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            color: "#007bff", // Legend text color
                            font: { size: 14 }
                        }
                    },
                    title: {
                        display: true,
                        text: "Ammounts for the last 7 days",
                        color: "#ff9900", // Title text color
                        font: { size: 18 }
                    },
                    tooltip: {
                        bodyColor: "#FFFFFF", // Tooltip text color
                        titleColor: "#FFD700", // Tooltip title color
                        backgroundColor: "#333333" // Tooltip background color
                    }
                },
            },

            
        });


  </script>



</x-basedashboard>
<x-basedashboard active_link="{{$active_link}}">
    <div class="container-fluid">
        <div class="my-1 px-2">
                

                    @if ($errors->any())
                        <div class="alert alert-danger text-center my-auto">
                            <ul class="my-auto py-auto">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    

        </div>
        <div class="card">
           
            


            <div class="card-header border-3 border-white border-bottom mx-2 px-0" style="--bs-border-opacity: .5;">
                <div class="container-fluid d-flex flex-row justify-content-between align-items-center">
                    <p class="fw-bold fs-3">Employees</p>
                
                    <form action="{{ route('employee_search') }}" method="get">
                        <div class="input-group mb-3 mx-5 pe-5">
                            <span class="input-group-text text-body">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z">
                                        
                                    </path>
                                </svg>
                            </span>
                            <input type="text" class="form-control form-control-sm" name="name" placeholder="Search">
                        </div>

                        <div class="input-group mb-3 mx-5 pe-5">
                            <button type="submit" class="btn btn-primary btn-sm">Search</button>
                        </div>

                    </form>
                        
                </div>
            </div>
            <div class="card-body px-2">
                <div class="p-0 table-responsive">
                    <table class="table text-center justify-content-center">
                        <thead>
                            <tr>
                                <th class="fw-bold text-white">Name</th>
                                <th class="fw-bold text-white">Date of Birth</th>
                                <th class="fw-bold text-white">Position</th>
                                <th class="fw-bold text-white">Access Level</th>
                            </tr>
                        </thead>
                        @foreach($employees as $employee)
                            <tr class="clickable-row" data-href="{{ route('employee_edit', ['id' => $employee->id]) }}">
                                <td class="text-white">{{$employee->fname . ' ' . $employee->mname . ' ' . $employee->lname}}</td>
                                <td class="text-white">{{$employee->dob}}</td>
                                <td class="text-white">{{config('positions')[$employee->position]['title'] }}</td>
                                <td class="text-white">{{config('positions')[$employee->position]['lvl']}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <div class="container-fluid d-flex flex-row justify-content-end">
                    <button class="btn btn-primary "><span><a class="text-white" href="{{ route('employee_create') }}">Add Employee</a></span></button>
                </div>
            </div>
        </div>

        
        
    </div>

    @if(session('success'))
        <!-- Modal -->
        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="successModalLabel">Success</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        
                        <p class="fs-5 text-dark fw-bold"> {{ session('success') }} </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>

     
    @endif
    
    @if(session('error'))

        <!-- Modal -->
        <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-danger" id="errorModalLabel">Error</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="fs-5 text-dark fw-bold"> {{ session('error') }} </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>

     
    @endif




    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Loaded');
            const rows = document.querySelectorAll('.clickable-row');
            rows.forEach(row => {
                row.addEventListener('click', () => {
                    window.location.href = row.dataset.href;
                });
            });

            let successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();

            let errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
                errorModal.show();

            console.log('errorModal');

        });
        

    </script>
</x-basedashboard>
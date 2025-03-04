<x-basedashboard active_link="{{$active_link}}">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header border-3 border-white border-bottom mx-2 px-0" style="--bs-border-opacity: .5;">
                <div class="container-fluid d-flex flex-row justify-content-between align-items-center">
                    <p class="fw-bold fs-3">Employees</p>

                    <form action="" method="get">
                        <div class="input-group mb-3 mx-5 pe-5">
                            <span class="input-group-text text-body">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path>
                                </svg>
                            </span>
                            <input type="text" class="form-control form-control-sm" placeholder="Search">
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
                                <th class="fw-bold text-white">Authentication Level</th>
                            </tr>
                        </thead>
                        @foreach($employees as $employee)
                        <tr>
                            <td class="text-white" >{{$employee->fname . ' ' . $employee->mname . ' ' . $employee->lname}}</td>
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
</x-basedashboard>
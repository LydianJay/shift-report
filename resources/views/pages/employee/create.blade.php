<x-basedashboard active_link="{{$active_link}}">


    <div class="container-fluid">
        <div class="card">
            <div class="card-header px-5 border-bottom py-2 mb-0">
                <p class="fs-4 fw-bold">Add Employee</p>
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
                    @isset($success)

                        @if ($success->any())
                            <div class="alert alert-success text-center my-auto">
                                <ul class="my-auto py-auto">
                                    @foreach ($success->all() as $msg)
                                        <li>{{ $msg }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    @endisset

                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('employee_store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col mx-5">
                            <div class="container-sm d-flex  flex-start flex-column justify-content-between align-items-start px-0">
                                <p class="fs-6 p-0 m-0">First Name</p>
                                <div class="input-group my-1">
                                    <input type="text" class="form-control form-control-sm" placeholder="Juan" name="fname">
                                </div>
                                <p class="fs-6 p-0 m-0">Middle Name</p>
                                <div class="input-group my-1">
                                    <input type="text" class="form-control form-control-sm" placeholder="Dela" name="mname">
                                </div>
                                <p class="fs-6 p-0 m-0">Last Name</p>
                                <div class="input-group my-1">
                                    <input type="text" class="form-control form-control-sm" placeholder="Cruz" name="lname">
                                </div>
                                <p class="fs-6 p-0 m-0">Date of birth</p>
                                <div class="input-group my-1">
                                    <input type="date" class="form-control form-control-sm" placeholder="Cruz" name="dob">
                                </div>
                                <p class="fs-6 p-0 m-0">Position</p>
                                <div class="input-group my-1">
                                    <select class="form-control form-control-sm" name="position" id="">
                                        @foreach(config('positions') as $key => $position)
                                            @if($position['lvl'] <= 5)
                                                <option value="{{$key}}">{{$position['title']}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col mx-5">
                            <div class="container-sm d-flex  flex-start flex-column justify-content-between align-items-start px-0">
                                <p class="fs-6 p-0 m-0">Email</p>
                                <div class="input-group my-1">
                                    <input type="email" class="form-control form-control-sm" name="email">
                                </div>
                                <p class="fs-6 p-0 m-0">Contact No.</p>
                                <div class="input-group my-1">
                                    <input type="number" class="form-control form-control-sm" name="contactno">
                                </div>
                                <p class="fs-6 p-0 m-0">Password</p>
                                <div class="input-group my-1">
                                    <input type="password" class="form-control form-control-sm" name="password">
                                </div>
                                <p class="fs-6 p-0 m-0">Confirm Password</p>
                                <div class="input-group my-1">
                                    <input type="password" class="form-control form-control-sm" name="password_confirmation">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid d-flex flex-row justify-content-center mt-4 border-top pt-3">
                        <button type="submit" class="btn btm-sm btn-primary">Add</button>
                    </div>
                    
                    
                </form>


            </div>
        </div>


    </div>


</x-basedashboard>
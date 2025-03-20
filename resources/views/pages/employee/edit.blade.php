<x-basedashboard active_link="{{$active_link}}">
    <div class="container-fluid px-3">
        <div class="card bg-gray-700">
            <div class="card-header bg-gray-700 px-5 border-bottom py-2 mb-0">
                <p class="fs-4 fw-bold">Edit Employee</p>
            </div>

            <div class="card-body">
                <form action="{{ route('employee_update', [ 'id' => $employee->id  ]) }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col mx-5">
                            <div class="container-sm d-flex  flex-start flex-column justify-content-between align-items-start px-0">
                                <p class="fs-6 p-0 m-0">First Name</p>
                                <div class="input-group my-1">
                                    <input type="text" class="form-control form-control-sm" value="{{ $employee->fname }}" name="fname">
                                </div>
                                <p class="fs-6 p-0 m-0">Middle Name</p>
                                <div class="input-group my-1">
                                    <input type="text" class="form-control form-control-sm" value="{{ $employee->mname }}" name="mname">
                                </div>
                                <p class="fs-6 p-0 m-0">Last Name</p>
                                <div class="input-group my-1">
                                    <input type="text" class="form-control form-control-sm" value="{{ $employee->lname }}" name="lname">
                                </div>
                                <p class="fs-6 p-0 m-0">Date of birth</p>
                                <div class="input-group my-1">
                                    <input type="date" class="form-control form-control-sm" value="{{ $employee->dob }}" name="dob">
                                </div>
                            </div>
                        </div>
                        <div class="col mx-5">
                            <div class="container-sm d-flex  flex-start flex-column justify-content-between align-items-start px-0">
                                <p class="fs-6 p-0 m-0">Email</p>
                                <div class="input-group my-1">
                                    <input type="email" class="form-control form-control-sm" value="{{ $employee->email }}" name="email">
                                </div>
                                <p class="fs-6 p-0 m-0">Contact No.</p>
                                <div class="input-group my-1">
                                    <input type="number" class="form-control form-control-sm" value="{{ $employee->contactno }}" name="contactno">
                                </div>
                                <p class="fs-6 p-0 m-0">Position</p>
                                <div class="input-group my-1">
                                    <select class="form-control form-control-sm" name="position" id="">
                                        @foreach(config('positions') as $key => $position)


                                            @if($position['lvl'] <= 5)
                                                @if($employee->position == $key)
                                                    <option value="{{$key}}" selected>{{$position['title']}}</option>
                                                @else
                                                    <option value="{{$key}}">{{$position['title']}}</option>
                                                @endif
                                            @endif


                                        @endforeach

                                        @if (config('positions')[$employee->position]['lvl'] > 5)
                                            <option value="{{$employee->position}}" selected>{{config('positions')[$employee->position]['title']}}</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid d-flex flex-row justify-content-between mt-4 border-top pt-3">
                        <button type="submit" class="btn btm-sm btn-primary">Edit</button>
                        <button type="button" class="btn btm-sm btn-danger" data-bs-toggle="modal" data-bs-target="#confirm_modal">Delete</button>
                    </div>

                    
                    
                </form>


            </div>

        </div>
        

    </div>

    {{-- Modal --}}
    <div class="modal" tabindex="-1" id="confirm_modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-danger fw-bold fs-5">Are you sure?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <a href="{{ route('employee_delete', [ 'id' => $employee->id  ] ) }}" class="btn btn-danger">Yes</a>
                </div>
            </div>
        </div>
    </div>
    {{-- End Modal --}}

    
    
</x-basedashboard>
<x-basedashboard active_link="{{$active_link}}">
        <script src="{{ asset('assets/js/insert.js') }}"> </script>

        <div class="card">
           
            <div class="card-header border-3 border-white border-bottom mx-2 px-0" style="--bs-border-opacity: .5;">
                <div class="container-fluid d-flex flex-row justify-content-between align-items-center">
                    <p class="fw-bold fs-3">Transactions</p>
                
                    <form action="" method="get">
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
                <div class="container-fluid d-flex flex-column justify-content-start">
                    <div class="row">
                        <div class="col-4">
                            <label class="text-white opacity-8 me-1 my-0">Bank file statement <span class="opacity-5 ms-5">max size 64MB</span></label>
                            <div class="input-group m-0 p-0  align-items-center">
                                <input type="file" name="file" id="file" class="form-control">
                                <button type="button" class="btn btn-primary m-0" data-bs-toggle="modal" data-bs-target="#uploadmodal" onclick="handleFile('{{ route('transactions_upload') }}')"><span> <i class="bi bi-upload ms-1 me-2"></i> </span>Upload</button>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="card-body px-2">
                <div class="p-0 table-responsive">
                    <table class="table text-center justify-content-center">
                        <thead>
                            <tr>
                                @foreach($table_title as $title)
                                    <th class="fw-bold text-white">{{$title}}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $d)
                                <tr>
                                    <td class="text-white"> {{ $d->upi_rrn }} </td>
                                    <td class="text-white"> {{ $d->amount }} </td>
                                    <td class="text-white"> {{ $d->created_at }} </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer border-top border-3 border-white">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                             <p class="fw-bold fs-7 opacity-7">Page {{ $current_page }} of {{ $count }}</p>
                        </div>
                        <div class="col-2">
                            <div class="container-fluid d-flex flex-row justify-content-between">
                                <a class="text-white btn btn-outline-white" href="{{ route('transactions', ['page' => ($current_page-1) ]) }}">Prev</a>
                                <a class="text-white btn btn-outline-white" href="{{ route('transactions', ['page' => ($current_page+1) ]) }}">Next</a>
                            </div>
                        </div>
                    </div>
                    
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


    <div class="modal fade" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" id="uploadmodal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Uploading Bank Statement</h5>
                </div>
                <div class="modal-body">
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated" id="progbar" role="progressbar" aria-label="Progress" style="width: 0%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-basedashboard>
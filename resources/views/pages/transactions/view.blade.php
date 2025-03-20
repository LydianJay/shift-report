<x-basedashboard active_link="{{$active_link}}">
        <script src="{{ asset('assets/js/insert.js') }}"> </script>

        <div class="card bg-gray-700">
           
            <div class="card-header bg-gray-700 border-3 border-white border-bottom mx-2 px-0" style="--bs-border-opacity: .5;">
                <div class="container-fluid d-flex flex-row justify-content-between align-items-center">
                    <p class="fw-bold fs-3">Transactions</p>
                </div>
                <div class="container-fluid d-flex flex-column justify-content-start">
                    <div class="row">
                        <div class="col-4">
                            <label class="text-white opacity-8 me-1 my-0">Bank file statement <span class="opacity-5 ms-5">max size 64MB</span></label>
                            <div class="input-group m-0 p-0  align-items-center">
                                <input type="file" name="file" id="file" class="form-control">
                                <button type="button" class="btn btn-primary m-0" data-bs-toggle="modal" data-bs-target="#uploadmodal" onclick="handleFile('{{ route('transactions_upload') }}' )"><span> <i class="bi bi-upload ms-1 me-2"></i> </span>Upload</button>
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
                                <th class="fw-bold text-white">
                                    <form action="" method="get">
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-sm" name="upi_search" placeholder="Search">
                                        </div>
                                    </form>
                                </th>
                                <th></th> 
                                <th>
                                    <select name="" id="" class="form-control form-control-sm fw-bold">
                                        <option value="1">Credit</option>
                                        <option value="0">Debit</option>
                                        <option value="3" selected>No Filter</option>
                                    </select>
                                </th> 
                                
                                <th>
                                    <form action="" method="get">
                                        <div class="d-flex flex-column justify-content-center align-items-start">
                                            <label for="" class="text-white">From</label>
                                            <div class="input-group">
                                                <input type="date" class="form-control form-control-sm" name="date_from">
                                            </div>
                                            <label for="" class="text-white">To</label>
                                            <div class="input-group">
                                                <input type="date" class="form-control form-control-sm" name="date_to">
                                            </div>
                                        </div>
                                        
                                    </form>

                                </th>
                                <th></th>
                            </tr>
                            <tr>
                                @foreach($table_title as $title)
                                    <th class="fw-bold text-white">{{$title}}</th>
                                @endforeach
                            </tr>
                            
                        </thead>
                        <tbody>
                            @foreach($data as $d)
                                <tr class="{{ $d->iscredit == 1 ? 'bg-primary' : 'bg-secondary' }} border">
                                    <td class="text-white"> {{ $d->upi_rrn }} </td>
                                    <td class="text-white"> 
                                        <script>
                                            var val = {{ $d->ammount }};
                                            document.write( val.toLocaleString() ) 
                                        </script> INR 
                                    </td>
                                    <td class="text-white"> {{ $d->iscredit == 1 ? 'Credit' : 'Debit' }} </td>
                                    <td class="text-white"> {{ $d->created_at }} </td>

                                    <td class="text-white"> {{ $d->fname .' '. $d->mname . ' ' . $d->lname }} </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer border-top border-3 border-white">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col ">
                             <p class="fw-bold fs-7 opacity-7 @if($count <= 0) {{ 'd-none' }}  @endif">Page {{ $current_page }} of {{ $count }}</p>
                        </div>
                        <div class="col">
                            <div class="container-fluid d-flex flex-row justify-content-center @if($count <= 0 || $current_page < 4) {{ 'd-none' }}  @endif">
                                @for($i = $current_page - 3; $i <= $current_page+3; $i++)
                                    <a href="{{ route('transactions', ['page' => ($i) ]) }}" class=" btn btn-sm @if($i == $current_page) {{ 'btn-white text-dark opacity-7' }} @else {{ 'btn-outline-white text-white'}} @endif mx-1">{{$i}}</a>
                                @endfor
                            </div>
                        </div>
                        <div class="col">
                            <div class="container-fluid d-flex flex-row justify-content-end @if($count <= 0) {{ 'd-none' }}  @endif">
                                <a class="text-white btn btn-outline-white mx-2 @if($current_page <= 1)  {{ 'disabled' }} @endif" href="{{ route('transactions', ['page' => ($current_page-1) ]) }}">Prev</a>
                                <a class="text-white btn btn-outline-white mx-2 @if($current_page >= $count)  {{ 'disabled' }} @endif" href="{{ route('transactions', ['page' => ($current_page+1) ]) }}">Next</a>
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
<x-basedashboard active_link="{{$active_link}}">
        <script src="{{ asset('assets/js/insert.js') }}"> </script>

        <div class="card bg-gray-700 mx-2">
           
            <div class="card-header bg-gray-700 border-3 border-white border-bottom mx-2 px-0" style="--bs-border-opacity: .5;">
                <div class="container-fluid d-flex flex-row justify-content-between align-items-center">
                    <p class="fw-bold fs-3">Transactions</p>
                </div>
                <div class="container-fluid d-flex flex-column justify-content-start">
                    <div class="row">
                        <div class="col-4">
                            <label class="text-white opacity-8 me-1 my-0">Bank file statement <span class="opacity-5 ms-5">.txt, .xls</span></label>
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
                                <form action="" method="get">


                                    <th class="fw-bold text-white">
                                        <div class="input-group">
                                            <input type="number" class="form-control form-control-sm" name="search" placeholder="Search" value="{{ isset($filter['search']) ? $filter['search'] : '' }}">
                                        </div>
                                    </th>
                                    <th class="px-0">
                                        <div class="input-group w-50 mx-auto">
                                            <input type="number" class="form-control form-control-sm" name="ammount" value="{{ isset($filter['ammount']) ? $filter['ammount'] : '' }}">
                                        </div>
                                    </th> 
                                    <th>
                                        <select name="type" id="" class="form-control form-control-sm fw-bold">
                                            <option value="3" selected>All</option>
             
                                            @foreach ($select as $key => $value)
                                                <option value="{{$key}}" @if(isset($filter['type']) && $filter['type'] == $key) {{ 'selected' }} @endif>{{$value}}</option>
                                            @endforeach

                                        </select>
                                    </th> 
                                    
                                    <th>
                                        <div class="d-flex flex-column justify-content-center align-items-start">
                                            <label for="" class="text-white">From</label>
                                            <div class="input-group">
                                                @if (isset($filter['from']))
                                                    <input type="date" class="form-control form-control-sm" name="from" value="{{ date('Y-m-d', strtotime($filter['from']) ) }}">
                                                @else
                                                    <input type="date" class="form-control form-control-sm" name="from">
                                                @endif
                                            </div>
                                            <label for="" class="text-white">To</label>
                                            <div class="input-group">
                                                @if (isset($filter['to']))
                                                    <input type="date" class="form-control form-control-sm" name="to" value="{{ date('Y-m-d', strtotime($filter['to']) ) }}">
                                                @else
                                                    <input type="date" class="form-control form-control-sm" name="to">
                                                @endif
                                            </div>
                                            
                                        </div>
                                            
                                    </th>


                                    <th>
                                        <button type="submit" class="btn-sm btn btn-primary mx-1">Filter</button>
                                        <a type="button" class="btn-sm btn btn-secondary mx-1" href=" {{ route('transactions') }} ">Clear</a>
                                    </th>
                                </form>

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
                                    <td class="text-white">&#x20B9 {{ number_format($d->ammount, 2) }}</td>
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
                             <p class="fw-bold fs-7 opacity-7 @if($page_count <= 0) {{ 'd-none' }}  @endif">Page {{ $current_page }} of {{ $page_count }}</p>
                        </div>
                        <div class="col">
                            <div class="container-fluid d-flex flex-row justify-content-center">
                                @for($i = $current_page - 3; $i <= ($current_page+3) ; $i++)
                                    @if($i <= 0 || $i > $page_count) @continue @endif
                                    
                                    <a href="{{ route('transactions', ['page' => ($i) ]) }}" class=" btn btn-sm @if($i == $current_page) {{ 'btn-white text-dark opacity-7' }} @else {{ 'btn-outline-white text-white'}} @endif mx-1">{{$i}}</a>
                                @endfor
                            </div>
                        </div>
                        <div class="col">
                            <div class="container-fluid d-flex flex-row justify-content-end @if($page_count <= 0) {{ 'd-none' }}  @endif">
                                <a class="text-white btn btn-outline-white mx-2 @if($current_page <= 1)  {{ 'disabled' }} @endif" href="{{ route('transactions', array_merge(request()->query(), ['page' => $current_page - 1]) ) }}">Prev</a>
                                <a class="text-white btn btn-outline-white mx-2 @if($current_page >= $page_count)  {{ 'disabled' }} @endif" href="{{ route('transactions', array_merge(request()->query(), ['page' => $current_page + 1]) ) }}">Next</a>
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



    {{-- JS Error Message --}}

    <div class="modal fade" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" id="js_error" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger">Upload Failed - Possible Duplicate</h5>
                </div>
                <div class="modal-body">
                    <div class="progress">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    {{-- END --}}

</x-basedashboard>
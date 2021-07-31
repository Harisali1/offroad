<div class="content">
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card-box shadow">
                    <div class="row">
                        <div class="col-8">
                            <select id="inputState" class="w-25 d-inline form-control">
                                <option>Bulk</option>
                                <option>Activate</option>
                                <option>Deactivate</option>
                                <option>Delete</option>
                            </select>
                            <button type="button" id="activate" class="btn btn-success ">Activate</button>
                            <button onclick="deleteAll()" type="button" class="btn btn-danger "><i
                                    class="fas fa-trash-alt"></i></button>
                        </div>
                        <div class="col-4">
                            <div class="text-muted text-right font-14 mb-3">
                                <a href="{{route('admin.mileage.create')}}" class="btn btn-primary ">Create</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1">
                            <label>Per Page:</label>
                            <select wire:model="perPage" class="form-control">
                                <option>10</option>
                                <option>15</option>
                                <option>25</option>
                            </select>
                        </div>
                        <div class="col-md-4 ml-auto">
                            <label>Search:</label>
                            <input type="text" wire:model="search" name="search" placeholder="Search by Title"
                                   class="form-control">
                        </div>
                    </div>
                    @if(count($mileages) > 0 )
                        <h4 class="mt-0 header-title"></h4>
                        <table id="datatable" class="table table-bordered table-striped nowrap">
                            <thead>
                            <tr>
                                <th style="width: 10px;"><input onclick="checkAll(this)" id="checkbox0"
                                                                type="checkbox"></th>
                                <th style="width: 20px;">S.no</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($mileages as $key=>$mileage)
                                <tr>
                                    <td>
                                        <input
                                            id="checkbox{{ $mileage->id }}"
                                            wire:click="toggleMileage({{ $mileage->id }})"
                                            type="checkbox">
                                    </td>
                                    <td>{{($mileages->currentpage()-1) * $mileages->perpage() + $key + 1}}</td>
                                    <td>{{$mileage->from}}</td>
                                    <td>{{$mileage->to}}</td>
                                    <td>
                                        @if($mileage->status===1)
                                            <span
                                                class="badge badge-success"
                                                style="cursor: pointer;"
                                                wire:click="status({{ $mileage->id }})"
                                            >Active</span>
                                        @else
                                            <span
                                                class="badge badge-danger"
                                                style="cursor: pointer;"
                                                wire:click="status({{ $mileage->id }})"
                                            >Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('admin.mileage.edit',$mileage->id)}}"
                                           class="btn  btn-info btn-xs"> <i class="fas fa-pen"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $mileages->links() }}
                    @else
                        <div class="card-body">
                            <div class="alert alert-danger">
                                No Record Found !
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div> <!-- end row -->
    </div>
    <!-- container-fluid -->
</div>

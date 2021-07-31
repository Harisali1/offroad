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
                                <a href="{{route('admin.make.create')}}" class="btn btn-primary ">Create</a>
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
                    @if(count($makes) > 0 )
                        <h4 class="mt-0 header-title"></h4>
                        <table id="datatable" class="table table-bordered table-striped nowrap">
                            <thead>
                            <tr>
                                <th style="width: 10px;"><input onclick="checkAll(this)" id="checkbox0"
                                                                type="checkbox"></th>
                                <th style="width: 20px;">S.no</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($makes as $key=>$make)
                                <tr>
                                    <td>
                                        <input
                                            id="checkbox{{ $make->id }}"
                                            wire:click="toggleMake({{ $make->id }})"
                                            type="checkbox">
                                    </td>
                                    <td>{{($makes->currentpage()-1) * $makes->perpage() + $key + 1}}</td>
                                    <td>{{$make->title}}</td>
                                    <td>
                                        <img src="{{$make->getImagePath("image")}}"
                                             alt="product-img" height="100" width="150">
                                    </td>
                                    <td>
                                        @if($make->status===1)
                                            <span
                                                class="badge badge-success"
                                                style="cursor: pointer;"
                                                wire:click="status({{ $make->id }})"
                                            >Active</span>
                                        @else
                                            <span
                                                class="badge badge-danger"
                                                style="cursor: pointer;"
                                                wire:click="status({{ $make->id }})"
                                            >Inactive</span>
                                        @endif
                                    </td>
                                    <td><a href="{{route('admin.make.edit',$make->id)}}"
                                           class="btn  btn-info btn-xs"> <i class="fas fa-pen"></i></a></td>
                                </tr>

                            </tbody>
                            @endforeach
                        </table>
                        {{ $makes->links() }}
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

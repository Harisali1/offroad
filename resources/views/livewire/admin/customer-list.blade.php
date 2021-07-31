<div class="content">
    @include('livewire.admin.customer-show', $customer)
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card-box shadow">
                    <div class="site-header">
                        <div id="search-form" class="search-form js-search-form">
                            <div class="input-group">
                                <input type="text" wire:model="search" name="search" class="form-control"
                                       placeholder="Search by name, contact, email ..."/>
                                <span class="input-group-btn">
                                    <button class="btn btn-info" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <div class="card-box shadow mt-4">
                    <div class="row">
                        <div class="col-8">
                            <select id="inputState" class="w-25 d-inline form-control">
                                <option>Bulk</option>
                                <option>DeActivate</option>
                                <option>Deactivate</option>
                                <option>Delete</option>
                            </select>
                            <button type="button" id="activate" class="btn btn-success ">Activate</button>
                            <button  onclick="deleteAll()" type="button" class="btn btn-danger "><i
                                    class="fas fa-trash-alt"></i></button>
                        </div>
                        <div class="col-4">
                            <div class="text-muted text-right font-14 mb-3">
                                <a href="{{ route('admin.customer.create') }}" class="btn btn-primary ">Create</a>
                            </div>
                        </div>
                    </div>
                    <h4 class="mt-0 header-title"></h4>
                    @if(count($customers) > 0)
                    <table id="datatable" class="table table-bordered table-striped nowrap">
                        <thead>
                        <tr>
                            <th style="width: 10px;"><input onclick="checkAll(this)" id="checkbox"
                                                            type="checkbox"></th>
                            <th style="width: 20px;">S.no</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $key => $customer)
                            <tr>
                                <td>
                                    <input
                                        id="checkbox{{ $customer->id }}"
                                        wire:click="toggleCustomer({{ $customer->id }})"
                                        type="checkbox">
                                </td>
                                <td>{{($customers->currentpage()-1) * $customers->perpage() + $key + 1}}</td>
                                <td>{{ $customer->first_name }}</td>
                                <td>{{ $customer->contact }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>
                                    @if($customer->status == 1)
                                        <span class="badge badge-success" style="cursor: pointer;"
                                              wire:click="status({{ $customer->id }})">Active</span>
                                    @else
                                        <span class="badge badge-danger" style="cursor: pointer;"
                                              wire:click="status({{ $customer->id }})">Banned</span>
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-success btn-xs text-dark"
                                            data-toggle="modal"
                                            data-target="#showCustomer"
                                            wire:click="show({{ $customer }})">
                                        <i class="text-white far fa-eye"> </i>
                                    </button>
                                    <a href="{{ route('admin.customer.edit', $customer->id)}}"
                                       class="btn btn-xs btn-primary"> <i
                                            class="fas fa-pen"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $customers->links() }}
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

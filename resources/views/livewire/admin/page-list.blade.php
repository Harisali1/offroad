<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box shadow  mt-4">
                    <div class="row">
                        <div class="col-8">
                            <select id="inputState" class="w-25 d-inline form-control">
                                <option>Bulk</option>
                                <option>Activate</option>
                                <option>Deactivate</option>
                                <option>Delete</option>
                            </select>
                            <button type="button" id="activate" class="btn btn-success ">Activate</button>
                            <button  onclick="deleteAll()" type="button" class="btn btn-danger "><i
                                    class="fas fa-trash-alt"></i></button>
                        </div>
                        <div class="col-4">
                            <div class="text-muted text-right font-14 mb-3">
                                <a href="{{ route('admin.page.create') }}" class="btn btn-primary ">Create</a>
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
                            <input type="text" wire:model="search" name="search" placeholder="Search by title"
                                   class="form-control">
                        </div>
                    </div>
                    <h4 class="mt-0 header-title"></h4>
                    @if(count($pages) > 0)
                    <table id="datatable" class="table table-bordered table-striped nowrap">
                        <thead>
                        <tr>
                            <th style="width: 10px;"><input onclick="checkAll(this)" id="checkbox0"
                                                            type="checkbox"></th>
                            <th style="width: 20px;">S.no</th>
                            <th>Title</th>
                            <th style="width: 15%;">Banner Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pages as $key => $page)
                            <tr>
                                <td>
                                    <input
                                        id="checkbox{{ $page->id }}"
                                        wire:click="togglePage({{ $page->id }})"
                                        type="checkbox">
                                </td>
                                <td>{{($pages->currentpage()-1) * $pages->perpage() + $key + 1}}</td>
                                <td>{{ $page->title }}</td>
                                <td>
                                    <img src="{{ $page->getImagePath('image') }}" width="80" height="50" alt="banner-img">
                                </td>
                                <td>
                                    @if($page->status === 1)
                                        <span class="badge badge-success" style="cursor: pointer;"
                                              wire:click="status({{ $page->id }})">Publish</span>
                                    @else
                                        <span class="badge badge-danger" style="cursor: pointer;"
                                              wire:click="status({{ $page->id }})">Unpublish</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.page.edit', $page->id)}}"
                                       class="btn btn-xs btn-primary float-left mr-1"> <i
                                            class="fas fa-pen"></i>
                                    </a>
                                    <button type="button" onclick="deletePage({{ $page->id }})" class="btn btn-xs btn-danger ">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $pages->links() }}
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
</div>

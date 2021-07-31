<x-admin.layout title="Attribute" heading="Attribute">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-box shadow mt-4">
                        <h4 class="mt-0 header-title"></h4>
                        <table id="datatable" class="table table-bordered table-striped nowrap">
                            <thead>
                            <tr>
                                <th style="width: 20px;">S.no</th>
                                <th>Attribute</th>
                                <th>Count</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Make</td>
                                <td>{{$makes}}</td>
                                <td>
                                    <a
                                        href="{{route('admin.make.index')}}"
                                        class="btn btn-success btn-xs">
                                        <i class="text-white far fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Model</td>
                                <td>{{$models}}</td>
                                <td>
                                    <a
                                        href="{{route('admin.model.index')}}"
                                        class="btn btn-success btn-xs">
                                        <i class="text-white far fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Year</td>
                                <td>{{$years}}</td>
                                <td>
                                    <a
                                        href="{{route('admin.year.index')}}"
                                        class="btn btn-success btn-xs">
                                        <i class="text-white far fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Mileage</td>
                                <td>{{$mileages}}</td>
                                <td>
                                    <a
                                        href="{{route('admin.mileage.index')}}"
                                        class="btn btn-success btn-xs">
                                        <i class="text-white far fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Color</td>
                                <td>{{$colors}}</td>
                                <td>
                                    <a
                                        href="{{route('admin.color.index')}}"
                                        class="btn btn-success btn-xs">
                                        <i class="text-white far fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end row -->
        </div>
        <!-- container-fluid -->
    </div>
</x-admin.layout>

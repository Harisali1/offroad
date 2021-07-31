<div>
    <div wire:ignore.self class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
         aria-hidden="true" id="showModel">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box">
                                    <div class="panel-body">
                                        <!-- end row -->
                                        @if($smart_assistant->relations ?? '')
                                            <div class="row">
                                                <div class="col-md-12  mt-4">
                                                    <div class="table-responsive">
                                                        <!-- <strong>Vehicle Details:</strong><br> -->
                                                        <table class=" table">
                                                            <thead class=" table-dark">
                                                            <tr>
                                                                <th>Make</th>
                                                                <th>Model</th>
                                                                <th>Year</th>
                                                                <th>Mileage</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($smart_assistant->relations as $relation)
                                                                <tr>
                                                                    <td>{{$relation->make->title}}</td>
                                                                    <td>{{$relation->models->title}}</td>
                                                                    <td>{{$relation->year->title}}</td>
                                                                    <td>{{$relation->mileage->from}}
                                                                        to {{$relation->mileage->to}}</td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>

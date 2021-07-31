<div>
    <div wire:ignore.self class="modal fade" id="showCustomer" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel"
         aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container-fluid">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-box">
                                    <div class="panel-body">
                                        <div class="clearfix">
                                            <div class="float-left">
                                                <h3>{{ $customer['first_name'] ?? '' }} {{ $customer['last_name'] ?? '' }}</h3>
                                            </div>
                                            <div class="float-right">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="float-left mt-3">
                                                    <address>
                                                        <strong>Customer Details:</strong><br>
                                                        Name: {{ $customer['first_name'] ?? '' }} {{ $customer['last_name'] ?? '' }}
                                                        <br>
                                                        Email: {{ $customer['email'] ?? '' }}<br>
                                                        Address: {{ $customer['address'] ?? '' }}<br>
                                                        <abbr title="Phone">Phone
                                                            :</abbr> {{ $customer['contact'] ?? '' }}
                                                    </address>
                                                </div>
                                            </div><!-- end col -->

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 ">
                                                <strong>{{ $customer['address_at'] ?? '' }}</strong>
                                                <div>
                                                    <img
                                                        src="https://www.howtogeek.com/wp-content/uploads/2017/04/googleaddresslede-650.png"
                                                        class="img-fluid" alt="address">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end row -->

                                        <div class="row">
                                            <div class="col-md-12  mt-4">
                                                <div class="table-responsive">
                                                    <strong>Vehicle Details:</strong><br>
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <th>Make</th>
                                                            <th>Model</th>
                                                            <th>Year</th>
                                                            <th>Color</th>
                                                            <th>Milaege</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td>BMWLuxury</td>
                                                            <td>BMW M535i</td>
                                                            <td>2020</td>
                                                            <td>Black</td>
                                                            <td>535i mpg</td>
                                                        </tr>
                                                        <tr>
                                                            <td>BMWLuxury</td>
                                                            <td>BMW M11i</td>
                                                            <td>2019</td>
                                                            <td>Red</td>
                                                            <td>500i mpg</td>
                                                        </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-8 col-6">
                                                <div class="clearfix mt-4">
                                                    <!-- <h5 class="small text-dark">ADDONS</h5>
                                                    <small>
                                                        Addon: Yes +400
                                                    </small> -->
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-6 text-right">
                                                <button class="btn btn-danger btn-xs" wire:click="banned">Banned This
                                                    Customer
                                                </button>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="d-print-none">

                                            <div class="clearfix"></div>
                                        </div>
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

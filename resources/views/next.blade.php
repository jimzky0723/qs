@extends('layout.app');
@section('content')
    <div class="row">
        <div class="col-lg-6">
            <div class="card">

                <div class="card-body">
                    <div class="card-title">
                        <h3 class="text-center title-2">Current Patient</h3>
                    </div>
                    <hr>
                    <form action="" method="post" novalidate="novalidate">
                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">Select Section</label>
                            <input id="cc-pament" name="cc-payment" type="text" class="form-control" aria-required="true" aria-invalid="false" value="100.00">
                        </div>
                        <div>
                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                <i class="fa fa-lock fa-lg"></i>&nbsp;
                                <span id="payment-button-amount">Pay $100.00</span>
                                <span id="payment-button-sending" style="display:none;">Sending…</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">

                <div class="card-body">
                    <div class="card-title">
                        <h3 class="text-center title-2">Get Next Patient</h3>
                    </div>
                    <hr>
                    <form action="" method="post" novalidate="novalidate">
                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">Select Section</label>
                            <select name="section" class="form-control select2">
                                <option value="1">Card Verification</option>
                                <option value="2">Vital Signs</option>
                            </select>
                        </div>
                        <div>
                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                <i class="fa fa-lock fa-lg"></i>&nbsp;
                                <span id="payment-button-amount">Get</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
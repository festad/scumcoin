@extends('layouts.main')

@section('title', 'Buy')

@section('content')
	
<div class="container-fluid mt-3">

	<div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">
                    Buy CC
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="number" class="form-control" id="amount" name="amount" value="{{ $amount }}" readonly>
                    </div>
                    <div id="paypal-content"></div>
                </div>
            </div>
        </div>
	</div>

</div>
@endsection

@push('scripts')
	<script 
		src="https://www.paypal.com/sdk/js?client-id=Aak2gVw-TcN15REaBicCyY4q0GFTLG2bPN3D_fUnQQTULbMXwY8vhCBjLaMS2PF2sm1FIsjagVMBnr_T&components=buttons">
	</script>
@endpush

@push('scripts')
<script>
paypal.Buttons({
    style: {
        layout: 'vertical',
        color:  'blue',
        shape:  'rect',
        label:  'paypal'
    },

    createOrder: function(data, actions) {
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: {{ $amount }} 
                }
            }]
        });
    },

    onApprove: function(data, actions) {
        return actions.order.capture().then(function(details) {
            // Payment is successful, now you can make an AJAX call to your server to finalize the purchase
            $.ajax({
                url: '/buy/complete',
                type: 'POST',
                dataType: 'json',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    amount: {{ $amount }},
                },
                success: function(response) {
					// Redirect to the home page
					window.location.href = response.redirect;
                },
                error: function(xhr, status, error) {
                    // Handle error
                    alert('An error occurred while completing the purchase.');
                }
            });
        });
    }
}).render('#paypal-content');
</script>
@endpush
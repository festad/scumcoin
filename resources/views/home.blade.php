@extends('layouts.main')

@section('title', 'Scumcoins')

@section('content')

<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col">
			<table class="table table-bordered">
				<thead>
			    	<tr>
						<th scope="col">{{ __('messages.sender') }}</th>
						<th scope="col">{{ __('messages.receiver') }}</th>
						<th scope="col">{{ __('messages.amount') }}</th>
						<th scope="col">{{ __('messages.time') }}</th>
					</tr>
				</thead>
				@foreach ($transactions as $transaction)
					<tbody>
						<tr>
							<td>
								<a href={{ sprintf("/user/%s", $transaction->sender) }}
									class="link-secondary">
								{{ sprintf("%32.32s ...", $transaction->sender) }}
								</a>
							</td>
							<td>
								<a href={{ sprintf("/user/%s", $transaction->receiver) }}
							class="link-secondary">
								{{ sprintf("%32.32s ...", $transaction->receiver) }}
								</a>
							</td>
							<td>
								{{ $transaction->amount }}
							</td>
							<td>
								{{ $transaction->created_at }}
							</td>
						</tr>
					</tbody>
				@endforeach
		    </table>
		    {{ $transactions->links() }}
		</div>
	</div>
</div>
@endsection

@extends('layouts.default')
@section('content')

<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-primary">
						<h4 class="card-title ">Promo Code</h4>
						
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table">
								<thead class=" text-primary">
									<th>ID</th>
									<th>Name</th>
			                        <th>Country</th>
			                        <th>City</th>
			                        <th>Salary</th>
                      			</thead>
                      			<tbody>
                      				<tr>
                      					<td>1</td> 
                      					<td>Dakota Rice</td>
                      					<td>Niger</td>
                      					<td>Oud-Turnhout</td>
                      					<td class="text-primary">$36,738</td>
                      				</tr>
                      				<tr>
                      					<td>2</td>
                      					<td>Minerva Hooper</td>
                      					<td>Curaçao</td>
                      					<td>Sinaai-Waas</td>
                      					<td class="text-primary"> $23,789</td>
                      				</tr>
                      			</tbody>
                      		</table>
                      	</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>          
@endsection
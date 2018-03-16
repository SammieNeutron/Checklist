@extends('layout')


@section('content')

		<div class="">

			<div class="row">
		        <div class="col-lg-12">
		            <form action="/create/checklist" method="post" class="form-group">
		            	{{csrf_field()}}
		                <input type="text" name="checklist" placeholder="Create a new checklist" class="form-control">
		            </form>

		            <hr>

		        </div>
		    </div>

	    <div>
			@foreach(  $checklists as $checklist  )

				{{  $checklist->checklist  }} 
				
				<a href="{{  route('checklist.delete', ['id' => $checklist->id])  }}" class="btn btn-danger btn-sm">Delete item</a>

				<a href="{{  route('checklist.update', ['id' => $checklist->id])  }}" class="btn btn-info btn-sm" data-toggle="modal" data-target="#checklistModal{{$checklist->id}}">Update item</a>

				@if(!$checklist->checked)
					<!-- <form action="{{route('checklist.checked', ['id' => $checklist->id])}}" method="post">
						{{csrf_field()}}
						<input type="checkbox" name="check">Check item
						
					</form> -->
					<a href="{{  route('checklist.checked', ['id' => $checklist->id])  }}" class="btn btn-success btn-sm">Check item</a>

				@else

					<span><i class="fa fa-check" style="font-size:20px;color:green;text-shadow:2px 2px 4px #000000;"></i>&nbsp;Checked!</span>

				@endif


				<hr>

				<!-- Modal -->
				<div class="row">
					<div id="checklistModal{{$checklist->id}}" class="modal fade" role="dialog">
					  <div class="modal-dialog modal-sm">

					    
					    <div class="modal-content">
					      <div class="modal-header">
					        <h4 class="modal-title text-center" style="">Update Checklist</h4>
					        <button type="button" class="close" data-dismiss="modal">&times; &nbsp;</button>
					      </div>
					      <div class="modal-body">
					        <form action="{{route('checklist.save', ['id' => $checklist->id])}}" method="post">
					        	{{  csrf_field() }}
								<div class="row">
									<div class="col-lg-12 form-group">
										<input type="text" name="checklist" value="{{$checklist->checklist}}" class="form-control" placeholder="Update checklist" style="width: 100%">
									</div>
								</div>
					        </form>
					      </div>
						</div>

					  </div>
					</div>
				</div>

			@endforeach
		</div>
	</div>

@stop


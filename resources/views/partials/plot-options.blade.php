
@if($plots->count())
@foreach($plots as $plot)
    <option value="{{ $plot->id }}">{{ $plot->plot_number }}</option>
@endforeach
@else
<option value="">No Plots for this project</option>
@endif

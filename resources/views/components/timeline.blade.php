<label for="">Timeline <span>*</span></label>
<select name="time" id="timelines" class="form-control">
    @php $timelines = !empty($timeSlot->time) ? json_decode($timeSlot->time) :'';  @endphp
    <option value="">Select Timeline</option>
    @foreach ($timelines as $timeline)
        <option value="{{ $timeline }}">{{ $timeline }}</option>
    @endforeach
</select>

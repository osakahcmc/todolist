<div class="add_work">
    <form method="post" action="{{ route('add') }}">
        {{csrf_field()}}
        <button type="submit" class="btn btn-success mx-1 my-1">Work Add</button>
        <div class="add_work_form">
            <label for="work_name">Work Name</label>
            <input type="text" id="work_name" name="work_name" class="px-2 py-1" value="{{ old('work_name') }}">
            <label for="starting_date">Starting Date</label>
            <input type="date" id="starting_date" name="starting_date" class="date py-1" value="{{ old('starting_date') }}">
            <label for="ending_date">Ending Date</label>
            <input type="date" id="ending_date" name="ending_date" class="date py-1" value="{{ old('ending_date') }}">
        </div>
    </form>
    @if($errors->any())
        <ul class="alert alert-danger my-3" id="ErrorInput">
            @foreach ($errors->all() as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    @endif
    @if (session('success'))
        <div class="alert alert-success my-3">
            {{ session('success') }}
        </div>
    @endif
</div>

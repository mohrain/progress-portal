@extends('deartments.backends.edit')

@section('departmentContent')
<div class="card mt-2">
    <div class="card-body">
        <form action="#" method="POST" class="form">
            @csrf
            @isset($district->id)
                @method('put')
            @endisset
            <div class="form-group">
                <label for="input-name">शीर्षक</label>
                <input type="text" class="form-control" name="" id="">
            </div>

            <div class="form-group">
                <label for="input-name">विवरण</label>
                <textarea name="message" class="form-control" id="summernote" cols="30" rows="10" placeholder="Text Message"></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success z-depth-0">सेभ गर्नुहोस्</button>
            </div>
        </form>
    </div>
</div>

<div class="card mt-2">
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>क्र.स.</th>
                    <th>शीर्षक</th>
                    <th>कार्य</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
@endsection

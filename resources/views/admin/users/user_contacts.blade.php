<table class="table table-bordered table-striped table-hover">
    <thead>
    <tr class="bg-light-blue-gradient">
        <th class="col-lg-3">Group ID</th>
        <th class="col-lg-3">Contact</th>
        <th class="col-lg-3">Email</th>
        <th class="col-lg-3">Action</th>
    </tr>
    </thead>
    <tbody>
    @if(count($contacts)>0)
    @foreach($contacts as $contact)
    <tr><td colspan="4">
            <form method="post" action="{{route("contacts.update",$contact->id)}}">
                @method('patch')
                @csrf()
            <div class="col-lg-3">{{$user->id}}</div>
            <div  class="col-lg-3"><input type="text" class="form-control" name="phone" value="{{ $contact->phone }}"></div>
            <div  class="col-lg-3"><input type="text" class="form-control" name="email" value="{{ $contact->email }}"></div>
            <div  class="col-lg-3"><a href="#">Edit</a> |<input type="submit" value="Save"></div>
            </form>
            <form method="post" action="{{route("contacts.destroy",$contact->id)}}">
                @method('delete')
                @csrf()
               <input type="submit" class="btn btn-danger" value="Delete"></div>
            </form>

        </td>
    </tr>
    @endforeach
    @endif

    <tr><td colspan="4">
            <form method="post" action="{{route("contacts.store")}}">
                @csrf()
                <div class="col-lg-3"><input type="text" class="form-control" name="user_id" value="{{$user->id}}"></div>
                <div  class="col-lg-3"><input type="text" class="form-control" name="phone" value=""></div>
                <div  class="col-lg-3"><input type="text" class="form-control" name="email" value=""></div>
                <div  class="col-lg-3"><a href="#">Edit</a> |<input type="submit" value="Save"></div>
            </form>

        </td>
    </tr>

    </tbody>
</table>

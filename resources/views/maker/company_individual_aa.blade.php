<div id="com_applicant_buttons">
    @if(isset($com_attached_applicants))
        @foreach($com_attached_applicants as $applicant_sub)
            <div class="col-lg-12 col-md-12 applicants">
                <div class="btn-group margin-bottom border-black-1"
                     id="btn-air">
                    <button type="button" class="btn btn-default btn-flat edit_com_ind"
                            data-id="{{$applicant_sub->id}}">{{$applicant_sub->name}}</button>
                    <button type="button" class="btn btn-default btn-flat dropdown-toggle"
                            data-toggle="dropdown"
                            aria-expanded="false">
                        <i class="fa fa-list"></i>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu position-relative" id="" role="menu">
                        {{--<li><a href="#"  data-value="air" class="editincome">Edit</a></li>--}}
                        <li><a href="#" data-la="{{$la_applicant_id}}"
                               data-id="{{$applicant_sub->id}}" class="deleteInd">Delete</a>
                        </li>
                    </ul>
                </div>
            </div>

        @endforeach
    @endif
</div>

<div id="com_ind_aa">

</div>


@push("scripts")
    <script type="text/javascript">
        $(document.body).on("click",".edit_com_ind",function (e) {
            $.ajax({
                url:"{{ route("comIndAA") }}",
                type:"POST",
                data:"id="+$(this).data("id"),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                }).done(function (response) {
                $("#com_ind_aa").html($(response));
            });
        })

        $(document.body).on("submit","#com_ind_update",function (e) {
            e.preventDefault();
            $.ajax({
                url:$(this).attr("action"),
                type:"POST",
                data: $("#com_ind_update").serializeArray()

            }).done(function (response) {
                alert(response);
            });
        })
    </script>
@endpush
@extends('admin.layouts.app')

@section('content')

    <div class="box">
        <div class="box-header">{{ __('Register') }}</div>
        <form method="POST" action="{{ route('register') }}">

            <div class="box-footer">
                <div class="form-group row mb-0">
                    <div class="col-md-10 offset-md-4">
                        <button type="submit" class="btn btn-primary pull-right">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>


@endsection

@push("scripts")
    <script type="text/javascript">
        $(document).ready(function() {
            $('select').select2();
        });
    </script>
@endpush

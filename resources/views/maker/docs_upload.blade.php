@extends('maker.layouts.mini_app')

@section('content')

    <section class="content">


            <div class="container"> <!-- style="overflow:hidden" -->


                @if (isset($success))
                    <div class="alert alert-success">
                        <p>{{ $success }}</p>
                    </div>
                @endif
                @if(isset($error))
                    <div class="alert alert-error">
                        {{ $error }}
                    </div>
                    <div class="alert alert-error">
                        {{ $details }}
                    </div>

                @endif

            </div>
            </form>

        </div>

    </section>

@endsection

@push("scripts")
    <script type="text/javascript">

        $(document).ready(function () {
            setTimeout(function () { window.close();}, 3000);
        })

    </script>
@endpush

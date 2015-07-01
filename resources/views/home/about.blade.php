@extends('layouts.master')

@section('content')

    <h1>About us</h1>
    <script type="text/javascript">
        <!--
        function func() {
            var xx = parseFloat(document.F1.T1.value);
            var yy = parseFloat(document.F1.T2.value);
            document.F1.T3.value = xx + yy;
        }
        // -->
    </script>


    <div class="container">
        <fieldset>

            <div class="form-group">
                <form name="F1" action="#">
                    <input type="text" name="T1">
                    ＋
                    <input type="text" name="T2">
                    <input type="button" value="＝" onclick="func()">
                    <input type="text" name="T3">
                </form>
            </div>


        </fieldset>
    </div>




@endsection


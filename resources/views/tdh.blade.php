@extends('tdhlayout.app')
@section('content')
    <div class="main-content container">
        <h3 class="text-center">Content goes here!</h3>
    </div>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        //initialize the javascript
        App.init();
    });

</script>
<script type="text/javascript">
    $(document).ready(function(){
        App.livePreview();
    });

</script>
@endsection
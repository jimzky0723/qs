@extends('tdhlayout.app')
@section('content')
<style>
    .mai-error .error-container {
         margin-top: 0px;
    }
    .main-content {
        padding: 20px 0;
    }
</style>
    <div class="main-content container">
        <div class="mai-wrapper mai-error mai-error-404">
            <div class="main-content container">
                <div class="error-container">
                    <div class="error-image">
                        <svg id="Capa_1" data-name="Capa 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1018 810">
                            <polygon points="38 810 146 410 532 242 492 478 392 564 426 760 342 810 38 810" class="cls-1"></polygon>
                            <polygon points="532 810 732 810 796 576 532 242 492 478 577 389 491 589 589 767 532 810" class="cls-2"></polygon>
                            <polygon points="0 262 38 364 578 130 596 0 0 262" class="cls-1"></polygon>
                            <polygon points="936 568 1018 502 596 0 578 130 936 568" class="cls-2"></polygon>
                            <path d="M303.5,73.5" transform="translate(-41.5 -69.5)" class="cls-2"></path>
                            <polyline points="348 16 331.95 116.08 237.7 157.7 262 4" class="cls-1"></polyline>
                            <polygon points="426 26 422 78 332 116 348 16 426 26" class="cls-2"></polygon>
                        </svg>
                    </div>
                    <div class="error-number"> <span>STOP!</span></div>
                    <div class="error-description">You don't have permission to access this section.</div>
                    <div class="error-goback-text">Would you like to go home?</div>
                    <div class="error-goback-button"><a href="{{ url('/') }}" class="btn btn-lg btn-primary">Let's go home</a></div>
                </div>
            </div>
        </div>
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
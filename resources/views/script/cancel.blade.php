<script src="{{ url('resources/tdh/') }}/lib/jquery.niftymodals/dist/jquery.niftymodals.js" type="text/javascript"></script>
<script>

    //Set Nifty Modals defaults
    $.fn.niftyModal('setDefaults',{
        overlaySelector: '.modal-overlay',
        contentSelector: '.modal-content',
        closeSelector: '.modal-close',
        classAddAfterOpen: 'modal-show',
        classModalOpen: 'modal-open',
        classScrollbarMeasure: 'modal-scrollbar-measure',
        afterOpen: function(){
            $("html").addClass('mai-modal-open');
        },
        afterClose: function(){
            $("html").removeClass('mai-modal-open');
        }
    });

    var link = '';
    $('.btn-cancel').on('click',function(){
        link = $(this).data('link');
        console.log(link);
    });

    $('.cancelTransaction').on('click',function(){
        window.location.href = link;
    });
</script>
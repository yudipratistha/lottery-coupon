'use strict';
$('.clockpicker').clockpicker()
            .find('input').change(function(){
        console.log(this.value);
    });
    var choices = ["00","15","30","45"];

    $('#single-input').clockpicker({
        placement: 'top',
        align: 'right',
        autoclose: true,
        default: '20:48',
        afterShow: function() {
            console.log("asdas");
            $(".clockpicker-minutes").find(".clockpicker-tick").filter(function(index,element){
                
              return !($.inArray($(element).text(), choices)!=-1)
            }).remove();
          }
    });
    if (/Mobile/.test(navigator.userAgent)) {
        $('input').prop('readOnly', true);
    }
// Shorthand for $( document ).ready()
$(function() {
    
    $('.__pQtyChange').on('change', function() {
        let ele = $(this);
        let pid = ele.data('pid');
        let qty = ele.val();

        jQuery.ajax({
            type:'POST',
            cache: true,
            url: '/administrator/updateBag',
            data:{'pid':pid,'qty':qty},
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: 'json',
			async:true,
			beforeSend:function(){
				
			},
			success:function(response) {
                console.log(response);
                if(response.product_total){
                    ele.closest('tr').find('.product_total_tag').text('₹'+response.product_total);
                    updateTotalBag();
                }
			},
			complete: function(){
			
			}
		});
    });

    $('._pidSelection').on('change',function() {
        if(this.checked) {
           $(this).closest('tr').find('.__pQtyChange').prop('disabled',false).val(1).trigger('change');
        }else{
           $(this).closest('tr').find('.__pQtyChange').prop('disabled',true).val(0);
           $(this).closest('tr').find('.product_total_tag').text('₹0');
        }
        updateTotalBag();
    });

    window.onbeforeunload = function() {
        document.cookie = "bag=0";
    };

    function updateTotalBag(){
        let total = 0;
        $('.product_total_tag').each( function() {
            total += Number($(this).text().replace("₹", ''));
        });
        $('#_bagTotal').text('₹'+total);
    }

});
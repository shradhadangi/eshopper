function get_qty(id){
    var qty = $("#pqty"+id).val();
    $("#qty").val(qty);
}
function get_size(id){
    $("#size_id").val($("#psize_id"+id).val());
}
function add_cart(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var psize_id = $("#psize_id"+id).val();
    if(psize_id){
       var size_id = $("#size_id").attr('value',psize_id);
    }else{
        var size_id = $("#size_id").val();
    }
    //    alert(size_id);
    if(size_id==0){
        size_id = 'no';
    }
    if(size_id == 'no'){
        $('.shopping-wrap').html('<div class="alert alert-dismissible alert-danger" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button> Please select size.</div>');
    }else{
        $("#product_id").attr('value',id);
        $("#qty").val($("#pqty"+id).val())
       $.ajax({
           url:'/add_to_cart',
           data:$("#fromAddToCart").serialize(),
           type:'post',
          success:function(result){
               $('.shopping-wrap').html('<div class="alert alert-dismissible alert-success" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><i class="fa fa-check"></i>Product has been '+result+' to your cart.</div>');
               $("#cartBtn"+id).html('Added To Cart')
               get_ajax_cart_data();
          }
       });
   }
}
function get_ajax_cart_data(){
    $.ajax({
        url:'/ajax-cart',
       success:function(result){
            $('.cart-wrap').html(result);

       }
    });
}
function delete_item(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "\delete-cart",
        type:"POST",
        data: {
        id: id
    },
    success:function(result){
        get_ajax_cart_data();
       }
    });
}
function ajax_login(){
    $("#login_msg").html('');
    $.ajax({
        url: config.routes.zone,
        data: $('#frmLogin').serialize(),
        type: 'post',
        success:function(result){
            console.log(result);
            if(result.status=='error'){
                jQuery("#login_msg").html(result.msg);
            }
            if(result.status=='success'){
                window.location.reload();
            }
        }
});
}
function updateQty(id,qty){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '\cart_update',
        data: {'cart_id':id,'qty':qty},
        type: 'post',
        success:function(result){
            // console.log(result);
            window.location.reload();
        }
});
}
function sort_by(){
    var sort_by_value = jQuery("#sort_by").val();
    jQuery("#sort").val(sort_by_value);
    jQuery('#productFilter').submit();
    // alert(sort_by_value);
}
function get_range(){
    // var data_from = jQuery(".js-range-slider").val($(".js-range-slider").attr("data-from"));
    var data_from = $(".js-range-slider").attr("data-from");
    var data_to = $(".js-range-slider").attr("data-to");
//    alert(data_from);
   console.log(data_to);

}
function change_rating(rating){
    $(".img-hover").css('display','none');
    $(".img-original").css('display','block');
      $("#rating").attr('value',rating);
      for(var i=1; i<=5; i++){
          if(i<=rating){
              $(".full-star"+i).css('display','block');
              $(".blank-star"+i).css('display','none');
          }else{
            $(".full-star"+i).css('display','none');
            $(".blank-star"+i).css('display','block');

          }
      }
}
function get_size(size,id){
    var size_data = $("#size_data").val();
    if($("#size"+id).is(':checked')){
        if(size_data){
            size_data = size_data+','+size;
        }else{
            size_data = size;
        }
    }else{
        // size_data = size_data.replace(size+',','');
        // size_data = size_data.replace(','+size,'');
        size_data = size_data.replace(size,'');
    }
    // $("#size_data").attr('value',size_data)
    $("#size_data").attr('value',size)
    // console.log(size_data);
    jQuery('#productFilter').submit();
}
function get_color(color,id){
    $("#color_data").attr('value',color)
    jQuery('#productFilter').submit();
}
function match_password(value) {
    var pass = $('#get_password').val();
    if (value != pass) {
        $('#p_show').show();
        $("#update-password").attr('disabled', 'disabled');
    } else {
        $('#p_show').hide();
        $("#update-password").removeAttr('disabled');
    }

}
$("#checkAll").click(function() {
    $('input:checkbox').not(this).prop('checked', this.checked);
});
// function autolo(){
// var current_page = 1;
// var fetch_lock = false;
// var fetch_page = function() {
//     if(fetch_lock) return;
//     fetch_lock = true;
//     $.getJSON('\get_more_product', {page_index: current_page; page_size: 10}, function(data) {
//         // render your data here.
//         current_page += 1;
//         if(data.length == 0) {
//             // hide the `more` tag, show that there are no more data.
//             // do not disable the lock in this case.
//         }
//         else {
//             fetch_lock = false;
//         }
//     });
// }

// $(function() {

    // the definition above.
    // ...

    // 1. on page loaded.
//     fetch_page();

//     // 2. on scroll to bottom
//     $(window).scroll(function() {
//         if($('body').scrollTop() + $(window).height() == $('body').height()) {
//             fetch_page();
//         }
//     });

//     // 3. on the `more` tag clicked.
//     $('.more').click(fetch_page);

// });
// }
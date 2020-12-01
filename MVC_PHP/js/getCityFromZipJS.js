let zip=$('#zip');

$("#zip").focusout(function(){
    let that=$(this).val();
    $.ajax({url: "controllers/cityFromZipCode.php", data: { zip: that } , method: "POST" , success: function(result){
      $("#city").val(result);
      console.log(result);
    }});
 });
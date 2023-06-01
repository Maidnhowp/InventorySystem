$(document).ready(function(){
    $('#search').keyup(function(){
        let searchText = $(this).val();
        if(searchText != ""){
            $.ajax({
                url : "home.php",
                type : "post",
                data : {
                    query : searchText
                },
                success: function(res){
                    // $("#show-list").html(res);
                    console.log(res);
                }
            })
        }
        else {
            $("#show-list").html("");
        }
    })
})
$( document ).ready(function() {
$("#formOne").submit(function(){
  alert("you are submitting" + $(this).serialize());
});
    $("#role" ).change(function() {

	  	if($('#role').val() == 'Profesor')
	  		$('.course').hide();
	  	else
	  		$('.course').show();
	});

    $("#center-city" ).change(function() {

	  	$.ajax({
			type:"GET",
			url:"/centers/"+ $('#center-type').val()+ "/" + $('#center-city').val(),
			success: function(data) {
				$('#center').children().remove();
				for (var i = 0; i < data.length; i++) {
			        var center = data[i];
			        $("#center").append("<option value='"+ center.id + "'>" + center.name + "</option>");
			    }
			}
		});
	});

	$("#center-type" ).change(function() {
	  	$.ajax({
			type:"GET",
			url:"/centers/"+ $('#center-type').val()+ "/" + $('#center-city').val(),
			success: function(data) {
				$('#center').children().remove();
				for (var i = 0; i < data.length; i++) {
			        var center = data[i];
			        $("#center").append("<option value='"+ center.id + "'>" + center.name + "</option>");
			    }
			}
		});

		$.ajax({
			type:"GET",
			url:"/grades/"+ $('#center-type').val(),
			success: function(data) {
				$('#grade').children().remove();
				for (var i = 0; i < data.length; i++) {
			        var grade = data[i];
			        $("#grade").append("<option value='"+ grade.id + "'>" + grade.name + "</option>");
			    }
			}
		});

	});

	$('.fb-comments').hide();


	$('#comment-form').on('submit',function(e){

	    e.preventDefault();

	    $.ajaxSetup({

	       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    })

        $.ajax({
	        type:"POST",
	        url:'/files/'+ $('#comment-file').val() + '/comments',
	        data:$(this).serialize(),
	        dataType: 'json',
	        success: function(data){
	        	alert(JSON.stringify(data));
	            $('#file-' + $('#comment-file').val()).before("<li><a href='#' class='cmt-thumb'><img src='/images/usuario.png' alt=''></a><div class='cmt-details'><a href='#'>" + $('#comment-user').val() + "</a><span>&nbsp;" + $('#description-'+ $('#comment-file').val()).val() + "</span><p>" + data.created_at.date + "</p></div></li>");
	        	$('#comment-form').trigger("reset");
	        },

	        error: function(data){

	        }
	    })
	});
});

function likes(file_id){
	$.ajax({
		type:"GET",
		url:"/files/"+ file_id,
		success: function(data) {
            $('#file-likes-' + file_id).html(Number($('#file-likes-' + file_id).html()) + 1);
		}
	});
}

function comments(file_id){
	
	$( "#file-comments-" + file_id).toggle();
}
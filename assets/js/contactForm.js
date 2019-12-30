$(document).ready(function(){
	
	var addContactForm = $("#contactForm");
	
	var validator = addContactForm.validate({
		
		rules:{
		confirst_name :{ required : true },
			con_last_name :{ required : true },
			con_email : { email : true },
			con_business_phone : { digits : true },
			con_primary_phone : { digits : true },
			con_mobile_phone : { digits : true }
		},
		messages:{
			con_first_name :{ required : "This field is required" },
			con_last_name :{ required : "This field is required" },
			con_email : { email : "Please enter valid email address" },
			con_business_phone : { digits : "Please enter numbers only" },
			con_primary_phone : { digits : "Please enter numbers only" },
			con_mobile_phone : { digits : "Please enter numbers only" }
		}
	});

	$('a.delete').on('click', function() {
	    var choice = confirm('Do you really want to delete this record?');
	    if(choice === true) {
	        return true;
	    }
	    return false;
	});
});


function uploadAttachment(){
	count = $('input[type="file"]').length;
	$('input[name="attachments['+(count-1)+']"]').trigger('click');	
}

function fileAttached(thatInput){
	if (thatInput.files[0].name != "") {
		$('#attachments-list').append('<li class="list-group-item d-flex justify-content-between align-items-center"><a>'+thatInput.files[0].name+'</a><span class="badge badge-danger badge-pill btn" onclick="deleteAttachment(this);"><i class="fa fa-times"></i></span></li>');

		count = $('input[type="file"]').length;

		$('#attachments-input-box').append('<input type="file" name="attachments['+count+']" onchange="fileAttached(this)"/>')
	}
}

function deleteAttachment(thatBtn, fromdb = ""){
	var fileToRemove = $(thatBtn).parent().children('a').text();

	$('input[type="file"]').each(function(){
		if(this.files.length != 0 && this.files[0].name == fileToRemove){
			$(this).remove();
		};
		$(thatBtn).parent().remove();
	})

	if (fromdb != "") {
		var preAttachArrayString = $('input[name="con_attachments"]').val();
		var preDltAttachArrayString = $('input[name="con_attachments_to_delete"]').val();
		if (preDltAttachArrayString == "") {
			preDltAttachArrayString += fileToRemove;
		} else {
			preDltAttachArrayString += ","+fileToRemove;
		}

		var newAttachArrayString = "";
		if (preAttachArrayString != "") {
			var preAttachArray = preAttachArrayString.split(',');
			for (var i = 0; i < preAttachArray.length; i++) {
				if(preAttachArray[i] != fileToRemove){
					if (newAttachArrayString == "") {
						newAttachArrayString += preAttachArray[i];
					} else {
						newAttachArrayString += ","+preAttachArray[i];
					}
				}
			}
		}

		$('input[name="con_attachments"]').val(newAttachArrayString);
		$('input[name="con_attachments_to_delete"]').val(preDltAttachArrayString);
	}
}
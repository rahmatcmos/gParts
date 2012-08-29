$("#kd_part").keyup(function(e){ //the "kodePartNumber" can be any other input field ID
	        if(e.keyCode == 8){ //trap the backspace key so that when deleting value, "checkkodePartNumber" will not be called.
			//do nothing
	}else{
			checkKodePart("kd_part"); //call checkkodePartNumber function and put "kodePartNumber" field ID as parameter
		}
	});

function checkKodePart(id){
	var kodePartValue = $("#"+id).val(); //get current field value
	var kodePartLength = $("#"+id).val().length; //get current field value length
	
	if(kodePartLength == 1){ //if current length is 3, then insert a hyphen
		kodePartValue += "-";
	}else if(kodePartLength == 5){ //if current length is 7, then insert a hyphen
		kodePartValue += "-";
	}
	
	//limit the kodePart value to 12 character
	if(kodePartLength > 12){
		kodePartValue = (kodePartValue.substr(0, 12)); //if field value length is greater than 12, then use substr to get rid of last character
	}
	
	$("#"+id).val(kodePartValue);
}

$("#search_parts_by").change(function(){
	// console.log($(this).attr('value'));
	var option = $(this).attr('value');
	switch(option) {
		case 'kd_part':
			break;
		case 'nama_part':
			break;
		case 'stock_minimum':
			break;
	}
});
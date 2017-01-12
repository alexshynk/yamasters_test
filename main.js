function fsize_key(e){
	var charCode = (e.which) ? e.which : e.keyCode;
	if (charCode == 8 || charCode == 37 || charCode == 39) return true;
	if ((charCode < 48 || charCode > 57))	return false;
    return true;	
}

function fsize_change(e){
	if (parseInt(e.currentTarget.value) > 30 || parseInt(e.currentTarget.value) == 0 || e.currentTarget.value.length == 0)
		e.currentTarget.style["background-color"] = "#F78181";
	else e.currentTarget.style["background-color"] = "white";
	
	if (e.currentTarget.value.length >= 2) e.currentTarget.value = e.currentTarget.value.substring(0,2);
}

function fcolor1_key(e){
	var charCode = (e.which) ? e.which : e.keyCode;
	if (charCode == 8 || charCode == 37 || charCode == 39) return true;
	if ((charCode < 48 || charCode > 57) && (charCode < 60 || charCode > 70) && (charCode < 97 || charCode > 102))	return false;
    return true;
}

function fcolor1_change(e){
	if (e.currentTarget.value.length < 6) e.currentTarget.style["background-color"] = "#F78181";
	else e.currentTarget.style["background-color"] = "white";
	
	if (e.currentTarget.value.length > 6) e.currentTarget.value = e.currentTarget.value.substring(0,6);
}

function fcolor2_key(e){
	var charCode = (e.which) ? e.which : e.keyCode;
	if (charCode == 8 || charCode == 37 || charCode == 39) return true;
	if ((charCode < 48 || charCode > 57)) return false;
    return true;
}

function fcolor2_change(e){
	if (parseInt(e.currentTarget.value) > 256) e.currentTarget.style["background-color"] = "#F78181";
	else e.currentTarget.style["background-color"] = "white";
	
	if (e.currentTarget.value.length >= 3) 	e.currentTarget.value = e.currentTarget.value.substring(0,3);
}

function fcolor_choose(color){
	if (color==1){
		$("input[name='color1']").prop("disabled", false);
		$("input[name='color2[]']").prop("disabled", true);
	}
	else if (color==2){
		$("input[name='color1']").prop("disabled", true);
		$("input[name='color2[]']").prop("disabled", false);
	}
}
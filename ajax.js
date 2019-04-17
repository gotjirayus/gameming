// JavaScript Document
$(document).ready(function(){
	// ÊèÇ¹¢Í§¨Ñ§ËÇÑ´àÁ×èÍÁÕ¡ÒÃà»ÅÕèÂ¹á»Å§
	$("#Proviance").change(function(){
		$("#Subdistrict").empty();//ÅéÒ§¢éÍÁÙÅ
		$("#Postcode").empty();//ÅéÒ§¢éÍÁÙÅ
		$("#DisID").val("");//ÅéÒ§¢éÍÁÙÅ
		$("#SubID").val("");//ÅéÒ§¢éÍÁÙÅ
		$("#PostID").val("");//ÅéÒ§¢éÍÁÙÅ
		$.ajax({
			  url: "getdata.php",//·ÕèÍÂÙè¢Í§ä¿Åìà»éÒËÁÒÂ
			  global: false,
			  type: "GET",//ÃÙ»áºº¢éÍÁÙÅ·Õè¨ÐÊè§
			  data: ({ID : $(this).val(),TYPE : "District"}), //¢éÍÁÙÅ·ÕèÊè§  { ª×èÍµÑÇá»Ã : ¤èÒµÑÇá»Ã }
			  dataType: "JSON", //ÃÙ»áºº¢éÍÁÙÅ·ÕèÊè§¡ÅÑº xml,script,json,jsonp,text
			  async:false,
			  success: function(jd) { //áÊ´§¢éÍÁÙÅàÁ×èÍ·Ó§Ò¹àÊÃç¨ â´Âãªé each ¢Í§ jQuery
							var opt="<option value=\"0\" selected=\"selected\">---àÅ×Í¡ÍÓàÀÍ---</option>";
							$.each(jd, function(key, val){
								opt +="<option value='"+ val["AMPHUR_ID"] +"'>"+val["AMPHUR_NAME"]+"</option>"
    						});
							$("#District").html( opt ).val($("#District").data('old')).change();//à¾ÔèÁ¤èÒÅ§ã¹ Select ¢Í§ÍÓàÀÍ
		   	  }
		});	
		$("#ProID").val($(this).val()); //¡ÓË¹´¤èÒ ID ¢Í§¨Ñ§ËÇÑ´·ÕèàÅ×Í¡ãËé¡Ñº Textfield ¢Í§¨Ñ§ËÇÑ´
	});
	// ÊèÇ¹¢Í§ÍÓàÀÍàÁ×èÍÁÕ¡ÒÃà»ÅÕèÂ¹á»Å§
	$("#District").change(function(){
		$("#Subdistrict").empty();
		$("#Postcode").empty();
		$("#SubID").val("");
		$("#PostID").val("");
		$.ajax({
			  url: "getdata.php",
			  global: false,
			  type: "GET",
			  data: ({ID : $(this).val(),TYPE : "Subdistrict"}),
			  dataType: "JSON",
			  async:false,
			  success: function(jd) {
							var opt="<option value=\"0\" selected=\"selected\">---àÅ×Í¡µÓºÅ---</option>";
							$.each(jd, function(key, val){
								opt +="<option value='"+ val["DISTRICT_ID"] +"'>"+val["DISTRICT_NAME"]+"</option>"
    						});
							$("#Subdistrict").html( opt ).val($("#Subdistrict").data('old')).change();
		   	  }
		 });
		 $("#DisID").val($(this).val());
	});
	// ÊèÇ¹¢Í§µÓºÅàÁ×èÍÁÕ¡ÒÃà»ÅÕèÂ¹á»Å§
	$("#Subdistrict").change(function(){
		$("#PostID").val("");
		$.ajax({
			  url: "getdata.php",
			  type: "GET",
			  data: ({ID : $("#District").val(),TYPE : "Postcode"}),
			  dataType: "JSON",
			  success: function(jd) {
							var opt="<option value=\"0\" selected=\"selected\">---àÅ×Í¡ÃËÑÊä»ÃÉ³ÕÂì---</option>";
							$.each(jd, function(key, val){
								opt +="<option value='"+ val["POST_CODE"] +"'>"+val["POST_CODE"]+"</option>"
    						});
							$("#Postcode").html( opt ).val($("#Postcode").data('old')).change();
		   	  }
		 });
		 $("#SubID").val($("#Subdistrict").val());
	});
	// ÊèÇ¹¢Í§ÃËÑÊä»ÃÉ³ÕÂìàÁ×èÍÁÕ¡ÒÃà»ÅÕèÂ¹á»Å§
	$("#Postcode").change(function(){
		$("#PostID").val($(this).val());
	});
});
//ÊèÇ¹¢Í§ function à¾×èÍà¾ÔèÁ¢éÍÁÙÅ¨Ñ§ËÇÑ´à¢éÒä»¡èÍ¹
function Add(){
		$.ajax({
			  url: "getdata.php",
			  global: false,
			  type: "GET",
			  data: ({TYPE : "Proviance"}),
			  dataType: "JSON",
			  async:false,
			  success: function(jd) {
							var opt="<option value=\"0\" selected=\"selected\">---àÅ×Í¡¨Ñ§ËÇÑ´---</option>";
							$.each(jd, function(key, val){
								opt +="<option value='"+ val["PROVINCE_ID"] +"'>"+val["PROVINCE_NAME"]+"</option>"
    						});
							$("#Proviance").html( opt ).val($('#Proviance').data('old')).change();
		   	  }
		});
}
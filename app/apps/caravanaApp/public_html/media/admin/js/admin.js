function showModalFromUrl(url, ajax, reloadGrid){
	if(ajax==undefined) ajax = 0;
	if(reloadGrid==undefined) reloadGrid = 0;

	if(ajax==0){
		document.location = url_base + url;
	}

	$("#dialog").dialog('close');
	$('#dialog').remove();
	$('body').append('<div id="dialog" \/>');
	$("#dialog").html('<center id="ajax_loading">Loading...<br/><img src="/media/admin/img/icons/loader/ajax-loader.gif"/></center>');

	$('#dialog').ajaxStop(function(){
		$('.dateField').datepicker({dateFormat:'yy-mm-dd'});
	});

	$('#dialog').ajaxError(function(){
		$("#dialog").html('<center id="ajax_loading">An error occured please contact IT.</center>');
	});

	$("#dialog").dialog();
	$.ajax({
        method: "post",
        url: url_base + url,
        id: "",
        data: '',
        success: function(html){
					  $("#dialog:ui-dialog").dialog("destroy");
            $("#dialog").html(html);
						adjustModal();

						if (reloadGrid==1) {
							triggerGridReload();
						}
  		}
    });
}

function adjustModal(){

	var newHeight = parseInt($('#dialog').children().first().height())+20;
	var newWidth = parseInt($('#dialog').children().first().width());
	var maxModalHeight = window.innerHeight-230;

	$("#dialog").dialog({ height: 'auto', minHeight: '95px', minWidth: newWidth + 'px',width:newWidth+20,autoSize:true});

	if (newHeight>maxModalHeight) {
		newHeight = maxModalHeight;
	}

	$("#dialog").css('height', newHeight+'px');
	$("#dialog").css('width', newWidth+'px');
	$("#dialog").parent().css('height', newHeight+60+'px');
	$("#dialog").parent().css('width', newWidth + 20 + 'px');
	//$("#dialog").center();
}

function triggerGridReload(){
	$("#jqgajax").trigger("reloadGrid");
}

function messageAdmin(text){
	$('.message').html(text).show();

	setTimeout(function(){ $('.message').hide(); }, 3000)
}

function submitForm(obj, close, reloadGrid){

	$.ajax({
        type: "POST",
        url: $(obj).attr('action'),
        data: $(obj).serialize(),
        success: function(html){
			if(close)
			{
				$("#dialog").dialog('close');
			}
			else
			{
				$("#dialog").html(html);
				adjustModal();
			}

			if(reloadGrid==1){
				triggerGridReload();
			}
  		}
    });

}

jQuery.fn.center = function () {
    this.css("position","absolute");
    this.css("top", ( $(window).height() - this.height() ) / 2+$(window).scrollTop() + "px");
    this.css("left", ( $(window).width() - this.width() ) / 2+$(window).scrollLeft() + "px");
    return this;
};

function AddAutocomplete(obb)
{
		var field = $(obb).attr('name');
	  if(!field)
	  {
	    return false;
	  }

		$(obb).autocomplete({
		    source: function (request, response) {
					$.getJSON("/administration/autocomplete/getSuggest/" + model + "/" + field+ "?query=" + request.term, function (data) {
						 response($.map(data, function (value, key) {
								 return {
										 label: value,
										 value: key
								 };
						 }));
				 });
		    },
		    minLength: 3
		});


}

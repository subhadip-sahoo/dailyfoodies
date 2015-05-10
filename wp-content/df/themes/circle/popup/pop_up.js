var popupStatus = 0;
var gl_popup_id;

// show loader
function show_loader() {
    centerPopup("#popup_loader");
    // initial loading
    if (popupStatus == 0) {
        $("#backgroundPopup").css({
            "opacity": "0.7"
        });
        $("#backgroundPopup").fadeIn("slow");
    } else { // loading subsequent drill down popups in the same popup div
        $(gl_popup_id).fadeOut("slow");
        popupStatus = 0;
    }
    $("#popup_loader").fadeIn("slow");
}


//loading popup with jQuery magic!
function loadPopup(){
	//loads popup only if it is disabled
        
	if(popupStatus==0){
            
		$("#popup_loader").fadeOut("slow");
		$(gl_popup_id).fadeIn("slow");
		//$(gl_popup_id).draggable();
		popupStatus = 1;
//                alert(popupStatus);
	}
}

//disabling popup with jQuery magic!
function disablePopup(){
	//disables popup only if it is enabled
        
	if(popupStatus==1){
//            alert('hi');
		$("#backgroundPopup").fadeOut("slow");
		$(gl_popup_id).fadeOut("slow");
		//$(gl_popup_id).effect("explode", {},1500);
		popupStatus = 0;
	}
}

////centering popup
function centerPopup(as_popup_id) {
    if (as_popup_id == null) {
        as_popup_id = gl_popup_id;
    }
	//request data for centering
	var windowWidth = document.documentElement.clientWidth;
	var windowHeight = document.documentElement.clientHeight;
	var popupHeight = $(as_popup_id).height();
	var popupWidth = $(as_popup_id).width();
	//alert("WW:" + windowWidth + "\r\n:WH:" + windowHeight + "\r\nPH:" + popupHeight + "\r\nPW:" + popupWidth + "\r\nT:" + (windowHeight / 2 - popupHeight / 2) + "\r\nL:" + (windowWidth / 2 - popupWidth / 2));
	//centering
	$(as_popup_id).css({
		"position": "absolute",
		"top": windowHeight/2-popupHeight/2,
		"left": windowWidth/2-popupWidth/2
//		"right":0
	});
	//only need force for IE6
	
	$("#backgroundPopup").css({
		"height": windowHeight
	});
	
}


//CONTROLLING EVENTS IN jQuery
$(function(){
    // ensure dynamic content's events are called
    /*
    $('#popupContact').click(function(e) {
        if ($(e.target).is('a'))
            fn.call(e.target, e);
    });
    */
    
    //CLOSING POPUP
    //Click the x event!
    //$("#popupContactClose").click(function() {  
    $('.popupContactClose').live('click', function() {
        disablePopup();
    });

    $('.jq_popupcancel').live('click', function() {
        disablePopup();
    });

    //Click out event
    $("#backgroundPopup").click(function() {
        disablePopup();
    });

    //Press Escape event!
    $(document).keypress(function(e) {
        if (e.keyCode == 27 && popupStatus == 1) {
            disablePopup();
        }
    });
});
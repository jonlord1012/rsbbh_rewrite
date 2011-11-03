<script language="JavaScript" type="text/javascript">
var y1 = 100;   // change the # on the left to adjuct the Y co-ordinate
var y2 = 400;
(document.getElementById) ? dom = true : dom = false;
	function hideitinv(id,myname,harga) {		 
		var isi = myname;
		document.getElementById("float_inv").style.visibility='hidden';
		document.getElementById("rcpdet_invcode").value= isi;
		document.getElementById("rcpdet_invid").value = id ;
		document.getElementById("rcpdet_baseprice").value = harga ;		 
	}
	function showItInv() {
	  if (dom) {document.getElementById("float_inv").style.visibility='visible' ;}
	}
	function showName() {
	  if (dom) {document.getElementById("rcphead_psname").style.visibility='visible';}
	}
	function showRoom(){
		if (dom) {document.getElementById("rcphead_roomid").style.visibility="visible";}
	}
	function enablingElement(element){
		if (dom) {document.getElementById(element).style.visibility='visible';}
	}    
	function disablingElement (element){
		if (dom) {document.getElementById(element).style.visibility= 'hidden';}
	}
	function placeItInv() {
	  if (dom && !document.all) {document.getElementById("float_inv").style.top = window.pageYOffset + (window.innerHeight - (window.innerHeight-y1)) + "px";
	  }
	  if (document.all) {document.all["float_inv"].style.top = document.documentElement.scrollTop + (document.documentElement.clientHeight - (document.documentElement.clientHeight-y1)) + "px";
	  }
	  window.setTimeout("placeItInv()", 10);		
	}
</script>
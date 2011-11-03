/*$(this).ready(
	function(){
		($("#invid").autocomplete({			
			source:function(req, add){
				$.ajax({
					url:"<?php echo base_url();?>"+"apotek/lookup/",
					dataType:'json',
					type:'POST', 
					//data:req,
					data:'invid='+req,
					success:function(data){
						if(data.response=="true"){
							add(data.message);
						}
					}
				});
			},
			minLength:2,
			select:function(event,ui){
				$("#result").append("<li>"+ui.item.value+"</li>");
			}
		}));
	}
);


*/
var togo = "<?php site_url('/apotek/lookup');?>";
function fixedEncodeURIComponent(str){
  return encodeURIComponent(str).replace(/!/g, '%21').replace(/'/g, '%27').replace(/\(/g, '%28').
         replace(/\)/g, '%29').replace(/\*/g, '%2A').replace('%3C', '<');
}
$(this).ready( function() {
$("#invid").autocomplete({
minLength: 1,
source:
function(req, add){
$.ajax({
//url:"<?php site_url('/apotek/lookup') ;?>",
url:fixedEncodeURIComponent('lookup'),
dataType: 'json',
type: 'POST',
data: req,
success:
function(data){
if(data.response =="true"){
add(data.message);
}
},
});
},
select:
function(event, ui) {
$("#result").append('<ul>');
$.each(data.message, function(i, res){
	$('#result').append('<li>'+res+'</li>');
	console.debug(res);
});
/*
for (var i = 0; i < d; i++) {
    $("#result").append('<li>'+ui.item.value+'</li>');
}*/
$("#result").append('</ul>');
},
});
}); 

/*
$("#details").append('<ul>');
for (var i = 0; i < 10; i++) {
    $("#details").append('<li>something</li>');
}
$("#details").append('</ul>');
*/
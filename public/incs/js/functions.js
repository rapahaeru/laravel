
function buttonRedirect(elem){

		var url = $(elem).attr('url');

      $(document).on('click', elem,function (){
        window.location.href = url;
      });	

}


function submitType(){
	//console.log($this.attr('id'));
	$(document).on('click','#save', function (){
		console.log("ok");
		$('#submit-type').val('1');
		//return false;
	});
	$(document).on('click','#save-inactive', function (){
		$('#submit-type').val('0');
		//return false;
	});	
}
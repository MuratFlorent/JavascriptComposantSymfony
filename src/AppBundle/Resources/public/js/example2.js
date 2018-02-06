(function(){
	$(document).ready(function(){
		$('#tabla2').DataTable(
		{
			"processing" :true,
			"serviceSide" :true,
			"ajax":{
				'url' : 'app/api/disponibilities',
				'type' : 'GET'
			},
			"columns" : [
				{'data' :'id'},
				{'data' :'date'},
				{'data' :'heure'},
			]
		});
	});
})();
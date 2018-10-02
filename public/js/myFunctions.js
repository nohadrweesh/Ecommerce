function check_all(){
	//alert("checkAll");

	if($('input[class="check_all"]:checkbox').is(':checked')){
		//select all and check
		$('input[class="check_item"]:checkbox').each(function(){
			$(this).prop( "checked", true );
		});

	}else{
		$('input[class="check_item"]:checkbox').each(function(){
			$(this).prop( "checked", false );
		});


	}
}

function delete_all(){
	$(document).on('click','.del_all',function(){
		$("#form_data").submit();
	});
	$(document).on('click','.delBtn',function(){
//alert("del");
		$records_length=$('input[class="check_item"]:checked').length;
		//alert($records_length);
		if($records_length>0){
			$('.not_empty_record').removeClass('hidden');
			$('#records_count').text($records_length);
			$('.empty_record').addClass('hidden');

		}else{
			$('.not_empty_record').addClass('hidden');
			$('.empty_record').removeClass('hidden');

		}
		$('#del_modal').modal();

	});
}
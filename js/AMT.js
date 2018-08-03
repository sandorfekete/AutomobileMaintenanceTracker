AMT = {

	BASEURL: '',
	AJAX_PATH: '',
	CONTROLLER: '',
	VIEW: '',
			
    init: function(){
		console.log('jQuery OK');
		console.log('AMT initialized');
		
		if (['orders','automobiles'].includes(this.CONTROLLER)){
			this.getRecords();
		}
    },
	
	getRecords: function(){
		var $form = $('#frmFilters');
		var action = 'get'+AMT.Form.Util.capitalize(this.CONTROLLER);

		$.ajax({
			url: AMT.BASEURL+'/ajax/'+action+'.php',
			type: 'POST',
			data: $('#frmFilters').serialize(),
			dataType: 'json',
			success: function(data){
				$($form).find('tbody').html(data.data);
				$($form).find('.pagination').html(data.pagination);
				$($form).find('.totals .total').text(data.recordsTotal);

				data.recordsTotal === 0 ? $($form).find('.pagination').css('visibility', 'hidden') : false;
				
				$($form).find('.totals .filtered').hide();

				AMT.bindPagination();
			}
		});
	},

	bindPagination: function(){
		$('#frmFilters .pagination li').click(function(e){
			var limitOffset = $(this).attr('data-limit-offset');
			//console.log(limitOffset);
			$('input[name="limitOffset"]').val(limitOffset);
			e.stopPropagation();
			AMT.getRecords();
		});
	},
	
	addRecord: function(){
		location.href = AMT.BASEURL+'/'+AMT.CONTROLLER+'/add';
	},
	
	
	editRecord: function(id){
		$('#frmAction').find('input[name="_id"]').val(id).parent().submit();
	},
	
	deleteRecord: function(id){
		var action = 'delete'+AMT.Form.Util.capitalize(AMT.Form.Util.singularize(this.CONTROLLER));
		
		$('tr[data-row-id="'+id+'"]').addClass('error');

		var timeout = setTimeout(function(){
			clearTimeout(timeout);
			if (confirm('Are you sure you want to DELETE record #'+id+'?')){
				$.ajax({
					url: AMT.BASEURL+'/ajax/'+action+'.php',
					type: 'POST',
					data: {_id:id},
					dataType: 'json',
					success: function(data){
						$('input[name="limitOffset"]').val(0);
						AMT.getRecords();
					}
				});
			} else {
				$('tr[data-row-id="'+id+'"]').removeClass('error');
			}
		}, 100);
		
		
	},
	
	cancel: function(){
		location.href = AMT.BASEURL+'/'+AMT.CONTROLLER;
	},
	
	// disables 'oil change' order type option, if automobile selected is 'electric'
	updateOrderTypes: function(id){		
		if (id == 3){
			$('#order_type_id').val('').find('option[value="1"]').prop('disabled', true);
		} else {
			$('#order_type_id').find('option[value="1"]').prop('disabled', false);
		}
	}

};

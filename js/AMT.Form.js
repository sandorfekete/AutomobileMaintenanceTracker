AMT.Form = {
	
	messages: [],
	
	validateForm: function(pForm)
	{ 	
		var errors = 0; 
		var jForm = '#'+pForm.id;
		var thisObj = this;
		var message = '';
		
		$(jForm+' .messages').html('');
	
		this.messages = [];
		
		$(jForm+' input.data, '+jForm+' select.data, '+jForm+' textarea.data').each(function(i){	
			if (!thisObj.validateField($(this)))
			{
				errors++;
			}
		});	
		
		if (errors == 0)
		{	
			this.submitForm(jForm);
		}
		else
		{
			message = "<b>ERRORS:</b><br>";
			
			for (var i = 0; i < this.messages.length; i++)
			{
				message += "- " + this.messages[i] + "<br>";
			}
				
			$(jForm+' .messages').html(message).addClass('error').show();
						
			return false;
		}
		
		return false;
	},
	
	validateField: function(field)
	{
		var value = $(field).val();
		var msg = '';
		
		if ($(field).hasClass('required') && AMT.Form.Util.checkEmpty(field, value))
		{
			this.displayError(field, "required");
			return false;
		}		
		
		if (!AMT.Form.Util.checkEmpty(field, value))		
		{		
			if (!AMT.Form.Validate.validateChars(value))
			{
				msg = 'invalid characters';
			}
			else if ($(field).hasClass("email") && !AMT.Form.Validate.validateEmail(value))
			{
				msg = 'invalid email';
			}		
			else if ($(field).hasClass("digits") && !AMT.Form.Validate.validateDigits(value))
			{
				msg = 'digits only';
			}	
			else if ($(field).hasClass("date") && !AMT.Form.Validate.validateDate(value))
			{
				msg = 'date format: mm/dd/yyyy';
			}				
			else if ($(field).hasClass("postalcode") && !AMT.Form.Validate.validatePostalCode(value))
			{
				msg = 'postal code format: T0T 0T0';
			}
			else if ($(field).closest('label').hasClass('invalid'))
			{
				msg = 'invalid';
			}
			else
			{
				this.removeError(field);
				return true;
			}
			
			this.displayError(field, msg);		
			return false;
		}
		else
		{
			this.removeError(field);
			return true;			
		}
		
		return false;
	},
	
	submitForm: function(jForm)
	{ 
		var task = $(jForm).find('input[name="task"]').val();
		var submitText = $(jForm+' .submit').attr('data-button-text');
		
		$(jForm+' .submit').addClass('loading').text('0').attr('disabled', true);
	
		$.ajax({
			url:AMT.BASEURL+'/ajax/'+task+'.php', 
			type:'POST', 
			data: $(jForm).serialize(), 
			success: function(result){
				$(jForm+' .loader').hide();
				
				if (result.type == 'success')
				{
					$(jForm)[0].submit();
				}
				else
				{
					$(jForm+' .submit').removeClass('loading').text(submitText).attr('disabled', false);
					$(jForm+' .messages').html('ERROR: '+result.message).addClass('error').show();
				}
			}, 
			error: function(jqXHR, textStatus, errorThrown){
				$(jForm+' .submit').removeClass('loading').text(submitText).attr('disabled', false);
				$(jForm+' .messages').html((textStatus).toUpperCase()+': '+errorThrown).addClass('error').fadeIn();				
			},
			dataType: 'json'
		});
		
		return false;
	},
	
	resetForm: function(pForm)
	{
		var jForm = '#'+pForm.id;
		
		if (confirm("Are you sure you want to clear everything?"))
		{	
			$(jForm+' .messages').html('').hide();
			$(jForm+' .error').removeClass('error');
			$(jForm)[0].reset();		
			$(jForm+' input:first').focus();
			
			return true;
		}
		
		return false;
	},
	
	displayError: function(field, error)
	{
		var message = '';
		
		$(field).closest('label').addClass('error');
		
		message = $(field).attr('data-error-label') ? $(field).attr('data-error-label') : $(field).attr('name');
		message = message.replace(/\[\]/g, '');
		message = this.formatErrorLabel(message);	
		message = AMT.Form.Util.capitalize(message);
		
		// this resolves duplicate error messages for radio and checkbox sets
		if (!this.messages.includes(message))
		{
			this.messages.push(message + ' - ' + error);
		}
		
	},	
	
	removeError: function(field)
	{
		$(field).closest('label').removeClass('error');
	},
	
	formatErrorLabel: function(label)
	{
		return label.replace(/_/g, ' ');
	}
		
};
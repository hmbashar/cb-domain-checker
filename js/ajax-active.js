jQuery(document).ready(function($) {	
	$('.cb-domain-search-form form').on('submit', function(e) {
		e.preventDefault(); // Prevent the form from submitting

		var CbDomainCheckInput = $('.cb-domain-check input#Search').val();
		var CBDomainSearchNonce = $('.cb-domain-check input#Search').attr('data-nonce');
		
		if(CbDomainCheckInput) {
			$.ajax({
				type: 'post',
				url: CbDomainSearch.ajaxurl,
				data: {
					action: 'cb_domain_check_result',
					domain_name: CbDomainCheckInput,
					data_nonce: CBDomainSearchNonce,
				},
				beforeSend: function() {
					$('.cb_domain_check_loader').addClass('cb-domain-lds-ellipsis');
				},
				success: function(response) {
					$('.cb_domain_check_loader').removeClass('cb-domain-lds-ellipsis');
					$('.cb-domain-search-result').html(response);
				},
				error: function() {
					alert('There was an error processing your request.');
				}
			});
		} else {
			alert('Please enter a domain name.');
		}

		return false;
	});
});

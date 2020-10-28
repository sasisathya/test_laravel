	  $(document).ready(function() {
    var nospecial=/^[a-zA-Z0-9_.-]*$/;
    var valid_mails =/^([\w-.]+@(?!gmail\.com)(?!yahoo\.com)(?!hotmail\.com)(?!aol\.com)(?!rediff\.com)(?!mail\.ru)(?!yandex\.ru)(?!mail\.com)([\w-]+.)+[\w-]{2,4})?$/;
    $('#contact_form').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
		            company_name: {
		                validators: {
		                        notEmpty: {
		                        message: 'Please enter your Company Name'
		                    },
		                    regexp: {
				                regexp: nospecial,
				                message: 'Company Name should not contain special chars.'
				            },
		                }
		            },
		            mobile:{
		            	validators: {
		            		stringLength: {
		                        min: 10,
		                    },
		                        notEmpty: {
		                        message: 'Please enter your Mobile No'
		                    },
		                }
		            },
		             hr_name: {
		                validators: {
		                    notEmpty: {
		                        message: 'Please enter your HR Name'
		                    },
		                }
		            },
		            contact_no:{
						validators: {
		                    notEmpty: {
		                        message: 'Please enter your Moile No'
		                    }
		                }
		            },
					 user_password: {
		                validators: {
		                    identical: {
		                        field: 'confirm_password',
		                        message: 'The password and its confirm are not the same'
		                    },
		                     notEmpty: {
		                        message: 'Please enter your Password'
		                    }
		                }
		            },
		            confirm_password: {
		                validators: {
		                    identical: {
		                        field: 'user_password',
		                        message: 'The password and its confirm are not the same'
		                    },
		                     notEmpty: {
		                        message: 'Please enter your confirm Password'
		                    }
		                }
		            },
		            email: {
		                validators: {
		                    notEmpty: {
		                        message: 'Please enter your Email Address'
		                    },
		                    emailAddress: {
		                        message: 'Please enter a valid Email Address'
		                    },
				            regexp: {
				                regexp: valid_mails,
				                message: 'Please provide a professional E-Mail Address.'
				            },
		                }
		            },
		            contact_no: {
		                validators: {
		                  stringLength: {
		                        min: 12, 
		                        max: 12,
		                    notEmpty: {
		                        message: 'Please enter your Mobile No.'
		                     }
		                }
		            },
                }
            }
        })
        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                $('#contact_form').data('bootstrapValidator').resetForm();

            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            $.post($form.attr('action'), $form.serialize(), function(result) {
                console.log(result);
            }, 'json');
        });
});
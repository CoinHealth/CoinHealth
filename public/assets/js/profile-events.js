var changes = {};

var events = {

	init: function() {
		var self= this;
		self.initEvent();
		$('.dl-menuwrapper').dlmenu();
		//self.initChangeIncome();
		//self.initStatus();
	},

	initEvent: function () {
		var self = this;
		var incomeId= 0, maritalId= 0, childId= 0, circumstancesId= 0,
				citizenshipId= 0, locationId= 0, incarcerationId = 0;
		var	drop = new Dropzone('#dz-attachments', {
      url: '/profile/life-changing-events/change',
      paramName: 'attachments',
      previewsContainer: '.dz-attachments-preview',
      uploadMultiple: true,
      parallelUploads: 100,
      autoProcessQueue: false,
      acceptedFiles: '.png, .jpg, .docx, .pdf, .doc',
      init: function() {
        this.on('addedfile', function(file) {
          var removeButton = Dropzone.createElement("<button class='btn btn-danger btn-xs btn-block' style='margin-top:5px;'>Remove file</button>");
          var _this = this;
          var ext = self.getFileExtension(file.name).toLowerCase();

          if (!checkExt(ext)) {
            _this.removeFile(file);
            return false;
          }
          else {
            removeButton.addEventListener("click", function(e) {
              e.preventDefault();
              e.stopPropagation();
              _this.removeFile(file);
            })
            file.previewElement.appendChild(removeButton);
          }
          if ($('.btn-upload-attachments').hasClass('disabled'))
            $('.btn-upload-attachments').removeClass('disabled');
        });
        this.on('sending', function(file,xhr,formData) {
          formData.append('_token', csrf_token);
        });
        this.on('queuecomplete', function() {
					location.reload();
				});
      }
    }),
		start = function() {
			$('.success-message').hide();
			$('.wrapper, .wrap, .event-button').hide();
			$('.btn-event').on('click', clicked);
			$('.btn-event').on('click', append);
			$('.btn-add-applicant').on('click', append);
			$('.btn-submit').on('click', submit);
			$('#btnCancel').on('click', cancel);
			$('.btn-upload-attachments').on('click', upload);
		},
		cancel = function() {
			//TODO: change wihout reloading
			location.reload();
		},
		clicked = function() {
			var eventName= $(this).find('.inner').attr('data-toggle');
			$('.btn-'+ eventName).find('.inner').toggleClass('active');
			if ($('.btn-'+ eventName).find('.inner').hasClass('active') ) {
				$('.'+ eventName +'-wrapper').fadeIn('slow');
				$('.icon-containers .btn-'+ eventName).fadeOut();
				$('.event-button').show();
			}else{
				$('.'+ eventName +'-wrapper').fadeOut('fast');
				$('.icon-containers .btn-'+ eventName).fadeIn();
				$('.row-' + eventName + '.cloned').remove();
				if(eventName == "income")
					incomeId=0;
				else if(eventName == "marital")
					maritalId=0;
				else if(eventName == "child")
					childId=0;
				else if(eventName == "circumstances")
					circumstancesId=0;
				else if(eventName == "citizenship")
					citizenshipId=0;
				else if(eventName == "location")
					locationId=0;
				else if(eventName == "incarceration")
					incarcerationId=0;
			}
			if(!$('.btn-event .inner').hasClass('active')) {
				$('.event-button').hide();
			}
		},
		append = function() {
			var eventName= $(this).attr('data-toggle');
			$template = $('.row-' + eventName + ':not(.cloned)').clone().addClass('cloned');
			// var $applicants = $("[name='applicant_applicant[]'] > option:not(.cloned)").clone().addClass('cloned');
			if (eventName == "income"){
				$template.find('[name="applicant_applicant[]"]').select2({
					placeholder: 'Choose Applicant',
				}).attr({
					'id' : 'applicant_applicant'+incomeId,
				}).closest('.form-group').find('label').attr({
					'for': 'applicant_applicant'+incomeId,
				});
				$template.find('[name="applicant_income_amount[]"]').attr({
					'id' : 'applicant_income_amount'+incomeId,
				}).closest('.form-group').find('label').attr({
					'for': 'applicant_applicant'+incomeId,
				});
				$template.find('[name="applicant_income_type[]"]').select2({
					placeholder: 'Choose Income Type',
				}).attr({
					'id': 'applicant_income_type'+incomeId,
				});
				$template.find('[name="applicant_employer[]"]').attr({
					'id': 'applicant_employer'+incomeId,
				}).closest('.form-group').find('label').attr({
					'for': 'applicant_employer'+incomeId,
				});
				$template.find('[name="applicant_employer_phone[]"]').attr({
					'id': 'applicant_employer_phone'+incomeId,
				}).closest('.form-group').find('label').attr({
					'for': 'applicant_employer_phone'+incomeId,
				});
				incomeId++;
			}
			else if(eventName == 'marital') {
				$template.find('[name="applicant_applicant[]"]').select2({
					placeholder: 'Choose Applicant',
				}).attr({
					'id' : 'applicant_applicant'+maritalId,
				}).closest('.form-group').find('label').attr({
					'for': 'applicant_applicant'+maritalId,
				});
			 	$template.find('[name="applicant_marriage_date[]"]').dateDropdowns({
					daySuffixes: false,
					displayFormat: 'mdy',
					defaultDate: 'mm/dd/yyyy',
					submitFormat: 'mm/dd/yyyy',
					dropdownClass: 'dropDownMarital col-xs-4',
					minYear: 1950,
					maxYear: new Date().getFullYear() + 14,
					required: true,
				});
				var dropDowns = $template.find('select.dropDownMarital');
				dropDowns.filter('.month').select2({
					placeholder: 'Month',
				});
				dropDowns.filter('.day').select2({
					placeholder: 'Day',
				});
				dropDowns.filter('.year').select2({
					placeholder: 'Year',
				});
				$template.find('[name="applicant_marriage_date[]"]').attr({
					id: 'applicant_marriage_date'+maritalId,
				});

				$template.find('[name="applicant_tax_status[]"]').select2({
					placeholder: 'Choose Tax Status',
				}).attr({
					'id': 'applicant_tax_status'+maritalId,
				});
				maritalId++;
			}
			else if (eventName == "child") {
				$template.find('[name="applicant_applicant[]"]').select2({
					placeholder: 'Choose Applicant',
				}).attr({
					'id' : 'applicant_applicant'+childId,
				}).closest('.form-group').find('label').attr({
					'for': 'applicant_applicant'+childId,
				});

				$template.find('[name="applicant_child_birth[]"]').dateDropdowns({
					daySuffixes: false,
					displayFormat: 'mdy',
					defaultDate: 'mm/dd/yyyy',
					submitFormat: 'mm/dd/yyyy',
					dropdownClass: 'dropDownChild col-xs-4',
					minYear: 1950,
					maxYear: new Date().getFullYear() + 14,
					required: true,
				});
				var dropDowns = $template.find('select.dropDownChild');
				dropDowns.filter('.month').select2({
					placeholder: 'Month',
				});
				dropDowns.filter('.day').select2({
					placeholder: 'Day',
				});
				dropDowns.filter('.year').select2({
					placeholder: 'Year',
				});
				$template.find('[name="applicant_child_birth[]"]').attr({
					id: 'applicant_child_birth'+childId,
				});
				childId++;
			}
			else if(eventName == "circumstances") {
				$template.find('[name="applicant_applicant[]"]').select2({
					placeholder: 'Choose Applicant',
				}).attr({
					'id' : 'applicant_applicant'+circumstancesId,
				}).closest('.form-group').find('label').attr({
					'for': 'applicant_applicant'+circumstancesId,
				});

				$template.find('[name="applicant_exceptional_circumstances[]"]').select2({
					placeholder: 'Choose Cases',
				}).attr({
					'id': 'applicant_exceptional_circumstances'+circumstancesId,
				});
				circumstancesId++;
			}
			else if (eventName == "citizenship") {
				$template.find('[name="applicant_applicant[]"]').select2({
					placeholder: 'Choose Applicant',
				}).attr({
					'id' : 'applicant_applicant'+citizenshipId,
				}).closest('.form-group').find('label').attr({
					'for': 'applicant_applicant'+citizenshipId,
				});
				$template.find('[name="applicant_naturalization_documents[]"]').attr({
					'id': 'applicant_naturalization_documents' + citizenshipId,
				}).on('change', function() {
					var val = $(this).val();

					$template.find('.naturalized-conditions').hide().filter('#naturalized-con'+val).fadeIn().attr({
						name: 'naturalized-condition'+ val +'-applicant'+ (citizenshipId-1),
					});
				});
				citizenshipId++;
			}
			else if (eventName == "location") {
				$template.find('[name="applicant_applicant[]"]').select2({
					placeholder: 'Choose Applicant',
				}).attr({
					'id' : 'applicant_applicant'+locationId,
				}).closest('.form-group').find('label').attr({
					'for': 'applicant_applicant'+locationId,
				});
				$template.find('[name="applicant_residential_address[]"]').attr({
					'id': 'applicant_residential_address'+locationId,
				});
				$template.find('[name="applicant_apt_unit_no[]"]').attr({
					'id': 'applicant_apt_unit_no'+locationId,
				});
				$template.find('[name="applicant_city[]"]').attr({
					'id': 'applicant_city'+locationId,
				});
				$template.find('[name="applicant_state[]"]').select2({
					placeholder: 'Choose State',
				}).attr({
					'id' : 'applicant_state'+locationId,
				}).closest('.form-group').find('label').attr({
					'for': 'applicant_state'+locationId,
				});

				$template.find('[name="applicant_zipcode[]"]').attr({
					'id': 'applicant_zipcode'+locationId,
				});
				locationId++;
			}
			else if (eventName == "incarceration") {
				$template.find('[name="applicant_applicant[]"]').select2({
					placeholder: 'Choose Applicant',
				}).attr({
					'id' : 'applicant_applicant'+incarcerationId,
				}).closest('.form-group').find('label').attr({
					'for': 'applicant_applicant'+incarcerationId,
				});
				$template.find('[name="applicant_incarceration[]"]').dateDropdowns({
					daySuffixes: false,
					displayFormat: 'mdy',
					defaultDate: 'mm/dd/yyyy',
					submitFormat: 'mm/dd/yyyy',
					dropdownClass: 'dropDownIncarceration col-xs-4',
					minYear: 1950,
					maxYear: new Date().getFullYear() + 14,
					required: true,
				});
				var dropDowns = $template.find('select.dropDownIncarceration');
				dropDowns.filter('.month').select2({
					placeholder: 'Month',
				});
				dropDowns.filter('.day').select2({
					placeholder: 'Day',
				});
				dropDowns.filter('.year').select2({
					placeholder: 'Year',
				});
				$template.find('[name="applicant_incarceration[]"]').attr({
					id: 'applicant_release_date'+incarcerationId,
				});

				incarcerationId++;
			}
			$('.' + eventName + '-wrapper.wrap').append($template);
		},
		getData = function() {
			if ($('.btn-income').find('.inner').hasClass('active')) {
				changes.change_in_income= [];
				var row= $('.row-income');
				for (var i= 0; incomeId > i; i++) {
					changes.change_in_income.push({
						fullname: row.find('#applicant_applicant'+i).val(),
						monthly_amount: row.find('#applicant_income_amount'+i).val(),
						income_type: row.find('#applicant_income_type'+i).val(),
						employer: row.find('#applicant_employer'+i).val(),
						employer_phone: row.find('#applicant_employer_phone'+i).val(),
					});
				}
			}

			if($('.btn-marital').find('.inner').hasClass('active')) {
				changes.marital_status= [];
				var row = $('.row-marital');
				for (var i=0; maritalId > i; i++) {
					changes.marital_status.push({
						fullname: row.find('#applicant_applicant'+i).val(),
						marriage_date: row.find('#applicant_marriage_date'+i).val(),
						tax_status: row.find('#applicant_tax_status'+i).val(),
					});
				}
			}

			if($('.btn-child').find('.inner').hasClass('active')) {
				changes.had_a_child= [];
				var row= $('.row-child');
				for (var i=0; childId > i; i++) {
					changes.had_a_child.push({
						fullname: row.find('#applicant_applicant'+i).val(),
						child_birth: row.find('#applicant_child_birth'+i).val(),
					});
				}
			}

			if($('.btn-circumstances').find('.inner').hasClass('active')) {
				changes.exceptional_circumstances= [];
				var row= $('.row-circumstances');
				for (var i=0; circumstancesId > i; i++) {
					changes.exceptional_circumstances.push({
						fullname: row.find('#applicant_applicant'+i).val(),
						exceptional_circumstances: row.find('#applicant_exceptional_circumstances'+i).val(),
					});
				}
			}

			if($('.btn-citizenship').find('.inner').hasClass('active')) {
				changes.citizenship= [];
				var row= $('.row-citizenship');
				for (var i=0; citizenshipId > i; i++) {
					changes.citizenship.push({
						fullname: row.find('#applicant_applicant'+i).val(),
						naturalization_document: row.find('#naturalization_certificate_number'+i).val(),
						documents: (row.find('#applicant_naturalization_documents'+i).val() == 1 ?
								{
									alien_number: $('[name="naturalized-condition1-applicant' +i+ '"]').find('[name=alien_number]').val(),
									certificate_number: $('[name="naturalized-condition1-applicant' +i+ '"]').find('[name=naturalization_certificate_number]').val(),
								}
							:
								{
									alien_number: $('[name="naturalized-condition2-applicant' +i+ '"]').find('[name=alien_number]').val(),
									certificate_number: $('[name="naturalized-condition2-applicant' +i+ '"]').find('[name=citizenship_certificate_number]').val(),
								}
							),
					});
				}
			}

			if($('.btn-location').find('.inner').hasClass('active')) {
				changes.moved_location= [];
				var row= $('.row-location');
				for (var i=0; locationId > i; i++) {
					changes.moved_location.push({
						fullname: row.find('#applicant_applicant'+i).val(),
						residential_address: row.find('#applicant_residential_address'+i).val(),
						apt_unit_no: row.find('#applicant_apt_unit_no'+i).val(),
						city: row.find('#applicant_city'+i).val(),
						state: row.find('#applicant_state'+i).val(),
						zip_code: row.find('#applicant_zipcode'+i).val(),
					});
				}
			}

			if($('.btn-incarceration').find('.inner').hasClass('active')) {
				changes.incarceration= [];
				var row= $('.row-incarceration');
				for (var i=0; incarcerationId > i; i++) {
					changes.incarceration.push({
						fullname: row.find('#applicant_applicant'+i).val(),
						release_date: row.find('#applicant_release_date'+i).val(),
					});
				}
			}
			console.log(changes);
		},

    checkExt = function(ext) {
      return ext == "png" || ext == "jpg" || ext == "docx" || ext == "doc" || ext == "pdf";
    },
    upload = function() {
     $('#upload-attachments').modal('toggle');
	 },
	submit = function() {
			getData();
			// $.post('/profile/life-changing-events/change', {
			// 	 _token: csrf_token,
			// 	 data: changes,
			// 	 email: $('#email').text(),
			// }).done(done);

			var fd = new FormData();
      $.each(drop.files, function(i,v) {
        fd.append('attachFiles[]', v);
      });
			fd.append('_token', csrf_token);
			fd.append('data', JSON.stringify(changes));
			fd.append('email', $('#email').text());

			$.ajax({
				url: '/profile/life-changing-events/change',
				data: fd,
				processData: false,
				type: 'post',
				contentType: false,
				success: function(data) {
					$('.success-message').show();
					//location.reload(true);
					var scrollPos =  $(".panel-body").offset().top;
		 			$(window).scrollTop(scrollPos);
				}
			});

		},
		done = function(data) {
			$('.success-message').show();
			//location.reload(true);
			var scrollPos =  $(".panel-body").offset().top;
 			$(window).scrollTop(scrollPos);
		};
		start();
	},

  getFileExtension: function(filename) {
		var ext = /^.+\.([^.]+)$/.exec(filename);
		return ext == null ? "" : ext[1];
	},

};

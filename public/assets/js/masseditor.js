jQuery(document).ready(function($) {

	jQuery(function() {
	    $('.toolbar-button').fadeIn(300);
	    $('.toolbar-button span').fadeIn(300);
		$("input[type=checkbox]").css({
			'display': 'none'
		});
		ajax_mass_editor.init();



	});
	var CSRF_TOKEN = $('meta[name="_token"]').attr('content');
	var DELETE = 0;
	var UPDATE = 0;
	var ajax_mass_editor = {



		init: function() {
			this.editFunct();
			this.deleteFunct();
			this.filterFunct();
		},

		editFunct: function() {
			$("#mass-edit").click(function() {
				$("input[type=checkbox]").css({
					'display': 'inline'
				});
				console.log('1');

				if (UPDATE === 0) {
					$(this).parent().append('<button id="confirm-update">确认</button>' + '<button id="cancel-update">取消</button>');

					$("#cancel-update").bind('click', function(e) {
						e.preventDefault();
						$("#confirm-update").fadeOut(300);
						$("#cancel-update").unbind('click');
						$(this).fadeOut(300);
						$("input[type=checkbox]").css({
							'display': 'none'
						});
						UPDATE = 0;
					});
					UPDATE = 1;


					$("#confirm-update").click(function() {

						$("table").css({
							'display': 'none'
						});
						$(".form-section-delete-all").empty();
						$(".form-section-delete-all").css({
							'display': 'block'
						});
						$("input:checked").each(function() {
							//console.log('1');


							$("<form>").attr({
								'id': 'form-' + $(this).val(),
								'method': 'post',
								'class': 'form-update',
								'action': window.location.protocol + "//" + window.location.host + '/picture/' + $(this).val()
							}).appendTo(".form-section-delete-all");

						});

						if ($('.form-update').length) {
							$('.form-update').each(function() {
								$('<input>').attr({
									'type': 'hidden',
									'name': '_token',
									'value': CSRF_TOKEN
								}).appendTo(this);
								$('<input>').attr({
									'type': 'hidden',
									'name': '_method',
									'value': 'update'
								}).appendTo(this);
								$idx = $(this).attr('id');
								$urlc = window.location.protocol + "//" + window.location.host + "/picture/listids/" + $(this).attr('id').split('-')[1];


							});

							$.ajax({
								dataType: "json",
								url: window.location.protocol + "//" + window.location.host + "/picture/listids/" + $idx.split('-')[1],
								success: function(msg) {

									$('<input>').attr({
										'type': 'text',
										'name': 'title',
										'value': msg[0].title
									}).appendTo('#' + $idx);
									$('<input>').attr({
										'type': 'text',
										'name': 'tag',
										'value': msg[0].tag
									}).appendTo('#' + $idx);
								}
							});
						}

						//  $('.form-section-delete-all form').each(function() {
						//     var that = $(this);
						//    $.post(that.attr('action'), that.serialize());
						//});

/*
                       $.ajax({
                            url: window.location.protocol + "//" + window.location.host +"/picture/massedit/",
                            success: function(msg){
                                $("#main").empty();
                                $('#main').append($(msg).find('section'));
                            }
                        });*/



					});

				}



			});
		},
		deleteFunct: function() {
			$("#mass-delete").click(function() {

				if (DELETE === 0) {
					$(this).parent().append('<button id="confirm">确认</button>' + '<button id="cancel">取消</button>');
					$("input[type=checkbox]").css({
						'display': 'inline'
					});
					$("#cancel").bind('click', function(e) {
						e.preventDefault();
						$("#confirm").fadeOut(300);
						$("#cancel").unbind('click');
						$(this).fadeOut(300);
						$("input[type=checkbox]").css({
							'display': 'none'
						});
						DELETE = 0;
					});
					DELETE = 1;


					$("#confirm").click(function() {


						$(".form-section-delete-all").empty();

						$("input:checked").each(function() {
							//console.log('1');


							$("<form>").attr({
								'method': 'post',
								'class': 'form-delete',
								'action': window.location.protocol + "//" + window.location.host + '/picture/' + $(this).val()
							}).appendTo(".form-section-delete-all");


						});
						if ($('.form-delete').length) {
							$('.form-delete').each(function() {
								$('<input>').attr({
									'type': 'hidden',
									'name': '_token',
									'value': CSRF_TOKEN
								}).appendTo(this);
								$('<input>').attr({
									'type': 'hidden',
									'name': '_method',
									'value': 'delete'
								}).appendTo(this);
							});
						}


						$('.form-section-delete-all form').each(function() {
							var that = $(this);
							$.post(that.attr('action'), that.serialize());
						});


						$.ajax({
							url: window.location.protocol + "//" + window.location.host + "/picture/massedit/",
							success: function(msg) {
								$("#main").empty();
								$('#main').append($(msg).find('section'));
							}
						});



					});

				}



			});
		},
		
		filterFunct: function(){
		    $("#mass-advance").click(function() {
		        $(this).parent().siblings().fadeOut(300);
		        console.log($(this).siblings());
		        $.ajax({
							url: window.location.protocol + "//" + window.location.host + "/picture/photoeditor/",
							success: function(msg) {
								$("#main").empty();
								$('#main').append($(msg).find('section'));
							}
						});
		
		     });
		}


	};








});
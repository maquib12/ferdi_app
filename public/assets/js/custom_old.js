(function($) {
  'use strict';
  $(function() {
    var body = $('body');
    var sidebar = $('.sidebar');

    /* function addActiveClass(element) {
      if (current === "") {
        //for root url
        if (element.attr('href').indexOf("index.html") !== -1) {
          element.parents('.nav-item').last().addClass('active');
          if (element.parents('.sub-menu').length) {
            element.closest('.collapse').addClass('show');
            element.addClass('active');
          }
        }
      } else {
        //for other url
        if (element.attr('href').indexOf(current) !== -1) {
          element.parents('.nav-item').last().addClass('active');
          if (element.parents('.sub-menu').length) {
            element.closest('.collapse').addClass('show');
            element.addClass('active');
          }
          if (element.parents('.submenu-item').length) {
            element.addClass('active');
          }
        }
      }
    }

    var current = location.pathname.split("/").slice(-1)[0].replace(/^\/|\/$/g, '');
    $('.nav li a', sidebar).each(function() {
      var $this = $(this);
      addActiveClass($this);
    })

    $('.horizontal-menu .nav li a').each(function() {
      var $this = $(this);
      addActiveClass($this);
    }) */

    //Close other submenu in sidebar on opening any

    sidebar.on('show.bs.collapse', '.collapse', function() {
      sidebar.find('.collapse.show').collapse('hide');
    });

    $('[data-toggle="minimize"]').on("click", function() {
      if ((body.hasClass('sidebar-toggle-display')) || (body.hasClass('sidebar-absolute'))) {
        body.toggleClass('sidebar-hidden');
      } else {
        body.toggleClass('sidebar-icon-only');
      }
    });

    //checkbox and radios
    $(".form-check label,.form-radio label").append('<i class="input-helper"></i>');

  });
  $('.targetClass .nav-link').click(function(){
	var target_elem = $(this).data('target');
	$('.tab-content .tab-pane').removeClass('show active');
	$('.tab-content .tab-pane'+target_elem).addClass('show active');
	});

	
	// function check_status(e){
	// 	if(e.val()=='active'){
	// 		e.removeAttr('class');
	// 		e.addClass('text-success');
	// 	}
	// 	if(e.val()=='inactive'){
	// 		e.removeAttr('class');
	// 		e.addClass('text-warning');
	// 	}
	// 	if(e.val()=='rejected'){
	// 		e.removeAttr('class');
	// 		e.addClass('text-warning');
	// 	}
	// 	if(e.val()=='requested'){
	// 		e.removeAttr('class');
	// 		e.addClass('text-info');
	// 	}
	// }
	// $('.status').on('change', function() {
	// 	check_status($(this))
	// });
	// $('.status').each(function(){
	// 	check_status($(this))
	// });
	
	//Open submenu on hover in compact sidebar mode and horizontal menu mode
  $(document).on('mouseenter mouseleave', '.sidebar .nav-item', function(ev) {
    var body = $('body');
    var sidebarIconOnly = body.hasClass("sidebar-icon-only");
    var sidebarFixed = body.hasClass("sidebar-fixed");
    if (!('ontouchstart' in document.documentElement)) {
      if (sidebarIconOnly) {
        if (sidebarFixed) {
          if (ev.type === 'mouseenter') {
            body.removeClass('sidebar-icon-only');
          }
        } else {
          var $menuItem = $(this);
          if (ev.type === 'mouseenter') {
            $menuItem.addClass('hover-open')
          } else {
            $menuItem.removeClass('hover-open')
          }
        }
      }
    }
  });
  $('.search-list .select-all').click(function(){
		$(this).closest('.search-list').find('.list input[type="checkbox"]').prop('checked', true);
	});
	$('.search-list .deselect-all').click(function(){
		$(this).closest('.search-list').find('.list input[type="checkbox"]').prop('checked', false);
	});
  $('.aside-toggler').click(function(){
    $('.chat-list-wrapper').toggleClass('slide')
  });
	$('[data-toggle="tooltip"]').tooltip();
	
})(jQuery);

$('#from').datetimepicker({
	format: 'DD/MM/YYYY',
});
$('#to').datetimepicker({
	format: 'DD/MM/YYYY',
	useCurrent: false //Important! See issue #1075
});
$("#from").on("dp.change", function (e) {
	$('#to').data("DateTimePicker").minDate(e.date);
});
$("#to").on("dp.change", function (e) {
	$('#from').data("DateTimePicker").maxDate(e.date);
});

/* $(function() {
	$( "#from" ).datepicker({
	dateFormat: "d M yy",
			defaultDate: "w",
			changeMonth: true,
			numberOfMonths: 1,
			onSelect: function( selectedDate ) {
					$( "#to" ).datepicker( "option", "minDate", selectedDate );
			}
	});
	$( "#to" ).datepicker({
	dateFormat: "d M yy",
			defaultDate: "-w",
			changeMonth: true,
			numberOfMonths: 1,
			onSelect: function( selectedDate ) {
					$( "#from" ).datepicker( "option", "maxDate", selectedDate );
			}
	});
}); */
function validationFrom(d1)
{
	var dateTo = new Date($('#to').val());
	var dd = dateTo.getDate(); 	
	//var mm = dateTo.getMonth(); 
	var mm = ("0" + (dateTo.getMonth() + 1)).slice(-2);
	var yy = dateTo.getFullYear();
	
	var todt = (yy*10000)+(mm*100)+leadingZero(dd);
	var d1 =parseInt(d1,10);
	var d2 =parseInt(todt,10);

	if(d1 >= d2)
	{
		var dateFrom = new Date($('#from').val());
		var dd = dateFrom.getDate();
		var mm = dateFrom.getMonth(); 	
		var yy = dateFrom.getFullYear();
		
		
		var newDateFrom = new Date(yy,mm,dd);
		var dd = newDateFrom.getDate();	
		//var mm = newDateFrom.getMonth();	
		var mm = ("0" + (newDateFrom.getMonth() + 1)).slice(-2);	
		var yy = newDateFrom.getFullYear();

		var frmdt = yy+"-"+mm+"-"+leadingZero(dd);
		$('#to').val($.datepicker.formatDate( "d M yy", new Date(frmdt) ));
	}	
}
function dateFromNext()
{
	//alert('datefromNext');
	var dateFrom = new Date($('#from').val());
	//alert();
	var dd = dateFrom.getDate(); 	
	var mm = dateFrom.getMonth(); 	
	var yy = dateFrom.getFullYear();
	
	
	var newDateFrom = new Date(yy,mm,dd+1);
	var dd = newDateFrom.getDate();	

	//var mm = newDateFrom.getMonth();	
	var mm = ("0" + (newDateFrom.getMonth() + 1)).slice(-2);	
	var yy = newDateFrom.getFullYear();
	var frmdt = yy+"-"+mm+"-"+leadingZero(dd);
	$('#from').val($.datepicker.formatDate( "d M yy", new Date(frmdt) ));
	var d1 = (yy*10000)+(mm*100)+leadingZero(dd);
	 validationFrom(d1);
}
function dateFromPrev()
{
	var dateFrom = new Date($('#from').val());

	var dd = dateFrom.getDate(); 
	
	
	var mm = dateFrom.getMonth(); 	
	var yy = dateFrom.getFullYear();
	
	var newDateFrom = new Date(yy,mm,dd-1);
	var dd = newDateFrom.getDate();	
	//var mm = newDateFrom.getMonth();	
	var mm = ("0" + (newDateFrom.getMonth() + 1)).slice(-2);	
	var yy = newDateFrom.getFullYear();
	var frmdt = yy+"-"+mm+"-"+leadingZero(dd);
	$('#from').val($.datepicker.formatDate( "d M yy", new Date(frmdt) ));
}
function validationTo(d1)
{
	var dateFrom = new Date($('#from').val());
	var dd = dateFrom.getDate(); 	
	var mm = dateFrom.getMonth(); 	
	var yy = dateFrom.getFullYear();
		
	var frmdt = (yy*10000)+(mm*100)+leadingZero(dd);
	var d1 =parseInt(d1,10);
	var d2 =parseInt(frmdt,10);
	//alert(d1+' '+d2);
	if(d1 <= d2)
	{
		var dateTo = new Date($('#to').val());
		var dd = dateTo.getDate(); 	
		var mm = dateTo.getMonth(); 	
		var yy = dateTo.getFullYear();
	
		var newDateTo = new Date(yy,mm,dd);
		var dd = newDateTo.getDate();	
		//var mm = newDateTo.getMonth();	
		var mm = ("0" + (newDateTo.getMonth() + 1)).slice(-2);	
		var yy = newDateTo.getFullYear();
		var todt = yy+"-"+mm+"-"+leadingZero(dd);
		$('#from').val($.datepicker.formatDate( "d M yy", new Date(todt) ));
	}	
}
function dateToNext()
{
	var dateTo = new Date($('#to').val());
	
	var dd = dateTo.getDate(); 	
	var mm = dateTo.getMonth(); 	
	var yy = dateTo.getFullYear();
	
	var newDateTo = new Date(yy,mm,dd+1);
	var dd = newDateTo.getDate();	
	//var mm = newDateTo.getMonth();	
	var mm = ("0" + (newDateTo.getMonth() + 1)).slice(-2);	
	var yy = newDateTo.getFullYear();
	var todt = yy+"-"+mm+"-"+leadingZero(dd);
	$('#to').val($.datepicker.formatDate( "d M yy", new Date(todt) ));
	
	 
}
function dateToPrev()
{
	var dateTo = new Date($('#to').val());
	
	var dd = dateTo.getDate(); 	
	var mm = dateTo.getMonth(); 	
	var yy = dateTo.getFullYear();
	
	var newDateTo = new Date(yy,mm,dd-1);
	var dd = newDateTo.getDate();	
	//var mm = newDateTo.getMonth();	
	var mm = ("0" + (newDateTo.getMonth() + 1)).slice(-2);	
	var yy = newDateTo.getFullYear();
	var todt = yy+"-"+mm+"-"+leadingZero(dd);
	$('#to').val($.datepicker.formatDate( "d M yy", new Date(todt) ));
	var d1 = (yy*10000)+(mm*100)+leadingZero(dd);
	 validationTo(d1);
} 
$("#change_password").validate({
	rules : {
		password : {
			minlength : 5
		},
		confirm_password : {
			minlength : 5,
			equalTo : '[name="password"]'
		}
	}
});

$(document).ready(function (){
	function handleSelectEvent(){
		$('.dataTables_length,.dataTables_filter').wrapAll('<div class="table-filter clearfix">');
	};
	
	table = $('.dataTable')	.on('draw.dt', function () {
			//handleSelectEvent();
	}).DataTable({
		"ordering": false,
		'columnDefs': [{
			 'targets': 0,
			 'searchable': false,
			 'orderable': false
			 //'className': 'dt-body-center'
		}]
	});
	
	$('#search').keyup(function(){
		table.search($(this).val()).draw() ;
	})

   // Handle click on "Select all" control
   $('#example-select-all').on('click', function(){
      // Get all rows with search applied
      var rows = table.rows({ 'search': 'applied' }).nodes();
      // Check/uncheck checkboxes for all rows in the table
      $('input[type="checkbox"]', rows).prop('checked', this.checked);
   });

   // Handle click on checkbox to set state of "Select all" control
   $('#example tbody').on('change', 'input[type="checkbox"]', function(){
      // If checkbox is not checked
      if(!this.checked){
         var el = $('#example-select-all').get(0);
         // If "Select all" control is checked and has 'indeterminate' property
         if(el && el.checked && ('indeterminate' in el)){
            // Set visual state of "Select all" control
            // as 'indeterminate'
            el.indeterminate = true;
         }
      }
   });

   // Handle form submission event
   $('#frm-example').on('submit', function(e){
      var form = this;

      // Iterate over all checkboxes in the table
      table.$('input[type="checkbox"]').each(function(){
         // If checkbox doesn't exist in DOM
         if(!$.contains(document, this)){
            // If checkbox is checked
            if(this.checked){
               // Create a hidden element
               $(form).append(
                  $('<input>')
                     .attr('type', 'hidden')
                     .attr('name', this.name)
                     .val(this.value)
               );
            }
         }
      });
   });

});
$(document).ready(function() {
	$("#dataTable1").DataTable();
});

$('.otpInput input').keypress(function(){
	$(this).next().focus();
}).keyup(function(e){
	if(e.keyCode == 8){
		$(this).prev().focus();
	}
});

$('.navbar-toggler[data-toggle="offcanvas"]').click(function(){
	if(!$('nav#sidebar.sidebar-offcanvas').hasClass('active')){
		$('nav#sidebar.sidebar-offcanvas').addClass('active');
		$('#mask').fadeIn();
	}else {
		$('nav#sidebar.sidebar-offcanvas').removeClass('active');
		$('#mask').fadeOut();
	}
});
$('#mask').click(function(){
	$(this).fadeOut();
});
$(document).mouseup(function(e){
	var sidebar = $('nav#sidebar.sidebar-offcanvas,.navbar-toggler[data-toggle="offcanvas"]');
	if (!sidebar.is(e.target) && sidebar.has(e.target).length === 0) {
		sidebar.removeClass('active');
		$('#mask').fadeOut();
	}
});
$('.showPassword').click(function(){
	$(this).toggleClass('inActive');
	if($(this).hasClass('inActive')){
		$(this).closest('.password-field').find('.form-control').attr('type','text');
	}else {
		$(this).closest('.password-field').find('.form-control').attr('type','password');
	}
});

$('.accordionTable .accordionToggle').click(function(){
	if(!$(this).closest('tr').next('.content').find('.contentTable').is(':visible')){
		$('.accordionTable tr.active').removeClass('active');
		$('.accordionTable tr.content .contentTable').slideUp('fast');
		$(this).closest('tr').next('.content').find('.contentTable').slideDown('fast');
		$(this).closest('tr').addClass('active');
	}else {
		$(this).closest('tr').next('.content').find('.contentTable').slideUp('fast');
		$(this).closest('tr').removeClass('active');
	}
});


if($('#chart').is(':visible')){
	Highcharts.chart('chart', {
		chart: {
				type: 'spline'
		},
		title: {
				text: null
		},
		subtitle: {
				text: null
		},
		xAxis: {
				// categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
				labels: {
					enabled: false // disable labels
				}
		},
		yAxis: {
			title: null,
				/* title: {
            text: 'Sales, Pounds',
						style: {
								fontSize: '14px',
								color: '#000000',
								fontFamily: 'SF UI Display Medium'
						},
        }, */
				max: 20000
		},
		credits: {
				enabled: false
		},
		plotOptions: {
				spline: {
						marker: {
								radius: 6,
								lineColor: '#000',
								lineWidth: 2
						}
				}
		},
		series: [{
				showInLegend: false,
				data: [0, 9000, 8000, 0, 8000, 14000, 7000,11000,15000,13000,9800,20000],
				lineWidth: 3,
				shadow: {
          width: 8,
          opacity: .1,
					color: '#222'
        },
				color: '#666'
		}]
	});
}

$(function() {
	$('.time').datetimepicker({
		useCurrent: true,
		format: 'HH:mm'
	});
	if($('.textEditor').length>0){
		CKEDITOR.replace('textEditor', {
			toolbar: [
				{ name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source', '-', 'Save', 'NewPage', 'Preview'] },
				{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
				{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
				{ name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
				{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', '-', 'RemoveFormat' ] },
				{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl' ] },
				{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
				{ name: 'insert', items: [ 'Image', 'Flash', 'Table', 'HorizontalRule', 'SpecialChar', 'PageBreak', 'Iframe' ] },
				{ name: 'styles', items: [ 'Format', 'Font', 'FontSize' ] },
				{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },
				{ name: 'others', items: [ '-' ] },
				{ name: 'about', items: [ 'About' ] }
			]
		});
	}
});

$(document).ready(function(){
	$('.aftersearch').each(function(){
		$(this).appendTo($(this).parent().find('.dataTables_filter')).removeClass('d-none')
	});
	$('.dataTables_filter,.dataTables_filter > label').addClass('d-flex align-items-center my-0 mr-2')
});



/* New Graph */
var ctx = document.getElementById("statistics").getContext('2d');
var myChart_bg_color = ctx.createLinearGradient(0, 0, 0, 200);
myChart_bg_color.addColorStop(0, 'rgba(255,105,97,1)');
myChart_bg_color.addColorStop(1, 'rgba(255,105,97,.5)');
var myChart_bg_color2 = ctx.createLinearGradient(0, 0, 0, 200);
myChart_bg_color2.addColorStop(0, 'rgba(0,166,230,1)');
myChart_bg_color2.addColorStop(1, 'rgba(0,166,230,.5)');
var myChart = new Chart(ctx, {
	type: 'line',
	data: {
		labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
		datasets: [{
			label: 'Views',
			data: [000, 700, 500, 750, 500, 550, 500, 450,300, 550, 600, 500],
			backgroundColor: myChart_bg_color,
			borderWidth: .1,
			borderColor: 'rgba(255,19,167,1)',
			pointBorderWidth: 0,
			pointBorderColor: 'transparent',
			pointRadius: 0,
			pointBackgroundColor: 'transparent',
			pointHoverBackgroundColor: '#ff13a7',
		},{
			label: 'Viewss',
			data: [000, 720, 600, 800, 700, 750, 700, 650,500, 750, 800, 700],
			backgroundColor: myChart_bg_color2,
			borderWidth: .1,
			borderColor: 'rgba(54,170,227,1)',
			pointBorderWidth: 0,
			pointBorderColor: 'transparent',
			pointRadius: 0,
			pointBackgroundColor: 'transparent',
			pointHoverBackgroundColor: '#36aae3',
		}]
	},
	options: {
		legend: {
			display: false
		},
		tooltips: {
			titleFontSize: 16,
			titleFontColor: '#ffffff',
			bodyFontColor: '#fff',
			backgroundColor: '#000',
			displayColors: false,
			callbacks: {
				title: function(tooltipItems, data) {
					return '';
				},
				label: function(tooltipItem, data) {
					var item = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
					return item + ' hrs';
				}
			}
		},
		scales: {
			yAxes: [{
				gridLines: {
					// display: false,
					drawBorder: true,
					color: '#000',
				},
				ticks: {
					beginAtZero: true,
					stepSize: 600,
					/* mirror: true,
					padding: 0, */
					callback: function(value, index, values) {
						return value+'k';
					}
				}
			}],
			yAxes: [{
				display: true,
				gridLines: {
					display: true,
					borderDash: [8, 4],
					tickMarkLength: 10,
				}
			}],
			xAxes: [{
				display: true,
				gridLines: {
					display: true,
					borderDash: [8, 4],
					tickMarkLength: 10,
				}
			}]
		},
	}
});
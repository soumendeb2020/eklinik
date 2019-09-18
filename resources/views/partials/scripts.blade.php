<script data-pace-options='{ "restartOnRequestAfter": true }' src="{{ URL::asset('js/plugin/pace/pace.min.js') }}"></script>

<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<script>
    if (!window.jQuery) {
    document.write('<script src="js/libs/jquery-3.2.1.min.js"><\/script>');
    }
</script>

<script src="{{ URL::asset('js/jquery.toast.js') }}"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
    if (!window.jQuery.ui) {
    document.write('<script src="js/libs/jquery-ui.min.js"><\/script>');
    }
</script>

<!-- IMPORTANT: APP CONFIG -->
<script src="{{ URL::asset('js/app.config.js') }}"></script>

<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
<script src="{{ URL::asset('js/plugin/jquery-touch/jquery.ui.touch-punch.min.js')}}"></script> 

<!-- BOOTSTRAP JS -->


<!-- CUSTOM NOTIFICATION -->
<script src="{{ URL::asset('js/notification/SmartNotification.min.js')}}"></script>

<!-- JARVIS WIDGETS -->
<script src="{{ URL::asset('js/smartwidgets/jarvis.widget.min.js')}}"></script>

<!-- EASY PIE CHARTS -->
<script src="{{ URL::asset('js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js') }}"></script>

<!-- SPARKLINES -->
<script src="{{ URL::asset('js/plugin/sparkline/jquery.sparkline.min.js') }}"></script>

<!-- JQUERY VALIDATE -->
<script src="{{ URL::asset('js/plugin/jquery-validate/jquery.validate.min.js')}}"></script>

<!-- JQUERY MASKED INPUT -->
<script src="{{ URL::asset('js/plugin/masked-input/jquery.maskedinput.min.js')}}"></script>

<!-- JQUERY SELECT2 INPUT -->
<script src="{{ URL::asset('js/plugin/select2/select2.min.js')}}"></script>

<!-- JQUERY UI + Bootstrap Slider -->
<script src="{{ URL::asset('js/plugin/bootstrap-slider/bootstrap-slider.min.js')}}"></script>

<!-- browser msie issue fix -->
<script src="{{ URL::asset('js/plugin/msie-fix/jquery.mb.browser.min.js')}}"></script>

<!-- FastClick: For mobile devices -->
<script src="{{ URL::asset('js/plugin/fastclick/fastclick.min.js')}}"></script>

<!--[if IE 8]>

<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

<![endif]-->

<!-- Demo purpose only -->
<script src="{{ URL::asset('js/demo.min.js') }}"></script>

<!-- MAIN APP JS FILE -->
<script src="{{ URL::asset('js/app.min.js') }}"></script>

<!-- ENHANCEMENT PLUGINS : NOT A REQUIREMENT -->
<!-- Voice command : plugin -->
<script src="{{ URL::asset('js/speech/voicecommand.min.js') }}"></script>

<!-- SmartChat UI : plugin -->
<script src="{{ URL::asset('js/smart-chat-ui/smart.chat.ui.min.js')}}"></script>
<script src="{{ URL::asset('js/smart-chat-ui/smart.chat.manager.min.js')}}"></script>

<!-- PAGE RELATED PLUGIN(S) -->

<!-- Flot Chart Plugin: Flot Engine, Flot Resizer, Flot Tooltip -->
<script src="{{ URL::asset('js/plugin/flot/jquery.flot.cust.min.js')}}"></script>
<script src="{{ URL::asset('js/plugin/flot/jquery.flot.resize.min.js')}}"></script>
<script src="{{ URL::asset('js/plugin/flot/jquery.flot.time.min.js')}}"></script>
<script src="{{ URL::asset('js/plugin/flot/jquery.flot.tooltip.min.js')}}"></script>

<!-- Vector Maps Plugin: Vectormap engine, Vectormap language -->
<script src="{{ URL::asset('js/plugin/vectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{ URL::asset('js/plugin/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>

<!-- Full Calendar -->
<script src="{{ URL::asset('js/plugin/moment/moment.min.js')}}"></script>
<script src="{{ URL::asset('js/plugin/fullcalendar/fullcalendar.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- Data Tables -->
<script type="text/javascript">

	/* DO NOT REMOVE : GLOBAL FUNCTIONS!
	 *
	 * pageSetUp(); WILL CALL THE FOLLOWING FUNCTIONS
	 *
	 * // activate tooltips
	 * $("[rel=tooltip]").tooltip();
	 *
	 * // activate popovers
	 * $("[rel=popover]").popover();
	 *
	 * // activate popovers with hover states
	 * $("[rel=popover-hover]").popover({ trigger: "hover" });
	 *
	 * // activate inline charts
	 * runAllCharts();
	 *
	 * // setup widgets
	 * setup_widgets_desktop();
	 *
	 * // run form elements
	 * runAllForms();
	 *
	 ********************************
	 *
	 * pageSetUp() is needed whenever you load a page.
	 * It initializes and checks for all basic elements of the page
	 * and makes rendering easier.
	 *
	 */

	pageSetUp();
	
	/*
	 * ALL PAGE RELATED SCRIPTS CAN GO BELOW HERE
	 * eg alert("my home function");
	 * 
	 * var pagefunction = function() {
	 *   ...
	 * }
	 * loadScript("js/plugin/_PLUGIN_NAME_.js", pagefunction);
	 * 
	 */
	
	// PAGE RELATED SCRIPTS

	/* remove previous elems */
	if($('.DTTT_dropdown.dropdown-menu').length){
		$('.DTTT_dropdown.dropdown-menu').remove();
	}
	
	// Needed if you are rendering multiple tables in ajax version
	//var tableDestroyer = [];

	
	// pagefunction	
	var pagefunction = function() {
		//console.log("cleared");
		
		/* // DOM Position key index //
		
			l - Length changing (dropdown)
			f - Filtering input (search)
			t - The Table! (datatable)
			i - Information (records)
			p - Pagination (paging)
			r - pRocessing 
			< and > - div elements
			<"#id" and > - div with an id
			<"class" and > - div with a class
			<"#id.class" and > - div with an id and class
			
			Also see: http://legacy.datatables.net/usage/features
		*/	

		/* BASIC ;*/
		
		$('#dt_basic').dataTable();

		
		/* END BASIC */
		
		/* COLUMN FILTER  */
	    var otable = $('#datatable_fixed_column').DataTable({
	    	//"bFilter": false,
	    	//"bInfo": false,
	    	//"bLengthChange": false
	    	//"bAutoWidth": false,
	    	//"bPaginate": false,
	    	//"bStateSave": true // saves sort state using localStorage
			"sDom": "<'dt-toolbar'<'col-xs-6'f><'col-xs-6'<'toolbar'>>r>"+
					"t"+
					"<'dt-toolbar-footer'<'col-xs-6'i><'col-xs-6'p>>"
		
	    });
	    
	    // custom toolbar
	    $("div.toolbar").html('<div class="text-right"><img src="img/logo.png" alt="SmartAdmin" style="width: 111px; margin-top: 3px; margin-right: 10px;"></div>');
	    	   
	    // Apply the filter
	    $("#datatable_fixed_column thead th input[type=text]").on( 'keyup change', function () {
	    	
	        otable
	            .column( $(this).parent().index()+':visible' )
	            .search( this.value )
	            .draw();
	            
	    } );
	    /* END COLUMN FILTER */   
    
		/* COLUMN SHOW - HIDE */
		$('#datatable_col_reorder').dataTable({
			"sDom": "<'dt-toolbar'<'col-xs-6'f><'col-xs-6'C>r>"+
					"t"+
					"<'dt-toolbar-footer'<'col-xs-6'i><'col-xs-6'p>>"
		});
		
		/* END COLUMN SHOW - HIDE */

		/* TABLETOOLS */
		$('#datatable_tabletools').dataTable({
			
			// Tabletools options: 
			//   https://datatables.net/extensions/tabletools/button_options
			"sDom": "<'dt-toolbar'<'col-xs-6'f><'col-xs-6'T>r>"+
					"t"+
					"<'dt-toolbar-footer'<'col-xs-6'i><'col-xs-6'p>>",
	        "oTableTools": {
	        	 "aButtons": [
	             "copy",
	             "csv",
	             "xls",
	                {
	                    "sExtends": "pdf",
	                    "sTitle": "SmartAdmin_PDF",
	                    "sPdfMessage": "SmartAdmin PDF Export",
	                    "sPdfSize": "letter"
	                },
	             	{
                    	"sExtends": "print",
                    	"sMessage": "Generated by SmartAdmin <i>(press Esc to close)</i>"
                	}
	             ],
	            "sSwfPath": "js/plugin/datatables/swf/copy_csv_xls_pdf.swf"
	        }
		});
		
		/* END TABLETOOLS */

	};

	// load related plugins
	
	loadScript("{{ URL::asset('js/plugin/datatables/jquery.dataTables.min.js')}}", function(){
		loadScript("{{ URL::asset('js/plugin/datatables/dataTables.colVis.min.js')}}", function(){
			loadScript("{{ URL::asset('js/plugin/datatables/dataTables.tableTools.min.js')}}", function(){
				loadScript("{{ URL::asset('js/plugin/datatables/dataTables.bootstrap.min.js')}}", pagefunction);
			});
		});
	});


</script>
<script type="text/javascript">
	// START DATE
	$('#startdate').datepicker({
		dateFormat : 'dd.mm.yy',
		prevText : '<i class="fa fa-chevron-left"></i>',
		nextText : '<i class="fa fa-chevron-right"></i>',
		
	});
	
	// Queue List DATE
	$('#queuelistdate').datepicker({
		dateFormat : 'dd.mm.yy',
		prevText : '<i class="fa fa-chevron-left"></i>',
		nextText : '<i class="fa fa-chevron-right"></i>',
		
	});
	
	// START AND FINISH DATE
	$('#monrepstartdate').datepicker({
		dateFormat : 'dd-mm-yy',
		prevText : '<i class="fa fa-chevron-left"></i>',
		nextText : '<i class="fa fa-chevron-right"></i>',
		
	});
	$('#monrependdate').datepicker({
		dateFormat : 'dd-mm-yy',
		prevText : '<i class="fa fa-chevron-left"></i>',
		nextText : '<i class="fa fa-chevron-right"></i>',
		
	});
	
	// Statistical DATE
	$('#statisticaldate').datepicker({
		dateFormat : 'dd-mm-yy',
		prevText : '<i class="fa fa-chevron-left"></i>',
		nextText : '<i class="fa fa-chevron-right"></i>',
		
	});
	
	// Statistical DATE
	$('#overtimedate').datepicker({
		dateFormat : 'dd-mm-yy',
		prevText : '<i class="fa fa-chevron-left"></i>',
		nextText : '<i class="fa fa-chevron-right"></i>',
		
	});
</script>


<script>
    $(document).ready(function() {

    // DO NOT REMOVE : GLOBAL FUNCTIONS!
    pageSetUp();
    /*
     * PAGE RELATED SCRIPTS
     */

    $(".js-status-update a").click(function() {
    var selText = $(this).text();
    var $this = $(this);
    $this.parents('.btn-group').find('.dropdown-toggle').html(selText + ' <span class="caret"></span>');
    $this.parents('.dropdown-menu').find('li').removeClass('active');
    $this.parent().addClass('active');
    });
    /*
     * TODO: add a way to add more todo's to list
     */

    // initialize sortable
    $(function() {
    $("#sortable1, #sortable2").sortable({
    handle : '.handle',
            connectWith : ".todo",
            update : countTasks
    }).disableSelection();
    });
    // check and uncheck
    $('.todo .checkbox > input[type="checkbox"]').click(function() {
    var $this = $(this).parent().parent().parent();
    if ($(this).prop('checked')) {
    $this.addClass("complete");
    // remove this if you want to undo a check list once checked
    //$(this).attr("disabled", true);
    $(this).parent().hide();
    // once clicked - add class, copy to memory then remove and add to sortable3
    $this.slideUp(500, function() {
    $this.clone().prependTo("#sortable3").effect("highlight", {}, 800);
    $this.remove();
    countTasks();
    });
    } else {
    // insert undo code here...
    }

    })
            // count tasks
                    function countTasks() {

                    $('.todo-group-title').each(function() {
                    var $this = $(this);
                    $this.find(".num-of-tasks").text($this.next().find("li").size());
                    });
                    }

            /*
             * RUN PAGE GRAPHS
             */

            /* TAB 1: UPDATING CHART */
            // For the demo we use generated data, but normally it would be coming from the server

            var data = [], totalPoints = 200, $UpdatingChartColors = $("#updating-chart").css('color');
            function getRandomData() {
            if (data.length > 0)
                    data = data.slice(1);
            // do a random walk
            while (data.length < totalPoints) {
            var prev = data.length > 0 ? data[data.length - 1] : 50;
            var y = prev + Math.random() * 10 - 5;
            if (y < 0)
                    y = 0;
            if (y > 100)
                    y = 100;
            data.push(y);
            }

            // zip the generated y values with the x values
            var res = [];
            for (var i = 0; i < data.length; ++i)
                    res.push([i, data[i]])
                    return res;
            }

            // setup control widget
            var updateInterval = 1500;
            $("#updating-chart").val(updateInterval).change(function() {

            var v = $(this).val();
            if (v && !isNaN( + v)) {
            updateInterval = + v;
            $(this).val("" + updateInterval);
            }

            });
            // setup plot
            var options = {
            yaxis : {
            min : 0,
                    max : 100
            },
                    xaxis : {
                    min : 0,
                            max : 100
                    },
                    colors : [$UpdatingChartColors],
                    series : {
                    lines : {
                    lineWidth : 1,
                            fill : true,
                            fillColor : {
                            colors : [{
                            opacity : 0.4
                            }, {
                            opacity : 0
                            }]
                            },
                            steps : false

                    }
                    }
            };
            var plot = $.plot($("#updating-chart"), [getRandomData()], options);
            /* live switch */
            $('input[type="checkbox"]#start_interval').click(function() {
            if ($(this).prop('checked')) {
            $on = true;
            updateInterval = 1500;
            update();
            } else {
            clearInterval(updateInterval);
            $on = false;
            }
            });
            function update() {
            if ($on == true) {
            plot.setData([getRandomData()]);
            plot.draw();
            setTimeout(update, updateInterval);
            } else {
            clearInterval(updateInterval)
            }

            }

            var $on = false;
            /*end updating chart*/

            /* TAB 2: Social Network  */

            $(function() {
            // jQuery Flot Chart
            var twitter = [[1, 27], [2, 34], [3, 51], [4, 48], [5, 55], [6, 65], [7, 61], [8, 70], [9, 65], [10, 75], [11, 57], [12, 59], [13, 62]], facebook = [[1, 25], [2, 31], [3, 45], [4, 37], [5, 38], [6, 40], [7, 47], [8, 55], [9, 43], [10, 50], [11, 47], [12, 39], [13, 47]], data = [{
            label : "Twitter",
                    data : twitter,
                    lines : {
                    show : true,
                            lineWidth : 1,
                            fill : true,
                            fillColor : {
                            colors : [{
                            opacity : 0.1
                            }, {
                            opacity : 0.13
                            }]
                            }
                    },
                    points : {
                    show : true
                    }
            }, {
            label : "Facebook",
                    data : facebook,
                    lines : {
                    show : true,
                            lineWidth : 1,
                            fill : true,
                            fillColor : {
                            colors : [{
                            opacity : 0.1
                            }, {
                            opacity : 0.13
                            }]
                            }
                    },
                    points : {
                    show : true
                    }
            }];
            var options = {
            grid : {
            hoverable : true
            },
                    colors : ["#568A89", "#3276B1"],
                    tooltip : true,
                    tooltipOpts : {
                    //content : "Value <b>$x</b> Value <span>$y</span>",
                    defaultTheme : false
                    },
                    xaxis : {
                    ticks : [[1, "JAN"], [2, "FEB"], [3, "MAR"], [4, "APR"], [5, "MAY"], [6, "JUN"], [7, "JUL"], [8, "AUG"], [9, "SEP"], [10, "OCT"], [11, "NOV"], [12, "DEC"], [13, "JAN+1"]]
                    },
                    yaxes : {

                    }
            };
            var plot3 = $.plot($("#statsChart"), data, options);
            });
            // END TAB 2

            // TAB THREE GRAPH //
            /* TAB 3: Revenew  */

            $(function() {

            var trgt = [[1354586000000, 153], [1364587000000, 658], [1374588000000, 198], [1384589000000, 663], [1394590000000, 801], [1404591000000, 1080], [1414592000000, 353], [1424593000000, 749], [1434594000000, 523], [1444595000000, 258], [1454596000000, 688], [1464597000000, 364]], prft = [[1354586000000, 53], [1364587000000, 65], [1374588000000, 98], [1384589000000, 83], [1394590000000, 980], [1404591000000, 808], [1414592000000, 720], [1424593000000, 674], [1434594000000, 23], [1444595000000, 79], [1454596000000, 88], [1464597000000, 36]], sgnups = [[1354586000000, 647], [1364587000000, 435], [1374588000000, 784], [1384589000000, 346], [1394590000000, 487], [1404591000000, 463], [1414592000000, 479], [1424593000000, 236], [1434594000000, 843], [1444595000000, 657], [1454596000000, 241], [1464597000000, 341]], toggles = $("#rev-toggles"), target = $("#flotcontainer");
            var data = [{
            label : "Target Profit",
                    data : trgt,
                    bars : {
                    show : true,
                            align : "center",
                            barWidth : 30 * 30 * 60 * 1000 * 80
                    }
            }, {
            label : "Actual Profit",
                    data : prft,
                    color : '#3276B1',
                    lines : {
                    show : true,
                            lineWidth : 3
                    },
                    points : {
                    show : true
                    }
            }, {
            label : "Actual Signups",
                    data : sgnups,
                    color : '#71843F',
                    lines : {
                    show : true,
                            lineWidth : 1
                    },
                    points : {
                    show : true
                    }
            }]

                    var options = {
                    grid : {
                    hoverable : true
                    },
                            tooltip : true,
                            tooltipOpts : {
                            //content: '%x - %y',
                            //dateFormat: '%b %y',
                            defaultTheme : false
                            },
                            xaxis : {
                            mode : "time"
                            },
                            yaxes : {
                            tickFormatter : function(val, axis) {
                            return "$" + val;
                            },
                                    max : 1200
                            }

                    };
            plot2 = null;
            function plotNow() {
            var d = [];
            toggles.find(':checkbox').each(function() {
            if ($(this).is(':checked')) {
            d.push(data[$(this).attr("name").substr(4, 1)]);
            }
            });
            if (d.length > 0) {
            if (plot2) {
            plot2.setData(d);
            plot2.draw();
            } else {
            plot2 = $.plot(target, d, options);
            }
            }

            };
            toggles.find(':checkbox').on('change', function() {
            plotNow();
            });
            plotNow()

            });
            /*
             * VECTOR MAP
             */

            data_array = {
            "US" : 4977,
                    "AU" : 4873,
                    "IN" : 3671,
                    "BR" : 2476,
                    "TR" : 1476,
                    "CN" : 146,
                    "CA" : 134,
                    "BD" : 100
            };
            $('#vector-map').vectorMap({
            map : 'world_mill_en',
                    backgroundColor : '#fff',
                    regionStyle : {
                    initial : {
                    fill : '#c4c4c4'
                    },
                            hover : {
                            "fill-opacity" : 1
                            }
                    },
                    series : {
                    regions : [{
                    values : data_array,
                            scale : ['#85a8b6', '#4d7686'],
                            normalizeFunction : 'polynomial'
                    }]
                    },
                    onRegionLabelShow : function(e, el, code) {
                    if (typeof data_array[code] == 'undefined') {
                    e.preventDefault();
                    } else {
                    var countrylbl = data_array[code];
                    el.html(el.html() + ': ' + countrylbl + ' visits');
                    }
                    }
            });
            /*
             * FULL CALENDAR JS
             */

            if ($("#calendar").length) {
            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();
            var calendar = $('#calendar').fullCalendar({

            editable : true,
                    draggable : true,
                    selectable : false,
                    selectHelper : true,
                    unselectAuto : false,
                    disableResizing : false,
                    height: "auto",
                    header : {
                    left : 'title', //,today
                            center : 'prev, next, today',
                            right : 'month, agendaWeek, agenDay' //month, agendaDay,
                    },
                    select : function(start, end, allDay) {
                    var title = prompt('Event Title:');
                    if (title) {
                    calendar.fullCalendar('renderEvent', {
                    title : title,
                            start : start,
                            end : end,
                            allDay : allDay
                    }, true // make the event "stick"
                            );
                    }
                    calendar.fullCalendar('unselect');
                    },
                    events : [{
                    title : 'All Day Event',
                            start : new Date(y, m, 1),
                            description : 'long description',
                            className : ["event", "bg-color-greenLight"],
                            icon : 'fa-check'
                    }, {
                    title : 'Long Event',
                            start : new Date(y, m, d - 5),
                            end : new Date(y, m, d - 2),
                            className : ["event", "bg-color-red"],
                            icon : 'fa-lock'
                    }, {
                    id : 999,
                            title : 'Repeating Event',
                            start : new Date(y, m, d - 3, 16, 0),
                            allDay : false,
                            className : ["event", "bg-color-blue"],
                            icon : 'fa-clock-o'
                    }, {
                    id : 999,
                            title : 'Repeating Event',
                            start : new Date(y, m, d + 4, 16, 0),
                            allDay : false,
                            className : ["event", "bg-color-blue"],
                            icon : 'fa-clock-o'
                    }, {
                    title : 'Meeting',
                            start : new Date(y, m, d, 10, 30),
                            allDay : false,
                            className : ["event", "bg-color-darken"]
                    }, {
                    title : 'Lunch',
                            start : new Date(y, m, d, 12, 0),
                            end : new Date(y, m, d, 14, 0),
                            allDay : false,
                            className : ["event", "bg-color-darken"]
                    }, {
                    title : 'Birthday Party',
                            start : new Date(y, m, d + 1, 19, 0),
                            end : new Date(y, m, d + 1, 22, 30),
                            allDay : false,
                            className : ["event", "bg-color-darken"]
                    }, {
                    title : 'Smartadmin Open Day',
                            start : new Date(y, m, 28),
                            end : new Date(y, m, 29),
                            className : ["event", "bg-color-darken"]
                    }],
                    eventRender : function(event, element, icon) {
                    if (!event.description == "") {
                    element.find('.fc-title').append("<br/><span class='ultra-light'>" + event.description + "</span>");
                    }
                    if (!event.icon == "") {
                    element.find('.fc-title').append("<i class='air air-top-right fa " + event.icon + " '></i>");
                    }
                    }
            });
            };
            /* hide default buttons */
            $('.fc-toolbar .fc-right, .fc-toolbar .fc-center').hide();
            // calendar prev
            $('#calendar-buttons #btn-prev').click(function() {
            $('.fc-prev-button').click();
            return false;
            });
            // calendar next
            $('#calendar-buttons #btn-next').click(function() {
            $('.fc-next-button').click();
            return false;
            });
            // calendar today
            $('#calendar-buttons #btn-today').click(function() {
            $('.fc-button-today').click();
            return false;
            });
            // calendar month
            $('#mt').click(function() {
            $('#calendar').fullCalendar('changeView', 'month');
            });
            // calendar agenda week
            $('#ag').click(function() {
            $('#calendar').fullCalendar('changeView', 'agendaWeek');
            });
            // calendar agenda day
            $('#td').click(function() {
            $('#calendar').fullCalendar('changeView', 'agendaDay');
            });
            /*
             * CHAT
             */

            $.filter_input = $('#filter-chat-list');
            $.chat_users_container = $('#chat-container > .chat-list-body')
                    $.chat_users = $('#chat-users')
                    $.chat_list_btn = $('#chat-container > .chat-list-open-close');
            $.chat_body = $('#chat-body');
            /*
             * LIST FILTER (CHAT)
             */

            // custom css expression for a case-insensitive contains()
            jQuery.expr[':'].Contains = function(a, i, m) {
            return (a.textContent || a.innerText || "").toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
            };
            function listFilter(list) {// header is any element, list is an unordered list
            // create and add the filter form to the header

            $.filter_input.change(function() {
            var filter = $(this).val();
            if (filter) {
            // this finds all links in a list that contain the input,
            // and hide the ones not containing the input while showing the ones that do
            $.chat_users.find("a:not(:Contains(" + filter + "))").parent().slideUp();
            $.chat_users.find("a:Contains(" + filter + ")").parent().slideDown();
            } else {
            $.chat_users.find("li").slideDown();
            }
            return false;
            }).keyup(function() {
            // fire the above change event after every letter
            $(this).change();
            });
            }

            // on dom ready
            listFilter($.chat_users);
            // open chat list
            $.chat_list_btn.click(function() {
            $(this).parent('#chat-container').toggleClass('open');
            })

                    $.chat_body.animate({
                    scrollTop : $.chat_body[0].scrollHeight
                    }, 500);
            });</script>

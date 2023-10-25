/* 
	untuk map dan chart
	tanto @ 19 agustus 2016
 */
	// var idmap = $('#map');
	
	function getColor(d,max=1000) 
	{
						
		return d > max ? '#800026' :
			   d > max/2  ? '#BD0026' :
			   d > max/5  ? '#E31A1C' :
			   d > max/10  ? '#FC4E2A' :
			   d > max/20   ? '#FD8D3C' :
			   d > max/50   ? '#FEB24C' :
			   d > max/10   ? '#FED976' :
						  '#FFEDA0';
	}
	
		
	var tree = function () {

        $('#tree_1').jstree({
            "core" : {
                "themes" : {
                    "responsive": false
                }            
            },
            "types" : {
                "default" : {
                    "icon" : "fa fa-folder icon-state-warning icon-lg"
                },
                "file" : {
                    "icon" : "fa fa-file icon-state-warning icon-lg"
                }
            },
            "plugins": ["types"]
        });

        // handle link clicks in tree nodes(support target="_blank" as well)
        $('#tree_1').on('select_node.jstree', function(e,data) { 
            var link = $('#' + data.selected).find('a');
            if (link.attr("href") != "#" && link.attr("href") != "javascript:;" && link.attr("href") != "") {
                if (link.attr("target") == "_blank") {
                    link.attr("href").target = "_blank";
                }
                document.location.href = link.attr("href");
                return false;
            }
        });
    }
	
	// var chartGen = function (chart)
	// {
	// 	// alert('test');
	// 	$('#container').highcharts({
	// 			chart: {
	// 				type: 'bar'
	// 			},
	// 			title: {
	// 				text: ''
	// 			},
	// 			subtitle: {
	// 				text: ''
	// 			},
	// 			xAxis: {
	// 				categories: [						
	// 				],
	// 				crosshair: true
	// 			},
	// 			yAxis: {
	// 				min: 0,
	// 				title: {
	// 					text: 'Satuan'
	// 				}
	// 			},
	// 			legend: {
	// 				enabled: false
	// 			},
	// 			tooltip: {
	// 				headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
	// 				pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b><br/>'
	// 			},
	// 			plotOptions: {
	// 				column: {
	// 					pointPadding: 0.2,
	// 					borderWidth: 0,						
						
	// 				},
	// 				series: {
	// 					cursor: 'pointer',
	// 					borderWidth: 1,
	// 					borderColor: 'black',
	// 					dataLabels: {
	// 						enabled: true,
	// 						format: '{point.y}'
	// 					},
	// 					point: {
	// 							events: {
	// 								click: function () {
	// 									// alert(this.series.userOptions.url);
	// 									location.href = this.series.userOptions.url;
	// 									//$('#large').modal('show');
	// 								}
	// 							}
	// 						},
	// 				}

	// 			},
	// 			series: []
	// 		});
	// }
	
/* var chartGen3 = function (chart)
	{
		 $('#container2').highcharts({
				chart: {
					type: 'bar'
				},
				title: {
					text: ''
				},
				xAxis: {
					categories: []
				},
				yAxis: {
					min: 0,
					title: {
						text: 'Satuan'
					}
				},
				legend: {
					reversed: true
				},
				plotOptions: {
					series: {
						stacking: 'normal'
					}
				},
				series: []
			});
	} */
	
var chartGen2 = function (chart)
	{
	// Create the chart
		$('#container2').highcharts({
			chart: {
				type: 'bar'
			},
			title: {
				text: ''
			},
			xAxis: {
				categories: [],
				labels: {
				  formatter: function () {
				  	var a = this.value;
				  	// var b = a.split('=');
				  	// var c = b[1].replace('_', ' ');
					// return '<a href="' + this.value + '" data-remote="false" data-target="#myModal1" data-toggle="modal" ">' +
					/*return '<a href="' + this.value + '" target="_blank" ">' +
									c + '</a>'; 
					return '<a href="home/Drilldowntnelayan?kab=' + this.value + '" target="_blank" ">' +
									this.value + '</a>';*/
					return this.value;
				  },
				  useHTML: true
				}
			},

			legend: {
				reversed: true
			},

			plotOptions: {
				series: {
					// cursor: 'pointer',
					stacking: 'normal',
					borderWidth: 0,
					dataLabels: {
						enabled: false
					},
				point: {
							events: {
								click: function () {
									// alert(this.series.userOptions.url);
									// location.href = this.series.userOptions.url;
									// $('#myModal1').modal('show');
								}
							}
						}
				}
			},

			series: [],
			drilldown: {
				 series: []
				}
		});
	}
	
	var initPeta = function (url)
	{
		// deklarasi awal peta -------------------------------------------
		 var mbAttr = '' 				
			mbUrl = 'https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoiYWkxMiIsImEiOiJjaWc3ZDUyNXgwcng0dHVsenFyM3o5eDUwIn0.yOoC8nSKH59OHfi0MyodKQ.Y8bhBaUMqFiPrDRW9hieoQ';

		//deklarasi map - leaflet library
		 var grayscale   = L.tileLayer(mbUrl, {id: 'mapbox.light', attribution: mbAttr}),
			googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
				maxZoom: 20,
				subdomains:['mt0','mt1','mt2','mt3']
			}),
			openstreetmap = L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'),
			googleHybrid = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
				maxZoom: 20,
				subdomains:['mt0','mt1','mt2','mt3']
			});
		var bounds = [
			[-7.777488, 114.776975], // Southwest coordinates
			[-7.403438, 110.834149]  // Northeast coordinates
		];
			
		var baseLayers = {
			"OpenStreet": openstreetmap,
			"Grayscale": grayscale,
			"Sattelite": googleHybrid,
			"Gmap": googleStreets
		};
		
		map = L.map('map', {
			center: [ -7.692, 113.152],
			zoom: 8,
			zoomControl:false,
			layers: [openstreetmap],
			maxBounds: bounds // Sets bounds as max
		});
		map.options.minZoom = 7;

		// setTimeout(function() {
		// 	map.invalidateSize();
		// }, 100);
		
		L.control.layers(baseLayers).addTo(map);
		// end deklarasi awal peta -------------------------------------------
		// control that shows state info on hover
		info = L.control({position: 'bottomleft'});
		
		info.onAdd = function (map) {
			this._div = L.DomUtil.create('div', 'info');
			this.update();
			return this._div;
		};

		info.update = function (kab) {
			this._div.innerHTML = '<h4>Kabupaten / Kota </h4>' +  (kab ?
				'<b>' + kab + '</b>'
				: 'Pilih Kab/Kota');;
		};

		info.addTo(map);
		// control info
		
		
		//load geojson kabupaten /kota - jquery library
		$.getJSON(url,function(result){
			
			hasil = result;
			//hasil dari load geojson dimasukkan ke fungsi geojson dari leaflet - leaflet library
			geoJson = L.geoJson(result, {				
				onEachFeature:onEachFeature				
			}).addTo(map);
		
		});
		
		L.Control.zoomHome = L.Control.extend({
			options: {
				position: 'topright',
				zoomInText: '+',
				zoomInTitle: 'Zoom in',
				zoomOutText: '-',
				zoomOutTitle: 'Zoom out',
				zoomHomeText: '<i class="fa fa-home" style="line-height:1;"></i>',
				zoomHomeTitle: 'Zoom home'
			},

			onAdd: function (map) {
				var controlName = 'gin-control-zoom',
					container = L.DomUtil.create('div', controlName + ' leaflet-bar'),
					options = this.options;

				this._zoomInButton = this._createButton(options.zoomInText, options.zoomInTitle,
				controlName + '-in', container, this._zoomIn);
				this._zoomHomeButton = this._createButton(options.zoomHomeText, options.zoomHomeTitle,
				controlName + '-home', container, this._zoomHome);
				this._zoomOutButton = this._createButton(options.zoomOutText, options.zoomOutTitle,
				controlName + '-out', container, this._zoomOut);

				this._updateDisabled();
				map.on('zoomend zoomlevelschange', this._updateDisabled, this);

				return container;
			},

			onRemove: function (map) {
				map.off('zoomend zoomlevelschange', this._updateDisabled, this);
			},

			_zoomIn: function (e) {
				this._map.zoomIn(e.shiftKey ? 3 : 1);
			},

			_zoomOut: function (e) {
				this._map.zoomOut(e.shiftKey ? 3 : 1);
			},

			_zoomHome: function (e) {
				map.setView([ -7.692, 113.152], 8);
				/* var map = L.map('map', {
					center: [-7.61844, 112.91473],
					zoom: 9,
					layers: [streets, cities],
					zoomControl:false
				}) */
			},

			_createButton: function (html, title, className, container, fn) {
				var link = L.DomUtil.create('a', className, container);
				link.innerHTML = html;
				link.href = '#';
				link.title = title;

				L.DomEvent.on(link, 'mousedown dblclick', L.DomEvent.stopPropagation)
					.on(link, 'click', L.DomEvent.stop)
					.on(link, 'click', fn, this)
					.on(link, 'click', this._refocusOnMap, this);

				return link;
			},

			_updateDisabled: function () {
				var map = this._map,
					className = 'leaflet-disabled';

				L.DomUtil.removeClass(this._zoomInButton, className);
				L.DomUtil.removeClass(this._zoomOutButton, className);

				if (map._zoom === map.getMinZoom()) {
					L.DomUtil.addClass(this._zoomOutButton, className);
				}
				if (map._zoom === map.getMaxZoom()) {
					L.DomUtil.addClass(this._zoomInButton, className);
				}
			}
		});
		// add the new control to the map
		var zoomHome = new L.Control.zoomHome({ position: 'topleft' });
		zoomHome.addTo(map);
		
	}
	
	function createLegend(max,unit)
	{
		if(typeof(legend) != "undefined" && legend !== null)
		{
			map.removeControl(legend);
		} 
		legend = L.control({position: 'bottomright'});
		// legend.removeFrom(map);
		legend.onAdd = function (map) {

			var div = L.DomUtil.create('div', 'info legend'),
				grades = [0, Math.round(max/20), Math.round(max/10), Math.round(max/5), Math.round(max/2)],
				labels = ['satuan: '+unit],
				from, to;

			for (var i = 0; i < grades.length; i++) {
				from = grades[i];
				to = grades[i + 1];

				labels.push(
					'<i style="background:' + getColor(from + 1,max) + '"></i> ' +
					from + (to ? ' &ndash; ' + to : '+'));
			}

			div.innerHTML = labels.join('<br>');
			return div;
		};

		legend.addTo(map);
	}
	
	function highlightFeature(e) {
		var layer = e.target;
	
		layer.setStyle({
			fillColor: "#FF5555",							
			color: "#49D0FC",
			weight: 1,
			opacity: 1,
			fillOpacity: 0.3
		});

		if (!L.Browser.ie && !L.Browser.opera) {
			layer.bringToFront();
		}
		
		info.update(layer.feature.properties.nmkab);
		
	}
	
	function resetHighlight(e) {
		
		var layer = e.target;
		
		layer.setStyle(style);
		info.update();
	}
	
	function clickHandle(e) {
		
		var layer = e.target;
		
		var popup = L.popup();
		popup
		.setLatLng(e.latlng)
		.setContent("Regency/City : " + layer.feature.properties.nmkab +'</br><a href="#"> enter </a>')
		.openOn(map); 
	}
	
	function onEachFeature(feature, peta)
	{			
		
		//styling - leaflet library
		style = {
			fillColor: "#49D0FC",
			color: "#000",
			weight: 1,
			opacity: 1,
			fillOpacity: 0.3
		};
		
		peta.setStyle(style);			
		peta.on('mouseover',highlightFeature);
		peta.on('mouseout',resetHighlight);
		peta.on('click',clickHandle);
		
	}
	
	function setPetaChart(url)
	{
		$('#container').hide(); 
		$('#container2').hide(); 
		$('#map').css({ opacity: 0.2 });
		// $('#map').hide(); 
		$('#loading').show(); 
		// $('#petadiv').show();
		// $('#loadingmap').show(); 
		
		$.ajax({
			   type		: "POST",
			   url		: url,
			   dataType	: 'json',
			   data		: $("#isi").serialize(), // serializes the form's elements.
			   success	: function(query)
			   {
				
					// var chart = $('#container').highcharts();
					// while(chart.series.length > 0) {
					// 	chart.series[0].remove(false);
					// }
					// chart.xAxis[0].categories = query.categories;					
					
					// for(i=0;i<query.chart.length;i++){
					// 	chart.addSeries(query.chart[i],false);
					// }
					// chart.redraw();
					
					// $('#container2').hide(); 
					// $('#loading').hide(); 
					// $('#container').show(); 
					geoJson.clearLayers();
					//$('.info legend leaflet-control').remove();		
					L.geoJson(hasil, {
						onEachFeature:function (feature, peta) {					
							
							kd_kab = feature.properties.kd_kab;									
							color = getColor(query.map[kd_kab],query.max);							
							
							var style = 
							{
								fillColor: color,							
								color: "#49D0FC",
								weight: 1,
								opacity: 1,
								fillOpacity: 0.7,
								width: 100
							}

							peta.setStyle(style);
							peta.on('mouseover',highlightFeature);
							peta.on('mouseout',function(){
								peta.setStyle(style);
								info.update();
							});
							peta.on('click',function(e){
								var layer = e.target;
		
								var popup = L.popup();
								popup
								.setLatLng(e.latlng)
								//.setContent("Kabupaten/Kota : " + layer.feature.properties.nmkab +'</br><a data-toggle="modal"  data-target="#myModal11" href="detail_peta?kab='+layer.feature.properties.kd_kab+'"> '+query.map[layer.feature.properties.kd_kab]+' '+query.unit+' </a>')
								.setContent("Kabupaten/Kota : " + layer.feature.properties.nmkab +''+query.url[layer.feature.properties.kd_kab])
								.openOn(map); 
							});
						}					
					}).addTo(geoJson);
					createLegend(query.max,query.unit);
					// $('#loadingmap').hide(); 
					$('#map').css({ opacity: 1 });
					// $('#map').show(); 
			   }
			 });
	}
	
	function setChart(url)
	{
		$('#container').hide(); 
		$('#container2').hide(); 
		// $('#petadiv').hide(); 
		// $('#chartdiv').attr('class','col-md-12'); 
		$('#loading').show(); 
		$.ajax({
			   type		: "GET",
			   url		: url,
			   dataType	: 'json',
			   data		: $("#isi").serialize(), // serializes the form's elements.
			   success	: function(query)
			   {
				
					var chart = $('#container2').highcharts();
					while(chart.series.length > 0) {
						chart.series[0].remove(false);
					}
					
					chart.xAxis[0].categories = query.categories;
					
					for(i=0;i<query.chart.length;i++){
						chart.addSeries(query.chart[i],false);						
					}
					chart.redraw();
					$('#container').hide(); 
					$('#loading').hide(); 
					$('#container2').show(); 
					
			   }
			});
	}

	
	

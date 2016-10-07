function sfGmapWidgetWidget(options){
  // this global attributes
  this.lng      = null;
  this.lat      = null;
  this.address  = null;
  this.map      = null;
  this.geocoder = null;
  this.options  = options;

  this.init();
}

sfGmapWidgetWidget.prototype = new Object();

sfGmapWidgetWidget.prototype.init = function() {

  if(!GBrowserIsCompatible())
  {
    return;
  }

  // retrieve dom element
    
  this.lng      = jQuery("#" + this.options.longitude);
  this.lat      = jQuery("#" + this.options.latitude);
  this.address  = jQuery("#" + this.options.address);
  this.lookup   = jQuery("#" + this.options.lookup);

  // create the google geocoder object
  this.geocoder = new GClientGeocoder();

  // create the map

 /*this.map = new GMap2(jQuery("#" + this.options.map).get(0));
 this.map.setCenter(new GLatLng(this.lat.val(), this.lng.val()), 13);
 // this.map.setCenter(new GLatLng(-66, 7), 13);
  this.map.setUIToDefault();
//if (this.lng=="") this.lng=66;
//alert("longitud: '"+this.lng.val()+ "' latitud: "+this.lat.val());

  // cross reference object
  this.map.sfGmapWidgetWidget = this;
  this.geocoder.sfGmapWidgetWidget = this;
  this.lookup.get(0).sfGmapWidgetWidget = this;

  // add the default location
/* var point = new GLatLng(this.lat.val(), this.lng.val());
  var marker = new GMarker(point);
  this.map.setCenter(point, 15);
  this.map.addOverlay(marker);*/

  /*var point = new GLatLng(-66.58973, 6.42375);
  var marker = new GMarker(point);
  this.map.setCenter(point, 13);
  this.map.addOverlay(marker);*/
    this.map = new GMap (jQuery("#" + this.options.map).get(0));
  // cross reference object
  this.map.sfGmapWidgetWidget = this;
  this.geocoder.sfGmapWidgetWidget = this;
  this.lookup.get(0).sfGmapWidgetWidget = this;
this.map.centerAndZoom(new GPoint(-66.58973, 6.42375), 12);
  this.map.setUIToDefault();
this.map.addControl(new GMapTypeControl());
this.map.addControl(new GScaleControl());
this.map.addControl(new GOverviewMapControl());
this.map.setMapType(G_NORMAL_MAP);

  // bind the move action on the map
  GEvent.addListener(this.map, "move", function() {
     var center = this.getCenter();
     this.sfGmapWidgetWidget.lng.val(center.lng());
     this.sfGmapWidgetWidget.lat.val(center.lat());
  });

  // bind the click action on the map
  GEvent.addListener(this.map, "click", function(overlay, latlng) {
    if (latlng != null) {
      sfGmapWidgetWidget.activeWidget = this.sfGmapWidgetWidget;

      this.sfGmapWidgetWidget.geocoder.getLocations(
        latlng,
        sfGmapWidgetWidget.reverseLookupCallback
      );
    }
  });

  // bind the click action on the lookup field
  this.lookup.bind('click', function(){
    sfGmapWidgetWidget.activeWidget = this.sfGmapWidgetWidget;

    this.sfGmapWidgetWidget.geocoder.getLatLng(
      this.sfGmapWidgetWidget.address.val(),
      sfGmapWidgetWidget.lookupCallback
    );

    return false;
  })
}

sfGmapWidgetWidget.activeWidget = null;
sfGmapWidgetWidget.lookupCallback = function(point)
{
  // get the widget and clear the state variable
  var widget = sfGmapWidgetWidget.activeWidget;
  sfGmapWidgetWidget.activeWidget = null;

  if (!point) {
    alert("Dirección no encontrada");
    return;
  }

  widget.map.clearOverlays();
  widget.map.setCenter(point, 15);
  var marker = new GMarker(point);
  widget.map.addOverlay(marker);
}

sfGmapWidgetWidget.reverseLookupCallback = function(response)
{
  // get the widget and clear the state variable
  var widget = sfGmapWidgetWidget.activeWidget;
  sfGmapWidgetWidget.activeWidget = null;

  widget.map.clearOverlays();

  if (!response || response.Status.code != 200) {
    alert('Dirección no encontrada');
    return;
  }

  // get information location and init variables
  var place = response.Placemark[0];
  var point = new GLatLng(place.Point.coordinates[1],place.Point.coordinates[0]);
  var marker = new GMarker(point);

  // add marker and center the map
  widget.map.setCenter(point, 15);
  widget.map.addOverlay(marker);

  // update values
  widget.address.val(place.address);
  widget.lat.val(place.Point.coordinates[1]);
  widget.lng.val(place.Point.coordinates[0]);
}
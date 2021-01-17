//start
var vectorLayer = new ol.layer.Vector({
  source: new ol.source.Vector({
    format: new ol.format.GeoJSON(),
    url: './json/jalan_yossudarso.json'
  }),
  style: new ol.style.Style({
    image: new ol.style.Icon(({
      anchor: [1.0, 46],
      anchorXUnits: 'fraticon',
      anchorYUnits: 'pixels',
      src: './icon/pointer.png'
    }))
  })
});
//finish

var map = new ol.Map({
  target: 'mapYS',
  layers: [
    new ol.layer.Tile({
      source: new ol.source.OSM()
    }), vectorLayer
  ],
  view: new ol.View({
    center: ol.proj.fromLonLat([101.43818319577389, 0.5707958832931668]),
    zoom: 15
  })
});

//mencari id popup, popup-content, popup-closer
var container = document.getElementById('popupYS'),
  content_element = document.getElementById('popup-contentYS'),
  closer = document.getElementById('popup-closerYS');

closer.onclick = function () {
  overlay.setPosition(undefined);
  closer.blur();
  return false;
};

var overlay = new ol.Overlay({
  element: container,
  autoPan: true,
  offset: [0, -10]
});

map.addOverlay(overlay);
//untuk fullscreen
var fullscreen = new ol.control.FullScreen();
map.addControl(fullscreen);

//panggil library map, jika di klik akan ada function event
map.on('click', function (evt) {
  var feature = map.forEachFeatureAtPixel(evt.pixel,
    function (feature, layer) {
      return feature;
    });
  if (feature) {
    var geometry = feature.getGeometry();
    var coord = geometry.getCoordinates();
    var content = '<h5>Drainase : ' + feature.get('Titik') + '</h5>';
    content += '<h6 style="color:red;">Jalan : ' + feature.get('Nama_Jalan') + '</h6>';
    content += '<h6 style="color:green;">Status : ' + feature.get('Status') + '</h6>';
    content += '<img src="' + feature.get('Gambar') + '" width="150"/>';
    content_element.innerHTML = content;
    overlay.setPosition(coord);
    console.info(feature.getProperties());
  }
});


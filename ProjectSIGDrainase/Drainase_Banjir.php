<?php include 'header.php'; ?>
<main id="main">

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container-fluid" data-aos="fade-up">
      <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-6 pt-3 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>Data Drainase Berdasarkan Lokasi Banjir</h1>
        </div>
        <div class="col-xl-4 col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="150">
          <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->
  <!-- ======= Features Section ======= -->
  <section id="peta" class="features">
    <div class="container-fluid" data-aos="fade-up">
      <div class="section-title">
        <h2>Pemetaan Drainase</h2>
        <p>Pemetaan ini menggunakan Open Layer</p>
      </div>

      <div class="wrap">
        <div class="badan">
          <div class="sidebar">
            <div class="thumbnail">
              <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block" style="width:100%; height:200px" src="assets/img/drainase/3_type6.jpg" alt="First slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block" style="width:100%; height:200px" src="assets/img/drainase/1c_type.jpg" alt="Second slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block" style="width:100%; height:200px" src="assets/img/drainase/6_paus.jpg" alt="Third slide">
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>

            <div id="popup" class="ol-popup">
              <a href="#" id="popup-closer" class="ol-popup-closer"></a>
              <div id="popup-content"></div>
            </div>

            <script type="text/javascript">
              //start
              var vectorLayer = new ol.layer.Vector({
                source: new ol.source.Vector({
                  format: new ol.format.GeoJSON(),
                  url: 'json/DataBanjir.json'
                }),
                style: new ol.style.Style({
                  image: new ol.style.Icon(({
                    anchor: [1.0, 46],
                    anchorXUnits: 'fraticon',
                    anchorYUnits: 'pixels',
                    src: 'icon/pointer.png'
                  }))
                })
              });

              //finish



              var map = new ol.Map({
                target: 'map',
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
              var container = document.getElementById('popup'),
                content_element = document.getElementById('popup-content'),
                closer = document.getElementById('popup-closer');

              closer.onclick = function() {
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
              map.on('click', function(evt) {
                var feature = map.forEachFeatureAtPixel(evt.pixel,
                  function(feature, layer) {
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
            </script>
          </div>
        </div>
      </div>
      <div class="clear"></div>
  </section>
  <!--End Features Section -->

  <!-- ======= Features Section ======= -->
  <section id="peta" class="features">
    <nav>
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="databj-tab" data-toggle="tab" href="#databanjir" role="tab" aria-controls="databanjir" aria-selected="true">Data Banjir</a>
    </nav>

    <div class="container-fluid" data-aos="fade-up">
      <div class="tab-content" id="nav-tabContent">
        <!-- Data Banjir -->
        <div class="tab-pane fade show active" id="databanjir" role="tabpanel" aria-labelledby="databj-tab">
          <div class="wrap">
            <div class="badan">
              <div id="mapbj" class="content"></div>

              <div id="popupbj" class="ol-popup">
                <a href="#" id="popup-closerbj" class="ol-popup-closer"></a>
                <div id="popup-contentbj"></div>
              </div>
              <script type="text/javascript" src="assets/js/DataBanjir.js"></script>
            </div>
          </div>
          <br />
          <div class="table-responsive">
            <table id="databanjir" class="table table-striped table-bordered" style="width:100%">
            </table>
          </div>

          <script type="text/javascript">
            // UNTUK DATATABLE (AKSES JSON SATU LAGI)

            $(document).ready(function() {
              var table = $('#databanjir').DataTable({
                responsive: true,
                "ajax": {
                  "type": "POST",
                  "url": "jsontable/databanjir.json",
                  "timeout": 120000,
                  "dataSrc": function(json) {
                    if (json != null) {
                      return json
                    } else {
                      return "";
                    }
                  }
                },
                "sAjaxDataProp": "",
                "width": "100%",
                "order": [
                  [0, "asc"]
                ],
                "aoColumns": [{
                    "mData": null,
                    "title": "No",
                    render: function(data, type, row, meta) {
                      return meta.row + meta.settings._iDisplayStart + 1;
                    }
                  },
                  {
                    "mData": null,
                    "title": "Titik Drainase",
                    "render": function(data, row, type, meta) {
                      return data.properties.Titik;
                    }
                  },
                  {
                    "mData": null,
                    "title": "Latitude",
                    "render": function(data, row, type, meta) {
                      return data.properties.Lat__y_;
                    }
                  },
                  {
                    "mData": null,
                    "title": "Longitude",
                    "render": function(data, row, type, meta) {
                      return data.properties.Long__x_;
                    }
                  },
                  {
                    "mData": null,
                    "title": "Panjang",
                    "render": function(data, row, type, meta) {
                      return data.properties.Panjang__m;
                    }
                  },
                  {
                    "mData": null,
                    "title": "Lebar",
                    "render": function(data, row, type, meta) {
                      return data.properties.Lebar__m_;
                    }
                  },
                  {
                    "mData": null,
                    "title": "Kedalaman",
                    "render": function(data, row, type, meta) {
                      return data.properties.Kedalaman;
                    }
                  },
                  {
                    "mData": null,
                    "title": "Bahan",
                    "render": function(data, row, type, meta) {
                      return data.properties.Bahan;
                    }
                  },
                  {
                    "mData": null,
                    "title": "Kondisi",
                    "render": function(data, row, type, meta) {
                      return data.properties.Kondisi;
                    }
                  },
                  {
                    "mData": null,
                    "title": "Arah Alir",
                    "render": function(data, row, type, meta) {
                      return data.properties.Arah_Alir;
                    }
                  },
                  {
                    "mData": null,
                    "title": "Nama Jalan",
                    "render": function(data, row, type, meta) {
                      return data.properties.Nama_Jalan;
                    }
                  },
                  {
                    "mData": null,
                    "title": "Gambar",
                    "render": function(data, row, type, meta) {

                      return '<img src="' + data.properties.Gambar + '" width="150px"/>';
                    }
                  }
                ]
              });
            });
          </script>
        </div>



      </div>
    </div>
    </div>
    <div class="clear"></div>
  </section>
</main><!-- End #main -->

<?php include 'Footer.php'; ?>
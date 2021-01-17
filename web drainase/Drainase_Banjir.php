<?php include '/header.php'; ?>
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
                    <img class="d-block" style="width:100%; height:200px" src="assets/img/drainase/3_type6.jpg"
                      alt="First slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block" style="width:100%; height:200px" src="assets/img/drainase/1c_type.jpg"
                      alt="Second slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block" style="width:100%; height:200px" src="assets/img/drainase/6_paus.jpg"
                      alt="Third slide">
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
            <div class="info">
              Info
            </div>
          </div>
          <div id="map" class="content"></div>

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
          </script>
        </div>
      </div>
    </div>
    <div class="clear"></div>
  </section>
  <!--End Features Section -->
</main><!-- End #main -->

<?php include '/Footer.php'; ?>
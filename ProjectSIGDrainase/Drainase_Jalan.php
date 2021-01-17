<?php include 'header.php'; ?>
<main id="main">

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container-fluid" data-aos="fade-up">
      <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-6 pt-3 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>Data Drainase Berdasarkan Jalan</h1>
        </div>
        <div class="col-xl-4 col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="150">
          <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <!-- ======= Features Section ======= -->
  <section id="peta" class="features">
    <nav>
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="yossudarso-tab" data-toggle="tab" href="#yossudarso" role="tab" aria-controls="yossudarso" aria-selected="true">Yos Sudarso</a>

        <a class="nav-item nav-link" id="type6-tab" data-toggle="tab" href="#type6" role="tab" aria-controls="type6" aria-selected="false">Type 6</a>

        <a class="nav-item nav-link" id="paus-tab" data-toggle="tab" href="#paus" role="tab" aria-controls="paus" aria-selected="false">Paus</a>

        <a class="nav-item nav-link" id="sukamaju-tab" data-toggle="tab" href="#sukamaju" role="tab" aria-controls="sukamaju" aria-selected="false">Suka Maju</a>

        <a class="nav-item nav-link" id="lembahdamai-tab" data-toggle="tab" href="#lembahdamai" role="tab" aria-controls="lembahdamai" aria-selected="false">Lembah Damai</a>
      </div>
    </nav>

    <div class="container-fluid" data-aos="fade-up">
      <div class="tab-content" id="nav-tabContent">
        <!-- YOS SUDARSO -->
        <div class="tab-pane fade show active" id="yossudarso" role="tabpanel" aria-labelledby="yossudarso-tab">
          <div class="wrap">
            <div class="badan">
              <div id="mapYS" class="content"></div>

              <div id="popupYS" class="ol-popup">
                <a href="#" id="popup-closerYS" class="ol-popup-closer"></a>
                <div id="popup-contentYS"></div>
              </div>
              <script type="text/javascript" src="assets/js/DataJalanYS.js"></script>
            </div>
          </div>
          <br />
          <h3>Data Jalan Yos Sudarso</h3><br />
          <div class="table-responsive">
            <table id="datajalanYS" class="table table-striped table-bordered" style="width:100%">
            </table>
          </div>

          <script type="text/javascript">
            // UNTUK DATATABLE (AKSES JSON SATU LAGI)

            $(document).ready(function() {
              var table = $('#datajalanYS').DataTable({
                responsive: true,
                "ajax": {
                  "type": "POST",
                  "url": "jsontable/datajalanYS.json",
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
                    "title": "Status",
                    "render": function(data, row, type, meta) {
                      return data.properties.Status;
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


        <!-- TYPE 6----------------------------------------------------------------------- -->
        <div class="tab-pane fade" id="type6" role="tabpanel" aria-labelledby="type6-tab">
          <div class="wrap">
            <div class="badan">
              <div id="maptype6" class="content"></div>

              <div id="popuptype" class="ol-popup">
                <a href="#" id="popup-closertype" class="ol-popup-closer"></a>
                <div id="popup-contenttype"></div>
              </div>
              <script type="text/javascript" src="assets/js/DataJalanType6.js"></script>
            </div>
          </div>
          <br />
          <h3>Data Jalan Type 6</h3><br />
          <div class="table-responsive">
            <table id="datajalantype6" class="table table-striped table-bordered" style="width:100%">
            </table>
          </div>

          <script type="text/javascript">
            // UNTUK DATATABLE (AKSES JSON SATU LAGI)

            $(document).ready(function() {
              var table = $('#datajalantype6').DataTable({
                responsive: true,
                "ajax": {
                  "type": "POST",
                  "url": "jsontable/datajalantype6.json",
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
                    "title": "Status",
                    "render": function(data, row, type, meta) {
                      return data.properties.Status;
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

        <!-- PAUS -->
        <div class="tab-pane fade" id="paus" role="tabpanel" aria-labelledby="paus-tab">
          <div class="wrap">
            <div class="badan">
              <div id="mappaus" class="content"></div>

              <div id="popuppaus" class="ol-popup">
                <a href="#" id="popup-closerpaus" class="ol-popup-closer"></a>
                <div id="popup-contentpaus"></div>
              </div>
              <script type="text/javascript" src="assets/js/DataJalanPaus.js"></script>
            </div>
          </div>
          <br />
          <h3>Data Jalan Paus</h3><br />
          <div class="table-responsive">
            <table id="datajalanpaus" class="table table-striped table-bordered" style="width:100%">
            </table>
          </div>

          <script type="text/javascript">
            // UNTUK DATATABLE (AKSES JSON SATU LAGI)

            $(document).ready(function() {
              var table = $('#datajalanpaus').DataTable({
                responsive: true,
                "ajax": {
                  "type": "POST",
                  "url": "jsontable/datajalanpaus.json",
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
                    "title": "Status",
                    "render": function(data, row, type, meta) {
                      return data.properties.Status;
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

        <!-- SUKAMAJU -->
        <div class="tab-pane fade" id="sukamaju" role="tabpanel" aria-labelledby="sukamaju-tab">
          <div class="wrap">
            <div class="badan">
              <div id="mapsukamaju" class="content"></div>

              <div id="popupsukamaju" class="ol-popup">
                <a href="#" id="popup-closersukamaju" class="ol-popup-closer"></a>
                <div id="popup-contentsukamaju"></div>
              </div>
              <script type="text/javascript" src="assets/js/DataJalanSukamaju.js"></script>
            </div>
          </div>
          <br />
          <h3>Data Jalan Suka Maju</h3><br />
          <div class="table-responsive">
            <table id="datajalansukamaju" class="table table-striped table-bordered" style="width:100%">
            </table>
          </div>

          <script type="text/javascript">
            // UNTUK DATATABLE (AKSES JSON SATU LAGI)

            $(document).ready(function() {
              var table = $('#datajalansukamaju').DataTable({
                responsive: true,
                "ajax": {
                  "type": "POST",
                  "url": "jsontable/datajalansukamaju.json",
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
                    "title": "Status",
                    "render": function(data, row, type, meta) {
                      return data.properties.Status;
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

        <!-- LEMBAH DAMAI -->
        <div class="tab-pane fade" id="lembahdamai" role="tabpanel" aria-labelledby="lembahdamai-tab">
          <div class="wrap">
            <div class="badan">
              <div id="mapdamai" class="content"></div>

              <div id="popupdamai" class="ol-popup">
                <a href="#" id="popup-closerdamai" class="ol-popup-closer"></a>
                <div id="popup-contentdamai"></div>
              </div>
              <script type="text/javascript" src="assets/js/DataJalanDamai.js"></script>
            </div>
          </div>
          <br />
          <h3>Data Jalan Lembah Damai</h3><br />
          <div class="table-responsive">
            <table id="datajalandamai" class="table table-striped table-bordered" style="width:100%">
            </table>
          </div>

          <script type="text/javascript">
            // UNTUK DATATABLE (AKSES JSON SATU LAGI)

            $(document).ready(function() {
              var table = $('#datajalandamai').DataTable({
                responsive: true,
                "ajax": {
                  "type": "POST",
                  "url": "jsontable/datajalandamai.json",
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
                    "title": "Status",
                    "render": function(data, row, type, meta) {
                      return data.properties.Status;
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
  <!--End Features Section -->

</main><!-- End #main -->
<?php include 'Footer.php'; ?>
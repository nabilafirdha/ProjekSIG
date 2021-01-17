<?php include '/header.php'; ?>
<main id="main">

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container-fluid" data-aos="fade-up">
            <div class="row justify-content-center">
                <div
                    class="col-xl-5 col-lg-6 pt-3 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1>Data Drainase Berdasarkan Jalan</h1>
                </div>
                <div class="col-xl-4 col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="150">
                    <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->
    <br/>

    <div class="wrap">
        <div class="badan">
            <div id="map" class="content"></div>

            <div id="popup" class="ol-popup">
                <a href="#" id="popup-closer" class="ol-popup-closer"></a>
                <div id="popup-content"></div>
            </div>
            <script type="text/javascript" src="assets/js/DataJalanYS.js"></script>
        </div>
    </div>

    <br/>

    <div class="table-responsive">
        <table id="data" class="table table-striped table-bordered" style="width:100%">
        </table>
    </div>


    <script type="text/javascript">
        $(document).ready(function () {
            var table = $('#data').DataTable({
                responsive: true,
                "ajax": {
                    "type": "POST",
                    "url": "jsontable/datajalanYS.json",
                    "timeout": 120000,
                    "dataSrc": function (json) {
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
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        "mData": null,
                        "title": "Titik Drainase",
                        "render": function (data, row, type, meta) {
                            return data.properties.Titik;
                        }
                    },
                    {
                        "mData": null,
                        "title": "Latitude",
                        "render": function (data, row, type, meta) {
                            return data.properties.Lat__y_;
                        }
                    },
                    {
                        "mData": null,
                        "title": "Longitude",
                        "render": function (data, row, type, meta) {
                            return data.properties.Long__x_;
                        }
                    },
                    {
                        "mData": null,
                        "title": "Panjang",
                        "render": function (data, row, type, meta) {
                            return data.properties.Panjang__m;
                        }
                    },
                    {
                        "mData": null,
                        "title": "Lebar",
                        "render": function (data, row, type, meta) {
                            return data.properties.Lebar__m_;
                        }
                    },
                    {
                        "mData": null,
                        "title": "Kedalaman",
                        "render": function (data, row, type, meta) {
                            return data.properties.Kedalaman;
                        }
                    },
                    {
                        "mData": null,
                        "title": "Bahan",
                        "render": function (data, row, type, meta) {
                            return data.properties.Bahan;
                        }
                    },
                    {
                        "mData": null,
                        "title": "Kondisi",
                        "render": function (data, row, type, meta) {
                            return data.properties.Kondisi;
                        }
                    },
                    {
                        "mData": null,
                        "title": "Arah Alir",
                        "render": function (data, row, type, meta) {
                            return data.properties.Arah_Alir;
                        }
                    },
                    {
                        "mData": null,
                        "title": "Status",
                        "render": function (data, row, type, meta) {
                            return data.properties.Status;
                        }
                    },
                    {
                        "mData": null,
                        "title": "Gambar",
                        "render": function (data, row, type, meta) {

                            return '<img src="' + data.properties.Gambar + '" width="150px"/>';
                        }
                    }
                ]
            });
        });
    </script>
    <?php include '/Footer.php'; ?>
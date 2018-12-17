<div class="container">
        <div class="row shop_by">
            <div class="container">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" data-toggle="tab" href="#nav-o" role="tab" aria-selected="true">Торговые точки</a>
                        <a class="nav-item nav-link"  data-toggle="tab" href="#nav-s" role="tab" aria-selected="false">Интернет-магазины</a>
                    </div>
                </nav>
            </div>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-o" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="map-wrapper col-lg-6 col-sm-12">
                            <div id="map" style="width:100%;height:400px;">
                            </div>
                        </div>
                        <div class="map-info col-lg-6 hidden-sm">
                            <div class="wrapper">
                                <div class="scroll-wrapper map-places scrollbar-outer" style="position: relative;">
                                    <div class="map-places scrollbar-outer scroll-content scroll-scrolly_visible" style="height: auto; margin-bottom: 0px; margin-right: 0px; max-height: 470px;">

                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="tab-pane fade" id="nav-s" role="tabpanel" aria-labelledby="nav-profile-tab">список интернет-магазинов</div>
            </div>
        </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4TmjMPVSSnWg8YdQ76pkpahkw2xqdCzw&callback=initMap"></script>
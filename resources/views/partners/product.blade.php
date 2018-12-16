<div class="container">
        <div class="row shop_by">
            <div class="container">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-o" role="tab" aria-controls="nav-home" aria-selected="true">Торговые точки</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-s" role="tab" aria-controls="nav-profile" aria-selected="false">Интернет-магазины</a>
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

                                        <pre><?php print_r($shops['shops'])?></pre>
                                        <?php
                                        $shops_mass = json_decode($shops['shops'], true);?>
                                        @foreach($shops_mass as $shop)
                                            @foreach($shop as $item)
                                                    {{--<div class="city">{{$item['name']}}</div>--}}
                                                    <div class="adres" id="{{$item['id']}}"><?php echo mb_strimwidth($item['addres'], 0, 70, "...");?></div>
                                                @endforeach
                                        @endforeach
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
    {{--<script>--}}




        {{--var shops = <?php echo $shops; ?>;--}}
        {{--var map;--}}
        {{--var markers;--}}
        {{--var image = '/images/marker.png';--}}
        {{--function initMap() {--}}

            {{--map = new google.maps.Map(document.getElementById('map'), {--}}
                {{--zoom: 5.7,--}}
                {{--center: {lat: 49.7140944, lng: 31.3367827}--}}
            {{--});--}}
            {{--var locations = [];--}}
            {{--for (key in shops) {--}}
                {{--for(f in shops[key]) {--}}
                    {{--locations.push(geoadres(shops[key][f]));--}}
                {{--}--}}
            {{--}--}}
            {{--//console.log(locations);--}}



            {{--// Create an array of alphabetical characters used to label the markers.--}}
            {{--var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';--}}

            {{--// Add some markers to the map.--}}
            {{--// Note: The code uses the JavaScript Array.prototype.map() method to--}}
            {{--// create an array of markers based on a given "locations" array.--}}
            {{--// The map() method here has nothing to do with the Google Maps API.--}}
            {{--markers = locations.map(function(location, i) {--}}
                {{--var contentString = '<p>'+location.addres+'</p>';--}}
                {{--var marker = new google.maps.Marker({--}}
                    {{--position: location,--}}
                    {{--id: location.id,--}}
                    {{--title: location.title,--}}
                    {{--addres: location.addres,--}}
                    {{--//label: labels[i % labels.length],--}}
                    {{--icon: image--}}
                {{--});--}}
                {{--var infowindow = new google.maps.InfoWindow({--}}
                    {{--content: contentString--}}
                {{--});--}}
                {{--marker.addListener('click', function() {--}}
                    {{--infowindow.open(map, marker);--}}
                {{--});--}}
                {{--return marker;--}}
            {{--});--}}

            {{--// Add a marker clusterer to manage the markers.--}}
            {{--var markerCluster = new MarkerClusterer(map, markers,--}}
                {{--{imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});--}}

        {{--}--}}
        {{--$(document).ready(function () {--}}


            {{--$(".adres").on("click", function () {--}}
                {{--var id = this.id;--}}
                {{--$('.adres').each(function(index) {--}}
                    {{--$(this).removeClass('active');--}}
                {{--});--}}
                {{--// на нужную вешаешь--}}
                {{--$(this).addClass('active');--}}
                {{--for (key in markers) {--}}
                    {{--if (id == markers[key].id) {--}}
                        {{--var contentString = '<p>'+markers[key].addres+'</p>';--}}
                        {{--var infowindow = new google.maps.InfoWindow({--}}
                            {{--content: contentString--}}
                        {{--});--}}

                        {{--//console.log(markers[key].id);--}}
                        {{--map.setZoom(15);--}}
                        {{--map.setCenter(markers[key].getPosition());--}}
                        {{--infowindow.open(map, markers[key]);--}}
                        {{--return markers[key];--}}
                    {{--}--}}
                {{--}--}}

            {{--});--}}

            {{--$(".nav a").on("click", function () {--}}
                {{--$(".nav").find(".active").removeClass("active");--}}
                {{--$(this).addClass("active");--}}
            {{--});--}}
        {{--});--}}
        {{--function toggleBounce(marker) {--}}
            {{--if (marker.getAnimation() !== null) {--}}
                {{--marker.setAnimation(null);--}}
            {{--} else {--}}
                {{--marker.setAnimation(google.maps.Animation.BOUNCE);--}}
            {{--}--}}
        {{--}--}}
        {{--function geoadres(shop) {--}}

            {{--//co bvnsole.log(shop);--}}

            {{--var resultlat = '';--}}
            {{--var resultlng = '';--}}
            {{--$.ajax({--}}
                {{--async: false,--}}
                {{--dataType: "json",--}}
                {{--url: 'https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyA4TmjMPVSSnWg8YdQ76pkpahkw2xqdCzw&address='+shop.addres+'&sensor=false&language=ru',--}}
                {{--//url: 'https://maps.google.com/maps/api/geocode/json?key=AIzaSyA4TmjMPVSSnWg8YdQ76pkpahkw2xqdCzw&address=' + shop,--}}
                {{--success: function(data){--}}
                    {{--for (var key in data.results) {--}}
                        {{--resultlat = data.results[key].geometry.location.lat;--}}
                        {{--resultlng = data.results[key].geometry.location.lng;--}}
                    {{--} }--}}
            {{--});--}}
            {{--return { lat: resultlat, lng: resultlng, id:shop.id,  title: shop.name, addres: shop.addres}--}}
        {{--}--}}



    {{--</script>--}}
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4TmjMPVSSnWg8YdQ76pkpahkw2xqdCzw&callback=initMap">
    </script>
    </body>
    </html>

@endsection
<div class="shop_by">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item active">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
               aria-selected="true">{{trans('index.shops_t')}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
               aria-selected="false">{{trans('index.shops_i')}}</a>
        </li>

    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="map-wrapper col-lg-6 col-sm-12">
                <div id="map" style="width:100%;height:400px;">
                </div>
            </div>
            <div class="map-info col-lg-6 hidden-sm">
                <div class="wrapper">
                    <div class="scroll-wrapper map-places scrollbar-outer" style="position: relative;">
                        <div class="map-places scrollbar-outer scroll-content scroll-scrolly_visible"
                             style="height: auto; margin-bottom: 0px; margin-right: 0px; max-height: 470px;">
                            <?php
                            $shops_mass = json_decode($shops['shops'], true);?>
                            @foreach($shops_mass as $shop)
                                @foreach($shop as $item)
                                    <div class="adres"
                                         id="{{$item['id']}}"><?php echo mb_strimwidth($item['addres'], 0, 70, "...");?></div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            @foreach($shops['ecommerces'] as $shope)
                @foreach($shope as $item)
                    <div class="adres" id="{{$item['id']}}"><a target="_blank" href="<?=$item['url']?>"><?php echo mb_strimwidth($item['addres'], 0, 70, "...");?></a>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    var shops = <?php echo $shops['shops']; ?>;
    var map;
    var markers;
    var image = '/images/marker.png';
    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 5.7,
            center: {lat: 49.7140944, lng: 31.3367827}
        });
        var locations = [];
        for (key in shops) {
            for (f in shops[key]) {
                locations.push(geoadres(shops[key][f]));
            }
        }
        //console.log(locations);
        // Create an array of alphabetical characters used to label the markers.
        var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        // Add some markers to the map.
        // Note: The code uses the JavaScript Array.prototype.map() method to
        // create an array of markers based on a given "locations" array.
        // The map() method here has nothing to do with the Google Maps API.
        markers = locations.map(function (location, i) {
            var contentString = '<p>' + location.addres + '</p>';
            var marker = new google.maps.Marker({
                position: location,
                id: location.id,
                title: location.title,
                addres: location.addres,
                //label: labels[i % labels.length],
                icon: image
            });
            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });
            marker.addListener('click', function () {
                infowindow.open(map, marker);
            });
            return marker;
        });
        // Add a marker clusterer to manage the markers.
        var markerCluster = new MarkerClusterer(map, markers,
            {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
    }
    $(document).ready(function () {
        $(".adres").on("click", function () {
            var id = this.id;
            $('.adres').each(function (index) {
                $(this).removeClass('active');
            });
            // на нужную вешаешь
            $(this).addClass('active');
            for (key in markers) {
                if (id == markers[key].id) {
                    var contentString = '<p>' + markers[key].addres + '</p>';
                    var infowindow = new google.maps.InfoWindow({
                        content: contentString
                    });

                    //console.log(markers[key].id);
                    map.setZoom(15);
                    map.setCenter(markers[key].getPosition());
                    infowindow.open(map, markers[key]);
                    return markers[key];
                }
            }
        });
        $(".nav a").on("click", function () {
            $(".nav").find(".active").removeClass("active");
            $(this).addClass("active");
        });
    });
    function toggleBounce(marker) {
        if (marker.getAnimation() !== null) {
            marker.setAnimation(null);
        } else {
            marker.setAnimation(google.maps.Animation.BOUNCE);
        }
    }
    function geoadres(shop) {
        //co bvnsole.log(shop);
        var resultlat = '';
        var resultlng = '';
        $.ajax({
            async: false,
            dataType: "json",
            url: 'https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyA4TmjMPVSSnWg8YdQ76pkpahkw2xqdCzw&address=' + shop.addres + '&sensor=false&language=ru',
            //url: 'https://maps.google.com/maps/api/geocode/json?key=AIzaSyA4TmjMPVSSnWg8YdQ76pkpahkw2xqdCzw&address=' + shop,
            success: function (data) {
                for (var key in data.results) {
                    resultlat = data.results[key].geometry.location.lat;
                    resultlng = data.results[key].geometry.location.lng;
                }
            }
        });
        return {lat: resultlat, lng: resultlng, id: shop.id, title: shop.name, addres: shop.addres}
    }
</script>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4TmjMPVSSnWg8YdQ76pkpahkw2xqdCzw&callback=initMap"></script>


@extends('site.content.home')
@section('title', trans('index.where_to_by'))
@section('header')
    <div id="content" class="site-content">
        <div class="ast-container">
            <div id="primary" class="content-area primary">
                <main id="main" class="site-main" role="main">
                    <article itemtype="https://schema.org/CreativeWork" itemscope="itemscope" class="post-5 page type-page status-publish ast-article-single">
                        <!-- .entry-header -->
                        <div class="entry-content clear" itemprop="text">
                            <div class="elementor elementor-5">
                                <div class="elementor-inner">
                                    <div class="elementor-section-wrap">
                                        <section class="elementor-element elementor-element-title_post elementor-section-content-bottom elementor-reverse-mobile elementor-section-boxed elementor-section-height-default elementor-section-height-default elementor-section elementor-top-section" data-settings="{background_background:classic,shape_divider_bottom:waves}" data-element_type="section">
                                            <div class="elementor-background-overlay"></div>
                                            <div class="elementor-shape elementor-shape-bottom" data-negative="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
                                                    <path class="elementor-shape-fill" d="M421.9,6.5c22.6-2.5,51.5,0.4,75.5,5.3c23.6,4.9,70.9,23.5,100.5,35.7c75.8,32.2,133.7,44.5,192.6,49.7
                                             c23.6,2.1,48.7,3.5,103.4-2.5c54.7-6,106.2-25.6,106.2-25.6V0H0v30.3c0,0,72,32.6,158.4,30.5c39.2-0.7,92.8-6.7,134-22.4
                                             c21.2-8.1,52.2-18.2,79.7-24.2C399.3,7.9,411.6,7.5,421.9,6.5z"></path>
                                                </svg>
                                            </div>
                                            <div class="elementor-container elementor-column-gap-wider">
                                                <div class="elementor-row">
                                                    <div class="elementor-element elementor-element-75f8b4ef elementor-column elementor-col-100 elementor-top-column" data-element_type="column">
                                                        <div class="elementor-column-wrap elementor-element-populated">
                                                            <div class="elementor-widget-wrap">
                                                                <div class="elementor-element elementor-element-38905c3d elementor-widget elementor-widget-heading" data-element_type="heading.default">
                                                                    <div class="elementor-widget-container">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </main>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container">
        <div class="col-lg-12">
            <div class="row item_crumbs">
                <p>{{ Breadcrumbs::render('shops', "") }}</p>
            </div>
        </div>
        <div class="title_page heading">{{trans('menu.buy')}}</div>
    </div>
    <div class="container">
        <div class="row shop_by">
            <div class="container">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-o" role="tab" aria-controls="nav-home" aria-selected="true">{{trans('index.shops_t')}}</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-s" role="tab" aria-controls="nav-profile" aria-selected="false">{{trans('index.shops_i')}}</a>
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
                                        <?php $shops_mass = json_decode($shops, true);?>
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

                <div class="tab-pane fade" id="nav-s" role="tabpanel" aria-labelledby="nav-profile-tab">
                    @foreach($ecommerces as $shope)
                        @foreach($shope as $item)
                            <div class="adres" id="{{$item['id']}}"><?php echo mb_strimwidth($item['addres'], 0, 70, "...");?></div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>




        var shops = <?php echo $shops; ?>;
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
                for(f in shops[key]) {
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
            markers = locations.map(function(location, i) {
                var contentString = '<p>'+location.addres+'</p>';
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
                marker.addListener('click', function() {
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
                $('.adres').each(function(index) {
                    $(this).removeClass('active');
                });
                // на нужную вешаешь
                $(this).addClass('active');
                for (key in markers) {
                    if (id == markers[key].id) {
                        var contentString = '<p>'+markers[key].addres+'</p>';
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
                url: 'https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyA4TmjMPVSSnWg8YdQ76pkpahkw2xqdCzw&address='+shop.addres+'&sensor=false&language=ru',
                //url: 'https://maps.google.com/maps/api/geocode/json?key=AIzaSyA4TmjMPVSSnWg8YdQ76pkpahkw2xqdCzw&address=' + shop,
                success: function(data){
                    for (var key in data.results) {
                        resultlat = data.results[key].geometry.location.lat;
                        resultlng = data.results[key].geometry.location.lng;
                    } }
            });
            return { lat: resultlat, lng: resultlng, id:shop.id,  title: shop.name, addres: shop.addres}
        }



    </script>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    {{--<script async defer--}}
            {{--AIzaSyA4TmjMPVSSnWg8YdQ76pkpahkw2xqdCzw--}}
            {{--src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAcXwMx9Yojcp7_eEQO3x3rBvVXeaZAuqs&callback=initMap">--}}
    {{--</script>--}}
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA4TmjMPVSSnWg8YdQ76pkpahkw2xqdCzw&callback=initMap">
    </script>
    </body>
    </html>

@endsection
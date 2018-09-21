       <?php $this->load->view('global/header')?>
       <?php $this->load->view('global/side_nav')?>
       <div class="container">
                    <div class="card">
                        <div class="card-header">
                            <h2>Track Location <small>track any location</small></h2>

                            <ul class="actions">
                                <li>
                                    <a href="#">
                                        <i class="zmdi zmdi-check-all"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="zmdi zmdi-trending-up"></i>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" data-toggle="dropdown">
                                        <i class="zmdi zmdi-more-vert"></i>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a href="#">Change Date Range</a>
                                        </li>
                                        <li>
                                            <a href="#">Change Graph Type</a>
                                        </li>
                                        <li>
                                            <a href="#">Other Settings</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <div id="map_canvas" style="height:90vh" class="mapping"></div>
                            </div>
                        </div>
                        </div>
                        
                        </div>
            
   <?php $this->load->view('global/footer')?>  
   <script type="text/javascript"
  src=
"https://maps.googleapis.com/maps/api/js?key=AIzaSyCsvkQ1Ml9q8s-miJ5r1J0vBLD9TGmLgMQ&callback=initialize">
</script>
<script type="text/javascript">
var map;
  function initialize() {

    var myOptions = {
      center: new google.maps.LatLng(24.81, 93.92),
      zoom: 10,
      mapTypeId: google.maps.MapTypeId.ROADMAP

    };
    map = new google.maps.Map(document.getElementById("map_canvas"),
        myOptions);
  }
  initialize();
</script>
  



<!DOCTYPE html>
<html>
  <head>
  	<style type="text/css">
  		body{
       
        padding:50px;

      }
#examples a {
  text-decoration: underline;
}

#geocomplete { width: 200px}

.map_canvas { 
  width: 100%; 
  height: 400px; 
  margin: 10px 20px 10px 0;
}

#multiple li { 
  cursor: pointer; 
  text-decoration: underline; 
}
  	</style>
    <title>$.geocomplete()</title>
    <meta charset="UTF-8">
 
    <style type="text/css" media="screen">
      form { width: 100%;      margin-bottom: 100px;}
      
      fieldset { width: 320px; margin-top: 20px;}
      fieldset strong { display: block; margin: 0.5em 0 0em; }
      fieldset input { width:100%; }
      
      ul span { color: #999; }
    </style>
  </head>
  <body dir="rtl">
    
    <div class="map_canvas"></div>
    
    <form>
      <input id="geocomplete" type="text" placeholder="Type in an address" value="111 Broadway, New York, NY" />
      <input id="find" type="button" value="بحث" />
      
      <fieldset>
        <label>Latitude</label>
        <input name="lat" type="text" value="">
      
        <label>Longitude</label>
        <input name="lng" type="text" value="">
      
        <label>Formatted Address</label>
        <input name="formatted_address" type="text" value="">
      </fieldset>
      
      <a id="reset" href="#" style="display:none;">Reset Marker</a>
    </form>
    <br><br>

    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyBJuIuUSyyFXaIJAKxZBfjLaUhea9ZKaJE&amp;libraries=places"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    
    <script src="../plugins/js/jquery.geocomplete.js"></script>
    
    <script>
      $(function(){
        $("#geocomplete").geocomplete({
          map: ".map_canvas",
          details: "form ",
          markerOptions: {
            draggable: true
          }

 

        });

        $("#geocomplete").bind("geocode:dragged", function(event, latLng){
          $("input[name=lat]").val(latLng.lat());
          $("input[name=lng]").val(latLng.lng());
          $("#reset").show();
        });
        
        
        $("#reset").click(function(){
          $("#geocomplete").geocomplete("resetMarker");
          $("#reset").hide();
          return false;
        });
        
        $("#find").click(function(){
          $("#geocomplete").trigger("geocode");
        }).click();
 

      });


    </script>
    
  </body>
</html>

 
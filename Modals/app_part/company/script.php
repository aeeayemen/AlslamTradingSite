

<!-- Jquery-3.2.1.Slim.Mim.JS -->
<script src="plugins/js/jquery-3.2.1.slim.min.js"></script>
<!-- Popper.Mim.JS -->
<script src="plugins/js/popper.min.js"></script>
<!-- Bootstrap.Mim.JS -->
<script src="plugins/js/bootstrap.min.js"></script>
<!-- Meanmenu.JS -->
<script src="plugins/js/jquery.meanmenu.js"></script>
<!-- Magnific.Popup.Min.JS -->
<script src="plugins/js/jquery.magnific-popup.min.js"></script>
<!-- Owl.Carousel.Min.JS -->
<script src="plugins/js/owl.carousel.min.js"></script>
<!-- Wow.Min.JS -->
<script src="plugins/js/wow.min.js"></script>
<!-- Waypoints.Min.JS -->
<script src="js/venobox.min.js"></script>
<script src="plugins/js/waypoints.min.js"></script>
<!-- Jquery.Counterup.Min.JS -->
<script src="plugins/js/jquery.counterup.min.js"></script>
<!-- Jquery.Mixitup.Min.JS -->
<script src="plugins/js/jquery.mixitup.min.js"></script>
<!-- Active.JS -->
<script src="plugins/js/active.js"></script>


<script src="plugins/assets/global/plugins/jquery-validation/js/jquery.validate.js"></script>
<script src="plugins/assets/global/plugins/jquery-validation/js/additional-methods.js"></script>
<script type="text/javascript">

    $(document).ready(function() {
        $('#alert_notif').hide();


        $('#contactFormsector').validate({


            rules: {

                name: {
                    required: true

                },

                email: {
                    required: true,
                    email: true

                },

                subject: {
                    required: true

                },

                message: {
                    required: true

                }
            },

            submitHandler: function (form) {

                // form.submit();
            }
        });


        $("#submitcontactFormsector").click(function() {

            $('#alert_notif').html('');
            $('#alert_notif').hide();
            var form3 = $("#contactFormsector");
            form3.validate();
            var issuccesss= form3.valid();

            if(issuccesss){
                form3.submit();

            }

        });
        $("#contactFormsector").submit(function(e){

            e.preventDefault();
            var formData =$(this).serialize();
            $.ajax({
                type: "POST",
                url: "Modals/app_part/emailSendContact.php",
                data: formData,
                success: function(html){


                    $('#alert_notif').show();

                    $('#alert_notif').html(html);


                }
            });
            return false;
        });




    });

</script>


</body>
</html>
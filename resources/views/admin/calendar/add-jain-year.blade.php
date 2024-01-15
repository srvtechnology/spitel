<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
        $(document).ready(function() {
            $('.save-jain-year-btn').on('click', function (e) {
                var veer_sanwat=$('#veer_sanwat').val();
                var vikram_sanwat=$('#vikram_sanwat').val();
                var isavi_sanwat=$('#isavi_sanwat').val();
                var khartar_sanwat=$('#khartar_sanwat').val();
               
                $.ajax({
                    type: 'POST',
                    url:"{{route('saveJainYear')}}",
                    data: {veer_sanwat:veer_sanwat,vikram_sanwat:vikram_sanwat,isavi_sanwat:isavi_sanwat,khartar_sanwat:khartar_sanwat, _token: '{{ csrf_token() }}'},
                    success: function (data) {
                        if (data.success == 1) {
                             $('.year-alert').html('Year Updated!');
                        }

                    }
                });
            }); });
  </script>
  <script>
        $(document).ready(function() {
            $('.save-month-btn').on('click', function (e) {
                var jain_month=$('#jain_month').val();
               
                $.ajax({
                    type: 'POST',
                    url:"{{route('saveMonth')}}",
                    data: {jain_month:jain_month, _token: '{{ csrf_token() }}'},
                    success: function (data) {
                        if (data.success == 1) {
                             $('.month-alert').html('Month Updated!');
                        }

                    }
                });
            }); });
  </script>
  <script>
        $(document).ready(function() {
            $('.save-sunrise-btn').on('click', function (e) {
                var city_1=$('#city_1').val();
                var city_2=$('#city_2').val();
                var city_3=$('#city_3').val();
                var city_4=$('#city_4').val();
                var city_5=$('#city_5').val();
                var city_6=$('#city_6').val();

                var sunrise_1=$('#sunrise_1').val();
                var sunrise_2=$('#sunrise_2').val();
                var sunrise_3=$('#sunrise_3').val();
                var sunrise_4=$('#sunrise_4').val();
                var sunrise_5=$('#sunrise_5').val();
                var sunrise_6=$('#sunrise_6').val();

                var sunset_1=$('#sunset_1').val();
                var sunset_2=$('#sunset_2').val();
                var sunset_3=$('#sunset_3').val();
                var sunset_4=$('#sunset_4').val();
                var sunset_5=$('#sunset_5').val();
                var sunset_6=$('#sunset_6').val();

               
                $.ajax({
                    type: 'POST',
                    url:"{{route('saveSunrise')}}",
                    data: {
                        city_1:city_1,city_2:city_2,city_3:city_3,city_4:city_4,city_5:city_5,city_6:city_6,
                        sunrise_1:sunrise_1,sunrise_2:sunrise_2,sunrise_3:sunrise_3,sunrise_4:sunrise_4,sunrise_5:sunrise_5,sunrise_6:sunrise_6,
                        sunset_1:sunset_1,sunset_2:sunset_2,sunset_3:sunset_3,sunset_4:sunset_4,sunset_5:sunset_5,sunset_6:sunset_6,
                         _token: '{{ csrf_token() }}'},
                    success: function (data) {
                        if (data.success == 1) {
                             $('.sunrise-alert').html('Sunrise & Sunset Updated!');
                        }

                    }
                });
            }); });
  </script>

<script>
        $(document).ready(function() {
            $('#date').on('change', function (e) {
                var date=$('#date').val();
                var month=['जनवरी', 'फरवरी', 'मार्च', 'अप्रैल', 'मई', 'जून', 'जुलाई', 'अगस्त', 'सितंबर', 'अक्टूबर', 'नवंबर', 'दिसंबर'];
        var day=['रविवार','सोमवार', 'मंगलवार', 'बुधवार', 'गुरुवार', 'शुक्रवार', 'शनिवार'];

        const d = new Date(date); 
        var month_name=month[d.getMonth()];
        

        var eventDateHindi=d.getDate() + ' ' + month_name + ' ' + d.getFullYear();
        var eventDayHindi=day[d.getDay()];


        $('#eventDateHindi').val(eventDateHindi);
                             $('#eventDayHindi').val(eventDayHindi);
             
            }); });
  </script>
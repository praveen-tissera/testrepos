//check download speed test
$("#downloadSpeed").click(function () {
    //call ajax and download 10MB file
    //track start time and end time to download
    //calculate time taken to transfer 10MB file and output value in KB/s
    var kbytesData = 10240;//data file size in Kilo bytes
    $('#loadingSpeedCheck').show();  // show the download progress
    /*
     * Capture start time
     * */
    var start = new Date();
    /*
     * Call 10MB sample file with Ajax
     * */
    $.ajax({
        url: 'download_test/10.mb',
        cache: false,
        success: function () {
            /*
             * Capture end time
             * */
            var end = new Date();
            var total = (end - start);//difference in milliseconds
            var downloadTime = (total / 1000);//difference in seconds
            //calculate speed
            var kbytesSpeed = Math.round(kbytesData / downloadTime); //speed in Kilo bytes per second
            //var kbps = (Math.round(kbytesSpeed * 8)); //speed in Kilo bits per second
            $('#loadingSpeedCheck').hide();  // hide the download progress
            $("#downloadProgress").html("Your download speed " + kbytesSpeed + " KB/s"); //output download speed into div

        },
        error: function (data) {
            //in case of error when checking for download error
            $('#loadingSpeedCheck').hide();  // hide the download progress
            $("#downloadProgress").html("Unable to check download speed. Please try again."); //output error message into div
        }
    });
});
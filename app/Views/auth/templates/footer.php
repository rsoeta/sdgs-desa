</html>
<script>
    function start_countdown() {
        var times = eval(null) - eval(1630766508);
        var menit = Math.floor(times / 60);
        var detik = times % 60;
        timer = setInterval(function() {
            detik--;
            if (detik <= 0 && menit >= 1) {
                detik = 60;
                menit--;
            }
            if (menit <= 0 && detik <= 0) {
                clearInterval(timer);
                location.reload();
            } else {
                document.getElementById("countdown").innerHTML = "<b>Gagal 3 kali silakan coba kembali dalam " + menit + " MENIT " + detik + " DETIK </b>";
            }
        }, 1000)
    }

    $('document').ready(function() {
        var pass = $("#password");
        $('#checkbox').click(function() {
            if (pass.attr('type') === "password") {
                pass.attr('type', 'text');
            } else {
                pass.attr('type', 'password')
            }
        });

        if ($('#countdown').length) {
            start_countdown();
        }
    });
</script>
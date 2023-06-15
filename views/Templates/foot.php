<footer>
        <div class="grid">
            <div class="top">
                <h1>Perpuss</h1>
                <div class="menu">
                    <p>Site Map</p>
                    <a class="list" href="index.php">Home</a>
                    <a class="list" href="index.php#dataKategori">Category</a>
                    <a class="list" href="index.php#listBook">List Book</a>
                    <a class="list" href="../catalogBooks/">My Book</a>
                </div>
                <div class="info">
                    <p>Team</p>
                    <p>Billy Alexander</p>
                    <p>Kristo Josua Simangunsong</p>
                    <p>Mochamad Rizky Ramadhan</p>
                    <p>Prazka Aldiyuda</p>
                </div>
            </div>
            <div class="bottom">
                &copy; Copyright | 2023 - Allright Reserve
            </div>
        </div>
    </footer></div>
    <script>
        $('#menu-toggle').click(function(){
            $(this).toggleClass('open');
            if ($(this).hasClass('open')) {
                $('.float').addClass('active');
                $('.menu-mobile').addClass('active');
            } else {
                $('.float').removeClass('active');
                $('.menu-mobile').removeClass('active');
            }
        });
    </script>
    </body>
    <link href="../../assets/css/stylenew.css" rel="stylesheet" type="text/css";>
</html>
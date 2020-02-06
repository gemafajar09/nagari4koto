<div class="row">
    <div class="col-md-12">

        <center>
            <canvas id="canvas" width="200" height="200" style="background-color:transparent"></canvas>
        </center>
        <div class="card">
            <div class="card-header" style="background-color:aqua;">
                <i>Jumlah Kunjungan</i>
            </div>
            <div class="card-body">
                <div id="kunjungan"></div>
            </div>
        </div>

        <div class="card">
            <div class="card-header" style="background-color:aqua;">
                <i>Peta Desa</i>
            </div>
            <div class="card-body">
            <center>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d255264.37751727895!2d100.34403322022385!3d-1.4696356090874505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd3484cd12f42d3%3A0x6c02aaf6fcb8e1c6!2sIv%20Koto%20Hilie%2C%20Batang%20Kapas%2C%20Kabupaten%20Pesisir%20Selatan%2C%20Sumatera%20Barat!5e0!3m2!1sid!2sid!4v1580784318649!5m2!1sid!2sid" width="350px" height="300px" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </center>
            
            </div>
        </div>
        <div class="box">
            <box class="body">
                
                <div id="idx-calendar">
                    <div id="calendar-control">
                        <div id="monthNow">Januari 2014</div>
                        <div id="nextMonth"></div>
                        <div id="prevMonth"></div>
                    </div>
                    <div id="dayNames">
                        <ul></ul>
                    </div>
                    <div id="daysNum"></div>
                </div>
                    <hr>
                    <link href="kalender.css" type="text/css" rel="stylesheet">
                <?php 
                    include "visitor/jam.php";
                    include "visitor/kalender.php";
                ?>
            </box>
        </div>
        <div class="card">
            <div class="card-header">
                <i>Kontak</i>
            </div>
            <div class="card-body">
                
            </div>
        </div>
    </div>
</div>
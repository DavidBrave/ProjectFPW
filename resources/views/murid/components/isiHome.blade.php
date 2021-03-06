<style>
    #home-container{
        background-color: white;
        width: 700px;
        margin-left: auto;
        margin-right: auto;
        padding: 25px;
    }
    #home{
        color: #ff8282;
    }
    #info-container{
        display: grid;
        grid-template-columns: 25% 25% 25% 25%;
    }
    .kotak-info{
        height: 200px;
        margin: 5px;
        padding: 5px;
    }
    .info-title{
        font-size: 17px;
        text-align: center;
        font-weight: bold;
        color: #1f333f;
    }
    .info-text{
        font-size: 14px;
        color: #1f333f;
    }
    #about-info{
        margin-left: 0px;
        background-color: #bfe6ff;
    }
    #courses-info{
        background-color: #ff8282;
    }
    #pengajar-info{
        background-color: #9cd3a5;
    }
    #contact-info{
        margin-right: 0px;
        background-color: #14d9b5;
    }
</style>
<div id="home-container">
    <img src="{{asset("Images/smartcourse.jpg")}}" alt="" style="width: 650px; height: 400px;"/>
    <div id="info-container">
        <div class="kotak-info" id="about-info">
            <p class="info-title">Smart Course</p>
            <p class="info-text">Smart Course adalah kursus pelajaran yang dilakukan secara online.</p>
        </div>
        <div class="kotak-info" id="courses-info">
            <p class="info-title">Kursus</p>
            <p class="info-text">Smart Course menawarkan kursus pelajaran untuk tingkat SD, SMP, SMA.</p>
        </div>
        <div class="kotak-info" id="pengajar-info">
            <p class="info-title">Pengajar</p>
            <p class="info-text">Smart Course diajar oleh guru yang berpengalaman yang sudah melalui seleksi penerimaan.</p>
        </div>
        <div class="kotak-info" id="contact-info">
            <p class="info-title">Contact</p>
            <p class="info-text">Jika ada pertanyaan bisa hubungi: </p>
            <p class="info-text" style="margin: 0px;">1. 087855161565</p>
            <p class="info-text" style="margin: 0px;">2. 082233033995</p>
        </div>
    </div>
    <h5>Cara Daftar: </h5>
    <ol>
        <li>Daftar terlebih dahulu.</li>
        <li>Cari kursus dan guru yang diinginkan.</li>
        <li>Daftarkan kursus yang dipilih.</li>
    </ol>
</div>

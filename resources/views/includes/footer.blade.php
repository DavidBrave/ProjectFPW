<style>
    #footer{
        background-color: #bfe6ff;
        color:  #1f333f;
        font-size: 15px;
        text-align: center;
        line-height: 50px;
    }
</style>
@if (session("dark") == "false" || session("dark") == null)
    <div id="footer">
    <p>Copyright © 2020  Smart Course. All rights reserved.  Kursus Bimbel Surabaya</p>
@else
    <div id="footer" style="background-color: #424242;">
    <p style="color: white;">Copyright © 2020  Smart Course. All rights reserved.  Kursus Bimbel Surabaya</p>
@endif
</div>

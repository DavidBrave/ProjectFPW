<style>
    #footer{
        background-color: #bfe6ff;
        color:  #1f333f;
        font-size: 15px;
        text-align: center;
        line-height: 50px;
    }
</style>
@if (session("dark") == "true")
    <div id="footer"  style="background-color: #424242; color:white;">
@else
    <div id="footer">
@endif
    <p>Copyright © 2020  Smart Course. All rights reserved.  Kursus Bimbel Surabaya</p>
</div>

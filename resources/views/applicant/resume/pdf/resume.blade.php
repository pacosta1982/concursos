<!DOCTYPE html>
<html>
<head>
<style>
    header {
        position: fixed;
        top: 0cm;
        left: 0cm;
        right: 0cm;
        height: 3cm;
    }
    body {
                margin-top: 1cm;
            }
    .page-break {
        page-break-after: always;
    }
    #cabecera {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    font-size: x-small;
    }
    #customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }
    .center{
    text-align:center;
    }
    .right{
        text-align: right;
    }
    #customers td {
    border-bottom: 0px solid #000000;
    font-size: x-small;
    padding: 2px;
    }
    #customers th {
    font-size: small;
    padding: 2px;
    }
    #customers tr:nth-child(even){background-color: #fff;}
    #customers tr:hover {
        background-color: #DDD;
        }
    #customers th {
    text-align: left;
    font-size: x-small;
    background-color: #DCDCDC;
    color: black;
    }
    div.gallery {
    margin: 5px;
    border: 1px solid #ccc;
    float: left;
    width: 180px;
    }
    div.gallery:hover {
    border: 1px solid #777;
    }
    div.gallery img {
    width: 100%;
    height: auto;
    }
    div.desc {
    padding: 15px;
    text-align: center;
    }
</style>
</head>
<body>
@include('applicant.resume.pdf.header')
@include('applicant.resume.pdf.academic')
@include('applicant.resume.pdf.work')
</body>
</html>

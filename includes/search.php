<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<style>
html, body{
  padding: 0px;
  overflow: auto;
  margin: 0px;
}
.sizemanage{
  margin-top: -40px;
}

#sidebar {
  top:180px;
  z-index: 2000;
  position: fixed;
  width: 200px;
  left: -200px;
  transition: all 250ms linear;
  background-color:white;
  opacity : 0.9;
}
#sidebar.active{
	left:0px;
}
#sidebar  {
  padding: 3px 16px 3px 16px;
	color:black；
  
}
#sidebar a{
  padding: 0px 1px 6px 0px;
  text-decoration: none;
  font-size: 25px;
  color: black;

  display: block;
}
#sidebar a input{
  padding: 6px 8px 6px 16px;
  font-size: 18px;
}
.setting{
  padding: 3px 3px 2px 1px;
  font-size: 15px;
  color:black;

 
}
#sidebar .toggle-btn{
  background-color: white;
  padding: 6px 6px 6px 6px;
	position:absolute;
	left:200px;
	top:-35px;
}
.settings{
  background-color: white;
    padding: 16px 16px 16px 16px;
    width: 240px;
    margin-top: -40px;
    margin-left: -20px;
    font-size:15px;
    color:black;
}
#sidebar .toggle-btn span{
	display:block;
	width:25px;
	height:5px;
	background:#151719;
	margin: 5px 0px;
}
.searching{
  background-color:#cecece;;
}
</style>

<body>
<div id="sidebar"class="sizemanage">
<div class="settings" >     Quick Bars
    <div class="toggle-btn" onclick="toggleSidebar()">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <div class="sidenav navbar-expand-lg" id="sidebarleft">
 
    <span class="navbar-toggler-icon"></span>
  </button>
  <a><label style="padding:3px"> <b>SMARTWATCH</b></label></a>
  <a><label>ค้นหา</label><input type="text" class="form-control searching"id="search"></a>
  <a><label>แบรนด์สินค้า</label></a>
  <div class="nav-left form-check form-check-inline setting">
    <input class="form-check-input" type="checkbox">
    <label class="form-check-label" for="inlineCheckbox1">Nike</label>
    &nbsp;<input class="form-check-input" type="checkbox">
    <label class="form-check-label" for="inlineCheckbox1">Adidas</label>
  </div>
  <div class="nav-left form-check form-check-inline setting">
    <input class="form-check-input" type="checkbox">
    <label class="form-check-label" for="inlineCheckbox1">Converse</label>
  </div>
</div>

</div>
</body>
</html>
<script>
function toggleSidebar() {
  document.getElementById("sidebar").classList.toggle('active');
}
</script>
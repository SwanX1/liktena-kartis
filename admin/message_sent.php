<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.check {
  border-radius: 50%;
}

.container {
  padding: 16px;
}
.modal {
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0,0.4);
  padding-top: 60px;
}
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto;
  border: 1px solid #888;
  width: 30%;
}
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}
.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}
@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
<script>
var modal = document.getElementById('popup');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<div id="popup" class="modal">
  <div class="modal-content animate">
    <div class="imgcontainer">
      <span onclick="document.getElementById('popup').style.display='none'" class="close" title="Aizvērt">&times;</span>
      <img style="padding-bottom:20px;padding-top:50px;" height="150px" width="150px" src="http://liktenakartis.ddns.net/admin/uploads/check.gif" alt="check" class="check">
      <div style="padding-bottom:30px;">
      	<span style="color:#000;font-size:35px;font-weight:bold;">
      		Ziņa nosūtīta!
      	</span>
      </div>
    </div>
  </div>
</div>
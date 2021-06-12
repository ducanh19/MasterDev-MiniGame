// Model action
// Get the modal
var modal = document.getElementById("name");
var modal2 = document.getElementById("rank");

// Get the button that opens the modal
var btn = document.getElementById("start");
var btn2 = document.getElementById("btRank");

// When the user clicks on the button, open the modal
btn.onclick = function () {
  modal.style.display = "block";
}
btn2.onclick = function () {
  modal2.style.display = "block";
  //getListPlayers();
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
  if (event.target == modal2) {
    modal2.style.display = "none";
  }
}

// Ajax use to get list players.
function getListPlayers() {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("rankElement").innerHTML = this.responseText;
    }
  };
  xmlhttp.open("GET", "controller/getPlayer.php");
  xmlhttp.send();
};

// Check enter name action
// When the user click Ok button to play game
function validateName() {
  var x = document.forms["myForm"]["name"].value;
  if (x == "") {
    alert("Name must be filled out");
    return false;
  }
}
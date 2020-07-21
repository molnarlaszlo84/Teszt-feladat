function leteves_engedelyezese(esemeny) {
  esemeny.preventDefault();
}

function atrakas(esemeny) {
  esemeny.dataTransfer.setData("text", esemeny.target.id);
}

function leteves(esemeny) {
  esemeny.preventDefault();
  var adat = esemeny.dataTransfer.getData("text");
  esemeny.target.appendChild(document.getElementById(adat));
}
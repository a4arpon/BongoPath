
// Clock For Gretting
function startTime() {
  const today = new Date();
  let hours = today.getHours();
  let mins = today.getMinutes();

  mins = checkTime(mins);
  document.getElementById("clock_txt").innerHTML = hours + ":" + mins;
  setTimeout(startTime, 1000);
}

function checkTime(i) {
  if (i < 10) {
    i = "0" + i;
  } // add zero in front of numbers < 10
  return i;
}
startTime();
// Clock For Gretting End
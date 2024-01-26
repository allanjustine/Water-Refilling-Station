function showTime() {
	const options = { timeZone: 'Asia/Manila' };
	const localTime = new Date().toLocaleString('en-US', options);
	document.getElementById('currentTime').innerHTML = localTime;
  }
  
  showTime();
  
  setInterval(function () {
	showTime();
  }, 1000);
  
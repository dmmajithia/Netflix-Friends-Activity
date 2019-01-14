document.getElementById("fblogin").addEventListener("click", FBLoginAction);

function FBLoginAction(){
	window.open('https://54.186.219.119/login.php');
}

/*chrome.runtime.onMessage.addListener(
	function(request, sender, sendResponse) {
		document.getElementById("location").innerHTML = request.accessToken;
		console.log(request.accessToken);
		alert(request.accessToken);
	}
);*/

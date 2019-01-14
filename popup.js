document.getElementById("fblogin").addEventListener("click", FBLoginAction);


chrome.storage.sync.get("accessToken", function(items){
	document.getElementById("location").innerHTML = items.accessToken;
});

function FBLoginAction(){
	window.open('https://54.186.219.119/login.php?extensionID=' + chrome.runtime.id);
}

chrome.runtime.onMessage.addListener(

	function(request, sender, sendResponse) {
		chrome.storage.sync.set({"accessToken": request.accessToken}, function(){
			
			console.log(request.accessToken);
			alert(request.accessToken);
		});
	}
);



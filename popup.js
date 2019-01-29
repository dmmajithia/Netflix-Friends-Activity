initializeProgram();

function initializeProgram(){
	var facebookLoginDiv = document.getElementById("FacebookLoginDiv");
	var friendsFeedDiv = document.getElementById("FriendsFeedDiv");

	facebookLoginDiv.style.display = "none";
	friendsFeedDiv.style.display = "none";

	userIDCheck();
}

function userIDCheck(){
	chrome.identity.getProfileUserInfo(function(userInfo) {
	  document.getElementById("temp1").innerHTML = JSON.stringify(userInfo);
	});
}


//chrome.storage.sync.get("accessToken", function(items){});

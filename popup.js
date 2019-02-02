var facebookLoginDiv = document.getElementById("FacebookLoginDiv");
var friendsFeedDiv = document.getElementById("FriendsFeedDiv");

initializeProgram();

function initializeProgram(){
	facebookLoginDiv.style.display = "none";
	friendsFeedDiv.style.display = "none";

	userIDCheck();
}

function userIDCheck(){
	chrome.identity.getProfileUserInfo(function(userInfo) {
	  //document.getElementById("temp1").innerHTML = JSON.stringify(userInfo);
		chrome.storage.sync.get({userIDs:{}}, function(result){
			var userIDs = result.userIDs;
			if (userInfo.id in userIDs){
				//get the friendsfeed from database
				console.log("user exists in chrome.storage");
			}
			else {
				document.getElementById("fbLoginButton").addEventListener("click", FBLoginAction);
				facebookLoginDiv.style.display = "block";
				console.log("user doesn't exist in chrome.storage");
			}
		});
	});
}

function FBLoginAction(){
	window.open('https://54.186.219.119/login.php');
}

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
				facebookLoginDiv.style.display = "block";
				console.log("user doesn't exist in chrome.storage");
				// chrome.storage.sync.set({userIDs:{userInfo.id:{}}}, function(){
				//  	console.log("Added the userIDs dictionary");
				// });
			}
		});
	});
}

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
				console.log("user doesn't exist in chrome.storage");
				userIDCheckApi(userInfo.id, function(response){
					if(response.found){
						console.log("user found in database");
						//get the friends feed from database
					}
					else{
						console.log("user NOT found in database");
						//invoke facebook login
						document.getElementById("fbLoginButton").addEventListener("click", FBLoginAction);
						facebookLoginDiv.style.display = "block";
					}
				});
			}
		});
	});
}

function userIDCheckApi(chromeID, callback){
	const Url = "https://54.186.219.119?action=checkChromeID&chromeID=" + chromeID;
	fetch(Url, {method: "GET"})
	.then(function(data){
		data.json().then(function(json){
			callback(json.value);
		});
	});
}

function FBLoginAction(){
	window.open('https://54.186.219.119/login.php');
}

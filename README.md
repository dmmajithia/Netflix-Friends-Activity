# Netflix Friends Activity Chrome Extension source code

This is a chrome extension that is still in process. The extension will allow you to sign in with your Facebook account and show you what your facebook friends have been watching in Netflix.

## Documentation

### httdocs

All of the server side files are located here.

Use composer to keep track of PHP libraries. The command run on terminal from htdocs is:
```
composer require library-name
```

To import composer libraries, require functions.php .

### Workflow popup.js

Get the userInfo.id and check in chrome.storage for existence
  1. If userInfo.id not found, make a request to server (index.php) to see if userInfo.id exists
    * get the response from the index.php
      - if response contains the chrome.id and facebook friends list, then update this in chrome storage.
      - if response is null, then display with 'block' the FacebookLoginDiv.
  2. If userInfo.id found: display FriendsFeedDiv with the information in Chrome storage. Asynchronously, make a request to server (index.php) to see if database has any differences of friends with chrome storage.

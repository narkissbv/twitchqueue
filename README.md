# twitchqueue

Helps viewers on Twitch to queue up on games with the streamer.

BOT COMMANDS
--
set `join` command to send a `GET` request to `join.php` with this payload:  
`username: { the viewer's twitch handle }`

set 'remove' command to send a `GET` request to `remove.php` with this payload:  
`username: { the viewer's twitch handle }`

set 'queue' command to send a `GET` request to `queue.php`.

Nightbot examples:  
(for !join) `$(urlfetch https://mywebsite.com/join.php?username=$(user))`  
(for !leave) `$(urlfetch https://mywebsite.com/leave.php?username=$(user))`  
(for !queue) `$(urlfetch https://mywebsite/queue.php)`  

Website manager
--
Set a manager password in `manager.php` and use that password to secretly log in to manager.  

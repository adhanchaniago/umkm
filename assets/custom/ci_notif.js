let notification = document.getElementById('notification')
	if(notification != null){
	let message = notification.getAttribute('data-message')
		let getNotif = m => {
			notification.innerHTML = m
		}
		getNotif(message)
		setTimeout(() => {
			getNotif("");
		},3000);
	}
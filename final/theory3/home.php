<?php
?>
<html>

<body>
	<style>
		table,
		th,
		td {
			border: 1px solid black;
			border-collapse: collapse;
		}
	</style>
	<h2>Users list:</h2>
	<a href="create_user.php">Create New User</a>
	<table id="user_table">
		<tr>
			<th>User ID</th>
			<th>Email</th>
			<th>Username</th>
			<th>Created At</th>
			<th>Action</th>
		</tr>
	</table>
</body>

</html>
<!-- XMLHttpRequest: JS library -->
<script>
	document.addEventListener('DOMContentLoaded', loadUsers());


	function loadUsers() {
		// call the API and get the users list
		// http://localhost:8080/wt_b/theory4/api/get-users.php

		// INFO
		// Synchronous: code is executed line after line
		// Asynchronous: 2nd line will not wait for the first line to finish

		var xhr = new XMLHttpRequest();
		// xhr.open("GET", "http://localhost:8080/wt_b/theory4/api/get-users.php", false); // false = Synchronous
		xhr.open("GET", "http://localhost:8080/wt_b/theory4/api/get-users.php", true); // true = Asynchronous

		// for Async, before sending the request, we will define what happens when the request is complete
		xhr.onreadystatechange = function() {
			if (xhr.readyState === 4 && xhr.status === 200) {
				console.log(xhr.responseText); // this line will only be called when request finishes and the response is 200 OK
				var users_list_obj = JSON.parse(xhr.responseText) // similar to json_decode(); it takes JSON string and returns JS object/array
				// console.log(users_list_obj);
				// console.log(users_list_obj[1].email);

				var user_table = document.getElementById("user_table");
				// console.log(user_table);
				// create rows for each user
				users_list_obj.forEach(single_user => { // itearates over the users_list_obj and calls each individual user 'single_user'
					var row_for_single_user = document.createElement('tr');
					// <tr>
					//   <td>1</td>
					//   <td>john@example.com</td>
					// </tr>

					//create a td for user ID
					var td_user_id = document.createElement('td');
					td_user_id.innerHTML = single_user.user_id;
					row_for_single_user.appendChild(td_user_id);

					//create a td for email
					var td_email = document.createElement('td');
					td_email.innerHTML = single_user.email;
					row_for_single_user.appendChild(td_email);

					//create a td for username
					var td_username = document.createElement('td');
					td_username.innerHTML = single_user.username;
					row_for_single_user.appendChild(td_username);

					//create a td for created_at
					var td_created_at = document.createElement('td');
					td_created_at.innerHTML = single_user.created_at;
					row_for_single_user.appendChild(td_created_at);

					// create a td for delete functionality
					var delete_button = document.createElement('button');
					delete_button.innerHTML = "Delete";
					row_for_single_user.appendChild(delete_button);
					// add functionality to the delete button
					delete_button.addEventListener('click', () => {
						deleteUser(single_user.username)
					});

					user_table.appendChild(row_for_single_user);
				});
			} else if (xhr.readyState === 4 && xhr.status === 500) {
				alert("Server error");
			} else if (xhr.readyState === 4 && xhr.status === 400) {
				alert("Bad request");
			} else if (xhr.readyState === 4) {
				alert("Some error occured");
			}
		}

		xhr.send(); // it takes some time to exectue
		// console.log(xhr.responseText); // this line will not be executed until xhr.send() finishes executing
		// console.log(xhr.responseText); // this line will not wait until xhr.send() finishes executing

	}

	function deleteUser(username) {
		alert("Deleting " + username);
		var delete_xhr = new XMLHttpRequest();
		delete_xhr.open("POST", "http://localhost:8080/wt_b/theory4/api/delete-user.php", false);
		var payload = {
			"username": username
		};
		var payload_json = JSON.stringify(payload);
		delete_xhr.send(payload_json);
		alert(delete_xhr.responseText);
		location.reload();
	}
</script>
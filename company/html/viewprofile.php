<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>View Profile</title>
    <link rel="stylesheet" type="text/css" href="../css/viewprofile.css" />
  </head>
  <body>
    <div class="container">
      <div class="header">
        <img
          src="../picture/x-company-logo.png"
          alt="xCompany Logo"
          class="logo"
        />
        <div class="login-status">
          Logged in as <a href="#">Bob</a> | <a href="#">Logout</a>
        </div>
      </div>
      <hr />
      <div class="main-content">
        <div class="sidebar">
          <b>Account</b>
          <hr />
          <ul>
            <li><a href="dashboard.html">Dashboard</a></li>
            <li><a href="viewprofile.html">View Profile</a></li>
            <li><a href="editprofile.html">Edit Profile</a></li>
            <li><a href="profilepicture.html">Change Profile Picture</a></li>
            <li><a href="changepassword.html">Change Password</a></li>
            <li><a href="#">Logout</a></li>
          </ul>
        </div>
        <div class="profile-section">
          <h2>PROFILE</h2>
          <div class="profile-details">
            <div class="profile-info">
              <div><span>Name</span><span>:Bob</span></div>
              <div><span>Email</span><span>:bob@aiub.edu</span></div>
              <div><span>Gender</span><span>:Male</span></div>
              <div><span>Date of Birth</span><span>:19/09/1998</span></div>
              <div><a href="editprofile.html">Edit Profile</a></div>
            </div>
            <div class="profile-picture">
              <img
                src="https://img.icons8.com/ios-filled/150/000000/user-male-circle.png"
                alt="Profile Picture"
              />
              <div><a href="profilepicture.html">Change</a></div>
            </div>
          </div>
        </div>
      </div>
      <hr />
      <div class="footer">Copyright &copy; 2017</div>
    </div>
  </body>
</html>

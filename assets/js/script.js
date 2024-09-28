// Register function
document.getElementById('registerForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    if (username && password) {
        // Save user data in localStorage
        localStorage.setItem('username', username);
        localStorage.setItem('password', password);
        document.getElementById('registerMessage').innerText = 'Account created successfully!';
    }
});

// Login function
document.getElementById('loginForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const loginUsername = document.getElementById('loginUsername').value;
    const loginPassword = document.getElementById('loginPassword').value;

    // Retrieve user data from localStorage
    const storedUsername = localStorage.getItem('username');
    const storedPassword = localStorage.getItem('password');

    if (loginUsername === storedUsername && loginPassword === storedPassword) {
        localStorage.setItem('loggedIn', 'true');
        window.location.href = 'dashboard.html';  // Redirect to dashboard
    } else {
        document.getElementById('loginMessage').innerText = 'Incorrect username or password!';
    }
});

// Display username on dashboard
if (localStorage.getItem('loggedIn') === 'true') {
    const userDisplay = document.getElementById('userDisplay');
    if (userDisplay) {
        userDisplay.innerText = localStorage.getItem('username');
    }
} else {
    window.location.href = 'error.html';  // Redirect to error page if not logged in
}

// Logout function
const logoutBtn = document.getElementById('logoutBtn');
if (logoutBtn) {
    logoutBtn.addEventListener('click', function() {
        localStorage.setItem('loggedIn', 'false');
        window.location.href = '../index.html';  // Redirect to home page
    });
  }
  

<form method="POST" action="login.php">
  <label for="email">Email Address</label>
  <input type="email" id="email" name="email" placeholder="Enter your email" required />

  <label for="password">Password</label>
  <input type="password" id="password" name="password" placeholder="Enter your password" required />

  <div class="form-options">
    <div>
      <input type="checkbox" id="keep-logged-in" />
      <label for="keep-logged-in">Keep me logged in</label>
    </div>
    <a href="#" class="forgot-password">Forgot password?</a>
  </div>

  <button type="submit" class="login-btn">Log In</button>
</form>
